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
  $("#grades").on("change", function () {
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

  let entity = "student_grades";

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
        newData.forEach((student_grades, i) => {
          dataArray.push(student_grades);
          let tableRow = $("<tr>", { id: newData.student_grades_id });
          $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html:
              student_grades.strand_acronym + " " + student_grades.section_name,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html:
              student_grades.student_Lname +
              " " +
              student_grades.student_Fname +
              " " +
              student_grades.student_Mname,
          }).appendTo(tableRow);

          $("<td>", {
            class: "text-wrap",
            html: student_grades.grading,
          }).appendTo(tableRow);

          $("<td>", {
            class: "text-wrap",
            html: student_grades.year,
          }).appendTo(tableRow);
          let td2 = $("<td>", { class: "text-wrap" });
          $("<img>", {
            class: "img-thumbnail w-100",
            style: "height: 15rem; background-size: cover;",
            src: `../assets/images/grades/${student_grades.student}/${student_grades.grades}`,

            onerror: "this.onerror=null;this.src='assets/img/RCNHSLOGO.jpg';",
          }).appendTo(td2);
          td2.appendTo(tableRow);
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
            "data-id": student_grades.students_grades_id,
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
    $("#modalMainLabel").html("Add ");
    $("#modalMain").modal("show");
    $("#method").attr("name", "addNew");
  });

  $("#btn-save").click(function () {
    let formBodyData = $("#formBodyData").serializeArray();

    var fd = new FormData();
    formBodyData.forEach((para) => {
      fd.append(para.name, para.value);
    });

    fd.append("file", $("#grades")[0].files[0]);
    $.post({
      url: entity + "/" + entity + "Crud.php",
      data: fd,
      contentType: false,
      processData: false,
      success: function (data) {
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

  $.get({
    url: "advisory/advisoryCrud.php",
    data: { getData: "getData" },
    success: function (data) {
      let newData = JSON.parse(data);
      newData.forEach((advisory, i) => {
        let opList = $("#section");
        $("<option>", {
          value: advisory.advisory_id,
          html: advisory.strand_acronym + " " + advisory.section_name,
        }).appendTo(opList);
      });
    },
  });

  $("#section").change(function () {
    var section = $(this).val();
    $("#student").empty();

    $.get({
      url: "student/studentCrud.php",
      data: { getDataWhere: "getDataWhere", section: section },
      success: function (data) {
        let newData = JSON.parse(data);
        newData.forEach((student, i) => {
          let opList = $("#student");
          $("<option>", {
            value: student.student_id,
            html:
              student.student_Lname +
              " " +
              student.student_Fname +
              " " +
              student.student_Mname,
          }).appendTo(opList);
        });
      },
    });
  });

  $.get({
    url: "schoolyears/schoolyearsCrud.php",
    data: { getData: "getData" },
    success: function (data) {
      let newData = JSON.parse(data);
      newData.forEach((year, i) => {
        let opList = $("#year");
        $("<option>", {
          value: year.schoolyear_from + "-" + year.schoolyear_to,
          html: year.schoolyear_from + "-" + year.schoolyear_to,
        }).appendTo(opList);
      });
    },
  });
  function update(index) {
    var selectedSection = dataArray[index]?.advisory_id;
    var selectedStudent = dataArray[index]?.student_id;

    let opts2 = $("#student");
    // opts2.append("<option value='0'>Choose YearLevel and Section</option>");

    $.get({
      url: "student/studentCrud.php",
      data: { getDataStudent: "getDataStudent", section: selectedSection },
      contentType: "application/json",
      success: function (data) {
        $("#student").empty();

        let newdatadp = JSON.parse(data);
        newdatadp.forEach((student, i) => {
          opts2.append(
            "<option value=" +
              student.student_id +
              (student.student_id === selectedStudent ? " selected" : "") +
              ">" +
              student.student_Lname +
              " " +
              student.student_Fname +
              " " +
              student.student_Mname,
            +"</option>"
          );
        });
      },
    });

    $("#modalMain").modal("show");
    $("#modalMainLabel").html("Update Report Card ");
    $("#method").attr("name", "update");
    let models = dataArray[index];

    var img = dataArray[index]?.grades;
    var student = dataArray[index]?.student_id;

    if (img != "") {
      $("#image_preview").attr(
        "src",
        "../assets/images/grades/" + student + "/" + img
      );
    } else if (img == "") {
      $("#image_preview").attr("src", "assets/img/RCNHSLOGO.jpg");
    }

    models.grades = null;
    Object.keys(models).map((key) => {
      $(`[name='${key}']`).val(models[key]).attr("disabled", false);
    });
    $("#update_img").val(img);

    $("#btn-save").show();

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
      data: { students_grades_id: id, delete: "delete" },
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
    $("#modalMainLabel").html("View student_grades");
    let models = dataArray[index];
    Object.keys(models).map((key) => {
      $(`[name='${key}']`).val(models[key]).attr("disabled", true);
    });
    $("#btn-save").hide();
  }
});
