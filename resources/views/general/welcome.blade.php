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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="https://sinkarkes.kemkes.go.id/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://sinkarkes.kemkes.go.id/assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://sinkarkes.kemkes.go.id/assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://sinkarkes.kemkes.go.id/assets/vendor/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://sinkarkes.kemkes.go.id/assets/vendor/owl.carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://sinkarkes.kemkes.go.id/assets/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" href="https://sinkarkes.kemkes.go.id/assets/vendor/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="https://sinkarkes.kemkes.go.id/assets/vendor/rs-plugin/css/layers.css">
    <link rel="stylesheet" href="https://sinkarkes.kemkes.go.id/assets/vendor/rs-plugin/css/navigation.css">
    <link rel="stylesheet" href="https://sinkarkes.kemkes.go.id/assets/css/../vendor/select2/select2.css"
        media="screen">
    <link rel="stylesheet" href="https://sinkarkes.kemkes.go.id/assets/css/simple-lists.css" media="screen">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="https://sinkarkes.kemkes.go.id/assets/css/portal/theme.css">
    <link rel="stylesheet" href="https://sinkarkes.kemkes.go.id/assets/css/portal/theme-elements.css">
    <link rel="stylesheet" href="https://sinkarkes.kemkes.go.id/assets/css/portal/theme-blog.css">
    <link rel="stylesheet" href="https://sinkarkes.kemkes.go.id/assets/css/portal/theme-shop.css">
    <link rel="stylesheet" href="https://sinkarkes.kemkes.go.id/assets/css/portal/theme-animate.css">
    <link rel="stylesheet" href="https://sinkarkes.kemkes.go.id/assets/css/portal/skin.css">
    <link rel="stylesheet" href="https://sinkarkes.kemkes.go.id/assets/css/portal/custom.css">

    <!-- Head Libs -->
    <script src="https://sinkarkes.kemkes.go.id/assets/vendor/modernizr/modernizr.min.js"></script>
    <script src="https://sinkarkes.kemkes.go.id/assets/vendor/jquery/jquery.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script> --}}
</head>

