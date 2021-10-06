<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");   
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  function __construct() {
    parent::__construct();
    $this->load->model('login/Login_models');
    $this->load->model('admin/Sampah_models');
  }

  public function index()
  {
    $data['profile'] = $this->Login_models->getProfileUser();
    $data['numberAll'] = $this->Sampah_models->getTotalSampah();
    $data['Alltotal'] = $this->Sampah_models->getTotalSampahUser();
    $data['sampah'] = $this->Sampah_models->getDataSampahUser();
    $this->load->view('v_dashboard', $data);
  }

  public function Setting($id)
  {
    $data['totalPoint'] = $this->Sampah_models->getTotalPoinUser($id);
    $data['usr'] = $this->Sampah_models->getDataUserByID($id);
    $data['prov'] = $this->Login_models->getProvinsi();

    $this->load->view('v_detailUserAkun', $data);
  }
}
