@extends('layouts.app')

@section('content')
    <div class="prose mx-auto text-center">
        <h2>プロフィール編集</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" class="w-1/2">
            @csrf
            <input type="hidden" name="_method" value="put">
            <div class="form-control my-4">
                <label for="name" class="label">
                    <span class="label-text">名前</span>
                </label>
                <input type="text" name="name" value="{{ $user->name }}" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="birthday" class="label">
                    <span class="label-text">生年月日</span>
                </label>
                <input type="date" name="birthday" value="{{ $user->birthday }}" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="image" class="label">
                    <span class="label-text">アイコン</span>
                </label>
                <input type="file" name="image" class="input w-full">
            </div>

            <button type="submit" class="btn btn-primary btn-block normal-case">プロフィールを更新</button>
        </form>
    </div>
@endsection