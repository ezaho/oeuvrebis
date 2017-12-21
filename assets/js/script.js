function getXHR() {
  // On check le browser pour AJAX
  var xhr = null;
  if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest();
  }
  else if (window.ActiveXObjet) {
    try {
      xhr = new ActiveXObjet("Msxml2.XMLHTTP");
    }
    catch(e)
    {
      xhr = new ActiveXObjet("Microsoft.XMLHTTP");
    }
  } else {
    alert("Dll another browser");
    xhr = false;
  }
  return xhr;
}

function sendMsg() {
  // Fonction AJAX
  var xhr = getXHR();
  var msg = document.getElementById("msg-tosend-id").value;
  
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(msg);
      document.getElementById("bubble").innerHTML = this.responseText;
    }
  };
  xhr.open("POST", "sendMessage.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("msg-tosend=" + msg);
}

$('#envoi').click(function(e){
  e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
  var pseudo = encodeURIComponent( $('#pseudo').val() ); // on sécurise les données
  var message = encodeURIComponent( $('#message').val() );
  if(pseudo != "" && message != ""){ // on vérifie que les variables ne sont pas vides
      $.ajax({
          url : "traitement.php", // on donne l'URL du fichier de traitement
          type : "POST", // la requête est de type POST
          data : "pseudo=" + pseudo + "&message=" + message // et on envoie nos données
      });
     $('#messages').append("<p>" + pseudo + " dit : " + message + "</p>"); // on ajoute le message dans la zone prévue
  }
});

function charger(){
  setTimeout( function(){
      // on lance une requête AJAX
      var premierID = $('#messages p:first').attr('id'); // on récupère l'id le plus récent
      $.ajax({
           url : "charger.php?id=" + premierID, // on passe l'id le plus récent au fichier de chargement            
          type : GET,
          success : function(html){
              $('#messages').prepend(html); // on veut ajouter les nouveaux messages au début du bloc #messages
          }
      });
      charger(); // on relance la fonction
  }, 3000); // on exécute le chargement toutes les 3 secondes
}

</script>