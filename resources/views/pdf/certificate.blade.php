<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Sistem Informasi Kesehatan Pelabuhan</title>
    <meta name="description" content="SINKARKES">
    <meta name="author" content="Ardi Soebrata">
    <meta name="keywords" content="Kesehatan Pelabuhan, Kementerian Kesehatan, Republik Indonesia">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="https://sinkarkes.kemkes.go.id/assets/img/favicons/apple-touch-icon.png?v=BGGrN6p0zJ">
    <link rel="icon" type="image/png"
        href="https://sinkarkes.kemkes.go.id/assets/img/favicons/favicon-32x32.png?v=BGGrN6p0zJ" sizes="32x32">
    <link rel="icon" type="image/png"
        href="https://sinkarkes.kemkes.go.id/assets/img/favicons/favicon-16x16.png?v=BGGrN6p0zJ" sizes="16x16">
    <link rel="manifest" href="https://sinkarkes.kemkes.go.id/assets/img/favicons/manifest.json?v=BGGrN6p0zJ">
    <link rel="mask-icon" href="https://sinkarkes.kemkes.go.id/assets/img/favicons/safari-pinned-tab.svg?v=BGGrN6p0zJ"
        color="#40ada6">
    <link rel="shortcut icon" href="https://sinkarkes.kemkes.go.id/assets/img/favicons/favicon.ico?v=BGGrN6p0zJ">
    <meta name="apple-mobile-web-app-title" content="Simkespel">
    <meta name="application-name" content="Simkespel">
    <meta name="msapplication-config"
        content="https://sinkarkes.kemkes.go.id/assets/img/favicons/browserconfig.xml?v=BGGrN6p0zJ">
    <meta name="theme-color" content="#40ada6">

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light"
        rel="stylesheet" type="text/css">
    <style>
        * {
            font-family: 'Open Sans', Arial, sans-serif;
        }

        @page {
            margin: 0;
            size: 595px 842px;
        }

        body {
            margin: 0;
            padding: 0;
            width: 595px;
            height: 842px;
            background: url('{{ public_path('assets/images/background.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            /* margin:0px */
        }

        .icv {
            /* margin: 0 auto; */
            padding: 20px;
            position: relative;
        }

        .icv .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 190px;
            opacity: 0.1;
            -webkit-filter: grayscale(100%) brightness(80%) contrast(120%);
            /* DomPDF fallback - just use very low opacity */
        }

        .icv-header {
            text-align: center;
        }

        .icv-header img {
            margin-right: 10px;
        }

        .icv-header div {
            margin-bottom: 5px;
        }

        .icv-header h3 {
            margin-top: 0px;
            margin-bottom: 0px;
            font-size: 20px;
            font-weight: bold;
            line-height: 1.3;
        }

        .icv-header p {
            font-size: 0px;
            line-height: 1.3;
        }

        .icv-body {
            margin-top: 0px;
        }

        .icv-body p {
            padding: 0px;
            margin: 0px 0px 5px 0px;
        }

        .text-bold {
            font-weight: bold;
        }

        .icv .main-data {
            border-bottom: 1px solid #f1d380;
            padding-bottom: 5px;
            margin-bottom: 5px;
            position: relative;
        }

        .main-data img {
            top: 0;
            right: 0;
            width: 133px;
        }

        .icv .data-detail {
            font-size: 12px;
        }

        .data-detail p.title {
            font-size: 12px;
            font-weight: bold;
            padding: 0px;
            margin: 0px;
        }

        .data-detail p {
            padding: 0px;
            margin: 0px;
        }

        .icv-table {
            width: 100%;
            font-size: 10px;
        }

        .icv-table th,
        .icv-table td {
            padding: 5px;
            vertical-align: top;
            line-height: 1.4;
            text-align: left;
        }

        .icv-table th {
            font-weight: normal;
            background-color: #e8d79c;
            text-align: left;
        }

        .icv-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 11px;
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
        }

        .icv-footer p {
            padding: 0px;
            margin: 0px;
            line-height: 1.4;
        }

        .text-secondary {
            color: #777777
        }
    </style>
</head>

