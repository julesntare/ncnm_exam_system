    <div class="app-main__outer">
        <div class="single_product">
            <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
                <div class="row row-underline">
                    <div class="col-md-6"> <span class=" deal-text">Details of ...</span> </div>
                    <div class="col-md-6"> <a href="#" data-abc="true"> <span class="ml-auto view-all"></span> </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="col-md-12">
                            <tbody>
                                <tr class="row mt-10">
                                    <td class="col-md-4"><span class="p_specification">Exam Name :</span> </td>
                                    <td class="col-md-8">
                                        <ul>
                                            <li><b>NCLEX</b></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="row mt-10">
                                    <td class="col-md-4"><span class="p_specification">Description :</span> </td>
                                    <td class="col-md-8">
                                        <ul>
                                            <li> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic fugit
                                                debitis nisi minus. Consequatur, incidunt. Cumque laudantium deleniti,
                                                vitae sapiente ullam iure quia sint est. Culpa animi exercitationem enim
                                                porro. </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="row mt-10">
                                    <td class="col-md-4"><span class="p_specification">Exam Start Time :</span> </td>
                                    <td class="col-md-8">
                                        <ul>
                                            <li>2021-12-12 21:39:00</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="row mt-10">
                                    <td class="col-md-4"><span class="p_specification">Exam duration :</span> </td>
                                    <td class="col-md-8">
                                        <ul>
                                            <li>30 Minutes</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="row mt-10">
                                    <td class="col-md-4"><span class="p_specification">Exam Close time :</span> </td>
                                    <td class="col-md-8">
                                        <ul>
                                            <li>2021-12-12 21:39:00</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="row mt-10">
                                    <td class="col-md-4"><span class="p_specification">Payment :</span> </td>
                                    <td class="col-md-8">
                                        <ul>
                                            <li class="text-success"><b>Done successful</b></li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-6">
                        <?php
                        if (($selApplsRow['is_paid'] == 1) && ($selApplsRow['starting_time'] <= date('Y-m-d H:i:s')) && ($selApplsRow['closing_at'] > date('Y-m-d H:i:s')) && $selExTaken->rowCount() < 1) {
                        ?>
                        <a href="#" class="btn btn-primary" id="startQuiz"
                            data-id="<?php echo $selApplsRow['ex_id']; ?>">Start
                            Exam</a>
                        <button type="button" id="deleteCourse" data-id='<?php echo $selApplsRow['cou_id']; ?>'
                            class="btn btn-danger btn-sm">Cancel</button>
                        <?php
                        } else if ($selApplsRow['is_paid'] == 0) {
                        ?>
                        <button type="button" id="deleteCourse" data-id='<?php echo $selApplsRow['cou_id']; ?>'
                            class="btn btn-danger btn-sm">Cancel</button>
                        <?php
                        } else {
                        ?>
                        -
                        <?php }
                        ?>
                        <button type="button" class="btn btn-primary shop-button">Attempt
                            Exam</button> <button type="button" class="btn btn-danger shop-button">Go Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>