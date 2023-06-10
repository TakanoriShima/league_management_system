@extends('layouts.app')

@section('content')
    @if(!Auth::check())
    <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
        <div class="hero-content text-center my-10">
            <div class="max-w-md mb-10">
                <h2>Welcome to the League Management</h2>
                {{-- ユーザ登録ページへのリンク --}}
                <a class="btn btn-primary btn-lg normal-case" href="{{ route('admin.register') }}">Sign up now!</a>
            </div>
        </div>
    </div>
    @else
    
    <table class="table table-zebra w-full">
        <thead>
            <tr>
                <th class="text-center">選手番号</th>
                <th class="text-center">名前</th>
                <th class="text-center">生年月日</th>
                <th class="text-center">ポジション</th>
                <th class="text-center">アイコン画像</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th class="text-center">{{ $user->id }}</th>
                <th class="text-center">{{ $user->name }}</th>
                <th class="text-center">{{ $user->birthday }}</th>
                <td class="text-center">{{ $user->position->name }}</td>
                @if($user->image !== NULL)
                <td class="text-center"><img src="{{ asset('uploads')}}/{{$user->image}}" alt="{{ $user->image }}" style="width: 100px;"></td>
                @else
                <td class="text-center"><img src="{{ asset('images/NO-IMAGE.png')}}" alt="{{ $user->image }}" style="width: 100px;"></td>
                @endif
            </tr>
        </tbody>
    </table>
    
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