<html>
<head>
  <title>Liquorland Search Results</title>
</head>
<body>
<h1>Liquorland Search Results</h1>
<?php
  // create short variable names
  $searchtype=$_POST['searchtype'];
  $searchterm=trim($_POST['searchterm']);

  if (!$searchtype || !$searchterm) {
     echo 'You have not entered search details.  Please go back and try again.';
     exit;
  }

  

  @ $db = new mysqli('localhost', 'root', '', 'liquorland');

  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }

  $query = "select * from products where ".$searchtype." like '%".$searchterm."%'";
  $result = $db->query($query);

  $num_results = $result->num_rows;

  echo "<p>Number of products found: ".$num_results."</p>";

  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p><strong>".($i+1).". ID: ";
     echo htmlspecialchars(stripslashes($row['id']));
     echo "</strong><br />Name: ";
     echo stripslashes($row['name']);
     echo "<br />Description: ";
     echo stripslashes($row['desc']);
     echo "<br />Price: ";
     echo stripslashes($row['price']);
     echo "</p>";
  }

  $result->free();
  $db->close();

?>
</body>
</html>
