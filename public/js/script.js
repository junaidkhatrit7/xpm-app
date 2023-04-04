jQuery(document).ready(function ($) {
    //console.log('dev here');

    //add expense - add Validation for repeater fields
    var ruleSet = {
        required: true,
        messages: {
            required: "This field is required."
        }
    };
    $('#event-step .form-control').each(function () {
        $(this).rules('add', ruleSet);
    });
    $('[name*="fromfile"]').each(function () {
        $(this).rules('add', ruleSet);
    });
    $('[name*="e-category"]').each(function () {
        $(this).rules('add', ruleSet);
    });


});