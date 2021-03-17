@section('title')
    NOVA BANKA | INDEX
@endsection
@extends('layouts.app')
    <nav>
        <div class="top-bar">
            <div class="fast-links">
                <a href="#">{{ __('content.stanovnistvo') }}</a>
                <a href="#">Pravna lica</a>
                <a href="#">Korporativno upravljanje</a>
                <a href="#">O nama</a>
                <a href="#">Novosti</a>
            </div>
            <div class="fast-links-second">
                <input class="search" type="text" placeholder="PRETRAGA">
                <div class="ebank">
                    E-BANK
                    <img src="img/forward_arrow.svg" alt="next arrow">
                    <div class="ebank-dropdown">
                        <a href="#">
                            Fizička lica
                            <img src="img/icon-arrow.svg" alt="arrow">
                        </a>
                        <a href="#">
                            Pravna lica
                            <img src="img/icon-arrow.svg" alt="arrow">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu">
            <a href="#">
                <img src="img/nova-banka-logo.svg" alt="nova banka">
            </a>
            <ul class="main-menu">
                @include('menu')
                {{--                <a href="#">RAČUNI I USLUGE</a>--}}
                {{--                <a href="#">KREDITI</a>--}}
                {{--                <a href="#">KARTICE</a>--}}
                {{--                <a href="#">ŠTEDNJA</a>--}}
                {{--                <a href="#">TRGOVANJE HOV</a>--}}
                {{--                <a href="#">PRODAJA IMOVINE</a>--}}
                {{--                <a href="#">KONTAKT</a>--}}
            </ul>
        </div>
    </nav>

    <div class="sticky-menu">
        <a href="{{ route('exchange', app()->getLocale()) }}">
            <img src="img/currency.svg" alt="kursna lista">
            KURSNA LISTA
        </a>
        <a href="#">
            <img src="img/icon-pin.svg" alt="kursna lista">
            POSLOVNICE I BANKOMATI
        </a>
        <a href="#">
            <img src="img/icon-question.svg" alt="kursna lista">
            F.A.Q
        </a>
        <a href="#">
            <img src="img/icon-contact.svg" alt="kursna lista">
            CHAT
        </a>
        <a href="#">
            <img src="img/icon-phone.svg" alt="kursna lista">
            KONTAKT
        </a>
    </div>

    <header>
        <div class="header-slider">
            <img src="img/header-slider-1.jpg" alt="Nova Banka slider"/>
            <img src="img/header-slider-2.jpg" alt="Nova Banka slider"/>
            <img src="img/header-slider-3.jpg" alt="Nova Banka slider"/>
            <img src="img/header-slider-4.jpg" alt="Nova Banka slider"/>
        </div>

        <div class="header-slider-text">
            <div class="container">
                <h1>ZA <span>NOVE KORAKE</span> VAŠEG BIZNISA</h1>
                <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h5>
                <div class="buttons">
                    <a href="#">PROČITAJ VIŠE</a>
                    <a class="js-video-button" data-video-id='4b6sfv2VF74'>PUSTI VIDEO</a>
                </div>
            </div>

            <div class="container">
                <h1>NOVI OBLIK BANKARSTVA <span>SMART NOVA</span></h1>
                <h5>Lorem Ipsum is simply dummy text of the printing and typesetting </h5>
                <div class="buttons">
                    <a href="#">PROČITAJ VIŠE</a>
                    <a class="js-video-button" data-video-id='4b6sfv2VF74'>PUSTI VIDEO</a>
                </div>
            </div>

            <div class="container">
                <h1>IZABERITE BAŠ ONO ŠTO<span>VI ŽELITE</span></h1>
                <h5>Lorem Ipsum is simply dummy text of the printing and </h5>
                <div class="buttons">
                    <a href="#">PROČITAJ VIŠE</a>
                    <a class="js-video-button" data-video-id='4b6sfv2VF74'>PUSTI VIDEO</a>
                </div>
            </div>

            <div class="container">
                <h1><span>SUPER NOVA PLUS,</span> RAČUN ZA SVE</h1>
                <h5>Lorem Ipsum is simply dummy text of the printing</h5>
                <div class="buttons">
                    <a href="#">PROČITAJ VIŠE</a>
                    <a class="js-video-button" data-video-id='4b6sfv2VF74'>PUSTI VIDEO</a>
                </div>
            </div>
        </div>

    </header>

    <section id="integration">
        <div class="container">
            <div class="convertor">
                <div class="name-of-box">
                    <h3>KONVERTOR VALUTA</h3>
                    <p>za 01/01/2020</p>
                </div>
            </div>
            <div class="status">
                <div class="name-of-box">
                    <h3>Provera statusa računa</h3>
                    <a href="#">Kako proveriti status?</a>
                </div>
                <form action="#">
                    <label>
                        Broj računa:
                        <input type="number">
                    </label>
                    <label>
                        JIB/JMBG:
                        <input type="number">
                    </label>
                    <label>
                        Tekst sa slike
                        <input type="text">
                    </label>
                    <div>
                        <button id="delete">OBRIŠI</button>
                        <input type="submit" value="POTVRDI">
                    </div>
                </form>
            </div>
            <div class="calculator">
                <div class="name-of-box">
                    <h3>Kreditni kalkulator</h3>
                </div>
            </div>
        </div>
    </section>

    <section id="benefits">
        <h2>POGODNOSTI BANKE</h2>
        <div class="container">
            <div class="one-box">
                <img src="img/tekuci.svg" alt="Pogodnosti banke">
                <h3>Tekući i žiro računi</h3>
                <p>Lorem ipsum dolor amet, adipiscing, sed do eiusmod tempor incididunt ut labore dolore magna
                    aliqua.</p>
            </div>
            <div class="one-box">
                <img src="img/tekuci_2.svg" alt="Pogodnosti banke">
                <h3>Tekući i žiro računi</h3>
                <p>Lorem ipsum dolor amet, adipiscing, sed do eiusmod tempor incididunt ut labore dolore magna
                    aliqua.</p>
            </div>
            <div class="one-box">
                <img src="img/tekuci_3.svg" alt="Pogodnosti banke">
                <h3>Tekući i žiro računi</h3>
                <p>Lorem ipsum dolor amet, adipiscing, sed do eiusmod tempor incididunt ut labore dolore magna
                    aliqua.</p>
            </div>
            <div class="one-box">
                <img src="img/tekuci_4.svg" alt="Pogodnosti banke">
                <h3>Tekući i žiro računi</h3>
                <p>Lorem ipsum dolor amet, adipiscing, sed do eiusmod tempor incididunt ut labore dolore magna
                    aliqua.</p>
            </div>
            <div class="one-box">
                <img src="img/tekuci_5.svg" alt="Pogodnosti banke">
                <h3>Tekući i žiro računi</h3>
                <p>Lorem ipsum dolor amet, adipiscing, sed do eiusmod tempor incididunt ut labore dolore magna
                    aliqua.</p>
            </div>
            <div class="one-box">
                <img src="img/tekuci_6.svg" alt="Pogodnosti banke">
                <h3>Tekući i žiro računi</h3>
                <p>Lorem ipsum dolor amet, adipiscing, sed do eiusmod tempor incididunt ut labore dolore magna
                    aliqua.</p>
            </div>
        </div>
    </section>

    <section id="news">
        <h2>NOVOSTI & OBAVJEŠTENJA</h2>
        <div class="container news-block">
            <a href="#">
                <img src="img/news_image_1.jpg" alt="News">
                <h3>Obavještenje o načinu poslovanja u uslovima vanrednog stanja</h3>
                <p>U uslovima vanrednog stanja, koje je proglašeno 28. marta 2020. godine, u Republici Srpskoj,
                    obavještavamo vas da je Nova banka preduzela...</p>
            </a>

            <a href="#">
                <img src="img/news_image_2.jpg" alt="News">
                <h3>Obavještenje o načinu poslovanja u uslovima vanrednog stanja</h3>
                <p>U uslovima vanrednog stanja, koje je proglašeno 28. marta 2020. godine, u Republici Srpskoj,
                    obavještavamo vas da je Nova banka preduzela...</p>
            </a>

            <a href="#">
                <img src="img/news_image_3.jpg" alt="News">
                <h3>Obavještenje o načinu poslovanja u uslovima vanrednog stanja</h3>
                <p>U uslovima vanrednog stanja, koje je proglašeno 28. marta 2020. godine, u Republici Srpskoj,
                    obavještavamo vas da je Nova banka preduzela...</p>
            </a>

            <a href="#">
                <img src="img/news_image_1.jpg" alt="News">
                <h3>Obavještenje o načinu poslovanja u uslovima vanrednog stanja</h3>
                <p>U uslovima vanrednog stanja, koje je proglašeno 28. marta 2020. godine, u Republici Srpskoj,
                    obavještavamo vas da je Nova banka preduzela...</p>
            </a>
        </div>
    </section>

    <section id="contactUs">
        <div>
            <img src="img/icon-meet.svg" alt="icon meet">
            <h3>DOGOVORITE SASTANAK</h3>
            <a href="#">Zatražite termin
                <img src="img/forward_arrow.svg" alt="forrward arrow">
            </a>
        </div>
        <div>
            <img src="img/icon-mail.svg" alt="icon meet">
            <h3>PIŠITE NAM</h3>
            <a href="mailto:office@novabanka.com">office@novabanka.com
                <img src="img/forward_arrow.svg" alt="forrward arrow">
            </a>
        </div>
        <div>
            <img src="img/icon-phone.svg" alt="icon meet">
            <h3>BESPLATNI TELEFON</h3>
            <a href="tel:080050011">0800 500 11
                <img src="img/forward_arrow.svg" alt="forrward arrow">
            </a>
        </div>
    </section>

    <section id="signUp">
        <div>
            <h2>PRIJAVA NA NEWSLETTER</h2>
            <h5>Lorem ipsum dolor amet, adipiscing, sed do eiusmod tempor incididunt ut labore dolore magna
                aliqua.</h5>
            <form action="{{ route('newsletter-store', app()->getLocale()) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="input-wrapper">
                    <input type="email" name="email" class="effect-input" required>
                    <label>Vaš email</label>
                    <span class="focus-border"><i></i></span>
                </div>
                <input type="submit" value="PRIJAVI SE">
            </form>
        </div>
    </section>

    <section id="location">
        <div>
            <img src="img/google_map.jpg" alt="google">
        </div>
        <div>
            <div>
                <h3>PRONAĐI SEBI NAJBLIŽU LOKACIJU</h3>
                <input type="text" placeholder="Pretraži adresu">
                <input type="submit" value="PRIKAŽI DETALJNIJE">
            </div>
        </div>
    </section>

    <footer>
        <section id="socialBar">
            <div>
                <h1>
                    <div>Budimo u</div>
                    <div>kontaktu<span>.</span></div>
                </h1>
                <div>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32.028" height="32.027"
                             viewBox="0 0 32.028 32.027">
                            <path id="Path_3" data-name="Path 3"
                                  d="M16.014,2.847a49.1,49.1,0,0,1,6.406.178,8.253,8.253,0,0,1,3.025.534,6.249,6.249,0,0,1,3.025,3.025A8.253,8.253,0,0,1,29,9.608c0,1.6.178,2.135.178,6.406A49.1,49.1,0,0,1,29,22.419a8.253,8.253,0,0,1-.534,3.025,6.249,6.249,0,0,1-3.025,3.025A8.253,8.253,0,0,1,22.419,29c-1.6,0-2.135.178-6.406.178A49.1,49.1,0,0,1,9.608,29a8.253,8.253,0,0,1-3.025-.534,6.249,6.249,0,0,1-3.025-3.025,8.253,8.253,0,0,1-.534-3.025c0-1.6-.178-2.135-.178-6.406a49.1,49.1,0,0,1,.178-6.406,8.253,8.253,0,0,1,.534-3.025A6.39,6.39,0,0,1,4.8,4.8,3.008,3.008,0,0,1,6.583,3.559a8.253,8.253,0,0,1,3.025-.534,49.1,49.1,0,0,1,6.406-.178m0-2.847A52.574,52.574,0,0,0,9.43.178,10.985,10.985,0,0,0,5.516.89,6.965,6.965,0,0,0,2.669,2.669,6.965,6.965,0,0,0,.89,5.516,8.107,8.107,0,0,0,.178,9.43,52.574,52.574,0,0,0,0,16.014,52.574,52.574,0,0,0,.178,22.6,10.985,10.985,0,0,0,.89,26.512a6.965,6.965,0,0,0,1.779,2.847,6.965,6.965,0,0,0,2.847,1.779,10.985,10.985,0,0,0,3.914.712,52.573,52.573,0,0,0,6.583.178A52.573,52.573,0,0,0,22.6,31.85a10.985,10.985,0,0,0,3.914-.712,7.465,7.465,0,0,0,4.626-4.626A10.985,10.985,0,0,0,31.85,22.6c0-1.779.178-2.313.178-6.583A52.573,52.573,0,0,0,31.85,9.43a10.985,10.985,0,0,0-.712-3.914,6.965,6.965,0,0,0-1.779-2.847A6.965,6.965,0,0,0,26.512.89,10.985,10.985,0,0,0,22.6.178,52.574,52.574,0,0,0,16.014,0m0,7.829a8.053,8.053,0,0,0-8.185,8.185,8.185,8.185,0,1,0,8.185-8.185m0,13.523a5.243,5.243,0,0,1-5.338-5.338,5.243,5.243,0,0,1,5.338-5.338,5.243,5.243,0,0,1,5.338,5.338,5.243,5.243,0,0,1-5.338,5.338M24.554,5.516a1.957,1.957,0,1,0,1.957,1.957,1.975,1.975,0,0,0-1.957-1.957"
                                  fill="#000d30" fill-rule="evenodd"/>
                        </svg>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32.027" height="25.978"
                             viewBox="0 0 32.027 25.978">
                            <path id="Path_848" data-name="Path 848"
                                  d="M48.142,27.978c12.1,0,18.683-9.964,18.683-18.683v-.89a14.463,14.463,0,0,0,3.2-3.381,14.77,14.77,0,0,1-3.737,1.068,6.923,6.923,0,0,0,2.847-3.559,16.32,16.32,0,0,1-4.092,1.6A6.355,6.355,0,0,0,60.241,2a6.685,6.685,0,0,0-6.583,6.583,3.469,3.469,0,0,0,.178,1.423A18.4,18.4,0,0,1,40.313,3.068a6.814,6.814,0,0,0-.89,3.381,7.069,7.069,0,0,0,2.847,5.516,6,6,0,0,1-3.025-.89h0a6.5,6.5,0,0,0,5.338,6.406,5.485,5.485,0,0,1-1.779.178,3.028,3.028,0,0,1-1.245-.178,6.741,6.741,0,0,0,6.228,4.626A13.434,13.434,0,0,1,39.6,24.953a4.926,4.926,0,0,1-1.6-.178,16.8,16.8,0,0,0,10.142,3.2"
                                  transform="translate(-38 -2)" fill="#000d30" fill-rule="evenodd"/>
                        </svg>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16.725" height="32.027"
                             viewBox="0 0 16.725 32.027">
                            <path id="Path_849" data-name="Path 849"
                                  d="M90.854,32.028V17.437h4.982l.712-5.694H90.854V8.185c0-1.6.534-2.847,2.847-2.847h3.025V.178C96.014.178,94.234,0,92.277,0c-4.27,0-7.3,2.669-7.3,7.473v4.27H80v5.694h4.982v14.59Z"
                                  transform="translate(-80)" fill="#000d30" fill-rule="evenodd"/>
                        </svg>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36.6" height="34.914" viewBox="0 0 36.6 34.914">
                            <g id="Group_7333" data-name="Group 7333" transform="translate(-69 -79.842)">
                                <path id="Path_850" data-name="Path 850"
                                      d="M70.169,86.5A3.819,3.819,0,0,1,69,83.667a3.718,3.718,0,0,1,1.246-2.913,4.737,4.737,0,0,1,3.277-1.111,4.257,4.257,0,0,1,3.028,1.111,4.339,4.339,0,0,1,1.341,2.913A3.681,3.681,0,0,1,76.627,86.5a4.6,4.6,0,0,1-3.219,1.15A4.419,4.419,0,0,1,70.169,86.5Zm7.147,28.054H69.422V90.949h7.895Zm28.284,0H97.705v-12.57a7.661,7.661,0,0,0-.881-3.89,3.177,3.177,0,0,0-2.989-1.514,3.779,3.779,0,0,0-2.663.9,5.8,5.8,0,0,0-1.437,1.974,1.986,1.986,0,0,0-.192.9v14.2H81.724V90.949h7.818v3.373a13.055,13.055,0,0,1,2.338-2.568,7.084,7.084,0,0,1,4.752-1.341,8.654,8.654,0,0,1,6.439,2.568q2.529,2.568,2.529,8.086ZM89.542,94.436v-.115a.1.1,0,0,0-.115.115Z"
                                      transform="translate(0 0.199)" fill="#000d30"/>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
        <div class="container">
            <div>
                <a href="#">
                    <img src="img/nova-banka-logo.svg" alt="Nova Banka">
                </a>
                <div class="download">
                    <a href="#">
                        <img src="img/google-play-logo-png-white-7.png" alt="Google Play">
                    </a>
                    <a href="#">
                        <img src="img/google-play-logo-png-white-17.png" alt="App Store">
                    </a>
                </div>
            </div>
            <div class="footer-links">
                <div>
                    <a href="https://goo.gl/maps/iMJYbrohVD1rzKeY9" target="_blank">Kralja Alfonsa XIII 37 a, 78 000
                        Banja Luka</a>
                    <h4>Besplatan info telefon: <a href="tel:080050011">080050011</a></h4>
                    <h4>Fax: <a href="tel:+38751217256">051/217-256</a>, <a href="tel:+38751241915">051/241-915</a></h4>
                    <a href="mailto:office@novabanka.com">office@novabanka.com</a>
                </div>
                <div>
                    <h5>Krediti</h5>
                    <a href="#">Stambeni krediti</a>
                    <a href="#">Krediti za kupovinu poslovnih prostora</a>
                    <a href="#">Auto krediti</a>
                    <a href="#">Ostali krediti</a>
                </div>
                <div>
                    <h5>Računi i usluge</h5>
                    <a href="#">Tekući račun</a>
                    <a href="#">Divizni račun</a>
                    <a href="#">Žiro račun</a>
                    <a href="#">Provjera računa</a>
                </div>
                <div>
                    <h5>Kartice</h5>
                    <a href="#">Debitne kartice</a>
                    <a href="#">Kreditne kartice</a>
                    <a href="#">Kartice za preduzetnike i pravna lica</a>
                </div>
            </div>
        </div>
        <div class="copyright">
            <h4>© Nova Banka AD Banja Luka. Sva prava zadrzana.</h4>
        </div>
    </footer>
{{--</div>--}}
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('./js/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('./js/jquery-modal-video.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('./js/app.js') }}"></script>
@endsection
{{--</body>--}}
{{--</html>--}}
