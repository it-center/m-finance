<?php
    define("_EXECUTED", 1);
    echo exec('git reset --hard HEAD && git pull');