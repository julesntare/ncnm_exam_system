<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
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
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">

                <li class="app-sidebar__heading"><a href="home.php">
                        <i class="metismenu-icon pe-7s-home">
                        </i>
                        DASHBOARD</a></li>

                <li class="app-sidebar__heading">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        EXAMS
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="home.php?page=exams-list">
                                <i class="metismenu-icon"></i>
                                Available Exams
                            </a>
                        </li>
                        <li>
                            <a href="home.php?page=exams-approved">
                                <i class="metismenu-icon"></i>
                                Approved Exams
                            </a>
                        </li>
                        <li>
                            <a href="home.php?page=exams-taken">
                                <i class="metismenu-icon">
                                </i>Taken Exams
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="app-sidebar__heading">
                    <a href="home.php?page=manage-applications">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Manage Applications
                    </a>
                </li>

                <li class="app-sidebar__heading">
                    <a href="home.php?page=view-certificates">
                        <i class="metismenu-icon pe-7s-study"></i>
                        Exam Certificates
                    </a>
                </li>

                <li class="app-sidebar__heading">
                    <a href="#" data-toggle="modal" data-target="#feedbacksModal">
                        <i class="metismenu-icon pe-7s-comment"></i>
                        Add Feedback
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>