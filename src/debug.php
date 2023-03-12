<?php

function dump($parans)
{
    echo('
    <div style="
    display:inline-block;
    backgound:red;
    border:1px solid gray;
    paddind:white;">
    <pre>
    ');
    print_r($parans);
    echo('</pre></div><br>');
}