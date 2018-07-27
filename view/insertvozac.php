<?php
$ime= isset($_POST['ime'])? $_POST['ime']:"";
$prezime= isset($_POST['prezime'])? $_POST['prezime']:"";
$godiste= isset($_POST['godiste'])? $_POST['godiste']:"";
        
$errors= isset($errors)? $errors: array();
  $msg =isset($msg)? $msg: "";
  
  

?>
<html>
<body>
<form action="routes.php" method="get">

<input type="text" name="ime" placeholder="unesite ime" value="<?php echo $ime?>"><span style="color:red"> <?php  if(array_key_exists('ime', $errors))echo $errors['ime']?><br><br>

<input type="text" name="prezime" placeholder="prezime" value="<?php echo $prezime?>"><span style="color:red"> <?php  if(array_key_exists('prezime', $errors))echo $errors['prezime']?><br><br>

<input type="text" name="godiste" placeholder="godiste vozaca" value="<?php echo $godiste?>"><span style="color:red"> <?php  if(array_key_exists('godiste', $errors))echo $errors['godiste']?><br><br>

<input type="submit" name="page" value="insertvozac">


</form>

<?php echo $msg;?>
</body>

</html>