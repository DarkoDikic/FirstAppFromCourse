<?php


$listavozaca=isset($listavozaca)?$listavozaca:"";
//var_dump($listavozaca);

$idizmenjenog=isset($idizmenjenog)?$idizmenjenog:"";
?>
<html>
<head>

</head>
<body>
<h2>Svi vozaci</h2>

<table align="center" width="80%" border="2">
<tr>
<th>ID</th>
<th>IME</th>
<th>PREZIME</th>
<th>GODISTE</th>
<th colspan="2">AKCIJA</th>
</tr>

<?php foreach ($listavozaca as $pom) { 

	if($idizmenjenog==$pom['idvoz']){
	?>
<tr style="background:green; color:white; font-style:italic;">
<th><?php echo $pom['idvoz'];?></th>
<th><?php echo $pom['ime'];?></th>
<th><?php echo $pom['prezime'];?></th>
<th><?php echo $pom['godiste'];?></th>
<th><a href="routes.php?page=showeditvozac&idvoz=<?php echo $pom['idvoz'];?>">EDIT</a></th>
<th><a href="routes.php?page=deletevozac&idvoz=<?php echo $pom['idvoz'];?>">DELETE</a></th>
</tr>

<?php }else{?>	
<tr>
<th><?php echo $pom['idvoz'];?></th>
<th><?php echo $pom['ime'];?></th>
<th><?php echo $pom['prezime'];?></th>
<th><?php echo $pom['godiste'];?></th>
<th><a href="routes.php?page=showeditvozac&idvoz=<?php echo $pom['idvoz'];?>">EDIT</a></th>
<th><a href="routes.php?page=deletevozac&idvoz=<?php echo $pom['idvoz'];?>">DELETE</a></th>
</tr>
	
<?php 

     }
}
?>

</table>


</body>





</html>