<?php


class megafunction extends connection{


function email($to1, $subject1, $message1, $cc ){

	$this->conn;
    $to = $to1;
        $subject = $subject1;
        //echo "string1";
        
        $message =  $message1;
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
        //echo "string3";
        // More headers
        $headers .= 'From: <hello@cerebrokids.com>' . "\r\n" . $cc;
        
        mail($to,$subject,$message, $headers);
   return true;
}

function email2($to2, $subject2, $message2, $cc2 ){

    $this->conn;
    $to = $to2;
        $subject = $subject2;
      
        
        $message =  $message2;
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
        
        // More headers
        $headers .= 'From: <hello@cerebrokids.com>' . "\r\n" . $cc2;
        
        mail($to,$subject,$message, $headers);
   return true;
}

function download($filename){
    $this->conn;
                    $f= $filename;   

                   $file = ("./ckpublic/$f");

                   $filetype=filetype($file);

                   $filename=basename($file);

                   header ("Content-Type: ".$filetype);

                   header ("Content-Length: ".filesize($file));

                   header ("Content-Disposition: attachment; filename=".$filename);

                   readfile($file);
                   die();

                   
    return true;                
}
}

?>
