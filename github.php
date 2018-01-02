<?php
    $output = shell_exec('sudo cd /home/u482956/modesto-finance.com/www && sudo git reset --hard HEAD && sudo git pull');
    echo $output;