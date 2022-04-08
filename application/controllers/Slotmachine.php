<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slotmachine extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->library('session');
	}
	/**
	 * Slot Machine Page
	 */
	public function index()
	{
		$this->session->unset_userdata('credits');
		$this->session->credits=10;
		$this->load->view('machine');	
	}
    /**
	 * Ajax function that will return roll images based on all conditions
	 */
	public function getBlocksImage()
	{
		$fruit = 0;
		$random_fruits = array();
		$all_fruits = array('cherry','lemon','orange','watermelon');
		$return = array();
		$random = rand(1,100);
		$flag =0;
		$credits = $this->session->credits;
            //Rolls are truly random, else if between 40 and 60, else if above 60
			if($credits<40){
				$fruitOne = $all_fruits[array_rand($all_fruits)];
				$fruitTwo = $all_fruits[array_rand($all_fruits)];
				$fruitThree = $all_fruits[array_rand($all_fruits)];
				$random_fruits = array($fruitOne,$fruitTwo,$fruitThree);
				$flag =0;
			}else if($credits>=40 || $credits<=60 ){
				$fruitOne = $all_fruits[array_rand($all_fruits)];
				$fruitTwo = $all_fruits[array_rand($all_fruits)];
				$fruitThree = $all_fruits[array_rand($all_fruits)];
				$random_fruits = array($fruitOne,$fruitTwo,$fruitThree);
				$flag =1;
			}else if($credits>60){
				$fruitOne = $all_fruits[array_rand($all_fruits)];
				$fruitTwo = $all_fruits[array_rand($all_fruits)];
				$fruitThree = $all_fruits[array_rand($all_fruits)];
				$random_fruits = array($fruitOne,$fruitTwo,$fruitThree);
				$flag =2;
			}
			// all values in $random_fruits are the same
			if(count(array_unique($random_fruits)) === 1) {
			        //Chances of 30percent and 60 percent
					if (
						($flag==1 && $random<=30) || ($flag==2 && $random<=60)){
						$this->getBlocksImage();
						return;
					}
				//Fetching same item credit value	
				$inc_credits = $this->getCreditsByItem($random_fruits[0]);
				$credits = $inc_credits+$credits;
				$this->session->credits= $credits;
			}else{
				//If 3 blocks items are not same then deduct 1 credit.
				$credits = $credits-1;
				$this->session->credits=$credits;
			} 	
		$return['items'] = $random_fruits; 
		$return['current_credits'] = $credits;
		$return['responseHTML'] = 'Credits Updated successfully!';
		$return['responseCode'] = 1;
		$return['chance'] = $random;
	    die(json_encode($return));
	}
	public function getCreditsByItem($item){
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
	public function cashout(){
		$this->session->credits=0;
		$return['message'] = 'Credits are moved to user account successfully';
		$return['availablecredits'] = $this->session->credits;
		$this->session->sess_destroy();
	    die(json_encode($return));
	}
	
}
