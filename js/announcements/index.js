$(document).ready(function () {
  let entity = "categories";
  let entity1 = "announcements";

  getAllData();

  function getAllData() {
    $.get({
      url: "js/" + entity1 + "/" + entity + "Crud.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        let container = $("#category");
        newData.forEach((categories, i) => {
          container.append(
            "<ul>" +
              '<li><a href="#">' +
              categories.category_name +
              "</a></li> " +
              " </ul> "
          );
        });
      },
    });

    $.get({
      url: "js/" + entity1 + "/" + entity1 + "Crud.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        let container = $("#announcements");
        newData.forEach((announcements, i) => {
          container.append(
            "<br>" +
              "<br>" +
              '<img class="card-img-top" src="assets/images/announcement.gif">' +
              "<hr>" +
              '<div class="card-body">' +
              '<h3 class="card-title">' +
              announcements.announcement_title +
              "</h3>" +
              '<p class="card-text">' +
              announcements.announcement_description +
              "</p>" +
              "	</div>" +
              "</div>"
          );
        });
      },
    });
  }
});
