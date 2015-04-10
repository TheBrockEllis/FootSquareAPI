<?php

class Players {
    function get() {
        Global $db;
        
        $sql = $db->prepare("SELECT * FROM players");
        $sql->execute();
        $rs = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        if($rs) display_200($rs);
        else display_204();
    }
    
    function post(){
        display_404();
    }
}

?>