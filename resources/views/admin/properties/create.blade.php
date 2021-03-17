@extends('layouts.admin', ['dodavanjeImovine' => true])
@section('title')
    ADMIN | DODAVANJE IMOVINE
@endsection
@section('admin-content')
    <div class="filter-bar">
        <div class="container">
            <div class="filter-side">
                DODAVANJE IMOVINE
            </div>
        </div>
    </div>
    <div class="main-body">
        <div class="container sec-background">
            <form action="{{route('properties.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <label class="main-label">KATEGORIJA IMOVINE</label>
                <select name="category_id">
                    @foreach($propertyCategories as $pc)
                        <option value="{{$pc->id}}">{{$pc->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('category_id') }}</p>
                @endif

                <label class="main-label">NASLOV [SR]</label>
                <input class="main-input" type="text" name="title_sr" value="{{ old('title_sr') }}">
                @if ($errors->has('title_sr'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('title_sr') }}</p>
                @endif

                <label class="main-label">NASLOV [EN]</label>
                <input class="main-input" type="text" name="title_en" value="{{ old('title_en') }}">
                @if ($errors->has('title_en'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('title_en') }}</p>
                @endif


                <label class="main-label">CONTENT [SR]</label>
                <div id="editor">
                    <textarea class='textarea' name="content_sr">{{ old('content_sr') }}</textarea>
                    @if ($errors->has('content_sr'))
                        <p class="invalid-feedback errorcode">{{ $errors->first('content_sr') }}</p>
                    @endif
                </div>

                <label class="main-label">CONTENT [EN]</label>
                <div id="editor">
                    <textarea class='textarea' name="content_en">{{ old('content_en') }}</textarea>
                    @if ($errors->has('content_en'))
                        <p class="invalid-feedback errorcode">{{ $errors->first('content_en') }}</p>
                    @endif
                </div>

                <label class="main-label">YOUTUBE LINK</label>
                <input class="main-input" type="text" name="link" value="{{ old('link') }}">
                @if ($errors->has('link'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('link') }}</p>
                @endif

                <label class="main-label">NASLOVNA SLIKA</label>
                <input id="imgInp" class="main-input upload-file" type="file" name="image">
                @if ($errors->has('image'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('image') }}</p>
                @endif

                <div class="choosen-img-wrap">
                    <img class="choosen-img" src="" alt="">
                </div>

                <label class="main-label">GALLERY</label>
                <input class="main-input upload-file" type='file' name="gallery[]" multiple><br>

                <div class="submitDiv">
                    <a class="button-main red-button" href="{{ route('news.index') }}">ODUSTANI</a>
                    <button class="button-main">OBJAVI</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
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
            $('.choosen-img-wrap').css('display', 'block');
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    </script>
@endsection
