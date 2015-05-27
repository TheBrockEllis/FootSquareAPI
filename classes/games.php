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
        Global $db;

        $data = fetch_post_data();

        if(empty($data['Date'])) $data['Date'] = date("Y-m-d");

        $sql = $db->prepare("INSERT INTO games (Date, StartTime) VALUES (:date, NOW() )");
        $rs = $sql->execute(array(':date' => $data['Date'] ) );

        if($rs){
            $id = $db->lastInsertId();

            display_200(array("Success" => true, "GameID" => $id));
        }else{
            display_204();
        }
    }
}

?>
