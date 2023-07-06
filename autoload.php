<?php
    // Load files path in the proyect
    spl_autoload_register(function($clase){
        if(str_replace('\\', '/', $clase) . '.php'){
            require_once(str_replace('\\', '/', $clase) . '.php');
        }
    });
?>