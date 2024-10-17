<?php
if (isset($_SESSION['uname'])) {
	header('Location: higherlower.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <div id="login">
        <form action="login.php" method="post" class="indexform">
            <h1>Higher Lower</h1>
            <h2>User Login</h2>
            <label>User Name</label>
            <input type="text" name="uname" placeholder="User Name">
            <label>Password</label>
            <input type="password" name="pass" placeholder="Password">
            <button type="submit">Login</button>
			<?php
                if (isset($_GET['error'])) {
                    echo '<p class="error">' . $_GET['error'] . '</p>';
                }
            ?>
        </form>
    </div>
</body>
</html>