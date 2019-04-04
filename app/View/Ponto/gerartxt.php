<?php

    use Lib\DownloadTXT;
    
    use App\Repositorios\RepositorioUnidade;
    use App\Repositorios\RepositorioLotacao;
    use App\Repositorios\RepositorioFuncionario;    
    
    use App\Models\Unidade;
    use App\Models\Lotacao;
    use App\Models\Funcionario;

    $idUnidade = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING); 

   if($idUnidade){
       
    $nomeArquivo = $idUnidade.".txt";
    $meuTexto = "texto a ser escrito no arquivo";  
    
        $repositorioUnidade = new RepositorioUnidade();
        $unidade = $repositorioUnidade->getObj($idUnidade);

        $repositorioLotacao = new RepositorioLotacao();
        $lotacoes = $repositorioLotacao->getLotacaoPorUnidade($unidade->getId_unidade());
       
        $_ponto_evento = "2025";
        $_hora_ponto = "000000";
        $_ano_mes = "201904";
      
        foreach($lotacoes as $lotacao){
            $repositorioFuncionario = new RepositorioFuncionario();
            $funcionario = $repositorioFuncionario->getFuncionario($lotacao->getId_funcionario());

//            if(!is_null($funcionario) && !is_null($funcionario->getMatricula()) && $funcionario->getMatricula() > 0 && $funcionario->getMatricula() <= 99999999 ){
//                $meuTexto = $meuTexto . str_pad($funcionario->getMatricula() , 8 , '0' , STR_PAD_LEFT) 
//                    .$_ponto_evento
//                    .str_pad($_hora_ponto, 6, '0', STR_PAD_LEFT)
//                    .$_ano_mes
//                    ."\r\n";
//            }
        }      
       
        $fp = fopen("{$nomeArquivo}", "w");
        fwrite($fp, "{$meuTexto}");
        fclose($fp);
//       
//        $download = new DownloadTXT();
//        $download->download($nomeArquivo);  
        
      
        // valor a ser escrito no arquivo
$texto_arquivo = "texto a ser escrito no arquivo";
 $nome_arquivo = "joao.txt";
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
