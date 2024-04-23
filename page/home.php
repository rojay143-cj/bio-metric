<?php 
    require ('../connection/conn.php');
    include ('../asset/source/code.php');
    foreach($stud_data as $stud_row){

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <script src="../asset/api/Jquery.js"></script>
    <title>CCSE Biometric System</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-size: 1rem;
            width: 2000px;
            height: auto;
            margin: 0 auto;
        }
        .nav-bar{
            height: 100vh;
        }.main{
            background-color: purple;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container-fluid" id="container-css">
        <div class="row">
            <div class="nav-bar col-sm-2 border">
                    <ul class="list-group text-center">
                        <li class="list-group-item mb-5 mt-1">
                            <a href="home.php"><img src="../asset/image/logo.png" alt="logo" width="100" height="90"></a>
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
                    <div class="dash-text d-flex justify-content-between align-items-center p-2">
                        <span class="display-6">Dashboard</span>
                        <span id="curDate"><?php echo date("F, j, Y",strtotime('today')); ?>
                            <button class="btn btn-light" id="btn-search">
                                <i class="fa-solid fa-magnifying-glass p-2"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="greet card p-3 m-5 w-100 m-auto mt-5 shadow rounded">
                    <h4 class="">Welcome back Aguilar!</h4>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                        <p>Hi Cheer-up, Keep the students Attendance tracked with the assistance of our System!</p>
                        <span class="border"><img src="../asset/image/staff.png" alt="staff" width="150" height="120"></span>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-5 gap-3">
                    <div class="card mt-5 bg-info text-white">
                        <div class="card-body">
                            <h4>Total users</h4>
                            <h6><span><?php echo $stud_row['tot_stud'] ?></span></h6>
                        </div>
                    </div>
                    <div class="card mt-5 bg-success text-white">
                        <div class="card-body">
                            <h4>Number of students</h4>
                            <h6><span><?php echo $stud_row['tot_stud'] ?></span></h6>
                        </div>
                    </div>
                    <div class="card mt-5 bg-warning text-white">
                        <div class="card-body">
                            <h4>List of events</h4>
                            <h6><span><?php echo $stud_row['tot_stud'] ?></span></h6>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#btn-search').on('click',function(){
                $('#curDate').toggle().before("<input type='text' class='form-control w-25' placeholder='Search...' id='txt-search'>");
            })
        });
    </script>
</body>
</html>