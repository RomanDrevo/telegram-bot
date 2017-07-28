<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index()
    {
        $data["view"] = "display_view";
        $this->load->view('load_view', $data);
    }

    public function create_table ($name = "user"){
        $this->load->model("Sample_model");
        $data["result"] = $this->Sample_model->CRUD_create();
        $data["view"] = "CRUD_create_view";
        $data->load->view('load_view', $data);
    }

    public function huinane()
    {
        echo "huinane";
    }
}
