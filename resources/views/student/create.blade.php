@extends('layouts.app')

@section('content')
    <div id="app">
        <student-form scope={{$scope}} :id={{$id ?? 0}}></student-form>
    </div>
@endsection