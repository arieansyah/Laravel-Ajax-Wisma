<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BukuTamu;
use Carbon\Carbon;

use PDF;

class LaporanController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  
  public function index()
  {
    $awal = date('Y-m-d', mktime(0,0,0, date('m'), 1, date('Y')));
    $akhir = date('Y-m-d');
    return view('laporan.index', compact('awal', 'akhir'));
  }

  public function listData($awal, $akhir)
  {
    $no = 0;
    $data = array();
    while(strtotime($awal) <= strtotime($akhir)){
      $tanggal = $awal;
      $awal = date('Y-m-d', strtotime("+1 day", strtotime($awal)));

      $tamu = BukuTamu::where('created_at', 'LIKE', "$tanggal%")->get();

      foreach ($tamu as $list) {
        $no ++;
        $row = array();
        $row[] = $no;
        $row[] = $list->nik;
        $row[] = $list->nama;
        $row[] = $list->instansi;
        $row[] = $list->nomor_telepon;
        $data[] = $row;
      }
    }
    // return $data;
    $output = array("data" => $data);
    return response()->json($output);
  }

  public function refresh(Request $request)
  {
    $awal = $request['awal'];
    $akhir = $request['akhir'];
    return view('laporan.index', compact('awal', 'akhir'));
  }

  public function exportPDF($awal, $akhir){
    $tanggal_awal = $awal;
    $tanggal_akhir = $akhir;

    $no = 0;
    $data = array();
    while(strtotime($awal) <= strtotime($akhir)){
      $tanggal = $awal;
      $awal = date('Y-m-d', strtotime("+1 day", strtotime($awal)));

      $tamu = BukuTamu::where('created_at', 'LIKE', "$tanggal%")->get();

      foreach ($tamu as $list) {
        $no ++;
        $row = array();
        $row[] = $no;
        $row[] = $list->nik;
        $row[] = $list->nama;
        $row[] = $list->instansi;
        $row[] = $list->nomor_telepon;
        $row[] = $list->jenis_kelamin;
        $data[] = $row;
      }
    }

    $output = $data;

    $pdf = PDF::loadView('laporan.pdf', compact('tanggal_awal', 'tanggal_akhir', 'output'));
    $pdf->setPaper('a4', 'potrait');
    return $pdf->stream();
  }
}
