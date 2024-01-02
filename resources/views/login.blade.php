@extends('layout')

@section('content')
    <main class="max-w-lg mx-auto">

        <div class="login-form">
            <h1>LogIn</h1>
            <form method="POST" action="/login">
                @csrf

                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror

                <input type="password" name="password" placeholder="Password" required>
                @error('password')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                <input type="submit" value="login">

                <a href="{{ url('login/google') }}" class="btn btn-google">
                    <i> Login with Google</i>
                </a>

            </form>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="error-message">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

    </main>
@endsection
