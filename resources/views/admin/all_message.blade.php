<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        /* Custom styles for the table */
        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            color: white;
            font-size: 14px;
        }

        th {
            background-color: #343a40;
            border-bottom: 2px solid #4c555f;
        }

        tbody tr:nth-child(even) {
            background-color: #495057;
        }

        tbody tr:nth-child(odd) {
            background-color: #3b434b;
        }

        
        tbody tr:hover {
            background-color: #565e65;
            transition: background-color 0.3s ease;
        }

        td,
        th {
            border: none;
            
        }

     

        .page-content {
            padding: 20px;
        }

        .table-wrapper {
            border-radius: 10px;
            overflow: hidden;
        }


       
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidbar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 style="font-size: 36px; font-weight: bold; margin-bottom: 20px;text-align: center"> Messages</h1>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Send Email</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($data as $data)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->phone}}</td>
                                    <td>{{$data->message}}</td>
                                    <td>
                                        <a href="{{url('send_mail',$data->id)}}" class="text-primary">
                                            <i class="fas fa-envelope"></i> Send Mail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')
</body>
</html>
