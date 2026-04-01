<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/MyStadium/public/css/footer.css"/>
	<link rel="stylesheet" href="/MyStadium/public/css/header.css"/>
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




