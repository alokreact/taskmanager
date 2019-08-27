@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

<div class="alert alert-danger">
@if($message =Session :: get ('error') )
{{$message}}
@endif
</div>

                   <form method="POST" action="/logintask">
                   {{csrf_field()}}
                    <input type="text" name="email">
                   
                    <input type="text" name="password">
                   
                    <input type="submit" name="submit" value="submit">
                   
                   </form>

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
