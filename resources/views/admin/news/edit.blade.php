@extends('layouts.admin', ['izmjenaNovosti' => true])
@section('title')
    ADMIN | IZMJENA NOVOSTI
@endsection
@section('admin-content')
    <div class="filter-bar">
        <div class="container">
            <div class="filter-side">
                IZMJENA NOVOSTI
            </div>
        </div>
    </div>
    <div class="main-body">
        <div class="container sec-background">
            <form action="{{route('news.update', $news->slug_sr)}}" method="POST" enctype="multipart/form-data"
                  class="full-width">
                @csrf

                <label class="main-label">KATEGORIJA NOVOSTI</label>
                <select name="category_id">
                    @foreach($newsCategories as $nc)
                        <option value="{{$nc->id}}" {{ $nc->id == $news->category_id ? "selected" : "" }}>{{$nc->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('category_id') }}</p>
                @endif

                <label class="main-label">TITLE [SR]</label>
                <input class="main-input" type="text" name="title_sr"
                       value="{{ old('title_sr') ? old('title_sr') : $news->title_sr }}">
                @if ($errors->has('title_sr'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('title_sr') }}</p>
                @endif

                <label class="main-label">TITLE [EN]</label>
                <input class="main-input" type="text" name="title_en"
                       value="{{ old('title_en') ? old('title_en') : $news->title_en }}">
                @if ($errors->has('title_en'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('title_en') }}</p>
                @endif

                <label class="main-label">CONTENT [SR]</label>
                <div id="editor">
                        <textarea class='textarea'
                                  name="content_sr">{{ old('content_sr') ? old('content_sr') : $news->content_sr }}</textarea>
                    @if ($errors->has('content_sr'))
                        <p class="invalid-feedback errorcode">{{ $errors->first('content_sr') }}</p>
                    @endif
                </div>

                <label class="main-label">CONTENT [EN]</label>
                <div id="editor">
                        <textarea class='textarea'
                                  name="content_en">{{ old('content_en') ? old('content_en') : $news->content_en }}</textarea>
                    @if ($errors->has('content_en'))
                        <p class="invalid-feedback errorcode">{{ $errors->first('content_en') }}</p>
                    @endif
                </div>

                <label class="main-label">YOUTUBE LINK</label>
                <input class="main-input" type="text" name="link"
                       value="{{ old('link') ? old('link') : $news->link }}">
                @if ($errors->has('link'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('link') }}</p>
                @endif

                <label class="main-label"></label>
                <input id="imgInp" class="main-input upload-file" type="file" name="image">
                @if ($errors->has('image'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('image') }}</p>
                @endif

                <div class="choosen-img-wrap editNewsPic">
                    <label class="main-label choosen-img">SELECTED PICTURE</label>
                    <img class="choosen-img" src="{{ asset('storage/app/public/news-image/'.$news->image) }}" alt="">
                </div>

                <label class="main-label">GALLERY</label>
                <input class="main-input upload-file" type='file' name="gallery[]" multiple><br>
                <div class="submitDiv">
                    <a class="button-main red-button" href="{{ route('news.index') }}">ODUSTANI</a>
                    <button class="button-main">IZMIJENI</button>
                    {{ method_field('PUT') }}
                </div>
            </form>
        </div>
    </div>

    </script>
@endsection
@section('scripts')
    <script
    src = "https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js" ></script>
    <script>
        CKEDITOR.replace('content_sr');
    </script>
    <script>
        CKEDITOR.replace('content_en');
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.choosen-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
            $('.choosen-img-wrap').css('display','block');
        }

        $("#imgInp").change(function(){
            readURL(this);
        });
    </script>
@endsection
