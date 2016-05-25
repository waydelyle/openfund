(function(){

    "use strict";


    /* -------------------------------------------------------------------- */
    /*
            Open.campaign.edit
    */
    /* -------------------------------------------------------------------- */


    Open.namespace("Open.campaign.edit");


    /* -------------------------------------------------------------------- */
    /*
            Public
    */
    /* -------------------------------------------------------------------- */


    Open.campaign.edit = {

        steps : [
            'basic-information',
            'page-setup',
            'rewards'
        ],
        initialize : function(){

            var self = this;

            Open.steps.init(self.steps);

            $(document).on('click', Open.steps.nextButton, function () {
                if(Open.steps.isFinalStep()){
                    $('#campaign-edit-form').submit();
                }

                Open.steps.nextStep();
            });

            $(document).on('click', Open.steps.backButton, function () {
                Open.steps.backStep();
            });

            $(document).on('click', Open.steps.navigationBarClass, function (){
                Open.steps.navigationBarClick(this)
            });

        }

    }

    $(function(){

        Open.campaign.edit.initialize();

    });

})()
