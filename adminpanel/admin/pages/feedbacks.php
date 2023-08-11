<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div><b>FEEDBACKS</b></div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Feedbacks List
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="ad-fe-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Sender</th>
                                <th>Email</th>
                                <th>Feedback</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $selExam = $conn->query("SELECT * FROM feedbacks_tbl inner join tbl_users on feedbacks_tbl.exmne_id = tbl_users.id ORDER BY fb_id DESC ");
                            if ($selExam->rowCount() > 0) {
                                $no = 1;
                                while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $selExamRow['first_name']; ?></td>
                                <td><?php echo $selExamRow['email']; ?></td>
                                <td><?php echo $selExamRow['fb_feedbacks']; ?></td>
                                <td><?php echo $selExamRow['fb_date']; ?></td>
                            </tr>
                            <?php
                                    $no += 1;
                                }
                            } else { ?>
                            <tr>
                                <td colspan="5">
                                    <h3 class="p-3">No Feedback found</h3>
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