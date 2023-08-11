<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>EXAMINEE RESULTS</div>
                </div>
            </div>
        </div>

        <div class="col-md-12">

            <div class="form-group">
                <select class="form-control" name="timeLimit" id="examsSelector" required="">
                    <option><b>-- Choose Exam --</b></option>
                    <?php
$selExm = $conn->query("SELECT * FROM exam_tbl ORDER BY ex_created DESC ");
while ($selExmRow = $selExm->fetch(PDO::FETCH_ASSOC)) {
    if ($selExmRow['ex_id'] == $_GET['exam_id']) {
        ?>
                    <option value="<?php echo $selExmRow['ex_id']; ?>" selected>
                        <?php echo $selExmRow['ex_title']; ?></option>
                    <?php
} else {
        ?>
                    <option value="<?php echo $selExmRow['ex_id']; ?>"><?php echo $selExmRow['ex_title']; ?></option>
                    <?php
}
    ?>
                    <?php
}
?>
                </select>
            </div>
            <div class="main-card mb-3 card">
                <?php
if (isset($_GET['exam_name'])) {
    $exam_title = $_GET['exam_name'];
} else {
    $selExmname = $conn->query("SELECT * FROM exam_tbl et INNER JOIN exam_attempt ea ON et.ex_id = ea.exam_id where DATE(exam_attempt_date) = (
                                    SELECT MAX(DATE(exam_attempt_date)) from exam_attempt
                                ) LIMIT 1");
    $selExmnameRow = $selExmname->fetch(PDO::FETCH_ASSOC);
    $exam_title = $selExmnameRow['ex_title'];
}
?>
                <div class="card-header">Examinee Result for (<h4>
                        <i><?php echo $exam_title; ?></i>
                    </h4>)
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="ad-er-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Scores</th>
                                <th>Ratings</th>
                                <th>Status</th>
                                <!-- <th width="10%"></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$selExmne = null;
if (isset($_GET['exam_id'])) {
    $selExmne = $conn->query("SELECT * FROM tbl_users et INNER JOIN exam_attempt ea ON et.id = ea.exmne_id where ea.exam_id = '" . $_GET['exam_id'] . "' ORDER BY ea.examat_id DESC ");
} else {
    $selExmne = $conn->query("SELECT * FROM tbl_users et INNER JOIN exam_attempt ea ON et.id = ea.exmne_id where DATE(exam_attempt_date) = (
                                    SELECT MAX(DATE(exam_attempt_date)) from exam_attempt
                                )");
}
if ($selExmne->rowCount() > 0) {
    $no = 1;
    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) {?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $selExmneRow['first_name']; ?></td>
                                <td><?php echo $selExmneRow['email']; ?></td>
                                <td><?php echo $selExmneRow['gender']; ?></td>
                                <?php
$eid = $selExmneRow['id'];
        $selExName = $conn->query("SELECT * FROM exam_tbl et INNER JOIN exam_attempt ea ON et.ex_id=ea.exam_id WHERE  ea.exmne_id='$eid' ")->fetch(PDO::FETCH_ASSOC);
        $exam_id = $selExName['ex_id'];
        ?>
                                <td>
                                    <?php
$selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$eid' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ");
        ?>
                                    <span>
                                        <?php echo $selScore->rowCount(); ?>
                                        <?php
$over = $selExName['ex_questlimit_display'];
        ?>
                                    </span> / <?php echo $over; ?>
                                </td>
                                <td>
                                    <?php
$selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$eid' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ");
        ?>
                                    <span>
                                        <?php
$score = $selScore->rowCount();
        $ans = $score / $over * 100;
        echo number_format($ans, 2);
        // echo "$ans";
        echo "%";

        ?>
                                    </span>
                                </td>
                                <td><?php echo $selExmneRow['status']; ?></td>
                                <!-- <td>
                                               <a rel="facebox" href="facebox_modal/updateExaminee.php?id=<?php echo $selExmneRow['exmne_id']; ?>" class="btn btn-sm btn-primary">Print Result</a>

                                           </td> -->
                            </tr>
                            <?php
$no += 1;
    }
} else {?>
                            <tr>
                                <td colspan="10" class="text-center">
                                    <i class="p-2">No Exam Results Found</i>
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

    <script>
    let examsSelector = document.querySelector('#examsSelector');
    let url = new URL(location.href);
    examsSelector.addEventListener('change', e => {
        let selectExamName = e.target.options[e.target.selectedIndex].text;
        let examId = e.target.value;
        let search_params = url.searchParams;
        search_params.set('exam_id', examId);
        search_params.set('exam_name', selectExamName);

        url.search = search_params.toString();

        var new_url = url.toString();

        location.href = new_url;
    })
    </script>