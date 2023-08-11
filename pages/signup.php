<?php
session_start();
if (isset($_SESSION['examineeSession']['examineenakalogin']) == true) {
    header("location:../home.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NCNM || ACCOUNT CREATION</title>
    <link rel="icon" type="login-ui/image/png" href="../login-ui/images/icons/favicon.ico" />

    <!-- Font Icon -->

    <link rel="stylesheet" href="../assets/fonts/themify-icons/themify-icons.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="main">
        <div class="container">
            <div id="alert-container"></div>
            <h2>SIGN UP FOR NCNM ACCOUNT</h2>
            <form method="POST" id="signup-form" class="signup-form">
                <h3>
                    <span class="icon"><i class="ti-user"></i></span>
                    <span class="title_text">Personal</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">Personal Information: </span>
                        <span class="step-number">Step 1 / 4</span>
                    </legend>
                    <div class="form-group">
                        <label for="first_name" class="form-label required">First name</label>
                        <input type="text" name="first_name" id="first_name" />
                    </div>

                    <div class="form-group">
                        <label for="last_name" class="form-label required">Last name</label>
                        <input type="text" name="last_name" id="last_name" />
                    </div>

                    <div class="form-group">
                        <label for="mobile_no" class="form-label required">Phone Number</label>
                        <input type="text" name="mobile_no" id="mobile_no" />
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label required">Email</label>
                        <input type="email" name="email" id="email" />
                    </div>

                    <div class="form-group">
                        <div class="form-select">
                            <label for="gender" class="form-label required">Gender</label>
                            <div>
                                <select name="gender" class="required" id="gender">
                                    <option value="">Choose a gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-select">
                            <label for="place_of_reside" class="form-label required">Place of Residence</label>
                            <div class="form-date-group">
                                <div class="form-date-item">
                                    <select id="provinces_cont" name="provinces_cont"></select>
                                    <span class="select-icon"><i class="ti-angle-down"></i></span>
                                </div>
                                <div class="form-date-item">
                                    <select id="districts_cont" name="districts_cont">
                                        <option value="">Select District...</option>
                                    </select>
                                    <span class="select-icon"><i class="ti-angle-down"></i></span>
                                </div>
                                <div class="form-date-item">
                                    <select id="sectors_cont" name="sectors_cont">
                                        <option value="">Select Sector...</option>
                                    </select>
                                    <span class="select-icon"><i class="ti-angle-down"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h3>
                    <span class="icon"><i class="ti-files"></i></span>
                    <span class="title_text">Documents</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">Documents for your abilities: </span>
                        <span class="step-number">Step 2 / 4</span>
                    </legend>
                    <div class="form-group files color">
                        <h1>Upload Your Certificate </h1>
                        <div class="form-group">
                            <input type="file" id="cert_input" name="cert_input" class="form-control"
                                accept="application/pdf">
                        </div>
                    </div>
                    <div class="form-group files color">
                        <h1>Upload Your National ID </h1>
                        <div class="form-group">
                            <input type="file" id="nid_input" name="nid_input" class="form-control"
                                accept="application/pdf">
                        </div>
                    </div>
                </fieldset>

                <h3>
                    <span class="icon"><i class="ti-star"></i></span>
                    <span class="title_text">Identity</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">Identity & Passport Photo: </span>
                        <span class="step-number">Step 3 / 4</span>
                    </legend>
                    <!-- <div class="form-group"> -->
                    <div class="file-upload">
                        <button class="file-upload-btn" type="button"
                            onclick="$('.file-upload-input').trigger( 'click' )">Upload Passport Photo</button>

                        <div class="image-upload-wrap">
                            <input class="file-upload-input" type='file' name="passport_upload"
                                onchange="readURL(this);" accept="image/*" />
                            <div class="drag-text">
                                <h3>Drag and drop a file or select add Image</h3>
                            </div>
                        </div>
                        <div class="file-upload-content">
                            <img class="file-upload-image" src="#" alt="your image" />
                            <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload()" class="remove-image">Cancel
                                    upload</button>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                </fieldset>

                <h3>
                    <span class="icon"><i class="ti-shield"></i></span>
                    <span class="title_text">Credentials</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">Credentials to Login: </span>
                        <span class="step-number">Step 4 / 4</span>
                    </legend>
                    <div class="form-group">
                        <label for="username" class="form-label required">Username</label>
                        <input type="username" name="username" id="username" disabled />
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label required">Password</label>
                        <input type="password" name="password" id="password" />
                    </div>

                    <div class="form-group">
                        <label for="c_password" class="form-label required">Confirm Password</label>
                        <input type="password" name="c_password" id="c_password" />
                    </div>
                </fieldset>
            </form>
            <div class="return-container"><a href="../">
                    << Back home</a>
            </div>
        </div>

    </div>
    <div id="ohsnap"></div>
    <div class="footer">

    </div>

    <!-- JS -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="../assets/vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="../assets/vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="../assets/vendor/minimalist-picker/dobpicker.js"></script>
    <script src="../assets/ohSnap/ohsnap.js"></script>
    <script src="../assets/js/main.js"></script>
    <script>
    $(document).ready(function() {
        let province_cont = document.querySelector('#provinces_cont'),
            district_cont = document.querySelector('#districts_cont'),
            sector_cont = document.querySelector('#sectors_cont');
        // load provinces
        $.ajax({
            url: "load_data.php",
            type: "GET",
            data: 'load_provinces',
            success: function(data) {
                $('#provinces_cont').html(data);
            },
            error: function(xhr, ajaxOptions, thrownerror) {
                console.error(thrownerror);
            }
        });

        // load districts
        province_cont.addEventListener('change', e => {
            $('#districts_cont').html('');
            $('#sectors_cont').html('<option selected="selected">Select Sector...</option>');
            $.ajax({
                url: "load_data.php",
                type: "GET",
                data: {
                    'name': 'load_districts',
                    val: province_cont.value
                },
                success: function(data) {
                    $('#districts_cont').html(data);
                }
            });
        })

        // load sectors
        district_cont.addEventListener('change', e => {
            $('#sectors_cont').html('');
            $.ajax({
                url: "load_data.php",
                type: "GET",
                data: {
                    'name': 'load_sectors',
                    val: district_cont.value
                },
                success: function(data) {
                    $('#sectors_cont').html(data);
                }
            });
        })

        // username onchange
        $('#email').change(function() {
            $('#username').val($(this).val());
        })

    })
    // image upload script
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(".image-upload-wrap").hide();

                $(".file-upload-image").attr("src", e.target.result);
                $(".file-upload-content").show();

                $(".image-title").html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $(".file-upload-input").replaceWith($(".file-upload-input").clone());
        $(".file-upload-content").hide();
        $(".image-upload-wrap").show();
    }
    $(".image-upload-wrap").bind("dragover", function() {
        $(".image-upload-wrap").addClass("image-dropping");
    });
    $(".image-upload-wrap").bind("dragleave", function() {
        $(".image-upload-wrap").removeClass("image-dropping");
    });
    </script>
</body>

</html>
