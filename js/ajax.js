// Admin Log in
$(document).on("submit", "#examineeLoginFrm", function () {
  $.post(
    "query/loginExe.php",
    $(this).serialize(),
    function (data) {
      if (data.res == "invalid") {
        Swal.fire("Invalid", "Please input valid email / password", "error");
      } else if (data.res == "success") {
        $("body").fadeOut();
        window.location.href = "home.php";
      }
    },
    "json"
  );

  return false;
});

// Submit Feedbacks
$(document).on("submit", "#addFeebacks", function () {
  $.post(
    "query/submitFeedbacksExe.php",
    $(this).serialize(),
    function (data) {
      if (data.res == "success") {
        Swal.fire(
          "Success",
          "your feedback has been submitted successfully",
          "success"
        );
        $("#addFeebacks")[0].reset();
      }
    },
    "json"
  );

  return false;
});

// Submit Application
$(document).on("submit", "#addApplication", function () {
  $.post(
    "query/submitApplicationExe.php",
    $(this).serialize(),
    function (data) {
      if (data.res == "success") {
        Swal.fire(
          "Success",
          "your application has been submitted successfully.",
          "success"
        ).then((result) => {
          window.location.reload();
        });
      }
    },
    "json"
  );

  return false;
});
