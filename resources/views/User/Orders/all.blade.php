@extends('User.Master.layout')

@section('content')

    <div class="content-wrapper" style="min-height: 1200.88px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Orders</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('order-now')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Orders</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- /.col -->
                    <div class="card  col-md-12">
                        <div class="card-header">
                            <h3 class="card-title">All Order List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr class="text-center">

                                    <th>Order Id</th>
                                    <th>Service</th>
                                    <th>Amount</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>




                                @foreach($all as $al)
                                    <tr class="text-center">

                                        <td>10{{$al->id}}</td>
                                        <td>{{$al->service->name}}</td>
                                        <td>{{$al->amount}}$</td>
                                        <td>{{$al->time}}</td>
                                        <td>{{$al->status == 1 ? 'Complete' : 'Pending'}}</td>
                                        <td>

                                                <a href="{{route('order.allSoftDelete',$al->id)}}">{{$al->status ==1 ? '' : 'Cancel'}}</a>


                                        </td>

                                    </tr>



                                @endforeach










                                </tbody>

                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- /.row -->

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
