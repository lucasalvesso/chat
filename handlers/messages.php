<?php

include('../config/local.php');

switch ($_REQUEST['action']){
    case 'sendMessage':
        $query = $db->prepare("INSERT INTO chat SET user=?, message=?");
        $run = $query->execute([$_REQUEST['user'], $_REQUEST['message']]);

        if($run == true){
            echo 1;
        }
    break;

    case 'getMessages':
        $query = $db->prepare("SELECT * FROM chat");
        $run = $query->execute();

        $rs = $query->fetchAll(PDO::FETCH_OBJ);

        foreach ($rs as $r) {
            $msgH = date_create($r->date)->format('H:i');
            $msgD = date_create($r->date)->format('d/m/Y');
            $result = '<p class="msg"'.'title='."'$msgH no dia $msgD'>"."<strong>$r->user</strong>".': '.$r->message.'</p>';
            echo $result;

        }
    break;
}