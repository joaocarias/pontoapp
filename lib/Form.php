<?php

namespace Lib;

class Form {
    public static function beginForm($method, $action){      
        return '<form class="row" method="'.$method.'" action="'.$action.'">            
            ';  
    }
    
    public static function endForm(){     
        return '
            </form>';            
    }
    
    public static function getInput($type, $name, $label, $placeholder, $tamanho, $required, $value = null, $bloaquear = null, $mask = null, $maxlength = null, $outro = null){
        if($required){
            $obrigatorio = "required=required";
            $descricao = "* Campo Obrigatório";
        } else {
            $obrigatorio = "";
            $descricao = "";
        }
        
        if(($bloaquear) && (!is_null($bloaquear))){
            $disabled = 'readonly';
        }else{
            $disabled = '';
        }
        
        if(is_null($value)){
            $value = "";
        }else{
            $value = "value='{$value}'";
        }
        
        if(($mask) && !is_null($mask)){
            $mask_ = 'data-mask="'.$mask.'"';
        }else{
            $mask_ = '';
        }
        
        if(($maxlength) && !(is_null($maxlength))){
            $maxlength_ = 'maxlength="'.$maxlength.'"';
        }else{
            $maxlength_ = "";
        }
        
        return '    <div class="form-group '.$tamanho.'">
                          <label for="'.$name.'">'.$label.'</label>                          
                            <input  id="'.$name.'" name="'.$name.'" type="'.$type.'" '.$value.' '
                                . ' placeholder="'.$placeholder.'" class="form-control form-control-sm form-control-success" '.$obrigatorio.' '.$disabled.'
                                    '.$mask_.' '.$maxlength_.' '.$outro.'  >
                                <small class="form-text">'.$descricao.'</small>
                          </div>
                        ';
        
    } 
    
    public static function getInputButtonSubmit($name, $valeu, $class){
        
        return '<div class="form-group">
                    <div class="col">                          
                        <input type="submit" value="'.$valeu.'" id="'.$name.'" name="'.$name.'" class="btn '.$class.'">
                    </div>
                </div>';
    }
    
    public static function getButtonCancelar($destino){
        return "<div class='form-group'>
                    <div class='col'>    
                        <a href='{$destino}'><button type='button' class='btn btn-warning btn-sm'>Cancelar</button></a>
                    </div>
                </div>";
    }
    
    public static function getButton($destino, $valor, $class){
        return "<div class='form-group'>
                    <div class='col'>    
                        <a href='{$destino}'><button type='button' class='btn {$class}'>{$valor}</button></a>
                    </div>
                </div>";
    }
    
    public static function getScritpCorreiosEndereco(){
        return ' <!-- Adicionando Javascript -->
    <script type="text/javascript" >
    console.log("teste");
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById("logradouro").value=("");            
            document.getElementById("bairro").value=("");
            document.getElementById("cidade").value=("");
            document.getElementById("uf").value=("");
           
    }
    
    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById("logradouro").value=(conteudo.logradouro);            
            document.getElementById("bairro").value=(conteudo.bairro);
            document.getElementById("cidade").value=(conteudo.localidade);
            document.getElementById("uf").value=(conteudo.uf);
            
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {
        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, "");
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            //Valida o formato do CEP.
            if(validacep.test(cep)) {
                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById("logradouro").value=("");                
                document.getElementById("bairro").value=("");
                document.getElementById("cidade").value=("");
                document.getElementById("uf").value=("");
               
                //Cria um elemento javascript.
                var script = document.createElement("script");
                //Sincroniza com o callback.
                script.src = "https://viacep.com.br/ws/"+ cep + "/json/?callback=meu_callback";
                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();              
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
    </script>';
    }

public static function getSelectUF($nome, $label, $tamanho, $required, $value){
        if($required){
            $obrigatorio = "required=required";
            $descricao = "* Campo Obrigatório";
        } else {
            $obrigatorio = "";
            $descricao = "";
        }
        
        if(is_null($value) OR $value == "" ){
            $selecione = 'selected="selected"';
        }
                
        return '<div class="form-group '.$tamanho.'">
                        <label for="'.$nome.'">'.$label.'</label>                        
                               <select class="form-control form-control-sm form-control-success" name="'.$nome.'" id="'.$nome.'" '.$obrigatorio.'>    
                                    <option value="AC" '. ($value==("AC") ? "selected" : "") .'>Acre</option>
                                    <option value="AL" '. ($value==("AL") ? "selected" : "") .'>Alagoas</option>
                                    <option value="AP" '. ($value==("AP") ? "selected" : "") .'>Amapá</option>
                                    <option value="AM" '. ($value==("AM") ? "selected" : "") .'>Amazonas</option>
                                    <option value="BA" '. ($value==("BA") ? "selected" : "") .'>Bahia</option>
                                    <option value="CE" '. ($value==("CE") ? "selected" : "") .'>Ceará</option>
                                    <option value="DF" '. ($value==("DF") ? "selected" : "") .'>Distrito Federal</option>
                                    <option value="ES" '. ($value==("ES") ? "selected" : "") .'>Espírito Santo</option>
                                    <option value="GO" '. ($value==("GO") ? "selected" : "") .'>Goiás</option>
                                    <option value="MA" '. ($value==("MA") ? "selected" : "") .'>Maranhão</option>
                                    <option value="MT" '. ($value==("MT") ? "selected" : "") .'>Mato Grosso</option>
                                    <option value="MS" '. ($value==("MS") ? "selected" : "") .'>Mato Grosso do Sul</option>
                                    <option value="MG" '. ($value==("MG") ? "selected" : "") .'>Minas Gerais</option>
                                    <option value="PA" '. ($value==("PA") ? "selected" : "") .'>Pará</option>
                                    <option value="PB" '. ($value==("PB") ? "selected" : "") .'>Paraíba</option>
                                    <option value="PR" '. ($value==("PR") ? "selected" : "") .'>Paraná</option>
                                    <option value="PE" '. ($value==("PE") ? "selected" : "") .'>Pernambuco</option>
                                    <option value="PI" '. ($value==("PI") ? "selected" : "") .'>Piauí</option>
                                    <option value="RJ" '. ($value==("RJ") ? "selected" : "") .'>Rio de Janeiro</option>
                                    <option value="RN" '. ($value==("RN") ? "selected" : "") .'>Rio Grande do Norte</option>
                                    <option value="RS" '. ($value==("RS") ? "selected" : "") .'>Rio Grande do Sul</option>
                                    <option value="RO" '. ($value==("RO") ? "selected" : "") .'>Rondônia</option>
                                    <option value="RR" '. ($value==("RR") ? "selected" : "") .'>Roraima</option>
                                    <option value="SC" '. ($value==("SC") ? "selected" : "") .'>Santa Catarina</option>
                                    <option value="SP" '. ($value==("SP") ? "selected" : "") .'>São Paulo</option>
                                    <option value="SE" '. ($value==("SE") ? "selected" : "") .'>Sergipe</option>
                                    <option value="TO" '. ($value==("TO") ? "selected" : "") .'>Tocantins</option>                                                        
                            </select>  
                          <small class="form-text">'.$descricao.'</small>
                        </div>
                    </div>';
        
    }
    
