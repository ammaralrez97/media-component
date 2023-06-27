<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('bootstrap-image-checkbox.css')}}">
    <title>Ammar Alrez</title>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>

    <meta name="csrf" content="{{csrf_token()}}">
    <meta name="mediaRoute" content='{!! json_encode([
            'upload'=>route('media.upload'),
            'get'=>route('media.get'),
            'files'=>route('media.files'),
        ]) !!}'>
<body>

<div class="container">
    <div class="row">
        <div class="offset-md-3 mt-4 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Media</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <x-media-component values="46" name="single"/>
                        <x-media-component values="[43,44,44,42,2,44]" name="multi" multi/>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<script src="{{asset('JQuery.js')}}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<script src="{{asset('media.js')}}"></script>
</body>
</html>