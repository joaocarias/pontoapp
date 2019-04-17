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
                     <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td>Nome: <strong> <?= $empresa->getNome(); ?> </strong></td>
                                <td>Nome Fantasia: <strong> <?= $empresa->getNome_fantasia(); ?></strong></td>
                            </tr>
                            <tr>
                                <td> CNPJ: <strong> <?= $empresa->getCnpj(); ?></strong></td>
                                        <td> Endereço: <strong>
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
                                                
                                </strong></td>
                            </tr>   
                            <tr>
                                <td>Telefone: <strong><?= $endereco->getTelefone(); ?></strong></td>
                                <td> Celular: <strong><?= $endereco->getCelular(); ?></strong></td>
                            </tr>
                            <tr>
                                <td>E-Mail: <strong><?= $endereco->getEmail(); ?></strong></td>
                                <td></td>
                        </tbody>
                     </table>
                    <a class="card-link" href="/empresa/edicao?id=<?= $empresa->getId_empresa();?>">Editar</a>                  
                </div>
                
              </div>                           
            </div>
          </div>
          
        </div>
      </div>
    </main>
    