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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Higher Lower</title>
    <link rel="stylesheet" type="text/css" href="CSS/higherlower.css">
</head>
<body>
	<h1><br><span id="green">HIGHER</span><br><span id="white">OR</span><br><span id="red">LOWER</span></h1>
	<div id="box">
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
	
	<h2>WINNER!</h2>
	<h2>CONGRATS <?php echo $_SESSION['uname'];?>
	<h2>FINAL AMOUNT OF GUESSES: <?php echo $final_guesses;?></h2>
	<form action="higherlower.php">
    <input type="submit" value="Play again?" />
	</form>
	<?php
	} else {
	?>
	<h2> Pick a Number between 1-<?php echo $number_max?> </h2>
	<h3> Guesses: <?php echo $_SESSION['guesses'];?>
	<form action="higherlower.php" method="post">
		<input type="number" name="guess" placeholder="Guess" min=1 max=<?php echo $number_max;?> required=true></input>
		<button type="submit">Pick</button>
	</form>
	<?php
	}
	?>
	
	<form action="logout.php">
    <input type="submit" value="Logout" />
	</form>
	</div>
</body>
