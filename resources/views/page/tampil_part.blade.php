@section('active-kalkulasi','active')
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
          <br><hr>
          <h5><b>Legenda</b></h5>
          <table>
            <tr>
              <td><img src="{{asset('assets/img/logo/Partai1.jpg')}}" alt=""></td>
              <td><img src="{{asset('assets/img/logo/Partai2.jpg')}}" alt=""></td>
            </tr>
          </table>
          <div class="" id="isi"></div>
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
    hitung_data(prov);
  })

  function tampil_partai(prov) {
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
  function hitung_data(prov) {
   $.ajax({
    url : "{{route('hitung_data')}}",
    type : "get",
    data:{
      prov : prov
    },
    dataType : "html",
    success:function(data) {
      console.log(data);
      $('#isi').html(data);
    }
  })
 }
</script>
@endsection