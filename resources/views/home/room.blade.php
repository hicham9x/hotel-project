<div  class="our_room">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Our Room</h2>
                <p>Chambres et suites d'hôtel à Agadir avec vue imprenable sur la baie </p>
             </div>
          </div>
       </div>
       
       <div class="row">
         @foreach ($room as $rooms)
          <div class="col-md-4 col-sm-6" >
             <div id="serv_hover"  class="room" style="border-radius: 10px">
                <div class="room_img" style="border-radius: 10px 10px 0 0">
                   <figure><img src="room/{{$rooms->image}}" alt="#" style="height: 200px ; width:3400px "/></figure>
                </div>
                <div class="bed_room">
                   <h3>{{$rooms->room_title}}</h3>
                   <p>{!! Str::limit($rooms->description,100) !!} </p>
                   <a href="{{url('room_details',$rooms->id)}}" class="btn btn-success" style="margin-top: 20px">
                     Room Detail 
                     <i class="fa-solid fa-circle-info" style="margin-left: 5px;"></i>
                 </a>                 
                </div>
             </div>
          </div>
          @endforeach
         
       </div>
    </div>
 </div>