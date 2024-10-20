<!DOCTYPE html>
<html lang="en">

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

        /* Hover effect */
        tbody tr:hover {
            background-color: #565e65;
            transition: background-color 0.3s ease;
        }

        td,
        th {
            border: none;
        }

        /* Image styling */
        img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .page-content {
            padding: 20px;
        }

        .table-wrapper {
            border-radius: 10px;
            overflow: hidden;
        }

        /* Button styles */
        .btn {
            padding: 8px 8px;
            border-radius: 5px;
            color: white;
            font-size: 14px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-approve {
            background-color: #28a745;
            margin-right: 10px;
            margin-bottom: 5px;

        }

        .btn-reject {
            background-color: #dc3545;

        }

        .btn i {
            margin-right: 5px;
        }

        /* Responsive styling for smaller screens */

        }
    </style>
</head>

<body>

    @include('admin.header')
    @include('admin.sidbar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
            </div>
        </div>

        <!-- Table with Bootstrap and custom styling -->
        <div class="table-wrapper">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Room ID</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Arrival Date</th>
                        <th>Leaving Date</th>
                        <th>Status</th>
                        <th>Room Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Status Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $data)
                    
                        <tr>
                            <td>{{ $data->room ? $data->room->id : '' }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->start_date }}</td>
                            <td>{{ $data->end_date }}</td>
                            <td>

                                @if ($data->status == 'approve')
                                    <span style="color: #28a745">Approved</span>
                                @elseif($data->status == 'reject')
                                    <span style="color: #dc3545">Rejected</span>
                                @elseif($data->status == 'waiting')
                                    <span style="color: #d6d825">Waiting</span>
                                @endif

                            </td>
                            <td>{{ $data->room ? $data->room->room_title : '' }}</td>
                            <td>{{ $data->room ? $data->room->price : '' }}$</td>
                            <td>
                                @if($data->room)
                                    <img src="/room/{{ $data->room->image }}" alt="Room Image" width="200" height="150">
                                @else
                                    No image
                                @endif
                            </td>
                            <td>
                                <a onclick="return confirm('Are you sure you want to delete this booking?')"
                                    href="{{ url('delete_booking', $data->id) }}" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('approve_book', $data->id) }}" class="btn btn-approve">
                                    <i class="fas fa-check-circle"></i> Approve
                                </a>
                                <a href="{{ url('reject_book', $data->id) }}" class="btn btn-reject">
                                    <i class="fas fa-times-circle"></i> Reject
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('admin.footer')

</body>

</html>
