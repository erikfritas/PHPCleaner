<?php

try{

    while (True){
        # clear screen
        echo chr(27).chr(91).'H'.chr(27).chr(91).'J';

        # substitute of watch -n Seconds free -m
        echo shell_exec("free -m");
        sleep(1);
    }

} catch (Exception $e){
    echo "\n\nError: " . $e->getMessage() . "\n\n";
}
