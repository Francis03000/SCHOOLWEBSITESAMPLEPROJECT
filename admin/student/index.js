$(document).ready(function () {
  $("body").on("click", "#edit", async (e) =>
    update($(e.currentTarget).data("id"))
  );
  $("body").on("click", "#delete", (e) => {
    const id = $(e.currentTarget).data("id");
    showDeleteConfirmation(id);
  });
  $("body").on("click", "#view", (e) => view($(e.currentTarget).data("id")));

  $("#filesearch").keyup(function () {
    var value = $("#filesearch").val().toLowerCase();
    $("#rioMainTable tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });

  let entity = "student";

  let dataArray = [];
  getAllData();
  ask();
  function getAllData() {
    dataArray = [];
    $.get({
      url: entity + "/" + entity + "Crud.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        // console.log(newData);
        let table = $("#rioMainTable");
        newData.forEach((student, i) => {
          dataArray.push(student);
          let tableRow = $("<tr>", { id: newData.student_id });
          $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);
          let td2 = $("<td>", { class: "text-wrap" });

          $("<td>", {
            class: "text-wrap",
            html:
              student.student_Fname +
              " " +
              student.student_Mname +
              " " +
              student.student_Lname,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: student.strand_acronym + " " + student.section_name,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: student.student_Address,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: student.student_LRN,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: student.student_email,
          }).appendTo(tableRow);
          // buttons action
          let tableData = $("<td>", { class: "text-wrap" });
          $("<button>", {
            class: "fa fa-edit btn btn-warning",
            "data-id": i,
            id: "edit",
            // html: "Edit",
          }).appendTo(tableData);
          $("<button>", {
            class: "fa fa-trash btn btn-danger",
            "data-id": student.student_id,
            id: "delete",
            // html: "Delete",
          }).appendTo(tableData);
          tableData.appendTo(tableRow);
          table.append(tableRow);
        });
      },
    });
  }

  function ask() {
    $.get({
      url: "teacher_positions/teacher_positionsCrud.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        newData.forEach((teacher_positions, i) => {
          let opList = $("#teacher_pos_id");
          $("<option>", {
            value: teacher_positions.teacher_position_id,
            html: teacher_positions.teacher_position_name,
          }).appendTo(opList);
        });
      },
    });
  }

  $("#create-new").click(function () {
    $("#modalMainLabel").html("Add Teacher");
    $("#modalMain").modal("show");
    $("#method").attr("name", "addNew");
  });

  const cipher = (salt) => {
    const textToChars = (text) => text.split("").map((c) => c.charCodeAt(0));
    const byteHex = (n) => ("0" + Number(n).toString(16)).substr(-2);
    const applySaltToChar = (code) =>
      textToChars(salt).reduce((a, b) => a ^ b, code);

    return (text) =>
      text
        .split("")
        .map(textToChars)
        .map(applySaltToChar)
        .map(byteHex)
        .join("");
  };
  const myCipher = cipher("LPBNHS");

  function generateRandomString(length) {
    const characters =
      "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    let randomString = "";

    if (length < 8) {
      length = 8;
    }

    for (let i = 0; i < length; i++) {
      const randomIndex = Math.floor(Math.random() * characters.length);
      randomString += characters.charAt(randomIndex);
    }

    return randomString;
  }

  $("#btn-save").click(function () {
    let formBodyData = $("#formBodyData").serializeArray();

    var fd = new FormData();
    formBodyData.forEach((para) => {
      fd.append(para.name, para.value);
    });

    $.post({
      url: entity + "/" + entity + "Crud.php",
      data: fd,
      contentType: false,
      processData: false,
      success: function (data) {
        // data = JSON.parse(data);
        if (data) {
          $("#formBodyData").trigger("reset");
          $("#modalMain").modal("hide");
          $("#rioMainTable").empty();
          Swal.fire({
            position: "text-center",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500,
          });
          getAllData();
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Teacher already exist",
            footer: '<a href="">Why do I have this issue?</a>',
          });
        }
      },
    });
  });

  function update(index) {
    $("#modalMain").modal("show");
    $("#modalMainLabel").html("Update Student");
    $("#method").attr("name", "update");
    let models = dataArray[index];
    Object.keys(models).map((key) => {
      $(`[name='${key}']`).val(models[key]).attr("disabled", false);
    });

    $("#btn-save").attr("id", "updateData");
    $("#updateData").attr("name", "update");
  }

  $("#updateData").click(function () {
    let formBodyData = $("#formBodyData").serializeArray();
    $.post({
      url: entity + "/" + entity + "Crud.php",
      data: formBodyData,
      success: function (data) {
        data = JSON.parse(data);
        if (data.success) {
          $("#formBodyData").trigger("reset");
          $("#modalMain").modal("hide");
          $("#rioMainTable").empty();
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
            text: "Strand already exist",
            footer: '<a href="">Why do I have this issue?</a>',
          });
        }
      },
    });
  });
  function showDeleteConfirmation(id) {
    Swal.fire({
      title: "Are you sure?",
      text: "You will not be able to recover this data!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Delete",
      cancelButtonText: "Cancel",
      reverseButtons: true,
    }).then((result) => {
      if (result.isConfirmed) {
        deletes(id);
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire("Cancelled", "Delete request cancelled:)", "error");
      }
    });
  }
  $.get({
    url: "advisory/advisoryCrud.php",
    data: { getData: "getData" },
    success: function (data) {
      let newData = JSON.parse(data);
      newData.forEach((advisory, i) => {
        let opList = $("#student_section");
        $("<option>", {
          value: advisory.advisory_id,
          html: advisory.strand_acronym + " " + advisory.section_name,
        }).appendTo(opList);
      });
    },
  });
  function deletes(id) {
    $.post({
      url: entity + "/" + entity + "Crud.php",
      data: { student_id: id, delete: "delete" },
      success: function (data) {
        data = JSON.parse(data);
        if (data.success) {
          $("#formBodyData").trigger("reset");
          $("#modalMain").modal("hide");
          $("#rioMainTable").empty();
          Swal.fire({
            position: "text-center",
            icon: "success",
            title: "Deleted Successfully",
            showConfirmButton: false,
            timer: 1500,
          });
          getAllData();
        } else {
          alert(data.message);
        }
      },
    });
  }

  function view(index) {
    $("#modalMain").modal("show");
    $("#modalMainLabel").html("View student");
    let models = dataArray[index];
    Object.keys(models).map((key) => {
      $([(name = "${key}")])
        .val(models[key])
        .attr("disabled", true);
    });
    $("#btn-save").hide();
  }
});
