<?php
namespace App\Controller;

class PagesController extends AppController
{
    public function Home(){
      $date = new \DateTime('now');
      $this->set(compact('date'));
    }
    public function Ver($arg){
      $date = new \DateTime($arg);
      $this->set(compact('date'));
      $this -> render('/Pages/home');
    }
    public function Settings(){
        $this->loadModel('Roles');
        $roles = $this->Roles
          ->find()
          ->order(['level' => 'ASC'])
          ->all();
        $this->set(compact('roles'));

        $this->loadModel('Types');
        $types = $this->Types->find()->all();
        $this->set(compact('types'));
    }

    public function isAuthorized($user) {
      if(isset($user)){
        if ($this->request->getParam('action') === 'settings') {
          if($user['level'] <= 1){
            return true;
          }else{
            return false;
          }
        }
      }
      return parent::isAuthorized($user);
    }
}
