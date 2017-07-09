@extends('layouts.app')
@section('content')
@include('header')
<div class="wrapper row-offcanvas row-offcanvas-left">
    @include('sidebar')

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
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
                            <h3>
                                {{DB::table("customers")->where('isDelete', '=', 0)->count()}}
                            </h3>
                            <p>
                                Total Customers
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ url('customers') }}" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                                {{DB::table("enquiries")->where('isDelete', '=', 0)->count()}}
                            </h3>
                            <p>
                                Total Enquiries
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ url('enquiries') }}" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                                {{DB::table("customers")->where('isDelete', '=', 0)->sum('quantity')}}
                            </h3>
                            <p>
                                Total Products Sold
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3 id="machineCount">
                                0 
                            </h3>
                            <p>
                                Total Machines Sold
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <form role="form">
                            <select class="form-control" id="machines">
                                {{ $machine = App\Machine::where('isDelete','0')->get()}}
                                @if(!empty($machine))
                                <option value="">Select Machine</option>
                                @foreach($machine as $mac)
                                <option value="{{$mac->id}}">{{$mac->machine_name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </form>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3 id="CountryCustomersCount">
                                0 
                            </h3>
                            <p>
                                Customers in Country 
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <form role="form">
                            <select class="form-control" id="countries">
                                {{ $country = App\Country::get()}}
                                @if(!empty($country))
                                <option value="">Select Country</option>
                                @foreach($country as $con)
                                <option value="{{$con->id}}">{{$con->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </form>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3 id="CityCustomersCount">
                                0
                            </h3>
                            <p>
                                Customers in Taluka / City
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <form role="form">
                            <select class="form-control" id="cities">
                                {{ $city = App\City::get()}}
                                @if(!empty($city))
                                <option value="">Select Taluka or City</option>
                                @foreach($city as $con)
                                <option value="{{$con->id}}">{{$con->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </form>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                                {{DB::table("enquiries")->where('isDelete', '=', 0)->count()}}
                            </h3>
                            <p>
                                Total Enquiries
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ url('enquiries') }}" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                                {{DB::table("customers")->where('isDelete', '=', 0)->sum('quantity')}}
                            </h3>
                            <p>
                                Total Products Sold
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h4>Most Sold Machine (Product)</h4>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Machine</th>
                                    <th>Quantity</th>
                                </tr>
                                {{--/*$machine = App\Machine::all();*/--}}
                                @foreach ($machine as $key => $value)
                                <tr>
                                    <td>{{ $value['machine_name'] }}</td>
                                    <td>{{ DB::table("customers")->select('machine')->where('machine',$value['id'])->sum('quantity') }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                                {{DB::table("enquiries")->where('isDelete', '=', 0)->count()}}
                            </h3>
                            <p>
                                Total Enquiries
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ url('enquiries') }}" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->

            </div><!-- /.row -->

            <!-- Widgets section -->
            <div class="row">
                <div class="col-lg-6">
                    <a href="https://www.accuweather.com/en/in/mumbai/204842/weather-forecast/204842" class="aw-widget-legal">
                    </a><div id="awcc1498045424363" class="aw-widget-current"  data-locationkey="" data-unit="c" data-language="en-gb" data-useip="true" data-uid="awcc1498045424363"></div><script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>
                </div>
            </div>


        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->
@endsection
