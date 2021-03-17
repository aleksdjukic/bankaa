@extends('layouts.admin', ['dodavanjeStranice' => true])
@section('title')
    ADMIN | DODAVANJE STRANICE
@endsection
@section('admin-content')
    <div class="filter-bar">
        <div class="container">
            <div class="filter-side">
                DODAVANJE STRANICE {{ $layoutId }}
            </div>
        </div>
    </div>
    <div class="main-body">
        <div class="container">
            <form action="{{route('pages.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="layout_id" value="{{$layoutId}}">
                <div class="container sec-background"
                     style="display: flex; justify-content: space-between; padding: 30px;margin: 10px auto">
                    <div style="flex-basis: 48%">
                        <label class="main-label">NAZIV STRANICE [SR]</label>
                        <input class="main-input" type="text" name="title_sr" value="{{ old('title_sr') }}">
                        @if ($errors->has('title_sr'))
                            <p class="invalid-feedback errorcode">{{ $errors->first('title_sr') }}</p>
                        @endif
                    </div>
                    <div style="flex-basis: 48%">
                        <label class="main-label">NAZIV STRANICE [EN]</label>
                        <input class="main-input" type="text" name="title_en" value="{{ old('title_en') }}">
                        @if ($errors->has('title_en'))
                            <p class="invalid-feedback errorcode">{{ $errors->first('title_en') }}</p>
                        @endif
                    </div>
                </div>

                <div class="container sec-background"
                     style="display: flex; justify-content: space-between; padding: 30px;margin: 10px auto">
                    <div style="flex-basis: 48%">
                        <label class="main-label">CONTENT [SR]</label>
                        <div id="editor">
                            <textarea class='textarea' name="content_sr">{!! $template->content_sr !!}</textarea>
                            @if ($errors->has('content_sr'))
                                <p class="invalid-feedback errorcode">{{ $errors->first('content_sr') }}</p>
                            @endif
                        </div>
                    </div>
                    <div style="flex-basis: 48%">
                        <label class="main-label">NASLOVNA SLIKA</label>
                        <input id="imgInp" class="main-input upload-file" type="file" name="image">
                        @if ($errors->has('image'))
                            <p class="invalid-feedback errorcode">{{ $errors->first('image') }}</p>
                        @endif
                    </div>
                </div>

                <div class="container sec-background"
                     style="display: flex; justify-content: space-between; padding: 30px;margin: 10px auto">
                    <div style="flex-basis: 48%">
                        <label class="main-label">CONTENT [EN]</label>
                        <div id="editor">
                            <textarea class='textarea' name="content_en">{!! $template->content_en !!}</textarea>
                            @if ($errors->has('content_en'))
                                <p class="invalid-feedback errorcode">{{ $errors->first('content_en') }}</p>
                            @endif
                        </div>
                    </div>
                    <div style="flex-basis: 48%">
                        <label class="main-label choosen-img">SELECTED PICTURE</label>
                        <div class="choosen-img-wrap">
                            <img class="choosen-img" src="" alt="">
                        </div>
                    </div>
                </div>


                <div class="container sec-background"
                     style="display: flex; justify-content: space-between; padding: 30px;margin: 10px auto">
                    <div style="flex-basis: 48%">
                        <label class="main-label">LISTA [EN]</label>
                        <div id="editor">
                            <textarea class='textarea' name="text_en">{!! $template->lista_sr !!}</textarea>
                            @if ($errors->has('text_en'))
                                <p class="invalid-feedback errorcode">{{ $errors->first('text_en') }}</p>
                            @endif
                        </div>
                    </div>
                    <div style="flex-basis: 48%">
                        <label class="main-label">LISTA [SR]</label>
                        <div id="editor">
                            <textarea class='textarea' name="text_sr">{!! $template->lista_sr !!}</textarea>
                            @if ($errors->has('text_sr'))
                                <p class="invalid-feedback errorcode">{{ $errors->first('text_sr') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="container sec-background"
                     style="padding: 30px;margin: 10px auto">
                    <label class="main-label">TABELA [SR]</label>
                    <div id="editor" style="padding: 10px 0px 20px 0px">
                    <textarea class='textarea' name="description_en">{{ old('description_en') }}

                        {!! $template->tabela_sr !!}

                    </textarea>
                        @if ($errors->has('description_en'))
                            <p class="invalid-feedback errorcode">{{ $errors->first('description_en') }}</p>
                        @endif
                    </div>

                    <label class="main-label">TABELA [EN]</label>
                    <div id="editor" style="padding: 10px 0px 20px 0px">
                    <textarea class='textarea' name="description_sr">{{ old('description_sr') }}

                        {!! $template->tabela_en !!}

                    </textarea>
                        @if ($errors->has('description_sr'))
                            <p class="invalid-feedback errorcode">{{ $errors->first('description_sr') }}</p>
                        @endif
                    </div>
                </div>

                <input type="hidden" name="layout_id" value="{{$layoutId}}">
                <label class="main-label">DOCUMENTS</label>
                <input class="main-input upload-file" type='file' name="documents[]" multiple><br>
                <label class="main-label">GALLERY</label>
                <input class="main-input upload-file" type='file' name="gallery[]" multiple><br>
                <div class="submitDiv">
                    <a class="button-main red-button" href="{{ route('pages.index') }}">ODUSTANI</a>
                    <button class="button-main">OBJAVI</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content_sr', {
            extraPlugins: 'filebrowser',
            filebrowserUploadUrl: '{{ route('ckeditor', ['_token' => csrf_token()])}}',
            filebrowserUploadMethod: 'form',

            // filebrowserUploadUrl: 'upload.php'
        });
        CKEDITOR.replace('content_en', {
            extraPlugins: 'filebrowser',
            filebrowserUploadUrl: '{{ route('ckeditor', ['_token' => csrf_token()])}}',
            filebrowserUploadMethod: 'form',

            // filebrowserUploadUrl: 'upload.php'
        });
    </script>
    <script>
        CKEDITOR.replace('text_en', {
            extraPlugins: ['filebrowser'],
            filebrowserUploadUrl: '{{ route('ckeditor', ['_token' => csrf_token()])}}',
            filebrowserUploadMethod: 'form',

            // filebrowserUploadUrl: 'upload.php'
        });
        CKEDITOR.replace('text_sr', {
            extraPlugins: ['filebrowser'],
            filebrowserUploadUrl: '{{ route('ckeditor', ['_token' => csrf_token()])}}',
            filebrowserUploadMethod: 'form',

            // filebrowserUploadUrl: 'upload.php'
        });
    </script>

    <script>
        CKEDITOR.replace('description_en', {
            extraPlugins: ['filebrowser'],
            filebrowserUploadUrl: '{{ route('ckeditor', ['_token' => csrf_token()])}}',
            filebrowserUploadMethod: 'form',

            // filebrowserUploadUrl: 'upload.php'
        });
        CKEDITOR.replace('description_sr', {
            extraPlugins: ['filebrowser'],
            filebrowserUploadUrl: '{{ route('ckeditor', ['_token' => csrf_token()])}}',
            filebrowserUploadMethod: 'form',

            // filebrowserUploadUrl: 'upload.php'
        });
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
