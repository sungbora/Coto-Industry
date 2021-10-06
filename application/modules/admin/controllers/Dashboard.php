<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model("Sampah_models");
    $this->load->model('login/Login_models');
  }

  public function GetDetailSampah($id)
  {
    $data['detail'] = $this->Sampah_models->getDetailsSampah($id);
    $this->load->view('operate/v_detailSampah', $data); 
  }

  public function Setting()
  {
    $data['profile'] = $this->Login_models->getProfileUserSuper();
    $this->load->view('v_setting', $data);
  }

  public function acceptSampah($id)
  {
    $this->Sampah_models->updateStatusSampah($id);
    redirect('admin/Dashboard/ListSampah');
  }

  //User
  public function ListSampahKamu()
  {
    $data['getAllSampah'] = $this->Sampah_models->getDataSampahUser();
    $this->load->view('v_listSampahBy', $data);
  }

  public function ListSampahFilterKamu()
  {
    $data['getAllSampah'] = $this->Sampah_models->getSampahByDateUser();
    $this->load->view('v_listSampahBy', $data);
  }
  
  //Operate
  public function op()
  {
    $data['listSampah'] = $this->Sampah_models->getDataByIDOperator();
    $data['numberAll'] = $this->Sampah_models->getTotalSampah();
    $data['numberOp'] = $this->Sampah_models->getTotalSampahOp();
    $this->load->view('operate/v_dashboard', $data);
  }

  public function ListSampahUser()
  {
    $this->load->view('operate/v_detailSampah');
  }

  public function addSampah()
  {
    $data['listUser'] = $this->Login_models->ListUser();
    $this->load->view('operate/v_addSampah', $data);
  }

  public function runAddSampah()
  {
    $model = $this->Sampah_models;
    $validation = $this->form_validation;
    $validation->set_rules($model->rules());

    if ($validation->run() != false) {
      $this->session->set_flashdata('successInput', 'Berhasil disimpan');
      $model->insert();
      redirect('admin/Dashboard/op');
    } else {
      redirect('admin/Dashboard/addSampah');
    }

    // $this->Sampah_models->do_upload();
  }

  public function ListSampahOP()
  {
    $data['getAllSampah'] = $this->Sampah_models->getDataByIDOperator();
    $this->load->view('v_listSampahBy', $data);
  }

  public function ListSampahFilterOP()
  {
    $data['getAllSampah'] = $this->Sampah_models->getSampahByDateOP();
    $this->load->view('v_listSampahBy', $data);
  }

  //Administration
  public function admin()
  {
    $data['listSampah'] = $this->Sampah_models->getDataSampahAllToday();
    $data['numberAll'] = $this->Sampah_models->getTotalSampah();
    $data['maxuser'] = $this->Sampah_models->getTotalUsers();
    $this->load->view('admin/admin/v_dashboard', $data);
  }

  public function ListSampah()
  {
    $data['getAllSampah'] = $this->Sampah_models->getDataSampahAll();
    $this->load->view('admin/admin/v_listSampah', $data);
  }

  public function ListSampahFilter()
  {
    $data['getAllSampahByDate'] = $this->Sampah_models->getSampahByDateAll();
    $this->load->view('admin/admin/v_listSampahFilter', $data);
  }

  public function listUser()
  {
    $this->load->view('admin/admin/v_listUser');
  }

  public function ListUserAkun()
  {
    $data['dataUser'] = $this->Sampah_models->getDataUserAll();
    $this->load->view('admin/admin/v_listUserAkun', $data);
  }

  public function DetailUserAkun($id)
  {
    $data['totalPoint'] = $this->Sampah_models->getTotalPoinUser($id);
    $data['usr'] = $this->Sampah_models->getDataUserByID($id);
    $data['prov'] = $this->Login_models->getProvinsi();
    // $data['kota'] = $this->Login_models->getKota();
    // $data['kecamatan'] = $this->Login_models->getKecamatan();
    $this->load->view('admin/admin/v_detailUserAkun', $data);
  }

  public function ListUserSuper()
  {
    $data['dataUser'] = $this->Sampah_models->getDataUserSuper();
    $this->load->view('admin/admin/v_listSuperAkun', $data);
  }

  public function acceptUser($id)
  {
    $this->Login_models->acceptUser($id);
    redirect('admin/Dashboard/ListUserAkun');
  }

  public function acceptSuperUser($id)
  {
    $this->Login_models->acceptSuperUser($id);
    redirect('admin/Dashboard/ListUserSuper');
  }

  public function DeleteSampah($id)
  {
    $this->Sampah_models->deleteSampah($id);
    redirect('admin/Dashboard/ListSampah');
  }
}