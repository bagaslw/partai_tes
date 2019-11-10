@extends('master')
@section('active-dashboard','active')
@section('content')
<div class="container">
	<div class="container-fluid">

		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header card-header-info card-header-icon">
						<div class="card-icon">
							<i class="material-icons">inbox</i>
						</div>
						<p class="card-category">Kursi Hanura DPRD Seluruh</p>
						<h3 class="card-title" id="total_all"></h3>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons">date_range</i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header card-header-info card-header-icon">
						<div class="card-icon">
							<i class="material-icons">event_busy</i>
						</div>
						<p class="card-category">Kursi Hanura DPRD Provinsi</p>
						<h3 class="card-title" id="total_prov"></h3>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons">date_range</i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header card-header-info card-header-icon">
						<div class="card-icon">
							<i class="material-icons">event_available</i>
						</div>
						<p class="card-category">Kursi Hanura DPRD Kab/Kot</p>
						<h3 class="card-title" id="total_kab"></h3>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons">event_available</i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<select name="provinsi" id="provinsi" class="selectpicker" data-live-search="true" data-style="btn btn-info" title="Provinsi">
			@foreach($prov as $pro)
			<option onclick="get_data({$pro->id_prov}})" value="{{$pro->id_prov}}" >{{$pro->nama_prov}}</option>@endforeach                                                                      
		</select>
		<select name="provinsi" id="kab" class="selectpicker" data-style="btn btn-info" title="Kabupaten/Kota">
			<option value="">KAB/KOTA</option>
		</select>
		<div id="tamp" class="row">
			
		</div>
		<div id="tampil" class="row">
			
		</div>
	</div>	
</div>
@endsection
@section('js')
<script>
	
	$('#kab').selectpicker('hide');

	$.ajax({
		url : "{{route('statistik_dprd')}}",
		method : "GET",
		type :"json",
		success:function(data) {
			$('#total_all').text(data.all),
			$('#total_prov').text(data.prov),
			$('#total_kab').text(data.kab)
		}
	})


	$('#provinsi').change(function() {
		var prov = $(this).val();
		tampil_card(prov);
		get_data(prov);
	})

	$('#kab').change(function() {
		var kot = $(this).val();
		change_kot(kot);
	})

	function tampil_card(prov) {
		$.ajax({
			url : "{{route('tampil_card')}}",
			method : "get",
			data : {
				prov : prov
			},
			dataType : "html",
			success:function(data) {
				console.log(data);
				$('#kab').selectpicker('show');
				$('#kab').html(data);
				$('#kab').selectpicker();
				$('#kab').selectpicker('refresh');
			}
		})
	}

</script>
<script>
	function get_data(prov) {
		$.ajax({
			url : "{{route('tamp_chart')}}",
			method : "get",
			data : {
				prov : prov
			},
			dataType:"html",
			success:function(data) {
				console.log(data);
				$('#tamp').html(data);
			}
		})


		$.ajax({
			url    : "{{route('chart_tol')}}",
			method : "GET",    
			type   : "json",
			data	 : {
				id_dt : prov
			},
			success: function (data) {
				console.log(data);
				var hanura = data.hanura;
				var berkarya = data.berkarya;
				var demokrat = data.demokrat;
				var gerindra = data.gerindra;
				var golkar = data.golkar;
				var nasdem = data.nasdem;
				var pan = data.pan;
				var pbb = data.pbb;
				var perindo = data.perindo;
				var pdip = data.pdip;
				var pkb = data.pkb;
				var pkpi = data.pkpi;
				var pks = data.pks;
				var ppp = data.ppp;
				var psi = data.psi;
				var garuda = data.garuda;        
				chart_tol(hanura,berkarya,demokrat,gerindra,golkar,nasdem,pan,pbb,perindo,pdip,pkb,pkpi,pks,ppp,psi,garuda);
			}  
		})

		function chart_tol(hanura,berkarya,demokrat,gerindra,golkar,nasdem,pan,pbb,perindo,pdip,pkb,pkpi,pks,ppp,psi,garuda) {

			var ctx	= document.getElementById('multipleBarsChart1').getContext('2d');
			var MyChart=new Chart(
				ctx, 
				{
					type : "bar",
					data : {
						labels : ['Hanura', 'Berkarya', 'Demokrat', 'Gerindra', 'Golkar', 'Nasdem', 'PAN', 'PBB', 'Perindo', 'PDIP', 'PKB', 'PKPI','PKS','PPP','PSI','Garuda'],
						datasets : [{
							label : 'Perolehan Kursi',
							data : [hanura,berkarya,demokrat,gerindra,golkar,nasdem,pan,pbb,perindo,pdip,pkb,pkpi,pks,ppp,psi,garuda],
							backgroundColor: [
							'rgba(255, 152, 0, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)'
							],
							borderWidth : 1
						}]
					},
					options : {
						scales : {
							yAxes : [{
								ticks:{
									beginAtZero:true
								}
							}]
						}
					}
				}); 
		}
	}
</script>
<script>
	function change_kot(kot) {
		$.ajax({
			url : "{{route('tamp_chartt')}}",
			method : "get",
			data : {
				kot : kot
			},
			dataType : "html",
			success:function(data) {
				console.log(data);
				$('#tampil').html(data);
			}
		})


		$.ajax({
			url    : "{{route('change_kot')}}",
			method : "GET",    
			type   : "json",
			data	 : {
				id_dt : kot
			},
			success: function (data) {
				console.log(data);
				var hanura = data.hanura;
				var berkarya = data.berkarya;
				var demokrat = data.demokrat;
				var gerindra = data.gerindra;
				var golkar = data.golkar;
				var nasdem = data.nasdem;
				var pan = data.pan;
				var pbb = data.pbb;
				var perindo = data.perindo;
				var pdip = data.pdip;
				var pkb = data.pkb;
				var pkpi = data.pkpi;
				var pks = data.pks;
				var ppp = data.ppp;
				var psi = data.psi;
				var garuda = data.garuda;        
				chart_toll(hanura,berkarya,demokrat,gerindra,golkar,nasdem,pan,pbb,perindo,pdip,pkb,pkpi,pks,ppp,psi,garuda);
			}  
		})
	}
	
	function chart_toll(hanura,berkarya,demokrat,gerindra,golkar,nasdem,pan,pbb,perindo,pdip,pkb,pkpi,pks,ppp,psi,garuda) {

			var ct	= document.getElementById('multipleBarsChart');
			var MyChart=new Chart(
				ct, 
				{
					type : "bar",
					data : {
						labels : ['Hanura', 'Berkarya', 'Demokrat', 'Gerindra', 'Golkar', 'Nasdem', 'PAN', 'PBB', 'Perindo', 'PDIP', 'PKB', 'PKPI','PKS','PPP','PSI','Garuda'],
						datasets : [{
							label : 'Perolehan Kursi',
							data : [hanura,berkarya,demokrat,gerindra,golkar,nasdem,pan,pbb,perindo,pdip,pkb,pkpi,pks,ppp,psi,garuda],
							backgroundColor: [
							'rgba(255, 152, 0, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(54, 162, 235, 0.2)'
							],
							borderWidth : 1
						}]
					},
					options : {
						scales : {
							yAxes : [{
								ticks:{
									beginAtZero:true
								}
							}]
						}
					}
				}); 
		}
</script>
@endsection