<?php

function ubahStatus($status)
{
    switch ($status) {
        case '1':
            $badge = "<span class='badge bg-success'>Lulus</span>";
            break;

        default:
            $badge = "<span class='badge bg-danger'>Belum Lulus</span>";
            break;
    }
    return $badge;
}

function StatusWawancara($status)
{
    switch ($status) {
        case '0':
            $badge = "<span class='badge bg-danger'>Belum Lulus</span>";
            break;
        case '1':
            $badge = "<span class='badge bg-primary'>Wawancara</span>";
            break;
        default:
            $badge = "<span class='badge bg-secondary'>Status Tidak Diketahui</span>";
            break;
    }
    return $badge;
}
