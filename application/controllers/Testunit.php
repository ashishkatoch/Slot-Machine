<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Testunit extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library("unit_test");
	}
    private function getCreditsByItem($item){
		switch($item){
			case 'cherry':
			return 10;	
			break;
			case 'lemon':
			return 20;	
			break;
			case 'orange':
			return 30;		
			break;
			case 'watermelon':
			return 40;
			break;
			default:
			return 0;
			break;
		}
	}
    public function index(){
        $test = $this->getCreditsByItem('cherry');
        $expected_result = 10;
        $test_name="Fixed Credit Values of Item. For example cherry";
        echo $this->unit->run($test,$expected_result,$test_name);
    }


}