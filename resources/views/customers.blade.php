@extends('layouts.app')
@section('content')
@include('header')
<div class="wrapper row-offcanvas row-offcanvas-left">
	@include('sidebar')

	<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Customers</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Customers</li>
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
                            @if (session('status'))
                            <div class="alert alert-success">
                              {{ session('status') }}
                            </div>
                            @endif
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation" class="active"><a href="{{ url('/customers') }}" aria-controls="view" role="tab" data-toggle="tab">View </a></li>
                              <li role="presentation"><a href="{{ url('/add_customer') }}">Add</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                              <div role="tabpanel" class="tab-pane active" id="view">
                               <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                 <thead>
                                  <tr>
                                   <th>Sr. No.</th>
                                   <th>Customer Name</th>
                                   <th>Contact</th>
                                   <th>City/Taluka</th>
                                   <th>District</th>
                                   <th>State</th>
                                   <th>Country</th>
                                   <th>Machine</th>
                                   <th>Quantity</th>
                                   <th>Purchase Date</th>
                                   <th>Purchase Year</th>
                                   <th>Action</th>
                                 </tr>
                               </thead>
                               <tbody>
                                 <?php $srno = 1;?>                                 
                                 @foreach($customers as $cust)
                                 <tr>
                                   <td>{{$srno ++}}</td>
                                   <td>{{$cust['customer_name']}}</td>
                                   <td>@if($cust['contact'] == '' || $cust['contact'] == NULL) {{ 'NA' }} @else {{$cust['contact']}} @endif</td>
                                   @foreach($cities as $city)
                                   @if($cust['city'] == $city['id'])
                                   <td>{{$city['name']}}</td>
                                   @endif
                                   @endforeach
                                   @foreach($cities as $c)
                                   @if($cust['district'] == $c['id'])
                                   <td>{{$c['name']}}</td>
                                   @endif
                                   @endforeach
                                   @foreach($state as $st)
                                   @if($cust['state'] == $st['id'])
                                   <td>{{$st['name']}}</td>
                                   @endif
                                   @endforeach
                                   @foreach($countries as $cy)
                                   @if($cust['country'] == $cy['id'])
                                   <td>{{$cy['name']}}</td>
                                   @endif
                                   @endforeach
                                   @foreach($machine as $mc)
                                   @if($cust['machine'] == $mc['id'])
                                   <td>{{$mc['machine_name']}}</td>
                                   @endif
                                   @endforeach
                                   <td>{{$cust['quantity']}}</td>
                                   <td>{{$cust['purchase_date']}}</td>
                                   <td>{{$cust['purchase_year']}}</td>
                                   <td>
                                     <a href="{{url('edit_customer/'.$cust['id'])}}" class="btn btn-primary btn-xs" title="Edit"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                     <a href="{{url('delete_customer/'.$cust['id'])}}" class="btn btn-danger btn-xs" title="Delete" onclick="confirm('Are You want to delete this record?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                   </td>
                                 </tr>
                                 @endforeach    
                               </tbody>
                               <tfoot>
                                 <tr>
                                  <th>Sr. No.</th>
                                  <th>Customer Name</th>
                                  <th>Contact</th>
                                  <th>City/Taluka</th>
                                  <th>District</th>
                                  <th>State</th>
                                  <th>Country</th>
                                  <th>Machine</th>
                                  <th>Quantity</th>
                                  <th>Purchase Date</th>
                                  <th>Purchase Year</th>
                                  <th>Action</th>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
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