<?php @session_start();
$title = 'CeHD - Gestion modules - Température';
ob_start(); ?>
<script src="public/script/module_manage.js" type="text/javascript"></script>
<h1>Gestion de la température</h1>
<div>
    <?php while ($temp = $req->fetch()){ ?>
    <div>
        <h2><?= $temp['name']; ?></h2>
        <div>
            <p>Température actuelle de la pièce : <?= $temp['current_value']; ?> °C</p>
            <!-- Change the `data-field` of buttons and `name` of input field's for multiple plus minus buttons-->
            <div class="input-group plus-minus-input">
                <button type="button" class="button hollow circle change_qty minus cursor_hover" data-quantity="minus" data-field="quantity<?= $temp['id_room'];?>" datafld="<?= $temp['id_effector'];?>"  id="temp">
                    <i class="material-icons">remove_circle_outline</i>
                </button>

                <input class="input-group-field" type="text" name="quantity<?= $temp['id_room'];?>" value="<?= $temp['request_value']; ?>" max="30" min="15" step="0.1" readonly>

                <button type="button" class="button hollow circle change_qty plus cursor_hover" data-quantity="plus" data-field="quantity<?= $temp['id_room'];?>" datafld="<?= $temp['id_effector'];?>" id="temp">
                    <i class="material-icons">add_circle_outline</i>
                </button>

            </div>
        </div>

    </div>
    <?php } ?>

</div>


<?php $content_menu = ob_get_clean(); ?>

<?php require('tab_template.php'); ?>
