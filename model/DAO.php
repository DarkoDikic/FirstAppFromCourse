<?php
require_once '../config/db.php';

class DAO{
	private $db;
	/*
	private $GETLASTNPROIZVODJAC ="SELECT * FROM proizvodjac ORDER BY imepr ASC LIMIT ?";
	
	private $SELECT_VOZILA_PO_PROIZVODJACU="SELECT * FROM vozilo WHERE imepro=?";
	
	private $SELECT_VOZILA_PO_ZEMLJI_POREKLA="SELECT vozilo.*,proizvodjac.zemljaporekla FROM vozilo JOIN proizvodjac ON vozilo.imepro=proizvodjac.imepr WHERE proizvodjac.zemljaporekla=?";
	
	private $SELECT_VOZILA_PO_TRAJANJU_KATEGORIJE="SELECT vozilo.*, kategorije.* FROM vozilo JOIN kategorije ON vozilo.kategorija=kategorije.kategorija WHERE kategorije.trajanje=?";
	
	//upit vise prema vise 
	private $SELECT_VOZILA_PO_VOZACU="SELECT vozilo.*,vozacvozilo.*,vozac.* FROM vozac JOIN vozacvozilo ON vozac.idvoz=vozacvozilo.idvoz JOIN vozilo ON vozacvozilo.idvzl=vozilo.idvzl WHERE vozac.idvoz=?";
	*/
	
	private $GET_PROIZVODJACI ="SELECT * FROM proizvodjac ORDER BY imepr ASC";
	private $GET_KATEGORIJE ="SELECT * FROM kategorije ORDER BY kategorija ASC";
	private $INSERT_VOZILO ="INSERT INTO vozilo(imepro, model, kategorija, godiste, kubikaza, cena) VALUES (?,?,?,?,?,?)";
	
	//cas20
	private $GET_VOZACI="SELECT * FROM vozac ORDER BY ime ASC";
	private $GET_VOZILA="SELECT * FROM vozilo ORDER BY imepro ASC";
	private $INSERT_VOZACVOZILO="INSERT INTO vozacvozilo(idvzl, idvoz, vremedodele) VALUES (?,?,CURRENT_TIMESTAMP)";
	
	//cas21
	  private $INSERT_VOZAC = "INSERT INTO vozac(ime, prezime, godiste) VALUES (?,?,?)";
	  private $DELETE_VOZAC = "DELETE FROM vozac WHERE idvoz=?";
	  
	  //cas23
	  private $GET_VOZAC_BY_ID ="SELECT * FROM vozac WHERE idvoz=?";
	  private $UPDATE_VOZAC_BY_ID="UPDATE vozac SET ime=?, prezime=?, godiste=? WHERE idvoz=?";
	public function __construct(){
		
		$this->db =DB::createInstance();
		
	}
	/*
	public function getLastNProizvodjaca($n){
	
		$statement =$this->db->prepare($this->GETLASTNPROIZVODJAC);
		
		$statement->bindValue(1, $n, PDO::PARAM_INT); 
				
		$statement->execute();
		
		$result=$statement->fetchAll();
		return $result;
		
	} 
	
	public function selectVozilaPoProizvodjacu($n){
		
		$statement =$this->db->prepare($this->SELECT_VOZILA_PO_PROIZVODJACU);
		$statement->bindValue(1, $n); 
		$statement->execute();
		
		$result=$statement->fetchAll();
		return $result;
	}
	
	public function selectVozilaPoZemlji($n){
		
		$statement =$this->db->prepare($this->SELECT_VOZILA_PO_ZEMLJI_POREKLA);
		$statement->bindValue(1, $n); 
		$statement->execute();
		
		$result=$statement->fetchAll();
		return $result;
	}
	
	public function selectVozilaPoTrajanjuKategorije($n){
		
		$statement =$this->db->prepare($this->SELECT_VOZILA_PO_TRAJANJU_KATEGORIJE);
		$statement->bindValue(1, $n); 
		$statement->execute();
		
		$result=$statement->fetchAll();
		return $result;
	}
	
	public function selectVozilaPoVozacu($n){
		
		$statement =$this->db->prepare($this->SELECT_VOZILA_PO_VOZACU);
		$statement->bindValue(1, $n); 
		$statement->execute();
		
		$result=$statement->fetchAll();
		return $result;
	} */
	
	public function getProizvodjaci(){
	
		$statement =$this->db->prepare($this->GET_PROIZVODJACI);
	
		$statement->execute();
		
		$result=$statement->fetchAll();
		return $result;
		
	} 
	
		public function getKategorije(){
	
		$statement =$this->db->prepare($this->GET_KATEGORIJE);
	
		$statement->execute();
		
		$result=$statement->fetchAll();
		return $result;
		
	} 
	
	public function insertVozilo($imepro, $model, $kategorija, $godiste, $kubikaza, $cena){
	
	$statement =$this->db->prepare($this->INSERT_VOZILO);
	$statement->bindValue(1, $imepro);
	$statement->bindValue(2, $model);
	$statement->bindValue(3, $kategorija);
	$statement->bindValue(4, $godiste);
	$statement->bindValue(5, $kubikaza);
	$statement->bindValue(6, $cena);
	
		$statement->execute();
		
	} 
	
		public function getVozaci(){
	
		$statement =$this->db->prepare($this->GET_VOZACI);
	
		$statement->execute();
		
		$result=$statement->fetchAll();
		return $result;
		
	} 
	
	public function getVozila(){
	
		$statement =$this->db->prepare($this->GET_VOZILA);
	
		$statement->execute();
		
		$result=$statement->fetchAll();
		return $result;
		
	} 
	
	public function insertVozacVozilo($idvzl, $idvoz){
	
	$statement =$this->db->prepare($this->INSERT_VOZACVOZILO);
	$statement->bindValue(1, $idvzl);
	$statement->bindValue(2, $idvoz);
	
	$statement->execute();
		
	} 
	
  public function insertVozac($ime, $prezime, $godiste)
    {
        
        $statement = $this->db->prepare($this->INSERT_VOZAC);
        $statement->bindValue(1, $ime); 
        $statement->bindValue(2, $prezime); 
        $statement->bindValue(3, $godiste); 
         
            $statement->execute();
        
    
    }
    
  public function deleteVozac($idvoz)
    {
        $statement = $this->db->prepare($this->DELETE_VOZAC);
        $statement->bindValue(1, $idvoz); 
            $statement->execute();
       
    }
    
    	public function getVozacById($idvoz){
	
		$statement =$this->db->prepare($this->GET_VOZAC_BY_ID);
	  $statement->bindValue(1, $idvoz); 
		$statement->execute();
		
		$result=$statement->fetch();
		return $result;
		
	} 
   
	 	public function updateVozacById($ime, $prezime, $godiste, $idvoz){
	
		$statement =$this->db->prepare($this->UPDATE_VOZAC_BY_ID);
	  $statement->bindValue(1, $ime); 
	  	  $statement->bindValue(2, $prezime); 
	  	  	  $statement->bindValue(3, $godiste); 
	  	  	  	  $statement->bindValue(4, $idvoz); 
	  
	  
		$statement->execute();
		
		
		
	} 
}