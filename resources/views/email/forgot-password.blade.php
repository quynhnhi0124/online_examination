@component('mail::panel')
@component('mail::message')

Bạn đã gửi yêu cầu thay đổi mật khẩu<br>

@component('mail::button',['url' => $url,'color' => 'primary'])
Đi đến trang thay đổi mật khẩu
@endcomponent

@endcomponent

@endcomponent