<?php

namespace Model;

class CommentaireModel extends \W\Model\Model{

    public function getProjectCommentaires($id,  $orderBy = "", $limit = null, $offset = null){

        $sql = "SELECT c.*, u.prenom as prenomUser, u.nom as nomUser FROM commentaires c left join users u on c.iduserspost = u.id WHERE c.idprojet = :id";
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
            $sql .= " ORDER BY $orderBy";

            if ($limit){
                $sql.= " LIMIT $limit";
                if ($offset){
                    $sql .= " OFFSET $offset";
                }
            }
        }
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
        $sth->execute();

        return $sth->fetchAll();

    }

}
