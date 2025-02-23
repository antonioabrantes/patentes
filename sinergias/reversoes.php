<?php
	session_start();
	$user = @$_SESSION['user'];
	if (!(isset($_SESSION['user']) and ($user<>''))){
		header("Location: index.php");
		exit;
	}
	
	require("../../conf_plos.php");
	require("../conf_utils.php");
?>
	
<!doctype html>
<html lang="pt-br">
	<head>
		<title>Produção Mensal da Segunda Instância Equipe DIRPA/COREP </title>
		<meta charset="utf-8">
		
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/pmensal1c.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="../fontawesome/css/all.css">
		<link rel="icon" href="imagens/favicon2.png">
	
	</head>

	<body>

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
	</center>
	<BR><BR>

	<?php
		if (empty($_REQUEST["nome_selecionado"])) {$nome='ANTONIO CARLOS SOUZA DE ABRANTES';} else {$nome=trim($_REQUEST["nome_selecionado"]);}
		#if (empty($_REQUEST["nome_selecionado"])) {$nome='LÚCIA APARECIDA MENDONÇA';} else {$nome=trim($_REQUEST["nome_selecionado"]);}
		
		$examinador = '';
		$arquivo = '';
		$cmd = "select * from servidores where nome='$nome' and complemento like '%direp%' and rescisao='0000-00-00'";
		#$cmd = "select * from servidores where nome='$nome' and complemento like '%CGPAT II/DIPAE%' and rescisao='0000-00-00'";
		$res = mysqli_query($link,$cmd);
		if ($line=@mysqli_fetch_assoc($res)) 
		{
			$examinador=$line['email'];
			$matricula=$line['matricula'];
			$arquivo = "imagens/servidores/$matricula"."i.jpg";
			if(!file_exists($arquivo)) $arquivo = "imagens/servidores/$matricula".".jpg";
		}
		//echo $examinador;

	?>
	
		<h1>Recursos examinados na Segunda Instância DIRPA/COREP <BR><?php echo "<IMG SRC='$arquivo' ALIGN=CENTER WIDTH=50>&nbsp;&nbsp;<font size=2>$nome</font>"; ?></h1>

		<center>
		<form action="reversoes.php" method="post" name="postDivisao">
		<div class="col-md-6 d-flex align-self-center"><!-- Textos da seção -->
			<select class="form-control" name="nome_selecionado">
				<?php
					$cmd = "select * from servidores where complemento like '%direp%' and rescisao='0000-00-00'";
					#$cmd = "select * from servidores where complemento like '%CGPAT II/DIPAE%' and rescisao='0000-00-00'";
					$res = mysqli_query($link,$cmd);
					while ($line=@mysqli_fetch_assoc($res))
					{
						$e = $line['email'];
						$n = trim($line['nome']);
						if ($examinador==$e)
							echo "<option selected>$n</option>";
						else
							echo "<option>$n</option>";
					}
				?>
			</select>
			<input type="submit" class="btn btn-primary" value="Buscar">
		</div>
		</form>

		
	<?php
		$total=0;
		$total_recursos = array();
		$decisao_recursos = array();
		$cmd = "select * from pedido as p, examinador as e WHERE e.email='$examinador' and p.codigo=e.codigo and p.decisao in ('recurso provido','recurso negado','recurso exigencia','recurso ciencia') and p.anulado=0 order by rpi asc";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$decisao = $line['decisao'];
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link, $cmd2);
			if ($line2 = mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}

			$email_indeferimento = '';
			$cmd2 = "select * from pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.numero='$numero1' or p.numero='$numero2') and p.decisao in ('indeferimento') and p.anulado=0";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
				$email_indeferimento = $line2['email'];
			else
			{
				$cmd2 = "select * from pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.numero='$numero1' or p.numero='$numero2') and p.decisao in ('ciencia de parecer') and p.anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
					$email_indeferimento = $line2['email'];
				//else
					//echo "não encontrei o indeferimento de $numero<BR>";
			}
			if ($email_indeferimento<>'')
			{
				$total++;
				@$decisao_recursos[$email_indeferimento][$decisao]++;
				@$total_recursos[$email_indeferimento]++;
			}
		}
	?>

		<a href="<?php echo "data/info.csv";?>" target="_blank">
		  <h1><span class="fas fa-file fa-1x text-white-80"></span>&nbsp;&nbsp;<?php echo $total; ?> registros encontrados. </h1>
		</a>
		<BR><BR>
		</center>
		
		<div class="table-responsive">
		<table class="table table-hover align-middle table-status table-striped">

			<thead>
			<tr width=80%>
				<th width=6%>Imagem</th>
				<th width=6%>Examinador</th>
				<th width=8%>Indeferimentos</th>
				<th width=8%>Provido</th>
				<th width=8%>Exigência</th>
				<th width=10%>Negado</th>
				<th width=8%>Ciência</th>
				<th width=8%>% reversões</th>
			</tr>
			</thead>

			<?php
				//var_dump($total_recursos);
				//exit();
				arsort($total_recursos);
				//foreach ($total_recursos as $email=>$total)
				//{
				//	echo "$email $total<BR>";
				//}
				foreach ($total_recursos as $email=>$total)
				{
					$arquivo = '';
					$cmd = "select * from servidores where email='$email'";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res)) 
					{
						$matricula = $line['matricula'];
						$nome = $line['nome'];
						$arquivo = "imagens/servidores/$matricula"."i.jpg";
						if(!file_exists($arquivo)) $arquivo = "imagens/servidores/$matricula".".jpg";
					}
					else
					{
						$nome = $email;
					}
					echo "<tr>";
					echo "<td style='font-size: 12px;'> <IMG SRC='$arquivo' ALIGN=CENTER WIDTH=50> </td>";
					echo "<td style='font-size: 12px;'> $nome </td>";
					echo "<td style='font-size: 12px;'> $total </td>";
					echo "<td style='font-size: 12px;'> ".@$decisao_recursos[$email]['recurso provido']."</td>";
					echo "<td style='font-size: 12px;'> ".@$decisao_recursos[$email]['recurso exigencia']."</td>";
					echo "<td style='font-size: 12px;'> ".@$decisao_recursos[$email]['recurso negado']."</td>";
					echo "<td style='font-size: 12px;'> ".@$decisao_recursos[$email]['recurso ciencia']."</td>";
					$percentual = round(100*(@$decisao_recursos[$email]['recurso provido']+@$decisao_recursos[$email]['recurso exigencia'])/$total,1);
					if ($percentual>30)
						echo "<td style='font-size: 14px; color: red; font-weight: bold;'>$percentual </td>";
					else
						echo "<td style='font-size: 14px; color: green; font-weight: bold;'>$percentual </td>";
						
					echo "</tr>";
				}
				mysqli_close($link);
			?>
			
		</table>	
		</div>
	
	</body>

</html>