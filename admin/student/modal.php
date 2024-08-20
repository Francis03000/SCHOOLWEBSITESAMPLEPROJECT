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
        <form id="formBodyData">
          <input type="hidden" id="method" name="update">
          <input type="hidden" name="student_id" id="student_id">


          <div class="form-group">
            <label for="inputAddress">First Name</label>
            <input type="text" class="form-control" id="student_Fname" name="student_Fname">
          </div>

          <div class="form-group">
            <label for="inputAddress">Middle Name</label>
            <input type="text" class="form-control" id="student_Mname" name="student_Mname">
          </div>
          <div class="form-group">
            <label for="inputAddress">Last Name</label>
            <input type="text" class="form-control" id="student_Lname" name="student_Lname">
          </div>

          <div class="form-group">
            <label for="inputAddress">ADDRESS</label>
            <input type="text" class="form-control" id="student_Address" name="student_Address">
          </div>
          <div class="form-group">
            <label for="inputAddress">Section</label>
            <select id="student_section" name="student_section" class="form-control">
              <option>Select Section</option>
            </select>
          </div>

          <div class="form-group">
            <label for="inputAddress">LRN</label>
            <input type="number" class="form-control" id="student_LRN" name="student_LRN">
          </div>
          <div class="form-group">
            <label for="inputAddress">Student Email</label>
            <input type="email" class="form-control" id="student_email" name="student_email">
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