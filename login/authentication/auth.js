import fetch from "../modules/auth.js";

$(document).ready(function () {
  let loginAttempts = 0;
  let countdownTimer = localStorage.getItem("countdownTimer");

  function updateTimer(seconds) {
    $("#countdown-timer").text(`Retry in ${seconds} seconds`);
  }

  function resetLoginForm() {
    loginAttempts = 0;
    localStorage.removeItem("countdownTimer");
    $("#countdown-timer").text("");
    $("#loginUser").prop("disabled", false);
  }

  $("#loginUser").click(function () {
    if (loginAttempts >= 3) {
      return;
    }

    const myCipher = fetch.cipher("LPBNHS");
    console.log(myCipher($("#user_password").val()));
    let form = {
      username: $("#user_username").val(),
      password: myCipher($("#user_password").val()),
      loginUser: "loginUser",
    };
    $.post({
      url: "authentication/authCrud.php",
      data: form,
      success: function (data) {
        var datas = JSON.parse(data);
        if (datas.length > 0) {
          Swal.fire({
            position: "top-center",
            icon: "success",
            title: `Welcome Back ${
              datas[0].user_fname +
              " " +
              datas[0].user_mname +
              " " +
              datas[0].user_lname
            }`,
            showConfirmButton: false,
            timer: 1000,
          });
          setTimeout(() => {
            window.location.href = "../admin/users.php";
          }, 1000);
        } else {
          let form2 = {
            username: $("#user_username").val(),
            password: $("#user_password").val(),
            loginUser2: "loginUser2",
          };
          $.post({
            url: "authentication/authCrud.php",
            data: form2,
            success: function (data) {
              var datas = JSON.parse(data);
              if (datas.length > 0) {
                Swal.fire({
                  position: "top-center",
                  icon: "success",
                  title: `Welcome Back `,
                  showConfirmButton: false,
                  timer: 1000,
                });
                setTimeout(() => {
                  window.location.href = "../admin/users.php";
                }, 1000);
              } else {
                loginAttempts++;
                if (loginAttempts >= 3) {
                  $("#loginUser").prop("disabled", true);
                  countdownTimer = 30;
                  localStorage.setItem("countdownTimer", countdownTimer);
                  const timerInterval = setInterval(function () {
                    if (countdownTimer <= 0) {
                      clearInterval(timerInterval);
                      resetLoginForm();
                    } else {
                      updateTimer(countdownTimer);
                      countdownTimer--;
                      localStorage.setItem("countdownTimer", countdownTimer);
                    }
                  }, 1000);
                }
                Swal.fire({
                  position: "top-center",
                  icon: "warning",
                  title: `Wrong username or password`,
                  showConfirmButton: false,
                  timer: 1000,
                });
              }
            },
          });
        }
      },
    });
    // let form2 = {
    //   username: $("#user_username").val(),
    //   password: myCipher($("#user_password").val()),
    //   loginUser2: "loginUser2",
    // };

    // var user_type = $("#user_type").val();
    // if (user_type === "0") {
    //   $.post({
    //     url: "authentication/authCrud.php",
    //     data: form2,
    //     success: function (data) {
    //       var datas = JSON.parse(data);
    //       if (datas.length > 0) {
    //         Swal.fire({
    //           position: "top-center",
    //           icon: "success",
    //           title: `Welcome Back `,
    //           showConfirmButton: false,
    //           timer: 1000,
    //         });
    //         setTimeout(() => {
    //           window.location.href = "../index.php";
    //         }, 1000);
    //       } else {
    //         loginAttempts++;
    //         if (loginAttempts >= 3) {
    //           $("#loginUser").prop("disabled", true);
    //           countdownTimer = 30;
    //           localStorage.setItem("countdownTimer", countdownTimer);
    //           const timerInterval = setInterval(function () {
    //             if (countdownTimer <= 0) {
    //               clearInterval(timerInterval);
    //               resetLoginForm();
    //             } else {
    //               updateTimer(countdownTimer);
    //               countdownTimer--;
    //               localStorage.setItem("countdownTimer", countdownTimer);
    //             }
    //           }, 1000);
    //         }
    //         Swal.fire({
    //           position: "top-center",
    //           icon: "warning",
    //           title: `Wrong username or password`,
    //           showConfirmButton: false,
    //           timer: 1000,
    //         });
    //       }
    //     },
    //   });
    //   // alert("true");
    // } else if (user_type === "1") {
    //   $.post({
    //     url: "authentication/authCrud.php",
    //     data: form,
    //     success: function (data) {
    //       var datas = JSON.parse(data);
    //       if (datas.length > 0) {
    //         Swal.fire({
    //           position: "top-center",
    //           icon: "success",
    //           title: `Welcome Back ${
    //             datas[0].user_fname +
    //             " " +
    //             datas[0].user_mname +
    //             " " +
    //             datas[0].user_lname
    //           }`,
    //           showConfirmButton: false,
    //           timer: 1000,
    //         });
    //         setTimeout(() => {
    //           window.location.href = "../admin/users.php";
    //         }, 1000);
    //       } else {
    //         loginAttempts++;
    //         if (loginAttempts >= 3) {
    //           $("#loginUser").prop("disabled", true);
    //           countdownTimer = 30;
    //           localStorage.setItem("countdownTimer", countdownTimer);
    //           const timerInterval = setInterval(function () {
    //             if (countdownTimer <= 0) {
    //               clearInterval(timerInterval);
    //               resetLoginForm();
    //             } else {
    //               updateTimer(countdownTimer);
    //               countdownTimer--;
    //               localStorage.setItem("countdownTimer", countdownTimer);
    //             }
    //           }, 1000);
    //         }
    //         Swal.fire({
    //           position: "top-center",
    //           icon: "warning",
    //           title: `Wrong username or password`,
    //           showConfirmButton: false,
    //           timer: 1000,
    //         });
    //       }
    //     },
    //   });
    // }
  });

  if (countdownTimer > 0) {
    $("#loginUser").prop("disabled", true);
    const timerInterval = setInterval(function () {
      if (countdownTimer <= 0) {
        clearInterval(timerInterval);
        resetLoginForm();
      } else {
        updateTimer(countdownTimer);
        countdownTimer--;
        localStorage.setItem("countdownTimer", countdownTimer);
      }
    }, 1000);
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const usernameInput = document.getElementById("user_username");
  const passwordInput = document.getElementById("user_password");
  const loginButton = document.getElementById("loginUser");

  function handleEnterKeyPress(event) {
    if (event.key === "Enter") {
      event.preventDefault();
      loginButton.click();
    }
  }

  usernameInput.addEventListener("keyup", handleEnterKeyPress);
  passwordInput.addEventListener("keyup", handleEnterKeyPress);
});
