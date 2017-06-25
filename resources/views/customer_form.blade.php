@extends('layouts.app')
@section('content')
@include('header')
<div class="wrapper row-offcanvas row-offcanvas-left">
	@include('sidebar')

	<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Customer</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Customer</li>
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
              <li role="presentation"><a href="{{ url('/customers') }}">View </a></li>
                <li role="presentation" class="active"><a href="{{ url('/add_customer') }}" aria-controls="add" role="tab" data-toggle="tab">Add</a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="add">
                  <form role="form" action="{{ url('create_customer')}}" method="post">
                    {{csrf_field()}}
                    <div class="box-body">
                      <div class="form-group">
                       <label for="exampleInputEmail1">Customer Name</label>
                       <input class="form-control" id="customer_name" placeholder="" type="text" name="customer_name" required>
                     </div>
                     <div class="form-group">
                       <label for="exampleInputFile">Address</label>
                       <textarea class="form-control" name="address" rows="5" id="address"></textarea>
                     </div>
                     <div class="form-group">
                       <label for="exampleInputEmail1">City/Taluka</label>
                       <select class="form-control" id="city" name="city">
                        <option value="">Select City</option>
                        @foreach($city as $ct)
                          <option value="{{$ct['id']}}">{{$ct['name']}}</option>
                        @endforeach
                      </select>
                     </div>
                     <div class="form-group">
                       <label for="exampleInputEmail1">District</label>
                       <select class="form-control" id="district" name="district">
                        <option value="">Select District</option>
                        @foreach($city as $dist)
                          <option value="{{$dist['id']}}">{{$dist['name']}}</option>
                        @endforeach
                      </select>
                     </div>
                     <div class="form-group">
                       <label for="exampleInputEmail1">State</label>
                       <select class="form-control" id="state" name="state">
                        <option value="">Select State</option>
                        @foreach($state as $st)
                          <option value="{{$st['id']}}">{{$st['name']}}</option>
                        @endforeach
                      </select>
                     </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Country</label>
                      <select class="form-control" id="country" name="country">
                      <option value="">Select Country</option>
                      @foreach($countries as $con)
                        <option value="{{$con['id']}}">{{$con['name']}}</option>
                      @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                       <label for="exampleInputEmail1">Contact</label>
                       <input class="form-control" id="contact" placeholder="" type="text" name="contact">
                     </div>
                     <div class="form-group">
                       <label for="exampleInputEmail1">Email</label>
                       <input class="form-control" id="email" placeholder="" type="email" name="email">
                     </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Machine</label>
                      <select class="form-control" id="machine" name="machine">
                      <option value="">Select Machine</option>
                      @foreach($machine as $mac)
                        <option value="{{$mac['id']}}">{{$mac['machine_name']}}</option>
                      @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                       <label for="exampleInputEmail1">Quantity</label>
                       <input class="form-control" id="quantity" placeholder="" type="text" name="quantity">
                     </div>
                     <div class="form-group">
                       <label for="exampleInputEmail1">Purchase Date</label>
                       <input class="form-control" id="enq_date" placeholder="" type="text" name="purchase_date">
                     </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Purchase Year</label>
                      <select class="form-control" id="purchase_year" name="purchase_year">
                        <option value="">Select Purchase Year</option>
                        @for($y=1947; $y<=date('Y'); $y++)
                        <option value="{{$y}}">{{$y}}</option>
                        @endfor
                      </select>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
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