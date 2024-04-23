$(document).ready(function(){
    new DataTable('#example');

    //INSERT student data
    var stud_array = [];
    $('#btnregister').on('click',function(){
        function sanitizeInput(text) {
            return text.replace(/[^\w\s]/gi, '');
        }
        let txtname = sanitizeInput($('#txtname').val());
        let txtid = sanitizeInput($('#txtid').val());
        let txtyear = sanitizeInput($('#txtyear').val());
        let txtcourse = sanitizeInput($('#txtcourse').val());
        let txtemail = sanitizeInput($('#txtemail').val());
        let txtcontact = sanitizeInput($('#txtcontact').val());
        let txtrole = sanitizeInput($('#txtrole').val());
        stud_info = {
            "full_name":txtname,
            "id_number":txtid,
            "year":txtyear,
            "course":txtcourse,
            "email":txtemail,
            "contact_number":txtcontact,
            "role":txtrole
        }
        stud_array.push(stud_info);
        $.ajax({
            type: "POST",
            url: "",
            data: {stud_array:JSON.stringify(stud_array)},
            success:function(){
                alert("Student registered successfully");
                location.reload();
            },
            error:function(){
                alert("Failed to insert data!");
            }
        });
    });

    //DELETE student data
    $('.btn-delete').on('click', function(){
        let stud_id = $(this).closest('tr').find('.stud_num').text();
        $.ajax({
            type: 'POST',
            url: '../source/code.php',
            data: {stud_id: stud_id},
            success:function(){
                alert("success");
                location.reload();
            },
            error:function(){
                alert("error");
            }
        })
    });

    //EDIT student data
    
});