<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Login With Your Credentials</h5>
    </div>
    <div class="modal-body">
          <div class="container">
              <?php echo validation_errors(); ?>
              <form action="" method="POST">
                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Remamber Me
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                  </div>
                </div>
              </form>
          </div>
    </div>
    <div class="modal-footer">
      dipanjan@xgenmedia.com
    </div>
  </div>
</div>