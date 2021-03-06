<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Угадайка</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include "menu.php";?>
	<div id="content">
		<h1 id="h1_header">Игра угадайка</h1>
		<div id="center">
			<div id="box">
				<p id="gameHead">Угадайте число от 0 до 100. А не хотите, так введите q.</p>
				<p id="gamer1"><input type="text" id="1">		Игрок 1</p>
				<p id="gamer2"><input type="text" id="2">		Игрок 2</p>
				<a href="#" id="button" onclick="game();">Ответить</a>
			</div>	
		</div>
	</div>

	<script type="text/javascript">

		function hide(id) {
			document.getElementById(id).style.display = "none";
		}

		function hideGame() {
			hide("gamer1");
			hide("gamer2");
			hide("button");
		}
	
		var answer = parseInt(Math.random() * 100);
		var users = [0, 1, 2];
		var winners = [];

		function game() {
			for (var i = 1; i < users.length; i++) {
				var user = users[i];
				if (user == 0) {
					continue;
				} else {
					var userAnswer = document.getElementById(String(i)).value;
					if (userAnswer == 'q') {
						users.splice(user, 1, 0);
						document.getElementById(String(i)).setAttribute("disabled", "disabled");
					} else {
						userAnswer = +userAnswer;
						if (userAnswer == answer) {
							winners.push(user);
						} else if (userAnswer > answer)	{
							document.getElementById(String(i)).value = "Многовато";
						} else if (userAnswer < answer)	{
							document.getElementById(String(i)).value = "Маловато";
						}
					}
				}
			}
			if (winners.length > 0) {
				hideGame();
				if (winners.length == 1) {
					document.getElementById("gameHead").innerHTML = "Поздравляшки! Игрок " + winners + " молодец!";
				} else {
					document.getElementById("gameHead").innerHTML = "Поздравляшки! Игроки " + winners + " молодцы!";
				}		
			}
		}
	</script>

	<div id="footer">
		<?php include "footer.php";?>
	</div>
</body>
</html>