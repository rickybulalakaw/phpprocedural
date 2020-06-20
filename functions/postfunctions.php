<?php 

function getpostownername($postid){
    include "../phpprocedural/config/db.php"; 

    if($postid != null){

        $getpostownername = "select * from user where id = $postid";

        $postonwernamedata = mysqli_query($db, $getpostownername);

        $data = mysqli_fetch_assoc($postonwernamedata);

        $postowner['firstname'] = $data['firstname'];
        $postowner['lastname'] = $data['lastname'];

        return $postowner;
    } else {
        return;
    }
    

}

function getpost($postid){

    include "../phpprocedural/config/db.php"; 

    $getpost = "select * from post where id = $postid";
    $process1 = mysqli_query($db, $getpost);
    $postdata['post'] = mysqli_fetch_assoc($process1);

    $postdata['postowner'] = getpostownername($postdata['post']['userid']);

    return $postdata; // this allows the data processed here to be used in the page where this function is called.
}

function getpostsby($parameter, $parametervalue, $start_from, $results_per_page){

    include_once "../phpprocedural/config/db.php";

    if($parameter == "content"){
        $query = "select * from post where $parameter LIKE '%$parametervalue%' order by timestamp desc limit $start_from, $results_per_page";

    } else {
        $query = "select * from post where $parameter = '$parametervalue' order by timestamp desc";

    }

    
    $process = mysqli_query($db, $query);

    return $process;

}





?>