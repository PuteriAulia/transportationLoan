<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export Peminjaman Kendaraan</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script> 
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> 
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script> 
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script> 

    <script type="text/javascript">
        $(document).ready(function() 
        { 
            $('#loanTable').DataTable( 
            { 
                dom: 'Blfrtip',
            } );
        } );
        </script>
</head>
<body>
    <div class="container">
        <table id="loanTable" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Plat</th>
                    <th>Tanggal peminjaman</th>
                    <th>Tanggal pengembalian</th>
                    <th>Tujuan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($loans as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->code }}</td>
                        <td>{{ $data->transportation->plate }}</td>
                        <td>{{ dateFormat($data->date_loan) }}</td>
                        <td>{{ dateFormat($data->date_return) }}</td>
                        <td>{{ ucwords($data->destination) }}</td>
                        <td>{{ ucwords($data->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>