<?php
session_start();

if (!isset($_SESSION['admin']['adminnakalogin']) == true) header("location:index.php");

?>
<?php include("../../conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>

<!-- UI THEME DIRI -->
<!-- <?php include("includes/ui-theme.php"); ?> -->

<div class="app-main">
    <!-- sidebar diri  -->
    <?php include("includes/sidebar.php"); ?>

    <?php
    $exId = $_GET['id'];

    $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$exId' ");
    $selExamRow = $selExam->fetch(PDO::FETCH_ASSOC);
    $start_dt = new DateTime($selExamRow['starting_time']);
    $end_dt = new DateTime($selExamRow['closing_at']);

    ?>

    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div> MANAGE EXAM
                            <div class="page-title-subheading">
                                Add Questions for <b><?php echo $selExamRow['ex_title']; ?></b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div id="refreshData">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="main-card mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Exam Information
                                </div>
                                <div class="card-body">
                                    <form method="post" id="updateExamFrm">

                                        <div class="form-group">
                                            <label>Exam Title</label>
                                            <input type="hidden" name="examId"
                                                value="<?php echo $selExamRow['ex_id']; ?>">
                                            <input type="" name="examTitle" class="form-control" required=""
                                                value="<?php echo $selExamRow['ex_title']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Exam Description</label>
                                            <textarea name="examDesc" class="form-control" rows="2"
                                                placeholder="Type Exam Description..."><?php echo $selExamRow['ex_description']; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Time Limit (in minutes) *</label>
                                                    <input type="number" name="examLimit" class="form-control"
                                                        value="<?php echo $selExamRow['ex_time_limit']; ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Pass Marks (in percentage) *</label>
                                                    <input type="number" name="minmarks" class="form-control"
                                                        value="<?php echo $selExamRow['pass_marks']; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Cost (Rwf) *</label>
                                            <input type="number" name="exam_cost" min="0" class="form-control"
                                                value="<?php echo $selExamRow['exam_cost']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Starting On</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="date" name="starting_date"
                                                        value="<?php echo $start_dt->format('Y-m-d'); ?>"
                                                        class="form-control" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="time" name="starting_time"
                                                        value="<?php echo $start_dt->format('H:i'); ?>"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <label>Ending On</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="date" name="ending_date"
                                                        value="<?php echo $end_dt->format('Y-m-d'); ?>"
                                                        class="form-control" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="time" name="ending_time"
                                                        value="<?php echo $end_dt->format('H:i'); ?>"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" required="">
                                                <option value="<?php echo $selExamRow['status']; ?>">
                                                    <?php echo "-- " . $selExamRow['status'] . " --"; ?></option>
                                                <option value="-1">Inactive</option>
                                                <option value="0">Active</option>
                                                <option value="1">Closed</option>
                                                <option value="2">Cancelled</option>
                                            </select>
                                        </div>

                                        <div class="form-group" align="right">
                                            <button type="submit" class="btn btn-primary btn-lg">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <?php
                            $selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$exId' ORDER BY eqt_id desc");
                            ?>
                            <div class="main-card mb-3 card">
                                <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate">
                                    </i>Exam Questions
                                    <span class="badge badge-pill badge-primary ml-2">
                                        <?php echo $selQuest->rowCount(); ?>
                                    </span>
                                    <div class="btn-actions-pane-right">
                                        <button class="btn btn-sm btn-primary " data-toggle="modal"
                                            data-target="#modalForAddQuestion">Add Question</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="scroll-area-sm" style="min-height: 400px;">
                                        <div class="scrollbar-container">

                                            <?php

                                            if ($selQuest->rowCount() > 0) {  ?>
                                            <div class="table-responsive">
                                                <table
                                                    class="align-middle mb-0 table table-borderless table-striped table-hover"
                                                    id="tableList">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-left pl-1"></th>
                                                            <th class="text-center" width="20%">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                            if ($selQuest->rowCount() > 0) {
                                                                $i = 1;
                                                                while ($selQuestionRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <tr>
                                                            <td>
                                                                <b><?php echo $i++; ?>.
                                                                    <?php echo $selQuestionRow['exam_question'] . " (Total Marks: " . $selQuestionRow['question_marks'] . ")"; ?></b><br>
                                                                <?php
                                                                            // Choice A
                                                                            if ($selQuestionRow['exam_ch1'] == $selQuestionRow['exam_answer']) { ?>
                                                                <span class="pl-4 text-success">A -
                                                                    <?php echo  $selQuestionRow['exam_ch1']; ?></span><br>
                                                                <?php } else { ?>
                                                                <span class="pl-4">A -
                                                                    <?php echo $selQuestionRow['exam_ch1']; ?></span><br>
                                                                <?php }

                                                                            // Choice B
                                                                            if ($selQuestionRow['exam_ch2'] == $selQuestionRow['exam_answer']) { ?>
                                                                <span class="pl-4 text-success">B -
                                                                    <?php echo $selQuestionRow['exam_ch2']; ?></span><br>
                                                                <?php } else { ?>
                                                                <span class="pl-4">B -
                                                                    <?php echo $selQuestionRow['exam_ch2']; ?></span><br>
                                                                <?php }

                                                                            // Choice C
                                                                            if ($selQuestionRow['exam_ch3'] == $selQuestionRow['exam_answer']) { ?>
                                                                <span class="pl-4 text-success">C -
                                                                    <?php echo $selQuestionRow['exam_ch3']; ?></span><br>
                                                                <?php } else { ?>
                                                                <span class="pl-4">C -
                                                                    <?php echo $selQuestionRow['exam_ch3']; ?></span><br>
                                                                <?php }

                                                                            // Choice D
                                                                            if ($selQuestionRow['exam_ch4'] == $selQuestionRow['exam_answer']) { ?>
                                                                <span class="pl-4 text-success">D -
                                                                    <?php echo $selQuestionRow['exam_ch4']; ?></span><br>
                                                                <?php } else { ?>
                                                                <span class="pl-4">D -
                                                                    <?php echo $selQuestionRow['exam_ch4']; ?></span><br>
                                                                <?php }

                                                                            ?>

                                                            </td>
                                                            <td class="text-center">
                                                                <a rel="facebox"
                                                                    href="facebox_modal/updateQuestion.php?id=<?php echo $selQuestionRow['eqt_id']; ?>"
                                                                    class="btn btn-sm btn-primary">Update</a>
                                                                <button type="button" id="deleteQuestion"
                                                                    data-id='<?php echo $selQuestionRow['eqt_id']; ?>'
                                                                    class="btn btn-danger btn-sm">Delete</button>
                                                            </td>
                                                        </tr>
                                                        <?php }
                                                            } else { ?>
                                                        <tr>
                                                            <td colspan="2">
                                                                <h3 class="p-3">No Course Found</h3>
                                                            </td>
                                                        </tr>
                                                        <?php }
                                                            ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php } else { ?>
                                            <h4 class="text-primary text-center">No question set...</h4>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- MAO NI IYA FOOTER -->
        <?php include("includes/footer.php"); ?>

        <?php include("includes/modals.php"); ?>