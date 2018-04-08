<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BukuTamu;
use Redirect;
use App\Wisma;
use App\DetailWisma;
class WismaController extends Controller
{
    public function wisma1(){

      return view('wisma.wisma1');
    }

    public function listDataNik($id){
      $dataNik = DetailWisma::leftJoin('buku_tamus', 'buku_tamus.nik', '=', 'detail_wismas.nik')
      ->where('wisma_id', $id)->get();
      $no = 0;
      $data = array();
      foreach($dataNik as $list){
        $no ++;
        $row = array();
        $row[] = $no;
        $row[] = $list->nik;
        $row[] = $list->nama;
        $row[] = $list->nomor_telepon;
        $row[] = '<div class="btn-group">
                <a onclick="deleteData('.$list->id_detail.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
        $data[] = $row;
      }

      $output = array("data" => $data);
      return response()->json($output);
    }

    public function saveOrang(Request $request){
      $save = new DetailWisma;
      $save->nik = $request->nik;
      $save->wisma_id = $request->id;
      $save->save();
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

        if ($list->status == '1') {
          $status = '<span class="label label-success">Kosong</span>';
        }else {
          $status = '<span class="label label-danger">Penuh</span>';
        }
        $row[] = $status;

        if ($list->tanggal == null) {
          $tanggal = '<span class="label label-success">Kosong</span>';
        }else {
          $tanggal = $list->tanggal;
        }
        $row[] = $tanggal;
        $row[] = '<div class="btn-group">
                <a href="wisma1/'.$list->id_wisma.'/tambah" class="btn btn-warning btn-sm"><i class="fa fa-circle"></i></a>
                <a onclick="editForm('.$list->id_wisma.')" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                <a onclick="deleteData('.$list->id_wisma.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
        $data[] = $row;
      }

      $output = array("data" => $data);
      return response()->json($output);
    }

    public function addOrang($id){
      $tambah = Wisma::find($id);
      $detailNik = BukuTamu::all();
      return view('wisma.tambah_orang', compact('detailNik', 'tambah'));
    }

    public function saveWisma1(Request $request){
      $wisma1 = new Wisma;
      $wisma1->nama_wisma = $request->nama_wisma;
      $wisma1->status = '1';
      $wisma1->save();
    }

    public function update(Request $request, $id){
      $update = Wisma::find($id);
      $update->status = '2';
      $update->tanggal = $request->tanggal;
      $update->update();
    }

    public function edit($id){
      $wisma = Wisma::find($id);
      echo json_encode($wisma);
    }
}
