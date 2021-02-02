@component('mail::panel')
@component('mail::message')

Bạn đã tạo một tài khoản tại trang web của chúng tôi với email: {{$email}}<br>
Tên đăng nhập của bạn là: {{$username}}
@component('mail::button',['url' => route('auth.login'),'color' => 'primary'])
Đi đến trang
@endcomponent

@endcomponent

@endcomponent