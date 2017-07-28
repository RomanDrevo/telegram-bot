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
        $this->load->view("youtube");
        $this->load->view("include/footer");
    }

   public function read_from_table (){

       $this->load->model("Message_model");
       $this->load->view("include/header");
       $data['messages'] = $this->Message_model->get_last_ten_entries();
//       foreach ($messages as $message){
//           echo $message->id;
//           echo $message->text;
//           echo $message->adress;
//           echo $message->updatedAt;
//       }
//       $this->load->library('table');
//       var_dump($result);

       $this->load->view('display_messages', $data);
       $this->load->view("include/footer");

   }

    public function insert_to_table(){
//        $this->load->model("Message_model");
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

            redirect(base_url() . "show-messages");

        }else{
            $this->insert_to_table();
        }
    }

    public function getMe(){

        $client = new GuzzleHttp\Client();

        $response = $client->get('https://api.telegram.org/bot445328048:AAFhsoyG9gBbcXxIWt3dMfNF8Q2ZaKjAvUg/getme')->getBody();

        $obj = json_decode($response);

        var_dump($obj);
    }

    public function getUpdates(){
        $client = new GuzzleHttp\Client();

        $response = $client->get('https://api.telegram.org/bot445328048:AAFhsoyG9gBbcXxIWt3dMfNF8Q2ZaKjAvUg/getupdates')->getBody();

//        $obj = json_decode(json_encode($response), true);
        $obj = json_decode($response);

//        var_dump($obj);
        var_dump(json_decode(json_encode($obj->result[0], true)));
    }

    public function sendMessage(){
        $message = [
            'chat_id' => '193605619',
            'text' => 'huinane'
        ];

        $x = json_encode($message);

        $client = new GuzzleHttp\Client();

        $client->post('https://api.telegram.org/bot445328048:AAFhsoyG9gBbcXxIWt3dMfNF8Q2ZaKjAvUg/sendmessage?chat_id=' . $message['chat_id'] . '&text=' . $message['text']);
    }
}
