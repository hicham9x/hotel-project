<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">


    @include('admin.css')
    <style>
      .custom-file-upload {
    display: inline-block;
    padding: 10px 20px;
    cursor: pointer;
    background-color: #007bff;
    color: white;
    border-radius: 8px;
    border: 2px solid transparent;
    transition: background-color 0.3s ease, border-color 0.3s ease;
    font-size: 1em;
}

.custom-file-upload i {
    margin-right: 8px;
}

.custom-file-upload:hover {
    background-color: #0056b3;
    border-color: #004085;
}

    </style>

  </head>
  <body>
      
    @include('admin.header')
    @include('admin.sidbar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="div_center">
                    <form action="{{ url('edit_room', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div style="max-width: 600px; margin: 0 auto; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
                            <h1 style="font-size: 30px; font-weight:bold; text-align: center; margin-bottom: 20px;">Update Room</h1>
                            
                            <!-- Room Title -->
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="title" style="font-weight: bold;">Room Title</label>
                                <input type="text" name="title" value="{{ $data->room_title }}" class="form-control" style="border-radius: 8px;" required>
                            </div>
                            
                            <!-- Description -->
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="description" style="font-weight: bold;">Description</label>
                                <textarea name="Description" class="form-control" rows="5" style="border-radius: 8px;" required>{{ $data->description }}</textarea>
                            </div>
                            
                            <!-- Price -->
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="price" style="font-weight: bold;">Price</label>
                                <input type="number" name="price" value="{{ $data->price }}" class="form-control" style="border-radius: 8px;" required>
                            </div>
                            
                            <!-- Room Type -->
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="type" style="font-weight: bold;">Room Type</label>
                                <select name="type" class="form-control" style="border-radius: 8px;" required>
                                    <option selected value="{{ $data->room_type }}">{{ $data->room_type }}</option>
                                    <option value="regular">Regular</option>
                                    <option value="premium">Premium</option>
                                    <option value="deluxe">Deluxe</option>
                                </select>
                            </div>
                            
                            <!-- Free Wifi -->
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="wifi" style="font-weight: bold;">Free Wifi</label>
                                <select name="Wifi" class="form-control" style="border-radius: 8px;" required>
                                    <option selected value="{{ $data->wifi }}">{{ $data->wifi }}</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                    
                            <!-- Image Upload Section -->
                            <div class="update-image-container" style="text-align: center; margin-bottom: 30px;">
                                <label for="imageUpload" style="font-weight: bold; font-size: 1.2em; display: block; margin-bottom: 10px;">Current Image</label>
                                <div style="margin-bottom: 20px;">
                                    <img src="/room/{{ $data->image }}" alt="Current Room Image" style="border-radius: 8px; border: 2px solid #ddd; width: 100%; max-width: 200px; padding: 5px;">
                                </div>
                                
                                <!-- Custom File Input -->
                                <label class="custom-file-upload">
                                    <input type="file" name="image" id="imageUpload" style="display: none;">
                                    <i class="fas fa-cloud-upload-alt"></i> Choose New Image
                                </label>
                            </div>
                    
                            <!-- Submit Button -->
                            <div style="text-align: center;">
                                <input type="submit" value="Update Room" class="btn btn-primary" style="padding: 10px 20px; border-radius: 8px;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.footer')
  </body>
</html>
