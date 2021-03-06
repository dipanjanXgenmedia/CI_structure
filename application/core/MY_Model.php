<?php

class MY_Model extends CI_Model {

    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    public $rules = array();
    protected $_timestamps = FALSE;

    function __construct() {
        parent::__construct();
    }

    public function array_from_post($fields) {
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }

    public function get($id = NULL, $single = FALSE) {
        if ($id) {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method = "row";
        } elseif ($single == TRUE) {
            $method = "row";
        } else {
            $method = "result";
        }
        //echo count($this->db->ar_orderby); die;
        //if(!count($this->db->ar_orderby)){
        if ($this->_order_by) {
            $this->db->order_by($this->_order_by);
        }
        //}
        return $this->db->get($this->_table_name)->$method();
    }

    public function get_by($where, $single = FALSE) {

        $this->db->where($where);
        return $this->get('', $single);
    }

    public function save($data, $id = NULL) {
        // Insert
        if ($id === NULL) {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        }
        // Update
        else {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }
        return $id;
    }

    public function delete($id) {

        $filter = $this->_primary_filter;
        $id = $filter($id);
        if ($id) {
            $this->db->where($this->_primary_key, $id);
            $this->db->limit(1);
            $this->db->delete($this->_table_name);
        }
    }

    public function delete_by($cond) {
        $this->db->where($cond);
        $this->db->delete($this->_table_name);
    }
    
    public function delete_multiple( $field , $value ) {
        foreach( $value as $val ):
            
            $this->db->where( $field ."=". $val );
            $this->db->delete($this->_table_name);
        endforeach;
      
    }

    public function get_by_like($where, $like, $single = FALSE) {

        $this->db->where($where);
        $this->db->like($like);
        return $this->get('', $single);
    }

    public function countAll($cond = '') {
        $where = '';
        if ($cond) {
            $where = "WHERE $cond";
        }
        $res = $this->db->query("SELECT COUNT(*) AS `numrows` FROM `category_notification` $where");
        return $res->row()->numrows;
    }

    public function update_by($data, $cond) {
        $this->db->set($data);
        $this->db->where($cond);
        $this->db->update($this->_table_name);
    }

    
     public function get_table_field($fld,$where, $single = FALSE) {
        $this->db->select($fld);
        $this->db->where($where);
        return $this->get('', $single);
    }
}
