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
          <input type="hidden" name="department_id" id="department_id">
          <div class="form-group">
            <label for="inputAddress">Department Name</label>
            <input type="text" class="form-control" id="department_name" name="department_name">

          </div>
          <div class="form-group">

            <label for="inputAddress">Department Acronym</label>
            <input type="text" class="form-control" id="department_acronym" name="department_acronym">
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