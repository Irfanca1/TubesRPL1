<?php

// Helper Function untuk mengecek apakah value NRP di session adalah nrp pelayan
function is_pelayan()
{
    $nrp = session()->get('nrp');
    // Fungsi strpos() digunakan untuk dapat menemukan posisi kemunculan pertama string di dalam string lain
    return (strpos($nrp, 'PYN') !== false) ? true : false;
}

function is_kasir()
{
    $nrp = session()->get('nrp');
    // Fungsi strpos() digunakan untuk dapat menemukan posisi kemunculan pertama string di dalam string lain
    return (strpos($nrp, 'KSR') !== false) ? true : false;
}

function is_koki()
{
    $nrp = session()->get('nrp');
    // Fungsi strpos() digunakan untuk dapat menemukan posisi kemunculan pertama string di dalam string lain
    return (strpos($nrp, 'KOK') !== false) ? true : false;
}
