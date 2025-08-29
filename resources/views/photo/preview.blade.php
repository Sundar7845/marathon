<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Preview Poster</title>
    <style>
        body {
            background: #111;
            color: #eee;
            font-family: system-ui, Arial;
            padding: 24px
        }

        .wrap {
            max-width: 1060px;
            margin: 20px auto;
            background: #1f1f1f;
            border-radius: 16px;
            padding: 28px;
            display: flex;
            gap: 24px;
            align-items: flex-start
        }

        .imgbox {
            flex: 1;
            background: #0c0c0c;
            border-radius: 12px;
            padding: 12px;
            display: flex;
            justify-content: center
        }

        .imgbox img {
            max-width: 100%;
            height: auto;
            border-radius: 12px
        }

        .side {
            width: 260px
        }

        .btn {
            width: 100%;
            background: #ff7a00;
            border: none;
            border-radius: 10px;
            padding: 14px;
            color: #fff;
            font-weight: 700;
            cursor: pointer;
            margin-top: 14px;
            text-align: center;
            display: block;
            text-decoration: none
        }

        .back {
            color: #bbb;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 10px
        }
    </style>
</head>

<body>
    <div class="wrap">
        <div class="imgbox">
            @if ($participant->poster_path)
                <img src="{{ asset('storage/' . $participant->poster_path) }}" alt="Poster for {{ $participant->name }}">
            @else
                <p>No poster found. Please upload a photo.</p>
            @endif
        </div>
        <div class="side">
            <a class="back" href="{{ route('upload.form', $participant) }}">&#8592; Back</a>
            @if ($participant->poster_path)
                <a class="btn" href="{{ route('download', $participant) }}">Download ⬇️</a>
            @endif
        </div>
    </div>
</body>

</html>
