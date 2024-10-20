<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .gallery_img {
            overflow: hidden;
            border-radius: 10px;
            height: 200px; /* Set a fixed height for all images */
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .gallery_img img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures the image covers the container without stretching */
            border-radius: 10px; /* Apply border radius to the image */
        }

        /* Optional: Style for the title */
        .titlepage h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2rem; /* Adjust font size as needed */
            color: #333; /* Adjust text color as needed */
        }
    </style>
</head>

<body>
    <div class="gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Gallery</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($gallery as $gallery)
                <div class="col-md-3 col-sm-6">
                    <div class="gallery_img">
                        <figure>
                            <img src="/gallery/{{$gallery->image}}" alt="#"style="height: 200px ; width:3400px "/>
                        </figure>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
