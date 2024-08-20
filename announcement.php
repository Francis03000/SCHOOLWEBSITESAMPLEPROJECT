<?php include("layoutsWebsite/head.php"); ?>
<?php include("layoutsWebsite/header.php"); ?>
<?php include("layoutsWebsite/menu.php"); ?>


<style>
  .announcement-section {
    background-color: #f8f9fa;
    padding: 30px 0;
  }

  .announcement-section .container {
    position: relative;
  }

  .announcement-section .title {
    font-weight: bold;
    margin-bottom: 30px;
  }

  .announcement-section .card {
    margin-bottom: 30px;
    border: none;
  }

  .announcement-section .card-header {
    background-color: #fff;
    border-bottom: 1px solid #dee2e6;
    font-weight: bold;
  }

  .announcement-section .card-body {
    padding: 0;
  }

  .announcement-section .list-group-item {
    padding: 15px;
    border: none;
    background-color: #f8f9fa;
  }

  .news-section {
    padding: 30px 0;
  }

  .news-section .container {
    position: relative;
  }

  .news-section .title {
    font-weight: bold;
    margin-bottom: 30px;
  }

  .news-section .card {
    margin-bottom: 30px;
    border: none;
  }

  .news-section .card-header {
    background-color: #fff;
    border-bottom: 1px solid #dee2e6;
    font-weight: bold;
  }

  .news-section .card-body {
    padding: 0;
  }

  .news-section .list-group-item {
    padding: 15px;
    border: none;
    background-color: #f8f9fa;
  }

  @media (min-width: 768px) {
    .carousel-multi-item-2 .col-md-3 {
      float: left;
      width: 25%;
      max-width: 100%;
    }
  }

  .carousel-multi-item-2 .card img {
    border-radius: 2px;
  }

  .card {
    /* cursor: pointer; */
  }

  /* ANNOUNCEMENT */
  .custom-news-heading {
    position: relative;
  }

  .custom-news-heading::before,
  .custom-news-heading::after {
    content: "";
    position: absolute;
    top: 50%;
    width: 42%;
    height: 1px;
    background-color: maroon;
  }

  .custom-news-heading::before {
    left: 0;
    transform: translateY(-50%);
  }

  .custom-news-heading::after {
    right: 0;
    transform: translateY(-50%);
  }

  @media (max-width: 768px) {

    .custom-news-heading::before,
    .custom-news-heading::after {
      width: 30%;
    }
  }

  @media (max-width: 576px) {

    .custom-news-heading::before,
    .custom-news-heading::after {
      width: 30%;
    }
  }

  /* NEWS */

  .title {
    position: relative;
  }

  .title::before,
  .title::after {
    content: "";
    position: absolute;
    top: 50%;
    width: 33%;
    height: 1px;
    background-color: maroon;
  }

  .title::before {
    left: 0;
    transform: translateY(-50%);
  }

  .title::after {
    right: 0;
    transform: translateY(-50%);
  }

  @media (max-width: 768px) {

    .title::before,
    .title::after {
      width: 30%;
    }
  }

  @media (max-width: 576px) {

    .title::before,
    .title::after {
      width: 20%;
    }
  }

  /* HOME PAGE */

  #scrollTop {
    position: fixed;
    bottom: 20px;
    right: 20px;
    cursor: pointer;
    /* display: none; */
  }

  @media (max-width: 768px) {
    #scrollTop {
      display: none !important;
    }
  }
</style>

<i id="scrollTop" class="fa fa-arrow-up fa-3x" style="color: black;"></i>

<div class="home">
  <div class="home_background parallax_background parallax-window" data-parallax="scroll"
    data-image-src="assets/images/pic8.jpg" data-speed="0.8"></div>
  <div class="home_container">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="home_content text-center">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="news-section mt-5">
  <div class="container">
    <h2 class="title text-center" style="color: maroon;" id="announ">Announcements</h2>
    <div class="card">

      <div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2"
        data-ride="carousel">




        <div class="carousel-inner" role="listbox">

          <div class="form-group col-md-4 col-sm-6">
            <select class="form-control" name="announce_cat" id="announce_cat">
            </select>
          </div>





          <div class="carousel-item active" id="carousel-item">

          </div>

          <div id="articleModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog " role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <h2 id="articleTitle" class="text-center text-dark"></h2>
                  <img id="articleImage" src="" alt="Article Image" class="w-100">

                  <p id="articleText"></p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <br>

      <div class="container">
        <h2 class="mt-5 text-center mb-5 custom-news-heading" style="color: maroon;" id="news">News</h2>
        '<div class="row" id="news_contain"> </div>

      </div>

    </div>
  </div>
</div>



<!-- Pagination -->

</div>
</div>

