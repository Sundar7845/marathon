<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Poster</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen flex flex-col items-center justify-center font-[DM_Sans] bg-cover bg-no-repeat bg-fixed"
    style="background-image: url('{{ asset('bg.jpg') }}')">

    <div
        class="max-w-4xl flex flex-col lg:flex-row w-full overflow-auto mx-auto bg-[#151515] border border-[#A1A1AA] gap-5 rounded-xl shadow-xl shadow-black/40 p-4 mt-10 text-white">

        <div class="lg:order-2">
            <!-- Download Button -->
            @if ($participant->photo_path)
                <div class="flex flex-wrap gap-5">
          
                    <button id="downloadPoster"
                        class="inline-flex gap-1 items-center bg-[#E65D00] text-white px-6 py-2 rounded-sm font-medium">
                        Download <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 21 21"
                            fill="none">
                            <path
                                d="M21 14.4375V17.0625C20.9989 18.1064 20.5837 19.1073 19.8455 19.8455C19.1073 20.5837 18.1064 20.9989 17.0625 21H3.9375C2.89356 20.9989 1.8927 20.5837 1.15453 19.8455C0.416348 19.1073 0.00113951 18.1064 0 17.0625V14.4375C0 14.0894 0.138281 13.7556 0.384423 13.5094C0.630564 13.2633 0.964403 13.125 1.3125 13.125C1.6606 13.125 1.99444 13.2633 2.24058 13.5094C2.48672 13.7556 2.625 14.0894 2.625 14.4375V17.0625C2.62535 17.4105 2.76374 17.7441 3.00981 17.9902C3.25587 18.2363 3.58951 18.3747 3.9375 18.375H17.0625C17.4105 18.3747 17.7441 18.2363 17.9902 17.9902C18.2363 17.7441 18.3747 17.4105 18.375 17.0625V14.4375C18.375 14.0894 18.5133 13.7556 18.7594 13.5094C19.0056 13.2633 19.3394 13.125 19.6875 13.125C20.0356 13.125 20.3694 13.2633 20.6156 13.5094C20.8617 13.7556 21 14.0894 21 14.4375ZM9.57162 15.3654L9.60022 15.3924C9.65978 15.4382 9.72335 15.4786 9.79016 15.5129C9.85774 15.566 9.93049 15.6121 10.0073 15.6505C10.1633 15.7162 10.3308 15.75 10.5 15.75C10.6692 15.7501 10.8367 15.7163 10.9927 15.6506C11.0698 15.612 11.1428 15.5657 11.2105 15.5124C11.2771 15.4782 11.3404 15.438 11.3998 15.3924L11.4281 15.3658L15.3373 11.6799C15.4632 11.5619 15.5646 11.4202 15.6356 11.2629C15.7067 11.1056 15.746 10.9359 15.7514 10.7634C15.7568 10.5909 15.728 10.419 15.6668 10.2576C15.6057 10.0962 15.5133 9.9485 15.3949 9.82289C15.2765 9.69728 15.1346 9.59626 14.9771 9.52561C14.8196 9.45496 14.6498 9.41607 14.4772 9.41117C14.3047 9.40627 14.1329 9.43546 13.9717 9.49706C13.8105 9.55865 13.663 9.65146 13.5377 9.77015L11.8125 11.3963V1.3125C11.8125 0.964403 11.6742 0.630564 11.4281 0.384423C11.1819 0.138281 10.8481 0 10.5 0C10.1519 0 9.81806 0.138281 9.57192 0.384423C9.32578 0.630564 9.1875 0.964403 9.1875 1.3125V11.3963L7.46228 9.77007C7.33699 9.65138 7.1895 9.55857 7.02828 9.49698C6.86706 9.43538 6.69527 9.40619 6.52275 9.41109C6.35023 9.41599 6.18037 9.45488 6.0229 9.52553C5.86544 9.59618 5.72346 9.69721 5.6051 9.82282C5.48674 9.94843 5.39432 10.0962 5.33315 10.2575C5.27197 10.4189 5.24323 10.5908 5.24859 10.7633C5.25394 10.9358 5.29327 11.1056 5.36434 11.2628C5.4354 11.4201 5.5368 11.5618 5.66272 11.6799L9.57162 15.3654Z"
                                fill="white" />
                        </svg>
                    </button>
                    
                        <!-- WhatsApp -->
                        <a id="shareWhatsApp" target="_blank"
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4" fill="white" viewBox="0 0 32 32">
                                <path
                                    d="M16 .395C7.164.395.014 7.547.014 16.385c0 2.91.76 5.74 2.211 8.252L.084 31.605l7.184-2.107c2.42 1.322 5.168 2.02 7.986 2.02h.002c8.836 0 15.986-7.152 15.986-15.99 0-8.838-7.15-15.99-15.986-15.99zm0 29.17h-.002c-2.48 0-4.904-.672-7.02-1.945l-.504-.299-4.266 1.25 1.268-4.16-.33-.537c-1.383-2.24-2.113-4.826-2.113-7.488 0-7.922 6.447-14.37 14.373-14.37 3.84 0 7.445 1.494 10.158 4.207s4.213 6.32 4.213 10.162c0 7.922-6.447 14.37-14.373 14.37zm7.857-10.717c-.43-.215-2.52-1.246-2.91-1.387-.391-.143-.676-.215-.961.215-.283.428-1.102 1.385-1.352 1.67-.248.285-.496.322-.926.107-.43-.215-1.816-.668-3.463-2.127-1.28-1.141-2.145-2.547-2.396-2.977-.248-.428-.027-.66.188-.875.193-.191.43-.498.645-.746.213-.25.285-.428.43-.715.143-.285.072-.537-.035-.752-.107-.215-.961-2.314-1.316-3.166-.346-.83-.697-.717-.961-.73-.248-.012-.537-.014-.826-.014-.287 0-.752.107-1.145.537-.391.428-1.5 1.467-1.5 3.57 0 2.104 1.535 4.145 1.748 4.43.213.285 3.018 4.605 7.305 6.453.719.311 1.281.498 1.719.639.721.229 1.377.197 1.896.119.578-.086 1.781-.727 2.033-1.43.25-.703.25-1.303.178-1.43-.072-.127-.264-.193-.695-.408z" />
                            </svg>
                            Share on WhatsApp
                        </a>

                        <!-- Facebook -->
                        <a id="shareFacebook" target="_blank"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4" fill="white" viewBox="0 0 24 24">
                                <path
                                    d="M22 12.07C22 6.48 17.52 2 12 2S2 6.48 2 12.07c0 5 3.66 9.13 8.44 9.93v-7.03H8.08v-2.9h2.36V9.41c0-2.33 1.4-3.62 3.53-3.62 1.02 0 2.08.18 2.08.18v2.3h-1.17c-1.15 0-1.51.71-1.51 1.44v1.73h2.57l-.41 2.9h-2.16V22c4.78-.8 8.44-4.93 8.44-9.93z" />
                            </svg>
                            Share on Facebook
                        </a>

                </div>
            @endif
        </div>


        <div class="bg-[#025b63] min-w-[550px] max-w-[550px]" id="poster-section">
            <table class="w-full" cellpadding="0" cellspacing="0" border="0">
                <!-- Top Logos -->
                <tr>
                    <td colspan="3" align="center" style="padding:20px;">
                        <table width="100%">
                            <tr>
                                <td width="33.3%" align="left"><img src="{{ asset('img/krisha_logo.png') }}" alt="Krisha Charitable Trust Logo" class="h-16"></td>
                                <td width="33.3%" align="center"><img src="{{ asset('img/emerald_logo.png') }}" alt="Emerald Logo" class="h-16 mx-auto"></td>
                                <td width="33.3%" align="right"><img src="{{ asset('img/jewelone_logo.png') }}" alt="Jewel One Logo" class="h-16"></td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Middle Section -->
                <tr>
                    <td colspan="3" class="py-2">
                        <table width="100%">
                            <tr>
                                <!-- Circle Frame -->
                                <td width="50%" align="center">
                                        <div class="rounded-full border-2 border-amber-600 h-[280px] w-[200px] overflow-hidden">
                                        <img src="{{ asset('/storage/' . $participant->photo_path) }}" alt="Participant Photo" class="object-cover w-full h-full">
                                        </div>
                                    
                                    <div class="text-2xl uppercase font-bold text-white mb-5 mt-2">
                
                                        {{ $participant->name }}
                                    </div>
                                </td>

                                <!-- QR Section -->
                                <td width="50%" align="center" style="background-image: url('{{ asset('img/bg-image.png') }}');background-size: contain; background-repeat: no-repeat;background-position: center;">
                                    <p class="font-bold text-center text-white text-xl">SCAN QR FOR <br> REGISTRATION</p>
                                    <img class="my-3" src="{{ asset('img/qr_code.png') }}" alt="QR Code for Registration" width="150">
                                    <p class="font-extrabold text-center text-[#f58220] text-3xl mb-2">I AM RUNNING</p>
                                    <p class="font-bold text-center text-[#f58220] text-2xl mb-2">ARE YOU RUNNING?</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Bottom Section -->
                <tr>
                    <td colspan="3" style="background:#fff;color:#000;padding:20px;">
                        <table width="100%">
                            <tr valign="top">
                                <!-- Partners -->
                                <td width="30%" align="center" style="padding-right:20px;">
                                    <h3  class="text-xs font-semibold mb-4">IN ASSOCIATION WITH</h3>
                                    <table width="100%">
                                        <tr>
                                            <td class="pe-2" align="center"><img src="{{ asset('img/saliwan_runners_logo.png') }}" alt="Saliwan Runners"></td>
                                            <td align="center"><img src="{{ asset('img/genesis_logo.png') }}" alt="Genesis Foundation"></td>
                                        </tr>
                                    </table>
                                </td>

                                <!-- Sponsors -->
                                <td width="70%" style="border-left:1px solid #000;padding-left:20px;">
                                    <h3 class="text-xs font-semibold mb-4">OUR SPONSORS</h3>
                                    <table width="100%">
                                        <tr align="center">
                                            <td class="pe-2"><img src="{{ asset('img/gjv_logo.png') }}" alt="GJV Realtors"></td>
                                            <td class="pe-2"><img src="{{ asset('img/kavery_logo.png') }}" alt="Kavery Premium Tank"></td>
                                            <td class="pe-2"><img src="{{ asset('img/pranay_logo.png') }}" alt="Pranay Agencies & Infraa"></td>
                                            <td><img class="pe-2" src="{{ asset('img/tilebros_logo.png') }}" alt="The Tile Bros"></td>
                                        </tr>
                                        <tr align="center">
                                            <td class="pe-2 pt-2"><img src="{{ asset('img/mangum_logo.png') }}" alt="Mangum Properties"></td>
                                            <td class="pe-2 pt-2"><img src="{{ asset('img/radiomirchi_logo.png') }}" alt="Radio Mirchi"></td>
                                            <td><img class="pe-2 pt-2" src="{{ asset('img/bmch_logo.png') }}" alt="BMCH"></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td colspan="3" class="bg-[#f58220] text-white text-sm text-center font-medium py-2">
                        EVENT VENUE: EMERALD GROUND, THOPPAMPATTI PIRIVU, COIMBATORE
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="bg-[#003f3f] text-white text-sm text-center font-medium py-2" >
                        CONTACT NUMBER - 7397 111 747 | 99521 99954 | 93455 00928
                    </td>
                </tr>
            </table>
        </div>





    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        document.getElementById('downloadPoster').addEventListener('click', function() {
            html2canvas(document.getElementById('poster-section')).then(function(canvas) {
                const link = document.createElement('a');
                link.download = 'poster.png';
                link.href = canvas.toDataURL('image/png');
                link.click();
            });
        });
    </script>

    <script>
        const message = encodeURIComponent("I have registered for the Marathon! 🏃 Join me here:");
        const shareUrl = encodeURIComponent("https://www.emeraldsilver.in"); // replace with your event link

        document.getElementById('shareWhatsApp').href =
            `https://api.whatsapp.com/send?text=${message}%20${shareUrl}`;

        document.getElementById('shareFacebook').href =
            `https://www.facebook.com/sharer/sharer.php?u=${shareUrl}&quote=${message}`;
    </script>

</body>

</html>
