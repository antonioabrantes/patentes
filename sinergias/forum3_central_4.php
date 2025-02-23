<?php

	header('Content-Type: text/html; charset=utf-8');
	session_start();

	require("../../conf_plos.php");
    echo "Início: ".date("H:i")."<BR>";
	
	$examinador = @$_SESSION['login'];
	$nome = @$_SESSION['nome'];

	$examinador = 'abrantes';

	if ($examinador<>'abrantes')
	{
		echo "Você não está autorizado a entrar nesta página";
		exit();
	}

// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from CEPIT_SISCAP.SISCAP_PEDIDO where instancia in ('recurso cgrec','nulidade cgrec','recurso','nulidade') and extract(year from rpi)>=2020
// pedido.csv
// select * from CEPIT_SISCAP.SISCAP_EXAMINADOR where  email<>'sisadanu' and extract(year from data)>=2020
// examinador.csv 

// para atualizar dados:
// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from producao.pedido where year(rpi)=2020 and ( (instancia='recurso' and decisao in ('recurso provido','recurso negado','recurso provido anvisa')) or (instancia='nulidade' and decisao in ('nulidade provida','nulidade parcial','nulidade negada')) or (instancia='nulidade cgrec' and decisao in ('nulidade 200','nulidade 201','nulidade 204')) or (instancia='recurso cgrec' and decisao in ('recurso 111')))  and anulado=0
// salva em lixo.csv, apague primeira linha
// SELECT * FROM producao.examinador where year(data)>=2020 and email<>'sisadanu'
// salva em lixo1.csv, apague primeira linha
// http://localhost/central/forum3_central_4.php?action=1  // atualizar tabelas pedido e examinador
// http://cientistaspatentes.com.br/central/forum3_central_4.php?action=1
// http://localhost/central/forum3_central_4.php?action=4 // atualiza tabela consulta_conversao
// http://cientistaspatentes.com.br/central/forum3_central_4.php?action=4
// http://localhost/central/forum3_central_4.php?action=2&ano=2021&mes=12
// http://cientistaspatentes.com.br/central/forum3_central_4.php?action=2&ano=2021&mes=12

	if (empty($_REQUEST["action"])) {$action=0;} else {$action=trim($_REQUEST["action"]);}
	if (empty($_REQUEST["op"])) {$op=0;} else {$op=trim($_REQUEST["op"]);}
	if (empty($_REQUEST["ano"])) {$ano=2017;} else {$ano=trim($_REQUEST["ano"]);}
	if (empty($_REQUEST["mes"])) {$mes=1;} else {$mes=trim($_REQUEST["mes"]);}
	if (empty($_REQUEST["linha"])) {$linha=0;} else {$linha=trim($_REQUEST["linha"]);}

	echo "Atualizando tabela consulta_conversao<BR>";
	$examinador_cgrec = array ('abrantes','alciclea','cidade','cinopoli','darlan','darlan3','deborasg','edibraga','evbastos','fabios','fertc','giselleg','helenojc','helenojc2','jordy','leilan2','liraml','luiz','luizcvd','mariaa','moreira','mvasilva','ramorim','rcdutra','rockrio','rockrio2','rosanab','soniagb','telma');
	// ficou de fora leilan e helenojc2

	if ($action==2) // http://localhost/central/forum3_central_4.php?action=2&ano=2020&mes=1 esta rotina é usada para saber os pareceres a acada mes para serem consultados para se escolher o montar o caselaw
	{
		$total = 0;$i=0;
		$numeros_lidos = array();
		echo "Listando pareceres de decisão $ano $mes<BR>";
		$cmd = "select * from pedido as p, examinador as e where p.codigo=e.codigo and e.dono=1 and year(p.rpi)=$ano and month(p.rpi)=$mes and ( (p.instancia='recurso' and p.decisao in ('recurso provido','recurso negado','recurso provido anvisa')) or (p.instancia='nulidade' and p.decisao in ('nulidade provida','nulidade parcial','nulidade negada')) or (p.instancia='nulidade cgrec' and p.decisao in ('nulidade 200','nulidade 201','nulidade 204')) or (p.instancia='recurso cgrec' and p.decisao in ('recurso 111')))  and anulado=0 order by e.email";
		$res = mysqli_query($link,$cmd);echo "$cmd<BR>";
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			if (in_array($numero,$numeros_lidos)) continue;
			$numeros_lidos[$i]=$numero;
			$i = $i + 1;
			
			$codigo = $line['codigo'];
			$email = $line['email'];
			$idivisao = $line['divisao'];

			$str= '';
			$cmd3 = "select * from consulta_conversao where numero='$numero'";
			$res3 = mysqli_query($link,$cmd3);
			if ($line3=@mysqli_fetch_assoc($res3))
			{
				$caso = $line3['caso'];
				$ano = substr($line3['data'],2,2);
				$str = "T$caso/$ano";
			}


			if ($idivisao=='direp' or $idivisao=='cgrec')
			{
				if (in_array($email,$examinador_cgrec))
				{
					echo "$idivisao $email $numero $str<BR>";
					$total++;
				}
				//else
				//	echo "$idivisao $email $numero $str<BR>";
			}
			else
			{
				echo "$idivisao $email $numero $str<BR>";
				$total++;
			}
		}
		echo "Fim de processamento: $total";
		exit();
	} // confira direto na tabela SELECT * FROM `consulta_conversao` WHERE year(data)=2017 and month(data)=8 and (divisao='direp' or divisao='cgrec')

	if ($action==1) // http://localhost/central/forum3_central_4.php?action=1
	{   
		// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from producao.pedido where year(rpi)>=2020 and ( (instancia='recurso' and decisao in ('recurso provido','recurso negado')) or (instancia='nulidade' and decisao in ('nulidade provida','nulidade parcial','nulidade negada')) or (instancia='nulidade cgrec' and decisao in ('nulidade 200','nulidade 201','nulidade 204')) or (instancia='recurso cgrec' and decisao in ('recurso 111')))  and anulado=0
		// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from CEPIT_SISCAP.SISCAP_PEDIDO where instancia in ('recurso cgrec','nulidade cgrec','recurso','nulidade') and extract(year from rpi)>=2020 and anulado=0
		// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from CEPIT_SISCAP.SISCAP_PEDIDO where decisao in ('9.2','indeferimento','deferimento','defanvisa') and extract(year from rpi)>=2020 and anulado=0
		// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from CEPIT_SISCAP.SISCAP_PEDIDO where ((decisao in ('9.2','indeferimento','deferimento','defanvisa')) or (instancia in ('recurso cgrec','nulidade cgrec','recurso','nulidade'))) and extract(year from rpi)>=2020 and anulado=0
		// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from pedido where ((decisao in ('9.2','indeferimento','deferimento','defanvisa')) or (instancia in ('recurso cgrec','nulidade cgrec','recurso','nulidade'))) and year(rpi)>=2020 and anulado=0
		
		$fname="pedido.csv";
		echo "Processando $fname<BR>";
		@ $fp = fopen($fname,"r");
		if (!$fp)
			echo "Não foi identificado o arquivo texto $fname";
		else
		{
			while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
			{
				$texto= fgets($fp);
				if ($texto=='') continue;
				$texto = trim(str_replace('"','',$texto));
				$texto = trim(str_replace(',',';',$texto)); 
				list($numero,$prioridade,$instancia,$decisao,$prioritario,$cc1,$anulado,$codigo,$rpi,$divisao,$etapa) = explode(';',$texto);
				$numero = trim($numero);
				if ($numero=='NUMERO') continue;
				$prioridade = trim($prioridade);
				if ($prioridade=='(null)') $prioridade='';
				$instancia = trim($instancia);
				$decisao = trim($decisao);
				$prioritario = trim($prioritario);
				$cc1 = trim($cc1);
				$divisao=trim($divisao);
				$cmd2 = "select * from pedido where codigo=$codigo";
				$res2 = mysqli_query($link,$cmd2);
				if (!$line2=@mysqli_fetch_assoc($res2))				
				{
					$cmd = "insert ignore into pedido (numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa) values ('$numero','$prioridade','$instancia','$decisao','$prioritario','$cc1','$anulado','$codigo','$rpi','$divisao','$etapa')";
					echo "$cmd;<BR>";
					//exit();
					$res = mysqli_query($link,$cmd);
				}
			}
		}
		echo "Fim processamento<BR>";
		exit();
	}

	if ($action==7) // http://localhost/central/forum3_central_4.php?action=7
	{   

		$total = 0;$lido = 0;
		$fname="historico.csv";
		echo "Processando $fname<BR>";
		@ $fp = fopen($fname,"r");
		if (!$fp)
			echo "Não foi identificado o arquivo texto $fname";
		else
		{
			while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
			{
				$texto= fgets($fp);
				if ($texto=='') continue;
				$total++;
				if ($total<$linha) continue;
				if ($lido==50000)
				{
					echo "Fim processamento: <a href='forum3_central_4.php?action=7&linha=$linha'>proximo</a>";
					exit();
				}
				$lido = $lido + 1;
				$linha = $linha + 1;

				$texto = trim(str_replace('"','',$texto));
				$texto = trim(str_replace(',',';',$texto)); 
				list($numero,$datahora,$descricao) = explode(';',$texto);
				$data = substr($datahora,0,10);
				$numero = trim($numero); // "112017015719";"2022-09-06 00:00:00";"oscar/seexp retirou o pedido na fila de 9.1";"2022-09-06 12:49:43"
				if ($numero=='NUMERO') continue;
				$cmd2 = "select * from historico where numero='$numero' and data='$data' and descricao='$descricao'";
				$res2 = mysqli_query($link,$cmd2);
				if (!$line2=@mysqli_fetch_assoc($res2))				
				{
					//echo "$cmd2<BR>";
					$cmd = "insert ignore into historico (numero,data,descricao,datahora) values ('$numero','$data','$descricao','$data')";
					echo "$cmd;<BR>";
					//exit();
					$res = mysqli_query($link,$cmd);
				}
			}
		}
		echo "Fim processamento: $lido<BR>";
		exit();
	}

	if ($action==8) // http://localhost/central/forum3_central_4.php?action=8 1125865
	{   

		if ($op==4)
		{
			$total = 0;
			$cmd = "SELECT * FROM assinaturas where nome like '%:%'";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$id = $line['id'];
				$nome = $line['nome'];
				$pos = strpos($nome, ':');
				if ($pos>0) $nome = substr($nome, 0, $pos);
				$cmd2 = "UPDATE assinaturas set nome='$nome' where id=$id";
				echo "$cmd2;<BR>";
				$res2 = mysqli_query($link,$cmd2);
				$total = $total + 1;
				if ($total>10000) exit();
			}
			echo "Fim de processamento";
			exit();
		}

		if ($op==3)
		{
			$total = 0;
			$cmd = "SELECT * FROM assinaturas GROUP BY codigo,nome,dt_assina HAVING COUNT(*) > 1 order by codigo asc";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$codigo = $line['codigo'];
				$nome = $line['nome'];
				$dt_assina = $line['dt_assina'];
				$cmd2 = "SELECT * FROM assinaturas WHERE codigo=$codigo and nome='$nome' and dt_assina='$dt_assina' order by id desc";
				$res2 = mysqli_query($link,$cmd2); //echo "$cmd2;<BR>";
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$id = $line2['id'];
					$cmd2 = "delete from assinaturas where id='$id'";
					$res2 = mysqli_query($link,$cmd2);
					echo "$cmd2;<BR>";
					$total = $total + 1;
					if ($total>1000) exit();
				}
			}
			echo "Fim de processamento";
			exit();
		}

