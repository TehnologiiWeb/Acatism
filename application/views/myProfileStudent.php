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
            <script> document.getElementById("content").style.height=screen.height-200+"px";</script>
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
                    <!-- AICI DIV-UL CENTRAL-->
                <img class="smallColt4" src="<?php echo base_url('assets\images\smallColt.png'); ?>">
                <img class="smallColt5" src="<?php echo base_url('assets\images\smallColt.png'); ?>">
                <img class="smallColt6" src="<?php echo base_url('assets\images\smallColt.png'); ?>">
                <img class="smallColt7" src="<?php echo base_url('assets\images\smallColt.png'); ?>">
               
            <h3>Profilul meu</h3>

            <section id="milestones">
                <h4 class="summaryTitle" >
                   &#167 De realizat
                </h4>
                  <img class="linie" src="<?php echo base_url('assets\images\linie.png'); ?>">
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
                   &#167  Activitate recenta
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
                   &#167 Detalii proiect in lucru
                </h4>
                <img class="linie" src="<?php echo base_url('assets\images\linie.png'); ?>">
                <nav class="description">
                    <ul>
                        <?php

                            if(is_array($detalii))
                            {

                                    echo '<li>Titlu : ' . $detalii['titlu'] . '</li>';

                                    echo '<li>Profesor : ' . $detalii['profesor'] . '</li>';

                                    echo '<li>Descriere : ' . $detalii['descriere'] . '</li>';

                            } else {
                                    echo '<li>' . $detalii . '</li>';
                            }
                        ?>
                    </ul>
                </nav>
            </section>

            <section id="feedbackProf">
                <h4 class="summaryTitle">
                   &#167 Feedback de la profesor
                </h4>
                <nav class="message">
                    <ul>
                        <?php

                            if (is_array($feedback)) 
                            {
                                foreach ($feedback as $mess) {
                                    echo '<li>' . $mess['titlu'] . '</li>';

                                    echo '<li>' . $mess['autor'] .'</li>';

                                    echo '<ul>';

                                        echo '<li>' . $mess['data'] . '</li>';
                                        echo '<li>' . $mess['continut'] . '</li>';

                                    echo '</ul>';

                                }
                            }
                            else
                            {
                                echo '<li>' . $feedback . '</li>';
                            }

                        ?>
                    </ul>
                </nav>
            </section>
    
                </article>
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
