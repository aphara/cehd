<?php @session_start();
$title = 'CeHD - Gestion Maison';
ob_start(); ?>


    <h1 id="home_mana">Gestion de la maison</h1>
    <div id="nav_home_management">
        <div id="light">

            <h2>Température</h2>
                <p>Température actuelle du logement (moyenne) : <?= $temp_actual; ?> °C</p>
                <!-- Change the `data-field` of buttons and `name` of input field's for multiple plus minus buttons-->
                <div class="input-group plus-minus-input">
                       <button type="button" class="button hollow circle change_qty minus cursor_hover" data-quantity="minus" data-field="quantity" id="allTemp">
                           <i class="material-icons">remove_circle_outline</i>
                        </button>

                    <input class="input-group-field" type="text" name="quantity" value="<?= $temp_request; ?>" max="30" min="15" step="0.1" readonly>

                        <button type="button" class="button hollow circle change_qty plus cursor_hover" data-quantity="plus" data-field="quantity" id="allTemp">
                            <i class="material-icons">add_circle_outline</i>
                        </button>

                </div>


            <h2>Lumière</h2>
            <label class="switch">
                <?php
                echo '<input onchange="sendAllEffectorValue(this.id,this.checked)" '.($light=="ON"?"checked":"").' type="checkbox" id="allLight">'
                ;?>
                <span class="slider round"></span>
            </label>

            <h2>Alarme</h2>
        </div>


        <div id="volet">
            <h2>Volet</h2>
            <div id="range_volet">
                <div id="range_volet_int">
                    <div id="slider">
                        <script>
                            var value = <?= $shutter_request; ?>;
                        </script>
                    </div>
                    <div class="text">valeur = <span class="textcontent"></span> </div>
                </div>
                <div id="slider_image"></div>
            </div>
        </div>
    </div>


<script src="public/script/home_manage.js" type="text/javascript"></script>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
