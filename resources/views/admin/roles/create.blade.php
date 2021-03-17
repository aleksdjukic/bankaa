@extends('layouts.admin', ['dodavanjeNovosti' => true])


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

            <div class="add-news-admin">
                <h1>DODAVANJE KORISNIKA</h1>
                <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label class="main-label">Ime</label>
                    <input class="main-input" type="text" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <p class="invalid-feedback errorcode">{{ $errors->first('name') }}</p>
                    @endif


                    <label class="main-label">Email</label>
                    <input class="main-input" type="email" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <p class="invalid-feedback errorcode">{{ $errors->first('email') }}</p>
                    @endif


                    <label class="main-label">Password</label>
                    <input id="password" type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                           required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif


                    <label for="password-confirm">CONFIRM PASSWORD</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">


                    <label class="main-label">Role</label>
                    <select class="main-input" name="role">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>


                    <button class="button-main">OBJAVI</button>
                    <a class="button-main red-button" href="{{ route('news.index') }}">ODUSTANI</a>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        CKEDITOR.replace('content_en', {
            height: 350,
            disallowedContent: 'img{width, height}[width, height]',
            filebrowserBrowseUrl: 'test/',
            toolbar: [
                ['-', 'Undo', 'Redo', '-', 'BulletedList', 'NumberedList'],

                ['Bold', 'Italic', 'Underline', '-', 'Format', 'Link', 'unlink'],
            ]
        });

        CKEDITOR.replace('content_sr', {
            height: 350,
            disallowedContent: 'img{width, height}[width, height]',
            filebrowserBrowseUrl: 'test/',
            toolbar: [
                ['-', 'Undo', 'Redo', '-', 'BulletedList', 'NumberedList'],

                ['Bold', 'Italic', 'Underline', '-', 'Format', 'Link', 'unlink'],
            ]
        });

    </script>
@endsection
