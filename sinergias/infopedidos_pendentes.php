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
        'Recursos pendentes' => 'infopedidos_total_pendentes.php',
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
		$divisoes = array ('dirpa', 'ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut');
		if (empty($_REQUEST["setor"])) {$setor='CGPAT III/DICEL';} else {$setor=$_REQUEST["setor"];}
		
		@ $fp = fopen("data/info.csv","w");
		$divisao = $complemento_divisao[$setor];
	?>
	
		<h1>Pedidos pendentes na <?php echo $setor;?> em Recursos de Patentes (COREP) </h1>

		<center>
		<form action="infopedidos_pendentes.php" method="post" name="postDivisao">
		<div class="col-md-6 d-flex align-self-center"><!-- Textos da seção -->
			<select class="form-control" name="setor">
			<?php
				foreach ($divisoes as $idivisao)
				{
					$isetor = $divisao_complemento[$idivisao];
					if ($setor==$isetor)
						echo "<option selected>$isetor</option>";
					else
						echo "<option>$isetor</option>";
				}
			?>
			</select>
			<input type="submit" class="btn btn-primary" value="Buscar">
		</div>
		</form>

		<a href="<?php echo "data/info.csv";?>" target="_blank">
		<h1><span class="fas fa-file fa-1x text-white-80"></span>&nbsp;&nbsp;<?php echo $total; ?> registros encontrados. </h1>
		</a>
		<BR><BR>
		</center>
		
		<div class="table-responsive">
		<table class="table table-hover align-middle table-status table-striped">

			<thead>
			<tr width=80%>
				<th width=6%>Número</th>
				<th width=6%>12.2</th>
				<th width=8%>Setor</th>
			</tr>
			</thead>


	<?php
		echo "<TBODY>";$total=0;$total_fora=0;$soma_itens=0;
		$total=0;
		$i=0;$total1=0;$total=0;$recurso_providos=0;$recurso_negados=0;$recurso_prejudicados=0;$recurso_anulados=0;$recurso_pendentes=0;$recurso_outros=0;$recurso_intermediarios=0;
		$recurso_outros_array = array();
		$recurso_prejudicados_array = array();
		$recurso_anulados_array = array();
		$recurso_providos_array = array();
		$recurso_negados_array = array();
		$recurso_intermediarios_array = array();
		$recurso_pendentes_array = array();
		$divisoes2 = array ('dirpa','ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut');
		$numeros_lidos = array();
		for ($k=0;$k<=$i;$k++) $numeros_lidos[$k]="";
		$total=0;$recurso_providos=0;$recurso_negados=0;$recurso_prejudicados=0;$recurso_anulados=0;$recurso_pendentes=0;$recurso_outros=0;$recurso_intermediarios=0;
		$total_array = array();
		foreach ($divisoes2 as $idivisao)
		{
			$total_array[$idivisao]=0;
			$recurso_outros_array[$idivisao]=0;
			$recurso_prejudicados_array[$idivisao]=0;
			$recurso_anulados_array[$idivisao]=0;
			$recurso_providos_array[$idivisao]=0;
			$recurso_negados_array[$idivisao]=0;
			$recurso_intermediarios_array[$idivisao]=0;
			$recurso_pendentes_array[$idivisao]=0;
		}
		$array_numero = array();
		$array_data = array();
		$array_divisao = array();
		$ii = 0;
		
		$ano = 2018;
		$cmd = "select * from arquivados where despacho='12.2' and year(data)>=$ano order by data asc";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$data = $line['data'];
			$anulado = $line['anulado'];
			$data12 = $data;
			$numero = $line['numero'];
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
			$numerocd1 = montar_numerocd($numero1);
			$numerocd2 = montar_numerocd($numero2);
	
			$idivisao = '';
			$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('indeferimento','9.2')";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
				$idivisao = $line2['divisao'];
			else
			{
				if (identificado_mu($numero))
					$idivisao='dimut';
				else
				{
					$cmd2 = "SELECT * FROM classes where numero='$numero1' or numero='$numero2'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$classificacao = $line2['descricao'];
						$symbol = trim(ler_symbol($classificacao));
						$idivisao = ler_divisao($link,$classificacao);
					}
				}
				if ($idivisao=='dipem') $idivisao='diciv';
				if (!in_array($idivisao,$divisoes2)) 
				{
					echo "$numero $idivisao não achei a divisão $cmd2<BR>";
					//$idivisao='dirpa';
				}
			}
			
			if ($idivisao<>$divisao) continue;

			if ($anulado==0)
			{
				$buscar_despacho = true;
				$testar_outros = true;
				if ($numero=='PI0703369') $testar_outros = false; // exceções em que temos dois 12.2
				$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('recurso 131','recurso 135','recurso 136','recurso 137','recurso 138','recurso 139','recurso 140') and rpi>'$data12' and anulado=0 and rpi<='2024-12-31'"; 
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2) and $testar_outros)
				{
					$data = $line2['rpi'];
					$decisao = $line2['decisao'];
					
					//$cmd2 = "SELECT * FROM rpis_lidas where data='$data'";
					//$res2 = mysqli_query($link,$cmd2);
					//if ($line2=@mysqli_fetch_assoc($res2)) $anulado = $line2['data'];

					$recurso_outros++;
					$recurso_outros_array[$idivisao]++;
					$recurso_outros_array['dirpa']++;
					//if (strlen($numero)==12)
					//	echo "BR$numero;$idivisao;$decisao;$data;outros;12.2;$data12<BR>";
					//else
					//	echo "$numero;$idivisao;$decisao;$data;outros;12.2;$data12<BR>";
					
					$buscar_despacho = false;
					$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('recurso 130','recurso provido anvisa','recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111','recurso exigencia','recurso exigencia 121','recurso ciencia') and rpi<>'0000-00-00' and anulado=0 and rpi<='2024-12-31' and rpi>'$data12'";
					$res2 = mysqli_query($link,$cmd2); 
					if ($line2=@mysqli_fetch_assoc($res2)) $buscar_despacho = true;
				
				}
				if ($buscar_despacho)
				{
					$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('recurso 130') and rpi<>'0000-00-00' and anulado=0 and rpi<='2024-12-31' and rpi>'$data12'";
					$res2 = mysqli_query($link,$cmd2); 
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$data = $line2['rpi'];
						$decisao = $line2['decisao'];
						$recurso_prejudicados++;
						$recurso_prejudicados_array[$idivisao]++;
						$recurso_prejudicados_array['dirpa']++;
						//if (strlen($numero)==12)
						//	echo "BR$numero;$idivisao;$decisao;$data;prejudicados;12.2;$data12<BR>";
						//else
						//	echo "$numero;$idivisao;$decisao;$data;prejudicados;12.2;$data12<BR>";
						$total++;
						$total_array[$idivisao]++;
						$total_array['dirpa']++;
					}
					else
					{
						$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('recurso provido anvisa','recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111','recurso 1001','recurso provido-reforma 100.1','recurso 1002','recurso provido-reforma 100.2','recurso provido-devolucao 100.2') and rpi>'$data12' and anulado=0 and rpi<='2024-12-31'";
						$res2 = mysqli_query($link,$cmd2); //echo "$cmd2<BR>";
						if ($line2=@mysqli_fetch_assoc($res2))
						{
							$numero = $line['numero'];
							$data = $line2['rpi'];
							$decisao = $line2['decisao'];
							if ($decisao=='recurso provido' or $decisao=='recurso 100' or $decisao=='recurso provido anvisa' or $decisao=='recurso 1001' or $decisao=='recurso provido-reforma 100.1' or $decisao=='recurso 1002' or $decisao=='recurso provido-reforma 100.2' or $decisao=='recurso provido-devolucao 100.2')
							{
								$recurso_providos++;
								$recurso_providos_array[$idivisao]++;
								$recurso_providos_array['dirpa']++;
								//if (strlen($numero)==12)
								//	echo "BR$numero;$idivisao;$decisao;$data;providos;12.2;$data12<BR>";
								//else
								//	echo "$numero;$idivisao;$decisao;$data;providos;12.2;$data12<BR>";
								$total++;
								$total_array[$idivisao]++;
								$total_array['dirpa']++;
							}
							else
							{
								if ($decisao=='recurso negado' or $decisao=='recurso 111' or $decisao=='recurso manutencao do indeferimento 111')
								{
									$recurso_negados++;
									$recurso_negados_array[$idivisao]++;
									$recurso_negados_array['dirpa']++;
									//if (strlen($numero)==12)
									//	echo "BR$numero;$idivisao;$decisao;$data;negados;12.2;$data12<BR>";
									//else
									//	echo "$numero;$idivisao;$decisao;$data;negados;12.2;$data12<BR>";
									$total++;
									$total_array[$idivisao]++;
									$total_array['dirpa']++;
								}
							}
						}
						else
						{
							$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('recurso exigencia','recurso exigencia 121','recurso ciencia') and rpi>'$data12' and anulado=0 and rpi<='2024-12-31' order by rpi desc";
							$res2 = mysqli_query($link,$cmd2); //echo "$cmd2<BR>";
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$data = $line2['rpi'];
								$decisao = $line2['decisao'];
								$recurso_intermediarios++;
								$recurso_intermediarios_array[$idivisao]++;
								$recurso_intermediarios_array['dirpa']++;
								//if (strlen($numero)==12)
								//	echo "BR$numero;$idivisao;$decisao;$data;intermediarios;12.2;$data12<BR>";
								//else
								//	echo "$numero;$idivisao;$decisao;$data;intermediarios;12.2;$data12<BR>";
								$total++;
								$total_array[$idivisao]++;
								$total_array['dirpa']++;
							}
							else
							{
								if ($numero=='PI0312636') // 2016 PI0312636, teve o 12.2 anulado, não é prejudicado, 2012 PI0108115 já foi contabilizado como outros mas não é pendente
								{
									$recurso_outros++;
									$recurso_outros_array[$idivisao]++;
									$recurso_outros_array['dirpa']++;
									//if (strlen($numero)==12)
									//	echo "BR$numero;$idivisao;$decisao;$data;outros;12.2;$data12<BR>";
									//else
									//	echo "$numero;$idivisao;$decisao;$data;outros;12.2;$data12<BR>";
								}
								elseif ($numero=='PI0103113' or $numero=='PI0409722') //  2012 PI0103113 foi prejudicado mas nao tem 130 mas nao é pendente pois foi prejudicado mesmo
								{
									$recurso_prejudicados++;
									$recurso_prejudicados_array[$idivisao]++;
									$recurso_prejudicados_array['dirpa']++;
									//if (strlen($numero)==12)
									//	echo "BR$numero;$idivisao;$decisao;$data;prejudicados;12.2;$data12<BR>";
									//else
									//	echo "$numero;$idivisao;$decisao;$data;prejudicados;12.2;$data12<BR>";
									$total++;
									$total_array[$idivisao]++;
									$total_array['dirpa']++;
								}
								else
								{
									$recurso_pendentes++;
									$recurso_pendentes_array[$idivisao]++;
									$recurso_pendentes_array['dirpa']++;
									//if (strlen($numero)==12)
									//	echo "BR$numero;$idivisao;;;pendentes;12.2;$data12<BR>";
									//else
									//	echo "$numero;$idivisao;;;pendentes;12.2;$data12<BR>";
									$total++;
									$total_array[$idivisao]++;
									$total_array['dirpa']++;
									$array_numero[$ii]=$numero;
									$array_data[$ii]=$data12;
									$array_divisao[$ii]=$idivisao;
									$ii++;
								}
							}
						}
					}
				}
			}
		}
		
	?>

	<?php
		$login = '';
		$setor = '';
		foreach ($array_numero as $key=>$value)
		{
			echo "<tr>";
			$numero = $array_numero[$key];
			$numerocd2 = montar_numerocd($numero2);
			$data = $array_data[$key];
			$setor = $divisao_complemento[$array_divisao[$key]];
			echo "<td style='font-size: 12px;'><a href='http://siscap/adm/resposta.php?numero=$numero' target='_blank' STYLE='cursor:hand'> $numerocd2</a> </td>";
			echo "<td style='font-size: 12px;'> $data </td>";
			echo "<td style='font-size: 12px;'> $setor </td>";
			echo "</tr>";
			$str = "$numero;$data;$setor"."\n";
			fputs($fp,$str);
			echo "</tr>";
		}
		mysqli_close($link);
		fclose($fp);
	?>

	</div>
			
	</table>			
	
	</body>

</html>