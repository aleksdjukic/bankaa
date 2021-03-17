@extends('layouts.admin', ['dashboard' => true])
@section('title')
    ADMIN | KONTROLNA TABLA
@endsection
@section('admin-content')
    <div class="filter-bar">
        <div class="container">
            <div class="filter-side">
                USERS ACTIVITY
            </div>
        </div>
    </div>
<?php $br = 1; ?>
    <div class="main-body dashboard">
        <div class="container sec-background">
            <div class="head-content">
                <p>LISTA AKTIVNOSTI KORISNIKA</p>
            </div>
            <div class="main-body-list">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Ime korisnika</th>
                        <th>Aktivnost</th>
                        <th>Datum</th>
                    </tr>

                    @if($userActivities)
                    @foreach($userActivities as $ua)
                    <tr>
                        <td>{{ $br++ }}</td>
                        @if(!empty($ua->logs->users->name))
                            <td>{{ $ua->logs->users->name }}</td>
                        @else
                            <td></td>
                        @endif
                        <td>{{ $ua->users_activity }}</td>
                        <td>{{ $ua->created_at }}</td>

                    </tr>
                    @endforeach
                        @endif
                </table>
            </div>
            <div class="footer-content">
                <div class="pagination">
                </div>
            </div>
        </div>
        <div class="container sec-background">
            <div class="head-content">
                <p>LISTA LOGOVANJA KORISNIKA</p>
            </div>
            <?php $no = 1; ?>
            <div class="main-body-list">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Ime korisnika</th>
{{--                        <th>Pretrazivac</th>--}}
                        <th>Login</th>
                        <th>Logout</th>
                        <th>IP adresa</th>
                    </tr>
                    @foreach($admins as $admin)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $admin->users->name }}</td>
{{--                            <td>{{ \Illuminate\Support\Str::limit($admin->user_agent, 10) }}</td>--}}
                            <td>{{ $admin->login_at }}</td>
                            <td>{{ $admin->logout_at }}</td>
                            <td>{{ $admin->ip_address }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="footer-content">
                <div class="pagination">
                </div>
            </div>
        </div>
    </div>
@endsection
