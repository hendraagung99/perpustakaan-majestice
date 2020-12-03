<?= $this->session->flashdata('message'); ?> 
<?= $this->session->flashdata('pesan'); ?> 
<section>
    <br>
    <br>
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Popular Item in the market</p>
          <h2>Trending <span class="section-intro__style">Book</span></h2>
        </div>
          
        <div class="row">
            <?php foreach ($buku as $b) { ?> 
          <div class="col-md-2 col-lg-4 col-xl-3">
            <div class="card text-center card-product">
              <div class="card-product__img">
                <img class="card-img" src="<?php echo base_url(); ?>asset/upload/<?= $b->gambar; ?>" alt="" style="max-width:100%; max-height: 100%; height: 250px; width: 200px">
                <ul class="card-product__imgOverlay">
                  <li><a href="<?php echo base_url(). 'user/detail/' .$b->id_buku; ?>"><button><i class="ti-search"></i></button></a></li>
                  <li><a href="<?php echo base_url(). 'booking/tambahBooking/' .$b->id_buku; ?>"><button><i class="ti-shopping-cart"></i></button></li>
                  <li><button><i class="ti-heart"></i></button></li>
                </ul>
              </div>
              <div class="card-body">
                <p><?= $b->judul_buku; ?></p>
                <h4 class="card-product__title"><a href="#"><?= $b->penerbit; ?></a></h4>
                <p class="card-product__price"><?= $b->thn_terbit; ?></p>
              </div>
            </div>
          </div><?php } ?> 
        </div>
      </div>
    </section>

    