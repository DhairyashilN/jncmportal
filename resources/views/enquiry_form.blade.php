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
                              <li role="presentation" class="active"><a href="{{ url('/add_enquiry') }}" aria-controls="add" role="tab" data-toggle="tab">Add</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                              <div role="tabpanel" class="tab-pane active" id="add">
                                <form class="form-horizontal" role="form" action="{{ url('create_enquiry')}}" method="post">
                                  {{csrf_field()}}
                                  <div class="box-body">
                                    <div class="form-group">
                                     <label for="exampleInputEmail1" class="col-lg-2">Customer Name</label>
                                     <div class="col-lg-10">
                                       <input class="form-control" id="customer_name" placeholder="" type="text" name="customer_name" required>
                                     </div>
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleInputFile" class="col-lg-2">Address</label>
                                     <div class="col-lg-10">
                                       <textarea class="form-control" name="address" rows="5" id="address"></textarea>
                                     </div>
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleInputEmail1" class="col-lg-2">Contact No</label>
                                     <div class="col-lg-4">
                                       <input class="form-control" id="contact1" placeholder="" type="text" name="contact1" required>
                                     </div>
                                     <label for="exampleInputEmail1" class="col-lg-2">Alternate Contact No</label>
                                     <div class="col-lg-4">
                                       <input class="form-control" id="contact2" placeholder="" type="text" name="contact2">
                                     </div>
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleInputEmail1" class="col-lg-2">Email</label>
                                     <div class="col-lg-10">
                                       <input class="form-control" id="email" placeholder="" type="email" name="email">
                                     </div>
                                   </div>
                                   <div class="form-group">
                                    <label for="exampleInputEmail1" class="col-lg-2">Enquiry For</label>
                                     <div class="col-lg-10">
                                       @if(isset($machines) && !empty($machines))
                                       @foreach($machines as $mrow)
                                       <input type="checkbox" name="machine_name[]" id="machine_{{$mrow['id']}}" value="{{ $mrow['id'] }}" /> {{$mrow['machine_name']}} <br>
                                       @endforeach
                                       @endif
                                     </div>
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleInputFile" class="col-lg-2">Comments</label>
                                     <div class="col-lg-10">
                                       <textarea class="form-control" name="comments" rows="7" id="comments" required=""></textarea>
                                     </div>
                                   </div>
                                   <div class="form-group">
                                     <label for="exampleInputEmail1" class="col-lg-2">Enquiry Date</label>
                                     <div class="col-lg-4">
                                       <input class="form-control" id="enq_date" placeholder="" type="text" name="enq_date">
                                     </div>
                                     <label for="exampleInputEmail1" class="col-lg-2">Followup Date</label>
                                     <div class="col-lg-4">
                                       <input class="form-control" id="followupdate" placeholder="" type="text" name="followupdate" required="">
                                     </div>
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