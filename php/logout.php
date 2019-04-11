<?php
    session_start();
    if(session_destroy())
        echo "true";
    else
        echo "false";
?>