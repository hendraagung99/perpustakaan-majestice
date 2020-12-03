<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-5">
					<div class="owl-carousel owl-theme s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-fluid" src="<?php echo base_url('asset/upload/' . $detail->gambar); ?>" alt="" style="width: 500px; height: 500px;">
						</div>
					</div>
				</div>
				<br>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?php echo $detail->judul_buku?></h3>
						<h2><?php echo $detail->penerbit?></h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Category</span> : Household</a></li>
							<li><a href="#"><span>Availibility</span> : <?php if($detail->status_buku==1){echo "Tersedia";} else{echo "Dipinjam";} ?></a></li>
						</ul>
						<p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for
							something that can make your interior look awesome, and at the same time give you the pleasant warm feeling
							during the winter.</p>
						<div class="product_count">
              <label for="qty">Jumlah Buku:</label>
              <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							 class="increase items-count" type="button"></button>
							<input type="text" name="qty" id="sst" size="2" maxlength="12" value="<?php echo $detail->jumlah_buku?>" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
               			class="reduced items-count" type="button"></button>&emsp;
							<a class="button primary-btn" href="#">Booking</a>               
						</div>
						<div class="text-left">
                              <a href="<?php echo base_url().'user/buku' ?>"  class="btn btn-primary">
                              <span class="icon text-white-50">
                               <i class="fas fa-arrow-circle-left"></i>
                              </span>&emsp;
                              <span class="text">Back</span>
                            </a>
                           
                          </div>
					</div>
				</div>
			</div>
		</div>
	</div>
<section class="product_description_area">
</section>