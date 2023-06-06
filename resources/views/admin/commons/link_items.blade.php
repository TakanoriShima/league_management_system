@if (Auth::check())
    <li><a class="link link-hover" href="#">チームprofile</a></li>
    <li><a class="link link-hover" href="{{ route('admin.users.index') }}">member</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログアウトへのリンク --}}
    <li><a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">Logout</a></li>
@else
    {{-- ユーザ登録ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('admin.register') }}">Signup</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログインページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('admin.login') }}">Login</a></li>
@endif