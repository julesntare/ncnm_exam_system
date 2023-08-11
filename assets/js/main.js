(function ($) {
  var form = $("#signup-form");
  form.validate({
    errorPlacement: function errorPlacement(error, element) {
      element.before(error);
    },
    rules: {
      first_name: {
        required: true,
      },
      last_name: {
        required: true,
      },
      user_name: {
        required: true,
      },
      password: {
        required: true,
      },
      c_password: {
        required: true,
        equalTo: "#password",
      },
      email: {
        required: true,
        email: true,
      },
      mobile_no: {
        required: true,
      },
      gender: {
        required: true,
      },
      provinces_cont: {
        required: true,
      },
      districts_cont: {
        required: true,
      },
      sectors_cont: {
        required: true,
      },
      cert_input: {
        required: true,
        accept: "pdf",
      },
      nid_input: {
        required: true,
        accept: "pdf",
      },
      passport_upload: {
        required: true,
      },
    },
    messages: {
      cert_input: {
        accept: "Only pdf file is allowed",
      },
      nid_input: {
        accept: "Only pdf file is allowed",
      },
      passport_upload: {
        required: "Please choose a photo",
      },
    },
    onfocusout: function (element) {
      if ($(element).attr("name") == "email") {
        $.ajax({
          url: "./register.php",
          type: "POST",
          data: {
            email: $(element).val(),
            mail_only: true,
          },
          success: function (data) {
            json_data = JSON.parse(data);
            if (json_data["status"] == 403) {
              ohSnap(json_data["msg"], { color: "red" });
            }
          },
        });
      }
      $(element).valid();
    },
    highlight: function (element, errorClass, validClass) {
      $(element.form).find(".actions").addClass("form-error");
      $(element).removeClass("valid");
      $(element).addClass("error");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element.form).find(".actions").removeClass("form-error");
      $(element).removeClass("error");
      $(element).addClass("valid");
    },
  });
  form.steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "fade",
    labels: {
      previous: "Previous",
      next: "Next",
      finish: "Submit",
      current: "",
    },
    titleTemplate: '<span class="title">#title#</span>',
    onStepChanging: function (event, currentIndex, newIndex) {
      form.validate().settings.ignore = ":disabled,:hidden";
      return form.valid();
    },
    onFinishing: function (event, currentIndex) {
      form.validate().settings.ignore = ":disabled";
      return form.valid();
    },
    onFinished: function (event, currentIndex) {
      let formatted_form = new FormData(document.querySelector("#signup-form"));
      $.ajax({
        url: "./register.php",
        type: "POST",
        processData: false,
        contentType: false,
        cache: false,
        data: formatted_form,
        enctype: "multipart/form-data",
        beforeSend: function () {
          $(".submitBtn").attr("disabled", "disabled");
          $("#fupForm").css("opacity", ".5");
        },
        success: function (data) {
          json_data = JSON.parse(data);
          if (json_data["status"] == 201) {
            ohSnap(json_data["msg"], {
              color: "green",
            });
            window.location.href = "../home.php";
          } else if (json_data["status"] == 403) {
            ohSnap(json_data["msg"], { color: "red" });
          } else if (json_data["status"] == 500) {
            ohSnap(json_data["msg"], { color: "red" });
          }
        },
        error: function (xhr, ajaxOptions, thrownerror) {
          console.log(thrownerror);
        },
      });
    },
    // onInit : function (event, currentIndex) {
    //     event.append('demo');
    // }
  });

  jQuery.extend(jQuery.validator.messages, {
    required: "",
    remote: "",
    email: "",
    url: "",
    date: "",
    dateISO: "",
    number: "",
    digits: "",
    creditcard: "",
    equalTo: "",
  });

  $(".cd-main-nav").on("click", function (event) {
    if ($(event.target).is(".cd-main-nav"))
      $(this).children("ul").toggleClass("is-visible");
  });
})(jQuery);
