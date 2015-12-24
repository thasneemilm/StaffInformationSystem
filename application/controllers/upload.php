<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class upload extends MY_Controller {
public function __construct() {
parent::__construct();
}
public function index(){
$this->load->view('uploadview', array('error' => ' ' ));
}
public function do_upload(){
	
$studentname = $this->input->post('studentname');
$config = array(
'upload_path' => "./uploads/profileimages",
'allowed_types' => "gif|jpg|png|jpeg|pdf",
'overwrite' => TRUE,
'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
'max_height' => "768",
'max_width' => "1024",
'file_name' => $studentname
);
$this->load->library('upload', $config);
if($this->upload->do_upload())
{


$data = array('upload_data' => $this->upload->data());


$insert_data = array(
                    'imagename' => $studentname,
                    'studentId' => $studentname
                   // 'thumb_path'=> $image_data['file_path'] . 'thumbs/'. $image_data['file_name'],
                    //'tag' => $tag
                     );
					 
					 
 $this->db->insert('profileimages', $insert_data);
//$this->load->view('upload_success',$data);
$this->session->set_flashdata('flashSuccess', 'Student Profile Image Upload  Success');
//$this->loadView('file_view', $this->data);
redirect('Student/uploadProfileImage' );
}
else
{
$error = array('error' => $this->upload->display_errors());
//$this->load->view('uploadview', $error);
$this->session->set_flashdata('flashFail', 'Student Profile Image Upload  Fail');
redirect('Student/uploadProfileImage' );

}
}
}
?>