@extends('layouts.admin', ['dodavanjeKorisnika' => true])
@section('title')
    ADMIN | DODAVANJE KORISNIKA
@endsection
@section('admin-content')
    <div class="filter-bar">
        <div class="container">
            <div class="filter-side">
                DODAVANJE KORISNIKA
            </div>
        </div>
    </div>
    <div class="main-body">
        <div class="container sec-background">
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

                <div class="form-group row">
                    <label for="password-confirm"
                           class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required autocomplete="new-password">
                    </div>
                </div>

                {{--                    <label for="password-confirm">CONFIRM PASSWORD</label>--}}
                {{--                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">--}}

                <label class="main-label">Role</label>
                <select class="main-input" name="role">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>

                <label class="main-label">PROFILNA SLIKA</label>
                <input id="imgInp" class="main-input upload-file" type="file" name="image">
                @if ($errors->has('image'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('image') }}</p>
                @endif

                <div class="choosen-img-wrap">
                    <img class="choosen-img" src="" alt="">
                </div>

                <div class="submitDiv">
                    <a class="button-main red-button" href="{{ route('news.index') }}">ODUSTANI</a>
                    <button class="button-main">OBJAVI</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
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
