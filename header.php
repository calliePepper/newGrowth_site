<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=uTF-8" /> 
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
        <title>New-Growth - <?php echo $title; ?></title>
        <link rel="icon" href="/img/favicon.ico" type="image/x-icon" />
        <link href="/css/default.css" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Denk+One' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,900' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="/scripts/jquery.js"></script>
        <script type="text/javascript" src="/scripts/arrange.js"></script>
    </head>
    <body>
        <header>
            <div id='proceduralArea'>
                <div id='leftSide' class='sideAreas'>

                </div>
                <div id='rightSide' class='sideAreas'>

                </div>                
            </div>
            <div id='overlay'>
                <?php if ($admin==1) { ?>
                  <div id='adminPanel'>
                    <div id='userNameMachine'><?php echo $_SESSION['username']; ?></div>
                    <?php if ($clientView == 1) { ?><a class='adminStuff' href='/scripts/toggleAdmin.php'>Admin view</a><?php } else { ?><a class='adminStuff' href='/scripts/toggleAdmin.php'>User view</a><?php } ?>
                    <a class='adminStuff' href='/editBlog.php?action=new'>New Blog</a>
                    <a class='adminStuff' href='/editProject.php?action=new'>New Project</a>
                    <a class='adminStuff' href='/index.php?action=trigger'>Trigger Joker</a>
                    <a class='adminStuff' href='/scripts/logout.php'>Log out</a>
                  </div>
                <?php } ?>      
                <div id='centrePiece'>
                     <div id='middleArea'>

                    </div>
                    <a href='index.php'><div style='width:576px;height:166px;background:url("/img/New-Growth_logo_solved.gif");background-position:0% 0%;' alt='Logo' id='logo' class='animObject'></div></a>
                    <div style='width:48px;height:102px;background:url("/img/New-Growth_fae_solved.gif");background-position:0% 0%;' alt='fae' id='fae' class='animObject'></div>
                    <div style='width:40px;height:104px;background:url("/img/New-Growth_jodie_solved.gif");background-position:0% 0%;' alt='jodie' id='jodie' class='animObject'></div>
                </div>
                <div id='grass'> </div>
            </div>
        </header>
            <nav>
                <a href='/index.php' class='navigationGroup homeNav'></a>
                <a href='/projects.php' class='navigationGroup projectNav'></a>
                <a href='/portfolios.php' class='navigationGroup portfolioNav'></a>
                <a href='/contact.php' class='navigationGroup contactNav'></a>
            </nav>
            <div id='outterClear'>