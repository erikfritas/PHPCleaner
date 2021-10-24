<?php
/**
 * PHPCleaner
 * 
 * By @erikfritas from (LUMAY)
 */

# CLEANER

const WHITE = 39;
const BLACK = 30;
const RED = 31;
const GREEN = 32;
const YELLOW = 33;
const BLUE = 34;
const LIME = 92;

/**
 * To colorize my texts
 * @param int $color
 * @param string $text
 * @return string
 */
function color($text, $color=WHITE){
    return "\033[{$color}m{$text}\033[m";
}

function alert($alert){
    $texts = '';
    foreach($alert as $text => $color)
        $texts .= color($text, $color);
    echo $texts;
}

echo "
██████╗░██╗░░██╗██████╗░░█████╗░██╗░░░░░███████╗░█████╗░███╗░░██╗███████╗██████╗░
██╔══██╗██║░░██║██╔══██╗██╔══██╗██║░░░░░██╔════╝██╔══██╗████╗░██║██╔════╝██╔══██╗
██████╔╝███████║██████╔╝██║░░╚═╝██║░░░░░█████╗░░███████║██╔██╗██║█████╗░░██████╔╝
██╔═══╝░██╔══██║██╔═══╝░██║░░██╗██║░░░░░██╔══╝░░██╔══██║██║╚████║██╔══╝░░██╔══██╗
██║░░░░░██║░░██║██║░░░░░╚█████╔╝███████╗███████╗██║░░██║██║░╚███║███████╗██║░░██║
╚═╝░░░░░╚═╝░░╚═╝╚═╝░░░░░░╚════╝░╚══════╝╚══════╝╚═╝░░╚═╝╚═╝░░╚══╝╚══════╝╚═╝░░╚═╝

░░ █▀▀▄ █░░█ 　 ▒█▀▀▀ ▒█▀▀█ ▀█▀ ▒█░▄▀ ▒█▀▀▀ ▒█▀▀█ ▀█▀ ▀▀█▀▀ ░█▀▀█ ▒█▀▀▀█ 
▀▀ █▀▀▄ █▄▄█ 　 ▒█▀▀▀ ▒█▄▄▀ ▒█░ ▒█▀▄░ ▒█▀▀▀ ▒█▄▄▀ ▒█░ ░▒█░░ ▒█▄▄█ ░▀▀▀▄▄ 
░░ ▀▀▀░ ▄▄▄█ 　 ▒█▄▄▄ ▒█░▒█ ▄█▄ ▒█░▒█ ▒█░░░ ▒█░▒█ ▄█▄ ░▒█░░ ▒█░▒█ ▒█▄▄▄█
";

echo str_repeat("\n", 2);

try{
    shell_exec("sudo sync");
    alert([
        "* " => LIME, "Sync " => WHITE, "successful!\n" => BLUE
    ]);
    
    shell_exec("sudo sysctl -w vm.drop_caches=3");
    alert([
        "* " => LIME, "Drop Cache " => WHITE, "successful!\n" => BLUE
    ]);
    
    shell_exec("sudo sync");
    alert([
        "* " => LIME, "ReSync " => WHITE, "successful!\n\n" => BLUE
    ]);

    echo "Success!\n\n";

    echo "Status of your ".color("RAM", YELLOW).":\n";
    echo str_repeat(color("-=", RED), 40)."\n";
    echo shell_exec("sudo free -m")."\n";
    echo str_repeat(color("-=", RED), 40)."\n";
    exit;
} catch (Exception $e){
    echo "\n<\\Error/> Message: ".$e->getMessage()."\n";
    exit;
}

