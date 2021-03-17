@extends('layouts.admin', ['izmjenaKorisnika' => true])
@section('title')
    ADMIN | IZMJENA KORISNIKA
@endsection
@section('admin-content')
    <div class="filter-bar">
        <div class="container">
            <div class="filter-side">
                IZMJENA KORISNIKA
            </div>
            <div class="search-side">

            </div>
        </div>
    </div>
    <div class="main-body">
        <div class="container sec-background">
            <form action="{{ route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="main-label">Ime</label>
                <input class="main-input" type="text" name="name"
                       value="{{ old('name') ? old('name') : $user->name }}">
                @if ($errors->has('name'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('name') }}</p>
                @endif

                <label class="main-label">Email</label>
                <input class="main-input" type="email" name="email"
                       value="{{ old('email') ? old('email') : $user->email }}">
                @if ($errors->has('email'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('email') }}</p>
                @endif

                <label class="main-label">Password</label>
                <input id="password" type="password" value="{{ old('password') ? old('password') : $user->password }}"
                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                       required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                @endif

                {{--                    <label for="password-confirm">CONFIRM PASSWORD</label>--}}
                {{--                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">--}}

                <label class="main-label">Role</label>
                <select class="main-input" name="role">
                    @foreach($roles as $role)
                        <option
                            value="{{ $role->id }}" {{ ($role->id == $user->id) ? "selected" : $role->name }}>{{ $role->name }}</option>
                    @endforeach
                </select>

                <label class="main-label">Profilna slika</label>
                <input id="imgInp" class="main-input upload-file" type="file" name="image">
                @if ($errors->has('image'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('image') }}</p>
                @endif

                <div class="choosen-img-wrap editNewsPic">
                    <label class="main-label choosen-img">Izabrana slika</label>
                    <img class="choosen-img" src="{{ asset('storage/app/public/users-image/'.$user->image) }}" alt="">
                </div>

                <div class="submitDiv">
                    <a class="button-main red-button" href="{{ route('news.index') }}">ODUSTANI</a>
                    <button class="button-main">OBJAVI</button>
                    {{ method_field('PUT') }}
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
