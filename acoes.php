<?php
	session_start();
	$user = @$_SESSION['user'];
	if (!(isset($_SESSION['user']) and ($user<>''))){
		header("Location: index.php");
		exit;
	}
	
	require("../../conf_plos.php");
	require("../conf_utils.php");
	
	/*
	SELECT p.*, e.*
	FROM CEPIT_SISCAP.SISCAP_PEDIDO p
	INNER JOIN CEPIT_SISCAP.SISCAP_EXAMINADOR e 
		ON p.codigo = e.codigo
	WHERE p.instancia = 'acao judicial'
	AND e.email = 'rockrio'
	AND extract (year from e.data)=2023
*/
	function removerLetras($processo) {
		return preg_replace('/[a-zA-Z]/', '', $processo);
	}
?>

<!doctype html>
<HTML><HEAD><TITLE>Cientistas Patentes</TITLE>

    <title>Ações judiciais da CGREC / Justiça</title>
	
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

	<script>
		function atualizarCampoData() {
			let tipoData = document.querySelector('input[name="tipo_data"]:checked').value;
			document.getElementById("labelData").innerText = tipoData === "publicacao" ? "Dados organizados por Data de Publicação:" : "Dados organizados por Data de Produção no SISCAP:";
			document.getElementById("postDivisao").submit();
		}
	</script>

</HEAD>

<BODY>

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
	
	<center>
		

