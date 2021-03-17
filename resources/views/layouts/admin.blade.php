<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }} "/>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }} ">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;700&display=swap"
          rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    @stack('styles')
</head>
<body>

@include('errors.session')

<div id="app">
    <div id="deleteModal" class='deletemodal'>
        <div class='deleteq'>
            <div class='deleteqwrapper'>
                <p>Do you want to delete ?</p>
                <div class='buttondane'>
                    <button class='da'>YES</button>
                    <button class='ne'>NO</button>
                </div>
            </div>
        </div>
    </div>
    <header class="sec-background">
        <div>
            <a href="{{ route("dashboard") }}">
                <img src="{{ asset('images/client-logo.png') }}" alt="client logo">
            </a>
        </div>

        <div>
            <div class="active-list">
                <img src="{{ asset('images/profile_icon.svg') }}" alt="active list icon">
                <h2>
                    {{ (isset($sveNovosti)) ? "NOVOSTI" : "" }}
                    {{ (isset($dodavanjeNovosti)) ? "NOVOSTI" : "" }}
                    {{ (isset($izmjenaNovosti)) ? "NOVOSTI" : "" }}

                    {{ (isset($kategorijeNovosti)) ? "KATEGORIJA NOVOSTI" : "" }}
                    {{ (isset($izmjenaKategorijeNovosti)) ? "KATEGORIJA NOVOSTI" : "" }}
                    {{ (isset($dodavanjeKategorijeNovosti)) ? "KATEGORIJA NOVOSTI" : "" }}

                    {{ (isset($imovina)) ? "KATEGORIJA IMOVINE" : "" }}
                    {{ (isset($izmjenaKategorijeImovine)) ? "KATEGORIJA IMOVINE" : "" }}
                    {{ (isset($dodavanjeKategorijeImovine)) ? "KATEGORIJA IMOVINE" : "" }}

                    {{ (isset($kategorijeImovine)) ? "IMOVINA" : "" }}
                    {{ (isset($dodavanjeImovine)) ? "IMOVINA" : "" }}
                    {{ (isset($izmjenaImovine)) ? "IMOVINA" : "" }}

                    {{ (isset($korisnik)) ? "KORISNICI" : "" }}
                    {{ (isset($dodavanjeKorisnika)) ? "KORISNICI" : "" }}
                    {{ (isset($izmjenaKorisnika)) ? "KORISNICI" : "" }}

                    {{ (isset($sveStranice)) ? "STRANICE" : "" }}
                    {{ (isset($dodavanjeStranice)) ? "STRANICE" : "" }}
                    {{ (isset($izmjenaStranice)) ? "STRANICE" : "" }}

                    {{ (isset($menu)) ? "MENU" : "" }}

                    {{ (isset($newsletters)) ? "NEWSLETTERS" : "" }}

                    {{ (isset($dashboard)) ? "DASHBOARD" : "" }}
                </h2>
            </div>
        </div>
        <div>
            <img id="logout" src="{{ asset('images/client-picture.png') }} " alt="client picture">
            <div class="logout sec-background">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
{{--                <a href="{{ route('logout') }}">Odjavi se</a>--}}
                <a href="{{ route('home', 'en') }}">Natrag na sajt</a>



            </div>
        </div>
    </header>
    <section>
        <div class="sidebar sec-background">
            <p>MENI</p>
            <div class="menu-list">
                <a href="{{ route('dashboard') }}" class="{{ (isset($dashboard)) ? "active" : "" }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24.631" height="24.002" viewBox="0 0 24.631 24.002">
                        <g id="icons8_Chart_96px" transform="translate(-9.021 -7.5)">
                            <path id="Path_163" data-name="Path 163"
                                  d="M26.877,7.5a12.375,12.375,0,0,1,6.774,7.209c-.643.211-1.286.429-1.923.652A11.773,11.773,0,1,1,9.271,17.32a11.776,11.776,0,0,1,7.191-8.543,11.915,11.915,0,0,1,9.772.5c.217-.592.429-1.183.643-1.778M15.62,11.21a10.066,10.066,0,0,0-4.767,7.608q4.515.009,9.029,0c0-3.013.006-6.023-.006-9.032A10.678,10.678,0,0,0,15.62,11.21m6.086-1.422c-.027,3.185-.006,6.373-.009,9.558q3.369,3.383,6.75,6.753a10.031,10.031,0,0,0,1.564-10.116c-2.361.851-4.743,1.648-7.094,2.527C23.8,16,24.722,13.5,25.615,11a11.185,11.185,0,0,0-3.909-1.208m6.158.308c-.658,1.793-1.286,3.6-1.953,5.395,1.76-.613,3.523-1.2,5.271-1.841A10.089,10.089,0,0,0,27.864,10.1M10.853,20.635a9.98,9.98,0,0,0,16.323,6.732c-2.252-2.24-4.489-4.492-6.738-6.735Q15.647,20.632,10.853,20.635Z"
                                  fill="#c5c9d5"/>
                        </g>
                    </svg>
                    <p>DASHBOARD</p>
                </a>
                <a href="{{ route('users.index') }}"
                   class="{{ ((isset($korisnik)) || (isset($dodavanjeKorisnika)) || (isset($izmjenaKorisnika))) ? "active" : "" }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24.631" height="24.002" viewBox="0 0 24.631 24.002">
                        <g id="icons8_Chart_96px" transform="translate(-9.021 -7.5)">
                            <path id="Path_163" data-name="Path 163"
                                  d="M26.877,7.5a12.375,12.375,0,0,1,6.774,7.209c-.643.211-1.286.429-1.923.652A11.773,11.773,0,1,1,9.271,17.32a11.776,11.776,0,0,1,7.191-8.543,11.915,11.915,0,0,1,9.772.5c.217-.592.429-1.183.643-1.778M15.62,11.21a10.066,10.066,0,0,0-4.767,7.608q4.515.009,9.029,0c0-3.013.006-6.023-.006-9.032A10.678,10.678,0,0,0,15.62,11.21m6.086-1.422c-.027,3.185-.006,6.373-.009,9.558q3.369,3.383,6.75,6.753a10.031,10.031,0,0,0,1.564-10.116c-2.361.851-4.743,1.648-7.094,2.527C23.8,16,24.722,13.5,25.615,11a11.185,11.185,0,0,0-3.909-1.208m6.158.308c-.658,1.793-1.286,3.6-1.953,5.395,1.76-.613,3.523-1.2,5.271-1.841A10.089,10.089,0,0,0,27.864,10.1M10.853,20.635a9.98,9.98,0,0,0,16.323,6.732c-2.252-2.24-4.489-4.492-6.738-6.735Q15.647,20.632,10.853,20.635Z"
                                  fill="#c5c9d5"/>
                        </g>
                    </svg>
                    <p>KORISNICI</p>
                </a>
                <div tabindex="0"
                    class="dropdown-link {{ ((isset($sveNovosti)) || (isset($dodavanjeNovosti)) || (isset($dodavanjeNovosti)) || (isset($kategorijeNovosti)) || (isset($izmjenaKategorijeNovosti)) || (isset($dodavanjeKategorijeNovosti))) ? "active" : "" }}">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24.631" height="24.002"
                             viewBox="0 0 24.631 24.002">
                            <g id="icons8_Chart_96px" transform="translate(-9.021 -7.5)">
                                <path id="Path_163" data-name="Path 163"
                                      d="M26.877,7.5a12.375,12.375,0,0,1,6.774,7.209c-.643.211-1.286.429-1.923.652A11.773,11.773,0,1,1,9.271,17.32a11.776,11.776,0,0,1,7.191-8.543,11.915,11.915,0,0,1,9.772.5c.217-.592.429-1.183.643-1.778M15.62,11.21a10.066,10.066,0,0,0-4.767,7.608q4.515.009,9.029,0c0-3.013.006-6.023-.006-9.032A10.678,10.678,0,0,0,15.62,11.21m6.086-1.422c-.027,3.185-.006,6.373-.009,9.558q3.369,3.383,6.75,6.753a10.031,10.031,0,0,0,1.564-10.116c-2.361.851-4.743,1.648-7.094,2.527C23.8,16,24.722,13.5,25.615,11a11.185,11.185,0,0,0-3.909-1.208m6.158.308c-.658,1.793-1.286,3.6-1.953,5.395,1.76-.613,3.523-1.2,5.271-1.841A10.089,10.089,0,0,0,27.864,10.1M10.853,20.635a9.98,9.98,0,0,0,16.323,6.732c-2.252-2.24-4.489-4.492-6.738-6.735Q15.647,20.632,10.853,20.635Z"
                                      fill="#c5c9d5"/>
                            </g>
                        </svg>
                        <p>NOVOSTI</p>
                        <svg id="arrowDrop" xmlns="http://www.w3.org/2000/svg" width="9" height="5.593"
                             viewBox="0 0 9 5.593">
                            <g id="icons8_Expand_Arrow_96px" transform="translate(-30.71 -38.05)">
                                <path id="Path_116" data-name="Path 116"
                                      d="M23.71,39.154c.365-.372.734-.743,1.112-1.1,1.139,1.112,2.255,2.251,3.387,3.372,1.136-1.119,2.249-2.26,3.39-3.372.378.361.747.732,1.112,1.1-1.5,1.491-3,3-4.5,4.489C26.706,42.15,25.214,40.646,23.71,39.154Z"
                                      transform="translate(7 0)" fill="#737689"/>
                            </g>
                        </svg>
                    </div>
                    <div class="dropdown def-background">
                        <ul>
                            <li><a href="{{ route('news.index') }}">LISTA NOVOSTI</a></li>
                            <li><a href="{{ route('category-news.index') }}">KATEGORIJE NOVOSTI</a></li>
                        </ul>
                    </div>
                </div>
                <div tabindex="0"
                    class="dropdown-link {{ ((isset($imovina)) || (isset($dodavanjeImovine)) || (isset($izmjenaImovine)) || (isset($kategorijeImovine)) || (isset($izmjenaKategorijeImovine)) || (isset($dodavanjeKategorijeImovine))) ? "active" : "" }}">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24.631" height="24.002"
                             viewBox="0 0 24.631 24.002">
                            <g id="icons8_Chart_96px" transform="translate(-9.021 -7.5)">
                                <path id="Path_163" data-name="Path 163"
                                      d="M26.877,7.5a12.375,12.375,0,0,1,6.774,7.209c-.643.211-1.286.429-1.923.652A11.773,11.773,0,1,1,9.271,17.32a11.776,11.776,0,0,1,7.191-8.543,11.915,11.915,0,0,1,9.772.5c.217-.592.429-1.183.643-1.778M15.62,11.21a10.066,10.066,0,0,0-4.767,7.608q4.515.009,9.029,0c0-3.013.006-6.023-.006-9.032A10.678,10.678,0,0,0,15.62,11.21m6.086-1.422c-.027,3.185-.006,6.373-.009,9.558q3.369,3.383,6.75,6.753a10.031,10.031,0,0,0,1.564-10.116c-2.361.851-4.743,1.648-7.094,2.527C23.8,16,24.722,13.5,25.615,11a11.185,11.185,0,0,0-3.909-1.208m6.158.308c-.658,1.793-1.286,3.6-1.953,5.395,1.76-.613,3.523-1.2,5.271-1.841A10.089,10.089,0,0,0,27.864,10.1M10.853,20.635a9.98,9.98,0,0,0,16.323,6.732c-2.252-2.24-4.489-4.492-6.738-6.735Q15.647,20.632,10.853,20.635Z"
                                      fill="#c5c9d5"/>
                            </g>
                        </svg>
                        <p>IMOVINA</p>
                        <svg id="arrowDrop" xmlns="http://www.w3.org/2000/svg" width="9" height="5.593"
                             viewBox="0 0 9 5.593">
                            <g id="icons8_Expand_Arrow_96px" transform="translate(-30.71 -38.05)">
                                <path id="Path_116" data-name="Path 116"
                                      d="M23.71,39.154c.365-.372.734-.743,1.112-1.1,1.139,1.112,2.255,2.251,3.387,3.372,1.136-1.119,2.249-2.26,3.39-3.372.378.361.747.732,1.112,1.1-1.5,1.491-3,3-4.5,4.489C26.706,42.15,25.214,40.646,23.71,39.154Z"
                                      transform="translate(7 0)" fill="#737689"/>
                            </g>
                        </svg>
                    </div>
                    <div class="dropdown def-background">
                        <ul>
                            <li><a href="{{ route('properties.index') }}">LISTA IMOVINE</a></li>
                            <li><a href="{{ route('category-properties.index') }}">KATEGORIJE IMOVINE</a></li>
                        </ul>
                    </div>
                </div>
                <a href="{{ route('pages.index') }}"
                   class="{{ ((isset($sveStranice)) || (isset($dodavanjeStranice)) || (isset($izmjenaStranice))) ? "active" : "" }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24.631" height="24.002" viewBox="0 0 24.631 24.002">
                        <g id="icons8_Chart_96px" transform="translate(-9.021 -7.5)">
                            <path id="Path_163" data-name="Path 163"
                                  d="M26.877,7.5a12.375,12.375,0,0,1,6.774,7.209c-.643.211-1.286.429-1.923.652A11.773,11.773,0,1,1,9.271,17.32a11.776,11.776,0,0,1,7.191-8.543,11.915,11.915,0,0,1,9.772.5c.217-.592.429-1.183.643-1.778M15.62,11.21a10.066,10.066,0,0,0-4.767,7.608q4.515.009,9.029,0c0-3.013.006-6.023-.006-9.032A10.678,10.678,0,0,0,15.62,11.21m6.086-1.422c-.027,3.185-.006,6.373-.009,9.558q3.369,3.383,6.75,6.753a10.031,10.031,0,0,0,1.564-10.116c-2.361.851-4.743,1.648-7.094,2.527C23.8,16,24.722,13.5,25.615,11a11.185,11.185,0,0,0-3.909-1.208m6.158.308c-.658,1.793-1.286,3.6-1.953,5.395,1.76-.613,3.523-1.2,5.271-1.841A10.089,10.089,0,0,0,27.864,10.1M10.853,20.635a9.98,9.98,0,0,0,16.323,6.732c-2.252-2.24-4.489-4.492-6.738-6.735Q15.647,20.632,10.853,20.635Z"
                                  fill="#c5c9d5"/>
                        </g>
                    </svg>
                    <p>STRANICE</p>
                </a>

                <a href="{{ route('stranice.index') }}"
                   class="{{ ((isset($sveStranice)) || (isset($dodavanjeStranice)) || (isset($izmjenaStranice))) ? "active" : "" }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24.631" height="24.002" viewBox="0 0 24.631 24.002">
                        <g id="icons8_Chart_96px" transform="translate(-9.021 -7.5)">
                            <path id="Path_163" data-name="Path 163"
                                  d="M26.877,7.5a12.375,12.375,0,0,1,6.774,7.209c-.643.211-1.286.429-1.923.652A11.773,11.773,0,1,1,9.271,17.32a11.776,11.776,0,0,1,7.191-8.543,11.915,11.915,0,0,1,9.772.5c.217-.592.429-1.183.643-1.778M15.62,11.21a10.066,10.066,0,0,0-4.767,7.608q4.515.009,9.029,0c0-3.013.006-6.023-.006-9.032A10.678,10.678,0,0,0,15.62,11.21m6.086-1.422c-.027,3.185-.006,6.373-.009,9.558q3.369,3.383,6.75,6.753a10.031,10.031,0,0,0,1.564-10.116c-2.361.851-4.743,1.648-7.094,2.527C23.8,16,24.722,13.5,25.615,11a11.185,11.185,0,0,0-3.909-1.208m6.158.308c-.658,1.793-1.286,3.6-1.953,5.395,1.76-.613,3.523-1.2,5.271-1.841A10.089,10.089,0,0,0,27.864,10.1M10.853,20.635a9.98,9.98,0,0,0,16.323,6.732c-2.252-2.24-4.489-4.492-6.738-6.735Q15.647,20.632,10.853,20.635Z"
                                  fill="#c5c9d5"/>
                        </g>
                    </svg>
                    <p>stranice</p>
                </a>

                <a href="{{env('APP_URL')}}/admin/menu?menu=1" class="{{ (isset($menu))? "active" : "" }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24.631" height="24.002" viewBox="0 0 24.631 24.002">
                        <g id="icons8_Chart_96px" transform="translate(-9.021 -7.5)">
                            <path id="Path_163" data-name="Path 163"
                                  d="M26.877,7.5a12.375,12.375,0,0,1,6.774,7.209c-.643.211-1.286.429-1.923.652A11.773,11.773,0,1,1,9.271,17.32a11.776,11.776,0,0,1,7.191-8.543,11.915,11.915,0,0,1,9.772.5c.217-.592.429-1.183.643-1.778M15.62,11.21a10.066,10.066,0,0,0-4.767,7.608q4.515.009,9.029,0c0-3.013.006-6.023-.006-9.032A10.678,10.678,0,0,0,15.62,11.21m6.086-1.422c-.027,3.185-.006,6.373-.009,9.558q3.369,3.383,6.75,6.753a10.031,10.031,0,0,0,1.564-10.116c-2.361.851-4.743,1.648-7.094,2.527C23.8,16,24.722,13.5,25.615,11a11.185,11.185,0,0,0-3.909-1.208m6.158.308c-.658,1.793-1.286,3.6-1.953,5.395,1.76-.613,3.523-1.2,5.271-1.841A10.089,10.089,0,0,0,27.864,10.1M10.853,20.635a9.98,9.98,0,0,0,16.323,6.732c-2.252-2.24-4.489-4.492-6.738-6.735Q15.647,20.632,10.853,20.635Z"
                                  fill="#c5c9d5"/>
                        </g>
                    </svg>
                    <p>MENI</p>
                </a>

                <a href="{{ route('newsletter') }}" class="{{ (isset($newsletters))? "active" : "" }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24.631" height="24.002" viewBox="0 0 24.631 24.002">
                        <g id="icons8_Chart_96px" transform="translate(-9.021 -7.5)">
                            <path id="Path_163" data-name="Path 163"
                                  d="M26.877,7.5a12.375,12.375,0,0,1,6.774,7.209c-.643.211-1.286.429-1.923.652A11.773,11.773,0,1,1,9.271,17.32a11.776,11.776,0,0,1,7.191-8.543,11.915,11.915,0,0,1,9.772.5c.217-.592.429-1.183.643-1.778M15.62,11.21a10.066,10.066,0,0,0-4.767,7.608q4.515.009,9.029,0c0-3.013.006-6.023-.006-9.032A10.678,10.678,0,0,0,15.62,11.21m6.086-1.422c-.027,3.185-.006,6.373-.009,9.558q3.369,3.383,6.75,6.753a10.031,10.031,0,0,0,1.564-10.116c-2.361.851-4.743,1.648-7.094,2.527C23.8,16,24.722,13.5,25.615,11a11.185,11.185,0,0,0-3.909-1.208m6.158.308c-.658,1.793-1.286,3.6-1.953,5.395,1.76-.613,3.523-1.2,5.271-1.841A10.089,10.089,0,0,0,27.864,10.1M10.853,20.635a9.98,9.98,0,0,0,16.323,6.732c-2.252-2.24-4.489-4.492-6.738-6.735Q15.647,20.632,10.853,20.635Z"
                                  fill="#c5c9d5"/>
                        </g>
                    </svg>
                    <p>NEWSLETTERS</p>
                </a>
            </div>
            <div class="minimize-menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="18.866" viewBox="0 0 24 18.866">
                    <g id="hide" transform="translate(30.24 31.306) rotate(180)">
                        <path id="Path_29" data-name="Path 29"
                              d="M8.744,12.467c5.995-.052,11.992,0,17.986-.027a3.72,3.72,0,0,1,2.556.6,2.716,2.716,0,0,1,.949,2.284q0,6.6,0,13.193a2.617,2.617,0,0,1-1.846,2.676,12.687,12.687,0,0,1-2.457.1c-5.671-.005-11.339.008-17.007-.005A2.551,2.551,0,0,1,6.259,28.8c-.03-4.588-.019-9.178-.005-13.766a2.56,2.56,0,0,1,2.49-2.567m-.337,1.8c-.5.255-.447.88-.458,1.352.036,4.382-.025,8.767.027,13.146-.049.664.683.891,1.215.836,4.73-.011,9.461,0,14.194-.005q0-7.717,0-15.428c-4.275-.005-8.55,0-12.825-.005a9.548,9.548,0,0,0-2.15.1m16.689-.1V29.6a17.353,17.353,0,0,0,2.951-.093c.51-.222.472-.823.483-1.283q-.012-6.3,0-12.6c-.008-.48.033-1.1-.474-1.355A17.5,17.5,0,0,0,25.1,14.168Z"
                              transform="translate(0 0)" fill="#c5c9d5"/>
                        <path id="Path_30" data-name="Path 30"
                              d="M43.751,31.23c1.431,1.42,2.849,2.857,4.272,4.286q-2.139,2.139-4.278,4.278C43.749,36.939,43.738,34.085,43.751,31.23Z"
                              transform="translate(-27.22 -13.637)" fill="#c5c9d5"/>
                        <path id="Path_31" data-name="Path 31"
                              d="M24.99,43.75h5.092c-.008.57-.005,1.144.005,1.714h-5.1C25,44.894,25,44.32,24.99,43.75Z"
                              transform="translate(-13.608 -22.724)" fill="#c5c9d5"/>
                    </g>
                </svg>
                <p>Sakrij meni</p>
            </div>
        </div>
        <div class="main-content def-background">
            @yield('admin-content')
            @yield('content')
        </div>
    </section>
</div>


<script>
    function deleteModal() {
        $('.deletemodal').css('display', 'flex');
        $(".deleteq").removeClass('closeModal')
        $(".deleteq").addClass('openModal')
    }

    $('.forma').submit(function (e) {
        e.preventDefault();
        t = $(this);
        $('.ne').click(function () {
            $('.deletemodal').css('display', 'none');
            $(".deleteq").addClass('closeModal')
        })
        $('.da').click(function () {
            $.when().then(function () {
                $(t).off("submit").submit()
            })
        })
    })
</script>

@stack('scripts-menu')
@yield('scripts')
@include('js/admin-ajax')
<script src="{{ asset('js/admin.js') }}"></script>
@stack('scripts')
</body>
</html>
