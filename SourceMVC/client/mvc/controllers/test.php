<?php
$cmd = 'python -u main.py';
while(@ ob_end_flush());
$proc = popen($cmd, 'r');
while(!feof($proc)){
    echo fread($proc, 4096);
    @ flush();
}
pclose($proc);