<?php

	if (empty($_REQUEST["ordem"])) {$ordem='datain desc';} else {$ordem=$_REQUEST["ordem"];}    
	if (empty($_REQUEST["op"])) {$op=1;} else {$op=$_REQUEST["op"];}    
	if (empty($_REQUEST["id"])) {$id=1;} else {$id=$_REQUEST["id"];}
	if (empty($_REQUEST["tipo"])) {$tipo='todos';} else {$tipo=$_REQUEST["tipo"];}
	if (empty($_REQUEST["obs"])) {$obs='';} else {$obs=$_REQUEST["obs"];}
	if (empty($_REQUEST["datain"])) {$datain='';} else {$datain=$_REQUEST["datain"];}
	if (empty($_REQUEST["examinador"])) {$examinador='';} else {$examinador=$_REQUEST["examinador"];}
	if (empty($_REQUEST["dataout"])) {$dataout='';} else {$dataout=$_REQUEST["dataout"];}
	if (empty($_REQUEST["rpi"])) {$rpi=0;} else {$rpi=$_REQUEST["rpi"];}
 	if (empty($_REQUEST["pesquisar"])) {$pesquisar='';} else {$pesquisar=$_REQUEST["pesquisar"];}
	if (empty($_REQUEST["tipo_data"])) {$tipo_data='cgrec';} else {$tipo_data=$_REQUEST["tipo_data"];}

	// echo $tipo_data;
	$dirpa_checked = 'checked';
	$mensagem = "Ações DIRPA";
	if ($tipo_data=='dirpa') 
	{
		$dirpa_checked = 'checked';
		$mensagem = "AÇÕES DIRPA";
	}
	$cgrec_checked = '';
	if ($tipo_data=='cgrec') 
	{
		$cgrec_checked = 'checked';
		$mensagem = "Ações CGREC";
	}

	if ($op==12)
	{
		$total=0;
		$cmd = "SELECT * FROM `acoes` WHERE cgrec=1 and data_decisao is not null and id_justica=0;";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$id = $line['id'];
			$numero = $line['numero'];
			$processo = $line['processo'];
			$data_decisao = $line['data_decisao'];
			$kdata_decisao=strtotime($data_decisao);
			$cmd2 = "select * from justica where documento like '%$processo%'"; // na tabela justica aparece assim: APELAÇÃO CÍVEL Nº 0210143-02.2017.4.02.5101/RJ
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) 
			{
				$id_justica = $line2['id'];
				$data_justica=$line2['data'];  // data da decisão judicial que deve ser sempre antes da data que o INPI publicou o 19.1/15.14 
				$kdata_justica=strtotime($data_justica);
				$dias = abs(round(($kdata_decisao-$kdata_justica)/60/60/24,0));
				//echo "$numero $processo $data_decisao $data_justica ($dias)<BR>";
				if ($kdata_decisao>$kdata_justica and $dias<180)
				{
					$cmd2 = "update acoes set id_justica=$id_justica where id=$id";
					echo "$cmd2;<BR>";
					$total++;
				}
			}
		}
		echo "Fim de processamento ($total)";
		exit();
		
	}

	if ($op==11)
	{
		echo "Verificando data_notifica na tabela acoes<BR>";

		echo "Etapa 1: Verificando inconsistência de datain e data_notifica<BR>";
		$cmd = "SELECT * FROM `acoes` WHERE cgrec=1 and data_notifica is not null and datain is null;";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$id = $line['id'];
			$numero = $line['numero'];
			$examinador = $line['examinador'];
			$data_notifica = $line['data_notifica'];
			echo "tem data_notifica mas não tem datain ! $numero $examinador $data_notifica<BR>";
		}

		echo "Etapa 2: Verificando inconsistência de datain e data_notifica<BR>";
		$cmd = "SELECT * FROM `acoes` WHERE cgrec=1 and data_notifica is not null and datain is not null;";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$id = $line['id'];
			$numero = $line['numero'];
			$examinador = $line['examinador'];
			$datain = $line['datain'];
			$kdatain=strtotime($datain);
			$data_notifica = $line['data_notifica'];
			$kdata_notifica=strtotime($data_notifica);
			$dias = abs(round(($kdata_notifica-$kdatain)/60/60/24,0));
			if ($kdatain<$kdata_notifica and $dias>30)
			{
				$cmd2="update acoes set data_notifica=null where id=$id";
				echo "$cmd2;<BR>";
				echo "$numero $datain $data_notifica<BR>";
			}
		}

		echo "Etapa 3: Verifica se data_decisao está sempre depois de data_notifica<BR>";
		$cmd = "SELECT * FROM `acoes` WHERE cgrec=1 and data_notifica is not null and data_decisao is not null;";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$id = $line['id'];
			$numero = $line['numero'];
			$examinador = $line['examinador'];
			$data_decisao = $line['data_decisao'];
			$kdata_decisao=strtotime($data_decisao);
			$data_notifica = $line['data_notifica'];
			$kdata_notifica=strtotime($data_notifica);
			if ($data_decisao < $data_notifica)
			{
				echo "$id $numero $data_notifica $data_decisao <BR>";
			}
		}

		echo "Etapa 4: Leia o despacho 15.23, 22.15 da RPI e confira o sei e processo que consta do despacho<BR>";
		$cmd = "SELECT * FROM `acoes` WHERE cgrec=1 and data_notifica is not null;";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$id = $line['id'];
			$numero = $line['numero'];
			$data_notifica = $line['data_notifica'];
			$sei_tabela = $line['sei'];
			$processo_tabela = $line['processo'];
			
			$cmd2 = "SELECT * FROM rpis_lidas where data='$data_notifica'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) 
			{
				$rpi = $line2['rpi'];

				$total=0;
				$fname="../central/revistas/P$rpi.txt";
				@ $fp = fopen($fname,"r");
				if (!$fp)
				{
					$fname="../central/revistas/P$rpi.TXT";
					@ $fp = fopen($fname,"r");
				}
					
				if (!$fp)
				{
					echo "Não foi identificado o arquivo texto $fname<BR>";
				}
				else
				{
					$texto='';
					$numero_lido = '';
					$ler_numero = 0;
					$ler_comentario = 0;
					//echo "Iniciando leitura da revista $rpi<BR>";
					while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
					{
						$texto= trim(fgets($fp)); 
						if ($texto=='') continue;
						if (strcmp(substr($texto,0,10),'(Cd) 15.23')==0 or strcmp(substr($texto,0,10),'(Cd) 22.15')==0)
						{
							$ler_numero = 1;
							$ler_comentario = 0;
						}
						if ($ler_numero==1 and (strcmp(substr($texto,0,4),'(21)')==0 or strcmp(substr($texto,0,4),'(11)')==0))	
						{	
							$numero_lido = trim(substr($texto,4));
							$pos = strpos($numero_lido,'-');
							$numero_lido = substr($numero_lido,0,$pos);
							$numero_lido = trim(str_replace(" ","",$numero_lido)); // PI 9916155-9 B1
							$numero_lido = trim(str_replace("BR","",$numero_lido));
							$ler_numero = 0;
							$ler_comentario = 1;
						}
						if ($ler_comentario==1 and strcmp(substr($texto,0,4),'(co)')==0)	
						{	
							// todo número sei começa com 52402. ou 52400.
							// SELECT * FROM `acoes` WHERE sei not like '52402.%' and sei not like '52400.%'
							
							$comentario = trim(substr($texto,4));
							$comentario = trim(str_replace("'","",$comentario));
							$comentario = trim(str_replace('"',"",$comentario));
							$comentario_utf8 = utf8_encode($comentario);
							$pos = strpos($comentario,'52400.');
							if ($pos==false) $pos = strpos($comentario,'52402.'); // 52402.004518/2022-15
							if ($pos!=false)
							{
								$pos_hifen = strpos($comentario,'-',$pos);
								if ($pos_hifen!=false)
								{
									$sei = trim(substr($comentario,$pos,$pos_hifen-$pos+3));
									// o número do processo obedece a seguinte máscara: 5001181-31.2021.4.03.6131
									// https://www.devmedia.com.br/expressoes-regulares-em-php/25076
									$processo = trim(str_replace(' ','',$comentario));
									$mascara = "/[0-9]{7}-[0-9]{2}\.[0-9]{4}\.[0-9]{1}\.[0-9]{2}\.[0-9]{4}/";
									preg_match_all($mascara,$processo,$matches);
									//var_dump($matches);
									$processo = $matches[0][0];
									//echo "<BR>$processo<BR>$numero_lido<BR>$sei<BR><BR>$comentario<BR>";
									$cmd = "SELECT * FROM acoes where numero='$numero_lido' and sei='$sei' and processo='$processo'";
									$res = mysqli_query($link,$cmd);
									if (!($line=@mysqli_fetch_assoc($res)))
									{
										if ($numero==$numero_lido)
											echo "$cmd<BR>Em $numero ($data_notifica) Tabela acoes e [RPI $rpi] tem sei=$sei_tabela [$sei] e processo=$processo_tabela [$processo]<BR>";
									}
									$ler_comentario = 0;
								}
							}
						}
					}
				}
			}
			
			echo "Fim de processamento: ";
		}

		echo "Etapa 5: Leia o despacho 19.1/15.14 da RPI e confira o sei e processo que consta do despacho<BR>";
		$cmd = "SELECT * FROM `acoes` WHERE cgrec=1 and data_decisao is not null;";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$id = $line['id'];
			$numero = $line['numero'];
			$data_decisao = $line['data_decisao'];
			$sei_tabela = $line['sei'];
			$processo_tabela = $line['processo'];
			
			$cmd2 = "SELECT * FROM rpis_lidas where data='$data_decisao'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) 
			{
				$rpi = $line2['rpi'];
				echo "estou procurando $numero $rpi<BR>";

				$total=0;
				$fname="../central/revistas/P$rpi.txt";
				@ $fp = fopen($fname,"r");
				if (!$fp)
				{
					$fname="../central/revistas/P$rpi.TXT";
					@ $fp = fopen($fname,"r");
				}
					
				if (!$fp)
				{
					echo "Não foi identificado o arquivo texto $fname<BR>";
				}
				else
				{
					$texto='';
					$numero_lido = '';
					$ler_numero = 0;
					$ler_comentario = 0;
					//echo "Iniciando leitura da revista $rpi<BR>";
					while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
					{
						$texto= trim(fgets($fp)); 
						if ($texto=='') continue;
						if (strcmp(substr($texto,0,10),'(Cd) 15.14')==0 or strcmp(substr($texto,0,10),'(Cd) 19.1')==0)
						{
							$ler_numero = 1;
							$ler_comentario = 0;
						}
						if ($ler_numero==1 and (strcmp(substr($texto,0,4),'(21)')==0 or strcmp(substr($texto,0,4),'(11)')==0))	
						{	
							$numero_lido = trim(substr($texto,4));
							$pos = strpos($numero_lido,'-');
							$numero_lido = substr($numero_lido,0,$pos);
							$numero_lido = trim(str_replace(" ","",$numero_lido)); // PI 9916155-9 B1
							$numero_lido = trim(str_replace("BR","",$numero_lido));
							$ler_numero = 0;
							$ler_comentario = 1;
						}
						if ($ler_comentario==1 and strcmp(substr($texto,0,4),'(co)')==0)	
						{	
							// todo número sei começa com 52402. ou 52400.
							// SELECT * FROM `acoes` WHERE sei not like '52402.%' and sei not like '52400.%'
							
							$comentario = trim(substr($texto,4));
							$comentario = trim(str_replace("'","",$comentario));
							$comentario = trim(str_replace('"',"",$comentario));
							$comentario_utf8 = utf8_encode($comentario);
							if ($numero==$numero_lido)
							{
								echo "$numero_lido $comentario<BR>";
								$pos = strpos($comentario,'52400.');
								if ($pos==false) $pos = strpos($comentario,'52402.'); // 52402.004518/2022-15
								if ($pos!=false)
								{
									$pos_hifen = strpos($comentario,'-',$pos);
									if ($pos_hifen!=false)
									{
										$sei = trim(substr($comentario,$pos,$pos_hifen-$pos+3));
										// o número do processo obedece a seguinte máscara: 5001181-31.2021.4.03.6131
										// https://www.devmedia.com.br/expressoes-regulares-em-php/25076
										$processo = trim(str_replace(' ','',$comentario));
										$mascara = "/[0-9]{7}-[0-9]{2}\.[0-9]{4}\.[0-9]{1}\.[0-9]{2}\.[0-9]{4}/";
										preg_match_all($mascara,$processo,$matches);
										//var_dump($matches);
										$processo = $matches[0][0];
										//echo "<BR>$processo<BR>$numero_lido<BR>$sei<BR><BR>$comentario<BR>";
										$cmd2 = "SELECT * FROM acoes where numero='$numero_lido' and sei='$sei' and processo='$processo' and data_decisao='$data_decisao'";
										$res2 = mysqli_query($link,$cmd2); // echo "$cmd2<BR>";
										if ($line2=@mysqli_fetch_assoc($res2))
											echo "# Procurei $numero ($data_decisao) na Tabela acoes e [RPI $rpi] e confere sei=$sei_tabela [$sei] e processo=$processo_tabela [$processo]<BR>";
										else
											echo "* Procurei $numero ($data_decisao) Tabela acoes e [RPI $rpi] mas está diferente: sei na planilha Heleno=$sei_tabela [na RPI: $sei] e processo na planilha Heleno =$processo_tabela [na RPI: $processo]<BR>";
											
										$ler_comentario = 0;
									}
								}
							}
						}
					}
				}
			}
		}

		echo "<BR><BR>Etapa 6: Leia a tabela acoes quem tem data_notifica mas ainda nao tem data_decisao e verifica na RPIP o despacho 19.1/15.14<BR>";
		$cmd = "SELECT * FROM `acoes` WHERE cgrec=1 and data_notifica is not null and data_decisao is null;";
		$res = mysqli_query($link,$cmd);
		$total=0;
		while ($line=@mysqli_fetch_assoc($res))
		{
			$id = $line['id'];
			$numero = $line['numero'];
			$data_notifica = $line['data_notifica'];
			$cmd2 = "select * from arquivados where numero='$numero' and despacho in ('15.24','19.1') and anulado=0 and data>'$data_notifica'";
			$res2 = mysqli_query($link,$cmd2);
			while ($line2=@mysqli_fetch_assoc($res2))
			{
				$data_decisao = $line2['data'];
				echo "verifique $numero decisao=$data_decisao<BR>";
				$total++;
			}
		}
		echo "Fim de processamento ($total)<BR>";
		exit();
	}
	
	if ($op==10)
	{
		echo "Identificando pareceres no siscap....<BR>";

		$cmd = "select * from acoes where cgrec=1 and datain is not null and codigo=0";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$id = $line['id'];
			$numero = $line['numero'];
			$examinador = $line['examinador'];
			$datain = $line['datain'];
			$nomes = explode(', ', $examinador);
			foreach ($nomes as $nome)
			{
				$cmd2 = "select * from pedido as p, examinador as e where p.codigo=e.codigo and e.dono=1 and p.instancia='acao judicial' and e.email='$nome' and p.numero='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				while ($line2=@mysqli_fetch_assoc($res2))
				{
					$icodigo = $line2['codigo'];
					$idivisao = $line2['divisao'];
					$idata = $line2['data'];
					$kdata=strtotime($idata);
					$kdatain=strtotime($datain);
					echo "* $numero $datain $idata <BR>";
					if ($kdata>$kdatain)
					{
						$dias = round(($kdata-$kdatain)/60/60/24,0);
						if ($dias<15) // https://siscap.inpi.gov.br/adm/pareceres/dicel/1120130055581360866.txt
						{
							echo "<a href='https://siscap.inpi.gov.br/adm/pareceres/$idivisao/$numero$icodigo.pdf' target='_blank'>parecer identificado $numero $examinador $datain</a><BR>";
							$cmd2 = "update acoes set codigo=$icodigo,divisao='$idivisao' where id=$id";
							$res2 = mysqli_query($link,$cmd2);
							//echo "$cmd2;<BR>";
						}
					}
				}
			}
		}

		echo "Confere 15.23 e 22.15....<BR>";
				
		exit();
	}
	
	if ($op==8 or $op==9)
	{
		
		$total = 0;
		echo "fazendo leitura do arquivos acoes.csv obtido a partir de açoes.xls preenchido manualmente<BR><BR>";
		$fname = 'acoes.csv';
		@ $fp = fopen($fname,"r");
		if (!$fp)
			echo "Não foi identificado o arquivo texto $fname<BR><BR>";
		else
		{
			while (!feof($fp))
			{
				$texto= fgets($fp);
				$texto = trim($texto); 
				$total++;
				// 3;52402.006650/2018-77;50139315220184047001;MU8102008-2;abrantes;08/02/2019;18/02/2019;Manifestação laudo pericial
				//$texto = '4;52402.001261/2025-84;1050861-50.2024.4.01.3400;BR112012011726-5;liraml;04/02/2025;03/03/2025;Inicial';
				list($id,$sei,$processo,$numero,$examinador,$datain,$dataout,$tipo) = explode(';',$texto);
				$texto = trim($tipo);
				$tipo = '';
				if (strpos($texto, "Audiência") !== false) {
					$tipo = 'AD';
					$texto = str_replace("Audiência", "", $texto);
				}
				if (strpos($texto, "audiencia") !== false) {
					$tipo = 'AD';
					$texto = str_replace("audiencia", "", $texto);
				}
				if (strpos($texto, "Cumprimento de Sentença") !== false) {
					$tipo = 'CD';
					$texto = str_replace("Cumprimento de Sentença", "", $texto);
				}
				if (strpos($texto, "Cumrpimento de Sentença") !== false) {
					$tipo = 'CD';
					$texto = str_replace("Cumrpimento de Sentença", "", $texto);
				}
				if (strpos($texto, "Cumprimento de Decisão Judicial") !== false) {
					$tipo = 'CD';
					$texto = str_replace("Cumprimento de Decisão Judicial", "", $texto);
				}
				if (strpos($texto, "Ciência") !== false) {
					$tipo = 'CIE';
					$texto = str_replace("Ciência", "", $texto);
				}
				if (strpos($texto, "Designação de perito") !== false) {
					$tipo = 'DP';
					$texto = str_replace("Designação de perito", "", $texto);
				}
				if (strpos($texto, "Nomeação de perito") !== false) {
					$tipo = 'DP';
					$texto = str_replace("Nomeação de perito", "", $texto);
				}
				if (strpos($texto, "Nomeação perito") !== false) {
					$tipo = 'DP';
					$texto = str_replace("Nomeação perito", "", $texto);
				}
				if (strpos($texto, "Perit") !== false) {
					$tipo = 'DP';
					$texto = str_replace("Perit", "", $texto);
				}
				if (strpos($texto, "Encaminhar para DIRPA") !== false) {
					$tipo = 'ED';
					$texto = str_replace("Encaminhar para DIRPA", "", $texto);
				}
				if (strpos($texto, "Encaminhar para Dirpa") !== false) {
					$tipo = 'ED';
					$texto = str_replace("Encaminhar para Dirpa", "", $texto);
				}
				if (strpos($texto, "Esclarecimentos") !== false) {
					$tipo = 'ES';
					$texto = str_replace("Esclarecimentos", "", $texto);
				}
				if (strpos($texto, "Honorários periciais") !== false) {
					$tipo = 'HP';
					$texto = str_replace("Honorários periciais", "", $texto);
				}
				if (strpos($texto, "Honorário perìcia") !== false) {
					$tipo = 'HP';
					$texto = str_replace("Honorário perìcia", "", $texto);
				}
				if (strpos($texto, "Honorários periciais") !== false) {
					$tipo = 'HP';
					$texto = str_replace("Honorários periciais", "", $texto);
				}
				if (strpos($texto, "Honorários perito") !== false) {
					$tipo = 'HP';
					$texto = str_replace("Honorários perito", "", $texto);
				}
				if (strpos($texto, "Inicial") !== false) {
					$tipo = 'I';
					$texto = str_replace("Inicial", "", $texto);
				}
				if (strpos($texto, "Inicia") !== false) {
					$tipo = 'I';
					$texto = str_replace("Inicia", "", $texto);
				}
				if (strpos($texto, "Subsídio técnico em relação aos docs novos") !== false) {
					$tipo = 'I2';
					$texto = str_replace("Subsídio técnico em relação aos docs novos", "", $texto);
				}
				if (strpos($texto, "Laudo Suplementar") !== false) {
					$tipo = 'LS';
					$texto = str_replace("Laudo Suplementar", "", $texto);
				}
				if (strpos($texto, "Manifestar sobre o laudo pericial") !== false) {
					$tipo = 'LP';
					$texto = str_replace("Manifestar sobre o laudo pericial", "", $texto);
				}
				if (strpos($texto, "Manifestação sobre Laudo Pericial") !== false) {
					$tipo = 'LP';
					$texto = str_replace("Manifestação sobre Laudo Pericial", "", $texto);
				}
				if (strpos($texto, "Manifestar sobre laudo") !== false) {
					$tipo = 'LP';
					$texto = str_replace("Manifestar sobre laudo", "", $texto);
				}
				if (strpos($texto, "Laudo Pericial") !== false) {
					$tipo = 'LP';
					$texto = str_replace("Laudo Pericial", "", $texto);
				}
				if (strpos($texto, "Laudo pericial") !== false) {
					$tipo = 'LP';
					$texto = str_replace("Laudo pericial", "", $texto);
				}
				if (strpos($texto, "laudo pericial") !== false) {
					$tipo = 'LP';
					$texto = str_replace("laudo pericial", "", $texto);
				}
				if (strpos($texto, "Avaliação Laudo") !== false) {
					$tipo = 'LP';
					$texto = str_replace("Avaliação Laudo", "", $texto);
				}
				if (strpos($texto, "Manifestação sobre Laudo Complementar") !== false) {
					$tipo = 'LS';
					$texto = str_replace("Manifestação sobre Laudo Complementar", "", $texto);
				}
				if (strpos($texto, "Laudo complementar") !== false) {
					$tipo = 'LS';
					$texto = str_replace("Laudo complementar", "", $texto);
				}
				if (strpos($texto, "Manifestação Suplementar") !== false) {
					$tipo = 'MSL';
					$texto = str_replace("Manifestação Suplementar", "", $texto);
				}
				if (strpos($texto, "Análise Laudo Complementar") !== false) {
					$tipo = 'MSL';
					$texto = str_replace("Análise Laudo Complementar", "", $texto);
				}
				if (strpos($texto, "Manifestação suplementar") !== false) {
					$tipo = 'MSL';
					$texto = str_replace("Manifestação suplementar", "", $texto);
				}
				if (strpos($texto, "Análise Laudo Complementa") !== false) {
					$tipo = 'MSL';
					$texto = str_replace("Análise Laudo Complementa", "", $texto);
				}
				if (strpos($texto, "Manifestar sobre") !== false) {
					$tipo = 'M';
					$texto = str_replace("Manifestar sobre", "", $texto);
				}
				if (strpos($texto, "Manifestação") !== false) {
					$tipo = 'M';
					$texto = str_replace("Manifestação", "", $texto);
				}
				if (strpos($texto, "Manifestar/sentença") !== false) {
					$tipo = 'M';
					$texto = str_replace("Manifestar/sentença", "", $texto);
				}
				if (strpos($texto, "Mandado de Segurança") !== false) {
					$tipo = 'MS';
					$texto = str_replace("Mandado de Segurança", "", $texto);
				}
				if (strpos($texto, "Mandado de segurança") !== false) {
					$tipo = 'MS';
					$texto = str_replace("Mandado de segurança", "", $texto);
				}
				if (strpos($texto, "Mandado") !== false) {
					$tipo = 'MS';
					$texto = str_replace("Mandado", "", $texto);
				}
				if (strpos($texto, "Nota Técnica") !== false) {
					$tipo = 'NT';
					$texto = str_replace("Nota Técnica", "", $texto);
				}
				if (strpos($texto, "Quesitos") !== false) {
					$tipo = 'Q';
					$texto = str_replace("Quesitos", "", $texto);
				}
				if (strpos($texto, "Perito/Quesitos") !== false) {
					$tipo = 'Q';
					$texto = str_replace("Perito/Quesitos", "", $texto);
				}
				if (strpos($texto, "Reunião com Perito") !== false) {
					$tipo = 'RP';
					$texto = str_replace("Reunião com Perito", "", $texto);
				}
				if (strpos($texto, "Reunião") !== false) {
					$tipo = 'R';
					$texto = str_replace("Reunião", "", $texto);
				}
				if (strpos($texto, "AC") !== false) {
					$tipo = 'AC';
					$texto = str_replace("AC", "", $texto);
				}
				if (strpos($texto, "Pré") !== false) {
					$tipo = 'PRE';
					$texto = str_replace("Pré", "", $texto);
				}
				if (strpos($texto, "Decisão/Publicar") !== false) {
					$tipo = 'PD';
					$texto = str_replace("Decisão/Publicar", "", $texto);
				}
				if (strpos($texto, "Rec/Decis") !== false) {
					$tipo = 'PD';
					$texto = str_replace("Rec/Decis", "", $texto);
				}
				if (strpos($texto, "cumprimento de decisão judicial") !== false) {
					$tipo = 'PD';
					$texto = str_replace("cumprimento de decisão judicial", "", $texto);
				}
				if (strpos($texto, "Cumprimento de decisão judicial") !== false) {
					$tipo = 'SEN';
					$texto = str_replace("Cumprimento de decisão judicial", "", $texto);
				}
				if (strpos($texto, "Sentença") !== false) {
					$tipo = 'SEN';
					$texto = str_replace("Sentença", "", $texto);
				}
				if (strpos($texto, "Publicar decisão") !== false) {
					$tipo = 'SEN';
					$texto = str_replace("Publicar decisão", "", $texto);
				}
				if (strpos($texto, "Decisão Judicial") !== false) {
					$tipo = 'SEN';
					$texto = str_replace("Decisão Judicial", "", $texto);
				}
				if (strpos($texto, "Decisão") !== false) {
					$tipo = 'SEN';
					$texto = str_replace("Decisão", "", $texto);
				}
				if (strpos($texto, "Dec") !== false) {
					$tipo = 'SEN';
					$texto = str_replace("Dec", "", $texto);
				}
				if (strpos($texto, "Cumprimento de sentença") !== false) {
					$tipo = 'SEN';
					$texto = str_replace("Cumprimento de sentença", "", $texto);
				}
				if (strpos($texto, "Consulta da PFE") !== false) {
					$tipo = 'PFE';
					$texto = str_replace("Consulta da PFE", "", $texto);
				}
				if (strpos($texto, "Recurso") !== false) {
					$tipo = 'REC';
					$texto = str_replace("Recurso", "", $texto);
				}
				if (strpos($texto, "Interesse recurso") !== false) {
					$tipo = 'REC';
					$texto = str_replace("Interesse recurso", "", $texto);
				}
				if (strpos($texto, "Reclamação STF") !== false) {
					$tipo = 'STF';
					$texto = str_replace("Reclamação STF", "", $texto);
				}
				if (strpos($texto, "Acordo") !== false) {
					$tipo = 'AC';
					$texto = str_replace("Acordo", "", $texto);
				}
				if (strpos($texto, "Trânsito em julgado") !== false) {
					$tipo = 'TJ';
					$texto = str_replace("Trânsito em julgado", "", $texto);
				}
				if (strpos($texto, "trânsito em julgado") !== false) {
					$tipo = 'TJ';
					$texto = str_replace("trânsito em julgado", "", $texto);
				}
				if (strpos($texto, "Publicação transito em julgado") !== false) {
					$tipo = 'TJ';
					$texto = str_replace("Publicação transito em julgado", "", $texto);
				}
				if (strpos($texto, "Publicar decisão trânsito em julgado") !== false) {
					$tipo = 'TJ';
					$texto = str_replace("Publicar decisão trânsito em julgado", "", $texto);
				}
				if (strpos($texto, "Tutela de Urgência") !== false) {
					$tipo = 'TJ';
					$texto = str_replace("Tutela de Urgência", "", $texto);
				}
				if (strpos($texto, "Notificar sub júdice") !== false) {
					$tipo = 'SJ';
					$texto = str_replace("Notificar sub júdice", "", $texto);
				}
				if (strpos($texto, "Publicar sub júdice") !== false) {
					$tipo = 'SJ';
					$texto = str_replace("Publicar sub júdice", "", $texto);
				}
				if (strpos($texto, "Notificar na RPI sub júdice") !== false) {
					$tipo = 'SJ';
					$texto = str_replace("Notificar na RPI sub júdice", "", $texto);
				}
				if (strpos($texto, "Decisão liminar") !== false) {
					$tipo = 'LM';
					$texto = str_replace("Decisão liminar", "", $texto);
				}
				
				$obs = $texto;
					
				
				$partes = explode("-",$numero);
				$numero = $partes[0];
				$numero = str_replace("BR", "", $numero);
				$partes = explode("/", $datain);
				$datain = "$partes[2]-$partes[1]-$partes[0]";
				$partes = explode("/", $dataout);
				$dataout = "$partes[2]-$partes[1]-$partes[0]";
				$total++;
				$obs = trim($obs);

				
				if ($numero<>'')
				{
					if ($op==9)
					{
						$cmd = "INSERT INTO acoes2 (`id`, `sei`, `processo`, `numero`, `examinador`, `datain`, `dataout`, `tipo`) VALUES ($id, '$sei', '$processo', '$numero', '$examinador', '$datain', '$dataout', '$tipo');";
						echo "*$cmd;<BR>";
						$res = mysqli_query($link,$cmd);
					}
					
					$cmd = "select * from acoes where numero='$numero' and examinador='$examinador' and datain='$datain'";
					$res = mysqli_query($link,$cmd);
					$i = 0;
					while ($line=@mysqli_fetch_assoc($res))
					{
						$i++;
						$isei = $line['sei'];
						$iprocesso = $line['processo'];
						$idataout = $line['dataout'];
						$itipo = $line['tipo'];
						$iobs = trim($line['obs']);
						$icgrec = $line['cgrec'];
						if ($numero<>'PI0500458') // foi conferido manualmente, trata-se de uma exceção
						{
							if ($isei<>$sei) 
							{
								$cmd = "update acoes set sei='$sei',cgrec=1 where numero='$numero' and examinador='$examinador' and datain='$datain'";
								echo "$cmd;<BR>";
							}
							if ($iprocesso<>$processo) 
							{
								if (strpos($processo, "/") === false) // nao contem barra, o numero do processo é sempre da forma 0112362-77.2017.4.02.5101
								{
									$processo = trim(removerLetras($processo));
									$cmd = "update acoes set processo='$processo',cgrec=1 where numero='$numero' and examinador='$examinador' and datain='$datain'";
									echo "$cmd;<BR>";
								}
							}
							if ($idataout<>$dataout) 
							{
								$cmd = "update acoes set dataout='$dataout',cgrec=1 where numero='$numero' and examinador='$examinador' and datain='$datain'";
								echo "$cmd;<BR>";
							}
							if ($itipo<>$tipo and $tipo<>'')
							{
								$cmd = "update acoes set tipo='$tipo',cgrec=1 where numero='$numero' and examinador='$examinador' and datain='$datain'";
								echo "$cmd;<BR>";
							}
							if ($iobs<>$obs and $obs<>'') 
							{
								$cmd = "update acoes set obs='$obs',cgrec=1 where numero='$numero' and examinador='$examinador' and datain='$datain'";
								echo "$cmd;<BR>";
							}
							if ($icgrec==0)
							{
								$cmd = "update acoes set cgrec=1 where numero='$numero' and examinador='$examinador' and datain='$datain'";
								echo "$cmd;<BR>";
							}
						}
					}
					
					if ($i==0)
					{
						echo "não encontrei select * from acoes where numero='$numero' and examinador='$examinador' and datain='$datain';<BR>";
						// teste se o motivo não ter achado era porque o registro estava com nome de examinador diferente
						$cmd = "select * from acoes where numero='$numero' and sei='$sei' and datain='$datain'";
						$res = mysqli_query($link,$cmd);
						if ($line=@mysqli_fetch_assoc($res))
						{
							$iexaminador = $line['examinador'];
							if ($iexaminador<>$examinador)
							{
								$cmd = "update acoes set examinador='$examinador',cgrec=1 where numero='$numero' and sei='$sei' and examinador='$iexaminador' and datain='$datain'";
								echo "$cmd;<BR>";
								$i = 1;
							}
						}
						if ($i==0) 
						{
							// teste se tem um registro vazio que foi criado na carga da RPI com forum_central_4.php
							$cmd = "select * from acoes where numero='$numero' and sei='$sei' and datain is null";
							$res = mysqli_query($link,$cmd);
							if ($line=@mysqli_fetch_assoc($res))
							{
								$cmd = "update acoes set examinador='$examinador',datain='$datain',dataout='$dataout',tipo='$tipo',obs='$obs',cgrec=1 where numero='$numero' and sei='$sei' and datain is null";
								echo "$cmd;<BR>";
								$i = 1;
							}
						}
						/*if ($i==0) 
						{
							// teste se o motivo não ter achado era porque o registro estava com nome de datain diferente
							$cmd = "select * from acoes where numero='$numero' and sei='$sei' and examinador='$examinador'";
							$res = mysqli_query($link,$cmd);
							if ($line=@mysqli_fetch_assoc($res))
							{
								$idatain = $line['datain'];
								if ($idatain<>$datain)
								{
									$cmd = "update acoes set datain='$datain',dataout='$dataout',cgrec=1 where numero='$numero' and sei='$sei' and examinador='$examinador'";
									echo "$cmd;<BR>";
									$i = 1;
								}
							}
						}*/
						if ($i==0) // inserir registro novo vindo da planilha do Heleno
						{
							$cmd = "select * from acoes where numero='$numero' and sei='$sei' and examinador='$examinador' and datain='$datain' and dataout='$dataout' and tipo='$tipo' and obs='$obs'";
							$res = mysqli_query($link,$cmd);
							if (!($line=@mysqli_fetch_assoc($res)))
							{
								$cmd = "INSERT INTO acoes (`id`, `sei`, `processo`, `numero`, `examinador`, `datain`, `dataout`, `tipo`, `obs`, `data_notifica`, `data_decisao`, `cgrec`, `codigo`) VALUES (NULL, '$sei', '$processo', '$numero', '$examinador', '$datain', '$dataout', '$tipo', '$obs', null, null, 1, 0);";
								echo "$cmd;<BR>";
							}
						}
					}
					
				}
				//exit();
				
			}
			
			// conferir formato errado de processo: SELECT * FROM `acoes` WHERE processo like '%/%' 
			// conferir formato errado de datain: SELECT * FROM `acoes` WHERE datain like '%--%' 
			// conferir formato errado de datain: SELECT * FROM `acoes` WHERE datain='0000-00-00' 
			// conferir formato errado de dataout: SELECT * FROM `acoes` WHERE dataout='0000-00-00' 
			
		}

		echo "Fim de processamento<BR>";
		exit();
	}


	if ($op==6) // insere novas entradas para pedidos com 15.23/22.15 e sem decisão 19.1/15.14
	{
		$cmd2 = "update acoes set data_notifica=null where data_notifica='0000-00-00'";
		$res2 = mysqli_query($link,$cmd2);
		$cmd2 = "update acoes set data_decisao=null where data_decisao='0000-00-00'";
		$res2 = mysqli_query($link,$cmd2);
		$cmd2 = "update acoes set datain=null where datain='0000-00-00'";
		$res2 = mysqli_query($link,$cmd2);
		$cmd2 = "update acoes set dataout=null where dataout='0000-00-00'";
		$res2 = mysqli_query($link,$cmd2);

		$total=0;
		// só será possível cadastrar novos registros que tenha publicação na RPI do 15.23/22.15
		// ao carregar a RPI  op=5 já deve ter criado um registro datan NULL, se não o fez faça agora
		$cmd = "SELECT * FROM acoes where datain is not null and data_notifica is not null and data_decisao is null";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res)) 
		{
			$numero = $line['numero'];
			$total++;
			$sei = $line['sei'];
			$processo = $line['processo'];
			$examinador = $line['examinador'];		
			$data_notifica = $line['data_notifica'];
			$cmd2 = "SELECT * FROM acoes where numero='$numero' and datain is null and processo='$processo'";
			$res2 = mysqli_query($link,$cmd2);
			if (!($line2=@mysqli_fetch_assoc($res2)))
			{
				$cmd2 = "INSERT INTO acoes (`id`, `sei`, `processo`, `numero`, `examinador`, `datain`, `dataout`, `tipo`, `obs`, `data_notifica`, `data_decisao`, `codigo`) VALUES (NULL, '$sei', '$processo', '$numero', '$examinador', NULL, NULL, '', NULL, '$data_notifica', NULL,0);";
				$res2 = mysqli_query($link,$cmd2);
				echo "$cmd2<BR>";
			}
		}
		echo "Fim processamento: $total";
		exit();
	}
	
	if ($op==5) // mostra os registros com datain null, ou seja, teve o 15.23/22.15 na RPI mas ainda não foi distribuído
	{
		// http://cientistaspatentes.com.br/sinergias/acoes.php?op=5&rpi=2674 em diante
		// primeira tarefa será ler a RPI e buscar as ocorrências de 15.23 e 15.21 e inserir novos registros
		// por exemplo na RPI 2689 de 19/07/2022 temos publicação 22.15 de 102018010680 com SEI 52402.004518/2022-15
		// procuramos se já existe registro com este SEI na tabela acoes que tenha esta data_notifica, se não existir então cadastre com datain nulo
		// depois basta mostrar os registros com datain null, ou seja, teve o 15.23/22.15 na RPI mas ainda não foi distribuído (datain null)
		
		$cmd2 = "SELECT * FROM rpis_lidas where rpi='$rpi'";
		$res2 = mysqli_query($link,$cmd2);
		if ($line2=@mysqli_fetch_assoc($res2)) $data = $line2['data'];

		$total=0;
		$fname="../central/revistas/P$rpi.txt";
		@ $fp = fopen($fname,"r");
		if (!$fp)
		{
			$fname="../central/revistas/P$rpi.TXT";
			@ $fp = fopen($fname,"r");
		}
			
		if (!$fp)
		{
			echo "Não foi identificado o arquivo texto $fname<BR>";
		}
		else
		{
			$texto='';
			$numero_lido = '';
			$ler_numero = 0;
			$ler_comentario = 0;
			//echo "Iniciando leitura da revista $rpi<BR>";
			while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
			{
				$texto= trim(fgets($fp)); 
				if ($texto=='') continue;
				if (strcmp(substr($texto,0,10),'(Cd) 15.23')==0 or strcmp(substr($texto,0,10),'(Cd) 22.15')==0)
				{
					$ler_numero = 1;
					$ler_comentario = 0;
				}
				if ($ler_numero==1 and (strcmp(substr($texto,0,4),'(21)')==0 or strcmp(substr($texto,0,4),'(11)')==0))	
				{	
					$numero_lido = trim(substr($texto,4));
					$pos = strpos($numero_lido,'-');
					$numero_lido = substr($numero_lido,0,$pos);
					$numero_lido = trim(str_replace(" ","",$numero_lido)); // PI 9916155-9 B1
					$numero_lido = trim(str_replace("BR","",$numero_lido));
					$ler_numero = 0;
					$ler_comentario = 1;
				}
				if ($ler_comentario==1 and strcmp(substr($texto,0,4),'(co)')==0)	
				{	
					// todo número sei começa com 52402. ou 52400.
					// SELECT * FROM `acoes` WHERE sei not like '52402.%' and sei not like '52400.%'
					
					$comentario = trim(substr($texto,4));
					$comentario = trim(str_replace("'","",$comentario));
					$comentario = trim(str_replace('"',"",$comentario));
					$comentario_utf8 = utf8_encode($comentario);
					$pos = strpos($comentario,'52400.');
					if ($pos==false) $pos = strpos($comentario,'52402.'); // 52402.004518/2022-15
					if ($pos!=false)
					{
						$pos_hifen = strpos($comentario,'-',$pos);
						if ($pos_hifen!=false)
						{
							$sei = trim(substr($comentario,$pos,$pos_hifen-$pos+3));
							// o número do processo obedece a seguinte máscara: 5001181-31.2021.4.03.6131
							// https://www.devmedia.com.br/expressoes-regulares-em-php/25076
							$processo = trim(str_replace(' ','',$comentario));
							$mascara = "/[0-9]{7}-[0-9]{2}\.[0-9]{4}\.[0-9]{1}\.[0-9]{2}\.[0-9]{4}/";
							preg_match_all($mascara,$processo,$matches);
							//var_dump($matches);
							$processo = $matches[0][0];
							//echo "<BR>$processo<BR>$numero_lido<BR>$sei<BR><BR>$comentario<BR>";
							$cmd = "SELECT * FROM acoes where numero='$numero_lido' and sei='$sei' and processo='$processo' and data_notifica='$data'";
							$res = mysqli_query($link,$cmd);
							if (!($line=@mysqli_fetch_assoc($res)))
							{
								$examinador='';
								$cmd = "SELECT * FROM pedido as p, examinador as e where p.codigo=e.codigo and e.dono=1 and p.numero='$numero_lido' and p.instancia='acao judicial'";
								$res = mysqli_query($link,$cmd);
								if ($line=@mysqli_fetch_assoc($res)) $examinador = $line['email'];

								$cmd = "INSERT INTO `acoes` (`id`, `sei`, `processo`, `numero`, `examinador`, `datain`, `dataout`, `tipo`, `obs`, `data_notifica`, `data_decisao`, `codigo`) VALUES (NULL, '$sei', '$processo', '$numero_lido', '$examinador', NULL, NULL, '', NULL, '$data', NULL,0);";
								$res = mysqli_query($link,$cmd);
								echo "$cmd<BR>";
							}
							$ler_comentario = 0;
						}
					}
				}
			}
		}
		echo "Fim processamento";
		exit();
	}

	if ($op==4) // 
	{
		echo "confere SEI e processo como números únicos<BR>";
		$cmd = "SELECT * FROM `acoes` WHERE processo is null and sei is not null;";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$sei = $line['sei'];
			$processo = $line['processo'];
			echo "[$numero] [$sei] [$processo]<BR>";
		}
		$cmd = "SELECT * FROM `acoes` WHERE sei is null and processo is not null;";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$sei = $line['sei'];
			$processo = $line['processo'];
			echo "[$numero] [$sei] [$processo]<BR>";
		}
		echo "Verificação encerrada<BR><BR>";
		
		/*identifica registros duplicados por exemplo PI9207205 com datain NULL apagar */
		
		echo "Identificação de registros duplicados: etapa 1<BR>";
		$cmd = "SELECT numero, examinador, data_notifica, COUNT(*) as total
		FROM acoes WHERE data_notifica is not NULL
		GROUP BY numero, sei, examinador, data_notifica
		HAVING COUNT(*) > 1;";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res)) 
		{
			$numero = $line['numero'];
			$sei = $line['sei'];
			$examinador = $line['examinador'];
			$data_notifica = $line['data_notifica'];
			//echo "$numero<BR>";
			$cmd2 = "select count(*) as x from acoes where numero='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) $x1 = $line2['x'];

			$cmd2 = "select count(*) as x from acoes2 where numero='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) $x2 = $line2['x'];
			if ($x2==1 and $x1==2)
			{
				$cmd2 = "delete from acoes where numero='$numero' and sei='$sei' and examinador='$examinador' and data_notifica='$data_notifica' and datain is null";
				echo "$cmd2;<BR>";
			}
		}

		echo "Identificação de registros duplicados: etapa 2<BR>";
		$cmd = "SELECT numero, sei, examinador, data_notifica, COUNT(*) as total
		FROM acoes WHERE data_notifica is not NULL
		GROUP BY numero, sei, examinador, data_notifica
		HAVING COUNT(*) > 1;";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res)) 
		{
			$numero = $line['numero'];
			$sei = $line['sei'];
			$examinador = $line['examinador'];
			$data_notifica = $line['data_notifica'];
			$cmd2 = "select * from acoes where numero='$numero' and sei='$sei' and examinador='$examinador' and data_notifica='$data_notifica' and datain is null";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$cmd2 = "delete from acoes where numero='$numero' and sei='$sei' and examinador='$examinador' and data_notifica='$data_notifica' and datain is null";
				echo "$cmd2;<BR>";
			}
		}

		echo "Identificação de registros duplicados: etapa 3<BR>";
		$cmd = "SELECT numero, sei, datain, examinador, id, COUNT(*) as total
		FROM acoes WHERE 1
		GROUP BY numero, sei, datain, examinador
		HAVING COUNT(*) > 1;";
		$res = mysqli_query($link,$cmd);
		$total = 0;
		while ($line=@mysqli_fetch_assoc($res)) 
		{
			$total++;
			$numero = $line['numero'];
			$sei = $line['sei'];
			$datain = $line['datain'];
			$examinador = $line['examinador'];
			$id = $line['id'];
			$cmd2 = "$numero $sei $examinador $datain";
			echo "$cmd2<BR>";
			$cmd2 = "delete from acoes where id=$id;";
			echo "$cmd2<BR>";
		}
		echo "Fim de análise: $total<BR>";
		
		// note o que acontece com sei=52402.007437/2022-69 o PI0300600 possui processo 5003067-27.2022.4.03.6100 enquanto PI0419105 posui processo 5003067-27.2022.4.03.6101
		// conclusão pode haver diferença no último dígito
		$cmd = "SELECT * FROM `acoes` WHERE sei is not null;";
		$res = mysqli_query($link,$cmd);
		$total = 0;
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$sei = $line['sei'];
			if ($sei=='52402.007437/2022-69') continue;
			$processo = $line['processo'];
			$iprocesso = null;
			if (isset($equivalencia[$sei])) $iprocesso = $equivalencia[$sei];
			if ($processo<>$iprocesso and $iprocesso!=null)
			{
				echo "$numero [$sei] $processo $iprocesso<BR>";
				$total++;
			}
			$equivalencia[$sei]=$processo;
		}
		echo "Verificação encerrada [$total]<BR><BR>";

		echo "Confere se os dados de data_notifica e data_decisao de fato são válidos, não foram anulados por despacho 22.22 subsequente<BR>";
		$cmd = "SELECT * FROM acoes WHERE data_notifica is not null or data_decisao is not null";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$data_notifica = $line['data_notifica'];
			$data_decisao = $line['data_decisao'];
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}
			if ($data_notifica != null)
			{
				$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('15.23','22.15') and data='$data_notifica' and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) // testa se o despacho data_notifica não existe 
				{
					$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and (despacho='22.20' or despacho='15.30') and data>'$data_notifica' and anulado=0";
					//echo "$cmd2<BR>";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) // testa se o despacho data_notifica foi anulado 
					{
						echo "$numero $data_notifica foi anulado por 22.20<BR>";
					}
				}
				else
				{
					$cmd2 = "update acoes set data_notifica=null where (numero='$numero1' or numero='$numero2') and data_notifica='$data_notifica'";
					echo "$cmd2;<BR>";
				}
			}
			if ($data_decisao != null)
			{
				$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('19.1','15.14') and data='$data_decisao' and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) // testa se o despacho data_notifica não existe 
				{
					$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and (despacho='19.2' or despacho='15.30') and data>'$data_decisao' and anulado=0";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) // testa se o despacho data_decisao foi anulado 
					{
						echo "$numero $data_decisao foi anulado por 19.2<BR>";
					}
				}
				else
				{
					$cmd2 = "update acoes set data_decisao=null where (numero='$numero1' or numero='$numero2') and data_decisao='$data_decisao'";
					echo "$cmd2;<BR>";
				}
			}
		}
		echo "Fim processamento<BR>";
		
		exit();
		$cmd = "SELECT * FROM `acoes` WHERE data_notifica is null";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$id = $line['id'];
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}
			$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('15.23','22.15') and anulado=0";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$data = $line2['data'];
				$cmd2 = "UPDATE acoes SET data_notifica = '$data' WHERE id = $id"; // na verdade tem que apontar para registro com datain proximo ao 15.23 22.15
				echo "$cmd2;<BR>";
			}
		}
		echo "Fim processamento";
		exit();			
	}
			
	if ($op==3)
	{
		exit();
		if ($tipo<>'' or $obs<>'' or $datain<>'' or $examinador<>'' or $dataout<>'') 
		{
			if ($tipo=='')
			{
				$cmd2 = "select * from acoes where id=$id";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) $tipo = $line2['tipo'];
			}
			if ($obs=='')
			{
				$cmd2 = "select * from acoes where id=$id";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) $obs = $line2['obs'];
			}
			if ($datain=='')
			{
				$cmd2 = "select * from acoes where id=$id";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) $datain = $line2['datain'];
			}
			if ($examinador=='')
			{
				$cmd2 = "select * from acoes where id=$id";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) $examinador = $line2['examinador'];
			}
			if ($dataout=='')
			{
				$cmd2 = "select * from acoes where id=$id";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) $dataout = $line2['dataout'];
			}
			
			if ($datain=='0000-00-00' or $datain==null)
			{
				if ($dataout=='0000-00-00' or $dataout==null)
					$cmd2 = "update acoes set tipo='$tipo',obs='$obs',datain=null,dataout=null,examinador='$examinador' where id=$id";
				else
					$cmd2 = "update acoes set tipo='$tipo',obs='$obs',datain=null,dataout='$dataout',examinador='$examinador' where id=$id";
			}
			else
			{
				if ($dataout=='0000-00-00' or $dataout==null) 
					$cmd2 = "update acoes set tipo='$tipo',obs='$obs',datain='$datain',dataout=null,examinador='$examinador' where id=$id";
				else
					$cmd2 = "update acoes set tipo='$tipo',obs='$obs',datain='$datain',dataout='$dataout',examinador='$examinador' where id=$id";
			}
				
			$res2 = mysqli_query($link,$cmd2);
			//echo "$cmd2<BR>";
		}
	}
	
	if ($op==2 or $op==7)
	{
		$cmd = "select * from acoes where id=$id"; 
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$sei = $line['sei'];
			$processo = $line['processo'];
			$numero = $line['numero'];
			$examinador = $line['examinador'];
			$datain = $line['datain'];
			if ($datain==null or $datain=='0000-00-00') 
				$datain='-';
			//else
				//$datain = substr($datain,8,2).'/'.substr($datain,5,2).'/'.substr($datain,0,4);

			$dataout = $line['dataout'];
			if ($dataout==null or $dataout=='0000-00-00') 
				$dataout='-';
			//else
				//$dataout = substr($dataout,8,2).'/'.substr($dataout,5,2).'/'.substr($dataout,0,4);

			$tipo = $line['tipo'];
			$obs = $line['obs'];
			$data_notifica = $line['data_notifica'];
			if ($data_notifica==null or $data_notifica=='0000-00-00')
				$data_notifica='-';
			//else
				//$data_notifica = substr($data_notifica,8,2).'/'.substr($data_notifica,5,2).'/'.substr($data_notifica,0,4);
			
			$data_decisao = $line['data_decisao'];
			if ($data_decisao==null or $data_decisao=='0000-00-00')
				$data_decisao='-';
			//else
				//$data_decisao = substr($data_decisao,8,2).'/'.substr($data_decisao,5,2).'/'.substr($data_decisao,0,4);
			
			//for ($i=800;$i<=strlen($line['obs']);$i++)
			//	if (substr($line['obs'],$i,1)==' ') break; // faz a quebra no primeiro espaço branco após o caracter 800, evitando interromper palavras
			//$obs = substr($line['obs'],0,$i)."...";

			$arquivo='';
			$cmd2 = "select * from justica where documento like '%$processo%'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) $arquivo = $line2['arquivo'];
			
			echo "<form action='acoes.php' method='post' name='postDecada'>";
			echo "<input type='hidden' name='op' value='3'>";
			echo "<input type='hidden' name='id' value='$id'>";
			echo "<BR><BR><table><tr>";
			echo "<td style='font-size: 24px;'> <B>ID:</B> $id </td></tr>";
			echo "<td style='font-size: 24px;'> <B>SEI:</B> $sei </td></tr>";
			if ($arquivo=='')
				echo "<td style='font-size: 24px;'> <B>Processo:</B> $processo </td></tr>";
			else
			{
				echo "<td style='font-size: 24px;'> <B>Processo:</B> <a href='../plos/pesquisa2/$arquivo' target='_blank' STYLE='cursor:hand'> $processo</a> </td></tr>";
			}
			echo "<td style='font-size: 24px;'> <B>Número:</B> $numero </td></tr>";
			if ($op==2)
				echo "<td style='font-size: 24px;'> <B>Examinador:</B> $examinador </td></tr>";
			else
			{
			?>
			<div class="col-md-6 d-flex"><!-- Textos da seção -->
			<div class="align-self-center">
				<td style='font-size: 24px;'> <B>Examinador:</B> 
				<select name="examinador">
					<option value="helenojc" <?php if ($examinador=='helenojc') echo "selected"?>>Heleno</option>
					<option value="rockrio" <?php if ($examinador=='rockrio') echo "selected"?>>Rockefeller</option>
					<option value="cinopoli" <?php if ($examinador=='cinopoli') echo "selected"?>>Adriana</option>
					<option value="alciclea" <?php if ($examinador=='alciclea') echo "selected"?>>Alciclea</option>
					<option value="moreira" <?php if ($examinador=='moreira') echo "selected"?>>Anderson</option>
					<option value="abrantes" <?php if ($examinador=='abrantes') echo "selected"?>>Abrantes</option>
					<option value="darlan" <?php if ($examinador=='darlan') echo "selected"?>>Darlan</option>
					<option value="cidade" <?php if ($examinador=='cidade') echo "selected"?>>Daniela</option>
					<option value="deborasg" <?php if ($examinador=='deborasg') echo "selected"?>>Débora</option>
					<option value="fabios" <?php if ($examinador=='fabios') echo "selected"?>>Fábio</option>
					<option value="fertc" <?php if ($examinador=='fertc') echo "selected"?>>Fernando</option>
					<option value="giselleg" <?php if ($examinador=='giselleg') echo "selected"?>>Giselle</option>
					<option value="jordy" <?php if ($examinador=='jordy') echo "selected"?>>Jordy</option>
					<option value="luiz" <?php if ($examinador=='luiz') echo "selected"?>>Luiz Glória</option>
					<option value="luizcvd" <?php if ($examinador=='luizcvd') echo "selected"?>>Luiz Cabral</option>
					<option value="liraml" <?php if ($examinador=='liraml') echo "selected"?>>Luiz Lira</option>
					<option value="renatocr" <?php if ($examinador=='renatocr') echo "selected"?>>Renato</option>
					<option value="rosanab" <?php if ($examinador=='rosanab') echo "selected"?>>Rosana</option>
				</select>
				</td></tr>
			</div>
			</div>

			<?php
			}
			if ($op==2) // pedido já deu entrada, então não permite editar data de entrada novamente
				echo "<td style='font-size: 24px;'> <B>Entrada:</B> $datain </td></tr>";
			else
				echo "<td style='font-size: 24px;'> <B>Entrada:</B> <input type='text' name='datain' placeholder='YYYY-MM-DD'> </td></tr>";
				
			if ($op==2) // pedido já deu entrada, então permite editar data de saída
				echo "<td style='font-size: 24px;'> <B>Saída:</B> <input type='text' name='dataout' placeholder='YYYY-MM-DD'> </td></tr>";
			else
				echo "<td style='font-size: 24px;'> <B>Saída:</B> $dataout </td></tr>";
				
			?>
			
			<div class="col-md-6 d-flex"><!-- Textos da seção -->
			<div class="align-self-center">
				<td style='font-size: 24px;'> <B>Tipo:</B> 
				<select name="tipo">
					<option value="A" <?php if ($tipo=='A') echo "selected"?>>A ??</option>
					<option value="AC" <?php if ($tipo=='AC') echo "selected"?>>AC - ??</option>
					<option value="AD" <?php if ($tipo=='AD') echo "selected"?>>AD - Audiência</option>
					<option value="CD" <?php if ($tipo=='CD') echo "selected"?>>CD - Cumprimento de Decisão Judicial</option>
					<option value="CIE" <?php if ($tipo=='CIE') echo "selected"?>>CIE - Ciência</option>
					<option value="CS" <?php if ($tipo=='CS') echo "selected"?>>CS - ?? </option>
					<option value="CS" <?php if ($tipo=='DP') echo "selected"?>>DP - Designação de perito </option>
					<option value="ED" <?php if ($tipo=='ED') echo "selected"?>>ED - Encaminhar para DIRPA</option>
					<option value="ES" <?php if ($tipo=='ES') echo "selected"?>>ES - Esclarecimentos</option>
					<option value="F" <?php if ($tipo=='F') echo "selected"?>>F - ??</option>
					<option value="HP" <?php if ($tipo=='HP') echo "selected"?>>HP - Honorários Periciais</option>
					<option value="I" <?php if ($tipo=='I') echo "selected"?>>I - Inicial</option>
					<option value="I2" <?php if ($tipo=='I2') echo "selected"?>>I2 - Subsídio técnico em relação aos docs novos</option>
					<option value="IR" <?php if ($tipo=='IR') echo "selected"?>>IR - ??</option>
					<option value="Lau" <?php if ($tipo=='Lau') echo "selected"?>>Lau ??</option>
					<option value="LS" <?php if ($tipo=='LS') echo "selected"?>>LS - Laudo Suplementar</option>
					<option value="M" <?php if ($tipo=='M') echo "selected"?>>M - Manifestação</option>
					<option value="MD" <?php if ($tipo=='MD') echo "selected"?>>MD ??</option>
					<option value="ML" <?php if ($tipo=='ML') echo "selected"?>>ML - Manifestação sobre Laudo Pericial</option>
					<option value="MLC" <?php if ($tipo=='MLC') echo "selected"?>>MLC - Manifestação sobre Laudo Complementar</option>
					<option value="MP" <?php if ($tipo=='MP') echo "selected"?>>MP ???</option>
					<option value="MR" <?php if ($tipo=='MR') echo "selected"?>>MR ???</option>
					<option value="MS" <?php if ($tipo=='MS') echo "selected"?>>MS - Mandado de Segurança</option>
					<option value="MSL" <?php if ($tipo=='MSL') echo "selected"?>>MSL - Manifestação Suplementar</option>
					<option value="NT" <?php if ($tipo=='NT') echo "selected"?>>NT - Nota Técnica</option>
					<option value="PRE" <?php if ($tipo=='PRE') echo "selected"?>>PRE ??</option>
					<option value="Q" <?php if ($tipo=='Q') echo "selected"?>>Q - Quesitos</option>
					<option value="R" <?php if ($tipo=='R') echo "selected"?>>R - Reunião</option>
					<option value="RP" <?php if ($tipo=='RP') echo "selected"?>>RP - Reunião com Perito</option>
					<option value="S" <?php if ($tipo=='S') echo "selected"?>>S ??</option>
					<option value="SP" <?php if ($tipo=='SP') echo "selected"?>>SP ??</option>
					<option value="STF" <?php if ($tipo=='STF') echo "selected"?>>STF ??</option>
				</select>
				</td></tr>
			</div>
			</div>
			
		
			<?php
			echo "<td style='font-size: 24px;'> <B>Obs:</B>  <input type='text' name='obs' placeholder='$obs'> </td></tr>";
			echo "<td style='font-size: 24px;'> <B>15.23 / 22.15:</B> $data_notifica </td></tr>";
			echo "<td style='font-size: 24px;'> <B>15.14 / 19.1:</B> $data_decisao </td></tr>";
			echo "</table>";
			echo "<input type='submit' value='Enviar'>";
			echo "</form>";

		}
		mysqli_close($link);
		exit();
	}
	
	if ($tipo_data=='dirpa')
	{
		if ($op=='novo')
			$cmd = "select * from acoes where datain is null and cgrec=0";
		else
			$cmd = "select * from acoes where datain is not null and cgrec=0";
	}
	else
	{
		if ($op=='novo')
			$cmd = "select * from acoes where datain is null and cgrec=1";
		else
			$cmd = "select * from acoes where datain is not null and cgrec=1";
	}
		
	//$res = execute_query($cmd);
    $res = mysqli_query($link,$cmd);
	$total = mysqli_num_rows($res);
 

	
