<?php

function ubahStatus($status)
{
    switch ($status) {
        case '1':
            $badge = "<span class='badge badge-success'>Lulus</span>";
            break;

        default:
            $badge = "<span class='badge badge-success'>Belum Lulus</span>";
            break;
    }
}
