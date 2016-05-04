<?php

namespace Manager;

class ProjetManager extends \W\Manager\UserManager {

    public function getProjectPhotos($id){

        $sql = "SELECT * FROM photos WHERE id_projet = :id";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
        $sth->execute();

        return $sth->fetchAll();

    }
    
}
