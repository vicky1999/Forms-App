<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>

    <form action="createForm.php" method="POST">
      <div class="header">
      <label>Enter a title</label>
      <input type="text" name=title><br/>
    </div>
    <div class="input-gr">
      <h3>Enter the form elements</h3><br/>
      <label>Title</label>
      <input type=text name='val'>
      <select id='options'>
      <option value='short answer'>Short Answer</option>
      <option value='mcq'>Multiple Choice</option>
      <option value='number'>Number</option></select><br/><br/>
    </div>
      <div class="btn">
        <input type='submit' value='Add' name='add'></input> &nbsp &nbsp &nbsp &nbsp
        <a name='finish' href='viewforms.php'>SUBMIT</a>
    </div>
    </form>
    <?php
      $i=1;
      //table creation...
      $con = new mysqli('localhost', 'root','', 'forms');
      if ($con->connect_error) {
          die("Connection failed: " . $con->connect_error);
      }

      $name="form$i";
      $i+=1;
      $tableName=$name;
      $sql = "CREATE TABLE $name (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY)";
      $con->query($sql);

      if(isset($_POST['add'])) {
        $var=$_POST['val'];
        echo "Table name : ".$tableName;
        $alter="ALTER TABLE $name ADD $var CHAR(30)";
        $con->query($alter);
      }
      $con->close();
     ?>
  </body>
</html>
