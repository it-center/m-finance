<?php
    $output = shell_exec('git reset --hard HEAD && git pull');
    echo $output;