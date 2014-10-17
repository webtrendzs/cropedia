<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crops extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
	
	$this->load->model("crop_model",'crop');
	
    }
    
    public function index()
    {
	
        $data['title']="List of all crops";
        
        $data['headline']="Crops";

        $this->table->set_heading('Name', 'Altitude', 'Farming Method','Harvest time','Actions');
        
        $data['new']=false;
	
	$data['add']=anchor("crops/add/new","Add New");
	
	$this->load->library('pagination');
	
	$results=$this->crop->get_all();
	
	$config['base_url'] = base_url().'crops/index/';
	$config['total_rows'] = 20;
	$config['per_page'] = 2;
	
	$this->pagination->initialize($config);
	
	$data['pagination']=$this->pagination->create_links();
	
	if($results)
	{
	    foreach($results as $key=>$value)
	    {
		$date=date("M Y",time());
		
		$edit=anchor("crops/edit/".$value->id,"Edit");
		$delete=anchor("crops/delete/".$value->id,"Delete");
		$more=anchor("crops/detail/".$value->id,"More");
		$this->table->add_row($value->name, $value->altitude,$value->farming_method,$date,$edit." | ".$delete." | ".$more);
	    }
	}
	else
	{
	    $this->table->add_row(array('data' => 'You have no crops listed yet','colspan' => 4),$data['add']);
	}
        
        $data['table']=$this->table->generate();
	
        $this->layouts->renderView('crops',$data);
    }
    
    public function add()
    {
        $data['title']="Add a new crop";
	
	$this->load->model('disease_model');
	
	$diseases=$this->disease_model->get_all();
	
	$options=array();
	
	foreach($diseases as $index=>$row)
	{
	    $options[$row->id]=$row->name;
	}
	
	$data['diseases']=$options;
	
	$this->load->library('form_validation');
	
	$this->form_validation->set_rules('name', 'Crop name', 'required');
	$this->form_validation->set_rules('altitude', 'Recommended altitude', 'numeric');
	
	if($this->input->post('add')=='new')
	{
	    $crop=$this->prepareCropDataForSave();
	   
	    if(count($crop) && $this->form_validation->run()!=false)
	    {
		if($this->crop->add($crop)) redirect("crops/");
	    }
	    
	}
	
        $data['new']=true;
	
        $this->layouts->renderView('crops',$data);
    }
    
    function prepareCropDataForSave()
    {
	$crop=array();
	$crop['diseases']=serialize($this->input->post('diseases'));
	$crop['name']=$this->input->post('name');
	$crop['altitude']=$this->input->post('altitude');
	$crop['farming_method']=$this->input->post('farming_method');
	$crop['harvest_time']=$this->input->post('harvest_time');
	$crop['description']=$this->input->post('description');
	
	return $crop;
    }
    
    
    public function edit()
    {
	$this->load->model('disease_model');
	
	$diseases=$this->disease_model->get_all();
	
	$options=array();
	
	foreach($diseases as $index=>$row)
	{
	    $options[$row->id]=$row->name;
	}
	
	if($this->uri->segment(3)>0)
	{
	    $data=$this->crop->get_by_id($this->uri->segment(3));
	    
	    $data['disease_values']=implode(",",unserialize($data['diseases']));
	}
	
	$data['diseases']=$options;
	
	$data['title']="Edit crop";
	
	if($this->input->post('edit')>0)
	{
	    $crop=$this->prepareCropDataForSave();
	    
	    if(count($crop))
	    {
		if($this->crop->update($crop,$this->input->post('edit'))) redirect("crops/");
	    }
	}
	
        $this->layouts->renderView('crop_edit',$data);
    }
    
    public function detail()
    {
	$id=$this->uri->segment(3);
	
	if($id>0)
	{
	    $data=$this->crop->get_by_id($id);  
	}
	
	$this->load->model('disease_model');
	
	$diseases=$this->disease_model->get_by_crop_ids(implode(",",unserialize($data['diseases'])));
	
	$data['diseases']=$diseases;
	
	$data['title']="More information for crop '".$data['name']."'";
	
        $this->layouts->renderView('crop_detail_view',$data);
    }
    
    public function delete()
    {
	$data=$this->crop->get_by_id($this->uri->segment(3));
	
	$data['table']=$this->table->generate(array($data));
	
	if($this->input->post('delete')>0)
	{
	    if($this->crop->delete($this->uri->segment(3))) redirect("crops/");
	}
	
	$data['title']="Are you sure you want to delete this crop?";
	
        $data['new']=true;
	
        $this->layouts->renderView('crop_delete',$data);
    }
}
