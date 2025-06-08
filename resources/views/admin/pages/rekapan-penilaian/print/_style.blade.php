<style>
    @media print {

        @page {
            size: A4 landscape;
            margin: 1cm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .no-print {
            display: none !important;
        }
    }

    body {
        background: #f4f4f4;
        padding: 1rem;
    }

    .print-container {
        width: 100%;
        max-width: 297mm;
        /* hampir penuh A4 */
        margin: auto;
        background: white;
        padding: 1cm;
        box-sizing: border-box;
    }

    .print-container.print-cover-page {
        page-break-after: auto;
    }

    .bg-secondary {
        background-color: #eaeaea;
    }

    h1,
    h2,
    h3 {
        margin: 0;
    }

    .section {
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 11pt;
    }


    table,
    th,
    td {
        border: 1px solid #000;
    }

    th,
    td {
        padding: 6px 10px;
        text-align: left;
    }
</style>
