<div class="modal fade" id="adminNewsModal" tabindex="-1" role="dialog" aria-labelledby="adminModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modal-hf">
        <h5 class="modal-title" id="modalTitle">Create a News Posting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

          

          <!-- Submit Buttons -->
          <div class="form-group">
            <div class="text-center">
              <input type="submit" class="btn-services" value="Submit">
              <input type="reset" class="btn-services" value="Reset">
            </div>
          </div>
        </form>
      </div>

      <div class="modal-footer modal-hf">
      </div>
    </div>
  </div>
</div>

<!-- Prevent resubmissoin of form on page refresh -->
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>