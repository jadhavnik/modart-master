/**
 * Created by James on 03-08-2016.
 */
function formatRepo(repo) {
    if (repo.loading)
        return repo.text;
    var markup = "<h5>" + repo.name + "</h5>";
    markup += "PAN.: " + (repo.pan_card_number ? repo.pan_card_number : 'N/A');
    return markup;
}

function formatFirmsList(repo) {
    if (repo.loading)
        return repo.text;
    var markup = "<h5>" + repo.name + "</h5>";
    markup += "FRN.: " + repo.registration_no;
    return markup;
}

function authorizedRepo(repo) {
    if (repo.loading)
        return repo.text;

    var markup = "<h6>" + repo.name + ", " + repo.branch_name + "</h6>";

    markup += "Branch Code.: " + repo.branch_code + ", <br/>";
    markup += "Authorization.: " + repo.date_from + " - " + repo.date_to;

    return markup;
}

function formatRepoSelection(repo) {
    return repo.text || repo.name;
}

function getFirm(select_id) {

    $("#" + select_id).select2({
        placeholder: "Select a Firm",
        allowClear: true,
        ajax: {
            url: base_url + "/auditorfirm/search",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: data.items,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatFirmsList,
        templateSelection: formatRepoSelection
    });
}

function getCompanies(select_id) {

    $("#" + select_id).select2({
        placeholder: "Select a Company",
        allowClear: true,
        ajax: {
            url: base_url + "/company/search",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: data.items,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo,
        templateSelection: formatRepoSelection
    });
}

function getAuthorizedCompanies(select_id, audit_type_id) {
    $("#" + select_id).select2({
        placeholder: "Select a Company",
        allowClear: true,
        ajax: {
            url: base_url + "/authorization/search",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                audit_type = $('#' + audit_type_id).val();
                return {
                    q: params.term, // search term
                    page: params.page,
                    audit_type: audit_type
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;

                return {
                    results: data.items,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: authorizedRepo,
        templateSelection: formatRepoSelection
    });
}

function getAuthorizedAuditors(select_id, audit_type_id) {
    $("#" + select_id).select2({
        placeholder: "Select an Auditor firm",
        allowClear: true,
        ajax: {
            url: base_url + "/authorization/search",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                audit_type = $('#' + audit_type_id).val();
                return {
                    q: params.term, // search term
                    page: params.page,
                    audit_type: audit_type
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;

                return {
                    results: data.items,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: authorizedRepo,
        templateSelection: formatRepoSelection
    });
}

var camelCaseToWords = function (str) {
    return str.match(/^[a-z]+|[A-Z][a-z]*/g).map(function (x) {
        return x[0].toUpperCase() + x.substr(1).toLowerCase();
    }).join(' ');
};

var snakeToWords = function (snakeString) {
    return snakeString.split('_').map(function (val) {
        return val.charAt(0).toUpperCase() + val.substr(1).toLowerCase();
    }).join(' ');
}

String.prototype.toTitleCase = function () {
    var i, j, str, lowers, uppers;

    str = this.replace(/([^\W_]+[^\s-]*) */g, function (txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });

    // Certain minor words should be left lowercase unless
    // they are the first or last words in the string
    lowers = ['A', 'An', 'The', 'And', 'But', 'Or', 'For', 'Nor', 'As', 'At',
        'By', 'For', 'From', 'In', 'Into', 'Near', 'Of', 'On', 'Onto', 'To', 'With'
    ];
    for (i = 0, j = lowers.length; i < j; i++)
        str = str.replace(new RegExp('\\s' + lowers[i] + '\\s', 'g'),
            function (txt) {
                return txt.toLowerCase();
            });

    // Certain words such as initialisms or acronyms should be left uppercase
    uppers = ['Id', 'Tv'];
    for (i = 0, j = uppers.length; i < j; i++)
        str = str.replace(new RegExp('\\b' + uppers[i] + '\\b', 'g'),
            uppers[i].toUpperCase());

    return str;
}

function display_error(xhr) {
    xhr = xhr || "";
    list = "";
    $('#listErrors').empty();
    if (xhr.responseJSON != undefined) {
        errors = xhr.responseJSON.errors;
        $.each(errors, function (k, v) {
            if (v instanceof Array)
                list += "<li>" + v[0] + "</li>";
            else
                list += "<li>" + v + "</li>";
        });
    } else {
        list += "<li>Something went wrong!!</li>";
    }
    $('#listErrors').append(list);
    $('#divError').show();
}

function remove_error() {
    $('#listErrors').empty();
    $('#divError').hide();
}

function validateResponse(response) {
    $.each(response, function (key, value) {
        if (!validateEmail(value.email))
            console.log("Invalid Email : " + value.email)
        if (!validatePAN(value.pan))
            console.log("Invalid PAN: " + value.pan)
    })
}

function validateEmail(email) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+$/.test(email)) {
        return (true)
    }
    return (false)
}

function validateText(text) {
    if (/^[a-zA-Z'&.,"\/\s\d\(\)\:_-]{1,250}$/.test(text)) {
        return (true)
    }
    return (false)
}

function validateMobile(mobile) {
    if (mobile.length <= 13 && mobile.length >= 10) {
        if (/^[0-9-+]+$/.test(mobile)) {
            return (true)
        }
    }
    return (false)
}

function validatePAN(PAN) {
    if (/^([a-zA-Z]{5})(\d{4})([a-zA-Z]{1})$/.test(PAN)) {
        return (true)
    }
    return (false)
}

function validatePincode(pincode) {
    if (/^([\d]{6})$/.test(pincode)) {
        return (true)
    }
    return (false)
}

function validateDate(date) {
    var matches = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/.exec(date);
    if (matches == null)
        return false;
    var d = matches[1];
    var m = matches[2];
    var y = matches[3];
    var composedDate = new Date(y, m, d);
    return composedDate.getDate() == d &&
        composedDate.getMonth() == m &&
        composedDate.getFullYear() == y;
}

function validateAmount(currency) {
    currency = parseInt(currency);
    if (!/^([\d]{1,10})$/.test(currency)) {
        return false
    }

    return true;
}

function formatBytes(bytes, decimals) {
    if (bytes == 0)
        return '0 Byte';
    var k = 1000; // or 1024 for binary
    var dm = decimals + 1 || 3;
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
    var i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}

function formatCurrency(number) {
    if (number >= 10000000) {
        number = (number / 10000000).toFixed(2) + ' Cr';
    } else if (number >= 100000) {
        number = (number / 100000).toFixed(2) + ' lacs';
    } else if (number >= 1000) {
        number = (number / 1000).toFixed(2) + ' K';
    }
    return number;
}
var box;
editConfirmationRecord = function (primary_key, returnFunctionCall, isForUploadVersion) {
    object = recordsDB({"primary_key": primary_key}).first();
    form_elements = "";
    if (object['way']) {
        var stamped = (object['way'].toLowerCase() == "stamped") ? "selected" : "";
        var emailed = (object['way'].toLowerCase() == "emailed") ? "selected" : "";
        var verified = (object['way'].toLowerCase() == "verified") ? "selected" : "";
    }
    if (object['response_type']) {
        var positive = (object['response_type'].toLowerCase() == "positive") ? "selected" : "";
        var negative = (object['response_type'].toLowerCase() == "negative") ? "selected" : "";
        var blank = (object['response_type'].toLowerCase() == "blank") ? "selected" : "";
    }

    var level1 = uploadAttributesDB({'index': 1}).get();

    $.each(level1, function (key, attr) {
        val = object[attr.key] || "";
        if (attr.key == "way") {
            var stamped = (val.toLowerCase() == "stamped") ? "selected" : "";
            var emailed = (val.toLowerCase() == "emailed") ? "selected" : "";
            var verified = (val.toLowerCase() == "verified") ? "selected" : "";
            form_elements += '<div class="col-md-6 form-group"><label class="col-md-4 control-label">' + attr.display_name + '<span class="required asteriskRed">*</span></label>' +
                '            <div class="col-md-8">' +
                '               <select required class="form-control" name="' + attr.key + '">' +
                '               <option value="Stamped" ' + stamped + '>Stamped</option>' +
                '               <option value="Emailed" ' + emailed + '>Emailed</option>' +
                '               <option value="Verified" ' + verified + '>Verified</option>' +
                '               </select>' +
                '            </div>' +
                '        </div>';

        } else if (attr.key == "response_type") {
            var positive = (val.toLowerCase() == "positive") ? "selected" : "";
            var negative = (val.toLowerCase() == "negative") ? "selected" : "";
            var blank = (val.toLowerCase() == "blank") ? "selected" : "";
            form_elements += '<div class="col-md-6 form-group"><label class="col-md-4 control-label">' + attr.display_name + '<span class="required asteriskRed">*</span></label>' +
                '            <div class="col-md-8">' +
                '               <select required class="form-control" name="' + attr.key + '">' +
                '               <option value="Positive" ' + positive + '>Positive</option>' +
                '               <option value="Negative" ' + negative + '>Negative</option>' +
                '               <option value="Blank" ' + blank + '>Blank</option>' +
                '               </select>' +
                '            </div>' +
                '        </div>';

        } else if (attr.key == "attachment") {

        } else if (attr.key == "mobile_no") {
            form_elements += '<div class="form-group col-md-6">' +
                '<label class="col-md-4 control-label" for="name">' + attr.display_name + '</label>' +
                '<div class="col-md-8">' +
                '<input  type="text" class="form-control input-md " maxlength="10"  pattern="[0-9]{10}"  id="' + attr.key + '" name="' + attr.key + '" placeholder="Value" value="' + val + '">' +
                '</div>' +
                '</div>';

        } else if (attr.key == "branch_pin") {
            form_elements += '<div class="form-group col-md-6">' +
                '<label class="col-md-4 control-label" for="name">' + attr.display_name + '</label>' +
                '<div class="col-md-8">' +
                '<input  type="text" class="form-control input-md " maxlength="6" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="' + attr.key + '" name="' + attr.key + '" placeholder="Value" value="' + val + '"> ' +
                '</div>' +
                '</div>';

        } else if (attr.key == "reference_number" || attr.key == "email_id" || attr.key == "name_entity" || attr.key == "contact_person") {
            form_elements += '<div class="form-group col-md-6">' +
                '<label class="col-md-4 control-label" for="name">' + attr.display_name + '<span class="required asteriskRed">*</span></label>' +
                '<div class="col-md-8">' +
                '<input required type="text" class="form-control input-md" id="' + attr.key + '" name="' + attr.key + '" placeholder="Value" value="' + val + '"> ' +
                '</div>' +
                '</div>';
        } else {
            form_elements += '<div class="form-group col-md-6">' +
                '<label class="col-md-4 control-label" for="name">' + attr.display_name + '</label>' +
                '<div class="col-md-8">' +
                '<input  type="text" class="form-control input-md " id="' + attr.key + '" name="' + attr.key + '" placeholder="Value" value="' + val + '"> ' +
                '</div>' +
                '</div>';
        }

    });

    var level2 = uploadAttributesDB({'index': 2}).get();
    $.each(level2, function (key, attr) {
        if (typeof(object['requestConfirmation'][attr.place_under]) != "undefined")
            val = object['requestConfirmation'][attr.place_under][attr.key] || "";
        else
            val = "";
        if (isForUploadVersion) {
            form_elements += '<div class="form-group col-md-6">' +
                '<label class="col-md-4 control-label" for="name">' + attr.display_name + '</label>' +
                '<div class="col-md-8">' +
                '<input type="text" class="form-control input-md setRequired" id="' + attr.key + '" name="' + attr.key + '" placeholder="Value" value="' + val + '"> ' +
                '</div>' +
                '</div>';
        } else {
            form_elements += '<div class="form-group col-md-6">' +
                '<label class="col-md-4 control-label" for="name">' + attr.display_name + '</label>' +
                '<div class="col-md-8">' +
                '<input type="text" class="form-control input-md setRequired" id="' + attr.key + '" name="values[' + attr.place_under + '][' + attr.key + ']" placeholder="Value" value="' + val + '"> ' +
                '</div>' +
                '</div>';
        }

    });

    box = bootbox.dialog({
        size: 'large',
        title: "Update Confirmation Record",
        message: '<form  class="form-horizontal"  id="formUpdateRecord">' +
        '    <input type="hidden" name="_token" value="' + $("input[name=_token]").val() + '">' +
        '    <input type="hidden" name="primary_key" value="' + object.primary_key + '">' +
        '<div style ="max-height: 56vh; overflow-y:auto;overflow-x:hidden">' + form_elements +
        '       </div></div><hr><div class="col-md-12 form-group">' +
        '            <label class="col-md-1 control-label" style="text-align:left">Reason<span>*</span></label>' +
        '            <div class="col-md-11">' +
        '                <textarea required type="text" class="form-control input-md" name="message" value="" placeholder="Reason for Update"></textarea>' +
        '            </div>' +
        '        </div>' +
        '    </div><div class="modal-footer"><input type="submit" class="btn btn-success"/></div>' +
        '</form>'
        //        buttons: {
        //            succes: {
        //                id:"updateConfirmationBtn",
        //                label: "Save",
        //                className: "btn-success",
        //                callback: function () {
        //                    returnFunctionCall();
        //                }
        //            }
        //        }


    });
    $("#formUpdateRecord").submit(function (event) {
        bootbox.hideAll();
        returnFunctionCall();
        return false;

    });
    $("#mobile_no").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
}


function validateValue(key, value) {
    var attributes = uploadAttributesDB({'key': key}).first();
    switch (attributes.validate) {
        case 'text':
            if (!validateText(value)) {
                return value += ' <i class="btn btn-pure btn-warning icon wb-alert-circle" title="Invalid ' + attributes.display_name + ': expected text" ></i>';
            }
            return true;
        case 'mobile':
            if (!validateMobile(value)) {
                return value += ' <i class="btn btn-pure btn-warning icon wb-alert-circle" title="Invalid ' + attributes.display_name + '" ></i>';
            }
            return true;
        case 'email':
            if (!validateEmail(value)) {
                return value += ' <i class="btn btn-pure btn-danger icon wb-alert-circle" title="Invalid ' + attributes.display_name + '" ></i>';
            }
            return true;
        case 'pan':
            if (!validatePAN(value)) {
                return value += ' <i class="btn btn-pure btn-warning icon wb-alert-circle" title="Invalid ' + attributes.display_name + '" ></i>';
            }
            return true;
        case 'pincode':
            if (!validatePincode(value)) {
                return value += ' <i class="btn btn-pure btn-warning icon wb-alert-circle" title="Invalid ' + attributes.display_name + '" ></i>';
            }
            return true;
        case 'currency':
            if (!validateAmount(value)) {
                return value += ' <i class="btn btn-pure btn-danger icon wb-alert-circle" title="Invalid ' + attributes.display_name + '" ></i>';
            }
            return true;
        case 'url':
            return true;
        default:
            return true;
            break;
    }
}

function formatDate(dbFormat) {
    date = moment(dbFormat, "YYYY-MM-DD HH:mm:ss");
    return date.format("MMMM Do, YYYY");
}

$(document).keyup(function (e) {
    if (e.keyCode === 27) { // escape key maps to keycode `27`
        bootbox.hideAll();
    }
});