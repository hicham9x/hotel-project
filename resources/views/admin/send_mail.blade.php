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
    </style>

</head>

<body>

    @include('admin.header')
    @include('admin.sidbar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="div_center">
                    <form action="{{url('mail',$data->id)}}" method="POST">
                        @csrf
                        <div
                            style="max-width: 600px; margin: 0 auto; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                            <h1 style="font-size: 30px; font-weight:bold; text-align: center; margin-bottom: 20px;">Mail
                                send to {{ $data->name }}</h1>

                            <!-- Room Title -->
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="title" style="font-weight: bold;">Greeting</label>
                                <input type="text" name="greeting" class="form-control" style="border-radius: 8px;"
                                    required>
                            </div>
                            

                            <!-- Description -->
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label  style="font-weight: bold;">Mail body</label>
                                <textarea name="body" class="form-control" rows="5" style="border-radius: 8px;" required></textarea>
                            </div>
                            <div class="form-group" style="margin-bottom: 20px;">
                              <label for="title" style="font-weight: bold;">Action text</label>
                              <input type="text" name="action_text" class="form-control" style="border-radius: 8px;"
                                  required>
                          </div>

                            <!-- Price -->
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label  style="font-weight: bold;">Action Url</label>
                                <input type="text" name="action_url" class="form-control" style="border-radius: 8px;"
                                    required>
                            </div>

                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="wifi" style="font-weight: bold;">End line</label>
                                <input name="endline" class="form-control" style="border-radius: 8px;" required>
                            </div>
                            <div style="text-align: center;">
                                <input type="submit" value="Send mail" class="btn btn-primary"
                                    style="padding: 10px 20px; border-radius: 8px;">
                            </div>
                        </div>
                    </form>

                </div>
