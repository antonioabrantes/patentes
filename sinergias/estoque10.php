<?php
	session_start();
	$user = @$_SESSION['user'];
	if (!(isset($_SESSION['user']) and ($user<>''))){
		header("Location: index.php");
		exit;
	}
	require("../../conf_plos.php");
	require("../conf_utils.php");

    if (empty($_REQUEST["tipo"])) {$tipo=1;} else {$tipo=$_REQUEST["tipo"];}
	if ($tipo=='Recursos Técnicos 12.2') $tipo=1;
	if ($tipo=='Recursos Administrativos 12.3 / 12.6') $tipo=15;
	if ($tipo=='Nulidades') $tipo=17;

?>

<!doctype html>
<HTML><HEAD><TITLE>Cientistas Patentes</TITLE>

    <title>Produção da CGREC / Justiça</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/pmensal1c.css">
	
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="../fontawesome/css/all.css">
	<link rel="icon" href="imagens/favicon2.png">
	
</HEAD>

<BODY>

		<center>
		<ul id="navegacao">
		<li>
			<a href="menu.php">Início</a>
		</li>
		<li>
			<a href="sobre.html">Sobre</a>
		</li>
		<li id="atual">
			<a href="estatistica.php">Estatísticas</a>
		</li>
		<li>
			<a href="../plos/plos.php">Cientistas</a>
		</li>
		<li>
			<a href="justica.php">Justiça</a>
		</li>
		</ul>
		<BR><BR>

	<form action="estoque10.php" method="post" name="postDecada">
	<div class="col-md-6 d-flex"><!-- Textos da seção -->
    <div class="align-self-center">
		<label for="estados"> </label>
		<select class="form-control" name="tipo" onchange="postDecada.submit()">
			<option <?php if ($tipo==1) echo 'selected';?>>Recursos Técnicos 12.2</option>
			<option <?php if ($tipo==15) echo 'selected';?>>Recursos Administrativos 12.3 / 12.6</option>
			<option <?php if ($tipo==17) echo 'selected';?>>Nulidades</option>
		</select>
    </div>
	</div>
	</form>

		
<?php

	if ($tipo==1) require("cgrec1_estoque.htm"); // para gerar cgrec1_estoque.htm precisa rodar http://cientistaspatentes.com.br/central/control.php?action=1140&op=3&tipo=1
										//  para gerar cgrec1.htm precisa rodar         http://cientistaspatentes.com.br/central/control.php?action=115&op=3&tipo=1
	if ($tipo==15) require("cgrec15_estoque.htm"); // para gerar cgrec5_estoque.htm precisa rodar http://cientistaspatentes.com.br/central/control.php?action=1140&op=3&tipo=15
	if ($tipo==17) require("cgrec17_estoque.htm"); // para gerar cgrec7_estoque.htm precisa rodar http://cientistaspatentes/central.com.br/control.php?action=1140&op=3&tipo=17
	
	if ($tipo==1) $fname = 'resultados_1140_1.txt';
	if ($tipo==15) $fname = 'resultados_1140_15.txt';
	if ($tipo==17) $fname = 'resultados_1140_17.txt';
?>

		<a href="<?php echo "data/$fname";?>" target="_blank">
		  <h1><span class="fas fa-file fa-1x text-white-80"></span>&nbsp;&nbsp;Lista de Pedidos</h1>
		</a>

</BODY></HTML>
