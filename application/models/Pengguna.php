<?php
class Pengguna extends CI_Model
{
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function get_now()
    {
        $dt = new DateTime();
        $dt->setTimezone(new DateTimeZone('GMT+7'));
        return $dt->format("Y-m-d H:i:s");
    }

    public function grab_data_login($username, $pass){
        $query = $this->db->select('role_id, nama, id, hash')
            ->from('pengguna')
            ->where('username', strtoupper($username))
            ->where('password',($pass))
            ->where('deleted',0)
            ->limit(1)
            ->get();
        if (sizeof($query->result_array())> 0){
            $temp = $query->result_array();
            return $temp[0];
        } else {
            return False;
        }
    }

    public function set_hash($kd_kar, $hash){
        $data = array(
            'hash' => $hash
        );

        $this->db->where('id', $kd_kar);
        return $this->db->update('pengguna', $data);
    }

    public function check_double_login($kd_kar, $hash){
        $this->db->like('id', $kd_kar);
        $this->db->like('hash', $hash);
        $this->db->from('pengguna');
        if($this->db->count_all_results() > 0){
            return false;
        } else {
            return true;
        }
    }

    public function insert($nama, $uname, $pass, $wilayah, $role, $create_uid){
        $nama = strtoupper($nama);
        $data = array(
            'nama' => $nama,
            'username' => strtoupper($uname),
            'password' => $pass,
            'wilayah_id' => $wilayah,
            'role_id' => $role,
            'create_id' => $create_uid,
            'create_time' => $this->get_now(),
            'write_id' => $create_uid,
            'write_time' => $this->get_now()
        );
        $query = $this->db->insert('pengguna', $data);
        return $query;
    }

    public function get($id){
        $query = $this->db->select('p.id, p.nama, p.username, p.wilayah_id, p.role_id, p.score, p.password, p.create_time, p.write_time, c.nama as create_user, w.nama as write_user')
            ->from('pengguna p')
            ->where('p.deleted',0)
            ->join('pengguna c', 'c.id = p.create_id')
            ->join('pengguna w', 'w.id = p.write_id')
            ->join('role r', 'r.id = p.role_id')
            ->where('p.id', $id)
            ->where('p.deleted',0)
            ->get();
        return $query->result();
    }

    public function update($nama, $uname, $pass, $wilayah, $role, $id, $write_uid){
        $nama = strtoupper($nama);
        $uname = strtoupper($uname);
        $data = array(
            'nama' => $nama,
            'username' => $uname,
            'password' => $pass,
            'wilayah_id' => $wilayah,
            'role_id' => $role,
            'write_id' => $write_uid,
            'write_time' => $this->get_now()
        );

        $this->db->where('id', $id);
        return $this->db->update('pengguna', $data);
    }

    public function delete($id, $write_uid){
        $data = array(
            'deleted' => 1,
            'write_id' => $write_uid,
            'write_time' => $this->get_now()
        );

        $this->db->where('id', $id);
        return $this->db->update('pengguna', $data);
    }

    public function show_all(){
        $query = $this->db->select('p.id, p.nama, p.username, p.wilayah_id, p.role_id, p.score, p.password, p.create_time, p.write_time, c.nama as create_user, w.nama as write_user, r.nama as role_name')
            ->from('pengguna p')
            ->where('p.deleted',0)
            ->join('pengguna c', 'c.id = p.create_id')
            ->join('pengguna w', 'w.id = p.write_id')
            ->join('role r', 'r.id = p.role_id')
            ->get();
        return $query->result();
    }

    public function check_username_kembar($uname){
        $this->db->from('pengguna')
            ->where('username', strtoupper($uname))
            ->where('deleted', 0);
        $query = $this->db->count_all_results();
        if($query >= 1){
            return false;
        } else {
            return true;
        }
    }

    public function check_username_kembar_wid($uname, $id){
        $this->db->from('pengguna')
            ->where('username', strtoupper($uname))
            ->where('deleted', 0)
            ->where('id !=', $id);
        $query = $this->db->count_all_results();
        if($query >= 1){
            return false;
        } else {
            return true;
        }
    }
}
?>