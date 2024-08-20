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
          <input type="hidden" name="students_grades_id" id="students_grades_id">
          <div class="form-group">
            <label for="inputAddress">Section</label>

            <select id="section" name="section" class="form-control">
              <option>Select Grade and Section</option>
            </select>
          </div>
          <div class="form-group">
            <label for="inputAddress">Students</label>
            <select id="student" name="student" class="form-control">
              <option>Select Student</option>
            </select>
          </div>
          <div class="form-group">
            <label for="inputAddress">Grading</label>
            <select id="grading" name="grading" class="form-control">
              <option>Select Grading</option>
              <option value="1st Grading">1st Grading</option>
              <option value="2nd Grading">2nd Grading</option>
              <option value="3rd Grading">3rd Grading</option>
              <option value="4th Grading">4th Grading</option>

            </select>
          </div>

          <div class="form-group">
            <label for="inputAddress">School Year</label>
            <select id="year" name="year" class="form-control">
              <option>Select School Year</option>
            </select>
          </div>
          <div class="input-group">
            <label for="grades" class="input-group" style="cursor: pointer;">
              <i class="fa fa-camera" aria-hidden="true">Choose Image</i>
            </label>
            <div class=" img-fluid border border-secondary rounded-circle"
              style="width: 150px; height: 150px; overflow: hidden;">
              <img src="../assets/images/default.jpg" id="image_preview" alt="Selected Image" class="img-fluid"
                style="width: 100%; height: 100%;">
            </div>
            <input type="file" id="grades" name="image" accept="image/*" style="display: none;">
            <input type="hidden" id="update_img" name="update_img">
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