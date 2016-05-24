stepsWizard  = {
    firstStep: 0,
    currentStep: 0,
    steps: [],

    nextButton: '#nextButton',
    backButton: '#backButton',

    nextButtonText: 'Next',
    finishButtonText: 'finish',

    showHideOperator: '.',
    showHideButtonOperator: '#',

    init: function (steps){
        this.steps = steps;

        this.hideSteps();

        if(this.steps.length === 0){
            throw new Error('You have not provided valid steps. Check wizard.steps.');
        }

        if(this.currentStep === this.firstStep){
            this.activateButton();
            this.hideBackButton();
        }
    },

    hideSteps: function(){
        var firstStep = this.steps[this.firstStep];
        var showHideOperator = this.showHideOperator;

        $(this.steps).each(function(){
            if(this.valueOf() != firstStep){
                $(showHideOperator + this.valueOf()).hide();
            }
        });
    },

    nextStep: function(){
        if(this.currentStep+1 === this.steps.length){
            return false;
        }

        this.hideStep();
        this.deactiveButton();

        this.currentStep = this.currentStep+1;

        if(this.currentStep === 1){
            this.showBackButton();
        }

        this.showStep();
        this.activateButton();

        if(this.currentStep+1 === this.steps.length){
            this.showFinishButton();
        }
    },

    backStep: function (){
        this.hideStep();
        this.deactiveButton();

        if(this.currentStep === this.steps.length-1){
            this.showNextButton();
        }

        this.currentStep = this.currentStep-1;

        if(this.currentStep === this.firstStep){
            this.hideBackButton();
        }

        this.showStep();
        this.activateButton();
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

    deactiveButton: function(){
        $(this.showHideButtonOperator + this.steps[this.currentStep]).removeClass('active');
    },

    isFinalStep: function(){
        if(this.currentStep+1 === this.steps.length){
            return true;
        }

        return false;
    }
};