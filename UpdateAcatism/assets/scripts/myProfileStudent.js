$(document).ready(function () {
    $('#milestones .todoList').hide();
    $('#milestones .summaryTitle').click(function () {
        $(this).siblings('.todoList').slideToggle('slow');
    });

    $('#projectInfo .description').hide();
    $('#projectInfo .summaryTitle').click(function () {
        $(this).siblings('.description').slideToggle('slow');
        $(this).siblings('.recentActivity').slideToggle('slow');
    });

    $('#feedbackProf .message').hide();
    $('#feedbackProf .summaryTitle').click(function () {
        $(this).siblings('.message').slideToggle('slow');
    });

    $('#recentActivity .activities').hide();
    $('#recentActivity .summaryTitle').click(function () {
        $(this).siblings('.activities').slideToggle('slow');
    });

});