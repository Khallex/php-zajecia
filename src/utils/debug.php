<?php

function dump($params)
{
    echo ('
        <div style="
        display:inline-block;
        background:red;
        border:1px solid gray;
        padding:10px;
        color:white;
        ">
        <pre>
    ');
    print_r($params);
    echo ('</pre></div><br>');
}
