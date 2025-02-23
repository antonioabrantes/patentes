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
		<title>Recursos em Patentes (COREP) </title>
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

	<center>
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
		$meses = array ("todos os meses","janeiro","fevereiro","março","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro");
		if (empty($_REQUEST["ano"])) {$ano=date('Y');} else {$ano=$_REQUEST["ano"];}
		if (empty($_REQUEST["mes"])) {$mes=$meses[(int)date('m')];} else {$mes=$_REQUEST["mes"];}
		$mes = array_search($mes, $meses);
		$kmes = str_pad($mes,2,"0",STR_PAD_LEFT);
		$idata = "$ano-$kmes-01";
		@ $fp = fopen("data/info.csv","w");
	?>
	
		<h1>Pedidos examinados em <?php echo $meses[$mes];?> de <?php echo $ano;?> em Recursos de Patentes (COREP) </h1>

		<center>
		<form action="infopedidos.php" method="post" name="postDivisao">
		<div class="col-md-6 d-flex align-self-center"><!-- Textos da seção -->
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
				<option <?php if ($ano==2025) echo 'selected';?>>2025</option>
				<option <?php if ($ano==2024) echo 'selected';?>>2024</option>
				<option <?php if ($ano==2023) echo 'selected';?>>2023</option>
				<option <?php if ($ano==2022) echo 'selected';?>>2022</option>
				<option <?php if ($ano==2021) echo 'selected';?>>2021</option>
			</select>
			<input type="submit" class="btn btn-primary" value="Buscar">
		</div>
		</form>

		
	<?php
		$total=0;
		if ($mes==0)
		{
			$cmd = "select * from pedido where decisao in ('recurso provido','recurso negado','recurso 100','recurso provido-reforma 100.1','recurso provido-reforma 100.2','recurso provido-devolucao 100.2','recurso 1001','recurso 1002','recurso 111','recurso manutencao do indeferimento 111','recurso exigencia','recurso exigencia 121','recurso ciencia','nulidade 1','nulidade 200','nulidade 201','nulidade 204','nulidade provida','nulidade negada','nulidade parcial') and year(rpi)=$ano and anulado=0 order by rpi asc";
		}
		else
		{
			$cmd = "select * from pedido where decisao in ('recurso provido','recurso negado','recurso 100','recurso provido-reforma 100.1','recurso provido-reforma 100.2','recurso provido-devolucao 100.2','recurso 1001','recurso 100.2','recurso 111','recurso manutencao do indeferimento 111','recurso exigencia','recurso exigencia 121','recurso ciencia','nulidade 1','nulidade 200','nulidade 201','nulidade 204','nulidade provida','nulidade negada','nulidade parcial') and year(rpi)=$ano and month(rpi)=$mes and anulado=0 order by rpi asc";
		}
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

			if ($decisao=='recurso 100' or $decisao=='recurso 1002' or $decisao=='recurso 1001')
			{
				$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and (decisao='recurso provido' or decisao='recurso provido-reforma 100.1' or decisao='recurso provido-reforma 100.2' or decisao='recurso provido-devolucao 100.2') and anulado=0";
				$res2 = mysqli_query($link,$cmd2);                                                                                      
				if ($line2=@mysqli_fetch_assoc($res2)) continue;
			}
			if ($decisao=='recurso 111') // esses sao os pareceres da coordenação
			{
				$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and (decisao='recurso negado' or decisao='recurso manutencao do indeferimento 111') and anulado=0";
				$res2 = mysqli_query($link,$cmd2); // se já tiver um parecer do técnico, então ignore este parecer da coordenação
				if ($line2=@mysqli_fetch_assoc($res2)) continue;
			}
			if ($decisao=='nulidade 200')
			{
				$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao='nulidade provida' and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) continue;
			}
			if ($decisao=='nulidade 201')
			{
				$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao='nulidade negada' and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) continue;
			}
			if ($decisao=='nulidade 204')
			{
				$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao='nulidade parcial' and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) continue;
			}
			$total++;
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
				<th width=6%>Ano</th>
				<th width=8%>Mês</th>
				<th width=8%>RPI</th>
				<th width=8%>Despacho</th>
				<th width=10%>Processo</th>
				<th width=8%>Parecer</th>
				<th width=8%>Login</th>
				<th width=8%>Nome do usuário</th>
				<th width=8%>Setor</th>
				<th width=8%>Diretoria</th>
			</tr>
			</thead>

			<?php
				echo "<TBODY>";$total=0;$total_fora=0;$soma_itens=0;
				
				if ($mes==0)
				{
					$cmd = "select * from pedido where decisao in ('recurso provido','recurso negado','recurso 100','recurso provido-reforma 100.1','recurso provido-reforma 100.2','recurso provido-devolucao 100.2','recurso 1001','recurso 1002','recurso 111','recurso manutencao do indeferimento 111','recurso exigencia','recurso exigencia 121','recurso ciencia','nulidade 1','nulidade 200','nulidade 201','nulidade 204','nulidade provida','nulidade negada','nulidade parcial') and year(rpi)=$ano and anulado=0 order by rpi asc";
				}
				else
				{
					$cmd = "select * from pedido where decisao in ('recurso provido','recurso negado','recurso 100','recurso provido-reforma 100.1','recurso provido-reforma 100.2','recurso provido-devolucao 100.2','recurso 1001','recurso 1002','recurso 111','recurso manutencao do indeferimento 111','recurso exigencia','recurso exigencia 121','recurso ciencia','nulidade 1','nulidade 200','nulidade 201','nulidade 204','nulidade provida','nulidade negada','nulidade parcial') and year(rpi)=$ano and month(rpi)=$mes and anulado=0 order by rpi asc";
				}
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$numerocd = montar_numerocd($numero);
					$instancia = $line['instancia'];
					$decisao = $line['decisao'];
					$codigo = $line['codigo'];
					$data = $line['rpi'];
					$etapa = $line['etapa'];
					$divisao = $line['divisao'];

					$numero1 = $numero;
					$numero2 = $numero;
					$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link, $cmd2);
					if ($line2 = mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2["numero1"];
						$numero2 = $line2["numero2"];
					}
					$numerocd1 = montar_numerocd($numero1);
					$numerocd2 = montar_numerocd($numero2);
					
					if ($decisao=='recurso 100' or $decisao=='recurso 1002' or $decisao=='recurso 1001')
					{
						$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and (decisao='recurso provido' or decisao='recurso provido-reforma 100.1'  or decisao='recurso provido-reforma 100.2' or decisao='recurso provido-devolucao 100.2') and anulado=0";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) continue;
					}
					if ($decisao=='recurso 111')
					{
						$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and (decisao='recurso negado' or decisao='recurso manutencao do indeferimento 111') and anulado=0";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) continue;
					}
					if ($decisao=='nulidade 200')
					{
						$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao='nulidade provida' and anulado=0";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) continue;
					}
					if ($decisao=='nulidade 201')
					{
						$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao='nulidade negada' and anulado=0";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) continue;
					}
					if ($decisao=='nulidade 204')
					{
						$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao='nulidade parcial' and anulado=0";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) continue;
					}

					$ano = substr($data,0,4);
					$mes = $meses[(int)substr($data,5,2)];
					echo "<tr>";
					echo "<td style='font-size: 12px;'> $ano </td>";
					echo "<td style='font-size: 12px;'> $mes </td>";
					
					$cmd2 = "select * from rpis_lidas where data='$data'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) $rpi = $line2['rpi'];
					$kmes = str_pad((int)substr($data,5,2),2,"0",STR_PAD_LEFT);
					$kdia = str_pad((int)substr($data,8,2),2,"0",STR_PAD_LEFT);
					$data2= "$kdia/$kmes/$ano";
					echo "<td style='font-size: 12px;'> $rpi [$data2] </td>";

					$despacho = 0;
					$parecer = '';
					if (($decisao=='recurso provido' or $decisao=='recurso 100' or $decisao=='recurso provido-reforma 100.1' or $decisao=='recurso provido-reforma 100.2' or $decisao=='recurso 1001' or $decisao=='recurso 1002' or $decisao=='recurso provido-devolucao 100.2') and $etapa==1) 
					{
						$parecer = 'Recurso Provido 1ª Etapa (DIRETO)';
						$despacho = "100";
						if ($decisao=='recurso provido-reforma 100.1' or $decisao=='recurso 1001') 
							$despacho = '100.1'; // PI0720954
						elseif ($decisao=='recurso provido-reforma 100.2' or $decisao=='recurso 1002'  or $decisao=='recurso provido-devolucao 100.2') 
							$despacho = '100.2'; // PI1007844
						else
						{
							$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and (decisao='recurso 1001' or decisao='recurso 1002') and anulado=0";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$x = $line2['decisao'];
								if ($x=='recurso 1001') $despacho='100.1';
								if ($x=='recurso 1002') $despacho='100.2';
							}
						}
					}
					elseif (($decisao=='recurso provido' or $decisao=='recurso 100' or $decisao=='recurso provido-reforma 100.1' or $decisao=='recurso 1001' or $decisao=='recurso provido-reforma 100.2' or $decisao=='recurso 1002'  or $decisao=='recurso provido-devolucao 100.2') and $etapa==2) 
					{
						$parecer = 'Recurso Provido 2ª Etapa';
						$despacho = '100';
						if ($decisao=='recurso provido-reforma 100.1' or $decisao=='recurso 1001') 
							$despacho = '100.1'; // PI0720954
						elseif ($decisao=='recurso provido-reforma 100.2' or $decisao=='recurso 1002'  or $decisao=='recurso provido-devolucao 100.2') 
							$despacho = '100.2'; // PI1007844
						else
						{
							$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and (decisao='recurso 1001' or decisao='recurso 1002') and anulado=0";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$x = $line2['decisao'];
								if ($x=='recurso 1001') $despacho='100.1';
								if ($x=='recurso 1002') $despacho='100.2';
							}
						}
					}
					elseif (($decisao=='recurso provido' or $decisao=='recurso 100' or $decisao=='recurso provido-reforma 100.1' or $decisao=='recurso 1001' or $decisao=='recurso provido-reforma 100.2' or $decisao=='recurso 1002'  or $decisao=='recurso provido-devolucao 100.2') and $etapa==3) 
					{
						$parecer = 'Recurso Provido 3ª Etapa';
						$despacho = "100";
						if ($decisao=='recurso provido-reforma 100.1' or $decisao=='recurso 1001') 
							$despacho = '100.1'; // PI0720954
						elseif ($decisao=='recurso provido-reforma 100.2' or $decisao=='recurso 1002'  or $decisao=='recurso provido-devolucao 100.2') 
							$despacho = '100.2'; // PI1007844
						else
						{
							$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and (decisao='recurso 1001' or decisao='recurso 1002') and anulado=0";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$x = $line2['decisao'];
								if ($x=='recurso 1001') $despacho='100.1';
								if ($x=='recurso 1002') $despacho='100.2';
							}
						}
					}
					elseif (($decisao=='recurso provido' or $decisao=='recurso 100' or $decisao=='recurso provido-reforma 100.1' or $decisao=='recurso 1001' or $decisao=='recurso provido-reforma 100.2' or $decisao=='recurso 1002'  or $decisao=='recurso provido-devolucao 100.2') and $etapa==4) 
					{
						$parecer = 'Recurso Provido 4ª Etapa';
						$despacho = "100";
						if ($decisao=='recurso provido-reforma 100.1' or $decisao=='recurso 1001') 
							$despacho = '100.1'; // PI0720954
						elseif ($decisao=='recurso provido-reforma 100.2' or $decisao=='recurso 1002'  or $decisao=='recurso provido-devolucao 100.2') 
							$despacho = '100.2'; // PI1007844
						else
						{
							$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and (decisao='recurso 1001' or decisao='recurso 1002') and anulado=0";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$x = $line2['decisao'];
								if ($x=='recurso 1001') $despacho='100.1';
								if ($x=='recurso 1002') $despacho='100.2';
							}
						}
					}
					elseif (($decisao=='recurso negado' or $decisao=='recurso 111' or $decisao=='recurso manutencao do indeferimento 111') and $etapa==1) 
					{
						$parecer = 'Recurso Negado 1ª Etapa (DIRETO)';
						$despacho = '111';
					}
					elseif (($decisao=='recurso negado' or $decisao=='recurso 111' or $decisao=='recurso manutencao do indeferimento 111') and $etapa==2) 
					{
						$parecer = 'Recurso Negado 2ª Etapa';
						$despacho = '111';
					}
					elseif (($decisao=='recurso negado' or $decisao=='recurso 111' or $decisao=='recurso manutencao do indeferimento 111') and $etapa==3) 
					{
						$parecer = 'Recurso Negado 3ª Etapa';
						$despacho = '111';
					}
					elseif ($decisao=='recurso ciencia' and $etapa==1) 
					{
						$parecer = 'Recurso Ciência 1ª Etapa';
						$despacho = '120';
					}
					elseif ($decisao=='recurso ciencia' and $etapa==2) 
					{
						$parecer = 'Recurso Ciência 2ª Etapa';
						$despacho = '120';
					}
					elseif ($decisao=='recurso ciencia' and $etapa==3) 
					{
						$parecer = 'Recurso Ciência 3ª Etapa';
						$despacho = '120';
					}
					elseif (($decisao=='recurso exigencia' or $decisao=='recurso exigencia 121') and $etapa==1) 
					{
						$parecer = 'Recurso Exigência 1ª Etapa';
						$despacho = '121';
					}
					elseif (($decisao=='recurso exigencia' or $decisao=='recurso exigencia 121') and $etapa==2) 
					{
						$parecer = 'Recurso Exigência 2ª Etapa';
						$despacho = '121';
					}
					elseif (($decisao=='recurso exigencia' or $decisao=='recurso exigencia 121') and $etapa==3) 
					{
						$parecer = 'Recurso Exigência 3ª Etapa';
						$despacho = '121';
					}
					elseif (($decisao=='recurso exigencia' or $decisao=='recurso exigencia 121') and $etapa==4) 
					{
						$parecer = 'Recurso Exigência 4ª Etapa';
						$despacho = '121';
					}
					elseif ($decisao=='nulidade provida' or $decisao=='nulidade 200') 
					{
						$parecer = 'Nulidade Provida';
						$despacho = '200';
					}
					elseif ($decisao=='nulidade negada' or $decisao=='nulidade 201') 
					{
						$parecer = 'Nulidade Negada';
						$despacho = '201';
					}
					elseif ($decisao=='nulidade parcial' or $decisao=='nulidade 204') 
					{
						$parecer = 'Nulidade Parcial';
						$despacho = '204';
					}
					elseif ($decisao=='nulidade 1') 
					{
						$parecer = 'Nulidade (parecer) Intim. Manifest.';
						$despacho = '205';
					}
					else	
					{
						$parecer = "Não identificado";
						$despacho = $decisao;
					}

					echo "<td style='font-size: 12px;'> $despacho </td>";
					echo "<td style='font-size: 12px;'><a href='http://siscap/adm/resposta.php?numero=$numero' target='_blank' STYLE='cursor:hand'> $numerocd2</a> </td>";
					echo "<td style='font-size: 12px;'> $parecer </td>";

					$login = '-';
					$cmd2 = "select * from examinador where codigo=$codigo and dono=1";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) $login = $line2['email'];

					echo "<td style='font-size: 12px;'> $login </td>";
					
					$nome = '-';
					if ($login=='ramorim2') $login='ramorim';
					$cmd2 = "select * from servidores where email='$login'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) $nome = $line2['nome'];
					//$nome = utf8_encode($line2['nome']);

					echo "<td style='font-size: 12px;'> $nome </td>";
					$setor = $divisao_complemento[$divisao];
					if ($setor=='CGREC/') $setor='CGREC/DIREP';
					echo "<td style='font-size: 12px;'> $setor </td>";
					$diretoria = 'DIRPA';
					if ($divisao=='cgrec' or $divisao=='direp') $diretoria = 'CGREC';
					echo "<td style='font-size: 12px;'> $diretoria </td>";
					echo "</tr>";
					$str = "$ano;$mes;$rpi [$data2];$despacho;$numerocd2;$parecer;$login;$nome;$setor;$diretoria"."\n";
					fputs($fp,$str);
				}
				mysqli_close($link);
				fclose($fp);
			?>

			</div>
			
	</table>			
	
	</body>

</html>