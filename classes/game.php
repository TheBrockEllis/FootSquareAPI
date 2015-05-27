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
        
        if($rs) display_200($rs);
        else display_204();
    }
    
    function post($gameid){
        Global $db;

        $data = fetch_post_data();

        $added = 0;

        foreach($data as $playerid){
            $sql = $db->prepare("INSERT INTO gameplayers (GameID, PlayerID) VALUES (:gameid, :playerid )");
            $rs = $sql->execute( array(':gameid' => $gameid, ':playerid' => $playerid ) );
        
            if($rs) $added++;
        }

        $rs = array("Added" => $added);

        if($added) display_200($rs);
        else display_204();

    }
}

?>
