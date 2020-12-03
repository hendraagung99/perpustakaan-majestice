 <div class="container-fluid">

          <!-- Page Heading -->

<?php echo $this->session->flashdata('message');  ?>

            <br>
            <br>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-info">Data User</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
				<th>No</th>
				<th>Gambar</th>
				<th>Nama</th>
				<th>Email</th>
				<th>User Active</th>
				<th>User</th>
				<th>Tanggal</th>
				
			</tr>
                  </thead>
                   
                  
                  <tbody>
                     <?php
			$no = 1;
			foreach($user as $u){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><img src="<?php echo base_url().'/assets/img/profile/'.$u->image; ?>" width="80" height="80" alt="gambar tidak ada " ></td>
				<td><?php echo $u->name ?></td>
				<td><?php echo $u->email ?></td>
				<td>
					<?php 
					if($u->is_active == "1"){
						echo "<span class='badge badge-success'> Active </span>";
					}else if($u->is_active == "0"){
						echo "<span class='badge badge-danger'> Tidak Active</span>";
					}
					?>
				</td>
				<td>
					<?php 
					if($u->role_id == "1"){
						echo "<span class='badge badge-info'> Admin </span>";
					}else if($u->role_id == "2"){
						echo "<span class='badge badge-primary'> Member </span>";
					}
					?>
				
				</td>
				<td><?php echo $u->date_created ?></td>
		
			</tr>
<?php } ?> </tbody>
                 
                </table>
              </div>
            </div>
          </div>

        </div>


<!-- Button trigger modal -->
