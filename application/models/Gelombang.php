<?php
class Gelombang extends CI_Model
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

    public function insert($nama, $active, $create_uid){
        $nama = strtoupper($nama);
        $data = array(
            'nama' => $nama,
            'active' => $active,
            'create_id' => $create_uid,
            'create_time' => $this->get_now(),
            'write_id' => $create_uid,
            'write_time' => $this->get_now()
        );
        $query = $this->db->insert('gelombang', $data);
        return $query;
    }

    public function get($id){
        $query = $this->db->select('p.id, p.nama, p.active, p.create_time, p.write_time, c.nama as create_user, w.nama as write_user')
            ->from('gelombang p')
            ->where('p.deleted',0)
            ->join('pengguna c', 'c.id = p.create_id')
            ->join('pengguna w', 'w.id = p.write_id')
            ->where('p.id', $id)
            ->where('p.deleted',0)
            ->get();
        return $query->result();
    }

    public function update($nama, $active, $id, $write_uid){
        $nama = strtoupper($nama);
        $data = array(
            'nama' => $nama,
            'active' => $active,
            'write_id' => $write_uid,
            'write_time' => $this->get_now()
        );

        $this->db->where('id', $id);
        return $this->db->update('gelombang', $data);
    }

    public function delete($id, $write_uid){
        $data = array(
            'deleted' => 1,
            'write_id' => $write_uid,
            'write_time' => $this->get_now()
        );

        $this->db->where('id', $id);
        return $this->db->update('gelombang', $data);
    }

    public function show_all(){
        $query = $this->db->select('p.id, p.nama, p.active, p.create_time, p.write_time, c.nama as create_user, w.nama as write_user')
            ->from('gelombang p')
            ->where('p.deleted',0)
            ->join('pengguna c', 'c.id = p.create_id')
            ->join('pengguna w', 'w.id = p.write_id')
            ->get();
        return $query->result();
    }

    public function just_active($id, $write_uid){
        $data = array(
            'active' => 0,
            'write_id' => $write_uid,
            'write_time' => $this->get_now()
        );
        $this->db->update('gelombang', $data);
        $data = array(
            'active' => 1,
            'write_id' => $write_uid,
            'write_time' => $this->get_now()
        );
        $this->db->where('id', $id);
        return $this->db->update('gelombang', $data);
    }
}
?>