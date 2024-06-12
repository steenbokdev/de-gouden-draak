<div class="control has-icons-left">
    <form action="{{ route('language.switch') }}" method="post">
        @csrf
        @method('POST')

        <div class="select" id="lang">
            <select name="language" onchange="this.form.submit()">
                <option value="nl" {{ session('language') == 'nl' ? 'selected' : '' }}>
                    Nederlands
                </option>
                <option value="en" {{ session('language') == 'en' ? 'selected' : '' }}>
                    English
                </option>
            </select>
        </div>
        <span class="icon is-left">
            <i class="fas fa-globe"></i>
        </span>
    </form>
</div>