?>

	<center><BR><BR>

<?php
	
	if ($tipo_data=='dirpa') // cgrec=0
	{
		if ($op=='novo')
		{
			$cmd = "select count(*) as total from acoes where datain is null and cgrec=0";
			if ($pesquisar<>'') $cmd = "select count(*) as total from acoes where datain is null and (processo like '%pesquisar%' or numero like '%pesquisar%') and cgrec=0";
		}
		else
		{
			if ($tipo=='todos')
			{
				$cmd = "select count(*) as total from acoes where cgrec=0";
				if ($pesquisar<>'') $cmd = "select count(*) as total from acoes where (processo like '%pesquisar%' or numero like '%pesquisar%') and cgrec=0";
			}
			else
			{
				$cmd = "select count(*) as total from acoes where tipo='$tipo' and cgrec=0";
				if ($pesquisar<>'') $cmd = "select count(*) as total from acoes where tipo='$tipo' and (processo like '%pesquisar%' or numero like '%pesquisar%') and cgrec=0";
			}
		}
	}
	else // cgrec=1
	{
		if ($op=='novo')
		{
			$cmd = "select count(*) as total from acoes where datain is null and cgrec=1";
			if ($pesquisar<>'') $cmd = "select count(*) as total from acoes where datain is null and (processo like '%pesquisar%' or numero like '%pesquisar%') and cgrec=1";
		}
		else
		{
			if ($tipo=='todos')
			{
				$cmd = "select count(*) as total from acoes where cgrec=1";
				if ($pesquisar<>'') $cmd = "select count(*) as total from acoes where (processo like '%pesquisar%' or numero like '%pesquisar%') and cgrec=1";
			}
			else
			{
				$cmd = "select count(*) as total from acoes where tipo='$tipo' and cgrec=1";
				if ($pesquisar<>'') $cmd = "select count(*) as total from acoes where tipo='$tipo' and (processo like '%pesquisar%' or numero like '%pesquisar%') and cgrec=1";
			}
		}
	}
	$res = mysqli_query($link,$cmd);
	if ($line=@mysqli_fetch_assoc($res)) $total = $line['total'];
