<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>MANAGE APPLICATIONS</div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Applications List
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                        <thead>
                            <tr>
                                <th class="text-left pl-4">Exam Name</th>
                                <th class="text-left pl-4">Exam Price</th>
                                <th class="text-left pl-4">Exam Date</th>
                                <th class="text-left pl-4">Payment</th>
                                <th class="text-left pl-4">Applied On</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $selAppls = $conn->query("SELECT * FROM exam_application ea inner join exam_tbl et on ea.exam_id = et.ex_id  where examne_id = '$exmneId' order by applied_on desc ");
                            if ($selAppls->rowCount() > 0) {
                                while ($selApplsRow = $selAppls->fetch(PDO::FETCH_ASSOC)) {
                                    $selExTaken = $conn->query("SELECT * FROM exam_attempt where exmne_id = '$exmneId' and exam_id = '" . $selApplsRow['exam_id'] . "'");
                            ?>
                            <tr>
                                <td class="pl-4">
                                    <?php echo $selApplsRow['ex_title']; ?>
                                </td>
                                <td class="pl-4">
                                    <?php echo $selApplsRow['exam_cost']; ?>
                                </td>
                                <td class="pl-4">
                                    <?php echo $selApplsRow['starting_time']; ?>
                                </td>
                                <td class="pl-4">
                                    <b><?php echo $selApplsRow['is_paid'] == 1 ? "Confirmed" : "Pending..."; ?></b>
                                </td>
                                <td class="pl-4">
                                    <?php echo $selApplsRow['applied_on']; ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                            if (($selApplsRow['is_paid'] == 1) && ($selApplsRow['starting_time'] <= date('Y-m-d H:i:s')) && ($selApplsRow['closing_at'] > date('Y-m-d H:i:s')) && $selExTaken->rowCount() < 1) {
                                            ?>
                                    <a href="#" class="btn btn-primary" id="startQuiz"
                                        data-id="<?php echo $selApplsRow['ex_id']; ?>">Start
                                        Exam</a>
                                    <button type="button" id="deleteCourse"
                                        data-id='<?php echo $selApplsRow['cou_id']; ?>'
                                        class="btn btn-danger btn-sm">Cancel</button>
                                    <?php
                                            } else if ($selApplsRow['is_paid'] == 0) {
                                            ?>
                                    <button type="button" id="deleteCourse"
                                        data-id='<?php echo $selApplsRow['cou_id']; ?>'
                                        class="btn btn-danger btn-sm">Cancel</button>
                                    <?php
                                            } else {
                                            ?>
                                    -
                                    <?php }
                                            ?>
                                </td>
                            </tr>

                            <?php }
                            } else { ?>
                            <tr>
                                <td colspan="2">
                                    <h3 class="p-3">No Application Found</h3>
                                </td>
                            </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>