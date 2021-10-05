<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
  function __construct() {
    parent::__construct();
    $this->load->model('Login_models');
  }

  public function index()
  {
    $this->load->view('v_login');
  }

  public function super()
  {
    $this->load->view('v_super');
  }

  public function Logout()
  {
    redirect('login/Login');
  }

  public function LoginCheckSuper()
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ceklogin = $this->Login_models->loginCheckSuper($username, $password);

    if($ceklogin) {
      foreach ($ceklogin as $row) {
        $sess = [
          "id" => $this->session->set_userdata('idUser',$row->id),
          "usm" => $this->session->set_userdata('username',$row->username),
          "name" => $this->session->set_userdata('nama',$row->name),
          "groups" => $this->session->set_userdata('level',$row->level)
        ];
      }

      echo "<script>alert('Berhasil Login!');</script>";

      switch ($row->level) {
        case 'admin':
          $this->session->set_userdata($sess);
          redirect('admin/Dashboard/admin');
          break;
        
        case 'operator':
          $this->session->set_userdata($sess);
          redirect('admin/Dashboard/op');
          break;
      }
    } else {
      echo "<script>alert('Username Atau Password Salah!');document.location='index' </script>";
      redirect('login/Login/super');
    }
  }

  public function LoginCheck() {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ceklogin = $this->Login_models->loginCheck($username, $password);

    if($ceklogin) {
      foreach ($ceklogin as $row) {
        $sess = [
          "id" => $this->session->set_userdata('idUser',$row->id),
          "usm" => $this->session->set_userdata('username',$row->username),
          "name" => $this->session->set_userdata('nama',$row->name),
          "groups" => $this->session->set_userdata('level',$row->group_user)
        ];
      }

      echo "<script>alert('Berhasil Login!');document.location='index' </script>";

      switch ($row->group_user) {
        case 'user':
          $this->session->set_userdata($sess);
          redirect('admin/Dashboard');
          break;
      }
    } else {
      echo "<script>alert('Username Atau Password Salah!');document.location='index' </script>";
      redirect('login/Login');
    }
  }

  public function CreateUseSuper()
  {
    $this->Login_models->createSuperUser();
    redirect('admin/Dashboard/ListUserSuper');
  }

  public function DeleteAkunUser($id)
  {
    $this->Login_models->deleteAkunSuper($id);
    redirect('admin/Dashboard/ListUserAkun');
  }

  public function DeleteSuperAkun()
  {
    $id = $_POST['idPostSA'];
    $this->Login_models->deleteAkunSuper($id);
    redirect('admin/Dashboard/ListUserSuper');
  }

  public function getKabupaten()
  {
    $id = $_POST['idProv'];
    $query = $this->Login_models->getKotaByID($id);
    echo '<option value="">- pilih kota/kabupaten -</option>';
    foreach ($query as $value) echo '<option value="'.$value->kabupaten_id.'~'.$value->nama_kabupaten.'">'.$value->nama_kabupaten.'</option>';
  }

  public function getKecamatan()
  {
    $id = $_POST['idKec'];
    $query = $this->Login_models->getKecamatan($id);
    echo '<option value="">- pilih kecamatan -</option>';
    foreach ($query as $value) echo '<option value="'.$value->kecamatan_id.'~'.$value->nama_kecamatan.'">'.$value->nama_kecamatan.'</option>';
  }

  public function UpdateDataAkun()
  {
    $this->Login_models->updateUserAkun();
    redirect('admin/Dashboard/DetailUserAkun/' . $this->session->userdata('segementri'));
  }

  public function UpdateAdressAkun()
  {
    $this->Login_models->updateAddressAkun();
    redirect('admin/Dashboard/DetailUserAkun/' . $this->session->userdata('segementri'));
  }

  public function getSegment()
  {
    $post = $this->input->post();
    $this->session->set_userdata('segementri', $post['segment']);
  }
}
