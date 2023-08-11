<?php
include("../../../conn.php");
$id = $_GET['id'];

$selAppl = $conn->query("SELECT *, ea.id as app_id FROM exam_application ea inner join exam_tbl et on ea.exam_id = et.ex_id inner join tbl_users tu on ea.examne_id = tu.id where ea.id = '$id'")->fetch(PDO::FETCH_ASSOC);

?>

<fieldset style="width:543px;">
    <legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update Application</b></i></legend>
    <div class="col-md-12 mt-4">
        <form method="post" id="updateApplicationFrm">
            <div class="form-group">
                <input type="text" name="exAppl" class="form-control" required="" value="<?php echo $id; ?>" hidden>
            </div>

            <div class="form-group">
                <legend>Payment Status</legend>
                <select class="form-control" name="applStatus">
                    <option value="<?php echo $selAppl['is_paid'] == 1 ? 1 : 0; ?>">
                        <?php echo $selAppl['is_paid'] == 1 ? 'Paid' : 'Unpaid'; ?></option>
                    <option value="<?php echo $selAppl['is_paid'] == 1 ? 0 : 1; ?>">
                        <?php echo $selAppl['is_paid'] == 1 ? 'Unpaid' : 'Paid'; ?></option>
                </select>
            </div>
            <div class="form-group" align="right">
                <button type="submit" class="btn btn-sm btn-primary">Proceed</button>
            </div>
        </form>
    </div>
</fieldset>