<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Payments extends MY_Controller {

	
	 
	  function __construct() {
		parent::__construct();
		//$this->load->library('Datatables');
       // $this->load->library('table');
        $this->load->database();
		//$this -> load -> library('form_validation');
		//$this -> load -> model('StudentModel');
		$this -> load -> model('PaymentModel');
		//$this->load->helper(array('form','url','html','form'));
        //$this->load->library(array('session', 'form_validation', 'email' ,'ion_auth'));
		}
	 
	public function index()
	{
		$this->data = array('content'=>'Payments/DoPayments');
		$this->data['payments'] = $this->PaymentModel->getPaymentRows();
		//$this->load->view('masterView', $this->data);
		
		 $this->loadView('Payments/payments_view', $this->data);
		//$this->load->view('Payments/payments_view', $this->data);
	}
		

    public function createPayments(){
		 $this->load->library('form_validation');
		 $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		 $this->form_validation->set_rules('paymentname', 'Name', 'required|min_length[5]|max_length[15]');
		 
		 $this->data['payments'] = $this->PaymentModel->getPaymentRows();
		 
		 $this->form_validation->set_rules('paymentfrequancy', 'Frequancy', 'required');
		 if ($this->form_validation->run() == FALSE) {
				$this->loadView('Payments/createPaymentsView', $this->data);
		} else{
		
		$paymentname = $this->input->post('paymentname');
		$paymentfrequancy = $this->input->post('paymentfrequancy');
		$description = $this->input->post('description');
		
		$data = array(
			'name'   =>  $paymentname,
			'paymentfrequancy'   =>  $paymentfrequancy,
			'description'   =>  $description
			);
		
		
		
		if($this->PaymentModel->registerNewPaymentCatagory($data)!=null){
				$this->session->set_flashdata('flashSuccess', 'Payment Created!');
				redirect('Payments/createPayments' );
				}else{
				//echo $this->StudentModel->addnewStudents($data);
				$this->session->set_flashdata('flashDanger','Error OCcured, Try again');
			} 
		
		}
		
    }
		
	
	
	
	
	
	public    function edit($id){
       
        $this->data['payment'] = $this->PaymentModel->getSinglePayment($id)->row();
       $this->loadView('Payments/editPaymentsView', $this->data);
    }
		
    public function updatePayments(){
	
			$id = $this->input->post('id');
			//echo $id;
            $payment = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('paymentname'),
             'paymentfrequancy' => $this->input->post('paymentfrequancy'),
            'description' => $this->input->post('description')
		     
			);
            $this->PaymentModel->update($id,$payment);
			
			redirect('Payments/createPayments');
		}
	
	 public function delete(){
	        $id = $this->uri->segment(3);
			//$id = $this->input->post('id');
			
            $this->PaymentModel->delete($id);
			
			redirect('Payments/createPayments');
		} 
	
	
	
   
 }
		