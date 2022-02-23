@if(session('fail'))
    <div>
        <p>خطا رخ داد</p>
    </div>
@endif

@if(session('success'))
    <div>
        <p>همه چی درسته</p>
    </div>
@endif

@if(session('registered'))
    <div>
        <p>ثبت نام با موفقیت انجام شد</p>
    </div>
@endif

@if(session('loginFailed'))
    <div>
        <p>ورود ناموفق</p>
    </div>
@endif

