<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  Class Login_models extends CI_Model
  {
    private $_table = "m_user";

    public $id;
    public $username;
    public $password;
    public $email;
    public $name;
    public $tel_number;
    public $province;
    public $city;
    public $districts;
    public $address;
    public $group_user;
    public $is_active;

    public function getAll()
    {
      return $this->db->get($this->_table)->result();
    }

    public function getProfileUserSuper()
    {
      $query = $this->db->query("SELECT * FROM `user_super` WHERE id='".$this->session->userdata('idUser')."' ");
      return $query->row();
    }

    public function loginCheck($username, $password)
    {
      $query = $this->db->query("SELECT * FROM `m_user` WHERE `username` ='$username' and `password` = '$password' and `is_active`='aktif' ");
      $query->num_rows() == 1 ? $rt = $query->result() : $rt = false;
      return $rt;
    }

    public function loginCheckSuper($username, $password)
    {
      $query = $this->db->query("SELECT * FROM `user_super` WHERE `username` ='$username' and `password` = '$password' and `is_active`='aktif' ");
      $query->num_rows() == 1 ? $rt = $query->result() : $rt = false;
      return $rt;
    }

    public function ListUser()
    {
      $this->db->select('*');
      $this->db->from('m_user');
      $this->db->where('group_user', 'user');
      $query = $this->db->get()->result();

      return $query;
    }

    public function acceptUser($id)
    {
      return $this->db->query("UPDATE `m_user` SET `is_active`='aktif' WHERE id='$id'");
    }

    public function acceptSuperUser($id)
    {
      return $this->db->query("UPDATE `user_super` SET `is_active`='aktif' WHERE id='$id'");
    }

    public function createSuperUser()
    {
      $usm = $_POST['usmCreate'];
      $psw = $_POST['pswCreate'];
      $name = $_POST['nmCreate'];
      $level = $_POST['lvlCreate'];
      $is_active = 'aktif';

      $query = $this->db->query("INSERT INTO `user_super`(`username`, `password`, `name`, `level`, `is_active`) VALUES ('$usm','$psw','$name','$level','$is_active')");
      return $query;
    }

    public function deleteAkunSuper($id)
    {
      return $this->db->query("DELETE FROM `user_super` WHERE id='$id' ");
    }

    public function deleteAkunUser($id)
    {
      return $this->db->query("DELETE FROM `user_super` WHERE id='$id' ");
    }

    public function updateUserAkun()
    {
      $id = $_POST['idPostUA'];
      $name = $_POST['nmPostUA'];
      $usm = $_POST['usmPostUA'];
      $tel = $_POST['nmbrPostUA'];

      $this->db->query("UPDATE `m_user` SET `username`='$usm',`name`='$name',`tel_number`='$tel' WHERE `id`='$id' ");
    }

    public function updateAddressAkun()
    {
      $id = $_POST['selectPostid'];
      $prov = $_POST['selectPostProv'];
      $provName = explode("~", $prov);
      $city = $_POST['selectPostKota'];
      $cityName = explode("~", $city);
      $kecamatan = $_POST['selectPostKec'];
      $kecamatanName = explode("~", $kecamatan);

      $address = $_POST['selectPostAdd'];

      $this->db->query("UPDATE `m_user` SET `province`='$provName[1]',`city`='$cityName[1]',`districts`='$kecamatanName[1]',`address`='$address' WHERE `id`='$id' ");
    }

    public function getProvinsi()
    {
      return $this->db->query("SELECT `provinsi_id`, `nama_provinsi` FROM `m_provinsi`")->result();
    }

    public function getKotaByID($id)
    {
      return $this->db->query("SELECT * FROM `m_kabupaten` where `provinsi_id`='$id' ")->result();
    }

    public function getKecamatan($id)
    {
      return $this->db->query("SELECT * FROM `m_kecamatan` where `kabupaten_id`='$id' ")->result();
    }
  }

?>