 <?php
    $examId = $_GET['id'];
    $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);

    // update result notification
    $conn->query("UPDATE exam_attempt set res_accessed = 1 WHERE exam_id='$examId' and exmne_id = '$exmneId' ")->fetch(PDO::FETCH_ASSOC);

    ?>

 <div class="app-main__outer">
     <div class="app-main__inner">
         <div id="refreshData">

             <div class="col-md-12">
                 <div class="app-page-title">
                     <div class="page-title-wrapper">
                         <div class="page-title-heading">
                             <div>
                                 <?php echo $selExam['ex_title']; ?>
                                 <div class="page-title-subheading">
                                     <?php echo $selExam['ex_description']; ?>
                                 </div>

                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="row col-md-12">
                     <h1 class="text-primary">Results</h1>
                 </div>

                 <div class="row col-md-6 float-left">
                     <div class="col-md-12 main-card mb-3 card">
                         <div class="card-body">
                             <h5 class="card-title">Your Answers</h5>
                             <table class="align-middle mb-0 table table-borderless table-striped table-hover"
                                 id="tableList">
                                 <?php
                                    $selQuest = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id inner join exam_tbl et on eqt.exam_id = et.ex_id WHERE eqt.exam_id='$examId' AND ea.axmne_id='$exmneId' AND ea.exans_status='new' ");
                                    $i = 1;
                                    while ($selQuestRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
                                 <tr>
                                     <td>
                                         <b>
                                             <p><?php echo $i++; ?>.
                                                 <?php echo $selQuestRow['exam_question'] . "<i> (" . $selQuestRow['question_marks'] . " marks)</i>"; ?>
                                             </p>
                                         </b>
                                         <label class="pl-4">
                                             Answer :
                                             <?php
                                                    if ($selQuestRow['exam_answer'] != $selQuestRow['exans_answer']) { ?>
                                             <span
                                                 class="text-danger"><?php echo $selQuestRow['exans_answer']; ?></span>
                                             <?PHP } else { ?>
                                             <span
                                                 class="text-success"><?php echo $selQuestRow['exans_answer']; ?></span>
                                             <?php }
                                                    ?>
                                         </label>
                                     </td>
                                 </tr>
                                 <?php }
                                    ?>
                             </table>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-6 float-left">
                     <div class="col-md-6 float-left">
                         <div class="card mb-3 widget-content bg-midnight-bloom">
                             <div class="widget-content-wrapper text-white">
                                 <div class="widget-content-left">
                                     <div class="widget-heading">
                                         <span>Score</span>
                                     </div>
                                     <div class="widget-subheading" style="color: transparent;">/</div>
                                 </div>
                                 <div class="widget-content-right">
                                     <div class="widget-numbers text-white">
                                         <?php
                                            $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id inner join exam_tbl et ON eqt.exam_id = et.ex_id  WHERE ea.axmne_id='$exmneId' AND ea.exans_status='new' AND ea.exam_id='$examId'");
                                            ?>
                                         <span>
                                             <?php
                                                $countMarks = 0;
                                                $countTotalMarks = 0;
                                                while ($scoreRow = $selScore->fetch(PDO::FETCH_ASSOC)) {
                                                    if ($scoreRow['exam_answer'] == $scoreRow['exans_answer']) {
                                                        $countMarks += $scoreRow['question_marks'];
                                                    }
                                                    $countTotalMarks += $scoreRow['question_marks'];
                                                }
                                                echo $countMarks;
                                                ?>
                                         </span> / <?php echo $countTotalMarks; ?>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="col-md-6 float-left">
                         <div class="card mb-3 widget-content bg-grow-early">
                             <div class="widget-content-wrapper text-white">
                                 <div class="widget-content-left">
                                     <div class="widget-heading">
                                         <span>Perc</span>
                                     </div>
                                     <div class="widget-subheading" style="color: transparent;">/</div>
                                 </div>
                                 <div class="widget-content-right">
                                     <div class="widget-numbers text-white">
                                         <span>
                                             <?php
                                                $ans = $countMarks / $countTotalMarks * 100;
                                                echo number_format($ans, 2);
                                                echo "%";
                                                ?>
                                         </span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>


         </div>
     </div>