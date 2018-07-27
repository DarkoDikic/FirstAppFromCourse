<?php
require_once '../model/DAO.php';
echo "<h3>Insert vozilo</h3>";
$dao = new DAO();

$lista = $dao->getProizvodjaci();

$listakategorija = $dao->getKategorije();

//kupljenje message

// kada Controler salje promenljivu na stranu kupimo sa isset
$msg=isset($msg)?$msg:"";

$errors=isset($errors)?$errors:array();
?>

<html>
<body>
<h3>Unos vozila u bazu</h3>

<form action="routes.php">
<p>Odaberite proizvodjaca</p>
<select name="imepro">
<option></option>
<?php foreach ($lista as $pom) {	?>

<option><?php echo $pom['imepr']?></option>
<?php }?>
</select>
<span style="color:red;">*<?php if(array_key_exists('imepro', $errors)) echo $errors['imepro']?></span>
<br>
<br>
<input type="text" name="model" placeholder="model">
<br>
<br>
<select name="kategorija">
<option>Odaberite kategoriju</option>
<?php foreach ($listakategorija as $pom) {	?>

<option><?php echo $pom['kategorija']?></option>
<?php }?>
</select>

<br>
<br>
<input type="text" name="godiste" placeholder="godiste">
<br>
<br>
<input type="text" name="kubikaza" placeholder="kubikaza">
<br>
<br>
<input type="text" name="cena" placeholder="cena">
<br>
<br>
<input type="submit" name="page" value="insert">


</form>

<?php echo $msg;?>


</body>



</html>