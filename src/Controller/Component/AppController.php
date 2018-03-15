<?php
namespace App\Controller;

use Cake\Controller\Controller;

class AppController extends Controller
{
  public function initialize()
  {
      $this->loadComponent('Flash');
      $this->loadComponent('Auth', [
          'loginRedirect' => [
              'controller' => 'Articles',
              'action' => 'index'
          ],
          'logoutRedirect' => [
              'controller' => 'Pages',
              'action' => 'display',
              'home'
          ]
      ]);
  }

  public function beforeFilter(Event $event)
  {
      $this->Auth->allow(['index', 'view', 'display']);
  }

  
}
