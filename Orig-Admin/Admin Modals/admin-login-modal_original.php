<div class="modal fade" id="adminLogModal" tabindex="-1" role="dialog" aria-labelledby="adminModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modal-hf">
        <h5 class="modal-title" id="modalTitle">Admin Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
          </div>
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <span class="help-block"><?php echo $password_err; ?></span>
          </div>
          <div class="form-group">
            <div class="text-center">
              <input type="submit" class="btn-services" value="Login">
            </div>
          </div>
          <!-- <p>Don't have an account? <a href="admin_register.php">Sign up now</a>.</p> -->
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