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
  $("#teacher_profile").on("change", function () {
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
      imagePreview.attr("src", "../assets/img/user.jpg"); // Set the default image
    }
  });

  let entity = "teachers";

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
        newData.forEach((teachers, i) => {
          dataArray.push(teachers);
          let tableRow = $("<tr>", { id: newData.teacher_id });
          $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);
          let td2 = $("<td>", { class: "text-wrap" });
          $("<img  >", {
            class: "card-img-top w-50",
            src: `../assets/images/teachers/${teachers.teacher_fname}/${teachers.teacher_profile}`,
            onerror: "this.onerror=null;this.src='assets/img/RCNHSLOGO.jpg';",
          }).appendTo(td2);
          td2.appendTo(tableRow);

          $("<td>", {
            class: "text-wrap",
            html: teachers.teacher_position_name,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html:
              teachers.teacher_fname +
              " " +
              teachers.teacher_mname +
              " " +
              teachers.teacher_lname,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: teachers.teacher_userName,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: teachers.teacher_Email,
          }).appendTo(tableRow);
          // $("<td>", {
          //   class: "text-wrap",
          //   html: teachers.teacher_password,
          // }).appendTo(tableRow);
          // // buttons action
          let tableData = $("<td>", { class: "text-wrap" });
          $("<button>", {
            class: "fa fa-edit btn btn-warning",
            "data-id": i,
            id: "edit",
            // html: "Edit",
          }).appendTo(tableData);
          $("<button>", {
            class: "fa fa-trash btn btn-danger",
            "data-id": teachers.teacher_id,
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

  $("#btn-save").click(function () {
    let formBodyData = $("#formBodyData").serializeArray();

    var fd = new FormData();
    formBodyData.forEach((para) => {
      fd.append(para.name, para.value);
    });

    fd.append("file", $("#teacher_profile")[0].files[0]);

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
    $("#modalMainLabel").html("Update teachers");
    $("#method").attr("name", "update");

    //   let models = dataArray[index];

    //   var img = dataArray[index]?.teacher_profile;

    //   models.teacher_profile = null;

    //   Object.keys(models).map((key) => {
    //     $(`[name='${key}']`).val(models[key]).attr("disabled", false);
    //   });

    //   $("#update_img").val(img);

    //   $("#btn-save").attr("id", "updateData");
    //   $("#updateData").attr("name", "update");
    // }function update(index) {

    let models = dataArray[index];
    var img = dataArray[index]?.teacher_profile;
    var teacher_fname = dataArray[index]?.teacher_fname;

    if (img != "") {
      $("#image_preview").attr(
        "src",
        "../assets/images/teachers/" + teacher_fname + "/" + img
      );
    } else if (img == "") {
      $("#image_preview").attr("src", "assets/img/RCNHSLOGO.jpg");
    }

    models.teacher_profile = null;

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

    fd.append("file", $("#teacher_profile")[0].files[0]);

    console.log(fd);

    $.post({
      url: entity + "/" + entity + "Crud.php",
      data: fd,
      contentType: false,
      processData: false,
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
            text: "Teachers already exist",
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
      data: { teacher_id: id, delete: "delete" },
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
    $("#modalMainLabel").html("View teachers");
    let models = dataArray[index];
    Object.keys(models).map((key) => {
      $([(name = "${key}")])
        .val(models[key])
        .attr("disabled", true);
    });
    $("#btn-save").hide();
  }
});
