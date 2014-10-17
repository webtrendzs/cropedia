<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Layouts Class
 *
 */
 
class Layouts {
    
    protected $CI;
    
    function __construct()
    {
        $this->CI=&get_instance();
    }
    
    public function renderView($view_name,$params=array(),$default=true)
    {
        $arrMenu=array('welcome','crops','diseases');
        
        $class=array();
        
        foreach($arrMenu as $menu=>$cssClass)
        {
            $class[$cssClass]="item";
            
            if(in_array($cssClass,explode("/",uri_string())))
            {
                $class[$cssClass]="active item";
            }
            
            if($cssClass=="welcome" && uri_string()=='')
            {
                $class[$cssClass]="active item";
                
            }
        }
        
        $params['class']=$class;
        
        if(!$default)
        {
           $this->CI->load->view($view_name,$params); 
        }
        else
        {
            $this->CI->load->view("layouts/header",$params);
        
            $this->CI->load->view($view_name,$params); 
            
            $this->CI->load->view("layouts/footer",$params);
        }
        
        
    }
    
}