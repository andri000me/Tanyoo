
	<div data-role="content"> 
		<img src="<?php echo base_url()?>css/images/t2.png" />
		<div data-role="fieldcontain" class="ui-hide-label">
			<?php  $attributes = array( 'id' => 'soal'); // id = soal dipakai untuk validasi?>
			<?php echo form_open('soal/add',$attributes); ?>
				<div data-role="fieldcontain" id="bg">
					<input type="text" name="soal" placeholder="Soal" class="required" title="soal harus diisi" >
					<input type="text" placeholder="Jawaban" name="jawaban" class="required" title="jawaban harus diisi">
					<input type="text" placeholder="Tag" name="tag" class="required" title="tag harus diisi">
				
					<input type="Submit" value="post" data-inline="true"/>
				</div>
			</form>		
			<?php $i=1 ?>
			<?php foreach($data_soal as $t): //menampilkan hasil dari data_soal yang ada dicontroller ke dalam tabel?> 
			<div class="choice_list">		
			<ul data-role="listview" data-inset="true" data-theme="d">
				<li><h3><?php echo $t->text_soal ?> ?</h3>
				<p>#<?php echo $t->tag ?></p>
				<p><?php echo anchor('soal/ubah/'.$t->id_soal,'update',array('class'=>'update'));?>
				</li>
			<?php $i++; ?>
			<?php endforeach ?>					
			</ul>
			</div>			
			
			<input type="button" onClick="logout();" value="Logout"/>
		</div>
	</div>
	<div id="user-info"></div>

