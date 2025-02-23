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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .hero-section {
            background-color: #3333ff;
            color: white;
            padding: 20px;
			border: 1px solid #ddd;
			width: 80%;
            text-align: center;
        }
        .content-section {
            padding: 2rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .content-section p {
            text-align: justify;
        }
    </style>
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

    <!-- Hero Section -->
    <header class="hero-section">
        <h1 class="display-6">Coordenação Técnica de Recursos e Processos Administrativos de Nulidade de Patentes (COREP)</h1>
    </header>

    <!-- Content Section -->
    <main class="container my-5">
        <div class="content-section">
            <h2 class="mb-4 text-center">Sobre a COREP</h2>
            <p>A Coordenação-Geral de Recursos e Processos Administrativos de Nulidade (CGREC) é um órgão específico singular, subordinado diretamente à Presidência do Instituto Nacional da Propriedade Industrial, à qual compete:</p>
            <p>Examinar e fornecer subsídios técnicos para decisão do Presidente do INPI nos recursos e processos administrativos de nulidade, interpostos na forma da legislação vigente de propriedade industrial, emitindo parecer sobre a matéria técnica suscitada e nos demais recursos em matéria de propriedade intelectual, cuja competência do registro seja atribuída ao INPI por força de lei;</p>
            <p>Orientar e coordenar a sistematização, organização e atualização das decisões administrativas em matéria de propriedade industrial e intelectual, buscando consolidar uma jurisprudência administrativa da matéria.</p>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center py-3 bg-light">
        <p class="mb-0">© 2024 Instituto Nacional da Propriedade Industrial (INPI). Todos os direitos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
		
	</body>

</html>