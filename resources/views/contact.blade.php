@extends('layout')

@section('title', 'Contact')

@section('content')
    @if ($errors->any())
    <div>
        <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
                <span class="font-medium">Danger alert!</span> {{ $errors->first() }}
            </div>
        </div>
    </div>
    @endif

    @if (session('message'))
    <div class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div>
            <span class="font-medium">Info alert!</span>
            {{ session('message') }}
        </div>
    </div>
    @endif

    <div class="flex min-h-screen items-center justify-start bg-white">
        <div class="mx-auto w-full max-w-lg">
            <h1 class="text-4xl font-medium">
                Contact us
            </h1>
            <p class="mt-3">
                Email us at help@domain.com or message us here:
            </p>

            <form action="/contact" method="POST" class="mt-10">
                @csrf
                <!-- This is a working contact form. Get your free access key from: https://web3forms.com/  -->
                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="relative z-0">
                        <input type="text" name="name"
                            class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                            placeholder=" " />
                        <label
                            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Your
                            name
                        </label>
                    </div>
                    <div class="relative z-0">
                        <input type="text" name="email"
                            class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                            placeholder=" " />
                        <label
                            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Your
                            email
                        </label>
                    </div>
                    <div class="relative z-0 col-span-2">
                        <textarea name="message" rows="5"
                            class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                            placeholder=" ">
                        </textarea>
                        <label
                            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Your
                            message
                        </label>
                    </div>
                </div>
                <button type="submit" class="mt-5 rounded-md bg-black px-10 py-2 text-white">
                    Send Message
                </button>
            </form>
        </div>
    </div>
    <a href="/">Back</a>
@endsection
