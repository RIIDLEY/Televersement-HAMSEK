<?php
require('view_begin.php');
?>
<form action = "?controller=home&action=upload" method="post" enctype="multipart/form-data">
<input type="file" name="fichier" accept="image/png, image/jpeg, image/jpg, image/gif">
				<input type="submit" value="Envoyer"/>
            </form>
<?php
require('view_end.php');
?>
