@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Code Generator</div>

                <div class="panel-body">
                    <form action="/home" method="post">
                        {{ csrf_field() }}
                        <select name="numbers" id="numbers">
                            @for($i = 1; $i <= 10; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <input type="submit">
                    </form>
                    @if(!empty($codes))
                        @foreach($codes as $code)
                            <h2>{{$code}}</h2>
                            <hr>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
