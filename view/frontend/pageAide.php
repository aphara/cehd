<?php @session_start(); ?>
<?php $title = 'CeHD - Aide'; ?>
<?php ob_start(); ?>

<!-- <style type="text/css">
  #cache {
    display: none;
    border: 1px solid black;
    color: red;
  }
  .button:active {
  }
</style> -->
<script src="view/frontend/pageAide.js"></script>

<h3><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Pictogram_voting_question.svg/220px-Pictogram_voting_question.svg.png" class="LogoAide" alt="LogoAide" />Aide</h3>
<ul>
    <li><div id="question_1">
        <button id="bouton" type="button" class="btn btn-group-lg" data-target="#question_1" style="width: 100%;"><i class="fa fa-envelope text-center"></i><h4>Comment se connecter pour la première fois ?</h4></button>
        <p class="cache">
          Lors de votre première connexion, cliquez sur "Première connexion" sur la page d'accueil puis renseignez dans le champ proposé l'adresse mail que vous avez choisi lors de la configuration de votre maison.
          Puis rentrez de la même façon le mot de passe que nous vous avons communiqué par mail.
          Vous serez alors redirigé sur la page d'accueil et vous pourrez alors vous connecter en remplissant les champs de connexion.
        </p>
    </div></li>
    <hr/>
    <li><div id="question_2">
      <h4>Comment gérer ses modules ?</h4>
        <p class="cache">
          Pour gérer vos modules, survolez l'onglet "Gestion Maison" dans le menu déroulant puis cliquez sur "gestion modules".
          Choissisez les modules que vous voulez gérer en sélectionnant un onglet parmi "Lumière", "Température" et "Volet".
          Dans chaque onglet un menu déroulant vous permet de choisir la salle dans laquelle vous voulez gérer votre module.
          Cliquez sur la salle de votre choix puis gérer vos modules comme bon vous semble !
          Par exemple pour les lumières, vous pouvez les allumer/éteindre ainsi que gérer leur luminosité.
          Pour la température, cliquez simplement sur "+" ou "-" pour augmenter/diminuer la température de votre salle.
          Enfin pour les volets, gérez l'ouverture ou la fermeture de chaque volet de votre pièce grâce au slide à droite de chacun.

        </p>
    </div></li>
    <hr/>
    <li><div id="question_3">
      <h4>Comment ajouter/supprimer un utilisateur ?</h4>
        <p class="cache">
          Cette action est réservée uniquement aux utilisateurs possédant le statut de "Super User".
          Dans l'onglet "Gestion Utilisateurs" du menu déroulant, vous avez accès aux informations tous les utilisateurs de votre domicile.
          Vous pouvez à tout moment supprimer un utilisateur (en cliquant sur la petite poubelle à droite de celui-ci),
          modifier ce dernier (bouton "Modifier" à droite de l'utilisateur concerné) ou encore en ajouter un grâce au bouton "+" situé en bas de tableau.
          Lorsque vous cliquez sur ce bouton, une page pop-up s'ouvre et il ne vous reste plus qu'a remplir les informations du nouvel utilisateur de votre domicile avant de cliquer sur "Valider" !
        </p>
    </div></li>
    <hr/>
    <li><div id="question_4">
      <h4>Je veux parametrer un programme, comment faire ?</h4>
        <p class="cache">
          Dans l'onglet "Gestion Maison" du menu déroulant, cliquez sur "programmes".
          Cliquez sur l'onglet "+" situé en dessous du nom de votre domicile pour ajouter un programme.
          Choissisez la pièce dans laquelle vous voulez que votre programme prenne effet en la sélectionnant grâce au menu déroulant.
          Selectionnez ensuite le(s) module(s) que vous souhaitez programmer ainsi que l'horaire de leur programmation.
          Sauvergardez votre programme. Vous pourrez à tout moment le modifier ou le supprimer.
        </p>
    </div></li>
    <hr/>
    <li><div id="question_5">
      <h4>Je veux rajouter un module manuellement, est-ce possible ?</h4>
        <p class="cache">
          Dans l'onglet "Gestion Maison" vous pouvez avoir accès à tous vos modules en cliquant sur "associer modules".
          Dans cette page vous pouvez associer un module existant à une pièce de votre domicile mais VOUS NE POUVEZ PAS
          rajouter manuellement un nouveau module non existant lors de la configuration de votre maison.
          Si vous souhaitez rajouter un module, contactez directement le service client.
        </p>
    </div></li>
    <hr/>
    <li><div id="question_6">
      <h4></h4>
        <p class="cache">

        </p>
    </div></li>
</ul>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
