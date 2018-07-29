var ctr = 1;
var count=0;

$(document).ready(function () {

    $('#myTable').on('click', '.delete-row', function () {
    // $(".delete-row").click(function(){
        $("table tbody").find('input[name="record"]').each(function(){
            if($(this).is(":checked")){
                $(this).parents("tr").remove();
            }
        });
    });

    // $('select[name="dropdown"]').change(function(){
    //
    //     term_test=  $(this).val();
    //
    //     // if ($(this).val() == "2")
    //     //     alert("call the do something function on option 2");
    //
    // });

    $('#myTable').on('click', '.button-add', function () {

       var va = $(this).children("input[name='roll_no[]']");
       // var va = $("#roll_no[]").val();
        var aa=document.getElementById('roll_no').value;
        var test_name=document.getElementById('test_name').value;
        // alert(term_test);
        ctr++;
        var no = (count) +ctr;
        var roll_no = "roll_no";
        var subject = "subject";
        var faculty_name = "faculty_name";
        var marks = "marks";
        var out_off = "out_off";
        var newTr = '<tr><td>'+no+'</td> ' +
            '<td><input type="checkbox" name="record"></td>' +
            '<td><input type="text" name="roll_no[]" class="form-control" value="'+aa+'" id=' + roll_no +
            ' disabled="true" /><input type="hidden" name="roll_no[]" class="form-control" value="'+aa+'" id='+roll_no +'/>' +
            '</td><td><input type="text" name="subject[]" class="form-control" id='+subject + ' /></td>' +
            '<td><input type="text" name="faculty_name[]"  class="form-control" id='+faculty_name + ' /></td>' +
            '<td><input type="text" name="marks[]" class="form-control" id=' + marks+' /></td>' +
            '<td><input type="text" name="out_off[]" class="form-control" id='+out_off+' /></td>' +
            '<td><input type="text" name="test_name[]" class="form-control"  value="'+test_name+'" id='+test_name+' disabled="true">' +
            '<input type="hidden" name="test_name[]" class="form-control" value="'+test_name+'" id='+test_name +'/></td></tr>';
        $('#myTable').append(newTr);
    });
});


