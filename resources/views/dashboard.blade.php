@extends('layouts.app')

@section('content')
    @if(!Auth::check())
    <div class="prose mx-auto text-center">
        <h2>Welcome to the League Management</h2>
    </div>
    <div class="flex justify-center">
        <form method="POST" action="{{ route('login') }}" class="w-1/2">
            @csrf

            <div class="form-control my-4">
                <label for="email" class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="email" name="email" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="password" class="label">
                    <span class="label-text">Password</span>
                </label>
                <input type="password" name="password" class="input input-bordered w-full">
            </div>

            <button type="submit" class="btn btn-primary btn-block normal-case">Log in</button>

            {{-- ユーザ登録ページへのリンク --}}
            <p class="mt-2">New user? <a class="link link-hover text-info" href="{{ route('register') }}">Sign up now!</a></p>
        </form>
    </div>
    @else
    <a href="{{ route('admin.users.create') }}">プロフィール登録</a>
    
    <table class="table table-zebra w-full">
        <thead>
            <tr>
                <th class="text-center">試合ID</th>
                <th class="text-center">日にち</th>
                <th class="text-center">時間</th>
                <th class="text-center">対戦チーム</th>
                <th class="text-center">場所</th>
                <th class="text-center">メモ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($games as $game)
            <tr>
                <th class="text-center"><a href="{{ route('games.show', $game->id) }}">{{ $game->id }}</a></th>
                <th class="text-center">{{ $game->day }}</th>
                <td class="text-center">{{ $game->time }}</td>
                <td class="text-center">{{ $game->battleteam }}</td>
                <td class="text-center">{{ $game->place }}</td>
                <td class="text-center">{{ $game->memo }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
@endsection