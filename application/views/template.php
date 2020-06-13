<?php 

    $this->load->view('layouts/head');
    $this->load->view('layouts/header');
    $this->load->view($view, $data);
    $this->load->view('layouts/sidebar');
    $this->load->view('layouts/footer');

?>