    public static function getHidden($name, $value){
        return '<input type="hidden" name="'.$name.'" value="'.$value.'">';
    }
    
    public static function getSelect($array, $nome, $label, $tamanho, $required, $id_select = null){
        $selecione = '';
        
        if($required){
            $obrigatorio = "required=required";
            $descricao = "* Campo Obrigatório";
        } else {
            $obrigatorio = "";
            $descricao = "";
        }
                        
        if(is_null($id_select) OR $id_select == "" ){
            $selecione = 'selected="selected"';
        }
        
        $options = "";
        
        foreach ($array as $row){
            if($row['id'] == $id_select AND !is_null($id_select)){
                $option_selected_ = 'selected="selected"';
            }else{
                $option_selected_ = "";
            }
            
            $options = $options . ' <option value="'.$row['id'].'" '.$option_selected_.'>'.$row['value'].'</option>';
            
        }
        
        return '<div class="form-group '.$tamanho.'">
                        <label for="'.$nome.'">'.$label.'</label>                        
                               <select class="form-control form-control-sm form-control-success" name="'.$nome.'" id="'.$nome.'" '.$obrigatorio.'>    
                                  <option valeu="" '.$selecione.' disabled="disabled" >SELECIONE</option>
                                  '.$options.'
                            </select>   
                            <small class="form-text">'.$descricao.'</small>                        
                    </div>';
        
    }

    public static function getTxtArea($name, $label, $placeholder, $tamanho, $required, $value = null, $bloaquear = null, $rows = null, $maxlength = null){
        if($required){
            $obrigatorio = "required=required";
            $descricao = "* Campo Obrigatório";
        } else {
            $obrigatorio = "";
            $descricao = "";
        }

        if(($bloaquear) && (!is_null($bloaquear))){
            $disabled = 'readonly';
        }else{
            $disabled = '';
        }

        if(($maxlength) && !(is_null($maxlength))){
            $maxlength_ = 'maxlength="'.$maxlength.'"';
        }else{
            $maxlength_ = "";
        }

        if(($rows) && !(is_null($rows))){
            $rows_ = 'rows="'.$rows.'"';
        }else{
            $rows_ = "";
        }

        return '    <div class="form-group '.$tamanho.'" style="padding-right: 15px; padding-left: 15px;">
                          <label for="'.$name.'">'.$label.'</label>                          
                            <textarea  id="'.$name.'" name="'.$name.'" '
            . ' placeholder="'.$placeholder.'" class="form-control form-control-sm form-control-success" '.$obrigatorio.' '.$disabled.'
                                     '.$maxlength_.' cols="70" '.$rows_.' >'.$value.'</textarea>
                                <small class="form-text">'.$descricao.'</small>
                          </div>
                        ';

    }
}


