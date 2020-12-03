<?= $this->session->flashdata('message'); ?> 
<section>
    <br>
    <br>
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Your Beautiful</p>
          <h2>My <span class="section-intro__style">Profil</span></h2>
        </div>
          
        <div class="row">
            <div class="card mb-5 col-lg-12">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" style="height: 400px;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name']; ?></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
                </div>
            </div>
        </div>
      </div>
    </section>
    <br><br><br><br><br>



