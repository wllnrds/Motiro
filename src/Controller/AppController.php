<?php
namespace App\Controller;

use Cake\Controller\Controller;

class AppController extends Controller
{
    public function initialize()
    {
      parent::initialize();

      $this->loadComponent('RequestHandler');
      $this->loadComponent('Flash');
      $this->loadComponent('Auth',[
        'authenticate' => [
          'Form' => [
            'fields' => [
              'username' => 'username',
              'password' => 'password'
            ]
          ]
        ],
        'loginAction' => [
          'controller' => 'Users',
          'action' => 'login'
        ]
      ]);
    }
}
