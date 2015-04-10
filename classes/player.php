<?php

class Player {
    function get($playerid) {
        Global $db;
        
        $sql = $db->prepare("SELECT * FROM players WHERE PlayerID = :playerid");
        $sql->execute( array(":playerid" => $playerid) );
        $rs = $sql->fetch(PDO::FETCH_ASSOC);
        
        if($rs) display_200($rs);
        else display_204();
    }
    
    function post($playerid){
        display_404();
    }
}

?>