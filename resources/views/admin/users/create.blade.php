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
                        Create an account
                    </h1>
                    <form class="space-y-4" action="{{ route('admin.users.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Your
                                Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="indra" required="" value="{{ old('name') }}">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your
                                email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="name@company.com" required="" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- PASSWORD SECTION --}}
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <div class="relative">
                                <input type="password" name="password" id="password"
                                    placeholder="Minimal 8 karakter, huruf besar, kecil, angka & simbol"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10"
                                    required>
                                <button type="button" onclick="togglePassword('password', this)"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>

                            {{-- Password Strength Meter --}}
                            <div class="mt-2">
                                <div id="pw-meter" class="w-full h-2 bg-gray-200 rounded overflow-hidden">
                                    <div id="pw-meter-bar" class="h-full transition-all" style="width:0%"></div>
                                </div>
                                <p id="pw-strength-text" class="text-xs mt-1">Kekuatan: <span
                                        id="pw-strength-label">-</span></p>
                            </div>

                            {{-- Requirements checklist --}}
                            <ul id="pw-requirements" class="text-xs mt-2 list-none space-y-1">
                                <li id="req-length">• Minimal 8 karakter</li>
                                <li id="req-lower">• Huruf kecil</li>
                                <li id="req-upper">• Huruf besar</li>
                                <li id="req-number">• Angka</li>
                                <li id="req-symbol">• Simbol (@, #, $, %, dll)</li>
                            </ul>

                            @error('password')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm
                                Password</label>
                            <div class="relative">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10"
                                    required>
                                <button type="button" onclick="togglePassword('password_confirmation', this)"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        {{-- END PASSWORD SECTION --}}
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
                            class="w-full text-white bg-primary-600 bg-gray-800 cursor-pointer hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create
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

        // PASSWORD STRENGTH METER
        document.addEventListener('DOMContentLoaded', function() {
            const password = document.getElementById('password');
            const meterBar = document.getElementById('pw-meter-bar');
            const strengthLabel = document.getElementById('pw-strength-label');
            const submitButton = document.querySelector('button[type="submit"]');

            const reqs = {
                length: document.getElementById('req-length'),
                lower: document.getElementById('req-lower'),
                upper: document.getElementById('req-upper'),
                number: document.getElementById('req-number'),
                symbol: document.getElementById('req-symbol'),
            };

            function mark(el, ok) {
                el.style.color = ok ? '#16a34a' : '#6b7280';
                el.style.textDecoration = ok ? 'line-through' : 'none';
            }

            function checkStrength(pw) {
                const checks = {
                    length: pw.length >= 8,
                    lower: /[a-z]/.test(pw),
                    upper: /[A-Z]/.test(pw),
                    number: /\d/.test(pw),
                    symbol: /[!@#$%^&*()_\-+=\[\]{};:'"\\|,.<>\/?~`]/.test(pw),
                };
                const score = Object.values(checks).filter(Boolean).length;

                // Update checklist visual
                for (let key in reqs) mark(reqs[key], checks[key]);

                // Bar color
                meterBar.style.width = (score / 5 * 100) + '%';
                let color = '#ef4444',
                    label = 'Lemah';
                if (score === 3) {
                    color = '#f59e0b';
                    label = 'Sedang';
                }
                if (score === 4) {
                    color = '#10b981';
                    label = 'Kuat';
                }
                if (score === 5) {
                    color = '#16a34a';
                    label = 'Sangat Kuat';
                }

                meterBar.style.backgroundColor = color;
                strengthLabel.textContent = label;

                // Disable submit kalau password belum memenuhi semua
                const allOk = Object.values(checks).every(Boolean);
                submitButton.disabled = !allOk;
                submitButton.classList.toggle('opacity-50', !allOk);
                submitButton.classList.toggle('cursor-not-allowed', !allOk);
            }

            password.addEventListener('input', e => checkStrength(e.target.value));
        });
        // PASSWORD STRENGTH METER END
    </script>
@endpush
