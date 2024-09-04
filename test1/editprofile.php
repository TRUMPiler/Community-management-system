<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Profile</title>
    <!-- Add the required CSS and JS dependencies -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar and Sidebar -->
        <!-- <?php include "aside.php"; ?> -->

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Create Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Form Column -->
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Profile form</h3>
                                </div>

                                <?php
                                include "../connect.php";
                                if (isset($_GET['id'])) {
    
                                    $id = intval($_GET['id']);

    
                                 $query = "SELECT * FROM tbl_user WHERE id = $id";
                                 $run = mysqli_query($con, $query);
                                 if ($run) {
                                 $row = mysqli_fetch_assoc($run); 
                             if (!$row) {
                              die("Record not found.");
                                }
        
                             } else {
        
                             die("Query failed: " . mysqli_error($con));
                                 }
                            } else {
    
                                 die("ID not provided.");
                                    }
                                 ?>


                                        

                            <!-- form start -->

                                <form id= "profileform">
                                <div class="card-body">

                                    <div class="form-group">
                                            <label for="id"> ID</label>
                                            <select name="type" class="form-control" id="type" class>
                                            <?php  
                                                include "../../../connect.php";
                                                $query="select * from tbl_user where status=1";
                                                $result=mysqli_query($con,$query);
                                                if($result->num_rows>0)
                                                {
                                                    while($row=$result->fetch_assoc())
                                                    {
                                                        ?>
                                                        <option value="<?php echo $row["id"];?>"><?php echo $row["type_name"];?></option>
                                                        
                                                        <?php
                                                    }
                                                }
                                                else
                                                {
                                                    ?>
                                                    <option value>-No type found-</option>
                                                    <?php 
                                                }
                                            ?>

                                            </select>
                                        </div>
                                      
                                     </div>
                                     
                                        <div class="form-group">
                                            <label for="name"> Name</label>
                                            <input type="text" name="name" class="form-control"  id="name" placeholder="Enter Name" value="<?php echo $row['name'];?>"required>
                                        </div>

                                        <div class="form-group">
                                            <label for="username"> Usernme</label>
                                            <input type="text" name="username" class="form-control"  id="username" placeholder="Enter userName" value="<?php echo $row['username'];?>"required>
                                        </div>

                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                                <select id="gender" name="gender">
                                            <option value="male">male</option>
                                            <option value="female">female</option>
                                            <option value="other">other</option>
                                        </div>
                                        <div class="form-group">
                                            <label for="dob">DOB</label>
                                            <input type="date" name="dob" class="form-control" id="dob"value="<?php echo $row["dob"];?>"required>
                                        </div>

                                        <div class="form-group">
                                            <label for="contactno">Contactno</label>
                                            <input type="tel" name="Contactno" class="form-control" id="contactno"value="<?php echo $row["contactno"];?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" class="form-control" id="address"value="<?php echo $row["address"];?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" id="email"value="<?php echo $row["email"];?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="role">role</label>
                                            <input type="role" name="role" class="from-control" id="role" value="<?php echo $row["role"];?>"required>
                                        </div>

                                        
                                        <div class="form-group">
                                           <label for="cityname">cityname</label>
                                           <input type="text" name="text" class="from-control" id="cityname" value="<?php echo $row["cityname"];?>"required>
                                        </div>
                                        
                                        <!-- Form Submit Button -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    
    <!-- Include JS Files -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../dist/js/adminlte.min.js"></script>
    <script src="../../dist/js/demo.js"></script>

    </body>
</html>

    
  





