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



<table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach ($result as $user) { ?>
            <tr>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $user->email; ?></td>
                <td>
                    <form method="get" action="update.php">
                        <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                        <button type="submit">Update</button>
                    </form>
                    <form method="post" action="delete.php">
                        <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

    <form method="post" action="add.php">
    <div class="champ">
    <label for="name">Name : </label>
    <input type="text" name="name">
  </div>
  <div class="champ">
    <label for="email">Email :</label>
    <input type="text" name="email">
  </div>
  <div class="champ" id="Add">
    <input type="submit"
    value="Add">
</div>
    
</form>


</body>

</head>

</html>
