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
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Produção da CGREC / Equipe</title>

	
	<!-- jQuery -->
	<script src="./js/jquery-latest.min.js"></script>

	<!-- Demo stuff -->
	<link rel="stylesheet" href="./css/jq.css">
	<link href="../css/prettify.css" rel="stylesheet">
	<script src="../js/prettify.js"></script>
	<script src="../js/docs.js"></script>
	<link rel="stylesheet" type="text/css" href="css/estoque4d.css">
	<link rel="icon" href="imagens/favicon2.png">
	<link rel="stylesheet" type="text/css" href="css/marcas.css">

	<!-- Tablesorter: required -->
	<link rel="stylesheet" href="../css/theme.blue.css">
	<script src="../js/jquery.tablesorter.js"></script>

	<!-- Tablesorter: optional -->
	<link rel="stylesheet" href="./css/jquery.tablesorter.pager.css">
	<script src="../js/jquery.tablesorter.pager.js"></script>
	<script id="js">$(function() {

	// initial sort set using sortList option
	$(".table1").tablesorter({
		theme : 'blue',
		headers: {
		  0: { sorter: true, parser: false },
		  1: { sorter: false, parser: false },
		  2: { sorter: false, parser: false }
		}
	});


});</script>


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
	<BR><BR>


<?php
	if (empty($_REQUEST["divisao"])) {$divisao='direp';} else {$divisao=$_REQUEST["divisao"];}
	$complemento = $divisao_complemento[$divisao];
	echo "<h1> Equipe de Segunda Instância de Patentes (CGREC/COREP)</h1>";
	echo '<a href="cgrecprod.php?ano=2013&intervalo=6" target="_blank"><IMG SRC="img/graficos.png" ALIGN=CENTER></a><BR>';
?>
	
<div id="main">
<table class="table1 tablesorter tablesorter-blue" role="grid">
	<thead>
		<tr role="row" class="tablesorter-headerRow">
			<th data-column="0" class="tablesorter-header tablesorter-headerUnSorted" tabindex="0" scope="col" role="columnheader" aria-disabled="false" unselectable="on" aria-sort="none" aria-label="Origem" style="user-select: none;"><div class="tablesorter-header-inner">Data</div></th>
			<th data-column="1" class="sorter-false" tabindex="0" scope="col" role="columnheader" aria-disabled="false" unselectable="on" aria-sort="none" aria-label="No sort applied" style="user-select: none;"><div class="tablesorter-header-inner">Total</div></th>
			<th data-column="2" class="sorter-false" tabindex="0" scope="col" role="columnheader" aria-disabled="false" unselectable="on" aria-sort="none" aria-label="No sort applied" style="user-select: none;"><div class="tablesorter-header-inner">Examinadores</div></th>
		</tr>
	</thead>
