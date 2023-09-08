<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ 'assets/css/bootstrap.min.css' }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <link rel="stylesheet" href="{{ 'assets/css/style.css' }}">
    <link rel="stylesheet" href="{{ 'assets/css/owl.carousel.css' }}">

    <title>OTW Jember - Online Tiket Wisata Kabupaten Jember</title>
    <style>
       .circular-image {
            position: relative;
            width: 300px;
            margin-bottom: 20px;
            /* height: 300px; */
        }

        .btn-round {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            border-radius: 25px;
            background-color: #007BFF;
            cursor: pointer;
            position: absolute;
            bottom: -20px;  /* posisi dari bawah foto */
            right: 90px;  /* posisi dari kanan foto */
        }

        .btn-round input[type="file"] {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .btn-round i.fa {
            color: white;
            font-size: 20px;
        }
   </style>
   <script>
        $(document).ready(function() {
            $('#gambar_konten').change(function () {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $('#photosPreview')
                        .attr("src",event.target.result);
                    };
                    reader.readAsDataURL(file);
                }

            })

        })
   </script>
</head>

<body>
