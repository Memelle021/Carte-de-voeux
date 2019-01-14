<?php 

//if( !empty($_POST) ){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlentities($_POST['prenom']);
        $email = $_POST['email'];

 // Vérification des données
 $nomErr = $prenomErr = $emailErr = '';
 $nom = $prenom = $email = '';
 $envoiOk = '';
 // Vérification des données
 $resultat = '';
/*
if (isset($_POST['envoi'])) {
    echo '<pre>';
    echo 'Voici vos informations : <br>';
    print_r($_POST);
    echo '</pre>';
 }
*/

 

    if ( empty($nom) ) { 
        $resultat.= 'Nom <br>';
    }

    if ( empty($prenom) ) { 
        $resultat.= 'Prenom <br>';
    }

    if ( empty($email) ){ 
        $resultat.= 'Adresse mail <br>';
    }
    else{
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo 'Adresse email invalide !<br>';
        }
    }
    
    
    if( empty($nom) || empty($prenom) ){
    $message = 'Veuillez remplir les champs suivants:<br>' . $resultat;
    }
}

if( !empty($nom) && !empty($prenom) ){  // Envoi email
    
        $to = 'armelle.d@codeur.online';
        $subject = 'Message envoyé via le site';
        
        // Pour envoyer un email HTML, l'en-tête Content-type doit être défini !
        $headers = 'MIME-Version: 1.0' . "\r\n"; // Version MIME
        $headers .= 'Content-type: text/html; charset=UTF-8'."\r\n"; // l'en-tête Content-type pour le format HTML
        $headers .= 'FROM:' . $nom . $prenom . '-' . $email . "\r\n"; // Expéditeur
        $headers .= 'TO:' . $destinataire . "\r\n";   

        if ( mail($to, $subject, $message_mail, $headers) ) // Envoi du message
        {
            echo 'Votre message a bien été envoyé ';
        }
        else // Non envoyé
        {
            echo "Votre message n'a pas pu être envoyé";
        }
}
 ?>

<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Cartedevoeux2019</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" media="screen" href="./style.css" />
        </head>

        <body class="bg1">
                <div class="stars"></div>
                <div class="stars2"></div>
                <div class="stars3"></div>
                <div class="slide-out-bottom ">
                <img class="img1" src="./joyeusesfetes2019.png">  
                </div>
                <div class="div1"></div>

                <div class="container2">
                    <form name="formulaire" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> <!-- onsubmit="return validateform()"> -->
                        <div>
                            <label for="nom">Nom :</label>
                                <input type="text" name="nom" id="nom" placeholder="ex : Dupont" value="<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>"> <!-- isset($_POST['nom']) ? $_POST['nom'] : '';-->
                                <span class="error"><?php echo (isset($nomErr)) ? $nomErr : '';?></span>
                        </div>

                        <div>
                            <label for="prenom">Prénom :</label>
                                <input type="text" name="prenom" id="prenom" placeholder="ex : Richard" value="<?php if (isset($_POST['prenom'])){echo $_POST['prenom'];} ?>">
                                <span class="error"><?php echo (isset($prenomErr)) ? $prenomErr : '';?></span>
                        </div>

                        <div>
                            <label for="email">Email :</label>
                                <input type="text" name="email" id="mail" placeholder="ex : abcdef@ghij.com" value="<?php if (isset($_POST['email'])){echo $_POST['email'];} ?>">
                                <span class="error"><?php echo (isset($emailErr)) ? $emailErr : '';?></span>
                        </div>

                        <div> <?php echo (isset($message)) ? $message : '' ?></div>
                            <input class="button3" type="submit" value="Envoyer">
                    </form>
                </div> 
                
        </body>
    </html>