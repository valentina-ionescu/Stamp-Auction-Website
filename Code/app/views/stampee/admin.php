<?php
if(isset($_SESSION['Usager']) && $_SESSION['role'] == 1 ) {
RequirePage::getView('stampee/headerAdmin', $data);
// print_r($data['pays'][0]);
    // var_dump($_SESSION);
?>
 <div class="main_container">


<section class="main_section">
<h1>Admin </h1>
<div class="task_pannel">
    <a href="Timbre/timbreListe" class="btn link_block"><i class="fas fa-list"> </i>  Timbres </a>
    <a href="Enchere/enchereListe" class="btn link_block"><i class="fas fa-list"> </i> Encheres</a>
    <a href="User/userList" class="btn link_block"  ><i class="fas fa-user-cog"> </i> Utilisateurs</a>
</div>

</section>

</div>
    
    <?php RequirePage::getView('stampee/footerAdmin', $data); 
    
} else{
    RequirePage::redirect('accueil', $data);    
}?>

