<header id="site_header" class="d-flex justify-content-between p-3">
    <div class="top_left links">
        <a href=""><img src="" alt="">Logo</a>
        <a href="">Products</a>
        {{-- <a href="{{ route('guest.posts.index') }}">News</a>
        <a href="{{ route('guest.contacts') }}">Contacts</a> --}}
        <router-link to="/">Home</router-link>
        <router-link to="/posts">Blog</router-link>
    </div>

    <div class="">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/admin') }}">Admin</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</header>
<!-- /#site_header -->
