<div class="container">
		<div class="row">
			<div class="span12">
				<h1>Daftar Tips</h1><br />
				<div class="row">
					<!--sidebar menu -->
					<?php echo $this->load->view('template/admin/sidebar'); ?>
					<!--end sidebar menu -->
					<!-- table, content, etc -->
					<div class="span9">
						<div class=""><!-- basic tabs menu -->
						<?php if($this->session->flashdata('info')) { ?>
							<div class="alert alert-info">  
									<a class="close" data-dismiss="alert">x</a>  
									<strong>Info! </strong><?php echo $this->session->flashdata('info'); ?>  
							</div>
						<?php } ?>
							<ul class="nav nav-tabs">
								<li class="active"><a href="<?php echo base_url(); ?>administrator/tips/">Daftar Tips</a></li>
								<li><a href="<?php echo base_url(); ?>administrator/tambah_tips/">Tambah Tips</a></li>
							</ul>
						</div><!-- basic tabs menu -->
						<h5>Daftar Tips, diurutkan berdasarkan data dimutahirkan.</h5><br />
						<h5>Semua Tips berjumlah sebanyak: <?php echo $count; ?> record(s).</h5><br />
							<table class="table table-striped table-bordered"><!-- table default style -->
								<thead>
									<th>No</th>
									<th>Judul</th>
									<th>Isi</th>
									<th>Video</th>
									<th>Gambar</th>
									<th colspan="2">Aksi</th>
								</thead>
								<tr>
								<?php $no=1; 
									foreach($tips->result() as $row){ 
								?>
									<td><?php echo $this->session->userdata('row')+$no; ?></td>
									<td><?php echo ucwords($row->judul); ?></td>
									<td>
										<!--mulai div modal untuk tampilkan gambar penuh -->
										<div id="example1<?php echo $no;?>" class="modal hide fade in"  > 
											
										<div class="modal-header">  
											<a class="close" data-dismiss="modal">x</a>  
											<h4>Deksripsi Selengkapnya</h4>  
										</div>  
										<div class="modal-body">  
											<?php echo $row->isi; ?>
										</div>  
										<div class="modal-footer">    
											<a href="#" class="btn" data-dismiss="modal">Close</a>  
										</div> 
										</div>
										<!--end div modal untuk tampilkan gambar penuh -->
										<?php echo substr(($row->isi),0,50); ?>...     	
										<!-- panggil modal -->
										<p><a data-toggle="modal" href="#example1<?php echo $no;?>" class="btn btn-primary btn-small">Selengkapnya</a></p>  
										<!-- end panggil modal -->
									</td>
									<td>
										<?php echo ucwords($row->video); ?>
									</td>
									<td>
										<!--mulai div modal untuk tampilkan gambar penuh -->
										<div id="example<?php echo $no;?>" class="modal hide fade in"  > 
											
										<div class="modal-header">  
											<a class="close" data-dismiss="modal">x</a>  
											<h4>Gambar lebih besar</h4>  
										</div>  
										<div class="modal-body">  
											<img src="<?php echo base_url(); ?>upload/tips/<?php echo $row->file_name; ?>" alt="">          
										</div>  
										<div class="modal-footer">    
											<a href="#" class="btn" data-dismiss="modal">Close</a>  
										</div> 
										</div>
										<!--end div modal untuk tampilkan gambar penuh -->
										<a href="">
											<img  width="220px" src="<?php echo base_url(); ?>upload/tips/thumb/<?php echo $row->file_name; ?>" alt="">
										<!-- panggil modal -->
										<p><a data-toggle="modal" href="#example<?php echo $no;?>" class="btn btn-primary btn-small">Lebih besar</a></p>  
										<!-- end panggil modal -->
										</a>
									</td>
									<td border="0">
										<a title="Edit Tips" href="<?php echo base_url(); ?>administrator/edit_tips/<?php echo $row->id_tips; ?>">
											<i class="icon-edit"></i> Edit
										</a> | <a href="#" onClick="if(confirm('Anda yakin HAPUS data ini? ')){document.location='<?php echo base_url()?>administrator/hapus_tips/<?php echo $row->id_tips; ?>'}" title="Hapus Tips" >
											<i class="icon-trash"></i> Hapus
										</a>
									</td>
								</tr>
							<?php 
								$no++;
								} 
							?>
							</table><!-- table default style -->
							<div class="pagination">
								<ul>
									<?php echo $this->pagination->create_links(); ?>
								</ul>
							</div>
					</div>
					<!-- table, content, etc -->
				</div>
				<div class="row">
				</div>
			</div>
		</div>