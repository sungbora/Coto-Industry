<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sampah_models extends CI_Model
{
  private $_table = "m_sampah";

  public $id;
  public $idUser_operator;
  public $idUser_pengguna;
  public $total_sampah;
  public $tanggal;
  public $jam_ambil;
  public $image;
  public $keterangan;
  public $poin;
  public $status;

  public function rules()
  {
    return [
      [
        'field' => 'idUser_pengguna',
        'label' => 'idUser_penggunas',
        'rules' => 'require|numeric'
      ]
    ];
  }

  public function getDataByIDOperatorToday()
  {
    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y-m-d');
    $query = $this->db->query("SELECT a.*, b.name, c.name as opName FROM m_sampah a, m_user b, user_super c where (a.idUser_pengguna = b.id and a.idUser_operator = c.id and a.idUser_operator = '" . $this->session->userdata('idUser') . "' and a.tanggal='$date') ");
    return $query->result();
  }

  public function getDataSampahAllToday()
  {
    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y-m-d');
    $query = $this->db->query("SELECT a.*, b.name, c.name as opName FROM m_sampah a, m_user b, user_super c where (a.idUser_pengguna = b.id and a.idUser_operator = c.id and a.tanggal='$date' ) ");
    return $query->result();
  }

  public function getDataSampahAll()
  {
    $query = $this->db->query("SELECT a.*, b.name, c.name as opName FROM m_sampah a, m_user b, user_super c where (a.idUser_pengguna = b.id and a.idUser_operator = c.id) ");
    return $query->result();
  }

  public function getDetailsSampah($id)
  {
    $query = $this->db->query("SELECT a.*, b.name, c.name as opName FROM m_sampah a, m_user b, user_super c where a.idUser_pengguna = b.id and a.idUser_operator = c.id and a.id = '" . $id . "' ");
    return $query->row();
  }

  public function getTotalUsers()
  {
    $query = $this->db->query("SELECT SUM(id) as totasUser FROM m_user b where is_active = 'aktif' ");
    return $query->row();
  }

  public function updateStatusSampah($id)
  {
    $query = $this->db->query("UPDATE `m_sampah` SET `status`=1, `poin`=2 WHERE id='$id' ");
    return $query;
  }

  public function getSampahByDateAll()
  {
    $tglawal = $_POST['tglAwalInputAdmin'];
    $tglakhir = $_POST['tglAkhirInputAdmin'];
    $query = $this->db->query("SELECT a.*, b.name, c.name as opName FROM m_sampah a, m_user b, user_super c where (a.idUser_pengguna = b.id and a.idUser_operator = c.id and a.tanggal BETWEEN '$tglawal' AND '$tglakhir')");
    return $query->result();
  }

  public function insert()
  {
    date_default_timezone_set('Asia/Jakarta');
    $post = $this->input->post();
    $this->idUser_operator = $this->session->userdata('idUser');
    $this->idUser_pengguna = $post["selectedUser"];
    $this->total_sampah    = $post["TotalSampah"];
    $this->tanggal         = date('Y-m-d');
    $this->jam_ambil       = date('H:i:s');
    $this->image           = $this->do_upload();
    $this->keterangan      = $post["keteranganInput"];
    $this->poin            = 0;
    $this->status          = 0;
    return $this->db->insert($this->_table, $this);
  }

  public function getTotalSampahOp()
  {
    $query = $this->db->query("SELECT SUM(total_sampah) as total FROM m_sampah where idUser_operator = '" . $this->session->userdata('idUser') . "' ");
    return $query->row();
  }

  public function getTotalSampah()
  {
    $query = $this->db->query("SELECT SUM(total_sampah) as total FROM m_sampah where `status` != 0");
    return $query->row();
  }

  public function do_upload()
  {
    $config['upload_path']          = './image/';
    $config['allowed_types']        = 'jpeg|jpg|png';
    $config['max_size']             = 90000;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if (!$this->upload->do_upload('imageInput')) {
      $error = array('error' => $this->upload->display_errors());
      print_r($error);
    } else {
      $data = $this->upload->data();
      return $data['file_name'];
    }
  }

  public function getDataUserAll()
  {
    $query = $this->db->query("SELECT * FROM m_user");
    return $query->result();
  }

  public function getDataUserByID($id)
  {
    $q = $this->db->query("SELECT * FROM `m_user` where id = '$id' ");
    return $q->row();
  }

  public function getTotalPoinUser($id)
  {
    $q = $this->db->query("SELECT poin FROM `m_sampah` where idUser_pengguna = '$id' and status = 1");
    return $q->row();
  }

  public function getDataUserSuper()
  {
    $query = $this->db->query("SELECT * FROM user_super");
    return $query->result();
  }

  public function deleteSampah($id)
  {
    return $this->db->query("DELETE FROM `m_sampah` WHERE id='$id' ");
  }
}
