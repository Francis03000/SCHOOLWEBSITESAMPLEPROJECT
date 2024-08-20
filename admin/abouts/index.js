$(document).ready(function () {
  let entity = "abouts";

  getAllData();
  function getAllData() {
    $.get({
      url: entity + "/" + entity + "Crud.php",
      data: { getMission: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        console.log(newData);
        $("#mission").val(newData[0].about_description);
      },
    });

    $.get({
      url: entity + "/" + entity + "Crud.php",
      data: { getVission: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        console.log(newData);
        $("#vission").val(newData[0].about_description);
      },
    });

    $.get({
      url: entity + "/" + entity + "Crud.php",
      data: { getGoal: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        console.log(newData);
        $("#goal").val(newData[0].about_description);
      },
    });
  }

  $("#btn-save").click(function () {
    $.post({
      url: entity + "/" + entity + "Crud.php",
      data: {
        about_description: $("#mission").val(),
        about_id: 1,
        update: "update",
      },
      success: function (data) {
        data = JSON.parse(data);
        if (data.success) {
          Swal.fire({
            position: "text-center",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500,
          });
          getAllData();
        } else if (data.message === "1062") {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Permission already exist",
            footer: '<a href="">Why do I have this issue?</a>',
          });
        }
      },
    });
  });

  $("#btn-save2").click(function () {
    $.post({
      url: entity + "/" + entity + "Crud.php",
      data: {
        about_description: $("#vission").val(),
        about_id: 2,
        update: "update",
      },
      success: function (data) {
        data = JSON.parse(data);
        if (data.success) {
          Swal.fire({
            position: "text-center",
            icon: "success",
            title: "Updated Successfully",
            showConfirmButton: false,
            timer: 1500,
          });
          getAllData();
        } else if (data.message === "1062") {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Permission already exist",
            footer: '<a href="">Why do I have this issue?</a>',
          });
        }
      },
    });
  });

  $("#btn-save3").click(function () {
    $.post({
      url: entity + "/" + entity + "Crud.php",
      data: {
        about_description: $("#goal").val(),
        about_id: 3,
        update: "update",
      },
      success: function (data) {
        data = JSON.parse(data);
        if (data.success) {
          Swal.fire({
            position: "text-center",
            icon: "success",
            title: "Deleted Successfully",
            showConfirmButton: false,
            timer: 1500,
          });
          getAllData();
        } else if (data.message === "1062") {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Permission already exist",
            footer: '<a href="">Why do I have this issue?</a>',
          });
        }
      },
    });
  });
});
