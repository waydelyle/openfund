var steps = [
    'basic-information',
    'page-setup',
    'rewards'
];

$(document).ready(function(){

    stepsWizard.init(steps);

    $(document).on('click', stepsWizard.nextButton, function () {
        if(stepsWizard.isFinalStep()){
            $('#campaign-edit-form').submit();
        }
        
        stepsWizard.nextStep();
    });

    $(document).on('click', stepsWizard.backButton, function () {
        stepsWizard.backStep();
    });
});