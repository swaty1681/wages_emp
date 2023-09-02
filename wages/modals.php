<div class="modal fade" id="add-new-post-modal" tabindex="-1" role="dialog" aria-labelledby="add-new-post-modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Post Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
          <div class="form-group">
            <label for="new-post-type-input">Name</label>
            <input type="text" style="text-transform: capitalize;" class="form-control" id="new-post-type-input" placeholder="Post Type" autofocus required>
          </div>
          <div class="form-group">
            <label for="new-post-mw-input">Post Minimum Wages As per Govt.</label>
            <input type="number" class="form-control" id="new-post-mw-input" placeholder="Post Minimum Wages As per Govt." required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="new-post-modal-close">Close</button>
        <button type="submit" class="btn btn-primary" onclick="add_new_post_type()">Update</button>
      </div>
    </div>
  </div>
</div>