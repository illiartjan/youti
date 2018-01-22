<?php
use \Stripe\Stripe;
use \Stripe\Charge;
use \Stripe\Customer;
class Payment extends CI_Controller{

public function index(){

}

public function bloginit($id){

    $data['title'] = 'Check Out';
    $this->load->view('templates/header');
    $this->load->view('payment/checkout', $data);
    $this->load->view('templates/footer');
}


public function checkout($id=false){

    if(isset($id)){
        $data['blog']=$id;


    }
    $data['title'] = 'Check Out';
    $this->load->view('templates/header');
    $this->load->view('payment/checkout', $data);
    $this->load->view('templates/footer');
}
    public function checkout2(){
        $token = $_POST['stripeToken'];
        if(isset($token)){
            try{

                if(isset($_POST['blog_id'])){
                    $this->payment_model->setPayment($this->session->userdata('user_id'),$_POST['blog_id']);
                }
                else{
                    $this->payment_model->setPayment($this->session->userdata('user_id'),null);
                }


                require_once('vendor/autoload.php');
                \Stripe\Stripe::setApiKey('sk_test_702NzyKx6L4XcQHpSFLvbGQF');

                $charge=Charge::create(
                    array("amount" => 2000,
                        "currency" => "chf",
                        "description" => "Example charge",
                        "source" => $token));

                $data['text']= "<h2>Thanks Payment Succes</h2>";

                $this->load->view('templates/header');
                $this->load->view('payment/payment_succes', $data);
                $this->load->view('templates/footer');
            }
            catch (\Stripe\Error\Card $e){
                $error=$e->getMessage();
             var_dump($error);
             die;
            }
        }
        else{
            var_dump("test");
            die;
        }
    }
}