?>
	
    <?php echo $total; ?> Ações judiciais cadastradas. <BR><BR>

    <form method="post" action="acoes.php">
		<div class="align-self-center">
		Tipo: <select name="tipo">
				<option value="todos" <?php if ($tipo=='todos') echo "selected"?>>Todos os registros</option>
				<option value="AC" <?php if ($tipo=='AC') echo "selected"?>>AC - Acordo</option>
				<option value="AD" <?php if ($tipo=='AD') echo "selected"?>>AD - Audiência</option>
				<option value="CD" <?php if ($tipo=='CD') echo "selected"?>>CD - Cumprimento de Decisão Judicial</option>
				<option value="CIE" <?php if ($tipo=='CIE') echo "selected"?>>CIE - Ciência</option>
				<option value="DP" <?php if ($tipo=='DP') echo "selected"?>>DP - Designação de perito </option>
				<option value="ED" <?php if ($tipo=='ED') echo "selected"?>>ED - Encaminhar para DIRPA</option>
				<option value="ES" <?php if ($tipo=='ES') echo "selected"?>>ES - Esclarecimentos</option>
				<option value="HP" <?php if ($tipo=='HP') echo "selected"?>>HP - Honorários Periciais</option>
				<option value="I" <?php if ($tipo=='I') echo "selected"?>>I - Inicial</option>
				<option value="I2" <?php if ($tipo=='I2') echo "selected"?>>I2 - Subsídio técnico em relação aos docs novos</option>
				<option value="LM" <?php if ($tipo=='LM') echo "selected"?>>LM - Decisão Liminar</option>
				<option value="LS" <?php if ($tipo=='LS') echo "selected"?>>LS - Laudo Suplementar</option>
				<option value="M" <?php if ($tipo=='M') echo "selected"?>>M - Manifestação</option>
				<option value="MS" <?php if ($tipo=='MS') echo "selected"?>>MS - Mandado de Segurança</option>
				<option value="MSL" <?php if ($tipo=='MSL') echo "selected"?>>MSL - Manifestação Suplementar</option>
				<option value="NT" <?php if ($tipo=='NT') echo "selected"?>>NT - Nota Técnica</option>
				<option value="CDJ" <?php if ($tipo=='CDJ') echo "selected"?>>CDJ - Cumprimento de Decisão Judicial</option>
				<option value="PFE" <?php if ($tipo=='PFE') echo "selected"?>>PFE - Consulta da PFE</option>
				<option value="PRE" <?php if ($tipo=='PRE') echo "selected"?>>PRE - Pré</option>
				<option value="Q" <?php if ($tipo=='Q') echo "selected"?>>Q - Quesitos</option>
				<option value="R" <?php if ($tipo=='R') echo "selected"?>>R - Reunião</option>
				<option value="REC" <?php if ($tipo=='REC') echo "selected"?>>REC- Recurso</option>
				<option value="RP" <?php if ($tipo=='RP') echo "selected"?>>RP - Reunião com Perito</option>
				<option value="SEN" <?php if ($tipo=='SEN') echo "selected"?>>SEN - Decisão Judicial</option>
				<option value="SJ" <?php if ($tipo=='SJ') echo "selected"?>>SJ - Publicação sub Júdice</option>
				<option value="STF" <?php if ($tipo=='STF') echo "selected"?>>STF - Reclamação STF</option>
				<option value="TJ" <?php if ($tipo=='TJ') echo "selected"?>>TJ - Trânsito em julgado</option>
		</select>
		<div class="col-md-4 d-flex align-self-center"><!-- Textos da seção -->
		<center>
            <label>
                <input type="radio" name="tipo_data" value="dirpa" <?php echo $dirpa_checked;?>> <!-- onclick="atualizarCampoData()"  -->
                Ações DIRPA
            </label>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>
                <input type="radio" name="tipo_data" value="cgrec" <?php echo $cgrec_checked;?>>
                Ações CGREC
            </label>
		</center>
		</div>

		<input type="submit" class="btn btn-primary" value="Buscar">
		</div>
    </form>

