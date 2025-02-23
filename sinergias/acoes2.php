<?php
	session_start();
	$user = @$_SESSION['user'];
	if (!(isset($_SESSION['user']) and ($user<>''))){
		header("Location: index.php");
		exit;
	}
	
	require("../../conf_plos.php");
	require("../conf_utils.php");

	if (empty($_REQUEST["ano"])) {$ano=date('Y');} else {$ano=$_REQUEST["ano"];}
	if (empty($_REQUEST["divisao"])) {$divisao='CGREC/DIREP';} else {$divisao=$_REQUEST["divisao"];}
	if (empty($_REQUEST["tipo"])) {$tipo='100';} else {$tipo=$_REQUEST["tipo"];}
	if (empty($_REQUEST["tipo_data"])) {$tipo_data='publicacao';} else {$tipo_data=$_REQUEST["tipo_data"];}

	$divisao=$complemento_divisao[$divisao];
	if ($tipo=='Rec. Provido (100)') $tipo='100';
	if ($tipo=='Rec. Provido (100.1)') $tipo='100.1';
	if ($tipo=='Rec. Provido (100.2)') $tipo='100.2';
	if ($tipo=='Rec. Ciência (120)') $tipo='120';
	if ($tipo=='Rec. Exigência (121)') $tipo='121';
	if ($tipo=='Rec. Negado (111)') $tipo='111';
	if ($tipo=='Nulidade Provida (200)') $tipo='200';
	if ($tipo=='Nulidade Negada (201)') $tipo='201';
	if ($tipo=='Nulidade Parcial (204)') $tipo='204';
	if ($tipo=='Nulidade Intimação (205)') $tipo='205';
	if ($tipo=='Ações Judiciais') $tipo='acao';
	
	// echo $tipo_data;
	$producao_checked = '';
	if ($tipo_data=='producao') 
	{
		$producao_checked = 'checked';
		$mensagem = "Dados conforme data de produção no SISCAP";
	}
	$publicacao_checked = '';
	if ($tipo_data=='publicacao') 
	{
		$publicacao_checked = 'checked';
		$mensagem = "Dados conforme data de publicação na RPI";
	}

/*
SELECT *
	FROM pedido  as p
	INNER JOIN examinador as e 
		ON p.codigo = e.codigo
	WHERE p.instancia = 'acao judicial'
	AND e.email = 'mlacerda'
	AND year(e.data)>=2000 
    ORDER BY e.data DESC;
*/

