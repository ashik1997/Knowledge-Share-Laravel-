@extends('layouts.user_layout')

@section('title', 'Dashboard')
@section('css_content')
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

@endsection

@section('main_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{App\Book::where(['posted_by_id'=>Auth::user()->id])->count()}}</h3>

              <p>Books</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="{{ route('user.show-books') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{App\Audio::where(['posted_by_id'=>Auth::user()->id])->count()}}</h3>

              <p>Audio</p>
            </div>
            <div class="icon">
              <i class="fa fa-music"></i>
            </div>
            <a href="{{ route('user.audio-list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{App\Video::where(['posted_by_id'=>Auth::user()->id])->count()}}</h3>

              <p>Video</p>
            </div>
            <div class="icon">
              <i class="fa fa-camera"></i>
            </div>
            <a href="{{ route('user.video-list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="fa fa-download"></i>

              <h3 class="box-title">Download History</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  {{ $downloads->links() }}
                </ul>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Book name</th>
                  <th>Cover</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  @foreach($downloads as $download)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{ App\Book::where(['id'=>$download->book_id])->pluck('title')[0] }}</td>
                  <td><img height="50" src="../images/books/{{ App\Book::where(['id'=>$download->book_id])->pluck('image1')[0] }}"></td>
                  <td>
                    <form action="{{ URL::to( 'download/') }}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="book_id" value="{{ $download->book_id }}">
                    <button type="submit" class="btn btn-info">Download <i class="fa fa-download"></i></button>
                    </form>
                  </td>
                </tr>
                <?php $i++; ?>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
            </div>
          </div>
          <!-- /.box -->

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
    
@endsection
@section('js_content')
    <!-- jQuery 3 -->
    <script src="{{asset('backend/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('backend/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Morris.js charts -->
    <script src="{{asset('backend/bower_components/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('backend/bower_components/morris.js/morris.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('backend/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('backend/bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker -->
    <script src="{{asset('backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('backend/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('backend/dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('backend/dist/js/demo.js')}}"></script>
@endsection