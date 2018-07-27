<?php
require_once '../model/DAO.php';

class Controller{
	
	public function index(){
		include 'welcome.php';
	}
	
	public function showinsert(){
		include 'insertvozilo.php';
	}
	
	public function insert(){
		$imepro=isset($_GET['imepro'])?$_GET['imepro']:"";
		$model=isset($_GET['model'])?$_GET['model']:"";
		$kategorija=isset($_GET['kategorija'])?$_GET['kategorija']:"";
		$godiste=isset($_GET['godiste'])?$_GET['godiste']:"";
		$kubikaza=isset($_GET['kubikaza'])?$_GET['kubikaza']:"";
		$cena=isset($_GET['cena'])?$_GET['cena']:"";
		
		//prazan niz za greske
		$errors=array();
		
		if(empty($imepro)){
		$errors['imepro']='Morate odabrati proizvodjaca';
		}
		
	if(empty($model)){
		$errors['model']='Morate uneti model vozila.';
		}
		
	if(empty($kategorija)){
		$errors['kategorija']='Morate odabrati kategoriju vozila.';
		}
		
	if(empty($godiste)){
		$errors['godiste']='Morate uneti godiste vozila';
		}else{
			if(is_numeric($godiste)){
			    if($godiste>1940 || $godiste<2018){
				
			    }else{
				$errors['godiste']='Ne postoji odabrano godiste.';
			    }	
			}else{
				$errors['godiste']='Godiste mora biti numericka vrednost';
			}
		}
		
	if(empty($cena)){
		$errors['cena']='Morate uneti cenu vozila';
		}else{
			if(is_numeric($cena)){
			    if($cena>0){
				
			    }else{
				$errors['cena']='Ne postoji cena koju ste uneli.';
			    }	
				
			}else{
				$errors['cena']='Cena mora biti numericka vrednost';
			}
		}
		
	
	if(empty($kubikaza)){
		$errors['kubikaza']='Morate uneti kubikazu vozila';
		}else{
			if(is_numeric($kubikaza)){
			    if($kubikaza>6000 ||$kubikaza<49){
			    	
			    $errors['kubikaza']='Ne postoji kubikaza koju ste uneli';
			    } 	
				
			}else{
				$errors['kubikaza']='Kubikaza mora biti numericka vrednost';
			}
		}
		
		// proveravamo ako nije nastala nijedna greska onda radimo dalje
		var_dump($errors);
		if(count($errors)==0){
			//krajnji unos podataka
			
			$dao=new DAO();
			$dao->insertVozilo($imepro, $model, $kategorija, $godiste, $kubikaza, $cena);
			
			$msg="Uspesan unos";
			include 'insertvozilo.php';
			
			
		}else{
			$msg="Morate popuniti sva polja korektno.";
			include 'insertvozilo.php';
		}
		
		
}

public function showvozacvozilo(){
	include 'vozacvozilo.php';
}


	public function insertvozacvozilo(){
		$idvzl=isset($_GET['idvzl'])?$_GET['idvzl']:"";
			$idvoz=isset($_GET['idvoz'])?$_GET['idvoz']:"";
			
			if(!empty($idvoz)&&!empty($idvzl)){
				
				$dao=new DAO();
				$dao->insertVozacVozilo($idvzl, $idvoz);
				$msg="Uspesna dodela.";
				include 'vozacvozilo.php';
				
			}else{
				$msg="Morate odabrati i vozaca i vozilo.";
				include 'vozacvozilo.php';
			}
		
	}
	public function showinsertvozac(){
		include 'insertvozac.php';
	}
	
public function insertvozac(){
        
        $ime= isset($_GET['ime'])? $_GET['ime']:"";
        $prezime= isset($_GET['prezime'])? $_GET['prezime']:"";
        $godiste= isset($_GET['godiste'])? $_GET['godiste']:"";
        
        $errors= array();
        
        if(empty($ime))
        
        $errors['ime']='Morate popuniti ime';
        
            if(empty($prezime))
        
        $errors['prezime']='Morate popuniti prezime';
        
            if(empty($godiste)){
        
        $errors['godiste']='Morate popuniti godiste';
        
            }else{
                if(is_numeric($godiste)){

                    if($godiste<1960 || $godiste>= (2017-18))  // provera godista za vozaca
                    
                     $errors['godiste']='Godiste mora biti izmedju 1960 i 1999';     
                    
                }else{
                    
                $errors['godiste']='Godiste mora biti broj';
                }
            }
            // do ove linije sve bilo za greske 
            
            if(count($errors)==0){
                
                $dao=new DAO();
                $dao-> insertVozac($ime, $prezime, $godiste);
                $msg='Uspesan unos';    
                
            }else{
                $msg='Morate popuniti sva polja';
                
            }
                include 'insertvozac.php';
    }
    
