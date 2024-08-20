<?php include("layoutsWebsite/head.php"); ?>
<?php include("layoutsWebsite/header.php"); ?>
<?php include("layoutsWebsite/menu.php"); ?>


<style>
  .hidden {
    display: none;
  }

  .custom-card {
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: transform 0.2s ease-in-out;
    height: 15rem;
    cursor: pointer;
  }

  .custom-card:hover {
    transform: scale(1.05);
    transition: transform 0.3s ease-in-out;
    background-color: #FE9900;
  }

  .cat-card {
    background-size: cover;
    opacity: 0.8;
    height: 4rem;
    border: 2px solid #000;
    cursor: pointer;
  }

  /* CSS code */
  .cat-card.active {
    background-color: #FE9900;
  }

  .drop {
    cursor: pointer;
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

  /* TITLE */
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

<br>
<div class="container mt-5">
  <div class="row">
    <div class="jumbotron mx-auto">
      <h1 class="gallery" style="color: maroon;"><i class="fa fa-camera-retro"></i> School Gallery</h1>
    </div>
  </div>
</div>

<!-- <div class="container b-5">
  <div class="dropdown float-left">
    
    <select id="year_val" class="form-control drop">
      
    </select>
  </div>
</div> -->


<div class="container mt-5" id="sup_container">
  <div class="row" id="cat_container">

    <div class="col-md-3 mb-4">
      <div class="card cat-card" id="all_cat">
        <div class="card-body card-content">
          <h3 class="card-title text-center" style="color: black;">ALL</h3>
          <!-- <p class="card-text" style="color: black;">Click to See more Image.</p> -->
        </div>
      </div>
    </div>

  </div>
  <div class="row mt-3 " id="container_2">
  </div>

  <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h5 class="modal-title" id="imageModalLabel">Image Details</h5> -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img id="modalImage" class="img-fluid" src="" alt="Gallery Image">
        </div>
        <div class="modal-footer">
          <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  var cat_ids = {};
  $.get({
    url: "admin/categories/categoriesCrud.php",
    data: { getData: "getData" },
    success: function (data) {
      let newData = JSON.parse(data);

      newData.forEach((cat, i) => {



        let cat_container = $("#cat_container ");
        let sup_container = $("#sup_container ");
        let container_2 = $("#container_2 ");


        var cat_id = cat.category_id.toLowerCase();

        cat_container.append(
          '<div class="col-md-3 mb-4">' +
          '<div class="card cat-card" id=' + cat_id + '>' +
          '<div class="card-body card-content">' +
          '<h3 class="card-title text-center" style="color: black;">' + cat.category_name + '</h3>' +
          // '<p class="card-text" style="color: black;">Click to See more Image.</p>' +
          '</div >' +
          '</div >' +
          '</div >'
        );


        $('#' + cat_id).on('click', function () {
          $('.cat-card').removeClass('active');

          $(this).addClass('active');
        });





        $('#' + cat_id).click(function () {
          let tae = $(this).attr('id');
          $.get({
            url: "admin/galleries/galleriesCrud.php",
            data: { getDataCat: "getDataCat", gallery_category_id: tae },
            success: function (data) {
              let newData = JSON.parse(data);
              container_2.empty();

              newData.forEach((gal, i) => {
                var details_id = gal.gallery_id.toLowerCase() + "-details";
                container_2.append(
                  '<div class="col-md-3 mb-4 " id=' + details_id + '>' +
                  '<div class="card custom-card" data-image="' + gal.gallery_category_id + '/' + gal.gallery_image + '" style="background-image: url(\'assets/images/gallery/' + gal.gallery_category_id + '/' + gal.gallery_image + '\'); background-size: cover;">' +
                  '</div>' +
                  '</div>'
                );
              });
              $(".custom-card").click(function () {
                var image = $(this).data('image');
                const modalImage = document.getElementById('modalImage');
                modalImage.src = `assets/images/gallery/${image}`;
                $('#imageModal').modal('show');
              });

            }
          });
        });




      });
    },
  });


  var currentDate = new Date();
  var currentYear = currentDate.getFullYear();
  getAllGAlData(currentYear);

  function getAllGAlData() {



    $.get({
      url: "admin/galleries/galleriesCrud.php",
      data: { getData2: "getData2", cur_Year: currentYear },
      success: function (data) {
        let newData = JSON.parse(data);

        let container_2 = $("#container_2 ");
        container_2.empty();

        newData.forEach((gal, i) => {
          var details_id = gal.gallery_id.toLowerCase() + "-details";
          container_2.append(
            '<div class="col-md-3 mb-4 " id=' + details_id + '>' +
            '<div class="card custom-card" data-image="' + gal.gallery_category_id + '/' + gal.gallery_image + '" style="background-image: url(\'assets/images/gallery/' + gal.gallery_category_id + '/' + gal.gallery_image + '\'); background-size: cover;">' +
            '</div>' +
            '</div>'
          );
        });

        $(".custom-card").click(function () {
          var image = $(this).data('image');

          const modalImage = document.getElementById('modalImage');
          modalImage.src = `assets/images/gallery/${image}`;
          $('#imageModal').modal('show');
        });


      }
    });

  }


  var gal_year = currentYear;

  $("#all_cat").click(function () {

    $('.cat-card').removeClass('active');

    $(this).addClass('active');
    getAllGAlData();
  })



  $.get({
    url: "admin/galleries/galleriesCrud.php",
    data: { getDataGalYear: "getDataGalYear" },
    success: function (data) {
      let newData = JSON.parse(data);
      let opList = $("#year_val");
      $("<option>", {
        html: "Select Year",
      }).appendTo(opList);

      newData.forEach((gal, i) => {
        $("<option>", {
          value: gal.gallery_id,
          html: gal.distinct_years,
        }).appendTo(opList);
      });
    },
  });

  $("#year_val").change(function () {
    var year = $(this).val();
    gal_year = year;

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
<br><br><br>

<?php include("layoutsWebsite/footer.php"); ?>