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
            <input type="hidden" name="schoolyear_id" id="schoolyear_id">
            <div class="form-group">
                <label for="inputAddress">School Year From</label>
                <input type="text" class="form-control" id="schoolyear_from" name="schoolyear_from">
               
            </div>
            <div class="form-group">
          
                <label for="inputAddress">School Year To</label>
                <input type="text" class="form-control" id="schoolyear_to" name="schoolyear_to">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" name="addNew" class="btn btn-primary" id="btn-save">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>