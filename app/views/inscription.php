 <?php
 require 'connection.php';
if (isset($_POST["formconnect"])) {
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$mail = htmlspecialchars($_POST['mail']);
	$mdp = sha1($_POST['mdp']);
	if (!empty($pseudo) &&!empty($mail) && !empty($mdp)) {
		 // requete si l'utilisateur existe vraiment
		$requser = $dbh->prepare("INSERT INTO membres(pseudo,mail,password) VALUES(:pseudo,:mail,:password)");
		$requser->bindValue(':pseudo',$pseudo);
		$requser->bindValue(':mail',$mail);
		$requser->bindvalue(':password',$mdp);
		 	$requser->execute();
		 	$userexist = $requser->rowcount();
			if ($userexist == 1) {
				$userinfo = $requser -> fetchAll;
			       $_SESSION['id_membre'] =$userinfo['id'];			      
			       $_SESSION['pseudo'] =$userinfo['pseudo'];
			       $_SESSION['mail'] = $userinfo['mail'];
			       $_SESSION['mdp'] = $userinfo['mdp'];			        			      
			        header('location:index.php?page=login') . $_SESSION['id']; 
			   }
		   else{
		     	echo "<div class ='return'>mauvais mail ou mot de passe incorrect</div>";
		     	}
	 }
	else {
		echo "<div class ='return'>veuillez completer tous les champs</div class>";
	   }
}
  ?>
<container>
<div container id="inscription">
<div align="center">
    <h3>Enregistrez-vous pour être membre!</h3>
    </br>
   
    <form method="POST" action="inscription.php"> 
    	  <div class="return"></div>
       <input type="pseudo" name="pseudo" placeholder="pseudo"/>  <br> 
       <input type="email" name="mail" placeholder="mail"/>  <br>
       <input type="password" name="mdp" placeholder="password"/>  <br>
       <input type="submit" name="formconnect" value="s'inscrire"/>
    </form>
    <?php
    if (isset($message)){
    	echo "<font color='red'>" . $message="" ."</font color>";
      }?>
    </div>
    </div>  <br> 
</container>