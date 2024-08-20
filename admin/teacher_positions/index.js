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

  let entity = "teacher_positions";

  let dataArray = [];
  getAllData();
  // ask();
  function getAllData() {
    dataArray = [];
    $.get({
      url: entity + "/" + entity + "Crud.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        console.log(newData);
        let table = $("#rioMainTable");
        newData.forEach((teacher_positions, i) => {
          dataArray.push(teacher_positions);
          let tableRow = $("<tr>", { id: newData.strand_id });
          $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);

          $("<td>", {
            class: "text-wrap",
            html: teacher_positions.teacher_position_name,
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
            "data-id": teacher_positions.teacher_position_id,
            id: "delete",
            // html: "Delete",
          }).appendTo(tableData);
          tableData.appendTo(tableRow);
          table.append(tableRow);
        });
      },
    });
  }

  // function ask() {
  //   $.get({
  //     url: "departments/departmentsCrud.php",
  //     data: { getData: "getData" },
  //     success: function (data) {
  //       let newData = JSON.parse(data);
  //       newData.forEach((department, i) => {
  //         let opList = $("#strand_department_id");
  //         $("<option>", {
  //           value: department.department_id,
  //           html: department.department_name,
  //         }).appendTo(opList);
  //       });
  //     },
  //   });
  // }

  $("#create-new").click(function () {
    $("#modalMainLabel").html("Add Teacher Position");
    $("#modalMain").modal("show");
    $("#method").attr("name", "addNew");
  });

  $("#btn-save").click(function () {
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
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500,
          });
          getAllData();
        } else if (data.message === "1062") {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Teachers Position already exist",
            footer: '<a href="">Why do I have this issue?</a>',
          });
        }
      },
    });
    w;
  });

  function update(index) {
    $("#modalMain").modal("show");
    $("#modalMainLabel").html("Update Strand");
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
            text: "Teachers Position already exist",
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

  function deletes(id) {
    $.post({
      url: entity + "/" + entity + "Crud.php",
      data: { teacher_position_id: id, delete: "delete" },
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
    $("#modalMainLabel").html("View teacher positions");
    let models = dataArray[index];
    Object.keys(models).map((key) => {
      $(`[name='${key}']`).val(models[key]).attr("disabled", true);
    });
    $("#btn-save").hide();
  }
});
