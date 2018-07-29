/**
 * Created by SURAJ on 20-07-2016.
 */
(function () {
    $('#confirmerRegForm').formValidation({
        framework: "bootstrap",
        button: {
            selector: '#btnSubmit',
            disabled: 'disabled'
        },
        icon: null,
        excluded: 'disabled',
        fields: {
            'users[name]': {
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
            'users[pan_card]': {
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
            'email': {
                validators: {
                    notEmpty: {
                        message: 'The Email field is required'
                    },
                    regexp: {
                        regexp: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
                        message: 'The Email field is invalid'
                    },
                    remote: {
                        url: base_url + '/user/validate-email',
                        type: 'GET',
                        delay: 2000,     // Send Ajax request every 2 seconds
                        message: 'The email is not available',
                    }
                }
            },
            'users[password]': {
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
            'confirm_password': {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required'
                    },
                    identical: {
                        field: 'users[password]',
                        message: 'Passwords dont match'
                    }
                }
            },
        }
    });
})();
