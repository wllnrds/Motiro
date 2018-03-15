<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller{
    public function initialize(){
      $this->loadComponent('RequestHandler');
      $this->loadComponent('Flash');
      $this->loadComponent('Auth',[
        'authorize' => ['Controller'],
        'loginAction' => [
          'controller' => 'Users',
          'action' => 'login'
        ],
        'loginRedirect' => [
            'controller' => 'Pages',
            'action' => 'home'
        ],
        'storage' => 'Session',
        'authError' => 'Você não tem permissão para acessar isso.',
      ]);
    }

    public function beforeRender(Event $event) {
        $this->set('level', $this->Auth->user('level'));
    }

    public function isAuthorized($user) {
      if(isset($user)){
        if($user['level'] <= 10){
          return true;
        }
      }
      return false;
    }
}
