<?php

namespace Manager;

class MetierManager extends \W\Manager\UserManager {

  public function findMetier($section, $orderBy = "", $limit = null, $offset = null)
  {

  	$sql = "SELECT * FROM metiers WHERE alias = :alias";
  	$sth = $this->dbh->prepare($sql);
    $sth->bindValue(':alias', $section);
  	$sth->execute();
  	$met = $sth->fetchAll();
    $idmetier = $met[0]['id'];
    $sql2 = 'SELECT * FROM users WHERE id_metier = :id_metier';
    if (!empty($orderBy)){

        if(!preg_match("#^[a-zA-Z0-9_$]+$#", $orderBy)){
            die("invalid orderBy param");
        }
        if ($limit && !is_int($limit)){
            die("invalid limit param");
        }
        if ($offset && !is_int($offset)){
            die("invalid offset param");
        }

        $sql2 .= " ORDER BY $orderBy";

        if ($limit){
            $sql2.= " LIMIT $limit";
            if ($offset){
                $sql2 .= " OFFSET $offset";
            }
        }
    }
    $sth = $this->dbh->prepare($sql2);
    $sth->bindValue(':id_metier', $idmetier);
  	$sth->execute();
  	return $sth->fetchAll();

  }
  public function findSection($section){

    $sql = "SELECT section FROM metiers WHERE alias = '$section' ";
  	$sth = $this->dbh->prepare($sql);
  	$sth->execute();
  	return $sth->fetchAll();
  }
  public function findAll(){

    $sql = "SELECT * FROM metiers";
  	$sth = $this->dbh->prepare($sql);
  	$sth->execute();
  	return $sth->fetchAll();
  }
}
