$(document).ready(function () {
  let entity = "abouts";

  getAllData();

  function getAllData() {
    $.get({
      url: "js/" + entity + "/" + entity + "Crud.php",
      data: { getMission: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        $("#mission_text").html(newData[0].about_description);
      },
    });

    $.get({
      url: "js/" + entity + "/" + entity + "Crud.php",
      data: { getVission: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        $("#vission_text").html(newData[0].about_description);
      },
    });

    $.get({
      url: "js/" + entity + "/" + entity + "Crud.php",
      data: { getGoal: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);
        $("#goal_text").html(newData[0].about_description);
      },
    });
  }
});
