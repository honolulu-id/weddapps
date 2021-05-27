<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_about extends CI_model {
	var $table = 'about';
	var $column_order = array('about_us','our_strength',NULL); //set column field database for datatable orderable
	var $column_search = array('about_us','our_strength'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('about_id' => 'desc');


	public function save($data)
	{
		$this->db->insert('about',$data);
	}
	public function get_data(){
        $query = $this->db->get('about');
	    return $query->result();
    }
    private function _get_datatables_query()
	{
			$this->db->select('*')
					 ->from('about');

		$i = 0;
		foreach ($this->column_search as $item) 
		{
			if($_POST['search']['value']) 
			{
				if($i===0) 
				{
					$this->db->group_start(); 
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if(count($this->column_search) - 1 == $i) 
					$this->db->group_end();
			}
			$i++;
		}
		if(isset($_POST['order']))
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
    
    public function delete_by_id($id)
	{
		$this->db->where('about_id', $id);
		$this->db->delete($this->table);
    }
    public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('about_id',$id);
		$query = $this->db->get();
		return $query->row();
    }
    public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
}