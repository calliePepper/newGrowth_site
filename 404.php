<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=uTF-8" /> 
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
        <title>New-Growth</title>
        <link rel="icon" href="/img/favicon.ico" type="image/x-icon" />
        <link href="/css/default.css" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Denk+One' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,900' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="/scripts/jquery.js"></script>
        <script type="text/javascript" src="/scripts/arrange.js"></script>
        <script type="text/javascript" src="/scripts/sha512.js"></script>
        <style>

#fof {
   position:absolute;height:600px;width:100%;top:0px;
    text-align: center;
}

#fof div {
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
}

#fof canvas,
#fof img {
    position: relative;
    width: 100%;
    height: 600px;
    z-index: 1;
    
    background: #000;
}
</style>        
    </head>
    <body>

        <header class='pageHeader404'>
        <div id='fof' style=''>
            <div>  </div>
                <canvas></canvas>
           
        </div>            
            <div id='proceduralArea'>
                <div id='leftSide' class='sideAreas'>

                </div>
                <div id='rightSide' class='sideAreas'>

                </div>                
            </div>
            <div id='overlay'>
                <div id='centrePiece'>
                     <div id='middleArea'>

                    </div>
                    <img src='/img/New-Growth_fae.png' alt='fae' id='fae' />
                    <img src='/img/New-Growth_jodie.png' alt='jodie' id='jodie' />
                </div>
                <div id='grass'> </div>
            </div>
        </header>
        <div id='wrapper'>
            <nav>
                <a href='/index.php' class='navigationGroup homeNav'></a>
                <a href='/projects.php' class='navigationGroup projectNav'></a>
                <a href='/portfolios.php' class='navigationGroup portfolioNav'></a>
                <a href='/contact.php' class='navigationGroup contactNav'></a>
            </nav>
                        
        </div>
        <div id="outterClear"> 
            <div id="clearMain" class="clearBox">
                <div id="contentArea" class="insetBox fullContent" style='text-align:center;padding-top:100px;'>
                    <h1>404. We're sorry, but the page you're looking for can't be found</h1>
                    <p>We tried really hard, we really summoned the eyes of the lost, but as hard we looked we couldn't find the page that you are looking for. Perhaps one of the pages above could show you the way you wished to go.</p>
                </div>          
            </div>
        </div>  
        <div id='footerLava'>

        </div>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-40923417-1', 'new-growth.com');
          ga('send', 'pageview');
        </script>         
        <script src="scripts/404.js"></script>
        <script>
            var testMode=0;
            if ($(window).width() > 900) {
              parseAndFill('proceduralArea','leftSide','rightSide','middleArea');
            } else {
              $('#proceduralArea').css('background','url(../img/mobileBg.png) center bottom');
            }
            function changeLayout() {
                if (testMode == 0)  {
                    $('.specialProject').addClass('textSpecial');
                    $('#contentArea').addClass('testContent');
                    testMode = 1;
                } else if (testMode == 1) {
                    $('#clearMain').addClass('testClear');
                    testMode = 2;
                } else {
                    $('.specialProject').removeClass('textSpecial');
                    $('#contentArea').removeClass('testContent');
                    $('#clearMain').removeClass('testClear');
                    testMode = 0;
                }
            }

        </script>
    </body>
</html>
