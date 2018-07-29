function checkResult() {
    var subject= document.getElementsByName("subject[]");
    var faculty_name= document.getElementsByName("faculty_name[]");
    var marks= document.getElementsByName("marks[]");
    var out_off= document.getElementsByName("out_off[]");
    var len=subject.length;

    for(var i=0;i<len;i++) {


        if (subject[i].value === "") {
            subject[i].focus();
            alert("Please enter subject field");
            return false;

        }
        if (faculty_name[i].value === "") {
            faculty_name[i].focus();
            alert("Please enter faculty name field");
            return false;

        }
        if (out_off[i].value === "") {
            out_off[i].focus();
            alert("Please enter out off field");
            return false;
        }

        if (marks[i].value === "") {
            marks[i].focus();
            alert("Please enter marks field");
            return false;

        }
        
    }
    
        count1=0;
    for (var i = 0; i < len; i++) {
        var check = isNumeric(marks[i].value);
        if (check) {
            count1 = count1 + 1;
        } else {
            marks[i].focus();
            alert("Please enter number");
            return false;
        }

        if (count == len - 1) {
            if (check) {
                return true;
            }
            else {
                return false;
            }
        }
    }
        count2=0;
        for (var i = 0; i < len; i++) {
            var check = isNumeric(out_off[i].value);
            if (check) {
                count2 = count2 + 1;
            } else {
                out_off[i].focus();
                alert("Please enter number");
                return false;
            }

            if (count == len - 1) {
                if (check) {
                    return true;
                }
                else {
                    return false;
                }
            }

        }
    
    
    return true;
}

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function CheckEmpty() {
var count=0;
    var mynames= document.getElementsByName("attendance[]");
    var ddl =  document.getElementsByName("month[]");
    var ddlen=ddl.length;
    var len=mynames.length;
  for(var i=0;i<len;i++) {

      if (mynames[i].value === "") {
      mynames[i].focus();
              alert("Please enter empty field");
          return false;

      }
  }
    for(var j=0;j<ddlen;j++){
        var selectedValue = ddl[j].options[ddl[j].selectedIndex].value;
        if (selectedValue === "")
        {
            alert("Please select month");
            return false;

        }
    }
    
    count1=0;
        for (var i = 0; i < len; i++) {
            var check = isNumeric(mynames[i].value);
            if (check) {
                count1=count1+1;
            } else {
                
                  mynames[i].focus();
                alert("Please enter number");
                return false;
            }

            if(count == len-1)
            {
                if(check)
                {
                    return true;
                }
                else
                    {
                        return false;
                    }
            }

        }
    
    return true;
}


function ConfirmDelete()
{
    var x = confirm("Are you sure you want to delete?");
    if (x)
        return true;
    else
        return false;
}

function formValidator() {
    alert('hi');
    var FirstName = document.getElementById('name');
    var LastName = document.getElementById('last_name');
    var MobileNo = document.getElementById('mobile');
    var picture = document.getElementById('picture');
    var Gender = document.getElementById('gen');
    var Email = document.getElementById('email');
    var dob = document.getElementById('dob');
    var Address = document.getElementById('address');
    var course_name = document.getElementById('course_name');
    var Status = document.getElementById('status');
    var academic_yr = document.getElementById('academic_yr');
    var class_room = document.getElementById('class_room');


    if (notEmpty(FirstName, "Please enter Name")) {
        if (notEmpty(LastName, "Please enter Last Name")) {
            if (isAlphabet(LastName, "Please enter valid Name")) {
                if (isAlphabet(LastName, "Please enter valid Name")) {
                    if (notEmpty(MobileNo, "Please enter Mobile number.")) {
                        if (isNumeric(MobileNo, "Use Only Numbers for Mobile number.")) {
                            if (lengthRestriction(MobileNo, 10, 10)) {
                                if (notEmpty(Email, "Please enter Email")) {
                                    if (emailValidator(Email, "Please enter valid Email")) {
                                        if (notEmpty(dob, "Please enter date of birth")) {
                                            // if (madeSelection(Gender, "Please choose Gender")) {
                                                if (notEmpty(picture, "Please upload picture")) {
                                                    if (notEmpty(Address, "Please enter Address")) {
                                                        if (isAlphanumeric(Address, "Please enter valid Address")) {
                                                            if (madeSelection(course_name, "Please Select Course Name")) {
                                                                if (madeSelection(Status, "Please Select Status")) {
                                                                    if (notEmpty(academic_yr, "Please enter Academic Year")) {
                                                                        if (isNumeric(academic_yr, "Please enter Academic Year")) {
                                                                            if (isAlphanumeric(class_room, "Please enter valid Class Details")) {
                                                                                return true;
                                                                            }
                                                                        // }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return false;
}
