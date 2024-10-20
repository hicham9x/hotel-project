<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .table {
            width: 100%;
            margin-bottom: 20px;
            border: 1px solid #181717;
            border-radius: 10px; /* Add border radius to the entire table */
            overflow: hidden; /* Prevent content from overflowing */
        }
    
        .table th, .table td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
    
        .table-bordered {
            border: 1px solid #ddd;
            border-radius: 10px; /* Border radius to the table */
        }
    
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            font-size: 16px;
        }
    
        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
        }
    
        .btn-warning {
            background-color: #ffc107;
            color: white;
            border: none;
        }
    
        .btn:hover {
            opacity: 0.9;
        }
    
        img {
            max-width: 80px;
            max-height: 80px;
        }
    
        
    </style>

  </head>
  <body>
      
    @include('admin.header')
    @include('admin.sidbar')
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div style="max-width: 1000px; margin: 0 auto; padding: 20px;">
                <table class="table table-bordered" style="width: 100%; border-collapse: separate; border-radius: 10px; overflow: hidden;">
                    <thead>
                        <tr style="background-color: #474a4c; color: white; border-radius: 10px;">
                            <th class="th_deg" style="padding: 10px;">Room Title</th>
                            <th class="th_deg" style="padding: 10px;">Description</th>
                            <th class="th_deg" style="padding: 10px;">Price</th>
                            <th class="th_deg" style="padding: 10px;">Wifi</th>
                            <th class="th_deg" style="padding: 10px;">Room Type</th>
                            <th class="th_deg" style="padding: 10px;">Image</th>
                            <th class="th_deg" style="padding: 10px;">Delete</th>
                            <th class="th_deg" style="padding: 10px;">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $data)
                        <tr style="text-align: center;">
                            <td class="td_deg" style="padding: 10px; color :rgb(167, 167, 167); font-weight: bold;">{{ $data->room_title }}</td>
                            <td class="td_deg" style="padding: 10px; color :rgb(167, 167, 167); font-weight: bold;">{{ $data->description }}</td>
                            <td class="td_deg" style="padding: 10px; color :rgb(167, 167, 167); font-weight: bold;">${{ $data->price }}</td>
                            <td class="td_deg" style="padding: 10px; color :rgb(167, 167, 167); font-weight: bold;">{{ $data->wifi }}</td>
                            <td class="td_deg" style="padding: 10px; color :rgb(167, 167, 167); font-weight: bold;">{{ $data->room_type }}</td>
                            <td style="padding: 10px;">
                                <img src="room/{{ $data->image }}" width="90" style="border-radius: 10px; object-fit: cover;">
                            </td>
                            <td style="padding: 10px;">
                                <a onclick="return confirm('Are you sure you want to delete this room?')" href="{{ url('delete_room', $data->id) }}" class="btn btn-danger" style="border-radius: 5px;">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                            <td style="padding: 10px;">
                                <a href="{{ url('update_room', $data->id) }}" class="btn btn-warning" style="border-radius: 5px;">
                                    <i class="fa-solid fa-pen-to-square"></i>
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
