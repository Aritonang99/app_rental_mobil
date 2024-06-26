<?php

class Data_type extends CI_controller
{
    public function index()
    {
        $data['type'] = $this->rental_model->get_data('type')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_type',$data);
        $this->load->view('templates_admin/footer');
    
    }
    public function tambah_type()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_tambah_type');
        $this->load->view('templates_admin/footer');

    }
    public function tambah_type_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE){
            $this->tambah_type();
        }else{
            $kode_type      = $this->input->post('kode_type');
            $nama_type     = $this->input->post('nama_type');

            $data = array(
                'kode_type' => $kode_type,
                'nama_type' => $nama_type,
            );
            $this->rental_model->insert_data($data, 'type');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil di Tambahakan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/data_type');
        }
    }
    public function update_type($id)
    {
        $where = array('id_type' => $id);
        $data['type'] = $this->db->query("SELECT * FROM type WHERE id_type='$id'")->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_update_type',$data);
        $this->load->view('templates_admin/footer');

    }
	public function update_type_aksi()
	{
		// Ensure the validation rules are set
		$this->_rules();
	
		if ($this->form_validation->run() == FALSE) {
			// If validation fails, reload the update form
			$this->update_type($this->input->post('id_type'));
		} else {
			// Retrieve input data
			$id = $this->input->post('id_type');
			$kode_type = $this->input->post('kode_type');
			$nama_type = $this->input->post('nama_type');
	
			// Prepare data for update
			$data = array(
				'kode_type' => $kode_type,
				'nama_type' => $nama_type,
			);
	
			// Define the condition for the update
			$where = array(
				'id_type' => $id
			);
	
			// Perform the update operation
			$this->rental_model->update_data('type', $data, $where);
	
			// Set a success message
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data Type Berhasil di Update
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>');
	
			// Redirect to the data_type page
			redirect('admin/data_type');
		}
	}
	




    public function _rules() 
    {
        $this->form_validation->set_rules('kode_type','kode type','required');
        $this->form_validation->set_rules('nama_type','nama type','required');
    }
    public function delete_type($id){
        $where = array('id_type' => $id);

        $this->rental_model->delete_data($where,'type');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Mobil Berhasil di Hapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/data_type');
    }


}
?>
