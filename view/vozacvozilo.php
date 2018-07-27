<?php
require_once '../model/DAO.php';

$dao=new DAO();

$listavozaca=$dao->getVozaci();

$listavozila=$dao->getVozila();


?>

<html>
<head>

</head>
<body>

<br>
<form action="routes.php" method="get" align="center">
<h3>Odaberite vozilo</h3>
<select name="idvzl">
<option></option>
<?php 
foreach ($listavozila as $pom) {
?>
<option value="<?php echo $pom['idvzl']?>"><?php echo "$pom[imepro] $pom[model] $pom[godiste]"?></option>
<?php }?>
</select>


<h3>Odaberite vozaca</h3>
<select name="idvoz">
<option></option>
<?php 
foreach ($listavozaca as $pom) {
?>
<option value="<?php echo $pom['idvoz']?>"><?php echo "$pom[ime] $pom[prezime] $pom[godiste]"?></option>
<?php }?>
</select>
<br><br>
<input type="submit" name="page" value="insertvozacvozilo">


</form>

</body>


</html>