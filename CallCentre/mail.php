<? 
    $to = "chrisd@cdi.com.au"; 
    $from = "chrisd@cdi.com.au"; 
    $subject = "Hello! This is HTML email"; 

    $message = '<html><body bgcolor="#DCEEFC"><center><b>Looool!!! I am reciving HTML email......</b><br><font color="red">Thanks Chris!</font><br><a href="http://www.interacteducation.com.au">Interact</a></center><br><br>Now you Can send HTML Email<br>Regards<br>Chris Duffy</body></html>'; 

    $headers  = "From: " . $from . "Content-type: text/html\r\n"; 

    mail($to, $subject, $message, $headers); 

    echo "Message has been sent....!"; 
?> 