<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diseases extends CI_Controller {

    
    
    public function __construct()
    {
        parent::__construct();
	
	$this->load->model("disease_model",'diseases');
    }
    
    public function index()
    {
	
        $data['title']="List of all diseases";
        
        $data['headline']="All diseases";
	
        $this->table->set_heading('Name', 'Description','Actions');
        
        $data['new']=false;
	
	$data['add']=anchor("diseases/add/new","Add New");
	
	if($this->diseases->get_all())
	{
	    foreach($this->diseases->get_all() as $key=>$value)
	    {
		
		$edit=anchor("diseases/edit/".$value->id,"Edit");
		$delete=anchor("diseases/delete/".$value->id,"Delete");
		$more=anchor("diseases/detail/".$value->id,"More");
		$this->table->add_row($value->name, $value->description,$edit." | ".$delete." | ".$more);
	    }
	}
	else
	{
	    $this->table->add_row(array('data' => 'You have no diseases listed yet','colspan' => 2),$data['add']);
	}
        
        $data['table']=$this->table->generate();
	
        $this->layouts->renderView('diseases',$data);
    }
    
    public function add()
    {
        $data['title']="Add a new disease";
	
	if($this->input->post('add')=='new')
	{
	    $diseases=$this->prepareCropDataForSave();
	    
	    if(count($diseases))
	    {
		if($this->diseases->add($diseases)) redirect("diseases/");
	    }
	}
	
        $data['new']=true;
	
        $this->layouts->renderView('diseases',$data);
    }
    
    function prepareCropDataForSave()
    {
	$diseases=array();
	
	$diseases['name']=$this->input->post('name');
	
	$diseases['description']=$this->input->post('description');
	
	return $diseases;
    }
    
    public function edit()
    {
	if($this->uri->segment(3)>0)
	{
	    $data=$this->diseases->get_by_id($this->uri->segment(3));
	    
	}
	
	$data['title']="Edit disease";
	
	if($this->input->post('edit')>0)
	{
	    $diseases=$this->prepareCropDataForSave();
	    
	    if(count($diseases))
	    {
		if($this->diseases->update($diseases,$this->input->post('edit'))) redirect("diseases/");
	    }
	}
	
        $this->layouts->renderView('diseases_edit',$data);
    }
    
    public function detail()
    {
	if($this->uri->segment(3)>0)
	{
	    $data=$this->diseases->get_by_id($this->uri->segment(3));
	    
	}
	
	$data['title']="More on '".$data['name']."'";
	
        $this->layouts->renderView('disease_detail_view',$data);
    }
    
    public function delete()
    {
	$data=$this->diseases->get_by_id($this->uri->segment(3));
	
	unset($data['id']);
	unset($data['descripption']);
	
	$data['table']=$this->table->generate(array($data));
	
	if($this->input->post('delete')>0)
	{
	    if($this->diseases->delete($this->uri->segment(3))) redirect("diseases/");
	}
	
	$data['title']="Are you sure you want to completely remove this disease?";
	
        $data['new']=true;
	
        $this->layouts->renderView('disease_delete',$data);
    }
}
