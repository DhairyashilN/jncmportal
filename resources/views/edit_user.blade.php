@extends('layouts.app')
@section('content')
@include('header')
<div class="wrapper row-offcanvas row-offcanvas-left">
  @include('sidebar')

  <!-- Right side column. Contains the navbar and content of the page -->
  <aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>User</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- <div class="box-header">
                            <h3 class="box-title">Data Table With Full Features</h3>                                    
                          </div> --><!-- /.box-header -->
                          <div class="box-body">
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                              <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                              </ul>
                            </div>
                            @endif
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation"><a href="{{ url('/users') }}">View </a></li>
                              <li role="presentation" class="active"><a href="{{ url('/add_user') }}" aria-controls="add" role="tab" data-toggle="tab">Update</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                              <div role="tabpanel" class="tab-pane active" id="add">
                              @foreach($user as $user)
                                <form role="form" action="{{ url('create_user/'.$user['id'])}}" method="post">
                                  {{csrf_field()}}
                                  <div class="box-body">
                                    <div class="form-group">
                                     <label for="exampleInputEmail1">Name</label>
                                     <input class="form-control" id="name" placeholder="" type="text" name="name" required value="{{ $user['name'] }}">
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleInputEmail1">Email</label>
                                     <input class="form-control" id="email" placeholder="" type="email" name="email" required value="{{ $user['email'] }}">
                                   </div>
                                   <div>
                                     <label for="exampleInputEmail1">Password</label>
                                     <input class="form-control" id="password" placeholder="" type="password" name="password" >
                                   </div><br/>
                                   <div>
                                     <label for="exampleInputEmail1">Confirm Password</label>
                                     <input class="form-control" id="cpassword" placeholder="" type="password" name="cpassword">
                                   </div><br/>
                                   <div>
                                     {{-- <label for="exampleInputEmail1">Privilege </label> --}}
                                      <input id="privilege" placeholder="" type="checkbox" name="privilege" value="1"  @if($user['isAdmin'] == 1) {{'checked'}} @endif>&nbsp;&nbsp;Is Admin
                                   </div>
                                 </div><!-- /.box-body -->
                                 <div class="box-footer">
                                  <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                              </form>
                              @endforeach
                            </div>
                          </div>
                        </div><!-- /.box-body -->
                      </div><!-- /.box -->
                    </div>
                  </div>
                </section><!-- /.content -->
              </aside><!-- /.right-side -->
            </div><!-- ./wrapper -->
            @endsection
