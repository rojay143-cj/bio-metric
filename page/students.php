<?php 
    include ('../source/code.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <script src="../asset/api/datatable.js"></script>
    <link rel="stylesheet" href="../asset/api/datatable.css">
    <script src="../asset/api/Jquery.js"></script>
    <script src="../asset/js/csse.js"></script>
    <title>CCSE Biometric System</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            font-size: 1rem;
            width: 2000px;
            height: 100%;
            margin: 0 auto;
        }
        .nav-bar{
            height: 100vw;
        }.main{
            background-color: purple;
            color: white;
        }#example_wrapper{
            background-color: white;
            color: black;
            padding: 10px;
        }
        .modal.right .modal-dialog {
        position: fixed;
        right: 0;
        margin: auto;
        width: 50%;
        height: 100%;
        color: #000000;
        transform: translate3d(0%, 0, 0);
    }

    .modal.right .modal-content {
        height: 100%;
        overflow-y: auto;
    }
    </style>
</head>
<body>
    <div class="container-fluid" id="container-css">
        <div class="row">
            <div class="nav-bar col-sm-2 border">
                <ul class="list-group text-center">
                    <li class="list-group-item mb-5 mt-1">
                        <a href="home.php"><img src="../asset/image/logo-bio.png" alt="logo" width="100" height="90"></a>
                    </li>
                    <li class="list-group-item">
                        <a class="nav-link" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="list-group-item mt-3">
                        <a class="nav-link" aria-current="page" href="events.php">Events</a>
                    </li>
                    <li class="list-group-item mt-3">
                        <a class="nav-link" aria-current="page" href="attendance.php">Attendance</a>
                    </li>
                    <li class="list-group-item mt-3">
                        <a class="nav-link" aria-current="page" href="students.php">Students</a>
                    </li>
                    <li class="list-group-item mt-3">
                        <a class="nav-link" aria-current="page" href="users.php">Users</a>
                    </li>
                </ul>
            </div>
            <div class="main col-lg-10">
                <div class="main-group w-75 m-auto">
                    <div class="dashboard mt-2">
                        <div class="dash-text d-flex justify-content-between align-items-center p-2 mb-5">
                            <span><h1>STUDENT PANEL</h1></span>
                            <span id="curDate"><?php echo date("F, j, Y",strtotime('today')); ?>
                                <button class="btn btn-light" id="btn-search" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Add Student
                                </button>
                            </span>
                        </div>
                    </div>
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>ID number</th>
                                <th>Full name</th>
                                <th>Contact number</th>
                                <th>Course</th>
                                <th>Year</th>
                                <th>Email</th>
                                <th>Registered Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($stud_data as $stud_row){
                            ?>
                            <tr>
                                <td class="stud_role"><?php echo $stud_row['role_id']; ?></td>
                                <td class="stud_num"><?php echo $stud_row['id_number']; ?>
                                <input type="hidden" class="txtstudID" id="txtstudID" value="<?php echo $stud_row['student_id']; ?>">
                                </td>
                                <td class="stud_name"><?php echo $stud_row['name']; ?></td>
                                <td class="stud_contact"><?php echo $stud_row['contact_number']; ?></td>
                                <td class="stud_course"><?php echo $stud_row['course']; ?></td>
                                <td class="stud_year"><?php echo $stud_row['year']; ?></td>
                                <td class="stud_email"><?php echo $stud_row['email']; ?></td>
                                <td class="stud_created_date"><?php echo $stud_row['created_at']; ?></td>
                                <td><button class="btn btn-info btn-edit" id="btn-edit" data-bs-toggle="modal" data-bs-target="#updateModal">Edit</button>
                                <button class="btn btn-danger btn-delete" id="btn-delete">Delete</button></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Insert-->
    <div class="modal right fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title fs-5 w-100 text-center" id="exampleModalLabel">Create students account</h5>
            </div>
            <div class="modal-body">
            <div class="card mt-3 mb-3 p-3 text-center">
                <div class="card-body">
                    <div class="input-group">
                        <span class="input-group-text w-25">Full name</span>
                        <input type="text" name="txtname" id="txtname" class="form-control">
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text w-25">ID number</span>
                        <input type="text" name="txtid" id="txtid" class="form-control">
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text w-25">Year</span>
                        <select class="form-control" name="txtyear" id="txtyear">
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                        </select>
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text w-25">Course</span>
                        <select class="form-control" name="txtcourse" id="txtcourse">
                            <option value="BSCS">BSCS</option>
                            <option value="BSIT">BSIT</option>
                            <option value="BSCE">BSCE</option>
                        </select>
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text w-25">Email</span>
                        <input type="text" name="txtemail" id="txtemail" class="form-control">
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text w-25">Contact #</span>
                        <input type="text" name="txtcontact" id="txtcontact" class="form-control">
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text w-25">Role</span>
                        <select class="form-control" name="txtrole" id="txtrole">
                            <option value="100">ADMIN</option>
                            <option value="8">Student</option>
                        </select>
                    </div>
                </div>
            </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnclear">Close</button>
                    <button type="button" class="btn btn-primary" id="btnregister">Register</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Update-->
    <div class="modal right fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title fs-5 w-100 text-center" id="exampleModalLabel">Update students account</h5>
            </div>
            <div class="modal-body">
            <div class="card mt-3 mb-3 p-3 text-center">
                <div class="card-body">
                    <div class="input-group">
                        <span class="input-group-text w-25">Full name</span>
                        <input type="text" name="upName" id="upName" class="form-control">
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text w-25">ID number</span>
                        <input type="text" name="upId" id="upId" class="form-control">
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text w-25">Year</span>
                        <select class="form-control" name="upYear" id="upYear">
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                        </select>
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text w-25">Course</span>
                        <select class="form-control" name="upCourse" id="upCourse">
                            <option value="BSCS">BSCS</option>
                            <option value="BSIT">BSIT</option>
                            <option value="BSCE">BSCE</option>
                        </select>
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text w-25">Email</span>
                        <input type="text" name="upEmail" id="upEmail" class="form-control">
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text w-25">Contact #</span>
                        <input type="text" name="upContact" id="upContact" class="form-control">
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text w-25">Role</span>
                        <select class="form-control" name="upRole" id="upRole">
                            <option value="100">ADMIN</option>
                            <option value="8">Student</option>
                        </select>
                    </div>
                </div>
            </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-close">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-update">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.btn-edit').on('click', function(){
                stud_update_array = [];
                let stud_up_id = $(this).closest('tr').find('.txtstudID').val();
                let stud_id = $(this).closest('tr').find('.stud_num').text();
                let stud_name = $(this).closest('tr').find('.stud_name').text();
                let stud_year = $(this).closest('tr').find('.stud_year').text();
                let stud_course = $(this).closest('tr').find('.stud_course').text();
                let stud_email = $(this).closest('tr').find('.stud_email').text();
                let stud_contact = $(this).closest('tr').find('.stud_contact').text();
                let stud_role = $(this).closest('tr').find('.stud_role').text();

                alert(stud_role);
                $('#btn-update').on('click', function(){
                    function sanitizeInput(text) {
                        return text.replace(/[^\w\s]/gi, '');
                    }
                    let txtname = sanitizeInput($('#upName').val());
                    let txtid = sanitizeInput($('#upId').val());
                    let txtyear = sanitizeInput($('#upYear').val());
                    let txtcourse = sanitizeInput($('#upCourse').val());
                    let txtemail = sanitizeInput($('#upEmail').val());
                    let txtcontact = sanitizeInput($('#upContact').val());
                    let txtrole = sanitizeInput($('#upRole').val());
                    stud_update_info = {
                        "full_name":txtname,
                        "id_number":txtid,
                        "year":txtyear,
                        "course":txtcourse,
                        "email":txtemail,
                        "contact_number":txtcontact,
                        "role":txtrole,
                        "student_id":stud_up_id
                    }
                    stud_update_array.push(stud_update_info);
                    console.log(stud_update_array);
                    $.ajax({
                        type: 'POST',
                        url: '../source/code.php',
                        data: {stud_update_array:JSON.stringify(stud_update_array)},
                        success:function(){
                            alert("Update success");
                            location.reload();
                        },
                        error:function(){
                            alert("Failed to update data!");
                        }
                    })
                });
            });
        });
    </script>
</body>
</html>