<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Penutupan Website Sementara</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link rel="icon" href="<?= base_url('assets/gambar/logo.png') ?>" type="image/x-icon">
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --pink: #f72585;
            --light-blue: #0095D9;
            --dark-blue: #003366;
            --yellow: #FFD700;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--pink), var(--light-blue));
            color: var(--dark-blue);
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        .banner {
            width: 100%;
            max-height: 280px;
            object-fit: cover;
        }

        .container {
            background-color: #fff;
            margin-top: -30px;
            padding: 40px 25px;
            border-radius: 20px;
            max-width: 600px;
            width: 90%;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-align: center;
        }

        .icon-box {
            font-size: 60px;
            color: var(--yellow);
            margin-bottom: 20px;
        }

        h1 {
            font-size: 28px;
            font-weight: 700;
            color: var(--pink);
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            color: #444;
            margin-bottom: 10px;
        }

        .highlight {
            color: var(--light-blue);
            font-weight: bold;
        }

        footer {
            margin-top: 30px;
            font-size: 14px;
            color: #fff;
            text-align: center;
        }

        @media screen and (max-width: 600px) {
            h1 {
                font-size: 22px;
            }

            .icon-box {
                font-size: 50px;
            }

            .container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>

    <!-- Banner Event -->
    <img src="<?= base_url('assets/gambar/banner-memanjang.png') ?>" alt="Banner Sangatta Festival Run" class="banner">

    <!-- Box Info -->
    <div class="container">
        <div class="icon-box">
            <i class="fas fa-clock"></i>
        </div>
        <h1>Website Ditutup Sementara</h1>
        <p>Situs ini hanya dapat diakses <span class="highlight">pada jam 11.00 WITA - 16.30 WITA</span> dan <span class="highlight">pada jam 20.00 WITA - 00.00 WITA</span> </p>
        <p>Silakan kembali pada waktu <strong>sudah ditentukan</strong>.</p>
    </div>

</body>
</html>
