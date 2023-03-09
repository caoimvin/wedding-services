@if(session()->has('message'))
    <div class="flash-message">
        {{ session('message') }}
    </div>
@endif