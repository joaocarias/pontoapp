 <?php 
 
 use Lib\SubNavPrimicipalDashboard;
 use Lib\Form;
 use App\Models\Funcionario;
 use App\Repositorios\RepositorioFuncionario;
 use App\Models\Pessoa;
 use App\Repositorios\RepositorioPessoa;
 
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
        $pessoa = $repositorioPessoa->getPessoa($funcionario->id_pessoa);
        
    }
      
      ?>
      
    </main>

