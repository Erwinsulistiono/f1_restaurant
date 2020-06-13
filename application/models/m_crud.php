<?php
class M_crud extends CI_Model{

    function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function read($table){
        $query = $this->db->get($table);
        return $query;
    }

    function select($select_field, $table , $field_condition, $field_id){
        $this->db->select($select_field);
        $this->db->from($table);
        $this->db->where($field_condition, $field_id);
        $query = $this->db->get();
        return $query;
    }

    function update($table, $data, $field_condition, $field_id){
        $this->db->where($field_condition, $field_id);
        $this->db->update($table, $data);
    }

    function delete($table, $field_condition, $field_id){
        $this->db->where($field_condition, $field_id);
        $this->db->delete($table);
    }

    function left_join($table, $table2, $field_join){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $field_join, 'left');
        $query = $this->db->get();
        return $query;
    }
    
}