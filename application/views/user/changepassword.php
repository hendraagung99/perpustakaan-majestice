<?= $this->session->flashdata('message'); ?> 
<section>
    <br>
    <br>
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Your Beautiful</p>
          <h2>Change <span class="section-intro__style">Password</span></h2>
        </div>
          
        <div class="row">
        <div class="col-md-2 col-lg-12 col-xl-12">
           <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('user/changepassword'); ?>" method="post">
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password1">New Password</label>
                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password2">Repeat Password</label>
                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>

            </div>
        </div>
      </div>

    </section>
    <br>
    <br>



