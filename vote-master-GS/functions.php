<?php
/**
 * getPolling adalah fungsi untuk mengambil dan menambilkan 
 * poling atau hasil vote yang diperoleh, sekaligus di convert 
 * kedalam persen
 * 
 * @param  int $id id_opsi
 * @return string
 */
function getPolling($id)
{
    global $connect;

    // sql untuk mengambil semua data;
    $sql = "SELECT * FROM voting";
    $query = $connect->query($sql);
    
    // total seluruh voting
    $totalVote = $query->num_rows;
    $query->close();

    // sql untuk mengabil data yang spesifik (sesuai $id) 
    $sqlSpesifik = "SELECT * FROM voting WHERE id_opsi = '$id'";
    $querySpesifik = $connect->query($sqlSpesifik);
    
    // total voting dari $id
    $voteOpsi = $querySpesifik->num_rows;
    $querySpesifik->close();

    $hitungVote = '';
    // $totalVote Tidak boleh 0;
    if ($totalVote) {
        // round() adalah fungsi pembulatan
        $hitungVote = round( ($voteOpsi/$totalVote) * 100 );
    }

    return  empty($hitungVote) ?  '0%' : $hitungVote . '%'; 
}