<?php

class Data_mobil extends CI_controller
{
    public function index()
    {   
        $data['mobil'] = $this->rental_model->get_data('mobil')->result();
        $data['type'] = $this->rental_model->get_data('type')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_mobil', $data);
        $this->load->view('templates_admin/footer');
    
    }
    public function tambah_mobil() {
    
        $data['type'] = $this->rental_model->get_data('type')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_tambah_mobil', $data);
        $this->load->view('templates_admin/footer');
    
    }
    public function Tambah_mobil_aksi() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
        $this->tambah_mobil();
        }else {
        $kode_type  = $this->input->post('kode_type');
        $merek      = $this->input->post('merek');
        $no_plat    = $this->input->post('no_plat');
        $warna      = $this->input->post('warna');
        $tahun      = $this->input->post('tahun');
        $status     = $this->input->post('status');
        $gambar     = $_FILES['gambar']['name'];
        if ($gambar=''){}else{
            $config['upload_path'] = './assets/upload';
            $config['allowed_types'] = 'jpg|jpeg|png|tiff';

            $this->load->library('upload',$config );
            if(!$this->upload->do_upload('gambar')) {
                echo "Gambar Mobil Gagal Di Upload!!";
            }else{
                $gambar = $this->upload->data('file_name');
            }
        }
        $data = array(
            'kode_type'     => $kode_type,
            'merek'         => $merek,
            'no_plat'       => $no_plat,
            'tahun'         => $tahun,
            'warna'         => $warna,
            'status'        => $status,
            'gambar'        => $gambar
        );
        $this->rental_model->insert_data($data, 'mobil');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Type Berhasil di Tambahakan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/data_mobil');
        }
    }
    public function update_mobil($id) 
	{ 
		$where = array('id_mobil' => $id);
		$data['mobil'] = $this->db->query("SELECT mb.*, tp.nama_type FROM mobil mb JOIN type tp ON mb.kode_type = tp.kode_type WHERE mb.id_mobil = ?", array($id))->row();
    	$data['type'] = $this->rental_model->get_data('type')->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_update_mobil', $data);
		$this->load->view('templates_admin/footer');
	}


	public function update_mobil_aksi() {
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->update_mobil($this->input->post('id_mobil'));
		} else {
			$id         = $this->input->post('id_mobil');
			$kode_type  = $this->input->post('kode_type');
			$merek      = $this->input->post('merek');
			$no_plat    = $this->input->post('no_plat');
			$warna      = $this->input->post('warna');
			$tahun      = $this->input->post('tahun');
			$status     = $this->input->post('status');
			$gambar     = $_FILES['gambar']['name'];
	
			if ($gambar) {
				$config['upload_path'] = './assets/upload';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff';
				$config['max_size'] = 2048;
	
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Gambar Mobil Gagal Di Upload: ' . $error . '
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
					redirect('admin/data_mobil/update_mobil/' . $id);
					return;
				} else {
					$gambar = $this->upload->data('file_name');
				}
			} else {
				$gambar = $this->input->post('gambar_lama');
			}
	
			$data = array(
				'kode_type' => $kode_type,
				'merek'     => $merek,
				'no_plat'   => $no_plat,
				'tahun'     => $tahun,
				'warna'     => $warna,
				'status'    => $status,
				'gambar'    => $gambar
			);
	
			$where = array(
				'id_mobil' => $id
			);
	
			$this->rental_model->update_data('mobil', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data Mobil Berhasil di UPDATE
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			redirect('admin/data_mobil');
		}
	}
	
	
    public function _rules() 
    {
        
        $this->form_validation->set_rules('kode_type','kode Type','required');
        $this->form_validation->set_rules('merek','merek','required');
        $this->form_validation->set_rules('no_plat','No Plat','required');
        $this->form_validation->set_rules('tahun','Tahun','required');
        $this->form_validation->set_rules('warna','Warna','required');
        $this->form_validation->set_rules('status','Status','required');
    }
    public function detail_mobil($id)
    {
        $data['detail'] = $this->rental_model->ambil_id_mobil($id);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_mobil', $data);
        $this->load->view('templates_admin/footer');
    
    }
    public function delete_mobil($id){
        $where = array('id_mobil' => $id);

        $this->rental_model->delete_data($where,'mobil');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Mobil Berhasil di Hapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/data_mobil');
    }
}

?>
