<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pajak</title>
</head>

<body>


    <style type="text/css">
    table tr td,
    table tr th {
        font-size: 9pt;

    }

    .doc-title {
        text-align: center;
        font-size: 14px;
    }

    @page {
        size: A4 portrait;
    }
    </style>
    <div>
        <div>
            <div class="doc-title">
                <h3>Laporan Pajak</h3>
            </div>

        </div>

        <table style="width:100%;" border="1" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th>Nama Usaha</th>
                    <th>Total Pajak</th>
                    <th>Dibayar Pada</th>


                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach ($rowsPajak as $r)
                <tr>
                    <td style="text-align: center;">
                        {{ $i++ }}
                    </td>
                    <td>{{ $r->nama_usaha }}</td>
                    </td>
                    <td class="text-end">Rp.{{ number_format($r->total_pajak) }}
                    </td>
                    <td>{{ $r->created_at }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>