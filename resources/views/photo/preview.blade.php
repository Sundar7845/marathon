<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Marathon Registration Poster</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #004d4d;
            color: white;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            padding: 20px;
            background-color: #015c5c;
        }

        .top-logos {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .top-logos img {
            height: 70px;
        }

        .middle-section {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 40px;
        }

        .qr-section {
            text-align: center;
            flex: 1;
            margin: 10px;
        }

        .qr-section img {
            width: 200px;
            height: auto;
        }

        .running-text {
            font-size: 28px;
            font-weight: bold;
            color: #f58220;
        }

        .sub-text {
            color: white;
            font-size: 20px;
        }

        .circle-frame {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background-color: white;
            margin: 10px auto;
            border: 5px solid #f58220;
        }

        .name-bar {
            background-color: white;
            height: 40px;
            width: 60%;
            margin: 20px auto;
            border-radius: 5px;
            color: black
        }

        .bottom-section {
            background-color: white;
            color: black;
            padding: 20px;
            border-radius: 10px;
        }

        .sponsors,
        .partners {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .sponsors img,
        .partners img {
            max-height: 60px;
            object-fit: contain;
        }

        .footer {
            background-color: #f58220;
            color: black;
            text-align: center;
            font-weight: bold;
            padding: 10px;
            margin-top: 30px;
        }

        .contacts {
            background-color: #003f3f;
            text-align: center;
            padding: 10px;
            color: white;
        }

        .btn-download {
            display: inline-block;
            margin-top: 20px;
            background-color: #ff7a00;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
        }

        .btn-download:hover {
            background-color: #e66400;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Top Logos -->
        <div class="top-logos">
            <img src="{{ asset('img/krisha_logo.png') }}" alt="Krisha Charitable Trust Logo">
            <img src="{{ asset('img/emerald_logo.png') }}" alt="Emerald Logo">
            <img src="{{ asset('img/jewelone_logo.png') }}" alt="Jewel One Logo">
        </div>

        <!-- Middle Section -->
        <div class="middle-section">
            <div class="circle-frame"><img src="{{ asset('/storage/' . $participant->photo_path) }}"
                    alt="Participant Photo">
            </div>

            <div class="qr-section">
                <p><strong>SCAN QR FOR REGISTRATION</strong></p>
                <img src="{{ asset('img/qr_code.png') }}" alt="QR Code for Registration">
                <p class="running-text">I AM RUNNING</p>
                <p class="sub-text">ARE YOU RUNNING?</p>
            </div>
        </div>

        <!-- Name Bar -->
        <div class="name-bar">{{ $participant->name }}</div>

        <!-- Download Button -->
        @if ($participant->photo_path)
            <a href="{{ asset('/storage/' . $participant->photo_path) }}" class="btn-download" download>
                Download Poster Image
            </a>
        @endif

        <!-- Bottom Section -->
        <div class="bottom-section">
            <!-- Partners -->
            <h3 style="text-align: center;">IN ASSOCIATION WITH</h3>
            <div class="partners">
                <img src="{{ asset('img/saliwan_runners_logo.png') }}" alt="Saliwan Runners">
                <img src="{{ asset('img/genesis_logo.png') }}" alt="Genesis Foundation">
            </div>

            <!-- Sponsors -->
            <h3 style="text-align: center;">OUR SPONSORS</h3>
            <div class="sponsors">
                <img src="{{ asset('img/gjv_logo.png') }}" alt="GJV Realtors">
                <img src="{{ asset('img/kavery_logo.png') }}" alt="Kavery Premium Tank">
                <img src="{{ asset('img/pranay_logo.png') }}" alt="Pranay Agencies & Infraa">
                <img src="{{ asset('img/tilebros_logo.png') }}" alt="The Tile Bros">
                <img src="{{ asset('img/mangum_logo.png') }}" alt="Mangum Properties">
                <img src="{{ asset('img/radiomirchi_logo.png') }}" alt="Radio Mirchi">
                <img src="{{ asset('img/bmch_logo.png') }}" alt="BMCH">
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            EVENT VENUE: EMERALD GROUND, THOPPAMPATTI PIRIVU, COIMBATORE
        </div>
        <div class="contacts">
            CONTACT NUMBER - 7397 111 747 | 99521 99954 | 93455 00928
        </div>
    </div>

</body>

</html>
