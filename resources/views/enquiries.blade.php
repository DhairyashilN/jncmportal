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
                            @if (session('status'))
                            <div class="alert alert-success">
                              {{ session('status') }}
                            </div>
                            @endif
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation" class="active"><a href="{{ url('/enquiries') }}" aria-controls="view" role="tab" data-toggle="tab">View </a></li>
                              <li role="presentation"><a href="{{ url('/add_enquiry') }}">Add</a></li>
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
                                   <th>Address</th>
                                   <th>Contact</th>
                                   <th>Alt. Contact</th>
                                   <th>Email</th>
                                   <th>Enquiry Date</th>
                                   <th>Enquiry Time</th>
                                   <th>Action</th>
                                 </tr>
                               </thead>
                               <tbody>
                                 <?php $srno = 1;?>                                 
                                 @foreach($enquiries as $enq)
                                 <tr>
                                   <td>{{$srno ++}}</td>
                                   <td>{{$enq['customer_name']}}</td>
                                   <td>{{$enq['address']}}</td>
                                   <td>{{$enq['contact1']}}</td>
                                   <td>{{$enq['contact2']}}</td>
                                   <td>{{$enq['email']}}</td>
                                   <td>{{$enq['enquiry_date']}}</td>
                                   <td>{{$enq['enquiry_time']}}</td>
                                   <td>
                                     <a href="{{url('edit_enquiry/'.$enq['id'])}}" class="btn btn-primary" title="Edit"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                     <a href="{{url('delete_enquiry/'.$enq['id'])}}" class="btn btn-danger" title="Delete" onclick="confirm('Are You want to delete this record?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                   </td>
                                 </tr>
                                 @endforeach    
                               </tbody>
                               <tfoot>
                                 <tr>
                                  <th>Sr. No.</th>
                                  <th>Customer Name</th>
                                  <th>Address</th>
                                  <th>Contact</th>
                                  <th>Alt. Contact</th>
                                  <th>Email</th>
                                  <th>Enquiry Date</th>
                                  <th>Enquiry Time</th>
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