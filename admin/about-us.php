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
            <!-- <div class=""> -->
            <!-- <div class="card-header card-header-success">
                <h4 class="card-title ">List of About Us</h4>
              </div> -->
            <div class="card-body">
              <div class="card">
                <h4 class="card-header text-white" style="background-color: maroon;">Mission</h4>
                <!-- <img class="card-img-top" src="../assets/images/pic9.jpg" style="width:100%; height:200px;" rel="nofollow" alt="Card image cap"> -->
                <div class="card-body">
                  <div class="form-group">
                    <!-- <label for="exampleFormControlTextarea1">Mission Description</label> -->
                    <textarea class="form-control" style="color:white;" id="mission" name="mission_about"
                      rows="3"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-info" id="btn-save">Save changes</button>
                  </div>
                </div>
              </div>
              <div class="card">
                <h4 class="card-header text-white" style="background-color: maroon;">Vision</h4>
                <!-- <img class=" card-img-top" src="../assets/images/pic9.jpg" style="width:100%; height:200px;"
                  rel="nofollow" alt="Card image cap"> -->
                <div class="card-body">
                  <div class="form-group">
                    <!-- <label for="exampleFormControlTextarea1">Vision Description</label> -->
                    <textarea class="form-control" style="color:white;" id="vission" name="vission_about"
                      rows="3"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-info" id="btn-save2">Save changes</button>
                  </div>
                </div>
              </div>
              <div class="card">
                <h4 class="card-header text-white" style="background-color: maroon;">Goals</h4>
                <!-- <img class="card-img-top" src="../assets/images/pic9.jpg" style="width:100%; height:200px;" rel="nofollow" alt="Card image cap"> -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Goals Description</label>
                    <textarea class="form-control" style="color:white;" id="goal" name="goal" rows="3"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-info" id="btn-save3">Save changes</button>
                  </div>
                </div>
              </div>
              <!-- </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include("layouts/foot1.php"); ?>
  </div>
</div>
<?php include("layouts/footer.php"); ?>
<script src="abouts/index.js"></script>