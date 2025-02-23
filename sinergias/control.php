<?php
	session_start();
	$_SESSION['user'] = 'abrantes';
	$user = @$_SESSION['user'];
	if (!(isset($_SESSION['user']) and ($user<>''))){
		header("Location: index.php");
		exit;
	}
	require("../../conf_plos.php");
	require("../conf_utils.php");
	
?>

<HTML>
    <HEAD><TITLE>Gerenciamento de Dados de Patentes</TITLE>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/pmensal1.css">
    </HEAD>

    <BODY bgcolor=#fdf1e3 leftMargin=20 marginheight="0" marginwidth="0" >

    <BR/>
    <TABLE>
        <TR><TD colspan=2><B>1) Rotinas de atualização </B></TD></TR>
        <TR><TD width=50></TD><TD><a href='control.php?action=1&op=1'>1. Atualização tabela arquivados a partir de \mysql\bin\arquivados.csv</a></TD></TR>      
		<TR><TD width=50></TD><TD><a href='control.php?action=2&op=1'>2. Atualização tabela arquivados a partir de \mysql\bin\arquivados.csv (a partir da memória)</a></TD></TR>
        <TR><TD width=50></TD><TD><a href='control.php?action=3'>3. Citações de inovação</a></TD></TR>            
        <TR><TD width=50></TD><TD><a href='control.php?action=4&op=2&rpi=2654'>4. Confere despachos CEPIT com arquivados</a></TD></TR>            
        <TR><TD width=50></TD><TD><a href='control.php?action=5'>5. Patentes Embrapii</a></TD></TR>            
        <TR><TD width=50></TD><TD><a href='control.php?action=8'>8. Gera tabela comment_conversao a partir de caselaw2022.csv</a></TD></TR>     
        <TR><TD width=50></TD><TD><a href='control.php?action=9'>9. Testa se todos os PDF da tabela justica estão presentes</a></TD></TR>     
        <TR><TD width=50></TD><TD><a href='control.php?action=1010'>1010. Le caselaw2021.txt (obtido do DOC) e atualiza tabela consulta_comment</a></TD></TR>     
        <TR><TD width=50></TD><TD><a href='control.php?action=1011$ano=2022'>1011. Gera relação de casos a ser incorporada no D2IP_c2_pdf-2022.DOC </a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=123&op=1&ano=1985'>123. Calcula estoque de pedidos não decididos</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1120&ano=2020'>1120. Calcula recursos e nulidades feitos pela DIRPA e COREP</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=115&ano=2022&op=1'>115. Estatísticas CGREC auditoria</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=115&ano=2021&op=46'>115(46). Atualiza total de decisões de Recursos por divisão (tabela cgrec)</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=115&ano=2021&op=45'>115(45). Atualiza total de 12.2 por divisão (tabela cgrec)</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=115&ano=2021&op=44'>115(44). Atualiza tempos decisão de recursos administrativos por divisão (tabela cgrec)</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=115&ano=2021&op=43'>115(43). Atualiza tempos decisão de nulidades por divisão (tabela cgrec)</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=115&ano=2021&op=42'>115(42). Atualiza tempos decisão de recursos técnicos por divisão (tabela cgrec)</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=115&ano=2021&op=41'>115(41). Atualiza decisões de recursos técnicos por mês por divisão (tabela cgrec)</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=115&ano=2021&op=40'>115(40). Atualiza decisões de nulidades técnicas por divisão (tabela cgrec)</a></TD></TR>

		<TR><TD width=50></TD><TD><a href='control.php?action=115&ano=2021&op=4'>115(4). Atualiza recurso 12.2 por divisão de 2012 a 2021 (tabela cgrec_estat) e salva resultados_115_4.txt</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=115&ano=2021&op=5'>115(5). Atualiza recurso 12.3 de 2012 a 2021 (tabela cgrec_estat) e salva resultados_115_5.txt</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=115&ano=2021&op=6'>115(6). Atualiza recurso 12.6 de 2012 a 2021 (tabela cgrec_estat) e salva resultados_115_6.txt</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=115&ano=2021&op=7'>115(7). Atualiza nulidade 17.1 por divisão por ano de 2012 a 2021 (tabela cgrec_estat) e salva resultados_115_7.txt</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=115&ano=2021&op=3&tipo=1'>115(3). Atualiza cgrec1.htm usado em Recursos 12.2 (tipo=1) por década (usado em estoque8.php)</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=115&ano=2021&op=3&tipo=5'>115(3). Atualiza cgrec5.htm usado em Recursos 12.3 (tipo=5) por década (usado em estoque8.php)</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=115&ano=2021&op=3&tipo=6'>115(3). Atualiza cgrec6.htm usado em Recursos 12.6 (tipo=6) por década (usado em estoque8.php)</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=115&ano=2021&op=3&tipo=7'>115(3). Atualiza cgrec7.htm usado em Nulidades 17.1 (tipo=7) por década (usado em estoque8.php)</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1140&tipo=1&ano=2021'>1140. Atualiza estoque recurso 12.2 por divisão de 2011 a 2021 (tabela cgrec_estat tipo=1) e salva resultados_1140_4.txt</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1140&op=3&tipo=1'>1140(3). Atualiza cgrec1_estoque.htm usado em estoque9.php a partir de cgrec_estoque tipo = 1</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1142'>1142. Confere tempo de decisão com dado da DIRPA</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=124&ano=2022&mes=1'>124. Calculos mensais de produção da CGREC</a></TD></TR>
		<TR><TD width=50></TD><TD><a href=''>1121. Salva bases</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1122'>1122. Verifica pedidos há mais de 18 meses sem publicar (Sheila)</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1125&ano=2000'>1125. Calcula dados sobre destino dos pedidos de cada ano depositado (gráfico pizza de estoque9.php)</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1126'>1126. Ler resultados_115_4.txt de estoque8.php e calcula a data do 12.2</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1130'>1130. Pedidos com 212 mas que ainda nao receberam carta-patente (Sheila)</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1131&ano=2010'>1131. Pedidos 15.21 consulte depositante</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1143'>1143. Conferir com dados do CEPIT</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1144'>1144. Ler acoes.csv e carrega tabela acoes</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1146'>1146. Gera arquivo para POWERBI para dipae</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1147'>1147. Estatísticas de divididos</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1148&op=2'>1148 (1) Tempo entre o 205 e o 17.1, (2) Tempo entre o 17.1 e o 205</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1149&data=2023-01-03'>1149 Faz backup da tabela arquivados</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1150'>1150. Confere situação de pedidos em C07J</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1152&op=1'>1152. Taxas de recursos e nulidade por divisao</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1153'>1153. Destino dos 6.21</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=167&ano=2021'>167. Etapas de recurso dos examinadores da CGREC</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=168'>168. Conversão de formatos para query no DERWENT (Paula)</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=169&op=19.1'>169. Atualiza divisão dos 19.1</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=170'>170. Confere tabelas do BADEPI</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=171&numero=112013005558'>171. Leitura de pareceres do siscap para extrair documentos citados no Quadro 4</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=172'>172. Corrige tabela anterioridades</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=173&op=3&ano=2024'>173. Estatísticas de projeção de primeiro exame da CGREC</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=174&ano=2023'>174. Gera arquivo txt do caselaw (tabela consulta_comment) para a IARA</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=175'>175. Elimina duplicatas da tabela de carga e da tabela anterioridades</a></TD></TR>

		<TR><TD width=50></TD><TD><BR><B>Testes de consistência das tabelas</B></TD></TR>
		<?php
				$rpi_aux = 0;
				$cmd2 = "SELECT * FROM rpis_lidas where 1 order by data desc";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) $rpi_aux = $line2['rpi'];
		?>
		<TR><TD width=50></TD><TD><a href='control.php?action=66&rpi=<?php echo $rpi_aux+1;?>'>66. Converte RPI XML em RPI TXT</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='loadarq.php'>Carrega a RPI </a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=500&tipo=1&rpi=<?php echo $rpi_aux;?>'>Testa a RPI já carregada</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1118&rpi=<?php echo $rpi_aux;?>&gravar=1'>1118. Atualiza tabela revistas4</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1157&rpi=<?php echo $rpi_aux;?>&gravar=1'>1157. Corrige campo prioridade (indi=30) na tbela revistas4</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=77&op=1&ano=2022'>77. Pesquisa revistas e dataout em publicados (op = 1,3,5) </a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=93&op=1'>93. Atualiza data_nacional na tabela publicados para pedidos PCT </a></TD></TR>
 		<TR><TD width=50></TD><TD><a href="control.php?action=10">10. Atualiza etapas na tabela arquivados</a></TD></TR>		
		<TR><TD width=50></TD><TD><a href='control.php?action=81&op=1'>81. Atualiza despacho na tabela publicados </a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=40&op=2&ano=2020'>40. Atualiza pedexame na tabela publicados (op = 1,2, ano = 2020, em diante) </a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1127&rpi=2700'>1127. Atualizar tabela titulo</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1141&op=2'>1141. Atualiza novos registros na tabela vigentes (op=2) </TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1141&op=3'>1141. Atualiza tabela vigentes e sua data de depósito (op=3)</TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1141&op=4&ano=2008'>1141. Atualiza tabela vigentes e sua data de extinção (op=4)</TD></TR>
		<TR><TD width=50></TD><TD><a href='..\sinergias\acoes.php?op=6'>Insere novos registros em tabela acoes (pedidos que aguardam 19.1)</TD></TR>
		<TR><TD width=50></TD><TD><a href='..\sinergias\acoes.php?op=5&rpi=2691'>Atualiza tabela acoes com novos registros 15.23 e 22.15</TD></TR>
		<TR><TD width=50></TD><TD><a href='..\sinergias\acoes.php?op=4'>Atualiza tabela acoes e sua data de notificação da ação 15.23 e 22.15 </TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=123&op=2'>123(2). Atualiza dataout da tabela publicados para os recursos negados da tabela pedido</TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1151'>1151 Confere etapas de recursos</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=500&op=45'>500(45). Verificar se teve algum recurso anulado, atualide tabela pedido e arquivados </a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=123'>123. Atualiza campo estoque da tabela estoque</TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=24&op=1&ano=2022'>24(1). Atualiza concessoes e tempo_concessoes na tabela estoque</TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=24&op=2&ano=2022'>24(2). Atualiza depositos tabela estoque</TD></TR>

        <TR><TD width=50></TD><TD><a href='control.php?action=6'>6. Testa data das RPIS com CEPIT</a></TD></TR>     
        <TR><TD width=50></TD><TD><a href='control.php?action=7&op=1'>7(1). Testa consistência da tabela pimupi se renumeração foi anulada</a></TD></TR>     
        <TR><TD width=50></TD><TD><a href='control.php?action=7&op=2'>7(2). Testa consistência da tabela pimupi se confere com CEPIT (renumera2.csv)</a></TD></TR>     
        <TR><TD width=50></TD><TD><a href='control.php?action=7&op=3'>7(3). Testa consistência da tabela pimupi se confere com revistas CEPIT(renumera.csv)</a></TD></TR>     
        <TR><TD width=50></TD><TD><a href='control.php?action=7&op=4'>7(4). Testa consistência da tabela pimupi se confere com revistas4</a></TD></TR>     
        <TR><TD width=50></TD><TD><a href='control.php?action=1129&op=7&ano=2021&mes=10'>1129. Verifica pedidos que furam a fila no recurso </a></TD></TR>     
		
		<TR><TD width=50></TD><TD><BR><B>Geração dos arquivos CSVs para site do INPI segundo solicitação do TCU</B></TD></TR>
		<TR><TD width=50></TD><TD><a href='forum3_central_4.php?action=1' target='_blank'>Atualiza tabelas pedido a partir de pedido.csv do SISCAP </a></TD></TR>
        <TR><TD width=50></TD><TD style="font-size: 12px">select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from CEPIT_SISCAP.SISCAP_PEDIDO where (instancia='acao judicial') or (((decisao in ('9.2','indeferimento','deferimento','defanvisa')) or (instancia in ('recurso cgrec','nulidade cgrec','recurso','nulidade'))) and extract(year from rpi)>=2023) </TD></TR>  
		<TR><TD width=50></TD><TD><a href='forum3_central_4.php?action=6' target='_blank'>Atualiza tabelas examinador a partir de examinador.csv do SISCAP </a></TD></TR>
        <TR><TD width=50></TD><TD style="font-size: 12px">select * from CEPIT_SISCAP.SISCAP_EXAMINADOR where email<>'sisadanu' and extract(year from data)>=2023 and codigo in (select codigo from CEPIT_SISCAP.SISCAP_PEDIDO where ((decisao in ('9.2','indeferimento','deferimento','defanvisa')) or (instancia in ('acao judicial','recurso cgrec','nulidade cgrec','recurso','nulidade')))) </TD></TR>  
		<TR><TD width=50></TD><TD><a href='control.php?action=142&op=39'>142(39). Atualiza campo divisao da tabela publicados a partir da tabela pedido </a></TD></TR>
        <TR><TD width=50></TD><TD><a href='control.php?action=38'>38. Testa se recurso 12.2, 12.3 ou 12.6 prejudicados</a></TD></TR>     
        <TR><TD width=50></TD><TD><a href='control.php?action=38&op=2'>38(2). Testa se nulidade 17.1 prejudicados (detectando nulidade 212 cadastrado na tabela pedido no SISCAP)</a></TD></TR>     
        <TR><TD width=50></TD><TD><a href='control.php?action=38&op=3'>38(3). Testa se nulidade 17.1 prejudicados pelo despacho no campo (co)</a></TD></TR>     
        <TR><TD width=50></TD><TD><a href='control.php?action=172'>172. Atualiza tabela publicados com as decisões de recurso negado</a></TD></TR>     
        <TR><TD width=50></TD><TD><a href='control.php?action=173'>173. Confere as decisões de recurso negado da tabela publicados </a></TD></TR>     
        <TR><TD width=50></TD><TD><a href='control.php?action=1123'>1123. Verifica despacho_out de 8.6 e 9.2 da tabela publicados </a></TD></TR>     
        <TR><TD width=50></TD><TD><a href='control.php?action=1124&op=1'>1124(1). Verifica nulidades se campos (co) e (de) estão todos  na tabela revistas4 </a></TD></TR>     
        <TR><TD width=50></TD><TD><a href='control.php?action=1124&op=2'>1124(2). Verifica recursos se campos (co) e (de) estão todos  na tabela revistas4 </a></TD></TR>     

		<TR><TD width=50></TD><TD><a href='control.php?action=142&op=29&tipo=9.1&ano=2022'>142(29). Verificar campo anulado da tabela pedido (tipo=9.1,9.2,6.1,7.1) </a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=142&op=40'>142(40). Verificar 12.7 com um 12.2 anterior ainda ativo </a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=142&op=41'>142(41). Verificar 'PR Recursos' com "Anulada a publicação" mas com um 12.2 anterior ainda ativo </a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=142&op=38'>142(38). Verificar pedidos com dois 12.2 ativos </a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=142&op=42'>142(42). <B>Gera lista de recursos 12.2 pendentes em arquivo CSV para TCU</B> </a></TD></TR>

		<TR><TD width=50></TD><TD><a href='control.php?action=142&op=37'>142(37). Verificar 12.7 com um 12.3 ou 12.6 anterior ainda ativo </a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=142&op=36'>142(36). Verificar 'PR Recursos' com "Anulada a publicação" mas com um 12.3 ou 12.6 anterior ainda ativo </a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=142&op=35'>142(35). <B>Gera lista de recursos 12.3 pendentes em arquivo CSV para TCU</B> </a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=142&op=34'>142(34). <B>Gera lista de recursos 12.6 pendentes em arquivo CSV para TCU</B> </a></TD></TR>

		<TR><TD width=50></TD><TD><a href='control.php?action=142&op=33'>142(33). Verificar 17.2 com um 17.1 anterior ainda ativo </a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=142&op=32'>142(32). Verificar 'PR - Nulidades' que tenham 'Anulada a publicação' mas com um 17.1 anterior ainda ativo </a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=142&op=30'>142(30). <B>Gera lista de 17.1 pendentes em arquivo CSV para TCU</B> </a></TD></TR>
		
		<TR><TD width=50></TD><TD><BR><B>Atualização das tabelas a partir dos arquivos CSV salvos das tabelas do SISCAP</B></TD></TR>
        <TR><TD width=50></TD><TD style="font-size: 12px">select numero,divisao,symbol,data_despacho,peticao,data_peticao from CEPIT_SISCAP.SISCAP_FASE5 where dataout is null and despacho='12.2'</TD></TR>
        <TR><TD width=50></TD><TD style="font-size: 12px">select * from CEPIT_SISCAP.SISCAP_CARGA where numero in (select numero from CEPIT_SISCAP.SISCAP_arquivados WHERE despacho='12.2' and anulado=0)</TD></TR>
        <TR><TD width=50></TD><TD style="font-size: 12px">select * from CEPIT_SISCAP.SISCAP_CARGA where divisao='direp' and numero in (select numero from CEPIT_SISCAP.SISCAP_PEDIDO WHERE decisao='8.6' and rpi is null)</TD></TR>
        <TR><TD width=50></TD><TD style="font-size: 12px"><BR></TD></TR>
		
        <TR><TD width=50></TD><TD><a href='control.php?action=1112'>1112. Atualiza tabela despachos_pag a partir de pag.csv obtido do CEPIT</a></TD></TR>  
        <TR><TD width=50></TD><TD style="font-size: 12px">SELECT numero,peticao,numnossonumero,data_peticao,tipo_peticao,flag_pedexame,flag_imagem,cd_imagem,update_imagem,conciliado FROM CEPIT_SISCAP.SISCAP_DESPACHOS_PAG where tipo_peticao in ('200','203','204','205','212','214','215','284','285','848') and data_peticao like '%/23 00%' </TD></TR>  
        <TR><TD width=50></TD><TD><a href='control.php?action=1145'>1145. Atualiza tabela despachos_pag_anuidades a partir de pag_anuidades.csv obtido do CEPIT</a></TD></TR>  
        <TR><TD width=50></TD><TD style="font-size: 12px">SELECT numero,peticao,numnossonumero,data_peticao,tipo_peticao,flag_pedexame,flag_imagem,cd_imagem,update_imagem,conciliado FROM CEPIT_SISCAP.SISCAP_DESPACHOS_PAG where tipo_peticao not in ('220','221','222','223','224','225','226','227','228','229','230','231','232','233','234','235','236','237','238','239','240','241','242','243','244','245','246','247') and data_peticao like '%/23 00%' </TD></TR>  
        <TR><TD width=50></TD><TD style="font-size: 12px">SELECT numero,data_peticao,tipo_peticao FROM CEPIT_SISCAP.SISCAP_DESPACHOS_PAG where tipo_peticao in ('220','221','222','223','224','225','226','227','228','229') </TD></TR>  
        <TR><TD width=50></TD><TD style="font-size: 12px">SELECT numero,data_peticao,tipo_peticao FROM CEPIT_SISCAP.SISCAP_DESPACHOS_PAG where tipo_peticao in ('240','241','242','243','244','245','246','247') </TD></TR>  

        <TR><TD width=50></TD><TD><a href='control.php?action=1113'>1113. Atualiza tabela divididos</a></TD></TR>  
		<TR><TD width=50></TD><TD><a href='control.php?action=1114&gravar=0'>1114. Atualiza tabela pimupi</a></TD></TR>  
		<TR><TD width=50></TD><TD><a href='control.php?action=1115&gravar=0&op=1'>1115. Atualiza tabela arquivados</a></TD></TR>  
		<TR><TD width=50></TD><TD><a href='control.php?action=1116&gravar=0&op=1'>1116. Atualiza tabela prioritarios</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1117&gravar=0&op=1'>1117. Atualiza tabela subjudice</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=34&op=1&gravar=0'>34(1). Atualiza tabela cgrec_all usada por cgrec2.php (atualize primeiro a divisao de publicados action 142(39))</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1154'>1154. Corrige erro na tabela arquivados</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1155'>1155. Verifica anulado que na verdade foram possivelmente prejudicados</a></TD></TR>
		<TR><TD width=50></TD><TD><a href='control.php?action=1156'>1156. Verifica recurso pendente oriundo de 9.2 precedido de 6.1</a></TD></TR>
    </TABLE>

    <BR/>    
        
<?php

$despachos_terminais = "((despacho='8.6' and data<'2007-05-02') or (despacho='11.1' and data<'2004-05-18') or (despacho='9.2' and data<'2008-12-02') or (despacho='11.17' and data<'2020-09-24') or despacho in ('1.2','3.5','3.6','8.11','9.2.4','10.1','10.9','11.1.1','11.2','11.3','11.4','11.5','11.6','11.11','11.12','11.18','11.20','11.30','11.31','11.34','15.1','15.2','15.3','15.3.1','15.4','15.13','15.14','15.21','15.23','16.1','19.1','23.6','23.7','23.9','100','111','112','113','115'))";
$despachos_terminais2 = "(despacho in ('1.2','3.5','3.6','8.11','9.2.4','10.1','10.9','11.1.1','11.2','11.3','11.4','11.5','11.6','11.11','11.12','11.18','11.20','11.30','11.31','11.34','15.1','15.2','15.3','15.3.1','15.4','15.13','15.14','15.21','15.23','16.1','19.1','23.6','23.7','23.9','100','111','112','113','115'))";
	
	/*
	'1.2'	=>'Pedido retirado',
	'3.5'	=>(AECON não considera terminal)'Publicação do pedido retirado', 
	'3.6'   =>'Publicação do Pedido Arquivado Definitivamente - Art. 216 §2º e Art. 17 §2º da LPI'
	'8.11'	=>'Manutenção do Arquivamento',
	'9.2.4' =>'Manutenção do Indeferimento',
	'10.1'	=>'Desistência homologada',
	'10.9'	=>'Retirada homologada Art.29 §1° da LPI',
	'11.1.1'=>'Arquivamento definitivo Art. 33',
	'11.2' 	=>'Arquivamento definitivo Art.36 §1° da LPI (não manifestação de exigência técnica)',
	'11.3'  =>'Art. 19 parágrafo 6° do CPI 5772/71. Dessa data corre 60 dias de recurso, se não houver recurso é definitivo',
	'11.4' 	=>'Arquivamento definitivo Art.38 §2° da LPI (não pagamento de carta patente)',
	'11.5'	=>'Arquivamento Art.34 da LPI (não apresentação de documentação)',
	'11.6'	=>'Arquivamento definitivo Art.216 §2° da LPI (não apresentada procuração)',
	'11.11'	=>'Arquivamento definitivo Art.17 §2° da LPI (prioridade interna)',
	'11.12' =>(AECON não considera terminal)'Arquivamento Art.26 parágrafo único da LPI (divisão de pedido indevida)',
	'11.17' =>(AECON não considera terminal)'Arquivamento do pedido de Certificado de Adição de Invenção Art.77 da LPI',
	'11.18' =>(AECON não considera terminal)'Arquivamento definitivo por não anuência da ANVISA',
	'11.20' => 'Manutenção do arquivamento'
	'11.30' =>(AECON não considera terminal)'Arquivamento definitivo - Art. 18 §1° da Lei 5772/71',
	'11.34' => 'Arquivamento'
	'11.31' =>(AECON não considera terminal)'Arquivamento definitivo - Falta de cumprimento de exigência',
	'15.1'  =>(AECON não considera terminal)'Arquivamento do pedido de patente por comprovação e recolhimento intempestivo de anuidade - AN 082/86 item 4.1',
	'15.2'  =>(AECON não considera terminal)'Arquivamento do pedido de patente por comprovação intempestiva de anuidade - AN 082/86 item 4.1',
	'15.3'  =>(AECON não considera terminal)'Arquivamento do pedido de patente por falta de comprovação e recolhimento de anuidade - AN 082/86 item 4.1',
	'15.3.1'=>(AECON não considera terminal)'Arquivamento do pedido de patente de modelo ou desenho industrial por falta de recolhimento de anuidade/comprovação - AN 082/86 item 4.1',
	'15.4'  =>(AECON não considera terminal)'Arquivamento do pedido de patente por falta de comprovação e recolhimento de anuidade e comprovação e recolhimento intempestivo de anuidade - AN 082/86 item 4.1',
	'15.13' =>'Extinção da garantia de prioridade',
	'15.14' =>'Notificação de decisão judicial',
	'15.21' =>'Numeração anulada',
	'15.23' =>'Pedido sub judice',
	'16.1'	=>'Concessão de patente ou Certificado de adição de invenção',
	'19.1'	=>(AECON não considera terminal)'Notificação de decisão judicial',
	'23.6'  =>'Arquivamento',
	'23.7'  =>'Denegação do pedido',
	'23.9'  =>'Expedição da patente',
	
	Recurso:
	100 - Recurso conhecido e provido. Reformada a Decisão recorrida e deferido o pedido
	111 - Recurso conhecido e negado provimento. Mantido o indeferimento do pedido
	112 - Recurso conhecido e negado provimento. Mantido o arquivamento do pedido
	113 - Recurso conhecido e negado provimento. Mantido o arquivamento da petição
	115 - Recurso conhecido e negado provimento. Mantida a Decisão recorrida.
	
	
	// https://jsfiddle.net/gh/get/library/pure/highcharts/highcharts/tree/master/samples/highcharts/demo/line-time-series
	// https://www.highcharts.com/demo/line-time-series
	// SELECT year(data_peticao),count(*) FROM `despachos_pag` WHERE tipo_peticao='200' group by year(data_peticao)
	// valores corretos de 2007 em diante
	// 
	// segundo AECON em 2021 foram um total de 26921 depósitos de patentes, o despachos pag indica 26880
	

	https://www.gov.br/inpi/pt-br/acesso-a-informacao/dados-abertos/arquivos/documentos/boletim-mensal-de-propriedade-industrial
	https://www.gov.br/inpi/pt-br/central-de-conteudo/estatisticas-e-estudos-economicos/estatisticas-1/estatisticas_aecon
	https://antigo.mctic.gov.br/mctic/opencms/indicadores/detalhe/Patentes/INPI/6.1.3.html concessoes
	https://antigo.mctic.gov.br/mctic/opencms/indicadores/detalhe/Patentes/INPI/6.1.1.html depósitos
							

	*/
	
	// atualização da tabela revistas:
	// update revistas4 set data='2012-11-21' WHERE data='2012-11-20'
	// update revistas4 set data='2012-12-05' WHERE data='2012-12-04'
	// update revistas4 set data='2019-01-08' WHERE data='2019-01-07'
	
    if (empty($_REQUEST["section"])) {$section=0;} else {$section=$_REQUEST["section"];}
    if (empty($_REQUEST["start"])) {$start=1;} else {$start=$_REQUEST["start"];}
	if (empty($_REQUEST["op"])) {$op=1;} else {$op=$_REQUEST["op"];}
	if (empty($_REQUEST["action"])) {$action=0;} else {$action=$_REQUEST["action"];}
	if (empty($_REQUEST["ano"])) {$ano=2021;} else {$ano=$_REQUEST["ano"];}
	if (empty($_REQUEST["mes"])) {$mes=1;} else {$mes=$_REQUEST["mes"];}
	if (empty($_REQUEST["rpi"])) {$rpi=0;} else {$rpi=$_REQUEST["rpi"];}
	if (empty($_REQUEST["data"])) {$data=0;} else {$data=$_REQUEST["data"];}
	if (empty($_REQUEST["gravar"])) {$gravar=0;} else {$gravar=$_REQUEST["gravar"];}
    if (empty($_REQUEST["divisao"])) {$divisao='dirpa';} else {$divisao=$_REQUEST["divisao"];}
    if (empty($_REQUEST["tipo"])) {$tipo=1;} else {$tipo=$_REQUEST["tipo"];}
    if (empty($_REQUEST["numero"])) {$numero='';} else {$numero=$_REQUEST["numero"];}

    echo "Início: ".date("H:i")."<BR>";

	function detecta_recurso_primeiro_exame($numero1,$numero2,$data,$link)
	{
		$data_primeiro_exame = null;
		$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and rpi<='$data' and decisao in ('recurso provido','recurso provido anvisa','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111','recurso exigencia','recurso exigencia 121','recurso ciencia','recurso 1001','recurso 1002') and anulado=0";
		$res2 = mysqli_query($link,$cmd2);
		if ($line2=@mysqli_fetch_assoc($res2))
			$data_primeiro_exame = $line2['rpi'];
		
		return $data_primeiro_exame;
	}

		//$cmd2 = "select * from revistas4 where (numero='$numerocd1' or numero='$numerocd2') and data>'$data' and (inid='co' or inid='de' or inid='re') and despacho in ('PR - Recursos','111','100','134') and (descricao like '%[100]%' or descricao like '%[111]%' or lower(descricao) like '%egado o provimento%' or lower(descricao) like '%egado provimento%' or lower(descricao) like '%antido o indeferimento%' or lower(descricao) like '%ecurso conhecido e negado%' or lower(descricao) like '%antido a concessão%' or lower(descricao) like '%antida a concessão%' or lower(descricao) like '%antido a concessao%' or lower(descricao) like '%antida a concessao%' or lower(descricao) like '%ecurso conhecido e provido%'  or lower(descricao) like '%ecurso conhecido e %' or lower(descricao) like '%homologada a desist%' or lower(descricao) like '%[134]%')";
		//$res2 = mysqli_query($link,$cmd2);//echo "$cmd2<BR>";
		//while ($line2=@mysqli_fetch_assoc($res2))
		//{
		//	$data1 = $line2['data']; // se tiver duas decisões mas uma for válida, ele considera válido
		//	$cmd3 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho='PR - Recursos' and data='$data1'";
		//	$res3 = mysqli_query($link,$cmd3);
		//	if ($line3=@mysqli_fetch_assoc($res3))
		//	{
		//		$anulado = 0;
		//		$data_decisao = $line3['data'];
		//	}
		//}

	if ($action==175) 
	{
		$total = 0;
		$cmd = "SELECT numero, id FROM carga GROUP BY numero HAVING COUNT(*) > 1;";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$id = $line['id'];
			$cmd2 = "delete from carga where numero='$numero' and id=$id";
			echo "$cmd2;<BR>";
			$total++;
		}
		
		$total = 0;
		$cmd = "SELECT numero, id FROM anterioridades_desc GROUP BY numero HAVING COUNT(*) > 1;";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$id = $line['id'];
			$cmd2 = "delete from anterioridades_desc where numero='$numero' and id=$id";
			echo "$cmd2;<BR>";
			$total++;
		}

		echo "Fim de processamento: $total";
		exit();
	}

	if ($action==174) 
	{
		$total = 0;
		$cmd = "select * from consulta_conversao where year(data)=$ano";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$caso = $line['caso'];
			$codigo = $line['codigo'];
			$idivisao = $line['divisao'];
			$data = $line['data'];
			$ano_lido = substr($data,2,2);
			$str = "TBR$caso/$ano_lido";
			$cmd2 = "select * from consulta_comment where numero='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$comentario = $line2['comentario'];
				$comentario = str_replace("#",'', $comentario);
				echo "<B>$str ($numero)</B><BR>$comentario<BR>#<BR>";
				$total++;
			}
		}
		
		echo "fim de processamento: $total";
		exit();
	}

	if ($action==173) // certo US20010049613 SELECT * FROM anterioridades WHERE LENGTH(doc) <> 13 and doc like 'US%';
	{
		if ($op==1)
		{
			$examinadores_CGREC = array('abrantes','alciclea','cinopoli','cidade','darlan','darlan2','darlan3','deborasg','edibraga','fabios','fertc','giselleg','helenojc','helenojc2','jordy','liraml','luiz','luizcvd','magioli','moreira','mvasilva','ramorim','rcdutra','rockrio','rosanab','soniagb','telma');
			
			$total = 0;$total_direp=0;
			foreach ($divisoes as $idivisao)
				$lista[$idivisao] = array();
			$contagem = array();
				
			$cmd = "SELECT * FROM pedido WHERE instancia in ('recurso','recurso cgrec') and year(rpi)=$ano and decisao in ('recurso exigencia','recurso exigencia 121','recurso ciencia','recurso provido','recurso negado','recurso manutencao do indeferimento 111') and numero in (select numero from arquivados where despacho='12.2' and anulado=0) and etapa=1"; 
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line["numero"];
				$codigo = $line['codigo'];
				$divisao_recurso = $line['divisao'];
				$instancia = $line["instancia"];
				$decisao = $line["decisao"];
				$cmd2 = "SELECT * FROM pedido WHERE numero='$numero' and decisao in ('9.2','indeferimento') and anulado=0"; 
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) 
				{
					$email = 'não identificado';
					$divisao = $line2['divisao']; // que fez o indeferimento
					$cmd2 = "SELECT * FROM examinador WHERE codigo=$codigo and dono=1"; // que fez o recurso
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) $email = $line2['email'];
					if (!in_array($email, $lista[$divisao])) $lista[$divisao][] = $email; // Adicionar o elemento ao array sem repetir
					if (!isset($contagem[$divisao][$email])) $contagem[$divisao][$email] = 0;
					$contagem[$divisao][$email]++;
					if ($divisao_recurso=='direp' or $divisao_recurso=='cgrec')
					{
						if (!(in_array($email,$examinadores_CGREC))) echo "email $email da CGREC não cadastrado<BR>";
						$total_direp++;
						echo "$ano;$numero;$divisao;$instancia;$decisao;<B>$email</B><BR>";
					}
					else
						echo "$ano;$numero;$divisao;$instancia;$decisao;$email<BR>";
				}
				$total++;
			}
			echo "<BR><BR>";
			
			$percentual = round(100*$total_direp/$total,2);
			echo "Total: $total_direp / $total ($percentual %)<BR><BR>";
			foreach ($divisoes as $idivisao)
			{
				if ($idivisao=='dipem') continue;
				echo "Examinadores que fazem recurso na $idivisao: ";
				$total = 0;
				foreach ($lista[$idivisao] as $email) {
					$total = $total + $contagem[$idivisao][$email];
					if ((in_array($email,$examinadores_CGREC)))
						echo "<B>$email</B> (".$contagem[$idivisao][$email]."), ";
					else
						echo "$email (".$contagem[$idivisao][$email]."), ";
				}
				if ($total==0) 
					echo " (exame suspenso)";
				else
					echo "(Total = $total)";
				
				echo "<BR><BR>";
			}
			echo "Fim de processamento";
			exit();
		}
		
		if ($op==2)
		{
			$cmd = "SELECT * FROM arquivados where despacho='12.2' and year(data)>=2016 and anulado=0"; 
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$total++;
				$numero = $line["numero"];
				$divisao = $line["divisao"];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "SELECT * FROM pedido WHERE (numero='$numero1' or numero='$numero2') and decisao in ('indeferimento','9.2')"; 
				$res2 = mysqli_query($link,$cmd2); 
				if ($line2=@mysqli_fetch_assoc($res2)) 
				{
					$divisao2 = $line2['divisao'];
					if ($divisao<>$divisao2)
					{
						$cmd2 = "update arquivados set divisao='$divisao2' where numero='$numero' and despacho='12.2'";
						echo "$cmd2;<BR>";
					}
				}
			}
		}

		if ($op==3)
		{
			$total = 0;
			$estoque = array();
			$lista = array();
			$lista_divisao = array();

			foreach ($divisoes as $idivisao)
			{
				$estoque[$idivisao]=0;
			}
			$pendentes=0;
			$cmd = "SELECT * FROM arquivados where despacho='12.2' and year(data)<=$ano and year(data)>=2016 and anulado=0"; 
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$total++;
				$numero = $line["numero"];
				$divisao = $line['divisao'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$data = "$ano-12-31";
				$data = detecta_recurso_primeiro_exame($numero1,$numero2,$data,$link);
				if ($data == null)
				{					
					$pendentes++;
					$estoque[$divisao]++;
					$lista[] = $numero;
					$lista_divisao[] = $divisao;
				}
			}
			echo "Total pendentes em 31/12/$ano: $pendentes de $total<BR>";
			$total_divisao = 0;
			$str = "{'patents': [{'ano':$ano,'divisao':'dirpa','estoque':'$pendentes'},";
			$i = 0;
			foreach ($divisoes as $idivisao)
			{
				$count = $estoque[$idivisao];
				echo "$idivisao $count<BR>";
				$total_divisao = $total_divisao + $count;
				if ($i==0)
					$str = $str."{'ano':$ano,'divisao':'$idivisao','estoque':'$count'}";
				else
					$str = $str.",{'ano':$ano,'divisao':'$idivisao','estoque':'$count'}";
				$i++;
			}
			$str = $str."]}";
			$str = str_replace("'",'"', $str);
			echo "<BR><BR>$str</BR>";
			echo "Total: $total_divisao]<BR>";
			echo "<BR><BR>Lista pendentes<BR>";
			$i=0;
			$total = 0;
			foreach ($lista as $numero)
			{
				echo $lista_divisao[$i]." $numero<BR>";
				$i++;
				$total++;
			}
			echo "Fim de processamento: $total<BR><BR>";
			exit();
		}

		if ($op==4)
		{
			
			$total = 0;$total_direp=0;
			$contagem = array();
				
			$cmd = "SELECT * FROM pedido WHERE instancia in ('recurso','recurso cgrec') and year(rpi)=$ano and decisao in ('recurso exigencia','recurso exigencia 121','recurso ciencia','recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso provido-reforma 100.1','recurso provido-reforma 100.2','recurso provido-devolucao 100.2') and numero in (select numero from arquivados where despacho='12.2' and anulado=0) and etapa=1"; 
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line["numero"];
				$codigo = $line['codigo'];
				$divisao_recurso = $line['divisao'];
				$instancia = $line["instancia"];
				$decisao = $line["decisao"];
				$cmd2 = "SELECT * FROM pedido WHERE numero='$numero' and decisao in ('9.2','indeferimento') and anulado=0"; 
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) 
				{
					$email = 'não identificado';
					$divisao = $line2['divisao']; // que fez o indeferimento
					$contagem[$divisao]++;
					if ($divisao_recurso=='direp' or $divisao_recurso=='cgrec')
						$total_direp++;
				}
				$total++;
			}
			echo "<BR><BR>";
			
			$percentual = round(100*$total_direp/$total,2);
			echo "Total: $total $total_direp ($percentual %)<BR>";

			$total_divisao = 0;
			$str = "{'patents': [{'ano':$ano,'divisao':'dirpa','producao':'$total'},";
			$i = 0;
			foreach ($divisoes as $idivisao)
			{
				$count = $contagem[$idivisao];
				echo "$idivisao $count<BR>";
				$total_divisao = $total_divisao + $count;
				if ($i==0)
					$str = $str."{'ano':$ano,'divisao':'$idivisao','producao':'$count'}";
				else
					$str = $str.",{'ano':$ano,'divisao':'$idivisao','producao':'$count'}";
				$i++;
			}
			$str = $str."]}";
			$str = str_replace("'",'"', $str);
			echo "<BR><BR>$str</BR>";
			echo "Fim de processamento: $total_divisao";
			exit();
		}
		
		if ($op==5)
		{
			$total = 0;
			$pendentes = array();
			$estoque[] = array();
			$anoref = $ano;

			for ($ano=2020;$ano<=2024;$ano++) 
				foreach ($divisoes as $idivisao)
				{
					$estoque[$ano][$idivisao]=0;
				}
			
			for ($ano=2020;$ano<=2024;$ano++) 
			{
				$pendentes[$ano]=0;
				$estoque[$ano][$divisao]=0;
				if ($anoref>$ano) continue;
				$cmd = "SELECT * FROM arquivados where despacho='12.2' and year(data)<=$anoref and year(data)>=2016 and anulado=0"; 
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$total++;
					$numero = $line["numero"];
					$divisao = $line['divisao'];
					$numero1 = $numero;
					$numero2 = $numero;
					$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2["numero1"];
						$numero2 = $line2["numero2"];
					}
					$data = "$ano-12-31";
					$data = detecta_recurso_primeiro_exame($numero1,$numero2,$data,$link);
					if ($data == null)
					{					
						$pendentes[$ano]++;
						$estoque[$ano][$divisao]++;
					}
				}
			}

			$total = 0;$total_direp=0;
			$producao = array();
			$contagem[] = array();
			for ($ano=2020;$ano<=2024;$ano++) 
				foreach ($divisoes as $idivisao)
				{
					$contagem[$ano][$idivisao]=0;
				}
				
			for ($ano=2020;$ano<=2024;$ano++) 
			{
				$cmd = "SELECT * FROM pedido WHERE instancia in ('recurso','recurso cgrec') and year(rpi)=$ano and decisao in ('recurso exigencia','recurso exigencia 121','recurso ciencia','recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso provido-reforma 100.1','recurso provido-reforma 100.2','recurso provido-devolucao 100.2') and numero in (select numero from arquivados where despacho='12.2' and anulado=0) and etapa=1"; 
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line["numero"];
					$codigo = $line['codigo'];
					$divisao_recurso = $line['divisao'];
					$instancia = $line["instancia"];
					$decisao = $line["decisao"];
					$cmd2 = "SELECT * FROM pedido WHERE numero='$numero' and decisao in ('9.2','indeferimento') and anulado=0"; 
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) 
					{
						$divisao = $line2['divisao']; // que fez o indeferimento
						$contagem[$ano][$divisao]++;
						$producao[$ano]++;
						if ($divisao_recurso=='direp' or $divisao_recurso=='cgrec')
							$total_direp++;
					}
					$total++;
				}
			}
			echo "<BR><BR>";

			$str = "{'patents': [{'divisao':'dirpa','estoque':{'2020':$pendentes[2020],'2021':$pendentes[2021],'2022':$pendentes[2022],'2023':$pendentes[2023],'2024':$pendentes[2024]},'producao':{'2020':$producao[2020],'2021':$producao[2021],'2022':$producao[2022],'2023':$producao[2023],'2024':$producao[2024]}},";
			$i = 0;
			foreach ($divisoes as $idivisao)
			{
				$c20 = $estoque[2020][$idivisao];
				$c21 = $estoque[2021][$idivisao];
				$c22 = $estoque[2022][$idivisao];
				$c23 = $estoque[2023][$idivisao];
				$c24 = $estoque[2024][$idivisao];
				$p20 = $contagem[2020][$idivisao];
				$p21 = $contagem[2021][$idivisao];
				$p22 = $contagem[2022][$idivisao];
				$p23 = $contagem[2023][$idivisao];
				$p24 = $contagem[2024][$idivisao];
				if ($i==0)
					$str = $str."{'divisao':'$idivisao','estoque':{'2020':$c20,'2021':$c21,'2022':$c22,'2023':$c23,'2024':$c24},'producao':{'2020':$p20,'2021':$p21,'2022':$p22,'2023':$p23,'2024':$p24}}";
				else
					$str = $str.",{'divisao':'$idivisao','estoque':{'2020':$c20,'2021':$c21,'2022':$c22,'2023':$c23,'2024':$c24},'producao':{'2020':$p20,'2021':$p21,'2022':$p22,'2023':$p23,'2024':$p24}}";
				$i++;
			}
			$str = $str."]}";
			$str = str_replace("'",'"', $str);
			echo "<BR><BR>$str</BR>";
			echo "Fim de processamento: $total<BR><BR>";
			exit();
		}
	}

	if ($action==172) // certo US20010049613 SELECT * FROM anterioridades WHERE LENGTH(doc) <> 13 and doc like 'US%';
	{
		$total = 0;
		$cmd2 = "SELECT * FROM anterioridades GROUP BY numero, codigo, data HAVING COUNT(*) > 1 ORDER BY `anterioridades`.`doc` DESC"; 
		$res2 = mysqli_query($link,$cmd2);
		while ($line2=@mysqli_fetch_assoc($res2))
		{
			$numero = $line2["numero"];
			$codigo = $line2["codigo"];
			$data = $line2["data"];
			$doc = $line2["doc"];
			$total++;
			$cmd3 = "SELECT * FROM anterioridades where numero='$numero' and codigo='$codigo' and data='$data' and doc<>'$doc'"; 
			//echo "$cmd3<BR>";
			$res3 = mysqli_query($link,$cmd3);
			while ($line3=@mysqli_fetch_assoc($res3))
			{
				$doc = $line3["doc"];
				echo "delete from anterioridades where numero='$numero' and codigo='$codigo' and data='$data' and doc='$doc';<BR>";
			}
			echo "<BR>";
		}
		echo "$total";
		exit();
	}

	function detecta_recurso_pendente($numero1,$numero2,$data,$link)
	{
		$data_decisao = null;
		$numerocd1 = montar_numerocd($numero1);
		$numerocd2 = montar_numerocd($numero2);
		$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and data>'$data' and decisao in ('recurso provido','recurso provido anvisa','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111','recurso 1001','recurso 1002')";
		$res2 = mysqli_query($link,$cmd2);
		if ($line2=@mysqli_fetch_assoc($res2))
		{
			$data1 = $line2['rpi']; // se tiver duas decisões mas uma for válida, ele considera válido
			$cmd3 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho='PR - Recursos' and data='$data1'";
			$res3 = mysqli_query($link,$cmd3);
			if ($line3=@mysqli_fetch_assoc($res3))	$data_decisao = $line3['data'];
		}
		return $data_decisao;
	}

	function conectar_url($url, $return_json = false) {
		// Configura os cabeçalhos da requisição
		$headers = [
			"Accept: application/json",
			"User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36"
		];

		// Inicializa o cURL
		$ch = curl_init();
		// $url = 'https://www.cientistaspatentes.com.br/apiphp/menu_api.php'; funcionou !!

		// Configura as opções do cURL
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_VERBOSE, true);
		
		echo "Teste $url<BR>"; // teste primeiro no browser, sempre com a VPN ligada !
		// https://siscap.inpi.gov.br/adm/pareceres/dicel/1120130055581360866.txt

		// Executa a requisição e obtém a resposta
		$response = curl_exec($ch);
		if ($response === false) {
			echo 'Erro cURL: ' . curl_error($ch);
		} else {
			$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			echo 'Status HTTP: ' . $http_status;
			#print("response=");
			#print($response);
			curl_close($ch);
			if ($http_status == 200) {
				if ($return_json) {
					# print("entrei");
					$data = json_decode($response, true); // Converte a resposta JSON para um array associativo
					# $json_data = json_encode($data, JSON_PRETTY_PRINT); // Formata o JSON com indentação
					return $response;
				} else
					return $response; // Retorna o texto da resposta
			} else
				return "Erro: " . $http_status;
		}

		curl_close($ch);
	}
	
	function limpar_caracteres_de_controle($string) {
		return preg_replace('/[[:cntrl:]]/', '', $string);
	}
 # a rotina em Python que le os arquivos TXT e extrai as anterioridades e gera as instruções INSERT para atualizar a tabela anterioridades:
 # http://localhost:8888/notebooks/patentbr.ipynb
 # esta rotina foi escrita em Python porque a rotina em PHP não consegue ter os arquivos TXT da rede do INPI, mas o Python consegue (VPN ligada)
 # a rotina API https://otimistarj.pythonanywhere.com/chat (senha 037569ab) por sua vez acessa a LLM e obstem os resumos, esse acesso a LLM somente via Python pois o PHP nao tem as funções para openai
 
	if ($action==171) 	# https://cientistaspatentes.com.br/central/control.php?action=171&numero=112013005558
	{
		if ($op==2)
		{
			$total = 0;
			$cmd2 = "select * from anterioridades where doc like 'US%'"; // US2013177069, US6926039, US20150232775
			$res2 = mysqli_query($link,$cmd2);
			while ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero = $line2["numero"];
				$doc = $line2["doc"];
				$codigo = $line2["codigo"];
				if (strlen($doc)==12)
				{
					$total = $total + 1;
					$doc_final = substr($doc,0,6).'0'.substr($doc,6);

					$cmd3 = "select * from anterioridades where numero='$numero' and doc='$doc_final' and codigo='$codigo';"; 
					$res3 = mysqli_query($link,$cmd3);
					if ($line3=@mysqli_fetch_assoc($res3))
					{
						$cmd3 = "delete from anterioridades where numero='$numero' and doc='$doc' and codigo='$codigo';"; 
						echo "$cmd3<BR>";
					}
					else
					{
						$cmd3 = "update anterioridades set doc='$doc_final' where numero='$numero' and doc='$doc';";
						echo "$cmd3<BR>";
					}
				}
			}
			echo "Fim processamento: $total";
			exit();
		}
		
		// phpinfo(); // curl está habilitado !
		$texto_pedido = '';
		$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
		$res2 = mysqli_query($link,$cmd2);
		$numero1 = $numero;
		$numero2 = $numero;
		if ($line2=@mysqli_fetch_assoc($res2))
		{
			$numero1 = $line2["numero1"];
			$numero2 = $line2["numero2"];
		}
		
		$cmd = "SELECT * FROM pedido where (numero='$numero1' or numero='$numero2') and anulado=0 and decisao='indeferimento'";
		$res = mysqli_query($link,$cmd);
		if ($line=@mysqli_fetch_assoc($res)) 
		{
			$codigo = $line['codigo'];
			$divisao = $line['divisao'];
		}
		$url = "https://siscap.inpi.gov.br/adm/pareceres/".$divisao."/".$numero.$codigo.".txt";
		$url = "https://otimistarj.pythonanywhere.com/chat?numero=112012018157&doc=US20030065257";
		echo "$url<BR>";
		
		$response = conectar_url($url, true);
		# echo "<BR>response = $response<BR><BR><BR>";
		$response_limpa = limpar_caracteres_de_controle($response);
		$data = json_decode($response_limpa, true); // Converte a resposta JSON para um array associativo
		# print_r($data);
		if (json_last_error() !== JSON_ERROR_NONE) {
			echo "Erro ao decodificar JSON: " . json_last_error_msg();
		} else {
			echo "Processando...";
			# print_r($data);
		}
		echo "<BR><BR>";
		if (isset($data['Resumo D1'])) echo "<B>Resumo D1: </B>" . $data['Resumo D1']."<BR><BR>";
		if (isset($data['Problemas D1'])) echo "<B>Problemas D1: </B>" . $data['Problemas D1']."<BR><BR>";
		if (isset($data['Comparacao'])) echo "<B>Comparacao: </B>" . $data['Comparacao']."<BR><BR>";

		exit();
		
		$filename = "test.txt";
		$texto = file_get_contents($filename);
		echo "texto = $texto<BR>";
		exit();
		
		$pattern = "/(D\d+)\s+([A-Z]+\s?\d+)\s+([A-B]\d)?\s+(\d{2}\/\d{2}\/\d{4})/";
		preg_match_all($pattern, $texto, $matches, PREG_SET_ORDER);
		foreach ($matches as $match) {
			$docnumber = $match[1];
			$documento = $match[2];
			$tipo = isset($match[3]) ? $match[3] : null;
			$data_publicacao = $match[4];
			$documento = trim(strtoupper(str_replace(" ","",$documento)));

			echo "DocNumber: " . $docnumber . "<BR>";
			echo "Documento: " . $documento . "<BR>";
			echo "Tipo: " . $tipo . "<BR>";
			echo "Data de Publicação: " . $data_publicacao . "<BR><BR>";
		}
			
		echo "Fim de processamento: codigo=$codigo, divisao=$divisao";
		exit();
	}

	if ($action==170) 	
	{
		$i = 0;
		$fname="results.csv"; // 102012009582 2012-04-24 2012-03-30 fase nacional da tabela publicados
		@ $fp = fopen($fname,"r");
		if (!$fp)
			echo "Não foi identificado o arquivo texto $fname";
		else
		{
			while (!feof($fp))
			{
				$i = $i + 1;
				#if ($i > 10000) break;
				
				$texto= fgets($fp);
				$texto = trim($texto);
				list($numero,$data_badepi,$data_hostgator) = explode(" ",$texto);
				$numero = trim($numero);

				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				$numero1 = $numero;
				$numero2 = $numero;
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				
				$badepi = false;
				$hostgator = false;
				$cmd2 = "SELECT * FROM despachos_pag where (numero='$numero1' or numero='$numero2') and data_peticao='$data_badepi' and (tipo_peticao='200' or tipo_peticao='848')";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) $badepi = true;
				$cmd3 = "SELECT * FROM despachos_pag where (numero='$numero1' or numero='$numero2') and data_peticao='$data_hostgator' and (tipo_peticao='200' or tipo_peticao='848')";
				$res3 = mysqli_query($link,$cmd3);
				if ($line3=@mysqli_fetch_assoc($res3)) $hostgator = true;
				
				//echo "$numero,$data_badepi [$cmd2],$data_hostgator [$cmd3]<BR>";

				if ($badepi and !$hostgator)
				{
					$cmd = "update publicados set data_nacional='$data_badepi' where (numero='$numero1' or numero='$numero2')";
					echo "$cmd;<BR>";
					// $res = mysqli_query($link,$cmd);
				}
				if ($badepi and $hostgator)
					echo "BADEPI e HOSTGATOR certos ? $numero <BR>";
				if (!$badepi and $hostgator)
					echo "BADEPI conferir $numero dt_entrada indicado no badepi: $data_badepi, petição 200 no PAG consta $data_hostgator ?<BR>";
				if (!$badepi and !$hostgator)
					echo "errados BADEPI $data_badepi e HOSTGATOR $data_hostgator ? $numero <BR>";

			}
		}
		echo "Fim processamento";
		exit();
		
		$i = 0;
		$fname="badepiv10_ptn_deposito.csv"; // 2000,18/01/2000,"MU8000045   ",18/01/2000,06/05/2008
		@ $fp = fopen($fname,"r");
		if (!$fp)
			echo "Não foi identificado o arquivo texto $fname";
		else
		{
			while (!feof($fp))
			{
				$i = $i + 1;
				#if ($i > 10000) break;
				
				$texto= fgets($fp);
				$texto = trim($texto);
				list($ano,$dt_entrada_inpi,$no_pedido,$dt_deposito,$dt_concessao) = explode(",",$texto);
				// echo "$ano,$dt_entrada_inpi,$no_pedido,$dt_deposito,$dt_concessao<BR>";
				$numero = trim($no_pedido);
				$numero = str_replace(' ', '', $numero);
				$numero = str_replace('"', '', $numero);

				if (strcmp($numero,'NO_PEDIDO')!==0) 
				{
					
					if (strlen($numero)>10) 
						$numero = substr($numero,0,12); #102012009008
					else
						$numero = substr($numero,0,9); # PI9804556
					
					$dt_entrada_inpi = trim($dt_entrada_inpi);
					$ano = substr($dt_entrada_inpi,6,4);
					$mes = substr($dt_entrada_inpi,3,2);
					$dia = substr($dt_entrada_inpi,0,2);
					$data_nacional = "$ano-$mes-$dia";

					$dt_deposito = trim($dt_deposito);
					$ano = substr($dt_deposito,6,4);
					$mes = substr($dt_deposito,3,2);
					$dia = substr($dt_deposito,0,2);
					$data_deposito = "$ano-$mes-$dia";
					
					$dt_concessao = trim($dt_concessao);
					if ($dt_concessao<>"")
					{
						$ano = substr($dt_concessao,6,4);
						$mes = substr($dt_concessao,3,2);
						$dia = substr($dt_concessao,0,2);
						$dt_concessao = "$ano-$mes-$dia";
					}
					
					$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					$numero1 = $numero;
					$numero2 = $numero;
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2["numero1"];
						$numero2 = $line2["numero2"];
					}
					
					$cmd2 = "SELECT * FROM publicados where numero='$numero1' or numero='$numero2'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$data_nacional_lida = $line2['data_nacional'];
						if ($data_nacional<>$data_nacional_lida)
							echo "Data de fase nacional diferente em $numero badepi:[$data_nacional] sugerido:[$data_nacional_lida]<BR>";

						$data_deposito_lida = $line2['data_deposito'];
						if ($data_deposito<>$data_deposito_lida)
							echo "Data de depósito diferente em $numero badepi:[$data_deposito] sugerido:[$data_deposito_lida]<BR>";
					}
					else
						echo "Não encontrado $numero ($cmd2)<BR>";
					
					if ($dt_concessao<>"")
					{
						$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and despacho='16.1' and anulado=0";
						$res2 = mysqli_query($link,$cmd2);
						if (!$line2=@mysqli_fetch_assoc($res2))
						{
							$data_concessao_lida = $line2['data'];
							echo "Não encontrei concessão $numero badepi:[$dt_concessao] sugerido:[$data_concessao_lida]<BR>";
						}
					}
				}
			}
		}
		echo "Fim de processamento";
		fclose($fp);
		exit();
	}

	if ($action==1157) 	
	{					
		$inicio = $rpi;
		for ($rpi=$inicio;$rpi>=$inicio-99;$rpi--)
		{
			$ansi = 0;
			if ($rpi<2630) $ansi = 1;
			
			$cmd = "select * from rpis_lidas where rpi='$rpi'";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res)) $data = $line['data'];

			$fname="revistas/P$rpi.txt";
			if (!file_exists($fname)) $fname="revistas/P$rpi.TXT";
				
			if (file_exists($fname))
			{
				echo " - identificado o arquivo $fname<BR><BR>";
				@ $fpr = fopen($fname,"r");
				if (!$fpr)
					echo "Não foi identificado o arquivo texto $fname<BR>";
				else
				{
					$total = 0;$ler_numero=0;$ler_comentario=0;$despacho='';
					while (!feof($fpr))
					{
						if ($ansi==1)
							$linha = utf8_encode(trim(fgets($fpr))); 
						else
							$linha = trim(fgets($fpr)); 
							
						if (!(strpos($linha,'(Cd)')===false))
						{
							$ler_comentario=0;
							$ler_numero = 0;
							$linha = trim(str_replace('(Cd)','',$linha));//echo $linha."<BR>";
							//if ($linha=="PR - Recursos" or $linha=="PR - Nulidades" or $linha=="16.1")
							if ($linha=="1.3" or $linha=="3.1" or $linha=="3.2" or $linha=="1.1")
							{
								$despacho=$linha;
								$ler_numero = 1;
								if (!$inid_detectado)
								{
									$cmd2 = "select * from revistas4 where numero='$numerocd' and data='$data' and despacho='$despacho' and inid='30'";
									$res2 = mysqli_query($link,$cmd2);
									if ($line2=@mysqli_fetch_assoc($res2))
									{
										$cmd2 = "delete from revistas4 where numero='$numerocd' and data='$data' and despacho='$despacho' and inid='30'";
										echo "$cmd2;<BR>";
										if ($gravar==1) $res2 = mysqli_query($link,$cmd2);
									}
								}
								$inid_detectado = false;
							}
						}
						else
						{
							if ($ler_numero==1)
							{
								if (!(strpos($linha,'(21)')===false) or !(strpos($linha,'(11)')===false))
								{
									$linha = trim(str_replace('(21)','',$linha));
									$linha = trim(str_replace('(11)','',$linha));
									$linha = trim(str_replace('BR','',$linha));
									$linha = trim(str_replace(' ','',$linha));
									if ($linha[0]=='P' or $linha[0]=='M') 
										$numero = substr($linha,0,9);
									else
										$numero = substr($linha,0,12);
									
									$numerocd = montar_numerocd($numero);
									//echo "$despacho $numero<BR>";
									$ler_numero = 0;
									$ler_comentario = 1;
								}
							}
							else
							{
								if ($ler_comentario==1)
								{
									if (!(strpos($linha,'(30)')===false))
									{
										$inid = 30;
										$linha = trim(str_replace('(30)','',$linha));
										$linha = trim(str_replace("'",'',$linha));
										$prioridade = trim($linha);
										if (substr($numero,0,2)<>'DI' and substr($numero,0,1)<>'3')
										{
											$inid_detectado = true;
											$cmd2 = "select * from revistas4 where numero='$numerocd' and data='$data' and despacho='$despacho' and inid='30'";
											$res2 = mysqli_query($link,$cmd2);
											if (!$line2=@mysqli_fetch_assoc($res2))
											{
												$cmd2 = "insert into revistas4 (numero,data,despacho,descricao,inid) values ('$numerocd','$data','$despacho','$prioridade','$inid')";
												echo "$cmd2;<BR>";
												if ($gravar==1) $res2 = mysqli_query($link,$cmd2);
											}
											else
											{
												$descricao = $line2['descricao'];
												if ($descricao<>$prioridade)
												{
													$cmd2 = "update revistas4 set descricao='$prioridade' where numero='$numerocd' and data='$data' and despacho='$despacho' and inid='$inid'";
													echo "$cmd2;<BR>";
													if ($gravar==1) $res2 = mysqli_query($link,$cmd2);
												}
											}
										}
										$ler_comentario = 0;
									}
								}
							}
						}
					}
				}
			}
			else
				echo "Arquivo $fname não encontrado<BR>";
		}
		
		$cmd2= "delete FROM `revistas4` WHERE despacho='1.3.1' and inid='30' and descricao like '%retifica%'";
		echo "$cmd2;<BR>";
		if ($gravar==1) $res2 = mysqli_query($link,$cmd2);
		$cmd2= "delete FROM `revistas4` WHERE inid='30' and descricao like '%(57)%'";
		echo "$cmd2;<BR>";
		if ($gravar==1) $res2 = mysqli_query($link,$cmd2);
		echo "Fim processamento";
		exit();
	}

	if ($action==169) 
	{
		$total = 0;
		$cmd = "select * from arquivados where despacho='$op'";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			$numero1 = $numero;
			$numero2 = $numero;
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}
			$cmd2 = "SELECT * FROM publicados where numero='$numero1' or numero='$numero2'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$divisao = $line2['divisao'];
				$cmd2 = "update arquivados set divisao='$divisao' where (numero='$numero1' or numero='$numero2') and despacho='$op'";
				echo "$cmd2;<BR>";
			}
		}
		echo "Fim de processamento";
		exit();
	}
		


	if ($action==1156) 
	{
		$total = 0;
		$cmd = "select * from arquivados where despacho='12.2' and anulado=0";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$data12 = $line['data'];
			$numero = $line['numero'];
			
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			$numero1 = $numero;
			$numero2 = $numero;
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}
			
			$data_decisao = detecta_recurso_pendente($numero1,$numero2,$data12,$link);
			if ($data_decisao==null)
			{
				$cmd2 = "select * from arquivados where despacho='9.2' and anulado=0 and (numero='$numero1' or numero='$numero2')";
				//echo "$cmd2<BR>";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$data92 = $line2['data'];
					$cmd2 = "select * from arquivados where despacho in ('7.1','6.1') and anulado=0 and (numero='$numero1' or numero='$numero2') and data<'$data92' order by data desc";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$decisao = $line2['despacho'];
						if ($decisao=='6.1') 
						{
							echo "$numero $data12<BR>";
							$total++;
						}
					}
				}
			}
		}
		echo "Fim processamento";
		exit();
	}
	

	if ($action==1155) 
	{
		$total = 0;
		$cmd = "select * from arquivados where year(data)>=2012 and despacho='12.2' and anulado>0";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero']; 
			$data = $line['data'];
			$anulado = $line['anulado'];

			$cmd2 = "SELECT * FROM rpis_lidas where rpi='$anulado'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) $data_rpi = $line2['data'];

			$cmd2 = "select * from arquivados where numero='$numero' and data='$data_rpi' and despacho='12.7' and anulado=0";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) continue;

			$cmd2 = "select * from revistas4 where numero='$numerocd' and data='$data_rpi' and despacho='PR - Recursos' and (lower(r.descricao) like '%nulado%')";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) continue;

			$numerocd = montar_numerocd($numero);
			$cmd2 = "select * from revistas4 as r where numero='$numerocd' and (r.inid='co' or r.inid='de' or r.inid='re') and r.despacho='PR - Recursos' and (r.descricao like '%[130]%') and r.data>'$data'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) 
			{
				echo "$numero $data<BR>";
				$total++;
			}
		}
		echo "Fim processamento: $total";
		exit();
	}

	if ($action==1154) // SELECT * FROM `arquivados` WHERE numero='102015004038'
	{
		$numero_anterior = 0;
		$cmd2 = "select * from arquivados where data='2023-08-15' order by numero,anulado";
		$res2 = mysqli_query($link,$cmd2);
		while ($line2=@mysqli_fetch_assoc($res2))
		{
			$numero = $line2['numero']; 
			$id = $line2['id']; 
			$anulado = $line2['anulado']; 
			if ($numero==$numero_anterior)
			{
				if ($anulado==0)
					$cmd2 = "delete * from arquivados where id=$id";
				else
					$cmd2 = "delete * from arquivados where id=$id_anterior";
				echo "$cmd2;<BR>";
			}
			$numero_anterior = $numero;
			$id_anterior = $id;
		}
	}
		
/*
URL: https://titan.hostgator.com.br/mail/
E-mail: administrador@cientistaspatentes.com.br
senha email hostgator: yYZf6sPfTTwbzWX
Configurar via IMAP
	Endereço de e-mail:Seu endereço de e-mail completo
	(por exemplo, info@cientistaspatentes.com.br)
	Senha:Sua senha de e-mail comercial
	Servidor de entrada:imap.titan.email
	Criptografia: SSL/TLS (Porta: 993)
	Servidor de saída:smtp.titan.email
	Criptografia: STARTTLS (Porta: 587)
	Criptografia: SSL/TLS (Porta: 465)
Configurar via POP
	Endereço de e-mail:Seu endereço de e-mail completo
	(por exemplo, info@cientistaspatentes.com.br)
	Senha:Sua senha de e-mail comercial
	Servidor de entrada:pop.titan.email
	Criptografia: SSL/TLS (Porta: 995)
	Servidor de saída:smtp.titan.email
	Criptografia: STARTTLS (Porta: 587)
	Criptografia: SSL/TLS (Porta: 465)
*/

		function detecta_final_recurso_negado($numero1,$numero2,$data,$link)
		{
			$data_decisao = null;
			$numerocd1 = montar_numerocd($numero1);
			$numerocd2 = montar_numerocd($numero2);
			$cmd2 = "select * from revistas4 where (numero='$numerocd1' or numero='$numerocd2') and data>'$data' and (inid='co' or inid='de' or inid='re') and despacho in ('PR - Recursos','111') and (descricao like '%[111]%' or lower(descricao) like '%egado o provimento%' or lower(descricao) like '%egado provimento%' or lower(descricao) like '%antido o indeferimento%' or lower(descricao) like '%ecurso conhecido e negado%')";
			$res2 = mysqli_query($link,$cmd2);//echo "$cmd2<BR>";
			while ($line2=@mysqli_fetch_assoc($res2))
			{
				$data1 = $line2['data']; // se tiver duas decisões mas uma for válida, ele considera válido
				$cmd3 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho='PR - Recursos' and data='$data1'";
				$res3 = mysqli_query($link,$cmd3);//echo "$cmd3<BR>";
				if ($line3=@mysqli_fetch_assoc($res3))	$data_decisao = $line3['data'];
			}

			return $data_decisao;
		}

		/*
		update `arqpatentes` set fase_nacional=null WHERE fase_nacional='0000-00-00';
		update `arqpatentes` set pedexame=null WHERE pedexame='0000-00-00';
		update `arqpatentes` set concessao=null WHERE concessao='0000-00-00';
		update `arqpatentes` set anuidade=null WHERE anuidade='0000-00-00';
		update `arqpatentes` set extincao=null WHERE extincao='0000-00-00';
		update `arqpatentes` set dataout=null WHERE dataout='0000-00-00';
		update `arqpatentes` set data_nacional=data_deposito WHERE data_nacional<data_deposito;
		SELECT * FROM `arqpatentes` WHERE concessao is null and numero in (select numero from arquivados where despacho='16.1' and anulado=0);
		SELECT * FROM `arqpatentes` WHERE data_deposito is null and numero in (select numero from arquivados where despacho='16.1' and anulado=0);
		SELECT * FROM `arqpatentes` WHERE data_nacional is null and numero in (select numero from arquivados where despacho='16.1' and anulado=0);
		SELECT * FROM `arqpatentes` WHERE pedexame is null and numero in (select numero from arquivados where despacho='16.1' and anulado=0);
		SELECT * FROM `arqpatentes` WHERE concessao is null and numero in (select numero from arquivados where despacho='16.1' and anulado=0);
		SELECT * FROM `arqpatentes` WHERE concessao is not null and numero not in (select numero from arquivados where despacho='16.1' and anulado=0); (demora muito)
		SELECT * FROM `arqpatentes` WHERE extincao is null and numero in (select numero from arquivados where despacho in ('21.1','21.2','21.6','21.7') and anulado=0);
		SELECT * FROM `publicados` WHERE data_nacional<data_deposito
		SELECT distinct(despacho) FROM `publicados` WHERE data_nacional is null
		SELECT * FROM `publicados` WHERE despacho in ('3.1','3.2','3.6','4.1) and data_nacional is null
		update publicados set data_nacional=data_deposito  WHERE despacho in ('3.1','3.2','3.6','4.1') and data_nacional is null
		select * from publicados where despacho='' and numero in (select numero from arquivados where despacho in ('1.3','3.1','3.2','2.4') and anulado=0)
		
		
		*/
		
		if ($action==168) // http://localhost/central/control.php?action=168
		{
			echo "Iniciando processamento...<BR>";
			// https://www.uspto.gov/web/patents/classification/cpc/html/conG06Qtoipc.html
			// G06Q00300201 é da IPC
			// G06Q 20/042 G06Q 20/04
			// INSERT INTO `cpc_ipc` (`cpc`, `ipc`) VALUES ('G06Q0020000042', 'G06Q0020000004');
			
			
			/*$fname="g06q.txt"; // G06Q 20/401,G06Q 20/40
			$fname="g.txt"; // G06Q 20/401,G06Q 20/40
            @ $fp = fopen($fname,"r");
            if (!$fp)
                echo "Não foi identificado o arquivo texto $fname";
            else
            {
                while (!feof($fp))
                {
                    $texto= fgets($fp);
                    $texto = trim($texto);
					list($cpc,$ipc) = explode(",",$texto);					
					//echo "$cpc $ipc<BR>";
					
					$pos = strpos($cpc, '/'); 
					$subclasse = substr($cpc,0,4); // G06F 17/30210A
					$grupo = trim(substr($cpc,4,$pos-4));
					$grupo = str_pad($grupo,4,"0",STR_PAD_LEFT);
					$subgrupo = trim(substr($cpc,$pos+1));
					$subgrupo = str_replace("A","",$subgrupo);
					$subgrupo = str_replace("B","",$subgrupo);
					$subgrupo = str_replace("C","",$subgrupo);
					$subgrupo = str_replace("D","",$subgrupo);
					$subgrupo = str_replace("Q","",$subgrupo);
					$subgrupo = str_pad($subgrupo,6,"0",STR_PAD_LEFT);
					$cpc_convertido = "$subclasse$grupo$subgrupo";
					$cpc_convertido = ler_symbol($cpc);
					//echo "$cpc_convertido - $ipc_convertido<BR>";

					$pos = strpos($ipc, '/'); 
					$ipc_convertido = '-';
					if ($pos==true)
					{
						$subclasse = substr($ipc,0,4); // G06F 17/30210A
						$grupo = trim(substr($ipc,4,$pos-4));
						$grupo = str_pad($grupo,4,"0",STR_PAD_LEFT);
						$subgrupo = trim(substr($ipc,$pos+1));
						$subgrupo = str_replace("A","",$subgrupo);
						$subgrupo = str_replace("B","",$subgrupo);
						$subgrupo = str_replace("C","",$subgrupo);
						$subgrupo = str_replace("D","",$subgrupo);
						$subgrupo = str_replace("Q","",$subgrupo);
						$subgrupo = str_pad($subgrupo,6,"0",STR_PAD_LEFT);
						$ipc_convertido = "$subclasse$grupo$subgrupo";
						$ipc_convertido = ler_symbol($ipc);
					}
					$cmd = "INSERT INTO `cpc_ipc` (`cpc`, `ipc`) VALUES ('$cpc_convertido', '$ipc_convertido');";
					echo "$cmd<BR>";
				}
			}
			exit();
			*/
					
			$total = 0;
			$query = "Y10S0706 OR G06N0003 OR G06N000300 OR G06N0003002 OR G06N0003004 OR G06N0003006 OR G06N0003008 OR G06N000302 OR G06N000304 OR G06N00030409 OR G06N00030418 OR G06N00030427 OR G06N00030436 OR G06N00030445 OR G06N00030454 OR G06N00030463 OR G06N00030472 OR G06N00030481 OR G06N0003049 OR G06N000306 OR G06N0003061 OR G06N0003063 OR G06N00030635 OR G06N0003067 OR G06N00030675 OR G06N000308 OR G06N0003082 OR G06N0003084 OR G06N0003086 OR G06N0003088 OR G06N0003105 OR G06N000312 OR G06N0003123 OR G06N0003126 OR G06N000500 OR G06N0005003 OR G06N0005006 OR G06N000502 OR G06N0005022 OR G06N0005025 OR G06N0005027 OR G06N000700 OR G06N0007005 OR G06N000702 OR G06N0007023 OR G06N0007026 OR G06N000704 OR G06N0007043 OR G06N0007046 OR G06N000706 OR G06N0099005 OR G06T220720081 OR G06T220720084 OR G06T00034046 OR G06T0009002 OR G06F001716 OR G05B0013027 OR G05B0130275 OR G05B0013028 OR G05B00130285 OR G05B0013029 OR G05B00130295 OR G05B0221933002 OR G05D00010088 OR G06K0009 OR G10L0015 OR G10L0017 OR G06F001727 OR G06F00172705 OR G06F0017271 OR G06F00172715 OR G06F0017272 OR G06F00172725 OR G06F0017273 OR G06F00172735 OR G06F0017274 OR G06F00172745 OR G06F0017275 OR G06F00172755 OR G06F0017276 OR G06F00172765 OR G06F0017277 OR G06F00172775 OR G06F0017278 OR G06F00172785 OR G06F0017279 OR G06F00172795 OR G06F001728 OR G06F00172809 OR G06F00172818 OR G06F00172827 OR G06F00172836 OR G06F00172845 OR G06F00172854 OR G06F00172863 OR G06F00172872 OR G06F00172881 OR G06F0017289 OR G06F001730029 OR G06F001730032 OR G06F001730035 OR G06F001730247 OR G06F00173025 OR G06F001730253 OR G06F001730256 OR G06F001730259 OR G06F001730262 OR G06F001730522 OR G06F001730525 OR G06F001730528 OR G06F00173053 OR G06F001730401 OR G06F00173043 OR G06F001730654 OR G06F001730663 OR G06F001730666 OR G06F001730669 OR G06F001730672 OR G06F001730684 OR G06F001730687 OR G06F00173069 OR G06F001730702 OR G06F001730705 OR G06F001730707 OR G06F00173071 OR G06F001730713 OR G06F001730731 OR G06F001730734 OR G06F001730737 OR G06F001730743 OR G06F001730746 OR G06F001730784 OR G06F001730787 OR G06F00173079 OR G06F001730793 OR G06F001730796 OR G06F001730799 OR G06F001730802 OR G06F001730805 OR G06F001730808 OR G06F001730811 OR G06F001730814 OR G06F001924 OR G06F0019707 OR G01R00312846 OR G01R00312848 OR G01N022011296 OR G01N00294481 OR G01N00330034 OR G01R00313651 OR G01S0007417 OR G06N0003004 OR G06N0003006 OR G06N0003008 OR G06F0111476 OR G06F00112257 OR G06F00112263 OR G06F001518 OR G06F022074824 OR G06K00071482 OR G06N0007046 OR G11B002010518 OR G10H02250151 OR G10H02250311 OR G10K022103024 OR H01J0223730427 OR H01M000804992 OR H02H00010092 OR H02P00210014 OR H02P00230018 OR H03H020170208 OR H03H222204 OR H04L020125686 OR H04L0202503464 OR H04L0202503554 OR H04L0250254 OR H04L002503165 OR H04L004116 OR H04L004508 OR H04N00214662 OR H04N00214663 OR H04N00214665 OR H04N00214666 OR H04Q02213054 OR H04Q0221313343 OR H04Q02213343 OR H04R0025507 OR G08B0029186 OR B60G026001876 OR B60G026001878 OR B60G026001879 OR B64G02001247 OR E21B020410028 OR B23K0031006 OR B29C294576979 OR B29C0066965 OR B25J0009161 OR A61B00057264 OR A61B00057267 OR Y10S0128924 OR Y10S0128925 OR F02D00411405 OR F03D0007046 OR F05B2270707 OR F05B02270709 OR F16H020610081 OR F16H020610084 OR B60W003006 OR B60W003010 OR B60W003012 OR B60W003014 OR B60W0030143 OR B60W0030146 OR B60W003016 OR B60W0030162 OR B60W0030165 OR B60W003017 OR B62D00150285 OR G06T220730248 OR G06T220730252 OR G06T220730256 OR G06T220730261 OR G06T220730264 OR G06T220730268 OR G06T220730236 OR G05D0001 OR A61B0057267 OR F05D02270709 OR G06T220720084 OR G10K22103038 OR G10L002530 OR H04N00214666 OR A63F001367 OR G06F00172282";
			$query = "G06T0007 OR G06T000120 OR G10L0013 OR G10L0025 OR G10L0099 OR G06F001714 OR G06F0017141 OR G06F0017145 OR G06F0017147 OR G06F0017148 OR G06F0017153 OR G10H2250005 OR G10H2250011 OR G10H2250015 OR G10H2250021 OR G06F01750 OR G06Q003002 OR G06Q00300201 OR G06Q00300202 OR G06Q00300203 OR G06Q00300204 OR G06Q00300205 OR G06Q00300206 OR G06Q00300208 OR G06Q00300209 OR G06Q00300211 OR G06Q00300212 OR G06Q00300213 OR G06Q00300214 OR G06Q00300215 OR G06Q00300216 OR G06Q00300217 OR G06Q00300219 OR G06Q00300221 OR G06Q00300222 OR G06Q00300223 OR G06Q00300224 OR G06Q00300225 OR G06Q00300226 OR G06Q00300227 OR G06Q00300228 OR G06Q00300229 OR G06Q00300231 OR G06Q00300232 OR G06Q00300233 OR G06Q00300234 OR G06Q00300235 OR G06Q00300236 OR G06Q00300237 OR G06Q00300238 OR G06Q00300239 OR G06Q00300241 OR G06Q00300242 OR G06Q00300243 OR G06Q00300244 OR G06Q00300245 OR G06Q00300246 OR G06Q00300247 OR G06Q00300248 OR G06Q00300249 OR G06Q00300251 OR G06Q00300252 OR G06Q00300253 OR G06Q00300254 OR G06Q00300255 OR G06Q00300256 OR G06Q00300257 OR G06Q00300258 OR G06Q00300259 OR G06Q00300261 OR G06Q00300262 OR G06Q00300263 OR G06Q00300264 OR G06Q00300265 OR G06Q00300266 OR G06Q00300267 OR G06Q00300268 OR G06Q00300271 OR G06Q00300272 OR G06Q00300273 OR G06Q00300274 OR G06Q00300275 OR G06Q00300276 OR G06Q00300277 OR G06Q00300278 OR G06Q00300279 OR G06Q00300281 OR G06Q00300282 OR G06Q00300283 OR G06Q00300284 OR G07C0009 OR G06F0021 OR A61B0005 OR A63F001367 OR B23K0031 OR B25J000916 OR B25J000918 OR B25J000920 OR B29C065 OR B60W003006 OR B60W003010 OR B60W003012 OR B60W003014 OR B60W003016 OR B60W0030165 OR B60W003017 OR B62D001502 OR B64G000124 OR B64G000126 OR B64G000128 OR B64G000132 OR B64G000134 OR B64G000136 OR B64G000138 OR E21B0041 OR F02D004114 OR F02D004116 OR F03D000704 OR F16H0061 OR G01N002944 OR G01N002946 OR G01N002948 OR G01N002950 OR G01N002952 OR G01N0033 OR G01R003128 OR G01R003130 OR G01R0031302 OR G01R0031303 OR G01R0031304 OR G01R0031305 OR G01R0031306 OR G01R0031307 OR G01R0031308 OR G01R0031309 OR G01R0031311 OR G01R0031312 OR G01R0031315 OR G01R0031316 OR G01R00313161 OR G01R00313163 OR G01R00313167 OR G01R0031317 OR G01R00313173 OR G01R00313177 OR G01R00313181 OR G01R00313183 OR G01R00313185 OR G01R00313187 OR G01R0031319 OR G01R00313193 OR G01R003136 OR G01R0031364 OR G01R0031367 OR G01S000741 OR G05B001302 OR G05B001304 OR G06F001114 OR G06F001122 OR G06F001124 OR G06F001125 OR G06F001126 OR G06F0011263 OR G06F0011267 OR G06F001127 OR G06F0011273 OR G06F0011277 OR G06F001518 OR G06F001714 OR G06F001715 OR G06F01716 OR G06F001720 OR G06F001727 OR G06F001728 OR G06F001924 OR G06K000714 OR G06K0009 OR G06N0003 OR G06N0005 OR G06N0007 OR G06N0099 OR G06T000120 OR G06T000140 OR G06T000340 OR G06T0007 OR G06T0009 OR G08B002918 OR G08B002920 OR G08B002922 OR G08B002924 OR G08B002926 OR G08B002928 OR G10L0013 OR G10L0015 OR G10L0017 OR G10L0025 OR G10L0099 OR G11B002010 OR G11B002012 OR G11B002014 OR G11B002016 OR G11B002018 OR G16H005020 OR H01M000804992 OR H02H0001 OR H02P0021 OR H02P0023 OR H03H001702 OR H03H001704 OR H03H001706 OR H04L001224 OR H04L001270 OR H04L0012751 OR H04L002502 OR H04L002503 OR H04L002504 OR H04L002505 OR H04L002506 OR H04L002508 OR H04L002510 OR H04L002512 OR H04L002514 OR H04L002517 OR H04L002518 OR H04L002520 OR H04L002522 OR H04L002524 OR H04L002526 OR H04L002503 OR H04N0021466 OR H04R025 OR G07C0009 OR G06F0021 OR G06N000302 OR G06N000304 OR G06N000304127 OR G06N000304136 OR G06N000304145 OR G06N000304154 OR G06N000304190 OR G06N000304E OR G06N000304F OR G06N000304Z OR G06N000306 OR G06N0003063 OR G06N0003067 OR G06N000308 OR G06N000308120 OR G06N000308140 OR G06N000308160 OR G06N000308180 OR G06N000308Q OR G06N000308Z OR G06N000310 OR G06N000308 OR G06N0099 OR G06N000704 OR G06K0009 OR G06K000900 OR G10L0013 OR G10L0025 OR G10L0015 OR G10L0017 OR G10L0099 OR G06F001727 OR G06F001728 OR G06F001730180A OR G06F001730180B OR G06F001730180C OR G06F 17/30210A OR G06F 17/30210D OR G06F 17/30220A OR G06F 17/30310C OR G06F 17/30330C OR G06K 9 OR G06F 19/00130 OR G06N 3/00140 OR G06F 11/14676 OR G06F 11/22657 OR G06F 11/22663 OR G06K 7/14082 OR H01M 8/04992 OR H04N21/466 OR B60W 30/06 OR B60W003010 OR B60W003012 OR B60W003014 OR B60W003016 OR B60W0030165 OR B60W003017 OR F02D004114310H";
			$query = "Y10S0706 OR G06N0003 OR G06N000300 OR G06N0003002 OR G06N0003004 OR G06N0003006 OR G06N0003008 OR G06N000302 OR G06N000304 OR G06N00030409 OR G06N00030418 OR G06N00030427 OR G06N00030436 OR G06N00030445 OR G06N00030454 OR G06N00030463 OR G06N00030472 OR G06N00030481 OR G06N0003049 OR G06N000306 OR G06N0003061 OR G06N0003063 OR G06N00030635 OR G06N0003067 OR G06N00030675 OR G06N000308 OR G06N0003082 OR G06N0003084 OR G06N0003086 OR G06N0003088 OR G06N0003105 OR G06N000312 OR G06N0003123 OR G06N0003126 OR G06N000500 OR G06N0005003 OR G06N0005006 OR G06N000502 OR G06N0005022 OR G06N0005025 OR G06N0005027 OR G06N000700 OR G06N0007005 OR G06N000702 OR G06N0007023 OR G06N0007026 OR G06N000704 OR G06N0007043 OR G06N0007046 OR G06N000706 OR G06N0099005 OR G06T220720081 OR G06T220720084 OR G06T00034046 OR G06T0009002 OR G06F001716 OR G05B0013027 OR G05B0130275 OR G05B0013028 OR G05B00130285 OR G05B0013029 OR G05B00130295 OR G05B0221933002 OR G05D00010088 OR G06K0009 OR G10L0015 OR G10L0017 OR G06F001727 OR G06F00172705 OR G06F0017271 OR G06F00172715 OR G06F0017272 OR G06F00172725 OR G06F0017273 OR G06F00172735 OR G06F0017274 OR G06F00172745 OR G06F0017275 OR G06F00172755 OR G06F0017276 OR G06F00172765 OR G06F0017277 OR G06F00172775 OR G06F0017278 OR G06F00172785 OR G06F0017279 OR G06F00172795 OR G06F001728 OR G06F00172809 OR G06F00172818 OR G06F00172827 OR G06F00172836 OR G06F00172845 OR G06F00172854 OR G06F00172863 OR G06F00172872 OR G06F00172881 OR G06F0017289 OR G06F001730029 OR G06F001730032 OR G06F001730035 OR G06F001730247 OR G06F00173025 OR G06F001730253 OR G06F001730256 OR G06F001730259 OR G06F001730262 OR G06F001730522 OR G06F001730525 OR G06F001730528 OR G06F00173053 OR G06F001730401 OR G06F00173043 OR G06F001730654 OR G06F001730663 OR G06F001730666 OR G06F001730669 OR G06F001730672 OR G06F001730684 OR G06F001730687 OR G06F00173069 OR G06F001730702 OR G06F001730705 OR G06F001730707 OR G06F00173071 OR G06F001730713 OR G06F001730731 OR G06F001730734 OR G06F001730737 OR G06F001730743 OR G06F001730746 OR G06F001730784 OR G06F001730787 OR G06F00173079 OR G06F001730793 OR G06F001730796 OR G06F001730799 OR G06F001730802 OR G06F001730805 OR G06F001730808 OR G06F001730811 OR G06F001730814 OR G06F001924 OR G06F0019707 OR G01R00312846 OR G01R00312848 OR G01N022011296 OR G01N00294481 OR G01N00330034 OR G01R00313651 OR G01S0007417 OR G06N0003004 OR G06N0003006 OR G06N0003008 OR G06F0111476 OR G06F00112257 OR G06F00112263 OR G06F001518 OR G06F022074824 OR G06K00071482 OR G06N0007046 OR G11B002010518 OR G10H02250151 OR G10H02250311 OR G10K022103024 OR H01J0223730427 OR H01M000804992 OR H02H00010092 OR H02P00210014 OR H02P00230018 OR H03H020170208 OR H03H222204 OR H04L020125686 OR H04L0202503464 OR H04L0202503554 OR H04L0250254 OR H04L002503165 OR H04L004116 OR H04L004508 OR H04N00214662 OR H04N00214663 OR H04N00214665 OR H04N00214666 OR H04Q02213054 OR H04Q0221313343 OR H04Q02213343 OR H04R0025507 OR G08B0029186 OR B60G026001876 OR B60G026001878 OR B60G026001879 OR B64G02001247 OR E21B020410028 OR B23K0031006 OR B29C294576979 OR B29C0066965 OR B25J0009161 OR A61B00057264 OR A61B00057267 OR Y10S0128924 OR Y10S0128925 OR F02D00411405 OR F03D0007046 OR F05B2270707 OR F05B02270709 OR F16H020610081 OR F16H020610084 OR B60W003006 OR B60W003010 OR B60W003012 OR B60W003014 OR B60W0030143 OR B60W0030146 OR B60W003016 OR B60W0030162 OR B60W0030165 OR B60W003017 OR B62D00150285 OR G06T220730248 OR G06T220730252 OR G06T220730256 OR G06T220730261 OR G06T220730264 OR G06T220730268 OR G06T220730236 OR G05D0001 OR A61B0057267 OR F05D02270709 OR G06T220720084 OR G10K22103038 OR G10L002530 OR H04N00214666 OR A63F001367 OR G06F00172282";
			$query = "G06T0007 OR G06T000120 OR G10L0013 OR G10L0025 OR G10L0099 OR G06F001714 OR G06F0017141 OR G06F0017145 OR G06F0017147 OR G06F0017148 OR G06F0017153 OR G10H2250005 OR G10H2250011 OR G10H2250015 OR G10H2250021 OR G06F01750 OR G06Q003002 OR G06Q00300201 OR G06Q00300202 OR G06Q00300203 OR G06Q00300204 OR G06Q00300205 OR G06Q00300206 OR G06Q00300208 OR G06Q00300209 OR G06Q00300211 OR G06Q00300212 OR G06Q00300213 OR G06Q00300214 OR G06Q00300215 OR G06Q00300216 OR G06Q00300217 OR G06Q00300219 OR G06Q00300221 OR G06Q00300222 OR G06Q00300223 OR G06Q00300224 OR G06Q00300225 OR G06Q00300226 OR G06Q00300227 OR G06Q00300228 OR G06Q00300229 OR G06Q00300231 OR G06Q00300232 OR G06Q00300233 OR G06Q00300234 OR G06Q00300235 OR G06Q00300236 OR G06Q00300237 OR G06Q00300238 OR G06Q00300239 OR G06Q00300241 OR G06Q00300242 OR G06Q00300243 OR G06Q00300244 OR G06Q00300245 OR G06Q00300246 OR G06Q00300247 OR G06Q00300248 OR G06Q00300249 OR G06Q00300251 OR G06Q00300252 OR G06Q00300253 OR G06Q00300254 OR G06Q00300255 OR G06Q00300256 OR G06Q00300257 OR G06Q00300258 OR G06Q00300259 OR G06Q00300261 OR G06Q00300262 OR G06Q00300263 OR G06Q00300264 OR G06Q00300265 OR G06Q00300266 OR G06Q00300267 OR G06Q00300268 OR G06Q00300271 OR G06Q00300272 OR G06Q00300273 OR G06Q00300274 OR G06Q00300275 OR G06Q00300276 OR G06Q00300277 OR G06Q00300278 OR G06Q00300279 OR G06Q00300281 OR G06Q00300282 OR G06Q00300283 OR G06Q00300284 OR G07C0009 OR G06F0021 OR A61B0005 OR A63F001367 OR B23K0031 OR B25J000916 OR B25J000918 OR B25J000920 OR B29C065 OR B60W003006 OR B60W003010 OR B60W003012 OR B60W003014 OR B60W003016 OR B60W0030165 OR B60W003017 OR B62D001502 OR B64G000124 OR B64G000126 OR B64G000128 OR B64G000132 OR B64G000134 OR B64G000136 OR B64G000138 OR E21B0041 OR F02D004114 OR F02D004116 OR F03D000704 OR F16H0061 OR G01N002944 OR G01N002946 OR G01N002948 OR G01N002950 OR G01N002952 OR G01N0033 OR G01R003128 OR G01R003130 OR G01R0031302 OR G01R0031303 OR G01R0031304 OR G01R0031305 OR G01R0031306 OR G01R0031307 OR G01R0031308 OR G01R0031309 OR G01R0031311 OR G01R0031312 OR G01R0031315 OR G01R0031316 OR G01R00313161 OR G01R00313163 OR G01R00313167 OR G01R0031317 OR G01R00313173 OR G01R00313177 OR G01R00313181 OR G01R00313183 OR G01R00313185 OR G01R00313187 OR G01R0031319 OR G01R00313193 OR G01R003136 OR G01R0031364 OR G01R0031367 OR G01S000741 OR G05B001302 OR G05B001304 OR G06F001114 OR G06F001122 OR G06F001124 OR G06F001125 OR G06F001126 OR G06F0011263 OR G06F0011267 OR G06F001127 OR G06F0011273 OR G06F0011277 OR G06F001518 OR G06F001714 OR G06F001715 OR G06F01716 OR G06F001720 OR G06F001727 OR G06F001728 OR G06F001924 OR G06K000714 OR G06K0009 OR G06N0003 OR G06N0005 OR G06N0007 OR G06N0099 OR G06T000120 OR G06T000140 OR G06T000340 OR G06T0007 OR G06T0009 OR G08B002918 OR G08B002920 OR G08B002922 OR G08B002924 OR G08B002926 OR G08B002928 OR G10L0013 OR G10L0015 OR G10L0017 OR G10L0025 OR G10L0099 OR G11B002010 OR G11B002012 OR G11B002014 OR G11B002016 OR G11B002018 OR G16H005020 OR H01M000804992 OR H02H0001 OR H02P0021 OR H02P0023 OR H03H001702 OR H03H001704 OR H03H001706 OR H04L001224 OR H04L001270 OR H04L0012751 OR H04L002502 OR H04L002503 OR H04L002504 OR H04L002505 OR H04L002506 OR H04L002508 OR H04L002510 OR H04L002512 OR H04L002514 OR H04L002517 OR H04L002518 OR H04L002520 OR H04L002522 OR H04L002524 OR H04L002526 OR H04L002503 OR H04N0021466 OR H04R025 OR G07C0009 OR G06F0021 OR G06N000302 OR G06N000304 OR G06N000304127 OR G06N000304136 OR G06N000304145 OR G06N000304154 OR G06N000304190 OR G06N000304E OR G06N000304F OR G06N000304Z OR G06N000306 OR G06N0003063 OR G06N0003067 OR G06N000308 OR G06N000308120 OR G06N000308140 OR G06N000308160 OR G06N000308180 OR G06N000308Q OR G06N000308Z OR G06N000310 OR G06N000308 OR G06N0099 OR G06N000704 OR G06K0009 OR G06K000900 OR G10L0013 OR G10L0025 OR G10L0015 OR G10L0017 OR G10L0099 OR G06F001727 OR G06F001728 OR G06F001730180A OR G06F001730180B OR G06F001730180C OR G06F001730210A OR G06F001730210D OR G06F001730220A OR G06F001730310C OR G06F001730330C OR G06K0009 OR G06F001900130 OR G06N000300140 OR G06F001114676 OR G06F001122657 OR G06F001122663 OR G06K000714082 OR H01M000804992 OR H04N0021466 OR B60W003006 OR B60W003010 OR B60W003012 OR B60W003014 OR B60W003016 OR B60W0030165 OR B60W003017 OR F02D004114310H";
			$ipc_array=array();
			//list($ipc_array) = explode("OR",$query);
			$ipc_array = preg_split('/\s+OR\s+/', $query, -1, PREG_SPLIT_NO_EMPTY);
			//print_r ($ipc_array);
			foreach ($ipc_array as $ipc)
			{
				$ipc = trim($ipc);
				//echo "$ipc<BR>"; // G06F001730654 = G06F-017/30654; G06F001730180B = G06F-017/3018
				$pos = strpos($ipc, '/'); 
				if ($pos==true)
				{
					$subclasse = substr($ipc,0,4); // G06F 17/30210A
					$grupo = trim(substr($ipc,4,$pos-4));
					$grupo = str_pad($grupo,4,"0",STR_PAD_LEFT);
					$grupo_derwent = str_pad($grupo,3,"0",STR_PAD_LEFT);
					$subgrupo = trim(substr($ipc,$pos+1));
					$subgrupo = str_replace("A","",$subgrupo);
					$subgrupo = str_replace("B","",$subgrupo);
					$subgrupo = str_replace("C","",$subgrupo);
					$subgrupo = str_replace("D","",$subgrupo);
					$subgrupo = str_replace("Q","",$subgrupo);
					$ipc_convertido = "$subclasse$grupo$subgrupo";
					
					$symbol_identificado = false;
					$cmd = "select * from ipc2023 where symbol like '$ipc_convertido%'";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res)) $symbol_identificado = true;

					$symbol_deletado = false;
					$cmd = "select * from ipcdeleted where symbol like '$ipc_convertido%'";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res)) $symbol_deletado = true;
					
					$symbol_cpc = false;
					if ($symbol_identificado==false and $symbol_deletado==false) 
					{
						$cmd = "select * from cpc_ipc where cpc like '$ipc_convertido%'";
						$res = mysqli_query($link,$cmd);
						if ($line=@mysqli_fetch_assoc($res)) $symbol_cpc = true;
					}

					$ipc_derwent = "$subclasse-$grupo_derwent/$subgrupo";
					
					if ($symbol_identificado)
						echo "<font color='green'>$ipc $ipc_convertido $ipc_derwent</font><BR>";
					elseif ($symbol_deletado)
						echo "<font color='red'>$ipc $ipc_convertido $ipc_derwent</font><BR>";
					elseif ($symbol_cpc)
						echo "<font color='blue'>$ipc $ipc_convertido $ipc_derwent</font><BR>";
					else
						echo "$ipc $ipc_convertido $ipc_derwent<BR>";
				}
				else
				{
					$ipc = trim($ipc);
					$subclasse = substr($ipc,0,4); // G06T0007 G06T000120 G06F0017141 G06Q00300201
					$grupo = trim(substr($ipc,4,4));
					$grupo = str_pad($grupo,4,"0",STR_PAD_LEFT);
					$grupo_derwent = str_pad($grupo,4,"0",STR_PAD_LEFT);
					$subgrupo = trim(substr($ipc,8));
					$grupo_presente = true;
					if (strlen($subgrupo)==0) $grupo_presente = false;
					$subgrupo = str_replace("A","",$subgrupo);
					$subgrupo = str_replace("B","",$subgrupo);
					$subgrupo = str_replace("C","",$subgrupo);
					$subgrupo = str_replace("D","",$subgrupo);
					$subgrupo = str_replace("Q","",$subgrupo);
					if ($grupo_presente)
						$ipc_convertido = "$subclasse$grupo$subgrupo";
					else
						$ipc_convertido = "$subclasse$grupo";

					$symbol_identificado = false;
					$cmd = "select * from ipcsymbol where symbol like '$ipc_convertido%'";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res)) $symbol_identificado = true;

					$symbol_deletado = false;
					$cmd = "select * from ipcdeleted where symbol like '$ipc_convertido%'";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res)) $symbol_deletado = true;

					$symbol_cpc = false;
					if ($symbol_identificado==false and $symbol_deletado==false) 
					{
						$cmd = "select * from cpc_ipc where cpc like '$ipc_convertido%'";
						$res = mysqli_query($link,$cmd);
						if ($line=@mysqli_fetch_assoc($res)) $symbol_cpc = true;
					}

					if ($grupo_presente)
						$ipc_derwent = "$subclasse-$grupo_derwent/$subgrupo";
					else
						$ipc_derwent = "$subclasse-$grupo_derwent";

					if ($symbol_identificado)
						echo "<font color='green'>$ipc $ipc_convertido $ipc_derwent</font><BR>";
					elseif ($symbol_deletado)
						echo "<font color='red'>$ipc $ipc_convertido $ipc_derwent</font><BR>";
					elseif ($symbol_cpc)
						echo "<font color='blue'>$ipc $ipc_convertido $ipc_derwent</font><BR>";
					else
						echo "$ipc $ipc_convertido $ipc_derwent<BR>";				}
			}
			exit();
			
		}
		
		if ($action==167) // http://localhost/teste.php?action=167&ano=2021
		{
			echo "Iniciando processamento ($ano)...<BR>";
			$total = 0;
			if ($ano==2021)
			{
				$examinadores_CGREC = array('abrantes','alciclea','cinopoli','cidade','darlan3','deborasg','edibraga','fabios','fertc','giselleg','helenojc','jordy','luiz','luizcvd','mariaa','moreira','rcdutra','rockrio','rosanab');
			}
			if ($ano==2022)
			{
				$examinadores_CGREC = array('abrantes','alciclea','cinopoli','cidade','darlan','darlan2','darlan3','deborasg','fabios','fertc','giselleg','helenojc','jordy','liraml','luiz','luizcvd','moreira','rcdutra','rockrio','rosanab');
			}

			$contagem = array();
			$contagem[1] = 0;
			$contagem[2] = 0;
			$contagem[3] = 0;
			$contagem[4] = 0;
			$total = 0;$provido=0;$negado=0;$intermediario=0;$soma_etapas=0;

			$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.instancia='recurso' and p.decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso exigencia','recurso exigencia 121','recurso ciencia') and e.dono=1 and year(e.data)=$ano";
//			$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.instancia='recurso' and e.dono=1 and year(e.data)=2021 and e.data>'2021-07-20'"; 
//			$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.instancia='recurso' and p.decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso exigencia','recurso exigencia 121','recurso ciencia') and e.dono=1 and year(e.data)=2021 and e.data>'2021-07-20'";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$codigo = $line['codigo'];
				$email = $line['email'];
				if ($email=='darlan2' or $email=='darlan3') $email='darlan';
				if (!(in_array($email,$examinadores_CGREC))) continue;

				$total++;

				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				$numero1 = $numero;
				$numero2 = $numero;
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}

				$etapa = 0;$etapa_detectada = 0;
				$cmd2 = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.numero='$numero1' or numero='$numero2') and p.instancia='recurso' and e.dono=1 order by e.data asc";
				//echo $cmd2;exit();
				$res2 = mysqli_query($link,$cmd2);
				while ($line2=@mysqli_fetch_assoc($res2))
				{
					$data2 = $line2['data'];
					$decisao2 = $line2['decisao'];
					$codigo2 = $line2['codigo'];

					if ($decisao2=='recurso provido' or $decisao2=='recurso negado' or $decisao2=='recurso manutencao do indeferimento 111' or $decisao2=='recurso exigencia' or $decisao2=='recurso exigencia 121' or $decisao2=='recurso ciencia')
					{
						$etapa++;  // elimina recurso anvisa, anvisacgrec, artigo 34
						if ($codigo == $codigo2) // ira identificar que etapa é este pareecer, porque eles aparecem em odem crescente de data neste loop
						{
							$etapa_detectada = $etapa;
							if ($decisao2=='recurso provido')
								$provido++;
							else if ($decisao2=='recurso negado' or $decisao2=='recurso manutencao do indeferimento 111')
								$negado++;
							else
								$intermediario++;

							if ($decisao2=='recurso provido' or $decisao2=='recurso negado' or $decisao2=='recurso manutencao do indeferimento 111') $soma_etapas = $soma_etapas + $etapa;
						}
					}
				}
				$contagem[$etapa_detectada]++;

				//echo "Etapa detectada: $etapa_detectada<BR>";
				//exit();
			}
			echo "Total: $total<BR>Etapa 1: ".$contagem[1]."<BR>Etapa 2: ".$contagem[2]."<BR>Etapa 3: ".$contagem[3]."<BR>Etapa 4: ".$contagem[4]."<BR>Etapa 5: ".$contagem[5]."<BR>Etapa 6: ".$contagem[6]."<BR>";
			//$media = round((1*$contagem[1] + 2*$contagem[2] + 3*$contagem[3] + 4*$contagem[4])/$total,2);
			if ($total>0)
				$percentual = round(100*$contagem[1]/$total,2);
			else
				$percentual = 0;
			echo "percentual de primeira etapa: $percentual %<BR>";
			$decisao = $provido + $negado;
			if ($decisao>0)
			{
				$mediaetapas = round($soma_etapas/$decisao,2);
				$percentual = round(100*$provido/$decisao,2);
				$taxa = round($intermediario/$decisao,2);
			}
			else
			{
				$mediaetapas = 0;
				$percentual = 0;
				$taxa = 0;
			}
			echo "$ano media de etapas para decisão: $mediaetapas<BR>";
			echo "provido: $provido, negado: $negado, taxa provimento: $percentual % <BR>";
			echo "decisao: $decisao, intermediários: $intermediario, taxa de intermediários: $taxa<BR><BR>";
			//exit();


			foreach ($examinadores_CGREC as $examinador) // repetir a mesma conta agora por examinador
			{
				if ($examinador=='darlan2' or $examinador=='darlan3') $examinador='darlan';
				$contagem = array();
				$contagem[1] = 0;
				$contagem[2] = 0;
				$contagem[3] = 0;
				$contagem[4] = 0;
				$total = 0;$provido=0;$negado=0;$intermediario=0;$soma_etapas=0;

				if ($examinador=='darlan')
					$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.instancia='recurso' and p.decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso exigencia','recurso exigencia 121','recurso ciencia') and e.dono=1 and e.email in ('darlan','darlan2','darlan3') and year(e.data)=$ano";
				else
					$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.instancia='recurso' and p.decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso exigencia','recurso exigencia 121','recurso ciencia') and e.dono=1 and e.email='$examinador' and year(e.data)=$ano";
//				$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.instancia='recurso' and e.dono=1 and e.email='$examinador' and year(e.data)=2021 and e.data>'2021-07-20'";
//				$cmd = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and p.instancia='recurso' and e.dono=1 and e.email='$examinador' and year(e.data)=2021 and e.data>'2021-07-20' and p.decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso exigencia','recurso exigencia 121','recurso ciencia')";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$codigo = $line['codigo'];
					$total++;

					$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					$numero1 = $numero;
					$numero2 = $numero;
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2["numero1"];
						$numero2 = $line2["numero2"];
					}

					$etapa = 0;$etapa_detectada = 0;
					if (examinador=='darlan')
						$cmd2 = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.numero='$numero1' or numero='$numero2') and p.instancia='recurso' and e.dono=1 and (e.email='darlan' or e.email='darlan2' or e.email='darlan3') order by e.data asc";
					else
						$cmd2 = "SELECT * FROM pedido as p, examinador as e WHERE p.codigo=e.codigo and (p.numero='$numero1' or numero='$numero2') and p.instancia='recurso' and e.dono=1 and e.email='$examinador' order by e.data asc";
						
					//echo $cmd2;exit();
					$res2 = mysqli_query($link,$cmd2);
					while ($line2=@mysqli_fetch_assoc($res2))
					{
						$etapa++;
						$data2 = $line2['data'];
						$decisao2 = $line2['decisao'];
						$codigo2 = $line2['codigo'];
						//echo "$numero $etapa $data2<BR>";
						if ($codigo == $codigo2)
						{
							$etapa_detectada = $etapa;
							if ($decisao2=='recurso provido')
								$provido++;
							else if ($decisao2=='recurso negado' or $decisao2=='recurso manutencao do indeferimento 111')
								$negado++;
							else
								$intermediario++;

							if ($decisao2=='recurso provido' or $decisao2=='recurso negado' or $decisao2=='recurso manutencao do indeferimento 111') $soma_etapas = $soma_etapas + $etapa;
						}
					}
					$contagem[$etapa_detectada]++;

					//echo "Etapa detectada: $etapa_detectada<BR>";
					//exit();
				}
				echo "<B>$examinador</B><BR>Total: $total<BR>Etapa 1: ".$contagem[1]."<BR>Etapa 2: ".$contagem[2]."<BR>Etapa 3: ".$contagem[3]."<BR>Etapa 4: ".$contagem[4]."<BR>";
				$media = round((1*$contagem[1] + 2*$contagem[2] + 3*$contagem[3] + 4*$contagem[4])/$total,2);
				if ($total>0)
					$percentual = round(100*$contagem[1]/$total,2);
				else
					$percentual = 0;
				echo "percentual de primeira etapa: $percentual %<BR>";
				$decisao = $provido + $negado;
				if ($decisao>0)
				{
					$mediaetapas = round($soma_etapas/$decisao,2);
					$percentual = round(100*$provido/$decisao,2);
					$taxa = round($intermediario/$decisao,2);
				}
				else
				{
					$mediaetapas = 0;
					$percentual = 0;
					$taxa = 0;
				}
				echo "media de etapas para decisão: $mediaetapas<BR>";
				echo "provido: $provido, negado: $negado, taxa provimento: $percentual % <BR>";
				echo "decisao: $decisao, intermediários: $intermediario, taxa de intermediários: $taxa<BR><BR>";
				//exit();
			}
			echo "Fim de processamento: $total<BR>";
			exit();
		}
		
		if ($action==1153)
		{
			$divisoes2 = array ('ditex','difari','difarii','dipol','dinor');
			foreach ($divisoes2 as $divisao) 
			{
				$total[$divisao]=0;
				$deferido[$divisao]=0;
				$nulidade[$divisao]=0;
				$indeferido[$divisao]=0;
				$recurso[$divisao]=0;
				$recurso_provido[$divisao]=0;
				$recurso_negado[$divisao]=0;
			}
			$total_dirpa = 0;
			$deferido_dirpa = 0;
			$nulidade_dirpa = 0;
			$indeferido_dirpa = 0;
			$recurso_dirpa = 0;
			$recurso_provido_dirpa = 0;
			$recurso_negado_dirpa = 0;

			$cmd_main = "select * from arquivados where despacho='6.21' and anulado=0 and year(data)=2021";
			$cmd_main = "select * from arquivados where despacho='6.21' and anulado=0";
			$res_main = mysqli_query($link,$cmd_main);
			while ($line_main=@mysqli_fetch_assoc($res_main))
			{
				$numero = $line_main['numero'];
				$data_rpi = $line_main['data'];
				$divisao = $line_main['divisao'];
				
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "select * from pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2['numero1'];
					$numero2 = $line2['numero2'];
				}

/*
	'8.11'	=>'Manutenção do Arquivamento',
	'10.1'	=>'Desistência homologada',
	'10.9'	=>'Retirada homologada Art.29 §1° da LPI',
	'11.1.1'=>'Arquivamento definitivo Art. 33',
	'11.2' 	=>'Arquivamento definitivo Art.36 §1° da LPI (não manifestação de exigência técnica)',
	'11.4' 	=>'Arquivamento definitivo Art.38 §2° da LPI (não pagamento de carta patente)',
	'11.5'	=>'Arquivamento Art.34 da LPI (não apresentação de documentação)',
	'11.6'	=>'Arquivamento definitivo Art.216 §2° da LPI (não apresentada procuração)',
	'11.11'	=>'Arquivamento definitivo Art.17 §2° da LPI (prioridade interna)',
	'11.12' =>(AECON não considera terminal)'Arquivamento Art.26 parágrafo único da LPI (divisão de pedido indevida)',
	'11.17' =>(AECON não considera terminal)'Arquivamento do pedido de Certificado de Adição de Invenção Art.77 da LPI',
	'11.18' =>(AECON não considera terminal)'Arquivamento definitivo por não anuência da ANVISA',
	'11.20' => 'Manutenção do arquivamento'
	'11.30' =>(AECON não considera terminal)'Arquivamento definitivo - Art. 18 §1° da Lei 5772/71',
	'11.31' =>(AECON não considera terminal)'Arquivamento definitivo - Falta de cumprimento de exigência',
	'11.34' => 'Arquivamento'
*/
				$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('8.11','10.1','10.9','11.1.1','11.2','11.4','11.5','11.6','11.11','11.12','11.17','11.18','11.20','11.30','11.31,'11.34') and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) continue; 
				
				$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='2.4' and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) continue; 

				$divisao = '';
				$cmd2 = "select * from pedido where (numero='$numero' or numero='$numero') and decisao='6.21'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) $divisao = $line2['divisao'];
				if ($divisao=='') echo "$numero divisao vazia<BR>";

				$total_dirpa++;
				$total[$divisao]++;

				$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='9.1' and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))  // todos estes 9.1 tiveram 16.1 pois o arquivado 11.4 já foi excluído
				{
					$deferido_dirpa++;
					$deferido[$divisao]++;
					$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='17.1' and anulado=0";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$nulidade_dirpa++;
						$nulidade[$divisao]++;
					}
				}

				$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='9.2' and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) 
				{
					$indeferido_dirpa++;
					$indeferido[$divisao]++;
					$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='12.2' and anulado=0";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$data = $line2['data'];
						$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('recurso provido','recurso 100') and anulado=0 and rpi>'$data'";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
						{
							$recurso_provido_dirpa++;
							$recurso_provido[$divisao]++;
						}
						$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('recurso negado','recurso 111','recurso manutencao do indeferimento 111') and anulado=0 and rpi>'$data'";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
						{
							$recurso_negado_dirpa++;
							$recurso_negado[$divisao]++;
						}
							
						$recurso_dirpa++;
						$recurso[$divisao]++;
					}
				}
			}
			echo "<B>DIRPA:</B><BR>";
			echo "Total 6.21: $total_dirpa<BR>";
			echo "Deferidos (9.1): $deferido_dirpa<BR>";
			echo "Nulidades (17.1): $nulidade_dirpa<BR>";
			$percentual = round(100*$nulidade_dirpa/$deferido_dirpa,2);
			echo "Percentual Nulidades: $percentual %<BR>";
			echo "Indeferidos (9.2): $indeferido_dirpa<BR>";
			echo "Recursos (12.2): $recurso_dirpa<BR>";
			$percentual = round(100*$recurso_dirpa/$indeferido_dirpa,2);
			echo "Percentual Recursos: $percentual %<BR>";
			echo "Recursos providos: $recurso_provido_dirpa<BR>";
			echo "Recursos negados: $recurso_negado_dirpa<BR>";
			$percentual = round(100*$recurso_provido_dirpa/($recurso_provido_dirpa + $recurso_negado_dirpa),2);
			echo "Taxa de provimento dos recursos: $percentual<BR><BR>";

			$total_cgpati = 0;
			$deferido_cgpati = 0;
			$nulidade_cgpati = 0;
			$indeferido_cgpati = 0;
			$recurso_cgpati = 0;
			foreach ($divisoes2 as $divisao)
			{
				$total_cgpati = $total_cgpati + $total[$divisao];
				$deferido_cgpati = $deferido_cgpati + $deferido[$divisao];
				$nulidade_cgpati = $nulidade_cgpati + $nulidade[$divisao];
				$indeferido_cgpati = $indeferido_cgpati + $indeferido[$divisao];
				$recurso_cgpati = $recurso_cgpati + $recurso[$divisao];
				$recurso_provido_cgpati = $recurso_provido_cgpati + $recurso_provido[$divisao];
				$recurso_negado_cgpati = $recurso_negado_cgpati + $recurso_negado[$divisao];
			}
			echo "<B>CGPAT I:</B><BR>";
			echo "Total 6.21: $total_cgpati<BR>";
			echo "Deferidos (9.1): ".$deferido_cgpati."<BR>";
			echo "Nulidades (17.1): ".$nulidade_cgpati."<BR>";
			$percentual = round(100*$nulidade_cgpati/$deferido_cgpati,2);
			echo "Percentual Nulidades: $percentual %<BR>";
			echo "Indeferidos (9.2): ".$indeferido_cgpati."<BR>";
			echo "Recursos (12.2): ".$recurso_cgpati."<BR>";
			$percentual = round(100*$recurso_cgpati/$indeferido_cgpati,2);
			echo "Percentual Recursos: $percentual %<BR>";
			echo "Recursos providos: $recurso_provido_cgpati<BR>";
			echo "Recursos negados: $recurso_negado_cgpati<BR>";
			$percentual = round(100*$recurso_provido_cgpati/($recurso_provido_cgpati + $recurso_negado_cgpati),2);
			echo "Taxa de provimento dos recursos: $percentual<BR><BR>";

			foreach ($divisoes2 as $divisao)
			{
				$aux = $divisao_complemento[$divisao];
				echo "<B>Divisao:</B> $aux<BR>";
				echo "Total 6.21: ".$total[$divisao]."<BR>";
				echo "Deferidos (9.1): ".$deferido[$divisao]."<BR>";
				echo "Nulidades (17.1): ".$nulidade[$divisao]."<BR>";
				$percentual = round(100*$nulidade[$divisao]/$deferido[$divisao],2);
				echo "Percentual Nulidades: $percentual %<BR>";

				echo "Indeferidos (9.2): ".$indeferido[$divisao]."<BR>";
				echo "Recursos (12.2): ".$recurso[$divisao]."<BR>";
				$percentual = round(100*$recurso[$divisao]/$indeferido[$divisao],2);
				echo "Percentual Recursos: $percentual %<BR>";
				echo "Recursos providos: ".$recurso_provido[$divisao]."<BR>";
				echo "Recursos negados: ".$recurso_negado[$divisao]."<BR>";
				$percentual = round(100*$recurso_provido[$divisao]/($recurso_provido[$divisao] + $recurso_negado[$divisao]),2);
				echo "Taxa de provimento dos recursos: $percentual<BR><BR>";
			}
			echo "Fim de processamento"; 
			exit();
		}
		
		if ($action==1152)
		{
			$divisoes = array ('dirpa','ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut');
			foreach ($divisoes as $divisao) 
			{
				$recurso[$divisao]=0;
				$nulidade[$divisao]=0;
				$total[$divisao]=0;
				$percentual_divisao[$divisao]=0;
			}

			if ($op==1)
			{
				$cmd_main = "select * from arquivados where despacho='16.1' and anulado=0 and data>='2022-07-05' and data<='2023-06-27'";
				$res_main = mysqli_query($link,$cmd_main);
				while ($line_main=@mysqli_fetch_assoc($res_main))
				{
					$numero = $line_main['numero'];
					$data_rpi = $line_main['data'];

					$numero1 = $numero;
					$numero2 = $numero;
					$cmd2 = "select * from pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2['numero1'];
						$numero2 = $line2['numero2'];
					}

					$cmd2 = "select * from publicados where (numero='$numero1' or numero='$numero2')";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))  $divisao = $line2['divisao'];

					if (!in_array($divisao,$divisoes)) echo "divisão vazia: $numero $divisao<BR>";
					$total[$divisao]++;
					$total['dirpa']++;

					$data215=null;
					$cmd2 = "select * from despachos_pag where (numero='$numero1' or numero='$numero2') and tipo_peticao='215' and data_peticao>'$data_rpi'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) 
					{
						$data215 = $line2['data_peticao'];
						$nulidade[$divisao]++;
						$nulidade['dirpa']++;
					}
					//$divisao = $divisao_complemento[$divisao];
					$divisao = strtoupper($divisao);
					if ($divisao=='DIFARI') $divisao='DIFAR-I';
					if ($divisao=='DIFARII') $divisao='DIFAR-II';
					if (substr($numero2,0,1)=='1' or substr($numero2,0,1)=='2') $numero2 = 'BR'.$numero2;
					echo "$numero2;$data_rpi;$data215;$divisao<BR>";
				}
				echo "Resultados:<BR>";
				$percentual = round(100*$nulidade['dirpa']/$total['dirpa'],2);
				echo "DIRPA: Total 16.1: ".$total['dirpa'].", nulidades: ".$nulidade['dirpa'].", percentual: $percentual %<BR><BR>";
				unset($nulidade[0]); // elimina dirpa
				arsort($nulidade);
				foreach ($nulidade as $key=>$value)
				{
					$percentual = 0;
					if ($total[$key]>0) $percentual = round(100*$nulidade[$key]/$total[$key],2);
					if ($key!='dirpa') $percentual_divisao[$key] = $percentual;
				}
				arsort($percentual_divisao);
				foreach ($percentual_divisao as $key=>$value)
				{
					$divisao = $divisao_complemento[$key];
					if ($divisao=='') $divisao='Não identificada';
					if ($key!='dirpa')echo "$divisao: Total 16.1: ".$total[$key].", nulidades: ".$nulidade[$key].", percentual: ".$percentual_divisao[$key]." %<BR>";
				}
				echo "Fim de processamento";
				exit();
			}

			if ($op==2)
			{
				$cmd_main = "select * from pedido where decisao in ('indeferimento','9.2') and anulado=0 and rpi>='2022-11-08' and rpi<='2023-10-31'";
				$res_main = mysqli_query($link,$cmd_main);
				while ($line_main=@mysqli_fetch_assoc($res_main))
				{
					$numero = $line_main['numero'];
					$data_rpi = $line_main['rpi'];
					$divisao = $line_main['divisao'];

					$numero1 = $numero;
					$numero2 = $numero;
					$cmd2 = "select * from pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2['numero1'];
						$numero2 = $line2['numero2'];
					}

					if ($divisao=='direp')
					{
						$cmd2 = "select * from publicados where (numero='$numero1' or numero='$numero2')";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))  $divisao = $line2['divisao'];
					}

					if (!in_array($divisao,$divisoes)) echo "$numero $divisao<BR>";
					$total[$divisao]++;
					$total['dirpa']++;

					$data214=null;
					$cmd2 = "select * from despachos_pag where (numero='$numero1' or numero='$numero2') and tipo_peticao='214' and data_peticao>'$data_rpi'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) 
					{
						$data214 = $line2['data_peticao'];
						$recurso[$divisao]++;
						$recurso['dirpa']++;
					}
					//$divisao = $divisao_complemento[$divisao];
					$divisao = strtoupper($divisao);
					if ($divisao=='DIFARI') $divisao='DIFAR-I';
					if ($divisao=='DIFARII') $divisao='DIFAR-II';
					if (substr($numero2,0,1)=='1' or substr($numero2,0,1)=='2') $numero2 = 'BR'.$numero2;
					echo "$numero2;$data_rpi;$data214;$divisao<BR>";
				}
				echo "Resultados:<BR>";
				$percentual = round(100*$recurso['dirpa']/$total['dirpa'],0);
				echo "DIRPA: Total indeferimentos: ".$total['dirpa'].", recursos: ".$recurso['dirpa'].", percentual: $percentual %<BR><BR>";
				unset($recurso[0]); // elimina dirpa
				arsort($recurso);
				foreach ($recurso as $key=>$value)
				{
					$percentual = 0;
					if ($total[$key]>0) $percentual = round(100*$recurso[$key]/$total[$key],0);
					if ($key!='dirpa') $percentual_divisao[$key] = $percentual;
				}
				arsort($percentual_divisao);
				foreach ($percentual_divisao as $key=>$value)
				{
					$divisao = $divisao_complemento[$key];
					if ($key!='dirpa')echo "$divisao: Total indeferimentos: ".$total[$key].", recursos: ".$recurso[$key].", percentual: ".$percentual_divisao[$key]." %<BR>";
				}
				echo "Fim de processamento";
				exit();
			}
		}
		
		if ($action==1151)
		{
			$total = 0;
			$cmd_main = "select * from pedido where decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 1001','recurso provido-reforma 100.1','recurso 1002','recurso provido-reforma 100.2','recurso provido-devolucao 100.2','recurso 111','recurso exigencia','recurso exigencia 121','recurso ciencia') and anulado=0 and year(rpi)>2021 order by numero,rpi asc";
			$res_main = mysqli_query($link,$cmd_main);
			while ($line_main=@mysqli_fetch_assoc($res_main))
			{
				$numero = $line_main['numero'];
				$decisao = $line_main['decisao'];
				$rpi = $line_main['rpi'];
				$etapa = $line_main['etapa'];

				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "select * from pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2['numero1'];
					$numero2 = $line2['numero2'];
				}

				$incrementar = 1;
				$etapa2 = 0;
				$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 1001','recurso provido-reforma 100.1','recurso 1002','recurso provido-reforma 100.2','recurso provido-devolucao 100.2','recurso 111','recurso exigencia','recurso exigencia 121','recurso ciencia') and anulado=0 order by rpi asc";//echo $cmd2."$decisao $rpi [$etapa]<BR>";
				$res2 = mysqli_query($link,$cmd2);
				while ($line2=@mysqli_fetch_assoc($res2))
				{
					$decisao2 = $line2['decisao'];
					$rpi2 = $line2['rpi'];
					if ($decisao2=='recurso 100' or $decisao2=='recurso provido' or $decisao2=='recurso 1001' or $decisao2=='recurso provido-reforma 100.1' or $decisao2=='recurso 1002' or $decisao2=='recurso provido-reforma 100.2' or $decisao2=='recurso provido-devolucao 100.2' or $decisao2=='recurso 111' or $decisao2=='recurso negado' or $decisao2=='recurso manutencao do indeferimento 111') // só deve entrar uma vez aqui
					{
						if ($incrementar==1)
							$etapa2 = $etapa2 + 1;
						else
							$etapa2 = $etapa2 + 0;
						$incrementar = 0; // não incrementa mais, basta contar uma vez quando tiver recurso negado,'recurso manutencao do indeferimento 111' e recurso 111 carregados
					}
					else
						$etapa2 = $etapa2 + 1;

					if ($decisao2==$decisao and $rpi==$rpi2) break;
				}

				if ($etapa<>$etapa2)
				{
					$cmd2 = "update pedido set etapa=$etapa2 where numero='$numero' and rpi='$rpi' and decisao='$decisao'";
					$res2 = mysqli_query($link,$cmd2);
					echo "$cmd2;<BR>";
					//exit();
				}
				$total++;
			}
			echo "Fim de processamento: $total<BR>";
			exit();	
		}


		if ($action==1150)
		{
			$total=0;
			$numero_lidos = array();
			$cmd = "SELECT * FROM `arqpatentes` WHERE data_nacional is null";
			$res = mysqli_query($link,$cmd); 
			while ($line=@mysqli_fetch_assoc($res)) 
			{
				$numero = $line['numero'];
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				$numero1 = $numero;
				$numero2 = $numero;
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				if (in_array($numero1,$numero_lidos)) continue;
				if (in_array($numero2,$numero_lidos)) continue;
				$numero_lidos[$total++]=$numero;
				$cmd2 = "SELECT * FROM `publicados` WHERE (numero='$numero1' or numero='$numero2') and data_nacional is not null";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) 
				{
					$data_nacional = $line2['data_nacional'];
					echo "update arqpatentes set data_nacional='$data_nacional' where numero='$numero';<BR>";
					$total++;
				}
			}
			echo "Fim processamento";
			exit();

			$total=0;
			$numero_lidos = array();
			$cmd = "SELECT * FROM `publicados` WHERE despacho=''";
			$res = mysqli_query($link,$cmd); 
			while ($line=@mysqli_fetch_assoc($res)) 
			{
				$numero = $line['numero'];
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				$numero1 = $numero;
				$numero2 = $numero;
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				if (in_array($numero1,$numero_lidos)) continue;
				if (in_array($numero2,$numero_lidos)) continue;
				$numero_lidos[$total++]=$numero;
				$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('1.3','3.1','3.2','2.4') and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) 
				{
					$data = $line2['data'];
					$despacho = $line2['despacho'];
					echo "update publicados set despacho='$despacho', data='$data' where numero='$numero';<BR>";
					$total++;
				}
			}
			echo "Fim processamento";
			exit();

			$total=0;
			$numero_lidos = array();
			$cmd = "SELECT * FROM `arquivados` WHERE despacho='16.1' and year(data)=2022 and anulado=0";
			$res = mysqli_query($link,$cmd); 
			while ($line=@mysqli_fetch_assoc($res)) 
			{
				$numero = $line['numero'];
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				$numero1 = $numero;
				$numero2 = $numero;
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "SELECT * FROM `arqpatentes` WHERE numero='$numero1' or numero='$numero2'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) continue;

				if (in_array($numero1,$numero_lidos)) continue;
				if (in_array($numero2,$numero_lidos)) continue;
				$numero_lidos[$total++]=$numero;
				$cmd2 = "SELECT * FROM `publicados` WHERE numero='$numero1' or numero='$numero2'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) 
				{
					$data_deposito = $line2['data_deposito'];
					$data_nacional = $line2['data_nacional'];
					$dataout = $line2['dataout'];
					$despacho_out = $line2['despacho_out'];
					
					$concessao = null;
					$cmd2 = "SELECT * FROM `arquivados` WHERE (numero='$numero1' or numero='$numero2') and despacho='16.1' and anulado=0";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) $concessao = $line2['data'];
					
					$pedexame = null;
					$cmd2 = "SELECT * FROM `despachos_pag` WHERE (numero='$numero1' or numero='$numero2') and tipo_peticao in ('203','204','205','284','285')";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) $pedexame = $line2['data_peticao'];

					$extincao = null;
					$cmd2 = "SELECT * FROM `arquivados` WHERE (numero='$numero1' or numero='$numero2') and despacho in ('21.1','21.2','21.6','21.7') and anulado=0";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) $extincao = $line2['data'];
					
					$linha2 = "INSERT INTO arqpatentes (numero, data_deposito, data_nacional, pedexame, concessao, anuidade, extincao, dataout, despacho_out) VALUES ('$numero', '$data_deposito', '$data_nacional', '$pedexame', '$concessao', '$anuidade', '$extincao', '$dataout', '$despacho_out');";
					echo "$linha2<BR>";
					$total++;
				}
			}
			echo "Fim processamento";
			exit();

			$total=0;
			$numero_lidos = array();
			$cmd = "SELECT * FROM `arqpatentes` WHERE 1";
			$res = mysqli_query($link,$cmd); 
			while ($line=@mysqli_fetch_assoc($res)) 
			{
				$numero = $line['numero'];
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				$numero1 = $numero;
				$numero2 = $numero;
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				if (in_array($numero1,$numero_lidos)) continue;
				if (in_array($numero2,$numero_lidos)) continue;
				$numero_lidos[$total++]=$numero;
				$cmd2 = "select * from despachos_pag where (numero='$numero1' or numero='$numero2') and tipo_peticao in ('203','204','205','284','285')";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) 
				{
					$pedexame = $line2['data_peticao'];
					echo "update arqpatentes set pedexame='$pedexame' where numero='$numero';<BR>";
					$total++;
				}
			}
			echo "Fim processamento";
			exit();

			$total=0;
			$numero_lidos = array();
			$cmd = "SELECT * FROM `arqpatentes` WHERE concessao is null";
			$res = mysqli_query($link,$cmd); 
			while ($line=@mysqli_fetch_assoc($res)) 
			{
				$numero = $line['numero'];
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				$numero1 = $numero;
				$numero2 = $numero;
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				if (in_array($numero1,$numero_lidos)) continue;
				if (in_array($numero2,$numero_lidos)) continue;
				$numero_lidos[$total++]=$numero;
				$cmd2 = "SELECT * FROM `arquivados` WHERE (numero='$numero1' or numero='$numero2') and despacho='16.1' and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) 
				{
					$concessao = $line2['data'];
					echo "update arqpatentes set concessao='$concessao' where numero='$numero';<BR>";
					$total++;
				}
			}
			echo "Fim processamento";
			exit();

			$total=0;
			$linha2='';
			$fname = "saida.csv"; 
			@ $fpw = fopen($fname,"w");
			$texto = "Numero;Anuidade;Exame;Extinção;Formal;Ultima;Motivação;CD";
			fputs($fpw,$texto."\n");
			echo "$texto<BR>";
			
			$fname="ARQ_DEF.csv"; // PI9800687;19/06/2012;08/06/2004;;;19/06/2012;ANUIDADE;8.11;
            @ $fp = fopen($fname,"r");
            if (!$fp)
                echo "Não foi identificado o arquivo texto $fname";
            else
            {
                while (!feof($fp))
                {
                    $texto= fgets($fp);
                    $texto = trim($texto); 
					$numero="";$anuidade=null;$exame=null;$extincao=null;$formal=null;$ultima=null;$motivacao="";$cd="";
                    @list($numero,$anuidade,$exame,$extincao,$formal,$ultima,$motivacao,$cd) = explode(';',$texto);
					if ($numero=='NO_PEDIDO') continue;
					if ($anuidade<>'')
						$anuidade = substr($anuidade,6,4)."-".substr($anuidade,3,2)."-".substr($anuidade,0,2);
					if ($exame<>'')
						$exame = substr($exame,6,4)."-".substr($exame,3,2)."-".substr($exame,0,2);
					if ($extincao<>'')
						$extincao = substr($extincao,6,4)."-".substr($extincao,3,2)."-".substr($extincao,0,2);
					if ($formal<>'')
						$formal = substr($formal,6,4)."-".substr($formal,3,2)."-".substr($formal,0,2);
					if ($ultima<>'')
						$ultima = substr($ultima,6,4)."-".substr($ultima,3,2)."-".substr($ultima,0,2);
					
					//$linha = "$numero;$anuidade;$exame;$extincao;$formal;$ultima;$motivacao;$cd";
					//echo "$linha<BR>";

					$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					$numero1 = $numero;
					$numero2 = $numero;
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2["numero1"];
						$numero2 = $line2["numero2"];
					}
					
					$anuidade = null;
					$cmd = "SELECT * FROM `despachos_pag_anuidades` WHERE numero='$numero1' or numero='$numero2' order by data_peticao desc";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res)) $anuidade = $line['data_peticao'];
						
					$cmd = "select * from publicados where numero='$numero1' or numero='$numero2'";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res))
					{
						$data_deposito = $line['data_deposito'];
						$fase_nacional = $line['fase_nacional'];
						$pedexame = $line['pedexame'];
						$dataout = $line['dataout'];
						$despacho_out = $line['despacho_out'];
						if ($despacho_out=='16.1' or $despacho_out=='23.9') 
						{
							$despacho_out='';
							$dataout=null;
						}
						
						$concessao = null;
						$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='16.1' and anulado=0";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))	$concessao = $line2['data'];

						$extincao = null;
						$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('21.1','21.2','21.6','21.7') and anulado=0";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))	$extincao = $line2['data'];
						if ($despacho_out=='' and $extincao<>null)
						{
							$despacho_out = $line2['despacho'];
							$dataout = $extincao;
						}
						
						$total++;
						//$linha2 = "$numero;$data_deposito;$fase_nacional;$pedexame;$concessao;$anuidade;$extincao;$dataout;$despacho_out";
						$linha2 = "INSERT INTO arqpatentes (numero, data_deposito, fase_nacional, pedexame, concessao, anuidade, extincao, dataout, despacho_out) VALUES ('$numero', '$data_deposito', '$fase_nacional', '$pedexame', '$concessao', '$anuidade', '$extincao', '$dataout', '$despacho_out');";
						echo "$linha2<BR>";
						//exit();
						
					}
					//else
						//echo "Numero $numero não encontrado na tabela publicados<BR>";
					
					//echo "Fim processamento";
					//exit();
					
				}
			}
			fclose($fpw);
			fclose($fp);
		}
		
		if ($action==1149)
		{
			$total_insert=0;
			$cmd = "SELECT * FROM arquivados where data='$data' order by data asc";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))	
			{
				$despacho = $line['despacho'];
				$numero = $line['numero'];
				$data = $line['data'];
				$divisao = $line['divisao'];
				$anulado = $line['anulado'];
				$prmexame = $line['prmexame'];
				if ($total_insert%300==0) 
				{
					if ($total_insert>0)
					{
						$pos = strrpos($cmd,",");
						$cmd = substr_replace($cmd,";",$pos);
						//$res = mysqli_query($link, $cmd);
						echo "$cmd<BR>";//exit();
					}
					$cmd = "INSERT INTO arquivados (despacho, numero, data, divisao, anulado, prmexame) VALUES";
					$cmd = $cmd." ('$despacho', '$numero',  '$data', '$divisao', $anulado, $prmexame),";
				}
				else
					$cmd = $cmd." ('$despacho', '$numero',  '$data', '$divisao', $anulado, $prmexame),";

				$total_insert++;
			}
			//$res = mysqli_query($link, $cmd);
			$pos = strrpos($cmd,",");
			$cmd = substr_replace($cmd,";",$pos);
			echo "$cmd<BR>";
			echo "Fim processamento<BR>";
			exit();
		}
		
		if ($action==1148) // http://localhost/central/control.php?action=1148
		{
			if ($op==1)
			{
				$anofinal=date('Y');
				for ($ano=2012;$ano<=$anofinal;$ano++)
				{
					$total = 0;
					$somadias =0;
					$cmd = "SELECT * FROM arquivados WHERE year(data)=$ano and despacho='17.1'";
					$res = mysqli_query($link,$cmd); 
					while ($line=@mysqli_fetch_assoc($res)) 
					{
						$numero = $line['numero'];
						$data171 = $line['data'];
						$cmd2 = "SELECT * FROM despachos_pag WHERE numero='$numero' and tipo_peticao='215'";
						$res2 = mysqli_query($link,$cmd2); 
						if ($line2=@mysqli_fetch_assoc($res2)) 
						{
							$data_peticao = $line2['data_peticao'];
							$dias = round((strtotime($data171)-strtotime($data_peticao))/60/60/24,0); // tempo em dias do 205 para o 17.1
							echo "$ano;$numero;$data_peticao;$data171;$dias<BR>";
							$total++;
							$somadias = $somadias + $dias;
						}
						else
							echo "$numero nao achei a petição 215<BR>";
					}
					$media = round($somadias/$total,0);
					echo "Total: $ano;$total;$media<BR>";
				}
			}
			if ($op==2)
			{
				$anofinal=date('Y');
				for ($ano=2012;$ano<=$anofinal;$ano++)
				{
					$total = 0;
					$somadias =0;
					$cmd = "SELECT * FROM pedido WHERE year(rpi)=$ano and decisao='nulidade 1'";
					$res = mysqli_query($link,$cmd); 
					while ($line=@mysqli_fetch_assoc($res)) 
					{
						$numero = $line['numero'];
						$data = $line['rpi'];
						$cmd2 = "SELECT * FROM arquivados WHERE numero='$numero' and despacho='17.1'";
						$res2 = mysqli_query($link,$cmd2); 
						if ($line2=@mysqli_fetch_assoc($res2)) 
						{
							$data171 = $line2['data'];
							$dias = round((strtotime($data)-strtotime($data171))/60/60/24,0); // tempo em dias do 205 para o 17.1
							echo "$ano;$numero;$data171;$data;$dias<BR>";
							$total++;
							$somadias = $somadias + $dias;
						}
						else
							echo "$numero nao achei a o 17.1<BR>";
					}
					$media = round($somadias/$total,0);
					echo "Total: $ano;$total;$media<BR>";
				}
			}
			echo "Fim de processamento:";
			exit();
		}
		
		if ($action==1147) // http://localhost/central/control.php?action=1147&op=2
		{
			$anofinal=date('Y');
			for ($ano=2011;$ano<=$anofinal;$ano++)
			{
				$providos=0;
				$providos_divididos=0;
				$negados=0;
				$negados_divididos=0;
				//for ($mes=1;$mes<=12;$mes++)
				//{
					//$providos=0;
					//$providos_divididos=0;
					//$negados=0;
					//$negados_divididos=0;

					//$cmd = "SELECT * FROM pedido WHERE year(rpi)=$ano and month(rpi)=$mes and decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111')";
					$cmd = "SELECT * FROM pedido WHERE year(rpi)=$ano and decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111')";
					$res = mysqli_query($link,$cmd); 
					while ($line=@mysqli_fetch_assoc($res)) 
					{
						$numero = $line['numero'];
						$decisao = $line['decisao'];
						$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
						$res2 = mysqli_query($link,$cmd2);
						$numero1 = $numero;
						$numero2 = $numero;
						if ($line2=@mysqli_fetch_assoc($res2))
						{
							$numero1 = $line2["numero1"];
							$numero2 = $line2["numero2"];
						}

						if ($op==2)
						{
							$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('6.21','6.22','6.23') and anulado=0";
							$res2 = mysqli_query($link,$cmd2); 
							if (!$line2=@mysqli_fetch_assoc($res2)) continue;
						}

						if ($decisao=='recurso provido') $providos++;
						if ($decisao=='recurso negado' or $decisao=='recurso manutencao do indeferimento 111') $negados++;
						$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='2.4' and anulado=0";
						$res2 = mysqli_query($link,$cmd2); 
						if ($line2=@mysqli_fetch_assoc($res2)) 
						{
							if ($decisao=='recurso provido') $providos_divididos++;
							if ($decisao=='recurso negado' or $decisao=='recurso manutencao do indeferimento 111') $negados_divididos++;
						}
					}

					$providos_naodivididos = $providos - $providos_divididos;
					$negados_naodivididos = $negados - $negados_divididos;
						
					$total_divididos = $providos_divididos + $negados_divididos;
					$total_naodivididos = $providos_naodivididos + $negados_naodivididos;
					$total = $providos + $negados;
						
					$taxa_divididos = round(100*$providos_divididos/($providos_divididos + $negados_divididos),1);
					$taxa_naodivididos = round(100*$providos_naodivididos/($providos_naodivididos + $negados_naodivididos),1);
					$taxa = round(100*$providos/($providos + $negados),1);
						
					echo "$mes;$ano;$providos;$providos_divididos;$negados;$negados_divididos;$taxa;$taxa_divididos;$taxa_naodivididos<BR>";
				//}

			}
/*
			$anofinal=date('Y');
			for ($ano=2011;$ano<=$anofinal;$ano++)
			{
				for ($mes=1;$mes<=12;$mes++)
				{
					$providos=0;
					$cmd = "SELECT count(*) as X FROM pedido WHERE year(rpi)=$ano and month(rpi)=$mes and decisao='recurso provido'";
					$res = mysqli_query($link,$cmd); 
					if ($line=@mysqli_fetch_assoc($res)) $providos = $line['X'];

					$providos_divididos=0;
					$cmd = "SELECT count(*) as X FROM pedido WHERE year(rpi)=$ano and month(rpi)=$mes and decisao='recurso provido' and numero in (select numero from arquivados where despacho='2.4')";
					$res = mysqli_query($link,$cmd); 
					if ($line=@mysqli_fetch_assoc($res)) $providos_divididos = $line['X'];
					
					$providos_naodivididos = $providos - $providos_divididos;

					$negados=0;
					$cmd = "SELECT count(*) as X FROM pedido WHERE year(rpi)=$ano and month(rpi)=$mes and (decisao='recurso negado' or decisao='recurso manutencao do indeferimento 111')";
					$res = mysqli_query($link,$cmd); 
					if ($line=@mysqli_fetch_assoc($res)) $negados = $line['X'];

					$negados_divididos=0;
					$cmd = "SELECT count(*) as X FROM pedido WHERE year(rpi)=$ano and month(rpi)=$mes and (decisao='recurso negado' or decisao='recurso manutencao do indeferimento 111') and numero in (select numero from arquivados where despacho='2.4')";
					$res = mysqli_query($link,$cmd); 
					if ($line=@mysqli_fetch_assoc($res)) $negados_divididos = $line['X'];
					
					$negados_naodivididos = $negados - $negados_divididos;
					
					$total_divididos = $providos_divididos + $negados_divididos;
					$total_naodivididos = $providos_naodivididos + $negados_naodivididos;
					$total = $providos + $negados;
					
					$taxa_divididos = round(100*$providos_divididos/($providos_divididos + $negados_divididos),1);
					$taxa_naodivididos = round(100*$providos_naodivididos/($providos_naodivididos + $negados_naodivididos),1);
					$taxa = round(100*$providos/($providos + $negados),1);
					
					echo "$mes;$ano;$providos;$providos_divididos;$negados;$negados_divididos;$taxa;$taxa_divididos;$taxa_naodivididos<BR>";

				}
			}
*/			echo "Fim processamento";
			exit();
		}
		
		if ($action==1146) // http://localhost/central/control.php?action=1146&divisao=diciv
		{
			$fname = "POWERBI_DIPAE.csv"; // será lido por POWERBI
			@ $fpw = fopen($fname,"w");
			$texto = "Numero;Divisao;Data Deposito;Data Decisao;Tempo Decisao;Etapas;Tipo;Decisao;Email;Decisao Recurso;Imagem";
			fputs($fpw,$texto."\n");
			echo "$texto<BR>";
				
			$examinadores_CGREC = "'cinopoli','alciclea','moreira','abrantes','darlan3','darlan','cidade','deborasg','fabios','fertc','giselleg','helenojc','helenojc2','jordy','liraml','luiz','luizcvd','rcdutra','rockrio','rockrio2','rosanab'";

			$total=0;
			$numero_lidos = array();
			//$cmd = "SELECT * FROM pedido as p, examinador as e where p.codigo=e.codigo and e.dono=1 and p.divisao='dipae' and p.decisao in ('deferimento','defanvisa','indeferimento','9.2')";
			$cmd = "SELECT * FROM pedido as p INNER JOIN examinador as e ON p.codigo=e.codigo where e.dono=1 and p.divisao='$divisao' and p.decisao in ('deferimento','defanvisa','indeferimento','9.2','recurso provido','recurso negado','recurso manutencao do indeferimento 111');";
			if ($divisao=='corep') $cmd = "SELECT * FROM pedido as p INNER JOIN examinador as e ON p.codigo=e.codigo where e.dono=1 and e.email in ($examinadores_CGREC) and p.decisao in ('deferimento','defanvisa','indeferimento','9.2','recurso provido','recurso negado','recurso manutencao do indeferimento 111');";
			echo $cmd;
			$res = mysqli_query($link,$cmd); 
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$anulado = $line['anulado'];
				$divisao = $line['divisao'];
				$decisao = $line['decisao'];
				$instancia = $line['instancia'];
				$email = $line['email'];
				if ($email=='darlan3') $email='darlan';
				if ($email=='helenojc2') $email='helenojc';
				if ($email=='rockrio2') $email='rockrio';
				$etapa = $line['etapa'];
				$data_decisao = $line['rpi'];
				if ($decisao=='defanvisa') $decisao='deferimento';
				$tipo = 'tecnico';
				if ($decisao=='9.2') $tipo = 'administrativo';
				if ($decisao=='9.2') $decisao='indeferimento';
				
				$numerobr = $numero;
				if (strlen($numerobr)==12){
					$numerobr = 'BR'.$numerobr;
				}

				if (in_array($numero,$numero_lidos)) continue;
				$numero_lidos[$total++]=$numero;

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

				if ($tipo=='administrativo')
				{
					$cmd2 = "select * from pedido as p, examinador as e where p.codigo=e.codigo and e.dono=1 and (p.numero='$numero1' or p.numero='$numero2') and p.instancia='1 exame'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))	$email = $line2['email']; 
					//echo "$numerobr;$divisao;$data_deposito;$data_decisao;$tempo;$tipo;$decisao;$email <BR>";
					//exit();
				}
				
				$imagem = '';
				$cmd2 = "select * from servidores where email='$email' and rescisao='0000-00-00'";
				$res2 = mysqli_query($link,$cmd2);
				if (!$line2=@mysqli_fetch_assoc($res2))	continue;
				$imagem = "http://cientistaspatentes.com.br/sinergias/imagens/servidores/".$line2['matricula']."i.jpg"; 

				$data_deposito = null;
				$cmd2 = "SELECT * from publicados WHERE (numero='$numero1' or numero='$numero2')";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))	$data_deposito = $line2['data_deposito']; 

				$decisao_recurso='';
				if ($decisao=='indeferimento')
				{
					$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and (decisao='recurso provido' or decisao='recurso negado' or decisao='recurso manutencao do indeferimento 111') and anulado=0";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) $decisao_recurso = $line2['decisao']; 
				}
				
				$tempo = '';
				if ($data_decisao != null)
				{
					$tempo = round((strtotime($data_decisao)-strtotime($data_deposito))/60/60/24/30/12,2); // tempo em dias do 12.2 para decisao
					$tempo = str_replace('.',',',$tempo);
				}

				$texto = "$numerobr;$divisao;$data_deposito;$data_decisao;$tempo;$etapa;$tipo;$decisao;$email;$decisao_recurso;$imagem";
				fputs($fpw,$texto."\n");
				echo "$texto<BR>";
				$total++;
				//exit();
			}
			echo "Fim processamento: $total<BR>";
			fclose($fpw);
			exit();
		}

		if ($action==1144)
		{
			if ($op==3)
			{
				$cmd = "SELECT * FROM `acoes` WHERE data_notifica is null or data_notifica='0000-00-00'";
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
						$cmd2 = "UPDATE acoes SET data_notifica = '$data' WHERE id = $id";
						echo "$cmd2;<BR>";
						$res2 = mysqli_query($link,$cmd2);
					}
				}
				echo "Fim processamento";
				exit();			
			}
			
			if ($op==2)
			{
				$cmd2 = "SELECT * FROM rpis_lidas where data='$data'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) $rpi = $line2['rpi'];

				$total=0;
				$fname="revistas/P$rpi.txt";
				@ $fp = fopen($fname,"r");
				if (!$fp)
				{
					$fname="revistas/P$rpi.TXT";
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
					$ler_depositante = 0;
					//echo "Iniciando leitura da revista $rpi<BR>";
					while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
					{
						$texto= trim(fgets($fp)); 
						if ($texto=='') continue;
						if (strcmp(substr($texto,0,10),'(Cd) 15.23')==0 or strcmp(substr($texto,0,10),'(Cd) 22.15')==0)
						{
							$ler_numero = 1;
							$ler_depositante = 0;
						}
						if ($ler_numero==1 and strcmp(substr($texto,0,4),'(21)')==0 or strcmp(substr($texto,0,4),'(11)')==0)	
						{	
							$numero_lido = trim(substr($texto,4));
							$pos = strpos($numero_lido,'-');
							$numero_lido = substr($numero_lido,0,$pos);
							$numero_lido = trim(str_replace(" ","",$numero_lido)); // PI 9916155-9 B1
							$numero_lido = trim(str_replace("BR","",$numero_lido));
							$ler_numero = 0;
							$ler_depositante = 1;
						}
						if ($ler_depositante==1 and strcmp(substr($texto,0,4),'(71)')==0)	
						{	
							$depositante = trim(substr($texto,4));
							$depositante = trim(str_replace("'","",$depositante));
							$depositante = trim(str_replace('"',"",$depositante));
							$depositante_utf8 = utf8_encode($depositante);
							echo "$numero_lido $depositante_utf8<BR>";
							$ler_depositante = 0;
						}
					}
				}
				echo "Fim processamento";
				exit();
			}
            $total=0;
			$array_examinador = array (''=>'','Heleno'=>'helenojc','Débora'=>'deborasg','Debora'=>'deborasg','Abrantes'=>'abrantes','Jordy'=>'jordy','Luciana'=>'luciana','Daniela'=>'cidade','Cidade'=>'cidade',
									   'Fábio'=>'fabios','Fabio'=>'fabios','Fernando'=>'fertc','Edi'=>'edibraga','Dora'=>'mariaa','Telma'=>'telma','Luiz'=>'luiz','Luiz Glória'=>'luiz','Gloria'=>'luiz','Glória'=>'luiz','Leila'=>'leilan',
									   'Sônia'=>'soniagb','Giselle'=>'giselleg','Renato'=>'rcdutra','Darlan'=>'darlan','Adriana'=>'cinopoli','Rock'=>'rockrio','Gerson'=>'gerson',
									   'Alcicléa'=>'alciclea','Alcicleia'=>'alciclea','Alciclea'=>'alciclea','Moreira'=>'moreira','Anderson'=>'moreira','Rosana'=>'rosanab','Luiz Eduardo'=>'luizcvd','Luiz Marcelo'=>'liraml');
			$fname="acoes.csv"; // 52400.148112'/2016-15;010396-55.2016.4.02.5101;C19604105-6;Dora;03/04/19;18/04/19;ML;observação
            @ $fp = fopen($fname,"r");
            if (!$fp)
                echo "Não foi identificado o arquivo texto $fname";
            else
            {
                while (!feof($fp))
                {
                    $texto= fgets($fp);
                    $texto = trim($texto); 
                    $total++;
					$datain = null;$dataout = null;$d191 = null;$d1523 = null;$obs = '';
                    @list($sei,$processo,$numero,$examinador,$datain,$dataout,$tipo,$obs) = explode(';',$texto);

					if ($examinador<>'')
					{
						$examinador = str_replace('/',',',$examinador);
						$examinador = str_replace(';',',',$examinador);
						$examinador1 = '';$examinador2 = '';$examinador3='';
						$pos1 = strpos($examinador,',');
						$examinador1 = $array_examinador[trim(substr($examinador,0,$pos1))];
						$pos2 = strpos($examinador,',',$pos1+1);
						if ($pos2!=false) 
						{
							$examinador2 = $array_examinador[trim(substr($examinador,$pos1+1,$pos2-($pos1+1)))];
							$examinador3 = $array_examinador[trim(substr($examinador,$pos2+1))];
						}

						if ($examinador1<>'') 
						{
							if ($examinador3<>'')
								$examinador ="$examinador1,$examinador2,$examinador3";
							else
								$examinador ="$examinador1,$examinador2";
						}
						else
							$examinador=$array_examinador[trim($examinador)];
					}

                    $numero = montar_numerosd($numero);
					if ($datain<>null) $datain = '20'.substr($datain,6,2).'-'.substr($datain,3,2).'-'.substr($datain,0,2);
					if ($dataout<>null) $dataout = '20'.substr($dataout,6,2).'-'.substr($dataout,3,2).'-'.substr($dataout,0,2);
					$cmd = "SELECT * FROM arquivados where numero='$numero' and despacho='19.1'";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res)) $d191=$line['data'];
					$cmd = "SELECT * FROM arquivados where numero='$numero' and despacho='15.23'";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res)) $d1523=$line['data'];
					echo "INSERT INTO `acoes` (`id`, `sei`, `processo`, `numero`, `examinador`, `datain`, `dataout`, `tipo`, `obs`, `15.23`, `19.1`) VALUES (null, '$sei', '$processo', '$numero', '$examinador', '$datain', '$dataout', '$tipo', '$obs', '$d1523', '$d191');<BR>"; 

					/*$cmd2='';
					$pos_processo = strpos($processo,'.5101');
					if ($pos_processo!=false) $cmd2 = "update acoes set processo='$processo' where sei='$sei' and numero='$numero'";
					$pos_processo = strpos($processo,'.3600');
					if ($pos_processo!=false) $cmd2 = "update acoes set processo='$processo' where sei='$sei' and numero='$numero'";
					$pos_processo = strpos($processo,'.7001');
					if ($pos_processo!=false) $cmd2 = "update acoes set processo='$processo' where sei='$sei' and numero='$numero'";
					$pos_processo = strpos($processo,'.3400');
					if ($pos_processo!=false) $cmd2 = "update acoes set processo='$processo' where sei='$sei' and numero='$numero'";
					if ($cmd2<>'') echo "$cmd2;<BR>";*/

					$cmd2 = "select * from arquivados where numero='$numero' and despacho in ('15.23','22.15','19.1')";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) 
					{
						$data = $line2['data'];
						$despacho = $line2['despacho'];
						$cmd2 = "SELECT * FROM rpis_lidas where data='$data'";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) $rpi = $line2['rpi'];
						//echo "rpis lidas $numero $rpi<BR><BR>";
						$total=0;
						$fname="revistas/P$rpi.txt";
						@ $fp2 = fopen($fname,"r");
						if (!$fp2)
						{
							$fname="revistas/P$rpi.TXT";
							@ $fp2 = fopen($fname,"r");
						}
							
						if (!$fp2)
						{
							echo "Não foi identificado o arquivo texto $fname<BR>";
						}
						else
						{
							$texto='';
							$numero_lido = '';
							$ler_numero = 0;
							$ler_sei = 0;
							while (!feof($fp2)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
							{
								$texto= trim(fgets($fp2)); 
								if ($texto=='') continue;
								if (strcmp(substr($texto,0,10),"(Cd) $despacho")==0)
								{
									$ler_numero = 1;
									$ler_sei = 0;
								}
								if ($ler_numero==1 and strcmp(substr($texto,0,4),'(21)')==0 or strcmp(substr($texto,0,4),'(11)')==0)	
								{	
									$numero_lido = trim(substr($texto,4));
									$pos = strpos($numero_lido,'-');
									$numero_lido = substr($numero_lido,0,$pos);
									$numero_lido = trim(str_replace(" ","",$numero_lido)); // PI 9916155-9 B1
									$numero_lido = trim(str_replace("BR","",$numero_lido));
									$ler_numero = 0;
									$ler_sei = 0;
									if ($numero==$numero_lido) $ler_sei = 1;
								}
								if ($ler_sei==1 and strcmp(substr($texto,0,4),'(co)')==0)	
								{	
									$texto = trim(substr($texto,4));
									$pos_sei = strpos($texto,$sei);
									if ($pos_sei!=false) 
									{
										$processo_lido='';
										$pos_processo = strpos($texto,'.5101',$pos_sei);
										if ($pos_processo!=false) 
											$processo_lido = substr($texto,$pos_processo-20,25);
										else
										{
											$pos_processo = strpos($texto,'.3600',$pos_sei);
											if ($pos_processo!=false) 
												$processo_lido = substr($texto,$pos_processo-20,25);
											else
											{
												$pos_processo = strpos($texto,'.7001',$pos_sei);
												if ($pos_processo!=false) 
													$processo_lido = substr($texto,$pos_processo-20,25);
												else
												{
													$pos_processo = strpos($texto,'.3400',$pos_sei);
													if ($pos_processo!=false) 
														$processo_lido = substr($texto,$pos_processo-20,25);
													else
													{
														$pos_processo = strpos($texto,'.0000',$pos_sei);
														if ($pos_processo!=false) 
															$processo_lido = substr($texto,$pos_processo-20,25);
													}
												}
											}
										}
										
										//echo "$numero [$texto] <BR>[$processo]<BR>[$processo_lido] <BR>";
										if ($processo<>$processo_lido)
										{
											$cmd2 = "update acoes set processo='$processo_lido' where sei='$sei' and numero='$numero'";
											echo "$cmd2<BR>";
										}
									}
									$ler_sei = 0;
								}
							}
						}
					}
				}
			}
			//echo "Fim processamento";
			//exit();
		}
		
		if ($action==1143)
		{
/*

Este site dá algumas dicas como fazer a conversão de comandos MySql para Oracle
https://raelcunha.com/oracle/
http://www.sqlines.com/online

comandos CEPIT
selecionar data e protocolo
SELECT
    T1.CD_PEDIDO,T2.NO_PEDIDO,T7.DH_ENTRADA_PROTOCO,T4.DT_PUBLICA_PTN
FROM
    CEPIT_SINPI.PTN_DESPACHO T1
    join CEPIT_SINPI.PTN_PEDIDO T2 ON T1.CD_PEDIDO = T2.CD_PEDIDO
    join CEPIT_SINPI.CRP_PROGRAMA_RPI T4 on T1.NO_RPI=T4.NO_RPI
    left join CEPIT_SINPI.CRP_PROTOCOLO T7 ON T2.CD_PROTOCO = T7.CD_PROTOCO
WHERE
    (T4.DT_PUBLICA_PTN > T7.DH_ENTRADA_PROTOCO or T7.DH_ENTRADA_PROTOCO is null) and
	EXTRACT(YEAR FROM T4.DT_PUBLICA_PTN)=2021 
    order by T4.DT_PUBLICA_PTN DESC
	
SELECT
    distinct(T1.CD_PEDIDO),T2.NO_PEDIDO
FROM
    CEPIT_SINPI.PTN_DESPACHO T1
    join CEPIT_SINPI.PTN_PEDIDO T2 ON T1.CD_PEDIDO = T2.CD_PEDIDO
WHERE
    T1.CD_PEDIDO='1581348'
Resp: 102020013471	

SELECT
    T1.CD_PEDIDO,T2.NO_PEDIDO,T7.DH_ENTRADA_PROTOCO,T4.DT_PUBLICA_PTN,T3.CD_DESPACH_RPI
FROM
    CEPIT_SINPI.PTN_DESPACHO T1
    join CEPIT_SINPI.PTN_PEDIDO T2 ON T1.CD_PEDIDO = T2.CD_PEDIDO
    join CEPIT_SINPI.PTN_TIPO_DESPACHO T3 ON T1.CD_TIPO_DESPACH=T3.CD_TIPO_DESPACH
    join CEPIT_SINPI.CRP_PROGRAMA_RPI T4 on T1.NO_RPI=T4.NO_RPI
    left join CEPIT_SINPI.CRP_PROTOCOLO T7 ON T2.CD_PROTOCO = T7.CD_PROTOCO
WHERE
    TRIM(T3.CD_DESPACH_RPI) in ('9.1','9.2','11.2') and 
    (T4.DT_PUBLICA_PTN > T7.DH_ENTRADA_PROTOCO or T7.DH_ENTRADA_PROTOCO is null) and
	EXTRACT(YEAR FROM T4.DT_PUBLICA_PTN)=2021 and
	(EXTRACT(MONTH FROM T4.DT_PUBLICA_PTN)=8 or EXTRACT(MONTH FROM T4.DT_PUBLICA_PTN)=9 or EXTRACT(MONTH FROM T4.DT_PUBLICA_PTN)=10)
    order by T4.DT_PUBLICA_PTN DESC


SELECT count( * )  FROM CEPIT_SISCAP.siscap_arquivados  WHERE despacho =
'16.1' AND (EXTRACT(YEAR FROM data)>=1997) and numero not in (select numero
from CEPIT_SISCAP.siscap_arquivados where despacho in
('18.3','21.1','21.2','24.8','24.10','21.7','23.19'))
			
SELECT
    T1.CD_PEDIDO,T2.NO_PEDIDO,T1.NO_RPI,T4.DT_PUBLICA_PTN,T3.CD_DESPACH_RPI,T5.NO_RPI as NO_RPI_ANULADOR,T6.DT_PUBLICA_PTN as DT_PUBLICA_ANULADOR
FROM
    CEPIT_SINPI.PTN_DESPACHO T1
    join CEPIT_SINPI.PTN_PEDIDO T2 ON T1.CD_PEDIDO = T2.CD_PEDIDO
    join CEPIT_SINPI.PTN_TIPO_DESPACHO T3 ON T1.CD_TIPO_DESPACH=T3.CD_TIPO_DESPACH
    join CEPIT_SINPI.CRP_PROGRAMA_RPI T4 on T1.NO_RPI=T4.NO_RPI
    join CEPIT_SINPI.PTN_DESPACHO T5 ON T1.CD_DESPACHO_ANULADOR=T5.CD_DESPACHO
    join CEPIT_SINPI.CRP_PROGRAMA_RPI T6 ON T5.NO_RPI = T6.NO_RPI
    left join CEPIT_SINPI.CRP_PROTOCOLO T7 ON T2.CD_PROTOCO = T7.CD_PROTOCO
WHERE
	TRIM(T3.CD_DESPACH_RPI) in ('9.1') and T1.CD_DESPACHO_ANULADOR is not null  and
    (T4.DT_PUBLICA_PTN > T7.DH_ENTRADA_PROTOCO or T7.DH_ENTRADA_PROTOCO is null)
    order by T4.DT_PUBLICA_PTN DESC
	
SELECT
    count(cd_pedido)
FROM
    cepit_sinpi.ptn_tipo_despacho t1
    join cepit_sinpi.ptn_despacho t2 on t1.cd_tipo_despach=t2.cd_tipo_despach
    join cepit_sinpi.crp_programa_rpi t3 on t2.no_rpi=t3.no_rpi
WHERE
	cd_despach_rpi='9.1' and extract(year from dt_publica_ptn)=2020
	
SELECT 
	cd_pedido, cd_despach_rpi "PRIMEIRO EXAME", DT_PUBLICA_PTN "DATA PRIMEIRO EXAME" , NO_RPI "RPI PRIMEIRO EXAME",DH_ENTRADA_PROTOCO
FROM ( 
    select DISTINCT t2.CD_PEDIDO, dt_publica_ptn, cd_despach_rpi, T1.no_rpi,T4.DH_ENTRADA_PROTOCO,RANK() OVER (PARTITION BY T1.cd_pedido ORDER BY dt_publica_ptn) RANK 
    from CEPIT_SINPI.PTN_DESPACHO T1
         JOIN CEPIT_SINPI.PTN_PEDIDO T2 ON T1.CD_PEDIDO = T2.CD_PEDIDO
         JOIN cepit_sinpi.ptn_tipo_despacho T2 ON T1.CD_TIPO_DESPACH=T2.CD_TIPO_DESPACH
         join CEPIT_SINPI.CRP_PROGRAMA_RPI T3 on t1.NO_RPI=t3.NO_RPI
         left JOIN CEPIT_SINPI.CRP_PROTOCOLO T4 ON T2.CD_PROTOCO = T4.CD_PROTOCO
    where TRIM(cd_despach_rpi) in ('6.1','7.1', '9.1') and cd_despacho_anulador is null and (T3.DT_PUBLICA_PTN > T4.DH_ENTRADA_PROTOCO or t4.DH_ENTRADA_PROTOCO is null))
WHERE RANK=1

Problemas detectados:
tem 1220 registros em que data_nacional é menor que data_deposito ! (acontece com os nacionais)
SELECT * FROM `publicados` WHERE data_nacional<data_deposito

tem 133 mil estrangeiros que data deposito = data nacional !!
SELECT * FROM `publicados` WHERE depositante not like '%(BR%' and data_deposito=data_nacional
	
*/
			$total = 0;
			$fname="ciancio.csv";
			@ $fp = fopen($fname,"r");
			if (!$fp)
				echo "Não foi identificado o arquivo texto $fname";
			else
			{
				while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
				{
					$total++;
					$texto= trim(fgets($fp));
					if ($texto=='') continue; // CD_PEDIDO;NO_PEDIDO;DH_ENTRADA_PROTOCO;DT_PUBLICA_PTN;CD_DESPACH_RPI
					$texto = trim(str_replace('"','',$texto));
					list($cd_pedido,$numero,$data_protocolo2,$data_decisao2,$decisao) = explode(';',$texto);
					$numero = trim($numero);
					$data_protocolo2 = substr(trim($data_protocolo2),0,10);
					$data_decisao2 = substr(trim($data_decisao2),0,10);
					
					$numero1 = $numero;
					$numero2 = $numero;
					$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2["numero1"];
						$numero2 = $line2["numero2"];
					}
					$cmd2 = "SELECT * FROM publicados where numero='$numero1' or numero='$numero2'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$data_deposito = $line2['data_deposito'];
						$data_protocolo = $line2['data_nacional'];
						$data_pedido_exame = $line2['pedexame'];
						if ($data_protocolo<>$data_protocolo2)
							echo "$cd_pedido,$numero,[$data_protocolo,$data_protocolo2],$decisao<BR>";
					}
				}
			}
			
			echo "Fim processamento";
			exit();
			$total=0;
			$cmd = "SELECT * FROM `arquivados` WHERE despacho in ('9.1','9.2','11.2') and data>='2021-08-01' and data<='2021-10-31'";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))	
			{
				$total++;
				$numero = $line['numero'];
				$data_decisao = $line['data'];
				$tipo_decisao = $line['despacho'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "SELECT * FROM publicados where numero='$numero1' or numero='$numero2'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$data_deposito = $line2['data_deposito'];
					$data_protocolo = $line2['data_nacional'];
					$data_pedido_exame = $line2['pedexame'];
					$divisao = $line2['divisao'];
					list($ano,$mes,$dia) = explode('-',$data_decisao);
					$idata_decisao = mktime(0,0,0,(integer)$mes,(integer)$dia,(integer)$ano); 
					list($ano,$mes,$dia) = explode('-',$data_pedido_exame);
					$idata_pedido_exame = mktime(0,0,0,(integer)$mes,(integer)$dia,(integer)$ano);
					list($ano,$mes,$dia) = explode('-',$data_protocolo);
					$idata_protocolo = mktime(0,0,0,(integer)$mes,(integer)$dia,(integer)$ano);
					$tempo1 = round(($idata_decisao-$idata_deposito)/(24*60*60),0); 
					$tempo2 = round(($idata_decisao-$idata_pedexame)/(24*60*60),0); 
					$tempo3 = round(($idata_decisao-$idata_protocolo)/(24*60*60),0); 
					//$tempo3 = round(($idata_decisao-$idata_protocolo)/(24*60*60*30*12),2); 
				}
				else
					echo "Não encontrei<BR>";
				
				echo "$numero;$data_deposito;$data_protocolo;$data_pedido_exame;$data_decisao;$tipo_decisao;$tempo1;$divisao<BR>"; 
				// CD_PEDIDO;DATA DE DEPOSITO;DATA DE PROTOCOLO;DATA_PEDIDO_EXAME;DATA_DECISAO;TIPO_DECISAO;TEMPO_DECISAO;DIVISAO
			}
			echo "Fim processamento: $total ";
			exit();
		}
		
		if ($action==1142)
		{
			$total = 0;
			$fname="dados1.csv";
			@ $fp = fopen($fname,"r");
			if (!$fp)
				echo "Não foi identificado o arquivo texto $fname";
			else
			{
				while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
				{
					$total++;
					$texto= trim(fgets($fp));
					if ($texto=='') continue;
					$texto = trim(str_replace('"','',$texto));
					list($cd_pedido,$data_deposito,$data_protocolo,$data_pedexame,$data_prioritario,$data_decisao,$decisao,$tempo_decisao,$divisao,$coordenacao,$natureza,$pct,$pais,$estado,$origem) = explode(';',$texto);
					$data_deposito = trim($data_deposito); // 29/04/2020 09:41
					$data_deposito = substr($data_deposito,6,4).'-'.substr($data_deposito,3,2).'-'.substr($data_deposito,0,2);
					$data_protocolo = trim($data_protocolo);
					$data_protocolo = substr($data_protocolo,6,4).'-'.substr($data_protocolo,3,2).'-'.substr($data_protocolo,0,2);
					$data_pedexame = trim($data_pedexame);
					$data_pedexame = substr($data_pedexame,6,4).'-'.substr($data_pedexame,3,2).'-'.substr($data_pedexame,0,2);
					$data_prioritario = trim($data_prioritario);
					$data_prioritario = substr($data_prioritario,6,4).'-'.substr($data_prioritario,3,2).'-'.substr($data_prioritario,0,2);
					$data_decisao = trim($data_decisao);
					$data_decisao = substr($data_decisao,6,4).'-'.substr($data_decisao,3,2).'-'.substr($data_decisao,0,2);
					
					list($ano,$mes,$dia) = explode('-',$data_decisao);
					$idata_decisao = mktime(0,0,0,(integer)$mes,(integer)$dia,(integer)$ano); // retorna intervalo em segundos desde 1970 de $data_rpi - 90 dias
					list($ano,$mes,$dia) = explode('-',$data_deposito);
					$idata_deposito = mktime(0,0,0,(integer)$mes,(integer)$dia,(integer)$ano); // retorna intervalo em segundos desde 1970 de $data_rpi - 90 dias
					list($ano,$mes,$dia) = explode('-',$data_pedexame);
					$idata_pedexame = mktime(0,0,0,(integer)$mes,(integer)$dia,(integer)$ano); // retorna intervalo em segundos desde 1970 de $data_rpi - 90 dias
					$tempo1 = round(($idata_decisao-$idata_deposito)/(24*60*60),0); 
					$tempo2 = round(($idata_decisao-$idata_pedexame)/(24*60*60),0); 
					$tempo3 = round(($idata_pedexame-$idata_deposito)/(24*60*60*30*12),2); 
					if ($tempo3>3.1) echo "$cd_pedido $data_deposito $data_pedexame $data_decisao $tempo1 $tempo2 $tempo3<BR>";
					//echo "$tempo3<BR>";
					//exit();
				}
			}
			echo "Fim processamento: $total";
			exit();
		}

		if ($action==1141) // http://cientistaspatentes.com.br/central/control.php?action=1141&op=1
		{
			if ($op==2)
			{
				//$cmd = "SELECT * FROM arquivados where anulado=0 and despacho='16.1' and data>'1997-05-14'";
				$cmd = "SELECT * FROM arquivados where anulado=0 and despacho='16.1' and year(data)>=2022";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))	
				{
					$numero = $line['numero'];
					$data = $line['data'];
					if (identificado_mu($numero) or identificado_pi($numero)) // exclua os certificados de adição
					{
						$numero1 = $numero;
						$numero2 = $numero;
						$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
						{
							$numero1 = $line2["numero1"];
							$numero2 = $line2["numero2"];
						}
						$cmd2 = "SELECT * FROM vigentes where numero='$numero1' or numero='$numero2'";
						$res2 = mysqli_query($link,$cmd2);
						if (!($line2=@mysqli_fetch_assoc($res2)))
						{
							$cmd2 = "INSERT IGNORE INTO `vigentes` (`numero`, `data_deposito`, `data_concessao`, `data_previsao`, `data_extincao`) VALUES ('$numero', null, '$data', null, null);";
							echo "$cmd2<BR>";
							$res2 = mysqli_query($link,$cmd2);
						}						
					}
				}
				echo "Fim processamento (1)";
				exit();
			}
			
			//$cmd = "SELECT * FROM arquivados where numero='102012001494' and anulado=0 and despacho='16.1' and data>'1997-05-14' limit 100";
			//$cmd = "SELECT * FROM arquivados where anulado=0 and despacho='16.1' and data>'1997-05-14' limit $start,500";
			
			$agora = date('Y-m-d'); 
			$cmd = "SELECT * FROM vigentes where data_deposito is null or data_concessao is null";
			if ($op==3)
				$cmd = "SELECT * FROM vigentes where data_deposito is null";
			if ($op==4)
				//$cmd = "SELECT * FROM vigentes where data_extincao is null and data_deposito is not null and year(data_concessao)=$ano";
				$cmd = "SELECT * FROM vigentes where data_extincao is null and data_deposito is not null";

			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))	
			{
				$data_deposito=null;
				$data_concessao=null;
				$data_previsao=null;
				$data_extincao=null;
				$data_deposito_lido = $line['data_deposito'];
				$data_concessao_lido = $line['data_concessao'];
				$data_previsao_lido = $line['data_previsao'];
				$data_extincao_lido = $line['data_extincao'];				
				$numero = $line['numero'];

				if (identificado_mu($numero) or identificado_pi($numero)) // exclua os certificados de adição
				{
					$numero1 = $numero;
					$numero2 = $numero;
					$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2["numero1"];
						$numero2 = $line2["numero2"];
					}
					$numerocd1 = montar_numerocd($numero1);
					$numerocd2 = montar_numerocd($numero2);

					if ($op==3)
					{
						$cmd2 = "SELECT * FROM publicados where (numero='$numero1' or numero='$numero2')";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))	
						{
							$data_deposito = $line2['data_deposito'];
						}
						else
							echo "$numero não tem data de depósito<BR>";
					}
					if ($op==4) $data_deposito = $data_deposito_lido;
					
					//$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and anulado=0 and (despacho='16.1' or despacho='23.9')";
					//$res2 = mysqli_query($link,$cmd2);
					//if ($line2=@mysqli_fetch_assoc($res2))	
					//{
					//	$data_concessao = $line2['data'];
					//}
					//else
					//	echo "$numero não tem data de concessão 16.1 ou 23.9 (pipeline)<BR>";
					
					$data_concessao = $data_concessao_lida;

					$cmd2 = "SELECT * FROM arquivados where anulado=0 and data>'1997-05-14' and (numero='$numero1' or numero='$numero2') and despacho in ('18.3','21.1','21.2','21.6','21.7','24.8','24.10','23.19')";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))	
						$data_extincao = $line2['data'];
					else
					{
						$cmd2 = "SELECT * FROM revistas4 where (numero='$numerocd1' or numero='$numerocd2') and (descricao like '%[200]%' or descricao like '%nulada a patente%' or descricao like '%nulado o privil%' or descricao like '%nulidade da patente%')";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))	
							$data_extincao = $line2['data'];
					}

					if ($op==3 and identificado_pi($numero))
					{
						// SELECT * FROM revistas4 as r JOIN arquivados as a ON substring_index(r.numero,'-',1)=a.numero and r.data=a.data and a.despacho=r.despacho where a.numero='102013029314' and (r.descricao like '%20 (vinte) anos%' or r.descricao like '%20 anos%' or r.descricao like '%vinte anos%') and a.anulado=0 order by a.data desc
						// SELECT * FROM revistas4 where numero='102012001494-7' and (descricao like '%20 (vinte) anos%' or descricao like '%20 anos%' or descricao like '%vinte anos%') order by data desc
						
						$cmd2 = "SELECT * FROM revistas4 as r JOIN arquivados as a ON substring_index(r.numero,'-',1)=a.numero and r.data=a.data and a.despacho=r.despacho where a.despacho='16.1' and (a.numero='$numero1' or a.numero='$numero2') and (r.descricao like '%10 (dez) anos%' or r.descricao like '%10 anos%' or r.descricao like '%dez anos%') and a.anulado=0";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) 
						{
							$ano = substr($data_concessao,0,4); // 2010-10-09
							$mes = substr($data_concessao,5,2);
							$kmes = str_pad($mes,2,"0",STR_PAD_LEFT);
							$dia = substr($data_concessao,8,2);
							$kdia = str_pad($dia,2,"0",STR_PAD_LEFT);
							$ano = $ano + 10; // 10 anos contados da concessão
							$cmd2 = "SELECT * FROM revistas4 as r JOIN arquivados as a ON substring_index(r.numero,'-',1)=a.numero and r.data=a.data and a.despacho=r.despacho where a.despacho='16.3' and (a.numero='$numero1' or a.numero='$numero2') and (r.descricao like '%ADI 5529%') and a.anulado=0"; // testa se teve correção com ADI 5529
							$res2 = mysqli_query($link,$cmd2); // por exemplo PI0009721-7 alterou prazo de vigencia com ADI 5529 voltando para 20 anos contados do depósito
							if ($line2=@mysqli_fetch_assoc($res2)) 
							{
								$ano = substr($data_deposito,0,4); // 2010-10-09
								$mes = substr($data_deposito,5,2);
								$kmes = str_pad($mes,2,"0",STR_PAD_LEFT);
								$dia = substr($data_deposito,8,2);
								$kdia = str_pad($dia,2,"0",STR_PAD_LEFT);
								$ano = $ano + 20; // 20 anos contados do depósito
							}
						}
						else
						{
							$ano = substr($data_deposito,0,4); // 2010-10-09
							$mes = substr($data_deposito,5,2);
							$kmes = str_pad($mes,2,"0",STR_PAD_LEFT);
							$dia = substr($data_deposito,8,2);
							$kdia = str_pad($dia,2,"0",STR_PAD_LEFT);
							$ano = $ano + 20; // 20 anos contados do depósito
						}

						$data_previsao = "$ano-$kmes-$kdia";

					}
					if ($op==3 and identificado_mu($numero))
					{
						$cmd2 = "SELECT * FROM revistas4 as r JOIN arquivados as a ON substring_index(r.numero,'-',1)=a.numero and r.data=a.data and a.despacho=r.despacho where a.despacho='16.1' and (a.numero='$numero1' or a.numero='$numero2') and (r.descricao like '%7 (sete) anos%' or r.descricao like '%7 anos%' or r.descricao like '%sete anos%') and a.anulado=0";
						$res2 = mysqli_query($link,$cmd2); // por exemplo PI0009721-7 alterou prazo de vigencia com ADI 5529 voltando para 20 anos contados do depósito
						if ($line2=@mysqli_fetch_assoc($res2)) 
						{
							$ano = substr($data_concessao,0,4); // 2010-10-09
							$mes = substr($data_concessao,5,2);
							$kmes = str_pad($mes,2,"0",STR_PAD_LEFT);
							$dia = substr($data_concessao,8,2);
							$kdia = str_pad($dia,2,"0",STR_PAD_LEFT);
							$data = $data_concessao;
							$ano = $ano + 7; // 7 anos contados da concessão
							$cmd2 = "SELECT * FROM revistas4 as r JOIN arquivados as a ON substring_index(r.numero,'-',1)=a.numero and r.data=a.data and a.despacho=r.despacho where a.despacho='16.3' and (a.numero='$numero1' or a.numero='$numero2') and (r.descricao like '%ADI 5529%') and a.anulado=0"; // testa se teve correção com ADI 5529
							$res2 = mysqli_query($link,$cmd2); // por exemplo PI0009721-7 alterou prazo de vigencia com ADI 5529 voltando para 20 anos contados do depósito
							if ($line2=@mysqli_fetch_assoc($res2)) 
							{
								$ano = substr($data_deposito,0,4); // 2010-10-09
								$mes = substr($data_deposito,5,2);
								$kmes = str_pad($mes,2,"0",STR_PAD_LEFT);
								$dia = substr($data_deposito,8,2);
								$kdia = str_pad($dia,2,"0",STR_PAD_LEFT);
								$ano = $ano + 15; // 15 anos contados do depósito
							}
						}
						else
						{
							$ano = substr($data_deposito,0,4); // 2010-10-09
							$mes = substr($data_deposito,5,2);
							$kmes = str_pad($mes,2,"0",STR_PAD_LEFT);
							$dia = substr($data_deposito,8,2);
							$kdia = str_pad($dia,2,"0",STR_PAD_LEFT);
							$ano = $ano + 15; // 15 anos contados do depósito
						}
						$data_previsao = "$ano-$kmes-$kdia";
					}
					
					$str_data_deposito = is_null($data_deposito) ? 'null':"'$data_deposito'";
					$str_data_concessao = is_null($data_concessao) ? 'null':"'$data_concessao'";
					$str_data_previsao = is_null($data_previsao) ? 'null':"'$data_previsao'";
					$str_data_extincao = is_null($data_extincao) ? 'null':"'$data_extincao'";
					
					if ($data_deposito_lido<>$data_deposito or $data_concessao_lido<>$data_concessao or $data_previsao_lido<>$data_previsao or $data_extincao_lido<>$data_extincao)
					{
						if ($op==3) // data_deposito era null então atualize
						{
							$cmd2 = "UPDATE vigentes set data_deposito=$str_data_deposito, data_previsao=$str_data_previsao, data_extincao=$str_data_extincao WHERE (numero='$numero1' or numero='$numero2')";
							echo "$cmd2;<BR>";
							$res2 = mysqli_query($link,$cmd2);						
						}
						if ($op==4 and $data_extincao!=null)
						{
							$cmd2 = "UPDATE vigentes set data_extincao=$str_data_extincao WHERE (numero='$numero1' or numero='$numero2')";
							echo "$cmd2;<BR>";
							$res2 = mysqli_query($link,$cmd2);						
						}
					}

				}
			}
			echo "Fim de processamento";
			exit();

			/*
			Patentes concedidas após 1997
			SELECT count( * )  FROM CEPIT_SISCAP.siscap_arquivados  WHERE despacho =
			'16.1' AND (EXTRACT(YEAR FROM data)>=1997)
			Total: 128824

			Que não tenham sido extintas:
			18.3 - Caducidade Deferida
			21.1 - Extinção - Art. 78 inciso I da LPI
			21.2 - Extinção - Art 78 inciso II da LPI
			24.8 - Extinção Definitiva - Art. 78 inciso IV da LPI
			24.10 - Manutenção da Extinção - Art. 78 inciso IV da LPI
			21.7 - Extinção - Art. 78 inciso V da LPI
			23.19 - Extinção – Art. 78 da LPI

			Logo estão em vigor:
			SELECT count( * )  FROM CEPIT_SISCAP.siscap_arquivados  WHERE despacho =
			'16.1' AND (EXTRACT(YEAR FROM data)>=1997) and numero not in (select numero
			from CEPIT_SISCAP.siscap_arquivados where despacho in
			('18.3','21.1','21.2','24.8','24.10','21.7','23.19'))
			Total: 77610
			
			No estudo da Licks mostra 65747 patentes em vigor
			https://www.lickslegal.com/graficos-brazilian-patent/patents-currently-in-force
			https://www.lickslegal.com/graficos-base-de-dados-do-sistema-de-patentes-brasileiro/16-patentes-de-invencao-vigentes-no-brasil-sob-ameaca-de-terem-seus-prazos-de-protecao-reduzidos-ou-de-serem-declaradas-extintas-em-24-de-fevereiro-de-2021
			Resumo da metodologia empregada:
			Data de Concessão >= '1997-05-14'; Prazo de vigência = '10 anos da concessão'; Patentes em vigor = patentes com despacho 16.1 sem despacho ( '21.1', '21.2', '21.7', '24.8', '24.10', ‘200’, ’23.19’) ou cujo prazo de vigência já expirou, mesmo sem notificação devida do INPI; Natureza = ‘PI’.

			Existe portanto uma diferença de mais de 10 mil !!
			Para saber se a patente esta em vigor não basta se guiar pelo despacho de
			extinção, teria de calcular pela data de vigência. Se passou da data de
			expiração, mesmo que não exista o despacho de extinção teria de contabilizar
			como extinta. O controle seria portanto pela data de extinção e não pelo
			despacho de extinção.
			
			https://www.gov.br/inpi/pt-br/assuntos/arquivos-dirpa/relatorio_maquina_de_estadosExecutivo_assinado.pdf
			considero terminais mas não constam do fluxograma:
			'11.12', Art.26 parágrafo único da LPI estado AA01 considerado pendente cabe recurso 12.3, mas se não tiver este recurso ele será terminal
			'11.17', Arquivamento do Pedido de Certificado de Adição de Invenção - Art.77 da LPI estado AA05 cabe recurso 12.3, mas se não tiver este recurso e será terminal
			'11.18', Arquivamento definitivo por não anuência relacionada com o Art. 229-C da LPI.
			'11.30', Arquivamento Definitivo - Art. 18 § 1º da Lei 5772/71
			'11.31', Arquivamento Definitivo - Falta de Cumprimento de exigência
			'23.6', Arquivamento pipeline
			'23.7', Denegação de pedido pipeline (equivalente ao 9.2 cabe recurso) mas como não tem equivalente a 9.2.4 considero terminal
			'23.9', Expedição da patente pipeline
			'23.16', Outros, desistência de pipeline, só acontece com PP1100009
						
			9.2 não consideraria terminal pois gera recurso, só o 9.2.4 seria terminal
			PD02 - Pedido indeferido
			9.2 e 23.7 mas gera 12.2 e 23.8
			'23.7' é terminal porque não tem um 9.2.4 equivalente

			12.2, 23.8 não consideraria terminal, somente o 100, 111
			RE01 - Em recurso contra o indeferimento
			12.2, 23.8, 7.5, 7.7 pode gerar 100, 111, 7.4

			7.4, 23.17 não consideraria terminal
			AV01 - Pedido encaminhado à ANVISA (fluxo antigo)
			7.4, 23.17 pode gerar 7.5, 7.7, 7.6

			7.4, 23.17  não consideraria terminal
			AV03 - Pedido encaminhado à ANVISA (fluxo antigo recurso)
			7.4, 23.17 pode gerar 7.5, 7.6, 7.7

			9.1, 23.13 não consideraria terminal
			PD01 - Pedido deferido
			9.1, 23.13, 100, pode gerar 11.4, 16.1

			não consideraria terminal porque é depois do 16.1
			PE01 - Patente extinta definitivamente (não pagamento)
			24.10, 24.8 pode gerar 22.10, 200, 2002, 203

			21.1 não consideraria terminal, nenhuma extinção, pois porque é depois do 16.1
			PE02 - Patente extinta definitivamente (vigência - Art. 78 I)
			21.1, 23.19 pode gerar 22.10, 200, 202, 203

			21.2 não consideraria terminal porque é depois do 16.1
			PE03 - Patente extinta definitivamente (renúncia)
			21.2 pode gerar 22.10, 200, 2002, 203

			não consideraria terminal porque é depois do 16.1
			PE04 - Patente extinta definitivamente (sem procurador)
			21.7 pode gerar 22.10, 200, 202, 203

			não consideraria terminal porque é depois do 16.1
			PE05 - Patente extinta definitivamente (caducidade)
			18.3 pode gerar 22.10, 200, 202, 203

			não consideraria terminal porque é depois do 16.1
			PE06 - Patente extinta (não pagamento)
			21.6 pode gerar 24.4, 24.10

			nao consideraria terminal porque este despacho irá aparecer anulando o 16.1, na verdade o cd_despacho_anulador ira se encarregar de colocar esse 16.1 como nulo
			PA01 - Patente Anulada
			200, 202, 203, pode gerar 19.1

			não consideraria terminal porque apenas suspende tramitação
			PA02 - Patente Suspensa (por ordem judicial)
			15.23 pode gerar 19.1

			*/
		}

		if ($action==1140) 
		{		
			if ($op==3) // http://cientistaspatentes.com.br/central/control.php?action=1140&op=3&tipo=1
						// gerado cgrec1_estoque.htm (tipo=1), cgrec15_estoque.htm (tipo=15), cgrec17_estoque.htm (tipo=17) e então rodar sinergias/estoque10.php 
					
			{			
				$anofinal = 2021;
				if ($tipo==1) $fname = "../sinergias/cgrec1_estoque.htm"; // usado em estoque10.php
				if ($tipo==15) $fname = "../sinergias/cgrec15_estoque.htm"; // usado em estoque10.php
				if ($tipo==17) $fname = "../sinergias/cgrec17_estoque.htm"; // usado em estoque10.php
				@ $fpw = fopen($fname,"w");
				if (!$fpw)
					echo "Não foi identificado o arquivo texto $fname";
				else
				{
					$divisoes1 = array ('dirpa', 'ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut');

					$k = 0;
					foreach ($divisoes1 as $divisao)
					{
						if (($tipo==15) and $divisao<>'dirpa') continue; // para 12.3 e 12.6 não faça cálculo por divisão
						
						$zdivisao = strtoupper($divisao);

						if ($divisao=='ditex' or $divisao=='difari' or $divisao=='difarii' or $divisao=='dipol' or $divisao=='dinor')
							$udivisao = "CGPAT I / $zdivisao";
						elseif ($divisao=='dialp' or $divisao=='dibio' or $divisao=='dimol' or $divisao=='dipaq' or $divisao=='dipae')
							$udivisao = "CGPAT II / $zdivisao";
						elseif ($divisao=='ditel' or $divisao=='dicel' or $divisao=='difel' or $divisao=='dipeq' or $divisao=='diciv')
							$udivisao = "CGPAT III / $zdivisao";
						elseif ($divisao=='dimat' or $divisao=='dimec' or $divisao=='ditem' or $divisao=='dinec' or $divisao=='dimut')
							$udivisao = "CGPAT IV / $zdivisao";
						else
							$udivisao = "DIRPA";

						$str='';
						if (++$k==1) $str = "<a href='cgrecestoque10.php'><span class='fas fa-chart-pie display-4 text-danger'></span></a>";
						if ($tipo==1)	$texto = "<h1>Recursos 12.2 - $udivisao</h1><table class='table table-hover align-middle table-status'><THEAD><TR><TH>$str</TH>";
						if ($tipo==15)	$texto = "<h1>Recursos 12.3 / 12.6 - $udivisao</h1><table class='table table-hover align-middle table-status'><THEAD><TR><TH>$str</TH>";
						if ($tipo==17)	$texto = "<h1>Recursos 17.1 - $udivisao</h1><table class='table table-hover align-middle table-status'><THEAD><TR><TH>$str</TH>";
						for ($i=2011;$i<=$anofinal;$i++)
							$texto = $texto."<TH>$i</TH>";
						$texto = $texto."</TR></THEAD>";
						$stexto = $texto;
						fputs($fpw,$texto."\n");

						for ($ano=2011;$ano<=$anofinal;$ano++)
						{
							$soma_total[$ano]=0;
							$soma_outros[$ano]=0;
							$soma_prejudicados[$ano]=0;
							$soma_anulados[$ano]=0;
							$soma_intermediarios[$ano]=0;
							$soma_providos[$ano]=0;
							$soma_negados[$ano]=0;
							$soma_pendentes[$ano]=0;
							$total[$ano]=0;
							$outros[$ano]=0;
							$prejudicados[$ano]=0;
							$anulados[$ano]=0;
							$intermediarios[$ano]=0;
							$providos[$ano]=0;
							$negados[$ano]=0;
							$pendentes[$ano]=0;
						}
						
						if ($tipo==1) $cmd = "select * from cgrec_estat where divisao='$divisao' and tipo=1"; // calcula os 12.2 e o resultado de cada um
						if ($tipo==15) $cmd = "select * from cgrec_estat where divisao='$divisao' and tipo=15"; // calcula os 12.3 / 12.6 e o resultado de cada um
						if ($tipo==17) $cmd = "select * from cgrec_estat where divisao='$divisao' and tipo=17"; // calcula os 17.1 e o resultado de cada um
						$res = mysqli_query($link,$cmd);
						while ($line=@mysqli_fetch_assoc($res))
						{
							$ano = $line['ano'];
							$outros[$ano] = $line['outros'];
							//echo "ano=".$ano."outros=".$outros[$ano]."<BR>";
							$soma_outros[$ano]=$soma_outros[$ano]+$outros[$ano];
							$prejudicados[$ano] = $line['prejudicados'];
							$soma_prejudicados[$ano]=$soma_prejudicados[$ano]+$prejudicados[$ano];
							$anulados[$ano] = $line['anulados'];
							$soma_anulados[$ano]=$soma_anulados[$ano]+$anulados[$ano];
							$intermediarios[$ano] = $line['intermediarios'];
							$soma_intermediarios[$ano]=$soma_intermediarios[$ano]+$intermediarios[$ano];
							$providos[$ano] = $line['providos'];
							$soma_providos[$ano]=$soma_providos[$ano]+$providos[$ano];
							$negados[$ano] = $line['negados'];
							$soma_negados[$ano]=$soma_negados[$ano]+$negados[$ano];
							$pendentes[$ano] = $line['pendentes'];
							$soma_pendentes[$ano]=$soma_pendentes[$ano]+$pendentes[$ano];
							$total[$ano] = $line['total'];
							$soma_total[$ano] = $soma_total[$ano]+$total[$ano];
						}

						$texto = "<TBODY><TR><TH>Recursos prejudicados</TH>";
						if ($tipo==17) $texto = "<TR class='table-light'><TH>Nulidades prejudicadas</TH>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");
						for ($ano=2011;$ano<=$anofinal;$ano++)
						{
							$valor = $prejudicados[$ano];
							$texto = "<TD>$valor</TD>";
							$stexto = $stexto.$texto;
							fputs($fpw,$texto."\n");
						}
						$texto = "</TR>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");

						$texto = "<TBODY><TR><TH>Recursos anulados</TH>";
						if ($tipo==17) $texto = "<TR class='table-light'><TH>Nulidades anuladas</TH>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");
						for ($ano=2011;$ano<=$anofinal;$ano++)
						{
							$valor = $anulados[$ano];
							$texto = "<TD>$valor</TD>";
							$stexto = $stexto.$texto;
							fputs($fpw,$texto."\n");
						}
						$texto = "</TR>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");

						$texto = "<TR><TH>Recursos providos</TH>";
						if ($tipo==17) $texto = "<TR class='table-light'><TH>Nulidades providas</TH>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");
						for ($ano=2011;$ano<=$anofinal;$ano++)
						{
							$valor = $providos[$ano];
							$texto = "<TD>$valor</TD>";
							$stexto = $stexto.$texto;
							fputs($fpw,$texto."\n");
						}
						$texto = "</TR>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");

						$texto = "<TR class='table-light'><TH>Recursos negados</TH>";
						if ($tipo==17) $texto = "<TBODY><TR class='table-light'><TH>Nulidades negadas</TH>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");
						for ($ano=2011;$ano<=$anofinal;$ano++)
						{
							$valor = $negados[$ano];
							$texto = "<TD>$valor</TD>";
							$stexto = $stexto.$texto;
							fputs($fpw,$texto."\n");
						}
						$texto = "</TR>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");

						if ($tipo==1) $texto = "<TR><TH>Total (12.2)</TH>";
						if ($tipo==15) $texto = "<TR><TH>Total (12.3 / 12.6)</TH>";
						if ($tipo==17) $texto = "<TR><TH>Total (17.1)</TH>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");
						for ($ano=2011;$ano<=$anofinal;$ano++)
						{
							$valor = $total[$ano];
							$texto = "<TD>$valor</TD>";
							$stexto = $stexto.$texto;
							fputs($fpw,$texto."\n");
						}
						$texto = "</TR>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");
						
						if ($tipo==1) $texto = "<TR class='table-light'><TH>Estoque (12.2)</TH>";
						if ($tipo==15) $texto = "<TR class='table-light'><TH>Estoque (12.3 / 12.6)</TH>";
						if ($tipo==17) $texto = "<TR class='table-light'><TH>Estoque (17.1)</TH>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");
						for ($ano=2011;$ano<=$anofinal;$ano++)
						{
							$valor = $pendentes[$ano];
							$texto = "<TD>$valor</TD>";
							$stexto = $stexto.$texto;
							fputs($fpw,$texto."\n");
						}
						$texto = "</TR>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");

						if ($tipo==1) $texto = "<TR><TH>Saldo Cumulativo</TH>";
						if ($tipo==15) $texto = "<TR><TH>Saldo Cumulativo</TH>";
						if ($tipo==17) $texto = "<TR><TH>Saldo Cumulativo</TH>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");
						$valor_anterior = $pendentes[2011]; // correto seria valor de 2010 como nao tem, aproxima por 2011
						for ($ano=2011;$ano<=$anofinal;$ano++)
						{
							$valor = $valor_anterior + $total[$ano] - $prejudicados[$ano] - $anulados[$ano] - $providos[$ano] - $negados[$ano];
							$valor_anterior = $valor;
							$texto = "<TD>$valor</TD>";
							$stexto = $stexto.$texto;
							fputs($fpw,$texto."\n");
						}
						$texto = "</TR>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");

						$texto = "</TBODY></TABLE><BR><BR><BR>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");
					}
				}

				fclose($fpw);
				echo "$stexto <BR> Fim de processamento";
				exit();
			} // fim do $op==3

			$i=0;
			for ($ano2=2020;$ano2<=2020;$ano2++)
			{
				$divisoes2 = array ('dirpa','ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut');

				$numeros_lidos = array();
				for ($k=0;$k<=100000;$k++) $numeros_lidos[$k]="";
				$i=0;

				$total=0;$recurso_providos=0;$recurso_negados=0;$recurso_prejudicados=0;$recurso_pendentes=0;$recurso_outros=0;$recurso_estoque_estimado=0;

				$total_array = array();
				foreach ($divisoes2 as $idivisao) $total_array[$idivisao]=0;
				$cmd = "select * from arquivados where despacho='12.2' and year(data)=$ano";
				if ($tipo==15) $cmd = "select * from arquivados where (despacho='12.3' or despacho='12.6') and year(data)=$ano and year(data)>=1996";
				if ($tipo==17) $cmd = "select * from arquivados where (despacho='17.1') and year(data)=$ano and year(data)>=1996";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$numero1 = $numero;
					$numero2 = $numero;
					$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2["numero1"];
						$numero2 = $line2["numero2"];
					}

					$data = $line['data'];
					$idivisao="";
					$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('indeferimento','9.2')";
					if ($tipo==15 or $tipo==17) $cmd2 = "select * from publicados where (numero='$numero1' or numero='$numero2') ";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
						$idivisao = $line2['divisao'];
					else
					{
						if (identificado_mu($numero))
							$idivisao='dimut';
						else
						{
							$cmd2 = "SELECT * FROM classes where (numero='$numero1' or numero='$numero2')";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$classificacao = $line2['descricao'];
								$symbol = trim(ler_symbol($classificacao));
								$idivisao = ler_divisao($link,$classificacao);
							}
						}
					}
					//echo "$idivisao $numero<BR>";exit();
					if ($idivisao=='dipem') $idivisao='diciv';
					if ($divisao=="dirpa" or $divisao=="" or $divisao==$idivisao) $total++;
					echo "$ano;$numero,$idivisao;total;$data<BR>";
					if ($idivisao=='')
					{
						//echo "$numero divisao vazia<BR>";
					}
					else
					{
						@$total_array[$idivisao]++;
						$total_array['dirpa']++;
					}
				}

				$recurso_outros_array = array();
				foreach ($divisoes2 as $idivisao) $recurso_outros_array[$idivisao]=0;
				if ($tipo==1 or $tipo==17)
				{
					$cmd = "select * from pedido where decisao in ('recurso 131','recurso 135','recurso 136','recurso 137','recurso 138','recurso 139','recurso 140') and year(rpi)=$ano";
					$cmd = "select * from pedido where decisao in ('recurso 131') and year(rpi)=$ano";
					if ($tipo==17) 	$cmd = "select * from pedido where decisao in ('nulidade 220') and year(rpi)=$ano";
					$res = mysqli_query($link,$cmd);
					while ($line=@mysqli_fetch_assoc($res))
					{
						$numero = $line['numero'];
						$numero1 = $numero;
						$numero2 = $numero;
						$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
						{
							$numero1 = $line2["numero1"];
							$numero2 = $line2["numero2"];
						}

						$decisao = $line['decisao'];
						$data = $line['rpi'];
						$idivisao="";
						$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('indeferimento','9.2')";
						if ($tipo==17) 	$cmd2 = "select * from publicados where (numero='$numero1' or numero='$numero2') ";;
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
							$idivisao = $line2['divisao'];
						else
						{
							if (identificado_mu($numero))
								$idivisao='dimut';
							else
							{
								$cmd2 = "SELECT * FROM classes where (numero='$numero1' or numero='$numero2')";
								$res2 = mysqli_query($link,$cmd2);
								if ($line2=@mysqli_fetch_assoc($res2))
								{
									$classificacao = $line2['descricao'];
									$symbol = trim(ler_symbol($classificacao));
									$idivisao = ler_divisao($link,$classificacao);
								}
							}
						}
						if ($idivisao=='dipem') $idivisao='diciv';
						if ($divisao=="dirpa" or $divisao=="" or $divisao==$idivisao) $recurso_outros++;
						echo "$ano;$numero,$idivisao;$decisao;$data<BR>";
						if ($idivisao=='')
						{
							//echo "$numero divisao vazia<BR>";
						}
						else
						{
							//echo "$numero $idivisao<BR>";
							@$recurso_outros_array[$idivisao]++;
							$recurso_outros_array['dirpa']++;
						}
					}
				}
				
				$recurso_prejudicados_array = array();
				foreach ($divisoes2 as $idivisao) $recurso_prejudicados_array[$idivisao]=0;
				$cmd = "select * from pedido where decisao in ('recurso 130') and year(rpi)=$ano";
				if ($tipo==15) $cmd = "select * from pedido where decisao in ('recurso 130') and year(rpi)=$ano and numero in (select numero from arquivados where (despacho='12.3' or despacho='12.6') and data<=$ano)";
				if ($tipo==17) $cmd = "select * from pedido where decisao in ('nulidade 212') and year(rpi)=$ano";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$numero1 = $numero;
					$numero2 = $numero;
					$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2["numero1"];
						$numero2 = $line2["numero2"];
					}

					$decisao = $line['decisao'];
					$data = $line['rpi'];
					$idivisao="";
					$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('indeferimento','9.2')";
					if ($tipo==15 or $tipo==17) $cmd2 = "select * from publicados where (numero='$numero1' or numero='$numero2') ";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
						$idivisao = $line2['divisao'];
					else
					{
						if (identificado_mu($numero))
							$idivisao='dimut';
						else
						{
							$cmd2 = "SELECT * FROM classes where (numero='$numero1' or numero='$numero2')";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$classificacao = $line2['descricao'];
								$symbol = trim(ler_symbol($classificacao));
								$idivisao = ler_divisao($link,$classificacao);
							}
						}
					}
					if ($idivisao=='dipem') $idivisao='diciv';
					if ($divisao=="dirpa" or $divisao=="" or $divisao==$idivisao) $recurso_prejudicados++;
					echo "$ano;$numero,$idivisao;recurso 130;$data<BR>";
					if ($idivisao=='')
					{
						//echo "$numero divisao vazia<BR>";
					}
					else
					{
						//echo "$numero $idivisao<BR>";
						@$recurso_prejudicados_array[$idivisao]++;
						$recurso_prejudicados_array['dirpa']++;
					}
				}


				$recurso_providos_array = array();
				$recurso_negados_array = array();
				foreach ($divisoes2 as $idivisao) 
				{
					$recurso_providos_array[$idivisao]=0;
					$recurso_negados_array[$idivisao]=0;
				}
				$cmd = "select * from pedido where decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111') and year(rpi)=$ano";
				if ($tipo==15)  $cmd = "select * from pedido where decisao in ('recurso 102','recurso 103','recurso 104','recurso 112','recurso 113','recurso 115') and year(rpi)=$ano";
				if ($tipo==17)  $cmd = "select * from pedido where decisao in ('nulidade 200','nulidade 201','nulidade 204') and year(rpi)=$ano";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$numero1 = $numero;
					$numero2 = $numero;
					$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2["numero1"];
						$numero2 = $line2["numero2"];
					}

					$decisao = $line['decisao'];
					$data = $line['rpi'];
					if (!in_array($numero,$numeros_lidos))
					{
						$numeros_lidos[$i++]=$numero;

						$idivisao="";
						$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('indeferimento','9.2')";
						if ($tipo==15 or $tipo==17) $cmd2 = "select * from publicados where (numero='$numero1' or numero='$numero2') ";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
							$idivisao = $line2['divisao'];
						else
						{
							if (identificado_mu($numero))
								$idivisao='dimut';
							else
							{
								$cmd2 = "SELECT * FROM classes where (numero='$numero1' or numero='$numero2')";
								$res2 = mysqli_query($link,$cmd2);
								if ($line2=@mysqli_fetch_assoc($res2))
								{
									$classificacao = $line2['descricao'];
									$symbol = trim(ler_symbol($classificacao));
									$idivisao = ler_divisao($link,$classificacao);
								}
							}
						}
						if ($idivisao=='dipem') $idivisao='diciv';
						if ($tipo==1)
						{
							if ($divisao=="dirpa" or $divisao=="" or $divisao==$idivisao)
							{
								if ($decisao=='recurso provido' or $decisao=='recurso 100')
								{
									$recurso_providos++;
								}
								if ($decisao=='recurso negado' or $decisao=='recurso 111' or $decisao=='recurso manutencao do indeferimento 111')
								{
									$recurso_negados++;
								}
							}
						
							if ($idivisao=='')
							{
								//echo "$numero divisao vazia<BR>";
								if ($decisao=='recurso provido' or $decisao=='recurso 100')
									echo "$ano;$numero,$idivisao;recurso 100;$data<BR>";
								if ($decisao=='recurso negado' or $decisao=='recurso 111' or $decisao=='recurso manutencao do indeferimento 111')
									echo "$ano;$numero,$idivisao;recurso 111;$data<BR>";
							}
							else
							{
								//echo "$numero $idivisao<BR>";
								if ($decisao=='recurso provido' or $decisao=='recurso 100')
								{
									echo "$ano;$numero,$idivisao;recurso 100;$data<BR>";
									@$recurso_providos_array[$idivisao]++;
									$recurso_providos_array['dirpa']++;
								}
								if ($decisao=='recurso negado' or $decisao=='recurso 111' or $decisao=='recurso manutencao do indeferimento 111')
								{
									echo "$ano;$numero,$idivisao;recurso 111;$data<BR>";
									@$recurso_negados_array[$idivisao]++;
									$recurso_negados_array['dirpa']++;
								}
							}
						}
						if ($tipo==15)
						{
							if ($divisao=="dirpa" or $divisao=="" or $divisao==$idivisao)
							{
								if ($decisao=='recurso 102' or $decisao=='recurso 103' or $decisao=='recurso 104')
								{
									$recurso_providos++;
								}
								if ($decisao=='recurso 112' or $decisao=='recurso 113' or $decisao=='recurso 115')
								{
									$recurso_negados++;
								}
							}
						
							if ($idivisao=='')
							{
								//echo "$numero divisao vazia<BR>";
								echo "$ano;$numero;$idivisao;$decisao;$data<BR>";
							}
							else
							{
								//echo "$numero $idivisao<BR>";
								if ($decisao=='recurso 102' or $decisao=='recurso 103' or $decisao=='recurso 104')
								{
									echo "$ano;$numero;$idivisao;$decisao;$data<BR>";
									@$recurso_providos_array[$idivisao]++;
									$recurso_providos_array['dirpa']++;
								}
								if ($decisao=='recurso 112' or $decisao=='recurso 113' or $decisao=='recurso 115')
								{
									echo "$ano;$numero;$idivisao;$decisao;$data<BR>";
									@$recurso_negados_array[$idivisao]++;
									$recurso_negados_array['dirpa']++;
								}
							}
						}
						if ($tipo==17)
						{
							if ($divisao=="dirpa" or $divisao=="" or $divisao==$idivisao)
							{
								if ($decisao=='nulidade 200' or $decisao=='nulidade 204')
								{
									$recurso_providos++;
								}
								if ($decisao=='nulidade 201')
								{
									$recurso_negados++;
								}
							}
						
							if ($idivisao=='')
							{
								//echo "$numero divisao vazia<BR>";
								echo "$ano;$numero;$idivisao;$decisao;$data<BR>";
							}
							else
							{
								//echo "$numero $idivisao<BR>";
								if ($decisao=='nulidade 200' or $decisao=='nulidade 204')
								{
									echo "$ano;$numero;$idivisao;$decisao;$data<BR>";
									@$recurso_providos_array[$idivisao]++;
									$recurso_providos_array['dirpa']++;
								}
								if ($decisao=='nulidade 201')
								{
									echo "$ano;$numero;$idivisao;$decisao;$data<BR>";
									@$recurso_negados_array[$idivisao]++;
									$recurso_negados_array['dirpa']++;
								}
							}
						}
					}
				}

// estoque em 01/01/2022
// select * from arquivados where despacho='12.2' and anulado=0 and year(data)>=1996 and year(data)<=2021 and numero not in (select numero from pedido where decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111','recurso 130','recurso 131') and year(rpi)<=2021) and numero not in (select numero from publicados where despacho_out<>'' and year(dataout)<=2021)
// select * from arquivados where (despacho='12.3' or despacho='12.6') and anulado=0 and year(data)>=1996 and year(data)<=2021 and numero not in (select numero from pedido where decisao in ('recurso 102','recurso 103','recurso 104','recurso 112','recurso 113','recurso 115') and year(rpi)<=2021) and numero not in (select numero from publicados where despacho_out<>'' and year(dataout)<=2021)
// select * from arquivados where (despacho='17.1') and anulado=0 and year(data)>=1996 and year(data)<=2021 and numero not in (select numero from pedido where decisao in ('nulidade 220','nulidade 212','nulidade 200','nulidade 201','nulidade 204') and year(rpi)<=2021) and numero not in (select substring_index(numero,'-',1) from revistas4 where (inid='co' or inid='de') and despacho in ('PR - Nulidades','200','201','204','PR - Cancelamentos','PR - Nulidade','PR - Cancelamento','PR - Nulidades') and (descricao like '%[200]%' or descricao like '%[201]%' or descricao like '%[204]%' or lower(descricao) like '%egado o provimento%' or lower(descricao) like '%egado provimento%' or lower(descricao) like '%antido a concessão%' or lower(descricao) like '%antida a concessão%' or lower(descricao) like '%antida a concessão%' or lower(descricao) like '%provida parcialmente%' or lower(descricao) like '%nulada a patente%' or lower(descricao) like '%ulidade conhecida e  provida%' or lower(descricao) like '%ulidade conhecida e provida%' or lower(descricao) like '%nulado o privilégio%'))

				$recurso_estoque_estimado_array = array();
				foreach ($divisoes2 as $idivisao) $recurso_estoque_estimado_array[$idivisao]=0;
				$cmd = "select * from arquivados where despacho='12.2' and anulado=0 and year(data)<=$ano and year(data)>=1996";
				if ($tipo==15)	$cmd = "select * from arquivados where (despacho='12.3' or despacho='12.6') and anulado=0 and year(data)<=$ano and year(data)>=1996";
				if ($tipo==17)	$cmd = "select * from arquivados where (despacho='17.1') and anulado=0 and year(data)<=$ano and year(data)>=1996";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$numero1 = $numero;
					$numero2 = $numero;
					$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2["numero1"];
						$numero2 = $line2["numero2"];
					}
					$numerocd1 = montar_numerocd($numero1);
					$numerocd2 = montar_numerocd($numero2);
				
					$data = $line['data'];
					if (!in_array($numero,$numeros_lidos))
					{
						$numeros_lidos[$i++]=$numero;
						
						$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111','recurso 131') and year(rpi)<=$ano";
						if ($tipo==15) $cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('recurso 102','recurso 103','recurso 104','recurso 112','recurso 113','recurso 115') and year(rpi)<=$ano";
						$res2 = mysqli_query($link,$cmd2);
						if (!($line2=@mysqli_fetch_assoc($res2)))
						{
							$cmd2 = "select * from publicados where (numero='$numero1' or numero='$numero2') and despacho_out<>'' and year(dataout)<=$ano";
							if ($tipo==17) $cmd2 = "select * from revistas4 where (numero='$numerocd1' or numero='$numerocd2') and year(data)<=$ano and (inid='co' or inid='de') and despacho in ('PR - Nulidades','200','201','204','PR - Cancelamentos','PR - Nulidade','PR - Cancelamento','PR - Nulidades') and (descricao like '%[200]%' or descricao like '%[201]%' or descricao like '%[204]%' or lower(descricao) like '%egado o provimento%' or lower(descricao) like '%egado provimento%' or lower(descricao) like '%antido a concessão%' or lower(descricao) like '%antida a concessão%' or lower(descricao) like '%antida a concessão%' or lower(descricao) like '%provida parcialmente%' or lower(descricao) like '%nulada a patente%' or lower(descricao) like '%ulidade conhecida e  provida%' or lower(descricao) like '%ulidade conhecida e provida%' or lower(descricao) like '%nulado o privilégio%')";
							$res2 = mysqli_query($link,$cmd2);
							if (!($line2=@mysqli_fetch_assoc($res2)))
							{
								$idivisao="";
								$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('indeferimento','9.2')";
								if ($tipo==15 or $tipo==17) $cmd2 = "select * from publicados where (numero='$numero1' or numero='$numero2')";
								$res2 = mysqli_query($link,$cmd2);
								if ($line2=@mysqli_fetch_assoc($res2))
									$idivisao = $line2['divisao'];
								else
								{
									if (identificado_mu($numero))
										$idivisao='dimut';
									else
									{
										$cmd2 = "SELECT * FROM classes where (numero='$numero1' or numero='$numero2')";
										$res2 = mysqli_query($link,$cmd2);
										if ($line2=@mysqli_fetch_assoc($res2))
										{
											$classificacao = $line2['descricao'];
											$symbol = trim(ler_symbol($classificacao));
											$idivisao = ler_divisao($link,$classificacao);
										}
									}
								}
								if ($idivisao=='dipem') $idivisao='diciv';
								if ($divisao=="dirpa" or $divisao=="" or $divisao==$idivisao) $recurso_estoque_estimado++;
								echo "$ano;$numero;$idivisao;estoque;$data<BR>";
								if ($idivisao=='')
								{
									//echo "$numero divisao vazia<BR>";
								}
								else
								{
									@$recurso_estoque_estimado_array[$idivisao]++;
									$recurso_estoque_estimado_array['dirpa']++;
								}
							}
						}
					}
				}

				if ($divisao=="") $divisao='dirpa';
				//$total = $recurso_providos+$recurso_negados+$recurso_prejudicados+$recurso_intermediarios;
				$cmd2 = "select * from cgrec_estat where tipo=$tipo and divisao='dirpa' and ano=$ano";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
					$cmd2 = "update cgrec_estat set total='$total',outros='$recurso_outros',prejudicados='$recurso_prejudicados',intermediarios=0,providos='$recurso_providos',negados='$recurso_negados',pendentes='$recurso_estoque_estimado' where tipo=$tipo and divisao='dirpa' and ano=$ano";
				else
					$cmd2 = "INSERT INTO cgrec_estat (tipo,divisao,ano,total,outros,prejudicados,intermediarios,providos,negados,pendentes) VALUES ($tipo,'$divisao','$ano','$total','$recurso_outros','$recurso_prejudicados',0,'$recurso_providos','$recurso_negados','$recurso_estoque_estimado')";
				//$res2 = mysqli_query($link,$cmd2);
				echo "$cmd2;<BR>";
				//echo "$divisao;$ano;$total;$recurso_outros;$recurso_prejudicados;$recurso_intermediarios;$recurso_providos;$recurso_negados;$recurso_pendentes<BR>";
				foreach ($divisoes2 as $idivisao)
				{
					if ($idivisao<>'dirpa')
					{
						$recurso_pendentes_array[$idivisao]=0;
						//echo "$idivisao;$ano;$total_array[$idivisao];$recurso_outros_array[$idivisao];$recurso_prejudicados_array[$idivisao];$recurso_intermediarios_array[$idivisao];$recurso_providos_array[$idivisao];$recurso_negados_array[$idivisao];$recurso_pendentes_array[$idivisao]<BR>";
						$cmd2 = "select * from cgrec_estat where tipo=$tipo and divisao='dirpa' and ano=$ano";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
							$cmd2="update cgrec_estat set total='$total_array[$idivisao]',outros='$recurso_outros_array[$idivisao]',prejudicados='$recurso_prejudicados_array[$idivisao]',intermediarios=0,providos='$recurso_providos_array[$idivisao]',negados='$recurso_negados_array[$idivisao]',pendentes='$recurso_estoque_estimado_array[$idivisao]' where tipo=$tipo and divisao='dirpa' and ano=$ano";
						else
							$cmd2="INSERT INTO cgrec_estat (tipo,divisao,ano,total,outros,prejudicados,intermediarios,providos,negados,pendentes) VALUES ($tipo,'$idivisao','$ano','$total_array[$idivisao]','$recurso_outros_array[$idivisao]','$recurso_prejudicados_array[$idivisao]',0,'$recurso_providos_array[$idivisao]','$recurso_negados_array[$idivisao]','$recurso_estoque_estimado_array[$idivisao]')";
						
						echo "$cmd2;<BR>";
					}
				}
			}
			echo "Fim do processamento";
			exit();
		} 
		
		if ($action==1131)
		{
			$cmd = "SELECT * FROM arquivados where anulado=0 and despacho='15.21' and year(data)=$ano";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))	
			{
				$numero = $line['numero'];
				$data = $line['data'];
				
				$cmd2 = "SELECT * FROM rpis_lidas where data='$data'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) $rpi = $line2['rpi'];

				$total=0;
				$fname="revistas/P$rpi.txt";
				@ $fp = fopen($fname,"r");
				if (!$fp)
				{
					$fname="revistas/P$rpi.TXT";
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
					$ler_depositante = 0;
					//echo "Iniciando leitura da revista $rpi<BR>";
					while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
					{
						$texto= trim(fgets($fp)); 
						if ($texto=='') continue;
						if (strcmp(substr($texto,0,10),'(Cd) 15.21')==0)
						{
							$ler_numero = 1;
							$ler_depositante = 0;
						}
						if ($ler_numero==1 and strcmp(substr($texto,0,4),'(21)')==0 or strcmp(substr($texto,0,4),'(11)')==0)	
						{	
							$numero_lido = trim(substr($texto,4));
							$pos = strpos($numero_lido,'-');
							$numero_lido = substr($numero_lido,0,$pos);
							$numero_lido = trim(str_replace(" ","",$numero_lido)); // PI 9916155-9 B1
							$numero_lido = trim(str_replace("BR","",$numero_lido));
							$ler_numero = 0;
							$ler_depositante = 0;
							if ($numero==$numero_lido) $ler_depositante = 1;
						}
						if ($ler_depositante==1 and strcmp(substr($texto,0,4),'(71)')==0)	
						{	
							$depositante = trim(substr($texto,4));
							$depositante = trim(str_replace("'","",$depositante));
							$depositante = trim(str_replace('"',"",$depositante));
							$depositante_utf8 = utf8_encode($depositante);
							echo "$numero $depositante_utf8<BR>";
							$ler_depositante = 0;
						}
					}
				}
			}
			echo "Fim processamento";
			exit();
		}

		if ($action==1130) // https://www.cientistaspatentes.com.br/central/control.php?action=1130
		{
			/*

			SELECT numero,data_peticao FROM CEPIT_SISCAP.SISCAP_DESPACHOS_PAG where tipo_peticao in ('212')
			and numero not in (select numero from CEPIT_SISCAP.SISCAP_ARQUIVADOS where despacho in ('11.4','16.1','23.9') and anulado=0) 
			and numero in (select numero from CEPIT_SISCAP.SISCAP_ARQUIVADOS where anulado=0 and despacho='12.2') 
			and numero in (select numero from CEPIT_SISCAP.SISCAP_PEDIDO where anulado=0 and decisao in ('recurso provido','recurso 100')) 
			and numero not in (select numero from CEPIT_SISCAP.SISCAP_ARQUIVADOS where anulado=0 and (((despacho='8.6' and extract(year from data)=2007) or (despacho='11.1' and extract(year from data)=2004) or (despacho='9.2' and extract(year from data)=2008) or (despacho='11.17' and extract(year from data)=2020) or despacho in ('1.2', '3.5', '3.6', '8.11', '9.2.4', '10.1', '10.9', '11.1.1', '11.2', '11.3', '11.4', '11.5', '11.6', '11.11', '11.12', '11.18', '11.20', '11.30', '11.31', '11.34', '15.1', '15.2', '15.3', '15.3.1', '15.4', '15.13', '15.14', '15.21', '15.23', '16.1', '19.1', '23.6', '23.7', '23.9', '100', '111', '112', '113', '115'))))

			SELECT numero,data_peticao FROM CEPIT_SISCAP.SISCAP_DESPACHOS_PAG where tipo_peticao in ('212')
			and numero not in (select numero from CEPIT_SISCAP.SISCAP_ARQUIVADOS where despacho in ('11.4','16.1','23.9') and anulado=0) 
			and numero not in (select numero from CEPIT_SISCAP.SISCAP_ARQUIVADOS where anulado=0 and (((despacho='8.6' and extract(year from data)=2007) or (despacho='11.1' and extract(year from data)=2004) or (despacho='9.2' and extract(year from data)=2008) or (despacho='11.17' and extract(year from data)=2020) or despacho in ('1.2', '3.5', '3.6', '8.11', '9.2.4', '10.1', '10.9', '11.1.1', '11.2', '11.3', '11.4', '11.5', '11.6', '11.11', '11.12', '11.18', '11.20', '11.30', '11.31', '11.34', '15.1', '15.2', '15.3', '15.3.1', '15.4', '15.13', '15.14', '15.21', '15.23', '16.1', '19.1', '23.6', '23.7', '23.9', '100', '111', '112', '113', '115'))))
			order by data_peticao asc
			
			*/
			
			$total=0;
			$cmd = "select * from despachos_pag where tipo_peticao='212' order by data_peticao asc"; // petição de confecção de carta patente solicitada
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res)) 
			{
				$numero = $line['numero']; 
				$data_peticao = $line['data_peticao']; 
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				} 

				$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='9.1' and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) continue; // pedido tem que ter tido 9.1
				
				$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('11.4','16.1','23.9') and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) continue;

				$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and ($despachos_terminais) and anulado=0 ";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) continue;

				$total++;
				echo "$numero $data_peticao<BR>";
			}
			echo "Fim processamento: $total";
			exit();
		}
		
		if ($action==1129) 
		{

			if ($op==8) // http://localhost/central/control.php?action=1129&op=8
			{
				$cmd = "select * from furafila where 1";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res)) 
				{
					$numero = $line['numero']; // este não necessariamente é o primeiro exame de recurso
					$numero1 = $numero;
					$numero2 = $numero;
					$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2["numero1"];
						$numero2 = $line2["numero2"];
					} 

					// 27.2 - Solicitação Concedida Patentes Verdes
					// 28.1 - Concedido o exame prioritário PPH do pedido de patente
					// 15.23 - Pedido “SUB JUDICE
					// 19.1 - Notificação de Decisão Judicial
					// 28.30 - Trâmite prioritário admitido
					// 28.31 - Trâmite prioritário por emergência nacional ou interesse público
					// 28.32 - Trâmite prioritário por solicitação do Ministério da Saúde admitido
					// 29.2 - Pedido de patente sobrestado por determinação judicial
					// 29.3 - Patente sobrestada por determinação judicial

					$cmd2 = "select * from arquivados where numero='$numero' and despacho in ('15.23','19.1','27.2','28.1','28.30','28.31','28.32','29.2','29.3') and anulado=0";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) 
					{
						$cmd = "delete from furafila where numero='$numero'";
						echo "$cmd;<BR>";
					}
					else
					{
						$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='2.4' and anulado=0";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) 
						{
							$cmd2 = "select * from divididos where (dividido='$numero1' or dividido='$numero2')";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2)) 
							{
								$principal = $line2['principal'];
								$cmd2 = "select * from arquivados where principal='$principal' and despacho in ('15.23','19.1','27.2','28.1','28.30','28.31','28.32','29.2','29.3') and anulado=0";
								$res2 = mysqli_query($link,$cmd2);  // teste se principal é prioritário
								if ($line2=@mysqli_fetch_assoc($res2)) 
								{
									$cmd = "delete from furafila where numero='$numero'";
									echo "$cmd;<BR>";
								}
							}
							else
								echo "$numero é dividido mas não encontrei principal na tabela divididos<BR>";
						}
					}
				}
				echo "Fim de processamento";
				exit();
			}
			
			// CREATE TABLE `furafila` ( `numero` varchar(25) NOT NULL, data_deposito` date NOT NULL, `data_122` date NOT NULL, `data_1` date NOT NULL, `divisao` varchar(25) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;
			
			if ($op==7)
			{
				$cmd = "select distinct(numero) from pedido where instancia in ('recurso cgrec','recurso') and decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso exigencia','recurso exigencia 121','recurso ciencia') and anulado=0";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res)) 
				{
					$numero = $line['numero']; // este não necessariamente é o primeiro exame de recurso
					$cmd2 = "select * from furafila where numero='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) continue;
						
					$cmd2 = "select * from arquivados where numero='$numero' and despacho in ('15.23','19.1','27.2','28.1','28.30','28.31','28.32','29.2','29.3') and anulado=0";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) continue;
					
					// 27.2 - Solicitação Concedida Patentes Verdes
					// 28.1 - Concedido o exame prioritário PPH do pedido de patente
					// 15.23 - Pedido “SUB JUDICE
					// 19.1 - Notificação de Decisão Judicial
					// 28.30 - Trâmite prioritário admitido
					// 28.31 - Trâmite prioritário por emergência nacional ou interesse público
					// 28.32 - Trâmite prioritário por solicitação do Ministério da Saúde admitido
					// 29.2 - Pedido de patente sobrestado por determinação judicial
					// 29.3 - Patente sobrestada por determinação judicial

					$data_122 = null;
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
					{	
						$divisao = '';
						$data_122 = $line2['data'];
						$cmd2 = "select * from publicados where (numero='$numero1' or numero='$numero2')";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) 
						{
							$divisao = $line2['divisao'];
							$data_deposito = $line2['data_deposito']; // data de depósito internacional para os PCTs
						}
		
						$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and (decisao='9.2' or decisao='indeferimento') and anulado=0";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) $divisao = $line2['divisao'];

						$cmd2 = "select * from pedido as p, examinador as e where p.codigo=e.codigo and e.dono=1 and (p.numero='$numero1' or p.numero='$numero2') and p.instancia in ('recurso cgrec','recurso') and p.decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso exigencia','recurso exigencia 121','recurso ciencia') and p.anulado=0 order by p.rpi asc";
						$res2 = mysqli_query($link,$cmd2); // recupera o primeiro exame de recurso deste pedido
						if ($line2=@mysqli_fetch_assoc($res2)) 
						{
							$data_1 = $line2['rpi'];
							$cmd2 = "INSERT INTO furafila (numero, data_deposito, data_122, data_1, divisao) VALUES ('$numero', '$data_deposito', '$data_122', '$data_1', '$divisao');";
							echo "$cmd2;<BR>";
						}
					}
				}
				echo "Fim processamento";
				exit();
			}
			
			//echo "Ordenação por data do 12.2<BR>";
			echo "<TABLE class='table table-hover align-middle table-status'>";
			echo "<thead><TR><TH>Número</TH><TH>12.2</TH><TH>1º parecer RPI</TH></TR></THEAD>";
			echo "<TBODY>";
			
			$cmd = "select * from furafila where year(data_1)=$ano and month(data_1)=$mes order by data_122 asc";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res)) 
			{
				$numero_ref = $line['numero'];
				$data_1_ref = $line['data_1'];
				$data_122_ref = $line['data_122'];
				$divisao_ref = $line['divisao'];
				// pesquise se existe número com data_122 anterior que tenha data_rpi superior a 4 meses
				
				$resultado=array();
				$data_inicio = new DateTime($data_1_ref);
				$cmd2 = "select * from furafila where divisao='$divisao_ref' and data_122<'$data_122_ref' and year(data_1)>2010";
				$res2 = mysqli_query($link,$cmd2);
				while ($line2=@mysqli_fetch_assoc($res2)) 
				{
					$numero = $line2['numero'];
					$data_1 = $line2['data_1'];
					$data_fim = new DateTime($data_1);
					if ($data_1>$data_1_ref) // furou fila
					{
						$dateInterval = $data_inicio->diff($data_fim);
						$dias = $dateInterval->days;
						if ($dias>4*30) $resultado[] = $numero;
					}
				}

				$itens = count($resultado);$str='';
				foreach ($resultado as $x) $str = $str.$x.",";
				$str = substr($str,0,20)."...";
				if ($itens>0)
					echo "<TR><TD><font color=red><B>$numero_ref [$divisao_ref]</B></font>[$itens] $str</TD><TD>$data_122_ref</TD><TD>$data_1_ref</TD></TR>";
				else
					echo "<TR><TD>$numero_ref</TD><TD>$data_122_ref</TD><TD>$data_1_ref</TD></TR>";
				
			}
			echo "</TBODY></TABLE>";
			echo "Fim processamento";
			exit();
		}

		function pesquisar_anteriores($numero_ref,$array_data_122,$array_data_rpi)
		{
			$str = array();
			$resultado=0;
			$data_122_ref = $array_data_122[$numero_ref];
			$data_rpi_ref = $array_data_rpi[$numero_ref];
			$data_inicio = new DateTime($data_rpi_ref);
			foreach ($array_data_122 as $numero=>$data_122)
			{
				if ($data_122>$data_122_ref) break; // interrompa pesquisa, só pesquisar numeros que tenham 12.2 anterior
				$data_rpi = $array_data_rpi[$numero];
				$data_fim = new DateTime($data_rpi);
				if ($data_rpi>$data_rpi_ref)
				{
					$dateInterval = $data_inicio->diff($data_fim);
					$dias = $dateInterval->days;
					if ($dias>4*30) 
					{
						$resultado++;
						$str[] = $numero;
					}
				}
			}
			return $str;
		}
		
		if ($action==1128)
		{
			$cmd = "select distinct(numero) from pedido where instancia in ('recurso cgrec','recurso') and decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso exigencia','recurso exigencia 121','recurso ciencia') and year(rpi)=2021 and month(rpi)=12 and anulado=0";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res)) 
			{
				$numero = $line['numero'];
				$data_122 = null;
				$cmd2 = "select * from arquivados where numero='$numero' and despacho='12.2' and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) $data_122 = $line2['data'];

				$cmd2 = "select * from pedido as p, examinador as e where p.codigo=e.codigo and e.dono=1 and p.numero='$numero' and p.instancia in ('recurso cgrec','recurso') and p.decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso exigencia','recurso exigencia 121','recurso ciencia') and p.anulado=0 order by p.rpi asc";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) 
				{
					$data_rpi = $line2['rpi'];
					$data = $line2['data'];
					//echo "$numero $data_122 $data $data_rpi<BR>";
					$array_data_122[$numero] = $data_122;
					$array_data[$numero]=$data;
					$array_data_rpi[$numero]=$data_rpi;
				}
				//echo "<BR>";
			}
			//echo "Ordenação por data do 12.2<BR>";
			asort($array_data_122);
			echo "<TABLE class='table table-hover align-middle table-status'>";
			echo "<thead><<TR><TH>Número</TH><TH>12.2</TH><TH>1º parecer RPI</TH></TR></THEAD>";
			echo "<TBODY>";
			foreach ($array_data_122 as $numero=>$data_122)
			{
				$data = $array_data[$numero];
				$data_rpi = $array_data_rpi[$numero];
				// pesquise se existe número com data_122 anterior que tenha data_rpi superior a 4 meses
				$resultado = pesquisar_anteriores($numero,$array_data_122,$array_data_rpi);
				$itens = count($resultado);$str='';
				foreach ($resultado as $x) $str = $str.$x.",";
				$str = substr($str,0,20)."...";
				if ($itens>0)
					echo "<TR><TD><font color=red><B>$numero</B></font>[$itens] $str</TD><TD>$data_122</TD><TD>$data_rpi</TD></TR>";
				else
					echo "<TR><TD>$numero</TD><TD>$data_122</TD><TD>$data_rpi</TD></TR>";
			}
			echo "</TBODY></TABLE>";
			echo "Fim processamento";
			exit();
		}

		if ($action==1127) 
		{
			/* para apagar duplicatas
			$cmd = "select * from titulo where 1 group by numero having count(*)>1 limit 0,200";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res)) 
			{
				$numero = $line['numero'];
				$cmd2 = "select * from titulo where numero='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				$i=0;
				while ($line2=@mysqli_fetch_assoc($res2))
				{
					$id = $line2['id'];
					if ($i>0)
					{
						$cmd2 = "delete from titulo where numero='$numero' and id=$id";
						//$res2 = mysqli_query($link,$cmd2);
						echo "$cmd2;<BR>";
					}
					else
						$i = 1;
				}
			}
			echo "Fim processamento";
			exit();
			*/
			
			/* para detectar revistas faltantes
			$cmd2 = "SELECT * FROM rpis_lidas where 1 order by rpi desc";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) $rpi_final = $line2['rpi'];
			
			echo "Processando<BR>";
			$cmd2 = "SELECT * FROM rpis_lidas where 1 order by rpi desc";
			$res2 = mysqli_query($link,$cmd2);
			while ($line2=@mysqli_fetch_assoc($res2)) 
			{
				$rpi = $line2['rpi'];
				$fname="revistas/P$rpi.txt";
				if (!file_exists($fname)) 
				{
					$fname="revistas/P$rpi.TXT";
					if (!file_exists($fname)) echo "revistas/P$rpi.TXT<BR>";
				}
			}
			exit();
			*/
				
			//for ($rpi=2300;$rpi<=$rpi_final;$rpi++)

			$rpi_final = $rpi - 100;
			$rpi_inicio = $rpi;
			for ($rpi=$rpi_inicio;$rpi>=$rpi_final;$rpi--) // 2628 a 1132 para tras é arquivo ANSI
			{
				$total=0;
				$fname="revistas/P$rpi.txt";
				@ $fp = fopen($fname,"r");
				if (!$fp)
				{
					$fname="revistas/P$rpi.TXT";
					@ $fp = fopen($fname,"r");
				}
					

				if (!$fp)
				{
					echo "Não foi identificado o arquivo texto $fname<BR>";
				}
				else
				{
					$cmd2 = "SELECT * FROM rpis_lidas where rpi=$rpi";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) $data = $line2['data'];
					$texto='';
					$numero_lido = '';
					echo "Iniciando leitura da revista $rpi<BR>";
					while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
					{
						$texto= trim(fgets($fp)); 
						if ($texto=='') continue;
						if (strcmp(substr($texto,0,4),'(Cd)')==0)
						{
							$despacho = trim(substr($texto,4));
						}
						if (strcmp(substr($texto,0,4),'(21)')==0 or strcmp(substr($texto,0,4),'(11)')==0)	
						{	
							$numero_lido = trim(substr($texto,4));
							$pos = strpos($numero_lido,'-');
							$numero_lido = substr($numero_lido,0,$pos);
							$numero_lido = trim(str_replace(" ","",$numero_lido)); // PI 9916155-9 B1
							$numero_lido = trim(str_replace("BR","",$numero_lido));
						}
						if (strcmp(substr($texto,0,4),'(54)')==0)	
						{	
							$titulo = trim(substr($texto,4));
							$titulo = trim(str_replace("'","",$titulo));
							$titulo = trim(str_replace('"',"",$titulo));
							$titulo_utf8 = utf8_encode($titulo);
							$numero1 = $numero_lido;
							$numero2 = $numero_lido;
							//$cmd2 = "SELECT * FROM pimupi where numero1='$numero_lido' or numero2='$numero_lido'";
							//$res2 = mysqli_query($link,$cmd2);
							//if ($line2=@mysqli_fetch_assoc($res2))
							//{
							//	$numero1 = $line2["numero1"];
							//	$numero2 = $line2["numero2"];
							//} 

							if (!(strcmp(substr($numero_lido,0,2),'DI')==0 or strcmp(substr($numero_lido,0,1),'3')==0))
							{
								$cmd2 = "SELECT * FROM titulo where numero='$numero1' or numero='$numero2'";
								$res2 = mysqli_query($link,$cmd2);
								if (!$line2=@mysqli_fetch_assoc($res2))
								{
									if ($rpi>2628) // para 2629 em diante já esta em UTF-8
										$cmd2 = "insert ignore into titulo (numero,data,despacho,titulo) values ('$numero_lido','$data','$despacho','$titulo');";
									else
										$cmd2 = "insert ignore into titulo (numero,data,despacho,titulo) values ('$numero_lido','$data','$despacho','$titulo_utf8');";
									echo "$cmd2;<BR>";
									$res2 = mysqli_query($link,$cmd2);
									//exit();
								}
							}
						}
					}
				}
			}
			echo "Fim processamento<BR>";
			exit();
		}
		
		if ($action==1126)
		{
			$fname="resultados_115_4.txt";
			@ $fp = fopen($fname,"r");
			if (!$fp)
				echo "Não foi identificado o arquivo texto $fname";
			else
			{
				while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
				{
					$texto= trim(fgets($fp));
					if ($texto=='') continue;
					$texto = trim(str_replace('"','',$texto));
					$texto = trim(str_replace(',',';',$texto)); 
					list($numero,$divisao,$despacho,$tipo,$data) = explode(';',$texto);
					$numero = trim($numero);

					$numero1 = $numero;
					$numero2 = $numero;
					$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2["numero1"];
						$numero2 = $line2["numero2"];
					}
					
					$data12_2 = null;
					$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('12.2','12.3','12.6') and data<='$data'";
					$res2 = mysqli_query($link,$cmd2); 
					if ($line2=@mysqli_fetch_assoc($res2)) 
					{
						$data12_2 = $line2['data'];
						echo "$numero,$divisao,$despacho,$tipo,$data12_2;$data<BR>";
					}
					else
						echo "Não achei o 12.2 de $numero,$divisao,$despacho,$tipo,$data12_2;$data<BR>";
				}
			}
			echo "Fim processamento<BR>";
			exit();
		}
		
		if ($action==1125)
		{
			$despachos_nao_validos = array('1.2','3.5','3.6','8.11','10.1','10.9','11.1.1','11.2','11.3','11.4','11.5','11.6','11.11','11.12','11.17','11.18','11.20','11.30','11.34','11.31','15.1','15.2','15.3','15.3.1','15.4','15.13','15.14','15.21','15.23','19.1','23.6');
			$despachos_nao_validos2 ="'1.2','3.5','3.6','8.11','10.1','10.9','11.1.1','11.2','11.3','11.4','11.5','11.6','11.11','11.12','11.17','11.18','11.20','11.30','11.34','11.31','15.1','15.2','15.3','15.3.1','15.4','15.13','15.14','15.21','15.23','19.1','23.6'";

			$carta_patente = 0;
			$patente_extinta = 0;
			$patente_nao_valida = 0;
			$pendente = 0;
			$indeferido = 0;
			$nao_valido['11.1.1']=0;
			$nao_valido['8.11']=0;
			$nao_valido['11.2']=0;
			$nao_valido['11.4']=0;
			$nao_valido['10.1']=0;
			$nao_valido['outros']=0;

			$cmd = "select * from publicados where year(data_nacional)=$ano";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				
				$detectado=0;
				$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and anulado=0 and (despacho='16.1' or despacho='23.9')";
				$res2 = mysqli_query($link,$cmd2); 
				while($line2=@mysqli_fetch_assoc($res2))
				{
					$despacho = $line2['despacho'];
					$carta_patente++;
					echo "$numero;$despacho;carta_patente<BR>";
					$cmd3 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and anulado=0 and (despacho='21.1' or despacho='21.2' or despacho='21.6' or despacho='21.7')";
					$res3 = mysqli_query($link,$cmd3); 
					if($line3=@mysqli_fetch_assoc($res3))
					{
						$patente_extinta++;
						echo "$numero;$despacho;extinta<BR>";
					}
				}
			}

			$total92 = 0;
			$recurso = 0;
			$cmd = "select * from publicados where year(data_nacional)=$ano";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$despacho_out = $line['despacho_out'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				
				$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and anulado=0 and (despacho='9.2' or despacho='23.7')";
				$res2 = mysqli_query($link,$cmd2); 
				while($line2=@mysqli_fetch_assoc($res2))
				{
					echo "$numero;9.2<BR>";
					$total92++;
					$cmd3 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and anulado=0 and despacho='12.2'";
					$res3 = mysqli_query($link,$cmd3); 
					if ($line3=@mysqli_fetch_assoc($res3)) 
					{
						echo "$numero;recurso<BR>";
						$recurso++;
						if ($despacho_out=='PR - Recursos')
						{
							$indeferido++;
							echo "$numero;$despacho;indeferido<BR>";
						}
					}
					else
					{
						$cmd3 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and anulado=0 and despacho='9.2.4'";
						$res3 = mysqli_query($link,$cmd3); 
						if ($line3=@mysqli_fetch_assoc($res3)) 
						{
							$indeferido++;
							echo "$numero;$despacho;indeferido<BR>";
						}
					}
				}
			}

			$patente_nao_valida=0;
			$nao_valido['11.1.1']=0;
			$nao_valido['8.11']=0;
			$nao_valido['11.2']=0;
			$nao_valido['11.4']=0;
			$nao_valido['10.1']=0;
			$nao_valido['outros']=0;
			$cmd = "select * from publicados where year(data_nacional)=$ano";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$despacho_out = $line['despacho_out'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				
				$detectado = 0;
				$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and anulado=0 and despacho in ($despachos_nao_validos2)";
				$res2 = mysqli_query($link,$cmd2); 
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$detectado = 1;
					$despacho = $line2['despacho'];
					echo "$numero;$despacho;patente_não_válida<BR>";
					$patente_nao_valida++;
					$nao_valido[$despacho]++;
					$selecionados = array('11.1.1','8.11','11.2','11.4','10.1');
					if (!in_array($despacho,$selecionados)) $nao_valido['outros']++;
				}
				if ($detectado==0)
				{
					$pendente++;
					echo "$numero;;pendente<BR>";
				}
			}

			echo "Carta-patentes: $carta_patente<BR>";
			echo "Patentes Extintas: $patente_extinta<BR>";
			echo "Indeferidos: $indeferido<BR>";
			echo "Total 9.2: $total92<BR>";
			echo "Recursos: $recurso<BR>";
			echo "Patente não válida: $patente_nao_valida<BR>";
			foreach ($nao_valido as $despacho=>$value) echo "$despacho: $value<BR>";
			$outros = $nao_valido['outros'];
			echo "outros: $outros<BR>";
			echo "<BR>";
			echo "Pendentes: $pendente<BR>"; 
			echo "INSERT INTO cgrec_estat (tipo,divisao,ano,total,outros,prejudicados,intermediarios,providos,negados,pendentes) VALUES (8,'dirpa',$ano,$carta_patente,$patente_extinta,$indeferido,$total92,$recurso,0,$pendente);<BR>";
			echo "INSERT INTO cgrec_estat (tipo,divisao,ano,total,outros,prejudicados,intermediarios,providos,negados,pendentes) VALUES (9,'dirpa',$ano,$patente_nao_valida,".$nao_valido['11.1.1'].",".$nao_valido['8.11'].",".$nao_valido['11.2'].",".$nao_valido['11.4'].",".$nao_valido['10.1'].",$outros);<BR>";

			exit();
			
			$cmd = "select * from publicados where year(data_nacional)=$ano limit 0,5";
			$cmd = "select * from publicados where year(data_nacional)=$ano";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$despacho_out = $line['despacho_out'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				
				$detectado=0;
				$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and anulado=0";
				$res2 = mysqli_query($link,$cmd2); 
				while($line2=@mysqli_fetch_assoc($res2))
				{
					$despacho = $line2['despacho'];
					if ($despacho=='16.1' or $despacho=='23.9') 
					{
						$detectado = 1;
						$carta_patente++;
						echo "$numero;$despacho;carta_patente<BR>";
					}
					if ($despacho=='9.2.4' or $despacho=='23.7' or $despacho_out=='PR - Recursos') 
					{
						$detectado = 1;
						$indeferido++;
						echo "$numero;$despacho;indeferido<BR>";
					}
					if ($despacho=='21.1' or $despacho=='21.2' or $despacho=='21.6' or $despacho=='21.7') 
					{
						$detectado = 1;
						$patente_extinta++;
						echo "$numero;$despacho;extinta<BR>";
					}
					if ($detectado==0 and in_array($despacho,$despachos_nao_validos)) 
					{
						$detectado = 1;
						$patente_nao_valida++;
						echo "$numero;$despacho;patente_não_válida<BR>";
						if ($despacho=='11.1.1' or $despacho=='8.11' or $despacho=='11.2' or $despacho=='11.4' or $despacho=='10.1') 
							$nao_valido[$despacho]++;
						else
							$nao_valido['outros']++;
					}
				}
				if ($detectado==0) 
				{
					$pendente++;
					echo "$numero;;pendente<BR>";
				}
			}

			$total92 = 0;
			$recurso = 0;
			$cmd = "select * from publicados where year(data_nacional)=$ano";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$despacho_out = $line['despacho_out'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				
				$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and anulado=0 and (despacho='9.2' or despacho='23.7')";
				$res2 = mysqli_query($link,$cmd2); 
				while($line2=@mysqli_fetch_assoc($res2))
				{
					echo "$numero;9.2<BR>";
					$total92++;
					$cmd3 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and anulado=0 and despacho='12.2'";
					$res3 = mysqli_query($link,$cmd3); 
					if ($line3=@mysqli_fetch_assoc($res3)) 
					{
						echo "$numero;recurso<BR>";
						$recurso++;
					}
				}
			}

			echo "<BR><BR>Totais:<BR>";
			echo "Carta-patentes: $carta_patente<BR>";
			echo "Patentes Extintas: $patente_extinta<BR>";
			echo "<BR>";
			echo "Indeferidos: $indeferido<BR>";
			echo "Total 9.2: $total92<BR>";
			echo "Recursos: $recurso<BR>";
			echo "<BR>";
			echo "Patente não válida: $patente_nao_valida<BR>";
			foreach ($nao_valido as $despacho=>$value) echo "$despacho: $value<BR>";
			$outros = $nao_valido['outros'];
			echo "outros: $outros<BR>";
			echo "<BR>";
			echo "Pendentes: $pendente<BR>"; 
			echo "INSERT INTO cgrec_estat (tipo,divisao,ano,total,outros,prejudicados,intermediarios,providos,negados,pendentes) VALUES (8,'dirpa',$ano,$carta_patente,$patente_extinta,$indeferido,$total92,$recurso,0,$pendente);<BR>";
			echo "INSERT INTO cgrec_estat (tipo,divisao,ano,total,outros,prejudicados,intermediarios,providos,negados,pendentes) VALUES (9,'dirpa',$ano,$patente_nao_valida,".$nao_valido['11.1.1'].",".$nao_valido['8.11'].",".$nao_valido['11.2'].",".$nao_valido['11.4'].",".$nao_valido['10.1'].",$outros);<BR>";
			exit();
		}

		if ($action==1124) // verifica tabela revistas4
		{
			if ($op==1)
			{
				$total=0;$str='';
				$cmd = "SELECT * from arquivados where despacho='PR - Nulidades'"; 
				//$cmd = "SELECT * from arquivados where despacho='PR - Nulidades' and numero='PI9908651'"; 
				//$cmd = "SELECT * from arquivados where despacho='PR - Nulidades' and numero='PI9916155'";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					if ($numero=='PP1100030' or $numero=='PP1100458' or $numero=='PP1100661' or $numero=='PP1101188') continue;
					$data = $line['data'];
					$despacho = $line['despacho'];
					$numerocd = montar_numerocd($numero);
					$numero1 = $numero;
					$numero2 = $numero;
					$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2["numero1"];
						$numero2 = $line2["numero2"];
					}
					$numerocd1 = montar_numerocd($numero1);
					$numerocd2 = montar_numerocd($numero2);
					$cmd2 = "select * from revistas4 where (numero='$numerocd1' or numero='$numerocd2') and data='$data' and despacho='$despacho'";
					$res2 = mysqli_query($link,$cmd2); 
					if (!$line2=@mysqli_fetch_assoc($res2))
					{
						$str = $str."'$numerocd1',";echo "$numerocd1<BR>";
						$total++;
						$cmd2 = "select * from rpis_lidas where data='$data'";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) $rpi = $line2['rpi'];	

						/* RPI1939
						(Cd) PR - Nulidade
						(Di) DIRPA
						(11) PI 9908583-6
						(45) 01/03/2006
						(73) Norsk Hydro Asa (NO)
						(co) Requerente da Nulidade Administrativa: PETRÓLEO BRASILEIRO S. A. PETROBRÁS
						(74) Momsen, Leonardos & CIA.
						(De) Decisão: Decisão: Nulidade conhecida e negado o provimento. Mantida a concessão da patente.
						*/
						
						$total=0;
						$fname="revistas/P$rpi.TXT";
						@ $fp = fopen($fname,"r");
						if (!$fp)
						{
							echo "Não foi identificado o arquivo texto $fname<BR>";
							$fname="revistas/P$rpi.txt";
							@ $fp = fopen($fname,"r");
						}
						if (!$fp)
						{
							echo "Não foi identificado o arquivo texto $fname<BR>";
						}
						else
						{
							$ler_proximo_fgets = 1;$texto='';
							echo "Iniciando leitura da revista $rpi<BR>";
							while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
							{
								$total++;
								if ($ler_proximo_fgets==1) $texto= trim(fgets($fp)); //echo "$numero=$texto<BR>";
								$ler_proximo_fgets = 1;
								if ($texto=='') continue;
								$texto_lower = strtolower($texto);
								if (strcmp(substr($texto_lower,0,strlen('(Cd) PR - Nulidade')),strtolower('(Cd) PR - Nulidade'))==0 or strcmp(substr($texto_lower,0,strlen('(Cd) PR - Cancelamento')),strtolower('(Cd) PR - Cancelamento'))==0)
								{
									$numero_lido='';$numero_lido21='';$co='';$De='';//echo "entrei<BR>";
									while (!feof($fp))
									{
										$texto= trim(fgets($fp)); //echo "ola $numero_lido==$numerocd $texto<BR>";
										if ($texto=='') continue;
										$texto = str_replace("'","",$texto);
										$texto = str_replace('"','',$texto);
										if (substr($texto,0,4)=='(11)') $numero_lido = trim(substr($texto,4));
										if (substr($texto,0,4)=='(21)') $numero_lido21 = trim(substr($texto,4));
										if (substr($texto,0,4)=='(co)') $co = utf8_encode(trim(substr($texto,4)));
										if (substr($texto,0,4)=='(De)') $De = utf8_encode(trim(substr($texto,4)));
										if (substr($texto,0,4)=='(Cd)' or substr($texto,0,4)=='(cd)') 
										{
											$ler_proximo_fgets = 0;
											break;
										}
									}
									if ($numero_lido=='') $numero_lido = $numero_lido21;
									$pos = strpos($numero_lido,'-');
									$numero_lido = substr($numero_lido,0,$pos+2);
									$numero_lido = trim(str_replace(" ","",$numero_lido)); // PI 9916155-9 B1
									$numero_lido = trim(str_replace("BR","",$numero_lido));
									//echo "$numero_lido==$numerocd ($co $De)<BR>";
									if ($numero_lido==$numerocd1)
									{
										if ($co<>'') echo "insert into revistas4 (numero,data,despacho,descricao,inid) values ('$numerocd1','$data','$despacho','$co','co');<BR>";
										if ($De<>'') echo "insert into revistas4 (numero,data,despacho,descricao,inid) values ('$numerocd1','$data','$despacho','$De','De');<BR>";
									}
								}
							}
						}
					}
				}
				echo "PR - Nulidades ausentes de revistas4: $str<BR>";
				exit();
			}

			if ($op==2)
			{
				$total=0;$str='';
				$cmd = "SELECT * from arquivados where despacho='PR - Recursos'"; 
				//$cmd = "SELECT * from arquivados where despacho='PR - Nulidades' and numero='PI9908651'"; 
				//$cmd = "SELECT * from arquivados where despacho='PR - Nulidades' and numero='PI9916155'";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					if (substr($numero,0,2)=='PP') continue;
					$data = $line['data'];
					$despacho = $line['despacho'];
					$numerocd = montar_numerocd($numero);
					$numero1 = $numero;
					$numero2 = $numero;
					$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2["numero1"];
						$numero2 = $line2["numero2"];
					}
					$numerocd1 = montar_numerocd($numero1);
					$numerocd2 = montar_numerocd($numero2);
					$cmd2 = "select * from revistas4 where (numero='$numerocd1' or numero='$numerocd2') and data='$data' and despacho='$despacho'";
					$res2 = mysqli_query($link,$cmd2); 
					if (!$line2=@mysqli_fetch_assoc($res2))
					{
						$str = $str."'$numerocd1',";echo "$numerocd1<BR>";
						$total++;
						$cmd2 = "select * from rpis_lidas where data='$data'";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) $rpi = $line2['rpi'];	

						/* RPI1939
						(Cd) PR - Recursos
						(Di) DIRPA
						(21) BR 11 2014 004033-8 A2
						(22) 22/08/2012
						(71) FEDERAL-MOGUL POWERTRAIN, INC. (US)
						*/
						
						$total=0;
						$fname="revistas/P$rpi.TXT";
						@ $fp = fopen($fname,"r");
						if (!$fp)
						{
							echo "Não foi identificado o arquivo texto $fname<BR>";
							$fname="revistas/P$rpi.txt";
							@ $fp = fopen($fname,"r");
						}
						if (!$fp)
						{
							echo "Não foi identificado o arquivo texto $fname<BR>";
						}
						else
						{
							$ler_proximo_fgets = 1;$texto='';
							echo "Iniciando leitura da revista $rpi<BR>";
							while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
							{
								$total++;
								if ($ler_proximo_fgets==1) $texto= trim(fgets($fp)); 
								$ler_proximo_fgets = 1;
								if ($texto=='') continue; 
								$texto_lower = trim(strtolower($texto));// (Cd) 141
								$texto_lower2 = trim(str_replace("(cd)","",$texto_lower)); // 141
								$tipos_recursos = array('100','102','103','104','106','111','112','113','115','116','120','121','130','131','132','133','134','135','136','137','138','139','140','141');
								if (in_array($texto_lower2,$tipos_recursos) or strcmp(substr($texto_lower,0,strlen('(Cd) PR - Recurso')),strtolower('(Cd) PR - Recurso'))==0)
								{
									$numero_lido='';$numero_lido21='';$co='';$De='';//echo "entrei<BR>";
									while (!feof($fp))
									{
										$texto= trim(fgets($fp)); //echo "ola $numero_lido==$numerocd $texto<BR>";
										if ($texto=='') continue;
										$texto = str_replace("'","",$texto);
										$texto = str_replace('"','',$texto);
										if (substr($texto,0,4)=='(11)') $numero_lido = trim(substr($texto,4));
										if (substr($texto,0,4)=='(21)') $numero_lido21 = trim(substr($texto,4));
										if (substr($texto,0,4)=='(co)') $co = utf8_encode(trim(substr($texto,4)));
										if (substr($texto,0,4)=='(De)') $De = utf8_encode(trim(substr($texto,4)));
										if (substr($texto,0,4)=='(Cd)' or substr($texto,0,4)=='(cd)') 
										{
											$ler_proximo_fgets = 0;
											break;
										}
									}
									if ($numero_lido=='') $numero_lido = $numero_lido21;
									$pos = strpos($numero_lido,'-');
									$numero_lido = substr($numero_lido,0,$pos+2);
									$numero_lido = trim(str_replace(" ","",$numero_lido)); // PI 9916155-9 B1
									$numero_lido = trim(str_replace("BR","",$numero_lido)); 
									//echo "$numero_lido==$numerocd ($co $De)<BR>";
									if ($numero_lido==$numerocd1)
									{
										if ($co<>'') echo "insert into revistas4 (numero,data,despacho,descricao,inid) values ('$numerocd1','$data','$despacho','$co','co');<BR>";
										if ($De<>'') echo "insert into revistas4 (numero,data,despacho,descricao,inid) values ('$numerocd1','$data','$despacho','$De','De');<BR>";
									}
								}
							}
						}
					}
				}
				echo "PR - Recursos ausentes de revistas4: $str<BR>";
				exit();
			}
		}
		
		if ($action==1123) // testa 8.6, 9.2 e 11.17 como despacho_out na tabela publicados
		{
			$total=0;
			$cmd = "SELECT * from publicados where despacho_out='8.6'";
			//$cmd = "SELECT * from publicados where despacho_out='8.6' and data>'2007-05-02'";
			//$cmd = "SELECT * from publicados where despacho_out='11.17' and data>'2020-09-24'";
			//$cmd = "SELECT * from publicados where despacho_out='9.2' and data>'2008-12-02'";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];	
				$dataout = $line['dataout'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "SELECT * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='8.7' and anulado=0 and data>'$dataout'";
				$res2 = mysqli_query($link,$cmd2);//echo $cmd2;
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and $despachos_terminais2 and anulado=0 ";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$data = $line2['data'];
						$despacho = $line2['despacho'];
						$cmd2 = "update publicados set dataout='$data',despacho_out='$despacho' where numero='$numero1' or numero='$numero2'";
						echo "$cmd2;<BR>";
						//$res2 = mysqli_query($link,$cmd2);
						$total++;
					}
					else
					{
						$cmd2 = "update publicados set dataout=null,despacho_out='' where numero='$numero1' or numero='$numero2'";
						echo "$cmd2;<BR>";
						//$res2 = mysqli_query($link,$cmd2);
						$total++;
					}
				}
			}
			echo "Fim de processamento: $total";
			exit();
		}

		if ($action==1122) // testa pedidos há muito tempo (> 18 meses) e ainda não publicados, enviar para Sheila
		{
			/*
			$cmd = "select * from arquivados where despacho='15.12' and anulado=0";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				if ($numero=='202021021325' or $numero=='132012003099' or $numero=='212012000774' or $numero=='102012009560' or $numero=='102017003251' or $numero=='112012000197' or $numero=='112012000221') continue; // teve duas renumerações
				if (identificado_pipeline($numero)) continue;
				$data = $line['data'];
				$cmd2 = "select * from pimupi where (numero1='$numero' or numero2='$numero') and data='$data'";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2)))
				{
					$cmd2 = "SELECT * FROM rpis_lidas where data='$data'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) $rpi = $line2['rpi'];
					echo "$numero $data $rpi<BR>";
				}
			}
			echo "Fim de processamento";
			exit();*/
			
			// comando no DBVisualizar para seber se tem pedidos na carga com 8.6
			// select * from CEPIT_SISCAP.SISCAP_CARGA where divisao='direp' and numero in (select numero from CEPIT_SISCAP.SISCAP_ARQUIVADOS where despacho='8.6' and anulado=0 and extract (year from data)>=2021)
			$cmd = "SELECT numero,data_nacional FROM `publicados` WHERE despacho='200' and year(data_deposito)>=1997 and despacho_out='' and data_nacional is not null ORDER BY data_nacional ASC";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				if ($numero=='102019028221') continue; // teve duas renumerações, pimupi  so detecta maximo de duas
				if (identificado_pipeline($numero) or identificado_pi($numero) or identificado_mu($numero) or identificado_ca($numero))
				{
					$cmd2 = "select * from pimupi where numero1='$numero' and (numero2 like '30%' or numero2 like 'DI%')";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) continue; // renumerou para DI
					$data = $line['data_nacional'];
					echo "$numero $data<BR>";
				}
			}
			echo "Fim de processamento";
			exit();
		}
		
		if ($action==1121) // https://cientistaspatentes.com.br/central/control.php?action=1121
		{
			$tabelas = " divididos log ";
			$namefile = "backup.sql";
			$comando='c:\xampp\mysql\bin\mysqldump -u '.$user.' --password="'.$password.'" -B '.$database.' --tables '.$tabelas.' -q -K -c -e --add-drop-table > '.$namefile;
			//exec($comando);
			echo "Base de dados foi gravada no arquivo $namefile pelo comando: $comando";
			exit();
		}

		if ($action==1119) // https://cientistaspatentes.com.br/central/control.php?action=1119
		{
			// SELECT numero,prioridade,instancia,decisao,anulado,codigo,rpi,divisao FROM pedido where year(rpi)>=2011 and decisao in ('exigencia','ciencia de parecer','deferimento','9.2','indeferimento','defanvisa') and rpi<>'0000-00-00'
			// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from CEPIT_SISCAP.SISCAP_PEDIDO where instancia in ('recurso cgrec','nulidade cgrec','recurso','nulidade') and extract(year from rpi)>=2020 and anulado=0

			$fname="pedido.csv";
			@ $fp = fopen($fname,"r");
			if (!$fp)
				echo "Não foi identificado o arquivo texto $fname";
			else
			{
				while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
				{
					$texto= trim(fgets($fp));
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
					$cmd = "select * from pedido where codigo=$codigo";
					$res = mysqli_query($link,$cmd);
					if (!($line=@mysqli_fetch_assoc($res)))
					{
						$cmd = "insert into pedido (numero,prioridade,instancia,decisao,anulado,codigo,rpi,divisao) values ('$numero','$prioridade','$instancia','$decisao','$anulado','$codigo','$rpi','$divisao')";
	 	 				echo "$cmd;<BR>";
						//$res = mysqli_query($link,$cmd);
						//exit();
					}
					else
					{
						$decisao_lida = $line['decisao'];
						$divisao_lida = $line['divisao'];
						if ($decisao<>$decisao_lida or $divisao<>$divisao_lida) 
						{
							$cmd = "update pedido set decisao='$decisao',divisao='$divisao' where numero='$numero' and rpi='$rpi' and codigo=$codigo";
							echo "$cmd;<BR>";
							//$res = mysqli_query($link,$cmd);
						}
					}
				}
			}
			echo "Fim de processamento";
			exit();
		}
		
/*
INSERT INTO `estoque` (`id`, `ano`, `mes`, `data`, `estoque`, `depositos`, `concessoes`, `tempo_concessoes`) VALUES (NULL, '2024', '1', '2024-01-01', '', '', '', '');
INSERT INTO `estoque` (`id`, `ano`, `mes`, `data`, `estoque`, `depositos`, `concessoes`, `tempo_concessoes`) VALUES (NULL, '2024', '2', '2024-02-01', '', '', '', '');
INSERT INTO `estoque` (`id`, `ano`, `mes`, `data`, `estoque`, `depositos`, `concessoes`, `tempo_concessoes`) VALUES (NULL, '2024', '3', '2024-03-01', '', '', '', '');
INSERT INTO `estoque` (`id`, `ano`, `mes`, `data`, `estoque`, `depositos`, `concessoes`, `tempo_concessoes`) VALUES (NULL, '2024', '4', '2024-04-01', '', '', '', '');
INSERT INTO `estoque` (`id`, `ano`, `mes`, `data`, `estoque`, `depositos`, `concessoes`, `tempo_concessoes`) VALUES (NULL, '2024', '5', '2024-05-01', '', '', '', '');
INSERT INTO `estoque` (`id`, `ano`, `mes`, `data`, `estoque`, `depositos`, `concessoes`, `tempo_concessoes`) VALUES (NULL, '2024', '6', '2024-06-01', '', '', '', '');
INSERT INTO `estoque` (`id`, `ano`, `mes`, `data`, `estoque`, `depositos`, `concessoes`, `tempo_concessoes`) VALUES (NULL, '2024', '7', '2024-07-01', '', '', '', '');
INSERT INTO `estoque` (`id`, `ano`, `mes`, `data`, `estoque`, `depositos`, `concessoes`, `tempo_concessoes`) VALUES (NULL, '2024', '8', '2024-08-01', '', '', '', '');
INSERT INTO `estoque` (`id`, `ano`, `mes`, `data`, `estoque`, `depositos`, `concessoes`, `tempo_concessoes`) VALUES (NULL, '2024', '9', '2024-09-01', '', '', '', '');
INSERT INTO `estoque` (`id`, `ano`, `mes`, `data`, `estoque`, `depositos`, `concessoes`, `tempo_concessoes`) VALUES (NULL, '2024', '10', '2024-10-01', '', '', '', '');
INSERT INTO `estoque` (`id`, `ano`, `mes`, `data`, `estoque`, `depositos`, `concessoes`, `tempo_concessoes`) VALUES (NULL, '2024', '11', '2024-11-01', '', '', '', '');
INSERT INTO `estoque` (`id`, `ano`, `mes`, `data`, `estoque`, `depositos`, `concessoes`, `tempo_concessoes`) VALUES (NULL, '2024', '12', '2024-12-01', '', '', '', '');
*/
	
		if ($action==24)
		{
			if ($op==1)
			{
				echo "Calcula tempo e concessão<BR>";

				$ano_inicial = $ano;
				for ($ano=$ano_inicial;$ano<=$ano_inicial;$ano++)
				{
					$total_concessoes_ano = 0;
					$soma_tempo_ano = 0;
					for ($mes=1;$mes<=12;$mes++)
					{
						$total_depositos =0;
						$total_concessoes =0;
						$soma_tempo = 0;
						$tempo_medio = 0;
						$soma_tempo = 0;
						$tempo_medio = 0;
						$soma_prioritarios = 0;
						$soma_verdes = 0;
						$soma_pph = 0;
						$prioritario = 0;
						$soma_tempo_sem_prioritarios = 0;
						$total_concessoes_sem_prioritarios = 0;
						$kmes = str_pad($mes,2,"0",STR_PAD_LEFT);
						$data = "$ano-$kmes-01";
					
			// SELECT * FROM arquivados where divisao not in ('ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipem','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut') and year(data)=2014 and anulado=0 and despacho='16.1' and (numero like 'PI%' or numero like 'MU%' or numero like '10%' or numero like '11%' or numero like '12%' or numero like '20%' or numero like '21%' or numero like '22%')
			// http://www.inpi.gov.br/legislacao-arquivo/docs/resolucao_74-2013-deposito_dos_pedidos_de_patentes.pdf

						$cmd="SELECT * FROM arquivados WHERE year(data)=$ano and month(data)=$mes and anulado=0 and despacho='16.1' and (numero like 'MU%' or numero like '20%' or numero like '21%' or numero like '22%')";
						$cmd="SELECT * FROM arquivados WHERE year(data)=$ano and month(data)=$mes and anulado=0 and despacho='16.1' and (numero like 'PI%' or numero like '10%' or numero like '11%' or numero like '12%')";
						$res = mysqli_query($link,$cmd);
						$total = 0;
						while ($line=@mysqli_fetch_assoc($res))
						{
							$total_depositos++;
							$numero = $line['numero'];
							$data_concessao = $line['data'];

							$numero1 = $numero;
							$numero2 = $numero;
							$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$numero1 = $line2["numero1"];
								$numero2 = $line2["numero2"];
							}

							$cmd2="SELECT * FROM publicados WHERE (numero='$numero1' or numero='$numero2')";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$data_deposito = $line2['data_deposito'];
								$data_nacional = $line2['data_nacional'];
								if ($data_nacional != null) $data_deposito = $data_nacional; // se for PCT conte da fase nacional

								/*
								$prioritario = 0;
								$cmd2="SELECT * FROM arquivados WHERE (numero='$numero1' or numero='$numero2') and despacho='15.24.2'";
								$res2 = mysqli_query($link,$cmd2);
								if ($line2=@mysqli_fetch_assoc($res2))
								{
									$prioritario = 1;
									$soma_prioritarios++;
								}

								$cmd2="SELECT * FROM arquivados WHERE (numero='$numero1' or numero='$numero2') and despacho='28.1'";
								$res2 = mysqli_query($link,$cmd2);
								if ($line2=@mysqli_fetch_assoc($res2))
								{
									$prioritario = 1;
									$soma_pph++;
								}

								$cmd2="SELECT * FROM arquivados WHERE (numero='$numero1' or numero='$numero2') and despacho='27.2'";
								$res2 = mysqli_query($link,$cmd2);
								if ($line2=@mysqli_fetch_assoc($res2))
								{
									$prioritario = 1;
									$soma_verdes++;
								}
								*/
								
								$total_concessoes++;
								list($ano1,$mes1,$dia1) = explode('-',$data_concessao);
								$idata_concessao = mktime(0,0,0,(integer)$mes1,(integer)$dia1,(integer)$ano1); // retorna intervalo em segundos desde 1970 de $data_rpi - 90 dias
								list($ano1,$mes1,$dia1) = explode('-',$data_deposito);
								$idata_deposito = mktime(0,0,0,(integer)$mes1,(integer)$dia1,(integer)$ano1); // retorna intervalo em segundos desde 1970 de $data_rpi - 90 dias
								$tempo = round(($idata_concessao-$idata_deposito)/(24*60*60*30*12),2); // simplifica-se com 1 ano = 365 dias, 1 mes = 30 dias
								if ($tipo==5) echo "BR$numero;$data_deposito;$data_concessao;$tempo<BR>";
								$soma_tempo = $soma_tempo + $tempo;
								$soma_tempo_ano = $soma_tempo_ano + $tempo;
								//if ($prioritario==0)
								//{
								//	$soma_tempo_sem_prioritarios = $soma_tempo_sem_prioritarios + $tempo;
								//	$total_concessoes_sem_prioritarios++;
								//}
							}
							else
								echo "$ano Não encontrei $numero<BR>";
						}
						if ($total_concessoes>0) $tempo_medio = round($soma_tempo/$total_concessoes,2);
						$total_concessoes_ano = $total_concessoes_ano + $total_concessoes;
						//if ($total_concessoes_sem_prioritarios>0) $tempo_medio_sem_prioritarios = round($soma_tempo_sem_prioritarios/$total_concessoes_sem_prioritarios,2);
						//echo "<TR><TD>$ano</TD><TD>$total_concessoes</TD><TD>$tempo_medio</TD><TD>$soma_prioritarios</TD><TD>$soma_verdes</TD><TD>$soma_pph</TD><TD>$total_concessoes_sem_prioritarios</TD><TD>$tempo_medio_sem_prioritarios</TD></TR>";
						$cmd2 = "update estoque set concessoes=$total_concessoes, tempo_concessoes=$tempo_medio where data='$data'";
						echo "$cmd2;<BR>";
						//echo "$ano;$mes;$data;$total_concessoes;$tempo_medio<BR>";
					}
					if ($total_concessoes_ano>0) $tempo_medio_ano = round($soma_tempo_ano/$total_concessoes_ano,2);
					$cmd2 = "update estoque_ano set concessoes=$total_concessoes_ano, tempo_concessoes=$tempo_medio_ano where ano=$ano";
					echo "$cmd2;<BR>";
					$cmd2 = "update estoque_ano set tempo_concessoes=$tempo_medio_ano where ano=$ano";
					echo "$cmd2;<BR>";
					
				}
				echo "Fim processamento<BR>";
				exit();
			}

			if ($op==2)
			{
				echo "Calcula depositos<BR>";
				$ano_inicial = $ano;
				for ($ano=$ano_inicial;$ano<=2022;$ano++)
				{
					$total_depositos_ano = 0;
					for ($mes=1;$mes<=12;$mes++)
					{
						$kmes = str_pad($mes,2,"0",STR_PAD_LEFT);
						$data = "$ano-$kmes-01";
						$cmd="SELECT count(*) as x FROM despachos_pag WHERE year(data_peticao)=$ano and month(data_peticao)=$mes and tipo_peticao='200'";
						$res = mysqli_query($link,$cmd);
						if ($line=@mysqli_fetch_assoc($res)) $total_depositos = $line['x'];
						$total_depositos_ano = $total_depositos_ano + $total_depositos;
						$cmd2 = "update estoque set depositos=$total_depositos where data='$data'";
						echo "$cmd2;<BR>";
					}
					$cmd2 = "update estoque_ano set depositos=$total_depositos_ano where ano=$ano";
					echo "$cmd2;<BR>";
				}
				echo "Fim processamento<BR>";
				exit();
			}
			
	// deve-se ajustar o campo divisao de 16.1 para poder fazer a estatística por divisão
/*
			for ($ano=1990;$ano<=2016;$ano++)
			{
				$cmd="SELECT count(*) as X FROM arquivados where year(data)=$ano and despacho in ('6.1','7.1','9.1','9.2') and prmexame=1" ;
				$res = mysqli_query($link,$cmd);
				if ($line=@mysqli_fetch_assoc($res))
				{
					$total = $line['X'];
					echo "$ano $total<BR>";
				}
			}
			exit();

			for ($ano=1990;$ano<=2016;$ano++)
			{
				$cmd="SELECT count(*) as X FROM publicados where year(data_deposito)=$ano";
				$res = mysqli_query($link,$cmd);
				if ($line=@mysqli_fetch_assoc($res))
				{
					$total = $line['X'];
					echo "$ano $total<BR>";
				}
			}
			exit();

			for ($ano=2005;$ano<=2016;$ano++)
			{
				$cmd="SELECT * FROM despachos_pag where tipo_peticao='214' and year(data_peticao)=$ano";
				$cmd="SELECT * FROM despachos_pag where tipo_peticao='215' and year(data_peticao)=$ano";
				$res = mysqli_query($link,$cmd);
				$total = 0;
				$soma_tempo = 0;
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$data1 = $line['data_peticao'];
					$cmd2="SELECT * FROM arquivados where numero='$numero' and despacho='12.2' and anulado=0";
					$cmd2="SELECT * FROM arquivados where numero='$numero' and despacho='17.1' and anulado=0";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$cmd2="SELECT * FROM arquivados where numero='$numero' and despacho='PR - Recursos' and anulado=0";
						$cmd2="SELECT * FROM arquivados where numero='$numero' and despacho='PR - Nulidades' and anulado=0";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
						{
							$total++;
							$data2 = $line2['data'];
							list($ano1,$mes1,$dia1) = split('-',$data1);
							$idata_214 = mktime(0,0,0,(integer)$mes1,(integer)$dia1,(integer)$ano1); // retorna intervalo em segundos desde 1970 de $data_rpi - 90 dias
							list($ano1,$mes1,$dia1) = split('-',$data2);
							$idata_recurso = mktime(0,0,0,(integer)$mes1,(integer)$dia1,(integer)$ano1); // retorna intervalo em segundos desde 1970 de $data_rpi - 90 dias
							$tempo = round(($idata_recurso-$idata_214)/(24*60*60*30*12),2); // simplifica-se com 1 ano = 365 dias, 1 mes = 30 dias
							// echo "$numero $data1 $data2 $tempo<BR>";
							$soma_tempo = $soma_tempo + $tempo;
						}
					}
				}
				if ($total>0) $tempo_medio = round($soma_tempo/$total,2);
				echo "$ano: $total tempo médio: $tempo_medio (anos)<BR>";
				//exit();
			}
			exit();


			for ($ano=2016;$ano<=2016;$ano++)
			{
				$cmd="SELECT * FROM arquivados WHERE anulado=0 and despacho='16.1' and divisao not in ('ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipem','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut')";
				$res = mysqli_query($link,$cmd);
				$total = 0;
				while ($line=@mysqli_fetch_assoc($res))
				{
					$total_depositos++;
					$numero = $line['numero'];
					$numero1 = $numero;
					$numero2 = $numero;
					$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2["numero1"];
						$numero2 = $line2["numero2"];
					}
					$idivisao = $line['divisao'];
					$cmd2="SELECT * FROM arquivados WHERE (numero='$numero1' or numero='$numero2') and anulado=0 and despacho in ('9.1','9.2')";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$jdivisao = $line2['divisao'];
						if ($idivisao<>$jdivisao)
						{
							$cmd2 = "update arquivados set divisao='$jdivisao' where numero='$numero' and anulado=0 and despacho='16.1'";
							echo "$cmd2;<BR>";
						}
					}
					else
						echo "Não encontrei $numero<BR>";
				}
			}
			echo "Fim de processamento<BR>";
			exit();
	*/
		}

		if ($action==1120)
		{
			$numeros_lidos = array();
			$cmd = "SELECT * FROM pedido WHERE year(rpi)=$ano and decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso ciencia','recurso exigencia','recurso exigencia 121') order by numero,rpi";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$rpi = $line['rpi'];
				$decisao = $line['decisao'];
				$divisao = $line['divisao'];
				if (in_array($numero,$numeros_lidos)) continue; // evita pesquisar duas vezes o mesmo número
				$numeros_lidos[$i]=$numero;
				$i = $i + 1;
				echo "$divisao;$numero;$rpi;$decisao<BR>";
			}

			echo "<BR><BR>NULIDADES<BR>";
			$numeros_lidos = array();
			$cmd = "SELECT * FROM pedido WHERE year(rpi)=$ano and decisao in ('nulidade 1') order by numero,rpi";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$rpi = $line['rpi'];
				$decisao = $line['decisao'];
				$divisao = $line['divisao'];
				if (in_array($numero,$numeros_lidos)) continue; // evita pesquisar duas vezes o mesmo número
				$numeros_lidos[$i]=$numero;
				$i = $i + 1;
				echo "$divisao;$numero;$rpi;$decisao<BR>";
			}
			
			echo "Fim processamento";
			exit();
		}
		
		if ($action==123){
	/*
	estoque de pedidos em 2019-08-01
	SELECT count(*) FROM `publicados` where data_deposito<'2016-12-31' and (pedexame is not null and pedexame<='2019-08-01') and (dataout is null or dataout>'2019-08-01')
	estoque (01/08/2019): 151309
	estoque (26/05/2020): 150690
	no site: 149,93 mil diferença de mil pedidos http://www.inpi.gov.br/menu-servicos/patente/plano-de-combate-ao-backlog

	estoque de pedidos atual
	SELECT count(*) FROM `publicados` where pedexame is not null and dataout is null
	estoque de pedidos 157789
	estoque de pedidos 128902 (26/05/2020)

	SELECT * FROM publicados where data_deposito>'1996-01-01' and ((data_deposito>'2004-09-01' and pedexame is not null) or data_deposito<='2004-09-01') and dataout is null order by data_deposito asc
	119422


	estoque de pedidos em 2020-01-07 query feita 13/01/2020
	SELECT count(*) FROM `publicados` where data_deposito<'2016-12-31' and (pedexame is not null and pedexame<='2020-01-07') and (dataout is null or dataout>'2020-01-07')
	estoque de pedidos 138371
	estoque de pedidos em 2020-01-07 query feita 26/05/2020
	estoque de pedidos 137361

	no site temos 130784, ou seja, uma diferença de 8 mil pedidos
	
	petição 203 começa de forma consistente a partir de 2005-01-01 
	portanto pedido depositado em 2004 pode ser que tenha pedido de exame de 2004 e nao ira aparecer na base, certo mesmo so os pedidos depsitados a partir de 2005
	para pedidos depositados antes de 2002-01-01 se nao tiver pedido de exame assume que pedexame foi tres anos depois do depósito
	
	*/
		if ($op==2)
		{
			$cmd="SELECT * FROM publicados where data_deposito>'1996-01-01' and dataout is null";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
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
				$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('recurso negado','recurso 111','recurso manutencao do indeferimento 111')";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$rpi = $line2['rpi'];
					$cmd2 = "update publicados set dataout='$rpi', despacho_out='PR - Recursos' where (numero='$numero1' or numero='$numero2') and dataout is null";
					echo "$cmd2;<BR>";
					$total++;
				}
			}
			echo "Fim de processamento: $total";
			exit();
		}
		$ano_inicial = $ano;
		$ano_inicial = 2009;
		for ($ano=$ano_inicial;$ano<=2022;$ano++)
		{
			for ($mes=1;$mes<=12;$mes++)
			{
				$total=0;
				$kmes = str_pad($mes,2,"0",STR_PAD_LEFT);
				$data = "$ano-$kmes-01";
				$idata = $ano - 3;
				$datai = "$i-$kmes-01";
				$cmd="SELECT count(*) as X FROM publicados where data_deposito<'2016-12-31' and (pedexame is not null and pedexame<='$data') and (dataout is null or dataout>'$data')";
				$cmd="SELECT count(*) as X FROM publicados where (pedexame is not null and pedexame<='$data') and (dataout is null or dataout>'$data')";
				$cmd="SELECT count(*) as X FROM publicados where data_deposito>'1996-01-01' and ((data_deposito>'2004-09-01' and pedexame is not null and pedexame<='$data') or data_deposito<='2004-09-01') and (dataout is null or dataout>'$data')";
				if ($data>'2008-01-01')
					$cmd="SELECT count(*) as X FROM publicados where data_deposito<'$data' and (dataout is null or dataout>'$data') and (pedexame is not null and pedexame<='$data')";
				else
					$cmd="SELECT count(*) as X FROM publicados where data_deposito<'$idata' and (dataout is null or dataout>'$data')";
					
				$res = mysqli_query($link,$cmd);//echo $cmd."<BR>";
				if ($line=@mysqli_fetch_assoc($res))
				{
					$x = $line['X'];
					if ($data<='2008-01-01') $x = round($x/2,0); // estima-se de 50% dos pedidos depositados não pedem exame, logo para que não haja quebra faça esse ajuste
					$cmd2 = "update estoque set estoque=$x where data='$data'";
					echo "$cmd2;<BR>";
				}

			}
		}
		echo "Fim de processamento";
		exit();
	}

	if ($action==1118)
	{
		$inicio = $rpi;
		for ($rpi=$inicio;$rpi>=$inicio-99;$rpi--)
		{
			$ansi = 0;
			if ($rpi<2630) $ansi = 1;
			
			$cmd = "select * from rpis_lidas where rpi='$rpi'";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res)) $data = $line['data'];

			$fname="revistas/P$rpi.txt";
			if (!file_exists($fname)) $fname="revistas/P$rpi.TXT";
				
			if (file_exists($fname))
			{
				echo " - identificado o arquivo $fname<BR><BR>";
				@ $fpr = fopen($fname,"r");
				if (!$fpr)
					echo "Não foi identificado o arquivo texto $fname<BR>";
				else
				{
					$total = 0;$ler_numero=0;$ler_comentario=0;$despacho='';
					while (!feof($fpr))
					{
						if ($ansi==1)
							$linha = utf8_encode(trim(fgets($fpr))); 
						else
							$linha = trim(fgets($fpr)); 
							
						if (!(strpos($linha,'(Cd)')===false))
						{
							$ler_comentario=0;
							$ler_numero = 0;
							$linha = trim(str_replace('(Cd)','',$linha));//echo $linha."<BR>";
							//if ($linha=="PR - Recursos" or $linha=="PR - Nulidades" or $linha=="16.1")
							if ($linha=="25.4" or $linha=="25.1")
							{
								$despacho=$linha;
								$ler_numero = 1;
							}
						}
						else
						{
							if ($ler_numero==1)
							{
								if (!(strpos($linha,'(21)')===false) or !(strpos($linha,'(11)')===false))
								{
									$linha = trim(str_replace('(21)','',$linha));
									$linha = trim(str_replace('(11)','',$linha));
									$linha = trim(str_replace('BR','',$linha));
									$linha = trim(str_replace(' ','',$linha));
									if ($linha[0]=='P' or $linha[0]=='M') 
										$numero = substr($linha,0,9);
									else
										$numero = substr($linha,0,12);
									
									//echo "$despacho $numero<BR>";
									$ler_numero = 0;
									$ler_comentario = 1;
								}
							}
							else
							{
								if ($ler_comentario==1)
								{
									if (!(strpos($linha,'(71)')===false) or !(strpos($linha,'(73)')===false))
									{
										$inid = 73;
										if (!(strpos($linha,'(71)')===false)) $inid = 71;
										$linha = trim(str_replace('(71)','',$linha));
										$linha = trim(str_replace('(73)','',$linha));
										$depositante = trim($linha);
										$numerocd = montar_numerocd($numero);
										$cmd2 = "select * from revistas4 where numero='$numerocd' and data='$data' and despacho='$despacho'";
										$res2 = mysqli_query($link,$cmd2);
										if (!$line2=@mysqli_fetch_assoc($res2))
										{
											if (substr($numero,0,2)<>'DI' and substr($numero,0,1)<>'3')
											{
												$depositante = addslashes($depositante);
												$cmd2 = "insert into revistas4 (numero,data,despacho,descricao,inid) values ('$numerocd','$data','$despacho','$depositante','$inid')";
												echo "$cmd2;<BR>";
												if ($gravar==1) $res2 = mysqli_query($link,$cmd2);
											}
										}
										$ler_comentario = 0;
									}

									/* if (!(strpos($linha,'(co)')===false) or !(strpos($linha,'(de)')===false) or !(strpos($linha,'(De)')===false))
									{
										if (!(strpos($linha,'(co)')===false)) $inid = 'co';
										if (!(strpos($linha,'(de)')===false)) $inid = 'de';
										if (!(strpos($linha,'(De)')===false)) $inid = 'de';
										
										$linha = trim(str_replace('(co)','',$linha));
										$linha = trim(str_replace('(de)','',$linha));
										$descricao = $linha;
										$descricao = str_replace("'","",$descricao);
										$descricao = str_replace('"',"",$descricao);
										$numerocd = montar_numerocd($numero);
										$cmd2 = "select * from revistas4 where numero='$numerocd' and data='$data' and despacho='$despacho'";
										$res2 = mysqli_query($link,$cmd2);
										if (!$line2=@mysqli_fetch_assoc($res2))
										{
											if (substr($numero,0,2)<>'DI' and substr($numero,0,1)<>'3')
											{
												$cmd2 = "insert into revistas4 (numero,data,despacho,descricao,inid) values ('$numerocd','$data','$despacho','$descricao','$inid')";
												echo "$cmd2;<BR>";
												$res2 = mysqli_query($link,$cmd2);
											}
										}
										$ler_comentario = 0;
									} */
								}
							}
						}
					}
				}
			}
			else
				echo "Arquivo $fname não encontrado<BR>";
		}
		
		echo "Fim processamento";
		exit();
	}
	
	if ($action==173) // http://localhost/teste.php?action=173
	{

		$total = 0;
		$cmd = "SELECT * FROM publicados WHERE despacho_out='PR - Recursos'";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];

			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			$numero1 = $numero;
			$numero2 = $numero;
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}

			$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and despacho='12.2' and anulado=0";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$data = $line2['data'];
				$data_decisao = detecta_final_recurso_negado($numero1,$numero2,$data,$link);
				if ($data_decisao==null)
				{
					$total++;
					$cmd2 = "update publicados set dataout=null,despacho_out='' WHERE (numero='$numero1' or numero='$numero2') and despacho_out='PR - Recursos'";
					$res2 = mysqli_query($link,$cmd2);
					echo "$cmd2;<BR>";
				}
			}
		}
		echo "Fim processamento: $total";
		exit();

	}

	if ($action==172) // http://localhost/central/control.php?action=172
	{

		$total = 0;
		$cmd = "SELECT * FROM publicados WHERE dataout is null and year(data_deposito)>=2010 and numero not in (select numero from arquivados where despacho in ('19.1','15.23') and anulado=0)";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];

			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			$numero1 = $numero;
			$numero2 = $numero;
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}

			$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and despacho='12.2' and anulado=0";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$data = $line2['data'];
				$data_decisao = detecta_final_recurso_negado($numero1,$numero2,$data,$link);
				if ($data_decisao!=null)
				{
					$total++;
					$cmd2 = "update publicados set dataout='$data_decisao',despacho_out='PR - Recursos' WHERE (numero='$numero1' or numero='$numero2') and dataout is null";
					$res2 = mysqli_query($link,$cmd2);
					echo "$cmd2;<BR>";
				}
			}
		}
		echo "Fim processamento: $total";
		exit();

	}

	if ($action==38) // http://cientistaspatentes.com.br/central/control.php?action=38
	{

		if ($op==2) // http://cientistaspatentes.com.br/central/control.php?action=38&op=2
		{
			$total=0;
			$cmd = "SELECT * FROM pedido where instancia='nulidade cgrec' and decisao='nulidade 212' and rpi<>'0000-00-00'" ;
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$data1 = $line['rpi'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}

				$cmd2 = "select * from rpis_lidas where data='$data1'";
				$res2 = mysqli_query($link,$cmd2);
				$line2=@mysqli_fetch_assoc($res2);
				$rpi = $line2['rpi'];

				$cmd2 = "select * from arquivados where despacho='17.1' and (numero='$numero1' or numero='$numero2') and data<'$data1'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$anulado = $line2['anulado'];
					$data = $line2['data'];
					if ($anulado<>$rpi)
					{
						$cmd2 = "update arquivados set anulado=$rpi where (despacho='17.1') and data='$data' and anulado=0 and (numero='$numero1' or numero='$numero2')";
						echo "$cmd2;<BR>";
						$total++;
					}
				}
			}
			echo "Fim de processamento (tabela pedido): $total<BR>";
			exit();
		}
		
		if ($op==3) // http://cientistaspatentes.com.br/central/control.php?action=38&op=3
		{
			$total=0;
			$cmd = "SELECT * FROM arquivados where despacho='17.1' and anulado=0 and year(data)>=2010" ;
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$data = $line['data'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$numerocd1	= montar_numerocd($numero1);
				$numerocd2	= montar_numerocd($numero2);

				$cmd2 = "SELECT * FROM revistas4 where (numero='$numerocd1' or numero='$numerocd2') and despacho like 'PR - Nulidade%' and data>'$data' and (inid='de' or inid='co') and (lower(descricao) like '%prejudicado%'  or lower(descricao) like '%prejudico%' or lower(descricao) like '%prejudicada%')";
				$res2 = mysqli_query($link,$cmd2);
				if (($line2=@mysqli_fetch_assoc($res2)))
				{
					$data1 = $line2['data'];
					$cmd3 = "select * from rpis_lidas where data='$data1'";
					$res3 = mysqli_query($link,$cmd3);
					$line3=@mysqli_fetch_assoc($res3);
					$rpi = $line3['rpi'];
					$cmd2 = "update arquivados set anulado=$rpi where (despacho='17.1') and anulado=0 and (numero='$numero1' or numero='$numero2') and data='$data'";
					echo "$cmd2;<BR>";
					$total++;
				}
			}
			echo "Fim de processamento (tabela revistas): $total";
			exit();
		}
		
		$total=0;
		$cmd = "SELECT * FROM pedido where instancia='recurso cgrec' and (decisao='recurso 130' or decisao='recurso 131') and rpi<>'0000-00-00'" ;
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$data1 = $line['rpi'];
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}

			$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and despacho='PR - Recursos' and data='$data1' and anulado>0" ;
			$res2 = mysqli_query($link,$cmd2); // testa se esse recurso 130 ou 131 foi anulado
			if ($line2=@mysqli_fetch_assoc($res2)) continue;

			$cmd2 = "select * from rpis_lidas where data='$data1'";
			$res2 = mysqli_query($link,$cmd2);
			$line2=@mysqli_fetch_assoc($res2);
			$rpi = $line2['rpi'];

			$encontrei=0;
			$tem_despacho_anterior = 0;
			$cmd2 = "select * from arquivados where despacho in ('PR - Recursos','12.2','12.3','12.6') and data<'$data1' and (numero='$numero1' or numero='$numero2')"; 
			$res2 = mysqli_query($link,$cmd2); // podem ter dois anteriores
			while (($line2=@mysqli_fetch_assoc($res2)))
			{
				$data = $line2['data'];
				$anulado = $line2['anulado'];
				if ($anulado==0) $tem_despacho_anterior=1;
				$despacho = $line2['despacho'];
				if ($anulado==$rpi)	$encontrei=1;
			}
			if ($encontrei==0 and $tem_despacho_anterior==1)
			{
				$cmd2 = "update arquivados set anulado=$rpi where despacho in ('PR - Recursos','12.2','12.3','12.6') and data<'$data1' and anulado=0 and (numero='$numero1' or numero='$numero2')";
				$res2 = mysqli_query($link,$cmd2);
				echo "$cmd2;<BR>";
				$total++;
			}
		}
		echo "Fim de processamento (tabela pedido): $total<BR>";

		$total=0;
		$cmd = "SELECT * FROM arquivados where despacho in ('12.2','12.3','12.6') and anulado=0 and year(data)>=2010" ;
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$data = $line['data'];
			$despacho = $line['despacho'];
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}
			$numerocd1	= montar_numerocd($numero1);
			$numerocd2	= montar_numerocd($numero2);

			$cmd2 = "SELECT * FROM revistas4 where (numero='$numerocd1' or numero='$numerocd2') and despacho like 'PR - Recursos%' and data>'$data' and (inid='de' or inid='co') and (descricao like '%rejudicado%'  or descricao like '%rejudico%' or descricao like '%rejudicada%' or descricao like '%[130]%' or descricao like '%[131]%')";
			$res2 = mysqli_query($link,$cmd2);
			if (($line2=@mysqli_fetch_assoc($res2)))
			{
				$data1 = $line2['data'];
				$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and despacho='PR - Recursos' and anulado=0 and data='$data1'";
				$res2 = mysqli_query($link,$cmd2);
				if (($line2=@mysqli_fetch_assoc($res2)))
				{
					$cmd3 = "select * from rpis_lidas where data='$data1'";
					$res3 = mysqli_query($link,$cmd3);
					$line3=@mysqli_fetch_assoc($res3);
					$rpi = $line3['rpi'];
					$cmd2 = "update arquivados set anulado=$rpi where despacho in ('12.2','12.3','12.6') and anulado=0 and (numero='$numero1' or numero='$numero2') and data='$data'";
					$res2 = mysqli_query($link,$cmd2);
					echo "$cmd2;<BR>";
					$total++;
				}
			}
		}
		echo "Fim de processamento: $total<BR>";
		exit();



		$total=0;
		$cmd = "SELECT * FROM arquivados where despacho='12.2' and year(data)<=2010 and anulado=0 order by data desc";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$data = $line['data'];
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}
			$numerocd1	= montar_numerocd($numero1);
			$numerocd2	= montar_numerocd($numero2);

			$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('7.4','7.6','9.1','9.2','16.1','100','111','130','15.23') and anulado=0 and data>'$data'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) continue;

			$cmd2 = "SELECT * FROM revistas where (numero='$numerocd1' or numero='$numerocd2') and despacho like 'PR - Recursos%' and data>'$data' and (inid='de' or inid='co') and (descricao like '%Recurso conhecido e provido%' or descricao like '%Reformada a decisão%' or descricao like '%Recurso conhecido e negado%' or descricao like '%Negado provimento%' or descricao like '%Mantido o indeferimento%'  or descricao like '%Prejudicado%'  or descricao like '%Prejudico%' or descricao like '%Prejudicada%')";
			$res2 = mysqli_query($link,$cmd2);
			if (!($line2=@mysqli_fetch_assoc($res2)))
			{
				$cmd2 = "SELECT * FROM revistas where (numero='$numerocd1' or numero='$numerocd2') and despacho like 'PR - Recursos%' and data>'$data'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
					echo "em andamento: $numero $data<BR>";
				else
					echo "pendente: $numero $data<BR>";

				$total++;
			}
		}
		echo "Fim de processamento: $total";
		exit();
	}

	if ($action==40) /// http://localhost/teste.php?action=40
	{
	/*
	atualize primeiro a tabela despachos_pag com http://localhost/teste.php?action=80
	203 - pedido de exame de invenção
	204 - pedido de Exame de Modelo de utilidade
	205 - pedido de exame de certificado de adição de invenção
	284 - Pedido de exame de invenção via PCT para pedidos já examinados pelo INPI como ISA/IPEA
	285 - Pedido de exame de modelo de utilidade via PCT para pedidos já examinados pelo INPI como ISA/IPEA
	SELECT numero,data_peticao,tipo_peticao FROM despachos_pag where tipo_peticao in ('200','203','204','205','284','285','848') and year(data_peticao)>2019
	*/

		$cmd = "update publicados set pedexame=null WHERE pedexame='0000-00-00'";
		$res = mysqli_query($link,$cmd);

		if ($op==1)
		{
			$cmd = "SELECT * FROM publicados WHERE data_nacional IS NULL AND pedexame IS NOT NULL";  // tem 1.1 que ja tem deposito fase nacional
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$total++;
				$numero = $line['numero'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "SELECT * FROM despachos_pag WHERE (numero='$numero1' or numero='$numero2') and tipo_peticao='200'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$data_peticao = $line2['data_peticao'];
					$cmd2 = "update publicados set data_nacional='$data_peticao' WHERE numero='$numero' and data_nacional IS NULL AND pedexame IS NOT NULL";
					$res2 = mysqli_query($link,$cmd2);
					echo "$cmd2;<BR>";
				}
			}
			echo "Fim processamento dos updates de pedexame<BR>";
			exit();
		}

		if ($op==2)
		{
			$total=0;
			$cmd = "SELECT * FROM publicados where pedexame is null and year(data_deposito)=$ano";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$total++;
				$numero = $line['numero']; // $numero='PI0610529';
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "select * from despachos_pag where (numero='$numero1' or numero='$numero2') and tipo_peticao in ('203','204','205','284','285')";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$data_peticao = $line2['data_peticao'];
					$cmd2 = "update publicados set pedexame='$data_peticao' where numero='$numero' and pedexame is null";
					$res2 = mysqli_query($link,$cmd2);
					echo "$cmd2;<BR>";
				}
				// exit();
			}
			echo "Fim de processamento: $total";
			exit();
		}
	}

	if ($action==81)
	{
		if ($op==1)
		{
			$cmd = "SELECT * FROM publicados WHERE despacho='200'";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "SELECT * FROM arquivados WHERE (numero='$numero1' or numero='$numero2') and despacho in ('1.1','1.3','2.4','3.1','3.2','3.5','3.6','4.1','23.1','23.1.1','23.3') and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero = $line2['numero'];
					$despacho = $line2['despacho'];
					$data = $line2['data'];
					$cmd2 = "update publicados set despacho='$despacho', data='$data' where despacho='200' and (numero='$numero1' or numero='$numero2')";
					$res2 = mysqli_query($link,$cmd2);
					echo "$cmd2;<BR>";//exit();
				}
			}
			echo "Fim de processamento<BR>";
			exit();
		}
	}
	
	if ($action==93)
	{
		$total=0;
		$cmd = "select * from publicados where despacho='1.3' and data_nacional is null";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}
			
			$cmd2="SELECT * FROM despachos_pag WHERE (numero='$numero1' or numero='$numero2') and (tipo_peticao='848' or tipo_peticao='200')";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$data_nacional = $line2['data_peticao'];
				$cmd2 = "update publicados set data_nacional='$data_nacional' where numero='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				echo "$cmd2;<BR>";
			}
			$total++;
		}
		echo "Fim de processamento: $total";
		exit();
	}
	
	if ($action==1117)
	{
		
		if ($op==1)
		{
			echo "Iniciando processamento...<BR>";
			$cmd = "select * from subjudice_back"; // tabela lida a partir do CSV do SISCAP
			$res = mysqli_query($link,$cmd);
			while (($line=@mysqli_fetch_assoc($res)))
			{
				$numero = trim($line['numero']);
				$despacho = trim($line['despacho']);
				$data = $line['data'];
				if ($numero=='NUMERO') continue;
				if ($despacho=='(null)') continue;
				$cmd2 = "select * from subjudice where numero='$numero' and despacho='$despacho' and data='$data'";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) 
				{
					$cmd2 = "insert into subjudice (numero,despacho,titulo,descricao,data) values ('$numero','$despacho','','','$data')";
					echo "$cmd2;<BR>";
					$total++;
					if ($gravar==1) $res2 = mysqli_query($link,$cmd2);
				}
			}
			if ($total>0)
				echo "Há $total elementos da tabela do SISCAP que não constam da tabela no Hostgator <BR>";
			else
				echo "Todos os elementos da tabela do SISCAP já foram carregados na tabela do HostGator<BR>";
			exit();
		}
		
		if ($op==2)
		{
			$cmd = "select * from subjudice";
			$res = mysqli_query($link,$cmd);
			while (($line=@mysqli_fetch_assoc($res)))
			{
				$numero = trim($line['numero']);
				$despacho = trim($line['despacho']);
				$data = $line['data'];
				$cmd2 = "select * from subjudice_back where numero='$numero' and despacho='$despacho' and data='$data'";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) 
				{
					$cmd2 = "delete from subjudice where numero='$numero' and despacho='$despacho' and data='$data'";
					echo "$cmd2;<BR>";
					$total++;
				}
			}
			if ($total>0)
				echo "Há $total elementos da tabela do HostGator que não constam da tabela no SISCAP <BR>";
			else
				echo "Todos os elementos da tabela do HostGator constam na tabela do SISCAP<BR>";
			exit();
		}

		if ($op==3)
		{
			$fname="subjudice.csv"; // select * from CEPIT_siscap.SISCAP_SUNJUDICE
			@ $fp = fopen($fname,"r"); 
			if (!$fp)
				echo "Não foi identificado o arquivo texto $fname";
			else
			{
				$total_geral = 0;
				$total = 0;
				while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
				{
					$total_geral++;
					$texto= fgets($fp);
					if ($texto=='') continue;
					$texto = trim($texto);
					$texto = str_replace('"','',$texto); 
					$texto = str_replace(';',',',$texto);
					// MU7200219   ;19.1 ;2001-07-10 00:00:00
					list($numero,$despacho,$data) = explode(',',$texto);
					$numero = trim($numero);
					$despacho = trim ($despacho);
					if ($numero=='NUMERO') continue;
					if ($numero=='') continue;
					$numero = montar_numerosd(trim($numero));
					if ($data=='(null)') $data = null;
					$cmd2 = "SELECT * FROM subjudice WHERE numero='$numero' and despacho='$despacho' and data='$data'";
					$res2 = mysqli_query($link,$cmd2);
					if (!($line2=@mysqli_fetch_assoc($res2)))
					{
						$cmd2 = "insert into subjudice (numero,despacho,titulo,descricao,data) values ('$numero','$despacho','','','$data')";
						echo "$cmd2;<BR>";
						$total++;
						if ($gravar==1) $res2 = mysqli_query($link,$cmd2);
					}
				}
			}
			echo "Fim processamento: $total_geral - $total<BR>";
			exit();
		}
		echo "Encerrando processamento";
		exit();
	}

	if ($action==1116)
	{
		
		if ($op==1)
		{
			echo "Iniciando processamento...<BR>";
			$cmd = "select * from prioritarios_back"; // tabela lida a partir do CSV do SISCAP
			$res = mysqli_query($link,$cmd);
			while (($line=@mysqli_fetch_assoc($res)))
			{
				$numero = trim($line['numero']);
				$despacho = trim($line['despacho']);
				$data = $line['data'];
				$divisao = trim($line['divisao']);
				$data_peticao = $line['data_peticao'];
				if ($numero=='NUMERO') continue;
				if ($despacho=='(null)') continue;
				$cmd2 = "select * from prioritarios where numero='$numero' and despacho='$despacho' and data='$data'";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) 
				{
					$cmd2 = "insert into prioritarios (numero,data,divisao,despacho,data_peticao) values ('$numero','$data','$divisao','$despacho','$data_peticao')";
					echo "$cmd2;<BR>";
					$total++;
					if ($gravar==1) $res2 = mysqli_query($link,$cmd2);
				}
			}
			if ($total>0)
				echo "Há $total elementos da tabela do SISCAP que não constam da tabela no Hostgator <BR>";
			else
				echo "Todos os elementos da tabela do SISCAP já foram carregados na tabela do HostGator<BR>";
			exit();
		}
		
		if ($op==2)
		{
			$cmd = "select * from prioritarios";
			$res = mysqli_query($link,$cmd);
			while (($line=@mysqli_fetch_assoc($res)))
			{
				$numero = trim($line['numero']);
				$despacho = trim($line['despacho']);
				$data = $line['data'];
				$divisao = trim($line['divisao']);
				$data_peticao = $line['data_peticao'];
				$cmd2 = "select * from prioritarios_back where numero='$numero' and despacho='$despacho' and data='$data'";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) 
				{
					$cmd2 = "delete from prioritarios where numero='$numero' and despacho='$despacho' and data='$data'";
					echo "$cmd2;<BR>";
					$total++;
				}
			}
			if ($total>0)
				echo "Há $total elementos da tabela do HostGator que não constam da tabela no SISCAP <BR>";
			else
				echo "Todos os elementos da tabela do HostGator constam na tabela do SISCAP<BR>";
			exit();
		}

		if ($op==3)
		{
			$fname="prioritarios.csv"; // select * from CEPIT_siscap.SISCAP_PRIORITARIOS
			@ $fp = fopen($fname,"r"); 
			if (!$fp)
				echo "Não foi identificado o arquivo texto $fname";
			else
			{
				$total_geral = 0;
				$total = 0;
				while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
				{
					$total_geral++;
					$texto= fgets($fp);
					if ($texto=='') continue;
					$texto = trim($texto);
					$texto = str_replace('"','',$texto); 
					$texto = str_replace(';',',',$texto);
					// 102013019619   ;2017-04-11 00:00:00;dimat          ;15.24.3        ;2015-11-26 00:00:00
					list($numero,$data,$divisao,$despacho,$data_peticao) = explode(',',$texto);
					$numero = trim($numero);
					$despacho = trim ($despacho);
					$divisao = trim($divisao);
					if ($numero=='NUMERO') continue;
					if ($numero=='') continue;
					$numero = montar_numerosd(trim($numero));
					if ($data=='(null)') $data = null;
					$cmd2 = "SELECT * FROM prioritarios WHERE numero='$numero' and despacho='$despacho' and data='$data'";
					$res2 = mysqli_query($link,$cmd2);
					if (!($line2=@mysqli_fetch_assoc($res2)))
					{
						$cmd2 = "insert into prioritarios (numero,data,divisao,despacho,data_peticao) values ('$numero','$data','$divisao','$despacho','$data_peticao')";
						echo "$cmd2;<BR>";
						$total++;
						if ($gravar==1) $res2 = mysqli_query($link,$cmd2);
					}
				}
			}
			echo "Fim processamento: $total_geral - $total<BR>";
			exit();
		}
		echo "Encerrando processamento";
		exit();
	}

	if ($action==1115)
	{
		$cmd = "select * from arquivados_back where data<>'0000-00-00' order by data desc"; // tabela lida a partri do CSV do SISCAP
		$res = mysqli_query($link,$cmd);
		if (($line=@mysqli_fetch_assoc($res))) $data_fim = $line['data'];
			
		$cmd = "select * from arquivados_back where data<>'0000-00-00' order by data asc"; // tabela lida a partri do CSV do SISCAP
		$res = mysqli_query($link,$cmd);
		if (($line=@mysqli_fetch_assoc($res))) $data_inicio = $line['data'];
		
		if ($op==1)
		{
			echo "Iniciando processamento...<BR>";
			$cmd = "select * from arquivados_back"; // tabela lida a partir do CSV do SISCAP
			$res = mysqli_query($link,$cmd);
			while (($line=@mysqli_fetch_assoc($res)))
			{
				$numero = trim($line['numero']);
				$despacho = trim($line['despacho']);
				$data = $line['data'];
				$divisao = trim($line['divisao']);
				$anulado = $line['anulado'];
				$prmexame = 0;
				if ($numero=='NUMERO') continue;
				$cmd2 = "select * from arquivados where numero='$numero' and despacho='$despacho' and data='$data'";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) 
				{
					$cmd2 = "insert into arquivados (id,despacho,numero,data,divisao,anulado,prmexame) values (null,'$despacho','$numero','$data','$divisao',$anulado,$prmexame)";
					echo "$cmd2;<BR>";
					$total++;
					if ($gravar==1) $res2 = mysqli_query($link,$cmd2);
				}
			}
			if ($total>0)
				echo "Há $total elementos da tabela do SISCAP que não constam da tabela no Hostgator <BR>";
			else
				echo "Todos os elementos da tabela do SISCAP já foram carregados na tabela do HostGator<BR>";
			exit();
		}
		
		if ($op==2)
		{
			$cmd = "select * from arquivados where data>='$data_inicio' and data<='$data_fim'";
			$res = mysqli_query($link,$cmd);
			while (($line=@mysqli_fetch_assoc($res)))
			{
				$numero = $line['numero'];
				$despacho = $line['despacho'];
				$data = $line['data'];
				$divisao = $line['divisao'];
				$cmd2 = "select * from arquivados_back where numero='$numero' and despacho='$despacho' and data='$data'";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) 
				{
					$cmd2 = "delete from arquivados where numero='$numero' and despacho='$despacho' and data='$data'";
					echo "$cmd2;<BR>";
					$total++;
				}
			}
			if ($total>0)
				echo "Há $total elementos da tabela do HostGator que não constam da tabela no SISCAP <BR>";
			else
				echo "Todos os elementos da tabela do HostGator constam na tabela do SISCAP<BR>";
			exit();
		}

		if ($op==3)
		{
			$fname="arquivados.csv"; // select * from CEPIT_siscap.SISCAP_ARQUIVADOS
			@ $fp = fopen($fname,"r"); 
			if (!$fp)
				echo "Não foi identificado o arquivo texto $fname";
			else
			{
				$total_geral = 0;
				$total = 0;
				while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
				{
					$total_geral++;
					$texto= fgets($fp);
					if ($texto=='') continue;
					$texto = trim($texto);
					$texto = str_replace('"','',$texto); 
					$texto = str_replace(';',',',$texto);
					// 12.2                          ;202014033089   ;2021-02-09 00:00:00;dimut      ;0
					list($numero,$despacho,$data,$divisao,$anulado) = explode(',',$texto);
					$numero = trim($numero);
					$despacho = trim ($despacho);
					$divisao = trim($divisao);
					if ($numero=='NUMERO') continue;
					$numero = montar_numerosd(trim($numero));
					if ($numero=='') continue;
					if ($data=='(null)') $data = null;
					$cmd2 = "SELECT * FROM arquivados WHERE numero='$numero' and despacho='$despacho' and data='$data'";
					$res2 = mysqli_query($link,$cmd2);
					if (!($line2=@mysqli_fetch_assoc($res2)))
					{
						$cmd2 = "insert into arquivados (id,despacho,numero,data,divisao,anulado,prmexame) values (null,'$despacho','$numero','$data','$divisao',$anulado,$prmexame)";
						echo "$cmd2;<BR>";
						$total++;
						if ($gravar==1) $res2 = mysqli_query($link,$cmd2);
					}
				}
			}
			echo "Fim processamento: $total_geral - $total<BR>";
			exit();
		}
		echo "Encerrando processamento";
		exit();
	}

	if ($action==1114)
	{
		$cmd = "select * from pimupi_back where data<>'0000-00-00' order by data desc"; // tabela lida a partri do CSV do SISCAP
		$res = mysqli_query($link,$cmd);
		if (($line=@mysqli_fetch_assoc($res))) $data_fim = $line['data'];
			
		$cmd = "select * from pimupi_back where data<>'0000-00-00' order by data asc"; // tabela lida a partri do CSV do SISCAP
		$res = mysqli_query($link,$cmd);
		if (($line=@mysqli_fetch_assoc($res))) $data_inicio = $line['data'];

		$cmd = "select * from pimupi_back"; // tabela lida a partri do CSV do SISCAP
		$res = mysqli_query($link,$cmd);
		while (($line=@mysqli_fetch_assoc($res)))
		{
			$numero1 = $line['numero1'];
			$numero2 = $line['numero2'];
			$data = $line['data'];
			if ($numero1=='NUMERO1') continue;
			if ($numero1==$numero2) continue;
			$cmd2 = "select * from pimupi where numero1='$numero1' and numero2='$numero2'";
			$res2 = mysqli_query($link,$cmd2);
			if (!($line2=@mysqli_fetch_assoc($res2))) 
			{
				echo "$numero1 $numero2 $data<BR>";
				$total++;
			}
		}
		if ($total>0)
			echo "Há $total elementos da tabela do SISCAP que não constam da tabela no Hostgator <BR>";
		else
			echo "Todos os elementos da tabela do SISCAP já foram carregados na tabela do HostGator<BR>";

		$cmd = "select * from pimupi";
		$res = mysqli_query($link,$cmd);
		while (($line=@mysqli_fetch_assoc($res)))
		{
			$numero1 = $line['numero1'];
			$numero2 = $line['numero2'];
			if (substr($numero1,0,2)=='MI' or substr($numero1,0,2)=='DI' or substr($numero2,0,2)=='MI' or substr($numero2,0,2)=='DI') continue;
			$data = $line['data'];
			if ($data<$data_inicio or $data>$data_fim) continue; // a tabela do SISCAP resgata apenas registros mais recentes
			if ($numero1=='NUMERO1') continue;
			if ($numero1==$numero2) continue;
			$cmd2 = "select * from pimupi_back where numero1='$numero1' and numero2='$numero2'";
			$res2 = mysqli_query($link,$cmd2);
			if (!($line2=@mysqli_fetch_assoc($res2))) 
			{
				echo "$numero1 $numero2 $data<BR>";
				$total++;
			}
		}
		if ($total>0)
			echo "Há $total elementos da tabela do HostGator que não constam da tabela no SISCAP <BR>";
		else
			echo "Todos os elementos da tabela do HostGator constam na tabela do SISCAP<BR>";
		
		$fname="pimupi.csv"; // select * from CEPIT_siscap.SISCAP_PIMUPI
		@ $fp = fopen($fname,"r"); 
		if (!$fp)
			echo "Não foi identificado o arquivo texto $fname";
		else
		{
			$total_geral = 0;
			$total = 0;
			while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
			{
				$total_geral++;
				$texto= fgets($fp);
				if ($texto=='') continue;
				$texto = trim($texto);
				$texto = str_replace('"','',$texto); 
				$texto = str_replace(';',',',$texto);
				// 102019002443;202019002443;2019-04-02 00:00:00
				list($numero1,$numero2,$data) = explode(',',$texto);
				if ($numero1=='NUMERO1') continue;
				$numero1 = montar_numerosd(trim($numero1));
				$numero2 = montar_numerosd(trim($numero2));
				if ($numero1=='' or $numero2=='' or $numero1==$numero2) continue;
				if ($data=='(null)') $data = null;
				$cmd2 = "SELECT * FROM pimupi WHERE numero1='$numero1' and numero2='$numero2'";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2)))
				{
					$cmd2 = "insert into pimupi (numero1,numero2,data) values ('$numero1','$numero2','$data')";
					echo "$cmd2;<BR>";
					$total++;
					if ($gravar==1) $res2 = mysqli_query($link,$cmd2);
				}
			}
		}
		echo "Fim processamento: $total_geral - $total<BR>";
		exit();
	}

	if ($action==1113)
	{
		$cmd = "select * from divididos_back";
		$res = mysqli_query($link,$cmd);
		while (($line=@mysqli_fetch_assoc($res)))
		{
			$principal = $line['principal'];
			$dividido = $line['dividido'];
			$data = $line['data'];
			if ($principal=='PRINCIPAL') continue;
			$cmd2 = "select * from divididos where principal='$principal' and dividido='$dividido'";
			$res2 = mysqli_query($link,$cmd2);
			if (!($line2=@mysqli_fetch_assoc($res2))) 
			{
				echo "$principal $dividido $data<BR>";
				$total++;
			}
		}
		if ($total>0)
			echo "Há $total elementos da tabela do SISCAP que não constam da tabela no Hostgator <BR>";
		else
			echo "Todos os elementos da tabela do SISCAP já foram carregados na tabela do HostGator<BR>";

		$cmd = "select * from divididos";
		$res = mysqli_query($link,$cmd);
		while (($line=@mysqli_fetch_assoc($res)))
		{
			$principal = $line['principal'];
			$dividido = $line['dividido'];
			$data = $line['data'];
			if ($principal=='PRINCIPAL') continue;
			$cmd2 = "select * from divididos_back where principal='$principal' and dividido='$dividido'";
			$res2 = mysqli_query($link,$cmd2);
			if (!($line2=@mysqli_fetch_assoc($res2))) 
			{
				echo "$principal $dividido $data<BR>";
				$total++;
			}
		}
		if ($total>0)
			echo "Há $total elementos da tabela do HostGator que não constam da tabela no SISCAP <BR>";
		else
			echo "Todos os elementos da tabela do HostGator constam na tabela do SISCAP<BR>";
		
		$fname="divididos.csv"; // select * from CEPIT_siscap.SISCAP_DIVIDIDOS
		@ $fp = fopen($fname,"r"); 
		if (!$fp)
			echo "Não foi identificado o arquivo texto $fname";
		else
		{
			$total_geral = 0;
			$total = 0;
			while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
			{
				$total_geral++;
				$texto= fgets($fp);
				if ($texto=='') continue;
				$texto = trim($texto);
				$texto = str_replace('"','',$texto); 
				$texto = str_replace(';',',',$texto);
				// PI9610510      ;PI9612907      ;(null)
				list($principal,$dividido,$data) = explode(',',$texto);
				if ($principal=='PRINCIPAL') continue;
				$principal = montar_numerosd(trim($principal));
				$dividido = montar_numerosd(trim($dividido));
				if ($principal=='' or $dividido=='' or $principal==$dividido) continue;
				if ($data=='(null)') $data = null;
				$cmd2 = "SELECT * FROM divididos WHERE principal='$principal' and dividido='$dividido'";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2)))
				{
					$cmd2 = "insert into divididos (principal,dividido,data) values ('$principal','$dividido','$data')";
					echo "$cmd2;<BR>";
					$total++;
					$res2 = mysqli_query($link,$cmd2);
				}
			}
		}
		echo "Fim processamento: $total_geral - $total<BR>";
		exit();
	}

	if ($action==1145)
	{

//  SELECT numero,data_peticao,tipo_peticao FROM CEPIT_SISCAP.SISCAP_DESPACHOS_PAG where tipo_peticao in ('220','221','222','223','224','225','226','227','228','229','230','231','232','233','234','235','236','237','238','239','240','241','242','243','244','245','246','247')
// 	delete FROM `despachos_pag_anuidades` WHERE tipo_peticao<220 or tipo_peticao>247
//  delete FROM `despachos_pag_anuidades` where data_peticao='0000-00-00'

		@ $fpw = fopen("resultados_1.sql","w");
		$fname="pag_anuidades.csv"; 
		echo "$fname<BR>";
		@ $fp = fopen($fname,"r"); 
		if (!$fp)
			echo "Não foi identificado o arquivo texto $fname";
		else
		{
			$total = 0;$comando='';$bloco=0;
			while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
			{
				$numnossonumero='';
				$texto= fgets($fp);
				if ($texto=='') continue;
				$texto = trim($texto);
				$texto = str_replace('"','',$texto); 
				//$texto = str_replace(';',',',$texto);
				// "PI9004596           ";"04/11/04                                          ";"226        "
				// "122021026169";"29/12/21 00:00:00,000000000";"220"
				list($numero,$peticao,$protocolo,$data_peticao,$tipo_peticao) = explode(';',$texto);
				if ($numero=='NUMERO') continue;
				$numero = montar_numerosd(trim($numero));
				$data_peticao = trim($data_peticao);
				$tipo_peticao = trim($tipo_peticao);
				if ($numero=='') continue;
				if ($data_peticao=='(null)')
					$data_peticao = null;
				else
				{
					$dia = substr($data_peticao,0,2);
					$mes = substr($data_peticao,3,2);
					$ano = (int)substr($data_peticao,6,2);
					if ($ano<=50) 
						$ano = $ano + 2000;
					else	
						$ano = $ano + 1900;
					$data_peticao = "$ano-$mes-$dia";
				}
				$cmd2 = "SELECT * FROM despachos_pag_anuidades WHERE numero='$numero' and tipo_peticao='$tipo_peticao' and data_peticao='$data_peticao'";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2)))
				{
					$total++;
					if ($total==1)
					{
						$comando = "insert into despachos_pag_anuidades (numero,data_peticao,tipo_peticao) values ('$numero','$data_peticao','$tipo_peticao')";
						//echo $texto;
						//exit();
					}
					else
					{
						if ($total<500)
							$comando = $comando.",('$numero','$data_peticao','$tipo_peticao')";
						else
						{
							//echo "$comando;<BR>"; // se jogar para tela trava se arquivo for grande
							$aux = "$comando;";
							fputs($fpw,$aux."\n");
							$bloco++;
							echo "$bloco<BR>";							
							$res2 = mysqli_query($link,$comando);
							$comando = '';
							$total = 0;
						}
					}
				}
			}
		}
		fclose($fp);
		fclose($fpw);
		if ($comando<>'')
		{
			echo "$comando;<BR>";
			$res2 = mysqli_query($link,$comando);
		}
		echo "Fim processamento: <a href='resultados_1.csv' target='_blank'>$total</a><BR>";
		exit();
	}
	
	
	if ($action==1112)
	{
// SELECT numero,peticao,numnossonumero,data_peticao,tipo_peticao,flag_pedexame,flag_imagem,cd_imagem,update_imagem,conciliado FROM despachos_pag where tipo_peticao in ('200','203','204','205','214','215','284','285','848') and year(data_peticao)>2019
// SELECT numero,peticao,numnossonumero,data_peticao,tipo_peticao,flag_pedexame,flag_imagem,cd_imagem,update_imagem,conciliado FROM CEPIT_SISCAP.SISCAP_DESPACHOS_PAG where tipo_peticao in ('200','203','204','205','214','215','284','285','848') 

		$fname="pag.csv"; 
		echo "$fname<BR>";
		@ $fp = fopen($fname,"r"); 
		if (!$fp)
			echo "Não foi identificado o arquivo texto $fname";
		else
		{
			$total = 0;
			while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
			{
				$numnossonumero='';
				$texto= fgets($fp);
				if ($texto=='') continue;
				$texto = trim($texto);
				$texto = str_replace('"','',$texto); 
				$texto = str_replace(';',',',$texto);
				$texto = str_replace('00:00:00,000000000','',$texto);
				// C10205861 ,DEPR 015050001351 ,0000220400282302 ,06/10/05 ,200 ,1,0,7366371,2020-07-25 21:11:58,1
				//echo "$texto<BR>";
				// "102024002304";"WBRJ 870240009786";"29409161944257747";"05/02/24 00:00:00,000000000";"200";1;0;(null);(null);1
				list($numero,$peticao,$numnossonumero,$data_peticao,$tipo_peticao,$flag_pedexame,$flag_imagem,$cd_imagem,$update_imagem,$conciliado) = explode(',',$texto);
				$numero = montar_numerosd(trim($numero));
				//echo "$numero,$peticao,$numnossonumero,$data_peticao,$tipo_peticao<BR>";
				if ($numero=='' or $numnossonumero=='') continue;
				if ($data_peticao=='(null)')
					$data_peticao = null;
				else
				{
					$dia = substr($data_peticao,0,2);
					$mes = substr($data_peticao,3,2);
					$ano = (int)substr($data_peticao,6,2);
					if ($ano<=50) 
						$ano = $ano + 2000;
					else	
						$ano = $ano + 1900;
					$data_peticao = "$ano-$mes-$dia";
				}
				// $cmd2 = "SELECT * FROM despachos_pag WHERE numnossonumero='$numnossonumero'";
				$cmd2 = "SELECT * FROM despachos_pag WHERE numero='$numero' and tipo_peticao='$tipo_peticao' and data_peticao='$data_peticao'";
				//echo "$cmd2<BR>";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2)))
				{
					$cmd2 = "insert into despachos_pag (numero,peticao,numnossonumero,data_peticao,tipo_peticao,flag_pedexame,flag_imagem,cd_imagem,update_imagem,conciliado) values ('$numero','$peticao','$numnossonumero','$data_peticao','$tipo_peticao','$flag_pedexame','$flag_imagem','$cd_imagem','$update_imagem','$conciliado')";
					echo "$cmd2;<BR>";
					$total++;
					$res2 = mysqli_query($link,$cmd2);
				}
			}
		}
		echo "Fim processamento: $total<BR>";
		exit();
	}
	
	
	if ($action==1011) // http://localhost/central/control.php?action=1011 http://cientistaspatentes.com.br/central/control.php?action=1011
	{
		$total = 0;
		$numero_lidos = array();
		// SELECT divisao,count(*) FROM `consulta_comment` WHERE year(data)=2021 group by divisao order by count(*) desc
		// SELECT email,count(*) FROM `consulta_comment` WHERE year(data)=2021 group by email order by count(*) desc
		$total = 0;
		$casos_lidos = array();
		$cmd = "SELECT * FROM `consulta_comment` WHERE year(data)>=2023 and data>='2023-08-15'";
		echo "$cmd<BR>";
		$pano = substr($ano,2,2);
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$divisao = $line['divisao'];
			if ($divisao=='corep' or $divisao=='direp' or $divisao=='cgrec') $divisao='';
			$divisao = strtoupper($divisao);
			$caso = '';$data=null;$rpi=0;
			$cmd2 = "SELECT * FROM consulta_conversao WHERE numero='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) 
			{
				$icaso = $line2['caso'];
				$caso = "TBR$icaso/$pano";
				$data = $line2['data']; // 2021-12-31
				$cmd2 = "SELECT * FROM rpis_lidas WHERE data='$data'"; 
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) $rpi = $line2['rpi'];
				if ($data=='2021-11-23') $rpi = 2655;
				if ($data=='2021-12-21') $rpi = 2659;
				$data = substr($data,8,2)."/".substr($data,5,2)."/".substr($data,0,4);
			}
			if (in_array($caso,$casos_lidos)) continue;
			$casos_lidos[$total] = $caso;
			$total++;
			
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}
			
			$classificacao='';
			$cmd2 = "SELECT * FROM classes where numero='$numero1' or numero='$numero2'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$classificacao = $line2['descricao'];
				$symbol = ler_symbol($classificacao);
                $pos = strpos($classificacao,",");
                if ($pos !== false) $classificacao = substr($classificacao,0,$pos);
			}
									
			$str[$icaso] = "$caso;$numero;$divisao;$rpi;$data;$classificacao<BR>";
		}
		ksort($str); // ordene pela chave
		foreach($str as $key=>$value) echo "$value";
		echo "Fim processamento: $total";
		exit(); 


		$cmd = "SELECT * FROM `consulta_comment` WHERE year(data)=2021";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			if (in_array($numero,$numero_lidos)) continue;
			$numero_lidos[$total]=$numero;
			$total++;
			$divisao = trim($line['divisao']);
			if ($divisao=='' or $divisao=='direp') $divisao='corep';
			$divisao = $divisao_complemento[$divisao];
			$email = $line['email'];

			$caso = '';$data=null;$rpi=0;
			$cmd2 = "SELECT * FROM consulta_conversao WHERE numero='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) 
			{
				$icaso = $line2['caso'];
				$caso = "TBR$icaso/21";
				$data = $line2['data']; // 2021-12-31
				$cmd2 = "SELECT * FROM rpis_lidas WHERE data='$data'"; 
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) $rpi = $line2['rpi'];
				if ($data=='2021-11-23') $rpi = 2655;
				if ($data=='2021-12-21') $rpi = 2659;
				$data = substr($data,8,2)."/".substr($data,5,2)."/".substr($data,0,4);
				echo "$numero $caso $divisao $email $data (RPI$rpi)<BR>";
			}
		}
		echo "Fim processamento: $total<BR>";
		exit();
		
		$numero = '102012006063'; // C07K 16/30 (2006.01), C07K 16/40 (2006.01), A61K 39/395 (2006.01), A61P 35/00 (2006.01)
		$cmd2 = "SELECT * FROM classes where numero='$numero'";
		$res2 = mysqli_query($link,$cmd2);
		if ($line2=@mysqli_fetch_assoc($res2))
		{
			$classificacao = $line2['descricao'];
			$symbol = ler_symbol($classificacao);
			$pos = strpos($classificacao,",");
			if ($pos !== false) $classificacao = substr($classificacao,0,$pos);
		}
		echo "$numero $symbol<BR>";
		echo ler_symbol_chave($classificacao,$complemento_divisao,$link);
		exit();

	}

	
	if ($action==1010) // http://localhost/central/control.php?action=1010&op=1 http://cientistaspatentes.com.br/central/control.php?action=1010&op=4
	{
		if ($op==5)
		{
			// SELECT email,count(*) FROM `consulta_comment` WHERE year(data)=2023 and data>='2023-08-15' group by email order by count(*) desc;
			$count = array();
			$fname="casealaw2023b.txt";  // TBR152/23 (102017016344) Nesta fase
			@ $fp = fopen($fname,"r"); 
			if (!$fp)
				echo "Não foi identificado o arquivo texto $fname<BR>";
			else
			{
				$total = 0;$total_existente = 0;
				while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
				{
					$texto= fgets($fp);
					$texto = trim(str_replace('"','',$texto));
					$texto = trim(str_replace('(','',$texto));
					$texto = trim(str_replace(')','',$texto));
									
					if (substr($texto,0,1)=='#') continue; // linha de comentário, pule para próxima
					list($caso,$numero) = explode(' ',$texto);
					$count[$numero]++;
				}
				foreach ($count as $numero=>$value)
				{
					$contagem = 0;
					$cmd = "SELECT count(*) as x FROM consulta_comment WHERE year(data)=2023 and data>='2023-08-15' and numero='$numero'";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res)) $contagem = $line['x'];
					if ($contagem<>$value)
					{
						echo "$numero $value $contagem<BR>";
					}
				}
			}
			echo "Fim processamento";
			exit();
		}
		
		if ($op==4)
		{
			$fname="casealaw2023c.txt";  // abrantes PI0716524
			@ $fp = fopen($fname,"r"); 
			if (!$fp)
				echo "Não foi identificado o arquivo texto $fname<BR>";
			else
			{
				$total = 0;$total_existente = 0;
				while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
				{
					$texto= fgets($fp);
					$texto = trim(str_replace('"','',$texto));
									
					if (substr($texto,0,1)=='#') continue; // linha de comentário, pule para próxima
					list($email,$numero) = explode(' ',$texto);
					$cmd = "SELECT * FROM consulta_comment WHERE year(data)=2023 and data>='2023-08-15' and numero='$numero'";
					//echo "$cmd<BR>";
					$res = mysqli_query($link,$cmd);
					while ($line=@mysqli_fetch_assoc($res))
					{
						$email_lido = $line['email'];
						if ($email_lido <> $email) echo "$numero $email $email_lido<BR>";
						// echo "$numero $email $email_lido<BR>";
					}
				}
			}
			echo "Fim processamento";
			exit();
		}
		
		if ($op==2) // confere redundâncias na tabela consulta_conversao 
		{
			$cmd = "SELECT * FROM `consulta_conversao` WHERE year(data)=2023 and data>='2023-08-15' group by caso having count(*)>1";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$caso = $line['caso'];
				$cmd2 = "SELECT * FROM `consulta_conversao` WHERE year(data)=2021 and caso=$caso";
				$res2 = mysqli_query($link,$cmd2);
				$i = 1;
				while ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero = $line2['numero'];
					if ($i==1) 
					{
						$numero1 = $line2['numero'];
						$id1 = $line2['id'];
					}
					if ($i==2) 
					{
						$numero2 = $line2['numero'];
						$id2 = $line2['id'];
					}
					$i++;
					echo "$caso $numero<BR>";
				}
				if ($numero1==$numero2)
				{
					$cmd = "DELETE FROM `consulta_conversao` WHERE year(data)=2021 and caso=$caso and numero='$numero1' and id=$id2";
					echo "$cmd;<BR>";
				}
				echo "<BR>";
			}
			echo "Fim processamento";exit();
		}
		
		// http://localhost/central/control.php?action=1010&op=1 http://cientistaspatentes.com.br/central/control.php?action=1010&op=1
		// select * from consulta_comment where year(data)=2023 and data>='2023-08-15' and numero not in (select numero from consulta_conversao where year(data)=2023)
		if ($op==1) // lista todos os casos com comentários da tabela consulta_comment
		{
			$cmd = "select * from consulta_comment where year(data)=2023 and data>='2023-08-15'";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$cmd2 = "select * from consulta_conversao where numero='$numero' and year(data)=2023";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$caso = $line2['caso'];
					echo "TBR$caso/23<BR>";
				}
				else
					echo "Não achei $numero<BR>";
			}
			echo "Fim processamento";exit();
		}

		// http://localhost/central/control.php?action=1010&op=3 http://cientistaspatentes.com.br/central/control.php?action=1010&op=3
		if ($op==3)
		{
			$fname="caselaw2021.txt";  // TBR1077/21;CGPAT IV/DINEC;Reivindicação pleiteia
			@ $fp = fopen($fname,"r"); // TBR1176/21;Reivindicação 
			if (!$fp)
				echo "Não foi identificado o arquivo texto $fname";
			else
			{
				$total = 0;$total_existente = 0;
				while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
				{
					$texto= fgets($fp);
					$texto = trim(str_replace('"','',$texto));
									
					if (substr($texto,0,1)=='#') continue; // linha de comentário, pule para próxima
					if (substr($texto,0,3)=='TBR')
					{
						$modulo = 169;
						$codigo = 5208;
						$email = "teste";
						if ($total>0)
						{
							$cmd = "select * from consulta_comment where numero='$numero' and year(data)=$ano";
							$res = mysqli_query($link,$cmd);
							if ($line=@mysqli_fetch_assoc($res))
							{
								$total_existente++;
								$cmd2 = "select * from consulta_comment where numero='$numero' and year(data)=2021";
								$res2 = mysqli_query($link,$cmd2);
								if ($line2=@mysqli_fetch_assoc($res2))
								{
									$divisao_consulta = $line2['divisao'];

									$cmd2 = "select * from consulta_conversao where numero='$numero' and year(data)=2021";
									$res2 = mysqli_query($link,$cmd2);
									if ($line2=@mysqli_fetch_assoc($res2)) $caso = $line2['caso'];

									if ($divisao=='' or $divisao=='direp' or $divisao=='corep' or $divisao=='cgrec')
									{
										if (!($divisao_consulta=='direp' or $divisao_consulta=='corep' or $divisao_consulta=='cgrec'))
											echo "$numero TBR$caso/21 [$divisao] $divisao_consulta<BR>";
									}
									else
									{
										if ($divisao_consulta<>$divisao) echo "$numero TBR$caso/21 [$divisao] $divisao_consulta<BR>";
									}
								}
							}
							else
							{
								$cmd = "INSERT INTO consulta_comment (id, codigo, email, comentario, status, data, modulo, divisao, numero) VALUES (NULL, '$codigo', '$email', '$comentario', 0, '$data', '$modulo', '$divisao', '$numero')";
								//$res = mysqli_query($link,$cmd);
								echo "$cmd;<BR>";//exit();
							}
						}
						$total++;
						$divisao = 'CGREC/DIREP';
						$pos = strpos($texto,";CGPAT ",0);
						if ($pos !== false) 
							list($caso,$divisao,$comentario) = explode(';',$texto);
						else
							list($caso,$comentario) = explode(';',$texto);

						$caso = str_replace('/21','',$caso);
						$caso = trim(substr($caso,3));
						$ano = 2021;
						$data = null;$numero=null;
						$cmd = "select * from consulta_conversao where year(data)=$ano and caso=$caso";
						$res = mysqli_query($link,$cmd);
						if ($line=@mysqli_fetch_assoc($res))
						{
							$data = $line['data'];
							$numero = $line['numero'];
						}
				
						$comentario = trim($comentario);
						//foreach ($complemento_divisao as $key=>$value) echo "$key $value<BR>"; exit();
						$divisao = $complemento_divisao[trim($divisao)];
						//echo "$numero $caso $divisao<BR>";
						$desenho = 1;
					}
					else
					{
						if ($texto=='')
						{
							if ($desenho==1) $comentario = $comentario."<BR><IMG SRC=forum/$numero.png ALIGN=CENTER><BR><BR>";
							if ($desenho==2) $comentario = $comentario."<BR><IMG SRC=forum/$numero"."b.png ALIGN=CENTER><BR><BR>";
							if ($desenho==3) $comentario = $comentario."<BR><IMG SRC=forum/$numero"."c.png ALIGN=CENTER><BR><BR>";
							$desenho++;
						}
						else
							$comentario = $comentario." $texto";
					}
				}
			}
			echo "Fim processamento: $total, existente: $total_existente<BR>";
			exit();
		}
	}
	
	
	if ($action==9) // http://localhost/central/control.php?action=9
	{
		$total = 0;
		$cmd = "select * from justica where 1";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$total++;
			$id = $line['id'];
			$arquivo = "../plos/pesquisa2/".$line['arquivo'].".pdf";
			if (!file_exists($arquivo)) echo "$id $arquivo<BR>";
		}
		echo "Fim processamento: $total";
		exit();
	}

	if ($action==8) // http://localhost/central/control.php?action=8
	{
	
		if ($op==2) // http://localhost/central/control.php?action=8&op=2
		{
			$id_nao_processado = 1186 + 7072;
			$cmd = "select * from consulta_conversao where id>=$id_nao_processado order by id asc";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$id = $line["id"];
				$numero = $line["numero"];
				$caso = $line["caso"];
				$cmd2 = "select * from consulta_conversao where id<=$id_nao_processado and numero='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$id = $id - 772;
					echo "$id $numero $caso<BR>";
				}
			}
			echo "Fim de processamento:";
			exit();
		}

		if ($op==3) // http://localhost/central/control.php?action=8&op=3
		{
			$cmd = "select * from consulta_comment where year(data)=2021";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$divisao = $line['divisao'];
				$email = $line['email'];
				$cmd2 = "select * from consulta_conversao where numero='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) 
				{
					$divisao2 = $line2['divisao'];
					if ($divisao<>$divisao2)
					{
						$cmd2 = "update consulta_comment set divisao='$divisao2' where year(data)=2021 and numero='$numero'";
						echo "$cmd2;<BR>";
					}
				}
				else 
					echo "$numero não está em tabela consulta_conversao<BR>";
				
				$cmd2 = "select * from pedido where numero='$numero' and year(rpi)=2021 and ((instancia in ('recurso','recurso cgrec') and decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111')) or (instancia in ('nulidade','nulidade cgrec') and decisao in ('nulidade provida','nulidade negada','nulidade parcial','nulidade 200','nulidade 201','nulidade 204')))";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$codigo = $line2['codigo'];
					$decisao = $line2['decisao'];
					if ($decisao=='recurso 111')
					{
						$cmd2 = "select * from pedido where numero='$numero' and (decisao='recurso ciencia' or decisao='recurso exigencia' or decisao='recurso exigencia 121')";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) $codigo = $line2['codigo'];
					}
					if ($decisao=='nulidade 201')
					{
						$cmd2 = "select * from pedido where numero='$numero' and decisao='nulidade 1'";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) $codigo = $line2['codigo'];
					}
					$cmd2 = "select * from examinador where codigo=$codigo and dono=1";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) 
					{
						$email2 = $line2['email'];
						if ($email2 <> $email)
						{
							$cmd2 = "update consulta_comment set email='$email2' where year(data)=2021 and numero='$numero'";
							echo "$cmd2;<BR>";
						}
					}
				}
			}
			echo "Fim processamento:";
			exit();

			$cmd = "select * from consulta_conversao where year(data)=2021";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				//echo "$numero: ";
				$cmd2 = "select * from pedido where numero='$numero' and year(rpi)=2021 and ((instancia in ('recurso','recurso cgrec') and decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111')) or (instancia in ('nulidade','nulidade cgrec') and decisao in ('nulidade provida','nulidade negada','nulidade parcial','nulidade 200','nulidade 201','nulidade 204')))";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$codigo = $line2['codigo'];
					$decisao = $line2['decisao'];
					$divisao = $line2['divisao'];
					$data = $line2['rpi'];
					if ($decisao=='recurso 111')
					{
						$cmd2 = "select * from pedido where numero='$numero' and (decisao='recurso ciencia' or decisao='recurso exigencia' or decisao='recurso exigencia 121')";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) $divisao = $line2['divisao'];
					}
					if ($decisao=='nulidade 201')
					{
						$cmd2 = "select * from pedido where numero='$numero' and decisao='nulidade 1'";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2)) $divisao = $line2['divisao'];
					}
					$cmd2 = "update consulta_conversao set codigo=$codigo, divisao='$divisao', data='$data' where year(data)=2021 and numero='$numero'";
					echo "$cmd2;<BR>";
				}
				else
					echo "$numero sem decisão<BR>";
			}
		}
		
		$examinadores_CGREC = array('cinopoli','alciclea','moreira','abrantes','darlan3','darlan','cidade','deborasg','edibraga','fabios','fertc','giselleg','helenojc','helenojc2','jordy','luiz','luizcvd','mariaa','rcdutra','rockrio','rockrio2','rosanab','telma');
		if ($op==4) // http://localhost/central/control.php?action=8&op=4 http://cientistaspatentes.com.br/central/control.php?action=8&op=4
		{
			$cmd = "select * from consulta_comment where year(data)=2021";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$divisao = $line['divisao'];
				$email = $line['email'];
				if (in_array($email,$examinadores_CGREC)) 
				{
					if (!($divisao=='direp' or $divisao=='corep' or $divisao=='cgrec')) 
						echo "$numero $email $divisao [tinha que ser COREP]<BR>";
				}
				else
				{
					if ($divisao=='direp' or $divisao=='corep' or $divisao=='cgrec') 
						echo "$numero $email $divisao [tinha que ser DIRPA]<BR>";
				}
			}
			echo "Fim processamento";
			exit();
		}
		
		$total=0; // http://localhost/central/control.php?action=8 http://cientistaspatentes.com.br/central/control.php?action=8
		$fname="caselaw2022.csv"; // dipae szandona PI1102970 TBR876/21 complexo
		echo "$fname<BR>";		  // http://localhost/central/control.php?action=8
		@ $fp = fopen($fname,"r");
		if (!$fp)
			echo "Não foi identificado o arquivo texto $fname";
		else
		{
			while (!feof($fp)) // a busca de $fp de onde parou e prossegue até o fim do arquivo
			{
				$texto= fgets($fp);
				$texto = trim(str_replace('"','',$texto));
				list($divisao,$email,$numero,$tcaso) = explode(' ',$texto);
				$numero = montar_numerosd(trim($numero));
				if ($numero<>'')
				{
					$data = "2021-01-01";
					$tcaso = trim($tcaso);
					$pos = strpos($tcaso,'/'); 
					$caso = substr($tcaso,3,$pos-3);
					$cmd = "insert into consulta_conversao (numero,codigo,data,caso,divisao) values ('$numero',0,'$data','$caso','$divisao')";
					//echo "$cmd;<BR>";
					$cmd2 = "select * from consulta_comment where year(data)=2021 and numero='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$email_consulta = $line2['email'];
						if ($email<>$email_consulta) 
						{
							echo "$numero $email $email_consulta<BR>";
							//$cmd = "update consulta_comment set email='$email' where year(data)=2021 and numero='$numero'";
							//echo "$cmd;<BR>";
							
							if ($email_consulta=='teste') 
							{
								$cmd = "update consulta_comment set email='$email' where year(data)=2021 and numero='$numero'";
								echo "$cmd;<BR>";
							}
							$total++;
						}
					}
				}
			}
		}
		echo "Fim de processamento: $total";
		exit();
	}
	
	if ($action==77)
	{

// select * from publicados where numero not in (select numero from publicados where despacho_out='' or ((despacho_out='8.6' and dataout<'2007-05-02') or (despacho_out='11.1' and dataout<'2004-05-18') or (despacho_out='23.16' and dataout='2000-05-30') or (despacho_out='9.2' and dataout<'2008-12-02')  or (despacho_out='101' and dataout<'1995-11-14') or (despacho_out='21.1' and dataout<'1996-03-19') or despacho_out in ('PR - Recursos','1.2','8.11','9.2.4','10.1','10.9','11.1.1','11.2','11.3','11.4','11.5','11.6','11.9','11.11','11.12','11.17','11.18','11.30','11.31','15.1','15.2','15.3','15.4','15.13','15.14','15.21','16.1','18.2','19.1','23.6','23.7','23.9')))
// restam apenas 22 registros com despacho_out exceção fora da regra da query, principalmente 15.10 e 15.22 de pedido que viraram MI/DI
/*
MU7601128
MU6902492
MU7100359
MU7100360
MU7101081
MU7201332
PI9102941
PI9102942
MU7102651
MU7201668
MU7200682
MU7202137
MU7301149
MU6602516
MU6700673
MU6701630
MU6702719
MU6800038
MU6800612
MU6800743
MU6801214
MU6901227
*/
		if ($op==1) // http://localhost/control.php?action=77&op=1 http://cientistaspatentes.com.br/central/control.php?action=77&op=1
		{

			echo "Atualizando dataout...<BR>";
			$total=0;
			$cmd = "SELECT * FROM publicados WHERE dataout is null and despacho_out='' and numero='PI9505307'";
			$cmd = "SELECT * FROM publicados WHERE dataout is null and despacho_out='' and year(data_deposito)=$ano";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$total++;
				$numero = $line['numero'];

				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}

				$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and $despachos_terminais and anulado=0 order by data asc";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$data = $line2['data'];
					$despacho = $line2['despacho'];
					$cmd2 = "update publicados set dataout='$data',despacho_out='$despacho' where numero='$numero1' or numero='$numero2'";
					echo "$cmd2;<BR>";
					$res2 = mysqli_query($link,$cmd2);
					$total++;
				}
			}
			echo "Fim de processamento: $total";
			exit();
		}

		if ($op==2) // http://localhost/control.php?action=77&op=2 http://cientistaspatentes.com.br/central/control.php?action=77&op=2
		{
			echo "Atualizando dataout null...<BR>";
			$total=0;
			$cmd = "SELECT * FROM publicados WHERE dataout is not null and despacho_out=''";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$total++;
				$numero = $line['numero'];
				$cmd2 = "update publicados set dataout=null where numero='$numero' and dataout is not null and despacho_out=''";
				echo "$cmd2;<BR>";
				$res2 = mysqli_query($link,$cmd2);
				$total++;
			}
			$cmd = "SELECT * FROM publicados WHERE dataout is null and despacho_out<>''";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$total++;
				$numero = $line['numero'];
				$cmd2 = "update publicados set despacho_out='' where numero='$numero' and dataout is null and despacho_out<>''";
				$res2 = mysqli_query($link,$cmd2);
				$total++;
			}
			echo "Fim de processamento: $total<BR>";

			exit();
		}

	// SELECT * FROM publicados WHERE despacho_out = '' AND dataout IS NOT NULL tem que dar zero
	// SELECT * FROM publicados WHERE despacho_out <> '' AND dataout IS NULL tem que dar zero

		if ($op==3) // http://localhost/control.php?action=77&op=3 http://cientistaspatentes.com.br/central/control.php?action=77&op=3
		{
			echo "<BR><BR>Verifica se o despacho em dataout da tabela publicados é compatível<BR>";

			$total=0;
			$cmd = "SELECT * FROM publicados WHERE despacho_out<>'' and year(dataout)=$ano";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$total++;
				$numero = $line['numero'];
				$dataout = $line['dataout'];
				$despacho_out = $line['despacho_out'];

				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}

				$cmd2 = "SELECT * FROM arquivados WHERE despacho='$despacho_out' and data='$dataout' and (numero='$numero1' or numero='$numero2') and anulado>0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$cmd2 = "update publicados set dataout=null, despacho_out='' WHERE despacho_out='$despacho_out' and dataout='$dataout' and (numero='$numero1' or numero='$numero2')";
					echo "$cmd2;<BR>";
					$res2 = mysqli_query($link,$cmd2);
					//exit();
				}
			}
				
			echo "Fim de processamento: $total";
			exit();
		}

		if ($op==4) // http://localhost/control.php?action=77&op=4 http://cientistaspatentes.com.br/central/control.php?action=77&op=4
		{
			echo "<BR><BR>Elimina duplicados em publicados<BR>";
			$cmd = "SELECT * FROM publicados where numero<>'' group by numero having count(*) > 1";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "delete from publicados where (numero='$numero1' or numero='$numero2') and despacho='200'";
				//$res2 = mysqli_query($link,$cmd2);
				echo "$cmd2;<BR>";
			}
			echo "Fim de processamento duplicados... (comandos não executados)<BR> ";
			exit();
		}

		if ($op==5)  // http://localhost/control.php?action=77&op=5 http://cientistaspatentes.com.br/central/control.php?action=77&op=5
		{
			echo "Testa tabela publicados<BR>";
			$cmd="SELECT * FROM arquivados WHERE despacho in ('1.1','1.3','1.3.3','2.4','3.1','3.2','3.5','3.6','23.1','23.1.1') and anulado=0 and year(data)>=2021";
			$res = mysqli_query($link,$cmd);
			$total = 0;
			while ($line=@mysqli_fetch_assoc($res))
			{
				$total++;
				$numero = $line['numero'];
				$despacho = $line['despacho'];
				$data = $line['data'];
				$divisao = $line['divisao'];

				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}

				$cmd2="SELECT * FROM publicados WHERE (numero='$numero1' or numero='$numero2')";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) continue;

				$cmd2 = "insert into publicados (despacho, numero, depositante, data, data_deposito, pedexame, divisao, dataout, despacho_out) values ('$despacho','$numero','','$data',null,null,'$divisao',null,'')";
				$res2 = mysqli_query($link,$cmd2);
				echo "$cmd2;<BR>";
				// if ($total>10) exit();
			}
			echo "Fim de processamento: $total<BR><BR>";
			exit();
		}

		exit();

		$cmd = "SELECT * FROM rpis_lidas WHERE year(data)<1997"; //"
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$data = $line['data'];
			$rpi = $line['rpi'];
			$cmd2 = "SELECT count(*) as X FROM revistas WHERE data='$data' ";
			$cmd2 = "SELECT count(*) as X FROM arquivados WHERE data='$data' ";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) $x = $line2['X'];
			echo "$rpi $data $x<BR>";
		}
		echo "Fim de processamento: $total";
		exit();
	}

	if ($action==10)
	{

		$total = 0;
		$cmd_main = "select * from arquivados where despacho in ('6.1','7.1','9.1','9.2','11.2') and anulado=0 and year(data)>=2020";
		$res_main = mysqli_query($link,$cmd_main);
		while ($line_main=@mysqli_fetch_assoc($res_main))
		{
			$numero = $line_main['numero'];
			$despacho = $line_main['despacho'];
			$prmexame = $line_main['prmexame'];
			$data = $line_main['data'];
			// echo "$numero $despacho $prmexame $data<BR>";exit();
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "select * from pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2['numero1'];
				$numero2 = $line2['numero2'];
			}

			$x = 0;
			$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and anulado=0 and despacho in ('6.1','7.1','9.1','9.2','11.2') and data<='$data'";
			$res2 = mysqli_query($link,$cmd2);
			while ($line2=@mysqli_fetch_assoc($res2)) $x++;

			if ($x<>$prmexame)
			{
				$cmd2 = "update arquivados set prmexame=$x where (numero='$numero1' or numero='$numero2') and data='$data' and despacho='$despacho'";
				//$res2 = mysqli_query($link,$cmd2);
				echo "$cmd2;<BR>";
				//exit();
			}

			$total++;
		}
		echo "Fim de processamento: $total<BR>";
		exit();

		$total = 0; // total de 84 dados por divisão
		for ($ano=2011;$ano<=2017;$ano++)
		{
			$soma = 0;
			for ($mes=1;$mes<=12;$mes++)
			{
				$x=0;
				$kmes = str_pad($mes,2,"0",STR_PAD_LEFT);
				$data = "$ano-$kmes-01";
				$cmd2 = "SELECT count(*) as X FROM `servidores` WHERE (lotacao='DIRPA' or lotacao='CGREC') and cargo='PESQUISADOR' and admissao<='$data' and (rescisao>='$data' or rescisao='0000-00-00')";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) $x = $line2['X'];
				$soma = $soma + $x;
				echo "dirpa - $data - $x<BR>";
				foreach($divisoes as $idivisao)
				{
					$icomplemento = $divisao_complemento[$idivisao];
					$cmd2 = "SELECT count(*) as X FROM `servidores` WHERE (lotacao='DIRPA' or lotacao='CGREC') and complemento='$icomplemento' and cargo='PESQUISADOR' and admissao<='$data' and (rescisao>='$data' or rescisao='0000-00-00')";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) $x = $line2['X'];
//					echo "$idivisao - $data - $x<BR>";
				}
			}
			$media = round($soma/12, 1);
			//echo "$ano - $media<BR>";
		}
		exit();

		echo "<TABLE><TR><TD>Ano</TD><TD>Primeiros exames</TD><TD>com B1</TD></TR>";
		for ($ano=2006;$ano<=2015;$ano++)
		{
			$total[$ano]=0;
			$totalb1[$ano]=0;
			$data1 = "$ano-01-01";
			$data2 = "$ano-12-31";
			$cmd2 = "select * from arquivados where despacho in ('6.1','7.1','9.1') and (data>='$data1' and data<='$data2') and prmexame=1";
			$res2 = mysqli_query($link,$cmd2);
			while ($line2=@mysqli_fetch_assoc($res2))
			{
				$total[$ano]++;
				$numero = $line2['numero'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2b = "select * from pimupi where numero1='$numero' or numero2='$numero'";
				$res2b = mysqli_query($link,$cmd2b); // em caso de mudança de natureza apague o outro numero de backlog também
				if ($line2b=@mysqli_fetch_assoc($res2b))
				{
					$numero1 = $line2b['numero1'];
					$numero2 = $line2b['numero2'];
				}

				$cmd2b = "SELECT * FROM ops where (numero='$numero1' or numero='$numero2') and (epkind ='B1' or epkind='B1' or epkind ='B2' or epkind ='B4' or epkind ='B5' or epkind ='B6' or epkind ='B7' or epkind ='B8' or epkind ='B9')";
				$res2b = mysqli_query($link,$cmd2b);
				if ($line2b=@mysqli_fetch_assoc($res2b)) $totalb1[$ano]++;
			}

			echo "<TR><TD>$ano</TD><TD>".$total[$ano]."</TD><TD>".$totalb1[$ano]."</TD></TR>";

		}
		echo "</TABLE>";
		exit();

/*
		echo "<TABLE><TR><TD>Ano</TD><TD>Decisões</TD><TD>ISA/IPEA</TD><TD>1 Exame</TD><TD>Total</TD><TD>6.1</TD><TD>7.1</TD><TD>9.1</TD><TD>9.2</TD><TD>11.2</TD><TD>Total (6.1/7.1/9.1/9.2/11.2)</TD></TR>";
		for ($ano=1982;$ano<=2015;$ano++)
		{
			$iano = $ano - 1;
//			$data1 = "$iano-11-01";
//			$data2 = "$ano-10-31";
			$data1 = "$ano-01-01";
			$data2 = "$ano-12-31";

			$cmd2 = "select count(*) as n from arquivados where despacho='6.1' and (data>='$data1' and data<='$data2')";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) $total_6_1_dirpa[$ano] = $line2['n'];

			$cmd2 = "select count(*) as n from arquivados where despacho='7.1' and (data>='$data1' and data<='$data2')";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) $total_7_1_dirpa[$ano] = $line2['n'];

			$cmd2 = "select count(*) as n from arquivados where despacho='9.1' and (data>='$data1' and data<='$data2')";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) $total_9_1_dirpa[$ano] = $line2['n'];

			$cmd2 = "select count(*) as n from arquivados where despacho='9.2' and (data>='$data1' and data<='$data2')";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) $total_9_2_dirpa[$ano] = $line2['n'];

			$cmd2 = "select count(*) as n from arquivados where despacho='11.2' and (data>='$data1' and data<='$data2')";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) $total_11_2_dirpa[$ano] = $line2['n'];

			$total2 = $total_6_1_dirpa[$ano] + $total_7_1_dirpa[$ano] + $total_9_1_dirpa[$ano] + $total_9_2_dirpa[$ano] + $total_11_2_dirpa[$ano];

			$cmd2 = "select count(*) as n from arquivados where despacho in ('9.1','9.2','11.2') and (data>='$data1' and data<='$data2')";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) $total_decisoes_dirpa[$ano] = $line2['n'];

			$cmd3 = "select count(*) as X from pct_docs where (tipodoc='isa210' or tipodoc='ipea408') and (data>='$data1' and data<='$data2')";
			$res3 = mysqli_query($link,$cmd3);
			if ($line3=@mysqli_fetch_assoc($res3)) $total_isaipea_dirpa[$ano] = $line3['X'];

			$cmd3 = "select count(*) as X from pedido where decisao='26.4' and (rpi>='$data1' and rpi<='$data2')";
			$res3 = mysqli_query($link,$cmd3);
			if ($line3=@mysqli_fetch_assoc($res3)) $total_opiniao_dirpa[$ano] = $line3['X'];

//			$cmd3 = "select count(*) as X from pedido where instancia='1 exame' and decisao='exigencia' and (rpi>='$data1' and rpi<='$data2')";
			$cmd3 = "select count(*) as X from arquivados where prmexame=1 and (data>='$data1' and data<='$data2') and despacho='6.1'";
			$res3 = mysqli_query($link,$cmd3);
			if ($line3=@mysqli_fetch_assoc($res3)) $total_p_6_1_dirpa[$ano] = $line3['X'];

//			$cmd3 = "select count(*) as X from pedido where instancia='1 exame' and decisao='ciencia de parecer' and (rpi>='$data1' and rpi<='$data2')";
			$cmd3 = "select count(*) as X from arquivados where prmexame=1 and (data>='$data1' and data<='$data2') and despacho='7.1'";
			$res3 = mysqli_query($link,$cmd3);
			if ($line3=@mysqli_fetch_assoc($res3)) $total_p_7_1_dirpa[$ano] = $line3['X'];

			$ppatotmes['dirpa'] = $total_decisoes_dirpa[$ano] + $total_isaipea_dirpa[$ano] + $total_isaipea_dirpa[$ano] + $total_p_6_1_dirpa[$ano] + $total_p_7_1_dirpa[$ano];
			echo "<TR><TD>$ano</TD>";
			echo "<TD>".$total_decisoes_dirpa[$ano]."</TD>";
			echo "<TD>".$total_isaipea_dirpa[$ano]."</TD>";
			$x = $total_p_6_1_dirpa[$ano] + $total_p_7_1_dirpa[$ano];
			echo "<TD>".$x."</TD>";
			echo "<TD>".$ppatotmes['dirpa']."</TD>";
			echo "<TD>".$total_6_1_dirpa[$ano]."</TD>";
			echo "<TD>".$total_7_1_dirpa[$ano]."</TD>";
			echo "<TD>".$total_9_1_dirpa[$ano]."</TD>";
			echo "<TD>".$total_9_2_dirpa[$ano]."</TD>";
			echo "<TD>".$total_11_2_dirpa[$ano]."</TD>";
			echo "<TD>".$total2."</TD>";
			echo "</TR>";
		}
		echo "</TABLE>";
		exit();
*/


	}

	if ($action==66)
	{

/*

http://www.inpi.gov.br/comunicados/arquivos-no-formato-txt-passarao-para-xml-na-rpi
Esses arquivos que acompanham as RPIs serão publicados com os dois formatos, TXT e XML, a partir da edição de 05 de junho de 2018 (número 2474).
A partir do ano de 2019, somente o formato XML será oferecido, permanecendo a RPI com o formato PDF.

<processo>
    <numero inid="11" kindcode= "B1"></numero>
    <data-deposito inid="22"></data-deposito>
    <concessao inid="45">
        <data></data>
    </concessao>
    <publicacao-nacional inid="43 ou 44">
        <data-rpi></data-rpi>
    </publicacao-nacional>
    <pedido-principal inid="61">
        <numero></numero>
        <data-deposito></data-deposito>
    </pedido-principal>
    <data-fase-nacional inid="85"></data-fase-nacional>
    <pedido-internacional inid="86">
        <numero-pct></numero-pct>
        <data-pct></data-pct>
    </pedido-internacional>
    <publicacao-internacional inid="87">
        <numero-ompi></numero-ompi>
        <data-ompi></data-ompi>
    </publicacao-internacional>
    <resumo inid="57"></resumo>
    <classificacao-internacional-lista>
        <classificacao-internacional sequencia="1" inid="51">
            <codigo></codigo>
            <ano></ano>
                </classificacao-internacional>
    </classificacao-internacional-lista>
    <classificacao-CPC-lista>
        <classificacao-CPC sequencia="1" inid="52"></classificacao-CPC>
    </classificacao-CPC-lista>
    <prioridade-unionista-lista>
        <prioridade-unionista sequencia="1" inid="30">
            <sigla-pais inid="33"></sigla-pais>
            <numero-prioridade inid="32"></numero-prioridade>
            <data-prioridade inid="31"></data-prioridade>
        </prioridade-unionista>
    </prioridade-unionista-lista>
    <prioridade-interna-lista>
        <prioridade-interna sequencia="1" inid="66">
            <data-prioridade></data-prioridade>
            <numero-prioridade></numero-prioridade>
        </prioridade-interna>
    </prioridade-interna-lista>
    <divisao-pedido inid="62">
        <numero></numero>
        <data-deposito></data-deposito>
    </divisao-pedido>
    <titulo inid="54"></titulo>
    <titular-lista>
        <titular sequencia="1" inid="71">
            <nome-completo></nome-completo>
            <endereco>
                <uf></uf>
                <pais>
                    <siglaPais></siglaPais>
                </pais>
            </endereco>
        </titular>
    </titular-lista>
    <inventor-lista>
        <inventor sequencia="1" inid="72">
            <nome-completo></nome-completo>
        </inventor>
    </inventor-lista>
    <procurador-lista>
        <procurador inid="74">
            <nome-completo></nome-completo>
        </procurador>
    </procurador-lista>
    <comentario inid="Co"></comentario>
</processo>


*/

		$fname="revistas/P$rpi.TXT";
		$fname="revistas/P$rpi.txt";
		@$fp = fopen($fname,"r");
		if (!$fp)
		{
			echo "Não foi identificado o arquivo texto $fname";
			exit();
		}
		$linha = trim(fgets($fp)); // No 2663 de 18/01/2022
		$pos = strpos($linha,'/')-2;
		$dia = substr($linha,$pos,2);
		$mes = substr($linha,$pos+3,2);
		$ano = substr($linha,$pos+6,4);
		$kmes = str_pad($mes,2,"0",STR_PAD_LEFT);
		$kdia = str_pad($dia,2,"0",STR_PAD_LEFT);
		$data = "$ano-$kmes-$kdia";
		
		//$cmd = "SELECT * from rpis_lidas WHERE rpi=$rpi";
		//$res = mysqli_query($link,$cmd);
		//if (!$line=@mysqli_fetch_assoc($res)) 
		//{
		//	$cmd = "insert into rpis_lidas (rpi, data, e_parecer, e_carta) values ('$rpi','$data',null,null)";
		//	$res = mysqli_query($link,$cmd);
		//}

		@$fp = fopen($fname,"w");
		if (!$fp)
		{
			echo "Não foi identificado o arquivo texto $fname";
			exit();
		}
		
		$cmd = "SELECT * from rpis_lidas WHERE rpi=$rpi";
		$res = mysqli_query($link,$cmd);
		if (@$line=@mysqli_fetch_assoc($res)) $data = $line['data']; // se já tiver sido carregada, vale a data da revista carregada
		
		$dia = substr($data,8,2);
		$mes = substr($data,5,2);
		$ano = substr($data,0,4);
		$data2 = substr($data,8,2).'/'.substr($data,5,2).'/'.substr($data,0,4);
		$msg = "No $rpi de $data2";
		echo "$msg<BR>";
		//$msg = mb_convert_encoding($msg, 'UTF-8', 'WINDOWS-1252');
		//$msg = iconv("WINDOWS-1252//TRANSLIT//IGNORE","UTF-8", $msg);
		$msg = utf8_encode($msg);
		fputs($fp,$msg."\r\n");

		$kmes = str_pad($mes,2,"0",STR_PAD_LEFT);
		$kdia = str_pad($dia,2,"0",STR_PAD_LEFT);
		$saveFileName = "revistas/Patente_$rpi.xml";
		if(!file_exists($saveFileName))	$saveFileName = "revistas/Patente_".$rpi."_".$kdia.$kmes.$ano.".xml";
		
		$myprocessos= array();
		$filename = $saveFileName;
		if(file_exists($filename)) {

    		$doc = new DOMDocument('1.0', 'utf-8');
    		$xmlfile = file_get_contents($filename);
    		$doc->loadXML($xmlfile);
			$xpath = new DOMXPath($doc);
			$n = 0;
			$entry = $xpath->query("//revista/despacho");

			foreach($entry as $ent){
				$n++;
	    		//fputs($fp,"\r\n");

				foreach($ent->childNodes as $nodename_main)
				{

					if($nodename_main->nodeName=='codigo')
					{
						$inid = 'Cd';
						$codigo_main = utf8_decode(trim($nodename_main->nodeValue));
						$codigos_recurso = array('100','102','103','104','106','111','112','113','114','115','116','120','121','130','131','132','133','134','135','136','137','138','139','140','141');
						if (in_array($codigo_main,$codigos_recurso)) $codigo_main = 'PR - Recursos';
						$codigos_nulidade = array('200','201','204','205','206','210','211','212','213','214','215','216','217','218','219','220');
						if (in_array($codigo_main,$codigos_nulidade)) $codigo_main = 'PR - Nulidades';
						$myprocessos[$n][$inid]=$codigo_main;
						if ($codigo_main=='PR - Recursos' or $codigo_main=='PR - Nulidades') $myprocessos[$n]['Di']='DIRPA';
					}

					if($nodename_main->nodeName=='processo-patente')
					{
						foreach($nodename_main->childNodes as $nodename)
						{
							if($nodename->nodeName=='numero')
							{
								//$inid = 11;
								$inid = $nodename->getAttribute('inid');
								$numero = trim($nodename->nodeValue);
								$kindcode = $nodename->getAttribute('kindcode');
								$myprocessos[$n][$inid]=$numero.' '.$kindcode;
							}

							if($nodename->nodeName=='data-deposito')
							{
								//$inid = 22;
								$inid = $nodename->getAttribute('inid');
								$data_deposito = trim($nodename->nodeValue);
								//$data_deposito = substr($data_deposito,8,2).'/'.substr($data_deposito,5,2).'/'.substr($data_deposito,0,4);
								$myprocessos[$n][$inid]=$data_deposito;
							}

							if($nodename->nodeName=='concessao')
							{
								//$inid = 45;
								$inid = $nodename->getAttribute('inid');
								foreach($nodename->childNodes as $subNodes)
								{
									if($subNodes->nodeName=='data')
									{
										$concessao = trim($subNodes->nodeValue);
										//$concessao = substr($concessao,8,2).'/'.substr($concessao,5,2).'/'.substr($concessao,0,4);
										$myprocessos[$n][$inid]=$concessao;
									}
								}
							}

							if($nodename->nodeName=='publicacao-nacional')
							{
								//$inid = 44;
								$inid = $nodename->getAttribute('inid');
								foreach($nodename->childNodes as $subNodes)
								{
									if($subNodes->nodeName=='data-rpi')
									{
										$data_rpi = trim($subNodes->nodeValue);
										//$data_rpi = substr($data_rpi,8,2).'/'.substr($data_rpi,5,2).'/'.substr($data_rpi,0,4);
										$myprocessos[$n][$inid]=$data_rpi;
									}
								}
							}

							if($nodename->nodeName=='pedido-principal')
							{
								//$inid = 61;
								$inid = $nodename->getAttribute('inid');
								foreach($nodename->childNodes as $subNodes)
								{
									if($subNodes->nodeName=='numero')
									{
										$numero = trim($subNodes->nodeValue);
									}
									if($subNodes->nodeName=='data-deposito')
									{
										$data_deposito = trim($subNodes->nodeValue);
										//$data_deposito = substr($data_deposito,8,2).'/'.substr($data_deposito,5,2).'/'.substr($data_deposito,0,4);
									}
									$myprocessos[$n][$inid]=$numero.' '.$data_deposito;
								}
							}

							if($nodename->nodeName=='data-fase-nacional')
							{
								//$inid = 85;
								$inid = $nodename->getAttribute('inid');
								$data = trim($nodename->nodeValue);
								//$data = substr($data,8,2).'/'.substr($data,5,2).'/'.substr($data,0,4);
								$myprocessos[$n][$inid]=$data;
							}


							if($nodename->nodeName=='pedido-internacional')
							{
								//$inid = 86;
								$inid = $nodename->getAttribute('inid');
								foreach($nodename->childNodes as $subNodes)
								{
									if($subNodes->nodeName=='numero-pct')
									{
										$numero_pct = trim($subNodes->nodeValue);
									}
									if($subNodes->nodeName=='data-pct')
									{
										$data_pct = trim($subNodes->nodeValue);
										//$data_pct = substr($data_pct,8,2).'/'.substr($data_pct,5,2).'/'.substr($data_pct,0,4);
									}
									$myprocessos[$n][$inid]="$numero_pct de $data_pct";
								}
							}

							if($nodename->nodeName=='publicacao-internacional')
							{
								//$inid = 87;
								$inid = $nodename->getAttribute('inid');
								foreach($nodename->childNodes as $subNodes)
								{
									if($subNodes->nodeName=='numero-ompi')
									{
										$numero_ompi = trim($subNodes->nodeValue);
									}
									if($subNodes->nodeName=='data-ompi')
									{
										$data_ompi = trim($subNodes->nodeValue);
										//$data_ompi = substr($data_ompi,8,2).'/'.substr($data_ompi,5,2).'/'.substr($data_ompi,0,4);
									}
									$myprocessos[$n][$inid]="$numero_ompi de $data_ompi";
								}
							}

							if($nodename->nodeName=='resumo')
							{
								//$inid = 57;
								$inid = $nodename->getAttribute('inid');
								$resumo = utf8_decode(trim($nodename->nodeValue));
								$myprocessos[$n][$inid]=$resumo;
							}


							if($nodename->nodeName=='classificacao-internacional-lista')
							{
								$i=0;
								foreach($nodename->childNodes as $subNodes)
								{
									if($subNodes->nodeName=='classificacao-internacional')
									{
										//$inid = 51;
										$inid = $subNodes->getAttribute('inid');
										$sequencia = $subNodes->getAttribute('sequencia');
										$ano = $subNodes->getAttribute('ano');
										$codigo_subNodes = trim($subNodes->nodeValue);
										if ($i++==0)
											$myprocessos[$n][$inid]=$codigo_subNodes." "."($ano)";
										else
											$myprocessos[$n][$inid]=$myprocessos[$n][$inid].", ".$codigo_subNodes.' '."($ano)";
									}
								}
							}


							//if($nodename->nodeName=='classificacao-CPC-lista')
							if($nodename->nodeName=='classificacao-nacional-lista')
							{
								$i=0;
								foreach($nodename->childNodes as $subNodes)
								{
									//if($subNodes->nodeName=='classificacao-CPC')
									if($subNodes->nodeName=='classificacao-nacional')
									{
										//$inid = 52;
										$inid = $subNodes->getAttribute('inid');
										$sequencia = $subNodes->getAttribute('sequencia');
										$classificacao_cpc = trim($subNodes->nodeValue);
										if ($i++==0)
											$myprocessos[$n][$inid]=$classificacao_cpc;
										else
											$myprocessos[$n][$inid]=$myprocessos[$n][$inid].' , '.$classificacao_cpc;
									}
								}
							}


							if($nodename->nodeName=='prioridade-unionista-lista')
							{
								$i=0;
								foreach($nodename->childNodes as $subNodes)
								{
									if($subNodes->nodeName=='prioridade-unionista')
									{
										//$inid = 30;
										$inid = $subNodes->getAttribute('inid');
										$sequencia = $subNodes->getAttribute('sequencia');
										foreach($subNodes->childNodes as $subNodes2)
										{
											if($subNodes2->nodeName=='sigla-pais')
											{
												$sigla_pais = trim($subNodes2->nodeValue);
											}
											if($subNodes2->nodeName=='numero-prioridade')
											{
												$numero_prioridade = trim($subNodes2->nodeValue);
											}
											if($subNodes2->nodeName=='data-prioridade')
											{
												$data_prioridade = trim($subNodes2->nodeValue);
												//$data_prioridade = substr($data_prioridade,8,2).'/'.substr($data_prioridade,5,2).'/'.substr($data_prioridade,0,4);
											}
										}
										if ($i++==0)
											$myprocessos[$n][$inid]=$data_prioridade.' '.$sigla_pais.' '.$numero_prioridade;
										else
											$myprocessos[$n][$inid]=$myprocessos[$n][$inid].'; '.$data_prioridade.' '.$sigla_pais.' '.$numero_prioridade;
									}

								}
							}


							if($nodename->nodeName=='prioridade-interna-lista')
							{
								$i=0;
								foreach($nodename->childNodes as $subNodes)
								{
									if($subNodes->nodeName=='prioridade-interna')
									{
										//$inid = 66;
										$inid = $subNodes->getAttribute('inid');
										$sequencia = $subNodes->getAttribute('sequencia');
										foreach($subNodes->childNodes as $subNodes2)
										{
											if($subNodes2->nodeName=='data-prioridade')
											{
												$data_prioridade = trim($subNodes2->nodeValue);
												//$data_prioridade = substr($data_prioridade,8,2).'/'.substr($data_prioridade,5,2).'/'.substr($data_prioridade,0,4);
											}
											if($subNodes2->nodeName=='numero-prioridade')
											{
												$numero_prioridade = trim($subNodes2->nodeValue);
											}

										}
										if ($i++==0)
											$myprocessos[$n][$inid]="$numero_prioridade $data_prioridade";
										else
											$myprocessos[$n][$inid]=$myprocessos[$n][$inid].'; '."$numero_prioridade $data_prioridade";
									}
								}
							}


							if($nodename->nodeName=='divisao-pedido')
							{
								//$inid = 62;
								$inid = $nodename->getAttribute('inid');
								foreach($nodename->childNodes as $subNodes)
								{
									if($subNodes->nodeName=='numero')
									{
										$numero = trim($subNodes->nodeValue);
									}
									if($subNodes->nodeName=='data-deposito')
									{
										$data_deposito = trim($subNodes->nodeValue);
										//$data_deposito = substr($data_deposito,8,2).'/'.substr($data_deposito,5,2).'/'.substr($data_deposito,0,4);
									}

									$myprocessos[$n][$inid]=$numero.' '.$data_deposito;
								}
							}

							if($nodename->nodeName=='titulo')
							{
								//$inid = 54;
								$inid = $nodename->getAttribute('inid');
								$titulo = utf8_decode(trim($nodename->nodeValue));
								$myprocessos[$n][$inid]=$titulo;
							}


							if($nodename->nodeName=='titular-lista')
							{
								$i=0;
								foreach($nodename->childNodes as $subNodes)
								{
									if($subNodes->nodeName=='titular')
									{
										//$inid = 71;
										$inid = $subNodes->getAttribute('inid');
										$sequencia = $subNodes->getAttribute('sequencia');
										foreach($subNodes->childNodes as $subNodes2)
										{
											if($subNodes2->nodeName=='nome-completo')
											{
												$nome_completo = utf8_decode(trim($subNodes2->nodeValue));
											}
											$uf='';
											if($subNodes2->nodeName=='endereco')
											{
												foreach($subNodes2->childNodes as $subNodes3)
												{
													if($subNodes3->nodeName=='uf')
													{
														$uf = '/'.trim($subNodes3->nodeValue);
													}
													if($subNodes3->nodeName=='pais')
													{
														$siglaPais = trim($subNodes3->nodeValue);
													}
												}

												if ($i++==0)
													$myprocessos[$n][$inid]=trim($nome_completo." "."($siglaPais$uf)");
												else
													$myprocessos[$n][$inid]=$myprocessos[$n][$inid].", ".trim($nome_completo.' '."($siglaPais$uf)");
											}
										}
									}
								}
							}


							if($nodename->nodeName=='inventor-lista')
							{
								$i=0;
								foreach($nodename->childNodes as $subNodes)
								{
									if($subNodes->nodeName=='inventor')
									{
										//$inid = 72;
										$inid = $subNodes->getAttribute('inid');
										$sequencia = $subNodes->getAttribute('sequencia');
										foreach($subNodes->childNodes as $subNodes2)
										{
											if($subNodes2->nodeName=='nome-completo')
											{
												$nome_completo = utf8_decode(trim($subNodes2->nodeValue));
											}
										}

										if ($i++==0)
											$myprocessos[$n][$inid]=$nome_completo;
										else
											$myprocessos[$n][$inid]=$myprocessos[$n][$inid].'; '.$nome_completo;
									}
								}
							}


							if($nodename->nodeName=='procurador-lista')
							{
								$i=0;
								foreach($nodename->childNodes as $subNodes)
								{
									if($subNodes->nodeName=='procurador')
									{
										//$inid = 74;
										$inid = $subNodes->getAttribute('inid');
										$sequencia = $subNodes->getAttribute('sequencia');
										foreach($subNodes->childNodes as $subNodes2)
										{
											if($subNodes2->nodeName=='nome-completo')
											{
												$nome_completo = utf8_decode(trim($subNodes2->nodeValue));
											}
										}

										if ($i++==0)
											$myprocessos[$n][$inid]=$nome_completo;
										else
											$myprocessos[$n][$inid]=$myprocessos[$n][$inid].', '.$nome_completo;
									}
								}
							}
						}
					}

					if($nodename_main->nodeName=='comentario')
					{
						//$inid = 'Co';
						$inid = $nodename_main->getAttribute('inid');
						$comentario = utf8_decode(trim($nodename_main->nodeValue));
						$myprocessos[$n][$inid]=$comentario;
						//$myprocessos[$n]['De']=$decisao;
					}

					if($nodename_main->nodeName=='titulo')
					{
						$inid = 'De';
						$decisao = utf8_decode(trim($nodename_main->nodeValue));
						//$myprocessos[$n][$inid]=$decisao;
					}
				}

				//print_r($myprocessos[$n]);
				ksort($myprocessos[$n]);
				$msg_ultimo = '';
				foreach ($myprocessos[$n] as $key=>$value)
				{
					$msg = "($key) $value";
					if ($key=='co' or $key=='De')
						$msg_ultimo = $msg;
					else
					{
						echo utf8_encode("$msg<BR>");
						//$msg = mb_convert_encoding($msg, 'UTF-8', 'WINDOWS-1252');
						//$msg = iconv("WINDOWS-1252//TRANSLIT//IGNORE","UTF-8", $msg);
						$msg = utf8_encode($msg);
						fwrite($fp,$msg."\r\n");
					}
				}
				if ($msg_ultimo<>'')
				{
						echo utf8_encode("$msg_ultimo<BR>");
						//$msg = mb_convert_encoding($msg_ultimo, 'UTF-8', 'WINDOWS-1252');
						//$msg = iconv("WINDOWS-1252//TRANSLIT//IGNORE","UTF-8", $msg_ultimo);
						$msg_ultimo = utf8_encode($msg_ultimo);
						fwrite($fp,$msg_ultimo."\r\n");
				}
				echo "<BR><BR><BR>";
			}

		}

		fclose($fp);
		echo "Fim de processamento";
		exit();
	}

    if ($action==7) // // https://localhost/central/control.php?action=7&op=2
    {
        /*
SELECT numero,data,descricao FROM revistas where (despacho='15.10' or despacho='15.12') and inid='co'
para obter todas as renumerações em renumera.csv (obtido do SISCAP online)
SELECT 
    T1.NO_PEDIDO_ORIGEM,T2.NO_PEDIDO,T1.DH_RENUMER
FROM
    CEPIT_SINPI.PTN_RENUMERACAO T1
    join CEPIT_SINPI.PTN_PEDIDO T2 ON T1.CD_PEDIDO_DERIVAD = T2.CD_PEDIDO
salvo em renumera2.csv (obtido do CEPIT)     
    */
		if ($op==1) // https://localhost/central/control.php?action=7&op=1
		{
			echo "procurando despachos anulados em pimupi<BR>";
			$cmd = "SELECT * from pimupi WHERE 1";
			$res = mysqli_query($link,$cmd);
			while (($line=@mysqli_fetch_assoc($res))) 
			{
				$numero1 = $line['numero1'];
				$numero2 = $line['numero2'];
				$data = $line['data'];
				$cmd2 = "SELECT * from arquivados WHERE (numero='$numero1' or numero='$numero2') and anulado>0 and data='$data' and (despacho='15.10' or despacho='15.12')";
				$res2 = mysqli_query($link,$cmd2);
				if (($line2=@mysqli_fetch_assoc($res2))) 
				{
					$cmd2 = "SELECT * from arquivados WHERE numero='$numero2'"; // testa se teve algum despacho com numero2
					$res2 = mysqli_query($link,$cmd2);
					if (!($line2=@mysqli_fetch_assoc($res2))) 
					{
						echo "$numero1 $numero2 $data<BR>"; // não teve nenhum despacho com numero2, pode apagar de pimupi pois foi numero inocuo
					}
				}
			}
			echo "Fim de processamento<BR><BR>";
			exit();
		}
		
		if ($op==2) // https://localhost/central/control.php?action=7&op=2
		{
			$total=0;
			$total_erros = 0;
			$fname="renumera2.csv";
			@ $fp = fopen($fname,"r");
			if (!$fp)
				echo "Não foi identificado o arquivo texto $fname";
			else
			{
				while (!feof($fp))
				{
					$texto= fgets($fp);
					$texto = trim($texto);
					if ($texto<>'')
					{
						$texto = str_replace('"','',$texto);
						$texto = str_replace("'",'',$texto);
						list($numero1,$numero2,$data) = explode(';',$texto);
						$numero1 = montar_numerosd(trim($numero1));
						$numero2 = montar_numerosd(trim($numero2)); // PI9001234 112014123456
						$numerok = 0;
						if ((strlen($numero1)==9 or strlen($numero1)==12) and (strlen($numero2)==9 or strlen($numero2)==12)) $numerok = 1;
						if (substr($numero1,0,2)=='DI' or substr($numero1,0,2)=='MI' or substr($numero1,0,1)=='3') $numerok = 0;
						if (substr($numero2,0,2)=='DI' or substr($numero2,0,2)=='MI' or substr($numero2,0,1)=='3') $numerok = 0;

						if ($numerok==1 and $numero1<>$numero2)
						{
							$cmd = "SELECT * from pimupi WHERE numero1='$numero1' and numero2='$numero2'";
							$res = mysqli_query($link,$cmd);
							if (!($line=@mysqli_fetch_assoc($res))) 
							{
								$cmd = "SELECT * from arquivados WHERE (numero='$numero1' or numero='$numero2') and despacho='15.30' and anulado=0";
								$res = mysqli_query($link,$cmd);
								if (!($line=@mysqli_fetch_assoc($res))) 
								{
									$cmd = "insert into pimupi (numero1,numero2,data) VALUES ('$numero1','$numero2','$data')";
									echo "$cmd;<BR>";
									$total++;
								}
							}
						}
					}
				}
			}
			echo "Fim processamento: $total<BR>";
			exit();
		}

		if ($op==3) // https://localhost/central/control.php?action=7&op=3
		{
			// "numero","data","descricao","inid","despacho"
			// "102012000549-2","2013-04-09","RENUMERADO DE BR102012000549-2 PARA PI1106995-3 ","co","15.12"
			$total=0;
			$total_erros = 0;
			$fname="renumera.csv";
			@ $fp = fopen($fname,"r");
			if (!$fp)
				echo "Não foi identificado o arquivo texto $fname";
			else
			{
				while (!feof($fp))
				{
					$texto= fgets($fp);
					$texto = trim($texto);
					if ($texto<>'')
					{
						$texto = str_replace('"','',$texto);
						$texto = str_replace("'",'',$texto);
						list($numero,$data,$descricao,$inid,$despacho) = explode(';',$texto);
						$numero = trim($numero);
						$data = trim($data);
						$descricao = strtoupper(trim($descricao)); // Pedido renumerado de BR102009034087-6 para PI0925426-9 
						$descricao_origem = $descricao;
						$descricao = str_replace(" PARA ",'*',$descricao); // Pedido renumerado de BR102009034087-6*PI0925426-9 
						$descricao = str_replace(" PRA ",'*',$descricao); // Pedido renumerado de BR102009034087-6*PI0925426-9 
						$pos = strpos($descricao,"DE ",0);
						if ($pos !== false) 
						{
							$descricao = substr($descricao,$pos); 
							$descricao = str_replace("DE ","",$descricao);
							$descricao = str_replace(" ","",$descricao);
							$descricao = str_replace("BR","",$descricao);
							$descricao = str_replace("NATUREZA","",$descricao);
							$descricao = str_replace("NATURZA","",$descricao);
							$descricao = str_replace("RENUMERADO","",$descricao);
							$descricao = str_replace("EMFACEDOEXAMETéCNICO","",$descricao);
							$descricao = str_replace("MODELOUTILIDADE","",$descricao);
							$descricao = str_replace("PATENTEINVENÇÃO","",$descricao);
							$descricao = str_replace("COMANUMERAÇÃO","",$descricao);
							$descricao = str_replace("PORTERSIDONUMERADOINDEVIDAMENTE","",$descricao);
							$descricao = str_replace("PRIVILéGIOINVENçãO","",$descricao);
							$descricao = str_replace("MODELOUTILIDA","",$descricao);
							$descricao = str_replace("INVENçãO","",$descricao);
							$descricao = str_replace("SOBONúMERO","",$descricao);
							$descricao = str_replace("PATENTE","",$descricao);
							$descricao = str_replace("INVENÇÃO","",$descricao);
							$descricao = str_replace("DO","",$descricao);
							$descricao = str_replace("(","",$descricao);
							$descricao = str_replace(")","",$descricao);
							$descricao = str_replace("Nº","",$descricao);
							$descricao = str_replace("PARA","",$descricao);
							$descricao = str_replace("PIPI","PI",$descricao);
							$descricao = str_replace("MUMU","MU",$descricao);
							$descricao = str_replace("SOBNúMERO","",$descricao);
							$descricao = str_replace("SOBONúMERO","",$descricao);
							$descricao = str_replace("SOBNÚMERO","",$descricao);
							$descricao = str_replace("SOBONÚMERO","",$descricao);
							
							$numerok = 0;
							$pos = strpos($descricao,"*",0);
							if ($pos !== false) $numerok = 1; 
							
							if ($numerok==1)
							{
								list($numero1,$numero2) = explode('*',$descricao);
								$numero1 = montar_numerosd(trim($numero1));
								$numero2 = montar_numerosd(trim($numero2)); // PI9001234 112014123456
								$numerok = 0;
								$str1 = "$numero1";
								$str2 = "$numero2";
								if ((strlen($str1)==9 or strlen($str1)==12) and (strlen($str2)==9 or strlen($str2)==12)) $numerok = 1;
								$s = "$numero1$numero2";
								$s = str_replace("C","",$s);
								$s = str_replace("PI","",$s);
								$s = str_replace("MU","",$s);
								$s = str_replace("PP","",$s);
								if (preg_match('/a-zA-Z/', $s)) $numerok = 0;

								if ($numerok==0)
								{
									$total_erros++;
									echo "<B>testar manualmente (1) $descricao_origem</B><BR>";
								}
								else
								{
									//echo "renumerar de $numero1 para $numero2<BR>";
									if (substr($numero2,0,2)=='PP') continue;
									if (substr($numero2,0,1)=='3') continue;
									$cmd = "SELECT * from pimupi WHERE numero1='$numero1' and numero2='$numero2'";
									$res = mysqli_query($link,$cmd);
									if (!($line=@mysqli_fetch_assoc($res))) 
									{
										$cmd = "insert into pimupi (numero1,numero2,data) VALUES ('$numero1','$numero2','$data')";
										echo "$cmd;<BR>";
									}

								}
							}
							else
							{
								 $total_erros++;
								 echo "<B>testar manualmente (2) $descricao_origem</B><BR>";
							}
							//exit();
							
						}
						//echo preg_replace('/[^A-Za-z0-9_]/', '', 'D"usseldorfer H"auptstrasse');
					}
				}
			}
			echo "Fim de processamento: $total ($total_erros)<BR>";
			exit();
		}

		if ($op==4) // https://localhost/central/control.php?action=7&op=4
		{
			$total=0;
			$total_erros=0;
			$cmd = "SELECT numero,data,descricao FROM revistas4 where (despacho='15.10' or despacho='15.12') and inid='co'";
			$res = mysqli_query($link,$cmd); 
			while (($line=@mysqli_fetch_assoc($res)))
			{
				$numero = trim($line['numero']);
				$numero = montar_numerosd(trim($numero));
				$data = trim($line['data']);
				$descricao = strtoupper(trim($line['descricao'])); // Pedido renumerado de BR102009034087-6 para PI0925426-9 
				$descricao_origem = $descricao;
				$descricao = str_replace("PARAMI","PARA MI",$descricao);
				$descricao = str_replace("PARAMU","PARA MU",$descricao);
				$descricao = str_replace("PARAPI","PARA PI",$descricao);
				//if ($numero=='MU8401415') echo "[1] $descricao<BR>";
				$descricao = str_replace(" PARA ",'*',$descricao); // Pedido renumerado de BR102009034087-6*PI0925426-9 
				//if ($numero=='MU8401415') echo "[1] $descricao<BR>";
				$descricao = str_replace(" PRA ",'*',$descricao); 
				$pos = strpos($descricao," DE ",0);
				if ($pos !== false) 
				{
					$descricao = substr($descricao,$pos); 
					//if ($numero=='MU8401415') echo "[1] $descricao<BR>";
					$descricao = str_replace("DE 07/12/2004.","",$descricao);
					//if ($numero=='MU8401415') echo "[1] $descricao<BR>";
					$descricao = str_replace("PATENTE DE INVENçãO PARA MODELO DE UTILIDADE","",$descricao);
					$descricao = str_replace("MODELO UTILIDADE","",$descricao);
					$descricao = str_replace("MODELO DE UTILIDADE","",$descricao);
					$descricao = str_replace("UTILIDA","",$descricao);
					$descricao = str_replace("DE ","",$descricao);
					$descricao = str_replace(" ","",$descricao);
					$descricao = str_replace("BR","",$descricao);
					$descricao = str_replace("NATUREZA","",$descricao);
					$descricao = str_replace("NATURZA","",$descricao);
					$descricao = str_replace("RENUMERADO","",$descricao);
					$descricao = str_replace("EMVIRTUDEDOEXAMETéCNICO","",$descricao);
					$descricao = str_replace("EMFACEDOEXAMETéCNICODADIQUIN","",$descricao);
					$descricao = str_replace("EMFACEDOEXAMETéCNICO","",$descricao);
					$descricao = str_replace("EMFACEDOEXAMETÉCNICO","",$descricao);
					$descricao = str_replace("EMFACEASOLICITAçãODOEXAMETéCNICO","",$descricao);
					$descricao = str_replace("EMFACEDACONCLUSãOAQUECHEGOUOEXAMETéCNICO","",$descricao);
					$descricao = str_replace("EMFACEASOLICITACAODOREQUERENTE","",$descricao);
					$descricao = str_replace("EMFACEASOLOCITAçãODOEXAMETéCNICO","",$descricao);
					$descricao = str_replace("EMFACEAMANIFESTACãODOREQUERENTE","",$descricao);
					$descricao = str_replace("EMFACEAMANIFESTAçãODOREQUERENTE","",$descricao);
					$descricao = str_replace("FACEASOLICITAçãODOREQUERENTE","",$descricao);
					$descricao = str_replace("FACEASOLICITAÇÃODOREQUERENTE","",$descricao);
					$descricao = str_replace("EMFACEDOPARECERTÉCNICO","",$descricao);
					$descricao = str_replace("EMFACEDOPARECERTéCNICO","",$descricao);
					$descricao = str_replace("EXAMETéCNICO","",$descricao);
					$descricao = str_replace("COMONOVONúMERO","",$descricao);
					$descricao = str_replace("PATENTEINVENÇÃO","",$descricao);
					$descricao = str_replace("COMANUMERAÇÃO","",$descricao);
					$descricao = str_replace("PORTERSIDONUMERADOINDEVIDAMENTE","",$descricao);
					$descricao = str_replace("PRIVILéGIOINVENçãO","",$descricao);
					$descricao = str_replace("PRIVILÉGIOINVENÇãO","",$descricao);
					$descricao = str_replace("INVENçãO","",$descricao);
					$descricao = str_replace("INVENÇÃO","",$descricao);
					$descricao = str_replace("INVENçAO","",$descricao);
					$descricao = str_replace("SOBONúMERO","",$descricao);
					$descricao = str_replace("SOBONÚMERO","",$descricao);
					$descricao = str_replace("SOBNUMERO","",$descricao);
					$descricao = str_replace("SOBONª","",$descricao);
					$descricao = str_replace("SOBONº","",$descricao);
					$descricao = str_replace("PATENTE","",$descricao);
					$descricao = str_replace("DO","",$descricao);
					$descricao = str_replace("(","",$descricao);
					$descricao = str_replace(")","",$descricao);
					$descricao = str_replace("Nº","",$descricao);
					$descricao = str_replace("PARA","",$descricao);
					$descricao = str_replace("PIPI","PI",$descricao);
					$descricao = str_replace("MUMU","MU",$descricao);
					$descricao = str_replace("SOBNúMERO","",$descricao);
					$descricao = str_replace("SOBONúMERO","",$descricao);
					$descricao = str_replace("SOBNÚMERO","",$descricao);
					$descricao = str_replace("SOBONÚMERO","",$descricao);
					$descricao = str_replace("SOBNº","",$descricao);
					$descricao = str_replace("SOB","",$descricao);
					$descricao = str_replace("TENEMVISTAQUEODESPACHOCóD.15.10DARPI251702/04/2019FOIINDEVI.","",$descricao);
					$descricao = str_replace("ONUMÉRO","",$descricao);
					$descricao = str_replace("MODELO","",$descricao);
					$descricao = str_replace("EANUMERAçãO*","",$descricao);
					$descricao = str_replace("REFERêNCIAPET.2007015898709/11/2007,*PI0017483-1","",$descricao);
					$descricao = str_replace("MU-","MU",$descricao);
					$descricao = str_replace("PI-","PI",$descricao);
					$descricao = str_replace("MI-","MI",$descricao);
					//if ($numero=='MU8401415') echo "[2] $descricao<BR>";
					
					$numerok = 0;
					$pos = strpos($descricao,"*",0);
					if ($pos !== false) $numerok = 1;
					
					if ($numerok==1)
					{
						$numero1='';$numero2='';
						list($numero1,$numero2) = explode('*',$descricao);
						$numerok = 1;
						$numero1 = str_replace(" ","",$numero1);
						$numero1 = str_replace(".","",$numero1);
						$numero1 = str_replace(",","",$numero1);
						$numero1 = str_replace(":","",$numero1);
						$numero2 = str_replace(" ","",$numero2);
						$numero2 = str_replace(".","",$numero2);
						$numero2 = str_replace(",","",$numero2);
						$numero2 = str_replace(":","",$numero2);
						$str1 = trim("$numero1");
						$str2 = trim("$numero2");
						
						$s = trim($str1);
						$s = str_replace("-","",$s);
						$s = str_replace("C","",$s);
						$s = str_replace("PI","",$s);
						$s = str_replace("MU","",$s);
						$s = str_replace("PP","",$s);
						$s = str_replace("MI","",$s);
						if (!(strlen($str1)==11 or strlen($str1)==14)) 
							$numero1 = $numero; // se não tem numero1 então é porque deve ser numero
						else
							if (!is_numeric($s)) $numero1 = $numero; // se não tem numero1 então é porque deve ser numero

						$s = trim($str2);
						$s = str_replace("-","",$s);
						$s = str_replace("C","",$s);
						$s = str_replace("PI","",$s);
						$s = str_replace("MU","",$s);
						$s = str_replace("PP","",$s);
						$s = str_replace("MI","",$s);
						if (!is_numeric($s)) $numerok=0;

						if ($numerok==0)
						{
							$total_erros++;
							echo "<B>ignorando este despacho:</B> $descricao_origem<BR>";
						}
						else
						{
							$numero1 = montar_numerosd(trim($numero1));
							$numero2 = montar_numerosd(trim($numero2)); // PI9001234 112014123456
							if (substr($numero2,0,2)=='PP') continue;
							if (substr($numero2,0,1)=='3') continue;
							$cmd2 = "SELECT * from pimupi WHERE numero1='$numero1' and numero2='$numero2'"; 
							$res2 = mysqli_query($link,$cmd2);
							if (!($line2=@mysqli_fetch_assoc($res2))) 
							{
								$numero2 = str_replace("-","",$numero2);
								if (strlen($numero2)==9 or strlen($numero2)==12)
								{
									if ($numero1<>$numero2)
									{
										$cmd2 = "insert into pimupi (numero1,numero2,data) VALUES ('$numero1','$numero2','$data')";
										echo "$cmd2; <BR>[$numero] $descricao_origem<BR>";
									}
								}
							}
						}
					}
					else
					{
						$total_erros++;
						echo "[$numero] <B>ignorando este despacho:</B> $descricao_origem<BR>";
					}
				}
			}
			echo "Fim de processamento: $total ($total_erros)<BR>";
			exit();
		}
		
	}
        
    if ($action==6) // // https://localhost/central/control.php?action=6
    {
/*
SELECT 
    NO_RPI,DT_PUBLICA_PTN 
FROM 
    CEPIT_SINPI.CRP_PROGRAMA_RPI 
ORDER BY NO_RPI DESC

para obter as datas de todas as rpis.csv
*/
        $total=0;
        $total_erro=0;
        $cmd = "SELECT * from rpis_cepit WHERE 1 ORDER BY rpi DESC";
        $res = mysqli_query($link,$cmd);
        while ($line=@mysqli_fetch_assoc($res))
        {
            $total++;
            $rpi = $line['rpi'];
            $data = $line['data'];
            $cmd1 = "SELECT * from rpis_lidas WHERE rpi=$rpi";
            $res1 = mysqli_query($link,$cmd1);
            if ($line1=@mysqli_fetch_assoc($res1))
            {    
                $data1 = $line1['data'];
                if ($data<>$data1)
                {
                    echo "RPI $rpi $data no CEPIT e $data1 em rpis lidas<BR>";
                    $total_erro++;
                }
            }
            else
                echo "Não encontrei RPI $rpi na tabela rpis_lidas <BR>";
        }
        echo "Fim processamento: $total ($total_erro)<BR>";

        $total=0;
        $total_erro=0;
        $cmd = "SELECT * from rpis_lidas WHERE 1 ORDER BY rpi DESC";
        $res = mysqli_query($link,$cmd);
        while ($line=@mysqli_fetch_assoc($res))
        {
            $total++;
            $rpi = $line['rpi'];
            $data = $line['data'];
            $cmd1 = "SELECT * from rpis_cepit WHERE rpi=$rpi";
            $res1 = mysqli_query($link,$cmd1);
            if ($line1=@mysqli_fetch_assoc($res1))
            {    
                $data1 = $line1['data'];
                if ($data<>$data1)
                {
                    echo "RPI $rpi $data em rpis_lidas e $data1 no CEPIT<BR>";
                    $total_erro++;
                }
            }
            else
                echo "Não encontrei RPI $rpi na tabela CEPIT <BR>";
        }
        echo "Fim processamento: $total ($total_erro)<BR>";
        
        exit();
    }
            
	
    if ($action==5) // https://localhost/central/control.php?action=5
    {
        $total = 0;
        //$cmd1 = "SELECT * from publicados WHERE lower(depositante) like '%senai%br/ba%'";
        $cmd1 = "SELECT * from publicados WHERE lower(depositante) like '%embrapi%'";
        $res = mysqli_query($link,$cmd1);
        while ($line=@mysqli_fetch_assoc($res))
        {
            $total++;
            $numero = $line['numero'];
            $depositante = $line['depositante'];
            $data = $line['data_deposito'];
            echo "$numero<BR>$depositante<BR>$data<BR><BR>";
        }
        echo "Fim procedimento: $total";
        exit();
    }
            
    if ($action==4)
    {
        echo "Início: ".date("H:i")."<BR>";
        if ($op==1) // https://localhost/central/control.php?action=4&op=1
        {
            $total = 0;
            $total_insert = 0;
            $cmd = '';
            $fname="despachos2021.csv";
            @ $fp = fopen($fname,"r");
            if (!$fp)
                echo "Não foi identificado o arquivo texto $fname";
            else
            {
                while (!feof($fp))
                {
                    $texto= fgets($fp);
                    $texto = trim($texto); // "PI9705268   ";2620;"2021-03-23 00:00:00";"24.10   ";(null)
                    $total++;
                    if ($total==1) continue; // pule primeira linha
                    $texto = str_replace('"','',$texto);
                    $texto = str_replace("'",'',$texto);
                    list($numero,$rpi,$data,$despacho,$anulado) = explode(';',$texto);
                    $numero = trim($numero);
                    $rpi = trim($rpi);
                    $data = substr(trim($data),0,10);
                    $despacho = trim($despacho);
                    //echo "$numero $rpi $data $despacho $anulado<BR>";

                    if ($total_insert%300==0) 
                    {
                        if ($total_insert>0)
                        {
                            $pos = strrpos($cmd,",");
                            $cmd = substr_replace($cmd,";",$pos);
                            $res = mysqli_query($link, $cmd);
                            echo "$cmd<BR>";//exit();
                        }
                        $cmd = "INSERT INTO arquivados2 (despacho, numero, data, divisao, anulado, prmexame) VALUES";
                        $cmd = $cmd." ('$despacho', '$numero',  '$data', '', 0, 0),";
                    }
                    else
                        $cmd = $cmd." ('$despacho', '$numero',  '$data', '', 0, 0),";

                    $total_insert++;
                }
                echo "Fim de processamento: $total<BR>";
            }
        }
        
        if ($op==2) // https://localhost/central/control.php?action=4&op=2
        {
            // DELETE FROM arquivados2 WHERE (numero like 'DI%' or numero like 'MI%' or numero like '30%' or numero like '31%' or numero like '32%')
            // UPDATE arquivados SET data='2021-06-22' WHERE data='2021-06-21'
            // UPDATE publicados SET data='2021-06-22' WHERE data='2021-06-21'
            // UPDATE publicados SET dataout='2021-06-22' WHERE dataout='2021-06-21'
            // UPDATE rpis_lidas SET data = '2021-06-22', data_eparecer = '2021-06-22', data_ecarta = '2021-06-22' WHERE rpis_lidas.rpi = 2633;
            
            // PI0311684 25.1 2021-11-30 publicação futura. elimine do teste datas futuras

            // crie tabela somente com campo co de recursos para usar no action=142 para o TCU
            // conferir todos 15.10 e 15.12 no pimupi lendo dados de revistas / revistas4
            
			// carrega inid=de ou inid=co na tabela revistas4
			// SELECT numero,data,despacho,inid,descricao FROM revistas where (despacho in ('PR - Recursos','PR - Nulidades','200','201','204','PR - Cancelamentos','PR - Nulidade','PR - Cancelamento','PR - Nulidades','15.10')) and (inid='co' or inid='de')
			
            // erros em 2021
            /*
            */
            
            $total=0;
            $hoje=date('Y-m-d');

            if ($rpi==0)
            {
                echo "mês $mes de $ano<BR>";
                $cmd = "SELECT * from arquivados2 WHERE month(data)=$mes and year(data)=$ano and data<'2021-11-19'"; // a geração de arquivados2 é 2021-11-19, logo elimine datas futuras, Ele foi carregado com os despachos do CEPIT.
            }
            else
            {
                $cmd = "select * from rpis_lidas where rpi=$rpi";
                $res = mysqli_query($link,$cmd);
                if ($line=@mysqli_fetch_assoc($res)) $data = $line['data'];
                 $cmd = "SELECT * from arquivados2 WHERE data='$data'";
            }
            
            $recursos = array('100','102','103','104','106','111','112','113','115','116','120','121','130','131','132','133','134','135','136','137','138','139','140','141');
            $nulidades = array('200','201','204','205','206','210','211','212','213','214','215','216','217','218','219','220');
            
            $res = mysqli_query($link,$cmd);
            while ($line=@mysqli_fetch_assoc($res))
            {
                $total++;
                $numero = $line['numero'];
                $despacho1 = $line['despacho'];
                $data = $line['data'];
                
                $numero1 = $numero;
                $numero2 = $numero;
                $cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
                $res2 = mysqli_query($link, $cmd2);
                if ($line2 = mysqli_fetch_assoc($res2))
                {
				    $numero1 = $line2["numero1"];
				    $numero2 = $line2["numero2"];
                }
                
                $despacho2 = $despacho1;
                if (in_array($despacho1,$recursos)) $despacho2 = "PR - Recursos";
                if (in_array($despacho1,$nulidades)) $despacho2 = "PR - Nulidades";
                
                $cmd1 = "SELECT * from arquivados WHERE data='$data' and (numero='$numero1' or numero='$numero2') and (despacho='$despacho1' or despacho='$despacho2')";
                $res1 = mysqli_query($link,$cmd1);
                if (!($line1=@mysqli_fetch_assoc($res1))) echo "$numero $despacho $data $cmd1<BR>";
            }
            echo "Fim de processamento: $total<BR>";
        }

        echo "Término: ".date("H:i")."<BR>";
        exit();
    }
            
    if ($action==3)
    {
		// SELECT assunto,count(*) FROM `citacoes` WHERE 1 group by assunto ORDER BY `count(*)` DESC
		// SELECT * FROM `citacoes_autor` WHERE autor not in (select autor from citacoes)
		// SELECT * FROM `citacoes` WHERE autor not in (select autor from citacoes_autor)
		
        $total=0;$assunto='';$exibir=1;
		/*
        $cmd = "SELECT distinct(autor) from citacoes WHERE autor not in (select autor from citacoes_autor)";
        $res = mysqli_query($link,$cmd);
        while ($line=@mysqli_fetch_assoc($res))
        {
            $autor = $line['autor'];
			$cmd2 = "INSERT INTO `citacoes_autor` (`autor`, `profissao`, `nascimento`, `falecimento`, `ac`) VALUES ('$autor', '', '', '', 0)";
			echo "$cmd2;<BR>";
		}
		exit();*/

        $cmd = "SELECT * from citacoes WHERE assunto <> '' order by assunto,autor";
        $res = mysqli_query($link,$cmd);
        while ($line=@mysqli_fetch_assoc($res))
        {
            $id = $line['id'];
            $autor = $line['autor'];
            $texto = $line['texto'];
			$assunto_antigo = $assunto;
            $assunto = $line['assunto'];
			$txt = '';
			if ($assunto<>$assunto_antigo) 
			{
				$total=0;
				$exibir=1;
				$txt = $assunto;
			}
			if ($exibir==1) 
			{
				$aux = "$autor";
				$cmd2 = "SELECT * from citacoes_autor WHERE autor='$autor'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$profissao = $line2['profissao'];
					$nascimento = $line2['nascimento'];
					$falecimento = $line2['falecimento'];
					$ac = $line2['ac'];
					if ($falecimento>0)
					{
						if ($ac==0)
							$aux = "$autor, $profissao ($nascimento-$falecimento)";
						else
							$aux = "$autor, $profissao ($nascimento-$falecimento a.c.)";
					}
					else
					{
						if ($ac==0)
							$aux = "$autor, $profissao ($nascimento)";
						else
							$aux = "$autor, $profissao ($nascimento)";
					}
				}
				$total++;
				echo "<h2>$txt</h2><BR>$texto<BR>$aux<BR><BR>";
				//$cmd2 = "update citacoes set livro=1 where id=$id";
				//echo "$cmd2;<BR>";
			}
			if ($total%42 == 0) // 12 assuntos x 42 cada assunto = 504 citações
			{
				$total--;
				$exibir=0;
			}
        }
        echo "Fim de processamento: $total<BR>";
        exit();

    }

            
	if ($action==2)
	{
        $inicio = date("H:i");
        $fname = "..\..\mysql\bin\arquivados2.sql";
        if ( file_exists($fname) ) 
        {
            //$arquivo = file_get_contents($fname);
            /*
            $handle = file($fname);
            foreach ($handle as $linha) // Fatal error: Allowed memory size of 536870912 bytes exhausted (tried to allocate 134217736 bytes)
            {
                $ler = $linha;
                echo $ler;exit();
            }*/
            
            $total=0;$resto="";$bloco=0;
            $rHandle = fopen($fname, 'r');
            while(false === feof($rHandle))
            {
                $bloco = $bloco+1;
                echo "Bloco #$bloco<BR>";
                $sSegment = fread($rHandle, 50000); // 100000
                //$sSegment = file_get_contents('./people.txt', FALSE, NULL, 20, 14);
                //echo "resto $resto<BR>";
                $sSegment = $resto.$sSegment;
                $sSegment = str_replace(";",",",$sSegment);
                $sSegment = str_replace("'","",$sSegment);
                $sSegment = str_replace("`","",$sSegment);
                $sSegment = str_replace("NULL, ","NULL,",$sSegment);
                $sSegment = str_replace(", NULL",",NULL",$sSegment);
                $ler = 1;
                if ($total==0)
                {
                    $pos = strpos($sSegment,"INSERT INTO arquivados");
                    $pos = $pos+strlen("INSERT INTO arquivados (despacho, numero, data, divisao, anulado, prmexame) VALUES");
                    $sSegment = substr($sSegment,$pos);
                }
                $sSegment = str_replace("INSERT INTO arquivados (despacho, numero, data, divisao, anulado, prmexame) VALUES","",$sSegment);
                $sSegment = str_replace("INSERT INTO arquivados (id, despacho, numero, data, divisao, anulado, prmexame) VALUES","",$sSegment);
                $pos = 0;
                //echo $sSegment;exit();
                while ($ler)
                {
                    $pos1 = strpos($sSegment,"(",$pos);
                    if ($pos1 !== false) 
                    {
                        $pos2 = strpos($sSegment,")",$pos);
                        if ($pos2 !== false) 
                        { 
                            $linha = substr($sSegment,$pos1+1,$pos2-$pos1-1);//echo "$pos $pos1 $pos2 $linha<BR>";//exit();
                            $pos = $pos2+1;
                            list($despacho,$numero,$data,$divisao,$anulado,$prmexame) = explode(',',$linha);
                            $despacho = trim($despacho);
                            $numero = trim($numero);
                            $data = trim($data);
                            $divisao = trim($divisao);
                            $anulado = trim($anulado);
                            $prmexame = trim($prmexame);
                            if ($data =='0000-00-00') $data=null;
                            //echo "$despacho,$numero,$data,$divisao,$anulado,$prmexame<BR>";exit();

                            //verifica se deve fazer insert ou update
                            $update = 0;
                            $insert = 0;
                            $cmd1 = "select * from arquivados where numero='$numero' and despacho='$despacho' and data='$data'";
                            $res = mysqli_query($link,$cmd1);//echo "$cmd1<BR>";
                            if ($line=@mysqli_fetch_assoc($res))
                            {
                                $id = $line['id'];
                                $divisao1 = $line['divisao'];
                                $anulado1 = $line['anulado'];
                                $prmexame1 = $line['prmexame'];
                                if ($divisao<>$divisao1 or $anulado<>$anulado1 or $prmexame<>$prmexame1) $update = 1;
                            }
                            else
                                $insert = 1;

                            //echo "$pos $id $total $numero $update $insert $divisao $divisao1, $anulado $anulado1, $prmexame $prmexame1<BR>";//exit();
                            if ($total==50000) // 50 mil em 3 minutos, para 4 milhões de registros = 4 horas !!
                            {
                                echo "Início: $inicio<BR>";
                                echo "Final: ".date("H:i")."<BR>";
                                echo "Total: $total<BR>";
                                exit();
                            }

                            if ($update)
                            {
                                $cmd1 = "UPDATE arquivados SET divisao='$divisao', anulado = $anulado, prmexame=$prmexame WHERE id = $id";
                                //$res = mysqli_query($link, $cmd1);
                                echo "$cmd1<BR>";
                            }
                            elseif ($insert)
                            {
                                $cmd1 = "INSERT INTO arquivados (id, despacho, numero, data, divisao, anulado, prmexame) VALUES";
                                $cmd1 = $cmd1." (null,'$despacho', '$numero',  '$data', '$divisao', '$anulado', '$prmexame');";
                                //$res = mysqli_query($link, $cmd1);
                                echo "$cmd1<BR>";
                            }

                            $total++;
                        }
                        else
                        {
                            $resto = substr($sSegment,$pos);
                            //echo "encerrou bloco ! $resto<BR>";//exit();
                            $ler = 0;
                        }
                    }
                    else
                    {
                        $resto = substr($sSegment,$pos);
                        //echo "encerrou bloco ! $resto<BR>";//exit();
                        $ler = 0;
                    }
                }
                //echo "encerrou bloco (*)<BR>";
            }
            fclose($rHandle);
        }
        echo "Fim de processamento:<BR>";
        exit();
    }

    if ($action==1)
	{
        $procura_inicio = 1;
		echo "Rotina para segmentar comandos insert arquivados";
		exit();
        
        $cmd = "";
        $fname="..\..\mysql\bin\arquivados2.sql";
        @ $fpr = fopen($fname,"r");
        if (!$fpr)
            echo "Não foi identificado o arquivo texto $fname";
        else
        {
            $total = 0;
            $total_insert = 0;
            while (!feof($fpr))
            {
                $detectado_insert = 0;
                $linha = trim(fgets($fpr)); //echo "$linha<BR>";
                $pos1 = strpos($linha,"INSERT INTO `arquivados`");
                if ($pos1 !== false) {
                    $procura_inicio = 0; // a partir de agora será sempre 0
                    $detectado_insert = 1;
                }
                if ($procura_inicio) continue;
                if ($detectado_insert) continue;
                
                $linha = str_replace(";",",",$linha);
                $linha = str_replace("('","",$linha);
                $linha = str_replace("')","",$linha);
                $linha = str_replace("),","",$linha);
                $linha = str_replace("', '",";",$linha);
                $linha = str_replace("'","",$linha);
                $linha = str_replace(",",";",$linha);
                $linha = str_replace("NULL,","NULL;",$linha);
                $linha = str_replace(", NULL",";NULL",$linha);
                //echo $linha;exit();

                if ($total < 0) // teste para ler os ascii de cada caracter
                {
				    for ($k=0;$k<=strlen($linha);$k++)
				    {
				        $valor = ord(substr($linha,$k,1));
                        if ($valor==59)
                            echo "(;)  ";
                        else
                            echo "$valor ";
                    }
                    echo "$linha<BR>";
                }
                list($despacho,$numero,$data,$divisao,$anulado,$prmexame) = explode(';',$linha);
                $despacho = trim($despacho);
                $numero = trim($numero);
                $data = trim($data);
                $divisao = trim($divisao);
                $anulado = trim($anulado);
                $prmexame = trim($prmexame);
                
                if ($data =='0000-00-00') $data=null;

                //verifica se deve fazer insert ou update
                $update = 0;
                $insert = 0;
                $cmd1 = "select * from arquivados where numero='$numero' and despacho='$despacho' and data='$data'";
                $res = mysqli_query($link,$cmd1);//echo "$cmd1<BR>";
                if ($line=@mysqli_fetch_assoc($res))
                {
                    $id = $line['id'];
                    $divisao1 = $line['divisao'];
                    $anulado1 = $line['anulado'];
                    $prmexame1 = $line['prmexame'];
                    if ($divisao<>$divisao1 or $anulado<>$anulado1 or $prmexame<>$prmexame1) $update = 1;
                }
                else
                    $insert = 1;
                
                echo "$total $numero $update $insert $divisao $divisao1, $anulado $anulado1, $prmexame $prmexame1<BR>";
                    
                if ($update)
                {
                    $cmd1 = "UPDATE arquivados SET divisao='$divisao', anulado = $anulado, prmexame=$prmexame WHERE id = $id";
                    $res = mysqli_query($link, $cmd1);
                    echo "$cmd1<BR>";
                }
                elseif ($insert)
                {
                    if ($total_insert%1000==0) 
                    {
                        if ($total_insert>0)
                        {
                            $pos = strrpos($cmd,",");
                            $cmd = substr_replace($cmd,";",$pos);
                            //$res = mysqli_query($link, $cmd);
                            echo "$cmd<BR>";exit();
                        }
                        $cmd = "INSERT INTO arquivados (id, despacho, numero, data, divisao, anulado, prmexame) VALUES";
                        $cmd = $cmd." (null,'$despacho', '$numero',  '$data', '$divisao', '$anulado', '$prmexame'),";
                    }
                    else
                    {
                        $cmd = $cmd." (null,'$despacho', '$numero',  '$data', '$divisao', '$anulado', '$prmexame'),";
                    }
                    $total_insert++;
                }

                $total++;
                if ($total<0) 
                {
                    echo "Término: ".date("H:i")."<BR>";
                    exit();
                }
                if ($total%10000==0) echo "$total/10000". date("H:i")."<BR>";
            }
            
            $pos = strrpos($cmd,",");
            $cmd = substr_replace($cmd,";",$pos);
            //$res = mysqli_query($link, $cmd);
            echo "$cmd<BR>";
        }
        fclose($fpr);
        echo "Término: ".date("H:i")."<BR>";
        echo "<BR><BR>Fim de processamento $total";
        exit();
    }
	
	if ($action==142)
	{

		// estas rotinas fazem a leitura do campo de comentarios (indi=co ou indi=de) para se detectar recursos prejudicados, etc. Para tanto a tabela revistas estava com problema
		// porque estava muito grande. Optou-se então por criar a tabela revistas4 que guarda apenas os inid=co e inid=de
		// os dados foram coletados pelo MySQL Browser acessando a tabela do SISCAP online que não está corrompida
		// SELECT numero,data,despacho,descricao FROM revistas where (despacho in ('PR - Recursos','PR - Nulidades','200','201','204','PR - Cancelamentos','PR - Nulidade','PR - Cancelamento','PR - Nulidades','15.10')) and (inid='co' or inid='de')
		// foi salvo um csv e carregado pelo Notepad++ para salvar como utf-8
		// o arquivo CSV foi feito o import pelo phpmyadmin por partes
		// se fizer pelo diretorio mysql/bin mysql -u root -D producao --password="" -f < csv.sql
		// sendo csv.sql: LOAD DATA INFILE 'revistas4utf8a.csv' INTO TABLE revistas4 FIELDS TERMINATED BY ';' LINES TERMINATED BY '\n'
		// ele lê o csv numa unica vez em pucos segundos, mas perde os acentos. A unica maneira de preservar os acentos foi gravando no Notepad++ como UTF8 e fazendo o import pelo phpmyadmin
		// o loadarq faz a atualizção da tabela revistas4

		// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from pedido where year(rpi)>=2020 and ( (instancia='recurso' and decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso provido anvisa')) or (instancia='nulidade' and decisao in ('nulidade provida','nulidade parcial','nulidade negada')) or (instancia='nulidade cgrec' and decisao in ('nulidade 200','nulidade 201','nulidade 204')) or (instancia='recurso cgrec' and decisao in ('recurso 111')))  and anulado=0
		// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from CEPIT_SISCAP.SISCAP_PEDIDO where instancia in ('recurso cgrec','nulidade cgrec','recurso','nulidade') and extract(year from rpi)>=2020 and anulado=0
		// salva em pedido.csv
		// SELECT * FROM examinador where year(data)>=2021 and email<>'sisadanu'
		// select * from CEPIT_SISCAP.SISCAP_EXAMINADOR where  email<>'sisadanu' and extract(year from data)>=2020
		// salva em examinador.csv
		// http://localhost/forum3_central_4.php?action=1
		// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from pedido where year(rpi)>=2020 and decisao in ('9.2','indeferimento','deferimento','defanvisa') and anulado=0
		// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from CEPIT_SISCAP.SISCAP_PEDIDO where decisao in ('9.2','indeferimento','deferimento','defanvisa') and extract(year from rpi)>=2020 and anulado=0
		// salva em pedido.csv
		// http://localhost/forum3_central_4.php?action=1
		
		// geração TCU_12_2.csv
		// 1) Inicialmente foi conferido manualmente todos os 12.2 indicados como anulados
		// SELECT * FROM `arquivados` WHERE despacho='12.2' and anulado>0
		// o 12.2 pode ser anulado por 12.7, ou por 'PR - Recursos', [co] = [131] Anulada a publicação PI0108115, Anuladas as pulicações PI9006409,

		// 2) pesquisados despachos 12.7 que tenham um 12.2 anterior ($op=40) e não tenham sido anulados em arquivados
		// http://localhost/teste.php?action=142&op=40

		// 3) pesquisados despachos 'PR - Recursos' que tenham 'Anulada a publicação' que tenham 12.2 anterior e não tenham sido anulados em arquivados
		// por exemplo PI 0108115-2
		// http://localhost/teste.php?action=142&op=41
		// http://localhost/teste.php?action=142&op=41&tipo=2
		// http://localhost/teste.php?action=142&op=41&tipo=3

		// 4) atualiza o campo divisao da tabela publicados
		// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from pedido where decisao in ('9.2','indeferimento') and year(rpi)>=2020
		// grave update8.csv apague a primeira linha
		// http://localhost/teste.php?action=58
		// http://localhost/teste.php?action=142&op=39

		// 5) Identificados pedidos com dois 12.2 ativos
		// http://localhost/teste.php?action=142&op=38
		// SELECT * FROM arquivados where despacho ='12.2' and anulado =0 and year(data)>1996 group by numero , despacho having count(*)>1  ORDER BY `arquivados`.`data` ASC

		// 6) gerada CSV com lista de recursos 12.2 pendentes
		// http://localhost/teste.php?action=142&op=42


		// geração TCU_12_3.csv
		// 1) Inicialmente foi conferido manualmente todos os 12.3 indicados como anulados
		// SELECT * FROM `arquivados` WHERE despacho='12.3' and anulado>0
		// o 12.3 pode ser anulado por 12.7, ou por 'PR - Recursos', [co] = [135] Anulada a publicação

		// 2) pesquisados despachos 12.7 que tenham um 12.3 anterior ($op=37) e não tenham sido anulados em arquivados
		// http://localhost/teste.php?action=142&op=37

		// 3) pesquisados despachos 'PR - Recursos' que tenham 'Anulada a publicação' ou 'Prejudicada' que tenham 12.3 anterior e não tenham sido anulados em arquivados
		// http://localhost/teste.php?action=142&op=36

		// 4) gerada lista de recursos pendentes 12.3
		// http://localhost/teste.php?action=142&op=35


		// geração TCU_12_6.csv
		// 1) Inicialmente foi conferido manualmente todos os 12.6 indicados como anulados
		// SELECT * FROM `arquivados` WHERE despacho='12.6' and anulado>0
		// o 12.6 pode ser anulado por 12.7, ou por 'PR - Recursos', [co] = [135] Anulada a publicação

		// 2) pesquisados despachos 12.7 que tenham um 12.6 anterior ($op=37) e não tenham sido anulados em arquivados
		// http://localhost/teste.php?action=142&op=37

		// 3) pesquisados despachos 'PR - Recursos' que tenham 'Anulada a notificação' ou 'Prejudicada' que tenham 12.6 anterior e não tenham sido anulados em arquivados
		// http://localhost/teste.php?action=142&op=36

		// 4) gerada lista de recursos pendentes 12.6
		// http://localhost/teste.php?action=142&op=34


		// geração TCU_17_1.csv
		// 1) Inicialmente foi conferido manualmente todos os 17.1 indicados como anulados
		// SELECT * FROM `arquivados` WHERE despacho='17.1' and anulado>0
		// o 17.1 pode ser anulado por 17.2 ou 'PR - Nulidades', [co] = [220] Anulada a publicação

		// 2) pesquisados despachos 17.2 que tenham um 17.1 anterior e não tenham sido anulados em arquivados
		// http://localhost/teste.php?action=142&op=33

		// 3) pesquisados despachos 'PR - Nulidades' que tenham 'Anulada a publicação' que tenham 17.1 anterior e não tenham sido anulados em arquivados
		// http://localhost/teste.php?action=142&op=32

		// 4) atualiza o campo divisao da tabela publicados
		// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from pedido where decisao in ('deferimento','defanvisa') and year(rpi)>=2020
		// grave update8.csv apague a primeira linha
		// http://localhost/teste.php?action=58
		// http://localhost/teste.php?action=142&op=31

		// 5) gerada lista de nulidade pendentes 17.1
		// http://localhost/teste.php?action=142&op=30

		// Obs: estas rotinas como action=30 quando acessam tabela revistas não testam se este despacho não foi anulado, teria de fazer um join com arquivados !

		if ($op==29) // http://cientistaspatentes.com.br/central/control.php?action=142&op=29&tipo=nulidade
		{
		// quando tem dois 9.1 normalmente a tabela pedido só tem um deles, e as vezes é o que foi anulado 112014022905 foi 9.1 republicado 
		// pedidos com 9.1 mas ausentes em pedido
		// ou pode ser um 9.1 que saiu na revista errado mas nao tem nenhum parecer deferimento em pedido mesmo, foi erro no despacho
		// SELECT * FROM arquivados WHERE year(data)>2010 and despacho='9.1' and anulado=0 and numero not in (select numero from pedido where decisao in ('deferimento','defanvisa') and anulado=0)
			$despacho_base = $tipo; // tipo = 9.1, 9.2, 6.1, 7.1 
			if ($despacho_base=='9.1') $decisao_base = "'deferimento','defanvisa'";
			if ($despacho_base=='9.2') $decisao_base = "'indeferimento','9.2'";
			if ($despacho_base=='6.1') $decisao_base = "'exigencia'";
			if ($despacho_base=='7.1') $decisao_base = "'ciencia de parecer'";
			if ($despacho_base=='recurso') 
			{
				$despacho_base = 'PR - Recursos';
				$instancia_base = "'recurso','recurso cgrec'";
			}
			if ($despacho_base=='nulidade') 
			{
				$despacho_base = 'PR - Nulidades';
				$instancia_base = "'nulidade','nulidade cgrec'";
			}

			$total = 0;
			$cmd = "SELECT * FROM arquivados WHERE year(data)=$ano and despacho='$despacho_base'";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$total++;
				$numero = $line['numero'];
				$despacho = $line['despacho'];
				$data = $line['data'];
				$anulado = $line['anulado'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				
				if ($despacho_base=='PR - Recursos' or $despacho_base=='PR - Nulidades')
					$cmd2 = "SELECT * FROM pedido WHERE (numero='$numero1' or numero='$numero2') and rpi='$data' and instancia in ($instancia_base)";
				else
					$cmd2 = "SELECT * FROM pedido WHERE (numero='$numero1' or numero='$numero2') and rpi='$data' and decisao in ($decisao_base)";

				$res2 = mysqli_query($link,$cmd2);
				$achei = 0;
				while ($line2=@mysqli_fetch_assoc($res2))
				{
					$achei = 1;
					$anulado2 = $line2['anulado']; // na tabela pedido se anulado ele aparece como anulado=1
					if ($anulado<>$anulado2) 
					{
						if ($despacho_base=='PR - Recursos' or $despacho_base=='PR - Nulidades')
							$cmd2 = "update pedido set anulado=$anulado where (numero='$numero1' or numero='$numero2') and rpi='$data' and instancia in ($instancia_base)";
						else
							$cmd2 = "update pedido set anulado=$anulado where (numero='$numero1' or numero='$numero2') and rpi='$data' and decisao in ($decisao_base)";
						$res2 = mysqli_query($link,$cmd2);
						echo "$cmd2;<BR>";
					}
				}
				if ($achei==0) // despacho não existe na tabela pedido, se for despacho anulado ok não é para ter mesmo, mas verifique
				{
					echo "$numero $despacho $data não encontrado na tabela pedido <BR>";
				}
			}
			
			echo "Fim de processamento(1): $total<BR>";
			if ($despacho_base=='PR - Recursos' or $despacho_base=='PR - Nulidades')
				$cmd = "SELECT * FROM pedido WHERE year(rpi)=$ano and instancia in ($instancia_base)";
			else
				$cmd = "SELECT * FROM pedido WHERE year(rpi)=$ano and decisao in ($decisao_base)";

			$total = 0;
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$total++;
				$numero = $line['numero'];
				$decisao = $line['decisao'];
				$data = $line['rpi'];
				$anulado = $line['anulado'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "SELECT * FROM arquivados WHERE (numero='$numero1' or numero='$numero2') and data='$data' and despacho='$despacho_base'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))	
				{
					$anulado2 = $line2['anulado']; // na tabela pedido se anulado ele aparece como anulado=1
					if ($anulado2<>$anulado) 
					{
						if ($despacho_base=='PR - Recursos' or $despacho_base=='PR - Nulidades')
							$cmd2 = "update pedido set anulado=$anulado2 where (numero='$numero1' or numero='$numero2') and rpi='$data' and instancia in ($instancia_base)";
						else
							$cmd2 = "update pedido set anulado=$anulado2 where (numero='$numero1' or numero='$numero2') and rpi='$data' and decisao in ($decisao_base)";

						$res2 = mysqli_query($link,$cmd2);
						echo "$cmd2;<BR>";
					}
				}
				else
				{
					echo "$numero $despacho_base $data não encontrado na tabela arquivados<BR>";
				}
			}
			echo "Fim de processamento(2): $total<BR>";
			exit();
		}
		
		if ($op==30) // http://localhost/teste.php?action=142&op=30
		{
			$total=0;$total_pendentes=0;$total_concluido=0;$total_anulado=0;$total_acao=0;
			$numero_lidos = array();
			//$cmd = "SELECT * FROM arquivados where numero='PI0916201' and despacho='17.1' and year(data)>=1997 order by data asc";
			$cmd = "SELECT * FROM arquivados where despacho='17.1' and year(data)>=1997 order by data asc";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$numerobr = $numero;
				if (strlen($numerobr)==12){
					$numerobr = 'BR'.$numerobr;
				}
				$anulado = $line['anulado'];

				$data = $line['data']; // data do 17.1
				if (in_array($numero,$numero_lidos)) continue;

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
				$dataout = null;
				$data_decisao = null;
				$data_deposito = null;
				$situacao = '';
				$cmd2 = "SELECT * from publicados WHERE (numero='$numero1' or numero='$numero2')";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$situacao = trim($line2['despacho_out']);
					$dataout = $line2['dataout'];
					$data_deposito = $line2['data_deposito'];
					$idivisao = $line2['divisao']; // a divisão que será considerada será a carrega na tabela publicados
				}

				//$cmd2 = "select * from pedidos where (numero='$numero1' or numero='$numero2') and decisao in ('9.2','indeferimento')";
				//$res2 = mysqli_query($link,$cmd2);
				//if ($line2=@mysqli_fetch_assoc($res2)) $idivisao = $line2['divisao'];

				$idivisao = strtoupper($idivisao);
				if ($anulado>0) // este 17.1 foi anulado, verifique se depois ou antes dele existe um 17.1 válido não anulado
				{
					$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='17.1' and anulado=0";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) continue; // se existe um 17.1 válido não sinalize este pedido como tendo 17.1 anulado
					$situacao = 'ANULADO';
					$total_anulado++;
				}
				else
				{

					$anulado = 1; // teste se depois deste 17.1 válido teve alguma decisão de nulidade posterior
					$cmd2 = "select * from revistas4 where (numero='$numerocd1' or numero='$numerocd2') and data>'$data' and (inid='co' or inid='de') and despacho in ('PR - Nulidades','200','201','204','PR - Cancelamentos','PR - Nulidade','PR - Cancelamento','PR - Nulidades') and (descricao like '%[200]%' or descricao like '%[201]%' or descricao like '%[204]%' or lower(descricao) like '%egado o provimento%' or lower(descricao) like '%egado provimento%' or lower(descricao) like '%antido a concessão%' or lower(descricao) like '%antida a concessão%' or lower(descricao) like '%antida a concessão%' or lower(descricao) like '%provida parcialmente%' or lower(descricao) like '%nulada a patente%' or lower(descricao) like '%ulidade conhecida e  provida%' or lower(descricao) like '%ulidade conhecida e provida%' or lower(descricao) like '%nulado o privilégio%')";
					//$cmd2 = "select * from revistas as r JOIN arquivados as a ON substring_index(r.numero,'-',1)=a.numero and r.data=a.data and a.despacho=r.despacho where (r.numero='$numerocd1' or r.numero='$numerocd2') and a.anulado=0 and r.data>'$data' and (r.inid='co' or r.inid='de') and r.despacho in ('PR - Nulidades','200','201','204','PR - Cancelamentos','PR - Cancelamento','PR - Nulidade','PR - Nulidades') and (r.descricao like '%[200]%' or r.descricao like '%[201]%' or r.descricao like '%[204]%' or lower(r.descricao) like '%egado o provimento%' or lower(r.descricao) like '%egado provimento%' or lower(r.descricao) like '%antido a concessão%' or lower(r.descricao) like '%antida a concessão%' or lower(r.descricao) like '%antida a concessão%' or lower(r.descricao) like '%provida parcialmente%' or lower(r.descricao) like '%nulada a patente%' or lower(r.descricao) like '%ulidade conhecida e  provida%' or lower(r.descricao) like '%ulidade conhecida e provida%' or lower(r.descricao) like '%nulado o privilégio%')";
					$res2 = mysqli_query($link,$cmd2); //  echo $cmd2."<BR>";
					while ($line2=@mysqli_fetch_assoc($res2)) // PI9001602 tem duas decisões uma anulada e outra não (que deve ser desprezada)
					{
						$data1 = $line2['data']; // confira se este despacho de decisão nesta data nao foi anulado
						$cmd3 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho in ('PR - Nulidades','200','201','204','PR - Cancelamentos','PR - Nulidade','PR - Cancelamento','PR - Nulidades') and data='$data1'";
						$res3 = mysqli_query($link,$cmd3);
						if ($line3=@mysqli_fetch_assoc($res3))
						{
							$anulado = 0;
							$data_decisao = $line3['data'];
						}
					}

					if ($anulado==0) // encontrei decisão e ela não foi anulada, logo este despacho de decisão é válido
					{
						$situacao = 'CONCLUIDO';
						//$data_decisao = $line2['data'];
						$total_concluido++;
					}
					else
					{
						$cmd2 = "SELECT * from revistas4 WHERE (numero='$numerocd1' or numero='$numerocd2') and (despacho='15.10') and (inid='co' or inid='de') and (lower(descricao) like '%udada a natureza do pedido para MI%')";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
						{
							$situacao = 'CONCLUIDO'; // 'CONVERTIDO EM MI';
							$data_decisao = $line2['data'];
							$total_concluido++;
						}
						else
						{
							$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('22.15', '15.23', '19.1') and anulado=0";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$situacao = 'ACAO JUDICIAL';
								$total_acao++;
							}
							else
							{
								$situacao = 'PENDENTE';
								$total_pendentes++;
							}
						}
					}
				}
				$tempo = 0;
				if ($data_decisao != null)
					$tempo = round((strtotime($data_decisao)-strtotime($data))/60/60/24,0); // tempo em dias do 17.1 para decisao

				if ($situacao=='PENDENTE')
					echo "$numerobr;$idivisao;$data_deposito;17.1;$data;$data_decisao;$tempo;$situacao<BR>";
				else
					echo "$numerobr;$idivisao;$data_deposito;17.1;$data;$data_decisao;$tempo;$situacao<BR>";

				$numero_lidos[$total++]=$numero;

				//exit();
			}
			echo "Fim processamento: $total, anulado=$total_anulado, concluidos=$total_concluido, acao=$total_acao, pendentes=$total_pendentes";exit();
		}

		if ($op==31) // http://localhost/teste.php?action=142&op=31
		{
			$cmd = "SELECT * FROM pedido where (decisao='defanvisa' or decisao='deferimento') and rpi<>'0000-00-00'";
			$res = mysqli_query($link,$cmd); // para atualizar decisão a informação mais correta de divisao, é a que carregou o deferimento
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$divisao = $line['divisao'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "update publicados set divisao='$divisao' where numero='$numero1' or numero='$numero2'";
				$res2 = mysqli_query($link,$cmd2);
				echo "$cmd2;<BR>";
				//exit();
			}
			echo "Fim de processamento: $total";
			exit();
		}

		if ($op==32) // http://localhost/teste.php?action=142&op=32
		{
			$total=0;
			$cmd = "SELECT * FROM revistas4 where year(data)>=2019 and despacho='PR - Nulidades' and (inid='co' or inid='de') and lower(descricao) like '%nulada a publica%'";
			$cmd = "SELECT * FROM revistas4 where year(data)>=2019 and despacho='PR - Nulidades' and (inid='co' or inid='de') and (lower(descricao) like '%nulada a publica%' or lower(descricao) like '%nulado a publica%' or lower(descricao) like '%rejudicado a nulidade%' or lower(descricao) like '%rejudicado o exame da nulidade%' or lower(descricao) like '%rejudicada a conclusão da nulidade%' or lower(descricao) like '%rejudicada a conclusão da nulidade%')";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res)) // procura por todas nulidades que tiveram publicação anulada
			{
				$numero = $line['numero'];
				$numero = montar_numerosd(trim($numero));
				$data = $line['data']; // veja se antes desta data de fato teve algum 17.1 anulado
				$cmd2 = "SELECT * FROM arquivados where year(data)>=2011 and numero='$numero' and (despacho='17.1' or despacho='PR - Nulidades') and data<'$data' and anulado>0"; 
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) // se não teve então verifique
				{
					echo "$numero parece ter o 17.1 anulado, verifique<BR>";
					$total++;
				}
			}
			echo "Fim processamento";
			exit();
		}


		if ($op==33) // http://localhost/teste.php?action=142&op=33
		{
			$total=0;
			$cmd = "SELECT * FROM arquivados where despacho='17.2' and anulado=0 and year(data)>2010";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$data = $line['data'];
				$cmd2 = "SELECT * FROM arquivados where numero='$numero' and (despacho='17.1' or despacho='17.2') and data<'$data' and anulado>0";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2)))
				{
					echo "$numero parece ter o 17.1 anulado por um 17.2, verifique<BR>";
					$total++;
				}
			}
			echo "Fim processamento";
			exit();
		}

		if ($op==34) // http://localhost/teste.php?action=142&op=34
		{
			$total=0;
			$numero_lidos = array();
			$cmd = "SELECT * FROM arquivados where despacho='12.6' and year(data)>=2011 order by data desc";
			//$cmd = "SELECT * FROM arquivados where numero='102012033503' and despacho='12.6' and year(data)>=2011 order by data desc";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$numerobr = $numero;
				if (strlen($numerobr)==12){
					$numerobr = 'BR'.$numerobr;
				}
				$anulado = $line['anulado'];

				$data = $line['data'];
				if (in_array($numero,$numero_lidos)) continue; // evita números repetidos na lista
				$numero_lidos[$total++]=$numero;

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

				$tempo = 0;
				$idivisao = '';
				$dataout = null;
				$data_decisao = null;
				$data_deposito = null;
				$situacao = '';
				$cmd2 = "SELECT * from publicados WHERE (numero='$numero1' or numero='$numero2')";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$situacao = trim($line2['despacho_out']);
					$dataout = $line2['dataout'];
					$data_deposito = $line2['data_deposito'];
					$idivisao = $line2['divisao'];
				}

				$idivisao = strtoupper($idivisao);

				if ($anulado>0)
				{
					echo "$numerobr;$idivisao;$data_deposito;12.6;$data;$data_decisao;$tempo;ANULADO<BR>";
				}
				else
				{
					$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('22.15', '15.23', '19.1') and anulado=0";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
						$situacao = $situacao.' - ACAO JUDICIAL';
					else
					{
						$anulado = 1;
						$cmd2 = "select * from revistas4 where (numero='$numerocd1' or numero='$numerocd2') and despacho in ('PR - Recursos') and data>'$data' and (inid='co' or inid='de') and despacho in ('PR - Recursos','115','104') and (descricao like '%[104]%' or descricao like '%[115]%' or lower(descricao) like '%egado o provimento%' or lower(descricao) like '%egado provimento%' or lower(descricao) like '%ecurso conhecido e negado%' or lower(descricao) like '%ecurso conhecido e provido%')";
						//$cmd2 = "select * from revistas as r JOIN arquivados as a ON substring_index(r.numero,'-',1)=a.numero and r.data=a.data and a.despacho=r.despacho where (r.numero='$numerocd1' or r.numero='$numerocd2') and a.anulado=0 and r.despacho in ('PR - Recursos') and r.data>'$data' and (r.inid='co' or r.inid='de') and r.despacho in ('PR - Recursos','115','104','134') and (r.descricao like '%[104]%' or r.descricao like '%[115]%' or r.descricao like '%[134]%' or lower(r.descricao) like '%egado o provimento%' or lower(r.descricao) like '%egado provimento%' or lower(r.descricao) like '%ecurso conhecido e negado%' or lower(r.descricao) like '%ecurso conhecido e provido%')";
						$res2 = mysqli_query($link,$cmd2); //  echo $cmd2."<BR>";
						while ($line2=@mysqli_fetch_assoc($res2)) // PI9001602 tem duas decisões uma anulada e outra não (que deve ser desprezada)
						{
							$data1 = $line2['data']; // se tiver duas decisões mas uma for válida, ele considera válido
							$cmd3 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho in ('PR - Recursos','115','104') and data='$data1'";
							$res3 = mysqli_query($link,$cmd3); //echo "$cmd3<BR>";
							if ($line3=@mysqli_fetch_assoc($res3))
							{
								$anulado = 0;
								$data_decisao = $line3['data'];
							}
						}

						if ($anulado==0)
						{
							$situacao = 'CONCLUIDO';
						}
						else
						{
							// BR112012033777 prejudicado pq teve 15.30, PI0805692 prejudicado pq teve 11.1.1, MU9100676 tem prejudicado 131
							//$cmd2 = "select * from revistas where (numero='$numerocd1' or numero='$numerocd2') and despacho in ('PR - Recursos') and data>'$data' and (inid='co' or inid='de') and despacho in ('PR - Recursos','131') and (descricao like '%[131]%' or lower(descricao) like '%não conhecido%')";
							$encontrado = 0;
							$cmd2 = "select * from revistas4 as r JOIN arquivados as a ON substring_index(r.numero,'-',1)=a.numero and r.data=a.data and a.despacho=r.despacho where (r.numero='$numerocd1' or r.numero='$numerocd2') and a.anulado=0 and r.despacho in ('PR - Recursos') and r.data>'$data' and (r.inid='co' or r.inid='de') and r.despacho in ('PR - Recursos','131') and (r.descricao like '%[131]%' or lower(r.descricao) like '%não conhecido%')";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
								$situacao = 'RECURSO NÃO CONHECIDO';
							else
							{
								//$cmd2 = "select * from revistas where (numero='$numerocd1' or numero='$numerocd2') and data>'$data' and (inid='co' or inid='de') and despacho in ('PR - Recursos','130') and (lower(descricao) like '%rejudicado o recurso%' or lower(descricao) like '%rejudicado o exame do recurso%' or lower(descricao) like '%rejudicado a conclusão do recurso%' or lower(descricao) like '%rejudicada a conclusão do recurso%' or descricao like '%130%')";
								$encontrado = 0;
								$cmd2 = "select * from revistas4 as r JOIN arquivados as a ON substring_index(r.numero,'-',1)=a.numero and r.data=a.data and a.despacho=r.despacho where (r.numero='$numerocd1' or r.numero='$numerocd2') and a.anulado=0 and r.data>'$data' and (r.inid='co' or r.inid='de') and r.despacho in ('PR - Recursos','130') and (lower(r.descricao) like '%rejudicado o recurso%' or lower(r.descricao) like '%rejudicado o exame do recurso%' or lower(r.descricao) like '%rejudicado a conclusão do recurso%' or lower(r.descricao) like '%rejudicada a conclusão do recurso%' or r.descricao like '%130%')";
								$res2 = mysqli_query($link,$cmd2);
								if ($line2=@mysqli_fetch_assoc($res2))
									$situacao = 'PREJUDICADO';
								else
									$situacao = 'PENDENTE';
							}
						}
					}

					$tempo = 0;
					if ($data_decisao != null)
						$tempo = round((strtotime($data_decisao)-strtotime($data))/60/60/24,0); // tempo em dias do 12.2 para decisao

					echo "$numerobr;$idivisao;$data_deposito;12.6;$data;$data_decisao;$tempo;$situacao<BR>";
					//exit();
				}
			}
			echo "Fim processamento: $total";exit();
		}

		if ($op==35) // http://localhost/teste.php?action=142&op=35
		{
			$total=0;
			$numero_lidos = array();
			$cmd = "SELECT * FROM arquivados where despacho='12.3' and year(data)>=2011 order by data asc";
			//$cmd = "SELECT * FROM arquivados where numero='PI9917886' and despacho='12.3' and year(data)>=2011 order by data asc";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$numerobr = $numero;
				if (strlen($numerobr)==12){
					$numerobr = 'BR'.$numerobr;
				}
				$anulado = $line['anulado'];
				$data = $line['data'];
				if (in_array($numero,$numero_lidos)) continue;
				$numero_lidos[$total++]=$numero;

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
				$dataout = null;
				$data_decisao = null;
				$data_deposito = null;
				$situacao = '';
				$cmd2 = "SELECT * from publicados WHERE (numero='$numero1' or numero='$numero2')";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$situacao = trim($line2['despacho_out']);
					$dataout = $line2['dataout'];
					$data_deposito = $line2['data_deposito'];
					$idivisao = $line2['divisao'];
				}

				$idivisao = strtoupper($idivisao);
				if ($anulado>0)
				{
					echo "$numerobr;$idivisao;$data_deposito;12.3;$data;$data_decisao;$tempo;ANULADO<BR>";
				}
				else
				{

					$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('22.15', '15.23', '19.1') and anulado=0";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
						$situacao = $situacao.' - ACAO JUDICIAL';
					else
					{
						$anulado = 1;
						$cmd2 = "select * from revistas4 where (numero='$numerocd1' or numero='$numerocd2') and despacho in ('PR - Recursos') and data>'$data' and (inid='co' or inid='de') and despacho in ('PR - Recursos','112','113','115','102','103','104') and (descricao like '%[102]%' or descricao like '%[103]%' or descricao like '%[104]%' or descricao like '%[112]%' or descricao like '%[113]%' or descricao like '%[115]%' or lower(descricao) like '%recurso provido%' or lower(descricao) like '%recurso negado%' or lower(descricao) like '%egado o provimento%' or lower(descricao) like '%egado provimento%' or lower(descricao) like '%ecurso conhecido e negado%' or lower(descricao) like '%ecurso conhecido e provido%') order by data desc";
						//$cmd2 = "select * from revistas as r JOIN arquivados as a ON substring_index(r.numero,'-',1)=a.numero and r.data=a.data and r.despacho=a.despacho where (r.numero='$numerocd1' or r.numero='$numerocd2') and a.anulado=0 and r.despacho in ('PR - Recursos') and r.data>'$data' and (r.inid='co' or r.inid='de') and r.despacho in ('PR - Recursos','112','113','115','102','103','104','134') and (r.descricao like '%[102]%' or r.descricao like '%[103]%' or r.descricao like '%[104]%' or r.descricao like '%[112]%' or r.descricao like '%[113]%' or r.descricao like '%[115]%' or r.descricao like '%[134]%' or lower(r.descricao) like '%recurso provido%' or lower(r.descricao) like '%recurso negado%' or lower(r.descricao) like '%egado o provimento%' or lower(r.descricao) like '%egado provimento%' or lower(r.descricao) like '%ecurso conhecido e negado%' or lower(r.descricao) like '%ecurso conhecido e provido%') order by data desc";
						$res2 = mysqli_query($link,$cmd2); 
						if ($line2=@mysqli_fetch_assoc($res2)) 
						{
							$data1 = $line2['data']; // se tiver duas decisões mas uma for válida, ele considera válido
							$cmd3 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho in ('PR - Recursos') and data='$data1'";
							$res3 = mysqli_query($link,$cmd3);
							if ($line3=@mysqli_fetch_assoc($res3))
							{
								$anulado = 0;
								$data_decisao = $line3['data'];
							}
						}

						if ($anulado==0)
						{
							$situacao = 'CONCLUIDO';
							$data_decisao = $line2['data'];
						}
						else
						{
							$situacao = 'PENDENTE';
						}
					}

					$tempo = 0;
					if ($data_decisao != null)
						$tempo = round((strtotime($data_decisao)-strtotime($data))/60/60/24,0); // tempo em dias do 12.2 para decisao

					echo "$numerobr;$idivisao;$data_deposito;12.3;$data;$data_decisao;$tempo;$situacao<BR>";
					//exit();
				}
			}
			echo "Fim processamento: $total";exit();
		}

		if ($op==36) // http://localhost/central/control.php?action=142&op=36 
		{

			$cmd = "SELECT * FROM arquivados where year(data)>=2019 and (despacho='12.6' or despacho='12.3') and anulado=0";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$data = $line['data'];
				$despacho = $line['despacho'];
				$numerocd1 = montar_numerocd($numero);
				$cmd2 = "SELECT * FROM revistas4 where numero='$numerocd1' and data>'$data' and despacho='PR - Recursos' and (inid='co' or inid='de') and (lower(descricao) like '%nulada a publica%' or lower(descricao) like '%nulada a notifica%' or lower(descricao) like '%nulado a publica%' or lower(descricao) like '%rejudicado o recurso%' or lower(descricao) like '%rejudicado o exame do recurso%' or lower(descricao) like '%rejudicado a conclusão do recurso%' or lower(descricao) like '%rejudicada a conclusão do recurso%')";
				$res2 = mysqli_query($link,$cmd2); // echo $cmd2;exit();
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$rpi=0;
					$data_anulado = $line2['data'];
					$cmd3 = "select * from rpis_lidas where data='$data_anulado'";
					$res3 = mysqli_query($link,$cmd3);
					if ($line3=@mysqli_fetch_assoc($res3)) $rpi = $line3['rpi'];
					$cmd2 = "SELECT * FROM arquivados where numero='$numero' and despacho='PR - Recursos' and anulado>0 and data<'$data_anulado' and data>'$data'";
					$res2 = mysqli_query($link,$cmd2); // ou seja, existe um parecer intermediário que foi anulado, logo não se refere ao 12.3/12.6
					if (!$line2=@mysqli_fetch_assoc($res2))	echo "$cmd2<BR>update arquivados set anulado=$rpi where numero='$numero' and year(data)>=2019 and (despacho='12.6' or despacho='12.3') and anulado=0;<BR>";
				}
			}
			echo "Fim de processamento de op==36<BR>";
			//exit();

			$total=0;
			//$cmd = "SELECT * FROM revistas4 where year(data)>=2019 and despacho='PR - Recursos' and (inid='co' or inid='de') and descricao like '%Anulada a publica%'";
			$cmd = "SELECT * FROM revistas4 where year(data)>=2019 and despacho='PR - Recursos' and (inid='co' or inid='de') and (lower(descricao) like '%nulada a publica%' or lower(descricao) like '%nulada a notifica%' or lower(descricao) like '%nulado a publica%' or lower(descricao) like '%rejudicado o recurso%' or lower(descricao) like '%rejudicado o exame do recurso%' or lower(descricao) like '%rejudicado a conclusão do recurso%' or lower(descricao) like '%rejudicada a conclusão do recurso%')";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$numero = montar_numerosd(trim($numero));
				$data_anulado = $line['data'];
				$cmd2 = "SELECT * FROM arquivados where year(data)>=2011 and numero='$numero' and (despacho='12.3' or despacho='12.6') and data<'$data_anulado' and anulado=0"; 
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$rpi=0;
					$data = $line2['data'];
					$cmd3 = "select * from rpis_lidas where data='$data_anulado'";
					$res3 = mysqli_query($link,$cmd3);
					if ($line3=@mysqli_fetch_assoc($res3)) $rpi = $line3['rpi'];
					$cmd2 = "SELECT * FROM arquivados where numero='$numero' and despacho='PR - Recursos' and anulado>0 and data<'$data_anulado' and data>'$data'";
					$res2 = mysqli_query($link,$cmd2); // ou seja, existe um parecer intermediário que foi anulado, logo não se refere ao 12.2, 12.3/12.6
					if (!$line2=@mysqli_fetch_assoc($res2))	echo "$cmd2<BR>update arquivados set anulado=$rpi where numero='$numero' and year(data)>=2019 and (despacho='12.6' or despacho='12.3') and anulado=0;<BR>";
					//echo $numero."<BR>";
				}
			}

			echo "Fim de processamento<BR>";
			exit();
		}

		if ($op==37) // http://localhost/teste.php?action=142&op=37
		{
			$total=0;
			$cmd = "SELECT * FROM arquivados where despacho='12.7' and year(data)>=2019 and anulado=0";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$data = $line['data'];
				$cmd2 = "SELECT * FROM arquivados where numero='$numero' and (despacho='12.2' or despacho='12.6' or despacho='12.3') and data<'$data' and anulado>0";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2)))
				{
					echo "$numero<BR>";
					$total++;
				}
			}
			echo "Fim de processamento";
			exit();
		}


		if ($op==38) // identificada duplicidades 12.2 não prejudicada http://localhost/teste.php?action=142&op=38
		{
			$total = 0;
			$cmd = "SELECT * FROM arquivados where despacho ='12.2' and anulado=0 and year(data)>1996 group by numero , despacho having count(*)>1  ORDER BY `arquivados`.`data` ASC";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$data = $line['data'];

				/*
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

				$cmd2 = "select * from revistas4 where (numero='$numerocd1' or numero='$numerocd2') and despacho in ('PR - Recursos') and data>'$data' and (inid='co' or inid='de') and despacho in ('PR - Recursos','111','100') and (descricao like '%rejudicado%')";
				$res2 = mysqli_query($link,$cmd2);
				if (!$line2=@mysqli_fetch_assoc($res2))
				{
					echo "$numero<BR>";
					$total++;
				}
				*/

				echo "$numero<BR>";
				$total++;
			}
			echo "Fim de processamento: $total<BR>";
			exit();
		}
		
		if ($op==39) // http://localhost/teste.php?action=142&op=39
		{
			$cmd = "SELECT * FROM pedido where decisao in ('9.2','indeferimento','deferimento','defanvisa') and year(rpi)>=2010";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$divisao = $line['divisao'];
				$data = $line['rpi'];
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				$numero1 = $numero;
				$numero2 = $numero;
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				if (substr($divisao,0,2)=='cg')
				{
					$cmd2 = "SELECT * FROM pedido where (numero='$numero1' or numero='$numero2') and decisao in ('ciencia de parecer','exigencia') and rpi<'$data' order by rpi desc";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) $divisao = $line2['divisao'];
					if (substr($divisao,0,2)=='cg')
					{
						if (identificado_mu($numero))
							$divisao='dimut';
						else
						{
							$cmd2 = "SELECT * FROM classes where (numero='$numero1' or numero='$numero2')";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$classificacao = $line2['descricao'];
								$symbol = trim(ler_symbol($classificacao));
								$divisao = ler_divisao($link,$classificacao);
							}
						}
						if (substr($divisao,0,2)=='cg')	echo "Não achei divisao $numero<BR>";
					}
				}

				$cmd2 = "update publicados set divisao='$divisao' where numero='$numero1' or numero='$numero2'";
				$res2 = mysqli_query($link,$cmd2);
				echo "$cmd2;<BR>";
				//exit();
			}
			echo "Fim de processamento: $total";
			exit();
		}

		if ($op==40) // http://localhost/teste.php?action=142&op=40
		{
			$total=0;
			$cmd = "SELECT * FROM arquivados where despacho='12.7' and anulado=0";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$numerobr = $numero;
				if (strlen($numerobr)==12){
					$numerobr = 'BR'.$numerobr;
				}
				$data = $line['data'];
				$cmd2 = "SELECT * FROM arquivados where numero='$numero' and despacho in ('12.2','12.3','12.6','12.1') and data<'$data' and anulado>0";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2)))
				{
					$data = $line2['data'];
					echo "$data;$numerobr;12.2<BR>";
					$total++;
				}
			}
			echo "Fim de processamento: $total<BR>";
			exit();
		}

		if ($op==41) 
		{			 
			$total=0;
			//$cmd = "SELECT * FROM arquivados where numero='PI0103564' and despacho='12.2' and anulado=0 and year(data)>=2011";
			$cmd = "SELECT * FROM arquivados where despacho='12.2' and anulado=0 and year(data)>=2010";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$numero = montar_numerosd(trim($numero));
				$numerobr = $numero;
				if (strlen($numerobr)==12){
					$numerobr = 'BR'.$numerobr;
				}
				$data = $line['data'];
				$data122 = $data;
				$numerocd1 = montar_numerocd($numero);

				$cmd2 = "SELECT * FROM revistas4 where numero='$numerocd1' and data>'$data' and despacho='PR - Recursos' and (inid='co' or inid='de') and (lower(descricao) like '%nulada a publica%' or lower(descricao) like '%nulado a publica%' or lower(descricao) like '%rejudicado o recurso%' or lower(descricao) like '%rejudicado o exame do recurso%' or lower(descricao) like '%rejudicado a conclusão do recurso%' or lower(descricao) like '%rejudicada a conclusão do recurso%')";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$data_anulado = $line2['data'];
					$cmd2 = "SELECT * FROM arquivados where anulado>0 and numero='$numero' and despacho='PR - Recursos' and data='$data_anulado'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) continue; // se este suposto prejudicamento foi anulado então ignore

					$cmd2 = "SELECT * FROM arquivados where numero='$numero' and despacho in ('12.2','PR - Recursos') and data<'$data_anulado' and data>='$data' order by data desc";
					$res2 = mysqli_query($link,$cmd2);
					$i = 0;
					while ($line2=@mysqli_fetch_assoc($res2))
					{
						$i++;
						if ($i>2) break; /// tipo=0 use estas linhas para detectar os casos simples de 12.2 seguido de prejudicado
						$data = $line2['data'];
						$despacho = $line2['despacho'];
						$cmd3 = "select * from rpis_lidas where data='$data_anulado'";
						$res3 = mysqli_query($link,$cmd3);
						if ($line3=@mysqli_fetch_assoc($res3)) $rpi = $line3['rpi'];
						$cmd3 = "update arquivados set anulado='$rpi' where anulado=0 and numero='$numero' and despacho='$despacho' and data='$data'";
						if ($tipo>=2) $cmd3 = "update arquivados set anulado='$rpi' where anulado=0 and numero='$numero' and (despacho='12.2' or despacho='PR - Recursos') and (data<'$data_anulado' and data>='$data122')";
					}
					if ($tipo==0 and $i==1)	echo "$cmd3;<BR>"; // use estas linhas para detectar os casos simples de 12.2 seguido de proejudicado
					if ($tipo==2 and $i==2) echo "$cmd3;<BR>"; // tem 12.2 PR Recurso e depois o  prejudicado, tem que fazer o ajuste manual
					if ($tipo==3 and $i==3) echo "$cmd3;<BR>"; // tem 12.2 PR Recurso e depois o  prejudicado, tem que fazer o ajuste manual
					if ($tipo==4 and $i==4) echo "$cmd3;<BR>"; // tem 12.2 PR Recurso e depois o  prejudicado, tem que fazer o ajuste manual
				}
				//exit();
			}
			echo "Fim de processamento: $total<BR>";
			exit();
		}


		if ($op==42) // http://localhost/teste.php?action=142&op=42
		{
			//$cmd = "select * from revistas as r JOIN arquivados as a ON substring_index(r.numero,'-',1)=a.numero and r.data=a.data and r.despacho=a.despacho where (r.numero='PI9710407-8' or r.numero='PI9710407-8') and a.anulado=0 and r.data>'2009-10-27' and (r.inid='co' or r.inid='de') and r.despacho in ('PR - Recursos','111','100')";
			$fname = "TCU_12_2_PENDENTES.csv"; // será lido por cgrecestoque.php
			@ $fpw = fopen($fname,"w");
			
			$total=0;$total_anulados=0;$total_concluidos=0;$total_pendentes=0;$total_acoes=0;
			$numero_lidos = array();
			//$cmd = "SELECT * FROM arquivados where numero='PI9917889' and despacho='12.2' and year(data)>=1997 order by data asc";
			$cmd = "SELECT * FROM arquivados where despacho='12.2' and year(data)>=1997 order by data asc";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$anulado = $line['anulado'];

				$numerobr = $numero;
				if (strlen($numerobr)==12){
					$numerobr = 'BR'.$numerobr;
				}

				$data = $line['data'];
				if (in_array($numero,$numero_lidos)) continue;
				$numero_lidos[$total++]=$numero;

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
				$dataout = null;
				$data_decisao = null;
				$data_deposito = null;
				$situacao = '';
				$cmd2 = "SELECT * from publicados WHERE (numero='$numero1' or numero='$numero2')";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					//$situacao = trim($line2['despacho_out']);
					//$dataout = $line2['dataout'];
					$data_deposito = $line2['data_deposito']; // inid=22 em revistas ou 200, 848 em despachos_pag
					$idivisao = $line2['divisao'];
				}

				$tipoindeferimento = 'ADMINISTRATIVO';
				$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('9.2','indeferimento')";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$idivisao = $line2['divisao'];
					$idecisao92 = $line2['decisao'];
					if ($idecisao92=='indeferimento') $tipoindeferimento = 'TECNICO';
				}

				//if ($idivisao=='dipem') $idivisao='DIMUT';

				$situacao = '';
				$idivisao = strtoupper($idivisao);
				if ($anulado>0)
				{
					$situacao = 'ANULADO';
					$total_anulados++;
				}
				else
				{
					$anulado = 1;
					//$cmd2 = "select * from revistas where (numero='$numerocd1' or numero='$numerocd2') and despacho in ('PR - Recursos') and data>'$data' and (inid='co' or inid='de') and despacho in ('PR - Recursos','111','100','100.1','100.2') and (descricao like '%[100]%' or descricao like '%[100.1]%' or descricao like '%[100.2]%' or descricao like '%[111]%' or lower(descricao) like '%egado o provimento%' or lower(descricao) like '%egado provimento%' or lower(descricao) like '%antido o indeferimento%' or lower(descricao) like '%ecurso conhecido e negado%' or lower(descricao) like '%antido a concessão%' or lower(descricao) like '%antida a concessão%' or lower(descricao) like '%antido a concessao%' or lower(descricao) like '%antida a concessao%' or lower(descricao) like '%ecurso conhecido e provido%')";
					$cmd2 = "select * from revistas4 where (numero='$numerocd1' or numero='$numerocd2') and data>'$data' and (inid='co' or inid='de' or inid='re') and despacho in ('PR - Recursos','111','100','134','100.1','100.2') and (descricao like '%[100]%' or descricao like '%[100.1]%' or descricao like '%[100.2]%' or descricao like '%[111]%' or lower(descricao) like '%egado o provimento%' or lower(descricao) like '%egado provimento%' or lower(descricao) like '%antido o indeferimento%' or lower(descricao) like '%ecurso conhecido e negado%' or lower(descricao) like '%antido a concessão%' or lower(descricao) like '%antida a concessão%' or lower(descricao) like '%antido a concessao%' or lower(descricao) like '%antida a concessao%' or lower(descricao) like '%ecurso conhecido e provido%'  or lower(descricao) like '%ecurso conhecido e %' or lower(descricao) like '%homologada a desist%' or lower(descricao) like '%[134]%')";
					$res2 = mysqli_query($link,$cmd2);//echo "$cmd2<BR>";
					while ($line2=@mysqli_fetch_assoc($res2))
					{
						$data1 = $line2['data']; // se tiver duas decisões mas uma for válida, ele considera válido
						$cmd3 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho='PR - Recursos' and data='$data1'";
						$res3 = mysqli_query($link,$cmd3);
						if ($line3=@mysqli_fetch_assoc($res3))
						{
							$anulado = 0;
							$data_decisao = $line3['data'];
						}
					}

					if ($numero=='PI9601903') $anulado = 0; // despacho de decisão de recurso vazio, por isso foi necessário este ajuste manual
					if ($numero=='PI9503572') $anulado = 0;
					if ($numero=='PI9401536') $anulado = 0;
					if ($numero=='PI9609260') $anulado = 0;
					if ($numero=='PI0004181') $anulado = 0;

					if ($anulado==0)

					//$cmd2 = "select * from revistas as r JOIN arquivados as a ON substring_index(r.numero,'-',1)=a.numero and r.data=a.data and r.despacho=a.despacho where (r.numero='$numerocd1' or r.numero='$numerocd2') and a.anulado=0 and r.data>'$data' and (r.inid='co' or r.inid='de' or r.inid='re') and r.despacho in ('PR - Recursos','111','100') and (r.descricao like '%[100]%' or r.descricao like '%[111]%' or lower(r.descricao) like '%egado o provimento%' or lower(r.descricao) like '%egado provimento%' or lower(r.descricao) like '%antido o indeferimento%' or lower(r.descricao) like '%ecurso conhecido e negado%' or lower(r.descricao) like '%antido a concessão%' or lower(r.descricao) like '%antida a concessão%' or lower(r.descricao) like '%antido a concessao%' or lower(r.descricao) like '%antida a concessao%' or lower(r.descricao) like '%ecurso conhecido e provido%'  or lower(r.descricao) like '%ecurso conhecido e %')";
					//$res2 = mysqli_query($link,$cmd2); //echo "$cmd2<BR>";
					//if ($line2=@mysqli_fetch_assoc($res2))
					{
						$situacao = 'CONCLUIDO'; // verifique na tabela arquivados se este despacho nao foi anulado !!
						$total_concluidos++;
					}
					else
					{
						$cmd2 = "SELECT * from revistas4 WHERE (numero='$numerocd1' or numero='$numerocd2') and (despacho='15.10') and (inid='co' or inid='de') and (descricao like '%Mudada a natureza do pedido para MI%')";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
						{
							$data_decisao = $line2['data'];
							$situacao = 'CONCLUIDO';
							$total_concluidos++;
						}
						else
						{
							$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('16.1','11.2','11.20') and anulado=0";
							$res2 = mysqli_query($link,$cmd2);
							// PI9105399 teve 16.1 posterior sem ter concluido o recurso, considere concluido nesta data do 16.1
							// PI0100909 teve 11.20 posterior sem ter concluido o recurso, considere concluido
							// PI9107136 teve 11.2 posterior sem ter concluido o recurso, considere concluido
							// PI9803463 teve 10.1 posterior sem ter concluido o recurso, conseidere concluído
							// PI9814174 teve 8.11 posterior sem ter concluído o recurso, considere concluído
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$data_decisao = $line2['data'];
								$situacao = 'CONCLUIDO';
								$total_concluidos++;
							}
							else
							{
								$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('22.15', '15.23', '19.1') and anulado=0";
								$res2 = mysqli_query($link,$cmd2);
								if ($line2=@mysqli_fetch_assoc($res2))
								{
									$situacao = 'ACAO JUDICIAL';
									$total_acoes++;
								}
								else
								{
									$situacao = 'PENDENTE';
									$total_pendentes++;
									$texto = "$numerobr;$idivisao;$data_deposito;12.2;$data;$data_decisao;0;$situacao;$tipoindeferimento";
									fputs($fpw,$texto."\n");
								}
							}
						}
					}
				}

				$tempo = 0;
				if ($data_decisao != null)
					$tempo = round((strtotime($data_decisao)-strtotime($data))/60/60/24,0); // tempo em dias do 12.2 para decisao

				echo "$numerobr;$idivisao;$data_deposito;12.2;$data;$data_decisao;$tempo;$situacao;$tipoindeferimento <BR>";
				//exit();
			}
			echo "Fim processamento: <BR>";
			fclose($fpw);
			echo "total=$total, anulados=$total_anulados, concluidos=$total_concluidos, acoes=$total_acoes, pendentes=$total_pendentes ";
			exit();
		}
	}
	

	if ($action==500)  // http://localhost/central/control.php?action=500&rpi=2655
	{
			
// SELECT * FROM `publicados` WHERE dataout is null and year(data_deposito)=1996 and numero not in (select numero from arquivados where despacho='9.2' and anulado=0) and numero in (select numero1 from pimupi where numero2 like 'DI%')

		if ($op==47)
		{

			$cmd = "select * from arquivados where anulado=0 and despacho in ('1.1.2','1.2.1','1.2.3','1.3.2','1.3.4','1.4.2','1.4.3','1.5.1','1.6.1','1.6.2','1.7.1','1.7.2','1.8.1','1.8.2','2.6','3.7','4.3.1','6.8','6.9','7.2','8.8','8.9','9.1.1','9.1.2','9.2.1','9.2.2','9.2.4.1','10.6','10.7','11.13','11.14','12.7','13.2','15.30','15.31','15.32','16.2','16.4','17.2','18.11','18.12','19.2','21.8','21.9','22.20','22.21','22.22','23.10','23.14','23.15','24.5','24.6','25.10','25.12','27.7','28.5','28.92')";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				if ($numero=='112012003073' or $numero=='102012017780') continue;
				$despacho = $line['despacho'];
				$data = $line['data'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}

				$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and anulado>0 and data<='$data'";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) echo "$numero $data<BR>";
				$total++;
			}
			echo "Fim de processamento: $total";
			exit();
		}

		if ($op==46)
		{
		$total=0;
		$cmd= "select * from arquivados where (despacho='11.12') and anulado=0";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$total++;
			$numero = $line['numero'];
			$data = $line['data'];
			$cmd2 = "select * from arquivados where numero='$numero' and despacho='PR - Recursos' and anulado=0 and data>'$data'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$data = $line2['data'];
				$numerocd = montar_numerocd($numero);
				$cmd2 = "select * from revistas4 where numero='$numerocd' and despacho='PR - Recursos' and inid='co' and (descricao like '%provido%' or descricao like '%[135]%')";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) echo "$numero $data<BR>";
			}
		}
		echo "Fim de processamento recursos de 11.12: $total";
		exit();
		}

		if ($op==45)
		{
			$total=0;
			$cmd = "select * from pedido where instancia in ('recurso','recurso cgrec') and anulado>0";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$data = $line['rpi'];
				$anulado = $line['anulado'];
				$cmd2 = "select * from arquivados where despacho in ('PR - Recursos','7.4','7.5') and numero='$numero' and data='$data' and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$cmd2 = "update pedido set anulado=0 where numero='$numero' and instancia in ('recurso','recurso cgrec') and rpi='$data' and anulado=$anulado";
					echo "$cmd2;<BR>";
					$total++;
				}
			}
			echo "Fim de processamento (0):$total<BR>";
			
			$total=0;
			$cmd = "select * from pedido where instancia in ('recurso','recurso cgrec') and anulado=0";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$data = $line['rpi'];
				$cmd2 = "select * from arquivados where despacho in ('PR - Recursos','7.4','7.5') and numero='$numero' and data='$data' and anulado>0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$anulado = $line2['anulado'];
					$cmd2 = "update pedido set anulado=$anulado where numero='$numero' and instancia in ('recurso','recurso cgrec') and rpi='$data' and anulado=0";
					echo "$cmd2;<BR>";
					$total++;
				}
			}
			echo "Fim de processamento (0+):$total<BR>";

			$total=0;
			$cmd = "select * from arquivados where despacho='PR - Recursos' and anulado>0";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$data = $line['data'];
				$anulado = $line['anulado'];
				$cmd2 = "select * from pedido where numero='$numero' and instancia in ('recurso','recurso cgrec') and rpi='$data' and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$cmd2 = "update pedido set anulado=$anulado where numero='$numero' and instancia in ('recurso','recurso cgrec') and rpi='$data' and anulado=0";
					echo "$cmd2;<BR>";
					$total++;
				}
			}
			echo "Fim de processamento (1):$total<BR>";

			$total=0;
			$cmd = "select * from revistas4 where despacho='PR - Recursos' and inid='co' and (descricao like '%Anulada a decis%' or descricao like '%Anulada a publica%' or descricao like '%[132]%' or descricao like '%(132)%' or descricao like '%[135]%' or descricao like '%(135)%')";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$str = '';
				$descricao = $line['descricao'];
				if (strpos($descricao, 'retorno') !== false) 
					$str = "retorno para primeira instância";
				$numero = montar_numerosd($line['numero']);
				if ($numero=='302012002082') continue;
				if ($numero=='PI1101091') continue;
				if ($numero=='PI1100587') continue;
				if ($numero=='PI1100585') continue;
				if ($numero=='PI1100586') continue;
				if ($numero=='PI1100589') continue;
				if ($numero=='MU6602681') continue;
				if ($numero=='MU6700880') continue;
				if ($numero=='PI1003773') continue;
				if ($numero=='PI0803323') continue;
				$data = $line['data'];
				$cmd2= "select * from arquivados where numero='$numero' and despacho in ('PR - Recursos','PR - Nulidades','7.4','7.5','12.1','12.2','12.3','12.6') and anulado>=1 and data<'$data'";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2)))
				{
					$anulado=0;
					$cmd3 = "select * from rpis_lidas where data='$data'";
					$res3 = mysqli_query($link,$cmd3);
					if ($line3=@mysqli_fetch_assoc($res3)) $anulado = $line3['rpi'];
					echo "$numero $data [$anulado] $str<BR>";
					$total++;
				}
			}
			echo "Fim de processamento (2): $total<BR><BR>";

			$total=0;
			$cmd= "select * from arquivados where (despacho='PR - Recursos') and anulado=0";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				if ($numero=='PI8806021') continue;
				if ($numero=='PI9103323') continue;
				if ($numero=='MU8300773') continue;
				if ($numero=='PI0001493') continue;
				if ($numero=='PI0206132') continue;
				if ($numero=='PI0206220') continue;
				if ($numero=='PI0100139') continue;
				if ($numero=='PI0803269') continue;
				if ($numero=='PI9604956') continue;
				$data = $line['data'];
				$numerocd1 = montar_numerocd($numero);
				$cmd2 = "select * from revistas4 where despacho='PR - Recursos' and numero='$numerocd1' and inid='co' and (descricao like '%Anulada a decis%' or descricao like '%Anulada a publica%' or descricao like '%[132]%' or descricao like '%(132)%' or descricao like '%[135]%' or descricao like '%(135)%') and data>'$data'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$data2 = $line2['data'];
					$cmd2= "select * from arquivados where numero='$numero' and despacho in ('PR - Recursos','PR - Nulidades','7.4','7.5','12.1','12.2','12.3','12.6') and anulado>=1 and data<'$data2'";
					$res2 = mysqli_query($link,$cmd2);
					if (!($line2=@mysqli_fetch_assoc($res2)))
					{
						$total++;
						$cmd3 = "select * from rpis_lidas where data='$data'";
						$res3 = mysqli_query($link,$cmd3);
						if ($line3=@mysqli_fetch_assoc($res3)) $anulado = $line3['rpi'];
						echo "$numero $data [$anulado]<BR>";
					}
				}
			}
			echo "Fim de processamento (3): $total";
			exit();
		}

		if ($op==44)
		{
			$cmd = "select * from arquivados where data>='1996-01-01' and anulado=0 and despacho in ('1.1.2','1.2.1','1.2.3','1.3.2','1.3.4','1.4.2','1.4.3','1.5.1','1.6.1','1.6.2','1.7.1','1.7.2','1.8.1','1.8.2','2.6','3.7','4.3.1','6.8','6.9','7.2','8.8','8.9','9.1.1','9.1.2','9.2.1','9.2.2','9.2.4.1','10.6','10.7','11.13','11.14','12.7','13.2','15.30','15.31','15.32','16.2','16.4','17.2','18.11','18.12','19.2','21.8','21.9','22.20','22.21','22.22','23.10','23.14','23.15','24.5','24.6','25.10','25.12','27.5','27.7','28.5')";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				if ($numero=='122017012966') continue;
				if ($numero=='112012009385') continue;
				if ($numero=='PI1005410') continue;
				if ($numero=='112013002796') continue;
				if ($numero=='112014001341') continue;
				if ($numero=='112012027710') continue;
				if ($numero=='112014022207') continue;
				if ($numero=='112015018918') continue;
				if ($numero=='PI0412856') continue;
				if ($numero=='PI0911987') continue;
				if ($numero=='PI9917830') continue;
				if ($numero=='PI1106844') continue;
				if ($numero=='112012003073') continue;
				if ($numero=='112012028848') continue;
				if ($numero=='112015000685') continue;
				if ($numero=='102012017780') continue;
				if ($numero=='112015004821') continue;
				if ($numero=='112014011188') continue;
				if ($numero=='PI0925421') continue;

				$despacho = $line['despacho'];
				$data = $line['data'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}

				$cmd2 = "SELECT * FROM rpis_lidas where data='$data'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
					$rpi = $line2['rpi'];
				else
				{
					$rpi = 1;
					echo "não encontrei a revista $rpi $cmd2<BR>";
				}

				$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and anulado=$rpi and data<='$data'";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) echo "$numero $data<BR>";
				$total++;
			}
			echo "Fim de processamento: $total";
			exit();
		}

		if ($op==43)
		{
		$cmd = "select * from arquivados where anulado>0";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$total++;
			$numero = $line['numero'];
			if ($numero=='PI0301753') continue;
			if ($numero=='112014012352') continue;
			if ($numero=='112013002796') continue;
			if ($numero=='102019028221') continue;
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}
			$despacho = $line['despacho'];
			$rpi = $line['anulado'];
			$cmd2 = "SELECT * FROM rpis_lidas where rpi='$rpi'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
				$data = $line2['data'];
			else
			{
				$rpi = 1;
				echo "$numero não encontrei a revista $rpi $cmd2<BR>";
			}

			$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and data='$data' and anulado=0 and despacho in ('PR - Nulidades','PR - Recursos','1.1.2','1.2.1','1.2.3','1.3.2','1.3.4','1.4.2','1.4.4','1.5.1','1.5.3','2.6','3.7','4.3.1','6.8','6.9','7.2','8.8','8.9','9.1.1','9.1.2','9.2.1','9.2.2','9.2.4.1','10.6','10.7','11.13','11.14','12.7','15.30','15.31','15.32','16.2','16.4','17.2','18.11','18.12','19.2','21.8','21.9','22.20','22.21','22.22','23.10','23.14','23.15','24.5','24.6','25.10','25.12','27.5','26.7','28.92')";
			$res2 = mysqli_query($link,$cmd2);
			if (!($line2=@mysqli_fetch_assoc($res2)))
			{
				echo "$numero ($despacho) $data<BR>$cmd2<BR><BR>";
				// exit();
			}
		}
		echo "Fim de processamento";
		exit();
		}

		$anuladores="'1.1.2'";
		$anuladores=$anuladores.",'1.2.1','1.2.3'";
		$anuladores=$anuladores.",'1.3.2','1.3.4'";
		$anuladores=$anuladores.",'1.4.2','1.4.4'";
		$anuladores=$anuladores.",'1.5.1','1.5.3'";
		$anuladores=$anuladores.",'2.6'";
		$anuladores=$anuladores.",'3.7'";
		$anuladores=$anuladores.",'4.3.1'";
		$anuladores=$anuladores.",'6.8','6.9'";
		$anuladores=$anuladores.",'7.2'";
		$anuladores=$anuladores.",'8.8','8.9'";
		$anuladores=$anuladores.",'9.1.1','9.1.2'";
		$anuladores=$anuladores.",'9.2.1','9.2.2'";
		$anuladores=$anuladores.",'9.2.4.1'";
		$anuladores=$anuladores.",'10.6','10.7'";
		$anuladores=$anuladores.",'11.13','11.14'";
		$anuladores=$anuladores.",'12.7'";
		$anuladores=$anuladores.",'15.30','15.31','15.32'";
		$anuladores=$anuladores.",'16.2','16.4'";
		$anuladores=$anuladores.",'17.2'";
		$anuladores=$anuladores.",'18.11','18.12'";
		$anuladores=$anuladores.",'19.2'";
		$anuladores=$anuladores.",'21.8','21.9'";
		$anuladores=$anuladores.",'22.20','22.21','22.22'";
		$anuladores=$anuladores.",'23.10','23.14','23.15'";
		$anuladores=$anuladores.",'24.5','24.6'";
		$anuladores=$anuladores.",'25.10','25.12'";
		$anuladores=$anuladores.",'26.7'";
		$anuladores=$anuladores.",'27.7'";
		$anuladores=$anuladores.",'28.5','28.92'";
		$anuladores=$anuladores.",'29.12'";

		if ($rpi>0) // http://localhost/teste.php?action=5&rpi=2620
		{

			$op = '1.1'; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = '1.2'; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = '1.3'; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = '1.4'; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = '1.5'; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 2; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 3; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 4; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 6; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 7; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 8; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = '9.1'; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = '9.2'; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = '9.2.4'; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 10; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 11; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 12; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 15; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 16; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 17; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 18; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 19; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 21; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 22; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 23; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 24; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 25; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 26; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 27; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 28; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);

			$op = 29; $tipo=0;
			atualizar_anulados($op,$tipo,$rpi,$link);
			$tipo=1;
			atualizar_anulados($op,$tipo,$rpi,$link);
		}
		else
			atualizar_anulados($op,$tipo,$rpi,$link); // http://localhost/teste.php?action=5&op=28&tipo=1

		echo "Fim de processamento";
		exit();
	}

	function atualizar_anulados($op,$tipo,$rpi,$link)
	{
		if ($op=='1.1') // [verificado 15/03/2021]
		{
			$despachos_anulados="'1.1','1.1.1','1.1.2','1.1.3'";
			$despacho_anulador="'1.1.2'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op=='1.2') // [verificado 15/03/2021]
		{
			$despachos_anulados="'1.2','1.2.1','1.2.2','1.2.3'";
			$despacho_anulador="'1.2.1','1.2.3'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op=='1.3') // [verificado 15/03/2021]
		{
			$despachos_anulados="'1.3','1.3.1','1.3.2','1.3.3','1.3.4'";
			$despacho_anulador="'1.3.2','1.3.4'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op=='1.4') // [verificado 15/03/2021]
		{
			$despachos_anulados="'1.4','1.4.1','1.4.2','1.4.3','1.4.4'";
			$despacho_anulador="'1.4.2','1.4.4'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op=='1.5') // [verificado 15/03/2021]
		{
			$despachos_anulados= "'1.5','1.5.1','1.5.2','1.5.3'";
			$despacho_anulador = "'1.5.1','1.5.3'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op==2) // [verificado 15/03/2021]
		{
			$despachos_anulados="'2.1','2.4','2.5','2.6','2.7','2.10'";
			$despacho_anulador="'2.6'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op==3) // [verificado 15/03/2021]
		{
			$despachos_anulados="'3.1','3.2','3.4','3.3','3.5','3.6','3.7','3.8'";
			$despacho_anulador="'3.7'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op==4) // [verificado 15/03/2021]
		{
			$despachos_anulados="'4.3','4.3.1','4.3.2'";
			$despacho_anulador="'4.3.1'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op==6) // [verificado 15/03/2021]
		{
			$despachos_anulados="'6.1','6.6','6.6.1','6.6.2','6.6.3','6.7','6.8','6.9','6.10','6.20','6.21','6.22','6.23'";
			$despacho_anulador="'6.8','6.9'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op==7) // [verificado 16/03/2021]
		{
			$despachos_anulados="'7.1','7.2','7.3','7.4','7.5','7.6','7.7'";
			$despacho_anulador="'7.2'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op==8) // [verificado 16/03/2021]
		{
			$despachos_anulados="'8.1','8.5','8.6','8.7','8.8','8.9','8.10','8.11','8.12','15.3','15.7','15.17','24.3'";
			$despacho_anulador="'8.8','8.9'";
			$despachos_anulados1="'8.1','8.5','8.6','8.7','8.8','8.9','8.10','8.11','8.12','15.7','24.3'";
			$despacho_anulador1="'8.8','8.9','24.5','24.6','15.30','15.31','15.32'";
		}
		elseif ($op=='9.1') // [verificado 16/03/2021]
		{
			$despachos_anulados="'9.1','9.1.1','9.1.2','9.1.3','9.1.4'";
			$despacho_anulador="'9.1.1','9.1.2'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op=='9.2') // [verificado 17/03/2021]
		{
			$despachos_anulados="'9.2','9.2.1','9.2.2','9.2.3'";
			$despacho_anulador="'9.2.1','9.2.2'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op=='9.2.4') // [verificado 17/03/2021]
		{
			$despachos_anulados="'9.2.4','9.2.4.1'";
			$despacho_anulador="'9.2.4.1'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op==10) // [verificado 17/03/2021]
		{
			$despachos_anulados="'10.1','10.5','10.6','10.7','10.8','10.9','10.9.1'";
			$despacho_anulador="'10.6','10.7'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op==11) // [verificado 17/03/2021]
		{
			$despachos_anulados="'11.1','11.1.1','11.2','11.4','11.5','11.6','11.6.1','11.11','11.12','11.13','11.14','11.15','11.16','11.17','11.18','11.20','11.30','11.31','11.34','11.34.1'";
			$despacho_anulador="'11.13','11.14'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1="'11.13','11.14','15.30'";
		}
		elseif ($op==12) // [verificado 17/03/2021]
		{
			$despachos_anulados="'12.1','12.2','12.3','12.6','12.7','12.8'";
			$despacho_anulador="'12.7'";
			$despachos_anulados1="'12.1','12.2','12.3','12.6','12.7','12.8'";
			$despacho_anulador1="'12.7','PR - Recursos'";
		}
		elseif ($op==15) // [verificado 17/03/2021]
		{
			$despachos_anulados="'15.1','15.2','15.3','15.3.1','15.4','15.7','15.8','15.9','15.10','15.11','15.12','15.13','15.14','15.21','15.22','15.22.1','15.22.2','15.23','15.24','15.24.1','15.24.2','15.24.3','15.25.1','15.25.2','15.25.3','15.25.4','15.30','15.31','15.32','15.33','15.34','15.34.1','15.34.2','15.40'";
			$despacho_anulador="'15.30','15.31','15.32'";
			$despachos_anulados1="'15.1','15.2','15.3','15.3.1','15.4','15.7','15.8','15.9','15.10','15.11','15.12','15.13','15.14','15.21','15.22','15.22.1','15.22.2','15.23','15.24','15.24.1','15.24.2','15.24.3','15.25.1','15.25.2','15.25.3','15.25.4','15.30','15.31','15.32','15.33','15.34','15.34.1','15.34.2','15.40','6.7','11.30'";
			$despacho_anulador1="'15.17','15.30','15.31','15.32','8.9','8.8','23.10','24.5','25.12','28.92'";
		}
		elseif ($op==16) // [verificado 17/03/2021]
		{
			$despachos_anulados="'16.1','16.2','16.3','16.4'";
			$despacho_anulador="'16.2','16.4'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op==17) // [verificado 17/03/2021]
		{
			$despachos_anulados="'17.1','17.2','17.3'";
			$despacho_anulador="'17.2'";
			$despachos_anulados1="'17.1','17.2','17.3'";
			$despacho_anulador1="'17.2','PR - Nulidades'";
		}
		elseif ($op==18) // [verificado 17/03/2021]
		{
			$despachos_anulados="'18.1','18.2','18.3','18.4','18.5','18.6','18.7','18.8','18.10','18.11','18.12','18.13'";
			$despacho_anulador="'18.11','18.12'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op==19) // [verificado 17/03/2021]
		{
			$despachos_anulados="'19.1','19.2','19.3'";
			$despacho_anulador="'19.2'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op==21) // [verificado 17/03/2021]
		{
			$despachos_anulados="'21.1','21.2','21.6','21.7','21.8','21.9','21.10'";
			$despacho_anulador="'21.8','21.9'";
			$despachos_anulados1="'21.1','21.2','21.6','21.7','21.8','21.9','21.10'";
			$despacho_anulador1="'21.8','21.9','24.5'";
		}
		elseif ($op==22) // [verificado 17/03/2021]
		{
			$despachos_anulados="'22.2','22.3','22.4','22.5','22.6.1','22.6.2','22.6.3','22.6.4','22.10','22.11','22.12','22.13','22.14','22.15','22.20','22.21','22.22','22.23','22.34','22.34.1','22.34.2'";
			$despacho_anulador="'22.20','22.21','22.22'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op==23) // [verificado 17/03/2021]
		{
			$despachos_anulados="'23.1','23.1.1','23.2','23.3','23.4','23.5','23.6','23.7','23.8','23.9','23.10','23.11','23.12','23.13','23.14','23.15','23.16','23.17','23.18','23.19'";
			$despacho_anulador="'23.10','23.14','23.15'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op==24) // [verificado 17/03/2021]
		{
			$despachos_anulados="'24.1','24.2','24.3','24.4','24.5','24.6','24.7','24.8','24.10'";
			$despacho_anulador="'24.5','24.6'";
			$despachos_anulados1="'24.1','24.2','24.3','24.4','24.5','24.6','24.7','24.8','24.10','8.1','8.5','8.6','8.7','8.8','8.9','8.10','8.11','8.12','15.7','21.6','22.2','22.5'";
			$despacho_anulador1="'24.5','24.6','8.8','8.9'";
		}
		elseif ($op==25) // [verificado 17/03/2021]
		{
			$despachos_anulados="'25.1','25.2','25.3','25.4','25.5','25.6','25.7','25.8','25.9','25.10','25.11','25.12','25.13'";
			$despacho_anulador="'25.10','25.12'";
			$despachos_anulados1="'25.1','25.2','25.3','25.4','25.5','25.6','25.7','25.8','25.9','25.10','25.11','25.12','25.13','15.7'";
			$despacho_anulador1="'25.10','25.12'";
		}
		elseif ($op==26) // [verificado 17/03/2021]
		{
			$despachos_anulados="'26.1','26.2','26.3','26.4','26.5','26.6','26.7'";
			$despacho_anulador="'26.7'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op==27) // [verificado 17/03/2021]
		{
			$despachos_anulados="'27.1','27.2','27.3','27.4','27.5','27.6','27.7'";
			$despacho_anulador="'27.7'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op==28) // [verificado 18/03/2021]
		{
			$despachos_anulados="'28.1','28.10','28.10.1','28.10.2','28.10.3','28.10.4','28.10.5','28.10.6','28.10.11','28.10.12','28.10.13','28.10.21','28.10.22','28.10.23','28.10.24','28.10.25','28.10.26','28.10.31','28.10.32','28.20','28.21','28.22','28.23','28.30','28.31','28.32','28.40','28.42','28.90','28.91','28.92','28.93'";
			$despacho_anulador="'28.5','28.92'";
			$despachos_anulados1="'28.1','28.10','28.10.1','28.10.2','28.10.3','28.10.4','28.10.5','28.10.6','28.10.11','28.10.12','28.10.13','28.10.21','28.10.22','28.10.23','28.10.24','28.10.25','28.10.26','28.10.31','28.10.32','28.20','28.21','28.22','28.23','28.30','28.31','28.32','28.40','28.42','28.90','28.91','28.92','28.93','15.24','15.24.1','15.24.2','15.24.3'";
			$despacho_anulador1 = $despacho_anulador;
		}
		elseif ($op==29) // [verificado 18/03/2021]
		{
			$despachos_anulados="'29.1','29.2','29.3','29.10','29.11','29.12'";
			$despacho_anulador="'29.12'";
			$despachos_anulados1 = $despachos_anulados;
			$despacho_anulador1 = $despacho_anulador;
		}

		$data_verificar = null;
		if ($rpi>0)
		{
			$cmd2 = "SELECT * FROM rpis_lidas where rpi='$rpi'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) $data_verificar = $line2['data'];
		}

		if ($tipo==1) // http://localhost/teste.php?action=5&op=1.5&tipo=1
		{
			///echo "<BR><BR><B>Conferindo as referencias cruzadas $op</B><BR>";
			// identifica os despachos anulados e confere se de fato na revista indicada consta um despacho anulador compatível
			$total = 0;
			if ($data_verificar == null)
			{
				$cmd = "select * from arquivados where anulado>0 and despacho in ($despachos_anulados)";
				//$cmd = "select * from arquivados where numero='PI9807494' and anulado>0 and despacho in ($despachos_anulados)";
			}
			else
				$cmd = "select * from arquivados where anulado>0 and despacho in ($despachos_anulados) and data='$data_verificar'";

			$res = mysqli_query($link,$cmd);//echo $cmd;exit();
			while (($line=@mysqli_fetch_assoc($res)))
			{
				$numero = $line['numero'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				} // obtem o numero atualizado, se houver, se tiver tres numeros ele vai errar !
				$anulado = $line['anulado']; // número da RPI anulador que anulou este despacho
				$data = $line['data'];
				$despacho = $line['despacho'];
				$cmd2 = "SELECT * FROM rpis_lidas where rpi='$anulado'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) $data_anulador = $line2['data']; // data da RPI anulador

				// em $data_anulador tem que existir um despacho anulador

				$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and data='$data_anulador' and despacho in ($despacho_anulador1) and anulado=0";
				$res2 = mysqli_query($link,$cmd2); //echo "$cmd2<BR>";
				if (!($line2=@mysqli_fetch_assoc($res2)))
				{
					echo "$numero teve $despacho ($data) anulado em $data_anulador mas não foi identificado<BR>";

					//$cmd2 = "select * from agua where (numero='$numero1' or numero='$numero2') and op='$op'";
					//$res2 = mysqli_query($link,$cmd2); //echo "$cmd2<BR>";
					//if (!($line2=@mysqli_fetch_assoc($res2)))
					//{
					//	$total++;
					//	$cmd2 = "insert into agua (numero, data, despacho, op, data_anulador, despacho_anulador) values ('$numero','$data','$despacho','$op','$data_anulador','')";
					//	echo "$cmd2;<BR>";
					//}
				}
			}
			//echo "Fim de processamento: $total<BR><BR>";
			//exit();

			$total=0;
			//echo "Confere despachos anuladores....<BR>"; // faz o caminho inverso da rotina anterior
			// busca despachos anuladores e verifica se tem um anulado anterior
			if ($data_verificar == null)
			{
				$cmd = "select * from arquivados where anulado=0 and despacho in ($despacho_anulador)";
				//$cmd = "select * from arquivados where numero='PI9807494' and anulado=0 and despacho in ($despacho_anulador)";
			}
			else
				$cmd = "select * from arquivados where anulado=0 and despacho in ($despacho_anulador) and data='$data_verificar'";

			$res = mysqli_query($link,$cmd);//echo "$cmd<BR>";
			$i = 0; $numeros_lidos = array();
			while (($line=@mysqli_fetch_assoc($res)))
			{
				$numero = $line['numero'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				if (in_array($numero1,$numeros_lidos)) continue;
				if (in_array($numero2,$numeros_lidos)) continue; // evita pesquisar duas vezes o mesmo número
				$numeros_lidos[$i]=$numero;
				$i = $i + 1;

				$data = $line['data'];
				$despacho = $line['despacho'];
				$anulado = $line['anulado'];
				$cmd2 = "SELECT * FROM rpis_lidas where data='$data'"; // recupera o numero da RI nesta data
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
					$rpi = $line2['rpi'];
				else
				{
					$rpi = 1;
					echo "$numero $data sem revista<BR>";
				}

				// este $despacho_anulador na $rpi deve estar anulando um despacho entre $despachos_anulador numa data anterior
				$cmd3 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ($despachos_anulados1) and data<'$data' and anulado=$rpi";  // "
				$res3 = mysqli_query($link,$cmd3);//echo "$cmd3<BR>";
				if (!$line3=@mysqli_fetch_assoc($res3))
				{
					//$cmd2 = "select * from agua where (numero='$numero1' or numero='$numero2') and op='$op'";
					//$res2 = mysqli_query($link,$cmd2);
					//if (!($line2=@mysqli_fetch_assoc($res2)))
					//{
					//	$total++;
					//	$cmd2 = "insert into agua (numero, data, despacho, op, data_anulador, despacho_anulador) values ('$numero',null,'','$op','$data','$despacho')";
					//	echo "$cmd2;<BR>";
					//}

					echo "$numero teve despacho anulador $despacho ($data) mas não foi identificado o despacho anulado anterior<BR>";
				}
			}
			//echo "Fim de processamento: $total<BR><BR>";
			//exit();
		}

		else // tipo = 0 

		{

		///echo "<BR><BR><B>Conferindo os anuladores e tenta fazer alguns updates mais simples $op</B><BR>";
		if ($data_verificar == null)
		{
			if ($numero=='')
				$cmd = "select * from arquivados where anulado=0 and despacho in ($despacho_anulador) and year(data)>=1997";
			else // http://localhost/teste.php?action=5&op=1.5&numero=112018001186
				$cmd = "select * from arquivados where numero='$numero' and anulado=0 and despacho in ($despacho_anulador)";
		}
		else
			$cmd = "select * from arquivados where anulado=0 and despacho in ($despacho_anulador) and data='$data_verificar'";


		$res = mysqli_query($link,$cmd); //echo "$cmd<BR>";
		$i = 0; $numeros_lidos = array();
		while (($line=@mysqli_fetch_assoc($res)))
		{
			$numero = $line['numero'];
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}
			$numerocd1 = montar_numerocd($numero1);
			$numerocd2 = montar_numerocd($numero2);

			//if (in_array($numero1,$numeros_lidos)) continue;
			//if (in_array($numero2,$numeros_lidos)) continue;
			//$numeros_lidos[$i]=$numero;
			//$i = $i + 1;

			$data = $line['data'];
			$despacho = $line['despacho']; // despacho anulador

			$cmd2 = "SELECT * FROM rpis_lidas where data='$data'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
				$rpi = $line2['rpi'];  // rpi do despacho anulador 
			else
			{
				$rpi = 1;
				echo "$numero $data sem revista<BR>";
			}

			$despacho_anulado_posteriormente=0; // procura se eventualmente este despacho anulador não foi anulado posteriormente
			$cmd3 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ($despacho_anulador) and data>'$data'";
			$res3 = mysqli_query($link,$cmd3);  
			while ($line3=@mysqli_fetch_assoc($res3))
			{
				$data1 = $line3['data']; // detecta que houve despacho anualador posterior, resta saber se esta anulando este despacho
				$despacho1 = $line3['despacho'];
				$cmd2 = "select * from revistas4 where despacho='$despacho1' and (numero='$numerocd1' or numero='$numerocd2') and inid='co' and data='$data1'";
				$res2 = mysqli_query($link,$cmd2); //echo "$cmd2<BR>";
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$descricao = trim($line2['descricao']);
					$descricao = str_replace("REVISTA",'RPI',$descricao);
					$descricao = str_replace('º','',$descricao);
					$descricao = str_replace('s','',$descricao);
					$descricao = str_replace('S','',$descricao);
					$descricao = str_replace(',','',$descricao);
					$descricao = str_replace('°','',$descricao);
					$descricao = str_replace('.','',$descricao);
					$descricao = str_replace('n','',$descricao);
					$descricao = str_replace('N','',$descricao);
					$descricao = str_replace(' ','',$descricao);
					$descricao = str_replace('Â','',$descricao);
					$descricao = str_replace("´",'',$descricao);
					$descricao = str_replace("'",'',$descricao);
					$descricao = str_replace("de",'',$descricao);
					$descricao = str_replace("DE",'',$descricao);
					//echo "$descricao<BR>";exit();
					$pos = strpos($descricao,'RPI');
					if (!($pos2===false))
					{
						$rpi_detectada = trim(substr($descricao,$pos+strlen('RPI'),4));
						$cmd2 = "SELECT * FROM rpis_lidas where rpi='$rpi_detectada'";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
						{
							$data1 = $line2['data'];
							//echo "$data $data1 $rpi_detectada<BR>";exit();
							if ($data1==$data) $despacho_anulado_posteriormente=1;
						}
					}
				}
			}

			if ($despacho_anulado_posteriormente==0) // ok, não existe anulado de despacho anulador
			{
				$cmd2 = "select * from revistas4 where despacho='$despacho' and (numero='$numerocd1' or numero='$numerocd2') and inid='co' and data='$data'";
				$res2 = mysqli_query($link,$cmd2); //echo "!$cmd2<BR>";
				if ($line2=@mysqli_fetch_assoc($res2))  // é um despacho anulador 7.2 por ex. que teve algo escrito no campo co, lei a revista sendo anulada
				{
					$despacho_anulado_identificado = 0;
					$descricao = trim($line2['descricao']);
					$descricao = str_replace("REVISTA",'RPI',$descricao);
					$descricao = str_replace('º','',$descricao);
					$descricao = str_replace('s','',$descricao);
					$descricao = str_replace('S','',$descricao);
					$descricao = str_replace(',','',$descricao);
					$descricao = str_replace('°','',$descricao);
					$descricao = str_replace('.','',$descricao);
					$descricao = str_replace('n','',$descricao);
					$descricao = str_replace('N','',$descricao);
					$descricao = str_replace(' ','',$descricao);
					$descricao = str_replace('Â','',$descricao);
					$descricao = str_replace("´",'',$descricao);
					$descricao = str_replace("'",'',$descricao);
					$descricao = str_replace("de",'',$descricao);
					$descricao = str_replace("DE",'',$descricao);
					$pos = strpos($descricao,'RPI'); // echo "[$cmd2] [$data] [$numero] $descricao<BR>"; //exit();
					if (!($pos===false)) // se se encontrou termo RPI
					{
						$rpi_detectada = trim(substr($descricao,$pos+strlen('RPI'),4));
						$cmd2 = "SELECT * FROM rpis_lidas where rpi='$rpi_detectada'"; 
						$res2 = mysqli_query($link,$cmd2);
						$data1 = null;
						if ($line2=@mysqli_fetch_assoc($res2)) $data1 = $line2['data'];
						$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ($despachos_anulados1) and data='$data1'";
						$res2 = mysqli_query($link,$cmd2); // echo "[$rpi_detectada][$data1] $cmd2<BR>";
						if ($line2=@mysqli_fetch_assoc($res2))
						{
							$anulado1 = $line2['anulado'];
							if ($anulado1<>$rpi) // só faz o update se for necessário
							{
								$cmd2 = "update arquivados set anulado=$rpi where (numero='$numero1' or numero='$numero2') and despacho in ($despachos_anulados) and data='$data1'";
								$res2 = mysqli_query($link,$cmd2);
								echo "$cmd2;<BR>";
							}
							$ler_data = 0;
							$despacho_anulado_identificado = 1;
						}
					}

					if ($despacho_anulado_identificado==0) // não consegui identificar pela RPI tente pela data
					{
						//echo "mirou errado<BR>"; // tenta reconhecer a data no formato 22/07/1994
						//preg_match('/(\d{2}\/)+(\d{4})/', $descricao, $match); // 22/07/1994
						//$dia = substr($match[0],0,2);
						//$mes = substr($match[0],3,2);
						//$ano = substr($match[0],6,4);
						//$data1 = "$ano-$mes-$dia";

						preg_match('/(\d{1,2}\/){2}(\d{2,4})/', $descricao, $match); // 22/07/1994
						$str = trim($match[0]);
						$pos = strpos($str,"/"); //echo "$pos $str<BR>";
						if ($pos !== false) $dia = substr($str,0,$pos);
						$dia = str_pad($dia,2,"0",STR_PAD_LEFT);

						$str = substr($str,$pos+1);
						$pos = strpos($str,"/"); //echo "$pos $str<BR>";
						if ($pos !== false) $mes = substr($str,0,$pos);
						$mes = str_pad($mes,2,"0",STR_PAD_LEFT);

						$ano = substr($str,$pos+1);
						if (strlen($ano)==2)
						{
							if ($ano<50)
								$ano = $ano + 2000;
							else
								$ano = $ano + 1900;
						}
						$data1 = "$ano-$mes-$dia";

						$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ($despachos_anulados1) and data='$data1'";
						$res2 = mysqli_query($link,$cmd2); //echo "$cmd2<BR>";
						if ($line2=@mysqli_fetch_assoc($res2))
						{
							$anulado1 = $line2['anulado'];
							if ($anulado1<>$rpi)
							{
								$cmd2 = "update arquivados set anulado=$rpi where (numero='$numero1' or numero='$numero2') and despacho in ($despachos_anulados) and data='$data1'";
								$res2 = mysqli_query($link,$cmd2);
								echo "$cmd2;<BR>";
							}
							$despacho_anulado_identificado = 1;
						}
					}

					if ($despacho_anulado_identificado==0) // não identifiquei o despacho a ser anulado pela RPI e nem pela data
					{
						$str = str_replace("'","",$despacho_anulador); // agora vou ver se só existe um despacho válido anterior, se houver ok é esse !
						$pieces = explode(",", $str);
						$count=0;$data2=null;$despacho2='';$anulado2=0;$anulado_duplo=0;

						$cmd3 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ($despachos_anulados1) and data<'$data' order by data desc"; 
						$res3 = mysqli_query($link,$cmd3);  //echo "$cmd3<BR>";exit();
						if ($line3=@mysqli_fetch_assoc($res3))
						{
							$data1 = $line3['data'];
							$despacho1 = $line3['despacho'];
							$anulado1 = $line3['anulado'];
							if ($anulado1<>$rpi)
							{
								$cmd2 = "update arquivados set anulado=$rpi where (numero='$numero1' or numero='$numero2') and despacho='$despacho1' and data='$data1'";
								$res2 = mysqli_query($link,$cmd2);
								echo "$cmd2;<BR>";
							}
						}
						else // não tem nenhum despacho para anular, estranho, verifique manualmente
						{
							echo "Verificação manual: $despacho;$data;$numero<BR>";
						}


/*						$cmd3 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ($despachos_anulados1) and data<='$data' order by data desc"; // "
						$res3 = mysqli_query($link,$cmd3);  //echo "$cmd3<BR>";
						while ($line3=@mysqli_fetch_assoc($res3))
						{
							$data1 = $line3['data'];
							$despacho1 = $line3['despacho'];
							$anulado1 = $line3['anulado'];
							$anulado_duplo = 1;
							if (in_array($despacho1,$pieces)) break;
							$anulado_duplo = 0;
							$data2 = $data1;
							$despacho2 = $despacho1;
							$anulado2 = $anulado1;
							$count++;
						}

						if ($count==1)
						{
							//echo "$despacho2 $data2 $anulado2 $rpi<BR>";
							if ($anulado2<>$rpi)
							{
								$cmd2 = "select * from agua where (numero='$numero1' or numero='$numero2') and ((data='$data' and despacho='$despacho') or (data_anulador='$data' and despacho_anulador='$despacho'))";
								$res2 = mysqli_query($link,$cmd2);
								if (!($line2=@mysqli_fetch_assoc($res2)))
								{
									$cmd2 = "update arquivados set anulado=$rpi where (numero='$numero1' or numero='$numero2') and despacho='$despacho2' and data='$data2'";
									echo "$cmd2;<BR>";
								}
							}
						}
						else
						{
							if ($anulado_duplo==1)
								echo "Anulado de anulado. Verificação manual: $despacho;$data;$numero<BR>";
							else
								echo "Verificação manual: $count despachos anteriores $despacho;$data;$numero<BR>";
						} */
					}
				}
				else // não teve nenhum campo co ou de no despacho anulado especificando a revista, logo assuma que é o último despacho válido 
				{
					$str = str_replace("'","",$despacho_anulador); // agora vou ver se só existe um despacho válido anterior, se houver ok é esse !
					$pieces = explode(",", $str);
					$count=0;$data2=null;$despacho2='';$anulado2=0;$anulado_duplo=0;

					$cmd3 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ($despachos_anulados1) and data<'$data' order by data desc"; 
					$res3 = mysqli_query($link,$cmd3);  //echo "$cmd3<BR>";//exit();
					if ($line3=@mysqli_fetch_assoc($res3))
					{
						$data1 = $line3['data'];
						$despacho1 = $line3['despacho'];
						$anulado1 = $line3['anulado'];
						if ($anulado1<>$rpi)
						{
							$cmd2 = "update arquivados set anulado=$rpi where (numero='$numero1' or numero='$numero2') and despacho='$despacho1' and data='$data1'";
							$res2 = mysqli_query($link,$cmd2);
							echo "$cmd2;<BR>";
						}
					}
					else
					{
						echo "Verificação manual: $count despachos anteriores $despacho;$data;$numero<BR>";
					}
				}
			}
			else
				echo "$numero teve $despacho em $data anulado posteriormente, faça verificação manual<BR>";
		}

		} // fim do else if $tipo==1

		//echo "Fim de processamento<BR><BR>";
		//exit();

		return;
	}



	if ($action==124)
	{

		$instrucoes_tecnicas=0;
		$instrucoes_adm=0;
		$notificacoes=0;
		$instrucoes_pendentes=0;
		@ $fp1 = fopen("instrucoes_tecnicas.txt","w");
		@ $fp2 = fopen("instrucoes_adm.txt","w");
		@ $fp3 = fopen("notificacoes.txt","w");
		@ $fp4 = fopen("instrucoes_pendentes.txt","w");
		@ $fp5 = fopen("acoes.txt","w");
		$acoes=0;
		$kmes = str_pad($mes,2,"0",STR_PAD_LEFT);
		$idata = "$ano-$kmes-01";

		$cmd = "select * from arquivados where despacho in ('12.2','12.3','12.6','23.8','17.1') and year(data)=$ano and month(data)=$mes";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$data = $line['data'];
			$notificacoes++;
			$str = $numero." ".$data."\n";
			fputs($fp3,$str);
		}

		$cmd = "select * from pedido as p, examinador as e where p.codigo=e.codigo and year(e.data)=$ano and month(e.data)=$mes and p.divisao='cgrec' and instancia='acao judicial'";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$data = $line['data'];
			$acoes++;
			$str = $numero." ".$data."\n";
			fputs($fp5,$str);
		}

		$total_divisao['cgrec']=0;
		$array_decisao1 = array ('recurso 100','recurso 111','recurso 120','recurso 121','recurso 130','nulidade 200','nulidade 201','nulidade 204','nulidade 205','7.4');
		foreach ($divisoes as $divisao)
		{
			$total_divisao[$divisao]=0;
			$total_recurso_divisao[$divisao]=0;
			$total_nulidade_divisao[$divisao]=0;
			foreach ($array_decisao1 as $decisao)
			{
				$recurso[$decisao][$divisao]=0;
				$recurso[$decisao]['cgrec']=0;
			}
		}
		
		$cmd = "select * from pedido where year(rpi)=$ano and month(rpi)=$mes order by numero,decisao desc";
		$res = mysqli_query($link,$cmd);
		$numeros_lidos = array();$i_lidos=0;
		while ($line=@mysqli_fetch_assoc($res))
		{
			  $numero = $line['numero'];
			  $instancia = $line['instancia'];
			  $decisao = $line['decisao'];
			  $divisao = $line['divisao'];
			  $data = $line['rpi'];

			  $array_instancia1 = array ('recurso cgrec', 'nulidade cgrec');
			  $array_instancia2 = array ('recurso', 'nulidade');
			  $array_decisao1 = array ('recurso 100','recurso 111','recurso 120','recurso 121','nulidade 200','nulidade 201','nulidade 204','nulidade 205','7.4');
			  $array_decisao2 = array ('recurso ciencia','recurso exigencia','recurso exigencia 121','recurso provido','recurso negado','recurso manutencao do indeferimento 111','nulidade provida','nulidade negada','nulidade parcial','nulidade 1');
			  //$cmd = "select * from pedido where (instancia in ('recurso cgrec', 'nulidade cgrec') and decisao in ('recurso 100','recurso 111','recurso 120','recurso 130','nulidade 200','nulidade 201','nulidade 204','nulidade 205','7.4') or (instancia in ('recurso', 'nulidade') and decisao in ('recurso ciencia','recurso exigencia','recurso exigencia 121','recurso provido','recurso negado','recurso manutencao do indeferimento 111','nulidade provida','nulidade negada','nulidade parcial','nulidade 1'))) and year(rpi)=$ano and month(rpi)=$mes";
			  if ( (in_array($instancia,$array_instancia1) && in_array($decisao,$array_decisao1)) || (in_array($instancia,$array_instancia2) && in_array($decisao,$array_decisao2)) )
  			  {
					if (!in_array($numero,$numeros_lidos))
					{
						if ($decisao=='recurso ciencia') $decisao='recurso 120';
						if ($decisao=='recurso exigencia') $decisao='recurso 121';
						if ($decisao=='recurso exigencia 121') $decisao='recurso 121';
						if ($decisao=='recurso provido') $decisao='recurso 100';
						if ($decisao=='recurso negado' or $decisao=='recurso manutencao do indeferimento 111') $decisao='recurso 111';
						if ($decisao=='nulidade provida') $decisao='nulidade 200';
						if ($decisao=='nulidade negada') $decisao='nulidade 201';
						if ($decisao=='nulidade parcial') $decisao='nulidade 204';
						if ($decisao=='nulidade 1') $decisao='nulidade 205';
						if ($divisao=='direp') $divisao='cgrec';
						
						$recurso[$decisao][$divisao]++;
						$numeros_lidos[$i_lidos++]=$numero;					
						//$numero = $line['numero'];
						//$data = $line['rpi'];
						$instrucoes_tecnicas++;
						$str = $divisao." ".$numero." ".$data."\n";
						fputs($fp1,$str);
						//if ($decisao=='nulidade 201') echo "<B>$divisao $numero</B> <BR>";
					}
			  }

			  //$cmd = "select count(*) as x from pedido where (instancia in ('recurso cgrec', 'nulidade cgrec') and decisao in ('recurso 102','recurso 103','recurso 104','recurso 112','recurso 113','recurso 115','recurso 131','recurso 135','recurso 136','recurso 137','recurso 138','recurso 139','recurso 140','nulidade 216','nulidade 218') ) and year(rpi)=$ano and month(rpi)=$mes";
			  $array_instancia1 = array ('recurso cgrec', 'nulidade cgrec');
			  $array_decisao1 = array ('recurso 102','recurso 103','recurso 104','recurso 112','recurso 113','recurso 115','recurso 131','recurso 135','recurso 136','recurso 137','recurso 138','recurso 139','recurso 140','nulidade 216','nulidade 218');
			  if ( (in_array($instancia,$array_instancia1) && in_array($decisao,$array_decisao1)) )
  			  {
					//$numero = $line['numero'];
					//$data = $line['rpi'];
					$instrucoes_adm++;
					$str = $divisao." ".$numero." ".$data."\n";
					fputs($fp2,$str);
			  }
		}

		$cmd = "select * from pedido where rpi='0000-00-00' and (divisao='cgrec' or divisao='corep')";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			  $numero = $line['numero'];
			  $instancia = $line['instancia'];
			  $decisao = $line['decisao'];

			  //$cmd = "select count(*) as x from pedido where (instancia in ('recurso cgrec', 'nulidade cgrec') and decisao in ('recurso 100','recurso 111','recurso 120','recurso 121','recurso 130','nulidade 200','nulidade 201','nulidade 204','nulidade 205','7.4') or (instancia in ('recurso', 'nulidade') and decisao in ('recurso ciencia','recurso exigencia','recurso exigencia 121','nulidade 1'))) and year(rpi)=$ano and month(rpi)=$mes";
			  $array_instancia1 = array ('recurso cgrec', 'nulidade cgrec');
			  $array_instancia2 = array ('recurso', 'nulidade');
			  $array_decisao1 = array ('recurso 100','recurso 111','recurso 120','recurso 121','nulidade 200','nulidade 201','nulidade 204','nulidade 205','7.4');
			  $array_decisao2 = array ('recurso ciencia','recurso exigencia','recurso exigencia 121','nulidade 1');
			  if ( (in_array($instancia,$array_instancia1) && in_array($decisao,$array_decisao1)) || (in_array($instancia,$array_instancia2) && in_array($decisao,$array_decisao2)) )
  			  {
					$numero = $line['numero'];
					$data = $line['data'];
					$instrucoes_pendentes++;
					$str = $numero." ".$data."\n";
					fputs($fp4,$str);
			  }

			  //$cmd = "select count(*) as x from pedido where (instancia in ('recurso cgrec', 'nulidade cgrec') and decisao in ('recurso 102','recurso 103','recurso 104','recurso 112','recurso 113','recurso 115','recurso 131','recurso 135','recurso 136','recurso 137','recurso 138','recurso 139','recurso 140','nulidade 216','nulidade 218') ) and year(rpi)=$ano and month(rpi)=$mes";
			  $array_instancia1 = array ('recurso cgrec', 'nulidade cgrec');
			  $array_decisao1 = array ('recurso 102','recurso 103','recurso 104','recurso 112','recurso 113','recurso 115','recurso 131','recurso 135','recurso 136','recurso 137','recurso 138','recurso 139','recurso 140','nulidade 216','nulidade 218');
			  if ( (in_array($instancia,$array_instancia1) && in_array($decisao,$array_decisao1)) )
  			  {
					$numero = $line['numero'];
					$data = $line['data'];
					$instrucoes_pendentes++;
					$str = $numero." ".$data."\n";
					fputs($fp4,$str);
			  }
		}

		echo "<a href='notificacoes.txt' target='_blank'>Notificações</a>: $notificacoes<BR>";
		echo "<a href='instrucoes_tecnicas.txt' target='_blank'>Instruções Técnicas</a>: $instrucoes_tecnicas<BR>";
		echo "<a href='instrucoes_adm.txt' target='_blank'>Instruções Administrativas</a>: $instrucoes_adm<BR>";
		$pendentes = $instrucoes_pendentes;
		echo "<a href='instrucoes_pendentes.txt' target='_blank'>Instruções Pendentes</a>: $pendentes<BR>";
		echo "<a href='acoes.txt' target='_blank'>Ações Judiciais</a>: $acoes<BR>";
		echo "update cgrec set param1=$notificacoes, param2=$instrucoes_tecnicas, param3=$instrucoes_adm, param4=$instrucoes_pendentes, param5=$acoes where tipo='cgrecprod' and data='$idata';<BR>";

		$total_recursos_dirpa = 0;
		$total_recursos_cgrec = 0;
		$total_nulidades_dirpa = 0;
		$total_nulidades_cgrec = 0;
		$array_decisao1 = array ('recurso 100','recurso 111','recurso 120','recurso 121','nulidade 200','nulidade 201','nulidade 204','nulidade 205','7.4');
		foreach ($array_decisao1 as $decisao)
		{
			$total=0;
			echo "$decisao: <BR>";
			foreach ($divisoes as $divisao)
			{
				if ($recurso[$decisao][$divisao]>0) echo "$divisao: ".$recurso[$decisao][$divisao]."<BR>";
				$total = $total + $recurso[$decisao][$divisao];
				$total_divisao[$divisao] = $total_divisao[$divisao] + $recurso[$decisao][$divisao];
				if ($decisao=='recurso 100' or $decisao=='recurso 111' or $decisao=='recurso 120' or $decisao=='recurso 121') 
					$total_recurso_divisao[$divisao] = $total_recurso_divisao[$divisao] + $recurso[$decisao][$divisao];
				if ($decisao=='nulidade 200' or $decisao=='nulidade 201' or $decisao=='nulidade 204' or $decisao=='nulidade 205') 
					$total_nulidade_divisao[$divisao] = $total_nulidade_divisao[$divisao] + $recurso[$decisao][$divisao];

			}
			if ($recurso[$decisao]['cgrec']>0) echo "CGREC: ".$recurso[$decisao]['cgrec']."<BR>";
			if ($decisao=='recurso 100' or $decisao=='recurso 111' or $decisao=='recurso 120' or $decisao=='recurso 121') 
			{
					$total_recursos_dirpa = $total_recursos_dirpa + $total;
					$total_recursos_cgrec = $total_recursos_cgrec + $recurso[$decisao]['cgrec'];
			}
			if ($decisao=='nulidade 200' or $decisao=='nulidade 201' or $decisao=='nulidade 204' or $decisao=='nulidade 205') 
			{
					$total_nulidades_dirpa = $total_nulidades_dirpa + $total;
					$total_nulidades_cgrec = $total_nulidades_cgrec + $recurso[$decisao]['cgrec'];
			}
			$total = $total + $recurso[$decisao]['cgrec'];
			$total_divisao['cgrec'] = $total_divisao['cgrec'] + $recurso[$decisao]['cgrec'];
			echo "Total: $total <BR>";
		}
		echo "Totais:<BR>";
		$soma_dirpa = 0;
		foreach ($divisoes as $divisao)
			if ($total_divisao[$divisao]>0) 
			{
				echo "$divisao: ".$total_divisao[$divisao]."<BR>";
				$soma_dirpa = $soma_dirpa + $total_divisao[$divisao];
			}
		if ($total_divisao['cgrec']>0) echo "CGREC: ".$total_divisao['cgrec']."<BR>";
		
		echo "Produção Total de Despachos da COREP (Instruções Técnicas)<BR>";
		$total = $total_divisao['cgrec'] + $soma_dirpa; // recursos e nulidades
		$percentual_dirpa = round(100*$soma_dirpa/$total,0);
		$percentual_cgrec = round(100*$total_divisao['cgrec']/$total,0);
		echo "DIRPA: $soma_dirpa ($percentual_dirpa%) <BR>";
		echo "COREP: ".$total_divisao['cgrec']." ($percentual_cgrec%) <BR>";

		echo "Produção Total de Recursos da COREP (Instruções Técnicas)<BR>";
		$total = $total_recursos_cgrec + $total_recursos_dirpa;
		$percentual_dirpa = round(100*$total_recursos_dirpa/$total,0);
		$percentual_cgrec = round(100*$total_recursos_cgrec/$total,0);
		echo "DIRPA: $total_recursos_dirpa ($percentual_dirpa%) <BR>";
		echo "COREP: $total_recursos_cgrec ($percentual_cgrec%) <BR>";

		echo "Produção de Recursos DIRPA por Divisão (Instruções Técnicas)<BR>";
		$total=0;
		foreach ($divisoes as $divisao)
			$total = $total + $total_recurso_divisao[$divisao];
		foreach ($divisoes as $divisao)
		{
			$percentual[$divisao] = round(100*$total_recurso_divisao[$divisao]/$total,0);
			if ($total_recurso_divisao[$divisao]>0) echo "$divisao: ".$total_recurso_divisao[$divisao]."(".$percentual[$divisao]."%)<BR>";
		}

		echo "Produção de Nulidades DIRPA e COREP (Instruções Técnicas)<BR>";
		$total = $total_nulidades_cgrec + $total_nulidades_dirpa;
		$percentual_dirpa = round(100*$total_nulidades_dirpa/$total,0);
		$percentual_cgrec = round(100*$total_nulidades_cgrec/$total,0);
		echo "DIRPA: $total_nulidades_dirpa ($percentual_dirpa%) <BR>";
		echo "COREP: $total_nulidades_cgrec ($percentual_cgrec%) <BR>";		

		echo "Produção de Nulidades DIRPA por Divisão (Instruções Técnicas)<BR>";
		$total=0;
		foreach ($divisoes as $divisao)
			$total = $total + $total_nulidade_divisao[$divisao];
		foreach ($divisoes as $divisao)
		{
			$percentual[$divisao] = round(100*$total_nulidade_divisao[$divisao]/$total,0);
			if ($total_nulidade_divisao[$divisao]>0) echo "$divisao: ".$total_nulidade_divisao[$divisao]."(".$percentual[$divisao]."%)<BR>";
		}
		
		fclose($fp1);
		fclose($fp2);
		fclose($fp3);
		fclose($fp4);
		fclose($fp5);

		
		/*
		Notificações:
		select numero from CEPIT_SISCAP.SISCAP_ARQUIVADOS where despacho in ('12.2','12.3','12.6','23.8','17.1') and extract(year from rpi)=2022 and extract(month from rpi)=1
		
		Instruções técnicas (CGREC apenas): 
		select distinct(numero) from CEPIT_SISCAP.SISCAP_PEDIDO where (instancia in ('recurso cgrec', 'nulidade cgrec') and decisao in ('recurso 100','recurso 111','recurso 120','recurso 121','recurso 130','nulidade 200','nulidade 201','nulidade 204','nulidade 205','7.4') or (instancia in ('recurso', 'nulidade') and decisao in ('recurso ciencia','recurso exigencia','recurso exigencia 121','recurso provido','recurso negado','recurso manutencao do indeferimento 111','nulidade provida','nulidade negada','nulidade parcial','nulidade 1'))) and extract(year from rpi)=2022 and extract(month from rpi)=1 and (divisao='cgrec' or divisao='direp')
		
		Instruções Administrativas:
		select distinct(numero) from CEPIT_SISCAP.SISCAP_PEDIDO where (instancia in ('recurso cgrec', 'nulidade cgrec') and decisao in ('recurso 102','recurso 103','recurso 104','recurso 112','recurso 113','recurso 115','recurso 130','recurso 131','recurso 136','recurso 137','recurso 138','recurso 139','recurso 140','recurso 141','nulidade 211','nulidade 212','nulidade 214','nulidade 216','nulidade 218') ) and extract(year from rpi)=2022 and extract(month from rpi)=1

		Pendentes Instruções Administrativas: 
		select distinct(numero) from CEPIT_SISCAP.SISCAP_PEDIDO where (instancia in ('recurso cgrec', 'nulidade cgrec') and decisao in ('recurso 102','recurso 103','recurso 104','recurso 112','recurso 113','recurso 115','recurso 130','recurso 131','recurso 136','recurso 137','recurso 138','recurso 139','recurso 140','recurso 141','nulidade 211','nulidade 212','nulidade 214','nulidade 216','nulidade 218') ) and rpi is null
		
		Pendentes Instruções Técnicas (CGREC apenas):
		select distinct(numero) from CEPIT_SISCAP.SISCAP_PEDIDO where (instancia in ('recurso cgrec', 'nulidade cgrec') and decisao in ('recurso 100','recurso 111','recurso 120','recurso 121','recurso 130','nulidade 200','nulidade 201','nulidade 204','nulidade 205','7.4') or (instancia in ('recurso', 'nulidade') and decisao in ('recurso ciencia','recurso exigencia','recurso exigencia 121','recurso provido','recurso negado','recurso manutencao do indeferimento 111','nulidade provida','nulidade negada','nulidade parcial','nulidade 1'))) and rpi is null and (divisao='cgrec' or divisao='direp')
		
		/*
		$recursos=0;$recursos_adm=0;$nulidades=0;
		$cmd = "select * from fase5 where despacho in ('12.2','12.3','12.6','17.1') and dataout is null";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$despacho = $line['despacho'];
			if ($despacho=='12.2') $recursos++;
			if ($despacho=='12.3' or $despacho=='12.6') $recursos_adm++;
			if ($despacho=='17.1') $nulidade++;
		}

		$data = date('d/m/Y');
		echo "Backlog: $data<BR>";
		echo "Recursos (12.2): $recursos <BR>";
		echo "Recursos Administrativos (12.3 + 12.6): $recursos_adm <BR>";
		echo "Nulidades Administrativas (17.1): $recursos <BR>";
		*/
		echo "Fim processamento";
		exit();
	}

	$divisoes = array ('ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut');
	//divisoes não inclui a dipem
	
	if ($action==34)
	{
// https://google-developers.appspot.com/chart/interactive/docs/gallery/columnchart

// nao pode haver duplicatas na tabela pedido, esta query tem que retornar zero 
// SELECT * FROM `pedido` WHERE instancia='1 exame' and anulado=0 group by numero having count(*)>1
// tem 41 anvisa que indicam 1 exame, acertar para ficar instancia=-
// SELECT * FROM `pedido` WHERE (decisao='anvisa' or decisao='anvisa novo') and (instancia<>'2 exame' and instancia<>'-')
// update `pedido` set instancia='-' WHERE (decisao='anvisa' or decisao='anvisa novo') and (instancia<>'2 exame' and instancia<>'-')
// tem instancia = 1 exame que tem etapa <>1
// SELECT * FROM `pedido` WHERE instancia='1 exame' and etapa<>1
// update `pedido` set etapa=1 WHERE instancia='1 exame' and etapa<>1

	if ($op==77)
	{
		$cmd = "select distinct(rpi) from pedido where rpi<>'0000-00-00'";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res)) 
		{
			$data_rpi = $line['rpi'];
			$cmd2 = "SELECT * FROM rpis_lidas where data='$data_rpi'";
			$res2 = mysqli_query($link,$cmd2);
			if (!$line2=@mysqli_fetch_assoc($res2)) echo $data_rpi."<BR>";
		}
		echo "Fim processamento";
		exit(); 
		
		$total=0;
		$cmd = "select distinct(dataout) from publicados where dataout is not null'";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res)) 
		{
			$data = $line['dataout'];
			$cmd2 = "SELECT * FROM rpis_lidas where data='$data'";
			$res2 = mysqli_query($link,$cmd2);
			if (!$line2=@mysqli_fetch_assoc($res2)) echo $data_rpi."<BR>";
		}
		echo "Fim processamento";
		exit(); 
		
		$total=0;
		$cmd = "select distinct(data) from arquivados where 1'";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res)) 
		{
			$data = $line['data'];
			$cmd2 = "SELECT * FROM rpis_lidas where data='$data'";
			$res2 = mysqli_query($link,$cmd2);
			if (!$line2=@mysqli_fetch_assoc($res2)) echo $data_rpi."<BR>";
		}
		echo "Fim processamento";
		exit(); 
	// update `pedido` set rpi='2012-12-05' WHERE rpi='2012-12-04'
	// update `pedido` set rpi='2012-11-21' WHERE rpi='2012-11-20'
	}
	
	if ($op==78)
	{
		$total=0;
		$cmd = "select * from pedido where instancia='1 exame' and rpi<>'0000-00-00'";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res)) 
		{
			$numero = $line['numero'];
			$data_rpi = $line['rpi'];
			$anulado = $line['anulado'];
			if ($anulado>0)
			{
				$cmd2 = "SELECT * FROM rpis_lidas where rpi=$anulado";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) $data_anulado = $line2['data'];
			}
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}
			$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and data='$data_rpi' and despacho in ('6.1','7.1','9.1','9.2')";
			$res2 = mysqli_query($link,$cmd2);$i=0;$mostrar=0;
			while ($line2=@mysqli_fetch_assoc($res2)) 
			{
				$i++;
				$anulado_arquivados = $line2['anulado'];
				if ($anulado<>$anulado_arquivados)
				{
					$cmd2 = "update pedido set anulado=$anulado_arquivados where numero='$numero' and instancia='1 exame' and rpi='$data_rpi'";
					$total++;
					$mostrar=1;
				}
			}
			if ($i==0) echo "$cmd2;<BR>";
			if ($i==1 and $mostrar==1) echo "$cmd2;<BR>"; // PI9608704 p.ex. tem dosi despachos na mesma data, ignore casos assim.
		}
		echo "Fim de processamento:$total";
		exit();
	}

	if ($op==79)
	{
		$cmd = "select * from examinador where 1 group by email,data,codigo having count(*)>1 limit 0,10000 ";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res)) 
		{
			$email = $line['email'];
			$data = $line['data'];
			$codigo = $line['codigo'];
			$dono = $line['dono'];
			$aceite = $line['aceite'];
			$i=0;
			echo "delete from examinador where email='$email' and data='$data' and codigo=$codigo;<BR>";
			echo "insert into examinador (email,data,codigo,dono,aceite) values ('$email','$data',$codigo,'$dono','$aceite');<BR>";
		}
		exit();
	}
	
// cálculo dos tempos por divisao
	if ($op==1) // http://localhost/central/control.php?action=34&op=1&gravar=0
	{
		$cmd = "select * from cgrec_all where email='dirpa' and ano=0";
		$res = mysqli_query($link,$cmd);
		if (!$line=@mysqli_fetch_assoc($res)) 
		{
			$cmd = "insert into cgrec_all (email,ano) values ('dirpa',0)";
			echo "$cmd;<BR>";
			if ($gravar==1) $res = mysqli_query($link,$cmd);
		}
		foreach ($divisoes as $idivisao)
		{
			$cmd = "select * from cgrec_all where email='$idivisao' and ano=0";
			$res = mysqli_query($link,$cmd);
			if (!$line=@mysqli_fetch_assoc($res)) 
			{
				$cmd = "insert into cgrec_all (email,ano) values ('$idivisao',0)";
				echo "$cmd;<BR>";
				if ($gravar==1) $res = mysqli_query($link,$cmd);
			}
		}

		$i=0; $j=0; $k=0; $n=0; $email='abrantes';
		foreach ($divisoes as $idivisao)
		{
			$soma_tempo_1[$idivisao] = 0;
			$total_tempo_1[$idivisao] = 0;
			$soma_tempo_concessao[$idivisao]=0;
			$total_tempo_concessao[$idivisao] =0;
			$soma_tempo_1_decisao[$idivisao] = 0;
			$total_tempo_1_decisao[$idivisao] = 0;
			$soma_tempo_etapas[$idivisao] = 0;
			$total_tempo_etapas[$idivisao] = 0;
		}
		$soma_tempo_1['dirpa'] = 0;
		$total_tempo_1['dirpa'] = 0;
		$soma_tempo_concessao['dirpa']=0;
		$total_tempo_concessao['dirpa'] =0;
		$soma_tempo_1_decisao['dirpa'] = 0;
		$total_tempo_1_decisao['dirpa'] = 0;
		$soma_tempo_etapas['dirpa'] = 0;
		$total_tempo_etapas['dirpa'] = 0;  // calcula os tempos de cada divisao e da dirpa apenas para o ultimo ano completo 2021
		$strcgrec3='';$contador=0;
		$cmd = "select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and p.instancia in ('1 exame') and year(rpi)=2021 and anulado=0 limit 0,400";
		$cmd = "select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and p.instancia in ('1 exame') and year(rpi)=2021 and anulado=0";
		$res = mysqli_query($link,$cmd); 
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$idivisao = $line['divisao']; // alguns pedidos estao na ccarga da cgpat i, ii, iii e iv neste caso ignore
			if ($idivisao=='dipem') $idivisao='diciv'; // dipem não existe mais, transfira tudo para diciv
			$data_1 = $line['rpi'];
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}
			$data_deposito = null;
			$cmd2 = "SELECT * FROM publicados where numero='$numero1' or numero='$numero2'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=mysqli_fetch_assoc($res2)) $data_deposito = $line2['data_nacional'];
			if ($data_deposito==null) $data_deposito = $line2['data_deposito'];
			if ($data_deposito==null) continue; // contagem deve ser sempre feita da data de entrada na fase nacional e não pela data de depósito internacional
			
			list($ano,$mes,$dia) = explode('-',$data_1);
			$idata_1 = mktime(0,0,0,(integer)$mes,(integer)$dia,(integer)$ano); // retorna intervalo em segundos desde 1970 de $data_rpi - 90 dias
			list($ano,$mes,$dia) = explode('-',$data_deposito);
			$idata_deposito = mktime(0,0,0,(integer)$mes,(integer)$dia,(integer)$ano); // retorna intervalo em segundos desde 1970 de $data_rpi - 90 dias
			$tempo_1 = round(($idata_1-$idata_deposito)/(24*60*60*30*12),2); // simplifica-se com 1 ano = 365 dias, 1 mes = 30 dias
			// echo "$numero $data_1 $data_deposito $tempo<BR>"; exit();
			$soma_tempo_1[$idivisao] = $soma_tempo_1[$idivisao] + $tempo_1; // tem que ter este @ pq alguns pedidos foram feitos pela cgpat i, ii, iii e iv
			$total_tempo_1[$idivisao]++;
			$soma_tempo_1['dirpa'] = $soma_tempo_1['dirpa'] + $tempo_1;
			$total_tempo_1['dirpa']++;
			
			if ($contador%200 == 0)
			{
				$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data_deposito', '$idivisao', '$data_1', 'TempoPrimeiroExame',$tempo_1),('$numero', '$data_deposito', 'dirpa', '$data_1', 'TempoPrimeiroExame',$tempo_1)<BR>";
			} else
			{
				$strcgrec3 = $strcgrec3.",('$numero', '$data_deposito', '$idivisao', '$data_1', 'TempoPrimeiroExame',$tempo_1)<BR>";
				$strcgrec3 = $strcgrec3.",('$numero', '$data_deposito', 'dirpa', '$data_1', 'TempoPrimeiroExame',$tempo_1)<BR>";
			}
			$contador++;
			//echo $strcgrec3;exit();
		}
		//echo $strcgrec3;exit();
		
		$cmd = "SELECT * FROM arquivados where despacho in ('9.1','9.2','11.2') and anulado=0 and year(data)=2021";
		$cmd = "SELECT * FROM arquivados where despacho in ('16.1') and anulado=0 and year(data)=2021";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$data_decisao = $line['data'];
			$data_concessao = $data_decisao;
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}
			$data_deposito = null;
			$cmd2 = "SELECT * FROM publicados where numero='$numero1' or numero='$numero2'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=mysqli_fetch_assoc($res2)) 
			{
				$data_deposito = $line2['data_nacional'];
				$idivisao = $line2['divisao'];
			}
			if ($data_deposito==null) $data_deposito = $line2['data_deposito'];
			if ($data_deposito==null) continue; // contagem deve ser sempre feita da data de entrada na fase nacional e não pela data de depósito internacional

			$data1 = '0000-00-00';
			$cmd2 = "SELECT * FROM pedido where (numero='$numero1' or numero='$numero2') and instancia='1 exame' and decisao in ('exigencia','ciencia de parecer','deferimento','indeferimento','defanvisa') and rpi<>'0000-00-00' and anulado=0";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) $data1 = $line2['rpi'];
			if ($data1=='0000-00-00') continue; 
			
			list($ano,$mes,$dia) = explode('-',$data_decisao);
			$idata_decisao = mktime(0,0,0,(integer)$mes,(integer)$dia,(integer)$ano); // retorna intervalo em segundos desde 1970 de $data_rpi - 90 dias
			$idata_concessao = $idata_decisao;
			list($ano,$mes,$dia) = explode('-',$data1);
			$idata1 = mktime(0,0,0,(integer)$mes,(integer)$dia,(integer)$ano); // retorna intervalo em segundos desde 1970 de $data_rpi - 90 dias
			$tempo_1_decisao = round(($idata_decisao-$idata1)/(24*60*60*30),2); // simplifica-se com 1 ano = 365 dias, 1 mes = 30 dias
			$soma_tempo_1_decisao[$idivisao] = $soma_tempo_1_decisao[$idivisao] + $tempo_1_decisao;
			$total_tempo_1_decisao[$idivisao]++;
			$soma_tempo_1_decisao['dirpa'] = $soma_tempo_1_decisao['dirpa'] + $tempo_1_decisao;
			$total_tempo_1_decisao['dirpa']++;

			if ($contador%200 == 0)
			{
				$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data_1', '$idivisao', '$data_decisao', 'TempoPrimeiroExameDecisao',$tempo_1_decisao),('$numero', '$data_1', 'dirpa', '$data_decisao', 'TempoPrimeiroExameDecisao',$tempo_1_decisao)<BR>";
			} else
			{
				$strcgrec3 = $strcgrec3.",('$numero', '$data1', '$idivisao', '$data_decisao', 'TempoPrimeiroExameDecisao',$tempo_1_decisao)<BR>";
				$strcgrec3 = $strcgrec3.",('$numero', '$data1', 'dirpa', '$data_decisao', 'TempoPrimeiroExameDecisao',$tempo_1_decisao)<BR>";
			}
			$contador++;

			$tempo_etapas = 0;
			$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('6.1','7.1','9.1','9.2','11.2') and anulado=0";
			$res2 = mysqli_query($link,$cmd2);
			while ($line2=@mysqli_fetch_assoc($res2)) $tempo_etapas++;
			$soma_tempo_etapas[$idivisao] = $soma_tempo_etapas[$idivisao] + $tempo_etapas;
			$total_tempo_etapas[$idivisao]++;
			$soma_tempo_etapas['dirpa'] = $soma_tempo_etapas['dirpa'] + $tempo_etapas;
			$total_tempo_etapas['dirpa']++;

			if ($contador%200 == 0)
			{
				$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data_deposito', '$idivisao', '$data_decisao', 'TempoEtapasExame',$tempo_etapas),('$numero', '$data_deposito', 'dirpa', '$data_decisao', 'TempoEtapasExame',$tempo_etapas)<BR>";
			} else
			{
				$strcgrec3 = $strcgrec3.",('$numero', '$data_deposito', '$idivisao', '$data_decisao', 'TempoEtapasExame',$tempo_etapas)<BR>";
				$strcgrec3 = $strcgrec3.",('$numero', '$data_deposito', 'dirpa', '$data_decisao', 'TempoEtapasExame',$tempo_etapas)<BR>";
			}
			$contador++;

			list($ano,$mes,$dia) = explode('-',$data_deposito);
			$idata_deposito = mktime(0,0,0,(integer)$mes,(integer)$dia,(integer)$ano); // retorna intervalo em segundos desde 1970 de $data_rpi - 90 dias
			$tempo_concessao = round(($idata_decisao-$idata_deposito)/(24*60*60*30*12),2); // simplifica-se com 1 ano = 365 dias, 1 mes = 30 dias
			$soma_tempo_concessao[$idivisao] = $soma_tempo_concessao[$idivisao] + $tempo_concessao;
			$total_tempo_concessao[$idivisao]++;
			$soma_tempo_concessao['dirpa'] = $soma_tempo_concessao['dirpa'] + $tempo_concessao;
			$total_tempo_concessao['dirpa']++;

			if ($contador%200 == 0)
			{
				$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data_deposito', '$idivisao', '$data_concessao', 'TempoConcessao',$tempo_concessao),('$numero', '$data_deposito', 'dirpa', '$data_concessao', 'TempoConcessao',$tempo_concessao)<BR>";
			} else
			{
				$strcgrec3 = $strcgrec3.",('$numero', '$data_deposito', '$idivisao', '$data_concessao', 'TempoConcessao',$tempo_concessao)<BR>";
				$strcgrec3 = $strcgrec3.",('$numero', '$data_deposito', 'dirpa', '$data_concessao', 'TempoConcessao',$tempo_concessao)<BR>";
			}
			$contador++;

		}

		foreach ($divisoes as $idivisao)
		{
			$i=0;$j=0;$k=0;$n=0;
			if ($total_tempo_1[$idivisao]>0) $i = round($soma_tempo_1[$idivisao]/$total_tempo_1[$idivisao],1);
			if ($total_tempo_1_decisao[$idivisao]>0) $j = round($soma_tempo_1_decisao[$idivisao]/$total_tempo_1_decisao[$idivisao],1);
			if ($total_tempo_concessao[$idivisao]>0) $k = round($soma_tempo_concessao[$idivisao]/$total_tempo_concessao[$idivisao],1);
			if ($total_tempo_etapas[$idivisao]>0) $n = round($soma_tempo_etapas[$idivisao]/$total_tempo_etapas[$idivisao],1);
			$cmd = "update cgrec_all set tempo_1=$i, tempo_1_decisao=$j, tempo_concessao=$k, tempo_etapas=$n where email='$idivisao' and ano=0";
			if ($gravar==1) $res = mysqli_query($link,$cmd);
			echo "$cmd;<BR>";
		}
		$i=0;$j=0;$k=0;$n=0;
		if ($total_tempo_1['dirpa']>0) $i = round($soma_tempo_1['dirpa']/$total_tempo_1['dirpa'],1);
		if ($total_tempo_1_decisao['dirpa']>0) $j = round($soma_tempo_1_decisao['dirpa']/$total_tempo_1_decisao['dirpa'],1);
		if ($total_tempo_concessao['dirpa']>0) $k = round($soma_tempo_concessao['dirpa']/$total_tempo_concessao['dirpa'],1);
		if ($total_tempo_etapas['dirpa']>0) $n = round($soma_tempo_etapas['dirpa']/$total_tempo_etapas['dirpa'],1);
		$cmd = "update cgrec_all set tempo_1=$i, tempo_1_decisao=$j, tempo_concessao=$k, tempo_etapas=$n where email='dirpa' and ano=0";
		if ($gravar==1) $res = mysqli_query($link,$cmd);
		echo "$cmd;<BR>";

		$strcgrec3=$strcgrec3.";";
		echo $strcgrec3;
		//if ($gravar==1) $res = mysqli_query($link,$strcgrec3);
		echo "Fim de processamento";
		exit();
	}

// cálculo dos tempos por examinador
// SELECT numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa FROM producao.pedido where decisao in ('deferimento','indeferimento') and year(rpi)<>0 and year(rpi)<=2017
// SELECT numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa FROM producao.pedido where instancia='1 exame' and year(rpi)<>0 and year(rpi)<=2017
// SELECT email,data,e.codigo,dono,aceite FROM producao.pedido as p, producao.examinador as e where p.codigo=e.codigo and e.dono=1 and p.decisao in ('deferimento','indeferimento') and year(p.rpi)<>0 and year(p.rpi)<=2017
// SELECT email,data,e.codigo,dono,aceite FROM producao.pedido as p, producao.examinador as e where p.codigo=e.codigo and e.dono=1 and p.instancia='1 exame' and year(p.rpi)<>0 and year(p.rpi)<=2017

// SELECT * FROM producao.examinador WHERE dono =1 AND codigo IN (  SELECT codigo FROM producao.pedido WHERE decisao IN (  'deferimento', 'indeferimento' ) AND year( rpi ) <>0 AND year( rpi ) <=2017)
// SELECT * FROM producao.examinador WHERE dono =1 AND codigo IN (  SELECT codigo FROM producao.pedido WHERE instancia='1 exame' AND year( rpi ) <>0 AND year( rpi ) <=2017)

// SELECT * FROM producao.examinador WHERE dono =1 AND codigo IN (  SELECT codigo FROM producao.pedido WHERE instancia='1 exame' and decisao<>'deferimento' and decisao<>'indeferimento' AND year( rpi ) <>0 AND year( rpi ) <=2017)


// SELECT p.codigo,p.decisao,p.rpi FROM producao.pedido as p, producao.examinador as e WHERE p.codigo=e.codigo and e.dono =1 AND e.email='antunes' and p.codigo IN (  SELECT codigo FROM producao.pedido WHERE decisao in ('deferimento','indeferimento') AND year( rpi ) <>0 AND year( rpi ) <=2017) order by p.decisao

// SELECT email,data,e.codigo,dono,aceite FROM producao.pedido as p, producao.examinador as e where p.codigo=e.codigo and e.dono=1 and p.instancia='1 exame' and year(p.rpi)<>0 and year(p.rpi)<=2017
// SELECT email,data,e.codigo,dono,aceite FROM producao.pedido as p, producao.examinador as e where p.codigo=e.codigo and e.dono=1 and p.instancia='1 exame' and decisao<>'deferimento' and decisao<>'indeferimento' and year(p.rpi)<>0 and year(p.rpi)<=2017

	if ($op==2) // http://localhost/central/control.php?action=34&op=2
	{
		$total=0;
		$cmd7 = "SELECT * FROM producao.servidores where rescisao='0000-00-00' and (cargo='PESQUISADOR' or cargo='CHEFIA' or cargo='COORDENADOR') and (lotacao='DIRPA' or lotacao='CGREC')";
		$res7 = mysqli_query($link,$cmd7);
		while ($line7=@mysqli_fetch_assoc($res7))
		{
			$rpi_minima='2022-12-31';$rpi_maxima=null;
			$email = $line7['email'];
			$complemento = $line7['complemento'];

			$admissao=null;
			$cmd2 = "SELECT * FROM producao.servidores where email='$email' and (cargo='PESQUISADOR' or cargo='CHEFIA' or cargo='COORDENADOR') order by admissao asc";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2)) $admissao = $line2['admissao'];

			$count_1=0;$count_91=0;$count_92=0;
			$cmd2 = "SELECT * FROM pedido as p, examinador as e where p.codigo=e.codigo and e.dono=1 and (p.instancia='1 exame' or p.decisao in ('deferimento','indeferimento','defanvisa','anvisa')) and e.email='$email' and year(p.rpi)>=2010";
			$res2 = mysqli_query($link,$cmd2);//echo "$cmd2<BR>";
			while ($line2=@mysqli_fetch_assoc($res2))
			{
				$instancia = $line2['instancia'];
				$decisao = $line2['decisao'];
				$rpi = $line2['rpi'];
				if ($rpi>$rpi_maxima) $rpi_maxima = $rpi;
				if ($rpi<$rpi_minima) $rpi_minima = $rpi;
				if ($instancia=='1 exame') $count_1++;
				if ($decisao=='deferimento' or $decisao=='defanvisa' or $decisao=='anvisa') $count_91++;
				if ($decisao=='indeferimento') $count_92++;
			}
			$decisoes = $count_91 + $count_92;
			$percentual = @round(100*$count_91/($count_91+$count_92),2);
			$tempo_anos = round( ( strtotime($rpi_maxima)-strtotime($rpi_minima) )/60/60/24/30/12 , 2);
			$idade_anos = round( ( strtotime('2017-12-31')-strtotime($admissao) )/60/60/24/30/12 , 2);
			if ($decisoes>10)
			{
				$media = @round($count_1/($tempo_anos),2);
				$total++;
				echo "$complemento;$email;$count_1;$count_91;$count_92;$percentual;$rpi_maxima;$rpi_minima;$tempo_anos;$media;$admissao;$idade_anos<BR>";
				//exit();
			}
		}
		echo "Fim de processamento: $total";
		exit();


		$cmd7 = "SELECT distinct(email) FROM producao.servidores where rescisao='0000-00-00' and (cargo='PESQUISADOR' or cargo='CHEFIA' or cargo='COORDENADOR') and (lotacao='DIRPA' or lotacao='CGREC')";
		$res7 = mysqli_query($link,$cmd7);
		while ($line7=@mysqli_fetch_assoc($res7))
		{
			$email = $line7['email'];
			$soma_tempo_1 = 0;
			$total_tempo_1 = 0;
			$soma_tempo_concessao=0;
			$total_tempo_concessao =0;
			$soma_tempo_1_decisao = 0;
			$total_tempo_1_decisao = 0;
			$soma_tempo_etapas = 0;
			$total_tempo_etapas = 0;
			$cmd = "select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and p.instancia in ('1 exame') and p.rpi<>'0000-00-00' and e.email='$email' and anulado=0";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$data_1 = $line['rpi'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "SELECT * FROM publicados where numero='$numero1' or numero='$numero2'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2)) $data_deposito = $line2['data_deposito'];
				list($ano,$mes,$dia) = explode('-',$data_1);
				$idata_1 = mktime(0,0,0,(integer)$mes,(integer)$dia,(integer)$ano); // retorna intervalo em segundos desde 1970 de $data_rpi - 90 dias
				list($ano,$mes,$dia) = explode('-',$data_deposito);
				$idata_deposito = mktime(0,0,0,(integer)$mes,(integer)$dia,(integer)$ano); // retorna intervalo em segundos desde 1970 de $data_rpi - 90 dias
				$tempo_1 = round(($idata_1-$idata_deposito)/(24*60*60*30*12),2); // simplifica-se com 1 ano = 365 dias, 1 mes = 30 dias
				// echo "$numero $data_1 $data_deposito $tempo<BR>"; exit();
				$soma_tempo_1 = $soma_tempo_1 + $tempo_1;
				$total_tempo_1++;
				//echo "tempo_1 $numero $tempo_1<BR>";

				$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('9.1','9.2','11.2') and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$data_decisao = $line2['data'];
					list($ano,$mes,$dia) = explode('-',$data_decisao);
					$idata_decisao = mktime(0,0,0,(integer)$mes,(integer)$dia,(integer)$ano); // retorna intervalo em segundos desde 1970 de $data_rpi - 90 dias
					$tempo_1_decisao = round(($idata_decisao-$idata_1)/(24*60*60*30),2); // simplifica-se com 1 ano = 365 dias, 1 mes = 30 dias
					$soma_tempo_1_decisao = $soma_tempo_1_decisao + $tempo_1_decisao;
					$total_tempo_1_decisao++;

					$tempo_etapas = 0;
					$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('6.1','7.1','9.1','9.2','11.2') and anulado=0";
					$res2 = mysqli_query($link,$cmd2);
					while ($line2=@mysqli_fetch_assoc($res2)) $tempo_etapas++;
					$soma_tempo_etapas = $soma_tempo_etapas + $tempo_etapas;
					$total_tempo_etapas++;
					//echo "etapa $numero $tempo_etapas etapas, $tempo_1_decisao<BR>";
				}

				$cmd2 = "SELECT * FROM arquivados where (numero='$numero1' or numero='$numero2') and despacho='16.1' and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$data_concessao = $line2['data'];
					list($ano,$mes,$dia) = explode('-',$data_concessao);
					$idata_concessao = mktime(0,0,0,(integer)$mes,(integer)$dia,(integer)$ano); // retorna intervalo em segundos desde 1970 de $data_rpi - 90 dias
					$tempo_concessao = round(($idata_concessao-$idata_deposito)/(24*60*60*30*12),2); // simplifica-se com 1 ano = 365 dias, 1 mes = 30 dias
					$soma_tempo_concessao = $soma_tempo_concessao + $tempo_concessao;
					$total_tempo_concessao++;
					//echo "concessao $numero $tempo_concessao<BR>";
				}

			}
			$i = @round($soma_tempo_1/$total_tempo_1,1);
			$j = @round($soma_tempo_1_decisao/$total_tempo_1_decisao,1);
			$k = @round($soma_tempo_concessao/$total_tempo_concessao,1);
			$n = @round($soma_tempo_etapas/$total_tempo_etapas,1);
			$cmd = "select * from cgrec_all where email='$email' and ano=0";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res))
				$cmd = "update cgrec_all set tempo_1=$i, tempo_1_decisao=$j, tempo_concessao=$k, tempo_etapas=$n where email='$email' and ano=0";
			else
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes,primeiros,primeiros_concedidos,segundos_concedidos,sem71,sem71_concedidos,com71,com71_concedidos,recursos,recursos_providos,total61,total61_semresposta,total71,total71_semresposta,tempo_1,tempo_1_decisao,tempo_concessao,tempo_etapas) values ('$email',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,$i,$j,$k,$n)";

			$res = mysqli_query($link,$cmd);
			echo "$cmd<BR>";
		}
		echo "Fim de processamento";
		exit();
	}

// calcula taxas de não manifestação a um 7.1, por divisao e INPI
	if ($op==3) // http://localhost/central/control.php?action=34&op=3
	{
		foreach ($divisoes as $idivisao)
		{
			$total71[$idivisao]=0;
			$total71_semresposta[$idivisao]=0;
		}
		$total71['dirpa']=0;
		$total71_semresposta['dirpa']=0;
		$cmd = "select * from pedido where decisao in ('ciencia de parecer') and year(rpi)>=2010 and anulado=0";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$data = $line['rpi'];
			$idivisao = $line['divisao'];
			if ($idivisao=='dipem') $idivisao='diciv';
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}
			$cmd2 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho in ('9.1','9.2','11.2')";
			$res2 = mysqli_query($link,$cmd2);
			if (!($line2=@mysqli_fetch_assoc($res2))) continue; // se nao foi decidido entao pode estar aguardando resposta, ignore-o

			@$total71[$idivisao]++; // selecione apenas os 7.1 que tenham sido decididos 
			$total71['dirpa']++;
			$cmd2 = "SELECT * FROM pedido where anulado=0 and (numero='$numero1' or numero='$numero2') and decisao in ('exigencia','ciencia de parecer','deferimento','defanvisa','indeferimento') and rpi>'$data'";
			$res2 = mysqli_query($link,$cmd2);
			if (!($line2=@mysqli_fetch_assoc($res2)))
			{
				@$total71_semresposta[$idivisao]++; // pode ser cgpat i, ii, iii, iv por isso precisa desse @
				$total71_semresposta['dirpa']++;
			}

		}
		foreach ($divisoes as $idivisao)
		{
			$i = $total71[$idivisao];
			$j = $total71_semresposta[$idivisao];

			$cmd = "select * from cgrec_all where email='$idivisao' and ano=0";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res))
				$cmd = "update cgrec_all set total71=$i, total71_semresposta=$j where email='$idivisao' and ano=0";
			else
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes,primeiros,primeiros_concedidos,segundos_concedidos,sem71,sem71_concedidos,com71,com71_concedidos,recursos,recursos_providos,total61,total61_semresposta,total71,total71_semresposta) values ('$idivisao',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,$i,$j)";

			$res = mysqli_query($link,$cmd);
			echo "$cmd<BR>";
		}
		$i = $total71['dirpa'];
		$j = $total71_semresposta['dirpa'];

		$cmd = "select * from cgrec_all where email='dirpa' and ano=0";
		$res = mysqli_query($link,$cmd);
		if ($line=@mysqli_fetch_assoc($res))
			$cmd = "update cgrec_all set total71=$i, total71_semresposta=$j where email='dirpa' and ano=0";
		else
			$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes,primeiros,primeiros_concedidos,segundos_concedidos,sem71,sem71_concedidos,com71,com71_concedidos,recursos,recursos_providos,total61,total61_semresposta,total71,total71_semresposta) values ('dirpa',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,$i,$j)";

		$res = mysqli_query($link,$cmd);
		echo "$cmd<BR>";
		exit();
	}

// calcula taxas de não manifestação a um 6.1, por divisão e inpi

	if ($op==4) // http://localhost/central/control.php?action=34&op=4
	{
		foreach ($divisoes as $idivisao)
		{
			$total61[$idivisao]=0;
			$total61_semresposta[$idivisao]=0;
		}
		$total61['dirpa']=0;
		$total61_semresposta['dirpa']=0;
		$cmd = "select * from pedido where decisao in ('exigencia') and year(rpi)>=2010 and anulado=0";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$data = $line['rpi'];
			$idivisao = $line['divisao'];
			if ($idivisao=='dipem') $idivisao='diciv';
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}
			$cmd2 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho in ('9.1','9.2','11.2')";
			$res2 = mysqli_query($link,$cmd2);
			if (!($line2=@mysqli_fetch_assoc($res2))) continue;
			$despacho = $line2['despacho'];

			@$total61[$idivisao]++;
			$total61['dirpa']++;
			$cmd2 = "SELECT * FROM pedido where anulado=0 and (numero='$numero1' or numero='$numero2') and decisao in ('exigencia','ciencia de parecer','deferimento','defanvisa','indeferimento') and rpi>'$data'";
			$res2 = mysqli_query($link,$cmd2);
			if (!($line2=@mysqli_fetch_assoc($res2)))
			{
				@$total61_semresposta[$idivisao]++;
				$total61_semresposta['dirpa']++;
			}
		}
		foreach ($divisoes as $idivisao)
		{
			$i = $total61[$idivisao];
			$j = $total61_semresposta[$idivisao];

			$cmd = "select * from cgrec_all where email='$idivisao' and ano=0";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res))
				$cmd = "update cgrec_all set total61=$i, total61_semresposta=$j where email='$idivisao' and ano=0";
			else
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes,primeiros,primeiros_concedidos,segundos_concedidos,sem71,sem71_concedidos,com71,com71_concedidos,recursos,recursos_providos,total61,total61_semresposta,total71,total71_semresposta) values ('$email',0,0,0,0,0,0,0,0,0,0,0,0,0,$i,$j,0,0)";

			$res = mysqli_query($link,$cmd);
			echo "$cmd<BR>";
		}
		$i = $total61['dirpa'];
		$j = $total61_semresposta['dirpa'];

		$cmd = "select * from cgrec_all where email='dirpa' and ano=0";
		$res = mysqli_query($link,$cmd);
		if ($line=@mysqli_fetch_assoc($res))
			$cmd = "update cgrec_all set total61=$i, total61_semresposta=$j where email='dirpa' and ano=0";
		else
			$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes,primeiros,primeiros_concedidos,segundos_concedidos,sem71,sem71_concedidos,com71,com71_concedidos,recursos,recursos_providos,total61,total61_semresposta,total71,total71_semresposta) values ('dirpa',0,0,0,0,0,0,0,0,0,0,0,0,0,$i,$j,0,0)";

		$res = mysqli_query($link,$cmd);
		echo "$cmd<BR>";
		exit();
	}


// calcula taxas de não manifestação a um 6.1, por examinador

	if ($op==5) //  http://localhost/central/control.php?action=34&op=5
	{
		$cmd7 = "SELECT distinct(email) FROM servidores where rescisao='0000-00-00' and (cargo='PESQUISADOR' or cargo='CHEFIA' or cargo='COORDENADOR') and (lotacao='DIRPA' or lotacao='CGREC')";
		$res7 = mysqli_query($link,$cmd7);
		while ($line7=@mysqli_fetch_assoc($res7))
		{
			$email = $line7['email'];
			$total61=0; $total61_semresposta=0;
			$cmd = "select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and p.decisao in ('exigencia') and e.email='$email' and year(rpi)>=2010 and anulado=0";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$data = $line['rpi'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho in ('9.1','9.2','11.2')";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) continue;
				$despacho = $line2['despacho'];

				$total61++;
				$cmd2 = "SELECT * FROM pedido where anulado=0 and (numero='$numero1' or numero='$numero2') and decisao in ('exigencia','ciencia de parecer','deferimento','defanvisa','indeferimento') and rpi>'$data'";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) $total61_semresposta++;

			}
			$cmd = "select * from cgrec_all where email='$email' and ano=0";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res))
				$cmd = "update cgrec_all set total61=$total61, total61_semresposta=$total61_semresposta where email='$email' and ano=0";
			else
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes,primeiros,primeiros_concedidos,segundos_concedidos,sem71,sem71_concedidos,com71,com71_concedidos,recursos,recursos_providos,total61,total61_semresposta,total71,total71_semresposta) values ('$email',0,0,0,0,0,0,0,0,0,0,0,0,0,$total61,$total61_semresposta,0,0)";

			$res = mysqli_query($link,$cmd);
			echo "$cmd<BR>";

// calcula taxas de não manifestação a um 7.1, por examinador
			$total71=0; $total71_semresposta=0;
			$cmd = "select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and p.decisao in ('ciencia de parecer') and e.email='$email' and year(rpi)>=2010 and anulado=0";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$data = $line['rpi'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho in ('9.1','9.2','11.2')";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) continue;
				$despacho = $line2['despacho'];

				$total71++;
				$cmd2 = "SELECT * FROM pedido where anulado=0 and (numero='$numero1' or numero='$numero2') and decisao in ('exigencia','ciencia de parecer','deferimento','defanvisa','indeferimento') and rpi>'$data'";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) $total71_semresposta++;

			}
			$cmd = "select * from cgrec_all where email='$email' and ano=0";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res))
				$cmd = "update cgrec_all set total71=$total71, total71_semresposta=$total71_semresposta where email='$email' and ano=0";
			else
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes,primeiros,primeiros_concedidos,segundos_concedidos,sem71,sem71_concedidos,com71,com71_concedidos,recursos,recursos_providos,total61,total61_semresposta,total71,total71_semresposta) values ('$email',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,$total71,$total71_semresposta)";

			$res = mysqli_query($link,$cmd);
			echo "$cmd<BR>";
		}
		echo "Fim de processamento";exit();
	}


	if ($op==6) //  http://localhost/central/control.php?action=34&op=6
 	{
// calcula taxas de concessão de pedidos com 6.1 no primeiro exame, por divisao

		foreach ($divisoes as $idivisao)
		{
			$sem71[$idivisao]=0;
			$sem71_concedidos[$idivisao]=0;
		}
		$sem71['dirpa']=0;
		$sem71_concedidos['dirpa']=0;
		$cmd = "select * from pedido where decisao in ('exigencia') and instancia='1 exame' and year(rpi)>=2010 and anulado=0";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$idivisao = $line['divisao'];
			if ($idivisao=='dipem') $idivisao='diciv';
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}
			$cmd2 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho in ('9.1','9.2','11.2')";
			$res2 = mysqli_query($link,$cmd2);
			if (!($line2=@mysqli_fetch_assoc($res2))) continue;
			$despacho = $line2['despacho'];

			@$sem71[$idivisao]++;
			if ($despacho=='9.1')
				@$sem71_concedidos[$idivisao]++;

			$sem71['dirpa']++;
			if ($despacho=='9.1')
				$sem71_concedidos['dirpa']++;
		}
		foreach ($divisoes as $idivisao)
		{
			$i = $sem71[$idivisao];
			$j = $sem71_concedidos[$idivisao];

			$cmd = "select * from cgrec_all where email='$idivisao' and ano=0";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res))
				$cmd = "update cgrec_all set sem71=$i, sem71_concedidos=$j where email='$idivisao' and ano=0";
			else
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes,primeiros,primeiros_concedidos,segundos_concedidos,sem71,sem71_concedidos,com71,com71_concedidos) values ('$idivisao',0,0,0,0,0,0,0,$i,$j,0,0)";

			$res = mysqli_query($link,$cmd);
			echo "$cmd<BR>";
		}
		$i = $sem71['dirpa'];
		$j = $sem71_concedidos['dirpa'];

		$cmd = "select * from cgrec_all where email='dirpa' and ano=0";
		$res = mysqli_query($link,$cmd);
		if ($line=@mysqli_fetch_assoc($res))
			$cmd = "update cgrec_all set sem71=$i, sem71_concedidos=$j where email='dirpa' and ano=0";
		else
			$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes,primeiros,primeiros_concedidos,segundos_concedidos,sem71,sem71_concedidos,com71,com71_concedidos) values ('dirpa',0,0,0,0,0,0,0,$i,$j,0,0)";

		$res = mysqli_query($link,$cmd);
		echo "$cmd<BR>";
		exit();
	}

// calcula taxas de concessão de pedidos com 7.1 no primeiro exame, por divisao
	if ($op==7) // http://localhost/central/control.php?action=34&op=7
	{
		foreach ($divisoes as $idivisao)
		{
			$com71[$idivisao]=0;
			$com71_concedidos[$idivisao]=0;
		}
		$com71['dirpa']=0;
		$com71_concedidos['dirpa']=0;
		$cmd = "select * from pedido where decisao in ('ciencia de parecer') and etapa=1 and year(rpi)>=2010 and anulado=0";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$idivisao = $line['divisao'];
			if ($idivisao=='dipem') $idivisao='diciv';
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}
			$cmd2 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho in ('9.1','9.2','11.2')";
			$res2 = mysqli_query($link,$cmd2);
			if (!($line2=@mysqli_fetch_assoc($res2))) continue;
			$despacho = $line2['despacho'];

			@$com71[$idivisao]++;
			if ($despacho=='9.1')
				@$com71_concedidos[$idivisao]++;

			$com71['dirpa']++;
			if ($despacho=='9.1')
				$com71_concedidos['dirpa']++;
		}
		foreach ($divisoes as $idivisao)
		{
			$i = $com71[$idivisao];
			$j = $com71_concedidos[$idivisao];

			$cmd = "select * from cgrec_all where email='$idivisao' and ano=0";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res))
				$cmd = "update cgrec_all set com71=$i, com71_concedidos=$j where email='$idivisao' and ano=0";
			else
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes,primeiros,primeiros_concedidos,segundos_concedidos,sem71,sem71_concedidos,com71,com71_concedidos) values ('$idivisao',0,0,0,0,0,0,0,$i,$j,0,0)";

			$res = mysqli_query($link,$cmd);
			echo "$cmd<BR>";
		}
		$i = $com71['dirpa'];
		$j = $com71_concedidos['dirpa'];

		$cmd = "select * from cgrec_all where email='dirpa' and ano=0";
		$res = mysqli_query($link,$cmd);
		if ($line=@mysqli_fetch_assoc($res))
			$cmd = "update cgrec_all set com71=$i, com71_concedidos=$j where email='dirpa' and ano=0";
		else
			$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes,primeiros,primeiros_concedidos,segundos_concedidos,sem71,sem71_concedidos,com71,com71_concedidos) values ('dirpa',0,0,0,0,0,0,0,$i,$j,0,0)";

		$res = mysqli_query($link,$cmd);
		echo "$cmd<BR>";
		exit();
	}

// calcula taxas de concessão de pedidos com 6.1 no primeiro exame, por examinador

	if ($op==8) //  http://localhost/central/control.php?action=34&op=8
	{
		$cmd7 = "SELECT distinct(email) FROM servidores where rescisao='0000-00-00' and (cargo='PESQUISADOR' or cargo='CHEFIA' or cargo='COORDENADOR') and (lotacao='DIRPA' or lotacao='CGREC')";
		$res7 = mysqli_query($link,$cmd7);
		while ($line7=@mysqli_fetch_assoc($res7))
		{
			$email = $line7['email'];
			$sem71=0; $sem71_concedidos=0;
			$cmd = "select distinct(numero) from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and p.decisao in ('exigencia') and instancia='1 exame' and e.email='$email' and year(rpi)>=2010 and anulado=0";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho in ('9.1','9.2','11.2')";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) continue;
				$despacho = $line2['despacho'];

				$sem71++;
				if ($despacho=='9.1')
					$sem71_concedidos++;
			}
			$cmd = "select * from cgrec_all where email='$email' and ano=0";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res))
				$cmd = "update cgrec_all set sem71=$sem71, sem71_concedidos=$sem71_concedidos where email='$email' and ano=0";
			else
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes,primeiros,primeiros_concedidos,segundos_concedidos,sem71,sem71_concedidos,com71,com71_concedidos) values ('$email',0,0,0,0,0,0,0,$sem71,$sem71_concedidos,0,0)";

			$res = mysqli_query($link,$cmd);
			echo "$cmd<BR>";

// calcula taxas de concessão de pedidos com 7.1 no primeiro exame, por examinador
			$com71=0; $com71_concedidos=0;
			$cmd = "select distinct(numero) from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and p.decisao in ('ciencia de parecer') and e.email='$email' and year(p.rpi)>=2010 and etapa=1 and anulado=0";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho in ('9.1','9.2','11.2')";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) continue;
				$despacho = $line2['despacho'];

				$com71++;
				if ($despacho=='9.1')
					$com71_concedidos++;
			}
			$cmd = "select * from cgrec_all where email='$email' and ano=0";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res))
				$cmd = "update cgrec_all set com71=$com71, com71_concedidos=$com71_concedidos where email='$email' and ano=0";
			else
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes,primeiros,primeiros_concedidos,segundos_concedidos,sem71,sem71_concedidos,com71,com71_concedidos) values ('$email',0,0,0,0,0,0,0,0,0,$com71,$com71_concedidos)";

			$res = mysqli_query($link,$cmd);
			echo "$cmd<BR>";
		}
		echo "Fim de processamento<BR>";
		exit();
	}

// calcula primeiros, primeiros_concedidos e $segundos concedidos **
// primeiros_concedidos: select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and p.decisao in ('deferimento','indeferimento','defanvisa','exigencia','ciencia de parecer') and e.email='rockrio' and etapa=1 and rpi<>'0000-00-00' and (decisao='deferimento' or decisao='defanvisa')

	if ($op==9) // http://localhost/central/control.php?action=34&op=9
	{
		$cmd7 = "SELECT distinct(email) FROM servidores where rescisao='0000-00-00' and (cargo='PESQUISADOR' or cargo='CHEFIA' or cargo='COORDENADOR') and (lotacao='DIRPA' or lotacao='CGREC')";
		$res7 = mysqli_query($link,$cmd7);
		while ($line7=@mysqli_fetch_assoc($res7))
		{
			$email = $line7['email']; // $email='rockrio';
			$primeiros=0; $primeiros_concedidos=0; $segundos_concedidos=0; $recursos=0; $recursos_providos=0; $recursos_negados=0;$indeferidos=0;
			$cmd = "select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and p.decisao in ('deferimento','indeferimento','defanvisa','exigencia','ciencia de parecer') and e.email='$email' and instancia='1 exame' and year(rpi)>=2010";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$decisao = $line['decisao'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho in ('9.1','9.2','11.2')";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) continue;
				$despacho = $line2['despacho'];
				$data = $line2['data'];

				$primeiros++;
				if ($decisao=='deferimento' or $decisao=='defanvisa')
					$primeiros_concedidos++;
				elseif ($despacho=='9.1')
				{
					$segundos_concedidos++;
					//echo "$numero<BR>";
				}

				if ($despacho=='9.2')
				{
					$indeferidos++;
					$cmd2 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho='12.2' and data>='$data'";
					$res2 = mysqli_query($link,$cmd2);
					if (($line2=@mysqli_fetch_assoc($res2)))
					{
						$recursos++;
						$data12_2 = $line2['data'];
						$cmd2 = "SELECT * FROM pedido where anulado=0 and (numero='$numero1' or numero='$numero2') and decisao in ('recurso provido','recurso 100') and rpi>='$data12_2'";
						$res2 = mysqli_query($link,$cmd2);
						if (($line2=@mysqli_fetch_assoc($res2))) $recursos_providos++;
						$cmd2 = "SELECT * FROM pedido where anulado=0 and (numero='$numero1' or numero='$numero2') and decisao in ('recurso negado','recurso 111','recurso manutencao do indeferimento 111') and rpi>='$data12_2'";
						$res2 = mysqli_query($link,$cmd2);
						if (($line2=@mysqli_fetch_assoc($res2))) $recursos_negados++;
					}
				}
			}
			$cmd = "select * from cgrec_all where email='$email' and ano=0";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res))
				$cmd = "update cgrec_all set primeiros=$primeiros, primeiros_concedidos=$primeiros_concedidos, segundos_concedidos=$segundos_concedidos, recursos=$recursos, recursos_providos=$recursos_providos, recursos_negados=$recursos_negados, indeferidos=$indeferidos where email='$email' and ano=0";
			else
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes,primeiros,primeiros_concedidos,segundos_concedidos,sem71,sem71_concedidos,com71,com71_concedidos,recursos,recursos_providos,recursos_negados,indeferidos) values ('$email',0,0,0,0,$primeiros,$primeiros_concedidos,$segundos_concedidos,0,0,0,0,$recursos,$recursos_providos,$recursos_negados,$indeferidos)";

			$res = mysqli_query($link,$cmd);
			echo "$cmd<BR>";
			// exit();
		}
		echo "Fim de processamento $email<BR>";
		exit();
	}

/*
recurso 100 - Recurso conhecido e provido. Reformada a decisão recorrida e deferido o pedido.
recurso 102 - Recurso conhecido e provido. Desarquivado o processo para prosseguir o exame
recurso 103 - Recurso conhecido e provido. Desarquivada a petição para prosseguimento do exame do pedido
recurso 104 - Recurso conhecido e provido. Reformada a decisão recorrida para prosseguimento do exame do pedido.
recurso 111 - Recurso conhecido e negado o provimento. Mantido o indeferimento do pedido.
recurso 112 - Recurso conhecido e negado provimento. Mantido o arquivamento do pedido
recurso 113 - Recurso conhecido e negado o provimento.Mantida a decisão recorrida. Determinado o prosseguimento do exame do pedido
recurso 115 - Recurso conhecido e negado provimento. Mantida a decisão recorrida
recurso 120 - Tome conhecimento do parecer técnico
recurso 121 - Cumpra as exigências do parecer técnico
recurso 130 - Prejudicado o recurso interposto através da petição por perda de objeto
recurso 131 - Não conhecido o recurso apresentado através da petição por infringência ao art. 219, inciso II, da LPI 9279/96.
recurso 132 - Anulada a decisão de provimento ao recurso
recurso 134 - Por solicitação dos depositantes, é homologada a desistência do recurso ao indeferimento apresentado por intermédio da petição
recurso 135 - Anulada a publicação por ter sido efetuada com incorreção
recurso 136 - De acordo com o artigo 219 inciso I da Lei 9279/96 a petição de aditamento ao recurso, é não conhecida por estar fora do prazo legal (Art. 212 da LPI 9279]
recurso 137 - A petição relativa a recurso ao arquivamento, é considerada prejudicada tendo em vista que o arquivamento que a motivou foi anulado
recurso 138 - Arquivada a petição de recurso ao indeferimento de acordo com o artigo 216 § 2º da LPI 9279/96.
recurso 139 - Republicação do provimento ao recurso publicado na RPI
recurso 140 - Concedida a devolução de prazo
anvisacgrec
recurso artigo 34
*/

// calcula primeiros, primeiros_concedidos e $segundos_concedidos das divisões
	if ($op==10) // http://localhost/central/control.php?action=34&op=10
	{

/*
		foreach ($divisoes as $idivisao)
		{
			if ($idivisao=='dipem') continue;
			$indeferidos=0;$recursos=0;
			$indeferidos_residentes=0;$recursos_residentes=0;$recurso_provido=0;$recurso_negado=0;$recurso_pendente=0;
			$indeferidos_estrangeiros=0;$recursos_estrangeiros=0;
			$cmd = "select * from pedido where decisao in ('indeferimento','9.2') and divisao='$idivisao' and year(rpi)>=$ano";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$data = $line['rpi'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}

				$indeferidos++;

				$residente = 0;
				$cmd2 = "SELECT * FROM publicados where (numero='$numero1' or numero='$numero2') and depositante like '%(BR%'";
				$res2 = mysqli_query($link,$cmd2);
				if (($line2=@mysqli_fetch_assoc($res2)))
				{
					$residente = 1;
					$indeferidos_residentes++;
				}
				else
					$indeferidos_estrangeiros++;


				$cmd2 = "SELECT * FROM despachos_pag where (numero='$numero1' or numero='$numero2') and tipo_peticao='214' and data_peticao>'$data'";
				$res2 = mysqli_query($link,$cmd2);
				if (($line2=@mysqli_fetch_assoc($res2)))
				{
					$recursos++;
					if ($residente==1)
						$recursos_residentes++;
					else
						$recursos_estrangeiros++;

					$cmd2 = "SELECT * FROM pedido where (numero='$numero1' or numero='$numero2') and instancia='recurso' and decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111') and rpi<>'0000-00-00'";
					$res2 = mysqli_query($link,$cmd2);
					if (($line2=@mysqli_fetch_assoc($res2)))
					{
						$decisao = $line2['decisao'];
						if ($decisao=='recurso provido')
							$recurso_provido++;
						else
							$recurso_negado++;
					}
					else
						$recurso_pedente++;
				}
			}
			$recurso_decidido = $recurso_provido + $recurso_negado;
			$percentual_provido = @round(100*$recurso_provido/$recurso_decidido,1);
			$divtecnica = $divisao_complemento[$idivisao];
			$percentual = round(100*$recursos/$indeferidos,1);
			echo "$divtecnica (total de pedidos) indeferidos = $indeferidos , recursos = $recursos, percentual = $percentual%, recursos decididos: $recurso_decidido, provido: $recurso_provido, percentual providos: $percentual_provido%<BR>";
			$percentual = round(100*$recursos_residentes/$indeferidos_residentes,1);
			echo "$divtecnica (total de residentes) indeferidos = $indeferidos_residentes , recursos = $recursos_residentes, percentual = $percentual %<BR>";
			$percentual = round(100*$recursos_estrangeiros/$indeferidos_estrangeiros,1);
			echo "$divtecnica (total de estrangeiros) indeferidos = $indeferidos_estrangeiros , recursos = $recursos_estrangeiros, percentual = $percentual %<BR><BR>";
			//exit();
		}
		echo "Fim de processamento";
		exit();
*/
		foreach ($divisoes as $idivisao)
		{
			$primeiros=0; $primeiros_concedidos=0; $segundos_concedidos=0; $recursos=0; $recursos_providos=0; $recursos_negados=0; $indeferidos=0;
			$cmd = "select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and p.decisao in ('deferimento','indeferimento','defanvisa','exigencia','ciencia de parecer') and p.divisao='$idivisao' and instancia='1 exame' and year(rpi)>=2010";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$decisao = $line['decisao'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho in ('9.1','9.2','11.2')";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) continue;
				$despacho = $line2['despacho'];
				$data = $line2['data'];

				$primeiros++;
				if ($decisao=='deferimento' or $decisao=='defanvisa') // esta é a decisão do primeiro exame
					$primeiros_concedidos++;
				elseif ($despacho=='9.1')
					$segundos_concedidos++;

				if ($despacho=='9.2')
				{
					$indeferidos++;
					$cmd2 = "SELECT * FROM pedido where anulado=0 and (numero='$numero1' or numero='$numero2') and instancia='recurso' and rpi>='$data'";
					$res2 = mysqli_query($link,$cmd2);
					if (($line2=@mysqli_fetch_assoc($res2)))
					{
						$recursos++;
						$cmd2 = "SELECT * FROM pedido where anulado=0 and (numero='$numero1' or numero='$numero2') and decisao in ('recurso provido','recurso 100') and rpi>='$data'";
						$res2 = mysqli_query($link,$cmd2);
						if (($line2=@mysqli_fetch_assoc($res2))) $recursos_providos++;
						$cmd2 = "SELECT * FROM pedido where anulado=0 and (numero='$numero1' or numero='$numero2') and decisao in ('recurso negado','recurso 111','recurso manutencao do indeferimento 111') and rpi>='$data'";
						$res2 = mysqli_query($link,$cmd2);
						if (($line2=@mysqli_fetch_assoc($res2))) $recursos_negados++;
					}
				}
			}
			$cmd = "select * from cgrec_all where email='$idivisao' and ano=0";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res))
				$cmd = "update cgrec_all set primeiros=$primeiros, primeiros_concedidos=$primeiros_concedidos, segundos_concedidos=$segundos_concedidos, recursos=$recursos, recursos_providos=$recursos_providos, recursos_negados=$recursos_negados, indeferidos=$indeferidos where email='$idivisao' and ano=0";
			else
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes,primeiros,primeiros_concedidos,segundos_concedidos,sem71,sem71_concedidos,com71,com71_concedidos,recursos,recursos_providos,recursos_negados,indeferidos) values ('$idivisao',0,0,0,0,$primeiros,$primeiros_concedidos,$segundos_concedidos,0,0,0,0,$recursos,$recursos_providos,$recursos_negados,$indeferidos)";

			$res = mysqli_query($link,$cmd);
			echo "$cmd<BR>";
		}
		echo "Fim de processamento";
		exit();
	}

// calcula primeiros, primeiros_concedidos e $segundos_concedidos da dirpa
	if ($op==11) // http://localhost/central/control.php?action=34&op=11
	{
		$primeiros=0; $primeiros_concedidos=0; $segundos_concedidos=0;$recursos=0; $recursos_providos=0; $recursos_negados=0; $indeferidos=0;
		$cmd = "select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and p.decisao in ('deferimento','indeferimento','defanvisa','exigencia','ciencia de parecer') and instancia='1 exame' and year(rpi)>=2010";
		$res = mysqli_query($link,$cmd);
		while ($line=@mysqli_fetch_assoc($res))
		{
			$numero = $line['numero'];
			$decisao = $line['decisao'];
			$numero1 = $numero;
			$numero2 = $numero;
			$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
			$res2 = mysqli_query($link,$cmd2);
			if ($line2=@mysqli_fetch_assoc($res2))
			{
				$numero1 = $line2["numero1"];
				$numero2 = $line2["numero2"];
			}
			$cmd2 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and despacho in ('9.1','9.2','11.2')";
			$res2 = mysqli_query($link,$cmd2);
			if (!($line2=@mysqli_fetch_assoc($res2))) continue;
			$despacho = $line2['despacho'];
			$data = $line2['data'];

			$primeiros++;
			if ($decisao=='deferimento' or $decisao=='defanvisa')
				$primeiros_concedidos++;
			elseif ($despacho=='9.1')
				$segundos_concedidos++;

			if ($despacho=='9.2')
			{
				$indeferidos++;
				$cmd2 = "SELECT * FROM pedido where anulado=0 and (numero='$numero1' or numero='$numero2') and instancia='recurso' and rpi>='$data'";
				$res2 = mysqli_query($link,$cmd2);
				if (($line2=@mysqli_fetch_assoc($res2)))
				{
					$recursos++;
					$cmd2 = "SELECT * FROM pedido where anulado=0 and (numero='$numero1' or numero='$numero2') and decisao in ('recurso provido','recurso 100') and rpi>='$data'";
					$res2 = mysqli_query($link,$cmd2);
					if (($line2=@mysqli_fetch_assoc($res2))) $recursos_providos++;
					$cmd2 = "SELECT * FROM pedido where anulado=0 and (numero='$numero1' or numero='$numero2') and decisao in ('recurso negado','recurso 111','recurso manutencao do indeferimento 111') and rpi>='$data'";
					$res2 = mysqli_query($link,$cmd2);
					if (($line2=@mysqli_fetch_assoc($res2))) $recursos_negados++;
				}
			}
		}
		$cmd = "select * from cgrec_all where email='dirpa' and ano=0";
		$res = mysqli_query($link,$cmd);
		if ($line=@mysqli_fetch_assoc($res))
			$cmd = "update cgrec_all set primeiros=$primeiros, primeiros_concedidos=$primeiros_concedidos, segundos_concedidos=$segundos_concedidos, recursos=$recursos, recursos_providos=$recursos_providos, recursos_negados=$recursos_negados, indeferidos=$indeferidos where email='dirpa' and ano=0";
		else
			$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes,primeiros,primeiros_concedidos,segundos_concedidos,sem71,sem71_concedidos,com71,com71_concedidos,recursos,recursos_providos,recursos_negados,indeferidos) values ('dirpa',0,0,0,0,$primeiros,$primeiros_concedidos,$segundos_concedidos,0,0,0,0,$recursos,$recursos_providos,$recursos_negados,$indeferidos)";

		$res = mysqli_query($link,$cmd);
		echo "$cmd<BR>";

		echo "Fim de processamento<BR>";
		exit();
	}

//  calcula pedidos pendentes/arquivados por ano de depósito e total
// pendentes: select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and e.email='victorm' and decisao in ('exigencia','ciencia de parecer') and rpi<>'0000-00-00' and numero not in (SELECT numero FROM arquivados where anulado=0 and ((despacho='8.6' and data<'2007-05-02') or (despacho='11.1' and data<'2004-06-01') or (despacho='9.2' and data<'2008-12-02') or despacho in 	('1.2','3.5','8.11','8.12','9.1','9.2','9.2.4','10.1','11.1.1','11.2','11.4','11.6','11.11','11.12','11.17','11.30','11.31','15.1','15.2','15.3','15.3.1','15.4','15.13','16.1','23.6','23.7','23.9')))
	if ($op==12) // http://localhost/central/control.php?action=34&op=12
	{
		$contador=0;$strcgrec3='';
		$cmd7 = "SELECT distinct(email) FROM servidores where rescisao='0000-00-00' and (cargo='PESQUISADOR' or cargo='CHEFIA' or cargo='COORDENADOR') and (lotacao='DIRPA' or lotacao='CGREC')";
		$res7 = mysqli_query($link,$cmd7);
		while ($line7=@mysqli_fetch_assoc($res7))
		{
			$email = $line7['email'];
			$cmd = "update cgrec_all set pendentes=0 where email='$email' and ano=0";
			$res = mysqli_query($link,$cmd);			
			$soma_value=0;$soma_value_arquivados=0;
			$numero_lidos = array();$total=0;
			$cmd = "select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and e.email='$email' and decisao in ('exigencia','ciencia de parecer') and year(rpi)>=2010";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				if (in_array($numero,$numero_lidos)) continue;
				$numero_lidos[$total]=$numero;
				$total++;

				$data = $line['rpi'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and (despacho='9.2' or despacho='9.1') and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if (($line2=@mysqli_fetch_assoc($res2))) continue; // se conclui com 9.2, 9.1 não é pendente

				$cmd2 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and ($despachos_terminais)";
				$res2 = mysqli_query($link,$cmd2);
				if (($line2=@mysqli_fetch_assoc($res2)))
				{
					$soma_value_arquivados++; // pendentes independente do ano, ou seja, sera gravado com ano=0
					if ($contador%200 == 0)
					{
						$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'PrimeiraInstanciaArquivados',0)<BR>";
					} else
					{
						$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'PrimeiraInstanciaArquivados',0)<BR>";
					}
					$contador++;
				}
				else
				{
					$soma_value++; // pendentes independente do ano, ou seja, sera gravado com ano=0
					if ($contador%200 == 0)
					{
						$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'PrimeiraInstanciaPendentes',0)<BR>";
					} else
					{
						$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'PrimeiraInstanciaPendentes',0)<BR>";
					}
					$contador++;
				}
			}

			if ($soma_value>0)
			{
				$cmd = "select * from cgrec_all where email='$email' and ano=0";
				$res = mysqli_query($link,$cmd);
				if ($line=@mysqli_fetch_assoc($res))
					$cmd = "update cgrec_all set pendentes=$soma_value where email='$email' and ano=0";
				else
					$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email',0,0,0,$soma_value)";

				$res = mysqli_query($link,$cmd);
				echo "$cmd<BR>";
			}
			if ($soma_value_arquivados>0)
			{
				$cmd = "select * from cgrec_all where email='$email' and ano=0";
				$res = mysqli_query($link,$cmd);
				if ($line=@mysqli_fetch_assoc($res))
					$cmd = "update cgrec_all set arquivados=$soma_value_arquivados where email='$email' and ano=0";
				else
					$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes,arquivados) values ('$email',0,0,0,0,$soma_value_arquivados)";

				$res = mysqli_query($link,$cmd);
				echo "$cmd<BR>";
			}
		}
		$strcgrec3 = $strcgrec3.";";
		echo $strcgrec3;
		echo "Fim de processamento (pendentes)<BR>";
		exit();
	}

//  calcula pedidos negados por ano de depósito e total
// negados = select distinct(numero) from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and e.email='rockrio' and decisao in ('indeferimento','ciencia de parecer') and rpi<>'0000-00-00' and numero in (select numero from arquivados where despacho='9.2' and anulado=0)
// negados por ano = select distinct(numero) from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and e.email='helenojc' and decisao in ('indeferimento','ciencia de parecer') and rpi<>'0000-00-00' and numero in (select numero from arquivados where despacho='9.2' and anulado=0 and year(data)=2016)

	if ($op==13) // http://localhost/central/control.php?action=34&op=13
	{
		$contador=0;$strcgrec3='';
		$cmd7 = "SELECT distinct(email) FROM servidores where rescisao='0000-00-00' and (cargo='PESQUISADOR' or cargo='CHEFIA' or cargo='COORDENADOR') and (lotacao='DIRPA' or lotacao='CGREC')";
		$res7 = mysqli_query($link,$cmd7);
		while ($line7=@mysqli_fetch_assoc($res7))
		{
			$email = $line7['email'];
			$ano_mais_antigo = date("Y")+1;$ano_mais_recente=0;
			for ($ano=1990;$ano<=date("Y");$ano++) $negados[$ano]=0;
			$cmd = "update cgrec_all set negados=0 where email='$email' and ano>0";
			$res = mysqli_query($link,$cmd); // evita um resto de conta anterior
			$cmd = "select distinct(numero) from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and e.email='$email' and decisao in ('indeferimento','ciencia de parecer') and year(rpi)>=2010";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='9.2' and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) continue; // se não conclui com 9.2 então ignore pois nao tem decisão final ainda
				$data = $line2['data']; // ele considera os indeferimentos e as ciencias sem resposta, considerando a data deste 9.2

				$ano = substr($data,0,4); // o ano do 9.2
				if ($ano<$ano_mais_antigo) $ano_mais_antigo = $ano;
				if ($ano>$ano_mais_recente) $ano_mais_recente = $ano;
				$negados[$ano]++;

				if ($contador%200 == 0)
				{
					$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'PrimeiraInstanciaIndeferidos',0)<BR>";
				} else
				{
					$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'PrimeiraInstanciaIndeferidos',0)<BR>";
				}
				$contador++;
			}
			$soma_value = 0;
			foreach ($negados as $ano=>$value)
			{
				if ($ano>=$ano_mais_antigo and $ano<=$ano_mais_recente)  // teoricamente ele sempre estará neste intervalo
				{
					$soma_value = $soma_value + $value;
					$cmd = "select * from cgrec_all where email='$email' and ano=$ano";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res))
						$cmd = "update cgrec_all set negados=$value where email='$email' and ano=$ano";
					else
						$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email',$ano,0,$value,0)";

					$res = mysqli_query($link,$cmd);
					echo "$cmd<BR>";
				}
			}
			if ($soma_value>0)
			{
				$cmd = "select * from cgrec_all where email='$email' and ano=0";
				$res = mysqli_query($link,$cmd);
				if ($line=@mysqli_fetch_assoc($res))
					$cmd = "update cgrec_all set negados=$soma_value where email='$email' and ano=0";
				else
					$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email',0,0,$soma_value,0)";

				$res = mysqli_query($link,$cmd);
				echo "$cmd<BR>";
			}
		}
		$strcgrec3 = $strcgrec3.";";
		echo $strcgrec3;
		echo "Fim de processamento (negados)<BR>";
		exit();
	}

//  calcula pedidos concedidos por ano de depósito e total
// deferidos = select distinct(numero) from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and e.email='rockrio' and decisao in ('deferimento','defanvisa') and rpi<>'0000-00-00' and numero in (select numero from arquivados where despacho='9.1' and anulado=0)
	if ($op==14) //  http://localhost/central/control.php?action=34&op=14
	{
		$contador=0;$strcgrec3='';
		$cmd7 = "SELECT distinct(email) FROM servidores where rescisao='0000-00-00' and (cargo='PESQUISADOR' or cargo='CHEFIA' or cargo='COORDENADOR') and (lotacao='DIRPA' or lotacao='CGREC')";
		$res7 = mysqli_query($link,$cmd7);
		while ($line7=@mysqli_fetch_assoc($res7))
		{
			$email = $line7['email'];
			$cmd = "select * from cgrec_all where email='$email' and ano=0";
			$res = mysqli_query($link,$cmd);
			if (!($line=@mysqli_fetch_assoc($res)))
			{
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email',0,0,0,0)";
				$res = mysqli_query($link,$cmd);
			}
			$ano_mais_antigo = date("Y")+1;$ano_mais_recente=0;
			for ($ano=1990;$ano<=date("Y");$ano++) $concedidos[$ano]=0;
			$cmd = "update cgrec_all set concedidos=0 where email='$email' and ano>0";
			$res = mysqli_query($link,$cmd); // evita um resto de conta anterior
			$cmd = "select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and e.email='$email' and decisao in ('deferimento','defanvisa') and year(rpi)>=2010";
			$nomero_lidos = array();$total=0;
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				if (in_array($numero,$numero_lidos)) continue;
				$numero_lidos[$total]=$numero;
				$total++;
				$data = $line['rpi'];
				$ano = substr($data,0,4);
				if ($ano<$ano_mais_antigo) $ano_mais_antigo = $ano;
				if ($ano>$ano_mais_recente) $ano_mais_recente = $ano;
				$concedidos[$ano]++;

				if ($contador%200 == 0)
				{
					$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'PrimeiraInstanciaDeferidos',0)<BR>";
				} 
				else
				{
					$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'PrimeiraInstanciaDeferidos',0)<BR>";
				}
				$contador++;
			}
			$soma_value = 0;
			foreach ($concedidos as $ano=>$value)
			{
				if ($ano>=$ano_mais_antigo and $ano<=$ano_mais_recente)
				{
					$soma_value = $soma_value + $value;
					$cmd = "select * from cgrec_all where email='$email' and ano=$ano";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res))
						$cmd = "update cgrec_all set concedidos=$value where email='$email' and ano=$ano";
					else
						$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email','$ano','$value',0,0)";

					$res = mysqli_query($link,$cmd);
					echo "$cmd<BR>";
				}
			}
			if ($soma_value>0)
			{
				$cmd = "select * from cgrec_all where email='$email' and ano=0";
				$res = mysqli_query($link,$cmd);
				if ($line=@mysqli_fetch_assoc($res))
					$cmd = "update cgrec_all set concedidos=$soma_value where email='$email' and ano=0";
				else
					$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email',0,$soma_value,0,0)";

				$res = mysqli_query($link,$cmd);
				echo "$cmd<BR>";
			}
		}
		$strcgrec3 = $strcgrec3.";";
		echo $strcgrec3;
		echo "Fim de processamento (concedidos)<BR>";
		exit();
	}

// cálculo das médias de cada divisão

	if ($op==15) //  http://localhost/central/control.php?action=34&op=15
	{
		$contador=0;$strcgrec3='';
		foreach ($divisoes as $idivisao)
		{
			$email = $idivisao;
//	calcula pedidos concedidos por ano de depósito e total
			$cmd = "select * from cgrec_all where email='$email' and ano=0";
			$res = mysqli_query($link,$cmd);
			if (!($line=@mysqli_fetch_assoc($res)))
			{
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email',0,0,0,0)";
				$res = mysqli_query($link,$cmd);
			}
			$ano_mais_antigo = date("Y")+1;$ano_mais_recente=0;
			for ($ano=1990;$ano<=date("Y");$ano++) $concedidos[$ano]=0;
			$cmd = "update cgrec_all set concedidos=0 where email='$email' and ano>0";
			$res = mysqli_query($link,$cmd); // evita um resto de conta anterior
			$cmd = "select * from pedido where divisao='$email' and decisao in ('deferimento','defanvisa') and year(rpi)>=2010"; // a divisão é mais confiável em pedido
			//$cmd = "select * from arquivados where divisao='$email' and despacho='9.1' and anulado=0 and year(data)>=2010";
			$numero_lidos = array(); $total=0;
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				if (in_array($numero,$numero_lidos)) continue;
				$numero_lidos[$total]=$numero;
				$total++;
				$data = $line['rpi'];
				$ano = substr($data,0,4);
				if ($ano<$ano_mais_antigo) $ano_mais_antigo = $ano;
				if ($ano>$ano_mais_recente) $ano_mais_recente = $ano;
				$concedidos[$ano]++;

				if ($contador%200 == 0)
				{
					$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'PrimeiraInstanciaDeferidos',0)<BR>";
				} else
				{
					$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'PrimeiraInstanciaDeferidos',0)<BR>";
				}
				$contador++;


//				$cmd2 = "select * from publicados where numero='$numero1' or numero='$numero2'";
//				$res2 = mysqli_query($link,$cmd2);
//				if ($line2=@mysqli_fetch_assoc($res2))
//				{
//					$data_deposito = $line2['data_deposito'];
//					$ano = substr($data_deposito,0,4);
//					if ($ano<$ano_mais_antigo) $ano_mais_antigo = $ano;
//					if ($ano>$ano_mais_recente) $ano_mais_recente = $ano;
//					$concedidos[$ano]++;
//				}
//				else
//					echo "Não encontrei na tabela publicado $numero (concedidos)<BR>";

			}
			$soma_value = 0;
			foreach ($concedidos as $ano=>$value)
			{
				if ($ano>=$ano_mais_antigo and $ano<=$ano_mais_recente)
				{
					$soma_value = $soma_value + $value;
					$cmd = "select * from cgrec_all where email='$email' and ano=$ano";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res))
						$cmd = "update cgrec_all set concedidos=$value where email='$email' and ano=$ano";
					else
						$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email','$ano','$value',0,0)";

					$res = mysqli_query($link,$cmd);
					echo "$cmd<BR>";
				}
			}
			if ($soma_value>0)
			{
				$cmd = "select * from cgrec_all where email='$email' and ano=0";
				$res = mysqli_query($link,$cmd);
				if ($line=@mysqli_fetch_assoc($res))
					$cmd = "update cgrec_all set concedidos=$soma_value where email='$email' and ano=0";
				else
					$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email',0,'$soma_value',0,0)";

				$res = mysqli_query($link,$cmd);
				echo "$cmd<BR>";
			}
		}
		$strcgrec3 = $strcgrec3.";";
		echo $strcgrec3;
		echo "Fim de processamento (concedidos)<BR>";
		exit();
	}

//  calcula pedidos negados por ano de depósito e total
	if ($op==16) // //  http://localhost/central/control.php?action=34&op=16
	{
		$contador=0;$strcgrec3='';
		foreach ($divisoes as $idivisao)
		{
			$email = $idivisao;
			$ano_mais_antigo = date("Y")+1;$ano_mais_recente=0;
			for ($ano=1990;$ano<=date("Y");$ano++) $negados[$ano]=0;
			$cmd = "update cgrec_all set negados=0 where email='$email' and ano>0";
			$res = mysqli_query($link,$cmd); // evita um resto de conta anterior
			$cmd = "select * from pedido where divisao='$email' and decisao in ('indeferimento','9.2') and year(rpi)>=2010";
			//$cmd = "select * from arquivados where divisao='$email' and despacho='9.2' and anulado=0 and year(data)>=2010";
			$numero_lidos = array();$total=0;
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				if (in_array($numero,$numero_lidos)) continue;
				$numero_lidos[$total]=$numero;
				$total++;
				$data = $line['rpi'];
				$ano = substr($data,0,4);
				if ($ano<$ano_mais_antigo) $ano_mais_antigo = $ano;
				if ($ano>$ano_mais_recente) $ano_mais_recente = $ano;
				$negados[$ano]++;

				if ($contador%200 == 0)
				{
					$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'PrimeiraInstanciaIndeferidos',0)<BR>";
					$strcgrec3 = $strcgrec3.",('$numero', '$data', 'dirpa', null, 'PrimeiraInstanciaIndeferidos',0)<BR>";
				} else
				{
					$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'PrimeiraInstanciaIndeferidos',0)<BR>";
					$strcgrec3 = $strcgrec3.",('$numero', '$data', 'dirpa', null, 'PrimeiraInstanciaIndeferidos',0)<BR>";
				}
				$contador++;

//				$cmd2 = "select * from publicados where numero='$numero1' or numero='$numero2'";
//				$res2 = mysqli_query($link,$cmd2);
//				if ($line2=@mysqli_fetch_assoc($res2))
//				{
//					$data_deposito = $line2['data_deposito'];
//					$ano = substr($data_deposito,0,4);
//					if ($ano<$ano_mais_antigo) $ano_mais_antigo = $ano;
//					if ($ano>$ano_mais_recente) $ano_mais_recente = $ano;
//					$negados[$ano]++;
//				}
//				else
//					echo "Não encontrei na tabela publicado $numero (negados)<BR>";

			}
			$soma_value = 0;
			foreach ($negados as $ano=>$value)
			{
				if ($ano>=$ano_mais_antigo and $ano<=$ano_mais_recente)
				{
					$soma_value = $soma_value + $value;
					$cmd = "select * from cgrec_all where email='$email' and ano=$ano";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res))
						$cmd = "update cgrec_all set negados=$value where email='$email' and ano=$ano";
					else
						$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email','$ano',0,'$value',0)";

					$res = mysqli_query($link,$cmd);
					echo "$cmd<BR>";
				}
			}
			if ($soma_value>0)
			{
				$cmd = "select * from cgrec_all where email='$email' and ano=0";
				$res = mysqli_query($link,$cmd);
				if ($line=@mysqli_fetch_assoc($res))
					$cmd = "update cgrec_all set negados=$soma_value where email='$email' and ano=0";
				else
					$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email',0,0,'$soma_value',0)";

				$res = mysqli_query($link,$cmd);
				echo "$cmd<BR>";
			}
		}
		$strcgrec3 = $strcgrec3.";";
		echo $strcgrec3;
		echo "Fim de processamento (negados)<BR>";
		exit();
	}

//  calcula pedidos pendentes/arquivados por ano de depósito e total
	if ($op==17) //  http://localhost/central/control.php?action=34&op=17
	{
		$contador=0;$strcgrec3='';
		foreach ($divisoes as $idivisao)
		{
			$email = $idivisao;
			$pendentes=0;$arquivados=0;
			$cmd = "select * from pedido where divisao='$email' and decisao in ('exigencia','ciencia de parecer') and year(rpi)>=2010";
			//$cmd = "select * from arquivados where divisao='$email' and despacho in ('6.1','7.1') and anulado=0 and year(data)>=2010";
			$numero_lidos = array();$total=0;
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$data = $line['rpi'];
				if (in_array($numero,$numero_lidos)) continue;
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}

				$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and (despacho='9.2' or despacho='9.1') and anulado=0";
				$res2 = mysqli_query($link,$cmd2);
				if (($line2=@mysqli_fetch_assoc($res2))) continue; // se conclui com 9.2, 9.1 não é pendente

				$cmd2 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and ($despachos_terminais)";
				$res2 = mysqli_query($link,$cmd2);
				if (($line2=@mysqli_fetch_assoc($res2))) 
				{
					$arquivados++;
					$numero_lidos[$total]=$numero;
					$total++;

					if ($contador%200 == 0)
					{
						$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'PrimeiraInstanciaArquivados',0)<BR>";
						$strcgrec3 = $strcgrec3.",('$numero', '$data', 'dirpa', null, 'PrimeiraInstanciaArquivados',0)<BR>";
					} else
					{
						$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'PrimeiraInstanciaArquivados',0)<BR>";
						$strcgrec3 = $strcgrec3.",('$numero', '$data', 'dirpa', null, 'PrimeiraInstanciaArquivados',0)<BR>";
					}
					$contador++;
				}
				else
				{
					$pendentes++;
					$numero_lidos[$total]=$numero;
					$total++;

					if ($contador%200 == 0)
					{
						$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'PrimeiraInstanciaPendentes',0)<BR>";
						$strcgrec3 = $strcgrec3.",('$numero', '$data', 'dirpa', null, 'PrimeiraInstanciaPendentes',0)<BR>";
					} else
					{
						$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'PrimeiraInstanciaPendentes',0)<BR>";
						$strcgrec3 = $strcgrec3.",('$numero', '$data', 'dirpa', null, 'PrimeiraInstanciaPendentes',0)<BR>";
					}
					$contador++;
				}
			}
			$cmd = "select * from cgrec_all where email='$email' and ano=0";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res))
				$cmd = "update cgrec_all set pendentes=$pendentes, arquivados=$arquivados where email='$email' and ano=0";
			else
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes,arquivados) values ('$email',0,0,0,'$pendentes','$arquivados')";
			$res = mysqli_query($link,$cmd);
			echo "$cmd<BR>";

		}
		$strcgrec3 = $strcgrec3.";";
		echo $strcgrec3;
		echo "Fim de processamento (pendentes)<BR>";
		exit();
	}

	if ($op==18) // http://localhost/central/control.php?action=34&op=18
	{
		$contador=0;$strcgrec3='';
		$concedidos_inpi = 0;
		$negados_inpi = 0;
		$pendentes_inpi = 0;
		$arquivados_inpi = 0;
		foreach ($divisoes as $idivisao)
		{
			$cmd = "select * from cgrec_all where email='$idivisao' and ano=0";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res))
			{
				$concedidos_inpi = $concedidos_inpi + $line['concedidos'];
				$negados_inpi = $negados_inpi + $line['negados'];
				$pendentes_inpi = $pendentes_inpi + $line['pendentes'];
				$arquivados_inpi = $arquivados_inpi + $line['arquivados'];
			}
		}
		$cmd = "select * from cgrec_all where email='dirpa' and ano=0";
		$res = mysqli_query($link,$cmd);
		if ($line=@mysqli_fetch_assoc($res))
			$cmd = "update cgrec_all set concedidos='$concedidos_inpi',negados='$negados_inpi',pendentes='$pendentes_inpi',arquivados='$arquivados_inpi' where email='dirpa' and ano=0";
		else
			$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('dirpa',0,'$concedidos_inpi','$negados_inpi','$pendentes_inpi','$arquivados_inpi')";

		$res = mysqli_query($link,$cmd);
		echo "$cmd<BR>";
		echo "Fim de processamento (totalização inpi)<BR>";
		exit();
	}
	
	if ($op==19)
	{
		for ($ano=2010;$ano<=2021;$ano++)
		{
			$mes = 1;
			$kmes = str_pad($mes,2,"0",STR_PAD_LEFT);
			$data = "$ano-$kmes-01";

			$cmd = "select count(*) as X from publicados where data_deposito<'$data' and pedexame is not null and pedexame<'$data' and (dataout>'$data' or dataout is null)";
			$res = mysqli_query($link, $cmd);
			if ($line=@mysqli_fetch_assoc($res))
			{
				$estoque = $line['X'];
				$cmd = "update cgrec_all set estoque=$estoque where email='dirpa' and ano=$ano";
				$res = mysqli_query($link, $cmd);
				echo "$cmd<BR>";
			}
			foreach ($divisoes as $idivisao)
			{
				$cmd = "select count(*) as X from publicados where divisao='$idivisao' and data_deposito<'$data' and pedexame is not null and pedexame<'$data' and (dataout>'$data' or dataout is null)";
				$res = mysqli_query($link, $cmd);
				if ($line=@mysqli_fetch_assoc($res))
				{
					$estoque = $line['X'];
					$cmd = "update cgrec_all set estoque=$estoque where email='$idivisao' and ano=$ano";
					$res = mysqli_query($link, $cmd);
					echo "$cmd<BR>";
				}
			}
		}
		echo "Fim de processamento";exit();
	}

	if ($op==20)
	{
		for ($ano=2010;$ano<=2021;$ano++)
		{
			$cmd = "select count(*) as X from publicados where year(data_nacional)=$ano";
			$res = mysqli_query($link, $cmd);
			if ($line=@mysqli_fetch_assoc($res)) $publicados = $line['X'];
			$cmd = "update cgrec_all set publicados=$publicados where email='dirpa' and ano=$ano";
			$res = mysqli_query($link, $cmd);
			echo "$cmd<BR>";

			foreach ($divisoes as $idivisao)
			{
				$cmd = "select count(*) as X from publicados where year(data_nacional)=$ano and divisao='$idivisao'";
				$res = mysqli_query($link, $cmd);
				if ($line=@mysqli_fetch_assoc($res)) $publicados = $line['X'];
				$cmd = "update cgrec_all set publicados=$publicados where email='$idivisao' and ano=$ano";
				$res = mysqli_query($link, $cmd);
				echo "$cmd<BR>";
			}
		}
		echo "Fim de processamento";exit();
	}

	if ($op==21) // http://localhost/central/control.php?action=34&op=21
	{
		$contador=0;$strcgrec3='';
		$cmd7 = "SELECT distinct(email) FROM servidores where rescisao='0000-00-00' and (cargo='PESQUISADOR' or cargo='CHEFIA' or cargo='COORDENADOR') and (lotacao='DIRPA' or lotacao='CGREC')";
		$res7 = mysqli_query($link,$cmd7);
		while ($line7=@mysqli_fetch_assoc($res7))
		{
			$email = $line7['email'];
			$soma_value=0;$soma_value_arquivados=0;
			$numero_lidos = array(); $total=0;
			$cmd = "select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and e.email='$email' and decisao in ('recurso exigencia','recurso exigencia 121','recurso ciencia','recurso anvisa','recurso artigo 34','anvisacgrec','artigo 34') and year(rpi)>=2010";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				if (in_array($numero,$numero_lidos)) continue;
				$numero_lidos[$total]=$numero;
				$total++;
				$data = $line['rpi'];
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}

				$cmd2 = "select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and (numero='$numero1' or numero='$numero2') and decisao in ('recurso provido','recurso provido anvisa','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111') and year(rpi)>=2010";
				$res2 = mysqli_query($link,$cmd2);
				if (($line2=@mysqli_fetch_assoc($res2))) continue;

				$cmd2 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and ($despachos_terminais)"; // testa se foi arquivado ou recebeu 16.1, etc...
				$res2 = mysqli_query($link,$cmd2);
				if (($line2=@mysqli_fetch_assoc($res2)))
				{
					$soma_value_arquivados++; // pendentes independente do ano, ou seja, sera gravado com ano=0
					if ($contador%200 == 0)
					{
						$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'RecursosArquivados',0)<BR>";
					} 
					else
					{
						$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'RecursosArquivados',0)<BR>";
					}
					$contador++;
				}
				else
				{
					$soma_value++; // pendentes independente do ano, ou seja, sera gravado com ano=0
					if ($contador%200 == 0)
					{
						$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'RecursosPendentes',0)<BR>";
					} 
					else
					{
						$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'RecursosPendentes',0)<BR>";
					}
					$contador++;
				}
			}

			if ($soma_value>0)
			{
				$cmd = "update cgrec_all set rec_pendentes=$soma_value,rec_arquivados=$soma_value_arquivados where email='$email' and ano=0";
				$res = mysqli_query($link,$cmd);
				echo "$cmd<BR>";
			}
		}
		$strcgrec3 = $strcgrec3.";";
		echo $strcgrec3;
		echo "Fim de processamento (pendentes)<BR>";
		exit();
	}

//  calcula recursos negados por ano de depósito e total

	if ($op==22) // http://localhost/central/control.php?action=34&op=22
	{
		$contador=0;$strcgrec3='';
		$cmd7 = "SELECT distinct(email) FROM servidores where rescisao='0000-00-00' and (cargo='PESQUISADOR' or cargo='CHEFIA' or cargo='COORDENADOR') and (lotacao='DIRPA' or lotacao='CGREC')";
		$res7 = mysqli_query($link,$cmd7);
		while ($line7=@mysqli_fetch_assoc($res7))
		{
			$email = $line7['email'];
			$ano_mais_antigo = date("Y")+1;$ano_mais_recente=0;
			for ($ano=1990;$ano<=date("Y");$ano++) $negados[$ano]=0;
			$cmd = "update cgrec_all set rec_negados=0 where email='$email' and ano>0";
			$res = mysqli_query($link,$cmd); // evita um resto de conta anterior
			$numero_lidos = array();$total=0;
			$cmd = "update cgrec_all set rec_negados=0 where email='$email'";
			$res = mysqli_query($link,$cmd); // evita um resto de conta anterior			
			$cmd = "select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and e.email='$email' and decisao in ('recurso negado','recurso manutencao do indeferimento 111') and year(rpi)>=2010";
			$numero_lidos = array();$total=0;
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				if (in_array($numero,$numero_lidos)) continue;
				$numero_lidos[$total]=$numero;
				$total++;
				$data = $line['rpi']; 
				$ano = substr($data,0,4); // o ano do 9.2
				if ($ano<$ano_mais_antigo) $ano_mais_antigo = $ano;
				if ($ano>$ano_mais_recente) $ano_mais_recente = $ano;
				$negados[$ano]++;
				if ($contador%200 == 0)
				{
					$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'RecursosNegados',0)<BR>";
				} 
				else
				{
					$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'RecursosNegados',0)<BR>";
				}
				$contador++;
			}
			$soma_value = 0;
			foreach ($negados as $ano=>$value)
			{
				if ($ano>=$ano_mais_antigo and $ano<=$ano_mais_recente)  // teoricamente ele sempre estará neste intervalo
				{
					$soma_value = $soma_value + $value;
					$cmd = "select * from cgrec_all where email='$email' and ano=$ano";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res))
						$cmd = "update cgrec_all set rec_negados=$value where email='$email' and ano=$ano";
					else
					{
						$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email',$ano,0,0,0)";
						$res = mysqli_query($link,$cmd);
						$cmd = "update cgrec_all set rec_negados=$value where email='$email' and ano=$ano";
					}
					$res = mysqli_query($link,$cmd);
					echo "$cmd<BR>";
				}
			}
			if ($soma_value>0)
			{
				$cmd = "update cgrec_all set rec_negados=$soma_value where email='$email' and ano=0";
				$res = mysqli_query($link,$cmd);
				echo "$cmd<BR>";
			}
		}
		$strcgrec3 = $strcgrec3.";";
		echo $strcgrec3;
		echo "Fim de processamento (negados)<BR>";
		exit();
	}

// calcula pedidos recursos providos por ano de depósito e total
// SELECT distinct(decisao) FROM `pedido` WHERE instancia='recurso' 

	if ($op==23) //  http://localhost/central/control.php?action=34&op=23
	{
		$contador=0;$strcgrec3='';
		$cmd7 = "SELECT distinct(email) FROM servidores where rescisao='0000-00-00' and (cargo='PESQUISADOR' or cargo='CHEFIA' or cargo='COORDENADOR') and (lotacao='DIRPA' or lotacao='CGREC')";
		$res7 = mysqli_query($link,$cmd7);
		while ($line7=@mysqli_fetch_assoc($res7))
		{
			$email = $line7['email'];
			$cmd = "select * from cgrec_all where email='$email' and ano=0";
			$res = mysqli_query($link,$cmd);
			if (!($line=@mysqli_fetch_assoc($res)))
			{
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email',0,0,0,0)";
				$res = mysqli_query($link,$cmd);
			}
			$ano_mais_antigo = date("Y")+1;$ano_mais_recente=0;
			for ($ano=1990;$ano<=date("Y");$ano++) $concedidos[$ano]=0;
			$cmd = "update cgrec_all set rec_providos=0 where email='$email' and ano>0";
			$res = mysqli_query($link,$cmd); // evita um resto de conta anterior
			$cmd = "select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and e.email='$email' and decisao in ('recurso provido','recurso provido anvisa') and year(rpi)>=2010";
			$numero_lidos = array();$total=0; 
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				if (in_array($numero,$numero_lidos)) continue;
				$numero_lidos[$total]=$numero;
				$total++;
				$data = $line['rpi'];
				$ano = substr($data,0,4);
				if ($ano<$ano_mais_antigo) $ano_mais_antigo = $ano;
				if ($ano>$ano_mais_recente) $ano_mais_recente = $ano;
				$concedidos[$ano]++;
				if ($contador%200 == 0)
				{
					$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'RecursosProvidos',0)<BR>";
				} 
				else
				{
					$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'RecursosProvidos',0)<BR>";
				}
				$contador++;
			}
			$soma_value = 0;
			foreach ($concedidos as $ano=>$value)
			{
				if ($ano>=$ano_mais_antigo and $ano<=$ano_mais_recente)
				{
					$soma_value = $soma_value + $value;
					$cmd = "select * from cgrec_all where email='$email' and ano=$ano";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res))
						$cmd = "update cgrec_all set rec_providos=$value where email='$email' and ano=$ano";
					else
					{
						$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email','$ano',0,0,0)";
						$res = mysqli_query($link,$cmd);
						$cmd = "update cgrec_all set rec_providos=$value where email='$email' and ano=$ano";
					}
					$res = mysqli_query($link,$cmd);
					echo "$cmd<BR>";
				}
			}
			if ($soma_value>0)
			{
				$cmd = "update cgrec_all set rec_providos=$soma_value where email='$email' and ano=0";
				$res = mysqli_query($link,$cmd);
				echo "$cmd<BR>";
			}
		}
		$strcgrec3 = $strcgrec3.";";
		echo $strcgrec3;
		echo "Fim de processamento (concedidos)<BR>";
		exit();
	}

// cálculo das médias de cada divisão

	if ($op==24) //  http://localhost/central/control.php?action=34&op=24
	{
		$contador=0;$strcgrec3='';
		foreach ($divisoes as $idivisao)
		{
			$email = $idivisao;
//	calcula pedidos concedidos por ano de depósito e total
			$cmd = "select * from cgrec_all where email='$email' and ano=0";
			$res = mysqli_query($link,$cmd);
			if (!($line=@mysqli_fetch_assoc($res)))
			{
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email',0,0,0,0)";
				$res = mysqli_query($link,$cmd);
			}
			$ano_mais_antigo = date("Y")+1;$ano_mais_recente=0;
			for ($ano=1990;$ano<=date("Y");$ano++) $concedidos[$ano]=0;
			$cmd = "update cgrec_all set rec_providos=0 where email='$email' and ano>0";
			$res = mysqli_query($link,$cmd); // evita um resto de conta anterior
			$cmd = "select * from pedido where divisao='$email' and decisao in ('recurso provido','recurso provido anvisa') and year(rpi)>=2010"; // a divisão é mais confiável em pedido
			$numero_lidos = array();$total=0;
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				if (in_array($numero,$numero_lidos)) continue;
				$numero_lidos[$total]=$numero;
				$total++;
				$data = $line['rpi'];
				$ano = substr($data,0,4);
				if ($ano<$ano_mais_antigo) $ano_mais_antigo = $ano;
				if ($ano>$ano_mais_recente) $ano_mais_recente = $ano;
				$concedidos[$ano]++;
				if ($contador%200 == 0)
				{
					$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'RecursosProvidos',0)<BR>";
				} 
				else
				{
					$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'RecursosProvidos',0)<BR>";
				}
				$contador++;
			}
			$soma_value = 0;
			foreach ($concedidos as $ano=>$value)
			{
				if ($ano>=$ano_mais_antigo and $ano<=$ano_mais_recente)
				{
					$soma_value = $soma_value + $value;
					$cmd = "select * from cgrec_all where email='$email' and ano=$ano";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res))
						$cmd = "update cgrec_all set rec_providos=$value where email='$email' and ano=$ano";
					else
					{
						$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email','$ano',0,0,0)";
						$res = mysqli_query($link,$cmd);
						$cmd = "update cgrec_all set rec_providos=$value where email='$email' and ano=$ano";
					}
					$res = mysqli_query($link,$cmd);
					echo "$cmd<BR>";
				}
			}
			if ($soma_value>0)
			{
				$cmd = "update cgrec_all set rec_providos=$soma_value where email='$email' and ano=0";
				$res = mysqli_query($link,$cmd);
				echo "$cmd<BR>";
			}
		}

		$strcgrec3 = $strcgrec3.";";
		echo $strcgrec3;
		echo "Fim de processamento (concedidos)<BR>";
		exit();
	}

//  calcula pedidos negados por ano de depósito e total
	if ($op==25) // //  http://localhost/central/control.php?action=34&op=25
	{
		$contador=0;$strcgrec3='';
		foreach ($divisoes as $idivisao)
		{
			$email = $idivisao;
			$ano_mais_antigo = date("Y")+1;$ano_mais_recente=0;
			for ($ano=1990;$ano<=date("Y");$ano++) $negados[$ano]=0;
			$cmd = "update cgrec_all set rec_negados=0 where email='$email' and ano>0";
			$res = mysqli_query($link,$cmd); // evita um resto de conta anterior
			$cmd = "select * from pedido where divisao='$email' and decisao in ('recurso negado','recurso manutencao do indeferimento 111') and year(rpi)>=2010";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$data = $line['rpi'];
				$ano = substr($data,0,4);
				if ($ano<$ano_mais_antigo) $ano_mais_antigo = $ano;
				if ($ano>$ano_mais_recente) $ano_mais_recente = $ano;
				$negados[$ano]++;
				if ($contador%200 == 0)
				{
					$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'RecursosNegados',0)<BR>";
				} 
				else
				{
					$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'RecursosNegados',0)<BR>";
				}
				$contador++;
			}
			$soma_value = 0;
			foreach ($negados as $ano=>$value)
			{
				if ($ano>=$ano_mais_antigo and $ano<=$ano_mais_recente)
				{
					$soma_value = $soma_value + $value;
					$cmd = "select * from cgrec_all where email='$email' and ano=$ano";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res))
						$cmd = "update cgrec_all set rec_negados=$value where email='$email' and ano=$ano";
					else
					{
						$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email','$ano',0,0,0)";
						$res = mysqli_query($link,$cmd);
						$cmd = "update cgrec_all set rec_negados=$value where email='$email' and ano=$ano";
					}
					$res = mysqli_query($link,$cmd);
					echo "$cmd<BR>";
				}
			}
			if ($soma_value>0)
			{
				$cmd = "update cgrec_all set rec_negados=$soma_value where email='$email' and ano=0";
				$res = mysqli_query($link,$cmd);
				echo "$cmd<BR>";
			}
		}
		$strcgrec3 = $strcgrec3.";";
		echo $strcgrec3;
		echo "Fim de processamento (negados)<BR>";
		exit();
	}

//  calcula pedidos pendentes por ano de depósito e total
	if ($op==26) // //  http://localhost/central/control.php?action=34&op=26
	{
		$contador=0;$strcgrec3='';
		foreach ($divisoes as $idivisao)
		{
			$email = $idivisao;
			$pendentes=0;$arquivados=0;
			$cmd = "select * from pedido where divisao='$email' and decisao in ('recurso exigencia','recurso exigencia 121','recurso ciencia') and year(rpi)>=2010";
			$numero_lidos = array();$total=0;
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$data = $line['rpi'];
				if (in_array($numero,$numero_lidos)) continue;
				$numero_lidos[$total]=$numero;
				$total++;
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and (numero='$numero1' or numero='$numero2') and decisao in ('recurso provido','recurso provido anvisa','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111') and year(rpi)>=2010";
				$res2 = mysqli_query($link,$cmd2);
				if (($line2=@mysqli_fetch_assoc($res2))) continue;

				$cmd2 = "SELECT * FROM arquivados where anulado=0 and (numero='$numero1' or numero='$numero2') and ($despachos_terminais)";
				$res2 = mysqli_query($link,$cmd2);
				if (($line2=@mysqli_fetch_assoc($res2))) 
				{
					$arquivados++;
					if ($contador%200 == 0)
					{
						$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'RecursosArquivados',0)<BR>";
					} 
					else
					{
						$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'RecursosArquivados',0)<BR>";
					}
					$contador++;
				}
				else
				{
					$pendentes++;
					if ($contador%200 == 0)
					{
						$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'RecursosPendentes',0)<BR>";
					} 
					else
					{
						$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'RecursosPendentes',0)<BR>";
					}
					$contador++;
				}
			}
			$cmd = "select * from cgrec_all where email='$email' and ano=0";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res))
				$cmd = "update cgrec_all set rec_pendentes=$pendentes, rec_arquivados=$arquivados where email='$email' and ano=0";
			else
			{
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email',0,0,0,0)";
				$res = mysqli_query($link,$cmd);
				$cmd = "update cgrec_all set rec_pendentes=$pendentes, rec_arquivados=$rec_arquivados where email='$email' and ano=0";
			}
			$res = mysqli_query($link,$cmd);
			echo "$cmd<BR>";
		}
		$strcgrec3 = $strcgrec3.";";
		echo $strcgrec3;
		echo "Fim de processamento (pendentes)<BR>";
		exit();
	}

	if ($op==27) // http://localhost/central/control.php?action=34&op=27
	{
		$concedidos_inpi = 0;
		$negados_inpi = 0;
		$pendentes_inpi = 0;
		$arquivados_inpi = 0;
		foreach ($divisoes as $idivisao)
		{
			$cmd = "select * from cgrec_all where email='$idivisao' and ano=0";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res))
			{
				$concedidos_inpi = $concedidos_inpi + $line['rec_providos'];
				$negados_inpi = $negados_inpi + $line['rec_negados'];
				$pendentes_inpi = $pendentes_inpi + $line['rec_pendentes'];
				$arquivados_inpi = $arquivados_inpi + $line['rec_arquivados'];
			}
		}
		$cmd = "select * from cgrec_all where email='dirpa' and ano=0";
		$res = mysqli_query($link,$cmd);
		if ($line=@mysqli_fetch_assoc($res))
			$cmd = "update cgrec_all set rec_providos='$concedidos_inpi',rec_negados='$negados_inpi',rec_pendentes='$pendentes_inpi',rec_arquivados='$arquivados_inpi' where email='dirpa' and ano=0";
		else
		{
			$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('dirpa',0,0,0,0)";
			$res = mysqli_query($link,$cmd);
			$cmd = "update cgrec_all set rec_providos='$concedidos_inpi',rec_negados='$negados_inpi',rec_pendentes='$pendentes_inpi',rec_arquivados='$arquivados_inpi' where email='dirpa' and ano=0";
		}
		$res = mysqli_query($link,$cmd);
		echo "$cmd<BR>";
		echo "Fim de processamento (totalização inpi)<BR>";
		exit();
	}

/// Cálculos de Nulidades

	if ($op==28) // http://localhost/central/control.php?action=34&op=28
	{
		$contador=0;$strcgrec3='';
		$cmd7 = "SELECT distinct(email) FROM servidores where rescisao='0000-00-00' and (cargo='PESQUISADOR' or cargo='CHEFIA' or cargo='COORDENADOR') and (lotacao='DIRPA' or lotacao='CGREC')";
		$res7 = mysqli_query($link,$cmd7);
		while ($line7=@mysqli_fetch_assoc($res7))
		{
			$email = $line7['email'];
			$soma_value=0;
			$cmd = "select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and e.email='$email' and decisao in ('nulidade 1') and year(rpi)>=2010";
			$res = mysqli_query($link,$cmd);
			$numero_lidos = array(); $total=0;
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$data = $line['rpi'];
				if (in_array($numero,$numero_lidos)) continue;
				$numero_lidos[$total]=$numero;
				$total++;
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "SELECT * FROM pedido where anulado=0 and (numero='$numero1' or numero='$numero2') and decisao in ('nulidade negada','nulidade parcial','nulidade provida','nulidade 200','nulidade 201','nulidade 204')"; 
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2)))
				{
					$soma_value++; // pendentes independente do ano, ou seja, sera gravado com ano=0
					if ($contador%200 == 0)
					{
						$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'NulidadesPendentes',0)<BR>";
					} 
					else
					{
						$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'NulidadesPendentes',0)<BR>";
					}
					$contador++;
				}
			}

			if ($soma_value>0)
			{
				$cmd = "update cgrec_all set nul_pendentes=$soma_value where email='$email' and ano=0";
				$res = mysqli_query($link,$cmd);
				echo "$cmd<BR>";
			}
		}
		$strcgrec3 = $strcgrec3.";";
		echo $strcgrec3;
		echo "Fim de processamento (pendentes)<BR>";
		exit();
	}

//  calcula recursos negados por ano de depósito e total

	if ($op==29) // http://localhost/central/control.php?action=34&op=29
	{
		$contador=0;$strcgrec3='';
		$cmd7 = "SELECT distinct(email) FROM servidores where rescisao='0000-00-00' and (cargo='PESQUISADOR' or cargo='CHEFIA' or cargo='COORDENADOR') and (lotacao='DIRPA' or lotacao='CGREC')";
		$res7 = mysqli_query($link,$cmd7);
		while ($line7=@mysqli_fetch_assoc($res7))
		{
			$email = $line7['email'];
			$ano_mais_antigo = date("Y")+1;$ano_mais_recente=0;
			for ($ano=1990;$ano<=date("Y");$ano++) $negados[$ano]=0;
			for ($ano=1990;$ano<=date("Y");$ano++) $providos[$ano]=0;
			for ($ano=1990;$ano<=date("Y");$ano++) $parciais[$ano]=0;
			$cmd = "update cgrec_all set nul_providos=0 where email='$email'";
			$res = mysqli_query($link,$cmd); // evita um resto de conta anterior
			$cmd = "update cgrec_all set nul_negados=0 where email='$email'";
			$res = mysqli_query($link,$cmd); // evita um resto de conta anterior
			$cmd = "update cgrec_all set nul_parciais=0 where email='$email'";
			$res = mysqli_query($link,$cmd); // evita um resto de conta anterior
			$cmd = "select * from pedido as p, examinador as e where e.codigo=p.codigo and e.dono=1 and e.email='$email' and decisao in ('nulidade provida','nulidade negada','nulidade parcial') and year(rpi)>=2010";
			$res = mysqli_query($link,$cmd);
			$numero_lidos = array();$total=0;
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				if (in_array($numero,$numero_lidos)) continue;
				$numero_lidos[$total]=$numero;
				$total++;
				$data = $line['rpi']; 
				$decisao = $line['decisao'];
				$ano = substr($data,0,4); // o ano do 9.2
				if ($ano<$ano_mais_antigo) $ano_mais_antigo = $ano;
				if ($ano>$ano_mais_recente) $ano_mais_recente = $ano;
				if ($decisao=='nulidade negada') 
				{
					$negados[$ano]++;
					if ($contador%200 == 0)
					{
						$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'NulidadesNegados',0)<BR>";
					} 
					else
					{
						$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'NulidadesNegados',0)<BR>";
					}
					$contador++;
				}
				if ($decisao=='nulidade provida') 
				{
					$providos[$ano]++;
					if ($contador%200 == 0)
					{
						$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'NulidadesProvidos',0)<BR>";
					} 
					else
					{
						$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'NulidadesProvidos',0)<BR>";
					}
					$contador++;
				}
				if ($decisao=='nulidade parcial') 
				{
					$parciais[$ano]++;
					if ($contador%200 == 0)
					{
						$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'NulidadesParciais',0)<BR>";
					} 
					else
					{
						$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'NulidadesParciais',0)<BR>";
					}
					$contador++;
				}
			}
			$soma_value = 0;
			foreach ($negados as $ano=>$value)
			{
				if ($ano>=$ano_mais_antigo and $ano<=$ano_mais_recente)  // teoricamente ele sempre estará neste intervalo
				{
					$soma_value = $soma_value + $value;
					$cmd = "select * from cgrec_all where email='$email' and ano=$ano";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res))
						$cmd = "update cgrec_all set nul_negados=$value where email='$email' and ano=$ano";
					else
					{
						$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email',$ano,0,0,0)";
						$res = mysqli_query($link,$cmd);
						$cmd = "update cgrec_all set nul_negados=$value where email='$email' and ano=$ano";
					}
					$res = mysqli_query($link,$cmd);
					echo "$cmd<BR>";
				}
			}
			if ($soma_value>0)
			{
				$cmd = "update cgrec_all set nul_negados=$soma_value where email='$email' and ano=0";
				$res = mysqli_query($link,$cmd);
				echo "$cmd<BR>";
			}

			$soma_value = 0;
			foreach ($providos as $ano=>$value)
			{
				if ($ano>=$ano_mais_antigo and $ano<=$ano_mais_recente)  // teoricamente ele sempre estará neste intervalo
				{
					$soma_value = $soma_value + $value;
					$cmd = "select * from cgrec_all where email='$email' and ano=$ano";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res))
						$cmd = "update cgrec_all set nul_providos=$value where email='$email' and ano=$ano";
					else
					{
						$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email',$ano,0,0,0)";
						$res = mysqli_query($link,$cmd);
						$cmd = "update cgrec_all set nul_providos=$value where email='$email' and ano=$ano";
					}
					$res = mysqli_query($link,$cmd);
					echo "$cmd<BR>";
				}
			}
			if ($soma_value>0)
			{
				$cmd = "update cgrec_all set nul_providos=$soma_value where email='$email' and ano=0";
				$res = mysqli_query($link,$cmd);
				echo "$cmd<BR>";
			}

			$soma_value = 0;
			foreach ($parciais as $ano=>$value)
			{
				if ($ano>=$ano_mais_antigo and $ano<=$ano_mais_recente)  // teoricamente ele sempre estará neste intervalo
				{
					$soma_value = $soma_value + $value;
					$cmd = "select * from cgrec_all where email='$email' and ano=$ano";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res))
						$cmd = "update cgrec_all set nul_parciais=$value where email='$email' and ano=$ano";
					else
					{
						$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email',$ano,0,0,0)";
						$res = mysqli_query($link,$cmd);
						$cmd = "update cgrec_all set nul_parciais=$value where email='$email' and ano=$ano";
					}
					$res = mysqli_query($link,$cmd);
					echo "$cmd<BR>";
				}
			}
			if ($soma_value>0)
			{
				$cmd = "update cgrec_all set nul_parciais=$soma_value where email='$email' and ano=0";
				$res = mysqli_query($link,$cmd);
				echo "$cmd<BR>";
			}

		}
		$strcgrec3 = $strcgrec3.";";
		echo $strcgrec3;
		echo "Fim de processamento (negados)<BR>";
		exit();
	}

// cálculo das médias de cada divisão

	if ($op==30) //  http://localhost/central/control.php?action=34&op=30	
	{
		$contador=0;$strcgrec3='';
		foreach ($divisoes as $idivisao)
		{
			$email = $idivisao;
//	calcula pedidos concedidos por ano de depósito e total
			$cmd = "select * from cgrec_all where email='$email' and ano=0";
			$res = mysqli_query($link,$cmd);
			if (!($line=@mysqli_fetch_assoc($res)))
			{
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email',0,0,0,0)";
				$res = mysqli_query($link,$cmd);
			}
			$ano_mais_antigo = date("Y")+1;$ano_mais_recente=0;
			for ($ano=1990;$ano<=date("Y");$ano++) $concedidos[$ano]=0;
			for ($ano=1990;$ano<=date("Y");$ano++) $negados[$ano]=0;
			for ($ano=1990;$ano<=date("Y");$ano++) $parciais[$ano]=0;
			$cmd = "update cgrec_all set nul_providos=0 where email='$email' and ano>0";
			$res = mysqli_query($link,$cmd); // evita um resto de conta anterior
			$cmd = "update cgrec_all set nul_negados=0 where email='$email' and ano>0";
			$res = mysqli_query($link,$cmd); // evita um resto de conta anterior
			$cmd = "update cgrec_all set nul_parciais=0 where email='$email' and ano>0";
			$res = mysqli_query($link,$cmd); // evita um resto de conta anterior
			$numero_lidos = array(); $total=0;
			$cmd = "select * from pedido where divisao='$email' and decisao in ('nulidade provida','nulidade negada','nulidade parcial') and year(rpi)>=2010"; // a divisão é mais confiável em pedido
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				if (in_array($numero,$numero_lidos)) continue;
				$numero_lidos[$total]=$numero;
				$total++;
				$data = $line['rpi'];
				$decisao = $line['decisao'];
				$ano = substr($data,0,4);
				if ($ano<$ano_mais_antigo) $ano_mais_antigo = $ano;
				if ($ano>$ano_mais_recente) $ano_mais_recente = $ano;
				if ($decisao=='nulidade provida') 
				{
					$concedidos[$ano]++;
					if ($contador%200 == 0)
					{
						$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'NulidadesProvidos',0)<BR>";
					} 
					else
					{
						$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'NulidadesProvidos',0)<BR>";
					}
					$contador++;
				}
				if ($decisao=='nulidade negada') 
				{
					$negados[$ano]++;
					if ($contador%200 == 0)
					{
						$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'NulidadesNegados',0)<BR>";
					} 
					else
					{
						$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'NulidadesNegados',0)<BR>";
					}
					$contador++;
				}
				if ($decisao=='nulidade parcial') 
				{
					$parciais[$ano]++;
					if ($contador%200 == 0)
					{
						$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'NulidadesParciais',0)<BR>";
					} 
					else
					{
						$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'NulidadesParciais',0)<BR>";
					}
					$contador++;
				}
			}
			$soma_value = 0;
			foreach ($concedidos as $ano=>$value)
			{
				if ($ano>=$ano_mais_antigo and $ano<=$ano_mais_recente)
				{
					$soma_value = $soma_value + $value;
					$cmd = "select * from cgrec_all where email='$email' and ano=$ano";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res))
						$cmd = "update cgrec_all set nul_providos=$value where email='$email' and ano=$ano";
					else
					{
						$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email','$ano',0,0,0)";
						$res = mysqli_query($link,$cmd);
						$cmd = "update cgrec_all set nul_providos=$value where email='$email' and ano=$ano";
					}
					$res = mysqli_query($link,$cmd);
					echo "$cmd<BR>";
				}
			}
			if ($soma_value>0)
			{
				$cmd = "update cgrec_all set nul_providos=$soma_value where email='$email' and ano=0";
				$res = mysqli_query($link,$cmd);
				echo "$cmd<BR>";
			}

			$soma_value = 0;
			foreach ($negados as $ano=>$value)
			{
				if ($ano>=$ano_mais_antigo and $ano<=$ano_mais_recente)
				{
					$soma_value = $soma_value + $value;
					$cmd = "select * from cgrec_all where email='$email' and ano=$ano";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res))
						$cmd = "update cgrec_all set nul_negados=$value where email='$email' and ano=$ano";
					else
					{
						$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email','$ano',0,0,0)";
						$res = mysqli_query($link,$cmd);
						$cmd = "update cgrec_all set nul_negados=$value where email='$email' and ano=$ano";
					}
					$res = mysqli_query($link,$cmd);
					echo "$cmd<BR>";
				}
			}
			if ($soma_value>0)
			{
				$cmd = "update cgrec_all set nul_negados=$soma_value where email='$email' and ano=0";
				$res = mysqli_query($link,$cmd);
				echo "$cmd<BR>";
			}

			$soma_value = 0;
			foreach ($parciais as $ano=>$value)
			{
				if ($ano>=$ano_mais_antigo and $ano<=$ano_mais_recente)
				{
					$soma_value = $soma_value + $value;
					$cmd = "select * from cgrec_all where email='$email' and ano=$ano";
					$res = mysqli_query($link,$cmd);
					if ($line=@mysqli_fetch_assoc($res))
						$cmd = "update cgrec_all set nul_parciais=$value where email='$email' and ano=$ano";
					else
					{
						$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email','$ano',0,0,0)";
						$res = mysqli_query($link,$cmd);
						$cmd = "update cgrec_all set nul_parciais=$value where email='$email' and ano=$ano";
					}
					$res = mysqli_query($link,$cmd);
					echo "$cmd<BR>";
				}
			}
			if ($soma_value>0)
			{
				$cmd = "update cgrec_all set nul_parciais=$soma_value where email='$email' and ano=0";
				$res = mysqli_query($link,$cmd);
				echo "$cmd<BR>";
			}

		}

		$strcgrec3 = $strcgrec3.";";
		echo $strcgrec3;
		echo "Fim de processamento (concedidos)<BR>";
		exit();
	}

//  calcula pedidos pendentes por ano de depósito e total
	if ($op==31) //  http://localhost/central/control.php?action=34&op=31
	{
		$contador=0;$strcgrec3='';
		foreach ($divisoes as $idivisao)
		{
			$email = $idivisao;
			$pendentes=0;$total=0;
			$cmd = "select * from pedido where divisao='$email' and decisao in ('nulidade 1') and year(rpi)>=2010";
			$res = mysqli_query($link,$cmd);
			$numero_lidos = array();$total=0;
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				if (in_array($numero,$numero_lidos)) continue;
				$numero_lidos[$total]=$numero;
				$total++;
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}
				$cmd2 = "SELECT * FROM pedido where anulado=0 and (numero='$numero1' or numero='$numero2') and decisao in ('nulidade negada','nulidade parcial','nulidade provida','nulidade 200','nulidade 201','nulidade 204')"; 
				$res2 = mysqli_query($link,$cmd2);
				if (!($line2=@mysqli_fetch_assoc($res2))) 
				{
					$pendentes++; // pendentes independente do ano, ou seja, sera gravado com ano=0
					if ($contador%200 == 0)
					{
						$strcgrec3 = $strcgrec3.";INSERT INTO cgrec3 (numero, data, email, data2, id, valor) VALUES ('$numero', '$data', '$email', null, 'NulidadesPendentes',0)<BR>";
					} 
					else
					{
						$strcgrec3 = $strcgrec3.",('$numero', '$data', '$email', null, 'NulidadesPendentes',0)<BR>";
					}
					$contador++;
				}
			}
			$cmd = "select * from cgrec_all where email='$email' and ano=0";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res))
				$cmd = "update cgrec_all set nul_pendentes=$pendentes where email='$email' and ano=0";
			else
			{
				$cmd = "insert into cgrec_all (email,ano,concedidos,negados,pendentes) values ('$email',0,0,0,0)";
				$res = mysqli_query($link,$cmd);
				$cmd = "update cgrec_all set nul_pendentes=$pendentes where email='$email' and ano=0";
			}
			
			$res = mysqli_query($link,$cmd);
			echo "$cmd<BR>";
		}
		$strcgrec3 = $strcgrec3.";";
		echo $strcgrec3;
		echo "Fim de processamento (pendentes)<BR>";
		exit();
	}

	if ($op==32) // http://localhost/central/control.php?action=34&op=32
	{
		$concedidos_inpi = 0;
		$negados_inpi = 0;
		$pendentes_inpi = 0;
		$parciais_inpi = 0;
		foreach ($divisoes as $idivisao)
		{
			$cmd = "select * from cgrec_all where email='$idivisao' and ano=0";
			$res = mysqli_query($link,$cmd);
			if ($line=@mysqli_fetch_assoc($res))
			{
				$concedidos_inpi = $concedidos_inpi + $line['nul_providos'];
				$negados_inpi = $negados_inpi + $line['nul_negados'];
				$pendentes_inpi = $pendentes_inpi + $line['nul_pendentes'];
				$parciais_inpi = $parciais_inpi + $line['nul_parciais'];
			}
		}
		$cmd = "update cgrec_all set nul_providos='$concedidos_inpi',nul_negados='$negados_inpi',nul_pendentes='$pendentes_inpi',nul_parciais='$parciais_inpi' where email='dirpa' and ano=0";
		$res = mysqli_query($link,$cmd);
		echo "$cmd<BR>";
		echo "Fim de processamento (totalização inpi)<BR>";
		exit();
	}

	
	}
	
	if ($action==115)
	{

	if ($op==88) { // https://cientistaspatentes.com.br/central/control.php?action=115&op=88
		$kdivisao = array ('DIRPA','DIPOL','DINOR','DIPEQ','DIFARII','DIFARI','DITEX','DIMAT','DICIV','DITEL','DIPAE','DIALP','DINEC','DIPAQ','DIMEC','DIBIO','DIMOL','DITEM','DIMUT','DICEL','DIFEL','CGPATI','CGPATII','CGPATIII','CGPATIV');
		foreach ($kdivisao as $idivisao)
		{
			$cmd = "insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprov','2024-01-01',0,0,0,0,0,0,0,0,'$idivisao');";
			echo "$cmd<BR>";
			$cmd = "insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprov','2024-02-01',0,0,0,0,0,0,0,0,'$idivisao');";
			echo "$cmd<BR>";
			$cmd = "insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprov','2024-03-01',0,0,0,0,0,0,0,0,'$idivisao');";
			echo "$cmd<BR>";
			$cmd = "insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprov','2024-04-01',0,0,0,0,0,0,0,0,'$idivisao');";
			echo "$cmd<BR>";
			$cmd = "insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprov','2024-05-01',0,0,0,0,0,0,0,0,'$idivisao');";
			echo "$cmd<BR>";
			$cmd = "insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprov','2024-06-01',0,0,0,0,0,0,0,0,'$idivisao');";
			echo "$cmd<BR>";
			$cmd = "insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprov','2024-07-01',0,0,0,0,0,0,0,0,'$idivisao');";
			echo "$cmd<BR>";
			$cmd = "insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprov','2024-08-01',0,0,0,0,0,0,0,0,'$idivisao');";
			echo "$cmd<BR>";
			$cmd = "insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprov','2024-09-01',0,0,0,0,0,0,0,0,'$idivisao');";
			echo "$cmd<BR>";
			$cmd = "insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprov','2024-10-01',0,0,0,0,0,0,0,0,'$idivisao');";
			echo "$cmd<BR>";
			$cmd = "insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprov','2024-11-01',0,0,0,0,0,0,0,0,'$idivisao');";
			echo "$cmd<BR>";
			$cmd = "insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprov','2024-12-01',0,0,0,0,0,0,0,0,'$idivisao');";
			echo "$cmd<BR>";
			$cmd = "insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrectempo','2024-01-01',0,0,0,0,0,0,0,0,'$idivisao');";
			echo "$cmd<BR>";
		}
		echo "Fim de processamento";
		exit();
	}
/*
	atualize a tabela cgrec tipo=cgrecprod com a producao da COREP N:/CGREC/COREP/Produção Direp
	SELECT * FROM `cgrec` WHERE tipo='cgrecprod' order by data desc
	insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprod','2025-01-01',0,0,0,0,0,0,0,0,'DIRPA');
	insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprod','2025-02-01',0,0,0,0,0,0,0,0,'DIRPA');
	insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprod','2025-03-01',0,0,0,0,0,0,0,0,'DIRPA');
	insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprod','2025-04-01',0,0,0,0,0,0,0,0,'DIRPA');
	insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprod','2025-05-01',0,0,0,0,0,0,0,0,'DIRPA');
	insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprod','2025-06-01',0,0,0,0,0,0,0,0,'DIRPA');
	insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprod','2025-07-01',0,0,0,0,0,0,0,0,'DIRPA');
	insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprod','2025-08-01',0,0,0,0,0,0,0,0,'DIRPA');
	insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprod','2025-09-01',0,0,0,0,0,0,0,0,'DIRPA');
	insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprod','2025-10-01',0,0,0,0,0,0,0,0,'DIRPA');
	insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprod','2025-11-01',0,0,0,0,0,0,0,0,'DIRPA');
	insert into cgrec (id,tipo,data,param1,param2,param3,param4,param5,param6,param7,param8,divisao) VALUES (null,'cgrecprod','2025-12-01',0,0,0,0,0,0,0,0,'DIRPA');



	atulize a lista de examinadores conferindo na producao de cada um quando ele entrou na corep
	https://cientistaspatentes.com.br/sinergias/cgrecequipe.php

	select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from CEPIT_SISCAP.SISCAP_PEDIDO where decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111','recurso 130','indeferimento','9.2','recurso 102','recurso 103','recurso 104','recurso 112','recurso 113','recurso 115','deferimento','defanvisa','nulidade 1','nulidade 205','recurso exigencia','recurso exigencia 121','recurso ciencia','nulidade 211','nulidade 212','nulidade provida','nulidade negada','nulidade parcial','nulidade 200','nulidade 201','nulidade 204','recurso 131','recurso 135','recurso 136','recurso 137','recurso 138','recurso 139','recurso 140') and extract(year from rpi)>=2023
	renomeie para pedido.csv
	select * from CEPIT_SISCAP.SISCAP_EXAMINADOR where email<>'sisadanu' and extract(year from data)>=2023 and codigo in (select codigo from CEPIT_SISCAP.SISCAP_PEDIDO where decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111','recurso 130','indeferimento','9.2','recurso 102','recurso 103','recurso 104','recurso 112','recurso 113','recurso 115','deferimento','defanvisa','nulidade 1','nulidade 205','recurso exigencia','recurso exigencia 121','recurso ciencia','nulidade 211','nulidade 212','nulidade provida','nulidade negada','nulidade parcial','nulidade 200','nulidade 201','nulidade 204','recurso 131','recurso 135','recurso 136','recurso 137','recurso 138','recurso 139','recurso 140') and extract(year from rpi)>=2022)
	renomeie para examinador.csv

	http://cientistaspatentes.com.br/central/forum3_central_4.php?action=1 // carrega pedido.csv
	https://cientistaspatentes.com.br/central/forum3_central_4.php?action=6 // carrega examinador.csv
	https://cientistaspatentes.com.br/central/control.php?action=115&op=46&ano=2024 // atualiza cgrecprov param7
	https://cientistaspatentes.com.br/central/control.php?action=115&op=45&ano=2024 // atualiza cgrecprov param8
	https://cientistaspatentes.com.br/central/control.php?action=115&op=44&ano=2024
	https://cientistaspatentes.com.br/central/control.php?action=115&op=43&ano=2024
	https://cientistaspatentes.com.br/central/control.php?action=115&op=42&ano=2024
	https://cientistaspatentes.com.br/central/control.php?action=115&op=41&ano=2024
	https://cientistaspatentes.com.br/central/control.php?action=115&op=40&ano=2024
	https://cientistaspatentes.com.br/central/control.php?action=115&op=7&ano=2024
	https://cientistaspatentes.com.br/central/control.php?action=115&op=4&ano=2024

	select * from cgrec_estat where tipo=0 veja que 2024 esta vazio
	é importante fazer para todos os anos de 2012 em diante para atualizar o dados de pendentes destes anos.
	delete FROM `cgrec_estat` WHERE ano=2024 and tipo=0;
	delete FROM `cgrec_estat` WHERE ano=2023 and tipo=0;
	delete FROM `cgrec_estat` WHERE ano=2022 and tipo=0;
	delete FROM `cgrec_estat` WHERE ano=2021 and tipo=0;
	delete FROM `cgrec_estat` WHERE ano=2020 and tipo=0;
	delete FROM `cgrec_estat` WHERE ano=2019 and tipo=0;
	delete FROM `cgrec_estat` WHERE ano=2018 and tipo=0;
	delete FROM `cgrec_estat` WHERE ano=2017 and tipo=0;
	delete FROM `cgrec_estat` WHERE ano=2016 and tipo=0;
	delete FROM `cgrec_estat` WHERE ano=2015 and tipo=0;
	delete FROM `cgrec_estat` WHERE ano=2014 and tipo=0;
	delete FROM `cgrec_estat` WHERE ano=2013 and tipo=0;
	delete FROM `cgrec_estat` WHERE ano=2012 and tipo=0;
	https://cientistaspatentes.com.br/central/control.php?action=115&op=1&ano=2024 (irá atualizar cgrec_estat tipo=0)
	https://cientistaspatentes.com.br/central/control.php?action=115&op=1&ano=2023 (irá atualizar cgrec_estat tipo=0)
	https://cientistaspatentes.com.br/central/control.php?action=115&op=1&ano=2022 (irá atualizar cgrec_estat tipo=0)
	https://cientistaspatentes.com.br/central/control.php?action=115&op=1&ano=2021
	https://cientistaspatentes.com.br/central/control.php?action=115&op=1&ano=2020
	https://cientistaspatentes.com.br/central/control.php?action=115&op=1&ano=2019
	https://cientistaspatentes.com.br/central/control.php?action=115&op=1&ano=2018
	https://cientistaspatentes.com.br/central/control.php?action=115&op=1&ano=2017
	https://cientistaspatentes.com.br/central/control.php?action=115&op=1&ano=2016
	https://cientistaspatentes.com.br/central/control.php?action=115&op=1&ano=2015
	https://cientistaspatentes.com.br/central/control.php?action=115&op=1&ano=2014
	https://cientistaspatentes.com.br/central/control.php?action=115&op=1&ano=2013
	https://cientistaspatentes.com.br/central/control.php?action=115&op=1&ano=2012
	copie os numeros e coloque no final da relação de pedidos resultados_115_1.txt
	execute os inserts no phpmyadmin
	dados de recurso 12.2 select * from cgrec_estat where tipo=0 agora tem dados de 2024
	modifique em $op==3 $anofinal=2024 para que gere colunas de 2012 a 2024 localize em todo codigo 2024-12-31
	https://cientistaspatentes.com.br/central/control.php?action=115&op=3&tipo=1
	verifique se criou https://cientistaspatentes.com.br/sinergias/cgrec1.htm 

	select * from cgrec_estat where tipo=5 veja que 2022 esta vazio
	delete FROM `cgrec_estat` WHERE ano=2024 and tipo=5;
	delete FROM `cgrec_estat` WHERE ano=2023 and tipo=5;
	delete FROM `cgrec_estat` WHERE ano=2022 and tipo=5;
	delete FROM `cgrec_estat` WHERE ano=2021 and tipo=5;
	delete FROM `cgrec_estat` WHERE ano=2020 and tipo=5;
	delete FROM `cgrec_estat` WHERE ano=2019 and tipo=5;
	delete FROM `cgrec_estat` WHERE ano=2018 and tipo=5;
	delete FROM `cgrec_estat` WHERE ano=2017 and tipo=5;
	delete FROM `cgrec_estat` WHERE ano=2016 and tipo=5;
	delete FROM `cgrec_estat` WHERE ano=2015 and tipo=5;
	delete FROM `cgrec_estat` WHERE ano=2014 and tipo=5;
	delete FROM `cgrec_estat` WHERE ano=2013 and tipo=5;
	delete FROM `cgrec_estat` WHERE ano=2012 and tipo=5;
	https://cientistaspatentes.com.br/central/control.php?action=115&op=5&ano=2024
	https://cientistaspatentes.com.br/central/control.php?action=115&op=5&ano=2023
	https://cientistaspatentes.com.br/central/control.php?action=115&op=5&ano=2022
	https://cientistaspatentes.com.br/central/control.php?action=115&op=5&ano=2021
	https://cientistaspatentes.com.br/central/control.php?action=115&op=5&ano=2020
	https://cientistaspatentes.com.br/central/control.php?action=115&op=5&ano=2019
	https://cientistaspatentes.com.br/central/control.php?action=115&op=5&ano=2018
	https://cientistaspatentes.com.br/central/control.php?action=115&op=5&ano=2017
	https://cientistaspatentes.com.br/central/control.php?action=115&op=5&ano=2016
	https://cientistaspatentes.com.br/central/control.php?action=115&op=5&ano=2015
	https://cientistaspatentes.com.br/central/control.php?action=115&op=5&ano=2014
	https://cientistaspatentes.com.br/central/control.php?action=115&op=5&ano=2013
	https://cientistaspatentes.com.br/central/control.php?action=115&op=5&ano=2012
	copie os numeros e coloque no final da relação de pedidos resultados_115_5.txt
	execute o insert no phpmyadmin
	dados de recurso 12.3 select * from cgrec_estat where tipo=5 agora tem dados de 2022
	https://cientistaspatentes.com.br/central/control.php?action=115&op=3&tipo=5
	verifique se criou https://cientistaspatentes.com.br/sinergias/cgrec5.htm 

	select * from cgrec_estat where tipo=6 veja que 2024 esta vazio
	delete FROM `cgrec_estat` WHERE tipo=6;
	https://cientistaspatentes.com.br/central/control.php?action=115&op=6&ano=2024
	https://cientistaspatentes.com.br/central/control.php?action=115&op=6&ano=2023
	https://cientistaspatentes.com.br/central/control.php?action=115&op=6&ano=2022
	https://cientistaspatentes.com.br/central/control.php?action=115&op=6&ano=2021
	https://cientistaspatentes.com.br/central/control.php?action=115&op=6&ano=2020
	https://cientistaspatentes.com.br/central/control.php?action=115&op=6&ano=2019
	https://cientistaspatentes.com.br/central/control.php?action=115&op=6&ano=2018
	https://cientistaspatentes.com.br/central/control.php?action=115&op=6&ano=2017
	https://cientistaspatentes.com.br/central/control.php?action=115&op=6&ano=2016
	https://cientistaspatentes.com.br/central/control.php?action=115&op=6&ano=2015
	https://cientistaspatentes.com.br/central/control.php?action=115&op=6&ano=2014
	https://cientistaspatentes.com.br/central/control.php?action=115&op=6&ano=2013
	https://cientistaspatentes.com.br/central/control.php?action=115&op=6&ano=2012
	copie os numeros e coloque no final da relação de pedidos resultados_115_6.txt
	execute o insert no phpmyadmin
	dados de recurso 12.6 select * from cgrec_estat where tipo=6 agora tem dados de 2022
	https://cientistaspatentes.com.br/central/control.php?action=115&op=3&&tipo=6
	verifique se criou https://cientistaspatentes.com.br/sinergias/cgrec6.htm 

	select * from cgrec_estat where tipo=7 veja que 2022 esta vazio
	delete FROM `cgrec_estat` WHERE tipo=7;
	https://cientistaspatentes.com.br/central/control.php?action=115&op=7&ano=2024
	https://cientistaspatentes.com.br/central/control.php?action=115&op=7&ano=2023
	https://cientistaspatentes.com.br/central/control.php?action=115&op=7&ano=2022
	https://cientistaspatentes.com.br/central/control.php?action=115&op=7&ano=2021
	https://cientistaspatentes.com.br/central/control.php?action=115&op=7&ano=2020
	https://cientistaspatentes.com.br/central/control.php?action=115&op=7&ano=2019
	https://cientistaspatentes.com.br/central/control.php?action=115&op=7&ano=2018
	https://cientistaspatentes.com.br/central/control.php?action=115&op=7&ano=2017
	https://cientistaspatentes.com.br/central/control.php?action=115&op=7&ano=2016
	https://cientistaspatentes.com.br/central/control.php?action=115&op=7&ano=2015
	https://cientistaspatentes.com.br/central/control.php?action=115&op=7&ano=2014
	https://cientistaspatentes.com.br/central/control.php?action=115&op=7&ano=2013
	https://cientistaspatentes.com.br/central/control.php?action=115&op=7&ano=2012
	copie os numeros e coloque no final da relação de pedidos resultados_115_7.txt
	execute o insert no phpmyadmin
	dados de nulidade 17.1 select * from cgrec_estat where tipo=7 agora tem dados de 2022
	https://cientistaspatentes.com.br/central/control.php?action=115&op=3&ano=2022&tipo=7
	verifique se criou https://cientistaspatentes.com.br/sinergias/cgrec7.htm 

	para gerar cgrec1.htm precisa rodar http://cientistaspatentes/central/control.php?action=115&op=3&tipo=1
	para gerar cgrec5.htm precisa rodar http://cientistaspatentes/central/control.php?action=115&op=3&tipo=5
	para gerar cgrec6.htm precisa rodar http://cientistaspatentes/central/control.php?action=115&op=3&tipo=6
	para gerar cgrec7.htm precisa rodar http://cientistaspatentes/central/control.php?action=115&op=3&tipo=7
	
	na tabela B007 http://cientistaspatentes.com.br/sinergias/estoque8.php
	dados de 12.2 da dirpa
	Recursos outros: select * from arquivados where despacho='12.2' and year(data)=2022 and numero in (select numero from pedido where decisao in ('recurso 131','recurso 135','recurso 136','recurso 137','recurso 138','recurso 139','recurso 140') and year(rpi)>=2022)
	Recursos prejudicados:  select * from arquivados where despacho='12.2' and year(data)=2022 and numero in (select numero from pedido where decisao in ('recurso 130') and year(rpi)>=2022)
	Recursos intermediários: select * from arquivados where despacho='12.2' and year(data)=2022 and numero in (select numero from pedido where decisao in ('recurso exigencia','recurso exigencia 121','recurso ciencia') and year(rpi)>=2022) and numero not in (select numero from pedido where decisao in ('recurso provido anvisa','recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111')
	Recursos providos: select * from arquivados where despacho='12.2' and year(data)=2022 and numero in (select numero from pedido where decisao in ('recurso provido anvisa','recurso provido','recurso 100','recurso 1001','recurso provido-reforma 100.1','recurso 1002','recurso provido-reforma 100.2','recurso provido-devolucao 100.2') and year(rpi)>=2022)
	Recursos negados: select * from arquivados where despacho='12.2' and year(data)=2022 and numero in (select numero from pedido where decisao in ('recurso negado','recurso 111','recurso manutencao do indeferimento 111') and year(rpi)>=2022)
	Total (12.2): select count(*) from arquivados where despacho='12.2' and year(data)=2022
	Recursos pendentes: Total (12.2) - (Recursos prejudicados + Recursos intermediários + Recursos providos + Recursos negados)
	
*/

		if ($op==46) // http://localhost/central/control.php?action=115&op=46&ano=2021 calcula as decisoes de recurso
		{			
					// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from CEPIT_SISCAP.SISCAP_PEDIDO where decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111','recurso 130','indeferimento','9.2','recurso 102','recurso 103','recurso 104','recurso 112','recurso 113','recurso 115','deferimento','defanvisa','nulidade 1','nulidade 205','recurso exigencia','recurso exigencia 121','recurso ciencia','nulidade 211','nulidade 212','nulidade provida','nulidade negada','nulidade parcial','nulidade 200','nulidade 201','nulidade 204','recurso 131','recurso 135','recurso 136','recurso 137','recurso 138','recurso 139','recurso 140') and extract(year from rpi)>=2022
					// renomeie para pedido.csv
					// http://cientistaspatentes.com.br/central/forum3_central_4.php?action=1 
					// http://cientistaspatentes.com.br/central/control.php?action=115&op=46&ano=2024
					          

			$numeros_lidos = array();
			$rtotal130 = array();

			$rtotal130_cgpati = 0;
			$rtotal130_cgpatii = 0;
			$rtotal130_cgpatiii = 0;
			$rtotal130_cgpativ = 0;

			$divisoes1 = array ('dirpa', 'ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut');
			foreach ($divisoes1 as $kdivisao){
				$rtotal130[$kdivisao] = 0;
			}

			// select distinct(numero) from pedido where decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111','recurso 130') and year(rpi)=$ano
			$i=0; 
			

			$cmd = "select * from pedido where decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 1001','recurso provido-reforma 100.1','recurso 1002','recurso provido-reforma 100.2','recurso provido-devolucao 100.2','recurso 111','recurso 130') and year(rpi)=$ano";
			$res = mysqli_query($link,$cmd);//echo $cmd;exit();
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$decisao = $line['decisao'];
				$data_rpi = $line['rpi'];
				if (!in_array($numero,$numeros_lidos))
				{
					$numeros_lidos[$i++]=$numero;

					$idivisao="";
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

					if ($decisao=='recurso 130')
					{
						$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='12.2' and data<'$data_rpi'";
						$res2 = mysqli_query($link,$cmd2);
						if (!($line2=@mysqli_fetch_assoc($res2))) continue;
					}

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
							$cmd2 = "SELECT * FROM classes where numero='$numero'";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$classificacao = $line2['descricao'];
								$symbol = trim(ler_symbol($classificacao));
								$idivisao = ler_divisao($link,$classificacao);
							}
						}
					}

					$erro = 0;
					if ($idivisao=='dipem') $idivisao='dinec';
					if ($idivisao=='ditex' or $idivisao=='difari' or $idivisao=='difarii' or $idivisao=='dipol' or $idivisao=='dinor')
						$rtotal130_cgpati++;
					else if ($idivisao=='dialp' or $idivisao=='dibio'  or $idivisao=='dimol'   or $idivisao=='dipaq' or $idivisao=='dipae')
						$rtotal130_cgpatii++;
					else if ($idivisao=='ditel' or $idivisao=='dicel'  or $idivisao=='difel'   or $idivisao=='dipeq' or $idivisao=='diciv')
						$rtotal130_cgpatiii++;
					else if ($idivisao=='dimat' or $idivisao=='dimec'  or $idivisao=='ditem'   or $idivisao=='dinec' or $idivisao=='dimut')
						$rtotal130_cgpativ++;
					else
					{
						$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('ciencia de parecer','exigencia') order by rpi desc";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
						{
							$idivisao = $line2['divisao'];
							$erro = 0;
							if ($idivisao=='dipem') $idivisao='dinec';
							if ($idivisao=='ditex' or $idivisao=='difari' or $idivisao=='difarii' or $idivisao=='dipol' or $idivisao=='dinor')
								$rtotal130_cgpati++;
							else if ($idivisao=='dialp' or $idivisao=='dibio'  or $idivisao=='dimol'   or $idivisao=='dipaq' or $idivisao=='dipae')
								$rtotal130_cgpatii++;
							else if ($idivisao=='ditel' or $idivisao=='dicel'  or $idivisao=='difel'   or $idivisao=='dipeq' or $idivisao=='diciv')
								$rtotal130_cgpatiii++;
							else if ($idivisao=='dimat' or $idivisao=='dimec'  or $idivisao=='ditem'   or $idivisao=='dinec' or $idivisao=='dimut')
								$rtotal130_cgpativ++;
						}
						else
						{
							$erro=1;
							echo "$numero $idivisao $classificacao $symbol sem divisão será ignorado !! <BR>";
						}
					}

					if ($erro==0)
					{
						$rtotal130[$idivisao]++;
						$rtotal130['dirpa']++;
					}
				}
			}

			$total = 0;
			$total_direta = 0;
			foreach ($divisoes1 as $kdivisao)
			{
				$total = $total + $rtotal[$kdivisao];
				$total_direta = $total_direta + $rtotal_direta[$kdivisao];
				$jdivisao = strtoupper($kdivisao);
				echo "update cgrec set param7='".$rtotal130[$kdivisao]."' where tipo='cgrecprov' and year(data)=$ano and month(data)=1 and divisao='$jdivisao';<BR>";
			}
			echo "update cgrec set param7='".$rtotal130['dirpa']."' where tipo='cgrecprov' and year(data)=$ano and month(data)=1 and divisao='DIRPA';<BR>";
			echo "update cgrec set param7='".$rtotal130_cgpati."' where tipo='cgrecprov' and year(data)=$ano and month(data)=1 and divisao='CGPATI';<BR>";
			echo "update cgrec set param7='".$rtotal130_cgpatii."' where tipo='cgrecprov' and year(data)=$ano and month(data)=1 and divisao='CGPATII';<BR>";
			echo "update cgrec set param7='".$rtotal130_cgpatiii."' where tipo='cgrecprov' and year(data)=$ano and month(data)=1 and divisao='CGPATIII';<BR>";
			echo "update cgrec set param7='".$rtotal130_cgpativ."' where tipo='cgrecprov' and year(data)=$ano and month(data)=1 and divisao='CGPATIV';<BR>";

			echo "Fim processamento<BR>";
			exit();

		}


		if ($op==45) // http://localhost/central/control.php?action=115&op=45&ano=2021 contabiliza despacho 12.2 
		{			 // http://cientistaspatentes/central/control.php?action=115&op=45&ano=2024

			$numeros_lidos = array();
			$t122 = array();
			$t122_cgpati = 0;
			$t122_cgpatii = 0;
			$t122_cgpatiii = 0;
			$t122_cgpativ = 0;

			$divisoes1 = array ('dirpa', 'ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut');
			foreach ($divisoes1 as $kdivisao){
				$t122[$kdivisao] = 0;
			}

			$cmd = "select * from arquivados where despacho='12.2' and year(data)=$ano";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$idivisao="";
				$numero1 = $numero;
				$numero2 = $numero;
				$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
				$res2 = mysqli_query($link,$cmd2);
				if ($line2=@mysqli_fetch_assoc($res2))
				{
					$numero1 = $line2["numero1"];
					$numero2 = $line2["numero2"];
				}

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
						$cmd2 = "SELECT * FROM classes where (numero='$numero1' or numero='$numero2')";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
						{
							$classificacao = $line2['descricao'];
							$symbol = trim(ler_symbol($classificacao));
							$idivisao = ler_divisao($link,$classificacao);
						}
					}
				}

				$erro = 0;
				if ($idivisao=='dipem') $idivisao='dinec';
				if ($idivisao=='ditex' or $idivisao=='difari' or $idivisao=='difarii' or $idivisao=='dipol' or $idivisao=='dinor')
					$t122_cgpati++;
				else if ($idivisao=='dialp' or $idivisao=='dibio'  or $idivisao=='dimol'   or $idivisao=='dipaq' or $idivisao=='dipae')
					$t122_cgpatii++;
				else if ($idivisao=='ditel' or $idivisao=='dicel'  or $idivisao=='difel'   or $idivisao=='dipeq' or $idivisao=='diciv')
					$t122_cgpatiii++;
				else if ($idivisao=='dimat' or $idivisao=='dimec'  or $idivisao=='ditem'   or $idivisao=='dinec' or $idivisao=='dimut')
					$t122_cgpativ++;
				else
				{
					$erro=1;
					echo "$numero $idivisao $classificacao $symbol sem divisão será ignorado !! <BR>";
				}

				if ($erro==0)
				{
					$t122[$idivisao]++;
					$t122['dirpa']++;
				}
			}

			$total = 0;
			foreach ($divisoes1 as $kdivisao)
			{
				$total = $total + $rtotal[$kdivisao];
				$jdivisao = strtoupper($kdivisao);
				echo "update cgrec set param8='".$t122[$kdivisao]."' where tipo='cgrecprov' and year(data)=$ano and month(data)=1 and divisao='$jdivisao';<BR>";
			}
			echo "update cgrec set param8='".$t122['dirpa']."' where tipo='cgrecprov' and year(data)=$ano and month(data)=1 and divisao='DIRPA';<BR>";
			echo "update cgrec set param8='".$t122_cgpati."' where tipo='cgrecprov' and year(data)=$ano and month(data)=1 and divisao='CGPATI';<BR>";
			echo "update cgrec set param8='".$t122_cgpatii."' where tipo='cgrecprov' and year(data)=$ano and month(data)=1 and divisao='CGPATII';<BR>";
			echo "update cgrec set param8='".$t122_cgpatiii."' where tipo='cgrecprov' and year(data)=$ano and month(data)=1 and divisao='CGPATIII';<BR>";
			echo "update cgrec set param8='".$t122_cgpativ."' where tipo='cgrecprov' and year(data)=$ano and month(data)=1 and divisao='CGPATIV';<BR>";

			echo "Fim de processamento<BR>";
			exit();

		}


		if ($op==44) // http://localhost/central/control.php?action=115&op=44&ano=2021 contabiliza tempos de recursos administrativos por divisão
		{ 			 // http://cientistaspatentes/central/control.php?action=115&op=44&ano=2024  

			$numeros_lidos = array();
			$atraso = 0;
			$soma_atraso = array();
			$count = array();

			$divisoes1 = array ('dirpa', 'ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut');
			foreach ($divisoes1 as $kdivisao){
				$soma_atraso[$kdivisao] = 0;
				$count[$kdivisao] = 0;
			}

			$soma_atraso_cgpati = 0;
			$soma_atraso_cgpatii = 0;
			$soma_atraso_cgpatiii = 0;
			$soma_atraso_cgpativ = 0;

			$i=0;
			$cmd = "select * from pedido where decisao in ('recurso 102','recurso 103','recurso 104','recurso 112','recurso 113','recurso 115') and year(rpi)=$ano";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$decisao = $line['decisao'];
				$data_rpi = $line['rpi'];
				if (!in_array($numero,$numeros_lidos))
				{
					$numeros_lidos[$i++]=$numero;

					$idivisao="";
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

					$idivisao = '';
					$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('12.3','12.6') and divisao<>'' and divisao<>'cgrec' and divisao<>'sanot' and divisao<>'sepan'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) $idivisao = $line2['divisao'];

					if ($idivisao=='')
					{
						if (identificado_mu($numero))
						{
							$idivisao='dimut';
						}
						else
						{
							$cmd2 = "SELECT * FROM classes where numero='$numero'";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$classificacao = $line2['descricao'];
								$symbol = trim(ler_symbol($classificacao));
								$idivisao = ler_divisao($link,$classificacao);
							}
						}
					}

					$data = null;$despacho="";
					$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho in ('12.3','12.6')";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$data = $line2['data'];
						$despacho = $line2['despacho'];
					}

					$atraso = round((strtotime($data_rpi)-strtotime($data))/60/60/24/30/12,2);
					echo "$despacho,$idivisao,$numero,$data,$data_rpi,$atraso<BR>";

					$soma_atraso['dirpa']= $soma_atraso['dirpa'] + $atraso;
					$count['dirpa']++;
					if ($idivisao<>"")
					{
						$soma_atraso[$idivisao]= $soma_atraso[$idivisao] + $atraso;
						$count[$idivisao]++;
						if ($idivisao=='ditex' or $idivisao=='difari' or $idivisao=='difarii' or $idivisao=='dipol' or $idivisao=='dinor') $soma_atraso_cgpati = $soma_atraso_cgpati + $atraso;
						if ($idivisao=='dialp' or $idivisao=='dibio'  or $idivisao=='dimol'   or $idivisao=='dipaq' or $idivisao=='dipae') $soma_atraso_cgpatii = $soma_atraso_cgpatii + $atraso;
						if ($idivisao=='ditel' or $idivisao=='dicel'  or $idivisao=='difel'   or $idivisao=='dipeq' or $idivisao=='diciv') $soma_atraso_cgpatiii = $soma_atraso_cgpatiii + $atraso;
						if ($idivisao=='dimat' or $idivisao=='dimec'  or $idivisao=='ditem'   or $idivisao=='dinec' or $idivisao=='dimut') $soma_atraso_cgpativ = $soma_atraso_cgpativ + $atraso;
					}
				}
			}

			foreach ($divisoes1 as $kdivisao)
			{
				if ($count[$kdivisao]==0)
					$media = 0;
				else
					$media = round($soma_atraso[$kdivisao]/$count[$kdivisao],2);

				echo $divisao_complemento[$kdivisao].":<BR>";
				echo "Total decisões: ".$count[$kdivisao]."<BR>";
				echo "Média de decisão (anos): $media<BR>";
				$kdivisao = strtoupper($kdivisao);
				//echo "null;cgrectempo;$ano-01-01;$media;$kdivisao,12.3 12.6<BR>";
				$kdivisao = strtoupper($kdivisao);
				echo "update cgrec set param2='$media' where tipo='cgrectempo' and year(data)=$ano and divisao='$kdivisao';<BR>";
			}

			$k = $count['ditex']+$count['difari']+$count['difarii']+$count['dipol']+$count['dinor'];
			if ($k==0)
				$media_cgpati = 0;
			else
				$media_cgpati = round($soma_atraso_cgpati/$k,2);

			$k = $count['dialp']+$count['dibio']+$count['dimol']+$count['dipaq']+$count['dipae'];
			if ($k==0)
				$media_cgpatii = 0;
			else
				$media_cgpatii = round($soma_atraso_cgpatii/$k,2);

			$k = $count['ditel']+$count['dicel']+$count['difel']+$count['dipeq']+$count['diciv'];
			if ($k==0)
				$media_cgpatiii = 0;
			else
				$media_cgpatiii = round($soma_atraso_cgpatiii/$k,2);

			$k = $count['dimat']+$count['dimec']+$count['ditem']+$count['dinec']+$count['dimut'];
			if ($k==0)
				$media_cgpativ = 0;
			else
				$media_cgpativ = round($soma_atraso_cgpativ/$k,2);

			//echo "null;cgrectempo;$ano-01-01;$media_cgpati;CGPATI,12.3 12.6<BR>";
			//echo "null;cgrectempo;$ano-01-01;$media_cgpatii;CGPATII,12.3 12.6<BR>";
			//echo "null;cgrectempo;$ano-01-01;$media_cgpatiii;CGPATIII,12.3 12.6<BR>";
			//echo "null;cgrectempo;$ano-01-01;$media_cgpativ;CGPATIV,12.3 12.6<BR>";

			echo "update cgrec set param2='$media_cgpati' where tipo='cgrectempo' and year(data)=$ano and divisao='CGPATI';<BR>";
			echo "update cgrec set param2='$media_cgpatii' where tipo='cgrectempo' and year(data)=$ano and divisao='CGPATII';<BR>";
			echo "update cgrec set param2='$media_cgpatiii' where tipo='cgrectempo' and year(data)=$ano and divisao='CGPATIII';<BR>";
			echo "update cgrec set param2='$media_cgpativ' where tipo='cgrectempo' and year(data)=$ano and divisao='CGPATIV';<BR>";


			echo "Fim do processamento:";
			exit();

		}

		if ($op==43) // http://localhost/central/control.php?action=115&op=43&ano=2021 calcula tempo de nulidade
		{ 			// http://cientitaspatentes/central/control.php?action=115&op=43&ano=2024

			$numeros_lidos = array();
			$atraso = 0;
			$atraso171 = 0;
			$soma_atraso = array();
			$soma_atraso171 = array();
			$count = array();

			$soma_atraso1_cgpati = 0;
			$soma_atraso1_cgpatii = 0;
			$soma_atraso1_cgpatiii = 0;
			$soma_atraso1_cgpativ = 0;

			$soma_atraso2_cgpati = 0;
			$soma_atraso2_cgpatii = 0;
			$soma_atraso2_cgpatiii = 0;
			$soma_atraso2_cgpativ = 0;


			$divisoes1 = array ('dirpa', 'ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut');
			foreach ($divisoes1 as $kdivisao){
				$soma_atraso[$kdivisao] = 0;
				$soma_atraso171[$kdivisao] = 0;
				$count[$kdivisao] = 0;
			}

			$i=0;
			$cmd = "select * from pedido where decisao in ('nulidade provida','nulidade negada','nulidade parcial','nulidade 200','nulidade 201','nulidade 204') and year(rpi)=$ano and anulado=0";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$decisao = $line['decisao'];
				$data_rpi = $line['rpi'];
				if (!in_array($numero,$numeros_lidos))
				{
					$numeros_lidos[$i++]=$numero;

					$idivisao="";
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

					$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('deferimento','defanvisa')";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
						$idivisao = $line2['divisao'];
					else
					{
						if (identificado_mu($numero))
							$idivisao='dimut';
						else
						{
							$cmd2 = "SELECT * FROM classes where numero='$numero'";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$classificacao = $line2['descricao'];
								$symbol = trim(ler_symbol($classificacao));
								$idivisao = ler_divisao($link,$classificacao);
							}
						}
					}

					$data = null;
					$data171 = null;

					$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='17.1'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
						$data171 = $line2['data'];
					else
						echo "Não achei 17.1 de $numero<BR>";

					$atraso171 = round((strtotime($data_rpi)-strtotime($data171))/60/60/24/30/12,2);

					$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and (decisao='nulidade 1' or decisao='nulidade 205')";;
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
						$data = $line2['rpi'];
					else
					{
						echo "Não achei parecer 205 de $numero<BR>";
						$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='PR - Nulidades' order by data asc";;
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
							$data = $line2['data'];
						else
							echo "Não achei PR Nulidades !<BR>";
					}

					$atraso = round((strtotime($data_rpi)-strtotime($data))/60/60/24/30/12,2);
					echo "$idivisao,$numero,$data,$data171,$data_rpi,$atraso,$atraso171<BR>";

					$soma_atraso['dirpa']= $soma_atraso['dirpa'] + $atraso;
					$soma_atraso171['dirpa']= $soma_atraso171['dirpa'] + $atraso171;
					$count['dirpa']++;
					if ($idivisao<>"")
					{
						$soma_atraso[$idivisao]= $soma_atraso[$idivisao] + $atraso;
						$soma_atraso171[$idivisao]= $soma_atraso171[$idivisao] + $atraso171;
						$count[$idivisao]++;

						if ($idivisao=='ditex' or $idivisao=='difari' or $idivisao=='difarii' or $idivisao=='dipol' or $idivisao=='dinor') $soma_atraso1_cgpati = $soma_atraso1_cgpati + $atraso;
						if ($idivisao=='dialp' or $idivisao=='dibio'  or $idivisao=='dimol'   or $idivisao=='dipaq' or $idivisao=='dipae') $soma_atraso1_cgpatii = $soma_atraso1_cgpatii + $atraso;
						if ($idivisao=='ditel' or $idivisao=='dicel'  or $idivisao=='difel'   or $idivisao=='dipeq' or $idivisao=='diciv') $soma_atraso1_cgpatiii = $soma_atraso1_cgpatiii + $atraso;
						if ($idivisao=='dimat' or $idivisao=='dimec'  or $idivisao=='ditem'   or $idivisao=='dinec' or $idivisao=='dimut') $soma_atraso1_cgpativ = $soma_atraso1_cgpativ + $atraso;

						if ($idivisao=='ditex' or $idivisao=='difari' or $idivisao=='difarii' or $idivisao=='dipol' or $idivisao=='dinor') $soma_atraso2_cgpati = $soma_atraso2_cgpati + $atraso171;
						if ($idivisao=='dialp' or $idivisao=='dibio'  or $idivisao=='dimol'   or $idivisao=='dipaq' or $idivisao=='dipae') $soma_atraso2_cgpatii = $soma_atraso2_cgpatii + $atraso171;
						if ($idivisao=='ditel' or $idivisao=='dicel'  or $idivisao=='difel'   or $idivisao=='dipeq' or $idivisao=='diciv') $soma_atraso2_cgpatiii = $soma_atraso2_cgpatiii + $atraso171;
						if ($idivisao=='dimat' or $idivisao=='dimec'  or $idivisao=='ditem'   or $idivisao=='dinec' or $idivisao=='dimut') $soma_atraso2_cgpativ = $soma_atraso2_cgpativ + $atraso171;
					}
				}
			}

			foreach ($divisoes1 as $kdivisao)
			{
				if ($count[$kdivisao]==0)
				{
					$media = 0;
					$media171 = 0;
				}
				else
				{
					$media = round($soma_atraso[$kdivisao]/$count[$kdivisao],2);
					$media171 = round($soma_atraso171[$kdivisao]/$count[$kdivisao],2);
				}
				echo $divisao_complemento[$kdivisao].":<BR>";
				echo "Total decisões: ".$count[$kdivisao]."<BR>";
				echo "Média de decisão (anos): $media<BR>";
				$kdivisao = strtoupper($kdivisao);
				//echo "null;cgrectempo;$ano-01-01;$media;$media171;$kdivisao;17.1<BR>";
				echo "update cgrec set param3='$media',param4='$media171' where tipo='cgrectempo' and year(data)=$ano and divisao='$kdivisao';<BR>";

			}

			$k = $count['ditex']+$count['difari']+$count['difarii']+$count['dipol']+$count['dinor'];
			if ($k==0)
				$media1_cgpati = 0;
			else
				$media1_cgpati = round($soma_atraso1_cgpati/$k,2);

			$k = $count['dialp']+$count['dibio']+$count['dimol']+$count['dipaq']+$count['dipae'];
			if ($k==0)
				$media1_cgpatii = 0;
			else
				$media1_cgpatii = round($soma_atraso1_cgpatii/$k,2);

			$k = $count['ditel']+$count['dicel']+$count['difel']+$count['dipeq']+$count['diciv'];
			if ($k==0)
				$media1_cgpatiii = 0;
			else
				$media1_cgpatiii = round($soma_atraso1_cgpatiii/$k,2);

			$k = $count['dimat']+$count['dimec']+$count['ditem']+$count['dinec']+$count['dimut'];
			if ($k==0)
				$media1_cgpativ = 0;
			else
				$media1_cgpativ = round($soma_atraso1_cgpativ/$k,2);

			//echo "null;cgrectempo;$ano-01-01;$media1_cgpati;CGPATI,17.1<BR>";
			//echo "null;cgrectempo;$ano-01-01;$media1_cgpatii;CGPATII,17.1<BR>";
			//echo "null;cgrectempo;$ano-01-01;$media1_cgpatiii;CGPATIII,17.1<BR>";
			//echo "null;cgrectempo;$ano-01-01;$media1_cgpativ;CGPATIV,17.1<BR>";

			$k = $count['ditex']+$count['difari']+$count['difarii']+$count['dipol']+$count['dinor'];
			if ($k==0)
				$media2_cgpati = 0;
			else
				$media2_cgpati = round($soma_atraso2_cgpati/$k,2);

			$k = $count['dialp']+$count['dibio']+$count['dimol']+$count['dipaq']+$count['dipae'];
			if ($k==0)
				$media2_cgpatii = 0;
			else
				$media2_cgpatii = round($soma_atraso2_cgpatii/$k,2);

			$k = $count['ditel']+$count['dicel']+$count['difel']+$count['dipeq']+$count['diciv'];
			if ($k==0)
				$media2_cgpatiii = 0;
			else
				$media2_cgpatiii = round($soma_atraso2_cgpatiii/$k,2);

			$k = $count['dimat']+$count['dimec']+$count['ditem']+$count['dinec']+$count['dimut'];
			if ($k==0)
				$media2_cgpativ = 0;
			else
				$media2_cgpativ = round($soma_atraso2_cgpativ/$k,2);

			//echo "null;cgrectempo;$ano-01-01;$media2_cgpati;CGPATI,17.1<BR>";
			//echo "null;cgrectempo;$ano-01-01;$media2_cgpatii;CGPATII,17.1<BR>";
			//echo "null;cgrectempo;$ano-01-01;$media2_cgpatiii;CGPATIII,17.1<BR>";
			//echo "null;cgrectempo;$ano-01-01;$media2_cgpativ;CGPATIV,17.1<BR>";

			echo "update cgrec set param3='$media1_cgpati',param4='$media2_cgpati' where tipo='cgrectempo' and year(data)=$ano and divisao='CGPATI';<BR>";
			echo "update cgrec set param3='$media1_cgpatii',param4='$media2_cgpatii' where tipo='cgrectempo' and year(data)=$ano and divisao='CGPATII';<BR>";
			echo "update cgrec set param3='$media1_cgpatiii',param4='$media2_cgpatiii' where tipo='cgrectempo' and year(data)=$ano and divisao='CGPATIII';<BR>";
			echo "update cgrec set param3='$media1_cgpativ',param4='$media2_cgpativ' where tipo='cgrectempo' and year(data)=$ano and divisao='CGPATIV';<BR>";

			echo "Fim do processamento:";
			exit();

		}


		if ($op==42) // http://localhost/central/control.php?action=115&op=42&ano=2021
		{			 // http://cientistaspatentes/central/control.php?action=115&op=42&ano=2024

			$numeros_lidos = array();
			$atraso = 0;
			$soma_atraso = array();
			$count = array();

			$divisoes1 = array ('dirpa', 'ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut');
			foreach ($divisoes1 as $kdivisao){
				$soma_atraso[$kdivisao] = 0;
				$count[$kdivisao] = 0;
			}

			$soma_atraso_cgpati = 0;
			$soma_atraso_cgpatii = 0;
			$soma_atraso_cgpatiii = 0;
			$soma_atraso_cgpativ = 0;

			$i=0;
			$cmd = "select * from pedido where decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 1001','recurso provido-reforma 100.1','recurso 1002','recurso provido-reforma 100.2','recurso provido-devolucao 100.2','recurso 111') and year(rpi)=$ano";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$decisao = $line['decisao'];
				$data_rpi = $line['rpi'];
				if (!in_array($numero,$numeros_lidos))
				{
					$numeros_lidos[$i++]=$numero;

					$idivisao="";
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
							$cmd2 = "SELECT * FROM classes where numero='$numero'";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$classificacao = $line2['descricao'];
								$symbol = trim(ler_symbol($classificacao));
								$idivisao = ler_divisao($link,$classificacao);
							}
						}
					}

					$data = null;
					$cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='12.2'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) $data = $line2['data'];

					$atraso = round((strtotime($data_rpi)-strtotime($data))/60/60/24/30/12,2);
					echo "$idivisao,$numero,$data,$data_rpi,$atraso<BR>";

					$soma_atraso['dirpa']= $soma_atraso['dirpa'] + $atraso;
					$count['dirpa']++;
					if ($idivisao<>"")
					{
						$soma_atraso[$idivisao]= $soma_atraso[$idivisao] + $atraso;
						$count[$idivisao]++;
						if ($idivisao=='ditex' or $idivisao=='difari' or $idivisao=='difarii' or $idivisao=='dipol' or $idivisao=='dinor') $soma_atraso_cgpati = $soma_atraso_cgpati + $atraso;
						if ($idivisao=='dialp' or $idivisao=='dibio'  or $idivisao=='dimol'   or $idivisao=='dipaq' or $idivisao=='dipae') $soma_atraso_cgpatii = $soma_atraso_cgpatii + $atraso;
						if ($idivisao=='ditel' or $idivisao=='dicel'  or $idivisao=='difel'   or $idivisao=='dipeq' or $idivisao=='diciv') $soma_atraso_cgpatiii = $soma_atraso_cgpatiii + $atraso;
						if ($idivisao=='dimat' or $idivisao=='dimec'  or $idivisao=='ditem'   or $idivisao=='dinec' or $idivisao=='dimut') $soma_atraso_cgpativ = $soma_atraso_cgpativ + $atraso;

					}
				}
			}

			foreach ($divisoes1 as $kdivisao)
			{
				if ($count[$kdivisao]==0)
					$media = 0;
				else
					$media = round($soma_atraso[$kdivisao]/$count[$kdivisao],2);

				//echo "null;cgrectempo;$ano-01-01;$media;$kdivisao,12.2<BR>";
				$jdivisao = strtoupper($kdivisao);
				echo $divisao_complemento[$kdivisao].":<BR>";
				echo "Total decisões $ano: ".$count[$kdivisao]."<BR>";
				echo "Média de decisão (anos): $media<BR>";
				echo "update cgrec set param1='$media' where tipo='cgrectempo' and year(data)=$ano and divisao='$jdivisao';<BR>";
			}

			$k = $count['ditex']+$count['difari']+$count['difarii']+$count['dipol']+$count['dinor'];
			if ($k==0)
				$media_cgpati = 0;
			else
				$media_cgpati = round($soma_atraso_cgpati/$k,2);

			$k = $count['dialp']+$count['dibio']+$count['dimol']+$count['dipaq']+$count['dipae'];
			if ($k==0)
				$media_cgpatii = 0;
			else
				$media_cgpatii = round($soma_atraso_cgpatii/$k,2);

			$k = $count['ditel']+$count['dicel']+$count['difel']+$count['dipeq']+$count['diciv'];
			if ($k==0)
				$media_cgpatiii = 0;
			else
				$media_cgpatiii = round($soma_atraso_cgpatiii/$k,2);

			$k = $count['dimat']+$count['dimec']+$count['ditem']+$count['dinec']+$count['dimut'];
			if ($k==0)
				$media_cgpativ = 0;
			else
				$media_cgpativ = round($soma_atraso_cgpativ/$k,2);

			//echo "null;cgrectempo;$ano-01-01;$media_cgpati;CGPATI,12.3 12.6<BR>";
			//echo "null;cgrectempo;$ano-01-01;$media_cgpatii;CGPATII,12.3 12.6<BR>";
			//echo "null;cgrectempo;$ano-01-01;$media_cgpatiii;CGPATIII,12.3 12.6<BR>";
			//echo "null;cgrectempo;$ano-01-01;$media_cgpativ;CGPATIV,12.3 12.6<BR>";

			echo "update cgrec set param1='$media_cgpati' where tipo='cgrectempo' and year(data)=$ano and divisao='CGPATI';<BR>";
			echo "update cgrec set param1='$media_cgpatii' where tipo='cgrectempo' and year(data)=$ano and divisao='CGPATII';<BR>";
			echo "update cgrec set param1='$media_cgpatiii' where tipo='cgrectempo' and year(data)=$ano and divisao='CGPATIII';<BR>";
			echo "update cgrec set param1='$media_cgpativ' where tipo='cgrectempo' and year(data)=$ano and divisao='CGPATIV';<BR>";

			echo "Fim do processamento:";
			exit();

		}

		if ($op==41) // http://localhost/central/control.php?action=115&op=41&ano=2021 contabiliza recursos providos e negados por mes
		{			 // http://cientistaspatentes/central/control.php?action=115&op=41&ano=2024

			$numeros_lidos = array();
			$rprovidos = array();
			$rnegados = array();
			$rtotal = array();

			$rprovidos_cgpati = 0;
			$rnegados_cgpati = 0;
			$rtotal_cgpati = 0;

			$rprovidos_cgpatii = 0;
			$rnegados_cgpatii = 0;
			$rtotal_cgpatii = 0;

			$rprovidos_cgpatiii = 0;
			$rnegados_cgpatiii = 0;
			$rtotal_cgpatiii = 0;

			$rprovidos_cgpativ = 0;
			$rnegados_cgpativ = 0;
			$rtotal_cgpativ = 0;

			$rprovidos_direta = 0;
			$rnegados_direta = 0;
			$rtotal_direta = 0;

			$rprovidos_direta = array();
			$rnegados_direta = array();
			$rtotal_direta = array();

			$rprovidos_direta_cgpati = 0;
			$rnegados_direta_cgpati = 0;
			$rtotal_direta_cgpati = 0;

			$rprovidos_direta_cgpatii = 0;
			$rnegados_direta_cgpatii = 0;
			$rtotal_direta_cgpatii = 0;

			$rprovidos_direta_cgpatiii = 0;
			$rnegados_direta_cgpatiii = 0;
			$rtotal_direta_cgpatiii = 0;

			$rprovidos_direta_cgpativ = 0;
			$rnegados_direta_cgpativ = 0;
			$rtotal_direta_cgpativ = 0;

			$divisoes1 = array ('dirpa', 'ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut');
			foreach ($divisoes1 as $kdivisao){
				$rprovidos[$kdivisao] = 0;
				$rnegados[$kdivisao] = 0;
				$rtotal[$kdivisao] = 0;
				$rprovidos_direta[$kdivisao] = 0;
				$rnegados_direta[$kdivisao] = 0;
				$rtotal_direta[$kdivisao] = 0;

			}

			$i=0;
			for ($mes=1;$mes<=12;$mes++)
			{

			$cmd = "select * from pedido where decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 1001','recurso provido-reforma 100.1','recurso 1002','recurso provido-reforma 100.2','recurso provido-devolucao 100.2','recurso 111') and year(rpi)=$ano and month(rpi)=$mes";
			$res = mysqli_query($link,$cmd);
			while ($line=@mysqli_fetch_assoc($res))
			{
				$numero = $line['numero'];
				$decisao = $line['decisao'];
				$data_rpi = $line['rpi'];
				if (!in_array($numero,$numeros_lidos))
				{
					$numeros_lidos[$i++]=$numero;

					$idivisao="";
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
							$cmd2 = "SELECT * FROM classes where numero='$numero'";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$classificacao = $line2['descricao'];
								$symbol = trim(ler_symbol($classificacao));
								$idivisao = ler_divisao($link,$classificacao);
							}
						}
					}

					$decisao_direta = 1;
					$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('recurso exigencia','recurso exigencia 121','recurso ciencia') and rpi<'$data_rpi'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2)) $decisao_direta = 0;

					if ($decisao=='recurso provido' or $decisao=='recurso 100' or $decisao=='recurso 1001' or $decisao=='recurso provido-reforma 100.1' or $decisao=='recurso 1002' or $decisao=='recurso provido-reforma 100.2' or $decisao=='recurso provido-devolucao 100.2')	{
						$rprovidos[$idivisao]++;
						$rprovidos['dirpa']++;
						if ($idivisao=='ditex' or $idivisao=='difari' or $idivisao=='difarii' or $idivisao=='dipol' or $idivisao=='dinor') $rprovidos_cgpati++;
						if ($idivisao=='dialp' or $idivisao=='dibio'  or $idivisao=='dimol'   or $idivisao=='dipaq' or $idivisao=='dipae') $rprovidos_cgpatii++;
						if ($idivisao=='ditel' or $idivisao=='dicel'  or $idivisao=='difel'   or $idivisao=='dipeq' or $idivisao=='diciv') $rprovidos_cgpatiii++;
						if ($idivisao=='dimat' or $idivisao=='dimec'  or $idivisao=='ditem'   or $idivisao=='dinec' or $idivisao=='dimut') $rprovidos_cgpativ++;

						if ($decisao_direta == 1){
							$rprovidos_direta[$idivisao]++;
							$rprovidos_direta['dirpa']++;
							if ($idivisao=='ditex' or $idivisao=='difari' or $idivisao=='difarii' or $idivisao=='dipol' or $idivisao=='dinor') $rprovidos_direta_cgpati++;
							if ($idivisao=='dialp' or $idivisao=='dibio'  or $idivisao=='dimol'   or $idivisao=='dipaq' or $idivisao=='dipae') $rprovidos_direta_cgpatii++;
							if ($idivisao=='ditel' or $idivisao=='dicel'  or $idivisao=='difel'   or $idivisao=='dipeq' or $idivisao=='diciv') $rprovidos_direta_cgpatiii++;
							if ($idivisao=='dimat' or $idivisao=='dimec'  or $idivisao=='ditem'   or $idivisao=='dinec' or $idivisao=='dimut') $rprovidos_direta_cgpativ++;

						}
					}
					if ($decisao=='recurso negado' or $decisao=='recurso 111' or $decisao=='recurso manutencao do indeferimento 111')	{
						$rnegados[$idivisao]++;
						$rnegados['dirpa']++;
						if ($idivisao=='ditex' or $idivisao=='difari' or $idivisao=='difarii' or $idivisao=='dipol' or $idivisao=='dinor') $rnegados_cgpati++;
						if ($idivisao=='dialp' or $idivisao=='dibio'  or $idivisao=='dimol'   or $idivisao=='dipaq' or $idivisao=='dipae') $rnegados_cgpatii++;
						if ($idivisao=='ditel' or $idivisao=='dicel'  or $idivisao=='difel'   or $idivisao=='dipeq' or $idivisao=='diciv') $rnegados_cgpatiii++;
						if ($idivisao=='dimat' or $idivisao=='dimec'  or $idivisao=='ditem'   or $idivisao=='dinec' or $idivisao=='dimut') $rnegados_cgpativ++;

						if ($decisao_direta == 1){
							$rnegados_direta[$idivisao]++;
							$rnegados_direta['dirpa']++;
							if ($idivisao=='ditex' or $idivisao=='difari' or $idivisao=='difarii' or $idivisao=='dipol' or $idivisao=='dinor') $rnegados_direta_cgpati++;
							if ($idivisao=='dialp' or $idivisao=='dibio'  or $idivisao=='dimol'   or $idivisao=='dipaq' or $idivisao=='dipae') $rnegados_direta_cgpatii++;
							if ($idivisao=='ditel' or $idivisao=='dicel'  or $idivisao=='difel'   or $idivisao=='dipeq' or $idivisao=='diciv') $rnegados_direta_cgpatiii++;
							if ($idivisao=='dimat' or $idivisao=='dimec'  or $idivisao=='ditem'   or $idivisao=='dinec' or $idivisao=='dimut') $rnegados_direta_cgpativ++;
						}
					}

					$rtotal[$idivisao]++;
					$rtotal['dirpa']++;
					if ($decisao_direta == 1){
						$rtotal_direta[$idivisao]++;
						$rtotal_direta['dirpa']++;

						if ($idivisao=='ditex' or $idivisao=='difari' or $idivisao=='difarii' or $idivisao=='dipol' or $idivisao=='dinor') $rtotal_direta_cgpati++;
						if ($idivisao=='dialp' or $idivisao=='dibio'  or $idivisao=='dimol'   or $idivisao=='dipaq' or $idivisao=='dipae') $rtotal_direta_cgpatii++;
						if ($idivisao=='ditel' or $idivisao=='dicel'  or $idivisao=='difel'   or $idivisao=='dipeq' or $idivisao=='diciv') $rtotal_direta_cgpatiii++;
						if ($idivisao=='dimat' or $idivisao=='dimec'  or $idivisao=='ditem'   or $idivisao=='dinec' or $idivisao=='dimut') $rtotal_direta_cgpativ++;

					}
				}
			}
			$total = 0;
			$total_direta = 0;
			foreach ($divisoes1 as $kdivisao)
			{
				//echo $divisao_complemento[$kdivisao].":<BR>";
				//echo "Total decisões: ".$rtotal[$kdivisao].", providos: ".$rprovidos[$kdivisao].", negados: ".$rnegados[$kdivisao]."<BR>";
				//echo "Total decisões: ".$rtotal_direta[$kdivisao].", providos: ".$rprovidos_direta[$kdivisao].", negados: ".$rnegados_direta[$kdivisao]."<BR>";
				$total = $total + $rtotal[$kdivisao];
				$total_direta = $total_direta + $rtotal_direta[$kdivisao];
				$jdivisao = strtoupper($kdivisao);
				echo "update cgrec set param1='".$rprovidos[$kdivisao]."',param2='".$rnegados[$kdivisao]."',param3='".$rprovidos_direta[$kdivisao]."',param4='".$rnegados_direta[$kdivisao]."' where tipo='cgrecprov' and year(data)=$ano and month(data)=$mes and divisao='$jdivisao';<BR>";
			}
			echo "update cgrec set param1='".$rprovidos['dirpa']."',param2='".$rnegados['dirpa']."',param3='".$rprovidos_direta['dirpa']."',param4='".$rnegados_direta['dirpa']."' where tipo='cgrecprov' and year(data)=$ano and month(data)=$mes and divisao='DIRPA';<BR>";
			echo "update cgrec set param1='".$rprovidos_cgpati."',param2='".$rnegados_cgpati."',param3='".$rprovidos_direta_cgpati."',param4='".$rnegados_direta_cgpati."' where tipo='cgrecprov' and year(data)=$ano and month(data)=$mes and divisao='CGPATI';<BR>";
			echo "update cgrec set param1='".$rprovidos_cgpatii."',param2='".$rnegados_cgpatii."',param3='".$rprovidos_direta_cgpatii."',param4='".$rnegados_direta_cgpatii."' where tipo='cgrecprov' and year(data)=$ano and month(data)=$mes and divisao='CGPATII';<BR>";
			echo "update cgrec set param1='".$rprovidos_cgpatiii."',param2='".$rnegados_cgpatiii."',param3='".$rprovidos_direta_cgpatiii."',param4='".$rnegados_direta_cgpatiii."' where tipo='cgrecprov' and year(data)=$ano and month(data)=$mes and divisao='CGPATIII';<BR>";
			echo "update cgrec set param1='".$rprovidos_cgpativ."',param2='".$rnegados_cgpativ."',param3='".$rprovidos_direta_cgpativ."',param4='".$rnegados_direta_cgpativ."' where tipo='cgrecprov' and year(data)=$ano and month(data)=$mes and divisao='CGPATIV';<BR>";

			}
			//echo "Dados de $ano: Total decisões: $recursos_total, providos: $recurso_providos, negados: $recurso_negados<BR>";
			//echo "Total decisões Diretas: $recursos_total_direta, providos: $recurso_providos_direta, negados: $recurso_negados_direta<BR>";

			echo "Total: $total, $recursos_total<BR>";
			echo "Total Direta: $total_direta, $recursos_total_direta<BR>";
			exit();

		}

		if ($op==40) // http://localhost/central/control.php?action=115&op=40&ano=2021 calcula nulidades
		{			 // http://cientistaspatentes/central/control.php?action=115&op=40&ano=2024

				$numeros_lidos = array();
				for ($k=0;$k<=$i;$k++) $numeros_lidos[$k]="";
				$i=0;

				$total=0;$nulidade_providas=0;$nulidade_negadas=0;$nulidade_pendentes=0;$nulidade_outros=0;$nulidade_intermediarios=0;

				/*
				$cmd = "select * from arquivados where despacho='17.1' and year(data)=$ano";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$idivisao="";
					$cmd2 = "select * from pedido where numero='$numero' and decisao in ('deferimento','defanvisa')";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
						$idivisao = $line2['divisao'];
					else
					{
						if (identificado_mu($numero))
							$idivisao='dimut';
						else
						{
							$cmd2 = "SELECT * FROM classes where numero='$numero'";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$classificacao = $line2['descricao'];
								$symbol = trim(ler_symbol($classificacao));
								$idivisao = ler_divisao($link,$classificacao);
							}
						}
					}
					//echo "$idivisao $numero<BR>";exit();
					if ($divisao=="dirpa" or $divisao=="" or $divisao==$idivisao) $total++;
				}
				*/

				/*
				$cmd = "select * from pedido where decisao in ('nulidade 216','nulidade 218') and year(rpi)=$ano";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$idivisao="";
					$cmd2 = "select * from pedido where numero='$numero' and decisao in ('deferimento','defanvisa')";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
						$idivisao = $line2['divisao'];
					else
					{
						if (identificado_mu($numero))
							$idivisao='dimut';
						else
						{
							$cmd2 = "SELECT * FROM classes where numero='$numero'";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$classificacao = $line2['descricao'];
								$symbol = trim(ler_symbol($classificacao));
								$idivisao = ler_divisao($link,$classificacao);
							}
						}
					}
					if ($divisao=="dirpa" or $divisao=="" or $divisao==$idivisao) $nulidade_outros++;
				}
				*/

				///http://localhost/teste.php?action=115&op=40&ano=2020
				$nulidade_providas = array();
				$nulidade_negadas = array();
				$divisoes1 = array ('dirpa', 'ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut');
				foreach ($divisoes1 as $kdivisao){
					$nulidade_providas[$kdivisao] = 0;
					$nulidade_providas[$kdivisao] = 0;
				}
				$nulidade_providas_cgpati=0;$nulidade_negadas_cgpati=0;
				$nulidade_providas_cgpatii=0;$nulidade_negadas_cgpatii=0;
				$nulidade_providas_cgpatiii=0;$nulidade_negadas_cgpatiii=0;
				$nulidade_providas_cgpativ=0;$nulidade_negadas_cgpativ=0;$total1=1;

				$i=0;
				$cmd = "select * from pedido where decisao in ('nulidade provida','nulidade negada','nulidade parcial','nulidade 200','nulidade 201','nulidade 204') and year(rpi)=$ano";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$decisao = $line['decisao'];
					if (!in_array($numero,$numeros_lidos))
					{
						$numeros_lidos[$i++]=$numero;

						$idivisao="";
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

						$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('deferimento','defanvisa')";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
							$idivisao = $line2['divisao'];
						else
						{
							if (identificado_mu($numero))
								$idivisao='dimut';
							else
							{
								$cmd2 = "SELECT * FROM classes where numero='$numero'";
								$res2 = mysqli_query($link,$cmd2);
								if ($line2=@mysqli_fetch_assoc($res2))
								{
									$classificacao = $line2['descricao'];
									$symbol = trim(ler_symbol($classificacao));
									$idivisao = ler_divisao($link,$classificacao);
								}
							}
						}
						if ($numero=='PI0521063') $idivisao='dipae';
						if ($numero=='PI9300188') $idivisao='ditem';
						if ($numero=='122016004370') $idivisao='dialp';
						if ($idivisao<>"")
						{
							if ($decisao=='nulidade provida' or $decisao=='nulidade 200' or $decisao=='nulidade parcial' or $decisao=='nulidade 204')
							{
								//echo "$total1 $numero $idivisao<BR>";$total1++;
								$nulidade_providas[$idivisao]++;
								$nulidade_providas['dirpa']++;
								if ($idivisao=='ditex' or $idivisao=='difari' or $idivisao=='difarii' or $idivisao=='dipol' or $idivisao=='dinor') $nulidade_providas_cgpati++;
								if ($idivisao=='dialp' or $idivisao=='dibio'  or $idivisao=='dimol'   or $idivisao=='dipaq' or $idivisao=='dipae') $nulidade_providas_cgpatii++;
								if ($idivisao=='ditel' or $idivisao=='dicel'  or $idivisao=='difel'   or $idivisao=='dipeq' or $idivisao=='diciv') $nulidade_providas_cgpatiii++;
								if ($idivisao=='dimat' or $idivisao=='dimec'  or $idivisao=='ditem'   or $idivisao=='dinec' or $idivisao=='dimut') $nulidade_providas_cgpativ++;
							}
							if ($decisao=='nulidade negada' or $decisao=='nulidade 201')
							{
								$nulidade_negadas[$idivisao]++;
								$nulidade_negadas['dirpa']++;
								if ($idivisao=='ditex' or $idivisao=='difari' or $idivisao=='difarii' or $idivisao=='dipol' or $idivisao=='dinor') $nulidade_negadas_cgpati++;
								if ($idivisao=='dialp' or $idivisao=='dibio'  or $idivisao=='dimol'   or $idivisao=='dipaq' or $idivisao=='dipae') $nulidade_negadas_cgpatii++;
								if ($idivisao=='ditel' or $idivisao=='dicel'  or $idivisao=='difel'   or $idivisao=='dipeq' or $idivisao=='diciv') $nulidade_negadas_cgpatiii++;
								if ($idivisao=='dimat' or $idivisao=='dimec'  or $idivisao=='ditem'   or $idivisao=='dinec' or $idivisao=='dimut') $nulidade_negadas_cgpativ++;
							}
						} else
							echo "$numero divisao vazia<BR>";
					}
				}


				foreach ($divisoes1 as $kdivisao)
				{
					$jdivisao = strtoupper($kdivisao);
					echo "update cgrec set param5='".$nulidade_providas[$kdivisao]."', param6='".$nulidade_negadas[$kdivisao]."' where tipo='cgrecprov' and year(data)=$ano and month(data)=1 and divisao='$jdivisao';<BR>";
				}
				echo "update cgrec set param5='".$nulidade_providas_cgpati."', param6='".$nulidade_negadas_cgpati."' where tipo='cgrecprov' and year(data)=$ano and month(data)=1 and divisao='CGPATI';<BR>";
				echo "update cgrec set param5='".$nulidade_providas_cgpatii."', param6='".$nulidade_negadas_cgpatii."' where tipo='cgrecprov' and year(data)=$ano and month(data)=1 and divisao='CGPATII';<BR>";
				echo "update cgrec set param5='".$nulidade_providas_cgpatiii."', param6='".$nulidade_negadas_cgpatiii."' where tipo='cgrecprov' and year(data)=$ano and month(data)=1 and divisao='CGPATIII';<BR>";
				echo "update cgrec set param5='".$nulidade_providas_cgpativ."', param6='".$nulidade_negadas_cgpativ."' where tipo='cgrecprov' and year(data)=$ano and month(data)=1 and divisao='CGPATIV';<BR>";
				echo "Fim processamento";
				exit();

				/*
				$cmd = "select * from pedido where decisao in ('nulidade 1') and year(rpi)=$ano";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$decisao = $line['decisao'];
					if (!in_array($numero,$numeros_lidos))
					{
						$numeros_lidos[$i++]=$numero;
						$idivisao="";
						$cmd2 = "select * from pedido where numero='$numero' and decisao in ('deferimento','defanvisa')";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
							$idivisao = $line2['divisao'];
						else
						{
							if (identificado_mu($numero))
								$idivisao='dimut';
							else
							{
								$cmd2 = "SELECT * FROM classes where numero='$numero'";
								$res2 = mysqli_query($link,$cmd2);
								if ($line2=@mysqli_fetch_assoc($res2))
								{
									$classificacao = $line2['descricao'];
									$symbol = trim(ler_symbol($classificacao));
									$idivisao = ler_divisao($link,$classificacao);
								}
							}
						}
						if ($divisao=="dirpa" or $divisao=="" or $divisao==$idivisao) $nulidade_intermediarios++;
					}
				}
				*/

				if ($divisao=="") $divisao='dirpa';
				$total = $nulidade_providas+$nulidade_negadas+$nulidade_parcial+$nulidade_prejudicados+$nulidade_intermediarios;
				$cmd2 = "INSERT INTO cgrec_estat (tipo,divisao,ano,total,outros,prejudicados,intermediarios,providos,negados,pendentes) VALUES (100,'$divisao','$ano','$total','$nulidade_outros','$nulidade_prejudicados','$nulidade_intermediarios','$nulidade_providas','$nulidade_negadas','$nulidade_pendentes')";
				$res2 = mysqli_query($link,$cmd2);
				//echo "$cmd2;<BR>";
				echo "$ano;$total;$nulidade_outros;$nulidade_prejudicados;$nulidade_intermediarios;$nulidade_providas;$nulidade_negadas;$nulidade_pendentes<BR>";

			echo "fim do processamento";
			exit();
		}

		if ($op==7) // https://cientistaspatentes.com.br/central/control.php?action=115&op=7&ano=2024
		{

			$i=0;
			for ($ano2=2020;$ano2<=2020;$ano2++)
			{
				$divisoes2 = array ('dirpa','ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut');

				$numeros_lidos = array();
				for ($k=0;$k<=$i;$k++) $numeros_lidos[$k]="";
				$i=0;

				$total=0;$nulidades_providas=0;$nulidades_negadas=0;$nulidades_parciais=0;$nulidades_prejudicadas=0;$nulidades_pendentes=0;$nulidades_intermediarias=0;
				$total_array = array();
				$nulidades_prejudicadas_array = array();
				$nulidades_providas_array = array();
				$nulidades_negadas_array = array();
				$nulidades_parciais_array = array();
				$nulidades_intermediarias_array = array();
				$nulidades_pendentes_array = array();
				foreach ($divisoes2 as $idivisao)
				{
					$total_array[$idivisao]=0;
					$nulidades_prejudicadas_array[$idivisao]=0;
					$nulidades_providas_array[$idivisao]=0;
					$nulidades_negadas_array[$idivisao]=0;
					$nulidades_parciais_array[$idivisao]=0;
					$nulidades_intermediarias_array[$idivisao]=0;
					$nulidades_pendentes_array[$idivisao]=0;
				}

				$cmd = "select * from arquivados where despacho='17.1' and year(data)=$ano";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$numero_br = $numero;
					if (strlen($numero)==12) $numero_br = "BR$numero";

					$anulado = $line['anulado'];
					$data171 = $line['data'];
					$data = $data171;
					$numero1 = $numero;
					$numero2 = $numero;
					$cmd2 = "SELECT * FROM pimupi where numero1='$numero' or numero2='$numero'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$numero1 = $line2["numero1"];
						$numero2 = $line2["numero2"];
					}
					$idivisao="";
					$cmd2 = "select * from pedido where numero='$numero' and decisao in ('deferimento','defanvisa')";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
						$idivisao = $line2['divisao'];
					else
					{
						if (identificado_mu($numero))
							$idivisao='dimut';
						else
						{
							$cmd2 = "SELECT * FROM classes where numero='$numero'";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$classificacao = $line2['descricao'];
								$symbol = trim(ler_symbol($classificacao));
								$idivisao = ler_divisao($link,$classificacao);
							}
						}
					}
					if ($idivisao=='dipem') $idivisao='diciv';
					//echo "$idivisao $numero<BR>";//exit();
					$total++;
					@$total_array[$idivisao]++;
					$total_array['dirpa']++;

					$data_sobrestamento = null;
					$sobrestamento = 0;
					$cmd2 = "select * from pedido where decisao in ('nulidade 211') and (numero='$numero1' or numero='$numero2') and rpi>'$data171' and rpi<='2024-12-31'";
					$res2 = mysqli_query($link,$cmd2);//echo "$cmd2<BR>";
					if ($line2=@mysqli_fetch_assoc($res2)) 
					{
						$sobrestamento = 1;
						$data_sobrestamento = $line2['rpi'];
					}

					$cmd2 = "select * from pedido where decisao in ('nulidade 212') and (numero='$numero1' or numero='$numero2') and rpi>'$data171' and rpi<='2024-12-31'";
					$res2 = mysqli_query($link,$cmd2);//echo "$cmd2<BR>";
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$decisao = $line2['decisao'];
						$data = $line2['rpi'];
						$nulidades_prejudicadas++;
						@$nulidades_prejudicadas_array[$idivisao]++;
						$nulidades_prejudicadas_array['dirpa']++;
						if ($sobrestamento==1 and $data_sobrestamento>=$data)
							echo "$numero_br;$idivisao;$decisao;$data;prejudicadas;17.1;$data171;sobrestamento<BR>";
						else
							echo "$numero_br;$idivisao;$decisao;$data;prejudicadas;17.1;$data171;<BR>";
					}
					else
					{
						if ($anulado>0)
						{
							$decisao='17.1 anulado';
							$cmd2 = "SELECT * FROM rpis_lidas where rpi='$anulado'";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2)) $data = $line2['data'];
							$nulidades_prejudicadas++;
							@$nulidades_prejudicadas_array[$idivisao]++;
							$nulidades_prejudicadas_array['dirpa']++;
							if ($sobrestamento==1 and $data_sobrestamento>=$data)
								echo "$numero_br;$idivisao;$decisao;$data;prejudicadas;17.1;$data171;sobrestamento<BR>";
							else
								echo "$numero_br;$idivisao;$decisao;$data;prejudicadas;17.1;$data171;<BR>";
						}
						else
						{

							$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('nulidade provida','nulidade negada','nulidade parcial','nulidade 200','nulidade 201','nulidade 204') and rpi>'$data171' and rpi<='2024-12-31'";
							$res2 = mysqli_query($link,$cmd2);//echo "$cmd2<BR>";
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$data = $line2['rpi'];
								$decisao = $line2['decisao'];
								if ($decisao=='nulidade provida' or $decisao=='nulidade 200')
								{
									@$nulidades_providas_array[$idivisao]++;
									$nulidades_providas_array['dirpa']++;
									if ($sobrestamento==1 and $data_sobrestamento>=$data)
										echo "$numero_br;$idivisao;$decisao;$data;provida;17.1;$data171;sobrestamento<BR>";
									else
										echo "$numero_br;$idivisao;$decisao;$data;provida;17.1;$data171;<BR>";
								}
								if ($decisao=='nulidade negada' or $decisao=='nulidade 201')
								{
									@$nulidades_negadas_array[$idivisao]++;
									$nulidades_negadas_array['dirpa']++;
									if ($sobrestamento==1 and $data_sobrestamento>=$data)
										echo "$numero_br;$idivisao;$decisao;$data;negada;17.1;$data171;sobrestamento<BR>";
									else
										echo "$numero_br;$idivisao;$decisao;$data;negada;17.1;$data171;<BR>";
								}
								if ($decisao=='nulidade parcial' or $decisao=='nulidade 204')
								{
									@$nulidades_parciais_array[$idivisao]++;
									$nulidades_parciais_array['dirpa']++;
									if ($sobrestamento==1 and $data_sobrestamento>=$data)
										echo "$numero_br;$idivisao;$decisao;$data;parcial;17.1;$data171;sobrestamento<BR>";
									else
										echo "$numero_br;$idivisao;$decisao;$data;parcial;17.1;$data171;<BR>";
								}
							}
							else
							{
								$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('nulidade 1') and rpi>'$data171' and rpi<='2024-12-31'";
								$res2 = mysqli_query($link,$cmd2);//echo "$cmd2<BR>";
								if ($line2=@mysqli_fetch_assoc($res2))
								{
									$nulidades_intermediarias++;
									$data = $line2['rpi'];
									@$nulidades_intermediarias_array[$idivisao]++;
									$nulidades_intermediarias_array['dirpa']++;
									if ($sobrestamento==1 and $data_sobrestamento>=$data)
										echo "$numero_br;$idivisao;nulidade 1;$data;intermediarias;17.1;$data171;sobrestamento<BR>";
									else
										echo "$numero_br;$idivisao;nulidade 1;$data;intermediarias;17.1;$data171;<BR>";
								}
								else
								{
									$nulidades_pendentes++;
									@$nulidades_pendentes_array[$idivisao]++;
									$nulidades_pendentes_array['dirpa']++;
									if ($sobrestamento==1 and $data_sobrestamento>=$data)
										echo "$numero_br;$idivisao;pendente;;pendente;17.1;$data171;sobrestamento<BR>";
									else
										echo "$numero_br;$idivisao;pendente;;pendente;17.1;$data171;<BR>";
								}
							}
						}
					}
				}

				foreach ($divisoes2 as $idivisao)
				{
					$divisao = $idivisao;
					$total = $total_array[$idivisao];
					$outros = $nulidades_parciais_array[$idivisao];
					$prejudicados = $nulidades_prejudicadas_array[$idivisao];
					$anulados = $nulidades_anuladas_array[$idivisao];
					$intermediarios = $nulidades_intermediarias_array[$idivisao];
					$providos = $nulidades_providas_array[$idivisao];
					$negados = $nulidades_negadas_array[$idivisao];
					$pendentes = $nulidades_pendentes_array[$idivisao];
					$cmd2 = "INSERT INTO cgrec_estat (tipo,divisao,ano,total,outros,prejudicados,anulados,intermediarios,providos,negados,pendentes) VALUES (7,'$divisao','$ano','$total','$outros','$prejudicados','$anulados','$intermediarios','$providos','$negados','$pendentes')";
					echo "$cmd2;<BR>";
				}

				foreach ($divisoes2 as $idivisao)
				{
					$divisao = $idivisao;
					$total = $total_array[$idivisao];
					$outros = $nulidades_parciais_array[$idivisao];
					$prejudicados = $nulidades_prejudicadas_array[$idivisao];
					$anulados = $nulidades_anuladas_array[$idivisao];
					$intermediarios = $nulidades_intermediarias_array[$idivisao];
					$providos = $nulidades_providas_array[$idivisao];
					$negados = $nulidades_negadas_array[$idivisao];
					$pendentes = $nulidades_pendentes_array[$idivisao];
					$recurso_pendentes_array[$idivisao]=0;
					//echo "$idivisao;$ano;$total;$outros;$prejudicados;$anulados;$intermediarios;$providos;$negados;$pendentes<BR>";
				}
			}
			echo "fim do processamento";
			exit();
		} // ###

		if ($op==4) // http://localhost/central/control.php?action=115&op=4&ano=2021
		{			// http://cientistaspatentes.com.br/central/control.php?action=115&op=4&ano=2024
					// Estes dados contabilizam o numero de recursos providos, negados, etc e publicados a cada ano. 
					// A divisão é determinada pela divisão que cadastrou o 9.2
					// Fazer para todas as divisoes e para dirpa (nao use divisao) dura 3 minutos cada divisão
			$i=0;
			for ($ano2=2020;$ano2<=2020;$ano2++)
			{
				$divisoes2 = array ('dirpa','ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut');

				$numeros_lidos = array();
				for ($k=0;$k<=$i;$k++) $numeros_lidos[$k]="";
				$i=0;

				$total=0;$recurso_providos=0;$recurso_negados=0;$recurso_prejudicados=0;$recurso_pendentes=0;$recurso_outros=0;$recurso_intermediarios=0;

				$total_array = array();
				foreach ($divisoes2 as $idivisao) $total_array[$idivisao]=0;
				$cmd = "select * from arquivados where despacho='12.2' and year(data)=$ano";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$data = $line['data'];
					$idivisao="";
					$cmd2 = "select * from pedido where numero='$numero' and decisao in ('indeferimento','9.2')";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
						$idivisao = $line2['divisao'];
					else
					{
						if (identificado_mu($numero))
							$idivisao='dimut';
						else
						{
							$cmd2 = "SELECT * FROM classes where numero='$numero'";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$classificacao = $line2['descricao'];
								$symbol = trim(ler_symbol($classificacao));
								$idivisao = ler_divisao($link,$classificacao);
							}
						}
					}
					//echo "$idivisao $numero<BR>";exit();
					if ($idivisao=='dipem') $idivisao='diciv';
					if ($divisao=="dirpa" or $divisao=="" or $divisao==$idivisao) $total++;
					echo "$numero,$idivisao;12.2;total;$data<BR>";
					if ($idivisao=='')
					{
						//echo "$numero divisao vazia<BR>";
					}
					else
					{
						@$total_array[$idivisao]++;
						$total_array['dirpa']++;
					}
				}

				$recurso_outros_array = array();
				foreach ($divisoes2 as $idivisao) $recurso_outros_array[$idivisao]=0;
				$cmd = "select * from pedido where decisao in ('recurso 131','recurso 135','recurso 136','recurso 137','recurso 138','recurso 139','recurso 140') and year(rpi)=$ano";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$decisao = $line['decisao'];
					$data = $line['rpi'];
					$idivisao="";
					$cmd2 = "select * from pedido where numero='$numero' and decisao in ('indeferimento','9.2')";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
						$idivisao = $line2['divisao'];
					else
					{
						if (identificado_mu($numero))
							$idivisao='dimut';
						else
						{
							$cmd2 = "SELECT * FROM classes where numero='$numero'";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$classificacao = $line2['descricao'];
								$symbol = trim(ler_symbol($classificacao));
								$idivisao = ler_divisao($link,$classificacao);
							}
						}
					}
					if ($idivisao=='dipem') $idivisao='diciv';
					if ($divisao=="dirpa" or $divisao=="" or $divisao==$idivisao) $recurso_outros++;
					echo "$numero,$idivisao;$decisao;outros;$data<BR>";
					if ($idivisao=='')
					{
						//echo "$numero divisao vazia<BR>";
					}
					else
					{
						//echo "$numero $idivisao<BR>";
						@$recurso_outros_array[$idivisao]++;
						$recurso_outros_array['dirpa']++;
					}
				}

				$recurso_prejudicados_array = array();
				foreach ($divisoes2 as $idivisao) $recurso_prejudicados_array[$idivisao]=0;
				$cmd = "select * from pedido where decisao in ('recurso 130') and year(rpi)=$ano";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$decisao = $line['decisao'];
					$data = $line['rpi'];
					$idivisao="";
					$cmd2 = "select * from pedido where numero='$numero' and decisao in ('indeferimento','9.2')";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
						$idivisao = $line2['divisao'];
					else
					{
						if (identificado_mu($numero))
							$idivisao='dimut';
						else
						{
							$cmd2 = "SELECT * FROM classes where numero='$numero'";
							$res2 = mysqli_query($link,$cmd2);
							if ($line2=@mysqli_fetch_assoc($res2))
							{
								$classificacao = $line2['descricao'];
								$symbol = trim(ler_symbol($classificacao));
								$idivisao = ler_divisao($link,$classificacao);
							}
						}
					}
					if ($idivisao=='dipem') $idivisao='diciv';
					if ($divisao=="dirpa" or $divisao=="" or $divisao==$idivisao) $recurso_prejudicados++;
					echo "$numero,$idivisao;$decisao;prejudicados;$data<BR>";
					if ($idivisao=='')
					{
						//echo "$numero divisao vazia<BR>";
					}
					else
					{
						//echo "$numero $idivisao<BR>";
						@$recurso_prejudicados_array[$idivisao]++;
						$recurso_prejudicados_array['dirpa']++;
					}
				}

				$recurso_providos_array = array();
				$recurso_negados_array = array();
				foreach ($divisoes2 as $idivisao) 
				{
					$recurso_providos_array[$idivisao]=0;
					$recurso_negados_array[$idivisao]=0;
				}
				$cmd = "select * from pedido where decisao in ('recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 1001','recurso provido-reforma 100.1','recurso 1002','recurso provido-reforma 100.2','recurso provido-devolucao 100.2','recurso 111') and year(rpi)=$ano";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$decisao = $line['decisao'];
					$data = $line['rpi'];
					if (!in_array($numero,$numeros_lidos))
					{
						$numeros_lidos[$i++]=$numero;

						$idivisao="";
						$cmd2 = "select * from pedido where numero='$numero' and decisao in ('indeferimento','9.2')";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
							$idivisao = $line2['divisao'];
						else
						{
							if (identificado_mu($numero))
								$idivisao='dimut';
							else
							{
								$cmd2 = "SELECT * FROM classes where numero='$numero'";
								$res2 = mysqli_query($link,$cmd2);
								if ($line2=@mysqli_fetch_assoc($res2))
								{
									$classificacao = $line2['descricao'];
									$symbol = trim(ler_symbol($classificacao));
									$idivisao = ler_divisao($link,$classificacao);
								}
							}
						}
						if ($idivisao=='dipem') $idivisao='diciv';
						if ($divisao=="dirpa" or $divisao=="" or $divisao==$idivisao)
						{
							if ($decisao=='recurso provido' or $decisao=='recurso 100' or $decisao=='recurso 1001' or $decisao=='recurso provido-reforma 100.1' or $decisao=='recurso 1002' or $decisao=='recurso provido-reforma 100.2' or $decisao=='recurso provido-devolucao 100.2')
							{
								$recurso_providos++;
							}
							if ($decisao=='recurso negado' or $decisao=='recurso 111' or $decisao=='recurso manutencao do indeferimento 111')
							{
								$recurso_negados++;
							}
						}

						if ($idivisao=='')
						{
							//echo "$numero divisao vazia<BR>";
							if ($decisao=='recurso provido' or $decisao=='recurso 100' or $decisao=='recurso 1001' or $decisao=='recurso provido-reforma 100.1' or $decisao=='recurso 1002' or $decisao=='recurso provido-reforma 100.2' or $decisao=='recurso provido-devolucao 100.2')
								echo "$numero,$idivisao;$decisao;providos;$data<BR>";
							if ($decisao=='recurso negado' or $decisao=='recurso 111' or $decisao=='recurso manutencao do indeferimento 111')
								echo "$numero,$idivisao;$decisao;negados;$data<BR>";
						}
						else
						{
							//echo "$numero $idivisao<BR>";
							if ($decisao=='recurso provido' or $decisao=='recurso 100' or $decisao=='recurso 1001' or $decisao=='recurso provido-reforma 100.1' or $decisao=='recurso 1002' or $decisao=='recurso provido-reforma 100.2' or $decisao=='recurso provido-devolucao 100.2')
							{
								echo "$numero,$idivisao;$decisao;providos;$data<BR>";
								@$recurso_providos_array[$idivisao]++;
								$recurso_providos_array['dirpa']++;
							}
							if ($decisao=='recurso negado' or $decisao=='recurso 111' or $decisao=='recurso manutencao do indeferimento 111')
							{
								echo "$numero,$idivisao;$decisao;negados;$data<BR>";
								@$recurso_negados_array[$idivisao]++;
								$recurso_negados_array['dirpa']++;
							}
						}
					}
				}

				$recurso_intermediarios_array = array();
				foreach ($divisoes2 as $idivisao) $recurso_intermediarios_array[$idivisao]=0;
				$cmd = "select * from pedido where decisao in ('recurso exigencia','recurso exigencia 121','recurso ciencia') and year(rpi)=$ano";
				$res = mysqli_query($link,$cmd);
				while ($line=@mysqli_fetch_assoc($res))
				{
					$numero = $line['numero'];
					$data = $line['rpi'];
					$decisao = $line['decisao'];
					if (!in_array($numero,$numeros_lidos))
					{
						$numeros_lidos[$i++]=$numero;
						$idivisao="";
						$cmd2 = "select * from pedido where numero='$numero' and decisao in ('indeferimento','9.2')";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
							$idivisao = $line2['divisao'];
						else
						{
							if (identificado_mu($numero))
								$idivisao='dimut';
							else
							{
								$cmd2 = "SELECT * FROM classes where numero='$numero'";
								$res2 = mysqli_query($link,$cmd2);
								if ($line2=@mysqli_fetch_assoc($res2))
								{
									$classificacao = $line2['descricao'];
									$symbol = trim(ler_symbol($classificacao));
									$idivisao = ler_divisao($link,$classificacao);
								}
							}
						}
						if ($idivisao=='dipem') $idivisao='diciv';
						if ($divisao=="dirpa" or $divisao=="" or $divisao==$idivisao) $recurso_intermediarios++;
						echo "$numero,$idivisao;$decisao;intermediários;$data<BR>";
						if ($idivisao=='')
						{
							//echo "$numero divisao vazia<BR>";
						}
						else
						{
							//echo "$numero $idivisao<BR>";
							@$recurso_intermediarios_array[$idivisao]++;
							$recurso_intermediarios_array['dirpa']++;
						}
					}
				}

				if ($divisao=="") $divisao='dirpa';
				//$total = $recurso_providos+$recurso_negados+$recurso_prejudicados+$recurso_intermediarios;
				$cmd2 = "INSERT INTO cgrec_estat (tipo,divisao,ano,total,outros,prejudicados,intermediarios,providos,negados,pendentes) VALUES (1,'$divisao','$ano','$total','$recurso_outros','$recurso_prejudicados','$recurso_intermediarios','$recurso_providos','$recurso_negados','$recurso_pendentes')";
				//$res2 = mysqli_query($link,$cmd2);
				//echo "$cmd2;<BR>";
				//echo "$divisao;$ano;$total;$recurso_outros;$recurso_prejudicados;$recurso_intermediarios;$recurso_providos;$recurso_negados;$recurso_pendentes<BR>";
				foreach ($divisoes2 as $idivisao)
				{
					$recurso_pendentes_array[$idivisao]=0;
					//echo "$idivisao;$ano;$total_array[$idivisao];$recurso_outros_array[$idivisao];$recurso_prejudicados_array[$idivisao];$recurso_intermediarios_array[$idivisao];$recurso_providos_array[$idivisao];$recurso_negados_array[$idivisao];$recurso_pendentes_array[$idivisao]<BR>";
					echo "INSERT INTO cgrec_estat (tipo,divisao,ano,total,outros,prejudicados,intermediarios,providos,negados,pendentes) VALUES (1,'$idivisao','$ano','$total_array[$idivisao]','$recurso_outros_array[$idivisao]','$recurso_prejudicados_array[$idivisao]','$recurso_intermediarios_array[$idivisao]','$recurso_providos_array[$idivisao]','$recurso_negados_array[$idivisao]','$recurso_pendentes_array[$idivisao]');<BR>";
				}
			}
			echo "Fim do processamento";
			exit();
		} 
		

		if ($op==3) // http://localhost/central/control.php?action=115&op=3&tipo=1
					// rode op==4 para popular tabela cgrec_estat com tipo=1, ou seja, dados de 12.2, para todos os anos de 2021 a 2021
					// http://localhost/central/control.php?action=115&op=4&ano=2012 (acima)
					// rode op=5 para popular tabela cgrec_estat com tipo=5, ou seja, dados de 12.3, para todos os anos de 2012 a 2021
					// http://localhost/central/control.php?action=115&op=5&ano=2012
					// rode op=6 para popular tabela cgrec_estat com tipo=6, ou seja, dados de 12.6, para todos os anos de 2012 a 2021
					// http://localhost/central/control.php?action=115&op=6&ano=2012
					// rode op=7 para popular tabela cgrec_estat com tipo=7, ou seja, dados de 17.1, para todos os anos de 2012 a 2021 (procure por "insert into cgrec_estat" neste arquivo control.php)
					// http://localhost/central/control.php?action=115&op=7&ano=2012

					// http://localhost/central/control.php?action=115&op=3&tipo=1 (para calculos do 12.2), tipo=5 (para 12.3), tipo=6 (para 12.6), tipo=7 (para 17.1) para gerar os arquivos cgrec.htm com os dados da tabela cgrec_estat
					// inseridos os dados na tabela cgrec_estat (op=4, op=5, op=6, op=7) e gerado cgrec1.htm (tipo=1), cgrec5.htm (tipo=5), cgrec6.htm (tipo=6), cgrec7.htm (tipo=7) e então rodar sinergias/estoque8.php 
				
		{			
			$anofinal = 2024;
			if ($tipo==1) $fname = "../sinergias/cgrec1.htm"; // usado em estoque8.php
			if ($tipo==5) $fname = "../sinergias/cgrec5.htm"; // usado em estoque8.php
			if ($tipo==6) $fname = "../sinergias/cgrec6.htm"; // usado em estoque8.php
			if ($tipo==7) $fname = "../sinergias/cgrec7.htm"; // usado em estoque8.php
			@ $fpw = fopen($fname,"w");
			if (!$fpw)
				echo "Não foi identificado o arquivo texto $fname";
			else
			{
				$divisoes1 = array ('dirpa', 'ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut');

				foreach ($divisoes1 as $divisao)
				{
					if (($tipo==5 or $tipo==6) and $divisao<>'dirpa') continue; // para 12.3 e 12.6 não faça cálculo por divisão
					
					$zdivisao = strtoupper($divisao);

					if ($divisao=='ditex' or $divisao=='difari' or $divisao=='difarii' or $divisao=='dipol' or $divisao=='dinor')
						$udivisao = "CGPAT I / $zdivisao";
					elseif ($divisao=='dialp' or $divisao=='dibio' or $divisao=='dimol' or $divisao=='dipaq' or $divisao=='dipae')
						$udivisao = "CGPAT II / $zdivisao";
					elseif ($divisao=='ditel' or $divisao=='dicel' or $divisao=='difel' or $divisao=='dipeq' or $divisao=='diciv')
						$udivisao = "CGPAT III / $zdivisao";
					elseif ($divisao=='dimat' or $divisao=='dimec' or $divisao=='ditem' or $divisao=='dinec' or $divisao=='dimut')
						$udivisao = "CGPAT IV / $zdivisao";
					else
						$udivisao = "DIRPA";


					if ($tipo==1)	$texto = "<h1>Recursos 12.2 - $udivisao</h1><table class='table table-hover align-middle table-status'><THEAD><TR><TH></TH>";
					if ($tipo==5)	$texto = "<h1>Recursos 12.3 - $udivisao</h1><table class='table table-hover align-middle table-status'><THEAD><TR><TH></TH>";
					if ($tipo==6)	$texto = "<h1>Recursos 12.6 - $udivisao</h1><table class='table table-hover align-middle table-status'><THEAD><TR><TH></TH>";
					if ($tipo==7)	$texto = "<h1>Recursos 17.1 - $udivisao</h1><table class='table table-hover align-middle table-status'><THEAD><TR><TH></TH>";
					for ($i=2012;$i<=$anofinal;$i++)
						$texto = $texto."<TH>$i</TH>";
					$texto = $texto."</TR></THEAD>";
					$stexto = $texto;
					fputs($fpw,$texto."\n");

					for ($ano=2012;$ano<=$anofinal;$ano++)
					{
						$soma_total[$ano]=0;
						$soma_outros[$ano]=0;
						$soma_prejudicados[$ano]=0;
						$soma_anulados[$ano]=0;
						$soma_intermediarios[$ano]=0;
						$soma_providos[$ano]=0;
						$soma_negados[$ano]=0;
						$soma_pendentes[$ano]=0;
						$total[$ano]=0;
						$outros[$ano]=0;
						$prejudicados[$ano]=0;
						$anulados[$ano]=0;
						$intermediarios[$ano]=0;
						$providos[$ano]=0;
						$negados[$ano]=0;
						$pendentes[$ano]=0;
					}
					
					if ($tipo==1) $cmd = "select * from cgrec_estat where divisao='$divisao' and tipo=0"; // calcula os 12.2 e o resultado de cada um
					if ($tipo==5) $cmd = "select * from cgrec_estat where divisao='$divisao' and tipo=5"; // calcula os 12.3 e o resultado de cada um
					if ($tipo==6) $cmd = "select * from cgrec_estat where divisao='$divisao' and tipo=6"; // calcula os 12.6 e o resultado de cada um
					if ($tipo==7) $cmd = "select * from cgrec_estat where divisao='$divisao' and tipo=7"; // calcula os 17.1 e o resultado de cada um
					$res = mysqli_query($link,$cmd);
					while ($line=@mysqli_fetch_assoc($res))
					{
						$ano = $line['ano'];
						$outros[$ano] = $line['outros'];
						//echo "ano=".$ano."outros=".$outros[$ano]."<BR>";
						$soma_outros[$ano]=$soma_outros[$ano]+$outros[$ano];
						$prejudicados[$ano] = $line['prejudicados'];
						$soma_prejudicados[$ano]=$soma_prejudicados[$ano]+$prejudicados[$ano];
						$anulados[$ano] = $line['anulados'];
						$soma_anulados[$ano]=$soma_anulados[$ano]+$anulados[$ano];
						$intermediarios[$ano] = $line['intermediarios'];
						$soma_intermediarios[$ano]=$soma_intermediarios[$ano]+$intermediarios[$ano];
						$providos[$ano] = $line['providos'];
						$soma_providos[$ano]=$soma_providos[$ano]+$providos[$ano];
						$negados[$ano] = $line['negados'];
						$soma_negados[$ano]=$soma_negados[$ano]+$negados[$ano];
						$pendentes[$ano] = $line['pendentes'];
						$soma_pendentes[$ano]=$soma_pendentes[$ano]+$pendentes[$ano];
						$total[$ano] = $line['total'];
						$soma_total[$ano] = $soma_total[$ano]+$total[$ano];
					}

					$texto = "<TBODY><TR class='table-light'><TH>Recursos Outros</TH>";
					if ($tipo==7) $texto = "<TBODY><TR class='table-light'><TH>Nulidades parciais</TH>";
					$stexto = $stexto.$texto;
					fputs($fpw,$texto."\n");
					for ($ano=2012;$ano<=$anofinal;$ano++)
					{
						$valor = $outros[$ano];//echo "$ano $valor<BR>";
						$texto = "<TD>$valor</TD>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");
					}
					$texto = "</TR>";
					$stexto = $stexto.$texto;
					fputs($fpw,$texto."\n");

					$texto = "<TR><TH>Recursos prejudicados</TH>";
					if ($tipo==7) $texto = "<TBODY><TR class='table-light'><TH>Nulidades prejudicadas</TH>";
					$stexto = $stexto.$texto;
					fputs($fpw,$texto."\n");
					for ($ano=2012;$ano<=$anofinal;$ano++)
					{
						$valor = $prejudicados[$ano];
						$texto = "<TD>$valor</TD>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");
					}
					$texto = "</TR>";
					$stexto = $stexto.$texto;
					fputs($fpw,$texto."\n");

					$texto = "<TR><TH>Recursos anulados</TH>";
					if ($tipo==7) $texto = "<TBODY><TR class='table-light'><TH>Nulidades anuladas</TH>";
					$stexto = $stexto.$texto;
					fputs($fpw,$texto."\n");
					for ($ano=2012;$ano<=$anofinal;$ano++)
					{
						$valor = $anulados[$ano];
						$texto = "<TD>$valor</TD>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");
					}
					$texto = "</TR>";
					$stexto = $stexto.$texto;
					fputs($fpw,$texto."\n");

					$texto = "<TR class='table-light'><TH>Recursos intermediarios</TH>";
					if ($tipo==7) $texto = "<TBODY><TR class='table-light'><TH>Nulidades intermediárias</TH>";
					$stexto = $stexto.$texto;
					fputs($fpw,$texto."\n");
					for ($ano=2012;$ano<=$anofinal;$ano++)
					{
						$valor = $intermediarios[$ano];
						$texto = "<TD>$valor</TD>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");
					}
					$texto = "</TR>";
					$stexto = $stexto.$texto;
					fputs($fpw,$texto."\n");

					$texto = "<TR><TH>Recursos providos</TH>";
					if ($tipo==7) $texto = "<TBODY><TR class='table-light'><TH>Nulidades providas</TH>";
					$stexto = $stexto.$texto;
					fputs($fpw,$texto."\n");
					for ($ano=2012;$ano<=$anofinal;$ano++)
					{
						$valor = $providos[$ano];
						$texto = "<TD>$valor</TD>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");
					}
					$texto = "</TR>";
					$stexto = $stexto.$texto;
					fputs($fpw,$texto."\n");

					$texto = "<TR class='table-light'><TH>Recursos negados</TH>";
					if ($tipo==7) $texto = "<TBODY><TR class='table-light'><TH>Nulidades negadas</TH>";
					$stexto = $stexto.$texto;
					fputs($fpw,$texto."\n");
					for ($ano=2012;$ano<=$anofinal;$ano++)
					{
						$valor = $negados[$ano];
						$texto = "<TD>$valor</TD>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");
					}
					$texto = "</TR>";
					$stexto = $stexto.$texto;
					fputs($fpw,$texto."\n");

					if ($tipo==1 or $tipo==5 or $tipo==6 or $tipo==7) // tipo=1 tem pendentes zero pq calcula as decisoes daquele ano
					{
						$texto = "<TR><TH>Recursos pendentes</TH>";
						if ($op==7) $texto = "<TR><TH>Nulidades pendentes</TH>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");
						for ($ano=2012;$ano<=$anofinal;$ano++)
						{
							$valor = $pendentes[$ano];
							$texto = "<TD>$valor</TD>";
							$stexto = $stexto.$texto;
							fputs($fpw,$texto."\n");
						}
						$texto = "</TR></TBODY>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");
					}

					if ($tipo==1) $texto = "<TFOOT><TR><TH>Total (12.2)</TH>";
					if ($tipo==5) $texto = "<TFOOT><TR><TH>Total (12.3)</TH>";
					if ($tipo==6) $texto = "<TFOOT><TR><TH>Total (12.6)</TH>";
					if ($tipo==7) $texto = "<TFOOT><TR><TH>Total (17.1)</TH>";
					$stexto = $stexto.$texto;
					fputs($fpw,$texto."\n");
					for ($ano=2012;$ano<=$anofinal;$ano++)
					{
						$valor = $total[$ano];
						$texto = "<TD>$valor</TD>";
						$stexto = $stexto.$texto;
						fputs($fpw,$texto."\n");
					}
					$texto = "</TR></TFOOT></TABLE><BR><BR><BR>";
					$stexto = $stexto.$texto;
					fputs($fpw,$texto."\n");
				}
			}

			fclose($fpw);
			echo "$stexto <BR> Fim de processamento";
			exit();
		} // fim do $op==3

// http://localhost/central/control.php?action=115&ano=2012&op=1
// http://cientistaspatentes/central/control.php?action=115&ano=2012&op=1

// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from pedido where decisao in ('recurso provido anvisa','9.2','indeferimento','recurso exigencia','recurso exigencia 121','recurso ciencia','recurso 130','recurso 131','recurso 135','recurso 136','recurso 137','recurso 138','recurso 139','recurso 140','recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 130','recurso 112','recurso 113','recurso 115','recurso 102','recurso 103','recurso 104','nulidade provida','nulidade negada','nulidade parcial','nulidade 212','nulidade 211','recurso provido','recurso negado','recurso manutencao do indeferimento 111','recurso 100','recurso 111') and year(rpi)>=2008
// grave update8.csv
// http://localhost/teste.php?action=58
// SELECT * FROM arquivados where despacho='12.2' and year(data)=2012 and numero in (select numero from pedido where (decisao='recurso negado' or decisao='recurso manutencao do indeferimento 111') and rpi<>'0000-0-00')

// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from pedido where divisao='cgrec' and instancia='acao judicial'
// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from pedido where year(rpi)>=2011 and (instancia in ('recurso cgrec', 'nulidade cgrec') and decisao in ('recurso 100','recurso 111','recurso 120','recurso 121','recurso 130','nulidade 200','nulidade 201','nulidade 204','nulidade 205','7.4') or (instancia in ('recurso', 'nulidade') and decisao in ('recurso ciencia','recurso exigencia','recurso exigencia 121','nulidade 1')))
// select numero,prioridade,instancia,decisao,prioritario,cc1,anulado,codigo,rpi,divisao,etapa from pedido where year(rpi)>=2011 and (instancia in ('recurso cgrec', 'nulidade cgrec') and decisao in ('recurso 102','recurso 103','recurso 104','recurso 112','recurso 113','recurso 115','recurso 131','recurso 135','recurso 136','recurso 137','recurso 138','recurso 139','recurso 140','nulidade 216','nulidade 218') )

		// testar 12.2 http://localhost/central/control.php?action=115&op=1&ano=2012 cgrec_estat tipo=0 calcula os 12.2 e depois o resultado de cada pedido
		// testar 12.3 http://localhost/central/control.php?action=115&op=5&ano=2012 cgrec_estat tipo=5 calcula os 12.3 e depois o resultado de cada pedido
		// testar 12.6 http://localhost/central/control.php?action=115&op=6&ano=2012 cgrec_estat tipo=6 calcula os 12.6 e depois o resultado de cada pedido
		// testar 17.1 http://localhost/central/control.php?action=115&op=7&ano=2012 cgrec_estat tipo=7 calcula os 17.1 e depois o resultado de cada pedido
 		
		// tem uma outra forma de calcular os 12.2 é levar em conta as decisões do ano sem correlação com os 12.2 daquele ano (isso acabou nao sendo usado)
		// testar 12.2 http://localhost/central/control.php?action=115&op=4&ano=2012 cgrec_estat tipo=1 calcula os 12.2 e depois as decisões daquele ano
		// portanto no caso do 12.2 temos dois caculos: os que ficam em tipo=0 com o resultado do 12.2 daquele ano, e o tipo=1 com as decisoes daquele ano

		// depois de rodar estas quatro rotina para 2012 a 2021 e copiar todos os inserts faça a carga na tabela cgrec_estat
		// com a tabela atualizada calcule os arquivos cgrec1.htm cgrec5.htm cgrec6.htm e cgrec7.htm
		// http://localhost/central/control.php?action=115&op=3&tipo=1
		// http://localhost/central/control.php?action=115&op=3&tipo=5
		// http://localhost/central/control.php?action=115&op=3&tipo=6
		// http://localhost/central/control.php?action=115&op=3&tipo=7
		
		// veja os resultados em http://cientistaspatentes.com.br/sinergias/estoque8.php
		
		// para rodar os comandos abaixo use por ex: https://cientistaspatentes.com.br/central/control.php?action=115&op=1&ano=2022
		
		$divisoes2 = array ('dirpa','ditex','difari','difarii','dipol','dinor','dialp','dibio','dimol','dipaq','dipae','ditel','dicel','difel','dipeq','diciv','dimat','dimec','ditem','dinec','dimut');
		for ($ano2=2012;$ano2<=2012;$ano2++)
		{
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
			if ($op==1) $cmd = "select * from arquivados where despacho='12.2' and year(data)=$ano order by data asc";
			if ($op==5) $cmd = "select * from arquivados where despacho='12.3' and year(data)=$ano order by data asc";
			if ($op==6) $cmd = "select * from arquivados where despacho='12.6' and year(data)=$ano order by data asc";
			echo "$cmd<BR>";

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
				
				// pedidos como 112013033005 aparecem duas vezes como outros e como providos
				//if ($op==1) $cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='12.2' and data>'$data' and year(data)=$ano and anulado=0";
				//if ($op==5) $cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='12.3' and data>'$data' and year(data)=$ano and anulado=0";
				//if ($op==6) $cmd2 = "select * from arquivados where (numero='$numero1' or numero='$numero2') and despacho='12.6' and data>'$data' and year(data)=$ano and anulado=0";
				//$res2 = mysqli_query($link,$cmd2); // veja se tem depois deste 12.2 um ountro 12.2 no mesmo ano e válido, se tiver considere apenas este segundo
				//if ($line2=@mysqli_fetch_assoc($res2)) continue;
				
				$idivisao = '';
				if ($op<>5 and $op<>6) // para 12.3 e 12.6 nao preciso saber divisao
				{
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
					//echo "$idivisao $numero<BR>";
				}
				
				if ($op==1)
				{
					if ($anulado>0) // 202016010890
					{

						$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('recurso 130') and rpi<>'0000-00-00' and anulado=0 and rpi<='2024-12-31' and rpi>'$data12'";
						$res2 = mysqli_query($link,$cmd2); //echo "$cmd2<BR>";
						if ($line2=@mysqli_fetch_assoc($res2))
						{
							$recurso_prejudicados++;
							$recurso_prejudicados_array[$idivisao]++;
							$recurso_prejudicados_array['dirpa']++; 
							$decisao = $line2['decisao'];
							if (strlen($numero)==12)
								echo "BR$numero;$idivisao;$decisao;$data;prejudicados;12.2;$data12<BR>";
							else
								echo "$numero;$idivisao;$decisao;$data;prejudicados;12.2;$data12<BR>";
						}
						else
						{
							$recurso_anulados++;
							$recurso_anulados_array[$idivisao]++;
							$recurso_anulados_array['dirpa']++; 
							if (strlen($numero)==12)
								echo "BR$numero;$idivisao;;;anulados;12.2;$data12<BR>";
							else
								echo "$numero;$idivisao;;;anulados;12.2;$data12<BR>";
						}
						$total++;
						$total_array[$idivisao]++;
						$total_array['dirpa']++;
					}
					else
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
							if (strlen($numero)==12)
								echo "BR$numero;$idivisao;$decisao;$data;outros;12.2;$data12<BR>";
							else
								echo "$numero;$idivisao;$decisao;$data;outros;12.2;$data12<BR>";
							
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
								if (strlen($numero)==12)
									echo "BR$numero;$idivisao;$decisao;$data;prejudicados;12.2;$data12<BR>";
								else
									echo "$numero;$idivisao;$decisao;$data;prejudicados;12.2;$data12<BR>";
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
										if (strlen($numero)==12)
											echo "BR$numero;$idivisao;$decisao;$data;providos;12.2;$data12<BR>";
										else
											echo "$numero;$idivisao;$decisao;$data;providos;12.2;$data12<BR>";
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
											if (strlen($numero)==12)
												echo "BR$numero;$idivisao;$decisao;$data;negados;12.2;$data12<BR>";
											else
												echo "$numero;$idivisao;$decisao;$data;negados;12.2;$data12<BR>";
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
										if (strlen($numero)==12)
											echo "BR$numero;$idivisao;$decisao;$data;intermediarios;12.2;$data12<BR>";
										else
											echo "$numero;$idivisao;$decisao;$data;intermediarios;12.2;$data12<BR>";
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
											if (strlen($numero)==12)
												echo "BR$numero;$idivisao;$decisao;$data;outros;12.2;$data12<BR>";
											else
												echo "$numero;$idivisao;$decisao;$data;outros;12.2;$data12<BR>";
										}
										elseif ($numero=='PI0103113' or $numero=='PI0409722') //  2012 PI0103113 foi prejudicado mas nao tem 130 mas nao é pendente pois foi prejudicado mesmo
										{
											$recurso_prejudicados++;
											$recurso_prejudicados_array[$idivisao]++;
											$recurso_prejudicados_array['dirpa']++;
											if (strlen($numero)==12)
												echo "BR$numero;$idivisao;$decisao;$data;prejudicados;12.2;$data12<BR>";
											else
												echo "$numero;$idivisao;$decisao;$data;prejudicados;12.2;$data12<BR>";
											$total++;
											$total_array[$idivisao]++;
											$total_array['dirpa']++;
										}
										else
										{
											$recurso_pendentes++;
											$recurso_pendentes_array[$idivisao]++;
											$recurso_pendentes_array['dirpa']++;
											if (strlen($numero)==12)
												echo "BR$numero;$idivisao;;;pendentes;12.2;$data12<BR>";
											else
												echo "$numero;$idivisao;;;pendentes;12.2;$data12<BR>";
											$total++;
											$total_array[$idivisao]++;
											$total_array['dirpa']++;
										}
									}
								}
							}
						}
					}
				}


				/*
					$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('recurso 130') and rpi<>'0000-00-00'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
						$recurso_prejudicados++;
					else
					{
						$encontrei = 0;
						$cmd2 = "SELECT * FROM revistas where (numero='$numerocd1' or numero='$numerocd2') and despacho='PR - Recursos' and (inid='de' or inid='co') and data>'$data'";
						$res2 = mysqli_query($link,$cmd2);
						while ($line2=@mysqli_fetch_assoc($res2))
						{
							$descricao = $line2['descricao'];
							$data = $line2['data'];
							$pos1 = strpos($descricao,'deferido o pedido');
							if ($pos1 !== false)
							{
								$recurso_providos++;
								$encontrei=1;
								echo "$numero $descricao<BR>";
							}
							else
							{
								$pos1 = strpos($descricao,'conhecido e provido');
								if ($pos1 !== false)
								{
									$encontrei=1;
									$recurso_providos++;
									echo "$numero $descricao<BR>";
								}
								else
								{
									$pos1 = strpos($descricao,'reformada a decisão');
									if ($pos1 !== false)
									{
										$recurso_providos++;
										$encontrei=1;
										echo "$numero $descricao<BR>";
									}
									else
									{
										$pos1 = strpos($descricao,'negado provimento');
										if ($pos1 !== false)
										{
											$recurso_negados++;
											$encontrei=1;
										}
										else
										{
											$pos1 = strpos($descricao,'negado o provimento');
											if ($pos1 !== false)
											{
												$recurso_negados++;
												$encontrei=1;
											}
											else
											{
												$pos1 = strpos($descricao,'Mantido o indeferimento');
												if ($pos1 !== false)
												{
													$recurso_negados++;
													$encontrei=1;
												}
											}
										}
									}
								}
							}
							if ($encontrei==0) $recurso_pendentes++;
						}
					}

				}
				*/

				if ($op==5 or $op==6)
				{
					$recurso_intermediarios = 0;
					@$recurso_intermediarios_array[$idivisao]=0;
					$recurso_intermediarios_array['dirpa']=0;

					$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('recurso 131','recurso 135','recurso 136','recurso 137','recurso 138','recurso 139','recurso 140') and rpi>'$data12' and rpi<='2024-12-31'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$decisao = $line2['decisao'];
						$data = $line2['rpi'];
						if (strlen($numero)==12)
						{
							if ($op==5) echo "BR$numero;$idivisao;$decisao;$data;outros;12.3;$data12<BR>";
							if ($op==6) echo "BR$numero;$idivisao;$decisao;$data;outros;12.6;$data12<BR>";
						}
						else
						{
							if ($op==5) echo "$numero;$idivisao;$decisao;$data;outros;12.3;$data12<BR>";
							if ($op==6) echo "$numero;$idivisao;$decisao;$data;outros;12.6;$data12<BR>";
						}
						$recurso_outros++;
						$recurso_outros_array[$idivisao]++;
						$recurso_outros_array['dirpa']++;
					}

					$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('recurso 130') and rpi>'$data12' and rpi<='2024-12-31'";
					$res2 = mysqli_query($link,$cmd2);
					if ($line2=@mysqli_fetch_assoc($res2))
					{
						$decisao = $line2['decisao'];
						$data = $line2['rpi'];
						if (strlen($numero)==12)
						{
							if ($op==5) echo "BR$numero;$idivisao;$decisao;$data;prejudicados;12.3;$data12<BR>";
							if ($op==6) echo "BR$numero;$idivisao;$decisao;$data;prejudicados;12.6;$data12<BR>";
						}
						else
						{
							if ($op==5) echo "$numero;$idivisao;$decisao;$data;prejudicados;12.3;$data12<BR>";
							if ($op==6) echo "$numero;$idivisao;$decisao;$data;prejudicados;12.6;$data12<BR>";
						}
						$recurso_prejudicados++;
						@$recurso_prejudicados_array[$idivisao]++;
						$recurso_prejudicados_array['dirpa']++;
						$total++;
						@$total_array[$idivisao]++;
						$total_array['dirpa']++;
					}
					else
					{
						$cmd2 = "select * from pedido where (numero='$numero1' or numero='$numero2') and decisao in ('recurso 112','recurso 113','recurso 115','recurso 102','recurso 103','recurso 104') and rpi>'$data12' and rpi<='2024-12-31'";
						$res2 = mysqli_query($link,$cmd2);
						if ($line2=@mysqli_fetch_assoc($res2))
						{
							$data = $line2['rpi'];
							$decisao = $line2['decisao'];
							if ($decisao=='recurso 102' or $decisao=='recurso 103' or $decisao=='recurso 104')
							{
								$recurso_providos++;
								@$recurso_providos_array[$idivisao]++;
								$recurso_providos_array['dirpa']++;
								if (strlen($numero)==12)
								{
									if ($op==5) echo "BR$numero;$idivisao;$decisao;$data;providos;12.3;$data12<BR>";
									if ($op==6) echo "BR$numero;$idivisao;$decisao;$data;providos;12.6;$data12<BR>";
								}
								else
								{
									if ($op==5) echo "$numero;$idivisao;$decisao;$data;providos;12.3;$data12<BR>";
									if ($op==6) echo "$numero;$idivisao;$decisao;$data;providos;12.6;$data12<BR>";
								}
								$total++;
								@$total_array[$idivisao]++;
								$total_array['dirpa']++;
							}
							else
							{
								if ($decisao=='recurso 112' or $decisao=='recurso 113' or $decisao=='recurso 115')
								{
									$recurso_negados++;
									@$recurso_negados_array[$idivisao]++;
									$recurso_negados_array['dirpa']++;
									if (strlen($numero)==12)
									{
										if ($op==5) echo "BR$numero;$idivisao;$decisao;$data;negados;12.3;$data12<BR>";
										if ($op==6) echo "BR$numero;$idivisao;$decisao;$data;negados;12.6;$data12<BR>";
									}
									else
									{
										if ($op==5) echo "$numero;$idivisao;$decisao;$data;negados;12.3;$data12<BR>";
										if ($op==6) echo "$numero;$idivisao;$decisao;$data;negados;12.6;$data12<BR>";
									}
										
									$total++;
									@$total_array[$idivisao]++;
									$total_array['dirpa']++;
								}
								else
									echo "$numero não pode ter entrado aqui !!<BR>";
							}
						}
						else
						{
							if (strlen($numero)==12)
							{
								if ($op==5) echo "BR$numero;$idivisao;;;pendentes;12.3;$data12<BR>";
								if ($op==6) echo "BR$numero;$idivisao;;;pendentes;12.6;$data12<BR>";
							}
							else
							{
								if ($op==5) echo "$numero;$idivisao;;;pendentes;12.3;$data12<BR>";
								if ($op==6) echo "$numero;$idivisao;;;pendentes;12.6;$data12<BR>";
							}
							$recurso_pendentes++;
							@$recurso_pendentes_array[$idivisao]++;
							$recurso_pendentes_array['dirpa']++;
							$total++;
							@$total_array[$idivisao]++;
							$total_array['dirpa']++;
						}
					}
				}

			}
			if ($divisao=="") $divisao='dirpa';

			foreach ($divisoes2 as $idivisao)
			{
				$total = $total_array[$idivisao];
				$recurso_outros = $recurso_outros_array[$idivisao];
				$recurso_prejudicados = $recurso_prejudicados_array[$idivisao];
				$recurso_anulados = $recurso_anulados_array[$idivisao];
				$recurso_intermediarios = $recurso_intermediarios_array[$idivisao];
				$recurso_providos = $recurso_providos_array[$idivisao];
				$recurso_negados = $recurso_negados_array[$idivisao];
				$recurso_pendentes = $recurso_pendentes_array[$idivisao];

				if ($op==5 or $op==6)
				{
					if ($idivisao=='dirpa')
					{
						$cmd2 = "INSERT INTO cgrec_estat (tipo,divisao,ano,total,outros,prejudicados,anulados,intermediarios,providos,negados,pendentes) VALUES ($op,'$idivisao','$ano','$total','$recurso_outros','$recurso_prejudicados','$recurso_anulados','$recurso_intermediarios','$recurso_providos','$recurso_negados','$recurso_pendentes')";
						echo "$cmd2;<BR>";
					}
				}
				else // $op==1
				{
					$cmd2 = "INSERT INTO cgrec_estat (tipo,divisao,ano,total,outros,prejudicados,anulados,intermediarios,providos,negados,pendentes) VALUES (0,'$idivisao','$ano','$total','$recurso_outros','$recurso_prejudicados','$recurso_anulados','$recurso_intermediarios','$recurso_providos','$recurso_negados','$recurso_pendentes')";
					echo "$cmd2;<BR>";
				}
				//$res2 = mysqli_query($link,$cmd2);
				//echo "$idivisao;$ano;$total;$recurso_outros;$recurso_prejudicados;$recurso_anulados;$recurso_intermediarios;$recurso_providos;$recurso_negados;$recurso_pendentes<BR>";
			}
			echo "<BR><BR>";

			foreach ($divisoes2 as $idivisao)
			{
				$total = $total_array[$idivisao];
				$recurso_outros = $recurso_outros_array[$idivisao];
				$recurso_prejudicados = $recurso_prejudicados_array[$idivisao];
				$recurso_anulados = $recurso_anulados_array[$idivisao];
				$recurso_intermediarios = $recurso_intermediarios_array[$idivisao];
				$recurso_providos = $recurso_providos_array[$idivisao];
				$recurso_negados = $recurso_negados_array[$idivisao];
				$recurso_pendentes = $recurso_pendentes_array[$idivisao];

				//echo "$idivisao;$ano;$total;$recurso_outros;$recurso_prejudicados;$recurso_anulados;$recurso_intermediarios;$recurso_providos;$recurso_negados;$recurso_pendentes<BR>";
			}
		}
		echo "fim do processamento";
		exit();
	}

	
?>
    </BODY>
</HTML>