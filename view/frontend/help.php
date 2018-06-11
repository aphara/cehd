<?php @session_start(); ?>
<?php $title = 'CeHD - Aide'; ?>
<?php ob_start(); ?>


<script type="text/javascript">
function OnOff_1() {
if (document.getElementById("question_1").style.display == "none")
document.getElementById("question_1").style.display = "block";
else
document.getElementById("question_1").style.display = "none";
}
function OnOff_2() {
if (document.getElementById("question_2").style.display == "none")
document.getElementById("question_2").style.display = "block";
else
document.getElementById("question_2").style.display = "none";
}
function OnOff_3() {
if (document.getElementById("question_3").style.display == "none")
document.getElementById("question_3").style.display = "block";
else
document.getElementById("question_3").style.display = "none";
}
function OnOff_4() {
if (document.getElementById("question_4").style.display == "none")
document.getElementById("question_4").style.display = "block";
else
document.getElementById("question_4").style.display = "none";
}
function OnOff_5() {
if (document.getElementById("question_5").style.display == "none")
document.getElementById("question_5").style.display = "block";
else
document.getElementById("question_5").style.display = "none";
}
</script>

<h3><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Pictogram_voting_question.svg/220px-Pictogram_voting_question.svg.png" class="LogoAide" alt="LogoAide" />Aide</h3>
<ul>
    <li>
        <input type="button" value="Comment se connecter pour la première fois ?" class="bouton" onclick="OnOff_1();">
        <span id="question_1">
        Lors de votre première connexion, cliquez sur "Première connexion" sur la page d'accueil puis renseignez dans le champ proposé l'adresse mail que vous avez choisi lors de la configuration de votre maison.
        Puis rentrez de la même façon le mot de passe que nous vous avons communiqué par mail.
        Vous serez alors redirigé sur la page d'accueil et vous pourrez alors vous connecter en remplissant les champs de connexion.
      </span>



    </li>
    <hr/>
    <li>
      <input type="button" value="Comment gérer ses modules ?" class="bouton" onclick="OnOff_2();">
      <span id="question_2">
          Pour gérer vos modules, survolez l'onglet "Gestion Maison" dans le menu déroulant puis cliquez sur "gestion modules".
          Choissisez les modules que vous voulez gérer en sélectionnant un onglet parmi "Lumière", "Température" et "Volet".
          Dans chaque onglet un menu déroulant vous permet de choisir la salle dans laquelle vous voulez gérer votre module.
          Cliquez sur la salle de votre choix puis gérer vos modules comme bon vous semble !
          Par exemple pour les lumières, vous pouvez les allumer/éteindre ainsi que gérer leur luminosité.
          Pour la température, cliquez simplement sur "+" ou "-" pour augmenter/diminuer la température de votre salle.
          Enfin pour les volets, gérez l'ouverture ou la fermeture de chaque volet de votre pièce grâce au slide à droite de chacun.
      </span>
    </li>
    <hr/>
    <li>
      <input type="button" value="Comment ajouter/supprimer un utilisateur ?" class="bouton" onclick="OnOff_3();">
      <span id="question_3">
          Cette action est réservée uniquement aux utilisateurs possédant le statut de "Super User".
          Dans l'onglet "Gestion Utilisateurs" du menu déroulant, vous avez accès aux informations tous les utilisateurs de votre domicile.
          Vous pouvez à tout moment supprimer un utilisateur (en cliquant sur la petite poubelle à droite de celui-ci),
          modifier ce dernier (bouton "Modifier" à droite de l'utilisateur concerné) ou encore en ajouter un grâce au bouton "+" situé en bas de tableau.
          Lorsque vous cliquez sur ce bouton, une page pop-up s'ouvre et il ne vous reste plus qu'a remplir les informations du nouvel utilisateur de votre domicile avant de cliquer sur "Valider" !
      </span>
    </li>
    <hr/>
    <li>
      <input type="button" value="Je veux parametrer un programme, comment faire ?" class="bouton" onclick="OnOff_4();">
      <span id="question_4">
          Dans l'onglet "Gestion Maison" du menu déroulant, cliquez sur "programmes".
          Cliquez sur l'onglet "+" situé en dessous du nom de votre domicile pour ajouter un programme.
          Choissisez la pièce dans laquelle vous voulez que votre programme prenne effet en la sélectionnant grâce au menu déroulant.
          Selectionnez ensuite le(s) module(s) que vous souhaitez programmer ainsi que l'horaire de leur programmation.
          Sauvergardez votre programme. Vous pourrez à tout moment le modifier ou le supprimer.
      </span>
    </li>
    <hr/>
    <li>
      <input type="button" value="Je veux rajouter un module manuellement, est-ce possible ?" class="bouton" onclick="OnOff_5();">
      <span id="question_5">
          Dans l'onglet "Gestion Maison" vous pouvez avoir accès à tous vos modules en cliquant sur "associer modules".
          Dans cette page vous pouvez associer un module existant à une pièce de votre domicile mais VOUS NE POUVEZ PAS
          rajouter manuellement un nouveau module non existant lors de la configuration de votre maison.
          Si vous souhaitez rajouter un module, <a href="index.php?action=contact">contactez</a> directement le service client.
      </span>
    </li>
</ul>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
