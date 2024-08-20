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
          <input type="hidden" name="strand_id" id="strand_id">
          <div class="form-group">
            <label for="inputState">Department</label>
            <select id="strand_department_id" name="strand_department_id" class="form-control">
              <option>Select Department</option>
            </select>
          </div>
          <div class="form-group">
            <label for="inputAddress">Strand Name</label>
            <input type="text" class="form-control" id="strand_name" name="strand_name">
          </div>
          <div class="form-group">
            <label for="inputAddress">Strand Acronym</label>
            <input type="text" class="form-control" id="strand_acronym" name="strand_acronym">
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