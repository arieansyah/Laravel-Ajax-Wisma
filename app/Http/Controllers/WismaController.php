<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BukuTamu;
use App\Wisma;

class WismaController extends Controller
{
    public function wisma1(){
      return view('wisma.wisma1');
    }

    public function listDataWisma1()
    {
      // $wisma = Wisma::leftJoin('buku_tamus', 'buku_tamus.nik', '=', 'wismas.nik')
      // ->where('name', 'pattern')
      // ->get();
      $wisma = Wisma::all();
      $data = array();
      foreach($wisma as $list){
        $row = array();
        $row[] = $list->nama_wisma;
        if ($list->nik == null) {
          $nik = '<span class="label label-success">Kosong</span>';
        }
        $row[] = $nik;

        if ($list->status == '1') {
          $status = '<span class="label label-success">Kosong</span>';
        }
        $row[] = $status;

        if ($list->tanggal == null) {
          $tanggal = '<span class="label label-success">Kosong</span>';
        }
        $row[] = $tanggal;
        $row[] = '<div class="btn-group">
                <a onclick="editForm('.$list->id_wisma.')" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                <a onclick="deleteData('.$list->id_wisma.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
        $data[] = $row;
      }

      $output = array("data" => $data);
      return response()->json($output);
    }

    public function saveWisma1(Request $request){
      $wisma1 = new Wisma;
      $wisma1->nama_wisma = $request->nama_wisma;
      $wisma1->status = '1';
      $wisma1->save();
    }

    public function edit($id){
      $wisma1 = Wisma::find($id);
      echo json_encode($wisma1);
    }
}
