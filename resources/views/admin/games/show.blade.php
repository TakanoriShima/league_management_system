@extends('admin.layouts.app')

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
                <th class="text-center">試合ID</th>
                <th class="text-center">日にち</th>
                <th class="text-center">時間</th>
                <th class="text-center">対戦チーム</th>
                <th class="text-center">場所</th>
                <th class="text-center">メモ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th class="text-center"><a href="{{ route('admin.games.show', $game->id) }}">{{ $game->id }}</a></th>
                <th class="text-center">{{ $game->day }}</th>
                <td class="text-center">{{ $game->time }}</td>
                <td class="text-center">{{ $game->battleteam }}</td>
                <td class="text-center">{{ $game->place }}</td>
                <td class="text-center">{{ $game->memo }}</td>
            </tr>
        </tbody>
    </table>
    
    <div class="prose mx-auto text-center">
        <h2>スタメン決定</h2>
    </div>
    
    <table class="table table-zebra w-full">
        <thead>
            <tr>
                <th class="text-center">名前</th>
                <th class="text-center">ポジション</th>
                <th class="text-center"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="text-center">{{ $user->name }}</td>
                @if(!$user->is_done($game->id))
                <form action="{{ route('admin.games.update', $game->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <td class="text-center">
                        <select name="position_id">
                            @foreach($positions as $position)
                            <option value="{{ $position->id}}" {{ $user->position_name($game->id) == $position->name ? 'selected' : ''}}>{{ $position->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><button type="submit" class="text-center btn btn-primary btn-block normal-case">決定</button></td>
                </form>
                @else
                <td class="text-left">{{ $user->position_name($game->id) }}<td>
                <td>決定済み</td>
                @endif
            </tr>
            @endforeach
            
        </tbody>
    </table>


    </form>
    @endif
    
@endsection