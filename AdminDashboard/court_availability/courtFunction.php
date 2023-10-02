<?php

//adding, done
function addNewCourt(){
$con = mysqli_connect("localhost", "root", "", "test");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    echo 'connected to mySql';
        $courtid=$_POST['courtid'];
        $courtName=$_POST['courtName'];
        $courtStatus=$_POST['courtStatus'];

        $sql= "insert into court(courtID,courtName,courtStatus)
        values('$courtid','$courtName','$courtStatus')";
        echo '<br>'.$sql;

     mysqli_query($con,$sql);
    
 }
}


function getCourtInformation($courtListQry){
    $con = mysqli_connect("localhost", "root", "", "test");

    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        $sql="SELECT * FROM court WHERE courtID='".$courtListQry."' ";
        $qry = mysqli_query($con, $sql);
        return $qry;
    }
}

function getListOfCourt(){
    $con = mysqli_connect("localhost", "root", "", "test");
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        $sql="SELECT * FROM court";
        $qry = mysqli_query($con, $sql);
        return $qry;
    }
}

function deleteCourt(){
    $con = mysqli_connect("localhost", "root", "", "test");
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    echo 'in function to delete:'.$_POST['courtIdToDelete'];
    $sql="delete from court where courtID='".$_POST['courtIdToDelete']."'";
    echo '<br>'.$sql;
    mysqli_query($con,$sql);//execute query
}

function updateCourt(){
    $con = mysqli_connect("localhost", "root", "", "test");
    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    else{

        $courtid=$_POST['courtid'];
        $courtName=$_POST['courtName'];
        $courtStatus=$_POST['courtStatus'];
        
        $sql="UPDATE court SET courtName='".$courtName."',courtStatus='".$courtStatus."'
         WHERE courtID='".$courtid."'";
        echo $sql;
        $qry= mysqli_query($con,$sql);
        return $qry;
    }

}

?>


