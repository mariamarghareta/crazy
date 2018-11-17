<?php
class Jwbpertanyaan extends CI_Model
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

    public function insert($soal, $jawab, $create_uid){
        $data = array(
            'soal_id' => $soal,
            'jawaban' => $jawab,
            'pengguna_id' => $create_uid,
            'create_id' => $create_uid,
            'create_time' => $this->get_now(),
            'write_id' => $create_uid,
            'write_time' => $this->get_now()
        );
        $query = $this->db->insert('jawabpertanyaan', $data);
        return $query;
    }

    public function get_answer($soal, $id){
        $query = $this->db->select('p.id, p.jawaban')
            ->from('jawabpertanyaan p')
            ->where('p.pengguna_id',$id)
            ->where('p.soal_id', $soal)
            ->where('p.deleted',0)
            ->get();
        return $query->result();
    }
}
?>