<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-color: #f7f7f7; padding: 20px; font-family: Arial, sans-serif;">

<h4 style="font-weight: bold; text-align: center;">Destinasi Wisata</h4>

<table width="100%" cellspacing="10">
    @foreach ($destinasi as $items)
    <tr>
        <td style="background-color: #ffffff; padding: 15px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <h5 style="font-size: 20px; margin-bottom: 10px; font-weight: bold;">{{ $items->nama_des }}</h5>
            <!-- You can replace these icons with images if you want them to display correctly -->
            <p style="margin-bottom: 10px; color: #888888;">Location: {{ $items->alamat }}</p>
            <hr style="border: 0; border-top: 1px solid #eaeaea; margin-bottom: 10px;">
            <table width="100%" cellspacing="5">
                <tr>
                    <td width="33%" style="text-align: center; color: #888888; font-size: 14px;">Jam Buka<br><span style="color: #333333;">08.00</span></td>
                    <td width="33%" style="text-align: center; color: #888888; font-size: 14px;">Jam Tutup<br><span style="color: #333333;">17.00</span></td>
                    <td width="33%" style="text-align: center; color: #ffffff; font-size: 14px; padding: 5px; background-color: {{ $items->status_des == 'Buka' ? '#4CAF50' : '#f44336' }};">
                        {{ $items->status_des == 'Buka' ? 'Buka' : 'Tutup' }}
                    </td>
                </tr>
            </table>
            <hr style="border: 0; border-top: 1px solid #eaeaea; margin: 10px 0;">
            <table width="100%" cellspacing="5">
                <tr>
                    <td style="color: #888888; font-size: 14px;">Harga Tiket</td>
                    <td style="text-align: right;"><a href="{{ route('cari_wisata', ['destinasi' => $items->id_destinasi]) }}" style="background-color: #007BFF; padding: 8px 15px; border-radius: 5px; text-decoration: none; color: #ffffff;">Pesan</a></td>
                </tr>
                <tr>
                    <td colspan="2" style="color: #555555;">Rp7.000 s/d Rp15.000</td>
                </tr>
            </table>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>
