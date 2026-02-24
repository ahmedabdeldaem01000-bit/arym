<?php 
// phpinfo();
 
if (isset($_FILES['f'])) {
    var_dump($_FILES);
}
?>
<form method="post" enctype="multipart/form-data">
<input type="file" name="f">
<button>upload</button>
</form>