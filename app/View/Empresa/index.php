    <?php
    
    use Lib\SubNavPrimicipalDashboard; 
    use App\Repositorios\RepositorioEmpresa;
    use App\Models\Empresa;
    use App\Repositorios\RepositorioEndereco;
    use App\Models\Endereco;
    
    $subNav = new SubNavPrimicipalDashboard();
    $repositorioEmpresa = new RepositorioEmpresa();
    $empresa = new Empresa();
    $empresa = $repositorioEmpresa->getEmpresa($_SESSION['id_empresa']);
    $endereco = new Endereco();
    $repositorioEndereco = new RepositorioEndereco();
    $endereco = $repositorioEndereco->getEndereco($empresa->getId_endereco());
    
    ?>
    <main class="app-content">
        
        <?= $subNav->getSubNav(); ?>
              
      <!-- Containers-->
      <div class="tile mb-4">
       <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 class="mb-3 line-head" id="containers">Detalhes</h2>
            </div>
          </div>
        </div>       
               
      <div class="row">
          <div class="col-lg-12">
            <div class="bs-component">                            
              <div class="card mb-3 border-success">
                
                <div class="card-body">                
                    
                       <dl class="dl-horizontal">
                            <dt>
                                Nome:
                            </dt>
                            <dd>
                                <?= $empresa->getNome(); ?>
                            </dd>
                            <dt>
                                Nome Fantasia:
                            </dt>
                            <dd>
                                <?= $empresa->getNome_fantasia(); ?>
                            </dd>
                            <dt>
                                CNPJ:
                            </dt>
                            <dd>
                                <?= $empresa->getCnpj(); ?>
                            </dd>
                            <dt>
                                Endereço:
                            </dt>
                            <dd>
                                <?php
                                
                                    $endereco_ = $endereco->getLogradouro();
                                    $endereco_ = $endereco->getNumero() != "" ? $endereco_ . ", " . $endereco->getNumero() : $endereco_ . ", S/N";
                                    $endereco_ = $endereco->getComplemento() != "" ? $endereco_ . ", " . $endereco->getComplemento() : $endereco_ . "";
                                    $endereco_ = $endereco->getBairro() != "" ? $endereco_ . " - " . $endereco->getBairro() : $endereco_ . "";
                                    $endereco_ = $endereco->getCep() != "" ? $endereco_ . " - CEP:  " . $endereco->getCep() : $endereco_ . "";
                                    $endereco_ = $endereco->getCidade() != "" ? $endereco_ . " - " . $endereco->getCidade() : $endereco_ . "";
                                    $endereco_ = $endereco->getUf() != "" ? $endereco_ . " - " . $endereco->getUf() : $endereco_ . "";
                                    echo $endereco_;
                                ?>
                            </dd>   
                            <dt>
                                Telefone:
                            </dt>
                            <dd>
                                <?= $endereco->getTelefone(); ?>
                            </dd>  
                            <dt>
                                Celular:
                            </dt>
                            <dd>
                                <?= $endereco->getCelular(); ?>
                            </dd>
                            <dt>
                                E-Mail:
                            </dt>
                            <dd>
                                <?= $endereco->getEmail(); ?>
                            </dd>
                       </dl>
                    <a class="card-link" href="/empresa/edicao?id=<?= $empresa->getId_empresa();?>">Editar</a>                  
                </div>
                
              </div>                           
            </div>
          </div>
          
        </div>
      </div>
    </main>
    