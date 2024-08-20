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
            <h1 class="text-center text-dark">List of Blog</h1>
            <button type="submit" class="btn btn-success pull-left mx-4" id="create-new">Create New<div
                class="ripple-container"></div></button>
            <div class="">
              <!-- <div class="card-header card-header-success">
                <h4 class="card-title ">List of Blog</h4>
                <button type="submit" class="btn btn-success pull-right" id="create-new">Create New<div
                    class="ripple-container"></div></button>
              </div> -->
              <div class="card-body">
                <div class="table-responsive table-secondary table-hover">
                  <table class="w-100 text-center">
                    <thead class="text-dark">
                      <th>
                        ID
                      </th>
                      <th>
                        TITLE
                      </th>
                      <th>
                        DATE
                      </th>
                      <th>
                        CREATED BY
                      </th>
                      <th>
                        CONTENT
                      </th>
                      <th>
                        Actions
                      </th>
                    </thead>
                    <tbody id="rioMainTable" class="font-weight-bold"></tbody>
                  </table>
                  <?php include("blog/modal.php"); ?>
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
<script src="blog/simplemde.min.js"></script>
<script src="blog/index.js"></script>