<tbody aria-live="polite" aria-relevant="all">
  <?php
  		$anofinal = date('Y');
  		$mesfinal = date('m');
		if ($divisao=='direp')
		{
			$ano_inicio = 2015;
			$mes_inicio = 7;
		}
		else
		{
			$ano_inicio = 2010;
			$mes_inicio = 9;
		}
		for ($ano=$ano_inicio;$ano<=$anofinal;$ano++)
		{
			for ($mes=1;$mes<=12;$mes=$mes+1)
			{
				if ($ano==$ano_inicio and $mes<$mes_inicio) continue;
				if ($ano==$anofinal and $mes>$mesfinal) continue;
				$aux = "DIREP";
				if ($ano>2016 or ($ano==2016 and $mes>=10)) $aux = 'COREP';
				if ($ano==2015) $aux = 'DIREP';
				echo "<TR role='row'><TD>$mes/$ano<BR>$aux</TD>";
				$kmes = str_pad($mes,2,"0",STR_PAD_LEFT);
				$data = "$ano-$kmes-01";

				$nexaminadores = 0;
				if ($divisao=='direp')
					$cmd = "SELECT * FROM servidores WHERE (lotacao='DIRPA' or lotacao='CGREC') and (complemento='DIRPA/COESI' or complemento='CGREC/DIREP') and cargo='PESQUISADOR' and admissao<='$data' and (rescisao>='$data' or rescisao='0000-00-00') order by nome";
				else
					$cmd = "SELECT * FROM servidores WHERE lotacao='DIRPA' and complemento='$complemento' and cargo='PESQUISADOR' and admissao<='$data' and (rescisao>='$data' or rescisao='0000-00-00') order by nome";

				$nexaminadores =0;
				$array_nome = array();
				$array_email = array();
				$res = mysqli_query($link, $cmd);
				while ($line = mysqli_fetch_assoc($res)) 
				{
					$matricula = $line['matricula'];
					$nome = $line['nome'];
					$email = $line['email'];
					$ativo = 1;
					//$cmd2 = "select * from atividades where year(data)=$ano and month(data)=$mes and email='$email' and tarefa<>'licen'";
					//$res2 = mysqli_query($link, $cmd2);
					//if ($line2 = mysqli_fetch_assoc($res2)) $ativo = 1;
					//$cmd2 = "select * from examinador where year(data)=$ano and month(data)=$mes and email='$email'";
					//$res2 = mysqli_query($link, $cmd2);
					//if ($line2 = mysqli_fetch_assoc($res2)) $ativo = 1;
					
					if ($ativo==1)
					{
						$array_nome[$matricula]=$nome;
						$array_email[$matricula]=$email;
						$nexaminadores++;
					}
				}
				echo "<TD>$nexaminadores</TD>";
				$cmd2 = "update cgrec set param6=$nexaminadores where tipo='cgrecprod' and year(data)=$ano and month(data)=$mes and divisao='DIRPA'";
				//echo "$cmd2;<BR>";

				$count = 0;
				echo "<TD>";
				if ($divisao=='direp')
					$cmd = "SELECT * FROM servidores WHERE (lotacao='DIRPA' or lotacao='CGREC') and (complemento='CGREC/') and (cargo='COORDENADOR') and admissao<='$data' and (rescisao>='$data' or rescisao='0000-00-00') order by cargo desc";
				else
					$cmd = "SELECT * FROM servidores WHERE lotacao='DIRPA' and complemento='$complemento' and cargo='COORDENADOR' and admissao<='$data' and (rescisao>='$data' or rescisao='0000-00-00') order by nome";
				
				$res = mysqli_query($link, $cmd);
				while ($line = mysqli_fetch_assoc($res)) 
				{
					$matricula = $line['matricula'];
					$nome = $line['nome'];
					$email = $line['email'];
					echo "<IMG SRC='imagens/servidores/$matricula"."i.jpg' TITLE='$nome' width=40 border='3'>&nbsp;&nbsp;";
				}
				
				if ($divisao=='direp')
					$cmd = "SELECT * FROM servidores WHERE (lotacao='DIRPA' or lotacao='CGREC') and (complemento='DIRPA/COESI' or complemento='CGREC/DIREP') and (cargo='CHEFIA' or cargo='COORDENADOR') and admissao<='$data' and (rescisao>='$data' or rescisao='0000-00-00') order by cargo desc";
				else
					$cmd = "SELECT * FROM servidores WHERE lotacao='DIRPA' and complemento='$complemento' and cargo='CHEFIA' and admissao<='$data' and (rescisao>='$data' or rescisao='0000-00-00') order by nome";
				
				$res = mysqli_query($link, $cmd);
				while ($line = mysqli_fetch_assoc($res)) 
				{
					$matricula = $line['matricula'];
					$nome = $line['nome'];
					$email = $line['email'];
					echo "<IMG SRC='imagens/servidores/$matricula"."i.jpg' TITLE='$nome' width=40 border='1'>&nbsp;&nbsp;";
				}
				
				foreach ($array_nome as $matricula=>$nome)
				{
					$email = $array_email[$matricula];
					echo "<IMG SRC='imagens/servidores/$matricula"."i.jpg' TITLE='$nome' width=40>";
					$count++;
				}
				echo "</TD></TR>";

			}
		}
		echo "</tbody></TABLE>";
		echo "Fim processamento";
?>

    <script>
    $(function(){

      $('table > tbody > tr:odd').addClass('odd');

      $('table > tbody > tr').hover(function(){
        $(this).toggleClass('hover');
      });

      $('#marcar-todos').click(function(){
        $('table > tbody > tr > td > :checkbox')
          .attr('checked', $(this).is(':checked'))
          .trigger('change');
      });

      $('table > tbody > tr > td > :checkbox').bind('click change', function(){
        var tr = $(this).parent().parent();
        if($(this).is(':checked')) $(tr).addClass('selected');
        else $(tr).removeClass('selected');
      });

      $('form').submit(function(e){ e.preventDefault(); });

      $('#pesquisar').keydown(function(){
        var encontrou = false;
        var termo = $(this).val().toLowerCase();
        $('table > tbody > tr').each(function(){
          $(this).find('td').each(function(){
            if($(this).text().toLowerCase().indexOf(termo) > -1) encontrou = true;
          });
          if(!encontrou) $(this).hide();
          else $(this).show();
          encontrou = false;
        });
      });

    });
    </script>
  </body>
</html>