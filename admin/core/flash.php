<?php

function flash_create ($text, $type) {
    $_SESSION["flash"] = array ("text" => $text, "type" =>$type);
}

function flash_display (){
    if (isset($_SESSION["flash"])) { ?>
    <div class="alert alert-<?= $_SESSION["flash"]["type"]; ?>" role="alert">
        <?= $_SESSION["flash"]["text"]; ?>
        <?php unset($_SESSION["flash"]); ?>
    </div>
    <?php } } ?>