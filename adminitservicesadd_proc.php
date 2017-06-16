<?php
    session_start();
    include("conn.php");
    $idUserApp=$_SESSION['idUserApp'];
    
    if (isset($_POST["requiredserv"])) {

	$idservtype =$_POST['idservcat'];
	$serv=preg_replace('/[^a-zA-Z0-9 ]/s', '',$_POST['requiredserv']);	
	$desc=preg_replace('/[^a-zA-Z0-9 -.]/s', '',$_POST['requireddesc']);
    

    $sql="INSERT INTO itservices (idITSERVICECATEGORY, SERVICE, `DESC`, STATUS, CREATIONDATE, CHANGEDBY) VALUES ('$idservtype','$serv', '$desc', 'ACTIV', NOW(),'$idUserApp')";
            
   // echo $sql;

    if($connect->query($sql) === false) {
      trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connect->error, E_USER_ERROR);
    } else {
      $last_inserted_id = $connect->insert_id;
      $affected_rows = $connect->affected_rows;

    }
      
    echo $userID;

 ?>   
<form name='fr' action='adminitservicesview.php' method='POST'>
     <input type='hidden' name='idITSERVICE' value='<?php echo $last_inserted_id; ?>' />
 </form>
 <script type='text/javascript'>
 document.fr.submit();
 </script>
<?php
	}else{ header( 'Location: adminitservicesadd.php' ); }