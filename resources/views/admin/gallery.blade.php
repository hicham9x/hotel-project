<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        /* Style the container */
        .form-container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            /* Removed white background color */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: transparent;
        }

        h1 {
            text-align: center;
            color: white;
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Style for gallery images */
        .gallery-container {
            width: 100%;
            max-width: 1000px;
            margin: 20px auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            justify-items: center;
        }

        .gallery-container img {
            width: 100%;
            height: auto;
            max-width: 300px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Style for the delete icon */
        .delete-icon {
            display: block;
            text-align: center;
            margin-top: 5px;
            color: #dc3545; /* Red color for the delete icon */
            font-size: 16px; /* Smaller size */
            text-decoration: none;
        }

        /* Style the label and inputs */
        label {
            display: block;
            font-size: 16px;
            margin-bottom: 8px;
            color: #495057;
        }

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

        .custom-file-upload:hover {
            background-color: #0056b3;
        }

        /* Style the submit button */
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }

            input[type="file"],
            input[type="submit"] {
                font-size: 14px;
            }

            .gallery-container {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            }
        }
    </style>
</head>

<body>

    @include('admin.header')
    @include('admin.sidbar')

    <div class="page-content">
        <div class="container-fluid">
            <!-- Gallery Section -->
            <h1 style="font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;">Gallery</h1>

            <div class="gallery-container">
                @foreach ($gallery as $gallery)
                    <div style="text-align: center;">
                        <img src="/gallery/{{ $gallery->image }}" alt="Image" >
                        <a href="{{url('delete_gallery', $gallery->id)}}" class="delete-icon" onclick="return confirm('Are you sure you want to delete this image?')">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Upload Form Section -->
            <div class="form-container">
                <form action="{{ url('upload_gallery') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label class="custom-file-upload">
                            <input type="file" name="image" id="imageUpload" style="display: none;" required>
                            <i class="fas fa-cloud-upload-alt"></i> Choose New Image
                        </label>
                    </div>
                    <!-- Submit Button -->
                    <div style="text-align: center;">
                        <input type="submit" value="Add Image" class="btn btn-primary"
                            style="padding: 10px 20px; border-radius: 8px;">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('admin.footer')
</body>

</html>
