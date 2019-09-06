@extends('layouts.app')

@section('content')
    <style>
        .row {
            font-family: 'Fira Mono', monospace;
        }
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    Vote Control
                    <form action="/close" method="POST">
                        {{ csrf_field() }}
                        @if($open->value == 'false')
                            Status : Close
                            <input type="hidden" value="true" name="open">
                            <button type="submit" class="btn btn-success">Open</button>
                        @else
                            Status : Open
                            <input type="hidden" value="false" name="open">
                            <button type="submit" class="btn btn-danger">Close</button>
                        @endif
                    </form>
                    <br/>
                    <b>Result</b>
                    <div class="row">
                        <div class="col-md-6">
                            Boys <br/>
                            @foreach($boys as $boy)
                                {{$boy->title}}{{$boy->name}} {{$boy->surnanme}} ({{$boy->nickname}}) - {{$boy->score}}<br/>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            Girls <br/>
                            @foreach($girls as $girl)
                                {{$girl->title}}{{$girl->name}} {{$girl->surnanme}} ({{$girl->nickname}}) - {{$girl->score}}<br/>
                            @endforeach
                        </div>
                    </div>
                    <br/>
                    <br/>
                    Code Generator
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
                        <div class="col">
                            @foreach($codes as $code)
                                <div class="col-sm">
                                    <h4>{{$code}}</h4>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
