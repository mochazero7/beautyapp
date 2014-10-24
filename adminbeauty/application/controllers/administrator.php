<?php

class Administrator extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->_is_logged_in();
		$this->load->model('modeladmin');
	}
	
	public function index(){
		redirect('administrator/tips');
	}
	
	//MODUL TIPS
	public function tips(){
		
		if($this->uri->segment(3)==""){
			$offset=0;
		}else{
			$offset=$this->uri->segment(3);
		}
		$limit = 15;
		$data['tips'] = $this->modeladmin->getAllTips($offset, $limit);
		$data['count'] = $this->modeladmin->getAllTips_count();
	
		$config = array();
		$config['base_url'] = base_url(). 'administrator/tips/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		
		$config['first_tag_open'] = '<li>';
		$config['first_link'] = 'First';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_link'] = 'Last';
		$config['last_tag_close'] = '</li>';
		$config['total_rows'] = $data['count'];
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));
		
		$data['judul'] = "Tips | Administrator";
 		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
		$this->load->view('admin/tips/tips', $data);
		$this->load->view('template/admin/footer');
	}
	
	public function tambah_tips(){
		$data['error'] = "";
		$data['judul'] = "Tambah Tips | Administrator";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
		$this->load->view('admin/tips/tambah_tips', $data);
		$this->load->view('template/admin/footer');
	}
	
	public function submit_tambah_tips(){
	$this->form_validation->set_rules('judul','Judul', 'required|xss_clean|max_length[255]|trim|strip_tags');
	$this->form_validation->set_rules('isi','Isi', 'required|xss_clean');
	if($this->form_validation->run() == TRUE){ 
		   
		  $config['upload_path'] = 'upload/tips/';
          $config['allowed_types'] = 'gif|jpeg|png|jpg';
          $config['max_size'] = 2000;
          $config['max_height'] = 2000;
          $config['max_width'] = 2000;
		  $config['encrypt_name'] = TRUE;
		  $this->upload->initialize($config);
			if ($this->upload->do_upload('gambar_tips')) {
				$dok = $this->upload->data();
				$this->_resize_tips($dok['file_name']);
				$this->_create_thumb_tips($dok['file_name']);
			$foto = $dok['file_name'];
			$input_judul= $this->input->post('judul');
			$input_isi= $this->input->post('isi');
			$input_video= $this->input->post('video');
			$ganti = array("'");
			$oleh = "&#039;";
			$judul = str_replace($ganti, $oleh, $input_judul);
			$url_title = url_title($judul);
			$isi = str_replace($ganti, $oleh, $input_isi);
			$video = str_replace($ganti, $oleh, $input_video);
			
			$this->modeladmin->inputTips($judul, $url_title, $isi, $video, $foto);
			
			$this->session->set_flashdata('info', "Tips berhasil ditambahkan.");
			redirect('administrator/tips');
			}else{
				$data['error'] = $this->upload->display_errors();
			}	
		} 
		$data['error'] = $this->upload->display_errors();
		$data['judul'] = "Tambah Tips | Administrator";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
		$this->load->view('admin/tips/tambah_tips', $data);
		$this->load->view('template/admin/footer');
	}
	
	public function edit_tips($id){
		$data['edit_tips'] = $this->modeladmin->getEditTips($id)->row();
		$data['judul'] = "Tambah Tips | Administrator";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
		$this->load->view('admin/tips/edit_tips', $data);
		$this->load->view('template/admin/footer');
	}
	
	public function submit_edit_tips(){
	$id = $this->input->post('id_tips');
	
	$this->form_validation->set_rules('judul','Judul', 'required|xss_clean|max_length[255]|trim|strip_tags');
	$this->form_validation->set_rules('isi','Isi', 'required|xss_clean');
	if($this->form_validation->run() == TRUE){ 
		   
		   $config['upload_path'] = 'upload/tips/';
           $config['allowed_types'] = 'gif|jpeg|png|jpg';
           $config['max_size'] = 2000;
           $config['max_height'] = 2000;
           $config['max_width'] = 2000;
		   $config['encrypt_name'] = TRUE;
		   $this->upload->initialize($config);
		   
			if ($this->upload->do_upload('gambar_tips')) {
			//unlink gambar
			$query = $this->modeladmin->getEditTips($id)->row();						
			if ($query->file_name != "" || $query->file_name != NULL ){
				if(file_exists('./upload/tips/' . $query->file_name) || file_exists('./upload/tips/thumb/'. $query->file_name)) {
					$do = unlink('./upload/tips/'. $query->file_name); //menghapus gambar semula di folder
					$do = unlink('./upload/tips/thumb/'. $query->file_name); //menghapus gambar semula di folder
				}
			} 
				$dok = $this->upload->data();
				$this->_resize_tips($dok['file_name']);
				$this->_create_thumb_tips($dok['file_name']);
				
			$foto = $dok['file_name'];
			
			$input_judul= $this->input->post('judul');
			$input_isi= $this->input->post('isi');
			$input_video= $this->input->post('video');
			$ganti = array("'");
			$oleh = "&#039;";
			
			$judul = str_replace($ganti, $oleh, $input_judul);
			$url_title = url_title($judul);
			$isi = str_replace($ganti, $oleh, $input_isi);
			$video = str_replace($ganti, $oleh, $input_video);
			
			$this->modeladmin->updateTipsFoto($id, $judul, $url_title, $isi, $video, $foto);
			
			$this->session->set_flashdata('info', "Tips berhasil diubah, gambar diubah.");
			redirect('administrator/tips');
			}else{
				$input_judul= $this->input->post('judul');
				$input_isi= $this->input->post('isi');
				$input_video= $this->input->post('video');
				$ganti = array("'");
				$oleh = "&#039;";
				
				$judul = str_replace($ganti, $oleh, $input_judul);
				$url_title = url_title($judul);
				$isi = str_replace($ganti, $oleh, $input_isi);
				$video = str_replace($ganti, $oleh, $input_video);
				
				$this->modeladmin->updateTipsTanpaFoto($id, $judul, $url_title, $isi, $video);
				
				$this->session->set_flashdata('info', "Tips berhasil diubah, gambar tidak diubah.");
				redirect('administrator/tips');
			}	
		}  
		$data['edit_tips'] = $this->modeladmin->getEditTips($id)->row();
		$data['judul'] = "Tambah Tips | Administrator";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
		$this->load->view('admin/tips/edit_tips', $data);
		$this->load->view('template/admin/footer');
	}
	
	public function hapus_tips($id){
		$query = $this->modeladmin->getEditTips($id)->row();						
			if ($query->file_name != "" || $query->file_name != NULL ){
				if(file_exists('./upload/tips/' . $query->file_name) || file_exists('./upload/tips/thumb/'. $query->file_name)) {
					$do = unlink('./upload/tips/'. $query->file_name); //menghapus gambar semula di folder
					$do = unlink('./upload/tips/thumb/'. $query->file_name); //menghapus gambar semula di folder
				}
			} 
		$this->modeladmin->hapus_tips($id);
		$this->session->set_flashdata('info', "Tips berhasil dihapus.");
		redirect('administrator/tips');
	}
	
	//END MODUL Tips
	
	//GANTI PASSWORD
	//MODUL GANTI PASSWORD
	function ganti_password(){
		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if ($this->tank_auth->change_password(
						$this->form_validation->set_value('old_password'),
						$this->form_validation->set_value('new_password'))) {	// success
					$this->_show_message($this->lang->line('auth_message_password_changed'));
				} else {														// fail
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			//$this->load->view('auth/change_password_form', $data);
			$data['judul'] = "Admin | Ganti Password";
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/nav');
			$this->load->view('admin/setting/ganti_password', $data);
			$this->load->view('template/admin/footer');
		}
	}
	//END GANTI PASSWORD
	
	//METHOD METHOD
	
	public function _resize_tips($fulpat) {
        $config['source_image'] = './upload/tips/' . $fulpat;
        $config['new_image'] = './upload/tips/' . $fulpat;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 900;
        $config['height'] = 600;
        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
    }
	
	public function _create_thumb_tips($fulpet) {
        $config['source_image'] = './upload/tips/' . $fulpet;
        $config['new_image'] = './upload/tips/thumb/' . $fulpet;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 200;
        //$config['height'] = 200;
        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()) {
            echo "tum" . $this->image_lib->display_errors();
        }
    }
	
	public function _resize_banner($fulpat) {
        $config['source_image'] = './upload/banner/' . $fulpat;
        $config['new_image'] = './upload/banner/' . $fulpat;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 900;
        $config['height'] = 600;
        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
    }
	
	public function _create_thumb_banner($fulpet) {
        $config['source_image'] = './upload/banner/' . $fulpet;
        $config['new_image'] = './upload/banner/thumb/' . $fulpet;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 200;
        //$config['height'] = 200;
        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()) {
            echo "tum" . $this->image_lib->display_errors();
        }
    }
	
	//SHOW MESSAGE TANK AUTH
	function _show_message($message){
		$this->session->set_flashdata('info', "Password admin berhasil diganti.");
		redirect('administrator/ganti_password');
	}
	 
	public function _is_logged_in(){
		if(!$this->tank_auth->is_logged_in()){
			redirect('auth/login');
		}
	}
	
	public function abus(){
		for($i = 1; $i<540; $i++){
			$this->db->query("INSERT INTO contact_us VALUE('', 'Jon Jen$i ', 'jon_jen_ini_email$i@test.com','iciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperi', NOW())");
		}
	}	
}