$(document).ready(function () {
  inital();
  $("body").on("click", "#pindutanAdmin1", (e) => {
    localStorage.setItem("pindutanIndexAdmin", $(e.currentTarget).data("id"));
  });
  $("body").on("click", "#pindutanAdmin2", (e) => {
    localStorage.setItem("pindutanIndexAdmin", $(e.currentTarget).data("id"));
  });
  $("body").on("click", "#pindutanAdmin3", (e) => {
    localStorage.setItem("pindutanIndexAdmin", $(e.currentTarget).data("id"));
  });
  $("body").on("click", "#pindutanAdmin4", (e) => {
    localStorage.setItem("pindutanIndexAdmin", $(e.currentTarget).data("id"));
  });
  $("body").on("click", "#pindutanAdmin5", (e) => {
    localStorage.setItem("pindutanIndexAdmin", $(e.currentTarget).data("id"));
  });
  $("body").on("click", "#pindutanAdmin6", (e) => {
    localStorage.setItem("pindutanIndexAdmin", $(e.currentTarget).data("id"));
  });
  $("body").on("click", "#pindutanAdmin7", (e) => {
    localStorage.setItem("pindutanIndexAdmin", $(e.currentTarget).data("id"));
  });
  $("body").on("click", "#pindutanAdmin8", (e) => {
    localStorage.setItem("pindutanIndexAdmin", $(e.currentTarget).data("id"));
  });
  $("body").on("click", "#pindutanAdmin9", (e) => {
    localStorage.setItem("pindutanIndexAdmin", $(e.currentTarget).data("id"));
  });
  $("body").on("click", "#pindutanAdmin10", (e) => {
    localStorage.setItem("pindutanIndexAdmin", $(e.currentTarget).data("id"));
  });
  $("body").on("click", "#pindutanAdmin11", (e) => {
    localStorage.setItem("pindutanIndexAdmin", $(e.currentTarget).data("id"));
  });
  $("body").on("click", "#pindutanAdmin12", (e) => {
    localStorage.setItem("pindutanIndexAdmin", $(e.currentTarget).data("id"));
  });
  $("body").on("click", "#pindutanAdmin13", (e) => {
    localStorage.setItem("pindutanIndexAdmin", $(e.currentTarget).data("id"));
  });
  $("body").on("click", "#pindutanAdmin14", (e) => {
    localStorage.setItem("pindutanIndexAdmin", $(e.currentTarget).data("id"));
  });

  function inital() {
    let indexs = localStorage.getItem("pindutanIndexAdmin");
    for (let index = 1; index < 15; index++) {
      if (index == indexs) {
        $(`#pindutanAdmin${index}`).addClass("active");
      }
    }
  }
});
