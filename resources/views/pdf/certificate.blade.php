<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>International Certificate of Vaccination</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }
        
        .icv {
            margin: 0 auto;
            padding: 20px;
            background-color: #f5e19f;
            position: relative;
            background: rgb(141, 178, 227);
            background: linear-gradient(36deg, rgba(141, 178, 227, 1) 1%, rgba(245, 225, 159, 1) 15%);
            width: 100%;
            min-height: 100vh;
        }

        .icv .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 230px;
            opacity: 0.2;
            filter: grayscale(100%) brightness(80%) contrast(120%);
        }

        .icv-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .icv-header img {
            margin-right: 10px;
        }

        .icv-header div {
            margin-bottom: 5px;
        }

        .icv-header h3 {
            margin-top: 19px;
            margin-bottom: 0px;
            font-size: 20px;
            font-weight: bold;
            line-height: 1.3;
        }

        .icv-header p {
            font-size: 16px;
            line-height: 1.3;
        }

        .icv-body {
            margin-top: 20px;
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

        .main-data-table {
            width: 100%;
        }

        .main-data img {
            width: 133px;
        }

        .qr-cell {
            width: 146px;
            text-align: center;
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
            border-collapse: collapse;
        }

        .icv-table th,
        .icv-table td {
            padding: 5px;
            vertical-align: top;
            line-height: 1.4;
            border: 1px solid #ccc;
        }

        .icv-table th {
            font-weight: normal;
            background-color: #e8d79c;
        }

        .icv-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 11px;
        }

        .icv-footer p {
            padding: 0px;
            margin: 0px;
            line-height: 1.4;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="icv">
        <img src="https://sinkarkes.kemkes.go.id/assets/img/logo1.png" class="watermark">

        <section class="icv-header">
            <div>
                <img src="https://sinkarkes.kemkes.go.id/assets/img/pancasila.png" alt="Logo Garuda" height="40">
            </div>
            <div>
                <img src="https://sinkarkes.kemkes.go.id/assets/img/who.png" alt="Logo WHO" height="30">
                <img src="https://sinkarkes.kemkes.go.id/assets/img/kemkes-landscape.png" alt="Logo Kemenkes" height="30">
                <img src="https://sinkarkes.kemkes.go.id/assets/img/satusehat.png" alt="Logo Satusehat" height="30">
            </div>
            <h3>International Certificate of Vaccination (Prophylaxis)</h3>
            <p>Certificat Internatiional de Vaccination ou de Prophylaxie</p>
        </section>

        <section class="icv-body">
            <div class="main-data">
                <table class="main-data-table">
                    <tbody>
                        <tr>
                            <td>
                                <p class="text-bold">{{ strtoupper($biodata->patient_name) }}</p>
                                <p>Passport {{ $biodata->nationality_doc }}</p>
                                <p>{{ $biodata->date_of_birth }}</p>
                            </td>
                            <td class="qr-cell">
                                <img src="{{ $qrCodeUrl }}" alt="QR Code">
                                <br>
                                <span>{{ $biodata->no_document }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="data-detail">
                <p class="title">In accordance with the International Health Regulations</p>
                <p>compormement au Reglement sanitaire international</p>
                
                <table class="icv-table" style="margin-bottom: 20px">
                    <thead>
                        <tr>
                            <th>
                                <strong>Vaccine or Prophylaxis</strong><br>
                                Vaccin ou agent prophylactique
                            </th>
                            <th>
                                <strong>Manufacturer and Batch no. of vaccine or prophylaxis</strong><br>
                                Fabircant du vaccin ou de l'agent prophylactique prophylactique et numero du lot
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
                                <strong>Administering Location &amp; Supervising Clinician</strong><br>
                                Lieu d'administration et Clinicien superviseur
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($certificates && count($certificates) > 0)
                            @foreach($certificates as $certificate)
                                <tr>
                                    <td class="text-bold">{{ strtoupper($certificate->vaccine_name) }}</td>
                                    <td>{{ $certificate->batch_number }}</td>
                                    <td>{{ $certificate->start_date }}</td>
                                    <td>{{ $certificate->expired_date }}</td>
                                    <td>{{ $certificate->facility }} {{ $certificate->docter }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">No certificate data available</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <!-- Other Details -->
                <table class="icv-table">
                    <thead>
                        <tr>
                            <th><strong>Disease targeted</strong></th>
                            <th><strong>Date</strong></th>
                            <th><strong>Manufacture and Batch No. of vaccine or prophylaxis</strong></th>
                            <th><strong>Next Booster</strong></th>
                            <th><strong>Official stamp and signature</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($certificates && count($certificates) > 0)
                            @foreach($certificates as $certificate)
                                <tr>
                                    <td class="text-bold">{{ $certificate->dease_target ?? '' }}</td>
                                    <td>{{ $certificate->start_date }}</td>
                                    <td>{{ $certificate->batch_number }}</td>
                                    <td>{{ $certificate->next_booster ?? '' }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        @else
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
                        @endif
                    </tbody>
                </table>
            </div>
        </section>

        <section class="icv-footer">
            <div class="pagination">
                <strong>Penafisan (Disclaimer):</strong>
                <p>Nomor kode ICV elektronik (eICV) berbeda dengan nomor seri ICV fisik</p>
                <br>
            </div>
            <div class="issued">
                <p class="text-bold">This certificate was issued by Ministry of Health of Indonesia</p>
                <p>Ce certificat a été délivré par le ministère Indonésien de la Santé</p>
            </div>
        </section>
    </div>
</body>
</html>