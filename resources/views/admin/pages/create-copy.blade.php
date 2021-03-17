@extends('layouts.admin', ['dodavanjeStranice' => true])


@section('admin-content')
    <div class="filter-bar">
        <div class="container">
            <div class="filter-side">
                <select name="cars" id="cars">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                </select>
                <select name="cars" id="cars-sec">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                </select>
            </div>
            <div class="search-side">
                <input type="text" placeholder="Pretraga" class="def-background">
            </div>
        </div>
    </div>
    <div class="main-body">
        <div class="container sec-background">
            <h1>DODAVANJE STRANICA</h1>
            <form action="{{route('pages.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="main-label">NAZIV STRANICE [SR]</label>
                <input class="main-input" type="text" name="title_sr" value="{{ old('title_sr') }}">
                @if ($errors->has('title_sr'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('title_sr') }}</p>
                @endif

                <label class="main-label">NAZIV STRANICE [EN]</label>
                <input class="main-input" type="text" name="title_en" value="{{ old('title_en') }}">
                @if ($errors->has('title_en'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('title_en') }}</p>
                @endif


                <label class="main-label">CONTENT [SR]</label>
                <div id="editor" style="width: 50%">
                    <textarea class='textarea' name="content_sr">{{ old('content_sr') }}</textarea>
                    @if ($errors->has('content_sr'))
                        <p class="invalid-feedback errorcode">{{ $errors->first('content_sr') }}</p>
                    @endif
                </div>

                <label class="main-label">NASLOVNA SLIKA</label>
                <input id="imgInp" class="main-input upload-file" type="file" name="image">
                @if ($errors->has('image'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('image') }}</p>
                @endif

                <label class="main-label">CONTENT [EN]</label>
                <div id="editor" style="width: 50%">
                    <textarea class='textarea' name="content_en">{{ old('content_en') }}</textarea>
                    @if ($errors->has('content_en'))
                        <p class="invalid-feedback errorcode">{{ $errors->first('content_en') }}</p>
                    @endif
                </div>

                <div class="choosen-img-wrap">
                    <label class="main-label choosen-img">SELECTED PICTURE</label>
                    <img class="choosen-img" src="" alt="">
                </div>

                <label class="main-label">LISTA [SR]</label>
                <div id="editor" style="width: 50%;">
                    <textarea class='textarea' name="lista_sr">{{ old('lista_sr') }}

                    {!! $template->lista_sr !!}

                    </textarea>
                    @if ($errors->has('lista_sr'))
                        <p class="invalid-feedback errorcode">{{ $errors->first('lista_sr') }}</p>
                    @endif
                </div>

                <label class="main-label">LISTA [EN]</label>
                <div id="editor" style="width: 50%;">
                    <textarea class='textarea' name="lista_en">{{ old('lista_en') }}

                        {!! $template->lista_en !!}

                    </textarea>
                    @if ($errors->has('lista_en'))
                        <p class="invalid-feedback errorcode">{{ $errors->first('lista_en') }}</p>
                    @endif
                </div>

                <label class="main-label">TABELA [SR]</label>
                <div id="editor">
                    <textarea class='textarea' name="tabela_sr">{{ old('tabela_sr') }}

                        {!! $template->tabela_sr !!}

                    </textarea>
                    @if ($errors->has('tabela_sr'))
                        <p class="invalid-feedback errorcode">{{ $errors->first('tabela_sr') }}</p>
                    @endif
                </div>

                <label class="main-label">TABELA [EN]</label>
                <div id="editor">
                    <textarea class='textarea' name="tabela_en">{{ old('tabela_en') }}

                        {!! $template->tabela_en !!}

                    </textarea>
                    @if ($errors->has('tabela_en'))
                        <p class="invalid-feedback errorcode">{{ $errors->first('tabela_en') }}</p>
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

                <input  type="hidden" name="layout_id" value="{{$layoutId}}">

                <div class="choosen-img-wrap">
                    <label class="main-label choosen-img">SELECTED PICTURE</label>
                    <img class="choosen-img" src="" alt="">
                </div>

                <label class="main-label">GALLERY</label>
                <input class="main-input upload-file" type='file' name="gallery[]" multiple><br>

                <label class="main-label">DOCUMENTS</label>
                <input class="main-input upload-file" type='file' name="documents[]" multiple><br>

                <button class="button-main">OBJAVI</button>

                <a class="button-main red-button" href="{{ route('pages.index') }}">ODUSTANI</a>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content_sr',{
            extraPlugins : 'filebrowser',
            filebrowserUploadUrl: '{{ route('ckeditor', ['_token' => csrf_token()])}}',
            filebrowserUploadMethod: 'form',

            // filebrowserUploadUrl: 'upload.php'
        });
    </script>
    <script>
        CKEDITOR.replace( 'content_en',{
            extraPlugins : ['filebrowser'],
            filebrowserUploadUrl: '{{ route('ckeditor', ['_token' => csrf_token()])}}',
            filebrowserUploadMethod: 'form',

            // filebrowserUploadUrl: 'upload.php'
        });
    </script>
    <script>
        CKEDITOR.replace( 'lista_sr',{
            extraPlugins : 'filebrowser',
            filebrowserUploadUrl: '{{ route('ckeditor', ['_token' => csrf_token()])}}',
            filebrowserUploadMethod: 'form',

            // filebrowserUploadUrl: 'upload.php'
        });
    </script>
    <script>
        CKEDITOR.replace( 'lista_en',{
            extraPlugins : 'filebrowser',
            filebrowserUploadUrl: '{{ route('ckeditor', ['_token' => csrf_token()])}}',
            filebrowserUploadMethod: 'form',

            // filebrowserUploadUrl: 'upload.php'
        });
    </script>

    <script>
        CKEDITOR.replace( 'tabela_sr',{
            extraPlugins : 'filebrowser',
            filebrowserUploadUrl: '{{ route('ckeditor', ['_token' => csrf_token()])}}',
            filebrowserUploadMethod: 'form',

            // filebrowserUploadUrl: 'upload.php'
        });
    </script>
    <script>
        CKEDITOR.replace( 'tabela_en',{
            extraPlugins : 'filebrowser',
            filebrowserUploadUrl: '{{ route('ckeditor', ['_token' => csrf_token()])}}',
            filebrowserUploadMethod: 'form',

            // filebrowserUploadUrl: 'upload.php'
        });
    </script>
