<?php 
	include "comunicacao.inc";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Interação PHP - MySQL</title>
</head>
<body>
	<center>
		<form method="post" action="">
			<label>Nome do Banco:</label><br>
			<input type="text" name="nomebanco"></input><br>
			<label>Número da Agencia:</label><br>
			<input type="text" name="agencia"></input><br>
			<label>Número da Conta:</label><br>
			<input type="text" name="conta"></input><br>
			<input type="submit" name="enviar"></input>
			<input type="reset" name="limpar"></input>
		</form>
	<?php 

		$nome = $_POST['nomebanco'];
		$agencia = $_POST['agencia'];
		$conta = $_POST['conta'];

		$sqlInsert = "insert into conta (nome_banco,agencia,conta) values ('$nome',$agencia,$conta)";
		mysqli_query($conexao,$sqlInsert);

	?>
	<br><br>
	<table border="1">
		<tr>
			<td>Nome do Banco</td><td>Agencia</td><td>Conta</td>
		</tr>	
	<?php 
		$sqlSelect = "select * from conta";
		$resultado = mysqli_query($conexao,$sqlSelect);
		
		while($linhas = mysqli_fetch_assoc($resultado)) {?>
			<tr><td><?php echo $linhas["nome_banco"] ?></td><td><?php echo $linhas["agencia"] ?></td><td><?php echo $linhas["conta"] ?></td></tr>
    <?php } ?>
	
	</table>
	<?php
		mysqli_close($conexao);
	?>
	</center>
</body>
</html>