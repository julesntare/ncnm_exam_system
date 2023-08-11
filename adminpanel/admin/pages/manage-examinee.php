<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>MANAGE EXAMINEE</div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Examinee List
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Fullname</th>
                                <th>Gender</th>
                                <th>Mobile No</th>
                                <th>Email</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $selExmne = $conn->query("SELECT * FROM tbl_users ORDER BY id DESC ");
                            if ($selExmne->rowCount() > 0) {
                                $no = 1;
                                while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $selExmneRow['last_name'] . ' ' . $selExmneRow['first_name']; ?></td>
                                <td><?php echo $selExmneRow['gender']; ?></td>
                                <td><?php echo $selExmneRow['mobile_no']; ?></td>
                                <td><?php echo $selExmneRow['email']; ?></td>
                                <td><?php echo $selExmneRow['status'] == 1 ? "Active" : 'Deactivated'; ?></td>
                                <td>
                                    <a rel="facebox"
                                        href="facebox_modal/updateExaminee.php?id=<?php echo $selExmneRow['id']; ?>"
                                        class="btn btn-sm btn-primary">Update</a>

                                </td>
                            </tr>
                            <?php
                                    $no += 1;
                                }
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
            </div>
        </div>


    </div>