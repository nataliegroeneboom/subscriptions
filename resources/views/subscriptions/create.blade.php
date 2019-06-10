@extends('layouts.app')
@section('content')
<form method="POST" action="/subscriptions">
    @csrf
    <div class="form-group">
        <label for="company">Subscription</label>
        <input type="text" name="company" class="form-control" placeholder="company">
    </div>
    <div class="form-group">
        <label for="subscription_date">Subscription Date</label>
        <input type="date" name="subscription_date" class="form-control" placeholder="subscription start date">
    </div>


    <div class="form-check">
            <label for="frequency">Monthly</label>
            <input type="radio" name="frequency" class="form-control" value="monthly">
    </div>
    <div class="form-check">
            <label for="frequency">Yearly</label>
            <input type="radio" name="frequency" class="form-control" value="yearly">
    </div>
    <div class="form-group">
        <label for="cost">Subscription Amount</label>
        <input type="number" name="cost" class="form-control" placeholder="Subscription amount">
</div>
<div class="form-group">
  <button type="submit" class='button'>Add a Subscription</button>
</div>

</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection