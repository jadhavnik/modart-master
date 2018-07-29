/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function notEmpty(elem, helperMsg){
	if(elem.value.length == 0){
        alert(helperMsg);
		elem.focus(); // set the focus to this input
		return false;
	}
	return true;
}

function isNumeric(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function isQty(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
            if(elem.value > 0)
            {
		return true;
            }
            else
            {
                alert("It should be greater than zero...");
		elem.focus();
		return false;
            }
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function isAlphabet(elem, helperMsg){
	var alphaExp = /^[a-zA-Z'\s]+$/;
      
     if(elem.value.match(alphaExp)){
            return true;
        }
        else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
function isAlphabett(elem, helperMsg){
	var alphaExp = /^[a-zA-Z'.\s]+$/;
      
     if(elem.value.match(alphaExp)){
            return true;
        }
        else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
function isAlphanumeric(elem, helperMsg){
	//var alphaExp = /^[0-9a-zA-Z]+$/;
         var re = /^[\w ]+$/;
	if(elem.value.match(re)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function lengthRestriction(elem, min, max){
	var uInput = elem.value;
	if(uInput.length >= min && uInput.length <= max){
		return true;
	}else{
		// alert("Please enter between "+ min +" and " +max+ " characters");
		alert("Mobile number must be 10 digits");
		elem.focus();
		return false;
	}
}

function madeSelection(elem, helperMsg){
	if(elem.value === "Please Select"){
		alert(helperMsg);
		elem.focus();
		return false;
	}else{
		return true;
	}
}

function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function isDouble(elem, helperMsg){
	var numericExpression = /^\d+.?\d*$/;

	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
/* function isQuantity(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression) && elem.value >=1 && elem.value <= 100){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}  */

// var $ = jQuery;
// $('form').on('submit', function (e) {
// // (function () {
//     var _token = $('meta[name="csrf-token"]').attr('content');
//
//     $('#profileForm').formValidation({
//         framework: "bootstrap",
//         button: {
//             selector: '#btnSubmit',
//             disabled: 'disabled'
//         },
//         icon: null,
//         fields: {
//
//
//             'dob': {
//                 trigger: 'blur',
//                 validators: {
//                     notEmpty: {
//                         message: 'The Birthday field is required'
//                     },
//                     callback: {
//                         callback: function (value, validator, $field) {
//
//                             var today = moment();
//                             var birthday = moment($('#dob').val(), 'DD-MM-YYYY');
//                             if (today.isBefore(birthday)) {
//                                 return {
//                                     valid: false,
//                                     message: 'Birth date should not be later than today'
//                                 };
//                             }
//                             else {
//                                 return {valid: true};
//                             }
//                         }
//                     },
//                     date: {
//                         format: 'DD-MM-YYYY',
//                         message: 'The value is not a valid date'
//                     }
//                 }
//             },
//             'picture': {
//                 validators: {
//                     file: {
//                         extension: 'jpg, jpeg',
//                         maxSize: 1 * 1024 * 1024,   // 1 MB
//                         message: 'Please upload .jpeg file'
//                     }
//                 }
//             }
//
//         }
//     });
//
//
//     var bootstrapValidator = $('#profileForm').data('formValidation');
//     bootstrapValidator.enableFieldValidators('dob', true);
//
//     //     var bootstrapValidator = $('#profileForm').data('formValidation');
//     //     bootstrapValidator.enableFieldValidators('profiles[dob]', true);
//     //     bootstrapValidator.enableFieldValidators('profiles[pan_card]', true);
//     //     bootstrapValidator.enableFieldValidators('mobiles[mobile]', true);
//     // }
//
// });