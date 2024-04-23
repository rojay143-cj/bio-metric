<?php require ('../connection/conn.php'); ?>
<?php
    // STUDENT PAGE CODES

    // Region: Retrieve student data
    $stud_data = [];
    $sql_student_tbl = "SELECT * FROM student_data";
    $sql_student_tbl = mysqli_query($conn, $sql_student_tbl);
    while($stud_row = $sql_student_tbl -> fetch_array()){
        $stud_data[] = $stud_row;
    }

    // Region: Insert student data
    if(isset($_POST['stud_array'])){
        $stud_array = json_decode($_POST['stud_array'], true);

        foreach($stud_array as $student){
            $fname = $student['full_name'];
            $id = $student['id_number'];
            $year = $student['year'];
            $course = $student['course'];
            $email = $student['email'];
            $contact = $student['contact_number'];
            $role = $student['role'];
            /*
            $sql_insert_stud = "INSERT INTO student_data (name, id_number, year, course, email, contact_number, role_id) 
                                VALUES ('$fname','$id','$year','$course','$email','$contact','$role')";
            $sql_insert_stud = mysqli_query($conn, $sql_insert_stud);
            */
            $sql_insert_stud = mysqli_prepare($conn, "INSERT INTO student_data (name, id_number, year, course, email, contact_number, role_id) 
                                                      VALUES (?,?,?,?,?,?,?)");
            mysqli_stmt_bind_param($sql_insert_stud, "sssssss", $fname, $id, $year, $course, $email, $contact, $role);
            mysqli_stmt_execute($sql_insert_stud);
        }
    }
?>
<?php 
    //Region: Update & Delete student data

    //Update student data
    if(isset($_POST['stud_update_array'])){
        $stud_update_array = json_decode($_POST['stud_update_array'], true);
        foreach ($stud_update_array as $updateStud){
            $fname = $updateStud['full_name'];
            $id = $updateStud['id_number'];
            $year = $updateStud['year'];
            $course = $updateStud['course'];
            $email = $updateStud['email'];
            $contact = $updateStud['contact_number'];
            $role = $updateStud['role'];
            $student_id = $updateStud['student_id'];
            
            $sql_student_up = "UPDATE student_data 
            SET name='$fname', id_number='$id', year='$year', course='$course', email='$email', contact_number='$contact', role_id='$role' WHERE student_id='$student_id'";
            $sql_student_up = mysqli_query($conn, $sql_student_up);
        }
    }

    if(isset($_POST['stud_id'])){
        $stud_id = $_POST['stud_id'];
        //Delete student data
        $sql_student_del = "DELETE FROM student_data WHERE id_number = '$stud_id'";
        $sql_student_del = mysqli_query($conn, $sql_student_del);
    }
?>