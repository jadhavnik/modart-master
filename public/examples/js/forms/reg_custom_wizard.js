/*!
 * remark (http://getbootstrapadmin.com/remark)
 * Copyright 2015 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
(function(document, window, $) {
    'use strict';

    var Site = window.Site;

    $(document).ready(function($) {
        Site.run();

        $(".auditee").hide();
        $(".auditor").hide();

        $("#drpdwn_roles").on('change', (function(){

            var val = $(this).find('option:selected').text();

            var is_auditee = val.indexOf("Auditee") >= 0;
            var is_auditor = val.indexOf("Auditor") >= 0;

            if(is_auditee){

                $(".auditee").show();
                $(".auditor").hide();
            }
            else if(is_auditor){

                $(".auditee").hide();
                $(".auditor").show();
            }
        }));
    });

    // Example Wizard Form Container
    // -----------------------------
    // http://formvalidation.io/api/#is-valid-container
    (function() {
        var defaults = $.components.getDefaults("wizard");
        var options = $.extend(true, {}, defaults, {
            onInit: function() {
                $('#registrationForm').formValidation({
                    framework: 'bootstrap',
                    fields: {
                        full_name: {
                            validators: {
                                notEmpty: {
                                    message: 'The full name is required'
                                },
                                stringLength: {
                                    min: 2,
                                    max: 255,
                                    message: 'The username must be more than 2 and less than 255 characters'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z\s\.]+$/,
                                    message: 'The username can only consist of alphabets and dot'
                                }
                            }
                        },
                        address: {
                            validators: {
                                notEmpty: {
                                    message: 'The address is required'
                                },
                                stringLength: {
                                    min: 6,
                                    max: 255,
                                    message: 'The address must be more than 6 and less than 255 characters long'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z0-9\s\.-]+$/,
                                    message: 'The address can only consist of alphabets, numbers and dot'
                                }
                            }
                        },
                        pan_card: {
                            validators: {
                                notEmpty: {
                                    message: 'PAN is required'
                                },
                                stringLength: {
                                    min: 10,
                                    max: 10,
                                    message: 'PAN length must be 10 digits'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z0-9\s]+$/,
                                    message: 'PAN is invalid'
                                }
                            }
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'The Email field is required'
                                },
                                regexp: {
                                    regexp: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
                                    message: 'The Email field is invalid'
                                }
                            }
                        },
                        // birthday: {
                        //     excluded: false,
                        //     validators: {
                        //         notEmpty: {
                        //             message: 'The Birthday field is required'
                        //         },
                        //         callback: {
                        //             callback: function (value, validator, $field) {
                        //
                        //                 var today = moment();
                        //                 var birthday = moment($('#birthday').val(), 'DD-MM-YYYY');
                        //
                        //                 if (today.isBefore(birthday)) {
                        //                     return {valid: false, message: 'Birth date should not be later than today'};
                        //                 } else {
                        //                     return {valid: true};
                        //                 }
                        //             },
                        //             message: 'Birth date should not be later than today'
                        //         }
                        //     }
                        // },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'The password is required'
                                },
                                different: {
                                    field: 'username',
                                    message: 'The password cannot be the same as username'
                                }
                            }
                        },
                        confirm_password: {
                            validators: {
                                notEmpty: {
                                    message: 'The confirm password is required'
                                },
                                identical: {
                                    field: 'password',
                                    message: 'Passwords dont match'
                                }
                            }
                        },
                        drpdwn_roles: {
                            selector: '#drpdwn_roles',
                            validators: {
                                notEmpty: {
                                    message: 'Role type field is required'
                                }
                            }
                        },
                        firm_registration_number: {
                            validators: {
                                notEmpty: {
                                    message: 'Firm registration number is required'
                                },
                                stringLength: {
                                    min: 10,
                                    max: 10,
                                    message: 'Firm registration number length must be 10 digits'
                                }
//                            regexp: {
//                                regexp: /^[a-zA-Z0-9\s]+$/,
//                                message: 'Firm registration number is invalid'
//                            }
                            }
                        },
                        firm_name: {
                            validators: {
                                notEmpty: {
                                    message: 'Firm name is required'
                                }
                            }
                        },
                        auditor_membership_number: {
                            validators: {
                                notEmpty: {
                                    message: 'Auditor membership name is required'
                                }
                            }
                        },
                        company_name: {
                            validators: {
                                notEmpty: {
                                    message: 'Company name is required'
                                }
                            }
                        },
                        drpdwn_company_type: {
                            selector: '#drpdwn_company_type',
                            validators: {
                                notEmpty: {
                                    message: 'Company type field is required'
                                }
                            }
                        },
                        cin_number: {
                            // Todo: 21 or 22 digits not confirmed..
                            validators: {
                                notEmpty: {
                                    message: 'CIN number is required'
                                }
                            }
                        },
                        din_number: {
                            // Todo: 21 or 22 digits not confirmed..
                            validators: {
                                notEmpty: {
                                    message: 'DIN Number is required'
                                }
                            }
                        },
                        company_pan_card: {
                            validators: {
                                notEmpty: {
                                    message: 'PAN is required'
                                },
                                stringLength: {
                                    min: 10,
                                    max: 10,
                                    message: 'PAN length must be 10 digits'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z0-9\s]+$/,
                                    message: 'PAN is invalid'
                                }
                            }
                        },
                        company_email: {
                            validators: {
                                notEmpty: {
                                    message: 'Company Email field is required'
                                },
                                regexp: {
                                    regexp: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
                                    message: 'Company Email field is invalid'
                                }
                            }
                        }
                    }
                });
            },
            validator: function() {
                var fv = $('#registrationForm').data('formValidation');

                var $this = $(this);

                // Validate the container
                fv.validateContainer($this);

                var isValidStep = fv.isValidContainer($this);
                if (isValidStep === false || isValidStep === null) {
                    return false;
                }

                return true;
            },
            onFinish: function() {

                



            },
            buttonsAppendTo: '.panel-body'
        });

        $("#profileFormContainer").wizard(options);
    })();

    // Example Wizard Pager
    // --------------------------
    (function() {
        var defaults = $.components.getDefaults("wizard");

        var options = $.extend(true, {}, defaults, {
            step: '.wizard-pane',
            templates: {
                buttons: function() {
                    var options = this.options;
                    var html = '<div class="btn-group btn-group-sm">' +
                        '<a class="btn btn-default btn-outline" href="#' + this.id + '" data-wizard="back" role="button">' + options.buttonLabels.back + '</a>' +
                        '<a class="btn btn-success btn-outline pull-right" href="#' + this.id + '" data-wizard="finish" role="button">' + options.buttonLabels.finish + '</a>' +
                        '<a class="btn btn-default btn-outline pull-right" href="#' + this.id + '" data-wizard="next" role="button">' + options.buttonLabels.next + '</a>' +
                        '</div>';
                    return html;
                }
            },
            buttonLabels: {
                next: '<i class="icon wb-chevron-right" aria-hidden="true"></i>',
                back: '<i class="icon wb-chevron-left" aria-hidden="true"></i>',
                finish: '<i class="icon wb-check" aria-hidden="true"></i>'
            },

            buttonsAppendTo: '.panel-actions'
        });

        $("#exampleWizardPager").wizard(options);
    })();

    // Example Wizard Progressbar
    // --------------------------
    (function() {
        var defaults = $.components.getDefaults("wizard");

        var options = $.extend(true, {}, defaults, {
            step: '.wizard-pane',
            onInit: function() {
                this.$progressbar = this.$element.find('.progress-bar').addClass('progress-bar-striped');
            },
            onBeforeShow: function(step) {
                step.$element.tab('show');
            },
            onFinish: function() {
                this.$progressbar.removeClass('progress-bar-striped').addClass('progress-bar-success');
            },
            onAfterChange: function(prev, step) {
                var total = this.length();
                var current = step.index + 1;
                var percent = (current / total) * 100;

                this.$progressbar.css({
                    width: percent + '%'
                }).find('.sr-only').text(current + '/' + total);
            },
            buttonsAppendTo: '.panel-body'
        });

        $("#exampleWizardProgressbar").wizard(options);
    })();

    // Example Wizard Tabs
    // -------------------
    (function() {
        var defaults = $.components.getDefaults("wizard");
        var options = $.extend(true, {}, defaults, {
            step: '> .nav > li > a',
            onBeforeShow: function(step) {
                step.$element.tab('show');
            },
            classes: {
                step: {
                    //done: 'color-done',
                    error: 'color-error'
                }
            },
            onFinish: function() {
                alert('finish');
            },
            buttonsAppendTo: '.tab-content'
        });

        $("#exampleWizardTabs").wizard(options);
    })();

    // Example Wizard Accordion
    // ------------------------
    (function() {
        var defaults = $.components.getDefaults("wizard");
        var options = $.extend(true, {}, defaults, {
            step: '.panel-title[data-toggle="collapse"]',
            classes: {
                step: {
                    //done: 'color-done',
                    error: 'color-error'
                }
            },
            templates: {
                buttons: function() {
                    return '<div class="panel-footer">' + defaults.templates.buttons.call(this) + '</div>';
                }
            },
            onBeforeShow: function(step) {
                step.$pane.collapse('show');
            },

            onBeforeHide: function(step) {
                step.$pane.collapse('hide');
            },

            onFinish: function() {
                alert('finish');
            },

            buttonsAppendTo: '.panel-collapse'
        });

        $("#exampleWizardAccordion").wizard(options);
    })();

})(document, window, jQuery);
