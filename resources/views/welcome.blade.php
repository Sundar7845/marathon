<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate E-Certificate</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
            Enter your name & phone number to <br> generate your E-Certificate
        </h2>
        <form method="post" action="{{ route('certificate') }}" class="space-y-6">
            @csrf
            <div class="relative">
                <input type="text" name="name" placeholder="Enter your registered Name" required
                    value="{{ old('name') }}"
                    class="w-full px-10 py-3 rounded-lg border border-[#444] bg-[#121212] text-[#eee] placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#ff7a00]">
                @error('name')
                    <div class="text-[#ffb3b3] text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>


            <div class="relative">
                <input type="number" name="mobile" placeholder="Enter your registered phone number"
                    value="{{ old('mobile') }}" required
                    oninput="if(this.value.length > 10) this.value = this.value.slice(0,10);"
                    class="w-full px-10 py-3 rounded-lg border border-[#444] bg-[#121212] text-[#eee] placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#ff7a00]">
                @error('mobile')
                    <div class="text-[#ffb3b3] text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>



            <div class="flex justify-center">
                <button type="submit"
                    class="px-6 cursor-pointer py-3 rounded-lg bg-[#E65D00] text-white font-semibold hover:bg-[#e56f00] transition-colors">
                    Download Certificate
                </button>
            </div>

        </form>
    </div>
    <style>
        /* Hide number input arrows in Chrome, Safari, Edge, Opera */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Hide number input arrows in Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</body>

</html>
