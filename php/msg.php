<?php
        $message = "";

        if(isset($_GET["m"])){
            $base62 = $_GET["m"];
            // print_r($_SERVER);
            include_once 'php/data_objects/DAOLink.php';
            $message = getMessageByShort($base62);
        }
        function encodeURIComponent($str) {
            $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
            return strtr(rawurlencode($str), $revert);
        }
        // print_r($_SERVER);
        
    ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <meta name="og:title" content="Messige.com - Send messiges all over" />
        <meta property="og:title" content="Messige.com - Send messiges all over" />
        <meta name="og:description" content="Because Messi's got a better way to say it" />
        <meta property="og:description" content="Because Messi's got a better way to say it" />
        <meta name="og:url" content="http://messige.com/msg.php?m=<?php echo $_GET["m"]?>" />
        <meta property="og:url" content="http://messige.com/msg.php?m=<?php echo $_GET["m"]?>"/>
        <meta name="og:image" content="http://messige.com/img/messige.png" />
        <meta property="og:image" content="http://messige.com/img/messige.png" />


        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->


        <link rel="stylesheet" href="css/normalize.css">
        <link href='css/fonts.css' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
        

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.0.min.js"><\/script>')</script>
        <!-- <link href='http://fonts.googleapis.com/css?family=Clicker+Script' rel='stylesheet' type='text/css'> -->
        <!-- <link href='http://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet' type='text/css'> -->
        <!-- <link href='http://fonts.googleapis.com/css?family=Cedarville+Cursive' rel='stylesheet' type='text/css'> -->
        <!-- <script src="js/main.js"></script> -->
        <script src="js/plugins.js"></script>
        <script src="js/canv.js"></script>

    </head>
    
    <body style="background-color: black">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <!-- <div class="siteHolder animated fadeInDown">
            <h1>messigi.com</h1>
        </div> -->
        <div class="siteHolder animated fadeInDown">

            <canvas id="canv" style="display:none;"></canvas>
            <img style="padding-top: 20%" id="canvasImg" alt="Right click to save me!">

            <form action="php/makelink.php" method="POST">
                <input id="message" name="message"
                    maxlength="41"  
                    style="display:none;"
                    class="txtMsg" onkeyup="drawMessiMessage()" type="text"value="<?php echo $message;?>"/>
            </form>
            <br/>
            <a style="font-size:12px;
                font-family: 'Nothing you Could do'"
                href="./?m=<?php echo $base62 ?>">Edit</a>
            <a target="_blank" style="text-align: right;display:block" href="http://facebook.com/sharer.php?u=<?php echo encodeURIComponent($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);?>">
                <img src="img/fb_share.gif" style="cursor: hand; cursor: pointer; "/>
            </a>

        </div>
        
        <!-- Add your site or application content here -->
        <!-- <p id="para">Hello world! This is HTML5 Boilerplate.</p> -->

        
        

        

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
