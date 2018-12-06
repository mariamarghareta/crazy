<?php
class Pertanyaan extends CI_Model
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

    public function insert($q, $a, $gel, $create_uid){
        $q = strtoupper($q);
        //0=inactive, 1=active, 2=done
        $data = array(
            'pertanyaan' => $q,
            'jawaban' => $a,
            'gelombang_id' => $gel,
            'active' => 0,
            'urutan_soal' => $this->next_sequence(),
            'create_id' => $create_uid,
            'create_time' => $this->get_now(),
            'write_id' => $create_uid,
            'write_time' => $this->get_now()
        );
        $query = $this->db->insert('pertanyaan', $data);
        return $query;
    }

    public function get($id){
        $query = $this->db->select('p.id, p.pertanyaan, p.jawaban, p.gelombang_id, p.active, p.create_time, p.write_time, c.nama as create_user, w.nama as write_user, g.nama as gelombang_name')
            ->from('pertanyaan p')
            ->where('p.deleted',0)
            ->join('pengguna c', 'c.id = p.create_id')
            ->join('pengguna w', 'w.id = p.write_id')
            ->join('gelombang g', 'g.id = p.gelombang_id')
            ->where('p.id', $id)
            ->where('p.deleted',0)
            ->get();
        return $query->result();
    }

    public function update($q, $a, $g, $id, $write_uid){
        $q = strtoupper($q);
        $data = array(
            'pertanyaan' => $q,
            'jawaban' => $a,
            'gelombang_id' => $g,
            'write_id' => $write_uid,
            'write_time' => $this->get_now()
        );

        $this->db->where('id', $id);
        return $this->db->update('pertanyaan', $data);
    }

    public function delete($id, $write_uid){
        $data = array(
            'deleted' => 1,
            'write_id' => $write_uid,
            'write_time' => $this->get_now()
        );

        $this->db->where('id', $id);
        return $this->db->update('pertanyaan', $data);
    }

    public function show_all(){
        $query = $this->db->select('p.id, p.pertanyaan, p.jawaban, p.gelombang_id, p.active, p.create_time, p.write_time, c.nama as create_user, w.nama as write_user, g.nama as gelombang_name, p.urutan_soal, p.show_jawaban')
            ->from('pertanyaan p')
            ->where('p.deleted',0)
            ->join('pengguna c', 'c.id = p.create_id')
            ->join('pengguna w', 'w.id = p.write_id')
            ->join('gelombang g', 'g.id = p.gelombang_id')
            ->get();
        return $query->result();
    }

    public function get_gelombang_active(){
        $query = $this->db->select('p.id, p.pertanyaan, p.jawaban, p.gelombang_id, p.active, p.create_time, p.write_time, c.nama as create_user, w.nama as write_user, g.nama as gelombang_name, p.urutan_soal, p.show_jawaban')
            ->from('pertanyaan p')
            ->join('pengguna c', 'c.id = p.create_id')
            ->join('pengguna w', 'w.id = p.write_id')
            ->join('gelombang g', 'g.id = p.gelombang_id')
            ->where('p.deleted',0)
            ->where('g.active',1)
            ->order_by('p.urutan_soal asc')
            ->get();
        return $query->result();
    }

    public function next_sequence(){
        $this->db->from('pertanyaan p')
            ->join('gelombang g', 'g.id = p.gelombang_id')
            ->where('p.deleted', 0);
        $query = $this->db->count_all_results();
        return $query + 1;
    }

    public function just_active($id, $gelombang_id, $write_uid){
        $data = array(
            'active' => 0,
            'show_jawaban' => 0,
            'write_id' => $write_uid,
            'write_time' => $this->get_now()
        );
        $this->db->where('active', 1);
        $this->db->update('pertanyaan', $data);

        $data = array(
            'active' => 1,
            'write_id' => $write_uid,
            'write_time' => $this->get_now()
        );
        $this->db->where('id', $id);
        return $this->db->update('pertanyaan', $data);
    }

    public function close($id, $gelombang_id, $write_uid){
        $data = array(
            'active' => 0,
            'show_jawaban' => 0,
            'write_id' => $write_uid,
            'write_time' => $this->get_now()
        );
        $this->db->where('id', $id);
        return $this->db->update('pertanyaan', $data);
    }

    public function done($id, $gelombang_id, $write_uid){
        $data = array(
            'active' => 0,
            'is_close' => 1,
            'write_id' => $write_uid,
            'write_time' => $this->get_now()
        );
        $this->db->where('id', $id);
        return $this->db->update('pertanyaan', $data);
    }

    public function show_answer($id, $gelombang_id, $write_uid){
        $data = array(
            'show_jawaban' => 0,
            'active' => 0,
            'write_id' => $write_uid,
            'write_time' => $this->get_now()
        );
        $this->db->where('show_jawaban', 1);
        $this->db->update('pertanyaan', $data);

        $data = array(
            'show_jawaban' => 1,
            'active' => 1,
            'write_id' => $write_uid,
            'write_time' => $this->get_now()
        );
        $this->db->where('id', $id);
        return $this->db->update('pertanyaan', $data);
    }

    public function get_active_question(){
        $query = $this->db->select('p.id, p.pertanyaan, p.jawaban, p.gelombang_id, p.active, p.create_time, p.write_time, c.nama as create_user, w.nama as write_user, g.nama as gelombang_name, p.urutan_soal, p.show_jawaban, p.is_close')
            ->from('pertanyaan p')
            ->join('pengguna c', 'c.id = p.create_id')
            ->join('pengguna w', 'w.id = p.write_id')
            ->join('gelombang g', 'g.id = p.gelombang_id')
            ->where('p.deleted',0)
            ->where('p.active',1)
            ->order_by('p.urutan_soal asc')
            ->get();
        return $query->result();
    }
}
?>