<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@extends('layouts.admin')

<x-admin-navbar></x-admin-navbar>
<x-sidebar></x-sidebar>

@section('content')
    <div class="p-2 ml-64 mt-10">
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Edit an account
                    </h1>
                    <form class="space-y-4" action="{{ route('admin.users.update', $user->id) }}"method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Your
                                Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="indra" required="" value="{{ $user->name }}">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your
                                email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="name@company.com" required="" value="{{ $user->email }}">
                            @error('email')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900">
                                Current Password
                            </label>
                            <div class="relative">
                                <input type="password" name="current_password" id="current_password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                   focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10">
                                <button type="button" onclick="togglePassword('current_password', this)"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Masukkan password lama hanya jika ingin mengganti
                                password.</p>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">New Password</label>
                            <div class="relative">
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                   focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10">
                                <button type="button" onclick="togglePassword('password', this)"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm
                                New Password</label>
                            <div class="relative">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                   focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10">
                                <button type="button" onclick="togglePassword('password_confirmation', this)"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" name="terms" aria-describedby="terms" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300"
                                    required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-light text-gray-500">I accept the <a
                                        class="font-medium text-primary-600 hover:underline" href="#">Terms and
                                        Conditions</a></label>
                            </div>
                            @error('terms')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-primary-600 bg-gray-800 cursor-pointer hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit
                            an account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function togglePassword(id, el) {
            const input = document.getElementById(id);
            const icon = el.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const checkbox = document.getElementById('terms');
            const submitButton = document.querySelector('button[type="submit"]');

            submitButton.disabled = true;
            submitButton.classList.add('opacity-50', 'cursor-not-allowed');

            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    submitButton.disabled = false;
                    submitButton.classList.remove('opacity-50', 'cursor-not-allowed');
                } else {
                    submitButton.disabled = true;
                    submitButton.classList.add('opacity-50', 'cursor-not-allowed');
                }
            });
        });
    </script>
@endpush
