<?php


require_once 'model/VenteModel.php';

class VenteController{

    private $_modeli;

    public function __construct(){
        $this->_modeli = new VenteModel();
    }

    public function handleVentes(){
        $ventes = $this->_modeli->getVentes();
      

        if(count($ventes)==0){
                
            $message = "No Ventes found.";
            require_once 'View/ErrorView.php';

        } else{
            
            //3. Pass the Article's list to the view
            require_once 'View/VentesDuJour.php';


            if(isset($_GET['hello'])){
                $this->_model->exportExcel();
            }
        }

    }


}