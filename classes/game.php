<?php

class Game {
    function get($gameid) {
        Global $db;

        $random = protect($_GET['random']);
        if(empty($random)) $random = 0;

        error_log("Random $random");

        $sql = $db->prepare("SELECT * FROM games WHERE GameID = :gameid");
        $sql->execute( array(":gameid" => $gameid) );
        $rs = $sql->fetch(PDO::FETCH_ASSOC);
        
        if($rs){
            $sql = $db->prepare("SELECT * FROM gameplayers WHERE GameID = :gameid");
            $sql->execute( array(":gameid" => $gameid) );
            $rs2 = $sql->fetchAll(PDO::FETCH_ASSOC);
            
            if($rs2) $rs["Players"] = $rs2;
        }
        
        if($random) shuffle($rs["Players"]);

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

    function delete($gameid){
        Global $db;

        $sql = $db->prepare("DELETE FROM games WHERE GameID = :gameid");
        $rs = $sql->execute( array(":gameid" => $gameid) );
        if($rs) $data['games'] = "deleted";
 
        $sql = $db->prepare("DELETE FROM gameplayers WHERE GameID = :gameid");
        $rs = $sql->execute( array(":gameid" => $gameid) );
        if($rs) $data['gameplayers'] = "deleted";
        
        $sql = $db->prepare("DELETE FROM rounds WHERE GameID = :gameid");
        $rs = $sql->execute( array(":gameid" => $gameid) );
        if($rs) $data['rounds'] = "deleted";

        if($data) display_200($data);
        else display_204();
    }//end delete

    function patch($gameid){
        Global $db;
        
        $data = fetch_post_data();
        if(empty($data)) $data['StopTime'] = date("Y-m-d H:i:s");

        $sql = $db->prepare("UPDATE games SET StopTime = :stoptime WHERE GameID = :gameid");
        $rs = $sql->execute( array(":stoptime" => $data['StopTime'], ":gameid" => $gameid) );
                
        if($rs) display_200($rs);
        else display_204();

    }//end patch

}//end class

?>
