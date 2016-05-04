<?php

namespace Controller;

use \W\Controller\Controller;
use Manager\MetierManager;

class MetiersController extends Controller
{
    public function metiers(){
      
      $metiersdb = new MetierManager;
      $num = 6;
      $page = 1;
      $start = ($page-1) * $num;
      $params['page']  = $page;
      $metiers = $metiersdb->findAll('section', "ASC", $num, $start);
      $params['metiers'] = $metiers;
      $allmetiers = $metiersdb->findAll('section', "ASC");
      $countmetiers = count($allmetiers) + 1 ;
      $totalpages = ceil($countmetiers/$num);
      $params['totalpages'] = $totalpages;

      $this->show('metiers/metiers', $params);
	}

    public function ajaxmetiers(){

      $metiersdb = new MetierManager;
      $num = 6;
      $page = $_GET['page'];
      $start = ($page-1) * $num;
      $metiers = $metiersdb->findAll('section', "ASC", $num, $start);
      $this->showJson($metiers);
    }
}
