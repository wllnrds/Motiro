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
}
