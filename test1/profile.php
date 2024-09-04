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
                                include "../../../connect.php";
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

 <form id="hallbookingform" action="#" method="post">
    <div class="row">
        <div class="col-lg-12">
            <h2>Profile FORM</h2>
        </div>

        <div class="col-lg-6">
            <fieldset>
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="<?php echo $row['name']; ?>" required>
            </fieldset>
        </div>

        <div class="col-lg-6">
            <fieldset>
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" value="<?php echo $row['username']; ?>" required>
            </fieldset>
        </div>

        <div class="col-lg-6">
            <fieldset>
                <label for="gender">Gender</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="male" <?php echo ($row['gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
                    <option value="female" <?php echo ($row['gender'] == 'female') ? 'selected' : ''; ?>>Female</option>
                    <option value="other" <?php echo ($row['gender'] == 'other') ? 'selected' : ''; ?>>Other</option>
                </select>
            </fieldset>
        </div>

        <div class="col-lg-6">
            <fieldset>
                <label for="dob">DOB</label>
                <input type="date" name="dob" class="form-control" id="dob" value="<?php echo $row['dob']; ?>" required>
            </fieldset>
        </div>

        <div class="col-lg-6">
            <fieldset>
                <label for="contactno">Contact No</label>
                <input type="tel" name="contactno" class="form-control" id="contactno" placeholder="Enter Contact No" value="<?php echo $row['contactno']; ?>" required>
            </fieldset>
        </div>

        <div class="col-lg-12">
            <fieldset>
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" value="<?php echo $row['address']; ?>" required>
            </fieldset>
        </div>

        <div class="col-lg-6">
            <fieldset>
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" value="<?php echo $row['email']; ?>" required>
            </fieldset>
        </div>

        <div class="col-lg-6">
            <fieldset>
                <label for="role">Role</label>
                <input type="text" name="role" class="form-control" id="role" placeholder="Enter Role" value="<?php echo $row['role']; ?>" required>
            </fieldset>
        </div>

        <div class="col-lg-12">
            <fieldset>
                <label for="cityname">City Name</label>
                <input type="text" name="cityname" class="form-control" id="cityname" placeholder="Enter City Name" value="<?php echo $row['cityname']; ?>" required>
            </fieldset>
        </div>

        <div class="col-lg-12">
            <br>
            <fieldset>
                <button type="submit" class="btn btn-primary">Submit</button>
            </fieldset>
        </div>
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

    
  





