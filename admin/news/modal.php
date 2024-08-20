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
          <input type="hidden" name="news_id" id="news_id">
          <div class="form-group">
            <label for="inputAddress">NEWS CATEGORY</label>
            <select id="news_category_id" name="news_category_id" class="form-control">
              <option>Select Category</option>
            </select>
          </div>
          <div class="">
            <div class=" img-fluid border border-secondary rounded-circle"
              style="width: 150px; height: 150px; overflow: hidden;">
              <img src="../assets/images/default.jpg" id="image_preview" alt="Selected Image" class="img-fluid"
                style="width: 100%; height: 100%;">
            </div>
            <div class="input-group">
              <label for="news_image" class="input-group-addon mx-4" style="cursor: pointer;">
                <i class="fa fa-camera" aria-hidden="true">Choose Image</i>
              </label>
              <input type="file" id="news_image" name="image" accept="image/*" style="display: none;">
              <input type="hidden" id="update_img" name="update_img">


            </div>


          </div>


          <div class="form-group">
            <label for="inputAddress">NEWS TITLE</label>
            <input type="text" class="form-control" id="news_title" name="news_title">
          </div>
          <div class="form-group">
            <label for="inputAddress">NEWS DESCRIPTION</label>
            <!-- <textarea class="form-control"name="news_description" id="news_description" cols="30" rows="10"></textarea> -->
            <input type="text" class="form-control" id="news_description" name="news_description">
          </div>

          <div class="form-group">
            <label for="inputAddress">ANNOUNCEMENT HEADLINE</label>
            <select id="headline" name="headline" class="form-control">
              <option>Headline?</option>
              <option value="yes">This is headline</option>
              <option value="no">This is not a headline </option>

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