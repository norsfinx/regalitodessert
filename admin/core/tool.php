<?php

function pluralize($quantity, $singular, $plurall=null) { // permet de mettre au pluriel

    if ($quantity <2) {
        return $singular;
    }else {
        if ($plurall == null) {
            return $singular . "s";
                } else { 
                    return $plurall;
        }
    }

}

