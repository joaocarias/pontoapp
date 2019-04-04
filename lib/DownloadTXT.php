<?php

namespace Lib;

class DownloadTXT {
     public function download($nome_arquivo){

        $filename = $nome_arquivo;
        if(ini_get('zlib.output_compression'))
            ini_set('zlib.output_compression', 'Off');
        
        $file_extension = strtolower(substr(strrchr($filename,"."),1));
        if($filename=="") {
            return "nenhum arquivo foi especificado para download";            
        }else if(!file_exists($filename)) {
            return "o arquivo não foi encontrado";            
        }
        
        switch($file_extension) {        
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
        return "";  
    }
}
