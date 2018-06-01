<?php
require_once __DIR__ . "/../config.php";

function sendmail($message_contact, $object_contact)
{
    $mail = 'cehddomisep@gmail.com'; // Déclaration de l'adresse de destination.
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
    {
        $passage_ligne = "\r\n";
    } else {
        $passage_ligne = "\n";
    }
//=====Déclaration des messages au format texte et au format HTML.
    $message_txt = $message_contact;
    $message_html = "<html><head></head><body>$message_contact</body></html>";
//==========

//=====Création de la boundary
    $boundary = "-----=" . md5(rand());
//==========

//=====Définition du sujet.
    $sujet = $object_contact;
//=========

//=====Création du header de l'e-mail.
    $sender=$_SESSION['mail'];
    $header = "From: $sender <noreplycehddomisep@gmail.com>" . $passage_ligne;
    $header .= "Reply-to: $sender <noreplycehddomisep@gmail.com>" . $passage_ligne;
    $header .= "MIME-Version: 1.0" . $passage_ligne;
    $header .= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;
//==========

//=====Création du message.
    $message = $passage_ligne . "--" . $boundary . $passage_ligne;
//=====Ajout du message au format texte.
    $message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"" . $passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
    $message .= $passage_ligne . $message_txt . $passage_ligne;
//==========
    $message .= $passage_ligne . "--" . $boundary . $passage_ligne;
//=====Ajout du message au format HTML
    $message .= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
    $message .= $passage_ligne . $message_html . $passage_ligne;
//==========
    $message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;

//==========

//=====Envoi de l'e-mail.
    mail($mail, $sujet, $message, $header);
//==========
}



function sendmail_bienvenue($mailnewclient)
{
    $mail = $mailnewclient; // Déclaration de l'adresse de destination.
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
    {
        $passage_ligne = "\r\n";
    } else {
        $passage_ligne = "\n";
    }
//=====Déclaration des messages au format texte et au format HTML.
    //die(var_dump($newpassw));
    $message_txt = 'Bonjour, notre équipe vous souhaite la bienvenue ! Vous vous êtes inscrit avec le mail suivant  '  .$mailnewclient ;
    $message_html = "<html><head></head><body>Bonjour, notre équipe vous souhaite la bienvenue ! Vous vous êtes inscrit avec le mail suivant  <br> <br>  $mailnewclient </body></html>";
//==========

//=====Création de la boundary
    $boundary = "-----=" . md5(rand());
//==========

//=====Définition du sujet.
    $sujet = "Inscription Service ceHD Domisep";
//=========

//=====Création du header de l'e-mail.
    $sender="cehddomisep@gmail.com";
    $header = "From: $sender <noreplycehddomisep@gmail.com>" . $passage_ligne;
    $header .= "Reply-to: $sender <noreplycehddomisep@gmail.com>" . $passage_ligne;
    $header .= "MIME-Version: 1.0" . $passage_ligne;
    $header .= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;
//==========

//=====Création du message.
    $message = $passage_ligne . "--" . $boundary . $passage_ligne;
//=====Ajout du message au format texte.
    $message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"" . $passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
    $message .= $passage_ligne . $message_txt . $passage_ligne;
//==========
    $message .= $passage_ligne . "--" . $boundary . $passage_ligne;
//=====Ajout du message au format HTML
    $message .= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
    $message .= $passage_ligne . $message_html . $passage_ligne;
//==========
    $message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;

//==========

//=====Envoi de l'e-mail.
    mail($mail, $sujet, $message, $header);
//==========
}





function sendmail_forgetpassw($mail_forgetpassw,$newpassw)
{
    $mail = $mail_forgetpassw; // Déclaration de l'adresse de destination.
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
    {
        $passage_ligne = "\r\n";
    } else {
        $passage_ligne = "\n";
    }
//=====Déclaration des messages au format texte et au format HTML.
    //die(var_dump($newpassw));
    $message_txt = 'Bonjour, suite à votre demande voici votre nouveau mot de passe :  '  .$newpassw ;
    $message_html = "<html><head></head><body>Bonjour, <br> <br> Suite à votre demande de réinitialisation de mot de passe, nous vous en communiquons un nouveau : <br> <br>  $newpassw <br> <br> Pensez bien à le changer après votre connexion. <br> <br> L'équipe ceHD </body></html>";
//==========

//=====Création de la boundary
    $boundary = "-----=" . md5(rand());
//==========

//=====Définition du sujet.
    $sujet = "Réinitialisation du Mot de Passe";
//=========

//=====Création du header de l'e-mail.
    $sender="cehddomisep@gmail.com";
    $header = "From: $sender <noreplycehddomisep@gmail.com>" . $passage_ligne;
    $header .= "Reply-to: $sender <noreplycehddomisep@gmail.com>" . $passage_ligne;
    $header .= "MIME-Version: 1.0" . $passage_ligne;
    $header .= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;
//==========

//=====Création du message.
    $message = $passage_ligne . "--" . $boundary . $passage_ligne;
//=====Ajout du message au format texte.
    $message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"" . $passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
    $message .= $passage_ligne . $message_txt . $passage_ligne;
//==========
    $message .= $passage_ligne . "--" . $boundary . $passage_ligne;
//=====Ajout du message au format HTML
    $message .= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
    $message .= $passage_ligne . $message_html . $passage_ligne;
//==========
    $message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;

//==========

//=====Envoi de l'e-mail.
    mail($mail, $sujet, $message, $header);
//==========
}

function genererChaineAleatoire($longueur, $listeCar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $_GLOBAL['chaine']='';
    $max = mb_strlen($listeCar, '8bit') - 1;
    for ($i = 0; $i < $longueur; ++$i) {
        $_GLOBAL['chaine'] .= $listeCar[random_int(0, $max)];
    }
    return $_GLOBAL['chaine'];

}

