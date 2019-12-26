<?php
  include "../classes/Mainclass.php";
 Session::checkSession();
 
 $eventID;
 
 if (isset($_POST["eventID"]) && isset($_POST["token_label"]) && isset($_POST["token_number"]) && isset($_POST["token_color"])) {
   
     $eventID       = $_POST["eventID"];
     $token_label   = $_POST["token_label"];
     $token_number  = $_POST["token_number"];
     $token_color   = $_POST["token_color"];
     
     
 }
 else{
    echo "Invalid";
    return;
 }
 
 ?>


<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">

.page {
    width: 21cm;
    min-height: 29.7cm;
    padding: 1cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 256mm;
    outline: 2cm #FFEAEA solid;
}
.token{
    width: 7cm;
    min-height: 2.7cm;
    
}
.token-det{
    width: 2.5cm;
    padding-left: 2cm;
    padding-top: 0cm;
}
.token-det-img{
    width: 2cm;
    min-height: 2.7cm;
}

@page {
    size: A4;
    margin: 0;
}
@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
}
</style>
 
 
 </head>
 
 <body>
 
<?php
$eventName;
$eventLogo;
 
 if (class_exists('EventClass')) {
                    $event = new EventClass();
                    if (method_exists($event, 'getSingleEventInfo')) {
						$result = $event->getSingleEventInfo($eventID);
			
						if($result){
						    
							while ($row = $result->fetch_assoc()) {
								$eventName = $row["name"];
								$eventLogo = $row["logo"];
			
							}
						}
					
					}
 }
?>
 
 

 <div class="page">
        <table border="0" class ="">
            <tbody bgcolor="<?php echo $token_color;?>">
     
     <?php
    $i=0;
    $eventID ;
    $eventName ;
    $token_label ;
    $token_number ;
    $token_color ;
    $counter = 1;
    $text ='';
    $more = $token_number%3;
    while($i != $token_number){
        $text = $text.'<td> <img src="../event_file/images/'.$eventLogo.'" height="125px" width="125px"></td> <td>'. $eventName.'</br>' . $token_label.'
        </td>';
        
        
        
        if($counter==3 ){
          echo $text; 
          $counter=0;
          $text="";
        }
        if($more!=0 && $i==($token_number-1)){
         
          echo $text; 
          $counter=0;
          $text="";
        }
        
        
                 $counter++;
         

        $i++;
    
    ?>
     
     <tr>
      
    </tr>
         
         
        
<?php
}
?>
     </tbody>
 </table>
</div>


 
</body>
</html>