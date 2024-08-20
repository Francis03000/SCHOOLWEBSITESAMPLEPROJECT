$(document).ready(function () {
  $("body").on("click", "#edit", async (e) =>
    update($(e.currentTarget).data("id"))
  );
  $("body").on("click", "#delete", (e) =>
    deletes($(e.currentTarget).data("id"))
  );
  $("body").on("click", "#view", (e) => view($(e.currentTarget).data("id")));

  $("#filesearch").keyup(function () {
    var value = $("#filesearch").val().toLowerCase();
    $("#rioMainTable tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });

  let entity = "schoolyears";

  let dataArray = [];
  getAllData();
  function getAllData() {
    dataArray = [];
    $.get({
      url: entity + "/" + entity + "Crud.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        console.log(newData);
        let table = $("#rioMainTable");
        newData.forEach((schoolyears, i) => {
          dataArray.push(schoolyears);
          let tableRow = $("<tr>", { id: newData.schoolyear_id });
          $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: schoolyears.schoolyear_from,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: schoolyears.schoolyear_to,
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
            "data-id": schoolyears.schoolyear_id,
            id: "delete",
            // html: "Delete",
          }).appendTo(tableData);
          tableData.appendTo(tableRow);
          table.append(tableRow);
        });
      },
    });
  }

  $("#create-new").click(function () {
    $("#modalMainLabel").html("Add School Year");
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
            text: "Permission already exist",
            footer: '<a href="">Why do I have this issue?</a>',
          });
        }
      },
    });
  });

  function update(index) {
    $("#modalMain").modal("show");
    $("#modalMainLabel").html("Update School Year");
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

  function deletes(id) {
    $.post({
      url: entity + "/" + entity + "Crud.php",
      data: { schoolyear_id: id, delete: "delete" },
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
        } else {
          alert(data.message);
        }
      },
    });
  }

  function view(index) {
    $("#modalMain").modal("show");
    $("#modalMainLabel").html("View schoolyears");
    let models = dataArray[index];
    Object.keys(models).map((key) => {
      $(`[name='${key}']`).val(models[key]).attr("disabled", true);
    });
    $("#btn-save").hide();
  }
});
