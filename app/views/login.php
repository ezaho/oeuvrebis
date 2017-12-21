<?php
  require 'connection.php';
  if (isset($_POST["formlog"])) {
     $pseudo = htmlspecialchars($_POST['pseudo']);
     $mdp = sha1($_POST['mdp']);
  // Vérification des identifiants
        $req = $dbh->prepare('SELECT id_membre FROM membres WHERE pseudo = :pseudo AND  password= :mdp');
        $req->execute(array(
         'pseudo' => $pseudo,
          'mdp' => $mdp));
       $resultat = $req->fetch();
  if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    session_start();
    $_SESSION['id_membre'] = $resultat['id_membre'];
    $_SESSION['pseudo'] = $pseudo;
    // echo 'Vous êtes connecté !';
}
}
if (isset($_SESSION['id_membre']) AND isset($_SESSION['pseudo']))
{
	 header('location:index.php?page=forum') . $_SESSION['id_membre']; 
    echo 'Bonjour ' . $_SESSION['pseudo'];
}
  ?>
<container>
	<div container id="login">
<div align="center">
    <h3>Loguez-vous pour le tchat!</h3>
    </br>
   
    <form method="POST" action="login.php">    	 
       <input type="pseudo" name="pseudo" placeholder="pseudo"/>  <br>        
       <input type="password" name="mdp" placeholder="password"/>  <br>
       <input type="submit" name="formlog" value="Me connecter au tchat"/>
    </form>  
    </br>  
    </div>
    </div> </br>  

</container>