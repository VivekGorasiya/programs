<?php
    require_once("commons/session.php");
    require_once("classes/Slider.class.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
        require_once("commons/meta.php");
    ?>

    <title></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


     <!-- Custom styles for this page -->
     <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
         require_once("commons/sidebar.php");
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                require_once("commons/topbar.php");
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Slider</h1>
                        <button class="btn btn-primary" data-toggle="collapse" data-target="#form1">Add New</button>
                    </div>

                    <?php
                        if(isset($_SESSION["msg"]))
                        {
                            echo $_SESSION["msg"];
                            unset($_SESSION["msg"]);
                        }
                    ?>

                    <div id="form1" class="collapse">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="my-2">
                                <label class="form-label" for="title">Enter Title of Service</label>
                                <input type="text" class="form-control" name="title" id="title" required>
                            </div>

                            <div class="my-2">
                                <label class="form-label" for="description">Enter Slider Description</label>
                                <input type="text" class="form-control" name="description" id="description" required>
                            </div>

                            <div class="my-2">
                                <label class="form-label" for="sliderimg">Select Image for Slider</label>
                                <input type="file" class="form-control" name="sliderimg" id="sliderimg" required accept=".jpg">
                            </div>

                            <div class="my-2">
                                <label class="form-label" for="imgtype">Select Image for Slider / Gallery</label>
                                <select  class="form-control" name="imgtype" id="imgtype" required >
                                    <option value="1">Slider</option>
                                    <option value="2">Gallery</option>
                                </select>
                            </div>

                            <div class="my-2">
                                <input type="submit" value="Add New Slider" class="btn btn-primary" name="addProcess">
                                <input type="reset" value="Reset" class="btn btn-danger">
                            </div>

                        </form>
                    </div>

                    <?php
                    // require_once("commons/data.php");
                    ?>

                    <!-- Content Row -->
                    <div class="container-fluid">
                        <!-- Alwasy custome code here -->
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Services Table</h6>
                        </div>
                        <div class="card-body">
                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                           $sliderResult = $slider->getAllSliders();

                                            while($row = $sliderResult->fetch_assoc()){

                                                if($row["status"] == 1){
                                                    $statusbtn = "<a href='slider.php?status=0&sliderid=$row[sliderid]' class='btn btn-danger'>Disable</a>";
                                                }else{
                                                    $statusbtn = "<a href='slider.php?status=1&sliderid=$row[sliderid]' class='btn btn-success'>Enable</a>";
                                                }
                                                
                                                if($row["imagetype"] == 1){
                                                    $type = "Slider Image";
                                                }else{
                                                    $type = "Gallery Image";
                                                }

                                                $editbtn = "<a href='editslider.php?sliderid=$row[sliderid]' class='btn btn-primary'>Edit</a>";

                                                echo "<tr>
                                                    <td>$row[title]</td>
                                                    <td>$row[description]</td>
                                                    <td><img src='$row[imagepath]' style='width:250px;'></td>
                                                    <td>$type</td>
                                                    <td>$statusbtn</td>
                                                    <td>$editbtn</td>
                                                </tr>"; 
                                            } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>

                            </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php
            require_once("commons/footer.php");
            ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>

<?php
    if(isset($_POST["addProcess"])){
        $title = $_POST["title"];
        $description = $_POST["description"];
        $sliderimg = $_FILES["sliderimg"];
        $imgtype = $_POST["imgtype"];

        $type = $sliderimg["type"];

        if($type == "image/jpg" || $type == "image/jpeg"){
            $source = $sliderimg["tmp_name"];
            $rand = rand(999, 9999);
            $name = $rand." _ ".$sliderimg["name"];
            $destination = "img/sliderimages/$name";

            $slider->addNewSlider($title, $description, $destination, $imgtype);
            move_uploaded_file($source, $destination);

            $_SESSION["msg"] = "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <b>Success : </b> new Slider Added in database
            </div>";
            
        }else{
            $_SESSION["msg"] = "<div class='alert alert-danger alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <b>Error : </b> Must select *.JPG files only
            </div>";
        }
        header("location:slider.php");
    }

    if(isset($_GET["status"])){
        $status = $_GET["status"];
        $sliderid = $_GET["sliderid"];
        $slider->changeSliderStatus($sliderid, $status);
        header("location:slider.php");
    }
?>


      <!-- Page level plugins -->
      <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script>
        $('#dataTable').dataTable({
            "order": [[0, 'desc' ]]
        });
</script>