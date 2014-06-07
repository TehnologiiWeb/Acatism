<!DOCTYPE html>
<html>
<head>
    <title>Acatism - Lista teme</title>
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\myProfileStudent.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\static.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\listaProfs.css'); ?>" />

</head>

<body>

    <div id="content">
            <script> document.getElementById("content").style.height=screen.height+"px";</script>
            <header>
                <img class="pozaDreaptaSus" src="<?php echo base_url('assets\images\studenti.png'); ?>">
                <img  class="pozaDreaptaSus" src="<?php echo base_url('assets\images\colt.png'); ?>">
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
                        <li id="profesori"class="butoane">Lista profesori</li>
                        <li id="teme" class="butoane">Lista teme</li>
                        <li id="proiect" class="butoane">Proiectul meu</li>
                        <li id="profil" class="butoane">Profilul meu</li>
                    </ul>
                    <img src="<?php echo base_url('assets\images\colt.png'); ?>" style="width: 100%;">
                </nav>


                <article id="continut">
                    
                    <div id="container">
                        <input type="text" name="search" id="search" />                            
                    </div>

                    <table id="tableList">
                        <tr>
                            <th>Nume Prenume</th>
                            <th></th>
                        </tr>
                            
                        <?php
                            foreach ($temeProfesori as $index) 
                            {
                                echo '<tr class="odd">';
                                    echo '<td>';
                                        echo $index['numeProf'];
                                    echo '</td>';

                                    echo '<td><div class="arrow"/></td>';
                                echo '</tr>';
                                echo '<tr>';
                                    echo '<td colspan="3">';
                                        echo '<h4>';
                                        echo    'Lista temelor aferente acestui profesor';
                                        echo '</h4>';

                                        echo '<ul>';
                                            foreach ($index['teme'] as $tema) 
                                            {
                                                echo '<li>' . $tema['titlu'] . '</li>';

                                                echo '<ul>';
                                                    if ($tema['tipTema'] == 0)
                                                        echo '<li>Tema de licenta</i>';
                                                    else
                                                        echo '<li>Tema de masterat</i>';

                                                    if ($tema['disp'] == 1)
                                                        echo '<li>Tema disponibila</i>';
                                                    else
                                                        echo '<li>Tema indisponibila</li>';
                                                echo '</ul>';
                                            }
                                        echo '</ul>';

                                    echo '</td>';

                                echo '</tr>';
                            }

                        ?>
                    </table>

                </article>
                <div id="subSlideMeniu"></div> 
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
            <!--<script type="text/javascript" src="jquery.js"></script>-->
    <!--jquery and javascript-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets\scripts\myProfileStudent.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets\scripts\listaProfs.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets\scripts\static.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets\scripts\jquery.watermark.js'); ?>"></script> 
    <script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/json2.js"></script>
</body>

</html>