<body>
    <div id="result-block">
        <div class="row">
            <div id="certificate-content" class="col-md-6 col-md-offset-4 icv" style="padding-top: 0px">
                <img src="https://sinkarkes.kemkes.go.id/assets/img/logo1.png" class="watermark"> <br>
                <section class="icv-header">
                    <div>
                        <img src="https://sinkarkes.kemkes.go.id/assets/img/pancasila.png" alt="Logo Garuda"
                            height="40"> <br>
                    </div>
                    <div>
                        <img src="https://sinkarkes.kemkes.go.id/assets/img/who.png" alt="Logo WHO" height="30">
                        <img src="https://sinkarkes.kemkes.go.id/assets/img/kemkes-landscape.png" alt="Logo Kemenkes"
                            height="30">
                        <img src="https://sinkarkes.kemkes.go.id/assets/img/satusehat.png" alt="Logo Satusehat"
                            height="30">
                    </div>
                    <h3 class="text-secondary" style="font-size: 18px">International Certificate of Vaccination
                        (Prophylaxis)</h3>
                    <p style="margin-top: 0px; font-size:14px" class="text-secondary">Certificat Internatiional de
                        Vaccination ou de
                        Prophylaxie</p>
                </section>
                <section class="icv-body">
                    <div class="main-data">
                        <table style="width: 100%">
                            <tbody>
                                <tr>
                                    <td style="padding-bottom: 56.5px">
                                        <p class="text-secondary" style="font-size: 13px">
                                            <strong>{{ $biodata->patient_name }}</strong><br>
                                            Passport {{ $biodata->nationality_doc }} <br>
                                            {{ $biodata->date_of_birth }}
                                        </p>
                                    </td>
                                    <td style="width:146px; text-align:right">
                                        <img src="{{ $qrCodeUrl }}" alt="" id="qr_certificate"
                                            style="width: 100px; height:100px">
                                        <br>
                                        <span id="no_document" class="text-secondary"
                                            style="font-size: 12px; margin-top:0px; margin-right:6px">{{ $biodata->no_document }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="data-detail">
                        <p class="title text-secondary" style="margin-bottom: 5px; margin-top:5px; font-size:12px">In
                            accordance with the International Health Regulations</p>
                        <p class="text-secondary" style="margin-bottom: 3px; margin-top:5px">compormement au Reglement
                            sanitaire international</p>
                        <table class="icv-table" style="margin-bottom: 20px">
                            <thead>
                                <tr class="text-secondary">
                                    <th>
                                        <strong>Vaccine or Prophylaxis</strong><br>
                                        Vaccin ou agent prophylactique
                                    </th>
                                    <th>
                                        <strong>Manufacturer and Batch no. of vaccine or
                                            prophylaxis</strong><br>
                                        Fabircant du vaccin ou de l'agent prophylactique prophylactique
                                        et numero du lot
                                    </th>
                                    <th>
                                        <strong>Date</strong><br>
                                        Date
                                    </th>
                                    <th>
                                        <strong>Valid Until</strong><br>
                                        Valiable jusqu'au
                                    </th>
                                    <th>
                                        <strong>Administering Location &amp; Supervising
                                            Clinician</strong><br>
                                        Lieu d'administration et Clinicien superviseur
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="certificate-table-body">
                                @foreach ($certificates as $item)
                                    <tr class="text-secondary">
                                        <td>
                                            <strong>{{ $item->vaccine_name }}</strong>
                                        </td>
                                        <td>{{ $item->batch_number }}</td>
                                        <td>{{ $item->start_date }}</td>
                                        <td>{{ $item->expired_date }}</td>
                                        <td>{{ $item->facility }} {{ $item->docter }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Other Details -->
                        <table class="icv-table">
                            <thead class="text-secondary">
                                <tr>
                                    <th>
                                        <strong>Disease targeted</strong>
                                    </th>
                                    <th>
                                        <strong>Date</strong>
                                    </th>
                                    <th>
                                        <strong>Manufacture and Batch No. of vaccine or
                                            prophylaxis</strong>
                                    </th>
                                    <th>
                                        <strong>Next Booster</strong>
                                    </th>
                                    <th>
                                        <strong>Official stamp and signature</strong>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-bold"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="text-bold"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                <section class="icv-footer">
                    <div class="pagination text-secondary">
                        <strong>Penafisan (Disclaimer):</strong>
                        <p>Nomor kode ICV elektronik (eICV) berbeda dengan nomor seri ICV fisik</p>
                        <br>
                    </div>
                    <div class="issued text-secondary">
                        <p class="text-bold">This certificate was issued by Ministry of Health of
                            Indonesia</p>
                        <p>Ce certificat a été délivré par le ministère Indonésien de la Santé</p>
                    </div>
                </section>
            </div>

        </div>
    </div>
</body>

</html>
