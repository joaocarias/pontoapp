 <?php 
 
 use Lib\SubNavPrimicipalDashboard;
 use Lib\Form;
 use App\Models\Funcionario;
 use App\Repositorios\RepositorioFuncionario;
 use App\Models\Pessoa;
 use App\Repositorios\RepositorioPessoa;
 use App\Repositorios\RepositorioEndereco;
 use App\Models\Endereco;
 use Lib\Auxiliar;
 use App\Repositorios\RepositorioLotacao;
 use App\Models\Lotacao;
 use App\Models\Unidade;
 use App\Repositorios\RepositorioUnidade;
 use App\Repositorios\RepositorioFuncao;
 use App\Models\Funcao;
 use App\Repositorios\RepositorioLotacaoRegistraPonto;

 
    $subNav = new SubNavPrimicipalDashboard();
    $_id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
    
    ?>
    <main class="app-content">
        
        <?= $subNav->getSubNav(); ?>
              
      <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
              <a href="/funcionario"><button type='button' class='btn btn-warning'>Cancelar</button></a>             
          </div>           
       </div>
      </div>

      <?php
      
    if($_id){
        $repositorioFuncionario = new RepositorioFuncionario();       
        $funcionario = $repositorioFuncionario->getFuncionario($_id);
        
        $repositorioPessoa = new RepositorioPessoa();
        $pessoa = $repositorioPessoa->getPessoa($funcionario->getId_pessoa());
        
        $repositorioEndereco = new RepositorioEndereco();
        $endereco = $repositorioEndereco->getEndereco($pessoa->getId_endereco());
        
        $repositorioLotacao = new RepositorioLotacao();
        $lotacoes = $repositorioLotacao->getLotacaoPorFuncionario($funcionario->getId());
        
        $repositorioUniadade = new RepositorioUnidade();
        $repositorioFuncao = new RepositorioFuncao();
        $repositorioLotacaoRegistraPonto = new RepositorioLotacaoRegistraPonto();
    }
      
      ?>
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 class="mb-3 line-head" id="containers">Funcionário</h2>
            </div>
          </div>
        </div>   
      
       <div class="row">
          <div class="col-lg-12">
            <div class="bs-component">                            
              <div class="card mb-3 border-success">
                
                <div class="card-body">                              
                           <p> Nome: <strong><?= $pessoa->getNome(); ?></strong> <p>
                           <p> Apelido: <strong><?= $pessoa->getApelido(); ?></strong> <p>
                           <p> CPF: <strong> <?= $pessoa->getCpf(); ?> </strong></p>
                           <p> PIS: <strong> <?= $funcionario->getPis(); ?> </strong> </p>
                           <p> Matrícula: <strong> <?= $funcionario->getMatricula(); ?> </strong> </p>
                           <p> Data de Nascimento: <strong> <?= Auxiliar::converterDataParaBR($pessoa->getData_de_nascimento()); ?> </strong> </p>
                           <p> Endereço: <strong> <?php                                
                                    $endereco_ = $endereco->getLogradouro();
                                    $endereco_ = $endereco->getNumero() != "" ? $endereco_ . ", " . $endereco->getNumero() : $endereco_ . ", S/N";
                                    $endereco_ = $endereco->getComplemento() != "" ? $endereco_ . ", " . $endereco->getComplemento() : $endereco_ . "";
                                    $endereco_ = $endereco->getBairro() != "" ? $endereco_ . " - " . $endereco->getBairro() : $endereco_ . "";
                                    $endereco_ = $endereco->getCep() != "" ? $endereco_ . " - CEP:  " . $endereco->getCep() : $endereco_ . "";
                                    $endereco_ = $endereco->getCidade() != "" ? $endereco_ . " - " . $endereco->getCidade() : $endereco_ . "";
                                    $endereco_ = $endereco->getUf() != "" ? $endereco_ . " - " . $endereco->getUf() : $endereco_ . "";
                                    echo $endereco_;
                                ?> </strong> </p>
                            <p> Telefone: <strong> <?= $endereco->getTelefone(); ?></strong> </p>
                            <p> Celular: <strong> <?= $endereco->getCelular(); ?> </strong> </p>
                            <p> E-Mail:  <strong>    <?= $endereco->getEmail(); ?> </strong> </p>
                    
                    <a class="card-link" href="/funcionario/edicao?id=<?= $funcionario->getId();?>">Editar</a>     
                     <a class="card-link" href="/funcionario/exclusao?id=<?= $funcionario->getId();?>">Excluir</a> 
                      <a class="card-link" href="/funcionario/resetedesenha?id=<?= $funcionario->getId();?>">Resetar Senha</a> 
                </div>
              </div>
            </div>
          </div>
       </div>
    </div>
      
       <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 class="mb-3 line-head" id="containers">Lotação</h2>
            </div>
          </div>
        </div>   
      
      <div class="row">
          <div class="col-lg-12">
            <div class="bs-component">                            
              <div class="card mb-3 border-success">
                
                <div class="card-body">                              
                    
                    <?php 
                        $linhasLotacoes = "";
                        
                        foreach ($lotacoes as $row){
                           $linhasLotacoes = $linhasLotacoes . ""
                                   . "<tr>"
                                   . "<td>{$row->getId()}</td>
                                <td>{$repositorioUniadade->getObj($row->getId_unidade())->getNome()}</td>
                                <td>{$repositorioFuncao->getObj($row->getId_funcao())->getNome()}</td>
                                <td>---</td>
                                <td>---</td>
                                <td>".Auxiliar::converterDataParaBR($row->getDt_inicio_lotacao())."</td>
                                <td>{$row->getDt_fim_lotacao()}</td>
                                <td></td>"
                                   . "</tr>"; 
                        }                        
                    ?>                   
                    
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Unidade</th>
                                <th>Função</th>
                                <th>CH</th>
                                <th>Registra Ponto</th>
                                <td>Início</td>
                                <td>Fim</td>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <?=$linhasLotacoes?>
                            
                        </tbody>
                    </table>
                    
                   
                    <a class="card-link" href="/lotacao/cadastro?id=<?= $funcionario->getId();?>">Inserir Lotação</a>     
                     
                </div>
              </div>
            </div>
          </div>
       </div>
       </div>
           
    </main>

