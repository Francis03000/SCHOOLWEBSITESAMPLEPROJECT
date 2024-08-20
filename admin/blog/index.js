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

  let entity = "blog";

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
        newData.forEach((blog, i) => {
          dataArray.push(blog);
          let tableRow = $("<tr>", { id: newData.blog_id });
          $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: `<a href="./sampleBlog.php?id=${blog.blog_id}">${blog.title}</a>`,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: blog.date,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: blog.created_By,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: blog.content,
          }).appendTo(tableRow);
          // buttons action
          let tableData = $("<td>", { class: "text-wrap" });
          $("<button>", {
            class: "btn btn-info",
            "data-id": i,
            id: "edit",
            html: "Edit",
          }).appendTo(tableData);
          $("<button>", {
            class: "btn btn-danger",
            "data-id": blog.blog_id,
            id: "delete",
            html: "Delete",
          }).appendTo(tableData);
          tableData.appendTo(tableRow);
          table.append(tableRow);
        });
      },
    });
  }

  $("#create-new").click(function () {
    $("#modalMainLabel").html("Add Department");
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
    $("#modalMainLabel").html("Update Department");
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
      data: { blog_id: id, delete: "delete" },
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
    $("#modalMainLabel").html("View blog");
    let models = dataArray[index];
    Object.keys(models).map((key) => {
      $(`[name='${key}']`).val(models[key]).attr("disabled", true);
    });
    $("#btn-save").hide();
  }
});

var simplemde = new SimpleMDE({ element: document.getElementById("content") });
simplemde.codemirror.on("change", function () {
  console.log(simplemde.value());
  content.value = simplemde.value();
});
