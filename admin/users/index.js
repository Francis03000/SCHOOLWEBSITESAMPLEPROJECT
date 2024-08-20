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
  $("#user_profile").on("change", function () {
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

  let entity = "users";

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
        console.log(newData);
        let table = $("#rioMainTable");
        newData.forEach((users, i) => {
          dataArray.push(users);
          let tableRow = $("<tr>", { id: newData.user_id });
          $("<td>", { class: "text-wrap", html: i + 1 }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: users.permission_name,
          }).appendTo(tableRow);
          let td2 = $("<td>", { class: "text-wrap" });
          $("<img>", {
            class: "img-thumbnail",
            src: `../assets/images/users/${users.user_fname}/${users.user_profile}`,
            onerror: "this.onerror=null;this.src='assets/img/RCNHSLOGO.jpg';",
          }).appendTo(td2);
          td2.appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html:
              users.user_fname +
              " " +
              users.user_mname +
              " " +
              users.user_lname,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: users.user_DOB,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: users.user_address,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: users.user_contact,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: users.user_username,
          }).appendTo(tableRow);
          $("<td>", {
            class: "text-wrap",
            html: users.user_email,
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
            "data-id": users.user_id,
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
      url: "permissions/permissionsCrud.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        newData.forEach((permissions, i) => {
          let opList = $("#user_permission_id");
          $("<option>", {
            value: permissions.permission_id,
            html: permissions.permission_name,
          }).appendTo(opList);
        });
      },
    });
  }
  $("#create-new").click(function () {
    $("#modalMainLabel").html("Add User");
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

  const decipher = (salt) => {
    const textToChars = (text) => text.split("").map((c) => c.charCodeAt(0));
    const applySaltToChar = (code) =>
      textToChars(salt).reduce((a, b) => a ^ b, code);
    return (encoded) =>
      encoded
        .match(/.{1,2}/g)
        .map((hex) => parseInt(hex, 16))
        .map(applySaltToChar)
        .map((charCode) => String.fromCharCode(charCode))
        .join("");
  };

  const myCipher = cipher("LPBNHS");

  $("#btn-save").click(function () {
    var pass = myCipher($("#user_password").val());
    $("#user_password").val(pass);

    let formBodyData = $("#formBodyData").serializeArray();

    var fd = new FormData();
    formBodyData.forEach((para) => {
      fd.append(para.name, para.value);
    });

    fd.append("file", $("#user_profile")[0].files[0]);

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
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "User already exist",
            footer: '<a href="">Why do I have this issue?</a>',
          });
        }
      },
    });
  });
  // function update(index) {
  //   $("#modalMain").modal("show");
  //   $("#modalMainLabel").html("Update teachers");
  //   $("#method").attr("name", "update");

  //   let models = dataArray[index];

  //   var img = dataArray[index]?.user_profile;

  //   models.user_profile = null;

  //   Object.keys(models).map((key) => {
  //     $(`[name='${key}']`).val(models[key]).attr("disabled", false);
  //   });

  //   $("#update_img").val(img);

  //   $("#btn-save").attr("id", "updateData");
  //   $("#updateData").attr("name", "update");

  // }
  function update(index) {
    $("#modalMain").modal("show");
    $("#modalMainLabel").html("Update User");
    $("#method").attr("name", "update");

    let models = dataArray[index];
    var img = dataArray[index]?.user_profile;
    var user_fname = dataArray[index]?.user_fname;

    if (img != "") {
      $("#image_preview").attr(
        "src",
        "../assets/images/users/" + user_fname + "/" + img
      );
    } else if (img == "") {
      $("#image_preview").attr("src", "assets/img/RCNHSLOGO.jpg");
    }

    models.user_profile = null;

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

    fd.append("file", $("#user_profile")[0].files[0]);

    console.log(fd);
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
            position: "top-start",
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
            text: "User already exist",
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
      data: { user_id: id, delete: "delete" },
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
    $("#modalMainLabel").html("View user");
    let models = dataArray[index];
    Object.keys(models).map((key) => {
      $(`[name='${key}']`).val(models[key]).attr("disabled", true);
    });
    $("#btn-save").hide();
  }
});
