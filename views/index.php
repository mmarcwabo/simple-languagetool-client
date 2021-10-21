<?php
//To do - Use a form creator class
//
?>
<h2 class="demo-text">Language tool web client</h2>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 nopadding">
                    <form class="async-form-" action="index.php" method="post">
                        <textarea id="txtEditor" name="text"></textarea>
                        <select name="language" id="language">
                            <option value="fr">Français</option>
                            <option value="en">English</option>
                        </select>
                        <input type="submit" value="Tester">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php

    use app\core\RestCall;
    use app\core\RestResponse;
    //Get data sent by post
    $text = isset($_POST['text']) ? htmlspecialchars($_POST['text']) : '';
    echo "eo";
    echo $text;
    //Set language to french by default
    $language = isset($_POST['language']) ? htmlspecialchars($_POST['language']) : 'fr';
    //Rest call here
    $rc = new RestCall();
    $response = $rc->check($language, $text);
    //Handle the response here
    $rr = new RestResponse();
    $rr->getResponse($response);
    ?>
    
    <div class="row">
        <div class="container">
    <div class="col-lg-3 col-md-3">
    <h4>Text sent for check</h4>
        <pre><b><p style="color:blue;">
        <?php
        if($text){
           echo $text;
        }else{
            echo 'No text to check';
        }
        
        ?>
        </p></b></pre>
    </div>  
    <div class="col-lg-3 col-md-3" >
        <h4>Warning messages</h4>
        <pre><p style="color:brown;"><?php
        if($rr->getMatchMessages()){
           foreach(($rr->getMatchMessages()) as $w){
            echo (trim($w) =='') ? '': $w.'<br/>';
        } 
        }else{
            echo 'No warning to display';
        } 
         ?>
        </p></pre>
    </div>
    <div class="col-lg-3 col-md-3">
    <h4>Correction suggestions</h4>
    <pre><p style="color:green;"><?php
    if($rr->getMatchReplacements()){
        if($rr->getMatchReplacements()[0]){
            foreach(($rr->getMatchReplacements()[0]) as $r){
            echo (trim($r['value']) =='') ? '': $r['value'].'<br/>';
            }
        }else{
            echo 'No match found to display';
        }       
    }else{
        echo 'No corrections to display';
    }
    ; 
    ?></p></pre>
    </div>
    </div>
    </div>
</div>