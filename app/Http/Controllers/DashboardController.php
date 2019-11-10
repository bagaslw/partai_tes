<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
	public function view()
	{
		$prov=DB::table('provinsi')
		->get();

		return view('page.dashboard',[
			'prov' => $prov
		]);
	}

	public function tampil_card(Request $request)
	{
		$id=$request->get('prov');
		$data=DB::table('dt_prov')
		->where('id_prov',$id)
		->whereNotIn('nama_kab',['Provinsi','provinsi'])
		->get();

		echo "
		<option value='' selected>Pilih Kota/KAB</option>
		";

		foreach ($data as $k) {

			echo "	
			<option value='$k->id_dt'>$k->nama_kab</option>                                                                     
			";
		}
	
	}

	public function chart_tol(Request $req)
	{
		$id = $req->get('id_dt');
		$data= DB::table("dt_prov")
		->select('hanura','berkarya','demokrat','gerindra','golkar','nasdem','pan','pbb','perindo','pdip','pkb','pkpi','pks','ppp','psi','garuda')
		->where('id_prov',$id)
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
	public function tamp_chart(Request $request)
	{
		$id = $request->get('prov');
		$data = DB::table('dt_prov')
		->leftJoin('provinsi','provinsi.id_prov','=','dt_prov.id_prov')
		->where('dt_prov.id_prov',$id)
		->where('nama_kab','like','Provinsi')
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

	public function change_kot(Request $req)
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
          // dd($hanura);           
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
	public function tamp_chartt(Request $request)
	{
		$id = $request->get('kot');
		$data = DB::table('dt_prov')
				->where('id_dt',$id)
				->get();
		foreach ($data as $key) {
			echo "
			<div class='col-lg-12'>
				<div class='card'>
					<div class='card-header card-header-icon card-header-rose'>
						<div class='card-icon'>
							<i class='material-icons'>insert_chart</i>
						</div>
						<h4 class='card-title'>$key->nama_kab
							<small></small>
						</h4>
					</div>
					<div class='col-md-10 as-a'>
								<canvas id='multipleBarsChart' class='ct-chart'></canvas>
						<div class='card bx-a border-0'>
							<div class='card-body'>
							</div>
						</div>
					</div>
				</div>	
			</div>
			";
		}
	}
}
