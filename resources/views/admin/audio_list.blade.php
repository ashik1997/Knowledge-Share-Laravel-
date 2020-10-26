@extends('layouts.admin_layout')

@section('title', 'Approved audio post')
@section('css_content')
<!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/skins/_all-skins.min.css') }}">

@endsection

@section('main_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Unapproved/ approved
        <small>list</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Audios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Audios</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-12">
                @if(Session::has('approved_audio_flash_success'))
                <div class="alert alert-success alert-dismissible fade in"  id="myAlert">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{!! session('approved_audio_flash_success') !!} !</strong>
                </div>
                @endif
                @if(Session::has('delete_audio_flash_success'))
                <div class="alert alert-danger alert-dismissible fade in"  id="myAlert">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{!! session('delete_audio_flash_success') !!} !</strong>
                </div>
                @endif
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl no.</th>
                  <th>Title</th>
                  <th>Sub-title</th>
                  <th>Author</th>
                  <th>Audio</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $sl=1; ?>
                @foreach($audios as $audio)
                <tr>
                  <td>{{$sl}}</td>
                  <td>{{$audio->title}}</td>
                  <td>{{$audio->sub_title}}</td>
                  <td>{{$audio->autor}}</td>
                  <td>
                  	<audio controls="">
                         <source src="../audios/{{$audio->file}}" type="audio/mp3">
                    </audio>
                  </td>
                  <td>{!! $audio->description !!}</td>
                  <td><img height="65" src="../images/audios/{{$audio->image}}"></td>
                  <td>@if ($audio->status==0)<a class="btn btn-primary" href="{{ url('/admin/approved-audio',$audio->id) }}">approved</a>||@endif<a class="btn btn-danger" href="{{ url('/admin/delete-audio',$audio->id) }}">delete</a></td>
                </tr>
                <?php $sl++; ?>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Sl no.</th>
                  <th>Title</th>
                  <th>Sub-title</th>
                  <th>Author</th>
                  <th>Audio</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    
@endsection
@section('js_content')
<!-- jQuery 3 -->
<script src="{{ asset('backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('backend/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/dist/js/demo.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection