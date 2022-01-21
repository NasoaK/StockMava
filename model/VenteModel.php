<?php

require_once 'Vente.php';


class VenteModel
{

    private function getPDO()
    {
        return new PDO('mysql:host=sql324.main-hosting.eu;dbname=u662427607_Stock_mava','u662427607_adminMava','PasswordMavaAdmin1');
       
    }

    //Get all article 

    public function getVentes(){
        //connect to db
        $pdo = $this->getPDO();
        // Query the db
        $ventes= $pdo->query("SELECT * FROM Vente");
        $pdo = null;
        // Fetch and return
        return $ventes->fetchAll(PDO::FETCH_CLASS, 'Vente');

        $today = date("G");  // 17:00

    }


    public function exportExcel(){

        $pdo = $this->getPDO();

        //Function filter data 
        function filterData(&$str){ 
            $str = preg_replace("/\t/", "\\t", $str); 
            $str = preg_replace("/\r?\n/", "\\n", $str); 
            if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
        } 

        // Excel file name for download 
        //$fileName = "ventesDuJour_" . date('Y-m-d') . ".xls"; 
          $fileName = "Test.xls"; 
        
        // Column names 
        $fields = array('nom','prix'); 
        
        // Display column names as first row 
        $excelData = implode("\t", array_values($fields)) . "\n"; 
        
        // Fetch records from database 
        $ventes= $pdo->query("SELECT * FROM Vente ORDER BY nom ASC"); 
        if($query->num_rows > 0){ 
            // Output each row of the data 
            while($row = $query->fetch_assoc()){ 
                $status = ($row['status'] == 1)?'Active':'Inactive'; 
                $lineData = array($row['nom'], $row['prix'],$status); 
                array_walk($lineData, 'filterData'); 
                $excelData .= implode("\t", array_values($lineData)) . "\n"; 
            } 
        }else{ 
            $excelData .= 'No records found...'. "\n"; 
        } 
        
        // Headers for download 
        header("Content-Type: application/vnd.ms-excel"); 
        header("Content-Disposition: attachment; filename=\"$fileName\""); 
        
        // Render excel data 
        echo $excelData; 

        $pdo = null;
        
        exit;

    }

}
    ?>