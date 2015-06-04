<?php

class Rounds {
    function get($gameid) {
        Global $db;
        
        $sql = $db->prepare("SELECT * FROM rounds WHERE GameID = :gameid");
        $sql->execute( array(':gameid' => $gameid) );
        $rs = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        if($rs) display_200($rs);
        else display_204();
    }
    
    function post($gameid){
        Global $db;

        $data = fetch_post_data();
        
        $killerid = $data['KillerPlayerID'];
        $killedid = $data['KilledPlayerID'];
        $methodid = $data['MethodID'];

        $sql = $db->prepare("INSERT INTO rounds (GameID, KillerPlayerID, KilledPlayerID, MethodID) VALUES (:gameid, :killerid, :killedid, :methodid )");
        $rs = $sql->execute(array(':gameid' => $gameid, ':killerid' => $killerid, ':killedid' => $killedid, ':methodid' => $methodid ) );

        if($rs) display_200($rs);
        else display_204();
    }
}

?>
