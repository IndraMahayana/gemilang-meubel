@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <x-container>
        <div class="flex flex-col space-y-4">
            <h1 class="text-4xl text-center font-heading font-extrabold mb-6 uppercase">Kontak</h1>
            <div class="flex items-start justify-center p-6 bg-gray-800 text-white rounded-lg">
                <div class="w-1/3">
                    <h1 class="text-xl font-heading font-bold uppercase">Kontak Kami</h1>
                    <ul>
                        <li>
                            <x-button class="mt-4 mb-2" href="#081913967305" variant="green"><svg
                                    class="w-6 h-6 mr-2 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z"
                                        clip-rule="evenodd" />
                                    <path fill="currentColor"
                                        d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z" />
                                </svg>
                                WhatsApp</x-button>
                        </li>
                        <li>
                            <x-button href="#gemilangmeubel.electronic@gmail.com" variant="blue"><svg
                                    class="w-6 h-6 mr-2 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M2.038 5.61A2.01 2.01 0 0 0 2 6v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6c0-.12-.01-.238-.03-.352l-.866.65-7.89 6.032a2 2 0 0 1-2.429 0L2.884 6.288l-.846-.677Z" />
                                    <path
                                        d="M20.677 4.117A1.996 1.996 0 0 0 20 4H4c-.225 0-.44.037-.642.105l.758.607L12 10.742 19.9 4.7l.777-.583Z" />
                                </svg>
                                Email</x-button>
                        </li>
                    </ul>
                </div>
                <div class="w-1/3">
                    <h1 class="text-xl font-heading font-bold uppercase">Social Media</h1>
                    <ul>
                        <li>
                            <x-button class="mt-4 mb-2" href="#081913967305"><svg class="w-6 h-6 mr-2 text-gray-800 dark:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                                Instagram</x-button>
                        </li>
                        <li>
                            <x-button href="#gemilangmeubel.electronic@gmail.com"><svg
                                    class="w-6 h-6 mr-2 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                                        clip-rule="evenodd" />
                                </svg>
                                Facebook</x-button>
                        </li>
                    </ul>
                </div>
                <div class="w-1/3">
                    <h1 class="text-xl font-heading font-bold uppercase">Alamat</h1>
                    <p class="mt-4">Jl. Raya Abianbase No.49, Abianbase, Kec. Mengwi, Kabupaten Badung, Bali 80352,
                        Indonesia
                    </p>
                </div>
            </div>
            <div class="h-100 w-full bg-black rounded-lg overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3945.074582089037!2d115.177854!3d-8.588828!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd239f1f36ab443%3A0x9256c9b1df8dab10!2sGemilang%20meubel%20%26%20Electronic!5e0!3m2!1sen!2sus!4v1757397376491!5m2!1sen!2sus"
                    class="w-full h-full border-none" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </x-container>
@endsection
