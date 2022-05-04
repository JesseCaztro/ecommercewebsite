<?php 
    session_start();
    if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']==true){
        $adminloggedin= true;
        $userId = $_SESSION['adminuserId'];
    }
    else{
        $adminloggedin = false;
        $userId = 0;
    }

    if($adminloggedin) {
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
</head>
<body id="body-pd" style="background: #80808045;">
     
    <?php
   
        require 'dbconn.php';
        require 'nav.php';

        if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100%">
                    <strong>Success!</strong> You are logged in
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                  </div>';
        }
    ?>

    <?php $page = isset($_GET['page']) ? $_GET['page'] :'home'; ?>
    <?php include $page.'.php' ?>


</body>
</html>

<?php
    }
    else{
        header("location: /finalproject/admin/login.php");
    }
?>