<script>


  getNewsData();

  function getNewsData() {

    $.get({
      url: "admin/news/newsCrud.php",
      data: { getData: "getData" },
      success: function (data) {
        let newData = JSON.parse(data);

        newData.forEach((news, i) => {

          let news_contain = $("#news_contain");

          news_contain.append(


            '<div class="col-md-4">' +
            '<div class="card" style="border-bottom: 2px solid maroon;">' +
            '<img src=' + 'assets/images/news/' + news.news_category_id + '/' + news.news_image + ' class= "card-img-top" alt = "News 1" >' +
            '<div class="card-body" style="background-color: whitesmoke;"> ' +
            '<p class="card-text" style="color: black;">' + news.news_description + '</p > ' +
            '</div >' +
            '</div >' +
            '</div >'

          );


          // $("<img>", {
          //   class: "img-thumbnail",
          //   style: "height: 300px",
          //   src: `assets/images/announcements/${announcements.announcement_category_id}/${announcements.announcement_image}`,
          //   onerror: "this.onerror=null;this.src='assets/img/RCNHSLOGO.jpg';"
          // }).appendTo(car_item2);



        });
      },
    })

  }



  let entity = "announcements";

  getAlldata();

  function getAlldata() {

    $.get({
      url: "admin/announcements/announcementsCrud.php",
      data: { getDataAnnouncements: "getDataAnnouncements" },
      success: function (data) {
        let newData = JSON.parse(data);

        newData.forEach((announcements, i) => {

          let car_item = $("#carousel-item ");

          let car_item1 = $("<div>", {
            class: "col-md-3 mb-3",
            style: "cursor: pointer;"

          }).appendTo(car_item);

          let car_item2 = $("<div>", {
            class: "card",

          }).appendTo(car_item1);


          $("<img>", {
            class: "img-thumbnail",
            style: "height: 300px",
            src: `assets/images/announcements/${announcements.announcement_category_id}/${announcements.announcement_image}`,
            onerror: "this.onerror=null;this.src='assets/img/RCNHSLOGO.jpg';"
          }).appendTo(car_item2);


          car_item2.click(function () {


            var image = `assets/images/announcements/${announcements.announcement_category_id}/${announcements.announcement_image}`
            var title = announcements.announcement_title;
            var description = announcements.announcement_description;
            const articleImage = document.getElementById('articleImage');
            const articleTitle = document.getElementById('articleTitle');
            const articleText = document.getElementById('articleText');

            articleImage.src = image;
            articleTitle.innerText = title;
            articleText.innerText = description;

            $('#articleModal').modal('show');

          })



        });
      },
    })

  }

  // getAlldata2();

  // function getAlldata2() {
  //   $.get({
  //     url: "admin/announcements/announcementsCrud.php",
  //     data: { getData2: "getData2" },
  //     success: function (data) {
  //       let newData = JSON.parse(data);

  //       newData.forEach((announcements2, i) => {

  //         let car_item = $("#carousel-item2 ");

  //         let car_item1 = $("<div>", {
  //           class: "col-md-3 mb-3",

  //         }).appendTo(car_item);

  //         let car_item2 = $("<div>", {
  //           class: "card",

  //         }).appendTo(car_item1);


  //         $("<img>", {
  //           class: "img-thumbnail",
  //           style: "height: 300px;",
  //           src: `assets/images/announcements2/${announcements2.announcement_category_id}/${announcements2.announcement_image}`,
  //           onerror: "this.onerror=null;this.src='assets/img/RCNHSLOGO.jpg';"
  //         }).appendTo(car_item2);


  //         car_item2.click(function () {


  //           var image = `assets/images/announcements2/${announcements2.announcement_category_id}/${announcements2.announcement_image}`
  //           var title = announcements2.announcement_title;
  //           var description = announcements2.announcement_description;
  //           const articleImage = document.getElementById('articleImage');
  //           const articleTitle = document.getElementById('articleTitle');
  //           const articleText = document.getElementById('articleText');

  //           articleImage.src = image;
  //           articleTitle.innerText = title;
  //           articleText.innerText = description;

  //           $('#articleModal').modal('show');

  //         });






  //       });
  //     },
  //   })

  // }

  // $.get({
  //   url: "admin/categories/categoriesCrud.php",
  //   data: { getData: "getData" },
  //   success: function (data) {

  //     var options = "";
  //     let newData = JSON.parse(data);
  //     if (newData.length != 0) {
  //       options = '<option value="all">Select Announcement Category </option>';
  //       options += '<option value="all">All </option>';

  //       newData.forEach((categories, i) => {
  //         options +=
  //           '<option value="' +
  //           categories.category_id +
  //           '">' +
  //           categories.category_name +
  //           "</option>";
  //       });

  //     } else {
  //       options = '<option value="">No dates available</option>';

  //     }

  //     $("#announce_cat_history").html(options);

  //   },
  // });


  $("#announce_cat_history").change(function () {
    var selectedCat = $(this).val();

    if (selectedCat == "all") {
      $("#carousel-item2 ").empty();

      getAlldata2();

    } else {
      $("#carousel-item2 ").empty();


      $.get({
        url: "admin/announcements/announcementsCrud.php",
        data: { getDataCat: "getDataCat", announcement_category_id: selectedCat },
        success: function (data) {
          let newData = JSON.parse(data);

          newData.forEach((announcements, i) => {

            let car_item = $("#carousel-item2 ");

            let car_item1 = $("<div>", {
              class: "col-md-3 mb-3",

            }).appendTo(car_item);

            let car_item2 = $("<div>", {
              class: "card",

            }).appendTo(car_item1);


            $("<img>", {
              class: "img-thumbnail",
              src: `assets/images/announcements/${announcements.announcement_category_id}/${announcements.announcement_image}`,
              onerror: "this.onerror=null;this.src='assets/img/RCNHSLOGO.jpg';"
            }).appendTo(car_item2);


            car_item2.click(function () {


              var image = `assets/images/announcements/${announcements.announcement_category_id}/${announcements.announcement_image}`
              var title = announcements.announcement_title;
              var description = announcements.announcement_description;
              const articleImage = document.getElementById('articleImage');
              const articleTitle = document.getElementById('articleTitle');
              const articleText = document.getElementById('articleText');

              articleImage.src = image;
              articleTitle.innerText = title;
              articleText.innerText = description;

              $('#articleModal').modal('show');

            });






          });
        },
      })
    }



  })


  $.get({
    url: "admin/categories/categoriesCrud.php",
    data: { getData: "getData" },
    success: function (data) {

      var options = "";
      let newData = JSON.parse(data);
      if (newData.length != 0) {
        options = '<option value="all">Select Announcement Category </option>';
        options += '<option value="all">All </option>';

        newData.forEach((categories, i) => {
          options +=
            '<option value="' +
            categories.category_id +
            '">' +
            categories.category_name +
            "</option>";
        });

      } else {
        options = '<option value="">No dates available</option>';

      }

      $("#announce_cat").html(options);

    },
  });
  $("#announce_cat").change(function () {
    var selectedCat = $(this).val();

    if (selectedCat == "all") {
      $("#carousel-item").empty();

      getAlldata();

    } else {
      $("#carousel-item ").empty();


      $.get({
        url: "admin/announcements/announcementsCrud.php",
        data: { getDataCat: "getDataCat", announcement_category_id: selectedCat },
        success: function (data) {
          let newData = JSON.parse(data);

          newData.forEach((announcements, i) => {

            let car_item = $("#carousel-item ");

            let car_item1 = $("<div>", {
              class: "col-md-3 mb-3",

            }).appendTo(car_item);

            let car_item2 = $("<div>", {
              class: "card",

            }).appendTo(car_item1);


            $("<img>", {
              class: "img-thumbnail",
              style: "height: 300px; width: auto;",
              src: `assets/images/announcements/${announcements.announcement_category_id}/${announcements.announcement_image}`,
              onerror: "this.onerror=null;this.src='assets/img/RCNHSLOGO.jpg';"
            }).appendTo(car_item2);


            car_item2.click(function () {


              var image = `assets/images/announcements/${announcements.announcement_category_id}/${announcements.announcement_image}`
              var title = announcements.announcement_title;
              var description = announcements.announcement_description;
              const articleImage = document.getElementById('articleImage');
              const articleTitle = document.getElementById('articleTitle');
              const articleText = document.getElementById('articleText');

              articleImage.src = image;
              articleTitle.innerText = title;
              articleText.innerText = description;

              $('#articleModal').modal('show');

            });






          });
        },
      })
    }



  })
</script>
<script>
  $(document).ready(function () {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        $('#scrollTop').fadeIn();
      } else {
        $('#scrollTop').fadeOut();
      }
    });

    $('#scrollTop').click(function () {
      $('html, body').animate({ scrollTop: 0 }, 800);
      return false;
    });
  });
</script>
<script>
  /* To Disable Inspect Element */
  // $(document).bind("contextmenu", function (e) {
  //   e.preventDefault();
  // });

  // $(document).keydown(function (e) {
  //   if (e.which === 123) {
  //     return false;
  //   }
  // });
  // document.onkeydown = (e) => {

  //   if (e.key == 123) {

  //     e.preventDefault();

  //   }

  //   if (e.ctrlKey && e.shiftKey && e.key == 'I') {

  //     e.preventDefault();

  //   }

  //   if (e.ctrlKey && e.shiftKey && e.key == 'C') {

  //     e.preventDefault();

  //   }

  //   if (e.ctrlKey && e.shiftKey && e.key == 'j') {

  //     e.preventDefault();

  //   }

  //   if (e.ctrlKey && e.key == 'U') {

  //     e.preventDefault();
  //   }
  // };
</script>
<?php include("layoutsWebsite/footer.php"); ?>
<script src="js/announcements/index.js"></script>