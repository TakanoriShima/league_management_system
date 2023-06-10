@if (Auth::check())
        {{-- ユーザ詳細ページへのリンク --}}
    <li><a class="link link-hover" href="#">チーム&#39;s profile</a></li>
    
    {{-- ユーザ詳細ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('users.show', $user->id)}}">{{ Auth::user()->name }}&#39;s profile</a></li>
    
    {{-- ユーザ一覧ページへのリンク --}}
    <li><a class="link link-hover" href="#">member</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログアウトへのリンク --}}
    <li><a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">Logout</a></li>
@else
    {{-- ログインページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('login') }}">Login</a></li>
@endif