@endsection

{{--@extends('layouts.admin', ['dodavanjeStranice' => true])--}}


{{--@section('admin-content')--}}
{{--    <div class="filter-bar">--}}
{{--        <div class="container">--}}
{{--            <div class="filter-side">--}}
{{--                <select name="cars" id="cars">--}}
{{--                    <option value="volvo">Volvo</option>--}}
{{--                    <option value="saab">Saab</option>--}}
{{--                    <option value="mercedes">Mercedes</option>--}}
{{--                </select>--}}
{{--                <select name="cars" id="cars-sec">--}}
{{--                    <option value="volvo">Volvo</option>--}}
{{--                    <option value="saab">Saab</option>--}}
{{--                    <option value="mercedes">Mercedes</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="search-side">--}}
{{--                <input type="text" placeholder="Pretraga" class="def-background">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="main-body">--}}
{{--        <div class="container sec-background">--}}
{{--            <h1>DODAVANJE STRANICA</h1>--}}
{{--            <form action="{{route('pages.store')}}" method="POST" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <label class="main-label">NASLOV [SR]</label>--}}
{{--                <input class="main-input" type="text" name="title_sr" value="{{ old('title_sr') }}">--}}
{{--                @if ($errors->has('title_sr'))--}}
{{--                    <p class="invalid-feedback errorcode">{{ $errors->first('title_sr') }}</p>--}}
{{--                @endif--}}

{{--                <label class="main-label">NASLOV [EN]</label>--}}
{{--                <input class="main-input" type="text" name="title_en" value="{{ old('title_en') }}">--}}
{{--                @if ($errors->has('title_en'))--}}
{{--                    <p class="invalid-feedback errorcode">{{ $errors->first('title_en') }}</p>--}}
{{--                @endif--}}



