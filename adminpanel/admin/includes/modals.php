<!-- Modal For Add Exam -->
<div class="modal fade" id="modalForExam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="refreshFrm" id="addExamFrm" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label>Title *</label>
                            <input type="" name="examTitle" class="form-control" placeholder="Type Exam Title..."
                                required="">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="examDesc" class="form-control" rows="2"
                                placeholder="Type Exam Description..."></textarea>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Time Limit (in minutes) *</label>
                                    <input type="number" name="timeLimit" class="form-control" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Pass Marks (in percentage) *</label>
                                    <input type="number" name="minmarks" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Cost (Rwf) *</label>
                            <input type="number" name="exam_cost" min="0" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Starting On *</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="date" name="starting_date" min="<?php echo date('Y-m-d'); ?>"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="time" name="starting_time" class="form-control" required>
                                </div>
                            </div>
                            <label>Ending On *</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="date" name="ending_date" min="<?php echo date('Y-m-d'); ?>"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="time" name="ending_time" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Now</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal For Add Examinee -->
<div class="modal fade" id="modalForAddExaminee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="refreshFrm" id="addExamineeFrm" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Examinee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="" name="firstname" id="firstname" class="form-control" placeholder="First name"
                                autocomplete="off" required="">
                        </div>
                        <div class="form-group">
                            <input type="" name="lastname" id="lastname" class="form-control" placeholder="Last name"
                                autocomplete="off" required="">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="gender" id="gender" required="">
                                <option value="">Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                autocomplete="off" required="">
                        </div>
                        <div class="form-group">
                            <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile No."
                                autocomplete="off" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password" autocomplete="off" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="cpassword" id="cpassword" class="form-control"
                                placeholder="Confirm Password" autocomplete="off" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Now</button>
                </div>
            </div>
        </form>
    </div>
</div>



<!-- Modal For Add Question -->
<div class="modal fade" id="modalForAddQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="refreshFrm" id="addQuestionFrm" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Question for
                        <br><?php echo $selExamRow['ex_title']; ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="refreshFrm" method="post" id="addQuestionFrm">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Question</label>
                                <input type="hidden" name="examId" value="<?php echo $exId; ?>">
                                <textarea name="question" class="form-control" rows="2"
                                    placeholder="Type question..."></textarea>
                            </div>

                            <div class="form-group">
                                <label>Total Marks</label>
                                <input type="number" name="question_marks" min="1" value="1" id="question_marks"
                                    class="form-control" placeholder="Input marks" autocomplete="off" required>
                            </div>

                            <fieldset>
                                <legend>Input word for choice's</legend>
                                <div class="form-group">
                                    <label>Choice A</label>
                                    <input type="" name="choice_A" id="choice_A" class="form-control"
                                        placeholder="Input choice A" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label>Choice B</label>
                                    <input type="" name="choice_B" id="choice_B" class="form-control"
                                        placeholder="Input choice B" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label>Choice C</label>
                                    <input type="" name="choice_C" id="choice_C" class="form-control"
                                        placeholder="Input choice C" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label>Choice D</label>
                                    <input type="" name="choice_D" id="choice_D" class="form-control"
                                        placeholder="Input choice D" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label>Correct Answer</label>
                                    <input type="" name="correctAnswer" id="" class="form-control"
                                        placeholder="Input correct answer" autocomplete="off">
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>