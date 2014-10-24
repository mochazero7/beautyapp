<div class="container">
		<div class="row">
			<div class="span12">
				<h1>Edit Tips</h1><br />
				<div class="row">
				<!--sidebar menu -->
					<?php echo $this->load->view('template/admin/sidebar'); ?>
					<!--end sidebar menu -->	
					<!-- form, content, etc -->
					<div class="span9">
						<div class=""><!-- basic tabs menu -->
							<ul class="nav nav-tabs">
								<li ><a href="<?php echo base_url(); ?>administrator/tips/">Daftar Tips</a></li>
								<li><a href="<?php echo base_url(); ?>administrator/tambah_tips/">Tambah Tips</a></li>
								<li class="active"><a href="<?php echo base_url(); ?>administrator/edit_tips/<?php echo $edit_tips->id_tips; ?>">Edit Tips</a></li>
							</ul>
						</div><!-- basic tabs menu -->
						
						<div class="well"><!-- div well & form -->
							<form class="form-horizontal" action="<?php echo base_url(); ?>administrator/submit_edit_tips" method="POST" enctype="multipart/form-data">
							<fieldset>
							<?php if(form_error('judul') == FALSE){ ?>
									<div class="control-group"><!-- default input text -->
							<?php }else{ ?>
									<div class="control-group warning"><!-- warning -->
							<?php } ?>
								<label class="control-label" for="input01">Nama Produk</label>
								<div class="controls">
								<input placeholder="Judul" name="judul" type="text" class="input" id="input01" value="<?php echo $edit_tips->judul; ?>">
								<input name="id_tips" type="hidden" value="<?php echo $edit_tips->id_tips; ?>">
								<span class="help-inline"><?php echo form_error('judul'); ?></span>
								</div>
								</div><!-- default input text -->
							<?php if(form_error('isi') == FALSE) { ?>
								<div class="control-group"><!-- default input text -->
							<?php }else{ ?>
								<div class="control-group warning"><!-- warning -->
							<?php } ?>
									<label class="control-label" for="input02">Isi</label>
									<div class="controls">
										<!-- start ini untuk wysi rich text editor -->
										<textarea name="isi" style="width: 440px; height:340px;" cols="20" id="some-textarea"><?php echo $edit_tips->isi; ?></textarea>
										<!-- end ini untuk wysi rich text editor -->	
										<span class="help-inline"><?php echo form_error('isi'); ?></span>
									</div>
								</div><!-- default input text -->
								<?php if(form_error('isi') == FALSE) { ?>
								<div class="control-group"><!-- default input text -->
							<?php }else{ ?>
								<div class="control-group warning"><!-- warning -->
							<?php } ?>
									<label class="control-label" for="input02">Embed Video</label>
									<div class="controls">
										<!-- start ini untuk wysi rich text editor -->
										<textarea name="video" style="width: 440px; height:140px;" cols="20" id="some-textarea"><?php echo $edit_tips->video; ?></textarea>
										<!-- end ini untuk wysi rich text editor -->	
										<span class="help-inline"><?php echo form_error('video'); ?></span>
									</div>
								</div><!-- default input text -->
								
								<div class="control-group"><!-- default input text -->
									<label class="control-label" for="gambar_sebelumnya">Gambar Sebelumnya</label>
									<div class="controls">
										<input type="image" style="width: 440px;" src="<?php echo base_url(); ?>upload/tips/thumb/<?php echo $edit_tips->file_name; ?>" alt="">
									</div>
								</div>
								<div class="control-group"><!-- default input text -->
									<label class="control-label" for="input01">Gambar Tips</label>
									<div class="controls">
									<div class="alert alert-info">  
										<a class="close" data-dismiss="alert">x</a>  
										<strong>Info! </strong><br/>
										Gambar optimal pada resolusi 800x400 px<br/>
										Ukuran Maksimum file 1 MB, (disarankan ukuran dibawah 100kb)<br/>
										File yang diizinkan untuk upload .jpg, .jpeg, .png, .gif
									</div>
										<input type="file" class="input" id="input01" name="gambar_tips">
										(Kosongkan jika tidak ingin mengganti gambar.)
									</div>
								</div><!-- default input text -->
							</fieldset>
								<div class="form-actions"><!-- button action -->
									<button type="submit" class="btn btn-primary">Simpan</button>
									<button class="btn">Batal</button>
								</div>
							</form>
						</div><!-- div without well class & form -->
						
					</div>
					<!-- form, content, etc -->
				</div>
			</div>
		</div>