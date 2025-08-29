<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Select Name</title>
    <style>
        body {
            background: #111;
            color: #eee;
            font-family: system-ui, Arial;
            padding: 24px
        }

        .wrap {
            max-width: 820px;
            margin: 20px auto;
            background: #1f1f1f;
            border-radius: 16px;
            padding: 28px
        }

        h2 {
            color: #ff7a00;
            text-align: center;
            margin: 0 0 18px
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px
        }

        .card {
            background: #2c2c2c;
            border-radius: 12px;
            padding: 18px;
            text-align: center
        }

        .name {
            font-weight: 700
        }

        .cat {
            opacity: .8;
            margin-top: 4px
        }

        .link {
            display: block;
            text-decoration: none;
            color: #eee
        }

        .back {
            color: #bbb;
            text-decoration: none;
            margin: 6px 0 12px;
            display: inline-block
        }
    </style>
</head>

<body>
    <div class="wrap">
        <a class="back" href="{{ route('login') }}">&#8592; Back</a>
        <h2>Select your name to generate photo</h2>
        <div class="grid">
            @foreach ($participants as $p)
                <a class="link" href="{{ route('upload.form', $p) }}">
                    <div class="card">
                        <div class="name">{{ $p->name }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</body>

</html>
