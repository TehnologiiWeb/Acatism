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
                        <li><?php echo $ceva; ?></li>
                        <li>Finish that module (until 02.06.2014, Monday)</li>
                    </ul>
                </nav>

            </section>

            <section id="recentActivity">
                <h4 class="summaryTitle">
                    Activitate recenta
                </h4>
                <nav class="activities">
                    <ul>
                        <li>File X updated on GitHub</li>
                        <li>File Y updated on GitHub</li>
                    </ul>
                </nav>
            </section>

            <section id="projectInfo">
                <h4 class="summaryTitle">
                    Detalii proiect in lucru
                </h4>
                <p class="description">
                    --Descriere proiect--
                </p>
            </section>

            <section id="feedbackProf">
                <h4 class="summaryTitle">
                    Feedback de la profesor
                </h4>
                <p class="message">
                    sadddddddd
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
