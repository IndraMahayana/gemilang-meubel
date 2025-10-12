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
                        {{-- PASSWORD SECTION --}}
                        <div>
                            {{-- Current Password --}}
                            <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900">
                                Current Password
                            </label>
                            <div class="relative mb-3">
                                <input type="password" name="current_password" id="current_password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10">
                                <button type="button"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700"
                                    onclick="togglePassword('current_password', this)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('current_password')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror

                            {{-- New Password --}}
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">
                                New Password
                            </label>
                            <div class="relative">
                                <input type="password" name="password" id="password"
                                    placeholder="Minimal 8 karakter, huruf besar, kecil, angka, simbol"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10"
                                    autocomplete="new-password">
                                <button type="button"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700"
                                    onclick="togglePassword('password', this)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror

                            {{-- Password Strength Meter --}}
                            <div class="mt-2">
                                <div id="pw-meter" class="relative w-full h-2 bg-gray-200 rounded overflow-hidden">
                                    <div id="pw-meter-bar"
                                        class="absolute left-0 top-0 h-full transition-all duration-300 ease-in-out bg-red-500"
                                        style="width: 0%;">
                                    </div>
                                </div>
                                <p id="pw-strength-text" class="text-xs mt-1">
                                    Kekuatan: <span id="pw-strength-label">-</span>
                                </p>
                            </div>


                            {{-- Requirements checklist --}}
                            <ul id="pw-requirements" class="text-xs mt-2 list-none space-y-1">
                                <li data-ok="false" id="req-length">• Minimal 8 karakter</li>
                                <li data-ok="false" id="req-lower">• Minimal 1 huruf kecil</li>
                                <li data-ok="false" id="req-upper">• Minimal 1 huruf besar</li>
                                <li data-ok="false" id="req-number">• Minimal 1 angka</li>
                                <li data-ok="false" id="req-symbol">• Minimal 1 simbol (contoh: !@#$%)</li>
                            </ul>

                            {{-- Confirm Password --}}
                            <label for="password_confirmation"
                                class="block mb-2 mt-3 text-sm font-medium text-gray-900">Confirm New Password</label>
                            <div class="relative mb-4">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10"
                                    autocomplete="new-password">
                                <button type="button"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700"
                                    onclick="togglePassword('password_confirmation', this)">
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
        document.addEventListener('DOMContentLoaded', function() {
            // === TOGGLE PASSWORD ===
            function togglePassword(id, el) {
                const input = document.getElementById(id);
                const icon = el.querySelector('i');
                if (!input) return;
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
            window.togglePassword = togglePassword;

            // === TERMS CHECK ===
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

            // === PASSWORD STRENGTH METER ===
            const password = document.getElementById('password');
            const passwordConfirmation = document.getElementById('password_confirmation');
            const currentPassword = document.getElementById('current_password');
            const meterBar = document.getElementById('pw-meter-bar');
            const strengthLabel = document.getElementById('pw-strength-label');

            const reqLength = document.getElementById('req-length');
            const reqLower = document.getElementById('req-lower');
            const reqUpper = document.getElementById('req-upper');
            const reqNumber = document.getElementById('req-number');
            const reqSymbol = document.getElementById('req-symbol');

            function markReq(el, ok) {
                el.dataset.ok = ok ? 'true' : 'false';
                el.style.color = ok ? '#16a34a' : '#6b7280';
                el.style.textDecoration = ok ? 'line-through' : 'none';
            }

            function evaluatePassword(pw) {
                const checks = {
                    length: pw.length >= 8,
                    lower: /[a-z]/.test(pw),
                    upper: /[A-Z]/.test(pw),
                    number: /\d/.test(pw),
                    symbol: /[!@#$%^&*()_\-+=\[\]{};:'"\\|,.<>\/?~`]/.test(pw)
            };
            const score = Object.values(checks).reduce((s, v) => s + (v ? 1 : 0), 0);
            return {
                checks,
                score
            };
        }

        function updateMeter() {
            const pw = password.value || '';

            if (!pw) {
                meterBar.style.width = '0%';
                meterBar.className =
                    'absolute left-0 top-0 h-full transition-all duration-300 ease-in-out bg-red-500';
                strengthLabel.textContent = '-';
                markReq(reqLength, false);
                markReq(reqLower, false);
                markReq(reqUpper, false);
                markReq(reqNumber, false);
                markReq(reqSymbol, false);
                enableOrDisableSubmit();
                return;
            }

            const {
                checks,
                score
            } = evaluatePassword(pw);
            const percent = (score / 5) * 100;
            meterBar.style.width = percent + '%';

            let color = 'bg-red-500';
            if (score <= 1) color = 'bg-red-500';
            else if (score === 2) color = 'bg-orange-500';
            else if (score === 3) color = 'bg-yellow-500';
            else if (score === 4) color = 'bg-blue-500';
            else color = 'bg-green-500';

            meterBar.className =
            `absolute left-0 top-0 h-full transition-all duration-300 ease-in-out ${color}`;

                let label = 'Very Weak';
                if (score === 1) label = 'Very Weak';
                if (score === 2) label = 'Weak';
                if (score === 3) label = 'Fair';
                if (score === 4) label = 'Good';
                if (score === 5) label = 'Strong';
                strengthLabel.textContent = label;

                markReq(reqLength, checks.length);
                markReq(reqLower, checks.lower);
                markReq(reqUpper, checks.upper);
                markReq(reqNumber, checks.number);
                markReq(reqSymbol, checks.symbol);

                enableOrDisableSubmit();
            }

            function enableOrDisableSubmit() {
                const pwFilled = !!password.value;
                const passesAll = (
                    reqLength.dataset.ok === 'true' &&
                    reqLower.dataset.ok === 'true' &&
                    reqUpper.dataset.ok === 'true' &&
                    reqNumber.dataset.ok === 'true' &&
                    reqSymbol.dataset.ok === 'true'
                );

                const confirmationMatches = !pwFilled || (password.value === passwordConfirmation.value);
                const currentFilledIfChanging = !pwFilled || (currentPassword.value.trim().length > 0);

                if (pwFilled) {
                    if (passesAll && confirmationMatches && currentFilledIfChanging) {
                        submitButton.disabled = false;
                        submitButton.classList.remove('opacity-50', 'cursor-not-allowed');
                    } else {
                        submitButton.disabled = true;
                        submitButton.classList.add('opacity-50', 'cursor-not-allowed');
                    }
                }
            }

            password.addEventListener('input', updateMeter);
            passwordConfirmation.addEventListener('input', updateMeter);
            currentPassword.addEventListener('input', updateMeter);

            updateMeter();
        });
    </script>
@endpush
