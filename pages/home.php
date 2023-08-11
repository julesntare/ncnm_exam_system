<div class="app-main__outer">
    <div id="refreshData">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-home icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Dashboard
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <a href="home.php?page=exams-list" class="dash-links">
                        <div class="card mb-3 widget-content bg-arielle-smile">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Available exams</div>
                                    <div class="widget-subheading" style="color:transparent;">.</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white">
                                        <span><?php echo $selAvailExam->rowCount(); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-4">
                    <a href="home.php?page=exams-taken" class="dash-links">
                        <div class="card mb-3 widget-content bg-midnight-bloom">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Exams Taken</div>
                                    <div class="widget-subheading" style="color:transparent;">.</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white">
                                        <span><?php echo $selTaken->rowCount(); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- <?php include("includes/graph.php"); ?> -->

        </div>

    </div>