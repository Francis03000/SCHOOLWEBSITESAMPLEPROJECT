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
        <form id="formBodyData">
            <input type="hidden" id="method" name="update">
            <input type="hidden" name="blog_id" id="blog_id">
            <div class="form-group">
                <label for="inputAddress">Title</label>
                <input type="text" class="form-control" id="title" name="title">
               
            </div>
            <div class="form-group">
          
                <label for="inputAddress">Date</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="inputAddress">CREATED BY</label>
                <input type="text" class="form-control" id="created_By" name="created_By">
               
            </div>
            <div class="form-group">
          
                <label for="inputAddress">Content</label>
                <textarea class="form-control" id="content" name="content"></textarea>
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