<?php

  //  Título de la página.
  $page_title = 'Editar categoría';
  require_once('../../controladores/cargador.php');
  // Verfificar el nivel del usuario.
  page_require_level(1);
?>
<?php
  // Mostrar todas las categorías.
  $categorie = find_by_id('categories',(int)$_GET['id']);
  if(!$categorie){
    $session->msg("d","Missing categorie id.");
    redirect('categorias.php');
  }
?>

<?php
if(isset($_POST['edit_cat'])){
  $req_field = array('categorie-name');
  validate_fields($req_field);
  $cat_name = remove_junk($db->escape($_POST['categorie-name']));
  if(empty($errors)){
        $sql = "UPDATE categories SET name='{$cat_name}'";
       $sql .= " WHERE id='{$categorie['id']}'";
     $result = $db->query($sql);
     if($result && $db->affected_rows() === 1) {
       $session->msg("s", "Successfully updated Categorie");
       redirect('../leer_coleccion/categorias.php',false);
     } else {
       $session->msg("d", "Sorry! Failed to Update");
       redirect('../leer_coleccion/categorias.php',false);
     }
  } else {
    $session->msg("d", $errors);
    redirect('../leer_coleccion/categorias.php',false);
  }
}
?>
<?php 

  // Estructura DOM del encabezado.
  include_once('../../../../cliente/planta/encabezado.php'); ?>

<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
   <div class="col-md-5">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>Editar <?php echo remove_junk(ucfirst($categorie['name']));?></span>
        </strong>
       </div>
       <div class="panel-body">
         <form method="post" action="../editar_registro/editar_categoria.php?id=<?php echo (int)$categorie['id'];?>">
           <div class="form-group">
               <input type="text" class="form-control" name="categorie-name" value="<?php echo remove_junk(ucfirst($categorie['name']));?>">
           </div>
           <button type="submit" name="edit_cat" class="btn btn-primary">Actualizar categoría</button>
       </form>
       </div>
     </div>
   </div>
</div>


<?php 
include_once('../../../../cliente/planta/pie_pagina.php'); ?>
