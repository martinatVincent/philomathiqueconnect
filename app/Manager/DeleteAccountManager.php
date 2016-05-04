<?php

namespace Manager;

class DeleteAccountManager extends \W\Manager\UserManager {


    public function deleteAll($id){

		$sql = ("DELETE FROM users, projets, photos WHERE EXISTS (SELECT * FROM users, projets, photos WHERE users.id = :id AND projets.id_user = :id AND projets.id = photos.id_projet)");
        $sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		if($sth->execute()){
      return $sth->fetchAll();
      }
    	else {
    		return false;
    	}
    }

}
