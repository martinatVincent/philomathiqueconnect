<?php

	$w_routes = array(
		///////////////////////////FRONT/////////////////////////////////////////////////////////////
		['GET', '/', 'Front#index', 'index'],
		['GET', '/conditions', 'Front#conditions', 'conditions'],
		['GET|POST', '/contactadmin', 'Front#contactAdmin', 'contactAdmin'],
		['GET|POST', '/recherche', 'Front#recherche', 'recherche'],
		////////////////////////////PROFIL////////////////////////////////////////////////////////
		['GET', '/profil/profiluser/[:id]', 'Profil#profilUser', 'profiluser'],
		['GET', '/profil/allprofiles', 'Profil#allprofiles', 'allprofiles'],
		['GET', '/profil/allprofiles/ajaxpaginallprofiles', 'Profil#ajaxpaginallprofiles', 'ajaxpaginallprofiles'],
		['GET|POST', '/profil/profiluser/[:id]/suppressiondecompte', 'Profil#deleteaccount', 'deleteaccount'],
		//contacter Profil//
		['GET|POST', '/profil/contact/[:id]', 'profil#contact', 'contact'],

		//inserer un projet//
		['GET|POST', '/profil/insertprojects', 'profil#insertProjects', 'insertProjects'],
		['GET|POST', '/profil/updatesprofil', 'profil#updatesProfil', 'updateProfil'],
		['POST', '/profil/updatephoto', 'profil#updatePhoto', 'updatePhoto'],
		['POST', '/profil/updatephotoproject', 'profil#updatePhotoProjet', 'updatePhotoProjet'],
		['GET|POST', '/profil/portfolio/projectspage/[:id]', 'Profil#projectsPage', 'projectsPage'],
		['GET', '/profil/portfolio/projectspage/[:id]/ajaxpagin', 'Profil#ajaxprojectspagepagin', 'ajaxprojectspagepagin'],

		////////////////////////////METIERS////////////////////////////////////////////////////////
		['GET', '/metiers', 'metiers#metiers', 'metiers'],
		['GET', '/formation', 'formation#metier', 'formation'],
		['GET', '/atelier', 'atelier#metier', 'atelier'],

		['GET', '/metierspage', 'metiers#ajaxmetiers', 'paginationsmetiers'],
		['GET', '/metiers/[a:section]/profilsall', 'profil#profilsAll', 'profilsall'],
		['GET', '/metiers/[a:section]/profilsall/pagination', 'profil#ajaxprofils', 'paginationprofils'],

		/////////////////////////////ADMIN///////////////////////////////////////////////////////////
		['GET|POST', '/admin/connect', 'admin#connect', 'connect'],
		['GET|POST', '/admin/deconnect', 'admin#deconnect', 'deconnect'],
		['GET|POST', '/admin/reinipass', 'admin#reiniPass', 'reiniPass'],
		['GET|POST', '/admin/reinipasstoken', 'admin#reiniPassTok', 'reiniPassTok'],
    ['GET|POST', '/admin/insertprofil', 'admin#insertProfil', 'insertProfil'],
		['GET|POST', '/admin/insertsection', 'admin#insertSection', 'insertSection'],
	);
