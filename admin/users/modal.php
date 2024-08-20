<div class="modal fade" id="modalMain" tabindex="-1" role="dialog" aria-labelledby="modalMainLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalMainLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formBodyData" enctype="multipart/form-data">
          <input type="hidden" id="method" name="update">
          <input type="hidden" name="user_id" id="user_id">
          <div class="">
            <label for="inputState">Permission</label>
            <select id="user_permission_id" name="user_permission_id" class="form-control">
              <option>Select Permission</option>
            </select>
            <div class="group">
              <div class="border border-secondary rounded-circle"
                style="width: 150px; height: 150px; overflow: hidden;">
                <img src="../assets/images/default.jpg" id="image_preview" alt="Default Profile Icon" class="img-fluid"
                  style="width: 100%; height: 100%;">
              </div>

              <div class="input-group">
                <label for="user_profile" class="input-group-addon mx-4" style="cursor: pointer;">
                  <i class="fa fa-camera" aria-hidden="true">Choose Image</i>
                </label>
                <input type="file" id="user_profile" name="user_profile" accept="image/*" style="display: none;">
                <input type="hidden" id="update_img" name="update_img">


              </div>


            </div>
            <div class="form-group">
              <label for="inputAddress">First Name</label>
              <input type="text" class="form-control" id="user_fname" name="user_fname">
            </div>
            <div class="form-group">
              <label for="inputAddress">Middle Name</label>
              <input type="text" class="form-control" id="user_mname" name="user_mname">
            </div>
            <div class="form-group">
              <label for="inputAddress">Last Name</label>
              <input type="text" class="form-control" id="user_lname" name="user_lname">
            </div>
            <div class="form-group">
              <label for="inputAddress">DATE OF BIRTH</label>
              <input type="date" class="form-control" id="user_DOB" name="user_DOB">
            </div>
            <div class="form-group">
              <label for="inputAddress">ADDRESS</label>
              <input type="text" class="form-control" id="user_address" name="user_address">
            </div>
            <div class="form-group">
              <label for="inputAddress">CONTACT</label>
              <input type="number" class="form-control" id="user_contact" name="user_contact">
            </div>
            <div class="form-group">
              <label for="inputAddress">USERNAME</label>
              <input type="text" class="form-control" id="user_username" name="user_username">
            </div>
            <div class="form-group">
              <label for="inputAddress">EMAIL</label>
              <input type="email" class="form-control" id="user_email" name="user_email">
            </div>

            <div class="form-group">
              <label for="inputAddress">password</label>
              <input type="password" class="form-control" id="user_password" name="user_password">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="button" name="addNew" class="btn btn-info" id="btn-save">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>