<div id="main">
		<div class="table-responsive">
		<table class="table table-hover align-middle table-status table-striped">

			<thead>
			<tr width=74%>
				<th width=6%>
				<?php 
					if ($ordem=='id desc')	
						echo "<a href='acoes.php?ordem=id asc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Id</a>";
					elseif ($ordem=='id asc')	
						echo "<a href='acoes.php?ordem=id desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Id</a>";
					else
						echo "<a href='acoes.php?ordem=id desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Id</a>";
				?>
				</th>
				<th width=12%>
				<?php 
					if ($ordem=='sei desc')	
						echo "<a href='acoes.php?ordem=sei asc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>SEI</a>";
					elseif ($ordem=='sei asc')	
						echo "<a href='acoes.php?ordem=sei desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>SEI</a>";
					else
						echo "<a href='acoes.php?ordem=sei desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>SEI</a>";
				?>
				</th>
				<th width=8%>
				<?php 
					if ($ordem=='processo desc')	
						echo "<a href='acoes.php?ordem=processo asc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Processo</a>";
					elseif ($ordem=='processo asc')	
						echo "<a href='acoes.php?ordem=processo desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Processo</a>";
					else
						echo "<a href='acoes.php?ordem=processo desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Processo</a>";
				?>
				</th>
				<th width=8%>
				<?php 
					if ($ordem=='numero desc')	
						echo "<a href='acoes.php?ordem=numero asc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Número</a>";
					elseif ($ordem=='numero asc')	
						echo "<a href='acoes.php?ordem=numero desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Número</a>";
					else
						echo "<a href='acoes.php?ordem=numero desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Número</a>";
				?>
				</th>
				<th width=8%>
				<?php 
					if ($ordem=='examinador desc')	
						echo "<a href='acoes.php?ordem=examinador asc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Examinador</a>";
					elseif ($ordem=='examinador asc')	
						echo "<a href='acoes.php?ordem=examinador desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Examinador</a>";
					else
						echo "<a href='acoes.php?ordem=examinador desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Examinador</a>";
				?>
				</th>
				<th width=6%>
				<?php 
					if ($ordem=='datain desc')	
						echo "<a href='acoes.php?ordem=datain asc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Entrada</a>";
					elseif ($ordem=='datain asc')	
						echo "<a href='acoes.php?ordem=datain desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Entrada</a>";
					else
						echo "<a href='acoes.php?ordem=datain desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Entrada</a>";
				?>
				</th>
				<th width=6%>
				<?php 
					if ($ordem=='dataout desc')	
						echo "<a href='acoes.php?ordem=dataout asc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Saída</a>";
					elseif ($ordem=='dataout asc')	
						echo "<a href='acoes.php?ordem=dataout desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Saída</a>";
					else
						echo "<a href='acoes.php?ordem=dataout desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Saída</a>";
				?>
				</th>
				<th width=4%>
				<?php 
					if ($ordem=='tipo desc')	
						echo "<a href='acoes.php?ordem=tipo asc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Tipo</a>";
					elseif ($ordem=='tipo asc')	
						echo "<a href='acoes.php?ordem=tipo desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Tipo</a>";
					else
						echo "<a href='acoes.php?ordem=tipo desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>Tipo</a>";
				?>
				</td>
				<th width=8%>Obs</th>
				<th width=6%>
				<?php 
					if ($ordem=='data_notifica desc')	
						echo "<a href='acoes.php?ordem=data_notifica asc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>15.23<BR>22.15</a>";
					elseif ($ordem=='data_notifica asc')	
						echo "<a href='acoes.php?ordem=data_notifica desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>15.23<BR>22.15</a>";
					else
						echo "<a href='acoes.php?ordem=data_notifica desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>15.23<BR>22.15</a>";
				?>
				</th>
				<th width=6%>
				<?php 
					if ($ordem=='data_decisao desc')	
						echo "<a href='acoes.php?ordem=data_decisao asc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>15.14<BR>19.1</a>";
					elseif ($ordem=='data_decisao asc')	
						echo "<a href='acoes.php?ordem=data_decisao desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>15.14<BR>19.1</a>";
					else
						echo "<a href='acoes.php?ordem=data_decisao desc&tipo_data=$tipo_data&tipo=$tipo&pergunta=$pergunta'>15.14<BR>19.1</a>";
				?>
				</th>
			</tr>
			</thead>


