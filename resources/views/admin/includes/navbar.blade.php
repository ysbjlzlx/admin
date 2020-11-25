<div>
    <div class="ui menu">
        <a class="item" href="{{ route('index') }}">首页</a>
        @auth
            <div class="right menu">
                <div class="item">{{ Auth::user()->email }}</div>
                <a class="item" href="{{ route('admin.logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    退出
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @endauth
    </div>
</div>
