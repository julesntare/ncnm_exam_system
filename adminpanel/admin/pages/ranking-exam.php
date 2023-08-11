<div class="app-main__outer">
    <div class="app-main__inner">

        <?php
@$exam_id = $_GET['exam_id'];

if ($exam_id != "") {
    $selEx = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$exam_id'")->fetch(PDO::FETCH_ASSOC);
    $selTQue = $conn->query("SELECT count(*) as total_questions FROM exam_question_tbl WHERE exam_id='$exam_id'");
    $fetchTotalQues = $selTQue->fetch();
    $selExmne = $conn->query("SELECT * FROM tbl_users tu INNER JOIN exam_attempt ea ON tu.id = ea.exmne_id WHERE ea.exam_id='$exam_id' ");

    ?>
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div><b class="text-primary">RANKING BY EXAM</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                        Exam Name: <?php echo $selEx['ex_title']; ?>
                </div>
        <div class="table-responsive">
            <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="ad-re-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Full Name</th>
                            <th>Score / Over</th>
                            <th>Percentage</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
$no = 1;
    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) {?>
                    <?php
$exmneId = $selExmneRow['id'];

        $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ORDER BY ea.exans_id DESC");

        $selAttempt = $conn->query("SELECT * FROM exam_attempt WHERE exmne_id='$exmneId' AND exam_id='$exam_id' ");

        $over = $fetchTotalQues['total_questions'];

        $score = $selScore->rowCount();
        $ans = $score / $over * 100;

        ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $selExmneRow['last_name']; ?></td>
                        <td>
                            <?php
if ($selAttempt->rowCount() == 0) {
            echo "Not answer yet";
        } else if ($selScore->rowCount() > 0) {
            echo $totScore = $selScore->rowCount();
            echo " / ";
            echo $over;
        } else {
            echo $totScore = $selScore->rowCount();
            echo " / ";
            echo $over;
        }

        ?>
                        </td>
                        <td>
                            <?php
if ($selAttempt->rowCount() == 0) {
            echo "Not answer yet";
        } else {
            echo number_format($ans, 2);?>%<?php
}

        ?></td>
                        <td>
                            <div class="badge rounded-pill <?php
if ($ans >= 80) {
            echo "bg-success";
        } else if ($ans >= 60) {
            echo "bg-primary";
        } else if ($ans >= 50) {
            echo "bg-warning";
        } else {
            echo "bg-danger";
        }
        ?>">
           <?php
if ($ans >= 80) {
            echo "Excellent";
        } else if ($ans >= 60) {
            echo "Very Good";
        } else if ($ans >= 50) {
            echo "Good";
        } else {
            echo "Failed";
        }
        ?>
    </div></td>
                    </tr>
                    <?php
$no++;
    }
    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


        <?php
} else {?>
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div><b>RANKING BY EXAM</b></div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Exam List
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="ad-reg-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Exam Title</th>
                                <th>Description</th>
                                <th class="text-center" width="8%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$selExamQ = $conn->query("SELECT distinct(exam_id) FROM exam_question_tbl ");
    if ($selExamQ->rowCount() > 0) {
        $n = 1;
        while ($selExamQRow = $selExamQ->fetch(PDO::FETCH_ASSOC)) {
            $selExam = $conn->query("SELECT * FROM exam_tbl where ex_id = '" . $selExamQRow['exam_id'] . "'");
            $selExamRow = $selExam->fetch(PDO::FETCH_ASSOC);
            if ($selExam->rowCount() > 0) {
                ?>
                            <tr>
                                <td><?php echo $n++; ?></td>
                                <td><?php echo $selExamRow['ex_title']; ?></td>
                                <td><?php echo $selExamRow['ex_description']; ?></td>
                                <td class="text-center">
                                    <a href="?page=ranking-exam&exam_id=<?php echo $selExamRow['ex_id']; ?>"
                                        class="btn btn-success btn-sm">View</a>
                                </td>
                            </tr>

                            <?php }
            $n++;
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

        <?php }

?>

    </div>