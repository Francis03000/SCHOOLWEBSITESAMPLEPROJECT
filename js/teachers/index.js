$(document).ready(function () {
  let entity = "teachers";
  let entity1 = "strands";
  let entity2 = "announcements";

  getAllData();

  function getAllData() {
    $.get({
      url: "js/" + entity + "/" + entity + "Crud.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        let container = $("#principals");
        lazyLoadImages(container);
        newData.forEach((teachers, i) => {
          container.append(
            '<div class="col-lg-4 col-md-6 mx-auto">' +
              '<div class="teacher">' +
              ' <div class="teacher_image"><img style="height:200px; width:auto;" src="assets/images/teachers/' +
              teachers.teacher_fname +
              "/" +
              teachers.teacher_profile +
              '" onerror="this.src=' +
              "'assets/images/teachers.jpg'" +
              '"></div>' +
              '<div class="teacher_body text-center">' +
              ' <div class="teacher_title">' +
              teachers.teacher_fname +
              " " +
              teachers.teacher_lname +
              " <br> <span>" +
              teachers.teacher_position_name +
              "</span></div>" +
              "</div>" +
              " </div>" +
              " </div>"
          );
        });
      },
    });
  }

  $.get({
    url: "js/" + entity + "/" + entity + "Crud.php",
    data: { getData1: "getData1" },
    success: function (data) {
      let newData = JSON.parse(data);
      let container = $("#headteachers");
      lazyLoadImages(container);
      newData.forEach((teachers, i) => {
        container.append(
          '<div class="col-lg-4 col-md-6 mx-auto">' +
            '<div class="teacher">' +
            ' <div class="teacher_image"><img style="height:200px; width:auto;" src="assets/images/teachers/' +
            teachers.teacher_fname +
            "/" +
            teachers.teacher_profile +
            '" onerror="this.src=' +
            "'assets/images/teachers.jpg'" +
            '"></div>' +
            '<div class="teacher_body text-center">' +
            ' <div class="teacher_title">' +
            teachers.teacher_fname +
            " " +
            teachers.teacher_lname +
            " <br> <span>" +
            teachers.teacher_position_name +
            "</span></div>" +
            "</div>" +
            " </div>" +
            " </div>"
        );
      });
    },
  });

  $.get({
    url: "js/" + entity + "/" + entity + "Crud.php",
    data: { getData2: "getData2" },
    success: function (data) {
      let newData = JSON.parse(data);
      let container = $("#masterteachers");
      lazyLoadImages(container);
      newData.forEach((teachers, i) => {
        container.append(
          '<div class="col-lg-4 col-md-6">' +
            '<div class="teacher">' +
            ' <div class="teacher_image"><img style="height:200px; width:auto;" src="assets/images/teachers/' +
            teachers.teacher_fname +
            "/" +
            teachers.teacher_profile +
            '" onerror="this.src=' +
            "'assets/images/teachers.jpg'" +
            '"></div>' +
            '<div class="teacher_body text-center">' +
            ' <div class="teacher_title">' +
            teachers.teacher_fname +
            " " +
            teachers.teacher_lname +
            " <br> <span>" +
            teachers.teacher_position_name +
            "</span></div>" +
            "</div>" +
            " </div>" +
            " </div>"
        );
      });
    },
  });

  $.get({
    url: "js/" + entity + "/" + entity + "Crud.php",
    data: { getData3: "getData3" },
    success: function (data) {
      let newData = JSON.parse(data);
      let container = $("#teachers");
      lazyLoadImages(container);
      newData.forEach((teachers, i) => {
        container.append(
          '<div class="col-lg-4 col-md-6 mx-auto">' +
            '<div class="teacher">' +
            ' <div class="teacher_image"><img style="height:200px; width:auto;" src="assets/images/teachers/' +
            teachers.teacher_fname +
            "/" +
            teachers.teacher_profile +
            '" onerror="this.src=' +
            "'assets/images/teachers.jpg'" +
            '"></div>' +
            '<div class="teacher_body text-center">' +
            ' <div class="teacher_title">' +
            teachers.teacher_fname +
            " " +
            teachers.teacher_lname +
            " <br> <span>" +
            teachers.teacher_position_name +
            "</span></div>" +
            "</div>" +
            " </div>" +
            " </div>"
        );
      });
    },
  });
  $.get({
    url: "js/" + entity + "/" + entity + "Crud.php",
    data: { getData5: "getData5" },
    success: function (data) {
      let newData = JSON.parse(data);
      let container = $("#staff");
      lazyLoadImages(container);
      newData.forEach((teachers, i) => {
        container.append(
          '<div class="col-lg-4 col-md-6 mx-auto">' +
            '<div class="teacher">' +
            ' <div class="teacher_image"><img style="height:200px; width:auto;" src="assets/images/teachers/' +
            teachers.teacher_fname +
            "/" +
            teachers.teacher_profile +
            '" onerror="this.src=' +
            "'assets/images/teachers.jpg'" +
            '"></div>' +
            '<div class="teacher_body text-center">' +
            ' <div class="teacher_title">' +
            teachers.teacher_fname +
            " " +
            teachers.teacher_lname +
            " <br> <span>" +
            teachers.teacher_position_name +
            "</span></div>" +
            "</div>" +
            " </div>" +
            " </div>"
        );
      });
    },
  });
});
function lazyLoadImages(container) {
  const images = container.find("img[data-src]");

  const options = {
    root: null,
    rootMargin: "0px",
    threshold: 0.1,
  };

  const observer = new IntersectionObserver(function (entries, observer) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        const image = entry.target;
        image.src = image.getAttribute("data-src");
        observer.unobserve(image);
      }
    });
  }, options);

  images.each(function () {
    observer.observe(this);
  });
}
