(function(){

    "use strict";


    /* -------------------------------------------------------------------- */
    /*
            Open.campaign.edit
    */
    /* -------------------------------------------------------------------- */


    Open.namespace("Open.campaign");


    /* -------------------------------------------------------------------- */
    /*
            Public
    */
    /* -------------------------------------------------------------------- */


    Open.campaign = {
        initialize: function(){
            var element = $('input.input-float');

            element.on('keydown keyup focus blur', function() {
                if($(this).val() != '') {
                    $(this).addClass('input--touched');
                } else{
                    $(this).removeClass('input--touched');
                }
            });
        }
    };

    $(function(){

        Open.campaign.initialize();

    });



})()
