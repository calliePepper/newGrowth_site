<?php
  include $_SERVER['DOCUMENT_ROOT'].'/scripts/startScript.php';
  sec_session_start();
  $admin = 0;
  if(login_check($db) == true) {
      $admin = 1;
      if ($_SESSION['admin'] == 1) {
        $clientView = 0;
      } else {
        $clientView = 1;
      }
  } else {
    die('You do not have the rights to access this page');
  }  
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {
    $action = 'new';
  }
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }
  $directoryName='';
  $displayName='';
  $objectTags='';
  $currentContent='';
  $thumbnailer = '';
  if ($action == 'update') {
    $shortName = $_POST['shortName'];
    $fullName = $_POST['fullName'];
    $tags = $_POST['tags'];
    $content = stripslashes($_POST['editor1']);
    $description = stripslashes($_POST['editor2']);
    $editUser = $_SESSION['username'];
    $thumbnail = $_POST['thumbnail'];
    $editTimeStamp = time();
    $updateId = $_GET['id'];
    $sql = 'UPDATE projects SET shortname = ?, fullname = ?, tags = ?, content = ?,  description = ?, editUser = ?, editTimestamp = ?, thumbnail = ? WHERE id = ?';
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ssssssssi', $shortName, $fullName, $tags, $content, $description, $editUser, $editTimeStamp, $thumbnail, $updateId);
    $stmt->execute();
    $leave = 1;
    $id = $_GET['id'];
  } else if ($action == 'create') {
    $shortName = $_POST['shortName'];
    $fullName = $_POST['fullName'];
    $tags = $_POST['tags'];
    $content = stripslashes($_POST['editor1']);
    $description = stripslashes($_POST['editor2']);
    $editUser = $_SESSION['username'];
    $thumbnail = $_POST['thumbnail'];
    $editTimeStamp = time();
    $usersql = 'INSERT INTO projects (shortName,fullName,tags,content, description, creationUser,creationTimestamp,thumbnail) VALUES ( ? , ? , ? , ? , ? , ? , ? , ? )';
    $userps = $db->prepare($usersql);
    $defaultRights = '000';
    $userps->bind_param('ssssssss', $shortName, $fullName, $tags, $content, $description, $editUser, $editTimeStamp, $thumbnail);
    echo 'INSERT INTO projects (shortName,fullName,tags,content, description, creationUser,creationTimestamp,thumbnail) VALUES ( '.$shortName.' , '.$fullName.' , '.$tags.' , '.$content.' , '.$description.' , '.$editUser.' , '.$editTimeStamp.' , '.$thumbnail.' )';
    $userps->execute();
    $id = mysqli_insert_id($db);
  } 
  if ($action == 'edit' || $action == 'update' || $action == 'create') {
    $sql='SELECT * FROM projects WHERE id = ? LIMIT 1';
     
    /* Prepare statement */
    $stmt = $db->prepare($sql);
    if($stmt === false) {
      trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
    }
     
    /* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
    $stmt->bind_param('i',$id);
     
    /* Execute statement */
    $stmt->execute();

    $stmt->bind_result($id, $shortName, $fullName, $tags, $content, $description, $creationUser, $timeStamp, $editUser, $editTimeStamp, $thumbnail, $enabled);
    while ($stmt->fetch()) {
       $directoryName=$shortName;
       $displayName=$fullName;
       $objectTags=$tags;
       $currentContent=$content;
       $thumbnailer = $thumbnail;
    } 
    $futureAction = 'update&id=' . $id;
  } else if ($action == 'new') {
    $futureAction = 'create';
  }
  if ($leave == 1) {
    //echo "<script>window.location='".$page."';</script>";
  }    
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=uTF-8" /> 
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
        <title>New-Growth - Edit Project</title>
        <link rel="icon" href="/img/favicon.ico" type="image/x-icon" />
        <link href="/css/default.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="/css/jquery.tagsinput.css" />
        <link href='http://fonts.googleapis.com/css?family=Denk+One' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,900' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="/scripts/jquery.js"></script>
        <script type="text/javascript" src="/scripts/arrange.js"></script> 
        <script src="/scripts/jquery.tagsinput.min.js"></script>   
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
                    <img src='/img/New-Growth_logo.png' alt='Logo' id='logo' />
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
        <div id='outterClear'>            
            <div id='clearMain' class='clearBox'>
                <div id='contentArea' class='insetBox fullContent'>
                  <h1><?php if ($action == 'new') { ?>New<?php } else if ($action == 'edit') { ?>Edit<?php } ?> Project</h1>
                  <table class='editTable'>
                    <form method="POST" action='editProject.php?action=<?php echo $futureAction; ?>' id='editForm' name='editForm'>
                      
                      <tr><td>Full name</td><td><input type='text' placeholder='The name of the blog as it appears on the page' name='fullName' id='fullName' value='<?php echo $displayName; ?>' /></td></tr>
                      <tr><td>Short directory name</td><td><input type='text' placeholder='The directory name (no spaces, no punctuation)' name='shortName' id='shortName' value='<?php echo $directoryName; ?>' /></td></tr>
                      <tr><td>Current thumbnail</td><td><img src='<?php echo $thumbnailer; ?>' alt='thumbnail' id='currentThumbnail' /><input type='hidden' name='thumbnail' id='thumbnail' value='<?php echo $thumbnailer; ?>' /></td></tr>
                      <tr><td>Tags</td><td><input type='text' placeholder='Start tags with hash, seperate with a comma' name='tags' id='tags' value='<?php echo $objectTags; ?>' /></td></tr>
                      <tr><td>Description</td><td><textarea class="ckeditor" id="editor2" name="editor2"><?php echo $description; ?></textarea><br /></td></tr>
                      <tr><td>Content</td><td><textarea class="ckeditor" id="editor1" name="editor1"><?php echo $currentContent; ?></textarea><br /></td></tr>
                    </form>
                    <tr><td>Dropzone for content</td><td> <form action="post_file.php" id="dropzone1" class="dropzone"><div class="fallback"><input name="file" type="file" multiple /></div></form></td></tr>
                    <tr><td>Dropzone for thumbnail</td><td> <form action="post_fileThumb.php" id="dropzone2" class="dropzone"><div class="fallback"><input name="file" type="file" multiple /></div></form></td></tr>
                    <tr><td> </td><td><input type='submit' value='Submit' name='submitBtn' id='submitBtn' onclick="$('#editForm').submit();" /></td></tr>
                  </table>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
        <script src="/scripts/ckeditor/ckeditor.js"></script>
        <script type="text/javascript"  src="/scripts/dropzone.js"></script>
        <script src="/scripts/jquery.filedrop.js"></script>
        <script src="/scripts/script.js"></script>          
        <script>
            if ($(window).width() > 900) {
              parseAndFill('proceduralArea','leftSide','rightSide','middleArea');
            } else {
              $('#proceduralArea').css('background','url(../img/mobileBg.png) center bottom');
            }        
          CKEDITOR.addStylesSet( 'my_styles', [
                { name : 'Left Quote' , element : 'div', attributes : { 'class' : 'leftQuote' } },
                { name : 'Right Quote' , element : 'div', attributes : { 'class' : 'rightQuote' } },
                { name : 'Centre Quote' , element : 'div', attributes : { 'class' : 'centerQuote' } }
             ]);

          CKEDITOR.replace( 'editor1', {
            toolbar: [
                { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
                { name: 'formatting', items: ['Image', 'Format']},
                { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                '/',
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight',' JustifyBlock']},
                { name: 'links', items: ['Link', 'Unlink', 'Anchor']},
                { name: 'document', items: [ 'Source' ] },
                { name: 'tools', items: ['Maximize','ShowBlocks']},
            ],
          } );

          CKEDITOR.replace( 'editor2', {
            toolbar: [
                { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
                { name: 'formatting', items: ['Image', 'Format']},
                { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                '/',
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight',' JustifyBlock']},
                { name: 'links', items: ['Link', 'Unlink', 'Anchor']},
                { name: 'document', items: [ 'Source' ] },
                { name: 'tools', items: ['Maximize','ShowBlocks']},
            ],
          } );           
          //CKEDITOR.config.contentsCss = 'css/cmsCss.css';

          var dropZoneTime = new Dropzone("#dropzone1");
          var dropZoneTime2 = new Dropzone("#dropzone2");

          dropZoneTime.on("success", function(file) {
            CKEDITOR.instances['editor1'].insertHtml('<img src="uploads/' + file.name + '" alt="uploaded image" />');
          });

          dropZoneTime2.on("success", function(file) {
            $('#thumbnail').val('/uploads/' + file.name);
            $('#currentThumbnail').attr('src', '/uploads/' + file.name);
          });    
          $('#tags').tagsInput({
             'height':'50px',
              'width':'100%',
          });      
        </script>            
        </script>
    </body>
</html>
