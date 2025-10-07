<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Avatar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel='shortcut icon' type='image/x-icon' href='https://www.emeraldsilver.in/retailer/assets/img/favicon.ico' />
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="min-h-screen flex flex-col items-center justify-center"
    style="background-image: url({{ asset('bg.jpg') }});background-size: cover">

    <div
        class="max-w-md w-full mx-auto bg-[#151515] border border-[#A1A1AA] rounded-xl shadow-xl shadow-black/40 px-6 py-14 mt-10">
        <h2 class="text-center text-white text-lg mb-6">
            Enter your phone number to <br> generate your E-Certificate
        </h2>

        <form method="post" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div class="relative">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 39 40" fill="none">
                    <path
                        d="M28.3486 22.733L32.5882 26.9726C33.1583 27.5427 33.1583 28.467 32.5882 29.0371C29.506 32.1194 24.6263 32.4662 21.1392 29.8508L18.617 27.9591C15.8256 25.8656 13.3459 23.386 11.2524 20.5946L9.36075 18.0724C6.74538 14.5852 7.09217 9.70557 10.1744 6.62333C10.7445 6.05323 11.6688 6.05323 12.2389 6.62333L16.4785 10.8629C17.1038 11.4882 17.1038 12.5018 16.4785 13.1271L14.8437 14.7619C14.5839 15.0217 14.5195 15.4186 14.6838 15.7473C16.5836 19.5469 19.6646 22.6279 23.4642 24.5277C23.7929 24.6921 24.1898 24.6276 24.4496 24.3678L26.0845 22.733C26.7097 22.1078 27.7234 22.1078 28.3486 22.733Z"
                        stroke="#A1A1AA" stroke-width="1.60099" />
                </svg>
                <input type="text" name="mobile" placeholder="Enter your registered phone number"
                    value="{{ old('mobile') }}"
                    class="w-full px-10 py-3 rounded-lg border border-[#444] bg-[#121212] text-[#eee] placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#ff7a00]">
            </div>

            @error('mobile')
                <div class="text-[#ffb3b3] text-sm">{{ $message }}</div>
            @enderror

            <div class="flex justify-center">
                <button type="submit"
                    class="px-6 cursor-pointer py-3 rounded-lg bg-[#E65D00] text-white font-semibold hover:bg-[#e56f00] transition-colors">
                    Login
                </button>
            </div>

        </form>
    </div>

</body>

</html>
