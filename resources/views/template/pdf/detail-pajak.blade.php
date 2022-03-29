<!DOCTYPE html>
<html>

<head>
    <title>Laporan Detail Pajak</title>
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
                <h3>Laporan Detail Pajak</h3>
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
                @php
                $pajakTotal = 0;
                @endphp
                @foreach ($omset as $key => $r)
                @php
                $pajakTotal = $pajakTotal + $r->pajak;
                @endphp
                <tr>
                    <th scope="row">{{ $key = $key + 1 }}
                    </th>
                    <td>Rp.{{ number_format($r->nominal) }}
                    </td>
                    <td>Rp.{{ number_format($r->pajak) }}
                    </td>
                    <td>{{ $r->created_at }}</td>
                </tr>
                @endforeach
                <tr>
                    <th scope="row" class="text-end" colspan="2">Total Pajak
                    </th>
                    <th>Rp.{{ number_format($pajakTotal) }}
                    </th>
                    <td></td>
                </tr>
            </tbody>
        </table>

    </div>
</body>

</html>