// eliminar duplicatas na tabela assinaturas : crie um campo id como chave primária
// SELECT codigo, COUNT(*) FROM assinaturas GROUP BY codigo,nome,dt_assina HAVING COUNT(*) > 1; por exemplo codigo 768 tem 2 duplicatas
// DELETE u1 FROM assinaturas u1 INNER JOIN (SELECT MIN(id) as id, codigo FROM assinaturas GROUP BY codigo HAVING COUNT(*) > 1) u2 ON u1.codigo = u2.codigo AND u1.id > u2.id;
// SELECT count(*) FROM `assinaturas` WHERE 1 resulta 73513 com 7221 duplicados


		$total = 0;$lido = 0; 
		$array_nomes = array();
		$fname="assinaturas.csv";
		echo "Processando $fname<BR>";
		@ $fp = fopen($fname,"r");
		if (!$fp)
			echo "Não foi identificado o arquivo texto $fname";
		else
		{
			while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
			{
				$texto= fgets($fp);
				$total = $total + 1;
				//echo "$total $linha<BR>";
				if ($total<$linha) continue;
				if ($lido==50000)
				{
					echo "Fim processamento: <a href='forum3_central_4.php?action=8&linha=$linha'>$codigo</a>";
					exit();
				}
				$lido = $lido + 1;
				$linha = $linha + 1;
				if ($texto=='') continue;
				$texto = trim(str_replace('"','',$texto));
				$texto = trim(str_replace(',',';',$texto)); 
				list($codigo,$nome,$dt_assina) = explode(';',$texto); // "1849202","HELENO JOSE COSTA BEZERRA NETTO:89890980980","2024-06-21"
				$pos = strpos($nome, ':');
				if ($pos>0) $nome = substr($nome, 0, $pos);
				$nome = trim($nome);
				$ano = substr($dt_assina,0,4);
				$data = substr($dt_assina,0,10);
				if ($ano>=2023)
				{
					$cmd2 = "select * from assinaturas where codigo=$codigo and nome='$nome' and dt_assina='$data'";
					$res2 = mysqli_query($link,$cmd2);
					if (!$line2=@mysqli_fetch_assoc($res2))				
					{
						$cmd = "insert ignore into assinaturas (codigo,nome,dt_assina) values ('$codigo','$nome','$data')";
						echo "$cmd;<BR>";
						//exit();
						$res = mysqli_query($link,$cmd);
					}
					$cmd2 = "select * from servidores where nome='$nome'";
					$res2 = mysqli_query($link,$cmd2); //echo "$cmd2<BR>";
					if (!$line2=@mysqli_fetch_assoc($res2))
					{
						if (in_array($nome,$array_nomes)) continue;
						$array_nomes[] = $nome;
					}
				}
			}
		}
		foreach ($array_nomes as $nome)
			echo "update servidores set nome='' where nome='$nome';<BR>";

		echo "Fim processamento<BR>";
		exit();
	}

	if ($action==6) // http://localhost/central/forum3_central_4.php?action=6
	{  	
		// select * from CEPIT_SISCAP.SISCAP_EXAMINADOR where  email<>'sisadanu' and extract(year from data)>=2020 and codigo in (select codigo from CEPIT_SISCAP.SISCAP_PEDIDO where ((decisao in ('9.2','indeferimento','deferimento','defanvisa')) or (instancia in ('recurso cgrec','nulidade cgrec','recurso','nulidade'))))

		$fname="examinador.csv"; 
		$count = 0;
		echo "Processando $fname<BR>";
		@ $fp = fopen($fname,"r");
		if (!$fp)
			echo "Não foi identificado o arquivo texto $fname";
		else
		{
			while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
			{
				$texto= fgets($fp);
				if ($texto=='') continue;
				$texto = trim(str_replace('"','',$texto));
				$texto = trim(str_replace(',',';',$texto));
				list($email,$data,$codigo,$dono,$aceite) = explode(';',$texto); // abrantes , 2003-01-07 ,8,1, 0000-00-00
				$email = trim($email);
				if ($email=='EMAIL') continue;
				$data = trim($data);
				$aceite = trim($aceite);
				$cmd2 = "select * from examinador where codigo=$codigo";
				$res2 = mysqli_query($link,$cmd2);
				if (!$line2=@mysqli_fetch_assoc($res2))				
				{
					if ($count==0)
						$cmd = "insert ignore into examinador (email,data,codigo,dono,aceite) values ('$email','$data',$codigo,$dono,'$aceite')";
					else
						$cmd = $cmd.",('$email','$data',$codigo,$dono,'$aceite')";
					
					$count++;
					if ($count>500) 
					{
						$res = mysqli_query($link,$cmd);
						echo "$cmd;<BR>";
						$count=0;
					}
				}
			}
			if ($count>0) 
			{
				$res = mysqli_query($link,$cmd);
				echo "$cmd;<BR>";
				$count=0;
			}

		}
		exit();

		$fname="consulta_conversao.csv"; // "102012000819";"540787";"2017-01-17";"3240";"direp"
		@ $fp = fopen($fname,"r");
		if (!$fp)
			echo "Não foi identificado o arquivo texto $fname";
		else
		{
			while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
			{
				$texto= fgets($fp);
				$texto = trim(str_replace('"','',$texto));
				list($numero,$codigo,$data,$caso,$divisao) = split(';',$texto);
				$numero = montar_numerosd(trim($numero));
				if ($numero<>'')
				{
					$cmd = "select * from consulta_conversao where numero='$numero' and codigo=$codigo and data='$data'";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res))				
					{
						$caso_lido = $line['caso'];
						if ($caso<>$caso_lido)
						{
							$cmd = "update consulta_conversao set caso=$caso where numero='$numero' and codigo=$codigo and data='$data'";
							echo "$cmd;<BR>";
							$res = mysqli_query($link,$cmd);

						}
					}
					else
					{
						$cmd = "insert into consulta_conversao (numero,codigo,data,caso,divisao) values ('$numero','$codigo','$data','$caso','$divisao')";
						echo "$cmd;<BR>";
						$res = mysqli_query($link,$cmd);

					}
				}
			}
		}
	}

	if ($action==4) // http://localhost/central/forum3_central_4.php?action=4 
	{				// http://cientistaspatentes.com.br/central/forum3_central_4.php?action=4

//		$cmd2 = "select * from consulta_conversao where caso>=4427";
//		$res2 = execute_query($cmd2);
//		$caso = 4427;
//		while ($line2=@mysql_fetch_array($res2,MYSQL_ASSOC))
//		{
//			$numero = $line2['numero'];
//			$codigo = $line2['codigo'];
//			$cmd3 = "update consulta_conversao set caso=$caso where numero='$numero' and codigo=$codigo";
//			echo "$cmd3;<BR>";
//			$caso++; // renumera os casos desde 3263, sendo que o 3263 fca o memso numero, so vai atualizar mesmo os que estavam com caso zerado
//		}

		$cmd2 = "select * from consulta_conversao where year(data)=2023 order by caso desc";
		$res2 = mysqli_query($link,$cmd2);
		if ($line2=@mysqli_fetch_assoc($res2))	$caso = $line2['caso']+1;

		echo "Fim de processamento: $caso<BR><BR>";
		//exit();

	// select * from producao.pedido where year(rpi)=2018 and ( (instancia='recurso' and decisao in ('recurso provido','recurso negado')) or (instancia='nulidade' and decisao in ('nulidade provida','nulidade parcial','nulidade negada')) or (instancia='nulidade cgrec' and decisao in ('nulidade 200','nulidade 201','nulidade 204')) or (instancia='recurso cgrec' and decisao in ('recurso 111')))  and anulado=0
	// SELECT * FROM producao.pedido where instancia='recurso' and decisao in ('recurso provido','recurso negado') and anulado=0
	// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from producao.pedido where rpi<>'0000-00-00' and ( (instancia='recurso' and decisao in ('recurso provido','recurso negado')) or (instancia='nulidade' and decisao in ('nulidade provida','nulidade parcial','nulidade negada')) or (instancia='nulidade cgrec' and decisao in ('nulidade 200','nulidade 201','nulidade 204')) or (instancia='recurso cgrec' and decisao in ('recurso 111')))  and anulado=0
	// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from producao.pedido where year(rpi)=2018 and ( (instancia='recurso' and decisao in ('recurso provido','recurso negado')) or (instancia='nulidade' and decisao in ('nulidade provida','nulidade parcial','nulidade negada')) or (instancia='nulidade cgrec' and decisao in ('nulidade 200','nulidade 201','nulidade 204')) or (instancia='recurso cgrec' and decisao in ('recurso 111')))  and anulado=0
	// salva em lixo.csv, apague primeira linha, importar para tabela pedido o arquivo CSV, demarcar separador por ,
	// salve tambem as entradas novas na tabela examinador SELECT * FROM producao.examinador where year(data)>=2018 and email<>'sisadanu'
	// http://localhost/forum3_central_4.php?action=1 para carrega lixo.csv e lixo1.cesv nas tabelas pedido e examinador

//		$cmd = "select * from consulta_conversao where 1";
//		$res = execute_query($cmd);
//		while ($line=@mysql_fetch_array($res,MYSQL_ASSOC))
//		{
//			$numero5 = $line['numero'];
//			$codigo5 = $line['codigo'];
//			$data = $line['data'];
//			$rpi = null;
//			$cmd2 = "select * from pedido where numero='$numero5' and rpi='$data'";
//			$res2 = execute_query($cmd2);
//			if ($line2=@mysql_fetch_array($res2,MYSQL_ASSOC)) $codigo3 = $line2['codigo'];
//
//			if ($codigo5<>$codigo3)
//			{
//				$cmd2 = "update consulta_conversao set codigo=$codigo3 where numero='$numero5' and codigo=$codigo5";
//				$res2 = execute_query($cmd2);
//				echo "$cmd2<BR>";
//			}
//		}

		$total1 = 0;
		$total2 = 0;
		$count = 0;
		$ano = date('Y');
		$cmd = "select * from pedido where instancia='recurso' and decisao in ('recurso provido','recurso negado') and anulado=0 and rpi<>'0000-00-00' and year(rpi)=$ano";
		$cmd = "select * from pedido where instancia='recurso' and decisao in ('recurso provido','recurso negado') and anulado=0";
		$cmd = "select * from pedido where year(rpi)=2023 and ( (instancia='recurso' and decisao in ('recurso provido','recurso negado','recurso provido anvisa')) or (instancia='nulidade' and decisao in ('nulidade provida','nulidade parcial','nulidade negada')) or (instancia='nulidade cgrec' and decisao in ('nulidade 200','nulidade 201','nulidade 204')) or (instancia='recurso cgrec' and decisao in ('recurso 111'))) and anulado=0 order by rpi asc";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))				
		{
			$count++;
			$numero5 = $line['numero'];echo "$numero5<BR>";
			$codigo5 = $line['codigo'];
			$data = $line['rpi'];
			$divisao = $line['divisao'];
			$cmd2 = "select * from consulta_conversao where numero='$numero5'"; // 122012022787 2017-02-21
			$res2 = mysqli_query($link,$cmd2);
			if (!$line2=@mysqli_fetch_assoc($res2))				
			{
				$cmd2 = "insert into consulta_conversao (numero, codigo, data, caso, divisao) values ('$numero5',$codigo5,'$data',$caso,'$divisao')";
				$res2 = mysqli_query($link,$cmd2);
				$total1++;
				$caso++;
				echo "$count $cmd2<BR>";
			}
			else
			{
				$data_lida = $line2['data'];
				if (($data_lida=='0000-00-00' and $data<>'0000-00-00') or ($data_lida<$data and $data<>'0000-00-00'))
				{
					$cmd2 = "update consulta_conversao set data='$data' where numero='$numero5'";
					$res2 = mysqli_query($link,$cmd2);
					$total2++;
					echo "$count $cmd2<BR>";
				}
			}
		}
		if ($total1>0)	echo "Inseridos $total1 novos recursos para a base de dados<BR>";
		if ($total2>0)	echo "Atualizados $total2 novos recursos para a base de dados<BR>";
		echo "Fim de processamento<BR>";
	}
