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
            container.append("<h2>" + department.department_name + "</h2>");
          } else {
            container2.append("<h2>" + department.department_name + "</h2>");
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
              '<div class="col-lg-4 featured_col ">' +
                '<div class="featured_content" style="height: 240px; width: 350px;">' +
                '<div class="featured_title"><h3><a href="counter/sample1.php">' +
                strand.strand_name +
                "</a></h3><span><h4>(" +
                strand.strand_acronym +
                ")</h4></span></div><br>" +
                "</div>" +
                "</div>" +
                "<br><br>"
            );
          } else {
            container2.append(
              '<div class="col-lg-4 featured_col">' +
                '<div class="featured_content" style="height: 260px; width: 350px;">' +
                '<div class="featured_title"><h3><a href="counter/sample.php">' +
                strand.strand_name +
                "</a></h3><span><h4>(" +
                strand.strand_acronym +
                ")</h4></span></div>" +
                "</div>" +
                "</div>" +
                " <br><br>"
            );
          }
        });
      },
    });
  }
});
