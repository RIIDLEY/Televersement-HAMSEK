<?php

class Controller_home extends Controller{

  public function action_home(){
    $this->render('home');
  }

  public function action_default(){
    $this->action_home();
  }

  public function action_upload(){
    $maxsize = 2097152;
    
    if(!empty($_FILES['fichier']))
    {

      if(($_FILES['fichier']['size'] >= $maxsize) || ($_FILES["fichier"]["size"] == 0)) {
        echo '<script type="text/javascript">alert("L\'image est trop lourde (> 2MB)")</script>';
        $this->action_home();

      }else{
        $m = Model::getModel();
        var_dump($_FILES['fichier']);
        $nom = $_FILES['fichier']['tmp_name'];
        $nomdestination = 'Upload/'.$_FILES['fichier']['name'];
        move_uploaded_file($nom, $nomdestination);
        $this->action_home();
      }

    }else{
         $this->action_home();
    }
  }
}

?>
