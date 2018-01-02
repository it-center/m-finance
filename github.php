<?php
    if ( $_POST['payload'] ) {
        exec('git reset --hard HEAD && git pull');
    }