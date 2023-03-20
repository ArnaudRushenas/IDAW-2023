<?php

require_once('config.php');
require_once('connection_db.php');

$request = $pdo->prepare("select * from users");
$request->execute();
$result=$request->fetchAll(PDO::FETCH_OBJ);



?>

<!DOCTYPE html>
<html>

<head>
    <title>Users TP4</title>
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
</head>

<body>



<?php

echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
echo"<tr>Update</tr><tr>Delete</tr>"; 
    foreach ($result as $user) {
        echo "<tr><td>" . $user->id . "</td><td>" . $user->name . "</td><td>" . $user->email . "</td></tr>";
    }
    echo "</table>";






// $result = $request->fetchAll(PDO::FETCH_CLASS, "user");
// var_dump($result);
// TODO: add your code here
// retrieve data from database using fetch(PDO::FETCH_OBJ) and
// display them in HTML array
/*** close the database connection ***/
$pdo = null;    

?>
    <form method="post" action="users.php">
    <div class="champ">
    <label for="name">Name : </label>
    <input type="text" id="name">
  </div>
  <div class="champ">
    <label for="email">Email :</label>
    <input type="text" id="email">
  </div>
  <div class="champ" id="Add">
    <input type="submit"
    value="Add">
</div>
    
</form>


</body>

</head>

</html>

