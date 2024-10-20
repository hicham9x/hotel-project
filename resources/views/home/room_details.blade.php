<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('home.css')
    <style>
        .titlepage h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .titlepage p {
            color: #6c757d;
            font-size: 1.2rem;
        }

        .room_img img {
            border-radius: 10px 10px 0 0;
        }

        .bed_room h3 {
            color: #343a40;
        }

        .bed_room h4 {
            color: #495057;
        }

        .booking_form {
            background-color: #fff;
            border: 1px solid #e3e6ea;
            border-radius: 10px;
            padding: 20px;
        }

        .booking_form label {
            font-weight: bold;
            color: #495057;
        }

        .booking_form input[type="submit"] {
            font-weight: bold;
        }
    </style>

</head>

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <header>
        @include('home.header')
    </header>

    <div class="our_room ">
        <div class="container">
            <!-- Title Section -->
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <div class="titlepage">
                        <h2>Our Room Detail</h2>
                        <p>Chambres et suites d'hôtel à Agadir avec vue imprenable sur la baie</p>
                    </div>
                </div>
            </div>

            <!-- Room Details and Booking Form -->
            <div class="row">
                <!-- Room Details Section (Left Column) -->
                <div class="col-md-6 col-sm-12 mb-4">
                    <div id="serv_hover" class="room shadow-sm"
                        style="border-radius: 10px; overflow: hidden; background-color: #fff;">
                        <!-- Room Image -->
                        <div class="room_img">
                            <figure style="margin: 0;">
                                <img src="/room/{{ $room->image }}" alt="#"
                                    style="height: 350px; width: 100%; object-fit: cover;" />
                            </figure>
                        </div>

                        <!-- Room Details -->
                        <div class="bed_room" style="padding: 20px;">
                            <h3 style="font-weight: bold; color: #343a40;">{{ $room->room_title }}</h3>
                            <p style="padding: 12px 0; color: #6c757d;">{{ $room->description }}</p>

                            <h4 style="padding: 12px 0; font-size: 1.1em; color: #28a745;">
                                <i class="fas fa-wifi"></i> Free Wifi: {{ $room->wifi }}
                            </h4>
                            <h4 style="padding: 12px 0; font-size: 1.1em; color: #007bff;">
                                <i class="fas fa-bed"></i> Room Type: {{ $room->room_type }}
                            </h4>
                            <h3 style="user-select: none; padding: 12px 0; font-weight: bold; color: #dc3545;">
                                Price: {{ $room->price }}$
                            </h3>
                        </div>
                    </div>
                </div>

                <!-- Booking Form Section (Right Column) -->
                <div class="col-md-6 col-sm-12">
                    <div class="booking_form p-4 shadow-sm" style="background-color: #f8f9fa; border-radius: 10px;">
                        <!-- Book Room Title -->
                        <h1 class="text-center mb-4" style="font-weight: bold">Book Room</h1>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        
                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif


                        <div>
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                        </div>



                        <form action="{{ url('add_booking', $room->id) }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your name"
                                    id="name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email"
                                    id="email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="number" name="phone" class="form-control" placeholder="Enter your phone"
                                    id="phone">
                            </div>
                            <div class="form-group mb-3">
                                <label for="startDate">Start Date</label>
                                <input type="date" name="startDate" class="form-control" id="startDate">
                            </div>
                            <div class="form-group mb-3">
                                <label for="endDate">End Date</label>
                                <input type="date" name="endDate" class="form-control" id="endDate">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--  footer -->
    @include('home.footer')
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>
    <script type="text/javascript">
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;

            var day = dtToday.getDate();

            var year = dtToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();

            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);

        });
    </script>
</body>

</html>
