<!DOCTYPE html>
<html>
<!-- href="<?php echo base_url('assets\css\myProfileStudent.less'); ?>" -->

<head>
    <title>Acatism - Profilul meu</title>
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\myProfileStudent.css'); ?>" />
</head>

<body>

    <article>
        <h3>Profilul meu</h3>

        <section id="milestones">
            <h4 class="summaryTitle" >
                De realizat
            </h4>
            <nav class="todoList">
                <ul>
                    <li>Finish this module (until Today)</li>
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

    <!--jquery and javascript-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets\scripts\myProfileStudent.js'); ?>"></script>
    
</body>

</html>
