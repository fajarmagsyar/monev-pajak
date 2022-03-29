<!DOCTYPE html>
<html>

<head>
    <title>Laporan Jenis Usaha</title>
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
                <h3>Laporan Jenis Usaha</h3>
            </div>

        </div>

        <table style="width:100%;" border="1" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama Usaha</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach ($rowsJenisUsaha as $rows)
                <tr>
                    <td style="text-align: center;">
                        {{ $i++ }}
                    </td>
                    <td>
                        {{ $rows["nama_jenis_usaha"]  }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>