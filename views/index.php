<?php

use app\core\RestCall;

$rc = new RestCall();
$response = $rc->check('fr', 'salut le compagnie, ça va?');
echo "<pre>";
var_dump(json_decode($response, true, 512, JSON_OBJECT_AS_ARRAY));
echo "</pre>";

$matches = json_decode($response, true, 512, JSON_OBJECT_AS_ARRAY)['matches'];
//The payload
$message = [];
$replacements = [];

foreach ($matches as $m) {

    $message[] = $m['message'];
    $replacements[] = $m['replacements'];
}


echo "<pre>";
var_dump($replacements);
echo "</pre>";
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