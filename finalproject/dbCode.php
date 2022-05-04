<?php

$db = new mysqli('localhost', 'root', '', 'liquorland');
if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
    exit;
}
$server = "localhost";
$username = "root";
$password = "";
$database = "liquorland";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
    die("Error". mysqli_connect_error());
}

function disconnectDB()
{
    global $db;
    $db->close();
}

function login($uname, $pwd)
{
    session_start();
    global $db;
    $query = "SELECT * FROM users WHERE username = '$uname'";
    $result = $db->query($query);
    $row = $result->fetch_assoc();
    $confirmPass = $row['password'];

    if (mysqli_num_rows($result) == 0) {
        header('Location: ../login.php?msg=error');
        exit;
    }
    if ($pwd != $confirmPass) {
        echo $pwd;
        header('Location: ../login.php?msg=incorrectpass');
        $result->free();
    } else {
        $_SESSION['userID'] = $row['id'];
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['isAdmin'] = $row['userType'];
        $result->free();
        header('Location: ../products.php');
    }
}


function register($fname, $lname, $uname, $email, $phone, $pwd)
{
    global $db;
    try {
        $query = "INSERT INTO `users`( `username`, `firstName`, `lastName`, `email`, `phone`, `userType`, `password`)  VALUES ('$uname','$fname', '$lname', '$email', '$phone',TRUE, '$pwd')";
        $result = $db->query($query);
        echo $result;
    } catch (Exception $e) {
        $error_message = $e->getMessage();
        echo $error_message;
        header("Location: ../register.php?msg='$error_message'");
    }

    // checks for successful result
    if ($result) {
        $query = "SELECT * FROM users WHERE username = '$uname'";
        $result = $db->query($query);
        $row = $result->fetch_assoc();
        if($row['userType'] == 0)
            {
                $_SESSION['isAdmin'] = 'FALSE';
            }
            else
            {
                $_SESSION['isAdmin'] = 'TRUE';
            }
        if (isset($_SESSION['loggedin'])) {
            $userID = $row['id'];
            echo 'User.' . $userID;
            header('Location: ../products.php?userid=' . $userID);
        } else {
            session_start();
            $_SESSION['userID'] = $row['id'];
            $_SESSION['loggedin'] = TRUE;
            $result->free();
            header('Location: ../products.php');
            exit;
        }
    } else {
        header('Location: ../register.php?msg=error');
    }
}


// gets all products
function getAllProducts()
{
    global $db;
    $query = "SELECT * FROM `product` ORDER BY `name` ASC";
    $result = $db->query($query);
    return $result;
}

// get single product
function getSingleProduct($prodID)
{
    global $db;
    $query = "SELECT * FROM `product` where `productId` = '$prodID'";
    $result = $db->query($query);
    return $result->fetch_assoc();
}

// get user info by ID
function getUserInfoByID($userID)
{
    global $db;
    $query = "SELECT * FROM `users` WHERE `id` = '$userID'";
    $result = $db->query($query);
    return $result;
}

// check if item is added in cart
function checkCartItemForUser($itemId,$userId)
{
    global $db;
    $query = "SELECT * FROM `cart` WHERE productId = '$itemId' AND `userId`='$userId'";
    $result = $db->query($query);
    $numExistRows = mysqli_num_rows($result);
    return $numExistRows;
}

// cart count
function countCartItemsForUser($userId)
{
    global $db;
    $query = "SELECT * FROM `cart` WHERE `userId`='$userId'";
    $result = $db->query($query);
    $numExistRows = mysqli_num_rows($result);
    return $numExistRows;
}

//get cart items
function getCartItemsForUser($userId)
{
    global $db;
    $query = "SELECT * FROM `cart` WHERE `userId`='$userId' ORDER BY `addedDate` DESC";
    return $result = $db->query($query);
}

//update cart quantity
function updateCartQuantity($cartID,$quan)
{
    global $db;
    $query = "UPDATE`cart` SET `quantity`= '$quan' WHERE `cartId`='$cartID'";
    $result = $db->query($query);
    return $result;
}



