<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Upload Photo</title>
    <style>
        body {
            background: #111;
            color: #eee;
            font-family: system-ui, Arial;
            padding: 24px
        }

        .card {
            max-width: 720px;
            margin: 20px auto;
            background: #1f1f1f;
            border-radius: 16px;
            padding: 28px;
            text-align: center
        }

        h2 {
            margin: 0 0 18px
        }

        .back {
            color: #bbb;
            text-decoration: none;
            margin-bottom: 16px;
            display: inline-block
        }

        input[type=file] {
            width: 100%;
            padding: 14px;
            border-radius: 10px;
            border: 1px solid #444;
            background: #121212;
            color: #eee
        }

        button {
            background: #ff7a00;
            border: none;
            border-radius: 10px;
            padding: 14px 18px;
            color: #fff;
            font-weight: 700;
            cursor: pointer;
            margin-top: 18px
        }
    </style>
</head>

<body>
    <div class="card">
        <a class="back" href="{{ route('select') }}">&#8592; Back</a>
        <h2>Upload your photo to generate avatar</h2>
        <form method="post" action="{{ route('upload', $participant) }}" enctype="multipart/form-data">
            @csrf
            <input type="file" name="photo" accept="image/*" required>
            @error('photo')
                <div style="color:#ffb3b3;margin-top:8px">{{ $message }}</div>
            @enderror
            <button type="submit">Generate Photo</button>
        </form>
    </div>
</body>

</html>
