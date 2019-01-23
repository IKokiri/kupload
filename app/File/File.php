<?php

namespace File;

class File{

    public function verificarTipo($fileName){
        
        $retorno = array("status"=>"","msg"=>"");

        $partesNome = explode('.',$fileName);

        $localTipo = count($partesNome)-1;
        
        if($partesNome[$localTipo] == "zip"){
            $retorno['status'] = true;
            $retorno['msg'] = "OK";
        }else{
            $retorno['status'] = False;
            $retorno['msg'] = "Tipo de arquivo não suportado. Apenas zip";
        }

        return $retorno;
    }



}

?>
