<?php
if(isset($_SESSION["email"]))  
 {  
    $email = $_SESSION['email'];
    $condition_arr = array(
                      'email'=>$email,
                    );
    $result = $data->getData('registration','*',$condition_arr); 
    if( $result > 0)
    {
     if($result[0]['status'] != 0)
      {
        header("location:index.php"); 
      }
    }

 }
 else
{
   header("location:index.php"); 
}
 
?>
