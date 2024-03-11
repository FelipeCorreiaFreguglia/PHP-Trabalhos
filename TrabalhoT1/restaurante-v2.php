<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Gorjeta</title>
    <style>
		 body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f4f4f4;
		}

		.container {
			max-width: 400px;
			margin: 50px auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		h2 {
			color: #333;
			margin-bottom: 20px;
		}

		form {
			margin-top: 20px;
		}

		input[type="number"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 15px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type="radio"] {
			margin-right: 10px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			border: none;
			padding: 10px 20px;
			border-radius: 4px;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #45a049;
		}

		/* Estilização para o resumo */
		.resumo {
			margin-top: 30px;
			padding: 20px;
			background-color: #ddd; /* Alterando a cor de fundo para um tom mais escuro */
			border-radius: 8px;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
			line-height: 0.5; /* Defina o espaçamento entre as linhas aqui */
		}

		.resumo h3 {
			margin-top: 0;
			color: #333;
		}

		.resumo p {
			margin-bottom: 10px; /* Adicionando margem inferior */
		}

		.resumo strong {
			font-weight: bold;
		}
	</style>
</head>
<body>
    <div class="container">
        <h2>Calculadora de Gorjeta</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Valor da Conta: <input type="number" name="valor_conta" min="0" step="0.01" required><br>
            Percentual de Gorjeta:
            <input type="radio" name="percentual_gorjeta" value="0.10" required> 10%
            <input type="radio" name="percentual_gorjeta" value="0.15"> 15%
            <input type="radio" name="percentual_gorjeta" value="0.20"> 20%<br>
            Área:
            <input type="radio" name="area" value="1.0" required> Sem Cover
            <input type="radio" name="area" value="1.1"> Área Cover
            <input type="radio" name="area" value="1.2"> Área VIP<br>
            <input type="submit" name="submit" value="Calcular">
        </form>

        <?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

		/*Código aqui*/
		$vl = $_POST["valor_conta"];
		$pg = $_POST["percentual_gorjeta"];
		$fa = $_POST["area"];
		
		$vl_pg = $vl * $pg;
		$vlt = $vl + $vl_pg;
		$vf = $vlt * $fa;
		$vl_fa = $vlt - $vf;
		
		echo "<div class='resumo'>";
		echo "<h3>Resumo da Gorjeta</h3>";
		echo "<p><strong>Valor da Conta:</strong> R$ " . number_format($vl, 2, ',', '.') . "</p>";
		echo "<p><strong>Percentual de Gorjeta:</strong> " . ($pg * 100) . "%</p>";
		echo "<p><strong>Valor da Gorjeta:</strong> R$ " . number_format($vl_pg, 2, ',', '.') . "</p>";
		echo "<p><strong>Área do Restaurante:</strong> ";
		if ($fa == 1.0) {
			echo "Sem Cover";
		} elseif ($fa == 1.1) {
			echo "Área Cover";
		} elseif ($fa == 1.2) {
			echo "Área VIP";
		}
		echo "<p><strong>Valor da Área:</strong> R$ " . number_format($vl_fa*-1, 2, ',', '.') . "</p>";
		echo "<p><strong>Total a Pagar:</strong> R$ " . number_format($vf, 2, ',', '.') . "</p>";
		echo "</div>";
		}
		?>
    </div>
</body>
</html>
