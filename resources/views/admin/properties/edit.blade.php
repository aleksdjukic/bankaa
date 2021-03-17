@extends('layouts.admin', ['izmjenaImovine' => true])
@section('title')
    ADMIN | IZMJENA IMOVINE
@endsection
@section('admin-content')
    <div class="filter-bar">
        <div class="container">
            <div class="filter-side">
                IZMJENA IMOVINE
            </div>
        </div>
    </div>
    <div class="main-body">
        <div class="container sec-background">
            <form action="{{route('properties.update', $property->slug_sr)}}" method="POST"
                  enctype="multipart/form-data">
                @csrf

                <select name="category_id">
                    @foreach($propertyCategories as $pc)
                        <option value="{{$pc->id}}"{{ $pc->id == $property->category_id ? "selected" : ""}}>{{$pc->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('category_id') }}</p>
                @endif

                <label class="main-label">TITLE [SR]</label>
                <input class="main-input" type="text" name="title_sr"
                       value="{{ old('title_sr') ? old('title_sr') : $property->title_sr }}">
                @if ($errors->has('title_sr'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('title_sr') }}</p>
                @endif

                <label class="main-label">TITLE [EN]</label>
                <input class="main-input" type="text" name="title_en"
                       value="{{ old('title_en') ? old('title_en') : $property->title_en }}">
                @if ($errors->has('title_en'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('title_en') }}</p>
                @endif

                <label class="main-label">CONTENT [SR]</label>
                <div id="editor">
                    <textarea class='textarea'
                              name="content_sr">{{ old('content_sr') ? old('content_sr') : $property->content_sr }}</textarea>
                    @if ($errors->has('content_sr'))
                        <p class="invalid-feedback errorcode">{{ $errors->first('content_sr') }}</p>
                    @endif
                </div>

                <label class="main-label">CONTENT [EN]</label>
                <div id="editor">
                    <textarea class='textarea'
                              name="content_en">{{ old('content_en') ? old('content_en') : $property->content_en }}</textarea>
                    @if ($errors->has('content_en'))
                        <p class="invalid-feedback errorcode">{{ $errors->first('content_en') }}</p>
                    @endif
                </div>

                <label class="main-label">YOUTUBE LINK</label>
                <input class="main-input" type="text" name="link"
                       value="{{ old('link') ? old('link') : $property->link }}">
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
                    <img class="choosen-img" src="{{ asset('/storage/app/public/properties-image/'.$property->image) }}" alt="">
                </div>

                <label class="main-label">GALLERY</label>
                <input class="main-input upload-file" type='file' name="gallery[]" multiple><br>
                <div class="submitDiv">
                    <a class="button-main red-button" href="{{ route('properties.index') }}">ODUSTANI</a>
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
