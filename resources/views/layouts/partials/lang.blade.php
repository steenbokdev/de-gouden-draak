<div class="control has-icons-left">
    <form action="{{ route('language.switch') }}" method="post">
        @csrf

        <div class="select" id="lang">
            <select onchange="this.form.submit()" name="language">
                <option value="en" {{ session('language') == 'en' ? 'selected' : '' }}>English</option>
                <option value="nl" {{ session('language') == 'nl' ? 'selected' : '' }}>Nederlands</option>
            </select>
        </div>
        <span class="icon is-left">
            <i class="fas fa-globe"></i>
        </span>
    </form>
</div>
