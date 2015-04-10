<?php

///////////////////////////////////////////////////////////////////////////
// PROTECT - Make sure user input is sanitized
///////////////////////////////////////////////////////////////////////////
function protect($string){
   return trim(strip_tags(mysql_real_escape_string($string)));
}

///////////////////////////////////////////////////////////////////////////
// FETCH POST DATA - shim used to set data from php://input as $_POST
///////////////////////////////////////////////////////////////////////////
function fetch_post_data(){
    $_POST = json_decode( urldecode( file_get_contents("php://input") ), true );
}

///////////////////////////////////////////////////////////////////////////
// DISPLAY 404 - Return 404 error if Toro is unable to match endpoint
///////////////////////////////////////////////////////////////////////////
function display_404(){
    $data["code"] = "404";
    $data["message"] = "Endpoint Not Found";
    $data["description"] = "Please see the official documentation for a list of valid endpoints";
    header("HTTP/1.1 404 Not Found");
    header("Content-Type: application/json");
    echo json_encode($data);
    exit;
}

///////////////////////////////////////////////////////////////////////////
// DISPLAY 403 - Return 403 error if user doesn't have access to this resource
///////////////////////////////////////////////////////////////////////////
function display_403(){
    $data["code"] = "403";
    $data["message"] = "Forbidden";
    $data["description"] = "You have been denied access to this endpoint";
    header("HTTP/1.1 403 Forbidden");
    header("Content-Type: application/json", true);
    echo json_encode($data);
    exit;
} 

//////////////////////////////////////////////////////////////////////////
// DISPLAY 204 - Return 204 message when no content is available
//////////////////////////////////////////////////////////////////////////
function display_204(){
    header("HTTP/1.1 204 No Content");
    header("Content-type: application/json", true);
    exit;
}

//////////////////////////////////////////////////////////////////////////
// DISPLAY 200 - Return 200 message when things are a-ok
//////////////////////////////////////////////////////////////////////////
function display_200($data){
    header("HTTP/1.1 200 OK");
    header("Content-type: application/json", true);
    echo json_encode( $data );
    exit;
}

?>