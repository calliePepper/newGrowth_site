<?php include $_SERVER['DOCUMENT_ROOT'].'/scripts/startScript.php';
    $title = 'Contact us';
    include $_SERVER['DOCUMENT_ROOT'].'/header.php'; ?>
            <div id='clearMain' class='clearBox'>
                <div id='contentArea' class='insetBox fullContent contact'>
                    <!--<div id='contactEnvelope'>
                        <form accept-charset="utf-8" action="form.php?id=498818&amp;mail=send&amp;sec_hash=04f98bd0d17&amp;PHPSESSID=2511ce3dfdc5fd1e871456ed66177f2c" method="post" style="width: 100%;" novalidate="">
                            <div class='halfer'>  
                                <br />
                                <p class="form">Name:  <input type="text" class="form" name="name" value=""></p><p class="form">
                                E-Mail: <span style="font-weight: bolder; color: red;">*</span><input type="email" class="form" name="email" value=""></p>
                            </div>
                            <div class='halfer'>
                                <br /><br />
                                <p class="form">Message: <span style="font-weight: bolder; color: red;">*</span> <br>
                                <textarea name="nachricht" rows="9" class="form"></textarea></p>
                            </div>
                        </form>       
                    </div>-->
                    <h1>Contact us</h1>
                    <div class='halfer'>  
                        <h2>Send us an email</h2>
                        <p><strong>Fae Daunt</strong><br />
                        <a href='mailto:fae@new-growth.com'>fae@new-growth.com</a></p>
                        <p><strong>Jodie Peters</strong><br />
                        <a href='mailto:fae@new-growth.com'>sebastian@new-growth.com</a></p>
                    </div>
                    <div class='halfer'>  
                        <h2>Contact form</h2>
                        <form>
                            <table id='contactForm'>
                                <tr id='errorMessage'><td colspan='2'>Please fill in all input fields to continue</td></tr>
                                <tr><td class='contactLabels'>Name</td><td><input type='text' class='inputTimes' id='name' name='name'/></td></tr>
                                <tr><td class='contactLabels'>Email</td><td><input type='text' class='inputTimes' id='email' name='email'/></td></tr>
                                <tr><td class='contactLabels'>Message</td><td><textarea id='message' class='inputTimes' name='message'></textarea></td></tr>
                                <tr><td class='contactLabels'></td><td><img src='img/letterOpen.gif' alt='submitButton' id='submitBtn'/>
                                    <div id='envelope1' class='envelope'><img src='img/envelope2.png' alt='submitButton' id='envelope2' class='envelope'/></div>
                                </td></tr>
                            </table>
                            <div id='thankYou'>
                                <p>Thank you for your message, we will persevere to respond as soon as possible</p>
                            </div>
                        </form>
                    </div>                    
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

            $.fn.preload = function() {
                this.each(function(){
                    $('<img/>')[0].src = this;
                });
            }

            // Usage:

            $(['img/letterClose.gif','img/letterOpen.gif']).preload();

            $('#submitBtn').on({
                mouseenter: function () {
                    $('#submitBtn').attr('src','img/letterClose.gif?rnd=' +Math.random()+'');
                },
                mouseleave: function () {
                    $('#submitBtn').attr('src','img/letterOpen.gif?rnd=' +Math.random()+'');
                },
            });   

            $('#submitBtn').on('click touch', function() {
                $('.inputTimes').removeClass('redLine');
                $('#errorMessage').hide();
                var error = 0;
                if ($('#name').val() == "" || $('#name').val() == undefined) {
                    $('#name').addClass('redLine');
                    error = 1;
                }
                if ($('#email').val() == "" || $('#email').val() == undefined) {
                    $('#email').addClass('redLine');
                    error = 1;
                } 
                if ($('#message').val() == "" || $('#message').val() == undefined) {
                    $('#message').addClass('redLine');
                    error = 1;
                }
                if (error == 0){
                    $('#submitBtn').off();
                    $('#submitBtn').attr('src', 'img/letterClosed.png');
                    $('.envelope').show();
                    setTimeout(function(){$('#envelope1').addClass('envelopeRise')}, 400);
                    setTimeout(function(){$('#envelope2').addClass('tabDrop')}, 1000);
                    setTimeout(function(){$('#submitBtn').css('opacity','0');}, 1000);
                    setTimeout(function(){$('#envelope1').addClass('flyOff')}, 1500);
                    setTimeout(function(){$('#contactForm').fadeOut();}, 3000);
                    setTimeout(function(){$('#thankYou').fadeIn();}, 3500);
                    var name = $('#name').val();
                    var email = $('#email').val();
                    var message = $('#message').val();
                    $.ajax({
                        type: "POST",
                        url: "scripts/contactUs.php",
                        dataType: "JSON",
                        data: { 
                          'name': name, 
                          'email': email, 
                          'message': message 
                        },                    
                        success: function(html)
                        {
                           $('#contactForm').fadeOut();
                           $('#thankYou').fadeIn();
                        },
                            error: function (xhr, ajaxOptions, thrownError) {
                                emailAjaxCheck = 0;
                                console.log('Error! ' + ajaxOptions + ' - ' + thrownError);
                                console.log(xhr);
                            }                       
                    });
                } else {
                    $('#errorMessage').show();
                }     
            });       
        </script>
    </body>
</html>
