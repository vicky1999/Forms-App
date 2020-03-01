<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Display</title>
    <link rel="stylesheet" type="text/css" href="styles1.css">
  </head>
  <body>
    <?php

       $table=$_GET['data'];
       //$con=mysqli_connect('localhost','root','','forms');
       //$sql = "SELECT name FROM $table";

       $mysqli = new mysqli("localhost","root","","forms");

       if ($mysqli -> connect_errno) {
         echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
         exit();
       }
       echo "<div class='userdata'>";
       echo "<h2>Enter the details<br/></h2>";
       $sql = "SELECT * FROM $table";
       echo "<form action=display.php method=GET>";
       if ($result = $mysqli -> query($sql)) {

         $i=0;
         for($i=0;$i<mysqli_num_fields($result);$i++) {
           $fieldinfo = $result -> fetch_field_direct($i);
           echo "<h3>$fieldinfo->name : ";
           echo "<input type=text name='val'></h3><br/>";
         }
       }
       echo "<input type='submit' name='append'></input>";
       if(isset($_POST['append'])) {
         $query="insert into $table values(?,?,?)";
       }
       $mysqli -> close();
       echo "</form>";
       echo "</div>";
 ?>

  </body>
</html>
