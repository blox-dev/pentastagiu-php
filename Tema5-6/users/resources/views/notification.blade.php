@if(Session::has('success'))

<div id="notification-box" class="alert alert-success">
    <h3>{{Session::get('success')}}</h3>
</div>

@php
    Session::forget('success')
@endphp

@endif
