<?php

namespace Model;

class RechercheModel extends \W\Model\UserModel {


    public function rechercheUsers($search){

		$sql = ("SELECT * FROM users WHERE nom  LIKE :search OR prenom LIKE :search OR description LIKE :search COLLATE utf8_bin");
        $sth = $this->dbh->prepare($sql);
		$sth->bindValue(":search", '%'.$search.'%');
		if($sth->execute()){
			return $sth->fetchAll();
    	}
    	else {
    		return false;

    	}
    }
    public function rechercheMetier($search){

		$sql = ("SELECT * FROM metiers WHERE section  LIKE :search OR description LIKE :search COLLATE utf8_bin");
        $sth = $this->dbh->prepare($sql);
		$sth->bindValue(":search", '%'.$search.'%');
		if($sth->execute()){
			return $sth->fetchAll();
    	}
    	else {
    		return false;

    	}
    }
}
