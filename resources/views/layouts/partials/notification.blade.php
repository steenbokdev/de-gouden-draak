@if(session('notification.body'))
    <div class="notification is-light is-{{ session('notification.type') ?? '' }}">
        <button class="delete"></button>
        {{ session('notification.body') }}
    </div>
@endif
