<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
	<title>Expérience — MyStadium</title>
	<style>body{font-family:'Segoe UI','Roboto',Arial,sans-serif;}</style>
</head>
<body>
	<?php include(__DIR__ . "/header.php")?>
	<div class="login-bg">
		<div class="login-card" style="max-width:700px;width:100%;">
			<h1 class="login-title">Expérience utilisateur</h1>
			<h2>Témoignages</h2>
			<blockquote>“Super facile de réserver, équipe sympa, je recommande !” — Karim</blockquote>
			<blockquote>“Le calendrier interactif est top, plus de galère pour trouver un créneau.” — Julie</blockquote>
			<h2>FAQ</h2>
			<ul>
				<li><strong>Comment réserver ?</strong> Créez un compte, connectez-vous et choisissez votre créneau !</li>
				<li><strong>Puis-je annuler ?</strong> Oui, depuis votre espace personnel.</li>
				<li><strong>Quels moyens de paiement ?</strong> CB, PayPal, espèces sur place.</li>
			</ul>
		</div>
	</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>MyStadium - Expérience</title>
</head>
<body>
	<?php include("/MyStadium/views/header.php"); ?>
	<div class="content">
		<h1>Expérience</h1>
		<p>Contenu de la page expérience à venir...</p>
	</div>
	<?php include("/MyStadium/views/footer.php"); ?>
</body>
</html>
C:/Users/malek/uml-generated-code/articles.php:


/**
* class articles
* 
*/
class articles
{

/** Aggregations: */

/** Compositions: */

/*** Attributes: ***/

/**
* 
* @access private
*/
var $contenu;
/**
* 
* @access private
*/
var $titre;

/**
* 
*
* @return 
* @access public
*/
function get_contenu()
{

} // end of member function get_contenu

/**
* 
*
* @return 
* @access public
*/
function get_titre()
{

} // end of member function get_titre

/**
* 
*
* @return 
* @access public
*/
function set_contenu()
{

} // end of member function set_contenu

/**
* 
*
* @return 
* @access public
*/
function set_titre()
{

} // end of member function set_titre





} // end of articles
?>




C:/Users/malek/uml-generated-code/categories.php:


/**
* class categories
* 
*/
class categories
{

/** Aggregations: */

/** Compositions: */

/*** Attributes: ***/

/**
* 
* @access private
*/
var $nom;





} // end of categories
?>




C:/Users/malek/uml-generated-code/commentaire.php:


/**
* class commentaire
* 
*/
class commentaire
{

/** Aggregations: */

/** Compositions: */

/*** Attributes: ***/

/**
* 
* @access private
*/
var $commentaire;

/**
* 
*
* @return 
* @access public
*/
function get_commentaire()
{

} // end of member function get_commentaire

/**
* 
*
* @return 
* @access public
*/
function set_commentaire()
{

} // end of member function set_commentaire





} // end of commentaire
?>




C:/Users/malek/uml-generated-code/roles.php:


/**
* class roles
* 
*/
class roles
{

/** Aggregations: */

/** Compositions: */

/*** Attributes: ***/

/**
* 
* @access private
*/
var $nom;





} // end of roles
?>




C:/Users/malek/uml-generated-code/users.php:


/**
* class users
* 
*/
class users
{

/** Aggregations: */

/** Compositions: */

/*** Attributes: ***/

/**
* 
* @access private
*/
var $nom;
/**
* 
* @access private
*/
var $prénom;
/**
* 
* @access private
*/
var $email;
/**
* 
* @access private
*/
var $mdp;

/**
* 
*
* @return 
* @access public
*/
function get_nom()
{

} // end of member function get_nom

/**
* 
*
* @return 
* @access public
*/
function set_nom()
{

} // end of member function set_nom

/**
* 
*
* @return 
* @access public
*/
function get_prenom()
{

} // end of member function get_prenom

/**
* 
*
* @return 
* @access public
*/
function get_email()
{

} // end of member function get_email

/**
* 
*
* @return 
* @access public
*/
function get_mdp()
{

} // end of member function get_mdp

/**
* 
*
* @return 
* @access public
*/
function set_prenom()
{

} // end of member function set_prenom

/**
* 
*
* @return 
* @access public
*/
function set_email()
{

} // end of member function set_email

/**
* 
*
@return 
* @access public
*/
function set_mdp()
{

} // end of member function set_mdp

/**
* 
*
* @return 
* @access public
*/
function get_commentaire()
{

} // end of member function get_commentaire

/**
* 
*
* @return 
* @access public
*/
function get_titre()
{

} // end of member function get_titre

/**
* 
*
* @return 
* @access public
*/
function get_contenu()
{

} // end of member function get_contenu




/**
* initAttributes sets all users attributes to its default value. Make sure to call
* this method within your class constructor
*/
function initAttributes()
{
$this->id_user = 50;
$this->nom = 50;
$this->prénom = 50;
$this->email = 50;
$this->mdp = 255;
}


} // end of users
?>




