<style>
    .collapse{
     visibility: initial!important;
   }
</style>
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">

            <div class="avatar"><img src="admin/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
                <h1 class="h5">Admin</h1>
                <p>Web Dev</p>
            </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
            <li class="active"><a href="/"> <i class="icon-home"></i>Home </a></li>

            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse">
                    <i class="icon-windows"></i> Hotel Rooms</a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{ url('create_room') }}"><i class="fas fa-plus"></i>
                        Add Rooms</a></li>
                    <li><a href="{{ url('view_room') }}"><i class="fas fa-eye"></i>
                        View Rooms</a></li>

                </ul>
            </li>
            <li >
              <a href="{{url('bookings')}}"> <i class="fas fa-calendar-alt"></i> Bookings </a>
            </li>
            <li>
                <a href="{{url('view_gallery')}}"> <i class="fas fa-images"></i> Gallery </a>
            </li>
            <li>
                <a href="{{url('all_message')}}"> <i class="fas fa-comment-alt"></i> Messages </a>
            </li>
        </ul>
    </nav>
