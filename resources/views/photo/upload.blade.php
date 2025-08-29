<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="min-h-screen flex flex-col items-center justify-center" style="background-image: url({{ asset('bg.jpg') }});background-size: cover">

    <div class="max-w-md relative w-full mx-auto bg-[#151515] border border-[#A1A1AA] rounded-xl shadow-xl shadow-black/40 px-6 py-14 mt-10">
        <a class="absolute top-4 left-4 text-[#A1A1AA] text-sm flex gap-1 items-center" href="{{ route('select') }}"><svg xmlns="http://www.w3.org/2000/svg" class="w-3" viewBox="0 0 24 23" fill="none">
                <path d="M12.4765 21.8203L2.93984 12.3126H24V10.6872H3.13852L12.2373 1.13809L11.0856 0L0 11.6223L11.3637 23L12.4765 21.8203Z" fill="#A1A1AA" />
            </svg>Back</a>
        <h2 class="text-center text-white text-lg mb-6">Upload your photo to generate avatar</h2>
        <form method="post" action="{{ route('upload', $participant) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="file-input" class="grid grid-cols-[auto_1fr] gap-2 border place-items-center justify-items-start text-[#444444] border-[#444] px-2 py-1 rounded-2xl cursor-pointer">
                    <div class="px-4 py-2 rounded-lg border border-[#333] bg-[#232324] text-[#b3b3b3] font-sans">
                        Upload File
                    </div>
                    <div id="file-name" class="truncate max-w-full">
                        no file selected
                    </div>
                </label>

                <input
                    id="file-input"
                    type="file"
                    class="hidden"
                    name="photo"
                    accept="image/*"
                    required
                    onchange="document.getElementById('file-name').textContent = this.files.length ? this.files[0].name : 'no file selected';">
            </div>

            @error('photo')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror

            <div class="flex justify-center mt-6">
                <button type="submit" class="px-6 cursor-pointer py-3 rounded-lg bg-[#E65D00] text-white font-semibold hover:bg-[#e56f00] transition-colors">
                    Generate Photo
                </button>
            </div>
        </form>

    </div>
</body>

</html>