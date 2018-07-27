<?php


$listavozila=isset($listavozila)?$listavozila:"";

?>
<html>
<head>

</head>
<body>
<h2>Sva vozila</h2>

<table align="center" width="80%" border="2">
<tr>
<th>ID</th>
<th>IME</th>
<th>MODEL</th>
<th>GODISTE</th>
<th>KUBIKAZA</th>
<th>CENA</th>
</tr>

<?php foreach ($listavozila as $pom) {  ?>
<tr>
<th><?php echo $pom['idvzl'];?></th>
<th><?php echo $pom['imepro'];?></th>
<th><?php echo $pom['model'];?></th>
<th><?php echo $pom['godiste'];?></th>
<th><?php echo $pom['kubikaza'];?></th>
<th><?php echo $pom['cena'];?></th>
</tr>
	
<?php }?>

</table>


</body>





</html>