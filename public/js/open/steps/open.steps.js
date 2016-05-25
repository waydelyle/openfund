(function(){

    "use strict";


    /* -------------------------------------------------------------------- */
    /*
            Open.steps
    */
    /* -------------------------------------------------------------------- */


    Open.namespace("Open.steps");


    /* -------------------------------------------------------------------- */
    /*
            Steps
    */
    /* -------------------------------------------------------------------- */


    Open.steps = {
        firstStep: 0,
        currentStep: 0,
        steps: [],

        nextButton: '#nextButton',
        backButton: '#backButton',
        navigationBarClass: '.steps-navigation',

        nextButtonText: 'Next',
        finishButtonText: 'finish',

        showHideOperator: '.',
        showHideButtonOperator: '#',

        init: function (steps){

            var self = this;

            self.steps = steps;

            self.hideSteps();

            if(self.steps.length === 0){
                throw new Error('You have not provided valid steps. Check wizard.steps.');
            }

            if(self.currentStep === this.firstStep){
                self.activateButton();
                self.hideBackButton();
            }
        },

        hideSteps: function(){

            var self = this;

            var firstStep = self.steps[self.firstStep];
            var showHideOperator = self.showHideOperator;

            $(self.steps).each(function(){
                if(self.valueOf() != firstStep){
                    $(showHideOperator + self.valueOf()).hide();
                }
            });
        },

        nextStep: function(){

            var self = this;

            if(self.currentStep+1 === self.steps.length){
                return false;
            }

            self.hideStep();
            self.deactivateButton();

            self.currentStep = this.currentStep+1;

            if(self.currentStep === 1){
                self.showBackButton();
            }

            self.showStep();
            self.activateButton();

            if(self.currentStep+1 === self.steps.length){
                self.showFinishButton();
            }
        },

        backStep: function (){

            var self = this;

            self.hideStep();
            self.deactivateButton();

            if(self.currentStep === self.steps.length-1){
                self.showNextButton();
            }

            self.currentStep = self.currentStep-1;

            if(self.currentStep === self.firstStep){
                self.hideBackButton();
            }

            self.showStep();
            self.activateButton();
        },

        showStep: function(){
            $(this.showHideOperator + this.steps[this.currentStep]).show();
        },

        hideStep: function(){
            $(this.showHideOperator + this.steps[this.currentStep]).hide();
        },

        hideBackButton: function (){
            $(this.backButton).hide();
        },

        showBackButton: function (){
            $(this.backButton).show();
        },

        showNextButton: function (){
            $(this.nextButton).val(this.nextButtonText);
        },

        showFinishButton: function (){
            $(this.nextButton).val(this.finishButtonText);
        },

        activateButton: function(){
            $(this.showHideButtonOperator + this.steps[this.currentStep]).addClass('active');
        },

        deactivateButton: function(){
            $(this.showHideButtonOperator + this.steps[this.currentStep]).removeClass('active');
        },

        isFinalStep: function(){
            if(this.currentStep+1 === this.steps.length){
                return true;
            }

            return false;
        },

        // this method needs to be altered to work with settings above
        navigationBarClick: function(clickedObject){

            var self = this;
            var clickedId = clickedObject.id;

            self.deactivateButton();
            self.hideStep();

            self.currentStep = self.steps.indexOf(clickedId);

            if(self.currentStep+1 === self.steps.length){
                self.showFinishButton();
            } else if(self.currentStep === self.firstStep) {
                self.showNextButton();
                self.hideBackButton();
            } else {
                self.showBackButton();
                self.showNextButton();
            }

            self.activateButton();
            self.showStep()
        }
    }

})()





stepsWizard  = {

};
