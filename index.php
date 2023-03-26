<!DOCTYPE html>
<html>
<head>
	<title>Informações do Sistema</title>
</head>
<body>
	<?php
	    // Obter informações do sistema operacional
	    $os_info = php_uname();
	    echo "<h2>Informações do Sistema Operacional:</h2>";
	    echo "<pre>" . $os_info . "</pre>";

	    // Obter informações do CPU
	    $processador = file_get_contents('/proc/cpuinfo');
	    echo "<h2>Informações do CPU:</h2>";
	    echo "<pre>" . $processador . "</pre>";

	    // Obter informações da memória
	    $ram_total = shell_exec('free -m | awk \'NR==2{printf "%.2f", $2}\'');
	    $ram_em_uso = shell_exec('free -m | awk \'NR==2{printf "%.2f", $3}\'');
	    $ram_sobre = file_get_contents('/proc/meminfo');
	    echo "<h2>Informações da Memória:</h2>";
	    echo "<p>Total de memória: " . $ram_total . " MB</p>";
	    echo "<p>Quantidade de memória em uso: " . $ram_em_uso . " MB</p>";
	    echo "<pre>" . $ram_sobre . "</pre>";

	    // Obter informações do disco
	    $armazenameto = disk_total_space('/');
	    $armazenameto_livre= disk_free_space('/');
	    echo "<h2>Informações do Disco:</h2>";
	    echo "<p>Total de espaço em disco: " . round($armazenameto / (1024*1024), 2) . " MB</p>";
	    echo "<p>Quantidade de espaço livre: " . round($armazenameto_livre / (1024*1024), 2) . " MB</p>";
	?>
</body>
</html>
