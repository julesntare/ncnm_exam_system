<!-- Modal For application -->
<div class="modal fade" id="applicationsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="refreshFrm" action="query/submitApplicationExe.php" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Exam Application</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="todo" style="border-color: #3F6AD8;">
                        <div class="todo-tag md-tt"></div>
                        <p class="todo-description md-td"></p>
                        <div class="duration"> <br /><b>N.B:</b> <i>You will be notified on the system when application
                                confirmed</i>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="appl_id" id="appl_id" hidden>
                            <input type="text" class="form-control" name="exam_cost" id="exam_cost" hidden>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm Application</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal For Add feedback -->
<div class="modal fade" id="feedbacksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="refreshFrm" id="addFeebacks" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Submit Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="fb_subject" placeholder="Add subject"
                                required>
                        </div>
                        <div class="form-group">
                            <textarea name="myFeedbacks" class="form-control" rows="3"
                                placeholder="Input your feedback here.." required></textarea>
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

<script>
$(document).ready(function() {
    $('body').on('click', '.apply', function() {
        console.log(document.querySelector(".todo-tag"));
        document.querySelector("#appl_id").value = $(this).data('id');
        document.querySelector("#exam_cost").value = $(this).data('ep');
        document.querySelector(".md-tt").innerHTML = $(this).data('et');
        document.querySelector(".md-td").innerHTML = "Cost: " +
            $(this).data('ep') + "Rwf";
    });
});
</script>