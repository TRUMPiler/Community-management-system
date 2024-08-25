<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Announcement Type</title>
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
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar and Sidebar -->
        <?php include "aside.php"; ?>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Create Announcement Type</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Create Announcement Type</li>
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
                                    <h3 class="card-title">Announcement Type Form</h3>
                                </div>

                                <!-- Form Start -->
                                <form id="announcementTypeForm" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="id">ID</label>
                                            <input type="text" name="id" class="form-control" id="id" placeholder="Enter ID" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="type_name">Type Name</label>
                                            <input type="text" name="type_name" class="form-control" id="type_name" placeholder="Enter Type Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control" id="status" required>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Form Submit Button -->
                                    <div class="card-footer">
                                        <button type="submit" id="btnsubmit" class="btn btn-primary">Submit</button>
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
<script type="text/javascript" src=""> 
    $(document).ready(function()
    {
        $.ajax({
            url : "../pages/forms/addannouncementtype.php",
            type : "POST",
            success : function(data) {
                $("#table-data").html(data);

            }
        })

    });

    $("#btnsubmit").on("click",function(e){
        e.preventDefault();
      
        var type_name =$("#type_name").val();
        var status =$("#status").val();

        $.ajax({
            url : "../Ajax_file/addannouncementtype.php",
            type : "POST",
            data : {announcement_status:status ,announcementtype_name:type_name},
            success : function(data)
            {

            }

        })
    })
   
</script>
</html>
