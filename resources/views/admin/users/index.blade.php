@extends('admin.layouts.app')
@section('content')
<ul>
    @foreach($users as $user)
    <li>{{ $user->name }} / {{ $user->position->name }}</li>
    @endforeach
</ul>
@endsection