<?php include $_SERVER['DOCUMENT_ROOT'].'/scripts/startScript.php';
  $title = 'Projects';
  include $_SERVER['DOCUMENT_ROOT'].'/header.php'; ?>
            <div id='clearMain' class='clearBox'>
                <div id='contentArea' class='insetBox fullContent'>
                    <h1>Latest Projects</h1>
                    <?php
                      $sql='SELECT * FROM projects WHERE enabled = "1" ORDER BY creationTimestamp DESC LIMIT 4';
                       
                      /* Prepare statement */
                      $stmt = $db->prepare($sql);
                      if($stmt === false) {
                        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
                      }
                        
                      /* Execute statement */
                      $stmt->execute();

                      $stmt->bind_result($id, $shortName, $fullName, $tags, $content, $description, $creationUser, $timeStamp, $editUser, $editTimeStamp, $thumbnail, $enabled);
                      while ($stmt->fetch()) {
                    ?>
                     <article class='projectArticles'>
                        <?php if ($admin==1 && $clientView != 1) { ?>
                          <div class='contentEdit'>
                            <a href='/editProject.php?action=edit&id=<?php echo $id; ?>'><img src='/img/editBtn.png' alt='edit button' /></a>
                            <a class='deleteButton' href='/deleteProject.php?id=<?php echo $id; ?>'><img src='/img/deleteBtn.png' alt='edit button' /></a>
                          </div>
                        <?php } ?>
                         <div class='date'>
                             <?php echo date('j',$timeStamp) . '<span class="showMobile"><br /></span><span class="hideMobile">.</span>'. date('n',$timeStamp) . '<span class="showMobile"><br /></span><span class="hideMobile">.</span>' . date('Y',$timeStamp); ?>
                         </div>
                         <div class='details'>
                             <h2><?php echo $fullName; ?></h2>
                               <div class='articleTags'><?php
                                $test = explode(',',$tags);
                                $first = 1;
                                foreach ($test as $value) {
                                  if ($first != 1) {
                                    echo ', ';
                                  } else {
                                    $first = 0;
                                  }
                                  echo '#' . $value; 
                                }
                              ?></div>                             
                             <div class='muted'><?php echo $creationUser; ?></div>
                             <div class='articleContent'>
                                 <img src='<?php echo $thumbnail; ?>' alt='<?php echo $fullName; ?>' class='projectThumb' />
                                 <?php echo $description; ?>
                                 <a href='/project/<?php echo $shortName; ?>' class='moreLink'>&lt;More&gt;</a>
                             </div>
                         </div>
                     </article>

                    <?php }
                    ?>                                       
                </div>          
            </div>
        </div>
        <?php include 'footer.php'; ?>
        <script>
            var testMode=0;
            var page = 1;
            var finished = 0;
            var processing = 0;        
            if ($(window).width() > 900) {
              parseAndFill('proceduralArea','leftSide','rightSide','middleArea');
            } else {
              $('#proceduralArea').css('background','url(../img/mobileBg.png) center bottom');
            }
            $(window).scroll(function()
            {
                if($(window).scrollTop() + 100 >= $(document).height() - $(window).height() && processing == 0 && finished == 0)
                {
                  processing = 1;
                    $('#loadmoreajaxloader').show();
                    $.ajax({
                    type: "GET",
                    url: "moreProjects.php",
                    dataType: "JSON",
                    data: { 
                      'pageSet': page, 
                    },                    
                    success: function(html)
                    {
                        if(html)
                        {
                            $("#contentArea").append(html['message']);
                            console.log(html);
                            console.log(page);
                            $('div#loadmoreajaxloader').hide();
                            page = page + 1;
                            if (html['finished'] == 1) {
                              finished = 1;
                            }
                            setTimeout(function(){processing = 0;},500);
                        }else
                        {
                            $('div#loadmoreajaxloader').html('<center>No more posts to show.</center>');
                        }
                    },
                        error: function (xhr, ajaxOptions, thrownError) {
                            emailAjaxCheck = 0;
                            console.log('Error! ' + ajaxOptions + ' - ' + thrownError);
                            console.log(xhr);
                        }                       
                    });
                  console.log('At the end');
                }
            });   

            $('.deleteButton').on('click touch', function() {
              var object = $(this).parent().parent();;
              if (confirm('Are you sure?')) {
                $.ajax({
                  type: "POST",
                  url: $(this).attr('href'),
                  dataType: "JSON",
                  data: { 
                    'type': 'booper', 
                  },                    
                  success: function(html)
                  {
                      if(html['status'] == 'Success')
                      {
                        console.log(object.remove());
                      }else
                      {
                        console.log(html['status']);
                      }
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                      emailAjaxCheck = 0;
                      console.log('Error! ' + ajaxOptions + ' - ' + thrownError);
                      console.log(xhr);
                  }                       
                });
                return false;
              }
            });                           
        </script>
    </body>
</html>
