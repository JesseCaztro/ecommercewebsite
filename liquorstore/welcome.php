<?php
session_start();
 if(isset($_SESSION['id']) && $_SESSION['id']== 2) //check if user is a user and display buttons
    {
    ?>
    <a href="user_search.html" class="btn btn-danger ml-3">User Search</a>
    <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    <a href="index.php" class="btn btn-danger ml-3">Return to home page</a>

    <?php } elseif(isset($_SESSION['id']) && $_SESSION['id'] == 1) //check if user is an admin and display buttons
    {
    ?>
    <a href="user_search.html" class="btn btn-danger ml-3">User Search</a>
    <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    <a href="index.php" class="btn btn-danger ml-3">Return to home page</a>


<?php  }elseif(isset($_SESSION['id']) && $_SESSION['id'] == 3) //check if user is an admin and display buttons
    {
    ?>
    <a href="user_search.html" class="btn btn-danger ml-3">User Search</a>
    <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    <a href="index.php" class="btn btn-danger ml-3">Return to home page</a>


<?php  }elseif(isset($_SESSION['id']) && $_SESSION['id'] == 4) //check if user is an admin and display buttons
    {
    ?>
    <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    <a href="index.php" class="btn btn-danger ml-3">Return to home page</a>


<?php  }else{ // if user is not logged in then display these buttons?> 
<li><a href="login.php">Sign In</a></li>
<li><a href="register.php">Sign Up</a></li>
<li><a href="logout.php">LogOut</a></li>
<?php } ?>
