<?php

class Controller_home extends Controller{

  public function action_home(){
    $this->render('home');
  }

  public function action_default(){//fonction appele par defaut
    $this->action_home();//appel la fonction action_home
  }

  public function action_upload(){
    $maxsize = 2097152;
    
    if(!empty($_FILES['fichier']))
    {

      if(($_FILES['fichier']['size'] >= $maxsize) || ($_FILES["fichier"]["size"] == 0)) {// si la taille du fichier est superieur à 2MB
        echo '<script type="text/javascript">alert("L\'image est trop lourde (> 2MB)")</script>';//met une pop up
        $this->action_home();//redirige vers la page principale

      }else{
        $m = Model::getModel();//recupere le modele (la base de données)
        
        $tmp_nom = $_FILES['fichier']['tmp_name'];

        $m->addNewFile($_FILES['fichier']['name']);//ajoute le fichier à la BDD
        move_uploaded_file($tmp_nom, 'Upload/'.$_FILES['fichier']['name']);//ajoute le fichier à dossier de stockage du serveur

        $this->action_home();
      }

    }else{
         $this->action_home();
    }
  }
}

?>
