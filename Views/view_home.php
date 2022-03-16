<?php
require('view_begin.php');
?>
<form action = "?controller=home&action=upload" method="post" enctype="multipart/form-data">
   <label >Format accepté : JPEG, PNG, JPG et GIF. Taille max : 2MB</label>
<input type="file" name="fichier" accept="image/png, image/jpeg, image/jpg, image/gif"> <!-- Accept uniquement des png jpeg jpg et gif -->
				<input type="submit" value="Envoyer"/>
            </form>
<?php
require('view_end.php');
?>
