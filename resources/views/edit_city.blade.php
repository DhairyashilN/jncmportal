@extends('layouts.app')
@section('content')
@include('header')
<div class="wrapper row-offcanvas row-offcanvas-left">
	@include('sidebar')

	<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>City</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">City</li>
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
                              <li role="presentation"><a href="{{ url('/city') }}">View </a></li>
                              <li role="presentation" class="active"><a href="{{ url('/add_city') }}" aria-controls="add" role="tab" data-toggle="tab">Update</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                              <div role="tabpanel" class="tab-pane active" id="add">
                              @foreach($city as $city) 
                                <form role="form" action="{{ url('create_city/'.$city['id'])}}" method="post">
                                  {{csrf_field()}}
                                  <div class="box-body">
                                    <div class="form-group">
                                     <label for="exampleInputEmail1">City Name</label>
                                     <input class="form-control" id="city_name" placeholder="" type="text" name="city_name" value="{{ $city['name'] }}" required>
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleInputEmail1">State</label>
                                     <select class="form-control" id="state" name="state">
                                      <option value="">Select State</option>
                                      @foreach($state as $st)
                                      <option value="{{$st['id']}}" @if($st['id'] == $city['state_id']) {{'selected'}} @endif>{{$st['name']}}</option>
                                      @endforeach
                                    </select>
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