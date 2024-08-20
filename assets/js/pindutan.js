$(document).ready(function () {
  inital();
  $("body").on("click", "#pindutan1", (e) => {
    localStorage.setItem("pindutanIndex", $(e.currentTarget).data("id"));
  });
  $("body").on("click", "#pindutan2", (e) => {
    localStorage.setItem("pindutanIndex", $(e.currentTarget).data("id"));
  });
  $("body").on("click", "#pindutan3", (e) => {
    localStorage.setItem("pindutanIndex", $(e.currentTarget).data("id"));
  });
  $("body").on("click", "#pindutan4", (e) => {
    localStorage.setItem("pindutanIndex", $(e.currentTarget).data("id"));
  });
  $("body").on("click", "#pindutan5", (e) => {
    localStorage.setItem("pindutanIndex", $(e.currentTarget).data("id"));
  });
  $("body").on("click", "#pindutan6", (e) => {
    localStorage.setItem("pindutanIndex", $(e.currentTarget).data("id"));
  });

  function inital() {
    let index = localStorage.getItem("pindutanIndex");
    if (index == 0) {
      $("#pindutan1").addClass("active");
    } else if (index == 1) {
      $("#pindutan2").addClass("active");
    } else if (index == 2) {
      $("#pindutan3").addClass("active");
    } else if (index == 3) {
      $("#pindutan4").addClass("active");
    } else if (index == 4) {
      $("#pindutan5").addClass("active");
    } else if (index == 5) {
      $("#pindutan6").addClass("active");
    }
  }
});
