<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generate Certificate</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="min-h-screen" style="background-image: url({{ asset('bg.jpg') }});background-size: cover">

  <div class="mx-w-5xl mx-auto py-10 px-4 sm:px-8 text-center">
  <button id="downloadBtn"
      class="mb-6 bg-green-600 cursor-pointer text-white px-6 py-2 rounded-md shadow-md hover:bg-green-700">
      Download Certificate
    </button>
    <iframe id="pdfPreview" width="100%" height="600" style="border:none;"></iframe>
    
  </div>

  <script src="https://unpkg.com/pdf-lib@1.17.1/dist/pdf-lib.min.js"></script>

  <?php
  $name = $user->name;
  $km = $user->category;
  ?>

  <script>
    const templateUrl = "{{ asset('Marathon-Certificate.pdf') }}";
    const userName = "<?php echo $name; ?>";
    const kmRange = "<?php echo $km; ?>";

    let pdfBlobUrl = null;

    async function generateCertificate() {
      const existingPdfBytes = await fetch(templateUrl).then(res => res.arrayBuffer());
      const { PDFDocument, rgb, StandardFonts } = PDFLib;

      const pdfDoc = await PDFDocument.load(existingPdfBytes);
      const page = pdfDoc.getPages()[0];
      const font = await pdfDoc.embedFont(StandardFonts.HelveticaBold);

      // --- Name positioning ---
      const startX = 180;
      const endX = 430;
      const yPosition = 415;
      const fontSize = 16;
      const textWidth = font.widthOfTextAtSize(userName, fontSize);
      const centeredX = startX + ((endX - startX) - textWidth) / 2;

      page.drawText(userName, {
        x: centeredX,
        y: yPosition,
        size: fontSize,
        font,
        color: rgb(0, 0, 0)
      });

      // --- KM Range positioning ---
      const startXkm = 165;
      const endXkm = 190;
      const yKm = 362;
      const fontSizeKm = 11;
      const textWidthKm = font.widthOfTextAtSize(kmRange, fontSizeKm);
      const centeredXKm = startXkm + ((endXkm - startXkm) - textWidthKm) / 2;

      page.drawText(kmRange, {
        x: centeredXKm,
        y: yKm,
        size: fontSizeKm,
        font,
        color: rgb(0, 0, 0)
      });

      // --- Save PDF ---
      const pdfBytes = await pdfDoc.save();
      const blob = new Blob([pdfBytes], { type: 'application/pdf' });
      pdfBlobUrl = URL.createObjectURL(blob);

      // --- Show preview (desktop) ---
      document.getElementById('pdfPreview').src = pdfBlobUrl;
    }

    // Handle download (works on all devices)
    document.getElementById('downloadBtn').addEventListener('click', () => {
      if (!pdfBlobUrl) return;
      const link = document.createElement('a');
      link.href = pdfBlobUrl;
      link.download = `${userName}-Certificate.pdf`;
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    });

    window.addEventListener('load', generateCertificate);
  </script>
</body>
</html>
