<?php 



class sanitize extends connection{

function sanitize_new_string($str)
{
  
	if(trim($str) == "")
	{
		return $str;
	}
	{
		$str=trim($str);
		$str = str_replace("%", '', $str);
		$str = str_replace("%", '', $str);
		$str = str_replace("#", '', $str);
	    $str = str_replace("'", '', $str);
	    $str = str_replace(";", ' ', $str);
	    $str = str_replace("<", ' ', $str);
	    $str = str_replace(">", ' ', $str);
	    $str = str_replace("(", ' ', $str);
	    $str = str_replace(")", ' ', $str);
	    $str = str_replace(")", ' ', $str);
	    $str = str_replace("alert(", ' ', $str);
	    $str = str_replace("<script", ' ', $str);
	    $str = str_replace('"', '', $str);
	    //$str = str_replace("/", '', $str);
	    $str = str_replace("\\", '', $str);
	    $fin_string=mysqli_real_escape_string($this->conn,$str);
	    return $fin_string;
	}

}

function sanitize_new_remove_space($str)
{
	$str=trim($str);
	$str = str_replace(' ','', $str);
	return $str;
}

function sanitize_new_cms($str)
{
	  if(trim($str) == "")
    {
        return $str;
    }
    else
    {
        $str=trim($str);
        
        $str1=str_replace("< script", ' ', $str);
        $str2=str_replace("<script", ' ', $str1);
        $str3=str_replace("</script", ' ', $str2);
        $str4=str_replace("alert(", ' ', $str3);
        $fin_string=mysqli_real_escape_string($this->conn,$str4);
        
        
        return $fin_string;
    }

}



function sanitize_new_file($str)
{
	  if(trim($str) == "")
    {
        return $str;
    }
    else
    {
        $newstr = preg_replace('/[^a-zA-Z-0-9 _.,@%-\']/', '', $str);
        $newstr = str_replace("'", '', $newstr);
        $newstr = str_replace("-", '', $newstr);
        $newstr = str_replace(" ",'', $newstr);
        $fin_string=mysqli_real_escape_string($this->conn,$newstr);
        return $fin_string;
    }

}



function sanitize_new_int($input_data)
{

       if(trim($input_data) != "")
	  	{
			if(is_numeric($input_data))
		  	{
			    $input=mysqli_real_escape_string($this->conn,$input_data);		
		  	    return $input;
		  	}
		  	else 
		  	{
		  		die("ACCESS IS DENIED INT1");
		  		exit();
		  	}
	  	}
	  	else 
	  	{
	  		return $input_data;
	  	}
}





function sanitize_new_upload_file_check($tmpfilename,$filename)
{

	
	$finfo = finfo_open(FILEINFO_MIME_TYPE);
   $file_extenstion=finfo_file($finfo, $tmpfilename);
    finfo_close($finfo);
    //$whitelist = array('application/pdf','image/png','image/jpeg','image/gif','application/msword');
   	
   	$whitelist = array('application/pdf','image/png','image/jpeg','application/octet-stream','application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/msword');
   	if (!in_array($file_extenstion, $whitelist)) 
   	{
   	  die("Uploaded File is not in correct format Please contact to administrator");
   	  exit();
   	} 
   	else 
   	{
   	 
   	   
		if(preg_match('/\.php|.exe|.asp|.htm|.html|\.js|.xml|.json|.phtml|.phtm|\.sh|\.bak|\.ini|\.inc|\.bin|.cmd|.msi|.rar|.zip|.cmd|.apk|.WIDGET|.SCRIPT|.ACTION\b/',$filename))
		{
		     die("Uploaded File is not in correct format Please contact to administrator2");
   	         exit();
		} 
		else 
		{
		    //echo "success";
		}
   		//echo "Mime type is ".$file_extenstion;//test
   		//die();
   		return true;
   		
   	}
} 

function sanitize_new_upload_image_check($tmpfilename,$filename)
{

	
	$finfo = finfo_open(FILEINFO_MIME_TYPE);
   $file_extenstion=finfo_file($finfo, $tmpfilename);
    finfo_close($finfo);
    //$whitelist = array('application/pdf','image/png','image/jpeg','image/gif','application/msword');
   	
   	$whitelist = array('image/jpg','image/png','image/jpeg');
   	if (!in_array($file_extenstion, $whitelist)) 
   	{
   	  die("Uploaded File is not in correct format. Please contact to administrator");
   	  exit();
   	} 
   	else 
   	{
   	 
   	   
		if(preg_match('/\.php|.exe|.asp|.htm|.html|\.js|.xml|.json|.phtml|.phtm|\.sh|\.bak|\.ini|\.inc|\.bin|.cmd|.msi|.rar|.zip|.cmd|.apk|.WIDGET|.SCRIPT|.ACTION\b/',$filename))
		{
		     die("Uploaded File is not in correct format. Please contact to administrator2");
   	         exit();
		} 
		else 
		{
		    //echo "success";
		}
   		
   		return true;
   		
   	}
} 



function sanitize_new_upload_file_check_mis($tmpfilename,$filename)
{

	
	$finfo = finfo_open(FILEINFO_MIME_TYPE);
     $file_extenstion=finfo_file($finfo, $tmpfilename);
    finfo_close($finfo);
    //$whitelist = array('application/pdf','image/png','image/jpeg','image/gif','application/msword');
   	
   	$whitelist = array('application/pdf','image/png','image/jpeg','application/octet-stream','application/vnd.ms-excel','application/msword');
   	if (!in_array($file_extenstion, $whitelist)) 
   	{
   	  die("Uploaded File is not in correct format. Please contact to administrator");
   	  exit();
   	} 
   	else 
   	{
   	 
   	   
		if(preg_match('/\.php|.exe|.asp|.htm|.html|\.js|.xml|.json|.phtml|.phtm|\.sh|\.bak|\.ini|\.inc|\.bin|.cmd|.msi|.rar|.zip|.cmd|.apk|.WIDGET|.SCRIPT|.ACTION\b/',$filename))
		{
		     die("Uploaded File is not in correct format. Please contact to administrator2");
   	         exit();
		} 
		else 
		{
		    //echo "success";
		}
   		//echo "Mime type is ".$file_extenstion;//test
   		//die();
   		return true;
   		
   	}
} 


}

?>