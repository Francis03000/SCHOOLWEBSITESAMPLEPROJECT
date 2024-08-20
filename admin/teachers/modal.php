<div class="modal fade" id="modalMain" tabindex="-1" role="dialog" aria-labelledby="modalMainLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
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
          <input type="hidden" name="teacher_id" id="teacher_id">
          <div class="group">
            <div class=" img-fluid border border-secondary rounded-circle"
              style="width: 150px; height: 150px; overflow: hidden;">
              <img src="../assets/images/default.jpg" id="image_preview" alt="Selected Image" class="img-fluid"
                style="width: 100%; height: 100%;">
            </div>
            <div class="input-group">
              <label for="teacher_profile" class="input-group-addon mx-4" style="cursor: pointer;">
                <i class="fa fa-camera" aria-hidden="true">Choose Image</i>
              </label>
              <input type="file" id="teacher_profile" name="teacher_profile" accept="image/*" style="display: none;">
              <input type="hidden" id="update_img" name="update_img">


            </div>


          </div>
          <div class="">
            <label for="inputAddress">Position</label>
            <select id="teacher_pos_id" name="teacher_pos_id" class="form-control">
              <option>Select Teacher Position</option>
            </select>
          </div>

          <div class="">
            <label for="inputAddress">First Name</label>
            <input type="text" class="form-control" id="teacher_fname" name="teacher_fname">
          </div>
          <div class="">
            <label for="inputAddress">Middle Name</label>
            <input type="text" class="form-control" id="teacher_mname" name="teacher_mname">
          </div>
          <div class="">
            <label for="inputAddress">Last Name</label>
            <input type="text" class="form-control" id="teacher_lname" name="teacher_lname">
          </div>
          <div class="">
            <label for="inputAddress">User Name</label>
            <input type="text" class="form-control" id="teacher_userName" name="teacher_userName">
          </div>
          <div class="">
            <label for="inputAddress">EMAIL</label>
            <input type="text" class="form-control" id="teacher_Email" name="teacher_Email">
          </div>
          <div class="">
            <label for="inputAddress">PASSWORD</label>
            <input type="password" class="form-control" id="teacher_password" name="teacher_password">
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