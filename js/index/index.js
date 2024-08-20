$(document).ready(function () {
  let entity = "departments";
  let entity1 = "strands";
  let entity2 = "announcements";

  getAllData();

  function getAllData() {
    $.get({
      url: "js/" + entity + "/" + entity + "Crud.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        let container = $("#department_container");
        let container2 = $("#department_container2");
        newData.forEach((department, i) => {
          if (department.department_id == 1) {
            container.append(
              '<div class="col-lg-6 featured_col">' +
                '<div class="featured_content">' +
                '<div class="featured_title"><h3><a href="courses.html">' +
                department.department_name +
                "</a></h3></div>" +
                "</div>" +
                "</div>" +
                '<div class="col-lg-6 featured_col">' +
                '<div class="featured_background" style="background-image:url(assets/images/pic15.jpg);"></div>' +
                "</div> <br>"
            );
          } else {
            container2.append(
              '<div class="col-lg-6 featured_col">' +
                '<div class="featured_content">' +
                '<div class="featured_title"><h3><a href="courses.html">' +
                department.department_name +
                "</a></h3></div>" +
                "</div>" +
                "</div>" +
                '<div class="col-lg-6 featured_col">' +
                '<div class="featured_background" style="background-image:url(assets/images/pic19.jpg)"></div>' +
                "</div> <br>"
            );
          }
        });
      },
    });

    $.get({
      url: "js/" + entity + "/" + entity1 + "Crud.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        let container = $("#strands_container");
        let container2 = $("#strands_container2");
        newData.forEach((strand, i) => {
          if (strand.strand_department_id == 1) {
            container.append(
              ' <ul style="padding:2px; text-align:center;text-decoration: none;display: background-color 0.3s ease;">' +
                strand.strand_name +
                "</ul>"
            );
          } else {
            container2.append(
              ' <ul style="text-align:center;padding:2px; text-decoration: none;display: background-color 0.3s ease;">' +
                strand.strand_name +
                "</ul>"
            );
          }
        });
      },
    });
  }
});
