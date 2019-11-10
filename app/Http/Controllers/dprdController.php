<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class dprdController extends Controller
{
	public function view()
	{

		$data=DB::table('provinsi')
		->leftJoin('dt_prov','dt_prov.id_prov', '=',  'provinsi.id_prov')
		->where('dt_prov.nama_kab', 'like', '%Provinsi%')
		->where('provinsi.id_prov', '1')
		->get();


		$prov=DB::table('provinsi')
		->get();
		return view('page.tampil_dprd',[
			'show' => $data,
			'prov' => $prov
		]);
	}

	public function change_data()
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
			echo "<tr align='center'>
			<td align='left'>$kab</td>
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
}
