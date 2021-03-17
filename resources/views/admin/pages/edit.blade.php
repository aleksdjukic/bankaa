@extends('layouts.admin', ['izmjenaStranice' => true])
@section('title')
    ADMIN | IZMJENA STRANICE
@endsection
@section('admin-content')
    <div class="add-news-admin">
        <h1>IZMJENA STRANICE</h1>
        <form action="{{route('pages.update', $page->slug_sr)}}" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="main-label">TITLE [SR]</label>
            <input class="main-input" type="text" name="title_sr"
                   value="{{ old('title_sr') ? old('title_sr') : $page->title_sr }}">
            @if ($errors->has('title_sr'))
                <p class="invalid-feedback errorcode">{{ $errors->first('title_sr') }}</p>
            @endif

            <label class="main-label">TITLE [EN]</label>
            <input class="main-input" type="text" name="title_en"
                   value="{{ old('title_en') ? old('title_en') : $page->title_en }}">
            @if ($errors->has('title_en'))
                <p class="invalid-feedback errorcode">{{ $errors->first('title_en') }}</p>
            @endif

            <label class="main-label">CONTENT [SR]</label>
            <div id="editor">
                <textarea class='textarea'
                          name="content_sr">{{ old('content_sr') ? old('content_sr') : $page->content_sr }}</textarea>
                @if ($errors->has('content_sr'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('content_sr') }}</p>
                @endif
            </div>

            <label class="main-label">CONTENT [EN]</label>
            <div id="editor">
                <textarea class='textarea'
                          name="content_en">{{ old('content_en') ? old('content_en') : $page->content_en }}</textarea>
                @if ($errors->has('content_en'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('content_en') }}</p>
                @endif
            </div>

            <label class="main-label">YOUTUBE LINK</label>
            <input class="main-input" type="text" name="link" value="{{ old('link') ? old('link') : $page->link }}">
            @if ($errors->has('link'))
                <p class="invalid-feedback errorcode">{{ $errors->first('link') }}</p>
            @endif

            <label class="main-label">COVER IMAGE</label>
            <input id="imgInp" class="main-input upload-file" type="file" name="image">
            @if ($errors->has('image'))
                <p class="invalid-feedback errorcode">{{ $errors->first('image') }}</p>
            @endif

            <div class="choosen-img-wrap editNewsPic">
                <label class="main-label choosen-img">SELECTED PICTURE</label>
                <img class="choosen-img" src="{{ asset('storage/pages-image/'.$page->image) }}" alt="">
            </div>

            <label class="main-label">GALLERY</label>
            <input class="main-input upload-file" type='file' name="gallery[]" multiple><br>

            <button class="button-main">IZMIJENI</button>
            {{ method_field('PUT') }}
            <a class="button-main red-button" href="{{ route('pages.index') }}">ODUSTANI</a>
        </form>
    </div>

    </script>
    @endsection
    @section('scripts')
    <script src = "https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js" ></script>
    <script>
        CKEDITOR.replace('content_sr');
    </script>
    <script>
        CKEDITOR.replace('content_en');
    </script>
@endsection
