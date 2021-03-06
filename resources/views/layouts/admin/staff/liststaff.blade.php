@extends('layouts.master')

@section('title', 'List Staff')

@section('page-title', 'List Staff')
@section('css-link')
<link rel="stylesheet" href="{{asset('app/admin/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Table Staff</strong>
                            <button class="btn btn-primary" id="btn-insert-staff" data-toggle="modal" data-target="#mediumModal">
                              <i class="fa fa-plus"></i> Add account
                            </button>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created At</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>$320,800</td>
                      </tr>
                      
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>


            </div><!-- .animated -->
        </div><!-- .content -->
        <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Add Account</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <div class="card">
                                <div class="card-header">Register Form</div>
                                <div class="card-body card-block">
                                  <form  method="post" class="form-register-staff">
                                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                                    <div class="form-group">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" id="username" name="username" placeholder="Username" class="form-control" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        <select name="selectRole" id="selectRole" class="form-control">
                                            <option value="0">Please select role</option>
                                            <option value="1">Supporter</option>
                                            <option value="2">Technician</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-actions form-group">
                                        <button type="submit" class="btn btn-success btn-sm" id="btn-submit-add">Submit</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Confirm</button>
                            </div> -->
                        </div>
                    </div>
                </div>

@endsection

@section('scripts')
<script src="{{asset('app/admin/assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('app/admin/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('app/admin/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('app/admin/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('app/admin/assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('app/admin/assets/js/lib/data-table/pdfmake.min.js')}}"></script>
    <script src="{{asset('app/admin/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('app/admin/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('app/admin/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('app/admin/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('app/admin/assets/js/lib/data-table/datatables-init.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
    <script type="text/javascript">

        var offset = new Date().getTimezoneOffset();
        var o  = Math.abs(offset)
        var offset = (offset < 0 ? "+" : "-") + ("00" + Math.floor(o / 60)).slice(-2) + ":" + ("00" + (o % 60)).slice(-2);

        $( document ).ready(function() {
           

            
           $('#btn-submit-add').on('click',function(e){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var email = $('#email').val();
                var username = $('#username').val();
                var password = $('#password').val();
                var role = $('#selectRole').val();
                var href = window.location.origin;
                e.preventDefault();

                jQuery.ajax({
                    url: href+'/admin/registerStaff',
                    method:'post',
                    data: {
                        _token: CSRF_TOKEN,
                        email:email,
                        username:username,
                        password:password,
                        role:role,
                        timezone:offset
                    },
                    dataType: 'JSON',
                    success:function(res){

                        $('#mediumModal').modal('hide');
                        console.log(res.message);
                    }
                });
               
           });
        });
        
    </script>
@endsection