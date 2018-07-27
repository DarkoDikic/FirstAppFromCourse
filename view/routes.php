<?php
require_once '../controller/Controller.php';

$controller = new Controller();

// u slucaju da ne stize nijedna akcija tj page setovali smo defaultni naziv da bude index
$pageGet=isset($_GET['page'])?$_GET['page']:"index";
$pagePost=isset($_POST['page'])?$_POST['page']:"index";

$page=($pageGet!='index')?$pageGet:$pagePost;


switch ($page){
	
	case 'index':
		$controller->index();
	break;
	
	case 'showinsert':
		$controller->showinsert();
	break;
	
	case 'insert':
		$controller->insert();
	break;
	
	case 'showvozacvozilo':
		$controller->showvozacvozilo();
	break;
	
	case 'insertvozacvozilo':
			$controller->insertvozacvozilo();
	break;
	
	case 'insertvozac':
			$controller->insertvozac();
	break;
	
	case 'showinsertvozac':
	$controller->showinsertvozac();
	break;
	
	case 'svivozaci':
	$controller->svivozaci();
	break;
	
	case 'svavozila':
	$controller->svavozila();
	break;
	
	case 'deletevozac':
	$controller->deletevozac();
	break;
	
	
	case 'showeditvozac':
	$controller->showeditvozac();
	break;
	
	case 'editvozac':
	$controller->editvozac();
	break;
	
   case 'registracija':
	$controller->registracija();
	break;
}