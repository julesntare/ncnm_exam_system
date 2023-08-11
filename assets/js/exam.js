(function ($) {
  var form = $("#exam-form");
  form.validate({
    errorPlacement: function errorPlacement(error, element) {
      element.before(error);
    },
    rules: {},
    messages: {},
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
      // Submit Answer
      Swal.fire({
        title: "Are you sure?",
        text: "you want to submit your answer now?",
        icon: "warning",
        showCancelButton: true,
        allowOutsideClick: false,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, submit now!",
      }).then((result) => {
        if (result.value) {
          $.post(
            "query/submitAnswerExe.php",
            $("#exam-form").serialize(),
            function (data) {
              console.log(data);
              if (data.res == "alreadyTaken") {
                Swal.fire(
                  "Already Taken",
                  "you already take this exam",
                  "error"
                );
                var exam_id = $("#exam_id").val();
                window.location.href = "home.php?page=result&id=" + exam_id;
              } else if (data.res == "success") {
                Swal.fire("Success", "Exam successfully submitted", "success");
                var exam_id = $("#exam_id").val();
                window.location.href = "home.php?page=result&id=" + exam_id;
              } else if (data.res == "failed") {
                Swal.fire("Error", "Something's went wrong", "error");
              }
            },
            "json"
          );
        }
      });
    },
    // onInit : function (event, currentIndex) {
    //     event.append('demo');
    // }
  });

  jQuery.extend(jQuery.validator.messages, {
    required: "",
    remote: "",
    dateISO: "",
    number: "",
    equalTo: "",
  });

  // counter script
  const TIME_LIMIT = document.getElementById("timeExamLimit").value * 60;
  const FULL_DASH_ARRAY = 285;
  const WARNING_THRESHOLD = (TIME_LIMIT * 40) / 100;
  const ALERT_THRESHOLD = (TIME_LIMIT * 20) / 100;

  const COLOR_CODES = {
    info: {
      color: "green",
    },
    warning: {
      color: "orange",
      threshold: WARNING_THRESHOLD,
    },
    alert: {
      color: "red",
      threshold: ALERT_THRESHOLD,
    },
  };

  let timePassed = 0;
  let timeLeft = TIME_LIMIT;
  let timerInterval = null;
  let remainingPathColor = COLOR_CODES.info.color;

  document.getElementById("exam_time_counter_cont").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">${formatTime(
    timeLeft
  )}</span>
</div>
`;

  startTimer();

  function onTimesUp() {
    clearInterval(timerInterval);
  }

  function startTimer() {
    timerInterval = setInterval(() => {
      timePassed = timePassed += 1;
      timeLeft = TIME_LIMIT - timePassed;
      document.getElementById("base-timer-label").innerHTML =
        formatTime(timeLeft);
      setCircleDasharray();
      setRemainingPathColor(timeLeft);

      if (timeLeft === 0) {
        onTimesUp();
      }
    }, 1000);
  }

  function formatTime(time) {
    const minutes = Math.floor(time / 60);
    let seconds = time % 60;

    if (seconds < 10) {
      seconds = `0${seconds}`;
    }

    return `${minutes}:${seconds}`;
  }

  function setRemainingPathColor(timeLeft) {
    const { alert, warning, info } = COLOR_CODES;
    if (timeLeft <= alert.threshold) {
      if (timeLeft == 0) {
        $.ajax("query/submitAnswerExe.php", {
          type: "POST",
          datatype: "json",
          data: $("#exam-form").serialize(),
          success: function (data) {
            data = JSON.parse(data);
            console.log(data);
            if (data.res == "alreadyTaken") {
              Swal.fire({
                title: "Already Taken",
                text: "you already take this exam",
                icon: "error",
                showCancelButton: false,
                allowOutsideClick: false,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "OK!",
              }).then((result) => {
                if (result.value) {
                  $("#exam-form")[0].reset();
                  var exam_id = $("#exam_id").val();
                  window.location.href = "home.php?page=result&id=" + exam_id;
                }
              });
            } else if (data.res == "success") {
              Swal.fire({
                title: "Time Out",
                text: "your time is over, please click ok",
                icon: "warning",
                showCancelButton: false,
                allowOutsideClick: false,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "OK!",
              }).then((result) => {
                if (result.value) {
                  $("#exam-form")[0].reset();
                  var exam_id = $("#exam_id").val();
                  window.location.href = "home.php?page=result&id=" + exam_id;
                }
              });
            } else if (data.res == "failed") {
              Swal.fire("Error", "Something's went wrong", "error");
            }
          },
        });
      }
      document
        .getElementById("base-timer-path-remaining")
        .classList.remove(warning.color);
      document
        .getElementById("base-timer-path-remaining")
        .classList.add(alert.color);
    } else if (timeLeft <= warning.threshold) {
      document
        .getElementById("base-timer-path-remaining")
        .classList.remove(info.color);
      document
        .getElementById("base-timer-path-remaining")
        .classList.add(warning.color);
    }
  }

  function calculateTimeFraction() {
    const rawTimeFraction = timeLeft / TIME_LIMIT;
    return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
  }

  function setCircleDasharray() {
    const circleDasharray = `${(
      calculateTimeFraction() * FULL_DASH_ARRAY
    ).toFixed(0)} 283`;
    document
      .getElementById("base-timer-path-remaining")
      .setAttribute("stroke-dasharray", circleDasharray);
  }
})(jQuery);

// Select Time Limit
var mins;
var secs;

function cd() {
  var timeExamLimit = $("#timeExamLimit").val();
  mins = 1 * m("" + timeExamLimit); // change minutes here
  secs = 0 + s(":01");
  redo();
}

function m(obj) {
  for (var i = 0; i < obj.length; i++) {
    if (obj.substring(i, i + 1) == ":") break;
  }
  return obj.substring(0, i);
}

function s(obj) {
  for (var i = 0; i < obj.length; i++) {
    if (obj.substring(i, i + 1) == ":") break;
  }
  return obj.substring(i + 1, obj.length);
}

function dis(mins, secs) {
  var disp;
  if (mins <= 9) {
    disp = " 0";
  } else {
    disp = " ";
  }
  disp += mins + ":";
  if (secs <= 9) {
    disp += "0" + secs;
  } else {
    disp += secs;
  }
  return disp;
}

function redo() {
  secs--;
  if (secs == -1) {
    secs = 59;
    mins--;
  }
  document.cd.disp.value = dis(mins, secs);
  if (mins == 0 && secs == 0) {
    console.log(mins);
    $("#examAction").val("autoSubmit");
    $("#exam-form").submit();
  } else {
    cd = setTimeout("redo()", 1000);
  }
}

function init() {
  cd();
}
window.onload = init;
