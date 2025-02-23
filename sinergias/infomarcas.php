<?php
	session_start();
	$user = @$_SESSION['user'];
	//if (!(isset($_SESSION['user']) and ($user<>''))){
	//	header("Location: index.php");
	//	exit;
	//}
	
	require("../../conf_plos.php");
	require("../conf_utils.php");
?>
	
<!doctype html>
<html lang="pt-br">
	<head>
		<title>Recursos e Processos Administrativos de Nulidade de Marcas (CGREC/COREM) </title>
		<meta charset="utf-8">
		
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/pmensal1c.css">
		<link rel="stylesheet" type="text/css" href="css/marcas.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="../fontawesome/css/all.css">
		<link rel="icon" href="imagens/favicon2.png">

	</head>

	<body>
    <?php
    // Array com as opções do menu e submenus
    $menuItems = [
        'Home' => 'infomenu.htm',
        'Equipe' => 'infomarcas.php',
        'Publicações' => 'infomarcas.php',
        'Estatística' => 'infostatmarca.php',
        'Contato' => 'sobremarcas.php'
    ];

    // Página ativa
    $currentPage = basename($_SERVER['PHP_SELF']);
    ?>

	<center>
    <nav class="menu">
        <ul>
            <?php foreach ($menuItems as $name => $links): ?>
                <li>
                    <?php if (is_array($links)): ?>
                        <a href="#"><?= $name ?></a>
                        <ul>
                            <?php foreach ($links as $subName => $subLink): ?>
                                <li><a href="<?= $subLink ?>" class="<?= $currentPage === $subLink ? 'active' : '' ?>"><?= $subName ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <a href="<?= $links ?>" class="<?= $currentPage === $links ? 'active' : '' ?>"><?= $name ?></a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
	</center>
	<BR><BR>

	<?php
		$meses = array ("todos os meses","janeiro","fevereiro","março","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro");
		if (empty($_REQUEST["ano"])) {$ano=date('Y');} else {$ano=$_REQUEST["ano"];}
		if (empty($_REQUEST["mes"])) {$mes=$meses[(int)date('m')];} else {$mes=$_REQUEST["mes"];}
		if (empty($_REQUEST["selecao"])) {$selecao = 'IPAS009 - Publicação de registro para oposição';} else {$selecao=$_REQUEST["selecao"];}
		$mes = array_search($mes, $meses);
		$kmes = str_pad($mes,2,"0",STR_PAD_LEFT);
		$idata = "$ano-$kmes-01";
		@ $fp = fopen("data/info.csv","w");
	?>
	
		<!--<h1>Marcas <?php echo $meses[$mes];?> de <?php echo $ano;?> na Segunda Instância DIRPA/COREP </h1>-->
		<h1> Recursos e Processos Administrativos de Nulidade de Marcas (CGREC/COREM)  </h1>

		<center>
		<!--
		<form action="infomarcas.php" method="post" name="postDivisao">
		<div class="col-md-6 d-flex align-self-center">
			<select class="form-control" name="mes">
				<option <?php if ($mes==0) echo 'selected';?>>todos os meses</option>
				<option <?php if ($mes==1) echo 'selected';?>>janeiro</option>
				<option <?php if ($mes==2) echo 'selected';?>>fevereiro</option>
				<option <?php if ($mes==3) echo 'selected';?>>março</option>
				<option <?php if ($mes==4) echo 'selected';?>>abril</option>
				<option <?php if ($mes==5) echo 'selected';?>>maio</option>
				<option <?php if ($mes==6) echo 'selected';?>>junho</option>
				<option <?php if ($mes==7) echo 'selected';?>>julho</option>
				<option <?php if ($mes==8) echo 'selected';?>>agosto</option>
				<option <?php if ($mes==9) echo 'selected';?>>setembro</option>
				<option <?php if ($mes==10) echo 'selected';?>>outubro</option>
				<option <?php if ($mes==11) echo 'selected';?>>novembro</option>
				<option <?php if ($mes==12) echo 'selected';?>>dezembro</option>
			</select>
			<select class="form-control" name="ano">
				<option <?php if ($ano==2024) echo 'selected';?>>2024</option>
				<option <?php if ($ano==2023) echo 'selected';?>>2023</option>
				<option <?php if ($ano==2022) echo 'selected';?>>2022</option>
				<option <?php if ($ano==2021) echo 'selected';?>>2021</option>
			</select>
			<input type="submit" class="btn btn-primary" value="Buscar">
		</div>
		</form>
		-->
		<form action="infomarcas.php" method="post" name="postDivisao">
		<div class="col-md-6 d-flex align-self-center">
			<select class="form-control" name="selecao">
				<option <?php if ($selecao=='IPAS009 - Publicação de registro para oposição') echo 'selected';?>>IPAS009 - Publicação de registro para oposição</option>
				<option <?php if ($selecao=='IPAS235 - Recurso não provido') echo 'selected';?>>IPAS235 - Recurso não provido</option>
				<option <?php if ($selecao=='IPAS237 - Recurso provido (Reform. p/ Deferimento)') echo 'selected';?>>IPAS237 - Recurso provido (Reform. p/ Deferimento)</option>
				<option <?php if ($selecao=='IPAS360 - Notificação de recurso') echo 'selected';?>>IPAS360 - Notificação de recurso</option>
				<option <?php if ($selecao=='IPAS369 - Recurso provido (Reform. p/ Indeferimento)') echo 'selected';?>>IPAS369 - Recurso provido (Reform. p/ Indeferimento)</option>
				<option <?php if ($selecao=='Marcas pendentes') echo 'selected';?>>Marcas pendentes</option>
			</select>
			<input type="submit" class="btn btn-primary" value="Buscar">
		</div>
		</form>

		
	<?php
		$total=0;
		if ($selecao=='IPAS009 - Publicação de registro para oposição')
			$cmd = "select * from arquivados_ipas where codigo_ipas='009' limit 1000";
		elseif ($selecao=='IPAS235 - Recurso não provido')
			$cmd = "select * from arquivados_ipas where codigo_ipas='235' limit 1000";
		elseif ($selecao=='IPAS237 - Recurso provido (Reform. p/ Deferimento)')
			$cmd = "select * from arquivados_ipas where codigo_ipas='237' limit 1000";
		elseif ($selecao=='IPAS360 - Notificação de recurso')
			$cmd = "select * from arquivados_ipas where codigo_ipas='360' limit 1000";
		elseif ($selecao=='IPAS369 - Recurso provido (Reform. p/ Indeferimento)')
			$cmd = "select * from arquivados_ipas where codigo_ipas='369' limit 1000";
		elseif ($selecao=='Marcas pendentes')
			$cmd = "select * from arquivados_ipas where codigo_ipas='360' and numero not in (select numero from arquivados_ipas where codigo_ipas in ('158','235','237','238','267','270','369','370','403','428','499','535','699','902')) order by data asc limit 1000";
		else
			$cmd = "select * from arquivados_ipas";

		$res = mysqli_query($link,$cmd);#echo $cmd;
		while ($line=@mysqli_fetch_assoc($res))
		{
			$total++;
		}
		
		function converterData($data) {
			// Verifica se a data está no formato esperado YYYY-MM-DD
			if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $data)) {
				// Converte a data para o formato DD/MM/YYYY
				$dataConvertida = date("d/m/Y", strtotime($data));
				return $dataConvertida;
			} else {
				return "Formato de data inválido.";
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
				<th width=14%>Número</th>
				<th width=10%>Publicação</th>
				<th width=14%>Depósito</th>
				<th width=14%>Apresentação</th>
				<th width=14%>Natureza</th>
				<th width=14%>Nome</th>
			</tr>
			</thead>

			<?php
				echo "<TBODY>";$total=0;$total_fora=0;$soma_itens=0;
				
				if ($selecao=='IPAS009 - Publicação de registro para oposição')
					$cmd = "select * from arquivados_ipas where codigo_ipas='009' order by data desc limit 1000";
				elseif ($selecao=='IPAS235 - Recurso não provido')
					$cmd = "select * from arquivados_ipas where codigo_ipas='235' order by data desc limit 1000";
				elseif ($selecao=='IPAS237 - Recurso provido (Reform. p/ Deferimento)')
					$cmd = "select * from arquivados_ipas where codigo_ipas='237' order by data desc limit 1000";
				elseif ($selecao=='IPAS360 - Notificação de recurso')
					$cmd = "select * from arquivados_ipas where codigo_ipas='360' order by data desc limit 1000";
				elseif ($selecao=='IPAS369 - Recurso provido (Reform. p/ Indeferimento)')
					$cmd = "select * from arquivados_ipas where codigo_ipas='369' order by data desc limit 1000";
				elseif ($selecao=='Marcas pendentes')
					$cmd = "select * from arquivados_ipas where codigo_ipas='360' and numero not in (select numero from arquivados_ipas where codigo_ipas in ('158','235','237','238','267','270','369','370','403','428','499','535','699','902')) order by data asc limit 1000";
				else
					$cmd = "select * from arquivados_ipas";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$data_publicacao = converterData($line['data']);

					$data_deposito = '';
					$apresentacao = '';
					$natureza = '';
					$nome = '';
					$cmd2 = "select * from publicados_ipas where numero='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) 
					{
						$data_deposito = converterData($line2['data_deposito']);
						$apresentacao = $line2['apresentacao'];
						$natureza = $line2['natureza'];
						$nome = $line2['nome'];
					}

					echo "<tr>";
					echo "<td style='font-size: 12px;'> <a href='resposta_marcas.php?numero=$numero'>$numero</a> </td>";
					echo "<td style='font-size: 12px;'> $data_publicacao </td>";
					echo "<td style='font-size: 12px;'> $data_deposito </td>";
					echo "<td style='font-size: 12px;'> $apresentacao </td>";
					echo "<td style='font-size: 12px;'> $natureza </td>";
					echo "<td style='font-size: 12px;'> $nome </td>";

					$str = "$numero;$data_publicacao;$data_deposito;$apresentacao;$natureza;$nome"."\n";
					fputs($fp,$str);
				}
				mysqli_close($link);
				fclose($fp);
			?>

			</div>
			
	</table>			
	
	</body>

</html>