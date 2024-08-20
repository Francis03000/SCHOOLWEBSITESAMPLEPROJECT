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
            <h1 class="text-center text-dark">List of Office</h1>
            <button type="submit" class="btn btn-success pull-left mx-4" id="create-new"><i class="fa fa-plus"></i>
              <div class="ripple-container"></div>
            </button>
            <div class="">
              <!-- <div class="card-header card-header-success">
                    <h4 class="card-title ">List of Offices</h4>
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
                        Office Name
                      </th>

                      <th>
                        Actions
                      </th>
                    </thead>
                    <tbody id="rioMainTable" class="font-weight-bold"></tbody>
                  </table>
                  <?php include("offices/modal.php"); ?>
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
<script src="offices/index.js"></script>