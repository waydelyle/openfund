$(document).ready(function(){
    var overviewContent = $('.overview');
    var aboutContent = $('.about');
    var rewardsContent = $('.rewards');

    var overviewButton = $('#overview');
    var aboutButton = $('#about');
    var rewardsButton = $('#rewards');
    var fundButton = $('#fund');
    var MessageButton = $('#message');

    hideOnLoad();

    $(document).on('click', '#overview', function () {
        removeActiveClasses();
        overviewButton.addClass('active');
        overviewContent.show();
        aboutContent.hide();
        rewardsContent.hide();
    });

    $(document).on('click', '#about', function () {
        removeActiveClasses();
        aboutButton.addClass('active');
        aboutContent.show();
        overviewContent.hide();
        rewardsContent.hide();
    });

    $(document).on('click', '#rewards', function () {
        removeActiveClasses();
        rewardsButton.addClass('active');
        rewardsContent.show();
        overviewContent.hide();
        aboutContent.hide();
    });

    $(document).on('click', '#fund', function () {
        removeActiveClasses();
        fundButton.addClass('active');
        rewardsContent.show();
        overviewContent.hide();
        aboutContent.hide();
    });

    $(document).on('click', '#message', function () {
        removeActiveClasses();
        MessageButton.addClass('active');
        rewardsContent.show();
        overviewContent.hide();
        aboutContent.hide();
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
    $('.message').hide();
}