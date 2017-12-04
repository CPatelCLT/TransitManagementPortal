<?php

function sendMessage($to, $subject, $body)
{
    if (mail($to, $subject, $body)) {
        return true;
    } else {
        return false;
    }
}

?>