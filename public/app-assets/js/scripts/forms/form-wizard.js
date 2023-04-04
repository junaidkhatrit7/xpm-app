/*=========================================================================================
    File Name: wizard-steps.js
    Description: wizard steps page specific js
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  var bsStepper = document.querySelectorAll('.bs-stepper'),
    select = $('.select2'),
    horizontalWizard = document.querySelector('.horizontal-wizard-example'),
    verticalWizard = document.querySelector('.vertical-wizard-example'),
    modernWizard = document.querySelector('.modern-wizard-example'),
    modernVerticalWizard = document.querySelector('.modern-vertical-wizard-example');

  // Adds crossed class
  if (typeof bsStepper !== undefined && bsStepper !== null) {
    for (var el = 0; el < bsStepper.length; ++el) {
      bsStepper[el].addEventListener('show.bs-stepper', function (event) {
        var index = event.detail.indexStep;
        var numberOfSteps = $(event.target).find('.step').length - 1;
        var line = $(event.target).find('.step');

        // The first for loop is for increasing the steps,
        // the second is for turning them off when going back
        // and the third with the if statement because the last line
        // can't seem to turn off when I press the first item. ¯\_(ツ)_/¯

        for (var i = 0; i < index; i++) {
          line[i].classList.add('crossed');

          for (var j = index; j < numberOfSteps; j++) {
            line[j].classList.remove('crossed');
          }
        }
        if (event.detail.to == 0) {
          for (var k = index; k < numberOfSteps; k++) {
            line[k].classList.remove('crossed');
          }
          line[0].classList.remove('crossed');
        }
      });
    }
  }

  // select2
  select.each(function () {
    var $this = $(this);
    $this.wrap('<div class="position-relative"></div>');
    $this.select2({
      placeholder: 'Select value',
      dropdownParent: $this.parent()
    });
  });

  // Horizontal Wizard
  // --------------------------------------------------------------------
  if (typeof horizontalWizard !== undefined && horizontalWizard !== null) {
    var numberedStepper = new Stepper(horizontalWizard),
      $form = $(horizontalWizard).find('form');

    $form.each(function () {
      var $this = $(this);
      $this.validate({
        rules: {
          'first-name': {
            required: true
          },
          'last-name': {
            required: true
          },
          'email': {
            required: true
          },
        }
      });
    });

    $(horizontalWizard).find('.btn-next').each(function () {
      $(this).on('click', function (e) {
        //var isValid = $(this).parent().siblings('form').valid();
        var isValid = $(this).parent().closest('form').valid();
        if (isValid) {
          //add expense form review step
          var step_id = $(this).parent().closest('.content').attr('id');
          if (step_id == 'personal-info' || step_id == 'event-step') {
            getData4Review();
          }

          numberedStepper.next();

        } else {
          e.preventDefault();
        }
      });
    });

    $(horizontalWizard).find('.btn-prev').on('click', function () {
      numberedStepper.previous();

      //reset review table to get updated details 
      if ($('.invoice-preview-card').length) {
        var rowCount = $('.invoice-preview-card .table-responsive .table > tbody > tr').length;
        if (rowCount > 0) {
          $('.invoice-preview-card .table-responsive .table > tbody').children('tr').remove();
        }
      }
    });

    $(horizontalWizard).find('.btn-submit').on('click', function () {
      //var isValid = $(this).parent().siblings('form').valid();
      var isValid = $(this).parent().closest('form').valid();
      if (isValid) {
        alert('Submitted..!!');
      }
    });

    //add expense form review step
    function getData4Review() {
      //personal info
      $('.invoice-preview-card #first-name').text($('#first-name').val());
      $('.invoice-preview-card #last-name').text($('#last-name').val());
      $('.invoice-preview-card #contact-number').text($('#email').val());
      $('.invoice-preview-card #email').text($('#contact-number').val());

      var subtotal_arr = [],
        tax_arr = [],
        total_arr = [],
        sum_subtotal = 0,
        sum_total = 0,
        sum_tax = 0;

      //expense detail
      $('.invoice-items > .invoice-item').each(function () {
        var data_index = $(this).attr('data-index');
        var item_index = $(this).index();

        //var exp_category = $(this).find('#e-category').val();
        var exp_category = $(this).find('.expense-catsel').val();
        var exp_decs = $(this).find('#expense-description').val();
        var merchant_name = $(this).find('#merchant-name').val();
        var exp_for = $(this).find('#expense-for').val();
        var exp_subtotal = $(this).find('#subtotal').val();
        var exp_tax = $(this).find('#tax').val();
        var exp_total = $(this).find('#total').val();

        var rowCount = $('.invoice-preview-card .table-responsive .table > tbody > tr').length;

        /*console.log('aa ' + data_index + ' item_index ' + item_index + ' exp_category ' + exp_category + ' exp_decs ' + exp_decs + ' merchant_name ' + merchant_name + ' exp_for ' + exp_for + ' exp_subtotal ' + exp_subtotal + ' exp_tax ' + exp_tax + ' exp_total ' + exp_total + ' rowCount ' + rowCount);*/

        //exp_category && exp_decs && 
        if (merchant_name && exp_for && exp_subtotal && exp_tax && exp_total) {
          var preview_tbl_cell = '',
            preview_tbl_row = '';

          subtotal_arr.push(exp_subtotal);
          tax_arr.push(exp_tax);
          total_arr.push(exp_total);

          //preview_tbl_cell += '<tr id="invoice' + item_index + '">';
          preview_tbl_cell += '<td class="py-1" ><p class="card-text fw-bold mb-25">' + exp_category + '</p>';
          preview_tbl_cell += '<p class="card-text text-nowrap">' + exp_decs + '</p></td >';
          preview_tbl_cell += '<td class="py-1"><span class="fw-bold">' + merchant_name + '</span></td>';
          preview_tbl_cell += '<td class="py-1"><span class="fw-bold">' + exp_for + '</span></td>';
          preview_tbl_cell += '<td class="py-1"><span class="fw-bold">$' + exp_subtotal + '</span></td>';
          preview_tbl_cell += '<td class="py-1"><span class="fw-bold">$' + exp_tax + '</span></td>';
          preview_tbl_cell += '<td class="py-1"><span class="fw-bold">$' + exp_total + '</span></td>';
          //preview_tbl_cell += '</tr > ';

          preview_tbl_row = '<tr id="invoice' + item_index + '">' + preview_tbl_cell + '</tr > ';

          if (item_index == 0) {
            if (rowCount == 0) {
              $(".invoice-preview-card .table-responsive .table").find('tbody').append(preview_tbl_row);
            }
          } else {
            //check if invoice already exists
            if ($('.invoice-preview-card .table-responsive .table > tbody tr#invoice' + item_index).length) {
              $('.invoice-preview-card .table-responsive .table > tbody tr#invoice' + item_index).html(preview_tbl_cell); // update invoice detail
            } else {
              $('.invoice-preview-card .table-responsive .table > tbody > tr').eq(item_index - 1).after(preview_tbl_row); //create new invoice row
            }
          }
        }

      });

      //calculate total
      $.each(subtotal_arr, function () { sum_subtotal += parseFloat(this) || 0; });
      $.each(tax_arr, function () { sum_tax += parseFloat(this) || 0; });
      $.each(total_arr, function () { sum_total += parseFloat(this) || 0; });

      $('.invoice-sales-total-wrapper .invoice-subtotal-item .invoice-subtotal-amount').text('$' + sum_subtotal);
      $('.invoice-sales-total-wrapper .invoice-tax-item .invoice-tax-amount').text('$' + sum_tax);
      $('.invoice-sales-total-wrapper .invoice-total-item .invoice-total-amount').text('$' + sum_total);
    }
  }

  // Vertical Wizard
  // --------------------------------------------------------------------
  if (typeof verticalWizard !== undefined && verticalWizard !== null) {
    var verticalStepper = new Stepper(verticalWizard, {
      linear: false
    });
    $(verticalWizard)
      .find('.btn-next')
      .on('click', function () {
        verticalStepper.next();
      });
    $(verticalWizard)
      .find('.btn-prev')
      .on('click', function () {
        verticalStepper.previous();
      });

    $(verticalWizard)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }

  // Modern Wizard
  // --------------------------------------------------------------------
  if (typeof modernWizard !== undefined && modernWizard !== null) {
    var modernStepper = new Stepper(modernWizard, {
      linear: false
    });
    $(modernWizard)
      .find('.btn-next')
      .on('click', function () {
        modernStepper.next();
      });
    $(modernWizard)
      .find('.btn-prev')
      .on('click', function () {
        modernStepper.previous();
      });

    $(modernWizard)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }

  // Modern Vertical Wizard
  // --------------------------------------------------------------------
  if (typeof modernVerticalWizard !== undefined && modernVerticalWizard !== null) {
    var modernVerticalStepper = new Stepper(modernVerticalWizard, {
      linear: false
    });
    $(modernVerticalWizard)
      .find('.btn-next')
      .on('click', function () {
        modernVerticalStepper.next();
      });
    $(modernVerticalWizard)
      .find('.btn-prev')
      .on('click', function () {
        modernVerticalStepper.previous();
      });

    $(modernVerticalWizard)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }
});
