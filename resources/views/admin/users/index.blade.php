@extends('admin.layouts.app')
@section('content')
<ul>
    @foreach($users as $user)
    <li><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->id }}</a> / {{ $user->name }} / {{ $user->position->name }}</li>
    @endforeach
</ul>
@endsection