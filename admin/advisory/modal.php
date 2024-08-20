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
          <input type="hidden" name="advisory_id" id="advisory_id">
          <div class="form-group">
            <label for="inputState">Strand</label>
            <select id="strand_acronym_id" name="strand_acronym_id" class="form-control">
              <option>Select Strand</option>
            </select>
          </div>
          <div class="form-group">
            <label for="inputAddress">Section Name</label>
            <input type="text" class="form-control" id="section_name" name="section_name">
          </div>
          <div class="form-group">
            <label for="inputAddress">Adviser Name</label>
            <select id="adviser_name" name="adviser_name" class="form-control">
              <option>Select Teacher</option>
            </select>

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