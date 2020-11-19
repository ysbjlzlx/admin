<div>
    <div class="ui menu">
        <a class="item" href="{{route('index')}}">首页</a>
        @guest()
            <div class="right menu">
                <a class="item" href="{{route('register')}}">注册</a>
                <a class="item" href="{{route('login')}}">登录</a>
            </div>
        @else()
            <div class="right menu">
                <div class="item">{{ Auth::user()->email }}</div>
                <a class="item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    退出
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @endguest
    </div>
</div>
