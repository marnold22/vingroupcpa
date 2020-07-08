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
                    <div class="row">
                        <div class="col">
                            <!-- TITLE -->
                            <div class="form-group">
                                <label for="titleInput">Title</label>
                                <input type="text" class="form-control" name="title" id="titleInput" placeholder="Title" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <!-- Media -->
                            <div class="form-group">
                                <label for="mediaForm">Media</label>
                                <input type="file" class="form-control-file" id="mediaForm">
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <!-- CONTENT BODY -->
                            <div class="form-group">
                                <label for="NewsBody">Content</label>
                                <textarea class="form-control" name="content" id="contentInput" placeholder="Content Body Here..." rows="3" value=""></textarea>
                            </div>
                        </div>
                    </div>
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