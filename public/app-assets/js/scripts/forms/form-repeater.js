/*=========================================================================================
    File Name: form-repeater.js
    Description: form repeater page specific js
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy HTML Admin Template
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  // form repeater jquery
  $('.invoice-repeater, .repeater-default').repeater({

    show: function () {
      $(this).slideDown();

      //get the count of the data-repeater
      var selfRepeaterItem = this;
      var repeaterItems = $("div[data-repeater-item]");
      $(selfRepeaterItem).attr('data-index', repeaterItems.length - 1);

      //add expense - add Validation for repeater fields
      var ruleSet = {
        required: true,
        messages: {
          required: "This field is required."
        }
      };
      $(this).find('.form-control').each(function () {
        $(this).rules('add', ruleSet);
      });
      $(this).find('[name*="fromfile"]').each(function () {
        $(this).rules('add', ruleSet);
      });
      $(this).find('[name*="e-category"]').each(function () {
        $(this).rules('add', ruleSet);
      });

      // select2 Fix
      $('.select2').each(function () {
        $(this).next('.select2-container').remove();
        $(this).removeAttr('id');
        $(this).select2({
          placeholder: "Select Value",
          dropdownAutoWidth: true,
          width: '100%',
          dropdownParent: $(this).parent()
        });
      });

      //date picker Fix
      $('.flatpickr-basic').each(function () {
        $(this).flatpickr();
      });

      // Feather Icons
      if (feather) {
        feather.replace({ width: 14, height: 14 });
      }
    },
    hide: function (deleteElement) {
      if (confirm('Are you sure you want to delete this element?')) {
        $(this).slideUp(deleteElement);
      }
    },

  });
});
function initSelect2(selectElement) {
  $(selectElement).select2({
    // the following code is used to disable x-scrollbar when click in select input and
    // take 100% width in responsive also
    dropdownAutoWidth: true,
    width: '100%',
    dropdownParent: $(this).parent()
  });
}