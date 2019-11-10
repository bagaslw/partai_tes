@section('active-all','active')
@extends('master')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="material-icons">assignment</i>
          </div>
          <div class="card-title">
            <h4>DATA</h4>                      
          </div>
        </div>
        <div class="card-body">
          <div class="toolbar">
            <select name="role" id="prov" class="selectpicker w-25" data-live-search="true" data-style="btn btn-info" title="Pilih Provinsi">
              @foreach($prov as $p)
              <option value="{{$p->id_prov}}">{{$p->nama_prov}}</option>
              @endforeach                                  
            </select>
            <select name="role" id="kab" class="selectpicker w-25" data-live-search="true" data-style="btn btn-info" title="Pilih Kab/Kota">

            </select>
          </div>

          <div id="tamp" class="row">
            <canvas hidden="">

            </canvas>
          </div>

          <div class="material-datatables" id="tbb">
            <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
              <thead>
                <tr>
                  <th hidden=""></th>
                  <th>KABUPATEN/KOTA</th>
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

              </tbody> 
            </table>

            <hr>

            <h5>
              <b>Legenda</b>
            </h5>

            <table>
              <tr>
                <td><img src="{{asset('assets/img/logo/Partai1.jpg')}}" alt=""></td>
                <td><img src="{{asset('assets/img/logo/Partai2.jpg')}}" alt=""></td>
              </tr>
            </table>

          </div>
        </div>
        <!-- end content-->
      </div>
      <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
  </div>
</div>
</div>
@endsection
@section('js')
<script>

  $(document).ready(function () {
    var datas = document.getElementById('datas').value;
    tampil_data(datas);
  });

  $('#kab').selectpicker('hide');

  $('#kab').change(function () {
    var prov = $(this).val();
    get_data(prov);
  })

  $('#prov').change(function () {
    var jet = $(this).val();
    get_asw(jet);
  })

  function get_asw(kk) {
    $.ajax({
      url : "{{route('tampil_c')}}",
      method : "get",
      data : {
        prov : kk
      },
      dataType:"html",
      success:function(data) {
        console.log(data);
        $('#tamp').html(data);
      }
    })


    $.ajax({
      url    : "{{route('chart_p')}}",
      method : "GET",    
      type   : "json",
      data   : {
        id_dt : kk
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

      var ctx = document.getElementById('multipleBarsChart').getContext('2d');
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
              'rgba(255, 152, 0, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)'
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

  function get_data(prov) {
    $.ajax({
      url : "{{route('tampil')}}",
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
      url    : "{{route('chart')}}",
      method : "GET",    
      type   : "json",
      data   : {
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

      var ctx = document.getElementById('multipleBarsChart1').getContext('2d');
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
              'rgba(255, 152, 0, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)'
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

  $('#prov').change(function() {
    var prov=$(this).val();
    tampil_dprd(prov);
    change_kab(prov);
    $('#kab').selectpicker('show');
  });

  function change_kab(prov) {
    $.ajax({
      url : "{{route('change_kk')}}",
      type : "get",
      data:{
        pov : prov
      },
      dataType:"html",
      success:function(data) {
        console.log(data);
        $('#kab').selectpicker();
        $('#kab').html(data);
        $('#kab').selectpicker('refresh');
      }
    })
  }

  function tampil_dprd(prov) {
    $.ajax({
      url : "{{route('change')}}",
      type : "get",
      data:{
        prov : prov
      },
      dataType:"html",
      success:function(data) {
        console.log(data);
        $('#tbb').html(data);
        $('#datatables').dataTable();
      }
    })
  }
</script>
@endsection