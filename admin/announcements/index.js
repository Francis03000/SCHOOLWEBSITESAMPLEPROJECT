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
  $("#announcement_image").on("change", function () {
    var fileInput = this;
    // var filename = fileInput.value.split("\\").pop();
    var imagePreview = $("#image_preview");

    var reader = new FileReader();
    reader.onload = function (e) {
      imagePreview.attr("src", e.target.result);
    };

    if (fileInput.files.length > 0) {
      reader.readAsDataURL(fileInput.files[0]);
    } else {
      imagePreview.attr("src", "assets/img/user.jpg"); // Set the default image
    }
  });

  let entity = "announcements";

  let dataArray = [];
  getAllData();
  function getAllData() {
    dataArray = [];
    ask();
    $.get({
      url: entity + "/" + entity + "Crud.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        console.log(newData);
        let table = $("#rioMainTable");
        newData.forEach((announcements, i) => {
          dataArray.push(announcements);
          let tableRow = $("<tr>", { id: newData.announcement_id });

          $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: announcements.category_name,
          }).appendTo(tableRow);

          $("<img>", {
            class: "img-thumbnail w-50",
            src: `../assets/images/announcements/${announcements.announcement_category_id}/${announcements.announcement_image}`,
            onerror: "this.onerror=null;this.src='assets/img/RCNHSLOGO.jpg';",
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: announcements.announcement_title,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: announcements.announcement_description,
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
            "data-id": announcements.announcement_id,
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
      url: "categories/categoriesCrud.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        newData.forEach((categories, i) => {
          let opList = $("#announcement_category_id");
          $("<option>", {
            value: categories.category_id,
            html: categories.category_name,
          }).appendTo(opList);
        });
      },
    });
  }
  const currentDate = new Date();

  const year = currentDate.getFullYear();
  const month = String(currentDate.getMonth() + 1).padStart(2, "0"); // Month is zero-based, so we add 1 and pad with '0' if necessary.
  const day = String(currentDate.getDate()).padStart(2, "0");
  const hours = String(currentDate.getHours()).padStart(2, "0");
  const minutes = String(currentDate.getMinutes()).padStart(2, "0");
  const seconds = String(currentDate.getSeconds()).padStart(2, "0");

  const formattedDate = `${year}-${month}-${day}-${hours}:${minutes}:${seconds}`;

  $("#create-new").click(function () {
    $("#modalMainLabel").html("Add Announcement");
    $("#modalMain").modal("show");
    $("#method").attr("name", "addNew");
  });

  $("#btn-save").click(function () {
    $("#created_at").val(formattedDate);
    let formBodyData = $("#formBodyData").serializeArray();
    var fd = new FormData();
    formBodyData.forEach((para) => {
      fd.append(para.name, para.value);
    });

    fd.append("file", $("#announcement_image")[0].files[0]);
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
    $("#modalMainLabel").html("Update Announcement");
    $("#method").attr("name", "update");

    let models = dataArray[index];
    var img = dataArray[index]?.announcement_image;
    var announcement_category_id = dataArray[index]?.announcement_category_id;

    if (img != "") {
      $("#image_preview").attr(
        "src",
        "../assets/images/announcements/" + announcement_category_id + "/" + img
      );
    } else if (img == "") {
      $("#image_preview").attr("src", "assets/img/RCNHSLOGO.jpg");
    }

    models.announcement_image = null;

    Object.keys(models).map((key) => {
      $(`[name='${key}']`).val(models[key]).attr("disabled", false);
    });

    $("#update_img").val(img);

    $("#btn-save").attr("id", "updateData");
    $("#updateData").attr("name", "update");
  }
  $("#updateData").click(function () {
    let formBodyData = $("#formBodyData").serializeArray();
    var fd = new FormData();
    formBodyData.forEach((para) => {
      fd.append(para.name, para.value);
    });

    fd.append("file", $("#announcement_image")[0].files[0]);
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
            text: "Permission already exist",
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
      data: { announcement_id: id, delete: "delete" },
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
    $("#modalMainLabel").html("View announcements");
    let models = dataArray[index];
    Object.keys(models).map((key) => {
      $(`[name='${key}']`).val(models[key]).attr("disabled", true);
    });
    $("#btn-save").hide();
  }
});
