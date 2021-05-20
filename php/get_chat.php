<?php

session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']); // saida_id
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']); // entrada_id

    $output = "";

    $sql = "SELECT * FROM messages 
                LEFT JOIN users ON users.unique_id = messages.incoming_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR
                (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id})
                ORDER BY msg_id
        ";

    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if($row['outgoing_msg_id'] === $outgoing_id){ // if this is equal to then he is a message sender * se for igual a então ele é o remetente da mensagem 
                
                $output .= '
                <div class="chat outgoing">
                    <div class="details">
                        <p>'.$row['msg'].'</p>
                    </div>
                </div>
                ';

            } else { // He is a message receiver * Ele é um receptor de mensagens 
                $output .= '
                <div class="chat incoming">
                    <img src="images/'.$row['img'].'" alt="">
                    <div class="details">
                        <p>'.$row['msg'].'</p>
                    </div>
                </div>
                ';
            }
        }
        echo $output;
    }
} else {
    include "../login.php";
}
