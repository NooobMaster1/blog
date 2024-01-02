@extends('layout')

@section('content')



    <main class="max-w-lg mx-auto">

        <body>
            <div class="container">
                <h1>Register</h1>
                <form method="POST" action="/register">
                    @csrf

                    <input class="form-input" type="text" name="name" id="name" placeholder="Name"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <p class="form-error">{{ $message }}</p>
                    @enderror


                    <input class="form-input" type="email" name="email" id="email" placeholder="Email"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror


                    <input class="form-input" type="password" name="password" id="password" placeholder="Password"
                        required>
                    @error('password')
                        <p class="form-error">{{ $message }}</p>
                    @enderror

                    <input class="form-submit" type="submit" value="Register">
                </form>
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <p class="text-red-500 text-xs"> {{ $error }}</p>
                        @endforeach
                    </ul>
                @endif
            </div>
        </body>

        </html>

    </main>
@endsection