<body>
    <div class="body">
        <x-general.navbar />
        <div role="main" class="main">
            <section class="page-header page-header-custom-background mb-none" data-stellar-background-ratio="0"
                style="background-image: url(https://sinkarkes.kemkes.go.id/assets/img/slide-cek-dokumen.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1><i class="fa fa-check-square-o"></i> Cek Dokumen</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section-default mt-none">
                <div class="container">
                    <div class="heading heading-border heading-bottom-border heading-primary">
                        <h3 class="heading-primary">Apa Itu Cek Nomor Dokumen?</h3>
                    </div>
                    <p>Cek nomor dokumen adalah sebuah fitur yang kami sediakan untuk memastikan keaslian dokumen atau
                        sertifikat yang dikeluarkan dan telah terdaftar pada database sertifikat nasional Balai
                        Kekarantinaan Kesehatan Republik Indonesia.</p>
                    <div class="heading heading-border heading-bottom-border heading-primary">
                        <h3 class="heading-primary">Tata Cara Pencarian</h3>
                    </div>
                    <ol class="list list-ordened list-ordened-style-3 list-primary">
                        <li class="appear-animation fadeInUp appear-animation-visible" data-appear-animation="fadeInUp"
                            data-appear-animation-delay="0">Pilih Dokumen atau
                            Sertifikat yang akan dicek pada kolom pilihan Jenis Dokumen</li>
                        <li class="appear-animation fadeInUp appear-animation-visible"
                            data-appear-animation="fadeInUp" data-appear-animation-delay="300"
                            style="animation-delay: 300ms;">Masukan No Registrasi untuk Buku Kesehatan Kapal atau Nomor
                            ICV pada kolom Nomor Dokumen/IMO No/Barcode untuk melakukan pengecekan keaslian Dokumen</li>
                        <li class="appear-animation fadeInUp appear-animation-visible"
                            data-appear-animation="fadeInUp" data-appear-animation-delay="600"
                            style="animation-delay: 600ms;">Masukan Barcode yang tertera pada sertifikat pada kolom
                            Nomor Dokumen/IMO No/Barcode untuk melakukan pengecekan Sertifikat Lainnya</li>
                        <li class="appear-animation fadeInUp appear-animation-visible"
                            data-appear-animation="fadeInUp" data-appear-animation-delay="900"
                            style="animation-delay: 900ms;">Lalu klik tombol Cari yang terdapat dibawah kolom Nomor
                            Dokumen/IMO No/Barcode </li>
                    </ol>
                </div>
            </section>

            <div class="container">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Jenis Dokumen</label>
                        <div class="col-md-8">
                            <select name="jenis_dokumen" id="jenis_dokumen" class="form-control">
                                <option value="">--Pilih--</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nomor Dokumen/IMO No/Barcode/No. Porsi</label>
                        <div class="col-md-8">
                            <input type="text" id="no_dokumen" name="no_dokumen" class="form-control"
                                value="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-4 col-md-8">
                            <a href="" id="btn_cari" class="btn btn-primary"><i class="fa fa-search"></i>
                                Cari</a>
                        </div>
                    </div>
                </form>
            </div>
            <section class="section section-default">
                <div class="container">
                    <div id="result-block" style="display: none;">
                        <style>
                            .icv {
                                /* margin: 0 auto; */
                                padding: 20px;
                                background-color: #f5e19f;
                                position: relative;
                                background: rgb(141, 178, 227);
                                background: linear-gradient(36deg, rgba(141, 178, 227, 1) 1%, rgba(245, 225, 159, 1) 15%);
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
                        </style>
                        <div class="row">
                            {{-- start : not found data --}}
                            <div id="not-found-message" style="display: none;">
                                <p class="h3">Maaf, dokumen yang Anda cari tidak dapat Kami temukan.</p>
                            </div>
                            {{-- end : not found data --}}

                            <div id="certificate-content" class="col-md-6 col-md-offset-4 icv">
                                <img src="https://sinkarkes.kemkes.go.id/assets/img/logo1.png" class="watermark"> <br>

                                <section class="icv-header">
                                    <div>
                                        <img src="https://sinkarkes.kemkes.go.id/assets/img/pancasila.png"
                                            alt="Logo Garuda" height="40"> <br>
                                    </div>
                                    <div>
                                        <img src="https://sinkarkes.kemkes.go.id/assets/img/who.png" alt="Logo WHO"
                                            height="30">
                                        <img src="https://sinkarkes.kemkes.go.id/assets/img/kemkes-landscape.png"
                                            alt="Logo Kemenkes" height="30">
                                        <img src="https://sinkarkes.kemkes.go.id/assets/img/satusehat.png"
                                            alt="Logo Satusehat" height="30">
                                    </div>
                                    <h3>International Certificate of Vaccination (Prophylaxis)</h3>
                                    <p>Certificat Internatiional de Vaccination ou de Prophylaxie</p>
                                </section>
                                <section class="icv-body">
                                    <div class="main-data">
                                        <table style="width: 100%">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <p class="text-bold" id="patient_name"></p>
                                                        <p>Passport <span id="passport"></span></p>
                                                        <p id="birth"></p>
                                                    </td>
                                                    <td style="width:146px; text-align: center">
                                                        <img src="" alt="" id="qr_certificate">
                                                        <span id="no_document"></span>
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
                                                <tr>
                                                    <td colspan="5" class="text-center">Loading certificate data...
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- Other Details -->
                                        <table class="icv-table">
                                            <thead>
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
                                    <div class="pagination">
                                        <strong>Penafisan (Disclaimer):</strong>
                                        <p>Nomor kode ICV elektronik (eICV) berbeda dengan nomor seri ICV fisik</p>
                                        <br>
                                    </div>
                                    <div class="issued">
                                        <p class="text-bold">This certificate was issued by Ministry of Health of
                                            Indonesia</p>
                                        <p>Ce certificat a été délivré par le ministère Indonésien de la Santé</p>
                                    </div>
                                </section>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <x-general.footer />
    </div>

    <!-- Vendor -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://sinkarkes.kemkes.go.id/assets/vendor/jquery.appear/jquery.appear.min.js"></script>
    <script src="https://sinkarkes.kemkes.go.id/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="https://sinkarkes.kemkes.go.id/assets/vendor/jquery-cookie/jquery-cookie.min.js"></script>
    <script src="https://sinkarkes.kemkes.go.id/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://sinkarkes.kemkes.go.id/assets/vendor/common/common.min.js"></script>
    <script src="https://sinkarkes.kemkes.go.id/assets/vendor/jquery.stellar/jquery.stellar.min.js"></script>
    <script src="https://sinkarkes.kemkes.go.id/assets/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
    <script src="https://sinkarkes.kemkes.go.id/assets/vendor/jquery.gmap/jquery.gmap.min.js"></script>
    <script src="https://sinkarkes.kemkes.go.id/assets/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
    <script src="https://sinkarkes.kemkes.go.id/assets/vendor/isotope/jquery.isotope.min.js"></script>
    <script src="https://sinkarkes.kemkes.go.id/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="https://sinkarkes.kemkes.go.id/assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="https://sinkarkes.kemkes.go.id/assets/vendor/vide/vide.min.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="https://sinkarkes.kemkes.go.id/assets/js/portal/theme.js"></script>

    <!-- Current Page Vendor and Views -->
    <script src="https://sinkarkes.kemkes.go.id/assets/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="https://sinkarkes.kemkes.go.id/assets/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <!-- Theme Custom -->

    <script src="https://sinkarkes.kemkes.go.id/assets/js/../vendor/select2/select2.js"></script>
    <script src="https://sinkarkes.kemkes.go.id/assets/js/portal/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="https://sinkarkes.kemkes.go.id/assets/js/portal/theme.init.js"></script>

    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"9789277e9bef4abd","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.8.0","token":"e2a765f324f4412da187da8b414d804f"}'
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            let params = urlParams.get('t');

            if (!params) {
                params = urlParams.get('no_document');
            }

            let noDocument = params;

            // Set default value from URL parameter
            if (noDocument) {
                $("#no_dokumen").val(noDocument);
            }

            function checkDocument() {
                $.ajax({
                    type: "GET",
                    url: "/api/v1/checkNoDocument/" + noDocument,
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response);

                        // If response data is 0, switch to no_document parameter
                        if (response.data === 0) {
                            const newParams = urlParams.get('no_document');
                            if (newParams && newParams !== noDocument) {
                                noDocument = newParams;
                                $("#no_dokumen").val(noDocument);
                                // Retry check with new parameter
                                checkDocument();
                            }
                        }
                    }
                });
            }

            checkDocument()

            const sensorText = (text) => {
                if (!text || text.length <= 3) return text;
                return text.substring(0, text.length - 3) + '***';
            }

            function loadCertificate(documentNumber = null) {
                const docNumber = documentNumber || noDocument || $("#no_dokumen").val().trim();
                if (docNumber) {
                    // Get selected document type name
                    const selectedDocType = $("#jenis_dokumen option:selected").text();
                    const docTypeParam = selectedDocType && selectedDocType !== '--Pilih--' ?
                        `&type_document=${encodeURIComponent(selectedDocType)}` : '';

                    $.ajax({
                        type: "GET",
                        url: `/api/v1/get/certificate?no_document=${docNumber}${docTypeParam}`,
                        dataType: "JSON",
                        beforeSend: function() {
                            $("#certificate-table-body").html(
                                '<tr><td colspan="5" class="text-center">Loading...</td></tr>');
                        },
                        success: function(res) {
                            console.log('API Response:', res);

                            if (res.success && res.data) {
                                // Hide not found message and show certificate content
                                $("#not-found-message").hide();
                                $("#certificate-content").show();
                                $("#result-block").show();

                                // Fill patient data
                                $("#no_document").text(res.data.no_document);
                                const patientName = sensorText(res.data.patient_name.toUpperCase());
                                const passportPatient = sensorText(res.data.nationality_doc)
                                $("#patient_name").text(patientName);
                                $("#passport").text(passportPatient);
                                $("#birth").text(res.data.date_of_birth);

                                // Generate QR code
                                if (res.data.url_qr_code) {
                                    const qrUrl =
                                        `https://api.qrserver.com/v1/create-qr-code/?size=100x100&margin=10&data=${encodeURIComponent(res.data.url_qr_code)}`;
                                    $("#qr_certificate").attr('src', qrUrl);
                                }

                                // Load certificate data
                                if (res.data.certificate && res.data.certificate.length > 0) {
                                    let certificateRows = '';
                                    res.data.certificate.forEach(function(cert) {
                                        certificateRows += `
                                           <tr>
                                               <td class="text-bold">${cert.vaccine_name.toUpperCase()}</td>
                                               <td>${cert.batch_number}</td>
                                               <td>${cert.start_date}</td>
                                               <td>${cert.expired_date}</td>
                                               <td>${cert.facility} <br/> ${cert.docter}</td>
                                           </tr>
                                       `;
                                    });
                                    $("#certificate-table-body").html(certificateRows);
                                } else {
                                    $("#certificate-table-body").html(
                                        '<tr><td colspan="5" class="text-center">No certificate data available</td></tr>'
                                        );
                                }
                            } else {
                                // Show not found message and hide certificate content
                                $("#certificate-content").hide();
                                $("#not-found-message").show();
                                $("#result-block").show();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching certificate:', error);
                            console.error('XHR:', xhr);

                            if (xhr.status === 404) {
                                // Show not found message and hide certificate content for 404
                                $("#certificate-content").hide();
                                $("#not-found-message").show();
                                $("#result-block").show();
                            } else {
                                // For other errors, show error in certificate table
                                let errorMessage = 'Error loading certificate data';
                                if (xhr.status === 500) {
                                    errorMessage = 'Server error';
                                }

                                $("#not-found-message").hide();
                                $("#certificate-content").show();
                                $("#result-block").show();
                                $("#certificate-table-body").html(
                                    `<tr><td colspan="5" class="text-center text-danger">${errorMessage}</td></tr>`
                                    );
                            }
                        }
                    });
                } else {
                    console.error('No document number provided');
                    $("#certificate-table-body").html(
                        '<tr><td colspan="5" class="text-center">Please enter a document number</td></tr>');
                }
            }

            // Load document types on page load
            $.ajax({
                type: "GET",
                url: "/api/dashboard/type/document",
                dataType: "JSON",
                success: function(res) {
                    if (res.data && res.data.length > 0) {
                        res.data.forEach(function(docType) {
                            const selected = docType.name.toLowerCase() === 'icv' ? 'selected' :
                                '';
                            $("#jenis_dokumen").append(
                                `<option value="${docType.id}" ${selected}>${docType.name}</option>`
                                );
                        });
                        // Load certificate after document types are loaded
                        loadCertificate();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching document types:', error);
                }
            });

            // Handle search button click
            $("#btn_cari").on("click", function(e) {
                e.preventDefault();
                const docNumber = $("#no_dokumen").val().trim();
                if (docNumber) {
                    loadCertificate(docNumber);
                } else {
                    alert("Silakan masukkan nomor dokumen terlebih dahulu");
                }
            });

            // Handle Enter key on input
            $("#no_dokumen").on("keypress", function(e) {
                if (e.which == 13) {
                    e.preventDefault();
                    $("#btn_cari").click();
                }
            });
        });
    </script>
</body>

</html>
