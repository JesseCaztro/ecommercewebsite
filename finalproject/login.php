<?php

$email = $_POST['email'];
$password = $_POST['password'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <p>
        Thank you <?php echo $email;?> your password is <?php echo $password;?> 
    </p>
  
</body>

</html>