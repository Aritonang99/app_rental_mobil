<?php

class Dashboard extends CI_controller
{
    public function index(){
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/dashboard');
    $this->load->view('templates_admin/footer');
    
    }


}
?>
