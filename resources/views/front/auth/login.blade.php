<x-guest-layout>

    <main id="main" class="main">
        <section class="section">
            <div class="container d-flex justify-content-center align-items-center ">
                {{-- <div class="row"> --}}
                    <div class="col-lg-4">

                        <div class="card">
                            <div class="card-body">

    <form class="row g-12" method="POST" action="{{ route('login.user') }}">
        @csrf


           <!-- Email Address -->
           <div class="col-12">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            @if ($errors->has('email'))
                <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
            @endif
        </div>

           <!-- Password -->
           <div class="col-12">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
            @if ($errors->has('password'))
                <div class="text-danger mt-2">{{ $errors->first('password') }}</div>
            @endif
        </div>


        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <button type="submit" class="btn btn-primary">
                {{ __('تسجيل الدخول') }}
            </button>
        </div>
    </form>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
        </section>
    </main>

</x-guest-layout>
