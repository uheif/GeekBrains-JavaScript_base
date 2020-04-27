<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Загадки</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include "menu.php";?>
	<div id="content">
		<h1 id="h1_header">Загадки</h1>
		<div id="center">
			<div id="box">
				<p id="riddle"></p>
				<p><input type="text" id="userAnswer"></p>
				<a href="#" id="button" onclick="game();">Ответить</a>
			</div>	
		</div>
	</div>

	<script type="text/javascript">

	    var guessAnswerArray = [["С пальмы вниз, на пальму снова ловко прыгает…", "обезьяна"],
	                            ["Скорей на берег выбегай! Плывет зубастый…", "крокодил"], 
	                            ["Шагает голову задрав двугорбый молодой...", "верблюд"],
	                            ["На это стоит поглядеть: бревно взял хоботом ...", "слон"],
	                            ["Лишь только свет дневной потух, заухал в темноте ...", "филин"],
	                            ["В теплой лужице своей громко квакал...", "лягушонок"],
	                            ["В чаще голову задрал, воет с голоду ...", "волк"],
	                            ["Длиннее шеи не найдешь, сорвет любую ветку ...", "жираф"],];

	    var level = 0;

	    var riddle = document.getElementById("riddle");
	    riddle.innerHTML = guessAnswerArray[level][0];

	    var points = 0;

	    function hide(id) {
	    	document.getElementById(id).style.display = "none";
	    }

	    function checkAnswer(answer, answerArray) {
			return answer == answerArray[1];
	    }

	    function game() {

		    var userAnswer = document.getElementById("userAnswer").value.toLowerCase();

		    if (checkAnswer(userAnswer, guessAnswerArray[level])) {
		    	alert("Ура! Вы угадалец!");
			    points++;
		    } else {
		    	alert("Нет, " + guessAnswerArray[level][1]);
		    }

		    document.getElementById("userAnswer").value = ""
		    level++;

		    if (level == guessAnswerArray.length) {
		    	hide("userAnswer");
		    	hide("button");
		    	riddle.innerHTML = "Вы набрали " + points;
		    } else {
		    	riddle.innerHTML = guessAnswerArray[level][0];
		    }
		}
	</script>

	<div id="footer">
		<?php include "footer.php";?>
	</div>
</body>
</html>