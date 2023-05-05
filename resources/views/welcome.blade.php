<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
        <link
            href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
            rel="stylesheet"
        />
    </head>
    <body>
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-md-4">
                <div class="card border border-success border-2 shadow shadow-sm" style="background-color: azure;">
                    <div class="card-body">
                        <form action="/" method="post" enctype="multipart/form-data">
                            @csrf
                
                            <div class="form-group">
                                <label for="message">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" value="{{ old('description') }}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="file">Image</label>
                                <input type="file" class="form-control-file" name="image" id="image" multiple credits="false">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

        <script>
            FilePond.registerPlugin(FilePondPluginImagePreview);

            // Get a reference to the file input element
            const inputElement = document.querySelector('input[type="file"]');
        
            // Create a FilePond instance
            const pond = FilePond.create(inputElement);

            FilePond.setOptions({
                server: {
                    process: '/upload',
                    revert: '/delete',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
            });
        </script>
    </body>
</html>
