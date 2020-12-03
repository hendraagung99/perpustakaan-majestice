 <?php
			$no = 1;
			foreach($user as $u){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				
				<td><?php echo $u->email_user ?></td>
				
				
		
			</tr>
<?php } ?>