    public function svivozaci(){
    	$dao=new DAO();
    	
    	$listavozaca=$dao->getVozaci();
    	include 'svivozaci.php';
    }
	
  public function svavozila(){
    	$dao=new DAO();
    	
    	$listavozila=$dao->getVozila();
    	include 'svavozila.php';
    }
    
    public function deletevozac(){
    	$idvoz=isset($_GET['idvoz'])?$_GET['idvoz']:"";
    	
    	if(!empty($idvoz)){
    	$dao=new DAO();
    	
    	$dao->deleteVozac($idvoz);
    	//ponovni prikaz liste posle brisanja
    	$listavozaca=$dao->getVozaci();
    	
    	}
    	include 'svivozaci.php';
    }
    
    public function showeditvozac(){
    	$idvoz=isset($_GET['idvoz'])?$_GET['idvoz']:"";
    	
    	if(!empty($idvoz)){
    		$dao=new DAO();
    		
    		$vozac=$dao->getVozacById($idvoz);
    		include 'editvozac.php';
    		
    		
    	}else{
    		$listavozaca=$dao->getVozaci();
    		$msg='nje postoji id';
    		include 'svivozaci.php';
    	}
    	
    	
    }
    
    public function editvozac(){
    	
    	$ime=isset($_POST['ime'])?$_POST['ime']:"";
    	$prezime=isset($_POST['prezime'])?$_POST['prezime']:"";
    	$godiste=isset($_POST['godiste'])?$_POST['godiste']:"";
    	$idvoz=isset($_POST['idvoz'])?$_POST['idvoz']:"";
    	
    $errors= array();
        
        if(empty($ime))
        
        $errors['ime']='Morate popuniti ime';
        
            if(empty($prezime))
        
        $errors['prezime']='Morate popuniti prezime';
        
            if(empty($godiste)){
        
        $errors['godiste']='Morate popuniti godiste';
        
            }else{
                if(is_numeric($godiste)){

                    if($godiste<1960 || $godiste>= (2018))  // provera godista za vozaca
                    
                     $errors['godiste']='Godiste mora biti izmedju 1960 i 1999';     
                    
                }else{
                    
                $errors['godiste']='Godiste mora biti broj';
                }
            }
            
     if(count($errors)==0){
                
                $dao=new DAO();
               $dao->updateVozacById($ime, $prezime, $godiste, $idvoz);
                $msg='Uspesno editovanje vozaca'; 
                   
                $listavozaca=$dao->getVozaci();
                
                //kupimo idvoz posle izmene u formi
                $idizmenjenog=isset($_POST['idvoz'])?$_POST['idvoz']:"";
                
                include 'svivozaci.php';
                
                
            }else{
                $msg='Morate popuniti sva polja';
                 // include 'editvozac.php';
            }
    	
    	
    	
    }
    
    public function registracija(){
    	
        $ime=isset($_POST['ime'])?$_POST['ime']:"";
    	$prezime=isset($_POST['prezime'])?$_POST['prezime']:"";
    	$email=isset($_POST['email'])?$_POST['email']:"";
    	$username=isset($_POST['username'])?$_POST['username']:"";
    	$password=isset($_POST['password'])?$_POST['password']:"";
    	
    	$errors= array();
        
        if(empty($ime))
        
            $errors['ime']='Morate popuniti ime';
        
        if(empty($prezime))
        
             $errors['prezime']='Morate popuniti prezime.';
             
        if(empty($email)){
        
             $errors['email']='Morate popuniti email.';
             
        }else{
           if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                 echo("$email je pravilno unet.");
           }else{
                 echo("Format email-a nije dobar.");
           }
        	
        	
        }
        
         if(empty($username))
        
            $errors['username']='Morate popuniti username.';
            
         if(empty($password))
        
            $errors['password']='Morate popuniti password';
          
           
            
     if(count($errors)==0){
    	
     }
    	
    	
    	
    }
    
    
}
	
