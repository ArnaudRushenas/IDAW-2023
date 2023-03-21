<?php
require_once('config.php');
require_once('connection_db.php');

// Si le formulaire d'update est "submitted"
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the user's updated information
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];


    $stmt = $pdo->prepare("UPDATE users SET name=?, email=? WHERE id=?");
    $stmt->execute([$name, $email, $id]);

    // Rediriger à la page users
    header('Location: usersv2.php');
    exit();
}

$id = $_GET['id'];


$stmt = $pdo->prepare("SELECT * FROM users WHERE id='$id'");
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>
    <h1>Update User Informations</h1>
    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $user->id; ?>">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $user->name; ?>">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo $user->email; ?>">
        </div>
        <button type="submit">Apply</button>
    </form>
</body>
</html>