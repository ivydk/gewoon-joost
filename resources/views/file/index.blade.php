@extends("layouts.master")
@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered"> Upload</h1>

            <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ route('upload.store') }}" >
                @csrf

                <div class="row has-text-centered">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="file" name="file" placeholder="Choose file" id="file">
                            @error('file')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </section>
@endsection
