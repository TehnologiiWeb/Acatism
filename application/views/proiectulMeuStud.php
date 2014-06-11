<!DOCTYPE html>
<html>
<head>
    <title>Acatism - Lista teme</title>
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\myProfileStudent.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\static.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\proiectulMeuStud.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\scripts\dist\themes\default\style.min.css'); ?>" />

</head>

<body>

    <div id="content">
            <script> document.getElementById("content").style.height=screen.height+"px";</script>
            <header>
               
            </header>
            <div id="bara"> 
                <div id="username">
                <img class="line" src="<?php echo base_url('assets\images\line.png'); ?>" style="margin-right: 11%;" id="linie">
                    <label class="user"><b>Profilul meu</b></label>
                    <img src="<?php echo base_url('assets\images\profile.png'); ?>" id="profile">
                </div>
                <img class="line" src="<?php echo base_url('assets\images\line.png'); ?>">
            </div>
            <div id="cadru">        
                <nav id="meniu">
                    <ul id="butoanee">
                        <li id="profil" class="butoane">Profilul meu</li>
                        <li id="proiect" class="butoane">Proiectul meu</li>
                        <li id="profesori"class="butoane">Lista profesori</li>
                        <li id="teme" class="butoane">Lista teme</li>
                       
                    </ul>
                    <img src="<?php echo base_url('assets\images\temp.png'); ?>" id="stil">
                </nav>


                <article id="continut">
                   <img class="smallColt4" src="<?php echo base_url('assets\images\smallColt.png'); ?>">
                    <img class="smallColt5" src="<?php echo base_url('assets\images\smallColt.png'); ?>">
                    <img class="smallColt6" src="<?php echo base_url('assets\images\smallColt.png'); ?>">
                    <img class="smallColt7" src="<?php echo base_url('assets\images\smallColt.png'); ?>">
                   
            <h3>Profilul meu</h3>

                    <legend id="title">
                    
                    </legend>

                    <div id="jstree">
                        <?php

                            buildTree($arbore);

                            function buildTree($array){
                                                          
                                echo '<ul>';     

                                foreach ($array as $file) {

                                    if (is_array($file)) {

                                        echo '<li>' . $file['name'];
                                        buildTree($file['content']);
                                        echo '</li>';

                                    }
                                    else {
                                        echo '<li>' . $file . '</li>';
                                    }
                                }

                                echo '</ul>';

                            }
                            
                        ?>
                    </div>
                    <button>demo button</button>
                    <div id="event_result"></div>
                    <div id="event_result2"></div>                   
                    

                </article>
                <div id="slideMeniu">
                    <div class="divMeniu">
                    <a class="slideButton"><b>Editare cont</b></a>
                    </div>
                    <div class="divMeniu">
                    <a class="slideButton"><b>Delogare</b></a>
                    </div>
                </div>
            </div>
        </div>
    <!--jquery and javascript-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets\scripts\dist\libs\jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets\scripts\dist\jstree.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets\scripts\myProfileStudent.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets\scripts\proiectulMeuStud.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets\scripts\static.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets\scripts\jquery.watermark.js'); ?>"></script> 
    <script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/json2.js"></script>
</body>

</html>
