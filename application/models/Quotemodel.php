<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Quotemodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
     /**
	 * Store User Future Meta Fields
	 */
    public function saveUserMeta($userID,$user){
        unset($user['first_name']);
        unset($user['phone']);
        unset($user['last_name']);
        foreach($user as $key=>$val){
              $this->db->insert('usermeta',array('user_id'=>$userID,'meta_key'=>$key,'meta_value'=> $val));
        }      
    }
    /**
	 * Store Vehicle Future Meta Fields
	 */
    public function saveVehicleMeta($VehicleID,$vehicle){
        unset($vehicle['year']);
        unset($vehicle['make']);
        unset($vehicle['model']);
        foreach($vehicle as $key=>$val){
              $this->db->insert('vehiclemeta',array('vehicle_id'=>$VehicleID,'vmeta_key'=>$key,'vmeta_value'=> $val));
        }      
    }

    /**
	 * Store Vehicle and User Fields
	 */
    public function saveQuote($data)
    {
        foreach($data['users'] as $key=> $user){
            $this->db->insert('users',array('first_name'=>$user['first_name'],'last_name'=>$user['last_name'],'phone'=> $user['phone'])); 
            $userID = $this->db->insert_id();
            $this->saveUserMeta($userID,$user);
            foreach($data['vehicles'] as $key=> $vehicle){
                 $this->db->insert('vehicles',array('user_id'=>$userID,'year'=>$vehicle['year'],'make'=> $vehicle['make'],'model'=> $vehicle['model'])); 
                 $VehicleID = $this->db->insert_id();
                 $this->saveVehicleMeta($VehicleID,$vehicle);
            }
        }
        session_destroy();
        return true;    
    }
}/* End of Class */
