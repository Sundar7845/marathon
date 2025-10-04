<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Avatar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel='shortcut icon' type='image/x-icon' href='https://www.emeraldsilver.in/retailer/assets/img/favicon.ico' />
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="min-h-screen"
    style="background-image: url({{ asset('bg.jpg') }});background-size: cover">

    <div class="mx-w-5xl mx-auto py-10 px-4 sm:px-8">
        <iframe id="pdfPreview" width="100%" height="1200"></iframe>

        <script src="https://unpkg.com/pdf-lib@1.17.1/dist/pdf-lib.min.js"></script>

        <?php
        // Dummy variables (replace with DB values)
        $name = "Ravi Kiran";
        $km = "10 KM";
        ?>

        <script>
            const templateUrl = 'Marathon-Certificate.pdf'; // Make sure this file is in the same folder

            // Get PHP values
            const userName = "<?php echo $name; ?>";
            const kmRange = "<?php echo $km; ?>";

            window.addEventListener("load", async () => {
                // Fetch the PDF template
                const existingPdfBytes = await fetch(templateUrl).then(res => res.arrayBuffer());
                const {
                    PDFDocument,
                    rgb,
                    StandardFonts
                } = PDFLib;

                // Load the PDF
                const pdfDoc = await PDFDocument.load(existingPdfBytes);
                const page = pdfDoc.getPages()[0];

                // Choose font
                const font = await pdfDoc.embedFont(StandardFonts.HelveticaBold);

                // Draw Name (adjust coordinates if needed)
                page.drawText(userName, {
                    x: 155, // adjust X if text looks off
                    y: 415, // adjust Y if text looks off
                    size: 18,
                    font,
                    color: rgb(0, 0, 0)
                });

                // Draw KM range
                page.drawText(kmRange, {
                    x: 147,
                    y: 362,
                    size: 16,
                    font,
                    color: rgb(0, 0, 0)
                });

                // Save and preview
                const pdfBytes = await pdfDoc.save();
                const blob = new Blob([pdfBytes], {
                    type: 'application/pdf'
                });
                const url = URL.createObjectURL(blob);
                document.getElementById('pdfPreview').src = url;
            });
        </script>
    </div>

</body>

</html>