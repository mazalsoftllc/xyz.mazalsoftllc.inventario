<?php

  // Título de la imagen.
  $page_title = 'Todas las imagenes';
  require_once('../../controladores/cargador.php');
  // Nivel requerido
  page_require_level(2);
?>
<?php $media_files = find_all('media');?>
<?php
  if(isset($_POST['submit'])) {
  $photo = new Media();
  $photo->upload($_FILES['file_upload']);
    if($photo->process_media()){
        $session->msg('s','La fotografía se subió con éxito.');
        redirect('imagen_producto.php');
    } else{
      $session->msg('d',join($photo->errors));
      redirect('imagen_producto.php');
    }

  }

?>
<?php include_once('../../../../cliente/planta/encabezado.php'); ?>
     <div class="row">
        <div class="col-md-6">
          <?php echo display_msg($msg); ?>
        </div>

      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading clearfix">
            <span class="glyphicon glyphicon-camera"></span>
            <span>Todas las fotos</span>
            <div class="pull-right">
              <form class="form-inline" action="imagen_producto.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-btn">
                    <input type="file" name="file_upload" multiple="multiple" class="btn btn-primary btn-file"/>
                 </span>

                 <button type="submit" name="submit" class="btn btn-default">Subir foto</button>
               </div>
              </div>
             </form>
            </div>
          </div>
          <div class="panel-body">
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center" style="width: 50px;">#</th>
                  <th class="text-center">Foto</th>
                  <th class="text-center">Nombre foto</th>
                  <th class="text-center" style="width: 20%;">Tipo de foto</th>
                  <th class="text-center" style="width: 50px;">Acciones</th>
                </tr>
              </thead>
                <tbody>
                <?php foreach ($media_files as $media_file): ?>
                <tr class="list-inline">
                 <td class="text-center"><?php echo count_id();?></td>
                  <td class="text-center">
                      <img src="<?php echo ROUTE_SERVER_HOST?>servidor/memoria/persistente/almacenamiento-producto/imagenes/<?php echo $media_file['file_name'];?>" class="img-thumbnail" />
                  </td>
                <td class="text-center">
                  <?php echo $media_file['file_name'];?>
                </td>
                <td class="text-center">
                  <?php echo $media_file['file_type'];?>
                </td>
                <td class="text-center">
                  <a href="../eliminar_registro/eliminar_imagen_producto.php?id=<?php echo (int) $media_file['id'];?>" class="btn btn-danger btn-xs"  title="Eliminar">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </td>
               </tr>
              <?php endforeach;?>
            </tbody>
          </div>
        </div>
      </div>
</div>


<?php include_once('../../../../cliente/planta/pie_pagina.php'); ?>
