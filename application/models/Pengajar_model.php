<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pengajar_model extends CI_Model
{
    public function update($data, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function getPengumumanGuru()
    {
        $this->db->where('tampil_pengajar', '1');
        return $this->db->get('el_pengumuman');
    }

    public function getDetailPengumuman($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('el_pengumuman');
    }
    public function getPengajar($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('el_pengajar');
    }
    public function getProfilePengajar($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('el_pengajar');
    }
    public function view($table)
    {
        return $this->db->get($table);
    }
    public function view_where($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    public function pesan($id)
    {
        // $this->db->select("el_messages.id,owner_id,sender_receiver_id,el_siswa.nama,el_messages.date FROM el_messages JOIN el_siswa ON el_siswa.id=el_messages.sender_receiver_id");
        // $this->db->from('el_messages');
        // $this->db->join('el_siswa','el_siswa.id=el_messages.sender_receiver_id');
        // $this->db->where("el_messages.owner_id",$this->session->userdata('id'));
        // $this->db->or_where("el_messages.sender_receiver_id",$this->session->userdata('id'));
        // $this->db->group_by("owner_id","sender_receiver_id");
        $query = $this->db->query("SELECT e1.username as pengirim,m.owner_id,m.content,m.sender_receiver_id,e2.username as penerima FROM el_login e1 JOIN el_messages m ON m.owner_id=e1.id JOIN el_login e2 ON e2.id=m.sender_receiver_id WHERE m.owner_id=$id or m.sender_receiver_id=$id GROUP BY e1.username order by m.date DESC");
        return $query;
    }
    public function isiPesan($send, $receive)
    {
        $query = "SELECT m.id as idpesan,e1.username as pengirim,m.owner_id,m.content,m.sender_receiver_id,e2.username as penerima,m.date
        FROM el_login e1
        JOIN el_messages m ON m.owner_id=e1.id
        JOIN el_login e2 ON e2.id=m.sender_receiver_id
        WHERE (m.owner_id=$send AND m.sender_receiver_id=$receive) OR (m.owner_id=$receive AND m.sender_receiver_id=$send) group by m.date order by m.date ASC";
        return $this->db->query($query);
    }
    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function updateProfile($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('el_pengajar', $data);
    }
    public function updateImage($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('el_pengajar', $data);
    }

    public function jadwalPelajaran($hari, $id)
    {
        $this->db->select('el_mapel.nama as mapel, el_pengajar.nama as pengajar, el_kelas.nama as nama_kelas, el_mapel_ajar.jam_mulai as jam_mulai, el_mapel_ajar.jam_selesai as jam_selesai');
        $this->db->join('el_mapel_kelas', 'el_mapel_kelas.id = el_mapel_ajar.mapel_kelas_id');
        $this->db->join('el_kelas', 'el_kelas.id = el_mapel_kelas.kelas_id');
        $this->db->join('el_mapel', 'el_mapel.id = el_mapel_kelas.mapel_id');
        $this->db->join('el_pengajar', 'el_pengajar.id = el_mapel_ajar.pengajar_id');
        $this->db->where('el_mapel_ajar.pengajar_id', $id);
        $this->db->where('el_mapel_ajar.hari_id', $hari);
        $this->db->where('el_mapel_kelas.mapel_id', $this->session->userdata('idmapel'));
        return $this->db->get('el_mapel_ajar');
    }

    // public function jadwalPelajaran($hari,$id)
    // {
    //     return $this->db->query('SELECT
    //     emk.id AS id,
    //     emk.kelas_id,
    //     em.nama AS mapel,
    //     emk.mapel_id,
    //     emk.aktif AS kelas_aktif,
    //     ema.jam_mulai,
    //     ema.id AS mapelajarid,
    //     ema.jam_selesai,
    //     ema.hari_id,
    //     ema.pengajar_id,
    //     ep.nama AS pengajar,
    //     ek.nama AS nama_kelas,
    //     eks.siswa_id,
    //     eks.aktif
    //     FROM
    //     el_mapel_kelas AS emk
    //     JOIN el_mapel AS em ON em.id = emk.mapel_id
    //     INNER JOIN el_mapel_ajar AS ema ON ema.mapel_kelas_id = emk.id
    //     INNER JOIN el_pengajar AS ep ON ema.pengajar_id = ep.id
    //     INNER JOIN el_kelas AS ek ON ek.id = emk.kelas_id
    //     INNER JOIN el_kelas_siswa AS eks ON ek.id = eks.kelas_id
    //     WHERE
    //     emk.aktif = 1 AND
    //     eks.aktif = 1 AND
    //     ema.aktif = 1 AND
    //     ema.hari_id = '.$hari.' AND
    //     ema.pengajar_id = '.$id.' AND
    //     emk.mapel_id = '.$this->session->userdata('idmapel').'
    //     ORDER BY
    //     ema.jam_mulai ASC

    //     ');
    // }

    public function getKelasPengajar($id)
    {
        return $this->db->query('SELECT DISTINCT mapel_kelas_id,el_mapel.nama as mapel,el_kelas.nama as kelas,kelas_id FROM el_mapel_ajar
            JOIN el_mapel_kelas on el_mapel_kelas.id=el_mapel_ajar.mapel_kelas_id
            JOIN el_mapel on el_mapel.id=el_mapel_kelas.mapel_id
            JOIN el_kelas on el_kelas.id=el_mapel_kelas.kelas_id
            WHERE el_mapel_ajar.pengajar_id=' . $id . ' AND el_mapel_kelas.aktif=1 AND el_mapel_kelas.mapel_id=' . $this->session->userdata('idmapel') . '');
    }

    public function getUjianGuru($id)
    {
        return $this->db->query('SELECT DISTINCT el_ujian.id,judul,tgl_dibuat,tgl_expired,waktu,el_ujian.mapel_kelas_id,el_mapel.nama as mapel,el_kelas.nama as kelas,kelas_id,el_mapel_ajar.pengajar_id,(SELECT COUNT(*) FROM el_jawaban WHERE el_jawaban.id_ujian = el_ujian.id) AS jumlah_jawaban
        FROM el_ujian
        JOIN el_mapel_kelas on el_mapel_kelas.id=el_ujian.mapel_kelas_id
        JOIN el_mapel_ajar on el_mapel_ajar.mapel_kelas_id = el_mapel_kelas.id
        JOIN el_mapel on el_mapel.id=el_mapel_kelas.mapel_id
        JOIN el_kelas on el_kelas.id=el_mapel_kelas.kelas_id
        WHERE el_ujian.pengajar_id=' . $id . '
        GROUP BY el_ujian.id');
    }

    public function getUjian($id, $idUjian)
    {
        return $this->db->query('SELECT DISTINCT el_ujian.id,judul,tgl_dibuat,tgl_expired,waktu,el_ujian.mapel_kelas_id,el_mapel.nama as mapel,el_kelas.nama as kelas,kelas_id,el_mapel_ajar.pengajar_id,(SELECT COUNT(*) FROM el_jawaban WHERE el_jawaban.id_ujian = el_ujian.id) AS jumlah_jawaban
        FROM el_ujian
        JOIN el_mapel_kelas on el_mapel_kelas.id=el_ujian.mapel_kelas_id
        JOIN el_mapel_ajar on el_mapel_ajar.mapel_kelas_id = el_mapel_kelas.id
        JOIN el_mapel on el_mapel.id=el_mapel_kelas.mapel_id
        JOIN el_kelas on el_kelas.id=el_mapel_kelas.kelas_id
        WHERE el_ujian.pengajar_id=' . $id . ' AND el_ujian.id = ' . $idUjian . '
        GROUP BY el_ujian.id');
    }
    public function getUjianDetail($id)
    {
        return $this->db->query('SELECT el_ujian.id,judul,tgl_dibuat,tgl_expired,waktu,mapel_kelas_id,el_mapel.nama as mapel,el_kelas.nama as kelas,kelas_id, is_verify FROM el_ujian
            JOIN el_mapel_kelas on el_mapel_kelas.id=el_ujian.mapel_kelas_id
            JOIN el_mapel on el_mapel.id=el_mapel_kelas.mapel_id
            JOIN el_kelas on el_kelas.id=el_mapel_kelas.kelas_id
            WHERE el_ujian.id=' . $id);
    }
    public function getSoalUjian($id)
    {
        return $this->db->query('SELECT * FROM el_ujian_soal JOIN el_soal USING(id_soal) JOIN el_banksoal USING(id_banksoal) WHERE el_ujian_soal.aktif=1 and el_ujian_soal.id_ujian=' . $id);
    }
    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function GetAllMapel()
    {
        return $this->db->get('el_mapel');
    }

    public function updateMapelPengajar($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('el_pengajar', $data);
    }

    public function getMapelPengajar($id)
    {
        return $this->db->get_where('el_pengajar', array('id' => $id))->row_array();
    }

    public function getKelas()
    {
        return $this->db->query("SELECT * FROM  el_kelas ORDER BY urutan");
    }
    public function getKelasId($id)
    {
        return $this->db->query("SELECT * FROM  el_kelas WHERE id = " . $id);
    }

    public function getMapelKelas()
    {
        $id = $this->session->userdata('id');
        $mapel_id = $this->session->userdata('idmapel');
        return $this->db->query("SELECT
        emk.id AS id,
        emk.kelas_id,
        em.nama,
        emk.mapel_id,
        emk.aktif AS kelas_aktif
        FROM
        el_mapel_kelas AS emk
        JOIN el_mapel AS em ON em.id = emk.mapel_id
        JOIN el_mapel_ajar AS ema ON ema.mapel_kelas_id = emk.id
        WHERE
        emk.aktif = 1 AND ema.pengajar_id = '$id' AND emk.mapel_id = '$mapel_id'");
    }

    public function getJadwalAjar()
    {
        $this->db->join('el_pengajar', 'el_pengajar.id = el_mapel_ajar.pengajar_id');
        $this->db->join('el_mapel_kelas', 'el_mapel_kelas.id = el_mapel_ajar.mapel_kelas_id');
        $this->db->where('el_mapel_ajar.pengajar_id', $this->session->userdata('id'));
        $this->db->where('el_mapel_kelas.mapel_id', $this->session->userdata('idmapel'));
        $this->db->where('el_mapel_ajar.aktif', '1');
        return $this->db->get('el_mapel_ajar');
    }

    public function getMateriKelas($kelas, $mapel, $id)
    {
        return $this->db->query('SELECT
        em.id,
        em.mapel_id,
        em.pengajar_id,
        em.judul,
        em.konten,
        em.file,
        em.tgl_posting,
        em.publish,
        em.views,
        emk.id AS id_materi_kelas,
        emk.kelas_id,
        ep.nama
        FROM
        el_materi AS em
        INNER JOIN el_materi_kelas AS emk ON emk.materi_id = em.id
        INNER JOIN el_pengajar AS ep ON ep.id = em.pengajar_id
        WHERE
        em.mapel_id = ' . $mapel . ' AND
        em.pengajar_id = ' . $id . ' AND
        emk.kelas_id = ' . $kelas);
    }

    public function hapusMateri($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('el_materi');

        $this->db->where('materi_id', $id);
        $this->db->delete('el_materi_kelas');
    }

    public function hapusTugas($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('el_tugas');

        $this->db->where('tugas_id', $id);
        $this->db->delete('el_tugas_kelas');
    }

    public function getTugasKelas($kelas, $mapel, $id)
    {
        return $this->db->query('SELECT
        et.id,
        et.mapel_id,
        et.pengajar_id,
        et.judul,
        etk.id AS idtugaskelas,
        etk.kelas_id,
        ep.nama,
        et.tgl_buat,
        et.durasi
        FROM
        el_tugas AS et
        INNER JOIN el_tugas_kelas AS etk ON etk.tugas_id = et.id
        INNER JOIN el_pengajar AS ep ON ep.id = et.pengajar_id
        WHERE
        et.mapel_id = ' . $mapel . ' AND
        et.pengajar_id = ' . $id . ' AND
        etk.kelas_id = ' . $kelas);

    }
    public function hasilUploadTugas($kelas, $id)
    {
        return $this->db->query('SELECT
        etk.file,
        etk.nilai,
        etk.id,
        es.nama,
        etk.siswa_id
        FROM
        el_tugas_kumpul AS etk
        INNER JOIN el_siswa AS es ON es.id = etk.siswa_id
        WHERE
        etk.kelas_id = ' . $kelas . ' AND
        etk.tugas_id = ' . $id);
    }

    public function updateNilai($data, $where)
    {
        $this->db->where('id', $where);
        $this->db->update('el_tugas_kumpul', $data);
    }

    public function absenSiswa($id)
    {
        return $this->db->query('SELECT
        es.nama,
        eas.absen_id,
        eas.siswa_id,
        eas.`status`,
        eas.id,
        es.nis
        FROM
        el_absen_siswa AS eas
        INNER JOIN el_siswa AS es ON eas.siswa_id = es.id
        WHERE
        eas.absen_id = ' . $id);
    }

    public function getPelajaranPengajar($id)
    {
        return $this->db->query("SELECT * FROM  el_mapel_ajar WHERE pengajar_id = " . $id);
    }

    public function getTugasPengajar($id)
    {
        return $this->db->query("SELECT * FROM el_tugas WHERE pengajar_id = " . $id);
    }

    public function getMateriPengajar($id)
    {
        return $this->db->query("SELECT * FROM el_materi WHERE pengajar_id = " . $id);
    }

    public function getUjianPengajar($id)
    {
        return $this->db->query("SELECT * FROM el_ujian WHERE pengajar_id = " . $id);
    }

    public function getMapel($id)
    {
        return $this->db->query("SELECT * FROM el_mapel WHERE id = " . $id);
    }

    public function getAbsenSiswa($id)
    {
        return $this->db->query('SELECT
        es.nama,
        eas.absen_id,
        eas.siswa_id,
        eas.`status`,
        eas.id,
        es.nis,
        ek.nama as nama_kelas,
        em.nama as nama_mapel
        FROM
        el_absen_siswa AS eas
        INNER JOIN el_siswa AS es ON eas.siswa_id = es.id
        INNER JOIN el_absen AS ea ON eas.absen_id = ea.id
        INNER JOIN el_kelas AS ek ON ek.id = ea.kelas_id
        INNER JOIN el_mapel AS em ON em.id = ea.mapel_id
        WHERE
        eas.absen_id = ' . $id);
    }

}

/* End of file Pengajar_Model.php */