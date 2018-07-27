<?php
$vozac=isset($vozac)?$vozac:"";

//var_dump($vozac);
$errors=isset($errors)?$errors:array();
var_dump($errors);
?>
<html>
<body>
<h1>Izmena vozaca</h1>
<form action="routes.php" method="post">

<input type="text" name="ime" value="<?php if(isset($vozac['ime'])) echo $vozac['ime'] ?>"><br><br>

<input type="text" name="prezime" value="<?php if(isset($vozac['prezime'])) echo $vozac['prezime'] ?>"><br><br>

<input type="text" name="godiste" value="<?php if(isset($vozac['godiste'])) echo $vozac['godiste'] ?>"><br><br>

<input type="hidden" name="idvoz" value="<?php if(isset($vozac['idvoz'])) echo $vozac['idvoz'] ?>">
<input type="submit" name="page" value="editvozac"><br><br>





</form>

<?php if (isset($msg)){

	echo $msg;
}?>

</body>


</html>