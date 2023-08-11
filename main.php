
<?php

    include_once(__DIR__.'/vendor/autoload.php');
    include_once('src/data/website_array.php'); 

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="src/style/css/dashboard.css">
        <script type="text/javascript" src="src/js/dashboard.js"></script>
        <script src="src/lib/jquery-3.7.0.js"></script>
    </head>
    <body>
        <h1 style="margin-top:0px;">Services :</h1>

        <!-- <button onclick="">Refresh status for all</button><br> -->

        <div class="allServicesGrid">
        <?php
        //Version dynamique des services en utilisant un array avec des array
        foreach($services as $oneService){ ?>
            <div class="oneService">
                <h4><?= $oneService[1] ?></h4>
                <p><?= $oneService[2] ?></p>
                <?php
                if($oneService[3] != null && $oneService[3] != ""){
                    echo("Local service : ");
                    echo($oneService[3]); 
                    if($oneService[5] != null && $oneService != ""){ 
                        echo(":".$oneService[5]); 
                    }
                    ?><br>
                    <div id='<?= $oneService[0] . 'LocalServer' ?>' class="statusDiv">
                        <span id='<?= $oneService[0] . 'LocalServerSpan' ?>'>Server status : Unknown</span>
                        <div id='<?= $oneService[0] . 'LocalServerIcon' ?>' class="statusIcon grayStatus">&nbsp;</div>
                    </div><button class="pingBtn" onclick="pingIP('<?= $oneService[0] ?>','<?= $oneService[3] ?>','LocalServer')">Ping Server</button><br>
                    <div id='<?= $oneService[0] . 'LocalService' ?>' class="statusDiv">
                        <span id='<?= $oneService[0] . 'LocalServiceSpan' ?>'>Service status : Unknown</span>
                        <div id='<?= $oneService[0] . 'LocalServiceIcon' ?>' class="statusIcon grayStatus">&nbsp;</div>
                    </div>
                    <button class="pingBtn" onclick="getHeaders('<?= $oneService[0] ?>','<?= $oneService[3] ?>','LocalService')">Check service</button><br><br><hr><br> <?php
                }
                
                if($oneService[4] != null && $oneService[4] != ""){
                    echo("Online service : ");
                    echo($oneService[4]); 
                    if($oneService[6] != null && $oneService != ""){ 
                        echo(":".$oneService[6]); 
                    } ?><br>
                    <div id='<?= $oneService[0] . 'OnlineServer' ?>' class="statusDiv">
                        <span id='<?= $oneService[0] . 'OnlineServerSpan' ?>'>Server status : Unknown</span>
                        <div id='<?= $oneService[0] . 'OnlineServerIcon' ?>' class="statusIcon grayStatus">&nbsp;</div>
                    </div><button class="pingBtn" onclick="pingIP('<?= $oneService[0] ?>','<?= $oneService[4] ?>','OnlineServer')">Ping Server</button><br>
                    <div id='<?= $oneService[0] . 'OnlineService' ?>' class="statusDiv">
                        <span id='<?= $oneService[0] . 'OnlineServiceSpan' ?>'>Service status : Unknown</span>
                        <div id='<?= $oneService[0] . 'OnlineServiceIcon' ?>' class="statusIcon grayStatus">&nbsp;</div>
                    </div>
                    <button class="pingBtn" onclick="getHeaders('<?= $oneService[0] ?>','<?= $oneService[4] ?>','OnlineService')">Check service</button> <?php
                }?>
            </div> <?php
        } ?>
        </div><br>
    </body>
</html> 