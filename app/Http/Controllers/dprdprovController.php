<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class dprdprovController extends Controller
{
  public function view()
  {
    $prov=DB::table('provinsi')
    ->get();

    return view('page.DPRD',[
     'prov' => $prov
   ]);
  }

  public function changee()
  {
    $id=request()->get('prov');
    $data=DB::table('dt_prov')
      ->leftJoin('provinsi','provinsi.id_prov','=','dt_prov.id_prov')
        ->where('dt_prov.id_prov',$id)
        ->where('nama_kab','like','Provinsi')
        ->get();
      echo "
        <table id='datatables' class='table table-striped table-bordered table-hover' cellspacing='0' width='100%'' style='width:100%'>
          <thead>
            <tr align='center'>
              <th align='left'>KABUPATEN/KOTA</th>
              <th>KURSI</th>
              <th>1</th>
              <th>2</th>
              <th>3</th>
              <th>4</th>
              <th>5</th>
              <th>6</th>
              <th>7</th>
              <th>8</th>
              <th>9</th>
              <th>10</th>
              <th>11</th>
              <th>12</th>
              <th>13</th>
              <th>14</th>
              <th>19</th>
              <th>20</th>
            </tr>
          </thead>
        <tbody>
      ";
          // echo "<tbody>";
      foreach ($data as $k) {
        echo "
          <tr align='center'>
            <td align='left' onclick='get_data($k->id_dt)' >$k->nama_kab $k->nama_prov</td>
            <td>$k->jml_kursi</td>
            <td>$k->pkb</td>
            <td>$k->gerindra</td>
            <td>$k->pdip</td>
            <td>$k->golkar</td>
            <td>$k->nasdem</td>
            <td>$k->garuda</td>
            <td>$k->berkarya</td>
            <td>$k->pks</td>
            <td>$k->perindo</td>
            <td>$k->ppp</td>
            <td>$k->psi</td>
            <td>$k->pan</td>
            <td>$k->hanura</td>
            <td>$k->demokrat</td>
            <td>$k->pbb</td>
            <td>$k->pkpi</td>
          </tr> 
        ";
      }
      echo "
      </tbody>
      <tfoot>

      </tfoot>";
      echo "</tbody></table>";
      echo "
      ";
    }

  public function tampil(Request $request)
  {
    $id = $request->get('prov');
    $data = DB::table('dt_prov')
    ->leftJoin('provinsi','provinsi.id_prov', '=', 'dt_prov.id_prov')
    ->where('dt_prov.id_prov',$id)
    ->get();

    foreach ($data as $key) {
      echo "
      <div class='col-lg-12'>
        <div class='card'>
          <div class='card-header card-header-icon card-header-rose'>
            <div class='card-icon'>
              <i class='material-icons'>insert_chart</i>
            </div>
            <h4 class='card-title'>$key->nama_kab $key->nama_prov
              <small></small>
            </h4>
          </div>
          <div class='col-md-10 as-a' >
            <div class='card bx-a border-0'>
              <div class='card-body'>
                <canvas id='multipleBarsChart1'></canvas>
              </div>
            </div>
          </div>
        </div>  
      </div>
      ";
    }
  }

  public function chartt(Request $req)
  {
    $id = $req->get('id_dt');
    $data= DB::table("dt_prov")
    ->select('hanura','berkarya','demokrat','gerindra','golkar','nasdem','pan','pbb','perindo','pdip','pkb','pkpi','pks','ppp','psi','garuda')
    ->where('id_dt',$id)
    ->where('nama_kab','like','Provinsi')
    ->get(); 

    foreach ($data as $k ) {
      $hanura=$k->hanura;
      $berkarya=$k->berkarya;
      $demokrat=$k->demokrat;
      $gerindra=$k->gerindra;
      $golkar=$k->golkar;
      $nasdem=$k->nasdem;
      $pan=$k->pan;
      $pbb=$k->pbb;
      $perindo=$k->perindo;
      $pdip=$k->pdip;
      $pkb=$k->pkb;
      $pkpi=$k->pkpi;
      $pks=$k->pks;
      $ppp=$k->ppp;
      $psi=$k->psi;
      $garuda=$k->garuda;
    }   
    return [
      'hanura' => $hanura,
      'berkarya'=>$berkarya,
      'demokrat'=>$demokrat,
      'gerindra'=>$gerindra,
      'golkar'=>$golkar,
      'nasdem'=>$nasdem,
      'pan'=>$pan,
      'pbb'=>$pbb,
      'perindo'=>$perindo,
      'pdip'=>$pdip,
      'pkb'=>$pkb,
      'pkpi'=>$pkpi,
      'pks'=>$pks,
      'ppp'=>$ppp,
      'psi'=>$psi,
      'garuda'=>$garuda
    ];
  }
}