?>

<HTML><HEAD><TITLE>Avaliação da produção dos examinadores de patente</TITLE>
<meta http-equiv="content-type" content="text/html; charset=latin1" />
</HEAD>

<BODY bgcolor=#fdf1e3 leftMargin=20 marginheight="0" marginwidth="0" >

<?php
	if ($action==5)
	{
		$cmd = "select * from consulta_comment where 1";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))	
		{
			$codigo = $line['codigo'];
			$email = $line['email'];
			$comentario = $line['comentario'];
			$status = $line['status'];
			$data = $line['data'];
			$modulo = $line['modulo'];
			$divisao = $line['divisao'];
			$numero = $line['numero'];
			$cmd2 = "insert into consulta_comment (codigo,email,comentario,status,data,modulo,divisao,numero) values ('$codigo','$email','$comentario','$status','$data','$modulo','$divisao','$numero')";
			echo "$cmd2;<BR>";
		}
		echo "Fim de processamento";
		exit();
	}

	if ($action==3)
	{
		$fname="justica.csv";
		@ $fp = fopen($fname,"r");
		if (!$fp)
			echo "Não foi identificado o arquivo texto $fname";
		else
		{
	 		//$cmd2 = "mysql_query('SET character_set_connection=utf8')";
			//$res2 = execute_query($cmd2);
			//$cmd2 = "mysql_query('SET character_set_client=utf8')";
			//$res2 = execute_query($cmd2);
			//$cmd2 = "mysql_query('SET character_set_results=utf8')";
			//$res2 = execute_query($cmd2);

			while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
			{
				$texto= fgets($fp);
				list($origem,$referencia,$documento,$partes,$relator,$data,$patente,$resumo,$exibido,$email) = split(';',$texto);
				$referencia=trim($referencia);
				$cmd2 = "select * from justica where referencia='$referencia'";
				$res2 = mysqli_query($link,$cmd2);
				if (!$line2=@mysqli_fetch_assoc($res2))	
				{
					//echo "$origem<BR>$referencia<BR>$documento<BR>$partes<BR>$relator<BR>$data<BR>$patente<BR>$resumo<BR>$exibido<BR>$email<BR><BR>";
					$cmd2 = "insert into justica (origem,referencia,documento,partes,relator,data,patente,resumo,exibido,email) values ('$origem','$referencia','$documento','$partes','$relator','$data','$patente','$resumo','$exibido','$email')";
					//$res2 = execute_query($cmd2);
					echo "$cmd2;<BR>";
				}
			}
		}
		echo "Fim de processamento";
		exit();
	}
?>

</BODY>
</HTML>