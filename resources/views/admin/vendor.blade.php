@extends('layouts.app')
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                @include('comman.menu');
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Customer</div>
                    <div class="card-body">
                        <table id="example1">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Store Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vendors as $vendor)
                                <tr>
                                    <td>{{$vendor->first_name .' '. $vendor->last_name}}</td>
                                    <td>{{$vendor->email}}</td>
                                    <td>{{$vendor->store_name}}</td>
                                    <td>Action</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
      @include('scripts.admin.customerScript')
@endsection