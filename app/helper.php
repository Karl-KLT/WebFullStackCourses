<?php

use Illuminate\Support\Str;

function setNewRandomCode(){
    return Str::random(8);
}
