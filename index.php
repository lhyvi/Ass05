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
    <link rel="stylesheet" href="/CSS/index.css">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h1>The <br><span class="green">HIGHER</span><br><span class="red">LOWER</span><br>Game</h1>
            <p>Welcome to the Higher or Lower Game! Try your luck and see if you can guess right.</p>
        </div>
        <div class="right-panel">
            <h2>User Login</h2>
            <form action="login.php" method="post" class="indexform">
                <input type="text" name="uname" placeholder="User Name" required>
                <input type="password" name="pass" placeholder="Password" required>
                <button type="submit">Login</button>
                <?php
                    if (isset($_GET['error'])) {
                        echo '<p class="error">' . $_GET['error'] . '</p>';
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
