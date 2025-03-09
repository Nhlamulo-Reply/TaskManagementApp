@extends('layouts.nav-layout')

@section('content')
    <!-- Form Section -->
    <div id="form-container" class="mt-6">
        @auth
            <p class="text-center text-lg">You are already logged in! Proceed to your dashboard.</p>
            <div class="text-center mt-4">
                <a href="{{ url('/') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md">Go to Dashboard</a>
            </div>
        @else
            <div class="flex justify-center space-x-4 mt-6">
                <button id="login-btn" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Login</button>
                <button id="register-btn" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Register</button>
            </div>

            <!-- Login Form -->
            <div id="login-form" class="hidden mt-6">
                @include('auth.login')
            </div>

            <!-- Registration Form -->
            <div id="registration-form" class="hidden mt-6">
                @include('auth.register')
            </div>
        @endauth
    </div>

    <script>

        document.getElementById('login-btn').addEventListener('click', function() {
            document.getElementById('login-form').classList.remove('hidden');
            document.getElementById('registration-form').classList.add('hidden');
        });


        document.getElementById('register-btn').addEventListener('click', function() {
            document.getElementById('registration-form').classList.remove('hidden');
            document.getElementById('login-form').classList.add('hidden');
        });
    </script>
@endsection
