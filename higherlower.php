<?php
session_start();
$number_max = 50;

if (!isset($_SESSION['uname'])) {
	header('Location: index.php?error=Please Log-In');
	exit();
}

if (!isset($_SESSION['random_number']) or !isset($_SESSION['guesses'])) {
	$_SESSION['random_number'] = rand(1, $number_max);
	$_SESSION['guesses'] = 0;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wclassth=device-wclassth, initial-scale=1.0">
    <title>Higher Lower</title>
    <link rel="stylesheet" type="text/css" href="CSS/higherlower.css">
</head>
<body>
	<div class="container">
		<div class="upper-container">
			<h1><span class="green">HIGHER</span><br> or <br><span class="red">LOWER</span></h1>
		</div>
		<div class="lower-container">
		<?php
		$win = false;

		if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['guess'])) {
			$guess = (int)$_POST['guess'];

			if ($guess < $_SESSION['random_number']) {
				echo '<h2>' . $guess .' - Higher</h2>';
				$_SESSION['guesses'] += 1;
			} elseif ($guess > $_SESSION['random_number']) {
				echo '<h2>' . $guess .' - Lower</h2>';
				$_SESSION['guesses'] += 1;
			} else {
				$win = true;
			}
		}

		if ($win) {
			$final_guesses = $_SESSION['guesses'];
			$_SESSION['random_number'] = rand(1, $number_max);
			$_SESSION['guesses'] = 0;
		?>
			<h2 class="winner">WINNER!</h2>
			<h2>CONGRATS <?php echo $_SESSION['uname']; ?></h2>
			<h2>FINAL AMOUNT OF GUESSES: <?php echo $final_guesses; ?></h2>
			<form action="higherlower.php">
				<input class="play-again" type="submit" value="Play again?" />
			</form>
		<?php
		} else {
		?>
			<h2>Pick a Number between 1-<?php echo $number_max; ?></h2>
			<h3>Guesses: <?php echo $_SESSION['guesses']; ?></h3>
			<form action="higherlower.php" method="post">
				<input type="number" class="guess" name="guess" placeholder="Guess" min=1 max=<?php echo $number_max; ?> required />
				<button type="submit">Pick</button>
			</form>
		<?php
		}
		?>

		<form action="logout.php">
			<input type="submit" value="Logout" class="logout" />
		</form>
		</div>
	</div>
</body>
</html>
