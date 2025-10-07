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


<body class="min-h-screen" style="background-image: url({{ asset('bg.jpg') }});background-size: cover">

    <div class="mx-w-5xl mx-auto py-10 px-4 sm:px-8">
        <iframe id="pdfPreview" width="100%" height="1200"></iframe>

        <script src="https://unpkg.com/pdf-lib@1.17.1/dist/pdf-lib.min.js"></script>

        <?php
        // Dummy variables (replace with DB values)
        $name = $user->name;
        $km = $user->category;
        ?>

        <script>
            const templateUrl = "{{ asset('Marathon-Certificate.pdf') }}"; // Make sure this file is in the same folder

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


                // Define the horizontal area for dotted line
                const startX = 180; // left edge of dotted line
                const endX = 430; // right edge of dotted line
                const yPosition = 415; // Y position of the name

                const fontSize = 16;
                const textWidth = font.widthOfTextAtSize(userName, fontSize);

                // Center within the dotted line
                const centeredX = startX + ((endX - startX) - textWidth) / 2;



                // Draw Name (adjust coordinates if needed)
                page.drawText(userName, {
                    x: centeredX,
                    y: yPosition,
                    size: fontSize,
                    font,
                    color: rgb(0, 0, 0)
                });

                const startXkmRange = 195; // left edge of dotted line
                const endXkmRange = 200; // right edge of dotted line
                const yPositionkmRange = 362; // Y position of the name

                const kmRangeFontSize = 11;

                const textWidthkmRange = font.widthOfTextAtSize(kmRange, kmRangeFontSize);

                // Center within the dotted line
                const centeredXkmRange = startXkmRange + ((endXkmRange - startXkmRange) - textWidth) / 2;


                // Draw KM range
                page.drawText(kmRange, {
                    x: centeredXkmRange,
                    y: yPositionkmRange,
                    size: kmRangeFontSize,
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