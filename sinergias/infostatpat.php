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
		<title>Recursos e Processos Administrativos de Nulidade de Patentes (CGREC/COREP) </title>

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
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	</head>

	<body>
    <?php
    // Array com as opções do menu e submenus
		$menuItems = [
			'Home' => 'infomenu.htm',
			'Equipe' => 'cgrecequipe.php',
			'Publicações' => 'infopedidos.php',
			'Estatística' => 'infostatpat.php',
			'Produção' => 'acoes2.php',
			'Ações Judiciais' => 'acoes.php',
			'Contato' => 'sobrepatentes.php'
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
		if (empty($_REQUEST["selecao"])) {$selecao = 'Publicação 12.2';} else {$selecao=$_REQUEST["selecao"];}
		if (empty($_REQUEST["op"])) {$op = 0;} else {$op=$_REQUEST["op"];}
		if (empty($_REQUEST["ano"])) {$ano = date('Y');} else {$ano=$_REQUEST["ano"];}
		@ $fp = fopen("data/info.csv","w");


		if ($op==1) // https://cientistaspatentes.com.br/sinergias/infostatpatente.php?op=1&ano=2024
		{
			echo "Contabilizando os tempos offline<BR>";
			$cmd_final = '';
			for ($imes = 1; $imes <= 12; $imes++) {
				echo "Calculando mes $imes de $ano ... <BR>";
				$numeros_lidos = array();
				$soma_atraso = 0;
				$count_atraso = 0;
				$mes = sprintf('%02d', $imes);
				$cmd = "select * from pedido where decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111','recurso provido-devolucao 100.2','recurso provido-reforma 100.1','recurso provido-reforma 100.2','recurso 1002','recurso 1001') and year(rpi)=$ano and month(rpi)=$imes";  //echo "$cmd<BR>";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$decisao = $line['decisao'];
					$data_rpi = $line['rpi'];
					if (!in_array($numero,$numeros_lidos))
					{
						$numeros_lidos[$i++]=$numero;
						$numero1 = $numero;
						$numero2 = $numero;
						$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
						$res2 = mysqli_query($link,$cmd2);
						$numero1 = $numero;
						$numero2 = $numero;
						if ($line2=@mysqli_fetch_assoc($res2))
						{
							$numero1 = $line2["numero1"];
							$numero2 = $line2["numero2"];
						}

						$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('22.15','15.23','19.1')";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) continue; // ignore pedidos com ação judicial

						$data = null;
						$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='12.2'";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) $data = $line2['data'];

						if (!is_null($data)) 
						{
							if ($data_rpi>$data)
							{
								$atraso = round((strtotime($data_rpi)-strtotime($data))/60/60/24/30,2);
								echo "$numero,$data,$data_rpi,$atraso<BR>";
								$soma_atraso = $soma_atraso + $atraso;
								$count_atraso++;
								//exit();
							}
						}
					}
				}

				if ($count_atraso==0)
					$media = 0;
				else
					$media = round($soma_atraso/$count_atraso,2);
				
				$ultimos_dois_digitos = substr($ano, -2);
				$valor_x = $meses[$imes]." $ultimos_dois_digitos";
				$data = "$ano-$mes-01";
				$cmd_final = $cmd_final."UPDATE `cgrec` set param1='$media' WHERE tipo='patente' and data='$data';<BR>";
			}
			echo "<BR><BR>";
			echo "$cmd_final<BR>";
			exit();
			
			/*
			INSERT INTO `cgrec` (`id`, `tipo`, `data`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `param8`, `divisao`) VALUES (NULL, 'patente', '2024-01-01', '', '', '', '', '', '', '', '', 'DIRPA');
			INSERT INTO `cgrec` (`id`, `tipo`, `data`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `param8`, `divisao`) VALUES (NULL, 'patente', '2024-02-01', '', '', '', '', '', '', '', '', 'DIRPA');
			INSERT INTO `cgrec` (`id`, `tipo`, `data`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `param8`, `divisao`) VALUES (NULL, 'patente', '2024-03-01', '', '', '', '', '', '', '', '', 'DIRPA');
			INSERT INTO `cgrec` (`id`, `tipo`, `data`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `param8`, `divisao`) VALUES (NULL, 'patente', '2024-04-01', '', '', '', '', '', '', '', '', 'DIRPA');
			INSERT INTO `cgrec` (`id`, `tipo`, `data`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `param8`, `divisao`) VALUES (NULL, 'patente', '2024-05-01', '', '', '', '', '', '', '', '', 'DIRPA');
			INSERT INTO `cgrec` (`id`, `tipo`, `data`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `param8`, `divisao`) VALUES (NULL, 'patente', '2024-06-01', '', '', '', '', '', '', '', '', 'DIRPA');
			INSERT INTO `cgrec` (`id`, `tipo`, `data`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `param8`, `divisao`) VALUES (NULL, 'patente', '2024-07-01', '', '', '', '', '', '', '', '', 'DIRPA');
			INSERT INTO `cgrec` (`id`, `tipo`, `data`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `param8`, `divisao`) VALUES (NULL, 'patente', '2024-08-01', '', '', '', '', '', '', '', '', 'DIRPA');
			INSERT INTO `cgrec` (`id`, `tipo`, `data`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `param8`, `divisao`) VALUES (NULL, 'patente', '2024-09-01', '', '', '', '', '', '', '', '', 'DIRPA');
			INSERT INTO `cgrec` (`id`, `tipo`, `data`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `param8`, `divisao`) VALUES (NULL, 'patente', '2024-10-01', '', '', '', '', '', '', '', '', 'DIRPA');
			INSERT INTO `cgrec` (`id`, `tipo`, `data`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `param8`, `divisao`) VALUES (NULL, 'patente', '2024-11-01', '', '', '', '', '', '', '', '', 'DIRPA');
			INSERT INTO `cgrec` (`id`, `tipo`, `data`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `param8`, `divisao`) VALUES (NULL, 'patente', '2024-12-01', '', '', '', '', '', '', '', '', 'DIRPA');
			*/
		}

		if ($op==2) // https://cientistaspatentes.com.br/sinergias/infostatpatente.php?op=2&ano=2024
		{
			echo "Contabilizando as taxas de provimento<BR>";
			$cmd_final = '';
			for ($imes = 1; $imes <= 12; $imes++) {
				echo "Calculando mes $imes de $ano ... <BR>";
				$numeros_lidos = array();
				$total = 0;
				$providos = 0;
				$mes = sprintf('%02d', $imes);
				$cmd = "select * from pedido where decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111','recurso provido-devolucao 100.2','recurso provido-reforma 100.1','recurso provido-reforma 100.2','recurso 1002','recurso 1001') and year(rpi)=$ano and month(rpi)=$imes"; //echo "$cmd<BR>";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$data = $line['rpi'];
					$decisao = $line['decisao'];
					if (!in_array($numero,$numeros_lidos))
					{
						$numeros_lidos[$i++]=$numero;
						$total++;
						if (in_array($decisao, ['recurso provido', 'recurso 100','recurso provido-devolucao 100.2','recurso provido-reforma 100.1','recurso provido-reforma 100.2','recurso 1002','recurso 1001'])) $providos++;
						echo "$numero;$data;$decisao<BR>";
					}
				}
				$data = "$ano-$mes-01";
				$cmd_final = $cmd_final."UPDATE `cgrec` set param2='$total', param3='$providos' WHERE tipo='patente' and data='$data';<BR>";
			}
			echo "<BR><BR>";
			echo "$cmd_final<BR>";
			exit();
		}

	?>
	
		<h1> Estatísticas de Recursos e Processos Administrativos de Nulidade de Patentes (CGREC/COREP)  </h1>

		<center>
		<form action="infostatpat.php" method="post" name="postDivisao">
		<div class="col-md-6 d-flex align-self-center">
			<select class="form-control" name="selecao">
				<option <?php if ($selecao=='Publicação 12.2') echo 'selected';?>>Publicação 12.2</option>
				<option <?php if ($selecao=='Publicação 17.1') echo 'selected';?>>Publicação 17.1</option>
				<option <?php if ($selecao=='Tempo de decisão em recursos de processos de patentes (PPA)') echo 'selected';?>>Tempo de decisão em recursos de processos de patentes (PPA)</option>
				<option <?php if ($selecao=='Recursos técnicos providos + negados') echo 'selected';?>>Recursos técnicos providos + negados</option>
				<option <?php if ($selecao=='Taxa de provimento em recurso técnico') echo 'selected';?>>Taxa de provimento em recurso técnico</option>
			</select>
			<input type="submit" class="btn btn-primary" value="Buscar">
		</div>
		</form>

		
	<?php
	
		function producao_recursos($link,$taxa)
		{
			$meses = array ("todos os meses","jan","fev","mar","abr","mai","jun","jul","ago","set","out","nov","dez");
			$ano_atual = date('Y');
			$mes_atual = date('m');
			$imes_atual = (int)$mes;
			$ano_inicio = $ano_atual - 2;
			$mes_inicio = $mes_atual;
			$data_inicio = new DateTime("$ano_inicio-$mes_inicio-01");
			$data_atual = new DateTime("$ano_atual-$mes_atual-01");
			$data_anterior = $data_atual->modify('-1 month');
			$ano_anterior = $data_anterior->format('Y');
			$mes_anterior = $data_anterior->format('m');

			$numeros_lidos = array();
			$count = 0;
			$soma_atraso = 0;
			$count_atraso = 0;
			$valor_y = array ();
			$valor_x = array ();
			for ($ano = $ano_inicio; $ano <= $ano_atual; $ano++) {
				for ($imes = 1; $imes <= 12; $imes++) {
					$mes = sprintf('%02d', $imes);
					$data = new DateTime("$ano-$mes-01");
					if ($data >= $data_inicio and $data <= $data_anterior) {
						$data="$ano-$mes-01";
						$cmd = "select * from cgrec where tipo='patente' and data='$data'";
						$res = mysqli_query($link,$cmd); 
						if ($line=@mysqli_fetch_assoc($res)) 
						{
							$total = $line['param2'];
							$providos = $line['param3'];
							if ($total>0)
								$valor_y[$count] = round($providos/$total,2);
							else
								$valor_y[$count] = 0;
							
							if ($taxa==0) $valor_y[$count] = $total;
						}
						$ultimos_dois_digitos = substr($ano, -2);
						$valor_x[$count] = $meses[$imes]." $ultimos_dois_digitos";
						$count = $count + 1;
					}
				}
			}
			if ($taxa==0) $titulo = 'Total de recursos providos + negados';
			if ($taxa==1) $titulo = 'Taxa de provimento recursos técnicos';

			echo "<script>
				google.charts.load('current', {packages: ['corechart', 'line']});
				google.charts.setOnLoadCallback(drawBasic);

				function drawBasic() {
					var data = new google.visualization.DataTable();
					data.addColumn('string', 'Meses');
					data.addColumn('number', '$titulo');";

				$data_rows = "data.addRows([\n";
				for ($count = 0; $count < count($valor_x); $count++) 
				{
					$data_rows .= "    ['{$valor_x[$count]}', {$valor_y[$count]}]";
					
					// Adiciona uma vírgula exceto no último elemento
					if ($count < count($valor_x) - 1) {
						$data_rows .= ",";
					}
					$data_rows .= "\n";
				}

				// Fecha a string
				$data_rows .= "]);";

				// Exibe o resultado
				echo "$data_rows";
				
				echo "
					var options = {
						hAxis: {
							title: 'Meses',
							slantedText: true, // Inclina os textos para evitar sobreposição
							slantedTextAngle: 45
						},
						vAxis: {
							title: '$titulo'
						},
						chartArea: {
							width: '80%', // Ajusta a área do gráfico
							height: '70%'
						},
						legend: { position: 'none' } // Remove legenda, pois não é necessária
					};

					var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
					chart.draw(data, options);
				}
				</script>
				<div id='chart_div' style='width: 100%; height: 500px;'></div>
				";
			return;
		}

