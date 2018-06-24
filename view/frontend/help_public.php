<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>CeHD - Aide</title>
    <link rel="stylesheet" href="public/css/style.css" />
</head>

<body>

<div id='logo'>
    <a href="index.php?action=login_view"><img src='public/img/LOGO_small.png' alt='logo'/></a>
</div>
<div class="content_public">
    <h3><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Pictogram_voting_question.svg/220px-Pictogram_voting_question.svg.png" class="LogoAide" alt="LogoAide" />Aide</h3>
    <ul>
        <li>
            <input type="button" value="Comment se connecter pour la première fois ?" class="bouton" onclick="OnOff(1);">
            <span class="hidden_content">
        Lors de votre première connexion, cliquez sur "Première connexion" sur la page d'accueil puis renseignez dans le champ proposé l'adresse mail que vous avez choisi lors de la configuration de votre maison.
        Puis rentrez de la même façon le mot de passe de votre choix.
        Vous serez alors redirigé sur la page d'accueil et vous pourrez alors vous connecter en remplissant les champs de connexion.
      </span>



        </li>
        <hr/>
        <li>
            <input type="button" value="Comment gérer ses modules ?" class="bouton" onclick="OnOff(2);">
            <span class="hidden_content">
          Pour gérer vos modules, survolez l'onglet "Gestion Maison" dans le menu déroulant puis cliquez sur "gestion modules".
          Choissisez les modules que vous voulez gérer en sélectionnant un onglet parmi "Lumière", "Température" et "Volet".
          Dans chaque onglet un menu déroulant vous permet de choisir la salle dans laquelle vous voulez gérer votre module.
          Cliquez sur la salle de votre choix puis gérer vos modules comme bon vous semble !
          Par exemple pour les lumières, vous pouvez les allumer/éteindre.
          Pour la température, cliquez simplement sur "+" ou "-" pour augmenter/diminuer la température de votre salle.
          Enfin pour les volets, gérez l'ouverture ou la fermeture de chaque volet de votre pièce grâce également aux boutons "+" et "-".
      </span>
        </li>
        <hr/>
        <li>
            <input type="button" value="Comment ajouter/supprimer un utilisateur ?" class="bouton" onclick="OnOff(3);">
            <span class="hidden_content">
          Cette action est réservée uniquement aux utilisateurs possédant le statut de "Super User".
          Dans l'onglet "Gestion Utilisateurs" du menu déroulant, vous avez accès aux informations tous les utilisateurs de votre domicile.
          Vous pouvez à tout moment supprimer un utilisateur (en cliquant sur la petite poubelle à droite de celui-ci),
          modifier ce dernier (bouton "Modifier" à droite de l'utilisateur concerné) ou encore en ajouter un grâce au bouton "+" situé en bas de tableau.
          Lorsque vous cliquez sur ce bouton, une page s'ouvre et il ne vous reste plus qu'a remplir les informations du nouvel utilisateur de votre domicile avant de cliquer sur "Valider" !
      </span>
        </li>
        <hr/>
        <li>
            <input type="button" value="Comment associer un module ?" class="bouton" onclick="OnOff(4);">
            <span class="hidden_content">
          Pour associer vos modules, survolez l'onglet "Gestion Maison" dans le menu déroulant puis cliquez sur "associer modules".
          Choissisez les modules que vous voulez gérer en sélectionnant un onglet parmi "Lumière", "Température" et "Volet".
          Dans chaque onglet apparaît 2 tableaux, un pour les capteurs et un pour les actionneurs.
          Vos modules seront déjà associés à une pièce de votre habitation selon la configuration que vous avez définie lors de la mise en place de votre maison connectée avec DOMISEP.
          Vous pouvez à tout moment modifier l’association d’un module à une pièce en cliquant sur le bouton “modifier” situé sur la même ligne que le module que vous souhaitez changer.
          Après avoir cliqué sur ce bouton vous serez redirigé vers une page vous permettant de modifier le nom de votre module, son type ainsi que la pièce à laquelle il est associé.
          Validez vos choix en cliquant sur le bouton Modifier capteur/actionneur.

      </span>
        </li>
        <hr/>
        <li>
            <input type="button" value="Je veux rajouter un module manuellement, est-ce possible ?" class="bouton" onclick="OnOff(5);">
            <span class="hidden_content">
          Dans l'onglet "Gestion Maison" vous pouvez avoir accès à tous vos modules en cliquant sur "associer modules".
          Dans cette page vous pouvez associer un module existant à une pièce de votre domicile mais VOUS NE POUVEZ PAS
          rajouter manuellement un nouveau module non existant lors de la configuration de votre maison.
          Si vous souhaitez rajouter un module, <a href="index.php?action=contact">contactez</a> directement le service client.
      </span>
        </li>
    </ul>
</div>
<a class="retour" href="index.php?action=login_view">RETOUR</a>

</body>
<script type="text/javascript" src="public/script/main.js">
</script>
</html>