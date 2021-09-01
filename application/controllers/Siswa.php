<?php

defined('BASEPATH') or exit('No direct script access allowed');

class siswa extends CI_Controller
{

    public function index()
    {
        $data['pengumumansiswa'] = $this->siswa_model->getPengumumanSiswa()->result();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/dashboard');
        $this->load->view('part/footer');
    }
    public function TampilPengumuman($id)
    {
        $data['pengumuman'] = $this->siswa_model->getDetailPengumuman($id)->result();
        $data['author'] = $this->siswa_model->getPengajar($data['pengumuman'][0]->pengajar_id)->result();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        // print_r($data);
        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/pengumuman/DetailPengumuman', $data);
        $this->load->view('part/footer');
    }
    public function profile()
    {
        $data['profile'] = $this->siswa_model->getProfileSiswa($this->session->userdata('id'))->result();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/profile', $data);
        $this->load->view('part/footer');
    }
    public function updateprofile($id)
    {
        $data = array(
            'nis' => $this->input->post('NIS'),
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jk'),
            'tempat_lahir' => $this->input->post('tempatlahir'),
            'tgl_lahir' => $this->input->post('tgllahir'),
            'alamat' => $this->input->post('alamat'),
            'agama' => $this->input->post('agama'),
            'tahun_masuk' => $this->input->post('tahunmasuk'),
        );
        $this->siswa_model->updateProfile($data, $id);
        redirect('siswa/profile');
    }

    public function updateGambar()
    {
        $config['upload_path'] = './assets/images/user/';
        $config['allowed_types'] = 'jpg|jpeg|png';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('file-input');
        if (!$upload) {
            $data['profile'] = $this->siswa_model->getProfileSiswa($this->session->userdata('id'))->result();
            $this->session->set_flashdata('error', $this->upload->display_errors());

            $this->load->view('part/header');
            $this->load->view('part/sidebarsiswa', $data);
            $this->load->view('siswa/profile', $data);
            $this->load->view('part/footer');
        } else {
            $upload = $this->upload->data();
            $data = array(
                'foto' => $upload['file_name'],
            );
            $array = array(
                'foto' => $upload['file_name'],
            );
            $this->session->set_userdata($array);
            $this->siswa_model->updateImage($data, $this->session->userdata('id'));
            redirect('siswa/profile');
        }
    }

