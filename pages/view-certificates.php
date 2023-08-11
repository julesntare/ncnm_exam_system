<div class="app-main__outer">
    <div id="refreshData">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="metismenu-icon pe-7s-display2 icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>List of Available Certificates
                        </div>
                    </div>
                </div>
            </div>
            <section class="todos-container" data-cards>
                <?php
                $selCertif = $conn->query("SELECT * FROM exam_res_feedback erf inner join exam_tbl et ON erf.exam_id = et.ex_id WHERE erf.exmne_id='$exmneId' and grade = 1 order by rec_time desc");
                if ($selCertif->rowCount() > 0) {
                    while ($selCertifRow = $selCertif->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="todo">
                    <div class="todo-tag">
                        <?php echo $selCertifRow['ex_title'] . " certificate"; ?>
                    </div>
                    <div class="todo-actions">
                        <a href="pages/certificate-gen.php?id=<?php echo $selCertifRow['ex_id']; ?>" class="apply">View
                            Certificate</a>
                    </div>
                </div>
                <?php
                    }
                } else { ?>
                <a>
                    <i class="metismenu-icon pe-7s-attention"></i> <i>No Certificate available at the moment</i>
                </a>
                <?php
                }
                ?>
            </section>
        </div>

    </div>