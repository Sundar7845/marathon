<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marathon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: url('marathon.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.2);
            /* transparent white */
            backdrop-filter: blur(10px);
            /* blur effect */
            -webkit-backdrop-filter: blur(10px);
            /* Safari support */
            padding: 20px;
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            /* optional shadow */
        }
    </style>
</head>

<body>
    <div class="form-container text-center">
        <h1>Marathon Certificate</h1>
        <p>Enter your details to download your certificate</p>
        <form action="/certificate" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <input type="number" name="mobile" class="form-control" placeholder="Your Mobile Number" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Download Certificate</button>
        </form>
    </div>
</body>

</html>
