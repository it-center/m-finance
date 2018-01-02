<?php
    $output = shell_exec('cd /home/u482956/modesto-finance.com/www && git reset --hard HEAD && git pull');
    echo $output;