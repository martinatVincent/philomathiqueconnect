<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\BlogModel;
use \W\Security\AuthentificationModel;
use \Model\FixUserModel as UserModel;
use Model\MetierModel;
use \PHPMailer;
use \config;

class AdminController extends Controller
{
	public function insertProfil(){
		$this->allowTo(['Admin']);
		$login = new AuthentificationModel();
		$userModel = new UserModel;
		$metiers = new MetierModel();
		$toutmetiers = $metiers->findAll();
		$errors = array();
		$params = array(); // Les paramètres qu'on envoi a la vue, on utilisera les clés du tableau précédé par un $ pour les utiliser dans la vue
		// Faire vérification des champs ICI
		if(!empty($_POST)){
			// Faire vérification des champs ICI
			if(empty($_POST['nom'])){
				$errors[] = 'le nom est vide';
			}
			if(empty($_POST['prenom'])){
				$errors[] = 'le prenom est vide';
			}
			if(empty($_POST['email'])){
				$errors[] = 'l\'email est vide';
			}
			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false){
				$errors[] = 'L\'email est invalide';
			}
			if (empty($_POST['pass'])) {
				$errors[]='le mot de passe est vide';
			}
			// il n'y a pas d'erreurs,  inserer l'utilisateur a bien rentré en bdd :
			if(count($errors) == 0){

				$userModel->insert([
					'nom' 		=> $_POST['nom'],
					'prenom' 	=> $_POST['prenom'],
					'email' 	=> $_POST['email'],
					'id_metier' 	=> $_POST['section'],
					'role' 	=> 'user',
					'password' 	=> password_hash($_POST['pass'],PASSWORD_DEFAULT)
				]);
			}
			// sinon on affiche les erreurs:
			else{
				$params['errors'] = $errors;
			}
			$params['success'] = 'votre nouveau profil à bien été enregistré !';
		}
		$params['section'] = $toutmetiers;
		$this->show('admin/insertprofil', $params);
	}
	public function insertSection(){
		$this->allowTo(['Admin']);
		$login = new AuthentificationModel();
		$MetierModel = new MetierModel;
		$errors = array();
		$params = array(); // Les paramètres qu'on envoi a la vue, on utilisera les clés du tableau précédé par un $ pour les utiliser dans la vue
		// Faire vérification des champs ICI
		$maxSize = 3024 * 3000; // 1Ko * 1000 = 1Mo
		$dirUpload = 'photo/section';
		$mimeTypeAllowed = array('image/jpg', 'image/jpeg', 'image/png');

		if(!empty($_POST)){
			// Faire vérification des champs ICI
			if(empty($_POST['alias'])){
				$errors[] = 'l alias est vide';
			}
			if(empty($_POST['description'])){
				$errors[] = 'la description est vide';
			}
			if(empty($_POST['section'])){
				$errors[] = 'la section est vide';
			}
			if(empty($_POST['photo'])){
				$errors[] = 'veuiller entrer une photo';
			}

			// il n'y a pas d'erreurs,  inserer la section a bien rentré en bdd :
			if(count($errors) == 0){
				$MetierModel->insert([
					'section' 	  	=> $_POST['section'],
					'alias' 		=> $_POST['alias'],
					'description' 	=> $_POST['description'],
					'photo' 	    => $_POST['photo'],
				]);

				$params['success'] = 'votre nouvelle section à bien été rajouté !';
			}
			// sinon on affiche les erreurs:
			else{
				$params['errors'] = $errors;
			}

		}

		$this->show('admin/insertSection', $params);
	}
	public function connect()
	{
		$userModel = new UserModel();
		$login = new AuthentificationModel();
		$errors = array();
		$params = array(); // Les paramètres qu'on envoi a la vue, on utilisera les clés du tableau précédé par un $ pour les utiliser dans la vue
		if(!empty($_POST)){
			// Faire vérification des champs ICI
			if(empty($_POST['login'])){
				$errors[] = 'Le Login est vide';
			}
			elseif(!filter_var($_POST['login'], FILTER_VALIDATE_EMAIL) != false){
				$errors[] = 'Le Login est invalide';
			}
			if(empty($_POST['pass'])){
				$errors[] = 'Le pass est vide';
			}
			if(count($errors) == 0){
				// il n'y a pas d'erreurs, l'utilisateur a bien rentré un login correct et un pass
				// si ces infos sont valides en BD
				$userId = $login->isValidLoginInfo($_POST['login'], $_POST['pass']);
				if(is_int($userId) && $userId != 0){

					$userDatas = $userModel->find($userId);
					// alors démarrer la session (logUserIn)
					$login->logUserIn($userDatas);
					// et rediriger vers l'accueil
					$params['success'] = 'Bienvenue vous êtes connecté(e) !';
					$this->redirectToRoute('index');
				}
				else {
					$errors[] ='dommage !!!';
				}
			}
		}
		$params['errors'] = $errors;
		$this->show('admin/connect', $params);
	}
	public function deconnect()
	{
		$login = new AuthentificationModel();

		$params = array();
		if (empty($_POST)){
			$vue = true;
		}
		 // Les paramètres qu'on envoi a la vue, on utilisera les clés du tableau précédé par un $ pour les utiliser dans la vue
		if (!empty($_POST)){
			$vue = false;
			$userId = $login->logUserOut();
		}

		$params['vue'] = $vue;
		$this->show('admin/deconnect',$params);
	}
	public function reiniPass()
	{
		$login = new AuthentificationModel();
		$userModel = new UserModel;
		$errors = array();
		$mail = new PHPMailer;
		$params = array(); // Les paramètres qu'on envoi a la vue, on utilisera les clés du tableau précédé par un $ pour les utiliser dans la vue
		if(!empty($_POST)){
			// Faire vérification des champs ICI
			if(empty($_POST['email'])){
				$errors[] = 'l\'email est vide';
			}
			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false){
				$errors[] = 'L\'email est invalide';
			}
			// si pas d'erreurs,
			if(count($errors) == 0){
				// on va vérifier qu'il existe un utilisateur avec cet email dans la base
				if($idUser = $userModel->emailExists($_POST['email'])){
					$token = password_hash($_POST['pass'],PASSWORD_DEFAULT);// on génère un 'token', identifiant unique
					$idUser = $userModel->getUserByUsernameOrEmail($_POST['email'])['id']; //chercher id
					$userModel->update([
						"confirmedToken" 		=> $token,
						"dateConfirmedToken" 	=>date('Y-m-d',strtotime('+1 week'))
						], $idUser);	// on stocke le token dans la bdd pour cet utilisateur
					$successUrl = $this->generateUrl('reiniPassTok').'?email='.$_POST['email'].'&token='.$token;// on crée le lien permettant à l'utilisateur de resaisir un
					$successLink = "http://localhost".$successUrl;
					// nouveau mot de passe
					// on envoie le mail avec le lien:
					$app = getApp();



					//$mail->SMTPDebug = 3;             												// Enable verbose debug output
					$mail->setLanguage('fr', '../../vendor/phpmailer/phpmailer/language/');
					$mail->isSMTP();  // Set mailer to use SMTP

					$mail->send() ;
					$mail->Host = $app->getConfig("phpmailer_server");  								// Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               								// Enable SMTP authentication
					$mail->Username = $app->getConfig("phpmailer_user");                				 // SMTP username
					$mail->Password = $app->getConfig("phpmailer_pass");                           		// SMTP password
					$mail->SMTPSecure = 'tls';                            								// Enable TLS encryption, `ssl` also accepted
					$mail->Port = $app->getConfig('phpmailer_port');                                    // TCP port to connect to

					$mail->setFrom($_POST['email'],'vous même');    	// Add a recipient
					$mail->addAddress($_POST['email']);     //$mail->addAddress($_POST['email']);               // Name is optional
					$mail->addReplyTo('offres@vincentmartinat.com', 'Information');
					/*$mail->addCC('cc@example.com');
					$mail->addBCC('bcc@example.com');

					$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
					$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
						*/
					$mail->isHTML(true);
					$mail->Body = '<a href="'.$successLink.'">Reinitialisez votre mot de passe en cliquant sur cette phrase ce liens est valable une semaine après merci de refaire une demande.</a>';                  	// Set email format to HTML




				} else {
				// si non:
					// message d'erreur: cette adresse mail ne correspond pas à un membre du site
					$errors[] = 'L\'email n\'existe pas';
				}
				// si oui:
					// on génère un 'token', identifiant unique

					// on stocke le token dans la bdd pour cet utilisateur

					// on crée le lien permettant à l'utilisateur de resaisir un nouveau mot de passe
					// ce lien doit contenir le token, c'est ce qui nous permettra de vérifier que l'utilisateur qui saisit le nouveau mot de passe est bien le propriétaire de l'adresse email (qui a cliqué sur le lien)


				if(!$mail->send()) {
						$errors[] = 'L\'email n\'a pas pu être envoyé';
						echo 'Mailer Error: ' . $mail->ErrorInfo;
					} else {
						$params['success'] = 'Youhou, c\'est envoyé!';
					}
			}
		}
		if(count($errors) > 0){
			$params['errors'] = $errors;
		}

		$this->show('admin/reiniPass', $params);
}
	public function reiniPassTok(){
		$login = new AuthentificationModel();
		$userModel = new UserModel();
		$errors = array();
		$params = array(); // Les paramètres qu'on envoi a la vue, on utilisera les clés du tableau précédé par un $ pour les utiliser dans la vue
		//verifier et recuperer le token et email puis :


			//récuperer les infos du formulaire
				if(!empty($_POST)){
					// Faire vérification des champs ICI
					if (empty($_POST['pass'])) {
						$errors[]='le mot de passe est vide';
					}
					if (empty($_POST['confirm_pass'])) {
						$errors[]='la confirmation du mot de passe est vide';
					}

					//les deux soient identiques
					// mettre à jour le mot de passe
					if(count($errors) == 0){
						// on va vérifier qu'il existe un utilisateur avec cet email dans la base
				        if($idUser = $userModel->emailExists($_GET['email'])){

							$idUser = $userModel->getUserByUsernameOrEmail($_GET['email'])['id']; //chercher id
							$userModel->update([
								"password" => password_hash($_POST['pass'],PASSWORD_DEFAULT)], $idUser);	// Modifie une ligne en fonction d'un identifiant et on stocke le nouveau mot de passe dans la bdd pour cet utilisateur
						}
						else{
							$params['error'] = 'votre mot de passe n\'a pas pu etre changer!!!';
						}

					}
					$params['success'] = 'votre nouveau mot de passe à bien été changé !';
				}

				$this->show('admin/reiniPassTok', $params);
				//$this->redirectToRoute('index');
				var_dump($success);
	}


}
