<?php

use app\core\RestCall;

$rc = new RestCall();
$rc->method = 'POST';
$rc->data = [
'language' => 'fr',
'text' => 'Salut la compagnie'
];
$rc->contentType = 'text/html';

//
//var_dump($rc->check('fr', 'salut la compagnie'));
?>

<div class="container-fluid">
    <div class="row">
        <h2 class="demo-text">Language tool web client</h2>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 nopadding">
                <form class="async-form">    
                    <textarea id="txtEditor" name="text"></textarea>
                    <select name="language" id="language">
                        <option value="fr">Français</option>
                        <option value="en-US">English</option>
                    </select>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>