<?php
include("../../../conn.php");
$id = $_GET['id'];

$selExmne = $conn->query("SELECT * FROM tbl_users WHERE id='$id' ")->fetch(PDO::FETCH_ASSOC);

?>

<fieldset style="width:543px;">
    <legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update <b>(
                <?php echo strtoupper($selExmne['first_name']); ?> )</b></i></legend>
    <div class="col-md-12 mt-4">
        <form method="post" id="updateExamineeFrm">
            <div class="form-group">
                <legend>First Name</legend>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="" name="exFirstname" class="form-control" required=""
                    value="<?php echo $selExmne['first_name']; ?>">
            </div>

            <div class="form-group">
                <legend>Last Name</legend>
                <input type="" name="exLastname" class="form-control" required=""
                    value="<?php echo $selExmne['last_name']; ?>">
            </div>

            <div class="form-group">
                <legend>Gender</legend>
                <select class="form-control" name="exGender">
                    <option value="<?php echo $selExmne['gender'] == "Male" ? 'Male' : 'Female'; ?>">
                        <?php echo $selExmne['gender'] == "Male" ? 'Male' : 'Female'; ?></option>
                    <option value="<?php echo $selExmne['gender'] == "Male" ? 'Female' : 'Male'; ?>">
                        <?php echo $selExmne['gender'] == "Male" ? 'Female' : 'Male'; ?></option>
                </select>
            </div>

            <div class="form-group">
                <legend>Email</legend>
                <input type="" name="exEmail" class="form-control" required=""
                    value="<?php echo $selExmne['email']; ?>">
            </div>

            <div class="form-group">
                <legend>Mobile No.</legend>
                <input type="" name="exMobile" class="form-control" required=""
                    value="<?php echo $selExmne['mobile_no']; ?>">
            </div>

            <div class="form-group">
                <legend>Status</legend>
                <select class="form-control" name="exStatus">
                    <option value="<?php echo $selExmne['status'] == 1 ? 1 : 0; ?>">
                        <?php echo $selExmne['status'] == 1 ? 'Active' : 'Inactive'; ?></option>
                    <option value="<?php echo $selExmne['status'] == 1 ? 0 : 1; ?>">
                        <?php echo $selExmne['status'] == 1 ? 'Inactive' : 'Active'; ?></option>
                </select>
            </div>
            <div class="form-group" align="right">
                <button type="submit" class="btn btn-sm btn-primary">Update Now</button>
            </div>
        </form>
    </div>
</fieldset>