{{--                                <label class="main-label">LISTA [SR]</label>--}}
{{--                                <div id="editor" style="width: 50%;">--}}
{{--                                    <textarea class='textarea' name="lista_sr" id="lista_srpski">--}}

{{--                                    {{ $template->lista_sr }}--}}

{{--                                    </textarea>--}}
{{--                                    @if ($errors->has('lista_sr'))--}}
{{--                                        <p class="invalid-feedback errorcode">{{ $errors->first('lista_sr') }}</p>--}}
{{--                                    @endif--}}
{{--                                </div>--}}




{{--                <label class="main-label">CONTENT [SR]</label>--}}
{{--                <div id="editor">--}}
{{--                    <textarea class='textarea' name="content_sr">{{ old('content_sr') }}</textarea>--}}
{{--                    @if ($errors->has('content_sr'))--}}
{{--                        <p class="invalid-feedback errorcode">{{ $errors->first('content_sr') }}</p>--}}
{{--                    @endif--}}
{{--                </div>--}}

{{--                <label class="main-label">CONTENT [EN]</label>--}}
{{--                <div id="editor">--}}
{{--                    <textarea class='textarea' name="content_en">{{ old('content_en') }}</textarea>--}}
{{--                    @if ($errors->has('content_en'))--}}
{{--                        <p class="invalid-feedback errorcode">{{ $errors->first('content_en') }}</p>--}}
{{--                    @endif--}}
{{--                </div>--}}

{{--                <label class="main-label">YOUTUBE LINK</label>--}}
{{--                <input class="main-input" type="text" name="link" value="{{ old('link') }}">--}}
{{--                @if ($errors->has('link'))--}}
{{--                    <p class="invalid-feedback errorcode">{{ $errors->first('link') }}</p>--}}
{{--                @endif--}}

{{--                <label class="main-label">NASLOVNA SLIKA</label>--}}
{{--                <input id="imgInp" class="main-input upload-file" type="file" name="image">--}}
{{--                @if ($errors->has('image'))--}}
{{--                    <p class="invalid-feedback errorcode">{{ $errors->first('image') }}</p>--}}
{{--                @endif--}}

{{--                <input  type="hidden" name="layout_id" value="{{$layoutId}}">--}}

{{--                <div class="choosen-img-wrap">--}}
{{--                    <label class="main-label choosen-img">SELECTED PICTURE</label>--}}
{{--                    <img  class="choosen-img" src="" alt="">--}}
{{--                </div>--}}

{{--                <label class="main-label">GALLERY</label>--}}
{{--                <input class="main-input upload-file" type='file' name="gallery[]" multiple><br>--}}

{{--                <button class="button-main">OBJAVI</button>--}}

{{--                <a class="button-main red-button" href="{{ route('pages.index') }}">ODUSTANI</a>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

{{--@section('scripts')--}}

{{--    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>--}}

{{--    <script>--}}
{{--        ClassicEditor.create(document.getElementById('lista_srpski'));--}}
{{--    </script>--}}

{{--    <script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>--}}
{{--    <script>--}}
{{--        CKEDITOR.replace( 'content_sr',{--}}
{{--            extraPlugins : 'filebrowser',--}}
{{--            filebrowserUploadUrl: '{{ route('ckeditor', ['_token' => csrf_token()])}}',--}}
{{--            filebrowserUploadMethod: 'form',--}}

{{--            // filebrowserUploadUrl: 'upload.php'--}}
{{--        });--}}
{{--    </script>--}}
{{--        <script>--}}
{{--            CKEDITOR.replace( 'lista_sr',{--}}
{{--                extraPlugins : 'filebrowser',--}}
{{--                filebrowserUploadUrl: '{{ route('ckeditor', ['_token' => csrf_token()])}}',--}}
{{--                filebrowserUploadMethod: 'form',--}}

{{--                // filebrowserUploadUrl: 'upload.php'--}}
{{--            });--}}

{{--        </script>--}}
{{--    <script>--}}
{{--        CKEDITOR.replace( 'content_en' );--}}
{{--    </script>--}}
{{--@endsection--}}

