<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class kursiController extends Controller
{
  	public function view()
  	{
  		$prov=DB::table('provinsi')
  			->get();
  		$detail=DB::table('dt_prov')
  			->leftJoin('provinsi','provinsi.id_prov','=','dt_prov.id_prov')
  			->get();
  		return view('page.master_kursi',[
  			'prov' => $prov,
  			'show' => $detail
  		]);
  	}
  	public function add_kursi(Request $request)
  	{
  		$jml=$request->input('pkb')+$request->input('gerindra')+$request->input('pdip')+$request->input('golkar')+$request->input('nasdem')+$request->input('garuda')+$request->input('berkarya')+$request->input('pks')+$request->input('perindo')+$request->input('ppp')+$request->input('psi')+$request->input('pan')+$request->input('hanura')+$request->input('demokrat')+$request->input('pbb')+$request->input('pkpi');
  		$insert=DB::table('dt_prov')
  		->insert([
  			'id_prov'		=>	$request->input('id_prov'),
  			'pkb'			=>	$request->input('pkb'),
  			'gerindra'		=>	$request->input('gerindra'),
  			'pdip'			=>	$request->input('pdip'),
  			'golkar'		=>	$request->input('golkar'),
  			'nasdem'		=>	$request->input('nasdem'),
  			'garuda'		=>	$request->input('garuda'),
  			'berkarya'		=>	$request->input('berkarya'),
  			'pks'			=>	$request->input('pks'),
  			'perindo'		=>	$request->input('perindo'),
  			'ppp'			=>	$request->input('ppp'),
  			'psi'			=>	$request->input('psi'),
  			'pan'			=>	$request->input('pan'),
  			'hanura'		=>	$request->input('hanura'),
  			'demokrat'		=>	$request->input('demokrat'),
  			'pbb'			=>	$request->input('pbb'),
  			'pkpi'			=>	$request->input('pkpi'),
  			'jml_kursi'		=>	$jml,
  			'created_at'	=>	date('Y:m:d H:i:s'),
  			'updated_at'	=>	date('Y:m:d H:i:s')
  		]);
  		if($insert){
  			return 'sukses';
  		}else{
  			return 'error';
  		}
  	}

  	public function get_data(Request $request)
  	{
  		$id = $request->get('id_dt');
  		$data=DB::table('dt_prov')
  			->where('id_dt',$id)
  			->get();
  		return $data;
  	}

  	public function edit_kursi(Request $request)
  	{
  		$jml=$request->input('pkb')+$request->input('gerindra')+$request->input('pdip')+$request->input('golkar')+$request->input('nasdem')+$request->input('garuda')+$request->input('berkarya')+$request->input('pks')+$request->input('perindo')+$request->input('ppp')+$request->input('psi')+$request->input('pan')+$request->input('hanura')+$request->input('demokrat')+$request->input('pbb')+$request->input('pkpi');
  		$id=$request->input('edit_id');
  		$update=DB::table('dt_prov')
  		->where('id_dt',$id)
  		->update([
  			'id_prov'		=>	$request->input('id_prov'),
  			'pkb'			=>	$request->input('pkb'),
  			'gerindra'		=>	$request->input('gerindra'),
  			'pdip'			=>	$request->input('pdip'),
  			'golkar'		=>	$request->input('golkar'),
  			'nasdem'		=>	$request->input('nasdem'),
  			'garuda'		=>	$request->input('garuda'),
  			'berkarya'		=>	$request->input('berkarya'),
  			'pks'			=>	$request->input('pks'),
  			'perindo'		=>	$request->input('perindo'),
  			'ppp'			=>	$request->input('ppp'),
  			'psi'			=>	$request->input('psi'),
  			'pan'			=>	$request->input('pan'),
  			'hanura'		=>	$request->input('hanura'),
  			'demokrat'		=>	$request->input('demokrat'),
  			'pbb'			=>	$request->input('pbb'),
  			'pkpi'			=>	$request->input('pkpi'),
  			'jml_kursi'		=>	$jml,
  			'updated_at'	=>	date('Y:m:d H:i:s')
  		]);

  		if($update){
  			return "sukses";
  		}else{
  			return "error";
  		}
  	}

  	public function delete_kursi(Request $request)
  	{
  		$id=$request->get('id_dt');
  		$delete=DB::table('dt_prov')
  			->where('id_dt',$id)
  			->delete();
  		if($delete < 0){
  			return "gagal";
  		}else{
  			return "sukses";
  		}
  	}
}
