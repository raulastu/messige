    <?php
        $message = "";

        // print_r($_SERVER);
        $afterLink="";
        $messiTitle="Send messiges all over";
        if(isset($_GET["m"])){
            $base62 = $_GET["m"];
            // print_r($_SERVER);
            include_once 'php/data_objects/DAOLink.php';
            $message = getMessageByShort($base62);
            $afterLink="?m=".$_GET['m'];
            $messiTitle="Messi escribió un mensaje";
        }
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

        <meta name="og:title" content="Messige.com - <?php echo $messiTitle;?>" />
        <meta property="og:title" content="Messige.com - <?php echo $messiTitle;?>" />
        <meta name="og:description" content="Because Messi's got a better way to say it" />
        <meta property="og:description" content="Because Messi's got a better way to say it" />
        <meta name="og:url" content="http://messige.com<?php echo $_GET["m"]?>" />
        <meta property="og:url" content="http://messige.com<?php echo $_GET["m"]?>"/>
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


    </head>

    <!-- 420051148085813 -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=420051148085813";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <!-- <div class="siteHolder animated fadeInDown">
            <h1>messigi.com</h1>
        </div> -->
        <div class="siteHolder animated fadeInDown">
            <h1 style="font-family: Ubuntu; color:#1ba1e2;
                font-size:5em;
                margin:0;">
                Messige.com</h1>
            <h2 style="font-family: Ubuntu; 
                margin:0;"> 
                Make Messi message you!</h2>

            <canvas id="canv" style="display:none;"></canvas>
            <img id="canvasImg" alt="Right click to save me!">

            <div style="font-family: Ubuntu">Just type whatever you want, save the image (right click), and share it!</div>
            <form action="php/makelink.php" method="POST">
                <input id="message" name="message"
                    maxlength="41"  
                    class="txtMsg" onkeyup="drawMessiMessage()" type="text"value="<?php echo $message;?>"/>
                <!-- <div style="font-family: Ubuntu">Alternatively, you can share by copying this link</div> -->
                <!-- <input id="link-text" 
                     type="text" 
                     value="<?php echo $message?>"/> -->
                <input type="submit" value="or create link"/>
            </form>
            <br/>
            <!-- AddThis Button BEGIN -->
           <!--  <div class="addthis_toolbox addthis_default_style addthis_32x32_style"
                 style="position: absolute;right: 20px;"
                 addthis:url="http://messige.com"
                 addthis:image="http://messige.com/img/messige.png"
                 addthis:title="Messi has a message for you"
                 addthis:description="Messi has got a message for you">

                <a class="addthis_button_facebook at300b"
                    title="Facebook" href="#">
                    <span class=" at300bs at15nc at15t_facebook">
                        <span class="at_a11y">Share on facebook</span>
                    </span>
                </a>

                <a 
                    addthis:url="" 
                    addthis:description="" 
                    class="addthis_button_twitter at300b" title="Tweet" 
                    href="#">
                    <span class=" at300bs at15nc at15t_twitter">
                        <span class="at_a11y">Share on twitter</span>
                    </span>
                </a>
                <a class="addthis_button_google_plusone_share at300b" 
                    href="http://www.addthis.com/bookmark.php?v=300&amp;winname=addthis&amp;pub=ra-4feb83083011e6dd&amp;source=tbx32-300&amp;lng=en-US&amp;s=google_plusone_share&amp;url=http%3A%2F%2Fcodeforces.com%2FbestRatingChanges%2F211639&amp;title=erreze%20-%20Impressive%20Success%20on%20Codeforces&amp;ate=AT-ra-4feb83083011e6dd/-/-/513f97469e36948f/2&amp;frommenu=1&amp;uid=513f9746d273e3b2&amp;description=Wow!%20Coder%20erreze%20competed%20in%20Codeforces%20Round%20%23168%20(Div.%202)%20and%20gained%20%2B95%20rating%20points%20taking%20place%20574&amp;ct=1&amp;pre=http%3A%2F%2Fcodeforces.com%2Fprofile%2Ferreze&amp;tt=0&amp;captcha_provider=nucaptcha" 
                    target="_blank" 
                    title="Google+">
                    <span class=" at300bs at15nc at15t_google_plusone_share">
                        <span class="at_a11y">Share on google_plusone_share
                        </span>
                    </span>
                </a>
            </div> -->
            <!-- AddThis Button END -->

            
<!--             <a target="_blank" style="text-align: right;display:block" href="http://facebook.com/sharer.php?u=messige.com<?php echo $afterLink?>">
                <img src="img/fb_share.gif" style="cursor: hand; cursor: pointer; "/>
            </a> -->
            <fb:like href="http://messige.com" layout="standard" width="100px" show_faces="true" font="verdana"></fb:like>
        </div>
        
        <!-- Add your site or application content here -->
        <!-- <p id="para">Hello world! This is HTML5 Boilerplate.</p> -->

        
        <script src="js/plugins.js"></script>
        <script src="js/canv.js"></script>
        

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
