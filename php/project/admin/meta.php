<?php
    require_once("commons/session.php");
    require_once("classes/Meta.class.php");
    $result = $meta->getMetaData();

    while($row = $result->fetch_assoc()){
        $description = $row["description"];
        $keywords = $row["keywords"];
    }
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
                        <h1 class="h3 mb-0 text-gray-800">Edit Meta Keywords</h1>
                    </div>

                    <?php
                    // require_once("commons/data.php");
                    ?>

                    <!-- Content Row -->
                    <div class="container-fluid">
                        <!-- Alwasy custome code here -->
                        <?php
                            if(isset($_SESSION["msg"])){
                                echo $_SESSION["msg"];
                                unset($_SESSION["msg"]);
                            }
                        ?>
                        <form action="#" method="post">
                            <div class="my-2">
                                <label class="form-label" id="description">Enter Description</label>
                                <textarea  name="description" id="description" class="form-control" required autofocus style="resize:none;"><?php echo $description;?></textarea>
                            </div>


                            <div class="my-2">
                                <label class="form-label" id="keywords">Enter Keywords</label>
                                <textarea  name="keywords" id="keywords" class="form-control" required style="resize:none;"><?php echo $keywords;?></textarea>
                            </div>

                            <div class="my-2">
                                <input type="submit" value="Update Meta" name="updateMeta" class="btn btn-primary">
                                <input type="reset" class="btn btn-danger" value="Reset">
                            </div>
                        </form>
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
    if(isset($_POST["updateMeta"])){
        $description = $_POST["description"];
        $keywords = $_POST["keywords"];

        $meta->updateMeta($description, $keywords);
        $_SESSION["msg"] = "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <b>Success : </b> Meta Details Updated successfully
            </div>";
            header("location:meta.php");
    }
?>