<div id="topmenu">
    <nav class="wrapper">
        <ul>
            <li><a href="#">خانه</a></li>
            <li><a href="#">درباره ما</a></li>
            <li><a href="#">تماس با ما</a></li>
            @auth()
                <li><a href="{{route('profile',Auth::user()->id)}}">پروفایل</a></li>
                <li><a href="{{route('auth.logout')}}">خروج</a></li>
            @else
                <li><a href="{{route('auth.login.form')}}">ورود</a></li>
                <li><a href="{{route('auth.register.form')}}">عضویت</a></li>
            @endauth
        </ul>
    </nav>
</div>
{{--{{route('profile.edit')}}--}}
