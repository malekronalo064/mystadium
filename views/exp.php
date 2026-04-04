<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/MyStadium/public/css/index.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Expérience — MyStadium</title>
</head>
<body>
<?php include(__DIR__ . "/header.php")?>
<div class="login-bg" style="background: linear-gradient(135deg, #1e5d2d 0%, #3bb54a 100%); min-height: 100vh; display: flex; flex-direction: column; align-items: center;">
  <section class="card" style="max-width: 700px; width: 100%; margin: 48px 0; text-align: center; background: rgba(255,255,255,0.97); box-shadow:0 8px 32px #1e5d2d22;">
    <h1 class="login-title" style="font-size:2.2em; color:#1e5d2d; font-family:'Ms Madi',cursive; margin-bottom: 18px;">Expérience utilisateur</h1>
    <h2 style="color:#1e5d2d;font-size:1.3em;margin-bottom:12px;">Témoignages</h2>
    <blockquote style="background:#f5f5f5;border-radius:12px;padding:18px 24px;margin-bottom:12px;box-shadow:0 2px 8px #3bb54a22;">“Super facile de réserver, équipe sympa, je recommande !” — Karim</blockquote>
    <blockquote style="background:#f5f5f5;border-radius:12px;padding:18px 24px;margin-bottom:12px;box-shadow:0 2px 8px #3bb54a22;">“Le calendrier interactif est top, plus de galère pour trouver un créneau.” — Julie</blockquote>
    <h2 style="color:#1e5d2d;font-size:1.3em;margin-bottom:12px;">FAQ</h2>
    <ul style="list-style:none;padding:0;margin:0 auto 18px auto;max-width:600px;display:flex;flex-direction:column;gap:12px;align-items:center;">
      <li style="background:#f5f5f5;border-radius:12px;padding:18px 24px;min-width:220px;max-width:420px;box-shadow:0 2px 8px #3bb54a22;"><strong>Comment réserver ?</strong> Créez un compte, connectez-vous et choisissez votre créneau !</li>
      <li style="background:#f5f5f5;border-radius:12px;padding:18px 24px;min-width:220px;max-width:420px;box-shadow:0 2px 8px #3bb54a22;"><strong>Puis-je annuler ?</strong> Oui, depuis votre espace personnel.</li>
      <li style="background:#f5f5f5;border-radius:12px;padding:18px 24px;min-width:220px;max-width:420px;box-shadow:0 2px 8px #3bb54a22;"><strong>Quels moyens de paiement ?</strong> CB, PayPal, espèces sur place.</li>
    </ul>
  </section>
</div>
<?php include(__DIR__ . "/footer.php")?>
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




