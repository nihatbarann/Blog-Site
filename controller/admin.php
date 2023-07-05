<?php

class Admin extends Controller
{

  function index()
  {
    $this->view('admin/admin');
  }

  function settings()
  {
    $stm = $this->loadModel('adminModel');
    $data = $stm->getSiteSettings();
    $oldFileName = $data['site_icon'];
    if ($_POST) {

      $upload = $this->loadModel('uploadModel');
      $fileName = $upload->uploadFile($_FILES['site-icon']);
      if ($fileName) {
        $setting = $this->loadModel('settingModel');
        $setting->settingEdit($_POST, $fileName);
      } else {
        $setting = $this->loadModel('settingModel');
        $setting->settingEdit($_POST, $oldFileName);
      }

    }
    $this->view('admin/settings', $data);
  }
  function about()
  {
    $stm = $this->loadModel('adminModel');
    $data = $stm->getAbout();
    $oldFileName = $data['about_image'];

    if ($_POST) {
      $upload = $this->loadModel('uploadModel');
      $fileName = $upload->uploadFile($_FILES['about-image']);

      if ($fileName) {
        $about = $this->loadModel('aboutModel');
        $about->aboutEdit($_POST, $fileName);

      } else {
        $about = $this->loadModel('aboutModel');
        $about->aboutEdit($_POST, $oldFileName);
      }

    }
    $this->view('admin/about', $data);
  }


  function user()
  {
    $stm = $this->loadModel('adminModel');
    $data = $stm->getUser();
    $this->view('admin/user', $data);
  }


  function post()
  {
    $stm = $this->loadModel('adminModel');
    $data = $stm->getPost();
    $this->view('admin/post', $data);
  }

  function logout()
  {

    $stm = $this->loadModel('userModel');
    $data = $stm->logout();


  }


  function login()
  {

    if (!empty($_POST['username']) && !empty($_POST['passwd'])) {
      $stm = $this->loadModel('userModel');
      $stm->checkLogin();

    }
    $this->view('admin/login');
  }



}


?>