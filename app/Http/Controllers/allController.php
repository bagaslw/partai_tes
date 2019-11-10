<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class allController extends Controller
{
	public function tampil_data()
	{
		$data = DB::table('dt_prov')
		->leftJoin('provinsi','provinsi.id_prov', '=', 'dt_prov.id_prov')
		->get();

		$prov = DB::table('provinsi')
		->leftJoin('dt_prov','dt_prov.id_prov', '=', 'provinsi.id_prov')
		->where('nama_kab','like','Provinsi')
		->get();

		return view('page.alldata',[
			'datas' => $data,
			'prov' => $prov
		]);
	}

	public function tampil(Request $request)
	{
		$id = $request->get('prov');
		$data = DB::table('dt_prov')
		->leftJoin('provinsi','provinsi.id_prov','=','dt_prov.id_prov')
		->where('dt_prov.id_dt',$id)
		->get();

		foreach ($data as $key) {
			echo "
			<canvas id='multipleBarsChart1'></canvas>
			";
		}
	}

	public function chart(Request $req)
	{
		$id = $req->get('id_dt');
		$data= DB::table("dt_prov")
		->select('hanura','berkarya','demokrat','gerindra','golkar','nasdem','pan','pbb','perindo','pdip','pkb','pkpi','pks','ppp','psi','garuda')
		->where('id_dt',$id)
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

	public function tampil_c(Request $request)
	{
		$id = $request->get('prov');
		$data=DB::table('provinsi')
		->leftJoin('dt_prov','dt_prov.id_prov', '=',  'provinsi.id_prov')
		->where('dt_prov.nama_kab', 'like', '%Provinsi%')
		->where('provinsi.id_prov', $id)
		->get();


		foreach ($data as $key) {
			echo "
			<canvas id='multipleBarsChart'></canvas>
			";
		}
	}

	public function chart_p(Request $req)
	{
		$id = $req->get('id_dt');

		$data=DB::table('provinsi')
		->leftJoin('dt_prov','dt_prov.id_prov', '=',  'provinsi.id_prov')
		->select('dt_prov.hanura','dt_prov.berkarya','dt_prov.demokrat','dt_prov.gerindra','dt_prov.golkar','dt_prov.nasdem','dt_prov.pan','dt_prov.pbb','dt_prov.perindo','dt_prov.pdip','dt_prov.pkb','dt_prov.pkpi','dt_prov.pks','dt_prov.ppp','dt_prov.psi','dt_prov.garuda')
		->where('dt_prov.nama_kab', 'like', '%Provinsi%')
		->where('provinsi.id_prov', $id)
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

	public function change()
	{
		$id=request()->get('prov');
		$data=DB::table('dt_prov')
		->leftJoin('provinsi','provinsi.id_prov', '=', 'dt_prov.id_prov')
		->where('dt_prov.id_prov',$id)
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
			if($k->nama_kab == "Provinsi"){
				$kab="$k->nama_kab $k->nama_prov";
			}else{
				$kab="$k->nama_kab";
			}
			echo "
			<tr align='center'>
			<td align='left' class='cp'  onclick='get_data($k->id_dt)'>$kab</td>
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
		<hr>

		<h5>
		<b>Legenda</b>
		</h5>

		<table>
		<tr>
		<td><img src='assets/img/logo/Partai1.jpg' alt=''></td>
		<td><img src='assets/img/logo/Partai2.jpg' alt=''></td>
		</tr>
		</table>
		";
	}

	public function change_kk(Request $r)
	{
		$id=$r->get('pov');
		$da=DB::table('dt_prov')
		->where('id_prov',$id)
		->get();

		foreach ($da as $p) {
			echo "
			<option value='$p->id_dt' onchange='get_data($p->id_dt)' onclick='get_data($p->id_dt)' > $p->nama_kab</option>
			";
		}
	}
}

/**
@foreach($datas as $k)
                <tr align='center'>                     
                  <td hidden="">{{$k->id_dt}}</td>
                  @if($k->nama_kab=="Provinsi")    
                  <td align='left' onclick="get_id_dt({{$k->id_dt}})">{{$k->nama_kab}} {{$k->nama_prov}}</td>
                  @endif
                  @if($k->nama_kab!="Provinsi")    
                  <td align='left' onclick="get_id_dt({{$k->id_dt}})">{{$k->nama_kab}}</td>
                  @endif
                  <td>{{$k->jml_kursi}}</td>
                  <td>{{$k->pkb}}</td>
                  <td>{{$k->gerindra}}</td>
                  <td>{{$k->pdip}}</td>
                  <td>{{$k->golkar}}</td>
                  <td>{{$k->nasdem}}</td>
                  <td>{{$k->garuda}}</td>
                  <td>{{$k->berkarya}}</td>
                  <td>{{$k->pks}}</td>
                  <td>{{$k->perindo}}</td>
                  <td>{{$k->ppp}}</td>
                  <td>{{$k->psi}}</td>
                  <td>{{$k->pan}}</td>
                  <td>{{$k->hanura}}</td>
                  <td>{{$k->demokrat}}</td>
                  <td>{{$k->pbb}}</td>
                  <td>{{$k->pkpi}}</td>
                </tr> 
                @endforeach   
**/