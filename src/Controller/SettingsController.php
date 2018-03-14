<?php
namespace App\Controller;

use Cake\Controller\Controller;

class SettingsController extends Controller
{
  public function index(){
      $this->loadModel('Roles');
      $roles = $this->Roles->find()->all();
      $this->set(compact('roles'));
  }
}
