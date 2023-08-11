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
                        <div>List of Approved Exams
                        </div>
                    </div>
                </div>
            </div>
            <section class="todos-container" data-cards>
                <?php
                date_default_timezone_set("Africa/Kigali");
                if ($selAprrovedExams->rowCount() > 0) {
                    while ($selApprvExamRow = $selAprrovedExams->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo" style="border-color: #3F6AD8;">
                    <div class="todo-tag">
                        <?php echo $selApprvExamRow['ex_title']; ?>
                    </div>
                    <p class="todo-description">
                        <?php echo $selApprvExamRow['ex_description']; ?>
                    </p>
                    <div class="date">
                        <?php
                                $timeStamp = $selApprvExamRow['ex_created'];
                                $timeStamp = date("D, d M Y", strtotime($timeStamp));
                                $specTime = date("H:ia", strtotime($selApprvExamRow['starting_time']));
                                echo "<b>" . $timeStamp . "</b> at <b>" . $specTime . "</b>";
                                ?>
                    </div>
                    <div class="duration"><?php echo "<b>" . $selApprvExamRow['ex_time_limit'] . "</b>"; ?> min duration
                    </div>
                    <div class="todo-actions">
                        <?php
                                $nows = date('Y-m-d H:i:s');
                                $selTaken = $conn->query("SELECT * FROM exam_attempt ea inner join exam_tbl et on ea.exam_id = et.ex_id  where exmne_id = '$exmneId' and exam_id = '" . $selApprvExamRow['ex_id'] . "'");
                                if ($selTaken->rowCount() > 0) {
                                ?>
                        <div class="is-applied">Already Attempted</div>
                        <?php
                                } else if (($selApprvExamRow['starting_time'] <= $nows) == 1) {
                                ?>
                        <a href="#" id="startQuiz" data-id="<?php echo $selApprvExamRow['ex_id']; ?>">Attempt
                            Now</a>
                        <?php
                                }
                                ?>
                    </div>
                </div>
                <?php
                    }
                } else { ?>
                <a class="text-center">
                    <i class="metismenu-icon pe-7s-attention"></i> <i>No Approved Exam at the moment</i>
                </a>
                <?php
                }
                ?>
            </section>
        </div>

    </div>