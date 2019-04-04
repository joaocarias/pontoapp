<?php
if(isset($_POST["submit"])) {
	
// nome do arquivo a ser criado
$nome_arquivo = $_POST["nome_arquivo"].".txt";

// valor a ser escrito no arquivo
$texto_arquivo = "texto a ser escrito no arquivo";
 
// se arquivo já existe
if(file_exists("$nome_arquivo")) {
// abre o arquivo para reescrever
$fp = fopen("$nome_arquivo", "w");
// escreve no arquivo
  fwrite($fp, "$texto_arquivo");
// fecha o arquivo
fclose($fp);
 
// ser arquivo não existir
} else {
 
// cria um novo arquivo e abrindo para escrita
$fp = fopen("$nome_arquivo", "w");
// escreve o seu texto no arquivo
fwrite($fp, "$texto_arquivo");
// fecha o arquivo
fclose($fp); // fecha arquivo
} 

$filename = $nome_arquivo;
if(ini_get('zlib.output_compression'))
ini_set('zlib.output_compression', 'Off');
$file_extension = strtolower(substr(strrchr($filename,"."),1));
if($filename=="") {
echo "nenhum arquivo foi especificado para download";
exit;
}
elseif(!file_exists($filename)) {
echo "o arquivo não foi encontrado";
exit;
};
switch($file_extension) {
// cada case é um formato para download
case "pdf": $ctype="application/pdf"; break;
case "exe": $ctype="application/octet-stream"; break;
case "zip": $ctype="application/zip"; break;
case "doc": $ctype="application/msword"; break;
case "xls": $ctype="application/vnd.ms-excel"; break;
case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
case "gif": $ctype="image/gif"; break;
case "png": $ctype="image/png"; break;
case "jpg": $ctype="image/jpg"; break;
default: $ctype="application/force-download";
}

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
header("Content-Type: $ctype");
header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize($filename));
readfile("$filename");
exit();

 
// exibe uma mensagem
echo "arquivo criado e escrito com sucesso";

}
?>

<form method="post" action="teste.php">
Nome do arquivo <input type="text" name="nome_arquivo" value="" /> * sem extensão
<input type="submit" name="submit" />
</form>