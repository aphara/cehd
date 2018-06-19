<?php @session_start();
$title = 'CeHD - Gestion Maison';
ob_start(); ?>



    <h1>gestion de la maison de <?= htmlspecialchars($_SESSION['name']) ?></h1>
    <div id="nav_home_management">
        <div id="light">
            <h2>Température</h2>


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
            <form method="post" action="#" onchange="AfficheRange()" onkeyup="AfficheRange()">
                <fieldset>
                    <input id="Range" type="range" orient="vertical" id="range_volet" step="10" value="0" min="0" max="100">
                    <img id="AfficheValue" src="public/img/volet0.PNG" alt="niveau_volet"/>
                    <span id="value_range">Value=0</span>
                </fieldset>
            </form>
            <script type="text/javascript">
                function AfficheRange() {
                    var R=document.getElementById("Range").value;
                    document.getElementById("value_range").innerHTML="Valeur="+R;
                    if (R==0){
                        document.getElementById("AfficheValue").src="public/img/volet0.PNG";
                    }
                    if (R==10){
                        document.getElementById("AfficheValue").src="public/img/voley10.PNG";
                    }
                    if (R==20){
                        document.getElementById("AfficheValue").src="public/img/voley20.PNG";
                    }
                    if (R==30){
                        document.getElementById("AfficheValue").src="public/img/voley30.PNG";
                    }
                    if (R==40){
                        document.getElementById("AfficheValue").src="public/img/voley40.PNG";
                    }
                    if (R==50){
                        document.getElementById("AfficheValue").src="public/img/voley50.PNG";
                    }
                    if (R==60){
                        document.getElementById("AfficheValue").src="public/img/voley60.PNG";
                    }
                    if (R==70){
                        document.getElementById("AfficheValue").src="public/img/voley70.PNG";
                    }
                    if (R==80){
                        document.getElementById("AfficheValue").src="public/img/voley80.PNG";
                    }
                    if (R==90){
                        document.getElementById("AfficheValue").src="public/img/voley90.PNG";
                    }
                    if (R==100){
                        document.getElementById("AfficheValue").src="public/img/voley100.PNG";
                    }


                }
            </script>
        </div>
    </div>




<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
