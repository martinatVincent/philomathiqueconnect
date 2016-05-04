<?php
/**
 * Basic fix for UserManager. Extends UserManager & Manager
 *
 * How-to :
 * 	- Place-it in \app\Manager
 * 	- In your controller add in header :
 *		use \Manager\FixUserManager;
 *
 * @author Axel Wargnier <axel@axessweb.fr>
 * @copyright WebForce3 2016
 */
namespace Manager;

class FixUserManager extends \W\Manager\UserManager {


	public function __construct(){
		$app = getApp();

		// Force use datatable defined in file config.php
		// Otherwise, it searches 'wusers' datatable
		$this->setTable($app->getConfig('security_user_table'));

		$this->dbh = \W\Manager\ConnectionManager::getDbh();
		return;
	}

	public function getUserMetier($id) {
				$sql = "SELECT section FROM metiers m LEFT JOIN users u ON u.id_metier = m.id WHERE u.id = :id";
				$sth = $this->dbh->prepare($sql);
				$sth->bindValue(":id", $id);
				$sth->execute();

				return $sth->fetchColumn();
	}

	public function getUserProjects($id) {
		if (!is_numeric($id)){
			return false;
		}

		$sql = "SELECT * FROM projets WHERE id_user = :id";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		$sth->execute();

		$projets = $sth->fetchAll();

		foreach ($projets as &$projet) {
			$sql = "SELECT * FROM photos WHERE id_projet = :id";
			$sth = $this->dbh->prepare($sql);
			$sth->bindValue(":id", $projet['id']);
			$sth->execute();

			$projet['photos'] = $sth->fetchAll();
		}
		return $projets;
	}


}
