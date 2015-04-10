<?php

class Game {
    function get($gameid) {
        Global $db;
                
        $sql = $db->prepare("SELECT * FROM games WHERE GameID = :gameid");
        $sql->execute( array(":gameid" => $gameid) );
        $rs = $sql->fetch(PDO::FETCH_ASSOC);
        
        if($rs){
            $sql = $db->prepare("SELECT * FROM gameplayers WHERE GameID = :gameid");
            $sql->execute( array(":gameid" => $gameid) );
            $rs2 = $sql->fetchAll(PDO::FETCH_ASSOC);
            
            if($rs2) $rs["Players"] = $rs2;
        }
        
        if($rs2){
            $sql = $db->prepare("SELECT * FROM rounds WHERE GameID = :gameid");
            $sql->execute( array(":gameid" => $gameid) );
            $rs3 = $sql->fetchAll(PDO::FETCH_ASSOC);
            
            if($rs3) $rs["Rounds"] = $rs3;
            
        }
        
        if($rs) display_200($rs);
        else display_204();
    }
    
    function post(){
        display_404();
    }
}

?>