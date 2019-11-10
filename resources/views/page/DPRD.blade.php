@section('active-DPRD','active')
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
            <select name="role" id="prov" class="selectpicker" data-live-search="true" data-style="btn btn-info" title="Provinsi">
              <option value="" selected="" disabled="">Pilih Provinsi</option>
              @foreach($prov as $pro)
              <option value="{{$pro->id_prov}}">{{$pro->nama_prov}}</option>
              @endforeach                                  
            </select>
          </div>
          <div id="tamp" class="row">
            <div class='col-lg-12' hidden="">
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
          </div>
          <div class="material-datatables" id="tbb">
            <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
              <thead>
                <tr>
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
              <tbody id="dat">                
              </tbody>
            </table>
          </div>
          <div>
            <br><hr>
            <h5><b>Legenda</b></h5>
            <table>
              <tr>
                <td><img src="{{asset('assets/img/logo/Partai1.jpg')}}" alt=""></td>
                <td><img src="{{asset('assets/img/logo/Partai2.jpg')}}" alt=""></td>
              </tr>
            </table>
           </div>
            
          </div>
        </div>
        <div id="isi">
          <!-- <p id="isi"></p> -->
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
  $('#prov').change(function() {
    var prov=$(this).val();
    // var kok=$(this).val();
    tampil_partai(prov);
  })

  function tampil_partai(prov) {
    $.ajax({
      url : "{{route('changee')}}",
      type : "get",
      data:{
        prov : prov
      },
      dataType:"html",
      success:function(data) {
        console.log(data);
        // $('#da').dataTable();
        $('#tbb').html(data);
        $('#datatables').dataTable();
        // $('#dat').html(data);
        // $('#dat').dataTable('refresh');
      }
    })
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
      url    : "{{route('chartt')}}",
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

  $('#prov').change(function() {
    var prov=$(this).val();
    tampil_dprd(prov);
  });

  function tampil_dprd(prov) {
    $.ajax({
      url : "{{route('changee')}}",
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