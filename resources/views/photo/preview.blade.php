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
                        Share ➤
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
                                <td width="33.3%" align="left"><img src="{{ asset('img/krisha_logo.png') }}"
                                        alt="Krisha Charitable Trust Logo" class="h-16"></td>
                                <td width="33.3%" align="center"><img src="{{ asset('img/emerald_logo.png') }}"
                                        alt="Emerald Logo" class="h-16 mx-auto"></td>
                                <td width="33.3%" align="right"><img src="{{ asset('img/jewelone_logo.png') }}"
                                        alt="Jewel One Logo" class="h-16"></td>
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
                                    <div
                                        class="rounded-full border-2 border-amber-600 h-[280px] w-[200px] overflow-hidden">
                                        <img src="{{ asset($participant->photo_path) }}" alt="Participant Photo"
                                            class="object-cover w-full h-full">
                                    </div>

                                    <div class="text-2xl uppercase font-bold text-white mb-5 mt-2">

                                        {{ $participant->name }}
                                    </div>
                                </td>

                                <!-- QR Section -->
                                <td width="50%" align="center"
                                    style="background-image: url('{{ asset('img/bg-image.png') }}');background-size: contain; background-repeat: no-repeat;background-position: center;">
                                    <p class="font-bold text-center text-white text-xl">SCAN QR FOR <br> REGISTRATION
                                    </p>
                                    <img class="my-3" src="{{ asset('img/qr_code.png') }}"
                                        alt="QR Code for Registration" width="150">
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
                                <td width="20%" align="center" style="padding-right:20px;">
                                    <h3 class="text-[10px] font-semibold mb-4">IN ASSOCIATION WITH</h3>
                                    <table width="100%">
                                        <tr>
                                            <td class="pe-2" align="center">
                                                <div class="mb-3">
                                                <img
                                                    src="{{ asset('img/saliwan_runners_logo.png') }}"
                                                    alt="Saliwan Runners">
                                                </div>
                                                    <div>
                                                    <img src="{{ asset('img/genesis_logo.png') }}"
                                                    alt="Genesis Foundation">
                                                    </div>
                                                </td>
                                            
                                        </tr>
                                      
                                    </table>
                                </td>

                                <!-- Sponsors -->
                                <td width="80%" style="border-left:1px solid #000;padding-left:20px;">
                                    <h3 class="text-[10px]  font-semibold mb-4">OUR SPONSORS</h3>
                                    <table width="100%">
                                        <tr align="center">
                                            <td class="pe-2"><img src="{{ asset('img/gjv_logo.png') }}"
                                                    alt="GJV Realtors"></td>
                                            <td class="pe-2"><img src="{{ asset('img/kavery_logo.png') }}"
                                                    alt="Kavery Premium Tank"></td>
                                            <td class="pe-2"><img src="{{ asset('img/pranay_logo.png') }}"
                                                    alt="Pranay Agencies & Infraa"></td>
                                            <td><img class="pe-2" src="{{ asset('img/bmch_logo.png') }}"
                                                    alt="BMCH"></td>
                                            <td><img  src="{{ asset('img/tilebros_logo.png') }}"
                                                    alt="The Tile Bros"></td>
                                        </tr>
                                        <tr align="center">
                                        <td><img class="pe-2 pt-3" src="{{ asset('img/magnum.png') }}"
                                                    alt="BMCH"></td>
                                        
                                        <td class="pe-2 pt-3"><img src="{{ asset('img/mirchi.png') }}"
                                                    alt="GJV Realtors"></td>
                                            <td class="pe-2 pt-3"><img src="{{ asset('img/kps-hospitals.png') }}"
                                                    alt="Kavery Premium Tank"></td>
                                            <td class="pe-2 pt-3"><img src="{{ asset('img/kr-hospital.png') }}"
                                                    alt="Pranay Agencies & Infraa"></td>
                                            <td><img class="pt-3" src="{{ asset('img/cherr.png') }}"
                                                    alt="BMCH"></td>
                                           
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
                    <td colspan="3" class="bg-[#003f3f] text-white text-sm text-center font-medium py-2">
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
        async function generateAndShare() {
            const posterSection = document.getElementById('poster-section');

            // Convert poster to canvas
            const canvas = await html2canvas(posterSection);
            const blob = await new Promise(resolve => canvas.toBlob(resolve, "image/png"));

            const file = new File([blob], "poster.png", {
                type: "image/png"
            });

            // Message text
            const message =
                "I have registered for Jewel One Marathon! Register now: https://wa.me/919791714333?text=REGISTER%20FOR%20JEWEL%20ONE%20MARATHON";

            // Check if Web Share API supports files
            if (navigator.canShare && navigator.canShare({
                    files: [file]
                })) {
                try {
                    await navigator.share({
                        title: "Jewel One Marathon",
                        text: message,
                        files: [file]
                    });
                } catch (error) {
                    console.error("Sharing failed:", error);
                }
            } else {
                alert("Direct image sharing is not supported in this browser. Please use mobile Chrome/Safari.");
            }
        }

        // Attach handlers
        document.getElementById('shareWhatsApp').addEventListener('click', function(e) {
            e.preventDefault();
            generateAndShare();
        });
    </script>


</body>

</html>
