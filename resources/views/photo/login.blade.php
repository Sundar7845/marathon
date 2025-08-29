<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Generate Avatar</title>
    <style>
        body {
            background: #111;
            color: #eee;
            font-family: system-ui, Arial;
            padding: 30px
        }

        .card {
            max-width: 520px;
            margin: 40px auto;
            background: #1f1f1f;
            border-radius: 14px;
            padding: 28px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .35)
        }

        h2 {
            font-weight: 600;
            text-align: center;
            margin: 10px 0 24px;
            color: #ff7a00
        }

        input,
        button {
            width: 100%;
            padding: 14px 16px;
            border-radius: 10px;
            border: 1px solid #444;
            background: #121212;
            color: #eee
        }

        button {
            background: #ff7a00;
            border: none;
            font-weight: 600;
            cursor: pointer;
            margin-top: 16px
        }

        .err {
            color: #ffb3b3;
            margin-top: 10px
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>Enter your phone number to<br>generate your avatar</h2>
        <form method="post" action="{{ route('login') }}">
            @csrf
            <input name="mobile" placeholder="Enter your registered phone number" value="{{ old('mobile') }}">
            @error('mobile')
                <div class="err">{{ $message }}</div>
            @enderror
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>
