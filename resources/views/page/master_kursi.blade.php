@extends('master')
@section('show-master','show')
@section('active-kursi','active')
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
            <h4>Master Kursi Partai</h4>                      
          </div>
        </div>
        <div class="card-body">
          <div class="toolbar">
            <button class="btn btn-info" data-toggle="modal" data-target="#addUser">
              <span class="btn-label">
                <i class="material-icons">add</i>
              </span>
              Add Kursi Partai
            </button>
          </div>
          <div class="material-datatables">
            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Provinsi</th>
                  <th>Kota/Kab</th>
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
                  <th class="disabled-sorting text-right">Actions</th>
                </tr>
              </thead>
              <?php 
              $no=1;
              ?>
                      <!-- <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Password</th>      
                          <th class="text-right">Actions</th>
                        </tr>
                      </tfoot> -->
                      <tbody>
                        @foreach($show as $k)
                        <tr>
                          <td><?php echo $no++; ?></td>                         
                          <td>{{$k->nama_prov}}</td>
                          <td>{{$k->nama_kab}}</td>
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
                          <td class="td-actions text-right">
                            <!-- <button type="button" rel="tooltip" class="btn btn-info btn-round" data-original-title="Preview Data" title="Edit Data">
                              <i class="material-icons">visibility</i>
                            </button> -->                          
                            <button onclick="get_data({{$k->id_dt}})" type="button" rel="tooltip" class="btn btn-success btn-round" data-toggle="modal" data-target="#editUser" data-original-title="Edit Data" title="Edit Data">
                              <i class="material-icons">edit</i>
                            </button>                            
                            <button onclick="delete_user({{$k->id_dt}})" type="button" rel="tooltip" class="btn btn-danger btn-round"  data-original-title="Delete Data" title="Delete Data">
                              <i class="material-icons">delete</i>
                            </button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
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
          <!-- end row -->
        </div>

        <!-- modal add user-->       
        <div class="modal fade" id="addUser" tabindex="-1" role="">
          <div class="modal-dialog modal-login" role="document">
            <div class="modal-content">
              <div class="card card-signup card-plain">
                <div class="modal-header">
                  <div class="card-header card-header-info text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <i class="material-icons">clear</i>
                    </button>

                    <h4 class="card-title">Add Kursi Partai</h4>                    
                  </div>
                </div>
                <div class="modal-body">
                  <form class="form" method="post" id="save_user">
                    <div class="card-body">
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">build</i></div>
                          </div>
                          <select name="id_prov" id="id_prov" class="selectpicker" data-style="btn btn-info" title="Provinsi">
                            @foreach($prov as $pro)
                            <option value="{{$pro->id_prov}}">{{$pro->nama_prov}}</option>                                  
                            @endforeach
                          </select>
                        </div>      
                      </div>
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">face</i></div>
                          </div>

                          <input name="nama_kab" id="nama_kab" type="text" class="form-control" placeholder="Nama Kab/Kota" required="">
                        </div>
                      </div>
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">face</i></div>
                          </div>
                          <label>PKB</label>
                          <input name="pkb" id="pkb" type="text" class="form-control" placeholder="Kursi PKB" required="" number="true" aria-required="true" maxlength="2">
                          <label>Gerindra</label>
                          <input name="gerindra" id="gerindra" type="text" class="form-control" placeholder="Kursi Gerindra" required="" number="true" aria-required="true" maxlength="2">
                        </div>
                      </div>
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">face</i></div>
                          </div>
                          <label>PDIP</label>
                          <input name="pdip" id="pdip" type="text" class="form-control" placeholder="Kursi PDIP" required=""  number="true" aria-required="true" maxlength="2">
                          <label>Golkar</label>
                          <input name="golkar" id="golkar" type="text" class="form-control" placeholder="Kursi Golkar" required=""  number="true" aria-required="true" maxlength="2">
                        </div>
                      </div>
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">face</i></div>
                          </div>
                          <label>Nasdem</label>
                          <input name="nasdem" id="nasdem" type="text" class="form-control" placeholder="Kursi Nasdem" required=""  number="true" aria-required="true" maxlength="2">
                          <label>Garuda</label>
                          <input name="garuda" id="garuda" type="text" class="form-control" placeholder="Kursi Garuda" required=""  number="true" aria-required="true" maxlength="2">
                        </div>
                      </div>
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">face</i></div>
                          </div>
                          <label>Berkarya</label>
                          <input name="berkarya" id="berkarya" type="text" class="form-control" placeholder="Kursi Berkarya" required=""  number="true" aria-required="true" maxlength="2">
                          <label>PKS</label>
                          <input name="pks" id="pks" type="text" class="form-control" placeholder="Kursi PKS" required=""  number="true" aria-required="true" maxlength="2">
                        </div>
                      </div>
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">face</i></div>
                          </div>
                          <label>Perindo</label>
                          <input name="perindo" id="perindo" type="text" class="form-control" placeholder="Kursi Perindo" required=""  number="true" aria-required="true" maxlength="2">
                          <label>PPP</label>
                          <input name="ppp" id="ppp" type="text" class="form-control" placeholder="Kursi PPP" required=""  number="true" aria-required="true" maxlength="2">
                        </div>
                      </div>
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">face</i></div>
                          </div>
                          <label>PSI</label>
                          <input name="psi" id="psi" type="text" class="form-control" placeholder="Kursi PSI" required=""  number="true" aria-required="true" maxlength="2">
                          <label>PPP</label>
                          <input name="pan" id="ppp" type="text" class="form-control" placeholder="Kursi PPP" required=""  number="true" aria-required="true" maxlength="2">
                        </div>
                      </div>
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">face</i></div>
                          </div>
                          <label>Hanura</label>
                          <input name="hanura" id="hanura" type="text" class="form-control" placeholder="Kursi Hanura" required=""  number="true" aria-required="true" maxlength="2">
                          <label>Demokrat</label>
                          <input name="demokrat" id="demokrat" type="text" class="form-control" placeholder="Kursi Demokrat" required=""  number="true" aria-required="true" maxlength="2">
                        </div>
                      </div>
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">face</i></div>
                          </div>
                          <label>PBB</label>
                          <input name="pbb" id="pbb" type="text" class="form-control" placeholder="Kursi PBB" required=""  number="true" aria-required="true" maxlength="2">
                          <label>PKPI</label>
                          <input name="pkpi" id="pkpi" type="text" class="form-control" placeholder="Kursi PKPI" required=""  number="true" aria-required="true" maxlength="2">
                        </div>
                      </div>
                    </div>                          
                  </div>
                  <div class="modal-footer justify-content-center">
                    <a onclick="save_data()" class="btn btn-info btn-link btn-wd btn-lg">Submit</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- end-modal -->
        <!-- modal edit user-->       
        <div class="modal fade" id="editUser" tabindex="-1">
          <div class="modal-dialog modal-login" role="document">
            <div class="modal-content">
              <div class="card card-signup card-plain">
                <div class="modal-header">
                  <div class="card-header card-header-info text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <i class="material-icons">clear</i>
                    </button>

                    <h4 class="card-title">Edit Kursi Partai</h4>                    
                  </div>
                </div>
                <div class="modal-body">
                  <form class="form" method="post" id="edit_user" action="">
                    {{csrf_field()}}   
                    <div class="card-body">
                      <input type="hidden" name="edit_id" id="edit_id">
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">build</i></div>
                          </div>
                          <select name="id_prov" id="edit_id_prov" class="selectpicker" data-style="btn btn-info" title="Provinsi">
                            @foreach($prov as $pro)
                            <option value="{{$pro->id_prov}}">{{$pro->nama_prov}}</option>                                  
                            @endforeach
                          </select>
                        </div>      
                      </div>
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">face</i></div>
                          </div>
                          <input name="nama_kab" id="edit_nama_kab" type="text" class="form-control" placeholder="Nama Kab/Kota" required="" >
                        </div>
                      </div>
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">face</i></div>
                          </div>
                          <label>PKB</label>
                          <input name="pkb" id="edit_pkb" type="text" class="form-control" placeholder="Kursi PKB" required=""  number="true" aria-required="true" maxlength="2">
                          <label>Gerindra</label>
                          <input name="gerindra" id="edit_gerindra" type="text" class="form-control" placeholder="Kursi Gerindra" required=""  number="true" aria-required="true" maxlength="2">
                        </div>
                      </div>
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">face</i></div>
                          </div>
                          <label>PDIP</label>
                          <input name="pdip" id="edit_pdip" type="text" class="form-control" placeholder="Kursi PDIP" required=""  number="true" aria-required="true" maxlength="2">
                          <label>Golkar</label>
                          <input name="golkar" id="edit_golkar" type="text" class="form-control" placeholder="Kursi Golkar" required=""  number="true" aria-required="true" maxlength="2">
                        </div>
                      </div>
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">face</i></div>
                          </div>
                          <label>Nasdem</label>
                          <input name="nasdem" id="edit_nasdem" type="text" class="form-control" placeholder="Kursi Nasdem" required=""  number="true" aria-required="true" maxlength="2">
                          <label>Garuda</label>
                          <input name="garuda" id="edit_garuda" type="text" class="form-control" placeholder="Kursi Garuda" required=""  number="true" aria-required="true" maxlength="2">
                        </div>
                      </div>
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">face</i></div>
                          </div>
                          <label>Berkarya</label>
                          <input name="berkarya" id="edit_berkarya" type="text" class="form-control" placeholder="Kursi Berkarya" required=""  number="true" aria-required="true" maxlength="2">
                          <label>PKS</label>
                          <input name="pks" id="edit_pks" type="text" class="form-control" placeholder="Kursi PKS" required=""  number="true" aria-required="true" maxlength="2">
                        </div>
                      </div>
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">face</i></div>
                          </div>
                          <label>Perindo</label>
                          <input name="perindo" id="edit_perindo" type="text" class="form-control" placeholder="Kursi Perindo" required=""  number="true" aria-required="true" maxlength="2">
                          <label>PPP</label>
                          <input name="ppp" id="edit_ppp" type="text" class="form-control" placeholder="Kursi PPP" required=""  number="true" aria-required="true" maxlength="2">
                        </div>
                      </div>
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">face</i></div>
                          </div>
                          <label>PSI</label>
                          <input name="psi" id="edit_psi" type="text" class="form-control" placeholder="Kursi PSI" required=""  number="true" aria-required="true" maxlength="2">
                          <label>PAN</label>
                          <input name="pan" id="edit_pan" type="text" class="form-control" placeholder="Kursi PPP" required=""  number="true" aria-required="true" maxlength="2">
                        </div>
                      </div>
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">face</i></div>
                          </div>
                          <label>Hanura</label>
                          <input name="hanura" id="edit_hanura" type="text" class="form-control" placeholder="Kursi Hanura" required=""  number="true" aria-required="true" maxlength="2">
                          <label>Demokrat</label>
                          <input name="demokrat" id="edit_demokrat" type="text" class="form-control" placeholder="Kursi Demokrat" required=""  number="true" aria-required="true" maxlength="2">
                        </div>
                      </div>
                      <div class="form-group bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">face</i></div>
                          </div>
                          <label>PBB</label>
                          <input name="pbb" id="edit_pbb" type="text" class="form-control" placeholder="Kursi PBB" required=""  number="true" aria-required="true" maxlength="2">
                          <label>PKPI</label>
                          <input name="pkpi" id="edit_pkpi" type="text" class="form-control" placeholder="Kursi PKPI" required=""  number="true" aria-required="true" maxlength="2">
                        </div>
                      </div>
                    </div>                    
                  </div>
                  <div class="modal-footer justify-content-center">
                    <a onclick="edit_data()" class="btn btn-info btn-link btn-wd btn-lg">Submit</a>
                    <!-- <button type="submit" class="btn btn-info btn-link btn-wd btn-lg">Submit</button> -->
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- end-modal -->
        @endsection

        @section('js')
        <script>
          function save_data() {
            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: "{{route('save_kursi')}}",
              processData: false,
              contentType : false,
              data: new FormData($('#save_user')[0]),
              type: 'post',
              success: function (result) {    
                if (result == 'sukses') {
                  $('#addUser').modal('hide');
                  $.notify({
                    icon: "notification_important",
                    message: "Kursi Partai Added Successfully"

                  }, {
                    type: "success",
                    timer: 3000,
                    placement: {
                      from: "top",
                      align: "center"
                    }
                  });
                  location.reload();
                }else{
                  $('#addUser').modal('hide');
                  $.notify({
                    icon: "notification_important",
                    message: "Kursi Partai Added Failed"

                  }, {
                    type: "danger",
                    timer: 3000,
                    placement: {
                      from: "top",
                      align: "center"
                    }
                  });
                }
              },
              error : function (data) {
                $('#addUser').modal('hide');
                $.notify(data, "error");
              }
            })
          }

          function get_data(id){
            console.log(id);
            $.ajax({
              url : "{{route('get_kursi')}}",
              method : "GET",
              data : {
                id_dt : id
              } ,
              success : function(data){
                console.log(data);
                $('#edit_id').val(data[0].id_dt),
                $('#edit_nama_kab').val(data[0].nama_kab),
                $('#edit_id_prov').selectpicker('val', data[0].id_prov),
                $('#edit_pkb').val(data[0].pkb),
                $('#edit_gerindra').val(data[0].gerindra),
                $('#edit_pdip').val(data[0].pdip),
                $('#edit_golkar').val(data[0].golkar),
                $('#edit_nasdem').val(data[0].nasdem),
                $('#edit_garuda').val(data[0].garuda),
                $('#edit_berkarya').val(data[0].berkarya),
                $('#edit_pks').val(data[0].pks),
                $('#edit_perindo').val(data[0].perindo),
                $('#edit_ppp').val(data[0].ppp),
                $('#edit_psi').val(data[0].psi),
                $('#edit_pan').val(data[0].pan),
                $('#edit_hanura').val(data[0].hanura),
                $('#edit_demokrat').val(data[0].demokrat),
                $('#edit_pbb').val(data[0].pbb),
                $('#edit_pkpi').val(data[0].pkpi)
              }
            });
          }

          function edit_data() {
            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: "{{route('edit_kursi')}}",
              processData: false,
              contentType : false,
              data: new FormData($('#edit_user')[0]),
              type: 'post',
              success: function (result) {    
                if (result == 'sukses') {
                  $('#editUser').modal('hide');
                  $.notify({
                    icon: "notification_important",
                    message: "Kursi Partai Change Successfully"

                  }, {
                    type: "success",
                    timer: 3000,
                    placement: {
                      from: "top",
                      align: "center"
                    }
                  });
                  location.reload();
                }else{
                  $('#editUser').modal('hide');
                  $.notify({
                    icon: "notification_important",
                    message: "Kursi Partai Change Failed"

                  }, {
                    type: "danger",
                    timer: 3000,
                    placement: {
                      from: "top",
                      align: "center"
                    }
                  });
                }
              },
              error : function (data) {
                $('#editUser').modal('hide');
                $.notify(data, "error");
              }
            })
          }

          function delete_user(id) {
            Swal.fire({
              title: 'Are you sure?',
              text: 'You will Deleted!',
              type: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No, keep it',
              confirmButtonClass: "btn btn-success",
              cancelButtonClass: "btn btn-danger",
              buttonsStyling: false
            }).then((result) => {
              if (result.value) {
                $.ajax({
                  type: 'get',
                  url: "{{route('delete_kursi')}}",
                  dataType: 'text',
                  data: {
                    id_dt: id,
                  },
                  success: function (data) {

                    console.log(data);

                    if (data == "sukses") {
                     Swal.fire(
                      'Deleted!',
                      'Your imaginary file has been deleted.',
                      'success'
                      )
                     location.reload();
                   }else{
                     Swal.fire(
                      'Cancelled',
                      'Your imaginary file is safe :)',
                      'error'
                      )
                   }

                 }
               })
  // For more information about handling dismissals please visit
  // https://sweetalert2.github.io/#handling-dismissals
} else if (result.dismiss === Swal.DismissReason.cancel) {
  Swal.fire(
    'Cancelled',
    'Your imaginary file is safe :)',
    'error'
    )
}
})
          } 
        </script>
        @endsection
