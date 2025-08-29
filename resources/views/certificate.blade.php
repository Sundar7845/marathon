<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Certificate</title>
    <style>
        body {
            text-align: center;
            padding-top: 100px;
            font-family: Arial, sans-serif;
        }

        h1 {
            font-size: 40px;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <h1>Certificate of Participation</h1>
    <p>This certifies that</p>
    <h2>{{ $user->name }}</h2>
    <h2>{{ $user->mobile }}</h2>
    <p>has successfully completed the marathon event.</p>
</body>

</html>
