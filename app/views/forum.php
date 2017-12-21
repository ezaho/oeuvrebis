<?php 
//require 'connection.php';
// session_start();
if (!empty($_POST['message']))
{
  $pseudo = $_SESSION['id_membre'];
  $message = htmlspecialchars($_POST['message']);
  $requser = $dbh->prepare("INSERT INTO Messages(pseudo, message) VALUES (:pseudo ,:message)");
  $requser->bindValue(':pseudo',$pseudo);
  $requser->bindValue(':message',$message);    
  $requser->execute();
  $userexist = $requser->rowcount();
  if ($userexist == 1) {
    $userinfo = $requser -> fetchAll;
         $_SESSION['id_message'] =$userinfo['id_message'];           
         $_SESSION['pseudo'] =$userinfo['pseudo'];
         $_SESSION['message'] = $userinfo['message'];
                                  
          header('location:index.php?page=forum') . $_SESSION['id']; 
  } else {
    echo "<span class='error'>Veuillez completer tous les champs</span>";
  }
}

if(!empty($_GET['id'])){ // on vérifie que l'id est bien présent et pas vide
    $id = (int) $_GET['id']; // on s'assure que c'est un nombre entier
    // on récupère les messages ayant un id plus grand que celui donné
/*
requête basique
SELECT membres.pseudo, Messages.date, Messages.message 
FROM Messages, membres 
WHERE Messages.pseudo = membres.id_membre 

requête avec des alias
SELECT mb.pseudo, msg.date, msg.message 
FROM Messages msg, membres mb
WHERE msg.pseudo = mb.id_membre 

requête avec LEFT JOIN
SELECT mb.pseudo, msg.date, msg.message 
FROM Messages msg
LEFT JOIN membres mb
ON msg.pseudo = mb.id_membre 
*/

     $requete = $dbh->prepare('SELECT * FROM Messages WHERE id > :id ORDER BY id DESC');    
    $requete->execute(array("id" => $id));
    $messages = null;
    // on inscrit tous les nouveaux messages dans une variable
    while($donnees = $requete->fetch()){
        $messages .= "<p id=\"" . $donnees['id'] . "\">" . $donnees['pseudo'] . " dit : " . $donnees['message'] . "</p>";
    }
}

?>
<container> 
  <section id="une">
    <h3>FORUM</h3>
    <p>Partagez ici vos astuces, trucs et bons plans</p>
    <form id="messagerie" method="post" class="formulaire">
        <div class="return"></div> <br>
        <textarea form="messagerie" placeholder="votre message" name="message"></textarea> <br> <br>
        <input class="submit" type="submit" value="envoyer..."> <br>
        <div class="afficher"></div>
    </form>
  </section><br>
  <section id="une">
    <div id="messages">
      <p><h3>Les récents astuces,trucs,bons plans postés</h3></p>
      <?php
      if(!empty($_GET['id'])){
        echo $messages;
      }
        // on récupère les 10 derniers messages postés
        $requete = $dbh->query('SELECT membres.pseudo, Messages.date, Messages.message
FROM Messages, membres 
WHERE Messages.pseudo = membres.id_membre ORDER BY id_message DESC LIMIT 0,10');
        while($donnees = $requete->fetch()){
            // on affiche le message (l'id servira plus tard)?>               
                   <div class="talk-bubble tri-right round btm-left">                    
                        <p><?php echo $donnees['pseudo'] ?> dit : </p>
                    </div>
                    <div class="talktext">
                        <p><?php echo $donnees['message']?></p>                    
                    </div>                 
        <?php
        }  
        $requete->closeCursor();
      ?>
    </div>
  </section><br>
  
</container>