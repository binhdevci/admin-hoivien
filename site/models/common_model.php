<?
class Common_model extends Model{
	function Common_model(){
		 parent::Model();
	}
	
	
	
	
	
    function insert_data($lb_table,$data){
        try{			
            $rs=$this->db->insert($lb_table, $data);
            return $rs;
        }catch(Exception $ex){
            return false;
        }
    }
	
	function  check_login($username){
		$sql="
		select *	from tt_user u
		where
		u.lb_username=?";
		$query = $this->db->query($sql,array(formatInputStr($username)));
		return $query->row();
	}
	
	function get_all_paging($lb_table,$lb_primary_key,$num,$offset,$arr_search=array(),$arr_order=array()){
			if(isset($arr_search['key_search'])&&$arr_search['key_search']!=''){
					$this->db->like($arr_search['field_search'],$arr_search['key_search']);
			}
			if(isset($arr_order['order_key'])&&$arr_order['order_key']!=''){
				$this->db->order_by($arr_order['order_key'],$arr_order['order_type']);
			}
			else
				$this->db->order_by($lb_primary_key,'DESC');
		return $this->db->get($lb_table,$num,$offset)->result();
	}
	

	function get_parent($lb_table_foreign){
		return $this->db->get($lb_table_foreign)->result();
	}
	
	function get_parent_id($lb_table,$lb_foreign_key,$id){
		if($id>0){
			 $this->db->where($lb_foreign_key,$id);
			 $query = $this->db->get($lb_table);
			 return $query->result();
		}
		return array();
	}
	
	function get_num_rows($lb_table,$arr_search=array()){
        /*Begin search*/
        if(isset($arr_search['key_search'])&&$arr_search['key_search']!=''){
                $this->db->like($arr_search['field_search'],$arr_search['key_search']);
        }
        /*End search*/
		$query = $this->db->get($lb_table);
		return $query->num_rows();
	}
	
	function get_item($lb_table,$lb_primary_key,$id){
		 $this->db->where($lb_primary_key,$id);
		 $query = $this->db->get($lb_table);
		 return $query->row();
	}
	
    function update_data($lb_table,$data,$wh_field,$wh_value){
        try{
            $this->db->where($wh_field, $wh_value);
            $rs=$this->db->update($lb_table, $data);
            return $rs;
        }catch(Exception $ex){
            return false;
        }
    }
}
?>