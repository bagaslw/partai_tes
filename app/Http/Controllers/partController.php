<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class partController extends Controller
{
    public function view()
    {
    	$prov=DB::table('provinsi')
    		->get();
    	return view('page.tampil_part',['prov'=>$prov]);
    }

    public function change_prov()
    {
    	$id=request()->get('prov');
    	$data=DB::table('dt_prov')
    		->where('id_prov',$id)
    		->whereNotIn('nama_kab',['provinsi','Provinsi'])
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
                    <td align='left'>$k->nama_kab</td>
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
    }

    public function hitung_data()
    {
    	$id=request()->get('prov');
    	$data=DB::select("SELECT * from dt_prov where id_prov='".$id."' and nama_kab not like '%Provinsi%' order by hanura desc limit 1");
    	// dd($data);
    	foreach ($data as $po) {
    		$jml=$po->jml_kursi;
    		$kl=20 / 100 * $jml ;
    		echo "<hr><h5><b>".$po->nama_kab."</b></h5><hr>";
    		echo "Kursi Hanura terbanyak =".$po->hanura."<br>";
    		$hanura=$po->hanura;$berkarya=$po->berkarya;$demokrat=$po->demokrat;$gerindra=$po->gerindra;
    		$golkar=$po->golkar;$nasdem=$po->nasdem;$pan=$po->pan;$pbb=$po->pbb;$perindo=$po->perindo;
    		$pdip=$po->pdip;$pkb=$po->pkb;$pkpi=$po->pkpi;$pks=$po->pks;$ppp=$po->ppp;$psi=$po->psi;$garuda=$po->garuda;
    		echo "20% X ".$jml." = ".$kl." Kursi untuk Pencalonan <br>";
    		if($po->hanura < 3){
    			echo "Kalkulasi Koalisi Indonesia Maju =<br>";
    		}else{
    			if($kl > $hanura || $hanura > $kl){
 					// $ck=mysqli_query($con,"select * from dt_prov where id_dt='".$ss['id_dt']."'");
					echo "<br><p>Kalkulasi Koalisi Indonesia Maju =</p>";
 					//Berkarya
					if($hanura+$berkarya >= $kl){
						if($berkarya!="0"){
							if($hanura >= $berkarya){
								echo "<p>Hanura(".$hanura.") + Berkarya(".$berkarya.")</p>";
							}else{
								echo "<p>Berkarya(".$berkarya.") + Hanura(".$hanura.")</p>";
							}
						}
					}else{
 						//Berkara Validation if 0=false
						if($berkarya=="0"){

						}else{
							if($hanura+$berkarya+$demokrat >= $kl){
								echo "<p>Hanura(".$hanura.")+Berkarya(".$berkarya.")+Demokrat(".$demokrat.")";
							}
							else if($hanura+$berkarya+$gerindra >= $kl){
								echo "<p>Hanura(".$hanura.")+Berkarya(".$berkarya.")+Gerindra(".$gerindra.")";
							}
							else if($hanura+$berkarya+$golkar >= $kl){
								echo "<p>Hanura(".$hanura.")+Berkarya(".$berkarya.")+Golkar(".$golkar.")";
							}
							else if($hanura+$berkarya+$nasdem >= $kl){
								echo "<p>Hanura(".$hanura.")+Berkarya(".$berkarya.")+Nasdem(".$nasdem.")";
							}
							else if($hanura+$berkarya+$pan >= $kl){
								echo "<p>Hanura(".$hanura.")+Berkarya(".$berkarya.")+PAN(".$pan.")";
							}
							else if($hanura+$berkarya+$pbb >= $kl){
								echo "<p>Hanura(".$hanura.")+Berkarya(".$berkarya.")+PBB(".$pbb.")";
							}
							else if($hanura+$berkarya+$perindo >= $kl){
								echo "<p>Hanura(".$hanura.")+Berkarya(".$berkarya.")+Perindo(".$perindo.")";
							}
							else if($hanura+$berkarya+$pdip >= $kl){
								echo "<p>Hanura(".$hanura.")+Berkarya(".$berkarya.")+PDIP(".$pdip.")";
							}
							else if($hanura+$berkarya+$pkb >= $kl){
								echo "<p>Hanura(".$hanura.")+Berkarya(".$berkarya.")+PKB(".$pkb.")";
							}
							else if($hanura+$berkarya+$pkpi >= $kl){
								echo "<p>Hanura(".$hanura.")+Berkarya(".$berkarya.")+PKPI(".$pkpi.")";
							}
							else if($hanura+$berkarya+$pks >= $kl){
								echo "<p>Hanura(".$hanura.")+Berkarya(".$berkarya.")+PKS(".$pks.")";
							}
							else if($hanura+$berkarya+$ppp >= $kl){
								echo "<p>Hanura(".$hanura.")+Berkarya(".$berkarya.")+PPP(".$ppp.")";
							}
							else if($hanura+$berkarya+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+Berkarya(".$berkarya.")+PSI(".$psi.")";
							}
							else if($hanura+$berkarya+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+Berkarya(".$berkarya.")+Garuda(".$garuda.")";
							}
						}
					}
 					//Demokrat
					if($hanura+$demokrat>=$kl){
						if($demokrat!="0"){
							if($hanura >= $demokrat){
								echo "<p>Hanura(".$hanura.") + Demokrat(".$demokrat.")</p>";	
							}else{
								echo "<p>Demokrat(".$demokrat.") + Hanura(".$hanura.")</p>";
							}	
						}
					}else{
 						//Demokrat Validation if 0 = false
						if($demokrat=="0"){

						}else{
							if($hanura+$demokrat+$berkarya >= $kl){
								echo "<p>Hanura(".$hanura.")+Demokrat(".$demokrat.")+Berkarya(".$berkarya.")";
							}
							else if($hanura+$demokrat+$gerindra >= $kl){
								echo "<p>Hanura(".$hanura.")+Demokrat(".$demokrat.")+Gerindra(".$gerindra.")";
							}
							else if($hanura+$demokrat+$golkar >= $kl){
								echo "<p>Hanura(".$hanura.")+Demokrat(".$demokrat.")+Golkar(".$golkar.")";
							}
							else if($hanura+$demokrat+$nasdem >= $kl){
								echo "<p>Hanura(".$hanura.")+Demokrat(".$demokrat.")+Nasdem(".$nasdem.")";
							}
							else if($hanura+$demokrat+$pan >= $kl){
								echo "<p>Hanura(".$hanura.")+Demokrat(".$demokrat.")+PAN(".$pan.")";
							}
							else if($hanura+$demokrat+$pbb >= $kl){
								echo "<p>Hanura(".$hanura.")+Demokrat(".$demokrat.")+PBB(".$pbb.")";
							}
							else if($hanura+$demokrat+$perindo >= $kl){
								echo "<p>Hanura(".$hanura.")+Demokrat(".$demokrat.")+Perindo(".$perindo.")";
							}
							else if($hanura+$demokrat+$pdip >= $kl){
								echo "<p>Hanura(".$hanura.")+Demokrat(".$demokrat.")+PDIP(".$pdip.")";
							}
							else if($hanura+$demokrat+$pkb >= $kl){
								echo "<p>Hanura(".$hanura.")+Demokrat(".$demokrat.")+PKB(".$pkb.")";
							}
							else if($hanura+$demokrat+$pkpi >= $kl){
								echo "<p>Hanura(".$hanura.")+Demokrat(".$demokrat.")+PKPI(".$pkpi.")";
							}
							else if($hanura+$demokrat+$pks >= $kl){
								echo "<p>Hanura(".$hanura.")+Demokrat(".$demokrat.")+PKS(".$pks.")";
							}
							else if($hanura+$demokrat+$ppp >= $kl){
								echo "<p>Hanura(".$hanura.")+Demokrat(".$demokrat.")+PPP(".$ppp.")";
							}
							else if($hanura+$demokrat+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+Demokrat(".$demokrat.")+PSI(".$psi.")";
							}
							else if($hanura+$demokrat+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+Demokrat(".$demokrat.")+Garuda(".$garuda.")";
							}
						}
					}
 					//Gerindra
					if($hanura+$gerindra>=$kl){
						if($gerindra!="0"){
							if($hanura >= $gerindra){
								echo "<p>Hanura(".$hanura.") + Gerindra(".$gerindra.")</p>";	
							}else{
								echo "<p>Gerindra(".$gerindra.") + Hanura(".$hanura.")</p>";
							}	
						}
					}else{
						if($gerindra=="0"){

						}else{
							if($hanura+$gerindra+$berkarya >= $kl){
								echo "<p>Hanura(".$hanura.")+Gerindra(".$gerindra.")+Berkarya(".$berkarya.")";
							}
							else if($hanura+$gerindra+$demokrat >= $kl){
								echo "<p>Hanura(".$hanura.")+Gerindra(".$gerindra.")+Demokrat(".$demokrat.")";
							}
							else if($hanura+$gerindra+$golkar >= $kl){
								echo "<p>Hanura(".$hanura.")+Gerindra(".$gerindra.")+Golkar(".$golkar.")";
							}
							else if($hanura+$gerindra+$nasdem >= $kl){
								echo "<p>Hanura(".$hanura.")+Gerindra(".$gerindra.")+Nasdem(".$nasdem.")";
							}
							else if($hanura+$gerindra+$pan >= $kl){
								echo "<p>Hanura(".$hanura.")+Gerindra(".$gerindra.")+PAN(".$pan.")";
							}
							else if($hanura+$gerindra+$pbb >= $kl){
								echo "<p>Hanura(".$hanura.")+Gerindra(".$gerindra.")+PBB(".$pbb.")";
							}
							else if($hanura+$gerindra+$perindo >= $kl){
								echo "<p>Hanura(".$hanura.")+Gerindra(".$gerindra.")+Perindo(".$perindo.")";
							}
							else if($hanura+$gerindra+$pdip >= $kl){
								echo "<p>Hanura(".$hanura.")+Gerindra(".$gerindra.")+PDIP(".$pdip.")";
							}
							else if($hanura+$gerindra+$pkb >= $kl){
								echo "<p>Hanura(".$hanura.")+Gerindra(".$gerindra.")+PKB(".$pkb.")";
							}
							else if($hanura+$gerindra+$pkpi >= $kl){
								echo "<p>Hanura(".$hanura.")+Gerindra(".$gerindra.")+PKPI(".$pkpi.")";
							}
							else if($hanura+$gerindra+$pks >= $kl){
								echo "<p>Hanura(".$hanura.")+Gerindra(".$gerindra.")+PKS(".$pks.")";
							}
							else if($hanura+$gerindra+$ppp >= $kl){
								echo "<p>Hanura(".$hanura.")+Gerindra(".$gerindra.")+PPP(".$ppp.")";
							}
							else if($hanura+$gerindra+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+Gerindra(".$gerindra.")+PSI(".$psi.")";
							}
							else if($hanura+$gerindra+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+Gerindra(".$gerindra.")+Garuda(".$garuda.")";
							}
						}
					}
 					//Golkar
					if($hanura+$golkar>=$kl){
						if($golkar!="0"){
							if($hanura >= $golkar){
								echo "<p>Hanura(".$hanura.") + Golkar(".$golkar.")</p>";	
							}else{
								echo "<p>Golkar(".$golkar.") + Hanura(".$hanura.")</p>";
							}
						}
					}else{
						if($golkar=="0"){

						}else{
							if($hanura+$golkar+$berkarya >= $kl){
								echo "<p>Hanura(".$hanura.")+Golkar(".$golkar.")+Berkarya(".$berkarya.")";
							}
							else if($hanura+$golkar+$demokrat >= $kl){
								echo "<p>Hanura(".$hanura.")+Golkar(".$golkar.")+Demokrat(".$demokrat.")";
							}
							else if($hanura+$golkar+$gerindra >= $kl){
								echo "<p>Hanura(".$hanura.")+Golkar(".$golkar.")+Gerindra(".$gerindra.")";
							}
							else if($hanura+$golkar+$nasdem >= $kl){
								echo "<p>Hanura(".$hanura.")+Golkar(".$golkar.")+Nasdem(".$nasdem.")";
							}
							else if($hanura+$golkar+$pan >= $kl){
								echo "<p>Hanura(".$hanura.")+Golkar(".$golkar.")+PAN(".$pan.")";
							}
							else if($hanura+$golkar+$pbb >= $kl){
								echo "<p>Hanura(".$hanura.")+Golkar(".$golkar.")+PBB(".$pbb.")";
							}
							else if($hanura+$golkar+$perindo >= $kl){
								echo "<p>Hanura(".$hanura.")+Golkar(".$golkar.")+Perindo(".$perindo.")";
							}
							else if($hanura+$golkar+$pdip >= $kl){
								echo "<p>Hanura(".$hanura.")+Golkar(".$golkar.")+PDIP(".$pdip.")";
							}
							else if($hanura+$golkar+$pkb >= $kl){
								echo "<p>Hanura(".$hanura.")+Golkar(".$golkar.")+PKB(".$pkb.")";
							}
							else if($hanura+$golkar+$pkpi >= $kl){
								echo "<p>Hanura(".$hanura.")+Golkar(".$golkar.")+PKPI(".$pkpi.")";
							}
							else if($hanura+$golkar+$pks >= $kl){
								echo "<p>Hanura(".$hanura.")+Golkar(".$golkar.")+PKS(".$pks.")";
							}
							else if($hanura+$golkar+$ppp >= $kl){
								echo "<p>Hanura(".$hanura.")+Golkar(".$golkar.")+PPP(".$ppp.")";
							}
							else if($hanura+$golkar+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+Golkar(".$golkar.")+PSI(".$psi.")";
							}
							else if($hanura+$golkar+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+Golkar(".$golkar.")+Garuda(".$garuda.")";
							}
						}
					}
 					//Nasdem
					if($hanura+$nasdem>=$kl){
						if($nasdem!="0"){
							if($hanura >= $nasdem){
								echo "<p>Hanura(".$hanura.") + Nasdem(".$nasdem.")</p>";	
							}else{
								echo "<p>Nasdem(".$nasdem.") + Hanura(".$hanura.")</p>";
							}
						}
					}else{
						if($nasdem=="0"){

						}else{
							if($hanura+$nasdem+$berkarya >= $kl){
								echo "<p>Hanura(".$hanura.")+Nasdem(".$nasdem.")+Berkarya(".$berkarya.")";
							}
							else if($hanura+$nasdem+$demokrat >= $kl){
								echo "<p>Hanura(".$hanura.")+Nasdem(".$nasdem.")+Demokrat(".$demokrat.")";
							}
							else if($hanura+$nasdem+$gerindra >= $kl){
								echo "<p>Hanura(".$hanura.")+Nasdem(".$nasdem.")+Gerindra(".$gerindra.")";
							}
							else if($hanura+$nasdem+$golkar >= $kl){
								echo "<p>Hanura(".$hanura.")+Nasdem(".$nasdem.")+Golkar(".$golkar.")";
							}
							else if($hanura+$nasdem+$pan >= $kl){
								echo "<p>Hanura(".$hanura.")+Nasdem(".$nasdem.")+PAN(".$pan.")";
							}
							else if($hanura+$nasdem+$pbb >= $kl){
								echo "<p>Hanura(".$hanura.")+Nasdem(".$nasdem.")+PBB(".$pbb.")";
							}
							else if($hanura+$nasdem+$perindo >= $kl){
								echo "<p>Hanura(".$hanura.")+Nasdem(".$nasdem.")+Perindo(".$perindo.")";
							}
							else if($hanura+$nasdem+$pdip >= $kl){
								echo "<p>Hanura(".$hanura.")+Nasdem(".$nasdem.")+PDIP(".$pdip.")";
							}
							else if($hanura+$nasdem+$pkb >= $kl){
								echo "<p>Hanura(".$hanura.")+Nasdem(".$nasdem.")+PKB(".$pkb.")";
							}
							else if($hanura+$nasdem+$pkpi >= $kl){
								echo "<p>Hanura(".$hanura.")+Nasdem(".$nasdem.")+PKPI(".$pkpi.")";
							}
							else if($hanura+$nasdem+$pks >= $kl){
								echo "<p>Hanura(".$hanura.")+Nasdem(".$nasdem.")+PKS(".$pks.")";
							}
							else if($hanura+$nasdem+$ppp >= $kl){
								echo "<p>Hanura(".$hanura.")+Nasdem(".$nasdem.")+PPP(".$ppp.")";
							}
							else if($hanura+$nasdem+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+Nasdem(".$nasdem.")+PSI(".$psi.")";
							}
							else if($hanura+$nasdem+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+Nasdem(".$nasdem.")+Garuda(".$garuda.")";
							}
						}
					}
 					//PAN
					if($hanura+$pan >= $kl){
						if($pan!="0"){
							if($hanura>=$pan){
								echo "<p>Hanura(".$hanura.") + PAN(".$pan.")</p>";
							}else{
								echo "<p>PAN(".$pan.") + Hanura(".$hanura.")</p>";
							}
						}
					}else{
						if($pan=="0"){

						}else{
							if($hanura+$pan+$berkarya >= $kl){
								echo "<p>Hanura(".$hanura.")+PAN(".$pan.")+Berkarya(".$berkarya.")";
							}
							else if($hanura+$pan+$demokrat >= $kl){
								echo "<p>Hanura(".$hanura.")+PAN(".$pan.")+Demokrat(".$demokrat.")";
							}
							else if($hanura+$pan+$gerindra >= $kl){
								echo "<p>Hanura(".$hanura.")+PAN(".$pan.")+Gerindra(".$gerindra.")";
							}
							else if($hanura+$pan+$golkar >= $kl){
								echo "<p>Hanura(".$hanura.")+PAN(".$pan.")+Golkar(".$golkar.")";
							}
							else if($hanura+$pan+$nasdem >= $kl){
								echo "<p>Hanura(".$hanura.")+PAN(".$pan.")+Nasdem(".$nasdem.")";
							}
							else if($hanura+$pan+$pbb >= $kl){
								echo "<p>Hanura(".$hanura.")+PAN(".$pan.")+PBB(".$pbb.")";
							}
							else if($hanura+$pan+$perindo >= $kl){
								echo "<p>Hanura(".$hanura.")+PAN(".$pan.")+Perindo(".$perindo.")";
							}
							else if($hanura+$pan+$pdip >= $kl){
								echo "<p>Hanura(".$hanura.")+PAN(".$pan.")+PDIP(".$pdip.")";
							}
							else if($hanura+$pan+$pkb >= $kl){
								echo "<p>Hanura(".$hanura.")+PAN(".$pan.")+PKB(".$pkb.")";
							}
							else if($hanura+$pan+$pkpi >= $kl){
								echo "<p>Hanura(".$hanura.")+PAN(".$pan.")+PKPI(".$pkpi.")";
							}
							else if($hanura+$pan+$pks >= $kl){
								echo "<p>Hanura(".$hanura.")+PAN(".$pan.")+PKS(".$pks.")";
							}
							else if($hanura+$pan+$ppp >= $kl){
								echo "<p>Hanura(".$hanura.")+PAN(".$pan.")+PPP(".$ppp.")";
							}
							else if($hanura+$pan+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+PAN(".$pan.")+PSI(".$psi.")";
							}
							else if($hanura+$pan+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+PAN(".$pan.")+Garuda(".$garuda.")";
							}
						}
					}
 					//PBB
					if($hanura+$pbb >= $kl){
						if($pbb){
							if($hanura>=$pbb){
								echo "<p>Hanura(".$hanura.") +PBB(".$pbb.")</p>";
							}else{
								echo "<p>PBB(".$pbb.") + Hanura(".$hanura.")</p>";
							}
						}
					}else{
						if($pbb=="0"){

						}else{
							if($hanura+$pbb+$berkarya >= $kl){
								echo "<p>Hanura(".$hanura.")+PBB(".$pbb.")+Berkarya(".$berkarya.")";
							}
							else if($hanura+$pbb+$demokrat >= $kl){
								echo "<p>Hanura(".$hanura.")+PBB(".$pbb.")+Demokrat(".$demokrat.")";
							}
							else if($hanura+$pbb+$gerindra >= $kl){
								echo "<p>Hanura(".$hanura.")+PBB(".$pbb.")+Gerindra(".$gerindra.")";
							}
							else if($hanura+$pbb+$golkar >= $kl){
								echo "<p>Hanura(".$hanura.")+PBB(".$pbb.")+Golkar(".$golkar.")";
							}
							else if($hanura+$pbb+$nasdem >= $kl){
								echo "<p>Hanura(".$hanura.")+PBB(".$pbb.")+Nasdem(".$nasdem.")";
							}
							else if($hanura+$pbb+$pan >= $kl){
								echo "<p>Hanura(".$hanura.")+PBB(".$pbb.")+PAN(".$pan.")";
							}
							else if($hanura+$pbb+$perindo >= $kl){
								echo "<p>Hanura(".$hanura.")+PBB(".$pbb.")+Perindo(".$perindo.")";
							}
							else if($hanura+$pbb+$pdip >= $kl){
								echo "<p>Hanura(".$hanura.")+PBB(".$pbb.")+PDIP(".$pdip.")";
							}
							else if($hanura+$pbb+$pkb >= $kl){
								echo "<p>Hanura(".$hanura.")+PBB(".$pbb.")+PKB(".$pkb.")";
							}
							else if($hanura+$pbb+$pkpi >= $kl){
								echo "<p>Hanura(".$hanura.")+PBB(".$pbb.")+PKPI(".$pkpi.")";
							}
							else if($hanura+$pbb+$pks >= $kl){
								echo "<p>Hanura(".$hanura.")+PBB(".$pbb.")+PKS(".$pks.")";
							}
							else if($hanura+$pbb+$ppp >= $kl){
								echo "<p>Hanura(".$hanura.")+PBB(".$pbb.")+PPP(".$ppp.")";
							}
							else if($hanura+$pbb+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+PBB(".$pbb.")+PSI(".$psi.")";
							}
							else if($hanura+$pbb+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+PBB(".$pbb.")+Garuda(".$garuda.")";
							}
						}
					}
 					//Perindo
					if($hanura+$perindo >= $kl){
						if($perindo!="0"){
							if($hanura>=$perindo){
								echo "<p>Hanura(".$hanura.") + Perindo(".$perindo.")</p>";
							}else{
								echo "<p>Perindo(".$perindo.") + Hanura(".$hanura.")</p>";
							}
						}
					}else{
						if($perindo!="0"){
							if($hanura+$perindo+$berkarya >= $kl){
								echo "<p>Hanura(".$hanura.")+Perindo(".$perindo.")+Berkarya(".$berkarya.")";
							}
							else if($hanura+$perindo+$demokrat >= $kl){
								echo "<p>Hanura(".$hanura.")+Perindo(".$perindo.")+Demokrat(".$demokrat.")";
							}
							else if($hanura+$perindo+$gerindra >= $kl){
								echo "<p>Hanura(".$hanura.")+Perindo(".$perindo.")+Gerindra(".$gerindra.")";
							}
							else if($hanura+$perindo+$golkar >= $kl){
								echo "<p>Hanura(".$hanura.")+Perindo(".$perindo.")+Golkar(".$golkar.")";
							}
							else if($hanura+$perindo+$nasdem >= $kl){
								echo "<p>Hanura(".$hanura.")+Perindo(".$perindo.")+Nasdem(".$nasdem.")";
							}
							else if($hanura+$perindo+$pan >= $kl){
								echo "<p>Hanura(".$hanura.")+Perindo(".$perindo.")+PAN(".$pan.")";
							}
							else if($hanura+$perindo+$pbb >= $kl){
								echo "<p>Hanura(".$hanura.")+Perindo(".$perindo.")+PBB(".$pbb.")";
							}
							else if($hanura+$perindo+$pdip >= $kl){
								echo "<p>Hanura(".$hanura.")+Perindo(".$perindo.")+PDIP(".$pdip.")";
							}
							else if($hanura+$perindo+$pkb >= $kl){
								echo "<p>Hanura(".$hanura.")+Perindo(".$perindo.")+PKB(".$pkb.")";
							}
							else if($hanura+$perindo+$pkpi >= $kl){
								echo "<p>Hanura(".$hanura.")+Perindo(".$perindo.")+PKPI(".$pkpi.")";
							}
							else if($hanura+$perindo+$pks >= $kl){
								echo "<p>Hanura(".$hanura.")+Perindo(".$perindo.")+PKS(".$pks.")";
							}
							else if($hanura+$perindo+$ppp >= $kl){
								echo "<p>Hanura(".$hanura.")+Perindo(".$perindo.")+PPP(".$ppp.")";
							}
							else if($hanura+$perindo+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+Perindo(".$perindo.")+PSI(".$psi.")";
							}
							else if($hanura+$perindo+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+Perindo(".$perindo.")+Garuda(".$garuda.")";
							}
						}
					}
 					// PDIP
					if($hanura+$pdip >= $kl){
						if($pdip!="0"){
							if($hanura>=$pdip){
								echo "<p>Hanura(".$hanura.") + PDIP(".$pdip.")</p>";
							}else{
								echo "<p>PDIP(".$pdip.") + Hanura(".$hanura.")</p>";
							}
						}
					}else{
						if($pdip!="0"){
							if($hanura+$pdip+$berkarya >= $kl){
								echo "<p>Hanura(".$hanura.")+PDIP(".$pdip.")+Berkarya(".$berkarya.")";
							}
							else if($hanura+$pdip+$demokrat >= $kl){
								echo "<p>Hanura(".$hanura.")+PDIP(".$pdip.")+Demokrat(".$demokrat.")";
							}
							else if($hanura+$pdip+$gerindra >= $kl){
								echo "<p>Hanura(".$hanura.")+PDIP(".$pdip.")+Gerindra(".$gerindra.")";
							}
							else if($hanura+$pdip+$golkar >= $kl){
								echo "<p>Hanura(".$hanura.")+PDIP(".$pdip.")+Golkar(".$golkar.")";
							}
							else if($hanura+$pdip+$nasdem >= $kl){
								echo "<p>Hanura(".$hanura.")+PDIP(".$pdip.")+Nasdem(".$nasdem.")";
							}
							else if($hanura+$pdip+$pan >= $kl){
								echo "<p>Hanura(".$hanura.")+PDIP(".$pdip.")+PAN(".$pan.")";
							}
							else if($hanura+$pdip+$pbb >= $kl){
								echo "<p>Hanura(".$hanura.")+PDIP(".$pdip.")+PBB(".$pbb.")";
							}
							else if($hanura+$pdip+$pdip >= $kl){
								echo "<p>Hanura(".$hanura.")+PDIP(".$pdip.")+Perindo(".$perindo.")";
							}
							else if($hanura+$pdip+$pkb >= $kl){
								echo "<p>Hanura(".$hanura.")+PDIP(".$pdip.")+PKB(".$pkb.")";
							}
							else if($hanura+$pdip+$pkpi >= $kl){
								echo "<p>Hanura(".$hanura.")+PDIP(".$pdip.")+PKPI(".$pkpi.")";
							}
							else if($hanura+$pdip+$pks >= $kl){
								echo "<p>Hanura(".$hanura.")+PDIP(".$pdip.")+PKS(".$pks.")";
							}
							else if($hanura+$pdip+$ppp >= $kl){
								echo "<p>Hanura(".$hanura.")+PDIP(".$pdip.")+PPP(".$ppp.")";
							}
							else if($hanura+$pdip+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+PDIP(".$pdip.")+PSI(".$psi.")";
							}
							else if($hanura+$pdip+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+PDIP(".$pdip.")+Garuda(".$garuda.")";
							}
						}

					}
 					// PKB
					if($hanura+$pkb >= $kl){
						if($pkb!="0"){
							if($hanura>=$pkb){
								echo "<p>Hanura(".$hanura.") + PKB(".$pkb.")</p>";
							}else{
								echo "<p>PKB(".$pkb.") + Hanura(".$hanura.")</p>";
							}
						}
					}else{
						if($pkb!="0"){
							if($hanura+$pkb+$berkarya >= $kl){
								echo "<p>Hanura(".$hanura.")+PKB(".$pkb.")+Berkarya(".$berkarya.")";
							}
							else if($hanura+$pkb+$demokrat >= $kl){
								echo "<p>Hanura(".$hanura.")+PKB(".$pkb.")+Demokrat(".$demokrat.")";
							}
							else if($hanura+$pkb+$gerindra >= $kl){
								echo "<p>Hanura(".$hanura.")+PKB(".$pkb.")+Gerindra(".$gerindra.")";
							}
							else if($hanura+$pkb+$golkar >= $kl){
								echo "<p>Hanura(".$hanura.")+PKB(".$pkb.")+Golkar(".$golkar.")";
							}
							else if($hanura+$pkb+$nasdem >= $kl){
								echo "<p>Hanura(".$hanura.")+PKB(".$pkb.")+Nasdem(".$nasdem.")";
							}
							else if($hanura+$pkb+$pan >= $kl){
								echo "<p>Hanura(".$hanura.")+PKB(".$pkb.")+PAN(".$pan.")";
							}
							else if($hanura+$pkb+$pbb >= $kl){
								echo "<p>Hanura(".$hanura.")+PKB(".$pkb.")+PBB(".$pbb.")";
							}
							else if($hanura+$pkb+$pkb >= $kl){
								echo "<p>Hanura(".$hanura.")+PKB(".$pkb.")+Perindo(".$perindo.")";
							}
							else if($hanura+$pkb+$pkb >= $kl){
								echo "<p>Hanura(".$hanura.")+PKB(".$pkb.")+PDIP(".$pdip.")";
							}
							else if($hanura+$pkb+$pkpi >= $kl){
								echo "<p>Hanura(".$hanura.")+PKB(".$pkb.")+PKPI(".$pkpi.")";
							}
							else if($hanura+$pkb+$pks >= $kl){
								echo "<p>Hanura(".$hanura.")+PKB(".$pkb.")+PKS(".$pks.")";
							}
							else if($hanura+$pkb+$ppp >= $kl){
								echo "<p>Hanura(".$hanura.")+PKB(".$pkb.")+PPP(".$ppp.")";
							}
							else if($hanura+$pkb+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+PKB(".$pkb.")+PSI(".$psi.")";
							}
							else if($hanura+$pkb+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+PKB(".$pkb.")+Garuda(".$garuda.")";
							}
						}
					}
 					// PKPI
					if($hanura+$pkpi >= $kl){
						if($pkpi!="0"){
							if($hanura>=$pkpi){
								echo "<p>Hanura(".$hanura.") + PKPI(".$pkpi.")</p>";
							}else{
								echo "<p>PKPI(".$pkpi.") + Hanura(".$hanura.")</p>";
							}
						}
					}else{
						if($pkpi!="0"){
							if($hanura+$pkpi+$berkarya >= $kl){
								echo "<p>Hanura(".$hanura.")+PKPI(".$pkpi.")+Berkarya(".$berkarya.")";
							}
							else if($hanura+$pkpi+$demokrat >= $kl){
								echo "<p>Hanura(".$hanura.")+PKPI(".$pkpi.")+Demokrat(".$demokrat.")";
							}
							else if($hanura+$pkpi+$gerindra >= $kl){
								echo "<p>Hanura(".$hanura.")+PKPI(".$pkpi.")+Gerindra(".$gerindra.")";
							}
							else if($hanura+$pkpi+$golkar >= $kl){
								echo "<p>Hanura(".$hanura.")+PKPI(".$pkpi.")+Golkar(".$golkar.")";
							}
							else if($hanura+$pkpi+$nasdem >= $kl){
								echo "<p>Hanura(".$hanura.")+PKPI(".$pkpi.")+Nasdem(".$nasdem.")";
							}
							else if($hanura+$pkpi+$pan >= $kl){
								echo "<p>Hanura(".$hanura.")+PKPI(".$pkpi.")+PAN(".$pan.")";
							}
							else if($hanura+$pkpi+$pbb >= $kl){
								echo "<p>Hanura(".$hanura.")+PKPI(".$pkpi.")+PBB(".$pbb.")";
							}
							else if($hanura+$pkpi+$pkpi >= $kl){
								echo "<p>Hanura(".$hanura.")+PKPI(".$pkpi.")+Perindo(".$perindo.")";
							}
							else if($hanura+$pkpi+$pkpi >= $kl){
								echo "<p>Hanura(".$hanura.")+PKPI(".$pkpi.")+PDIP(".$pdip.")";
							}
							else if($hanura+$pkpi+$pkpi >= $kl){
								echo "<p>Hanura(".$hanura.")+PKPI(".$pkpi.")+PKB(".$pkb.")";
							}
							else if($hanura+$pkpi+$pks >= $kl){
								echo "<p>Hanura(".$hanura.")+PKPI(".$pkpi.")+PKS(".$pks.")";
							}
							else if($hanura+$pkpi+$ppp >= $kl){
								echo "<p>Hanura(".$hanura.")+PKPI(".$pkpi.")+PPP(".$ppp.")";
							}
							else if($hanura+$pkpi+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+PKPI(".$pkpi.")+PSI(".$psi.")";
							}
							else if($hanura+$pkpi+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+PKPI(".$pkpi.")+Garuda(".$garuda.")";
							}
						}
					}
 					// PKS
					if($hanura+$pks >= $kl){
						if($pks!="0"){
							if($hanura>=$pks){
								echo "<p>Hanura(".$hanura.") + PKS(".$pks.")</p>";
							}else{
								echo "<p>PKS(".$pks.") + Hanura(".$hanura.")</p>";
							}
						}
					}else{
						if($pks!="0"){
							if($hanura+$pks+$berkarya >= $kl){
								echo "<p>Hanura(".$hanura.")+PKS(".$pks.")+Berkarya(".$berkarya.")";
							}
							else if($hanura+$pks+$demokrat >= $kl){
								echo "<p>Hanura(".$hanura.")+PKS(".$pks.")+Demokrat(".$demokrat.")";
							}
							else if($hanura+$pks+$gerindra >= $kl){
								echo "<p>Hanura(".$hanura.")+PKS(".$pks.")+Gerindra(".$gerindra.")";
							}
							else if($hanura+$pks+$golkar >= $kl){
								echo "<p>Hanura(".$hanura.")+PKS(".$pks.")+Golkar(".$golkar.")";
							}
							else if($hanura+$pks+$nasdem >= $kl){
								echo "<p>Hanura(".$hanura.")+PKS(".$pks.")+Nasdem(".$nasdem.")";
							}
							else if($hanura+$pks+$pan >= $kl){
								echo "<p>Hanura(".$hanura.")+PKS(".$pks.")+PAN(".$pan.")";
							}
							else if($hanura+$pks+$pbb >= $kl){
								echo "<p>Hanura(".$hanura.")+PKS(".$pks.")+PBB(".$pbb.")";
							}
							else if($hanura+$pks+$pks >= $kl){
								echo "<p>Hanura(".$hanura.")+PKS(".$pks.")+Perindo(".$perindo.")";
							}
							else if($hanura+$pks+$pks >= $kl){
								echo "<p>Hanura(".$hanura.")+PKS(".$pks.")+PDIP(".$pdip.")";
							}
							else if($hanura+$pks+$pks >= $kl){
								echo "<p>Hanura(".$hanura.")+PKS(".$pks.")+PKB(".$pkb.")";
							}
							else if($hanura+$pks+$pks >= $kl){
								echo "<p>Hanura(".$hanura.")+PKS(".$pks.")+PKPI(".$pkpi.")";
							}
							else if($hanura+$pks+$ppp >= $kl){
								echo "<p>Hanura(".$hanura.")+PKS(".$pks.")+PPP(".$ppp.")";
							}
							else if($hanura+$pks+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+PKS(".$pks.")+PSI(".$psi.")";
							}
							else if($hanura+$pks+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+PKS(".$pks.")+Garuda(".$garuda.")";
							}
						}
					}
 					// PPP
					if($hanura+$ppp >= $kl){
						if($ppp!="0"){
							if($hanura>=$ppp){
								echo "<p>Hanura(".$hanura.") + PPP(".$ppp.")</p>";
							}else{
								echo "<p>PPP(".$ppp.") + Hanura(".$hanura.")</p>";
							}
						}
					}else{
						if($ppp!="0"){
							if($hanura+$ppp+$berkarya >= $kl){
								echo "<p>Hanura(".$hanura.")+PPP(".$ppp.")+Berkarya(".$berkarya.")";
							}
							else if($hanura+$ppp+$demokrat >= $kl){
								echo "<p>Hanura(".$hanura.")+PPP(".$ppp.")+Demokrat(".$demokrat.")";
							}
							else if($hanura+$ppp+$gerindra >= $kl){
								echo "<p>Hanura(".$hanura.")+PPP(".$ppp.")+Gerindra(".$gerindra.")";
							}
							else if($hanura+$ppp+$golkar >= $kl){
								echo "<p>Hanura(".$hanura.")+PPP(".$ppp.")+Golkar(".$golkar.")";
							}
							else if($hanura+$ppp+$nasdem >= $kl){
								echo "<p>Hanura(".$hanura.")+PPP(".$ppp.")+Nasdem(".$nasdem.")";
							}
							else if($hanura+$ppp+$pan >= $kl){
								echo "<p>Hanura(".$hanura.")+PPP(".$ppp.")+PAN(".$pan.")";
							}
							else if($hanura+$ppp+$pbb >= $kl){
								echo "<p>Hanura(".$hanura.")+PPP(".$ppp.")+PBB(".$pbb.")";
							}
							else if($hanura+$ppp+$ppp >= $kl){
								echo "<p>Hanura(".$hanura.")+PPP(".$ppp.")+Perindo(".$perindo.")";
							}
							else if($hanura+$ppp+$ppp >= $kl){
								echo "<p>Hanura(".$hanura.")+PPP(".$ppp.")+PDIP(".$pdip.")";
							}
							else if($hanura+$ppp+$ppp >= $kl){
								echo "<p>Hanura(".$hanura.")+PPP(".$ppp.")+PKB(".$pkb.")";
							}
							else if($hanura+$ppp+$ppp >= $kl){
								echo "<p>Hanura(".$hanura.")+PPP(".$ppp.")+PKPI(".$pkpi.")";
							}
							else if($hanura+$ppp+$ppp >= $kl){
								echo "<p>Hanura(".$hanura.")+PPP(".$ppp.")+PKS(".$pks.")";
							}
							else if($hanura+$ppp+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+PPP(".$ppp.")+PSI(".$psi.")";
							}
							else if($hanura+$ppp+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+PPP(".$ppp.")+Garuda(".$garuda.")";
							}
						}
					}

 					// PSI
					if($hanura+$psi >= $kl){
						if($psi!="0"){
							if($hanura>=$psi){
								echo "<p>Hanura(".$hanura.") + PSI(".$psi.")</p>";
							}else{
								echo "<p>PSI(".$psi.") + Hanura(".$hanura.")</p>";
							}
						}
					}else{
						if($psi!="0"){
							if($hanura+$psi+$berkarya >= $kl){
								echo "<p>Hanura(".$hanura.")+PSI(".$psi.")+Berkarya(".$berkarya.")";
							}
							else if($hanura+$psi+$demokrat >= $kl){
								echo "<p>Hanura(".$hanura.")+PSI(".$psi.")+Demokrat(".$demokrat.")";
							}
							else if($hanura+$psi+$gerindra >= $kl){
								echo "<p>Hanura(".$hanura.")+PSI(".$psi.")+Gerindra(".$gerindra.")";
							}
							else if($hanura+$psi+$golkar >= $kl){
								echo "<p>Hanura(".$hanura.")+PSI(".$psi.")+Golkar(".$golkar.")";
							}
							else if($hanura+$psi+$nasdem >= $kl){
								echo "<p>Hanura(".$hanura.")+PSI(".$psi.")+Nasdem(".$nasdem.")";
							}
							else if($hanura+$psi+$pan >= $kl){
								echo "<p>Hanura(".$hanura.")+PSI(".$psi.")+PAN(".$pan.")";
							}
							else if($hanura+$psi+$pbb >= $kl){
								echo "<p>Hanura(".$hanura.")+PSI(".$psi.")+PBB(".$pbb.")";
							}
							else if($hanura+$psi+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+PSI(".$psi.")+Perindo(".$perindo.")";
							}
							else if($hanura+$psi+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+PSI(".$psi.")+PDIP(".$pdip.")";
							}
							else if($hanura+$psi+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+PSI(".$psi.")+PKB(".$pkb.")";
							}
							else if($hanura+$psi+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+PSI(".$psi.")+PKPI(".$pkpi.")";
							}
							else if($hanura+$psi+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+PSI(".$psi.")+PKS(".$pks.")";
							}
							else if($hanura+$psi+$psi >= $kl){
								echo "<p>Hanura(".$hanura.")+PSI(".$psi.")+PPP(".$ppp.")";
							}
							else if($hanura+$psi+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+PSI(".$psi.")+Garuda(".$garuda.")";
							}
						}
					}
 					// Garuda
					if($hanura+$garuda >= $kl){
						if($garuda!="0"){
							if($hanura>=$garuda){
								echo "<p>Hanura(".$hanura.") + Garuda(".$garuda.")</p>";
							}else{
								echo "<p>Garuda(".$garuda.") + Hanura(".$hanura.")</p>";
							}
						}
					}else{
						if($garuda!="0"){
							if($hanura+$garuda+$berkarya >= $kl){
								echo "<p>Hanura(".$hanura.")+Garuda(".$garuda.")+Berkarya(".$berkarya.")";
							}
							else if($hanura+$garuda+$demokrat >= $kl){
								echo "<p>Hanura(".$hanura.")+Garuda(".$garuda.")+Demokrat(".$demokrat.")";
							}
							else if($hanura+$garuda+$gerindra >= $kl){
								echo "<p>Hanura(".$hanura.")+Garuda(".$garuda.")+Gerindra(".$gerindra.")";
							}
							else if($hanura+$garuda+$golkar >= $kl){
								echo "<p>Hanura(".$hanura.")+Garuda(".$garuda.")+Golkar(".$golkar.")";
							}
							else if($hanura+$garuda+$nasdem >= $kl){
								echo "<p>Hanura(".$hanura.")+Garuda(".$garuda.")+Nasdem(".$nasdem.")";
							}
							else if($hanura+$garuda+$pan >= $kl){
								echo "<p>Hanura(".$hanura.")+Garuda(".$garuda.")+PAN(".$pan.")";
							}
							else if($hanura+$garuda+$pbb >= $kl){
								echo "<p>Hanura(".$hanura.")+Garuda(".$garuda.")+PBB(".$pbb.")";
							}
							else if($hanura+$garuda+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+Garuda(".$garuda.")+Perindo(".$perindo.")";
							}
							else if($hanura+$garuda+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+Garuda(".$garuda.")+PDIP(".$pdip.")";
							}
							else if($hanura+$garuda+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+Garuda(".$garuda.")+PKB(".$pkb.")";
							}
							else if($hanura+$garuda+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+Garuda(".$garuda.")+PKPI(".$pkpi.")";
							}
							else if($hanura+$garuda+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+Garuda(".$garuda.")+PKS(".$pks.")";
							}
							else if($hanura+$garuda+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+Garuda(".$garuda.")+PPP(".$ppp.")";
							}
							else if($hanura+$garuda+$garuda >= $kl){
								echo "<p>Hanura(".$hanura.")+Garuda(".$garuda.")+PSI(".$psi.")";
							}
						}
					}
				}
    		}

    	}
	
    }
}
