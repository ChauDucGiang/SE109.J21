<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    public function getAll(){
        return $this->db->get('devvn_tinhthanhpho')->result_array();
    }
    public function updateTp($matp, $data){
        return $this->db->where('matp', $matp)->update('devvn_tinhthanhpho', $data);
        
    }
    public function getTpById($matp){
        return $this->db->where('matp',$matp)->get('devvn_tinhthanhpho')->result_array();
    }
    public function getTpByName($tentp){
        return $this->db->where('name',$tentp)->get('devvn_tinhthanhpho')->result_array();
    }
    public function getLike($key){
        return $this->db->like('name', $key)->get('devvn_tinhthanhpho')->result_array();
    }
}

/* End of file Home_model.php */
