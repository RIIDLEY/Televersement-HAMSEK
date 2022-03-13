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
        
        $tmp_nom = $_FILES['fichier']['tmp_name'];

        $m->addNewFile($_FILES['fichier']['name']);
        move_uploaded_file($tmp_nom, 'Upload/'.$_FILES['fichier']['name']);

        $this->action_home();
      }

    }else{
         $this->action_home();
    }
  }
}

?>
