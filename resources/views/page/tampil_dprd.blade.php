@extends('master')
@section('active-dprd','active')
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
            <select name="role" id="prov" class="selectpicker" data-style="btn btn-info" title="Provinsi">
              <option value="" selected="" disabled="">Pilih Provinsi</option>
              @foreach($prov as $pro)
              <option value="{{$pro->id_prov}}">{{$pro->nama_prov}}</option>
              @endforeach                                  
            </select>
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
              @foreach($show as $k)
              <tr align='center'>                     
                <td hidden="">{{$k->id_dt}}</td>
                @if($k->nama_kab=="Provinsi")    
                <td align='left'>{{$k->nama_kab}} {{$k->nama_prov}}</td>
                @endif
                @if($k->nama_kab!="Provinsi")    
                <td align='left'>{{$k->nama_kab}}</td>
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
            </table>
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
    var prov = document.getElementById('show').value;
    tampil_dprd(prov);
  });
  $('#prov').change(function() {
    var prov=$(this).val();
    tampil_dprd(prov);
  });
  function tampil_dprd(prov) {
    $.ajax({
      url : "{{route('change_data')}}",
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
</script>
@endsection