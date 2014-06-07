<!DOCTYPE html>
<html>
<!-- href="<?php echo base_url('assets\css\myProfileStudent.less'); ?>" -->

<head>
    <title>Acatism - Profilul meu</title>
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\myProfileStudent.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\static.css'); ?>" />
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
                    <!-- AICI DIV-UL CENTRAL-->
            <h3>Profilul meu</h3>

            <section id="milestones">
                <h4 class="summaryTitle" >
                    De realizat
                </h4>
                <nav class="todoList">
                    <ul>
                        <?php
                            if(!is_array($task)){
                                echo '<li>'.$task.'</li>';
                            } else {
                                foreach ($task as $atr) {
                                    echo '<li>' . $atr['nume'] . ' (' . $atr['descriere'] . ') pana in data de : '. $atr['deadline']  .'</li>';
                                }
                            }
                        ?>
                    </ul>
                </nav>

            </section>

            <section id="recentActivity">
                <h4 class="summaryTitle">
                    Activitate recenta
                </h4>
                <nav class="activities">
                    <ul>
                    <?php

                        if (is_array($commit)){

                            foreach ($commit as $atr) {
                                echo '<li>Userul ' . $atr['committer'] . ' a realizat urmatoarele modificari: ';
                                echo '<ul>';
                                echo '<li>Titlu commit : ' . $atr['message'] . '</li>';
                                foreach ($atr['files'] as $file) {
                                    echo '<li> '. $file['name'] . '    =>    ' . $file['status'] .'</li>';
                                }

                                echo '</ul>';
                            }

                        } else {
                            echo '<li>' . $commit . '</li>';
                        }

                    ?>
                    </ul>
                </nav>
            </section>

            <section id="projectInfo">
                <h4 class="summaryTitle">
                    Detalii proiect in lucru
                </h4>
                <p class="description">
                    <?php

                        if(is_array($detalii)){

                            echo '<ul>';

                                echo '<li>Titlu : ' . $detalii['titlu'] . '</li>';

                                echo '<li>Profesor : ' . $detalii['profesor'] . '</li>';

                                echo '<li>Descriere : ' . $detalii['descriere'] . '</li>';

                            echo '</ul>';

                        } else {
                            echo '<ul>';
                                echo '<li>' . $detalii . '</li>';
                            echo '</ul>';
                        }
                    ?>
                </p>
            </section>

            <section id="feedbackProf">
                <h4 class="summaryTitle">
                    Feedback de la profesor
                </h4>
                <p class="message">
                    <?php
                        print_r($feedback);
                    ?>
                </p>
            </section>
    
                </article>
                <div id="subSlideMeniu"></div> 
                <div id="slideMeniu">
                    <div class="divMeniu">
                    <a class="slideButton"><b>Editare cont</b></a>
                    </div>
                    <div class="divMeniu">
                    <a class="slideButton" href="<?php echo base_url('delogare'); ?>"><b>Delogare</b></a>
                    </div>
                </div>
            </div>
        </div>
            <!--<script type="text/javascript" src="jquery.js"></script>-->
    <!--jquery and javascript-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets\scripts\myProfileStudent.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets\scripts\static.js'); ?>"></script>
</body>

</html>
