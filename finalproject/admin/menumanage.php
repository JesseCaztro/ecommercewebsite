<?php
    include 'dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['createItem'])) {
        $name = $_POST["name"];
        $description = $_POST["desc"];
        $price = $_POST["price"];

        $sql = "INSERT INTO `product` (`name`, `price`, `desc`, `PubDate`) VALUES ('$name', '$price', '$desc', current_timestamp())";   
        $result = mysqli_query($conn, $sql);
        $pizzaId = $conn->insert_id;
        if ($result){
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                
                $newName = 'product-'.$productId;
                $newfilename=$newName .".jpg";

                $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/finalproject/img/';
                $uploadfile = $uploaddir . $newfilename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    echo "<script>alert('success');
                            window.location=document.referrer;
                        </script>";
                } else {
                    echo "<script>alert('failed');
                            window.location=document.referrer;
                        </script>";
                }

            }
            else{
                echo '<script>alert("Please select an image file to upload.");
                        window.location=document.referrer;
                    </script>';
            }
        }
        else {
            echo "<script>alert('failed');
                    window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['removeItem'])) {
        $productId = $_POST["productId"];
        $sql = "DELETE FROM `product` WHERE `productId`='$productId'";   
        $result = mysqli_query($conn, $sql);
        $filename = $_SERVER['DOCUMENT_ROOT']."/finalproject/img/product-".$productId.".jpg";
        if ($result){
            if (file_exists($filename)) {
                unlink($filename);
            }
            echo "<script>alert('Removed');
                window.location=document.referrer;
            </script>";
        }
        else {
            echo "<script>alert('failed');
            window.location=document.referrer;
            </script>";
        }
    }
    if(isset($_POST['updateItem'])) {
        $productId = $_POST["productId"];
        $name = $_POST["name"];
        $desc = $_POST["desc"];
        $price = $_POST["price"];
    

        $sql = "UPDATE `pizza` SET `name`='$name', `price`='$price', `desc`='$desc' WHERE `productId`='$productId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('update');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('failed');
                window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['updateItemPhoto'])) {
        $pizzaId = $_POST["productId"];
        $check = getimagesize($_FILES["itemimage"]["tmp_name"]);
        if($check !== false) {
            $newName = 'product-'.$productId;
            $newfilename=$newName .".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/finalproject/img/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['itemimage']['tmp_name'], $uploadfile)) {
                echo "<script>alert('success');
                        window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('failed');
                        window.location=document.referrer;
                    </script>";
            }
        }
        else{
            echo '<script>alert("Please select an image file to upload.");
            window.location=document.referrer;
                </script>';
        }
    }
}
?>
