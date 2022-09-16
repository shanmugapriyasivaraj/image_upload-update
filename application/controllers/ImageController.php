<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ImageController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
		$this->load->model('CrudModel');
        $this->load->library('upload');
	}
    public function image(){
        $where =  array(
"deleted" =>'0'
        );
        $data['image_details']=$this->CrudModel->get('image',$where);
        $data['image_details1']=$this->CrudModel->get('image',$where);
        $this->load->view('image',$data);
        $this->load->view('script');
    }
    public function addImage(){
         
        $responseArray = array();
	    $responseArray["response_status"]="failed";
        
	if(isset($_FILES["image"]["name"])){
		$config['upload_path']='./assets/uploads/';
		$config['allowed_types']='*';

		$this->upload->initialize($config);
		$this->upload->do_upload("image");
		
			$img_data = array('img_upload' => $this->upload->data());
			 $image1= $img_data['img_upload']['file_name']; 
    }
             $name = $this->input->post("name");
             $image = $image1;

             $data = array(
                "name"=>$name,
                "image"=>$image);
                $upload = $this->CrudModel->insert('image',$data);
    }
    public function edit_image(){

   
    
        $image_id =  $this->input->post("image_id");  
    
        $where = array(
            "image_id" =>$image_id
        );
    
        $data['image_details']=$this->CrudModel->get('image',$where);
        

        $this->load->view('imageModal',$data);
        
    
    }
    public function updateImage(){
       
        if(($_FILES["edit_image"]["name"])){
         
            $config['upload_path']='./assets/uploads/';
            $config['allowed_types']='*';
    
            $this->upload->initialize($config);
            $this->upload->do_upload("edit_image");
            
                $img_data = array('img_upload' => $this->upload->data());
                 $image1= $img_data['img_upload']['file_name']; 
        
                 $name = $this->input->post("edit_name");
                 $image_id = $this->input->post("edit_image_id");
                 $image = $image1;
                 $where = array(
                    "image_id"=>$image_id
                );
               
                 $data = array(
                    "name"=>$name,
                    "image"=>$image);
                    $upload = $this->CrudModel->update('image',$data,$where);
                 }
                    $name = $this->input->post("edit_name");
                    $image_id = $this->input->post("edit_image_id");
          
                    $where = array(
                        "image_id"=>$image_id
                    );
                    $data = array(
                        "name"=>$name,
                    );
                    $upload = $this->CrudModel->update('image',$data,$where);
                 }
                }
        
    
        
 
     

