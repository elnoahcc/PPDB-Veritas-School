<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Username -->
    <div>
        <label for="username">Username</label>
        <input id="username" class="form-control" type="text" name="username" value="{{ old('username') }}" required autofocus>
    </div>

    <!-- Password -->
    <div class="mt-3">
        <label for="password">Password</label>
        <input id="password" class="form-control" type="password" name="password" required>
    </div>

    <!-- Remember Me -->
    <div class="mt-3">
        <label>
            <input type="checkbox" name="remember">
            Remember Me
        </label>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary w-100">
            Login
        </button>
    </div>
</form>
