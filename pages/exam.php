<?php
$examId = $_GET['id'];
$selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);
$selExamTimeLimit = $selExam['ex_time_limit'];
?>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="col-md-12">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>
                            <div class="exam_title">
                                <?php echo $selExam['ex_title']; ?>
                            </div>
                            <div class="page-title-subheading">
                                <?php echo $selExam['ex_description']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions mr-5" style="font-size: 20px;">
                        <form name="cd">
                            <input type="hidden" name="" id="timeExamLimit" value="<?php echo $selExamTimeLimit; ?>">
                            <label>Remaining Time : </label>
                            <div id="exam_time_counter_cont"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <form method="post" id="exam-form" class="exam-form">
                <input type="hidden" name="exam_id" id="exam_id" value="<?php echo $examId; ?>">
                <input type="hidden" name="examAction" id="examAction">
                <?php
                $selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$examId' ORDER BY rand() ");
                if ($selQuest->rowCount() > 0) {
                    $i = 1;
                    $qCount = 1;
                    while ($selQuestRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
                <?php $questId = $selQuestRow['eqt_id']; ?>

                <!-- start multi step questions -->

                <h3>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading"><?php echo $i++ . ". " . $selQuestRow['exam_question']; ?>
                        </span>
                        <span class="step-number"> <?php echo $qCount++ . " / " . $selQuest->rowCount(); ?></span>
                    </legend>
                    <input type="hidden" name="ques[<?php echo $questId; ?>]" id="ques_id"
                        value="<?php echo $questId; ?>">
                    <div class="col-md-12 quiz" id="quiz" data-toggle="buttons">
                        <label class="element-animation1 btn btn-lg btn-light btn-block"><span class="btn-label"><i
                                    class="glyphicon glyphicon-circle-arrow-right"></i></span> <input
                                name="answer[<?php echo $questId; ?>][correct]"
                                value="<?php echo $selQuestRow['exam_ch1']; ?>" class="form-check-input" type="radio"
                                value="" id="invalidCheck"><?php echo $selQuestRow['exam_ch1']; ?></label>
                        <label class="element-animation2 btn btn-lg btn-light btn-block"><span class="btn-label"><i
                                    class="glyphicon glyphicon-ok"></i></span> <input
                                name="answer[<?php echo $questId; ?>][correct]"
                                value="<?php echo $selQuestRow['exam_ch2']; ?>" class="form-check-input" type="radio"
                                value="" id="invalidCheck"><?php echo $selQuestRow['exam_ch2']; ?></label>
                        <label class="element-animation3 btn btn-lg btn-light btn-block"><span class="btn-label"><i
                                    class="glyphicon glyphicon-circle-arrow-right"></i></span> <input
                                name="answer[<?php echo $questId; ?>][correct]"
                                value="<?php echo $selQuestRow['exam_ch3']; ?>" class="form-check-input" type="radio"
                                value="" id="invalidCheck"><?php echo $selQuestRow['exam_ch3']; ?></label>
                        <label class="element-animation4 btn btn-lg btn-light btn-block"><span class="btn-label"><i
                                    class="glyphicon glyphicon-circle-arrow-right"></i></span> <input
                                name="answer[<?php echo $questId; ?>][correct]"
                                value="<?php echo $selQuestRow['exam_ch4']; ?>" class="form-check-input" type="radio"
                                value="" id="invalidCheck"><?php echo $selQuestRow['exam_ch4']; ?></label>
                    </div>
                </fieldset>
                <!-- end multi step questions -->
                <?php }
                    ?>

                <?php
                } else { ?>
                <b>No question at this moment</b>
                <?php }
                ?>
            </form>
        </div>
    </div>

    <script src="./assets/vendor/jquery/jquery.min.js"></script>
    <script src="./assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="./assets/vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="./assets/vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="./assets/js/exam.js"></script>
    <script type="text/javascript">
    let count = 0;
    document.addEventListener('visibilitychange', function() {
        if (document.visibilityState == 'hidden') {
            Swal.fire(
                "Warning",
                "You are not allowed to get out of this page. second time the exam will be ended. Thank you!!",
                "warning"
            )
            count++;
        }

        if (count > 1) {
            $.ajax("query/submitAnswerExe.php", {
                type: "POST",
                datatype: "json",
                data: $("#exam-form").serialize(),
                success: function(data) {
                    console.log($("#exam-form").serialize());
                    data = JSON.parse(data);
                    if (data.res == "alreadyTaken") {
                        Swal.fire({
                            title: "Already Taken",
                            text: "you already take this exam",
                            icon: "error",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "OK!",
                        }).then((result) => {
                            if (result.value) {
                                $("#exam-form")[0].reset();
                                var exam_id = $("#exam_id").val();
                                window.location.href = "home.php?page=result&id=" + exam_id;
                            }
                        });
                    } else if (data.res == "success") {
                        Swal.fire({
                            title: "Exam Ended",
                            text: "The exam ended due to page leave",
                            icon: "warning",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "OK!",
                        }).then((result) => {
                            if (result.value) {
                                $("#exam-form")[0].reset();
                                var exam_id = $("#exam_id").val();
                                window.location.href = "home.php?page=result&id=" + exam_id;
                            }
                        });
                    } else if (data.res == "failed") {
                        Swal.fire("Error", "Something's went wrong", "error");
                    }
                },
            });
        }
    });

    window.onbeforeunload = function() {

        $.ajax("query/submitAnswerExe.php", {
            type: "POST",
            datatype: "json",
            data: $("#exam-form").serialize(),
            success: function(data) {
                data = JSON.parse(data);
                if (data.res == "alreadyTaken") {
                    $("#exam-form")[0].reset();
                    var exam_id = $("#exam_id").val();
                    window.location.href = "home.php?page=result&id=" + exam_id;
                } else if (data.res == "success") {
                    if (result.value) {
                        $("#exam-form")[0].reset();
                        var exam_id = $("#exam_id").val();
                        window.location.href = "home.php?page=result&id=" + exam_id;
                    }
                } else if (data.res == "failed") {
                    Swal.fire("Error", "Something's went wrong", "error");
                }
            },
        });
    }
    </script>