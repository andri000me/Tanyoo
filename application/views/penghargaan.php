
	<div data-role="content"> 
		
		<p class="text">-------<i>penghargaan</i>------</p>
		
		<p class="text"></p> <!--- tampilkan nama user -->
		<center>
		<img src="<?php echo base_url()?>css/images/penghargaan.png" width="60px" height="60px">
		</center>
		<div data-role="fieldcontain" class="ui-hide-label">
		<?php 	if($nama_penghargaan!=false){		
					foreach($nama_penghargaan as $row):
					echo $row->nm_penghargaan;
					echo "<hr/>";
					endforeach;
				}
				else
				
				echo "<div class='ui-body ui-body-a ui-corner-all'><p style='text-align:center;'>Anda Belum Mempunyai Penghargaan</p></div>";
		?>
						
		</div>
	</div>
	<div id="user-info"></div>

