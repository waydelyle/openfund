$(document).ready(function(){
    var basicContent = $('.basic');
    var pageContent = $('.page');
    var rewardsContent = $('.rewards');

    var basicButton = $('#basic');
    var pageButton = $('#page');
    var rewardsButton = $('#rewards');
    var fundButton = $('#fund');

    $(document).on('click', '#basic', function () {
        removeActiveClasses();
        basicButton.addClass('active');
        basicContent.show();
        pageContent.hide();
        rewardsContent.hide();
    });

    $(document).on('click', '#page', function () {
        removeActiveClasses();
        pageButton.addClass('active');
        pageContent.show();
        basicContent.hide();
        rewardsContent.hide();
    });

    $(document).on('click', '#rewards', function () {
        removeActiveClasses();
        rewardsButton.addClass('active');
        rewardsContent.show();
        basicContent.hide();
        pageContent.hide();
    });

    $(document).on('click', '#fund', function () {
        removeActiveClasses();
        fundButton.addClass('active');
        rewardsContent.show();
        basicContent.hide();
        pageContent.hide();
    });

});

function removeActiveClasses(){
    $('#basic').removeClass('active');
    $('#page').removeClass('active');
    $('#rewards').removeClass('active');
    $('#fund').removeClass('active');
}