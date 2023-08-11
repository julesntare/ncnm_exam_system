<?php
session_start();

if (!isset($_SESSION['examineeSession']['examineenakalogin']) == true) header("location:index.php");

?>
<?php include("conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>

<!-- UI THEME DIRI -->
<!-- <?php include("includes/ui-theme.php"); ?> -->

<div class="app-main">
    <!-- sidebar diri  -->
    <?php include("includes/sidebar.php"); ?>

    <!-- Condition If unza nga page gi click -->
    <?php
  @$page = $_GET['page'];

  if ($page != '') {
    if ($page == "exam") {
      include("pages/exam.php");
    } else if ($page == "result") {
      include("pages/result.php");
    } else if ($page == "myscores") {
      include("pages/myscores.php");
    } else if ($page == "exams-list") {
      include("pages/exams-list.php");
    } else if ($page == "exams-approved") {
      include("pages/exams-approved.php");
    } else if ($page == "exams-taken") {
      include("pages/exams-taken.php");
    } else if ($page == "manage-applications") {
      include("pages/manage-applications.php");
    } else if ($page == "view-certificates") {
      include("pages/view-certificates.php");
    } else if ($page == "app-details") {
      include("pages/detailed-application.php");
    }
  }
  // Else ang home nga page mo display
  else {
    include("pages/home.php");
  }

  ?>

    <!-- MAO NI IYA FOOTER -->
    <?php include("includes/footer.php"); ?>

    <?php include("includes/modals.php"); ?>