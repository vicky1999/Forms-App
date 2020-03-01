<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ENTER THE FORM U NEED TO FILL</title>
    <link rel="stylesheet" type="text/css" href="styles1.css">
  </head>
  <body>
  <form action="viewforms.php" method="GET">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    $connection= mysqli_connect ('localhost','root','','forms');
    if (!$connection)
    {
      die ('Could not connect:' . mysqli_error());
    }

    echo "<center><h1>Forms</h1></center>";
    $showtables= mysqli_query($connection,"SHOW TABLES FROM forms");
    //echo "<form action='User2.php' method=GET>";
    while($table = mysqli_fetch_array($showtables)) {
      //$var="<?php echo $table[0]; ;

      echo "<p style='font-size:10px; font-color:green;'> <a href=./display.php?data=$table[0]>$table[0]</a><br/><br/><br/><br/> </p>";

    }
    //echo "</form>";

?>
</form>

</body>
</html>
