@extends('layouts/app')
@section('content')
    <div class="container">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                           <th scope="col"></th>
                           <th scope="col">Date</th>
                           <th scope="col">Company</th>
                           <th scope="col">Frequency</th>
                           <th scope="col">Subscription End</th>
                        </tr>
                    </thead>
                    <tbody>      
                        <tr>
                            <th scope="row">{{$subscription->id}}</th>
                            <td>{{$subscription->created_at}}</td>
                            <td>{{$subscription->company}}</td>
                            <td>{{$subscription->frequency}}</td>
                            <td>{{$subscription->subcription_date}}</td>
                            <td>{{$subscription->nextPayment()}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

