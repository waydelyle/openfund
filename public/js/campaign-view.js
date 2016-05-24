var steps = [
    'overview',
    'about',
    'rewards',
    'fund',
    'message'
];

$(document).ready(function(){
    stepsWizard.init(steps);

    $(document).on('click', stepsWizard.navigationBarClass, function (){
        stepsWizard.navigationBarClick(this)
    });
});