/*
 https://cientistaspatentes.com.br/central/control.php?action=115&op=42&ano=2024
 update cgrec set param1='3.6' where tipo='cgrectempo' and year(data)=2024 and divisao='DIRPA';
 média do ano 3.6 x 12 = 43,2 meses, ok
 
 https://cientistaspatentes.com.br/central/control.php?action=115&op=41&ano=2024
update cgrec set param1='38',param2='23',param3='22',param4='0' where tipo='cgrecprov' and year(data)=2024 and month(data)=1 and divisao='DIRPA';
update cgrec set param1='63',param2='33',param3='38',param4='0' where tipo='cgrecprov' and year(data)=2024 and month(data)=2 and divisao='DIRPA';
update cgrec set param1='145',param2='147',param3='67',param4='90' where tipo='cgrecprov' and year(data)=2024 and month(data)=3 and divisao='DIRPA';
update cgrec set param1='170',param2='178',param3='73',param4='110' where tipo='cgrecprov' and year(data)=2024 and month(data)=4 and divisao='DIRPA';
update cgrec set param1='181',param2='191',param3='73',param4='110' where tipo='cgrecprov' and year(data)=2024 and month(data)=5 and divisao='DIRPA';
update cgrec set param1='194',param2='211',param3='74',param4='110' where tipo='cgrecprov' and year(data)=2024 and month(data)=6 and divisao='DIRPA';
update cgrec set param1='211',param2='226',param3='74',param4='110' where tipo='cgrecprov' and year(data)=2024 and month(data)=7 and divisao='DIRPA';
update cgrec set param1='211',param2='237',param3='74',param4='110' where tipo='cgrecprov' and year(data)=2024 and month(data)=8 and divisao='DIRPA';
update cgrec set param1='214',param2='282',param3='74',param4='110' where tipo='cgrecprov' and year(data)=2024 and month(data)=9 and divisao='DIRPA';
update cgrec set param1='279',param2='307',param3='119',param4='110' where tipo='cgrecprov' and year(data)=2024 and month(data)=10 and divisao='DIRPA';
update cgrec set param1='297',param2='337',param3='129',param4='110' where tipo='cgrecprov' and year(data)=2024 and month(data)=11 and divisao='DIRPA';
update cgrec set param1='300',param2='337',param3='132',param4='110' where tipo='cgrecprov' and year(data)=2024 and month(data)=12 and divisao='DIRPA';
dá a menos prque não contabilizava 100.1 etc
*/


		function desenhar_grafico_tempo_recurso($link)
		{
			$meses = array ("todos os meses","jan","fev","mar","abr","mai","jun","jul","ago","set","out","nov","dez");
			$ano_atual = date('Y');
			$mes_atual = date('m');
			$imes_atual = (int)$mes;
			$ano_inicio = $ano_atual - 2;
			$mes_inicio = $mes_atual;
			$data_inicio = new DateTime("$ano_inicio-$mes_inicio-01");
			$data_atual = new DateTime("$ano_atual-$mes_atual-01");
			$data_anterior = $data_atual->modify('-1 month');
			$ano_anterior = $data_anterior->format('Y');
			$mes_anterior = $data_anterior->format('m');

			$numeros_lidos = array();
			$count = 0;
			$soma_atraso = 0;
			$count_atraso = 0;
			$valor_y = array ();
			$valor_x = array ();
			for ($ano = $ano_inicio; $ano <= $ano_atual; $ano++) {
				for ($imes = 1; $imes <= 12; $imes++) {
					$mes = sprintf('%02d', $imes);
					$data = new DateTime("$ano-$mes-01");
					if ($data >= $data_inicio and $data <= $data_anterior) {
						$data="$ano-$mes-01";
						$cmd = "select * from cgrec where tipo='patente' and data='$data'";
						$res = mysqli_query($link,$cmd); 
						if ($line=@mysqli_fetch_assoc($res)) $valor_y[$count] = $line['param1'];
						$ultimos_dois_digitos = substr($ano, -2);
						$valor_x[$count] = $meses[$imes]." $ultimos_dois_digitos";
						$count = $count + 1;
					}
				}
			}
			$titulo = 'Tempo de decisão';
			echo "<script>
				google.charts.load('current', {packages: ['corechart', 'line']});
				google.charts.setOnLoadCallback(drawBasic);

				function drawBasic() {
					var data = new google.visualization.DataTable();
					data.addColumn('string', 'Meses');
					data.addColumn('number', '$titulo');";

				$data_rows = "data.addRows([\n";
				for ($count = 0; $count < count($valor_x); $count++) 
				{
					$data_rows .= "    ['{$valor_x[$count]}', {$valor_y[$count]}]";
					
					// Adiciona uma vírgula exceto no último elemento
					if ($count < count($valor_x) - 1) {
						$data_rows .= ",";
					}
					$data_rows .= "\n";
				}

				// Fecha a string
				$data_rows .= "]);";

				// Exibe o resultado
				echo "$data_rows";
				
				echo "
					var options = {
						hAxis: {
							title: 'Meses',
							slantedText: true, // Inclina os textos para evitar sobreposição
							slantedTextAngle: 45
						},
						vAxis: {
							title: '$titulo'
						},
						chartArea: {
							width: '80%', // Ajusta a área do gráfico
							height: '70%'
						},
						legend: { position: 'none' } // Remove legenda, pois não é necessária
					};

					var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
					chart.draw(data, options);
				}
				</script>
				<div id='chart_div' style='width: 100%; height: 500px;'></div>
				";

			return;
		}
	
		function desenhar_grafico($fp,$link,$despacho)
		{
			$meses = array ("todos os meses","jan","fev","mar","abr","mai","jun","jul","ago","set","out","nov","dez");
			$ano_atual = date('Y');
			$mes_atual = date('m');
			$imes_atual = (int)$mes_atual;
			$ano_inicio = $ano_atual - 2;
			$mes_inicio = $mes_atual;
			$data_inicio = new DateTime("$ano_inicio-$mes_inicio-01");
			$data_atual = new DateTime("$ano_atual-$mes_atual-01");
			$data_anterior = $data_atual->modify('-1 month');
			$ano_anterior = $data_anterior->format('Y');
			$mes_anterior = $data_anterior->format('m');
			//echo $data_inicio->format('Y-m-d');
			
			$total = 0;
			$count = 0;
			$valor_y = array ();
			$valor_x = array ();
			for ($ano = $ano_inicio; $ano <= $ano_atual; $ano++) {
				for ($imes = 1; $imes <= 12; $imes++) {
					$mes = sprintf('%02d', $imes);
					$data = new DateTime("$ano-$mes-01");
					if ($data >= $data_inicio and $data <= $data_anterior) {
						//echo "$ano-$mes-01 ($count)<br>"; 
						$valor_y[$count] = 0;
						$cmd = "select count(*) as x from arquivados where despacho='$despacho' and year(data)=$ano and month(data)=$imes";
						$cmd = "select * from arquivados where despacho='$despacho' and year(data)=$ano and month(data)=$imes";
						$res = mysqli_query($link,$cmd);
						$total1 = 0;
						while ($line=@mysqli_fetch_assoc($res))
						{
							$total1 = $total1 + 1;
							$numero = $line['numero'];
							$data = $line['data'];
							$str = "$numero $data"."\n";
							//echo "$str<BR>";
							fputs($fp, $str);
						}
						$valor_y[$count] = $total1;
						$total = $total + $total1;
						$ultimos_dois_digitos = substr($ano, -2);
						$valor_x[$count] = $meses[$imes]." $ultimos_dois_digitos";
						$count = $count + 1;
					}
				}
			}
		
			if ($despacho=='12.2') $titulo = 'Recursos 12.2';
			if ($despacho=='17.1') $titulo = 'Nulidade 17.1';

			echo "<script>
				google.charts.load('current', {packages: ['corechart', 'line']});
				google.charts.setOnLoadCallback(drawBasic);

				function drawBasic() {
					var data = new google.visualization.DataTable();
					data.addColumn('string', 'Meses');
					data.addColumn('number', '$titulo');";

				$data_rows = "data.addRows([\n";
				for ($count = 0; $count < count($valor_x); $count++) 
				{
					$data_rows .= "    ['{$valor_x[$count]}', {$valor_y[$count]}]";
					
					// Adiciona uma vírgula exceto no último elemento
					if ($count < count($valor_x) - 1) {
						$data_rows .= ",";
					}
					$data_rows .= "\n";
				}

				// Fecha a string
				$data_rows .= "]);";

				// Exibe o resultado
				echo "$data_rows";
				
				echo "
					var options = {
						hAxis: {
							title: 'Meses',
							slantedText: true, // Inclina os textos para evitar sobreposição
							slantedTextAngle: 45
						},
						vAxis: {
							title: '$titulo'
						},
						chartArea: {
							width: '80%', // Ajusta a área do gráfico
							height: '70%'
						},
						legend: { position: 'none' } // Remove legenda, pois não é necessária
					};

					var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
					chart.draw(data, options);
				}
				</script>
				<div id='chart_div' style='width: 100%; height: 500px;'></div>
				";
			return $total;
		}
		
		if ($selecao=='Publicação 12.2')
		{
			$despacho = '12.2';
			$total = desenhar_grafico($fp,$link,$despacho);
		}
		
		if ($selecao=='Publicação 17.1')
		{
			$despacho = '17.1';
			$total = desenhar_grafico($fp,$link,$despacho);
		}
		
		if ($selecao=='Tempo de decisão em recursos de processos de patentes (PPA)')
		{
			desenhar_grafico_tempo_recurso($link);
		}
		
		if ($selecao=='Recursos técnicos providos + negados')
		{
			producao_recursos($link,0);
		}
		
		if ($selecao=='Taxa de provimento em recurso técnico')
		{
			producao_recursos($link,1);
		}
		
		mysqli_close($link);
		fclose($fp);

	?>

		<a href="<?php echo "data/info.csv";?>" target="_blank">
		  <h1><span class="fas fa-file fa-1x text-white-80"></span>&nbsp;&nbsp;<?php echo $total; ?> registros encontrados. </h1>
		</a>
		<BR><BR>
		</center>
		
	
	</body>

</html>