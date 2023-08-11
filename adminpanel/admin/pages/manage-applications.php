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
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="ad-ma-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Applicant</th>
                                <th>Exam</th>
                                <th>Exam Price</th>
                                <th>Applied On</th>
                                <th>Paid</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$selAppl = $conn->query("SELECT *, ea.id as app_id FROM exam_application ea inner join exam_tbl et on ea.exam_id = et.ex_id inner join tbl_users tu on ea.examne_id = tu.id ORDER BY applied_on DESC ");
if ($selAppl->rowCount() > 0) {
    $no = 1;
    while ($selApplRow = $selAppl->fetch(PDO::FETCH_ASSOC)) {?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $selApplRow['last_name'] . ' ' . $selApplRow['first_name']; ?></td>
                                <td><?php echo $selApplRow['ex_title']; ?></td>
                                <td><?php echo $selApplRow['exam_cost']; ?></td>
                                <td><?php echo $selApplRow['applied_on']; ?></td>
                                <td><div class="badge rounded-pill <?php echo $selApplRow['is_paid'] == 1 ? "bg-success-subtle border border-success-subtle text-success-emphasis" : "bg-danger-subtle border border-danger-subtle text-danger-emphasis"; ?>"><?php echo $selApplRow['is_paid'] == 1 ? "Paid" : 'Unpaid'; ?></div></td>
                                <td>
                                    <a rel="facebox"
                                        href="facebox_modal/updateApplication.php?id=<?php echo $selApplRow['app_id']; ?>"
                                        class="btn btn-sm btn-primary">Update</a>

                                </td>
                            </tr>
                            <?php
$no += 1;
    }
} else {?>
                            <tr>
                                <td class="text-center" colspan="7">
                                    <h3 class="p-3">No Appication Found</h3>
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