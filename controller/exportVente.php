<?
$dbhost = "sql324.main-hosting.eu";
$dbname = "u662427607_Stock_mava";
$dbuser = "u662427607_adminMava";
$dbpswd = "PasswordMavaAdmin1";


$db = new mysqli($dbhost, $dbuser, $dbpswd, $dbname);

// check conn 

if($db->connect_error){
    die("connexion error : ".$db->connect_error);
}


        //Function filter data 
        function filterData(&$str){ 
            $str = preg_replace("/\t/", "\\t", $str); 
            $str = preg_replace("/\r?\n/", "\\n", $str); 
            if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
        } 

        // Excel file name for download 
        $fileName = "ventesDuJour_" . date('Y-m-d') . ".xls"; 
        
        // Column names 
        $fields = array('nom','prix'); 
        
        // Display column names as first row 
        $excelData = implode("\t", array_values($fields)) . "\n"; 
        
        // Fetch records from database 
        $ventes= $db->query("SELECT * FROM Vente "); 

        if($ventes->num_rows > 0){ 
            // Output each row of the data 
            while($row = $ventes->fetch_assoc()){ 
                $lineData = array(str_replace("\"","",iconv('UTF-8','ASCII//TRANSLIT',$row['nom'])), $row['prix']); 
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
        

        /** TODO   Send mail*/
                /* 
                //$filename = 'myfile';
                $path = 'your path goes here';
                $file = $excelData;
            
                $mailto = 'mikael.kombia@gmail.com';
                $subject = 'Subject';
                $message = 'Vente du JOUR';
            
            // $content = file_get_contents($file);
            // $content = chunk_split(base64_encode($content));
            $content = $file;

            
                // a random hash will be necessary to send mixed content
                $separator = md5(time());
            
                // carriage return type (RFC)
                $eol = "\r\n";
            
                // main header (multipart mandatory)
                $headers = "From: name <test@test.com>" . $eol;
                $headers .= "MIME-Version: 1.0" . $eol;
                //$headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
                $headers .= "Content-Type:  application/vnd.ms-excel; boundary=\"" . $separator . "\"" . $eol;
                $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
                $headers .= "This is a MIME encoded message." . $eol;
            
                // message
                $body = "--" . $separator . $eol;
                $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
                $body .= "Content-Transfer-Encoding: 8bit" . $eol;
                $body .= $message . $eol;
            
                // attachment
                $body .= "--" . $separator . $eol;
                $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
                $body .= "Content-Transfer-Encoding: base64" . $eol;
                $body .= "Content-Disposition: attachment" . $eol;
                $body .= $content . $eol;
                $body .= "--" . $separator . "--";
            
                //SEND Mail
                if (mail($mailto, $subject, $body, $headers)) {
                    echo "mail send ... OK"; // or use booleans here
                } else {
                    echo "mail send ... ERROR!";
                    print_r( error_get_last() );
                } */
        exit;
?>