    public function Pesan()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['pesan'] = $this->siswa_model->pesan($this->session->userdata('idLogin'))->result();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/pesan', $data);
        $this->load->view('part/footer');
    }

    public function jadwalMapel($id)
    {
        $data['hari'] = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat");
        $data['day'] = $id;
        $data['kelas'] = $this->siswa_model->getKelas($this->session->userdata('id'))->result();
        $data['jadwal'] = $this->siswa_model->jadwalPelajaran($this->session->userdata('id'), $id)->result();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/jadwalpelajaran', $data);
        $this->load->view('part/footer');
    }

    public function tugas()
    {
        $data['data'] = $this->siswa_model->getAllKelas()->result();
        $data['kelas'] = $this->siswa_model->getKelas($this->session->userdata('id'))->result();
        $data['mapel'] = $this->siswa_model->getMapelKelas()->result();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/tugas/tugaskelas');
        $this->load->view('part/footer');
    }

    public function listTugas($kelas, $mapelid)
    {
        $data['idkelas'] = $kelas;
        $data['mapelid'] = $mapelid;
        $data['mapel'] = $this->siswa_model->view_where('el_mapel', array('id' => $mapelid))->result();
        $data['materi'] = $this->siswa_model->getTugasKelas($kelas, $mapelid)->result();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/tugas/listtugas', $data);
        $this->load->view('part/footer');
    }
    public function detailTugas($idtugas, $mapelid, $kelas)
    {
        $data['materi'] = $this->pengajar_model->view_where('el_tugas', array('id' => $idtugas))->result();
        $data['nilai'] = $this->pengajar_model->view_where('el_tugas_kumpul', array('tugas_id' => $idtugas, 'siswa_id' => $this->session->userdata('id')))->result();
        $data['kelasid'] = $kelas;
        $data['mapelid'] = $mapelid;
        $data['tugasid'] = $idtugas;
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/tugas/detailtugas', $data);
        $this->load->view('part/footer');
    }
    public function uploadTugas()
    {
        $idsiswa = $this->session->userdata('id');
        $idkelas = $this->input->post('idkelas');
        $idtugas = $this->input->post('idtugas');
        $idmapel = $this->input->post('idmapel');

        $config['upload_path'] = './assets/tugas/';
        $config['allowed_types'] = '*';

        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('materi');
        if (!$upload) {
            $data['error'] = $this->upload->display_errors();
            $data['materi'] = $this->pengajar_model->view_where('el_tugas', array('id' => $idtugas))->result();
            $data['idkelas'] = $idkelas;
            $data['mapelid'] = $idmapel;
            $data['tugasid'] = $idtugas;
            $this->load->view('part/header');
            $this->load->view('part/sidebarsiswa', $data);
            $this->load->view('siswa/tugas/detailtugas', $data);
            $this->load->view('part/footer');
        } else {
            $upload = $this->upload->data();
            $kumpul = array(
                'kelas_id' => $idkelas,
                'siswa_id' => $idsiswa,
                'tugas_id' => $idtugas,
                'file' => $upload['file_name'],
                'nilai' => 0,
            );
            $this->session->set_flashdata('success', 'Tugas Berhasil di upload tinggal menunggu hasil nilai');
            $this->pengajar_model->insert($kumpul, 'el_tugas_kumpul');
            redirect('siswa/detailTugas/' . $idtugas . '/' . $idmapel . '/' . $idkelas);
        }

    }

    public function materi()
    {
        $data['data'] = $this->siswa_model->getAllKelas()->result();
        $data['kelas'] = $this->siswa_model->getKelas($this->session->userdata('id'))->result();
        $data['mapel'] = $this->siswa_model->getMapelKelas()->result();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/materi/materikelas');
        $this->load->view('part/footer');
    }

    public function listMateri($kelas, $mapelid)
    {
        $data['idkelas'] = $kelas;
        $data['mapelid'] = $mapelid;
        $data['mapel'] = $this->siswa_model->view_where('el_mapel', array('id' => $mapelid))->result();
        $data['materi'] = $this->siswa_model->getMateriKelas($kelas, $mapelid)->result();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/materi/listmateri', $data);
        $this->load->view('part/footer');
    }
    public function detailMateri($idmateri)
    {
        $data['materi'] = $this->siswa_model->view_where('el_materi', array('id' => $idmateri))->result();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/materi/detailmateri', $data);
        $this->load->view('part/footer');
    }

    public function download($nama)
    {
        $pth = file_get_contents(base_url() . "assets/tugas/" . $nama);
        force_download($nama, $pth);
    }

    public function filterPengajar()
    {
        $daftarFilter = array();
        $daftarKelamin = array();
        if ($this->input->post()) {
            $daftarKelamin = $this->input->post('jeniskelamin');
            $daftarFilter = array(
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempatLahir'),
                'tgl_lahir' => $this->input->post('tahun') . '-' . $this->input->post('bulan') . '-' . $this->input->post('tanggal'),
                'alamat' => $this->input->post('alamat'),
                'is_admin' => $this->input->post('opsi'),
            );
        }
        $data['nama'] = $this->session->userdata('nama');
        $dataFilter['data'] = $this->siswa_model->filterPengajar($daftarFilter, $daftarKelamin)->result();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/filterPengajar', $dataFilter);
        $this->load->view('part/footer');
    }

    public function filterSiswa()
    {
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();
        $daftarFilter = array();
        $daftarKelamin = array();
        $daftarAgama = array();
        $daftarKelas = array();
        if ($this->input->post()) {
            $daftarKelas = $this->input->post('kelas');
            $daftarAgama = $this->input->post('agama');
            $daftarKelamin = $this->input->post('jeniskelamin');
            $daftarFilter = array(
                'nis' => $this->input->post('nis'),
                'nama' => $this->input->post('nama'),
                'tahun_masuk' => $this->input->post('tahunMasuk'),
                'tempat_lahir' => $this->input->post('tempatLahir'),
                'tgl_lahir' => $this->input->post('tahun') . '-' . $this->input->post('bulan') . '-' . $this->input->post('tanggal'),
                'alamat' => $this->input->post('alamat'),
                'status_id' => $this->input->post('statusSiswa'),
            );
        }
        $data['nama'] = $this->session->userdata('nama');
        // echo "<pre>";
        // print_r($daftarFilter);
        // echo "</pre>";
        // echo "<pre>";
        // print_r($daftarKelas);
        // echo "</pre>";
        // echo "<pre>";
        // print_r($daftarAgama);
        // echo "</pre>";
        // echo "<pre>";
        // print_r($daftarKelamin);
        // echo "</pre>";
        $dataFilter['data'] = $this->siswa_model->filterSiswa($daftarFilter, $daftarKelamin, $daftarAgama, $daftarKelas, $this->session->userdata('kelas_id'))->result();
        // echo "<pre>";
        // print_r($dataFilter);
        // echo "</pre>";
        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/filterSiswa', $dataFilter);
        $this->load->view('part/footer');
    }
    public function detailFilterSiswa($id)
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['siswa'] = $this->siswa_model->view_where('el_siswa', array('id' => $id))->result();
        $data['kelas'] = $this->siswa_model->getKelasSiswa($id)->result();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/detailFilterSiswa', $data);
        $this->load->view('part/footer');
    }
    public function detailFilterPengajar($id)
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['pengajar'] = $this->siswa_model->view_where('el_pengajar', array('id' => $id))->result();
        $data['jadwal'] = $this->siswa_model->jadwalPengajar($id)->result();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/detailFilterPengajar', $data);
        $this->load->view('part/footer');
    }
    public function tambahPesan()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['tujuan'] = $this->siswa_model->get_tujuan_guru()->result();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        // print_r($data);
        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/tambahPesan', $data);
        $this->load->view('part/footer');
    }
    public function savePesan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $values = array(
            'type_id' => 1,
            'content' => $this->input->post('isiPesan'),
            'owner_id' => $this->session->userdata('idLogin'),
            'sender_receiver_id' => $this->input->post('tujuan'),
            'date' => date('Y-m-d H:i:s'),
            'opened' => 0,
        );
        $this->siswa_model->insert($values, 'el_messages');
        redirect(base_url() . 'siswa/detailPesan/' . $this->session->userdata('idLogin') . '/' . $this->input->post('tujuan'));
    }
    public function detailPesan($send, $receive)
    {
        $data['nama'] = $this->session->userdata('nama');
        $penerima = $this->siswa_model->view_where('el_login', array('id' => $receive))->result();
        $data['receiver'] = $penerima[0]->id;
        $data['receiver_username'] = $penerima[0]->username;
        $data['isi'] = $this->siswa_model->isiPesan($send, $receive)->result();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/detailPesan', $data);
        $this->load->view('part/footer');
    }
    public function ujian()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['ujian'] = $this->siswa_model->getUjianSiswa($this->session->userdata('id'))->result();
        $data['jawaban'] = $this->siswa_model->view_where('el_jawaban', array('id_siswa' => $this->session->userdata('id')))->result();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/ujian', $data);
        $this->load->view('part/footer');
    }
    public function masukUjian($id, $waktu)
    {
        $data['questions'] = $this->siswa_model->getSoalUjian($id)->result();
        $questionsCount = count($data['questions']);
        $data['totalSoal'] = $questionsCount;
        if ($data['questions'][0]->id_soal == null) {
            redirect('siswa/ujian');
        }

        $data['soalPertama'] = $data['questions'][0]->id_soal;
        $data['soalTerakhir'] = $data['questions'][$questionsCount - 1]->id_soal;
        $data['questionCount'] = 0;

        $q = 0;
        if ($this->input->get('q') !== null && $this->input->get('page') !== null) {
            if ($this->input->get('page') == 'next') {
                for ($i = 0; $i < count($data['questions']); $i++) {
                    if ($this->input->get('q') == $data['questions'][$i]->id_soal) {
                        $q = $data['questions'][$i + 1]->id_soal !== null ? $data['questions'][$i + 1]->id_soal : $data['soalTerakhir'];
                        $data['questionCount'] = $i + 1 > $questionsCount ? $questionsCount : $i + 1;
                    }
                }
            } else {
                for ($i = 0; $i < count($data['questions']); $i++) {
                    if ($this->input->get('q') == $data['questions'][$i]->id_soal) {
                        $q = $data['questions'][$i - 1]->id_soal !== null ? $data['questions'][$i - 1]->id_soal : $data['soalPertama'];
                        $data['questionCount'] = $i - 1 <= 0 ? 1 : $i - 1;
                    }
                }
            }
        } else if ($this->input->get('q') !== null) {
            $q = $this->input->get('q');
            for ($i = 0; $i < count($data['questions']); $i++) {
                if ($this->input->get('q') == $data['questions'][$i]->id_soal) {
                    $data['questionCount'] = $i + 1;
                }
            }

        } else {
            $q = $data['soalPertama'];
            $data['questionCount'] = 1;
        }

        date_default_timezone_set('Asia/Jakarta');

        $data['nama'] = $this->session->userdata('nama');
        $data['id_ujian'] = $id;
        $data['waktu'] = date('Y-m-d H:i', strtotime('+' . $waktu . ' minutes', strtotime(date('Y-m-d H:i'))));
        $data['ujian'] = $this->siswa_model->getmasukUjianSiswa($id)->row();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();
        $data['soal_ujian'] = $this->siswa_model->getPerSoal($id, $q);

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/halamanSoal', $data);
        $this->load->view('part/footer');
    }

    public function koreksiUjian($id_siswa, $id_ujian)
    {
        date_default_timezone_set('Asia/Jakarta');
        $soal_ujian = $this->siswa_model->getSoalUjian($id_ujian)->result();

        $soal_pg = $this->siswa_model->getSoalUjianPG($id_ujian)->result();

        $soal_file = $this->siswa_model->getSoalUjianFile($id_ujian)->result();

        // var_dump($soal_pg);die();

        $soal_essay = $this->siswa_model->getSoalUjianEssay($id_ujian)->result();

        $jumlah_pg = count($soal_pg);
        $jumlah_essay = count($soal_essay);

        $jumlah_soal = count($soal_ujian);

        $jawaban = array();
        $nilai = 0;
        $data = $this->session->userdata('id_ujian') ? $this->session->userdata('id_ujian') : '';

        for ($i = 0; $i < $jumlah_soal; $i++) {
            $jawaban[] = $soal_ujian[$i]->id_soal . ':' . $data['id_ujian']['jawaban'][$soal_ujian[$i]->id_soal];
            if ($soal_ujian[$i]->tipe == 1) {
                if ($soal_ujian[$i]->jawaban_pg == $data['id_ujian']['jawaban'][$soal_ujian[$i]->id_soal]) {
                    $nilai += 1;
                }
            }
        }

        $tes_jawaban = implode(',', $jawaban);

        // $nilai_total=( ($nilai/3) / $jumlah_soal ) *100;

        if ($jumlah_essay > 0) {
            $nilai_total = (($nilai / $jumlah_pg)) * 70;
        } else if ($jumlah_essay == 0) {
            $nilai_total = (($nilai / $jumlah_pg)) * 100;
        }

        // var_dump($_FILES['file_word']['name']);die();

        $dataJawaban = array(
            'id_ujian' => $id_ujian,
            'id_siswa' => $id_siswa,
            'jawaban' => $tes_jawaban,
            // 'jawaban_file' => $tes_jawaban,
            'nilai_pg' => $nilai_total,
            'nilai_total' => $nilai_total,
            'jumlah_soal' => $jumlah_soal,
            'tgl' => date('Y-m-d H:i'),
        );

        $config['upload_path'] = './assets/images/jawaban_file/';
        $config['allowed_types'] = 'docs|docx';
        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('file_word');
        if ($upload) {
            $upload = $this->upload->data();
            $datagambar = array(
                'jawaban_file' => $upload['file_name'],
            );
            $dataJawaban = array_merge($dataJawaban, $datagambar);
        } else {
            $dataJawaban = $dataJawaban;
        }

        print_r($nilai_total);

        $this->siswa_model->insert($dataJawaban, 'el_jawaban');
        $this->session->unset_userdata('id_ujian');
        redirect('siswa/ujian');
        // echo $nilai;
        // echo "<hr>";
        // echo $tes_jawaban;
        // echo "<hr>";
        // echo $id_ujian;
        // echo $id_siswa;
        // $no_soal=$soal_ujian[0]->id_soal;
        // echo $this->input->post($no_soal);
    }

    public function hapusPesan($id, $sender, $receiver)
    {
        $this->pengajar_model->delete(array('id' => $id), 'el_messages');
        redirect('siswa/detailPesan/' . $sender . '/' . $receiver);
    }

    public function absen()
    {
        $data['data'] = $this->siswa_model->getAllKelas()->result();
        $data['kelas'] = $this->siswa_model->getKelas($this->session->userdata('id'))->result();
        $data['mapel'] = $this->siswa_model->getMapelKelas()->result();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/absen/absenkelas');
        $this->load->view('part/footer');
    }

    public function listAbsen($kelas, $mapel)
    {
        $data['absen'] = $this->siswa_model->absensi($kelas, $mapel, $this->session->userdata('id'))->result();
        $data['count_ujian'] = $this->siswa_model->getUjianSiswaSelesai($this->session->userdata('id'))->result();
        $data['count_tugas'] = $this->siswa_model->notif_tugas($this->session->userdata('id'))->result();
        $data['count_materi'] = $this->siswa_model->notif_materi($this->session->userdata('id'))->result();

        $this->load->view('part/header');
        $this->load->view('part/sidebarsiswa', $data);
        $this->load->view('siswa/absen/keteranganabsen');
        $this->load->view('part/footer');
    }

    public function updateJawaban()
    {
        $getContent = json_decode(file_get_contents('php://input'));

        $idUjian = $getContent->id_ujian;
        $idSiswa = $getContent->id_siswa;
        $idSoal = $getContent->id_soal;
        $jawaban = $getContent->jawaban;
        $nilai_essay = $getContent->nilai_essay == null ? 0 : $getContent->nilai_essay;
        $nilai_total = $getContent->nilai_total == null ? 0 : $getContent->nilai_total;
        $jumlah_soal = $getContent->jumlah_soal == null ? 0 : $getContent->jumlah_soal;
        $tgl = $getContent->tgl == null ? 0 : $getContent->tgl;
        // $this->session->unset_userdata('id_ujian');
        // die;

        if ($this->session->userdata('id_ujian')) {
            $data = $this->session->userdata('id_ujian');
            // print_r($data);
            if (array_key_exists($idSoal, $data['id_ujian']['jawaban'])) {
                $data['id_ujian']['jawaban'][$idSoal] = $jawaban;
            } else {
                echo "Else";
                $data['id_ujian']['jawaban'][$idSoal] = $jawaban;
            }

            $this->session->set_userdata('id_ujian', $data);
        } else {
            $data = [
                "id_ujian" => [
                    "jawaban" => [$idSoal => $jawaban],
                ],
            ];

            $this->session->set_userdata('id_ujian', $data);
        }

        var_dump($this->session->userdata('id_ujian'));

    }
}