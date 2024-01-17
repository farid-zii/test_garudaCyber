<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>
<body>

    <div class="container mt-4 text-dark">
        <div class="mb-4">

            <div class="text-xl"> Tanggal: {{ Carbon\carbon::now()->isoFormat('D MMMM Y')}}</div>
            <div class="text-xl"> Faktur : {{$transaksi->kode_transaksi}}</div>
            <div class="text-xl"> Vocher : {{$voucher}}</div>

        </div>

        <table class="table table-bordered text-dark">
            <thead>
                <tr>
                    <th>Barang</th>
                    <th>Harga</th>
                    <th>qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $item)

                <tr>
                    <td>{{$item->nama_barang}}</td>
                    <td>{{$item->harga}}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->total}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-center">total</td>
                    <td colspan="" class="text-center">Rp. {{$total}}</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">Diskon</td>
                    <td colspan="" class="text-center">Rp. {{$voucher == '-' ? '0' :'10000'}}</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">Total Akhir</td>
                    <td colspan="" class="text-center">Rp. {{$transaksi->total_harga}}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <script>
        window.print()
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
</body>
</html>
