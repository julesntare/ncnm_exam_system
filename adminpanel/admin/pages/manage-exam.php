<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>MANAGE EXAM</div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Exam List
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="ad-me-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Time limit</th>
                                <th>Cost</th>
                                <th>Pass Marks</th>
                                <th>Startin On</th>
                                <th>Closing On</th>
                                <th class="text-center" width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$selExam = $conn->query("SELECT * FROM exam_tbl ORDER BY ex_id DESC ");
if ($selExam->rowCount() > 0) {
    $no = 1;
    while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) {?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $selExamRow['ex_title']; ?></td>
                                <td><?php echo $selExamRow['ex_description']; ?></td>
                                <td><?php echo $selExamRow['ex_time_limit']; ?></td>
                                <td><?php echo $selExamRow['exam_cost']; ?></td>
                                <td><?php echo $selExamRow['pass_marks']; ?></td>
                                <td><?php echo $selExamRow['starting_time']; ?></td>
                                <td><?php echo $selExamRow['closing_at']; ?></td>
                                <td class="text-center">
                                    <a href="manage-exam.php?id=<?php echo $selExamRow['ex_id']; ?>" type="button"
                                        class="btn btn-primary btn-sm">Manage</a>
                                    <button type="button" id="deleteExam" data-id='<?php echo $selExamRow['ex_id']; ?>'
                                        class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>

                            <?php
$no++;
    }
} else {?>
                            <tr>
                                <td colspan="5">
                                    <h3 class="p-3">No Exam Found</h3>
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