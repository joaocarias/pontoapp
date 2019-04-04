        <?php
    
    use Lib\SubNavPrimicipalDashboard;
    
    $subNav = new SubNavPrimicipalDashboard();
    
    ?>
    <main class="app-content">
        
              <?= $subNav->getSubNav(); ?>
        
    
    </main>
   