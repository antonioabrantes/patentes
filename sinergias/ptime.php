<?php
	session_start();
	$user = @$_SESSION['user'];
	if (!(isset($_SESSION['user']) and ($user<>''))){
		header("Location: index.php");
		exit;
	}
	
	require("../../conf_plos.php");
	require("../conf_utils.php");
	
// SELECT * FROM CEPIT_SISCAP.SISCAP_HISTORICO where TRUNC(datahora) > TO_DATE('2024-09-24', 'YYYY-MM-DD')
// SELECT * FROM CEPIT_SISCAP.SISCAP_HISTORICO where numero is not null and extract(year from datahora)>=2024
// grave em central/historico.csv
// https://cientistaspatentes.com.br/central/forum3_central_4.php?action=7

// SELECT * FROM CEPIT_SISCAP.SISCAP_ASSINATURAS where TRUNC(dt_assina) > TO_DATE('2024-09-24', 'YYYY-MM-DD')
// SELECT * FROM CEPIT_SISCAP.SISCAP_ASSINATURAS where extract(year from dt_assina)>2023
// grave em central/assinaturas.csv
// https://cientistaspatentes.com.br/central/forum3_central_4.php?action=8

// elimina duplicatas
// https://cientistaspatentes.com.br/central/forum3_central_4.php?action=8&op=3
// https://cientistaspatentes.com.br/central/forum3_central_4.php?action=8&op=4


	// Função para calcular a média
	function calcularMedia($array) {
		$soma = array_sum($array);
		$quantidade = count($array);
		$media = $soma/$quantidade;
		return number_format($media, 0, ".", '');
	}

	// Função para calcular o desvio padrão
	function calcularDesvioPadrao($array) {
		$media = calcularMedia($array);
		$somaQuadrados = 0;
		$quantidade = count($array);

		foreach ($array as $valor) {
			$somaQuadrados += pow($valor - $media, 2);
		}

		$variancia = $somaQuadrados / $quantidade;
		return number_format(sqrt($variancia),0, ".", '');
	}

	// Função para calcular diferença em dias inteiros
	function calcularDiferencaDias($dataInicial, $dataFinal) {
		// Converte as datas para objetos DateTime
		$dataInicial = new DateTime($dataInicial);
		$dataFinal = new DateTime($dataFinal);

		// Calcula a diferença entre as datas
		$diferenca = $dataInicial->diff($dataFinal);

		// Retorna a diferença em dias
		return $diferenca->days;
	}

	$fp = fopen('data/ptime.csv', 'w');
	$total = 0;
	$meses = array ("","janeiro","fevereiro","março","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro");
	if (empty($_REQUEST["ano"])) {$ano=date('Y');} else {$ano=$_REQUEST["ano"];}
	if (empty($_REQUEST["mes"])) {$mes=$meses[(int)date('m')];} else {$mes=$_REQUEST["mes"];}
	if (empty($_REQUEST["tipo"])) {$tipo='Recursos Técnicos 12.2';} else {$tipo=$_REQUEST["tipo"];}
	$mes = array_search($mes, $meses);
	$kmes = str_pad($mes,2,"0",STR_PAD_LEFT);
	$idata = "$ano-$kmes-01";
	
	$indicador1 = 0; 
	$array_indicador1 = array();
	$indicador2 = 0;
	$array_indicador2 = array();
	$indicador3 = 0;
	$array_indicador3 = array();
	$indicador4 = 0; 
	$array_indicador4 = array();
	$indicador5 = 0; 
	$array_indicador5 = array();
	$indicador6 = 0; 
	$array_indicador6 = array();

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

	<h1>Produção de <?php echo $meses[$mes];?> de <?php echo $ano;?> da Segunda Instância DIRPA/COREP </h1>

	<center>
	<form action="ptime.php" method="post" name="postDivisao">
	<div class="col-md-6 d-flex align-self-center"><!-- Textos da seção -->
	<div class="align-self-center">
		<select class="form-control" name="tipo" onchange="postDivisao.submit()">
			<option <?php if ($tipo=='Recursos Técnicos 12.2') echo 'selected';?>>Recursos Técnicos 12.2</option>
			<option <?php if ($tipo=='Recursos Administrativos 12.3 / 12.6') echo 'selected';?>>Recursos Administrativos 12.3 / 12.6</option>
			<option <?php if ($tipo=='Nulidades') echo 'selected';?>>Nulidades</option>
		</select>
	</div>
	</div>
	<div class="col-md-6 d-flex align-self-center"><!-- Textos da seção -->
		<select class="form-control" name="mes">
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
			<option <?php if ($ano==2025) echo 'selected';?>>2025</option>
		</select>
		<button type="submit" class="btn btn-primary">Buscar</button>
	</div>
	</form>
	</center>

	<?php

		if ($tipo=='Recursos Técnicos 12.2')
		{
		// 100 recurso provido, 111 recurso negado, 120 recurso ciência, 121 recurso exigência, 130 recurso prejudicado 
		$array_decisao = array ('recurso 100','recurso 111','recurso 120','recurso 121','recurso 130');
		$array_decisao = array ("'recurso provido'","'recurso negado'","'recurso ciencia'","'recurso exigencia'","'recurso exigencia 121'","'recurso manutencao do indeferimento 111'","'recurso provido-reforma 100.1'","'recurso provido-reforma 100.2'","'recurso provido-devolucao 100.2'");
		
		$clausulaWhereSql_decisao = implode(',', $array_decisao);
		
		$array_coordenacao = array ('HELENO JOSÉ COSTA BEZERRA NETTO','ROCKFELLER MACIEL PEÇANHA','ROSANA MARQUES AMORIM','LEILA FREIRE FALCONE','GERSON DA COSTA CORREA');
		$clausulaWhere_coordenacao = [];
		foreach ($array_coordenacao as $nome) {
			$clausulaWhere_coordenacao[] = "nome LIKE '" . $nome . "%'";
		}
		$clausulaWhereSql_coordenacao = implode(' OR ', $clausulaWhere_coordenacao);

		$array_presidencia = array ('JULIO CESAR CASTELO BRANCO REIS MOREIRA','TANIA CRISTINA LOPES RIBEIRO','CLAUDIO VILAR FURTADO','ALEXANDRE LOPES LOURENÇO');
		$clausulaWhere_presidencia = [];
		foreach ($array_presidencia as $nome) {
			$clausulaWhere_presidencia[] = "nome LIKE '" . $nome . "%'";
		}
		$clausulaWhereSql_presidencia = implode(' OR ', $clausulaWhere_presidencia);
		
		// $cmd = "select * from pedido where (codigo=1849202 or codigo=1849284 or codigo=1849413) and year(rpi)=$ano and month(rpi)=$mes and anulado=0 and decisao in ($clausulaWhereSql_decisao) order by numero,decisao desc";
		$cmd = "select * from pedido where year(rpi)=$ano and month(rpi)=$mes and anulado=0 and decisao in ($clausulaWhereSql_decisao) order by numero,decisao desc";
		$res = mysqli_query($link,$cmd); // echo "$cmd<BR>";
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$instancia = $line['instancia'];
			$decisao = $line['decisao'];
			$divisao = $line['divisao'];
			$data_rpi = $line['rpi'];
			$codigo = $line['codigo'];

			$indicador1 = 'null'; // tempo entre 12.2 e a carga para o examinador
			$indicador2 = 'null'; // tempo da da carga do examinador até assinatura do examinador
			$indicador3 = 'null'; // tempo da assinatura do examinador até assinatura da coordenação
			$indicador4 = 'null'; // tempo da assinatura da coordenação até o presidente (se decisão)
			$indicador5 = 'null'; // tempo da assinatura do presidente até RPI
			$indicador6 = 'null'; // tempo total entre 12.2 e RPI 
			
			$data_122 = null;
			$data_carga = null;
			$data_examinador = null;
			$data_coordenacao = null;
			$data_presidencia = null;

			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}

			$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='12.2' and anulado=0";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
				$data_122 = $line2['data'];		
			
			$cmd2 = "select * from examinador where codigo=$codigo and dono=1";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) 
			{
				$examinador = $line2['email'];
				$busca_no_historico = " inseriu na carga de $examinador"; // evita recuperar 're-inseriu na carga de '
				$cmd2 = "select * from historico where (numero='$numero1' or numero='$numero2') and descricao like '%$busca_no_historico%' order by data asc";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$data_carga = $line2['data'];
					$indicador1 = calcularDiferencaDias($data_122,$data_carga);
					$array_indicador1[] = $indicador1;
					
					$cmd2 = "select * from servidores where email='$examinador'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) 
					{
						$nome = $line2['nome'];

						$clausulaWhere_sqlExaminadorOuChefia = "nome like '%$nome%'"; 
						if ($divisao!='direp')
						{
							$cmd2 = "select * from servidores where complemento='".$divisao_complemento[$divisao]."' and (cargo='CHEFIA' or substituto='".$divisao_complemento[$divisao]."')";
							$res2 = mysqli_query($link,$cmd2);
							while ($line2=@mysqli_fetch_assoc($res2))
							{
								$nome1 = $line2['nome'];
								$clausulaWhere_sqlExaminadorOuChefia = $clausulaWhere_sqlExaminadorOuChefia." or nome like '%$nome1%'";
							}
						}

						$cmd2 = "select * from assinaturas where codigo=$codigo and ($clausulaWhere_sqlExaminadorOuChefia) and dt_assina>='$data_carga'";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) 
						{
							$data_examinador = $line2['dt_assina'];
							$indicador2 = calcularDiferencaDias($data_carga,$data_examinador);
							$array_indicador2[] = $indicador2;

							$cmd2 = "select * from assinaturas where codigo=$codigo and ($clausulaWhereSql_coordenacao) and dt_assina>='$data_examinador' order by dt_assina asc";
							$res2 = mysqli_query($link,$cmd2); // echo "$cmd2<BR>";
							if ($line2=@mysqli_fetch_assoc($res2)) 
							{
								$data_coordenacao = $line2['dt_assina'];
								$indicador3 = calcularDiferencaDias($data_examinador,$data_coordenacao);
								$array_indicador3[] = $indicador3;
								
								// o parecer do presidente é assinado em um outro parecer
								$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('recurso 100', 'recurso 1001', 'recurso 1002', 'recurso 111') and rpi='$data_rpi'";
								$res2 = mysqli_query($link,$cmd2);//echo "$cmd2<BR>";
								if ($line2=@mysqli_fetch_assoc($res2)) 
								{
									$codigo = $line2['codigo'];
									$cmd2 = "select * from assinaturas where codigo=$codigo and ($clausulaWhereSql_presidencia) and dt_assina>='$data_coordenacao' order by dt_assina asc";
									$res2 = mysqli_query($link,$cmd2);//echo "$cmd2<BR>";
									if ($line2=@mysqli_fetch_assoc($res2)) 
									{
										$data_presidencia = $line2['dt_assina'];
										$indicador4 = calcularDiferencaDias($data_coordenacao,$data_presidencia);
										$indicador5 = calcularDiferencaDias($data_presidencia,$data_rpi);
										$array_indicador4[] = $indicador4;
										$array_indicador5[] = $indicador5;
									}
									else
										echo "$numero $codigo $decisao não encontrei assinatura da presidência [$cmd2]<BR>";
								}
							}
							else
								echo "$numero $codigo $decisao não encontrei assinatura da coordenação [$cmd2]<BR>";
						}
						else
							echo "$numero $codigo $decisao não encontrei assinatura $examinador [$cmd2]<BR>";
					}
					else
						echo "$numero $codigo $decisao não encontrei examinador $examinador [$cmd2]<BR>";
				}
				else
					echo "$numero $codigo $decisao não encontrei a carga no histórico de $examinador [$cmd2]<BR>";
			}
			else
				echo "$numero $codigo $decisao não encontrei examinador [$cmd2]<BR>";
			
			$indicador6 = calcularDiferencaDias($data_122,$data_rpi);
			$array_indicador6[] = $indicador6;
			$soma = $indicador1 + $indicador2 + $indicador3 + $indicador4 + $indicador5;
			
			$divisao = '';
			$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('indeferimento','9.2') and rpi is not null";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) $divisao = $line2['divisao'];
					
			$str = "$numero,$decisao,$codigo,$divisao,$examinador,$data_122,$data_carga,$data_examinador,$data_coordenacao,$data_presidencia,$data_rpi";
			//echo "$str<BR>";
			fputs($fp,$str."\n");
			$str = "#$numero,$decisao,$codigo,$divisao,$examinador,$indicador1,$indicador2,$indicador3,$indicador4,$indicador5,$indicador6,$soma";
			//echo "$str<BR>";
			fputs($fp,$str."\n");
			$total++;
		}

	
		$media1 = calcularMedia($array_indicador1);
		$desvio_padrao1 = calcularDesvioPadrao($array_indicador1);
		$amostra1 = count($array_indicador1);
		//echo "indicador1: ";print_r($array_indicador1);echo "<BR>";
		$media2 = calcularMedia($array_indicador2);
		$desvio_padrao2 = calcularDesvioPadrao($array_indicador2);
		$amostra2 = count($array_indicador2);
		//echo "indicador2: ";print_r($array_indicador2);echo "<BR>";
		$media3 = calcularMedia($array_indicador3);		
		$desvio_padrao3 = calcularDesvioPadrao($array_indicador3);
		$amostra3 = count($array_indicador3);
		//echo "indicador3: ";print_r($array_indicador3);echo "<BR>";
		$media4 = calcularMedia($array_indicador4);
		$desvio_padrao4 = calcularDesvioPadrao($array_indicador4);
		$amostra4 = count($array_indicador4);
		//echo "indicador4: ";print_r($array_indicador4);echo "<BR>";
		$media5 = calcularMedia($array_indicador5);
		$desvio_padrao5 = calcularDesvioPadrao($array_indicador5);
		$amostra5 = count($array_indicador5);
		//echo "indicador5: ";print_r($array_indicador5);echo "<BR>";
		$media6 = calcularMedia($array_indicador6);
		$desvio_padrao6 = calcularDesvioPadrao($array_indicador6);
		$amostra6 = count($array_indicador6);
		//echo "indicador6: ";print_r($array_indicador6);echo "<BR>";
		$str = "Médias: $media1,$media2,$media3,$media4,$media5,$media6";
		//echo "$str<BR>";
		fputs($fp,$str."\n");
		fclose($fp);

	?>
	
		<h2>Recursos Técnicos 12.2</h2>
		<div class="table-responsive">
		<table class="table table-hover align-middle table-status">

			<thead>
			<tr>
				<th>Intervalos</th>
				<th>Média Tempo (dias)</th>
				<th>desvio Padrão Tempo (dias)</th>
				<th>Amostra</th>
			</tr>
			</thead>

			<tbody>
			<tr>
				<td>Intervalo 1: tempo 12.2 / Carga do examinador</td>
				<td><?php echo $media1;?></td>
				<td><?php echo $desvio_padrao1;?></td>
				<td><?php echo $amostra1;?></td>
			</tr>
			<tr class="table-light">
				<td>Intervalo 2: tempo Carga do examinador / Assinatura do examinador</td>
				<td><?php echo $media2;?></td>
				<td><?php echo $desvio_padrao2;?></td>
				<td><?php echo $amostra2;?></td>
			</tr>
			<tr>
				<td>Intervalo 3: tempo Assinatura do examinador / Assinatura da Coordenação</td>
				<td><?php echo $media3;?></td>
				<td><?php echo $desvio_padrao3;?></td>
				<td><?php echo $amostra3;?></td>
			</tr>
			<tr class="table-light">
				<td>Intervalo 4: tempo Assinatura da Coordenação / Assinatura presidente</td>
				<td><?php echo $media4;?></td>
				<td><?php echo $desvio_padrao4;?></td>
				<td><?php echo $amostra4;?></td>
			</tr>
			<tr>
				<td>Intervalo 5: tempo Assinatura do Presidente / Publicação RPI</td>
				<td><?php echo $media5;?></td>
				<td><?php echo $desvio_padrao5;?></td>
				<td><?php echo $amostra5;?></td>
			</tr>
			</tbody>
			<tr class="table-light">
				<td>Intervalo 6: tempo 12.2 / Publicação RPI</td>
				<td><?php echo $media6;?></td>
				<td><?php echo $desvio_padrao6;?></td>
				<td><?php echo $amostra6;?></td>
			</tr>
		
		</table>
		</div>

		<?php
		} // if $tipo=='Recursos Técnicos 12.2'
		?>
		
		<?php
		
		if ($tipo=='Recursos Administrativos 12.3 / 12.6')
		{
		// 102 Recurso conhecido e provido. Desarquivado o processo para prosseguir o exame
		// 103 Recurso conhecido e provido. Desarquivada a petição
		// 104 Recurso conhecido e provido. Reformada a Decisão recorrida.
		// 112 Recurso conhecido e negado provimento. Mantido o arquivamento do pedido
		// 113 Recurso conhecido e negado provimento. Mantido o arquivamento da petição
		// 115 Recurso conhecido e negado provimento. Mantida a Decisão recorrida
		
		$array_decisao = array ("'recurso 102'","'recurso 103'","'recurso 104'","'recurso 112'","'recurso 113'","'recurso 115'");
		$clausulaWhereSql_decisao = implode(',', $array_decisao);
		
		$array_coordenacao = array ('HELENO JOSÉ COSTA BEZERRA NETTO','ROCKFELLER MACIEL PEÇANHA','ROSANA MARQUES AMORIM','LEILA FREIRE FALCONE','GERSON DA COSTA CORREA');
		$clausulaWhere_coordenacao = [];
		foreach ($array_coordenacao as $nome) {
			$clausulaWhere_coordenacao[] = "nome LIKE '" . $nome . "%'";
		}
		$clausulaWhereSql_coordenacao = implode(' OR ', $clausulaWhere_coordenacao);

		$array_presidencia = array ('JULIO CESAR CASTELO BRANCO REIS MOREIRA','TANIA CRISTINA LOPES RIBEIRO','CLAUDIO VILAR FURTADO');
		$clausulaWhere_presidencia = [];
		foreach ($array_presidencia as $nome) {
			$clausulaWhere_presidencia[] = "nome LIKE '" . $nome . "%'";
		}
		$clausulaWhereSql_presidencia = implode(' OR ', $clausulaWhere_presidencia);
		
		//$cmd = "select * from pedido where (codigo=1849202 or codigo=1849284 or codigo=1849413) and year(rpi)=$ano and month(rpi)=$mes and anulado=0 and decisao in ($clausulaWhereSql_decisao) order by numero,decisao desc";
		$cmd = "select * from pedido where year(rpi)=$ano and month(rpi)=$mes and anulado=0 and decisao in ($clausulaWhereSql_decisao) order by numero,decisao desc";
		$res = mysqli_query($link,$cmd); //echo "$cmd<BR>";
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$instancia = $line['instancia'];
			$decisao = $line['decisao'];
			$divisao = $line['divisao'];
			$data_rpi = $line['rpi'];
			$codigo = $line['codigo'];

			$indicador1 = 'null'; // tempo entre 12.2 e a carga para o examinador
			$indicador2 = 'null'; // tempo da da carga do examinador até assinatura do examinador
			$indicador3 = 'null'; // tempo da assinatura do examinador até assinatura da coordenação
			$indicador4 = 'null'; // tempo da assinatura da coordenação até o presidente (se decisão)
			$indicador5 = 'null'; // tempo da assinatura do presidente até RPI
			$indicador6 = 'null'; // tempo total entre 12.2 e RPI 

			$data_123 = null;
			$data_carga = null;
			$data_examinador = null;
			$data_coordenacao = null;
			$data_presidencia = null;

			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}

			$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and (despacho='12.3' or despacho='12.6') and anulado=0";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
				$data_123 = $line2['data'];		
			
			$cmd2 = "select * from examinador where codigo=$codigo and dono=1";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) 
			{
				$examinador = $line2['email'];
				//$busca_no_historico = " inseriu na carga de $examinador";
				//$cmd2 = "select * from historico where (numero='$numero1' or numero='$numero2') and descricao like '%$busca_no_historico%' order by data asc";
				//$res2 = mysqli_query($link,$cmd2);
				//if ($line2=@mysqli_fetch_assoc($res2) || true) // o histórico não registra a carga no examinador, logo sempre entra neste if
				//{
					// $data_carga = $line2['data'];
					$data_carga = $data_123;
					$indicador1 = calcularDiferencaDias($data_123,$data_carga);
					$array_indicador1[] = $indicador1;
					
					$cmd2 = "select * from servidores where email='$examinador'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) 
					{
						$nome = $line2['nome'];
						$cmd2 = "select * from assinaturas where codigo=$codigo and nome like '%$nome%' and dt_assina>='$data_carga'";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) 
						{
							$data_examinador = $line2['dt_assina'];
							$indicador2 = calcularDiferencaDias($data_carga,$data_examinador);
							$array_indicador2[] = $indicador2;

							$cmd2 = "select * from assinaturas where codigo=$codigo and ($clausulaWhereSql_coordenacao) and dt_assina>='$data_examinador' order by dt_assina asc";
							$res2 = mysqli_query($link,$cmd2);// echo "$cmd2<BR>";
							if ($line2=@mysqli_fetch_assoc($res2)) 
							{
								$data_coordenacao = $line2['dt_assina'];
								$indicador3 = calcularDiferencaDias($data_examinador,$data_coordenacao);
								$array_indicador3[] = $indicador3;
								
								$cmd2 = "select * from assinaturas where codigo=$codigo and ($clausulaWhereSql_presidencia) and dt_assina>='$data_coordenacao' order by dt_assina asc";
								$res2 = mysqli_query($link,$cmd2); //echo "$cmd2<BR>";
								if ($line2=@mysqli_fetch_assoc($res2)) 
								{
									$data_presidencia = $line2['dt_assina'];
									$indicador4 = calcularDiferencaDias($data_coordenacao,$data_presidencia);
									$indicador5 = calcularDiferencaDias($data_presidencia,$data_rpi);
									$array_indicador4[] = $indicador4;
									$array_indicador5[] = $indicador5;
								}
								else
									echo "$numero $codigo $decisao não encontrei assinatura da presidência [$cmd2]<BR>";
							}
							else
								echo "$numero $codigo $decisao não encontrei assinatura da coordenação [$cmd2]<BR>";
						}
						else
							echo "$numero $codigo $decisao não encontrei assinatura $examinador [$cmd2]<BR>";
					}
					else
						echo "$numero $codigo $decisao não encontrei examinador $examinador [$cmd2]<BR>";
				//}
				//else
				//	echo "$numero $codigo $decisao não encontrei a carga no histórico de $examinador [$cmd2]<BR>";
			}
			else
				echo "$numero $codigo $decisao não encontrei examinador [$cmd2]<BR>";
			
			$indicador6 = calcularDiferencaDias($data_123,$data_rpi);
			$array_indicador6[] = $indicador6;
			$soma = $indicador1 + $indicador2 + $indicador3 + $indicador4 + $indicador5;
			$str = "$numero,$decisao,$codigo,$divisao,$examinador,$data_123,$data_carga,$data_examinador,$data_coordenacao,$data_presidencia,$data_rpi";
			//echo "$str<BR>";
			fputs($fp,$str."\n");
			$str = "#$numero,$examinador,$indicador1,$indicador2,$indicador3,$indicador4,$indicador5,$indicador6,$soma";
			//echo "$str<BR>";
			fputs($fp,$str."\n");
			$total++;
		}

	
		$media1 = calcularMedia($array_indicador1);
		$desvio_padrao1 = calcularDesvioPadrao($array_indicador1);
		$amostra1 = count($array_indicador1);
		$media2 = calcularMedia($array_indicador2);
		$desvio_padrao2 = calcularDesvioPadrao($array_indicador2);
		$amostra2 = count($array_indicador2);
		$media3 = calcularMedia($array_indicador3);
		$desvio_padrao3 = calcularDesvioPadrao($array_indicador3);
		$amostra3 = count($array_indicador3);
		$media4 = calcularMedia($array_indicador4);
		$desvio_padrao4 = calcularDesvioPadrao($array_indicador4);
		$amostra4 = count($array_indicador4);
		$media5 = calcularMedia($array_indicador5);
		$desvio_padrao5 = calcularDesvioPadrao($array_indicador5);
		$amostra5 = count($array_indicador5);
		$media6 = calcularMedia($array_indicador6);
		$desvio_padrao6 = calcularDesvioPadrao($array_indicador6);
		$amostra6 = count($array_indicador6);
		fclose($fp);

	?>
	
		<h2>Recursos Administrativos 12.3/12.6</h2>
		<div class="table-responsive">
		<table class="table table-hover align-middle table-status">

			<thead>
			<tr>
				<th>Intervalos</th>
				<th>Média Tempo (dias)</th>
				<th>desvio Padrão Tempo (dias)</th>
				<th>Amostra</th>
			</tr>
			</thead>

			<tbody>
			<tr>
				<td>Intervalo 1: tempo 12.3/12.6 / Carga do examinador</td>
				<td><?php echo $media1;?></td>
				<td><?php echo $desvio_padrao1;?></td>
				<td><?php echo $amostra1;?></td>
			</tr>
			<tr class="table-light">
				<td>Intervalo 2: tempo Carga do examinador / Assinatura do examinador</td>
				<td><?php echo $media2;?></td>
				<td><?php echo $desvio_padrao2;?></td>
				<td><?php echo $amostra2;?></td>
			</tr>
			<tr>
				<td>Intervalo 3: tempo Assinatura do examinador / Assinatura da Coordenação</td>
				<td><?php echo $media3;?></td>
				<td><?php echo $desvio_padrao3;?></td>
				<td><?php echo $amostra3;?></td>
			</tr>
			<tr class="table-light">
				<td>Intervalo 4: tempo Assinatura da Coordenação / Assinatura presidente</td>
				<td><?php echo $media4;?></td>
				<td><?php echo $desvio_padrao4;?></td>
				<td><?php echo $amostra4;?></td>
			</tr>
			<tr>
				<td>Intervalo 5: tempo Assinatura do Presidente / Publicação RPI</td>
				<td><?php echo $media5;?></td>
				<td><?php echo $desvio_padrao5;?></td>
				<td><?php echo $amostra5;?></td>
			</tr>
			</tbody>
			<tr class="table-light">
				<td>Intervalo 6: tempo 12.3/12.6 / Publicação RPI</td>
				<td><?php echo $media6;?></td>
				<td><?php echo $desvio_padrao6;?></td>
				<td><?php echo $amostra6;?></td>
			</tr>
		
		</table>
		</div>

		<?php
		} // if $tipo=='Recursos Administrativos 12.3 / 12.6'
		?>

		<?php
		
		if ($tipo=='Nulidades')
		{
		// 200 nulidade provida, 201 nulidade negada, 204 nulidade parcial, 205 intimação para titular
		$array_decisao = array ('nulidade 200','nulidade 201','nulidade 204','nulidade 205');
		$array_decisao = array ("'nulidade provida'","'nulidade negada'","'nulidade parcial'","'nulidade 1'");
		$clausulaWhereSql_decisao = implode(',', $array_decisao);
		
		$array_coordenacao = array ('HELENO JOSÉ COSTA BEZERRA NETTO','ROCKFELLER MACIEL PEÇANHA','ROSANA MARQUES AMORIM','LEILA FREIRE FALCONE','GERSON DA COSTA CORREA');
		$clausulaWhere_coordenacao = [];
		foreach ($array_coordenacao as $nome) {
			$clausulaWhere_coordenacao[] = "nome LIKE '" . $nome . "%'";
		}
		$clausulaWhereSql_coordenacao = implode(' OR ', $clausulaWhere_coordenacao);

		$array_presidencia = array ('JULIO CESAR CASTELO BRANCO REIS MOREIRA','TANIA CRISTINA LOPES RIBEIRO','CLAUDIO VILAR FURTADO');
		$clausulaWhere_presidencia = [];
		foreach ($array_presidencia as $nome) {
			$clausulaWhere_presidencia[] = "nome LIKE '" . $nome . "%'";
		}
		$clausulaWhereSql_presidencia = implode(' OR ', $clausulaWhere_presidencia);
		
		//$cmd = "select * from pedido where (codigo=1849202 or codigo=1849284 or codigo=1849413) and year(rpi)=$ano and month(rpi)=$mes and anulado=0 and decisao in ($clausulaWhereSql_decisao) order by numero,decisao desc";
		$cmd = "select * from pedido where year(rpi)=$ano and month(rpi)=$mes and anulado=0 and decisao in ($clausulaWhereSql_decisao) order by numero,decisao desc";
		$res = mysqli_query($link,$cmd); //echo "$cmd<BR>";
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$instancia = $line['instancia'];
			$decisao = $line['decisao'];
			$divisao = $line['divisao'];
			$data_rpi = $line['rpi'];
			$codigo = $line['codigo'];

			$indicador1 = 'null'; // tempo entre 17.1 e a carga para o examinador
			$indicador2 = 'null'; // tempo da carga do examinador até assinatura do examinador
			$indicador3 = 'null'; // tempo da assinatura do examinador até assinatura da coordenação
			$indicador4 = 'null'; // tempo da assinatura da coordenação até o presidente (se decisão)
			$indicador5 = 'null'; // tempo da assinatura do presidente até RPI
			$indicador6 = 'null'; // tempo total entre 17.1 e RPI 

			$data_171 = null;
			$data_carga = null;
			$data_examinador = null;
			$data_coordenacao = null;
			$data_presidencia = null;

			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}

			$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='17.1' and anulado=0";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
				$data_171 = $line2['data'];		
			
			$cmd2 = "select * from examinador where codigo=$codigo and dono=1";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) 
			{
				$examinador = $line2['email'];
				$busca_no_historico = " inseriu na carga de $examinador";
				$cmd2 = "select * from historico where (numero='$numero1' or numero='$numero2') and descricao like '%$busca_no_historico%' order by data desc";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$data_carga = $line2['data'];
					$indicador1 = calcularDiferencaDias($data_171,$data_carga);
					$array_indicador1[] = $indicador1;
					
					$cmd2 = "select * from servidores where email='$examinador'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) 
					{
						$nome = $line2['nome'];
						$cmd2 = "select * from assinaturas where codigo=$codigo and nome like '%$nome%'";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) 
						{
							$data_examinador = $line2['dt_assina'];
							$indicador2 = calcularDiferencaDias($data_carga,$data_examinador);
							$array_indicador2[] = $indicador2;

							$cmd2 = "select * from assinaturas where codigo=$codigo and ($clausulaWhereSql_coordenacao) and dt_assina>='$data_examinador' order by dt_assina asc";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2)) 
							{
								$data_coordenacao = $line2['dt_assina'];
								$indicador3 = calcularDiferencaDias($data_examinador,$data_coordenacao);
								$array_indicador3[] = $indicador3;
								
								// o parecer do presidente é assinado em um outro parecer
								$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('nulidade 200', 'nulidade 201', 'nulidade 204') and rpi='$data_rpi'";
								$res2 = mysqli_query($link,$cmd2);
								if ($line2=@mysqli_fetch_assoc($res2)) 
								{
									$codigo = $line2['codigo'];
									$cmd2 = "select * from assinaturas where codigo=$codigo and ($clausulaWhereSql_presidencia) and dt_assina>='$data_coordenacao' order by dt_assina asc";
									$res2 = mysqli_query($link,$cmd2);
									if ($line2=@mysqli_fetch_assoc($res2)) 
									{
										$data_presidencia = $line2['dt_assina'];
										$indicador4 = calcularDiferencaDias($data_coordenacao,$data_presidencia);
										$indicador5 = calcularDiferencaDias($data_presidencia,$data_rpi);
										$array_indicador4[] = $indicador4;
										$array_indicador5[] = $indicador5;
									}
									else
										echo "$numero $codigo $decisao não encontrei assinatura da presidência [$cmd2]<BR>";
								}
							}
							else
								echo "$numero $codigo $decisao não encontrei assinatura da coordenação [$cmd2]<BR>";
						}
						else
							echo "$numero $codigo $decisao não encontrei assinatura $examinador [$cmd2]<BR>";
					}
					else
						echo "$numero $codigo $decisao não encontrei examinador $examinador [$cmd2]<BR>";
				}
				else
					echo "$numero $codigo $decisao não encontrei a carga no histórico de $examinador [$cmd2]<BR>";
			}
			else
				echo "$numero $codigo $decisao não encontrei examinador [$cmd2]<BR>";
			
			$indicador6 = calcularDiferencaDias($data_171,$data_rpi);
			$array_indicador6[] = $indicador6;
			$soma = $indicador1 + $indicador2 + $indicador3 + $indicador4 + $indicador5;
			
			$divisao = '';
			$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('deferimento','defanvisa') and rpi is not null";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) $divisao = $line2['divisao'];

			$str = "$numero,$decisao,$codigo,$divisao,$examinador,$data_171,$data_carga,$data_examinador,$data_coordenacao,$data_presidencia,$data_rpi";
			//echo "$str<BR>";
			fputs($fp,$str."\n");
			$str = "#$numero,$examinador,$indicador1,$indicador2,$indicador3,$indicador4,$indicador5,$indicador6,$soma";
			//echo "$str<BR>";
			fputs($fp,$str."\n");
			$total++;
		}

	
		$media1 = calcularMedia($array_indicador1);
		$desvio_padrao1 = calcularDesvioPadrao($array_indicador1);
		$amostra1 = count($array_indicador1);
		$media2 = calcularMedia($array_indicador2);
		$desvio_padrao2 = calcularDesvioPadrao($array_indicador2);
		$amostra2 = count($array_indicador2);
		$media3 = calcularMedia($array_indicador3);
		$desvio_padrao3 = calcularDesvioPadrao($array_indicador3);
		$amostra3 = count($array_indicador3);
		$media4 = calcularMedia($array_indicador4);
		$desvio_padrao4 = calcularDesvioPadrao($array_indicador4);
		$amostra4 = count($array_indicador4);
		$media5 = calcularMedia($array_indicador5);
		$desvio_padrao5 = calcularDesvioPadrao($array_indicador5);
		$amostra5 = count($array_indicador5);
		$media6 = calcularMedia($array_indicador6);
		$desvio_padrao6 = calcularDesvioPadrao($array_indicador6);
		$amostra6 = count($array_indicador6);
		fclose($fp);

	?>
	
		<h2>Nulidades</h2>
		<div class="table-responsive">
		<table class="table table-hover align-middle table-status">

			<thead>
			<tr>
				<th>Intervalos</th>
				<th>Média Tempo (dias)</th>
				<th>desvio Padrão Tempo (dias)</th>
				<th>Amostra</th>
			</tr>
			</thead>

			<tbody>
			<tr>
				<td>Intervalo 1: tempo 17.1 / Carga do examinador</td>
				<td><?php echo $media1;?></td>
				<td><?php echo $desvio_padrao1;?></td>
				<td><?php echo $amostra1;?></td>
			</tr>
			<tr class="table-light">
				<td>Intervalo 2: tempo Carga do examinador / Assinatura do examinador</td>
				<td><?php echo $media2;?></td>
				<td><?php echo $desvio_padrao2;?></td>
				<td><?php echo $amostra2;?></td>
			</tr>
			<tr>
				<td>Intervalo 3: tempo Assinatura do examinador / Assinatura da Coordenação</td>
				<td><?php echo $media3;?></td>
				<td><?php echo $desvio_padrao3;?></td>
				<td><?php echo $amostra3;?></td>
			</tr>
			<tr class="table-light">
				<td>Intervalo 4: tempo Assinatura da Coordenação / Assinatura presidente</td>
				<td><?php echo $media4;?></td>
				<td><?php echo $desvio_padrao4;?></td>
				<td><?php echo $amostra4;?></td>
			</tr>
			<tr>
				<td>Intervalo 5: tempo Assinatura do Presidente / Publicação RPI</td>
				<td><?php echo $media5;?></td>
				<td><?php echo $desvio_padrao5;?></td>
				<td><?php echo $amostra5;?></td>
			</tr>
			</tbody>
			<tr class="table-light">
				<td>Intervalo 6: tempo 17.1 / Publicação RPI</td>
				<td><?php echo $media6;?></td>
				<td><?php echo $desvio_padrao6;?></td>
				<td><?php echo $amostra6;?></td>
			</tr>
		
		</table>
		</div>

		<?php
		} // if $tipo=='Nulidades'
		?>

		<a href="<?php echo "data/ptime.csv";?>" target="_blank">
		  <h1><span class="fas fa-file fa-1x text-white-80"></span>&nbsp;&nbsp;<?php echo $total; ?> registros encontrados. </h1>
		</a>
		<BR><BR>
		
	</body>

</html>