var Open = Open || {};


(function(){

    "use strict";


    /* -------------------------------------------------------------------- */
    /*
            namespace files
    */
    /* -------------------------------------------------------------------- */


    Open.namespace = function(){

        var a = arguments;
        var o = null;
        var i;
        var j;
        var d;

        for(i = 0; i < a.length; i++){

            d = a[i].split(".");
            o = Cosmos;

            for(j = (d[0] === "Cosmos") ? 1 : 0; j < d.length; j = j + 1){

                o[d[j]] = o[d[j]] || {};
                o = o[d[j]];

            }

        }

        return o;

    };


})();
