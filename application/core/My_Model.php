<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: levilb
 * Date: 9/3/16
 * Time: 11:23 PM
 */

class My_Model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * private method save
     * @param unknown $table
     * @param unknown $array
     */
    public function insert($table,$array)
    {
        $this->db->insert($table,$array);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    /**
     * private method update
     * @param unknown $obj
     */
    public function update($obj)
    {
        $this->db->where($obj->key,$obj->value);
        return $this->db->update($obj->table,$obj->array);
        $this->db->last_query();
    }

    /**
     * private method fetchAll
     * @param unknown $table
     */
    public function fetch_all($table)
    {
        $query = $this->db->get($table);
        return $query->result();
    }
    /**
     * private method fetchAll
     * @param unknown $table
     */
    public function fetch_all_where($table,$where=null)
    {
        if(!is_null($where) && count($where) > 0) {
            foreach($where as $k => $v) {
                $this->db->where($k,$v);
            }
        }
        $query = $this->db->get($table);
        return $query->result();
    }

    /**
     * private method fetchUsingId
     * @param unknown $id
     * @param unknown $table
     */
    public function fetch_using_id($id,$table)
    {
        $this->db->where("id",$id);
        $query = $this->db->get($table);
        return $query->row();
    }

    /**
     * private method fetch_using_pk_id
     * @param unknown $id
     * @param unknown $table
     */
    public function fetch_using_pkid($id,$pk="id",$table)
    {
        $this->db->where($pk,$id);
        $query = $this->db->get($table);
        return $query->row();
    }

    /**
     * private method fetch_using_pk_id
     * @param unknown $id
     * @param unknown $table
     */
    public function fetch_using_pkid_many($id,$pk="id",$table)
    {
        $this->db->where($pk,$id);
        $query = $this->db->get($table);
        return $query->result();
    }

    /**
     * private method delete
     * @param unknown $id
     * @param unknown $table
     */
    public function delete($id,$table)
    {
        return $this->db->delete($table, array('id' => $id));
    }
}