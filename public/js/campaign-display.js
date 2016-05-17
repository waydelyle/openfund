$(document).ready(function(){
    var overviewContent = $('.overview');
    var aboutContent = $('.about');
    var rewardsContent = $('.rewards');
    var fundContent = $('.fund');
    var messageContent = $('.message');

    var overviewButton = $('#overview');
    var aboutButton = $('#about');
    var rewardsButton = $('#rewards');
    var fundButton = $('#fund');
    var messageButton = $('#message');

    hideOnLoad();

    $(document).on('click', '#overview', function () {
        removeActiveClasses();
        overviewButton.addClass('active');
        overviewContent.show();
        aboutContent.hide();
        rewardsContent.hide();
        fundContent.hide();
        messageContent.hide();
    });

    $(document).on('click', '#about', function () {
        removeActiveClasses();
        aboutButton.addClass('active');
        aboutContent.show();
        overviewContent.hide();
        rewardsContent.hide();
        fundContent.hide();
        messageContent.hide();
    });

    $(document).on('click', '#rewards', function () {
        removeActiveClasses();
        rewardsButton.addClass('active');
        rewardsContent.show();
        overviewContent.hide();
        aboutContent.hide();
        fundContent.hide();
        messageContent.hide();
    });

    $(document).on('click', '#fund', function () {
        removeActiveClasses();
        fundButton.addClass('active');
        fundContent.show();
        overviewContent.hide();
        rewardsContent.hide();
        aboutContent.hide();
        messageContent.hide();
    });

    $(document).on('click', '#message', function () {
        removeActiveClasses();
        messageButton.addClass('active');
        messageContent.show();
        overviewContent.hide();
        aboutContent.hide();
        rewardsContent.hide();
        fundContent.hide();
    });

});

function removeActiveClasses(){
    $('#overview').removeClass('active');
    $('#about').removeClass('active');
    $('#rewards').removeClass('active');
    $('#fund').removeClass('active');
    $('#message').removeClass('active');
}

function hideOnLoad(){
    $('.overview').hide();
    $('.about').hide();
    $('.rewards').hide();
    $('.fund').hide();
    $('.message').hide();
}