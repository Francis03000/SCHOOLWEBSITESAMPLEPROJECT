<?php include("layouts/head.php"); ?>
<div class="wrapper ">
  <?php include("layouts/sidebar.php"); ?>
  <div class="main-panel">
    <!-- Navbar -->
    <?php include("layouts/navbar.php"); ?>
    <!-- End Navbar -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center text-dark">List of Teacher's Position</h1>
            <button type="submit" class="btn btn-success pull-left mx-4" id="create-new"><i class="fa fa-plus"></i>
              <div class="ripple-container"></div>
            </button>
            <div class="">
              <!-- <div class="card-header card-header-success">
                    <h4 class="card-title ">List of  Teacher Positions</h4>
                    <button type="submit" class="btn btn-success pull-right" id="create-new">Create New<div class="ripple-container"></div></button>
                  </div> -->
              <div class="card-body">
                <div class="table-responsive table-hover">
                  <table border="1" class="w-100 text-center">
                    <thead class="text-dark">
                      <th>
                        #
                      </th>
                      <th>
                        Teacher Positions
                      </th>

                      <th>
                        Actions
                      </th>
                    </thead>
                    <tbody id="rioMainTable" class="font-weight-bold"></tbody>
                  </table>
                  <?php include("teacher_positions/modal.php"); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include("layouts/foot1.php"); ?>
  </div>
</div>
<?php include("layouts/footer.php"); ?>
<script src="teacher_positions/index.js"></script>
<script>
  /* To Disable Inspect Element */
  $(document).bind("contextmenu", function (e) {
    e.preventDefault();
  });

  $(document).keydown(function (e) {
    if (e.which === 123) {
      return false;
    }
  });
  document.onkeydown = (e) => {

    if (e.key == 123) {

      e.preventDefault();

    }

    if (e.ctrlKey && e.shiftKey && e.key == 'I') {

      e.preventDefault();

    }

    if (e.ctrlKey && e.shiftKey && e.key == 'C') {

      e.preventDefault();

    }

    if (e.ctrlKey && e.shiftKey && e.key == 'j') {

      e.preventDefault();

    }

    if (e.ctrlKey && e.key == 'U') {

      e.preventDefault();
    }
  };
</script>