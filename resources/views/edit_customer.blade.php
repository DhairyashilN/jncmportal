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
                              <li role="presentation" class="active"><a href="{{ url('/add_customer') }}" aria-controls="add" role="tab" data-toggle="tab">Update</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                              <div role="tabpanel" class="tab-pane active" id="add">
                                @foreach($customer as $cust)
                                <form role="form" class="form-horizontal" action="{{ url('create_customer/'.$cust['id'])}}" method="post">
                                  {{csrf_field()}}
                                  <div class="box-body">
                                    <div class="form-group">
                                     <label for="exampleInputEmail1" class="col-lg-2">Customer Name</label>
                                     <div class="col-lg-10">
                                       <input class="form-control" id="customer_name" placeholder="" type="text" name="customer_name" value="{{ $cust['customer_name'] }}" required>
                                     </div>
                                   </div>
                                   <div class="form-group">
                                    <label for="exampleInputFile" class="col-lg-2">Address</label>
                                    <div class="col-lg-10">
                                      <textarea class="form-control" name="address" rows="5" id="address">{{ $cust['address'] }}</textarea>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                   <label for="exampleInputEmail1" class="col-lg-2">City/Taluka</label>
                                   <div class="col-lg-4">
                                     <select class="form-control" id="city" name="city">
                                      <option value="">Select City</option>
                                      @foreach($city as $dist)
                                      <option value="{{$dist['id']}}" @if($cust['district'] == $dist['id']){{'selected'}} @endif>{{$dist['name']}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <label for="exampleInputEmail1" class="col-lg-2">District</label>
                                  <div class="col-lg-4">
                                   <select class="form-control" id="district" name="district">
                                    <option value="">Select City</option>
                                    @foreach($state as $st)
                                    <option value="{{$st['id']}}" @if($cust['state'] == $st['id']){{'selected'}} @endif>{{$st['name']}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="col-lg-2">State</label>
                                <div class="col-lg-4">
                                 <select class="form-control" id="state" name="state">
                                  <option value="">Select State</option>
                                  @foreach($state as $st)
                                  <option value="{{$st['id']}}" @if($cust['state'] == $st['id']){{'selected'}} @endif>{{$st['name']}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <label for="exampleInputEmail1" class="col-lg-2">Country</label>
                              <div class="col-lg-4">
                                <select class="form-control" id="country" name="country">
                                  <option value="">Select Country</option>
                                  @foreach($countries as $con)
                                  <option value="{{$con['id']}}" @if($cust['country'] == $con['id']){{'selected'}} @endif>{{$con['name']}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                             <label for="exampleInputEmail1" class="col-lg-2">Contact</label>
                             <div class="col-lg-4">
                               <input class="form-control" id="contact" placeholder="" type="text" name="contact" value="{{ $cust['contact'] }}">
                             </div>
                             <label for="exampleInputEmail1" class="col-lg-2">Email</label>
                             <div class="col-lg-4">
                               <input class="form-control" id="email" placeholder="" type="email" name="email" value="{{ $cust['email'] }}">
                             </div>
                           </div>
                           <div class="form-group">
                             <label for="exampleInputEmail1" class="col-lg-2">Machine</label>
                             <div class="col-lg-4">
                              <select class="form-control" id="machine" name="machine">
                                <option value="">Select Machine</option>
                                @foreach($machine as $mac)
                                <option value="{{$mac['id']}}" @if($cust['machine'] == $mac['id']){{'selected'}} @endif>{{$mac['machine_name']}}</option>
                                @endforeach
                              </select>
                            </div>
                            <label for="exampleInputEmail1" class="col-lg-2">Quantity</label>
                            <div class="col-lg-4">
                              <input class="form-control" id="quantity" placeholder="" type="text" name="quantity" value="{{ $cust['quantity'] }}">
                            </div>
                          </div>
                          <div class="form-group">
                           <label for="exampleInputEmail1" class="col-lg-2">Purchase Date</label>
                           <div class="col-lg-4">
                             <input class="form-control" id="enq_date" placeholder="" type="text" name="purchase_date" value="{{ $cust['purchase_date'] }}">
                           </div>
                           <label for="exampleInputEmail1" class="col-lg-2">Purchase Year</label>
                           <div class="col-lg-4">
                            <select class="form-control" id="purchase_year" name="purchase_year">
                              <option value="">Select Purchase Year</option>
                              @for($y=1947; $y<=date('Y'); $y++)
                              <option value="{{$y}}" @if($cust['purchase_year'] == $y){{'selected'}} @endif>{{$y}}</option>
                              @endfor
                            </select>
                          </div>
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