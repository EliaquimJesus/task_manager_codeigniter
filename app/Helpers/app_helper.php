<?php

function check_status($item, $status)
{
    if (key_exists($status, STATUS_LIST)) {
        if ($item === $status) {
            return 'selected';
        } else {
            return '';
        }
    } else {
        return '';
    }
}
