<?php

namespace Controller;

use \PHPMailer;
use \config;
use \W\Controller\Controller;
use \W\Model\UsersModel;
use Model\RechercheModel;
class FrontController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function index()
	{
		$profils = new UserModel();
		$profilselect = $profils->findAll('date_update', 'ASC', 6);
		$params['users'] = $profilselect;
		$this->show('front/index', $params);
	}
	public function conditions()
	{
		$this->show('front/conditions');
	}
	public function contactAdmin()
	{
		$errors = array();
		$app = getApp();
		$mail = new PHPMailer;

		if(!empty($_POST)){
			// Faire vérification des champs ICI
			if(empty($_POST['email'])){
				$errors[] = 'l\'email est vide';
			}
			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false){
				$errors[] = 'L\'email est invalide';
			}
			if(empty($_POST['objet'])){
				$errors[] = 'l\'objet est vide';
			}
			if(empty($_POST['message'])){
				$errors[] = 'le message est vide';
			}
			if(empty($_POST['nom'])){
				$errors[] = 'le nom est vide';
			}
			if(empty($_POST['prenom'])){
				$errors[] = 'le prenom est vide';
			}
			// si pas d'erreurs,
			if(count($errors) == 0){

				$mail->setLanguage('fr', '../../vendor/phpmailer/phpmailer/language/');
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = $app->getConfig("phpmailer_server");  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = $app->getConfig("phpmailer_user");                 // SMTP username
				$mail->Password = $app->getConfig("phpmailer_pass");                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = $app->getConfig('phpmailer_port');                                // TCP port to connect to

				$mail->setFrom( $_POST['email'], $_POST['nom'].$_POST['prenom']);
				$mail->addAddress( 'Mettre le mail de l\'admin', 'Admin');     // Add a recipient

				$mail->isHTML(true);                                  // Set email format to HTML

				$mail->Subject = $_POST['objet'];
				$mail->Body    = $_POST['message'];
				$mail->AltBody = $_POST['message'];

				if(!$mail->send()) {
					$errors[] = 'l\'email n\'a pas pu être envoyé veuillez réessayer';
				}
				else {
					$params['success'] = 'Votre message à bien été envoyé !';
				}
			}
		}
		$params['errors'] = $errors;

		$this->show('front/contactAdmin', $params);
	}
	public function recherche()
	{
		$params['resultatUser'] = [];
		$params['resultatMetier'] = [];
		if(empty($_GET["search"]) && empty($_GET['valeur'])){
			$params['error'] = 'Veuillez saisir une recherche';
		}
		elseif(empty($_GET['valeur']) && !empty($_GET['search'])){
			$params['error'] = 'Veuillez choisir un paramètre de recherche';

		}
		elseif(!empty($_GET['search']) && strlen($_GET['search']) < 3){
			$params['error'] = 'Votre recherche doit faire plus de 3 caractères';

		}
		else{
			$recherche = new RechercheModel();
			if(!empty($_GET["search"])){
				$search = strip_tags($_GET["search"]);
				if($_GET['valeur'] == 'user'){
					$resultatuser = $recherche->rechercheUsers($search);
					if(empty($resultatuser)){
						$params['error'] = 'Votre recherche n\'a donné aucun résultat';
					}
					else{
						$params['resultatUser'] = $resultatuser;
					}
				}
				if($_GET['valeur'] == 'metier'){
					$resultatmetier = $recherche->rechercheMetier($search);
					if(empty($resultatmetier)){
						$params['error'] = 'Votre recherche n\'a donné aucun résultat';
					}
					else{
						$params['resultatMetier'] = $resultatmetier;
					}
				}
			}
		}

		$this->show('front/recherche', $params);
	}
}
