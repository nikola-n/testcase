<?php

if( ! method_exists('', 'dd')){
    function dd($something)
    {
        return var_dump(die($something));
    }

}