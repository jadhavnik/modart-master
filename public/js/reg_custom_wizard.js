/**
 * Created by SURAJ on 06-07-2016.
 */

/*!
 * remark (http://getbootstrapadmin.com/remark)
 * Copyright 2015 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */


(function (document, window, $) {

    var companyMCAType;
    var companyTypes;
    var selectedCompanyId;
    var role_id;
    var company_type_id;
    var uinLabel;
    var nationality = 1;
    var registeringAs = {
        1: [
            {
                id: "",
                text: ''
            },
            {
                id: 1,
                text: 'Auditee / Confirmer'
            },
            {
                id: 2,
                text: 'Auditor'
            },
            {
                id: 3,
                text: 'Auditor - Others'
            }
        ],
        2: [
            {
                id: "",
                text: ''
            }, {
                id: 1,
                text: 'Auditee / Confirmer'
            }]
    }
    'use strict';
    var Site = window.Site;
    $(function () {

        Site.run();
        var now = new Date();
        $('#confirm_password').bind("cut copy paste", function (e) {
            e.preventDefault();
        });
        // Hide loader on ready
        // $('#loader').hide();
        $('#error_block').hide();
        $('.dob').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            minDate: new Date(1900, 1 - 1, 1),
            yearRange: "1900:" + now.getFullYear(),
            autoclose: true,
            maxDate: -1,
        })
                .change(function (e) {
                    // Revalidate the date field
                    $('#personalTabForm').formValidation('revalidateField', 'profiles[dob]');
                });
        $('.datepicker_firmway').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            minDate: new Date(1900, 1 - 1, 1),
            yearRange: "1900:" + now.getFullYear(),
            autoclose: true,
            maxDate: -1,
        }).on('changeDate', function (e) {
            // Revalidate the date field
            $('#companyTabForm').formValidation('revalidateField', 'companies[date_of_incorporation]');
            $('#companyTabForm').formValidation('revalidateField', 'auditor_firms[date_of_incorporation]');
        });
        $('#calendar').click(function () {
            if ($(this).hasClass('opened')) {
                $("#dob").datepicker('hide');
            } else {
                $("#dob").datepicker('show');
            }
            $(this).toggleClass('opened');
        });
        // $("#calendar").click(function() {
        //     $(".dob").datepicker("show");
        // });

        $('.capitalize').on('input', function (evt) {
            $(this).val(function (_, val) {
                return val.toUpperCase();
            });
        });
        // Method to not submit form on pressing enter on a text-field
        $(document).keypress(
                function (event) {
                    if (event.which == '13') {
                        event.preventDefault();
                    }
                }
        );
        function getCompanies(select_id) {
            $("#" + select_id).select2({
                placeholder: "Auto fill Company Details",
                allowClear: true,
                width: 'auto',
                selectOnClose: true,
                ajax: {
                    url: java_url + "/getCompanyApi",
                    dataType: 'json',
                    quietMillis: 1000,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.companyList,
                            pagination: {
                                more: (params.page * 10) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) {
                    return markup;
                }, // let our custom formatter work
                // minimumInputLength: 3
            }).addClass("form-control");
        }

        $('#drpdwn_company_type').on('change', function () {


            company_type_id = $("#drpdwn_company_type option:selected").val();
            role_id = $('#drpdwn_roles option:selected').val();
            $('#role_type').val(role_id);
            $('#company_type').val(company_type_id);
            var personName;
            uinLabel = "";
            var organizationLabel;
            selectedCompanyId = parseInt($(this).val());
            if ($('#error_block').css('display') == 'block') {
                $('#error_block').hide();
            }

            if (selectedCompanyId) {
                $.each(companyTypes, function (k, v) {
                    if (v.id == selectedCompanyId) {
                        personName = v.person;
                        uinLabel = v.uin_label;
                        organizationLabel = v.organization;
                        companyMCAType = v.mca_name;
                        return;
                    }
                });
                $('#lbl_company_name').html(organizationLabel + '<span class="asteriskRed">*</span>');
                if (selectedCompanyId == 4 || selectedCompanyId == 7) {
                    $('#lblDin').html('DPIN');
                } else {
                    $('#lblDin').html('DIN');
                }
                $('#lblName').html(personName + "'s Full name");
                toggleDataBlock();
                toggleMCABlock();
            }

            $("#personalTabForm")[0].reset();
            // $("#personalTabForm").data('formValidation').resetForm();

            $("#companyTabForm")[0].reset();
            // $("#personalTabForm").data('formValidation').resetForm();

            $("#drpdwn_companies").select2("val", "");
        });
        var _token = $('meta[name="csrf-token"]').attr('content');
        getCompanyTypes();
        // set up formvalidation
        $('#selectionTabForm')
                .formValidation({
                    framework: 'bootstrap',
                    // trigger: 'blur focus',
                    fields: {
                        'users[role_id]': {
                            selector: '#drpdwn_roles',
                            validators: {
                                notEmpty: {
                                    message: 'Role Type field is required'
                                }
                            }
                        },
                        'companies[company_type_id]': {
                            selector: '#drpdwn_company_type',
                            validators: {
                                notEmpty: {
                                    message: 'Company Type field is required'
                                }
                            }
                        }
                    }
                });
        // $('#profileForm').formValidation('revalidateField', 'companies[company_type_id]');

        $('#personalTabForm').formValidation({
            framework: 'bootstrap',
            trigger: 'blur',
            fields: {
                'users[name]': {
                    validators: {
                        notEmpty: {
                            message: 'Your first-name is required'
                        },
                        stringLength: {
                            min: 2,
                            max: 255,
                            message: 'Your name must be more than 2 and less than 255 characters'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z]+$/,
                            message: 'Name can only consist of alphabets'
                        }
                    }
                },
                'users[middle_name]': {
                    trigger: 'blur',
                    validators: {
                        stringLength: {
                            min: 2,
                            max: 255,
                            message: 'Your middle-name must be more than 2 and less than 255 characters'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z]+$/,
                            message: 'Middle-name can only consist of alphabets'
                        }
                    }
                },
                'users[last_name]': {
                    validators: {
                        notEmpty: {
                            message: 'Your last-name is required'
                        },
                        stringLength: {
                            min: 2,
                            max: 255,
                            message: 'Your last-name must be more than 2 and less than 255 characters'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z]+$/,
                            message: 'Last-name can only consist of alphabets'
                        }
                    }
                },
                'profiles[pan_card]': {
                    validators: {
                        remote: {
                            type: 'POST',
                            url: base_url + '/register/profiles_pan_card',
                            data: {
                                "profiles[pan_card]": $('#pan_card').val(),
                                "_token": _token
                            },
                            onError: function (e, data) {
                                $("#personalTabForm").formValidation("updateMessage", "profiles[pan_card]", "remote", data.result.errors['profiles.pan_card'][0]);
                            },
                        },
                        callback: {
                            callback: function (value, validator, $field) {

                                var pan_card = $('#pan_card').val().toLowerCase();
                                var surname = $('#last_name').val().toLowerCase();
                                var pancard_surname = pan_card.charAt(4);
                                var check_surname = surname.charAt(0);
                                var pattern = /^([a-zA-Z]){3}([pP]){1}([a-zA-Z]){1}([0-9]){4}([a-zA-Z]){1}?$/;
                                if (pancard_surname != check_surname && pan_card.length == 10) {
                                    return {
                                        valid: false,
                                        message: 'Please enter a valid PAN'
                                    }
                                } else {
                                    return {
                                        valid: pattern.test(pan_card),
                                        message: ''
                                    }
                                }
                            }
                        }
                    }
                },
                'profiles[dob]': {
                    validators: {
                        notEmpty: {
                            message: 'Birth date is required'
                        },
                        remote: {
                            type: 'POST',
                            url: base_url + '/register/profiles_dob',
                            data: {
                                "profiles[dob]": $('#dob').val(),
                                "_token": _token
                            },
                            onError: function (e, data) {
                                $("#personalTabForm").formValidation("updateMessage", "profiles[dob]", "remote", data.result.errors['profiles.dob'][0]);
                            },
                        }
                    }
                },
                'profiles[aadhar_no]': {
                    validators: {
                        remote: {
                            type: 'POST',
                            url: base_url + '/register/profiles_aadhar',
                            data: {
                                "profiles[aadhar_no]": $('#aadhar_no').val(),
                                "_token": _token
                            },
                            onError: function (e, data) {
                                $("#personalTabForm").formValidation("updateMessage", "profiles[aadhar_no]", "remote", data.result.errors['profiles.aadhar_no'][0]);
                            },
                        }
                    }
                },
                'mobiles[mobile]': {
                    validators: {
                        // notEmpty: {
                        //     message: 'Mobile number is required'
                        // },
                        // stringLength: {
                        //     min: 10,
                        //     max: 10,
                        //     message: 'Mobile number length must be 10 digits'
                        // },
                        regexp: {
                            regexp: /^[789]\d{9}$/,
                            message: 'Mobile number is invalid'
                        },
                        remote: {
                            type: 'POST',
                            url: base_url + '/register/mobile-number',
                            data: {
                                "mobiles[mobile]": $('#mobile').val(),
                                "_token": _token
                            },
                            onError: function (e, data) {
                                $("#personalTabForm").formValidation("updateMessage", "mobiles[mobile]", "remote", data.result.errors['mobiles.mobile'][0]);
                            },
                        }
                    }
                },
                'auditors[membership_no]': {
                    validators: {
                        notEmpty: {
                            message: 'Auditor Membership Number field is required'
                        },
                        // regexp: {
                        //     regexp: /^([0-9]{6})$/,
                        //     message: 'Auditor membership number is invalid'
                        // },
                        remote: {
                            type: 'POST',
                            url: base_url + '/register/membership-no',
                            data: {
                                "auditors[membership_no]": $('#membership_no').val(),
                                "_token": _token
                            },
                            onError: function (e, data) {
                                $("#personalTabForm").formValidation("updateMessage", "auditors[membership_no]", "remote", data.result.errors['auditors.membership_no'][0]);
                            },
                        }
                    }
                },
                'auditees[din_no]': {
                    validators: {
                        notEmpty: {
                            message: 'DIN is required'
                        },
                        remote: {
                            type: 'POST',
                            url: base_url + '/register/din-no',
                            data: {
                                "auditees[din_no]": $('#din_no').val(),
                                "_token": _token
                            },
                            onError: function (e, data) {
                                $("#personalTabForm").formValidation("updateMessage", "auditees[din_no]", "remote", data.result.errors['auditees.din_no'][0]);
                            }
                        },
                        // regexp: {
                        //     regexp: /^([0-9]){8}?$/,
                        // }
                    }
                },
                'auditors[din_no]': {
                    validators: {
                        notEmpty: {
                            message: 'DIN is required'
                        },
                        remote: {
                            type: 'POST',
                            url: base_url + '/register/auditor-din-no',
                            data: {
                                "auditors[din_no]": $('#din_no1').val(),
                                "_token": _token
                            },
                            onError: function (e, data) {
                                $("#personalTabForm").formValidation("updateMessage", "auditors[din_no]", "remote", data.result.errors['auditors.din_no'][0]);
                            }
                        },
                        // regexp: {
                        //     regexp: /^([0-9]){8}?$/,
                        // }
                    }
                },
                'users[email]': {
                    trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: 'The Email field is required'
                        },
                        // regexp: {
                        //     regexp: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
                        // },
                        remote: {
                            type: 'POST',
                            url: base_url + '/register/email',
                            data: {
                                "users[email]": $('#email').val(),
                                "_token": _token
                            },
                            onError: function (e, data) {
                                $("#personalTabForm").formValidation("updateMessage", "users[email]", "remote", data.result.errors['users.email'][0]);
                            }
                        },
                        callback: {
                            callback: function (value, validator, $field) {

                                var personalEmail = $('#email').val();
                                var companyEmail = $('#email_id').val();
                                var firmEmail = $('#firm_email_id').val();
                                if (personalEmail != "" && companyEmail != "" && (personalEmail == companyEmail)) {
                                    return {
                                        valid: false,
                                        message: 'Personal Email cannot be same as Company Email'
                                    }
                                } else if (personalEmail != "" && firmEmail != "" && (personalEmail == firmEmail)) {
                                    return {
                                        valid: false,
                                        message: 'Personal Email cannot be same as Firm Email'
                                    }
                                } else {
                                    return {
                                        valid: true
                                    }
                                }
                            }
                        }
                    }
                },
                'users[password]': {
                    // trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: 'The password is required'
                        },
                        stringLength: {
                            min: 6,
                            max: 255,
                            message: 'Password length must be more than 6 characters'
                        },
                        different: {
                            field: 'username',
                            message: 'The Password field cannot be the same as Username'
                        }
                    }
                },
                'users[confirm_password]': {
                    // trigger: 'blur',
                    validators: {
                        stringLength: {
                            min: 6,
                            max: 255,
                            message: 'Confirm Password length must be more than 6 characters'
                        },
                        callback: {
                            callback: function (value, validator, $field) {

                                var password = $('#password').val();
                                var confirm_password = $('#confirm_password').val();
                                // if (confirm_password != "") {
                                if (password != confirm_password) {
                                    return {
                                        valid: false,
                                        message: 'Confirm password must be same as Password'
                                    }
                                } else {
                                    return {
                                        valid: true
                                    }
                                }
                                // }
                            }
                        }
                    }
                }
            }
        });
        $("#companyTabForm").formValidation({
            framework: 'bootstrap',
            fields: {
                'auditor_firms[registration_no]': {
                    trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: 'Firm Registration Number is required'
                        },
                        regexp: {
                            regexp: /^([0-9]){6}([WNSCE]){1}?$/,
                            message: 'Firm Registration Number is invalid'
                        },
                        remote: {
                            type: 'POST',
                            url: base_url + '/register/registration-no',
                            data: {
                                "auditor_firms[registration_no]": $('#registration_no').val(),
                                "_token": _token
                            },
                            onError: function (e, data) {
                                $("#companyTabForm").formValidation("updateMessage", "auditor_firms[registration_no]", "remote", data.result.errors['auditor_firms.registration_no'][0]);
                            }
                        }
                    }
                },
                'auditor_firms[name]': {
                    trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: 'Firm Name field is required'
                        },
                        stringLength: {
                            min: 2,
                            max: 255,
                            message: 'Firm Name field must be greater than 2 letters'
                        }
                    }
                },
                'auditor_firms[pan_card_number]': {
                    // trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: 'PAN is required'
                        },
                        stringLength: {
                            min: 10,
                            max: 10,
                            message: 'PAN length must be 10 digits'
                        },
                        callback: {
                            callback: function (value, validator, $field) {

                                var personalPAN = $('#pan_card').val();
                                var firmPANCard = $('#firm_pan_card_number').val();
                                if (personalPAN == firmPANCard) {
                                    return {
                                        valid: false,
                                        message: 'Firm PAN cannot be same as Personal PAN'
                                    }
                                } else {
                                    return {
                                        valid: true
                                    }
                                }
                            }
                        },
                        remote: {
                            type: 'POST',
                            url: base_url + '/register/firm-pancard',
                            data: {
                                "auditor_firms[pan_card_number]": $('#firm_pan_card_number').val(),
                                "_token": _token
                            },
                            onError: function (e, data) {
                                $("#companyTabForm").formValidation("updateMessage", "auditor_firms[pan_card_number]", "remote", data.result.errors['auditor_firms.pan_card_number'][0]);
                            }
                        }
                    }
                },
                'auditor_firms[firm_type_id]': {
                    selector: '#drpdwn_firm_type',
                    validators: {
                        notEmpty: {
                            message: 'Firm Type field is required'
                        }
                    }
                },
                'companies[name]': {
                    trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: 'Entity Name is required'
                        },
                        remote: {
                            type: 'POST',
                            url: base_url + '/register/company-name',
                            data: {
                                "companies[name]": $('#company_name').val(),
                                "_token": _token
                            },
                            onError: function (e, data) {
                                $("#companyTabForm").formValidation("updateMessage", "companies[name]", "remote", data.result.errors['companies.name'][0]);
                            }
                        }
                    }
                },
                'cin_no': {
                    trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: 'Unique Identification  number is needed'
                        },
                        remote: {
                            type: 'POST',
                            url: base_url + '/register/cin-no',
                            data: {
                                "companies[cin_no]": $('#cin_no').val(),
                                "_token": _token
                            },
                            onError: function (e, data) {
                                $("#companyTabForm").formValidation("updateMessage", "cin_no[]", "remote", data.result.errors['companies.cin_no'][0]);
                            }
                        },
                        regexp: {
                            regexp: /^([UL]){1}([0-9]){5}([A-Za-z]){2}([0-9]){4}([A-Za-z]){3}([0-9]){6}?$/,
                            message: 'CIN is invalid'
                        },
                    }
                },
                'companies[pan_card_number]': {
                    trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: 'PAN is required'
                        },
                        remote: {
                            type: 'POST',
                            url: base_url + '/register/company-pancard',
                            data: {
                                "companies[pan_card_number]": $('#company_pan_card_number').val(),
                                "_token": _token
                            },
                            onError: function (e, data) {
                                $("#companyTabForm").formValidation("updateMessage", "companies[pan_card_number]", "remote", data.result.errors['companies.pan_card_number'][0]);
                            }
                        },
                        callback: {
                            callback: function (value, validator, $field) {

                                var personalPAN = $('#pan_card').val();
                                var companyPANCard = $('#company_pan_card_number').val();
                                if (personalPAN == companyPANCard) {
                                    return {
                                        valid: false,
                                        message: 'Company PAN cannot be same as Personal PAN'
                                    }
                                } else {
                                    return {
                                        valid: true
                                    }
                                }
                            }
                        }
                    }
                },
                'auditor_firms[email]': {
                    trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: 'Firm Email field is required'
                        },
                        regexp: {
                            regexp: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
                            message: 'Firm Email field is invalid'
                        },
                        callback: {
                            callback: function (value, validator, $field) {

                                var personalEmail = $('#email').val();
                                var firmEmail = $('#firm_email').val();
                                if (personalEmail == firmEmail) {
                                    return {
                                        valid: false,
                                        message: 'Firm Email cannot be same as Personal Email'
                                    }
                                } else {
                                    return {
                                        valid: true
                                    }
                                }
                            }
                        }
                    }
                },
                'companies[email_id]': {
                    trigger: 'blur',
                    validators: {
                        regexp: {
                            regexp: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
                            message: 'Company Email field is invalid'
                        },
                        // callback: {
                        //
                        //     callback: function (value, validator, $field) {
                        //
                        //         var personalEmail = $('#email').val();
                        //         var companyEmail = $('#email_id').val();
                        //         if (personalEmail == companyEmail) {
                        //             return {
                        //                 valid: false,
                        //                 message: 'Company Email cannot be same as Personal Email'
                        //             }
                        //         } else {
                        //             return {
                        //                 valid: true
                        //             }
                        //         }
                        //     }
                        // }
                    }
                },
                'companies[date_of_incorporation]': {
                    // trigger: 'blur',
                    validators: {
                        // notEmpty: {
                        //     message: 'The Date Of Incorporation is required'
                        // },
                        date: {
                            format: 'DD-MM-YYYY',
                            message: 'The Date Of Incorporation field is not a valid date'
                        }
                    }
                },
                'auditor_firms[date_of_incorporation]': {
                    // trigger: 'blur',
                    validators: {
                        // notEmpty: {
                        //     message: 'The Date Of Incorporation is required'
                        // },
                        date: {
                            format: 'DD-MM-YYYY',
                            message: 'The Date Of Incorporation field is not a valid date'
                        }
                    }
                },
                'auditors[din_no]': {
                    trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: 'DIN Number is required'
                        },
                        stringLength: {
                            min: 8,
                            max: 8,
                            message: 'DIN length must be 8 digits long'
                        },
                        remote: {
                            type: 'POST',
                            url: base_url + '/register/auditor-din-no',
                            data: {
                                "auditees[din_no]": $('#firm_din_no').val(),
                                "_token": _token
                            },
                            onError: function (e, data) {
                                $("#companyTabForm").formValidation("updateMessage", "auditees[din_no]", "remote", data.result.errors['auditor_firms.din_no'][0]);
                            }
                        },
                        regexp: {
                            regexp: /^([0-9]){8}?$/,
                            message: 'DIN is invalid'
                        }
                    }
                },
                'manager[name]': {
                    validators: {
                        stringLength: {
                            min: 2,
                            max: 255,
                            message: 'Your name must be more than 2 and less than 255 characters'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z]+$/,
                            message: 'Name can only consist of alphabets'
                        }
                    }
                },
                'manager[last_name]': {
                    validators: {
                        stringLength: {
                            min: 2,
                            max: 255,
                            message: 'Your last-name must be more than 2 and less than 255 characters'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z]+$/,
                            message: 'Last-name can only consist of alphabets'
                        }
                    }
                },
                'manager[email]': {
                    trigger: 'blur',
                    validators: {
                        regexp: {
                            regexp: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
                            message: 'Incorrect email-address'
                        },
                        callback: {
                            callback: function (value, validator, $field) {

                                var portalManagerEmail = $('#txtManagerEmail').val();
                                var personalEmail = $('#email').val();
                                var companyEmail = $('#email_id').val();
                                var pm_name = $('#txtManagerName').val();
                                var pm_lname = $('#txtManagerLastName').val();
                                if (((pm_name != "" && pm_lname == "") && portalManagerEmail == "") ||
                                        ((pm_name == "" && pm_lname != "") && portalManagerEmail == "") ||
                                        ((pm_name == "" && pm_lname == "") && portalManagerEmail != "")) {

                                    return {
                                        valid: false,
                                        message: 'Please enter Portal Manager\'s full information'
                                    }
                                } else if (companyEmail != "" && personalEmail != "" && portalManagerEmail != ""
                                        && ((personalEmail == portalManagerEmail)
                                                || (portalManagerEmail == companyEmail))) {

                                    return {
                                        valid: false,
                                        message: 'Portal Manager\'s Email cannot be same as Personal/Company Email'
                                    }
                                } else {
                                    return {
                                        valid: true
                                    }
                                }
                            }
                        },
                        remote: {
                            type: 'POST',
                            url: base_url + '/register/portal-manager-email',
                            data: {
                                "manager[email]": $('#txtManagerEmail').val(),
                                "_token": _token
                            },
                            onError: function (e, data) {
                                $("#companyTabForm").formValidation("updateMessage", "manager[email]", "remote", data.result.errors['manager.email'][0]);
                            }
                        }
                    }
                }
            }
        });
        $("#verificationTabForm").formValidation({
            framework: 'bootstrap',
            trigger: 'blur',
            fields: {
                self_attested_file: {
                    validators: {
                        file: {
                            extension: 'pdf',
//                                maxSize: 10*1024*1024,   // 10 MB
                            message: 'The uploaded file should be a PDF file.'
                        }
                    }
                }
            }
        });
        // init the wizard
        var defaults = $.components.getDefaults("wizard");
        var options = $.extend(true, {}, defaults, {
            buttonsAppendTo: '.panel-body'
        });
        var wizard = $("#profileFormContainer").wizard(options).data('wizard');
        // setup validator
        // http://formvalidation.io/api/#is-valid
        wizard.get("#selectionTab").setValidator(function () {
            var fv = $("#selectionTabForm").data('formValidation');
            fv.validate();
            if (!fv.isValid()) {
                return false;
            } else {
                return true;
            }
        });
        wizard.get("#personalTab").setValidator(function () {
            var fv = $("#personalTabForm").data('formValidation');
            fv.validate();
            if (!fv.isValid()) {
                return false;
            } else {
                return true;
            }
        });
        wizard.get("#companyTab").setValidator(function () {
            var fv_company = $("#companyTabForm").data('formValidation');
            var errors = "";
            fv_company.validate();
            getCompanies('drpdwn_companies');
            var result = false;
            if (!fv_company.isValid()) {
                return false;
            } else {

                if ($('#agreement').prop("checked") == true) {

                    $('#error').hide();
                    if (fv_company.isValid()) {

                        // AJAX request..
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "POST",
                            url: base_url + "/register",
                            async: false,
                            data: $("#selectionTabForm").serialize() + "&" + $("#personalTabForm").serialize() + "&" + $("#companyTabForm").serialize(),
                        }).success(function (response) {
                            result = true;
                        }).error(function (jqXHR, textStatus, errorThrown) {
                            var span = $('<small/>')
                                    .addClass('help-block validMessage')
                                    .attr('data-field', "Oops! Something went wrong")
                                    .insertAfter($("#error_block"))
                                    .show();
                            span.html();
                            console.log(textStatus + ': ' + errorThrown);
                            result = false;
                        });
                        return result;
                    } else {
                        return false;
                    }
                } else {
                    $('#error').show();
                    return false;
                }
            }
        });
        $('[data-wizard="finish"]').click(function () {
            window.location.href = base_url + '/login';
        });
        function getCompanyTypes() {
            $.get(base_url + '/company/company-types', function (response) {
                companyTypes = response;
            })
        }

        function toggleDINBlock() {
            if ($.inArray(selectedCompanyId, [1, 2, 3, 4, 5, 6, 7, 8]) > -1) {
                $('#dinBlock').show();
                $('#ngoBlock').hide();
                $('#doiBlock').show();
                if (selectedCompanyId == 5) {
                    $("#pan_card").on('keyup', function () {

                        if ($('#firm_pan_card_number').attr('readonly') && $('#firm_pan_card_number').val == "") {
                            $('#firm_pan_card_number').removeAttr('readonly');
                            $('#firm_pan_card_number').val('');
                        } else {
                            $("#firm_pan_card_number").val($(this).val());
                            $('#firm_pan_card_number').attr('readonly', '');
                            var bootstrapValidator = $('#companyTabForm').data('formValidation');
                            bootstrapValidator.enableFieldValidators('auditor_firms[pan_card_number]', false, 'notEmpty');
                            bootstrapValidator.enableFieldValidators('auditor_firms[pan_card_number]', false, 'callback');
                            bootstrapValidator.enableFieldValidators('auditor_firms[name]', false);
                        }
                    });
                    $('#doiBlock').hide();
                } else if (selectedCompanyId == 7) {
                    $('#doiBlock').show();
                    var bootstrapValidator = $('#companyTabForm').data('formValidation');
                    bootstrapValidator.enableFieldValidators('auditor_firms[date_of_incorporation]', true);
                } else if (selectedCompanyId == 6) {

                    var bootstrapValidator = $('#companyTabForm').data('formValidation');
                    bootstrapValidator.enableFieldValidators('companies[name]', false, 'remote');
                    bootstrapValidator.enableFieldValidators('auditor_firms[name]', false);
                } else if (selectedCompanyId == 8) {
                    var bootstrapValidator = $('#companyTabForm').data('formValidation');
                    bootstrapValidator.enableFieldValidators('companies[pan_card_number]', false, 'notEmpty');
                }

                if (selectedCompanyId == 4 || selectedCompanyId == 8) {
                    var bootstrapValidator = $('#companyTabForm').data('formValidation');
                    bootstrapValidator.enableFieldValidators('cin_no[]', false, 'regexp');
                } else {
                    var bootstrapValidator = $('#companyTabForm').data('formValidation');
                    bootstrapValidator.enableFieldValidators('cin_no[]', true);
                }

                if (role_id == 1) {
                    $('#dinBlock.company-block').show();
                    $('#dinBlock.firm-block').hide();
                } else if (role_id == 3) {

                    $('#dinBlock.company-block').show();
                    $('#dinBlock.firm-block').hide();
                }

            } else if ($.inArray(selectedCompanyId, [9]) > -1) {
                $('#dinBlock').hide();
                $('#doiBlock').hide();
                $('#ngoBlock').hide();
                var bootstrapValidator = $('#companyTabForm').data('formValidation');
                bootstrapValidator.enableFieldValidators('cin_no[]', false);
                bootstrapValidator.enableFieldValidators('companies[pan_card_number]', false, 'callback');
                bootstrapValidator.enableFieldValidators('companies[name]', false);
                bootstrapValidator.enableFieldValidators('auditor_firms[name]', false);
                if (role_id == 1) {
                    $('#dinBlock.company-block').show();
                    $('#dinBlock.firm-block').hide();
                    $("#pan_card").on('keyup', function () {

                        if ($('#company_pan_card_number').attr('readonly') && $('#company_pan_card_number').val == "") {
                            $('#company_pan_card_number').removeAttr('readonly');
                            $('#company_pan_card_number').val('');
                        } else {
                            $("#company_pan_card_number").val($(this).val());
                            $('#company_pan_card_number').attr('readonly', '');
                            var bootstrapValidator = $('#companyTabForm').data('formValidation');
                            bootstrapValidator.enableFieldValidators('companies[pan_card_number]', false, 'notEmpty');
                            bootstrapValidator.enableFieldValidators('companies[pan_card_number]', false, 'callback');
                            bootstrapValidator.enableFieldValidators('companies[name]', false);
                        }
                    });
                } else if (role_id == 3) {
                    $('#dinBlock.company-block').hide();
                    $('#dinBlock.firm-block').show();
                    $("#pan_card").on('keyup', function () {

                        if ($('#firm_pan_card_number').attr('readonly') && $('#firm_pan_card_number').val == "") {
                            $('#firm_pan_card_number').removeAttr('readonly');
                            $('#firm_pan_card_number').val('');
                        } else {
                            $("#firm_pan_card_number").val($(this).val());
                            $('#firm_pan_card_number').attr('readonly', '');
                            var bootstrapValidator = $('#companyTabForm').data('formValidation');
                            bootstrapValidator.enableFieldValidators('auditor_firms[pan_card_number]', false, 'notEmpty');
                            bootstrapValidator.enableFieldValidators('auditor_firms[pan_card_number]', false, 'callback');
                            bootstrapValidator.enableFieldValidators('auditor_firms[pan_card_number]', false);
                        }
                    });
                }

            } else if ($.inArray(selectedCompanyId, [11, 10, 13, 14]) > -1) {
                $('#dinBlock').hide();
                $('#doiBlock').hide();
                if ($.inArray(selectedCompanyId, [13, 14]) > -1) {
                    $('#doiBlock').hide();
                    var bootstrapValidator = $('#companyTabForm').data('formValidation');
                    bootstrapValidator.enableFieldValidators('auditor_firms[name]', false);
                    bootstrapValidator.enableFieldValidators('companies[date_of_incorporation]', false);
                } else {
                    $('#doiBlock').show();
                    var bootstrapValidator = $('#companyTabForm').data('formValidation');
                    bootstrapValidator.enableFieldValidators('companies[date_of_incorporation]', true);
                    bootstrapValidator.enableFieldValidators('auditor_firms[name]', true);
                    bootstrapValidator.enableFieldValidators('companies[name]', false);
                }

                if (selectedCompanyId == 11) {
                    $('.company-block.uin-block').show();
                    $('.company-block.unique-id').show();
                    $('#doiBlock').hide();
                    var bootstrapValidator = $('#companyTabForm').data('formValidation');
                    bootstrapValidator.enableFieldValidators('cin_no[]', false);
                    bootstrapValidator.enableFieldValidators('companies[pan_card_number]', false, 'notEmpty');
                } else {
                    $('.company-block.unique-id').hide();
                    var bootstrapValidator = $('#companyTabForm').data('formValidation');
                    bootstrapValidator.enableFieldValidators('cin_no[]', false);
                }

                if (role_id == 1) {
                    $('#dinBlock.company-block').show();
                    $('#dinBlock.firm-block').hide();
                } else if (role_id == 3) {
                    $('#dinBlock.company-block').hide();
                    $('#dinBlock.firm-block').show();
                }


            } else if ($.inArray(selectedCompanyId, [12]) > -1) {
                $('#dinBlock').hide();
                $('#doiBlock').show();
                $('#ngoBlock').hide();
                var bootstrapValidator = $('#companyTabForm').data('formValidation');
                bootstrapValidator.enableFieldValidators('companies[date_of_incorporation]', true);
                if (role_id == 1) {
                    $('#dinBlock.company-block').show();
                    $('#dinBlock.firm-block').hide();
                } else if (role_id == 3) {
                    $('#dinBlock.company-block').hide();
                    $('#dinBlock.firm-block').show();
                }
            } else {
                $('#dinBlock').hide();
            }
        }

        function toggleDataBlock() {
            if (role_id == 1) {
                hideFirmDetails();
                showCompanyDetails();
            } else if (role_id == 2) {
                hideCompanyDetails();
                showFirmDetails();
            } else if (role_id == 3) {
                showCompanyDetails();
                hideFirmDetails();
            }
            toggleDINBlock();
        }

        function refreshCompanyTypes(for_auditor) {
            var companies = [];
            $('#drpdwn_company_type').empty();
            companies.push({id: "", text: ""});
            if (for_auditor == 2) {
                $.each(companyTypes, function (k, value) {
                    if (value.for_auditor == 0) {
                        companies.push({id: value.id, text: value.name})
                    }
                });
            } else {
                $.each(companyTypes, function (k, value) {
                    if (value.for_auditor == for_auditor && (value.nationality == nationality || value.nationality == 3)) {
                        companies.push({id: value.id, text: value.name})
                    }
                });
            }

            $('#drpdwn_company_type').select2({
                placeholder: "Select Company Type",
                data: companies,
                allowClear: true
            }).trigger('change');
        }

        function toggleMCABlock() {
            if (companyMCAType) {
                $('#MCASearchBlock').show();
                getCompanies('drpdwn_companies');
            } else {
                $('#MCASearchBlock').hide();
            }
        }

        function showCompanyDetails() {
            $('.company-block').show();
            $('#lbl_selection').html("Select Entity Name");
            if ($('#firm_name').attr('readonly')) {
                $('#firm_name').removeAttr('readonly');
                $('#firm_name').val('');
            }

            if ($('#company_name').attr('readonly')) {
                $('#company_name').removeAttr('readonly');
                $('#company_name').val('');
            }

            if ($('#cin_no').attr('readonly')) {
                $('#cin_no').removeAttr('readonly');
                $('#cin_no').val('');
            }

            if ($('#company_doi').attr('readonly')) {
                $('#company_doi').removeAttr('readonly');
                $('#company_doi').val('');
            }

            if ($('#firm_email_id').attr('readonly')) {
                $('#firm_email_id').removeAttr('readonly');
                $('#firm_email_id').val('');
            }

            if ($('#email_id').attr('readonly')) {
                $('#email_id').removeAttr('readonly');
                $('#email_id').val('');
            }

            if (selectedCompanyId == 11) {

                var bootstrapValidator = $('#companyTabForm').data('formValidation');
                bootstrapValidator.enableFieldValidators('companies[pan_card_number]', false, 'callback');
                $('.company-block.ngo-block').show();
            } else {
                $('.company-block.ngo-block').hide();
            }

            if (selectedCompanyId == 12) {

                if ($('#company_pan_card_number').attr('readonly') && $('#company_pan_card_number').val != "") {
                    $('#company_pan_card_number').removeAttr('readonly');
                    $('#company_pan_card_number').val('');
                }

                if ($('#firm_pan_card_number').attr('readonly') && $('#firm_pan_card_number').val != "") {
                    $('#firm_pan_card_number').removeAttr('readonly');
                    $('#firm_pan_card_number').val('');
                }

                $('.company-block.uin-content-block').hide();
                $('.company-block.others-block').hide();
                $('.company-block.ngo-block').show();
            } else if (selectedCompanyId == 8) {
                var bootstrapValidator = $('#companyTabForm').data('formValidation');
                bootstrapValidator.enableFieldValidators('companies[pan_card_number]', false, 'notEmpty');
            } else {

                if ($('#company_pan_card_number').attr('readonly') && $('#company_pan_card_number').val != "") {
                    $('#company_pan_card_number').removeAttr('readonly');
                    $('#company_pan_card_number').val('');
                }

                if ($('#firm_pan_card_number').attr('readonly') && $('#firm_pan_card_number').val != "") {
                    $('#firm_pan_card_number').removeAttr('readonly');
                    $('#firm_pan_card_number').val('');
                }

                $('.company-block.uin-content-block').hide();
                $('.company-block.others-block').hide();
                $('.company-block.ngo-block').hide();
            }

            if (selectedCompanyId == 9) {
                // $("#pan_card").on('keyup',function(){
                //
                //     if ($('#company_pan_card_number').attr('readonly') && $('#company_pan_card_number').val == "") {
                //         $('#company_pan_card_number').removeAttr('readonly');
                //         $('#company_pan_card_number').val('');
                //     } else {
                //         $("#company_pan_card_number").val($(this).val());
                //         $('#company_pan_card_number').attr('readonly', '');
                //     }
                // });

                var bootstrapValidator = $('#companyTabForm').data('formValidation');
                bootstrapValidator.enableFieldValidators('cin_no[]', false);
                bootstrapValidator.enableFieldValidators('companies[pan_card_number]', false, 'callback');
                $('#lbl_company_name').html("Trade Name");
            } else if (selectedCompanyId == 13) {
                var bootstrapValidator = $('#companyTabForm').data('formValidation');
                bootstrapValidator.enableFieldValidators('companies[name]', false);
                bootstrapValidator.enableFieldValidators('cin_no[]', false);
                bootstrapValidator.enableFieldValidators('companies[pan_card_number]', false, 'callback');
                $('#lbl_company_name').html("Name of Trust");
            } else {

                var bootstrapValidator = $('#companyTabForm').data('formValidation');
                bootstrapValidator.enableFieldValidators('auditor_firms[pan_card_number]', true);
                $('#lbl_firm_name').html("Firm Name" + '<span class="asteriskRed">*</span>');
            }

            if (selectedCompanyId == 10) {
                var bootstrapValidator = $('#companyTabForm').data('formValidation');
                bootstrapValidator.enableFieldValidators('companies[name]', false);
            }

            if ($.inArray(selectedCompanyId, [5, 6, 11, 12, 13, 14]) > -1) {
                $('#MCASearchBlock').show();
            } else {
                $('#MCASearchBlock').hide();
            }

            if (!uinLabel) {
                $('.company-block.uin-block').hide();
            } else {
                $('.company-block.uin-block').show();
                $('.lblUIN').html(uinLabel);
            }
        }

        function showFirmDetails() {
            $('.firm-block').show();
            if ($('#firm_name').attr('readonly')) {
                $('#firm_name').removeAttr('readonly');
                $('#firm_name').val('');
            }

            if ($('#company_name').attr('readonly')) {
                $('#company_name').removeAttr('readonly');
                $('#company_name').val('');
            }

            if ($('#cin_no').attr('readonly')) {
                $('#cin_no').removeAttr('readonly');
                $('#cin_no').val('');
            }

            if (selectedCompanyId == 5) {

                var bootstrapValidator = $('#companyTabForm').data('formValidation');
                bootstrapValidator.enableFieldValidators('auditor_firms[registration_no]', false, 'notEmpty');
                $('.firm-block.uin-content-block').hide();
                $('#dinBlock.company-block').hide();
                $('#dinBlock.firm-block').show();
                $('.firm-block.dir-block').hide();
                $('.firm-block.mem-block').show();
                $('.firm-block.uin-block').hide();
                $('#doiBlock').hide();
                $('#lbl_firm_name').html("Trade Name");
            } else if (selectedCompanyId == 6) {

                $('#dinBlock.firm-block.mem-block').show();
                $('.firm-block.uin-content-block').hide();
                $('#dinBlock.company-block').hide();
                $('#dinBlock.firm-block').show();
                $('.firm-block.dir-block').hide();
                $('.firm-block.mem-block').show();
                $('#doiBlock').show();
                $('#lbl_firm_name').html("Firm Name" + '<span class="asteriskRed">*</span>');
                var bootstrapValidator = $('#companyTabForm').data('formValidation');
                bootstrapValidator.enableFieldValidators('auditor_firms[name]', false);
                bootstrapValidator.enableFieldValidators('auditor_firms[registration_no]', true);
                bootstrapValidator.enableFieldValidators('companies[email_id]', true);
            } else if (selectedCompanyId == 7) {

                $('.firm-block.uin-content-block').hide();
                $('.firm-block.uin-block').hide();
                $('.firm-block.others-block').hide();
                $('.firm-block.ngo-block').hide();
                var bootstrapValidator = $('#companyTabForm').data('formValidation');
                bootstrapValidator.enableFieldValidators('auditor_firms[registration_no]', true);
                $('#lbl_selection').html("Select Firm Name");
                $('#drpdwn_companies').html("Select Firm Name");
                $('#lbl_firm_name').html("Firm Name" + '<span class="asteriskRed">*</span>');
            }

            if (!uinLabel) {
                $('.firm-block.uin-block').hide();
                if ($.inArray(selectedCompanyId, [6, 7]) > -1) {
                    $('.lblUIN').html(uinLabel + '<span class="asteriskRed">*</span>');
                }
            } else {
                $('.firm-block.uin-block').show();
                $('.lblUIN').html(uinLabel);
            }
        }

        function hideCompanyDetails() {
            $('.company-block').hide();
        }

        function hideFirmDetails() {
            $('.firm-block').hide();
        }

        $('#drpdwn_roles').change(function () {
            role_id = $(this).val();
            if (role_id == 1) {
                refreshCompanyTypes(0);
            } else if (role_id == 2) {
                refreshCompanyTypes(1);
            } else if (role_id == 3) {
                refreshCompanyTypes(2);
            } else
                refreshCompanyTypes();
        });
        function refreshRegisterAs(nation) {
            nationality = nation;
            var roles = registeringAs[nation];
            $('#drpdwn_roles').empty();
            $('#drpdwn_roles').select2({
                placeholder: "Select Company Type",
                data: roles,
                allowClear: true
            }).trigger('change');
        }

        $('#drpdwn_nationality').on('change', function () {
            refreshRegisterAs($(this).val());
        });
        $('#drpdwn_companies').on('select2:select', function (e) {

            var company_id = $(e.currentTarget).val();
            $('#autoFillCIN').val(company_id);
            if ($('#firm_doi').attr('readonly')) {
                $('#firm_doi').removeAttr('readonly');
                $('#firm_doi').val('');
            }

            var entityName = $('#drpdwn_companies option:selected').text();
            $('.entity-name').val(entityName);
            if ($('#error_block').css('display') == 'block') {
                $('#error_block').hide();
            }

            $.ajax({
                type: "GET",
                url: java_url + "/companyDetails?id=" + company_id + "&type=" + companyMCAType,
                success: function (response) {
                    if (response.message == "true") {

                        if ($('#firm_name').attr('readonly')) {
                            // $('#firm_name').removeAttr('readonly');
                            $('#firm_name').val('');
                            $('#firm_name').val($('#drpdwn_companies option:selected').text());
                        } else {
                            $('#firm_name').attr('readonly', '');
                            $('#firm_name').val($('#drpdwn_companies option:selected').text());
                        }

                        if ($('#company_name').attr('readonly')) {
                            // $('#company_name').removeAttr('readonly');
                            $('#company_name').val('');
                            $('#company_name').val($('#drpdwn_companies option:selected').text());
                        } else {
                            $('#company_name').attr('readonly', '');
                            $('#company_name').val($('#drpdwn_companies option:selected').text());
                        }

                        if (selectedCompanyId == 7) {

                            $('#autoFillAuditeeCIN').val(company_id);
                            $('#firm_ngo_no').val(company_id);
                            $('#firm_ngo_no').attr('readonly', '');
                            $('#firm_doi').val(response.data.date_of_incorporation);
                            $('#autoFillFirmDOI').val(response.data.date_of_incorporation);
                            $('#firm_doi').attr('disabled', 'true');
                            $('#firm_name').attr('readonly', '');
                            var email = response.data.company_email;
                            if (response.data.company_email) {
                                $('#firm_email_id').val('');
                                $('#firm_email_id').val(response.data.company_email);
                                $('#firm_email_id').attr('readonly', '');
                            } else {
                                if ($('#firm_email_id').attr('readonly')) {
                                    $('#firm_email_id').removeAttr('readonly');
                                    $('#firm_email_id').val('');
                                } else {
                                    $('#firm_email_id').val('');
                                }
                            }
                        } else {

                            $('#company_doi').val(response.data.date_of_incorporation);
                            $('#autoFillDOI').val(response.data.date_of_incorporation);
                            $('#company_doi').attr('disabled', 'true');
                            if (company_id != null) {
                                $('#cin_no').val('');
                                $("#cin_no").val(company_id);
                                $('#cin_no').attr('readonly', '');
                            } else {
                                if ($('#cin_no').attr('readonly')) {
                                    $('#cin_no').removeAttr('readonly');
                                    $('#cin_no').val('');
                                } else {
                                    $('#cin_no').val('');
                                }
                            }

                            var company_email = response.data.company_email;
                            if (response.data.company_email) {
                                $('#email_id').val('');
                                $('#email_id').val($.trim(response.data.company_email));
                                $('#email_id').attr('readonly', '');
                            } else {
                                if ($('#email_id').attr('readonly')) {
                                    $('#email_id').removeAttr('readonly');
                                    $('#email_id').val('');
                                } else {
                                    $('#email_id').val('');
                                }
                            }

                            // $('#loader').hide();
                            if ($('#firm_pan_card_number').attr('readonly')) {
                                $('#firm_pan_card_number').removeAttr('readonly');
                                $('#firm_pan_card_number').val('');
                            }

                            if ($('#company_pan_card_number').attr('readonly')) {
                                $('#company_pan_card_number').removeAttr('readonly');
                                $('#company_pan_card_number').val('');
                            }
                        }

                        $('#companyTabForm').formValidation('revalidateField', 'companies[pan_card_number]');
                        $('#companyTabForm').formValidation('revalidateField', 'auditor_firms[pan_card_number]');
                        $('#companyTabForm').formValidation('revalidateField', 'auditor_firms[date_of_incorporation]');
                        $('#companyTabForm').formValidation('revalidateField', 'companies[date_of_incorporation]');
                        $('#companyTabForm').formValidation('revalidateField', 'companies[name]');
                        $('#companyTabForm').formValidation('revalidateField', 'cin_no[]');
                    } else {

                        if ($('#firm_name').attr('readonly')) {
                            $('#firm_name').removeAttr('readonly');
                            $('#firm_name').val('');
                        }

                        if ($('#company_name').attr('readonly')) {
                            $('#company_name').removeAttr('readonly');
                            $('#company_name').val('');
                        }

                        if ($('#company_doi').attr('readonly')) {
                            $('#company_doi').removeAttr('readonly');
                            $('#company_doi').val('');
                        }

                        // $('#firm_pan_card_number').attr('readonly', '');
                        // $('#company_pan_card_number').attr('readonly', '');
                        $('#company_pan_card_number').val('');
                        $('#firm_pan_card_number').val('');
                        if ($('#email_id').attr('readonly')) {
                            $('#email_id').removeAttr('readonly');
                            $('#email_id').val('');
                        } else {
                            $('#email_id').val('');
                        }

                        if ($('#firm_email_id').attr('readonly')) {
                            $('#firm_email_id').removeAttr('readonly');
                            $('#firm_email_id').val('');
                        } else {
                            $('#firm_email_id').val('');
                        }

                        if ($('#firm_ngo_no').attr('readonly')) {
                            $('#firm_ngo_no').removeAttr('readonly');
                            $('#firm_ngo_no').val('');
                        } else {
                            $('#firm_ngo_no').val('');
                        }

                        if ($('#firm_name').attr('readonly')) {
                            $('#firm_name').removeAttr('readonly');
                            $('#firm_name').val('');
                        } else {
                            $('#firm_name').val('');
                        }

                        if ($('#company_name').attr('readonly')) {
                            $('#company_name').removeAttr('readonly');
                            $('#company_name').val('');
                        } else {
                            $('#company_name').val('');
                        }

                        if ($('#company_doi').attr('disabled')) {
                            $('#company_doi').removeAttr('disabled');
                            $('#company_doi').val('');
                        } else {
                            $('#company_doi').val('');
                        }

                        if ($('#firm_doi').attr('disabled')) {
                            $('#firm_doi').removeAttr('disabled');
                            $('#firm_doi').val('');
                        } else {
                            $('#firm_doi').val('');
                        }

                        if ($('#cin_no').attr('readonly')) {
                            $('#cin_no').removeAttr('readonly');
                            $('#cin_no').val('');
                        } else {
                            $('#cin_no').val('');
                        }

                        $('#error_block').show();
                    }
                }
            });
        });
    });
})(document, window, jQuery);
