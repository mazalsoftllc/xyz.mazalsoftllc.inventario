<?php

/* Encapsulación de la información básica de un contenido multimedia. */
class  Media {

  /* Campos de la clase Media. */
  public $imageInfo;
  public $fileName;
  public $fileType;
  public $fileTempPath;
  //Set destination for upload
  public $userPath = SITE_ROOT.DS.'..'.DS.'..'.DS.'memoria/persistente/almacenamiento-usuario/imagenes';
  public $productPath = SITE_ROOT.DS.'..'.DS.'uploads/products';


  /* Colecciones de la clase Media. */ 
  
  /* Colecciones para identificar los errores. */
  public $errors = array();
  public $upload_errors = array(
    0 => 'No hay ningún error, el archivo subió con éxito',
    1 => 'El archivo cargado excede la directiva upload_max_filesize en php.ini',
    2 => 'El archivo cargado excede la directiva MAX_FILE_SIZE que se especificó en el formulario HTML',
    3 => 'El archivo subido solo se cargó parcialmente',
    4 => 'ningun archivo fue subido',
    6 => 'No se pudo escribir el archivo en el disco.',
    8 => 'Una extensión de PHP detuvo la carga del archivo.'> 'Falta una carpeta temporal',
    7 
  );
  
  /* Colección para identificar las extensiones de los tipos de archivo multimedia. */
  public$upload_extensions = array(
   'gif',
   'jpg',
   'jpeg',
   'png',
  );
  
  /* Funciones de la clase Media.
  */
  public function file_ext($filename){
     $ext = strtolower(substr( $filename, strrpos( $filename, '.' ) + 1 ) );
     if(in_array($ext, $this->upload_extensions)){
       return true;
     }
   }
  
  /* Función que permite subir un archivo multimedia. */
  public function upload($file)
  {
    if(!$file || empty($file) || !is_array($file)):
      $this->errors[] = "Ningún archivo fue subido.";
      return false;
    elseif($file['error'] != 0):
      $this->errors[] = $this->upload_errors[$file['error']];
      return false;
    elseif(!$this->file_ext($file['name'])):
      $this->errors[] = 'Formato de archivo no correcto ';
      return false;
    else:
      $this->imageInfo = getimagesize($file['tmp_name']);
      $this->fileName  = basename($file['name']);
      $this->fileType  = $this->imageInfo['mime'];
      $this->fileTempPath = $file['tmp_name'];
     return true;
    endif;

  }

 /* Proceso de carga. */
 public function process(){

    if(!empty($this->errors)):
      return false;
    elseif(empty($this->fileName) || empty($this->fileTempPath)):
      $this->errors[] = "La ubicación del archivo no estaba disponible.";
      return false;
    elseif(!is_writable($this->productPath)):
      $this->errors[] = $this->productPath." Must be writable!!!.";
      return false;
    elseif(file_exists($this->productPath."/".$this->fileName)):
      $this->errors[] = "El archivo {$this->fileName} ya existe.";
      return false;
    else:
     return true;
    endif;
 }
 /*--------------------------------------------------------------*/
 /* Función para Procesar archivo multimedia
 /*--------------------------------------------------------------*/
  public function process_media(){
    if(!empty($this->errors)){
        return false;
      }
    if(empty($this->fileName) || empty($this->fileTempPath)){
        $this->errors[] = "La ubicación del archivo no estaba disponible.";
        return false;
      }

    if(!is_writable($this->productPath)){
        $this->errors[] = $this->productPath." Debe ser escribible!.";
        return false;
      }

    if(file_exists($this->productPath."/".$this->fileName)){
      $this->errors[] = "El archivo {$this->fileName} ya existe.";
      return false;
    }

    if(move_uploaded_file($this->fileTempPath,$this->productPath.'/'.$this->fileName))
    {

      if($this->insert_media()){
        unset($this->fileTempPath);
        return true;
      }

    } else {

      $this->errors[] = "La carga del archivo falló, posiblemente debido a permisos incorrectos en la carpeta de carga.";
      return false;
    }

  }
  /*--------------------------------------------------------------*/
  /* Función para Procesar imagen de usuario
  /*--------------------------------------------------------------*/
 public function process_user($id){

    if(!empty($this->errors)){
        return false;
      }
    if(empty($this->fileName) || empty($this->fileTempPath)){
        $this->errors[] = "La ubicación del archivo no estaba disponible.";
        return false;
      }
    if(!is_writable($this->userPath)){
        $this->errors[] = $this->userPath." Must be writable!!!.";
        return false;
      }
    if(!$id){
      $this->errors[] = " ID de usuario faltante.";
      return false;
    }
    $ext = explode(".",$this->fileName);
    $new_name = randString(8).$id.'.' . end($ext);
    $this->fileName = $new_name;
    if($this->user_image_destroy($id))
    {
    if(move_uploaded_file($this->fileTempPath,$this->userPath.'/'.$this->fileName))
       {

         if($this->update_userImg($id)){
           unset($this->fileTempPath);
           return true;
         }

       } else {
         $this->errors[] = "La carga del archivo falló, posiblemente debido a permisos incorrectos en la carpeta de carga.";
         return false;
       }
    }
 }
 /*--------------------------------------------------------------*/
 /* Función para Actualizar imagen de usuario
 /*--------------------------------------------------------------*/
  private function update_userImg($id){
     global $db;
      $sql = "UPDATE users SET";
      $sql .=" image='{$db->escape($this->fileName)}'";
      $sql .=" WHERE id='{$db->escape($id)}'";
      $result = $db->query($sql);
      return ($result && $db->affected_rows() === 1 ? true : false);

   }
 /*--------------------------------------------------------------*/
 /* Función para eliminar imagen antigua
 /*--------------------------------------------------------------*/
  public function user_image_destroy($id){
     $image = find_by_id('users',$id);
     if($image['image'] === 'no_image.jpg')
     {
       return true;
     } else {
       unlink($this->userPath.'/'.$image['image']);
       return true;
     }

   }
/*--------------------------------------------------------------*/
/* Función para insertar imagen multimedia
/*--------------------------------------------------------------*/
  private function insert_media(){

         global $db;
         $sql  = "INSERT INTO media ( file_name,file_type )";
         $sql .=" VALUES ";
         $sql .="(
                  '{$db->escape($this->fileName)}',
                  '{$db->escape($this->fileType)}'
                  )";
       return ($db->query($sql) ? true : false);

  }
/*--------------------------------------------------------------*/
/* Función para eliminar medios por id.
/*--------------------------------------------------------------*/
   public function media_destroy($id,$file_name){
     $this->fileName = $file_name;
     if(empty($this->fileName)){
         $this->errors[] = "Falta el nombre del archivo de la foto.";
         return false;
       }
     if(!$id){
       $this->errors[] = "Falta identificación con foto.";
       return false;
     }
     if(delete_by_id('media',$id)){
         unlink($this->productPath.'/'.$this->fileName);
         return true;
     } else {
       $this->error[] = "No se pudo eliminar la foto o falta Prm.";
       return false;
     }

   }



}


?>
