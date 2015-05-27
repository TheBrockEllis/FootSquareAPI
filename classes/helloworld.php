<?php

class Hello {
    function get() {
        error_log("Got to here");
        $data = array("Greetings!" => "Hello World");
        display_200($data);
    }
    
    function post(){
        echo json_encode("Hello world!");
    }
}

?>