<tbody>

<?php

	$meses = array ('','Jan','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dec');
	echo "tipo dados $tipo_data ";
	if ($tipo_data=='dirpa')
	{
		if ($op=='novo')
		{
			$cmd = "select * from acoes where datain is null and cgrec=0 order by $ordem";
			if ($pesquisar<>'') $cmd = "select * from acoes where datain is null and cgrec=0 and (processo like '%pesquisar%' or numero like '%pesquisar%') order by $ordem";
		}
		else
		{
			if ($tipo=='todos')
			{
				$cmd = "select * from acoes where cgrec=0 order by $ordem";
				if ($pesquisar<>'') $cmd = "select * from acoes where (processo like '%pesquisar%' or numero like '%pesquisar%') and cgrec=0 order by $ordem";
			}
			else
			{
				$cmd = "select * from acoes where tipo='$tipo' and cgrec=0 order by $ordem";
				if ($pesquisar<>'') $cmd = "select * from acoes where tipo='$tipo' and cgrec=0 and (processo like '%pesquisar%' or numero like '%pesquisar%') order by $ordem";
			}
		}
	}
	else
	{
		if ($op=='novo')
		{
			$cmd = "select * from acoes where datain is null and cgrec=1 order by $ordem";
			if ($pesquisar<>'') $cmd = "select * from acoes where datain is null and (processo like '%pesquisar%' or numero like '%pesquisar%') and cgrec=1 order by $ordem";
		}
		else
		{
			if ($tipo=='todos')
			{
				$cmd = "select * from acoes where cgrec=1 order by $ordem";
				if ($pesquisar<>'') $cmd = "select * from acoes where (processo like '%pesquisar%' or numero like '%pesquisar%') and cgrec=1 order by $ordem";
			}
			else
			{
				$cmd = "select * from acoes where tipo='$tipo' and cgrec=1 order by $ordem";
				if ($pesquisar<>'') $cmd = "select * from acoes where tipo='$tipo' and (processo like '%pesquisar%' or numero like '%pesquisar%') and cgrec=1 order by $ordem";
			}
		}
	}

	echo $cmd;
	$res = mysqli_query($link,$cmd);
	while ($line=@mysqli_fetch_assoc($res))
	{
		$id = $line['id'];
		$sei = $line['sei'];
		$processo = $line['processo'];
		$numero = $line['numero'];
		$examinador = $line['examinador'];
		$datain = $line['datain'];
		$divisao = $line['divisao'];
		$codigo = $line['codigo'];
		$id_justica = $line['id_justica'];
		if ($datain==null or $datain=='0000-00-00') 
			$datain='-';
		//else
			//$datain = substr($datain,8,2).'/'.substr($datain,5,2).'/'.substr($datain,0,4);

		$dataout = $line['dataout'];
		if ($dataout==null or $dataout=='0000-00-00') 
			$dataout='-';
		//else
			//$dataout = substr($dataout,8,2).'/'.substr($dataout,5,2).'/'.substr($dataout,0,4);

		$tipo = $line['tipo'];
		$obs = $line['obs'];
		$data_notifica = $line['data_notifica'];
		if ($data_notifica==null or $data_notifica=='0000-00-00')
			$data_notifica='-';
		//else
			//$data_notifica = substr($data_notifica,8,2).'/'.substr($data_notifica,5,2).'/'.substr($data_notifica,0,4);
		
		$data_decisao = $line['data_decisao'];
		if ($data_decisao==null or $data_decisao=='0000-00-00')
			$data_decisao='-';
		//else
			//$data_decisao = substr($data_decisao,8,2).'/'.substr($data_decisao,5,2).'/'.substr($data_decisao,0,4);
		
		//for ($i=800;$i<=strlen($line['obs']);$i++)
		//	if (substr($line['obs'],$i,1)==' ') break; // faz a quebra no primeiro espaço branco após o caracter 800, evitando interromper palavras
		//$obs = substr($line['obs'],0,$i)."...";

		$arquivo='';$reversao='';
		if ($id_justica>0)
		{
			$cmd2 = "select * from justica where id=$id_justica";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) 
			{
				$arquivo = $line2['arquivo'];
				$reversao = $line2['reversao'];
			}
		}
		
		if ($reversao=='sim') 
			$corfundo_linha = "style='background-color: #FFDDDD;'";
		elseif ($reversao=='não') 
			$corfundo_linha = "style='background-color: #DDFFDD;'";
		else
			$corfundo_linha = "";
		
		echo "<tr class='table-light'>";
		if ($op=='novo')
			echo "<td style='font-size: 12px;'> <a href=acoes.php?id=$id&op=7>$id</a> </td>";
		else
			echo "<td style='font-size: 12px;'> <a href=acoes.php?id=$id&op=2>$id</a> </td>";

		echo "<td style='font-size: 12px;'> $sei </td>";
		if ($arquivo=='')
			echo "<td style='font-size: 12px;'> $processo </td>";
		else
			echo "<td style='font-size: 12px;'><a href='../plos/pesquisa2/$arquivo.pdf' target='_blank' STYLE='cursor:hand'> $processo</a> </td>";

		echo "<td style='font-size: 12px;'> $numero </td>";
		echo "<td style='font-size: 12px;'> $examinador </td>";
		if ($codigo==0)
			echo "<td style='font-size: 12px;'>$datain</td>";
		else
			echo "<td style='font-size: 12px;'> <a href='https://siscap.inpi.gov.br/adm/pareceres/$divisao/$numero$codigo.pdf' target='_blank'>$datain</a> </td>";
		echo "<td style='font-size: 12px;'> $dataout </td>";
		echo "<td style='font-size: 12px;'> $tipo </td>";
		echo "<td style='font-size: 12px;'> $obs </td>";
		echo "<td style='font-size: 12px;'> $data_notifica</td>";
		if ($reversao=='sim')
		{
			if ($id_justica>0)
				echo "<td style='font-size: 12px; background-color: #DDFFDD;'><a href='http://cientistaspatentes.com.br/plos/juris.php?pesquisar_id=$id_justica' target='_blank'>$data_decisao</a></td></tr>";
			else
				echo "<td style='font-size: 12px;'>$data_decisao</td></tr>";
		}
		elseif ($reversao=='não')
		{
			if ($id_justica>0)
				echo "<td style='font-size: 12px; background-color: #DDFFDD;'><a href='http://cientistaspatentes.com.br/plos/juris.php?pesquisar_id=$id_justica' target='_blank'>$data_decisao</a></td></tr>";
			else
				echo "<td style='font-size: 12px;'>$data_decisao</td></tr>";
		}
		else
		{
			if ($id_justica>0)
				echo "<td style='font-size: 12px;'><a href='http://cientistaspatentes.com.br/plos/juris.php?pesquisar_id=$id_justica' target='_blank'>$data_decisao</a></td></tr>";
			else
				echo "<td style='font-size: 12px;'>$data_decisao</td></tr>";
		}
	}
    mysqli_close($link);
?>


</tbody></table>
</div>
	
</BODY></HTML>