?>
<!doctype html>
<html>
  <head>
		<title>Produção de Recursos em Patentes (COREP) </title>
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
		
		<center>

		<form action="acoes2.php" method="post" name="postDivisao">

		<div class="col-md-6 d-flex align-self-center"><!-- Textos da seção -->
			<select class="form-control" name="ano">
				<option <?php if ($ano==2025) echo 'selected';?>>2025</option>
				<option <?php if ($ano==2024) echo 'selected';?>>2024</option>
				<option <?php if ($ano==2023) echo 'selected';?>>2023</option>
				<option <?php if ($ano==2022) echo 'selected';?>>2022</option>
				<option <?php if ($ano==2021) echo 'selected';?>>2021</option>
				<option <?php if ($ano==2020) echo 'selected';?>>2020</option>
				<option <?php if ($ano==2019) echo 'selected';?>>2019</option>
				<option <?php if ($ano==2018) echo 'selected';?>>2018</option>
				<option <?php if ($ano==2017) echo 'selected';?>>2017</option>
			</select>
			<select class="form-control" name="divisao">
				<option <?php if ($divisao=='direp') echo 'selected';?>>CGREC/DIREP</option>
				
				<option <?php if ($divisao=='ditex') echo 'selected';?>>CGPAT I/DITEX</option>
				<option <?php if ($divisao=='difari') echo 'selected';?>>CGPAT I/DIFAR-I</option>
				<option <?php if ($divisao=='difarii') echo 'selected';?>>CGPAT I/DIFAR-II</option>
				<option <?php if ($divisao=='dipol') echo 'selected';?>>CGPAT I/DIPOL</option>
				<option <?php if ($divisao=='dinor') echo 'selected';?>>CGPAT I/DINOR</option>

				<option <?php if ($divisao=='dialp') echo 'selected';?>>CGPAT II/DIALP</option>
				<option <?php if ($divisao=='dibio') echo 'selected';?>>CGPAT II/DIBIO</option>
				<option <?php if ($divisao=='dimol') echo 'selected';?>>CGPAT II/DIMOL</option>
				<option <?php if ($divisao=='dipaq') echo 'selected';?>>CGPAT II/DIPAQ</option>
				<option <?php if ($divisao=='dipae') echo 'selected';?>>CGPAT II/DIPAE</option>

				<option <?php if ($divisao=='ditel') echo 'selected';?>>CGPAT III/DITEL</option>
				<option <?php if ($divisao=='dicel') echo 'selected';?>>CGPAT III/DICEL</option>
				<option <?php if ($divisao=='difel') echo 'selected';?>>CGPAT III/DIFEL</option>
				<option <?php if ($divisao=='dipeq') echo 'selected';?>>CGPAT III/DIPEQ</option>
				<option <?php if ($divisao=='diciv') echo 'selected';?>>CGPAT III/DICIV</option>
				
				<option <?php if ($divisao=='dimat') echo 'selected';?>>CGPAT IV/DIMAT</option>
				<option <?php if ($divisao=='dimec') echo 'selected';?>>CGPAT IV/DIMEC</option>
				<option <?php if ($divisao=='ditem') echo 'selected';?>>CGPAT IV/DITEM</option>
				<option <?php if ($divisao=='dinec') echo 'selected';?>>CGPAT IV/DINEC</option>
				<option <?php if ($divisao=='dimut') echo 'selected';?>>CGPAT IV/DIMUT</option>
			
			</select>
			<select class="form-control" name="tipo">
				<option <?php if ($tipo=='100') echo 'selected';?>>Rec. Provido (100)</option>
				<option <?php if ($tipo=='100.1') echo 'selected';?>>Rec. Provido (100.1)</option>
				<option <?php if ($tipo=='100.2') echo 'selected';?>>Rec. Provido (100.2)</option>
				<option <?php if ($tipo=='120') echo 'selected';?>>Rec. Ciência (120)</option>
				<option <?php if ($tipo=='121') echo 'selected';?>>Rec. Exigência (121)</option>
				<option <?php if ($tipo=='111') echo 'selected';?>>Rec. Negado (111)</option>
				<option <?php if ($tipo=='200') echo 'selected';?>>Nulidade Provida (200)</option>
				<option <?php if ($tipo=='201') echo 'selected';?>>Nulidade Negada (201)</option>
				<option <?php if ($tipo=='204') echo 'selected';?>>Nulidade Parcial (204)</option>
				<option <?php if ($tipo=='205') echo 'selected';?>>Nulidade Intimação (205)</option>
				<option <?php if ($tipo=='acao') echo 'selected';?>>Ações Judiciais</option>
			</select>
		</div>
		<div class="col-md-4 d-flex align-self-center"><!-- Textos da seção -->
		<center>
            <label>
                <input type="radio" name="tipo_data" value="publicacao" <?php echo $publicacao_checked;?>> <!-- onclick="atualizarCampoData()"  -->
                Data de Publicação
            </label>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>
                <input type="radio" name="tipo_data" value="producao" <?php echo $producao_checked;?>>
                Data de Produção
            </label>
		</center>
		</div>
		<button type="submit" class="btn btn-primary">Buscar</button>
		</form>
		<BR>
        <label id="labelData"><?php echo $mensagem; ?></label>
	</center>

	<BR>
	<h2>Produção</h2>
	<div class="table-responsive">
	<table class="table table-hover align-middle table-status">
		<thead>
		<tr>
			<th colspan=2>Examinador</th>
			<th>Jan</th>
			<th>Fev</th>
			<th>Mar</th>
			<th>Abr</th>
			<th>Mai</th>
			<th>Jun</th>
			<th>Jul</th>
			<th>Ago</th>
			<th>Set</th>
			<th>Out</th>
			<th>Nov</th>
			<th>Dez</th>
			<th>Total</th>
		</tr>
		</thead>

		<tbody>
		
		<?php

			$complemento = $divisao_complemento[$divisao];
			if ($divisao=='direp') 
				$cmd = "select * from servidores where complemento='CGREC/DIREP' and ((year(admissao)<=$ano and year(rescisao)>=$ano) or (year(admissao)<=$ano and (rescisao is null or rescisao='0000-00-00'))) order by nome";
			else
				$cmd = "select * from servidores where complemento='$complemento' and ((year(admissao)<=$ano and year(rescisao)>=$ano) or (year(admissao)<=$ano and (rescisao is null or rescisao='0000-00-00'))) order by nome";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res)) 
			{
				$iemail = $line['email'];
				for ($i=1;$i<=13;$i++) 
				{
					@$total[$iemail][$imes] = 0;
					@$total_geral[$imes]=0;
				}
			}

			if ($tipo_data=='publicacao')
			{
				if ($tipo=='100')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and p.decisao='recurso provido' and year(p.rpi)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and p.decisao='recurso provido' and year(p.rpi)=$ano";
				}
				if ($tipo=='100.1')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and p.decisao='recurso provido-reforma 100.1' and year(p.rpi)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and p.decisao='recurso provido-reforma 100.1' and year(p.rpi)=$ano";
				}
				if ($tipo=='100.2')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and (p.decisao='recurso provido-devolucao 100.2') and year(p.rpi)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and (p.decisao='recurso provido-devolucao 100.2') and year(p.rpi)=$ano";
				}
				if ($tipo=='120')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and p.decisao='recurso ciencia' and year(p.rpi)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and p.decisao='recurso ciencia' and year(p.rpi)=$ano";
				}
				if ($tipo=='121')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and (p.decisao='recurso exigencia' or p.decisao='recurso exigencia 121') and year(p.rpi)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and (p.decisao='recurso exigencia' or p.decisao='recurso exigencia 121') and year(p.rpi)=$ano";
				}
				if ($tipo=='111')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and (p.decisao='recurso negado' or p.decisao='recurso manutencao do indeferimento 111') and year(p.rpi)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and (p.decisao='recurso negado' or p.decisao='recurso manutencao do indeferimento 111') and year(p.rpi)=$ano";
				}
				if ($tipo=='200')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and p.decisao='nulidade provida' and year(p.rpi)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and p.decisao='nulidade provida' and year(p.rpi)=$ano";
				}
				if ($tipo=='201')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and p.decisao='nulidade negada' and year(p.rpi)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and p.decisao='nulidade negada' and year(p.rpi)=$ano";
				}
				if ($tipo=='204')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and p.decisao='nulidade parcial' and year(p.rpi)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and p.decisao='nulidade parcial' and year(p.rpi)=$ano";
				}
				if ($tipo=='205')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and p.decisao='nulidade 1' and year(p.rpi)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and p.decisao='nulidade 1' and year(p.rpi)=$ano";
				}
		
				if ($tipo=='acao')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and p.instancia='acao judicial' and year(p.rpi)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and p.instancia='acao judicial' and year(p.rpi)=$ano";
				}
			}
			else
			{
				if ($tipo=='100')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and p.decisao='recurso provido' and year(e.data)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and p.decisao='recurso provido' and year(e.data)=$ano";
				}
				if ($tipo=='100.1')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and p.decisao='recurso provido-reforma 100.1' and year(e.data)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and p.decisao='recurso provido-reforma 100.1' and year(e.data)=$ano";
				}
				if ($tipo=='100.2')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and (p.decisao='recurso provido-devolucao 100.2') and year(e.data)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and (p.decisao='recurso provido-devolucao 100.2') and year(e.data)=$ano";
				}
				if ($tipo=='120')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and p.decisao='recurso ciencia' and year(e.data)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and p.decisao='recurso ciencia' and year(e.data)=$ano";
				}
				if ($tipo=='121')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and (p.decisao='recurso exigencia' or p.decisao='recurso exigencia 121') and year(e.data)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and (p.decisao='recurso exigencia' or p.decisao='recurso exigencia 121') and year(e.data)=$ano";
				}
				if ($tipo=='111')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and (p.decisao='recurso negado' or p.decisao='recurso manutencao do indeferimento 111') and year(e.data)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and (p.decisao='recurso negado' or p.decisao='recurso manutencao do indeferimento 111') and year(e.data)=$ano";
				}
				if ($tipo=='200')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and p.decisao='nulidade provida' and year(e.data)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and p.decisao='nulidade provida' and year(e.data)=$ano";
				}
				if ($tipo=='201')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and p.decisao='nulidade negada' and year(e.data)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and p.decisao='nulidade negada' and year(e.data)=$ano";
				}
				if ($tipo=='204')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and p.decisao='nulidade parcial' and year(e.data)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and p.decisao='nulidade parcial' and year(e.data)=$ano";
				}
				if ($tipo=='205')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and p.decisao='nulidade 1' and year(e.data)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and p.decisao='nulidade 1' and year(e.data)=$ano";
				}
		
				if ($tipo=='acao')
				{
					if ($divisao=='corep')
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.divisao='direp' or p.divisao='corep') and e.dono=1 and p.instancia='acao judicial' and year(e.data)=$ano";
					else
						$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.divisao='$divisao' and e.dono=1 and p.instancia='acao judicial' and year(e.data)=$ano";
				}
			}
			@ $fp = fopen("lista_acoes.csv","w");
			echo "$cmd<BR>";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res)) 
			{
				$email_lido=$line['email'];
				if ($email_lido=='rockrio2') $email_lido='rockrio';
				if ($email_lido=='ramorim2') $email_lido='ramorim';
				$data=$line['data'];
				$divisao=$line['divisao'];
				$decisao=$line['decisao'];
				$etapa=$line['etapa'];
				if ($tipo_data=='publicacao') $mes_lido = (int)substr($line['data'],5,2);
				if ($tipo_data=='producao') $mes_lido = (int)substr($line['rpi'],5,2);
				@$total[$email_lido][$mes_lido]++;
				@$total[$email_lido][13]++;
				@$total_geral[$mes_lido]++;
				@$total_geral[13]++;
				if ($decisao=='nulidade 1')
					$texto = "$email_lido;$data;$divisao;$decisao,1";
				elseif ($decisao=='nulidade provida' or $decisao=='nulidade negada' or $decisao=='nulidade parcial')
					$texto = "$email_lido;$data;$divisao;$decisao,2";
				else
					$texto = "$email_lido;$data;$divisao;$decisao,$etapa";

				fputs($fp,$texto."\n");
			}

			$complemento = $divisao_complemento[$divisao];
			if ($divisao=='direp') 
				$cmd = "select * from servidores where complemento='CGREC/DIREP' and ((year(admissao)<=$ano and year(rescisao)>=$ano) or (year(admissao)<=$ano and (rescisao is null or rescisao='0000-00-00'))) order by nome";
			else
				$cmd = "select * from servidores where complemento='$complemento' and ((year(admissao)<=$ano and year(rescisao)>=$ano) or (year(admissao)<=$ano and (rescisao is null or rescisao='0000-00-00'))) order by nome";

			$matriculas_lidas = array();$i=0;
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res)) 
			{
				$matricula = $line['matricula'];
				if (in_array($matricula,$matriculas_lidas)) continue;
				$matriculas_lidas[$i++]=$matricula;
				$nome = $line['nome'];
				$email = $line['email'];
				if ($divisao=='direp') 
					$fname = "$matricula"."i.jpg";
				else
					$fname = "$matricula".".jpg";
			?>
		<tr class="table-light">
			<td><IMG src='imagens/servidores/<?php echo "$fname";?>' width='50'></td>
			<td><?php echo $nome;?></td>
			<td><?php echo @$total[$email][1];?></td>
			<td><?php echo @$total[$email][2];?></td>
			<td><?php echo @$total[$email][3];?></td>
			<td><?php echo @$total[$email][4];?></td>
			<td><?php echo @$total[$email][5];?></td>
			<td><?php echo @$total[$email][6];?></td>
			<td><?php echo @$total[$email][7];?></td>
			<td><?php echo @$total[$email][8];?></td>
			<td><?php echo @$total[$email][9];?></td>
			<td><?php echo @$total[$email][10];?></td>
			<td><?php echo @$total[$email][11];?></td>
			<td><?php echo @$total[$email][12];?></td>
			<td><?php echo @$total[$email][13];?></td>
		</tr>
		<?php
			}
		?>
		<tr class="table-light">
			<td> </td>
			<td><B>Total</B></td>
			<td><?php echo @$total_geral[1];?></td>
			<td><?php echo @$total_geral[2];?></td>
			<td><?php echo @$total_geral[3];?></td>
			<td><?php echo @$total_geral[4];?></td>
			<td><?php echo @$total_geral[5];?></td>
			<td><?php echo @$total_geral[6];?></td>
			<td><?php echo @$total_geral[7];?></td>
			<td><?php echo @$total_geral[8];?></td>
			<td><?php echo @$total_geral[9];?></td>
			<td><?php echo @$total_geral[10];?></td>
			<td><?php echo @$total_geral[11];?></td>
			<td><?php echo @$total_geral[12];?></td>
			<td><?php echo @$total_geral[13];?></td>
		</tr>
		</tbody>
	</table>
	</div>

		<a href="<?php echo "lista_acoes.csv";?>" target="_blank">
		  <h1><span class="fas fa-file fa-1x text-white-80"></span>Lista de Pedidos</h1>
		</a>
		
  </body>
</html>
