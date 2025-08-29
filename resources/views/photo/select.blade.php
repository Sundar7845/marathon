<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Name</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="min-h-screen flex flex-col items-center justify-center" style="background-image: url({{ asset('bg.jpg') }});background-size: cover">

    <div class="max-w-md relative w-full mx-auto bg-[#151515] rounded-xl shadow-xl shadow-black/40 px-6 py-14 mt-10">
        <a class="absolute top-4 left-4 text-[#A1A1AA] text-sm flex gap-1 items-center" href="{{ route('login') }}"><svg xmlns="http://www.w3.org/2000/svg" class="w-3" viewBox="0 0 24 23" fill="none">
                <path d="M12.4765 21.8203L2.93984 12.3126H24V10.6872H3.13852L12.2373 1.13809L11.0856 0L0 11.6223L11.3637 23L12.4765 21.8203Z" fill="#A1A1AA" />
            </svg>Back</a>
        <h2 class="text-[#E65D00] text-center text-lg mb-6">Select your name to generate photo</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach ($participants as $p)
            <a class="bg-[#444] text-white text-center px-4 py-6 capitalize rounded-xl w-full mb-2 shadow font-semibold" href="{{ route('upload.form', $p) }}">
                    {{ $p->name }}
            </a>
            @endforeach
        </div>
    </div>
</body>

</html>