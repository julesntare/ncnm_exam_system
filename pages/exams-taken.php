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
                        <div>List of Taken Exams
                        </div>
                    </div>
                </div>
            </div>
            <section class="todos-container" data-cards>
                <?php
                if ($selTaken->rowCount() > 0) {
                    while ($selTakenRow = $selTaken->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="todo" style="border-color: #99FFFF;">
                    <div class="todo-tag">
                        <?php echo $selTakenRow['ex_title']; ?>
                    </div>
                    <p class="todo-description">
                        <?php echo $selTakenRow['ex_description']; ?>
                    </p>
                    <div class="date">
                        <?php
                                $timeStamp = $selTakenRow['exam_attempt_date'];
                                $timeStamp = date("D, d M Y", strtotime($timeStamp));
                                echo "Attempted on <b>" . $timeStamp . "</b>";
                                ?>
                    </div>
                    <div class="duration"><?php echo "<b>" . $selTakenRow['ex_time_limit'] . "</b>"; ?> min duration
                    </div>
                    <div class="marks"><b>100</b> overall marks</div>
                    <div class="todo-actions">
                        <a href="home.php?page=result&id=<?php echo $selTakenRow['ex_id']; ?>">Check Result</a>
                    </div>
                </div>
                <?php }
                } else { ?>
                <a href="#">
                    <i class="metismenu-icon"></i>No Exam at the moment
                </a>
                <?php }
                ?>
            </section>
        </div>

    </div>