@extends('layouts.app')
@section('content')
@include('header')
<div class="wrapper row-offcanvas row-offcanvas-left">
	@include('sidebar')

	<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Enquiry</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Enquiry</li>
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
                              <li role="presentation"><a href="{{ url('/enquiries') }}">View </a></li>
                              <li role="presentation" class="active"><a href="{{ url('/add_enquiry') }}" aria-controls="add" role="tab" data-toggle="tab">Update</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                              <div role="tabpanel" class="tab-pane active" id="add">
                              @foreach($enquiry as $enq)
                                <form role="form" action="{{ url('create_enquiry/'.$enq['id'])}}" method="post">
                                  {{csrf_field()}}
                                  <div class="box-body">
                                    <div class="form-group">
                                     <label for="exampleInputEmail1">Customer Name</label>
                                     <input class="form-control" id="customer_name" placeholder="" type="text" name="customer_name" value="{{$enq['customer_name']}}" required>
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleInputFile">Address</label>
                                     <textarea class="form-control" name="address" rows="5" id="address">{{$enq['address']}}</textarea>
                                   </div>
                                   <div class="form-group">
                                   <label for="exampleInputEmail1">Contact No</label>
                                     <input class="form-control" id="contact1" placeholder="" type="text" name="contact1" value="{{$enq['contact1']}}" required>
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleInputEmail1">Alternate Contact No</label>
                                     <input class="form-control" id="contact2" placeholder="" type="text" name="contact2" value="{{$enq['contact2']}}">
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleInputEmail1">Email</label>
                                     <input class="form-control" id="email" placeholder="" type="email" name="email" value="{{$enq['email']}}">
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleInputEmail1">Enquiry Date</label>
                                     <input class="form-control" id="enq_date" placeholder="" type="text" name="enq_date" value="{{$enq['enquiry_date']}}">
                                   </div>
                                   <div class="form-group">
                                    <?php date_default_timezone_set('Asia/Kolkata'); ?>
                                     <label for="exampleInputEmail1">Enquiry Time</label>
                                     <input class="form-control" id="enq_time" placeholder="" type="text" name="enq_time" value="{{$enq['enquiry_time']}}" >
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