<?php include $_SERVER['DOCUMENT_ROOT'].'/scripts/startScript.php';
    if (isset($_GET['tag'])) {
        $search = '#' . $_GET['tag'];
    } else {
        $search = str_replace("+", " ", $_GET['search']);
    }
    $title = 'Search results for ' . $search;
    include $_SERVER['DOCUMENT_ROOT'].'/header.php'; ?>
            <div id='clearMain' class='clearBox'>
                <div id='contentArea' class='insetBox fullContent'>
                    <input type='text' name='search' id='search' class='searchSearch' placeholder='Search' value="<?php echo $search; ?>"/><h1>Search results for <?php echo $search; ?></h1>
                        <?php
                          $results = 0;
                          if (isset($_GET['tag'])) {
                            $tagsList = array();
                            $sql='SELECT * FROM projects WHERE tags LIKE "%'.$_GET['tag'].'%" AND enabled = "1"';
                            /* Prepare statement */
                            $stmt = $db->prepare($sql);
                            if($stmt === false) {
                              trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
                            }

                            $stmt->execute();
                            $stmt->bind_result($id, $shortName, $fullName, $tags, $content, $description, $creationUser, $timeStamp, $editUser, $editTimeStamp, $thumbnail, $enabled);
                            while ($stmt->fetch()) { 
                                $results++;
                                ?>
                               <article class='searchResult'>
                                    <a href='/project/<?php echo $shortName; ?>'>
                                   <div class='date'>
                                       <?php echo date('j',$timeStamp) . '<span class="showMobile"><br /></span><span class="hideMobile">.</span>'. date('n',$timeStamp) . '<span class="showMobile"><br /></span><span class="hideMobile">.</span>' . date('Y',$timeStamp); ?>
                                   </div>
                                   <div class='details'>
                                       <h2>Project - <?php echo $fullName; ?></h2>
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
                                           <?php echo $description; ?>
                                       </div>
                                   </div>
                               </article>
                            <?php }   

                            $sql='SELECT * FROM articles WHERE tags LIKE "%'.$_GET['tag'].'%" AND enabled = "1"';
                            $stmt = $db->prepare($sql);
                            if($stmt === false) {
                              trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
                            }
                            $stmt->execute();
                            $stmt->bind_result($id, $shortName, $fullName, $tags, $content, $description, $creationUser, $timeStamp, $editUser, $editTimeStamp, $enabled);
                            while ($stmt->fetch()) { 
                                $results++;
                                ?>
                               <article class='searchResult'>
                                    <a href='/article/<?php echo $shortName; ?>'>
                                    <div class='date'>
                                       <?php echo date('j',$timeStamp) . '<span class="showMobile"><br /></span><span class="hideMobile">.</span>'. date('n',$timeStamp) . '<span class="showMobile"><br /></span><span class="hideMobile">.</span>' . date('Y',$timeStamp); ?>
                                    </div>
                                    <div class='details'>
                                       <h2>Article - <?php echo $fullName; ?></h2>
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
                                           <?php echo $description; ?>
                                       </div>
                                    </div>
                                    </a>
                               </article>
                            <?php }     
                        } else {
                            $tagsList = array();
                            $sql='SELECT * FROM projects WHERE fullName LIKE "%'.$search.'%" AND enabled = "1" OR content LIKE "%'.$search.'%" AND enabled = "1"';
                             
                            /* Prepare statement */
                            $stmt = $db->prepare($sql);
                            if($stmt === false) {
                              trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
                            }

                            $stmt->execute();
                            $stmt->bind_result($id, $shortName, $fullName, $tags, $content, $description, $creationUser, $timeStamp, $editUser, $editTimeStamp, $thumbnail);
                            while ($stmt->fetch()) {
                                $results++;
                                ?>                                
                               <article class='searchResult'>
                                    <a href='/project/<?php echo $shortName; ?>'>
                                   <div class='date'>
                                       <?php echo date('j',$timeStamp) . '<span class="showMobile"><br /></span><span class="hideMobile">.</span>'. date('n',$timeStamp) . '<span class="showMobile"><br /></span><span class="hideMobile">.</span>' . date('Y',$timeStamp); ?>
                                   </div>
                                   <div class='details'>
                                       <h2>Project - <?php echo $fullName; ?></h2>
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
                                           <?php echo $description; ?>
                                       </div>
                                   </div>
                               </article>
                            <?php }   

                            $sql='SELECT * FROM articles WHERE tags LIKE "%'.$search.'%" AND enabled = "1" OR content LIKE "%'.$search.'%" AND enabled = "1"';
                            $stmt = $db->prepare($sql);
                            if($stmt === false) {
                              trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
                            }
                            $stmt->execute();
                            $stmt->bind_result($id, $shortName, $fullName, $tags, $content, $description, $creationUser, $timeStamp, $editUser, $editTimeStamp);
                            while ($stmt->fetch()) { 
                                $results++;
                                ?>                                
                               <article class='searchResult'>
                                    <a href='/article/<?php echo $shortName; ?>'>
                                    <div class='date'>
                                       <?php echo date('j',$timeStamp) . '<span class="showMobile"><br /></span><span class="hideMobile">.</span>'. date('n',$timeStamp) . '<span class="showMobile"><br /></span><span class="hideMobile">.</span>' . date('Y',$timeStamp); ?>
                                    </div>
                                    <div class='details'>
                                       <h2>Article - <?php echo $fullName; ?></h2>
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
                                           <?php echo $description; ?>
                                       </div>
                                    </div>
                                    </a>
                               </article>
                            <?php }                               
                        }
                        if ($results == 0) { ?>
                            <article class='searchResult'>
                                <div id='noResults'>
                                    No Results
                                </div>
                            </article>
                        <?php } else {  ?>
                            <div id='resultCounter'>
                                <?php echo $results; ?> results
                            </div>
                        <?php }
                    ?>
                </div>          
            </div>
        </div>
        <?php include 'footer.php'; ?>
        <script>
            if ($(window).width() > 900) {
              parseAndFill('proceduralArea','leftSide','rightSide','middleArea');
            } else {
              $('#proceduralArea').css('background','url(../img/mobileBg.png) center bottom');
            }
            $('#search').keyup(function(e) {
              //alert(e.keyCode);
              if(e.keyCode == 13) {
                var searchValue = $('#search').val();
                var style = 'search';
                if (searchValue.substr(0,1) == '#') {
                  style = 'tag';
                  searchValue = searchValue.substring(1).split(' ').join('');
                } else {
                  searchValue = searchValue.split(' ').join('+')
                }
                window.location.href = "http://www.new-growth.com/searchResults.php?"+style+"="+searchValue;
              }
            });               
        </script>
    </body>
</html>
