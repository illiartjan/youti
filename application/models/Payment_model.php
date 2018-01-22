<?php



class Payment_model extends CI_Model{


    public function setPayment($userid,$blogid=false){
        //Change to Video ID
        if(isset($blogid)){
            $lblog=$blogid;
        }
        else{
            $lblog=0;
        }

        $userid=1;

            {}
        $data=array(

            'payment_user_id'=>$userid,
            'frontpay '=>$this->input->post('payment3'),
            'sliderpay'=>$this->input->post('payment1'),
            'companypay'=>$this->input->post('payment2'),
            'amount'=>$this->input->post('amountCostumer'),
            'totalamout'=>$this->input->post('amountInCents'),
            'user_email'=>$this->input->post('stripeEmail'),
            'token'=>$this->input->post('stripeToken'),
            'blogid '=>$lblog
        );


        return $this->db->insert('payment',$data);

    }



}