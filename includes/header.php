<?php
include "conn.php";
include "query/selectData.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>NCNM Exam</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <link rel="icon" type="login-ui/image/png" href="./login-ui/images/icons/favicon.ico" />

    <link rel="stylesheet" href="assets/css/exam.css">
    <link href="./main.css" rel="stylesheet">
    <link href="css/mycss.css" rel="stylesheet">
    <link href="css/exam-card.css" rel="stylesheet">
    <link href="css/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/popupwindow/popupWindow.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
    /* profile pic styles */
    .profile-pic {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 1px solid #ccc;
        margin-right: 10px;
        overflow: hidden;
    }

    .profile-pic img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    </style>
</head>

<body id="body">
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <a href="home.php">
                    <div class="logo-src"></div>
                </a>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">

                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <!-- notifications container -->
                                <div class="notification">
                                    <div class="notBtn" href="#">
                                        <!--Number supports double digets and automatically hides itself when there is nothing between divs -->
                                        <div class="number" id="notify_counter"><?php echo $resAppsNotif->rowCount(); ?>
                                        </div>
                                        <i class="fas fa-bell"></i>
                                        <div class="box">
                                            <div class="notif-title">
                                                Notifications
                                            </div>
                                            <div class="display">
                                                <div class="nothing">
                                                    <i class="fas fa-child stick"></i>
                                                    <div class="cent">Looks Like your all caught up!</div>
                                                </div>
                                                <div class="cont">
                                                    <!-- Fold this div and try deleting everything inbetween -->
                                                    <?php
if ($resAppsNotif->rowCount() > 0) {
    while ($resAppsNotifRow = $resAppsNotif->fetch(PDO::FETCH_ASSOC)) {
        ?>
                                                    <div class="sec">
                                                        <a href="home.php?page=manage-applications">
                                                            <div class="txt">
                                                                <?php echo $resAppsNotifRow['ex_title']; ?></div>
                                                            <div class="txt sub">
                                                                <?php
$paid = $resAppsNotifRow['is_paid'] == 1 ? "Approved" : " Not Approved";
        echo "<i>" . $paid . "</i>";
        ?>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php }
} else {?>
                                                    <a>
                                                        <i class="metismenu-icon"></i>No Fresh Notification at the
                                                        moment
                                                    </a>
                                                    <?php }
?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end notification container -->
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <div class="profile-pic">
                                            <img src="./assets/image_uploader/<?php echo $selExmneeData['pass_photo']; ?>"
                                                alt="PP">
                                        </div>
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            class="p-0 btn">
                                            <?php
echo strtoupper($selExmneeData['last_name']);
?>
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true"
                                            class="dropdown-menu dropdown-menu-right">
                                            <button type="button" tabindex="0" class="dropdown-item">My Account</button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <a href="query/logoutExe.php" class="dropdown-item">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>