<?php 

class Modeladmin extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	//QUERY PRODUK
	public function getAllTips($offset, $limit){
		$query = $this->db->query("
			SELECT p.id as id_tips, p.judul, p.url_title, p.isi, p.video, p.file_name, p.created_at
			FROM t_tips as p
			ORDER BY created_at DESC 
			LIMIT $offset, $limit
		");
		return $query;
	}
	
	public function getAllTips_count(){
		$query = $this->db->query("
			SELECT * FROM t_tips
		");
		return $query->num_rows();
	}
	
	public function inputTips($judul, $url_title, $isi, $video, $foto){
		$query = $this->db->query("INSERT INTO t_tips VALUES('', '$judul', '$url_title', '$isi', '$video', '$foto', NOW())");
	}
	
	public function getEditTips($id){
		$query = $this->db->query("
					SELECT p.id as id_tips, p.judul, p.url_title, p.isi, p.video, p.file_name, p.created_at
					FROM t_tips as p
					WHERE p.id = '$id'
					LIMIT 1
					");
		return $query;
	}
	
	public function updateTipsTanpaFoto($id, $judul, $url_title, $isi, $video){
		$query = $this->db->query("UPDATE t_tips 
									SET judul = '$judul', 
									url_title ='$url_title', 
									isi = '$isi', 
									video = '$video', 
									created_at = NOW()
									WHERE id = '$id'
								");
	}
	
	public function updateTipsFoto($id, $judul, $url_title, $isi, $video, $foto){
		$query = $this->db->query("UPDATE t_tips 
									SET judul = '$judul', 
									url_title ='$url_title', 
									isi = '$isi', 
									video = '$video', 
									file_name = '$foto', 
									created_at = NOW()
									WHERE id = '$id'
								");
	}
	
	public function hapus_tips($id){
		$this->db->query("DELETE FROM t_tips WHERE id = '$id' ");
	}
	//END QUERY PRODUK
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}