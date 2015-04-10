<?php

class Games {
    function get() {
        Global $db;
        
        $sql = $db->prepare("SELECT * FROM games");
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