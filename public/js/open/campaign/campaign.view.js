
(function(){

    "use strict";


    /* -------------------------------------------------------------------- */
    /*
            Open.campaign.view
    */
    /* -------------------------------------------------------------------- */


    Open.namespace("Open.campaign.view");


    /* -------------------------------------------------------------------- */
    /*
            Public
    */
    /* -------------------------------------------------------------------- */


    Open.campaign.view = {
        steps : [
           'overview',
           'about',
           'rewards',
           'fund',
           'message'
        ],
        initialize: function(){
            Open.steps.init(steps);

            $(document).on('click', Open.steps.navigationBarClass, function (){
                Open.steps.navigationBarClick(this)
            });
        }

    }
        $(function(){

            Open.campaign.view.initialize();

        });

    })()
