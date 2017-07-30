<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Message extends CI_Controller {



    protected $token = '445328048:AAFhsoyG9gBbcXxIWt3dMfNF8Q2ZaKjAvUg';

    public function index()
    {
        $this->load->view("include/header");
        $this->load->view("home");
        $this->load->view("include/footer");
    }

   public function read_from_table (){

       $this->load->model("Message_model");
       $this->load->view("include/header");
       $data['messages'] = $this->Message_model->get_last_ten_entries();
       $this->load->view('display_messages', $data);
       $this->load->view("include/footer");

   }

    public function insert_to_table(){

        $this->load->view("include/header");

        $this->load->view('send_message');

        $this->load->view("include/footer");
    }

    public function form_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules("user_id", "User ID", 'required');
        $this->form_validation->set_rules("message", "Message", 'required');

        if($this->form_validation->run()){
            $this->load->model("Message_model");
            $data = array(
                "text" => $this->input->post('message'),
                "adress" => $this->input->post('user_id'),
                'updatedAt' => date('Y-m-d h-m-s')
            );

            $this->Message_model->insert_entry($data);

            $client = new GuzzleHttp\Client();

            $client->post('https://api.telegram.org/bot'. $this->token . '/sendmessage?chat_id=' . $data['adress'] . '&text=' . $data['text']);

            redirect(base_url() . "show-messages");

        }else{
            $this->insert_to_table();
        }
    }

    public function getMe(){

        $client = new GuzzleHttp\Client();

        $response = $client->get('https://api.telegram.org/bot' . $this->token . '/getme')->getBody();

        $obj = json_decode($response);

        var_dump($obj);
    }

    public function getUpdates(){
        $client = new GuzzleHttp\Client();

        $response = $client->get('https://api.telegram.org/bot' . $this->token . '/getupdates?allowed_updates=message')->getBody();

        $obj = json_decode($response, true);

        $received_messages = $obj['result'];

        $data['received_messages'] = $received_messages;

        $this->load->view("include/header");
        $this->load->view('received_messages', $data);
        $this->load->view("include/footer");

    }
}
