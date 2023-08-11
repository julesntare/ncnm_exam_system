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
                        <div>List of Available Exams
                        </div>
                    </div>
                </div>
            </div>
            <section class="todos-container" data-cards>
                <?php
                if ($selAvailExam->rowCount() > 0) {
                    while ($selExamRow = $selAvailExam->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo" style="border-color: #3F6AD8;">
                    <div class="todo-tag">
                        <?php echo $selExamRow['ex_title']; ?>
                    </div>
                    <p class="todo-description">
                        <?php echo $selExamRow['ex_description']; ?>
                    </p>
                    <div class="date">
                        <?php
                                $timeStamp = $selExamRow['starting_time'];
                                $timeStamp = date("D, d M Y", strtotime($timeStamp));
                                $specTime = date("H:ia", strtotime($selExamRow['starting_time']));
                                echo "<b>" . $timeStamp . "</b> at <b>" . $specTime . "</b>";
                                ?>
                    </div>
                    <div class="duration"><?php echo "<b>" . $selExamRow['ex_time_limit'] . "</b>"; ?> min duration
                    </div>
                    <?php
                            $selApplied = $conn->query("SELECT * FROM exam_tbl et inner join exam_application ea on ea.exam_id = et.ex_id  where examne_id = '$exmneId' and exam_id = '" . $selExamRow['ex_id'] . "'");
                            if ($selApplied->rowCount() < 1) {
                            ?>
                    <div class="todo-actions">
                        <a href="#" class="apply" data-id="<?php echo $selExamRow['ex_id'] ?>"
                            data-et="<?php echo $selExamRow['ex_title'] ?>"
                            data-ep="<?php echo $selExamRow['exam_cost'] ?>" data-toggle="modal"
                            data-target="#applicationsModal">Apply</a>
                    </div>
                    <?php
                            } else {
                            ?>
                    <div class="is-applied">Already applied</div>
                    <?php
                            }
                            ?>
                </div>
                <?php
                    }
                } else { ?>
                <a>
                    <i class="metismenu-icon pe-7s-attention"></i> <i>No Exam available at the moment</i>
                </a>
                <?php
                }
                ?>
            </section>
        </div>

    </div>