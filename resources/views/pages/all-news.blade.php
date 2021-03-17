<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NOVA BANKA | ALL NEWS</title>
    <link rel="stylesheet" href="{{ asset('resources/css/main.css') }}"/>
    <link rel="stylesheet" href="{{ asset('resources/css/fonts.css') }}"/>
</head>
<body>
<div id="app">
    <nav>
        <div class="top-bar">
            <div class="fast-links">
                <a href="#">Stanovnistvo</a>
                <a href="#">Pravna lica</a>
                <a href="#">Korporativno upravljanje</a>
                <a href="#">O nama</a>
                <a href="#">Novosti</a>
            </div>
            <div class="fast-links-second">
                <input class="search" type="text" placeholder="PRETRAGA">
                <div class="ebank">
                    E-BANK
                    <img src="{{ asset('img/forward_arrow.svg') }}" alt="next arrow">
                    <div class="ebank-dropdown">
                        <a href="#">
                            Fizička lica
                            <img src="{{ asset('img/icon-arrow.svg') }}" alt="arrow">
                        </a>
                        <a href="#">
                            Pravna lica
                            <img src="{{ asset('img/icon-arrow.svg') }}" alt="arrow">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu">
            <a href="#">
                <img src="{{ asset('img/nova-banka-logo.svg') }}" alt="nova banka">
            </a>
            <div class="main-menu">
                <a href="#">RAČUNI I USLUGE</a>
                <a href="#">KREDITI</a>
                <a href="#">KARTICE</a>
                <a href="#">ŠTEDNJA</a>
                <a href="#">TRGOVANJE HOV</a>
                <a href="#">PRODAJA IMOVINE</a>
                <a href="#">KONTAKT</a>
            </div>
        </div>
    </nav>

    <section id="breadcrumbs">
        <div class="container">
            <p>Naslovna > Novosti</p>
        </div>
    </section>

    <section id="allNews-header">
        <div class="container">
            <h1>NOVOSTI</h1>
        </div>
    </section>

    <section id="allNews-box">
        <div class="container">
            <div>
                <h2>Najnovije vjesti</h2>
                <div class="allnews-list">
                    <a href="#">
                        <img src="{{ asset('img/one-news.jpg') }}" alt="one news">
                        <div>
                            <p class="date">
                                <img src="{{ asset('img/icon-calendar.svg') }}" alt="date">
                                10. Jun 2020
                            </p>
                            <h5>Nova Banka sa 100 miliona KM pomaže oporavak privrede</h5>
                            <p class="textNews">Specijalni „Zlatni BAM’’ za 2004. godinu kao Banka koja je prva izvezla
                                bankarsko znanje
                                i tehnologiju u inostranstvo. Nagrada Privredne komore RS za 2005. i 2007. kao drugo po
                                uspješnosti preduzeće iz sektora finansija. Nagrada Privredne komore RS za 2006. i
                                2009.</p>
                            <button class="allnews-button">DETALJNIJE</button>
                        </div>
                    </a>

                    <a href="#">
                        <img src="{{ asset('img/one-news.jpg') }}" alt="one news">
                        <div>
                            <p class="date">
                                <img src="{{ asset('img/icon-calendar.svg') }}" alt="date">
                                10. Jun 2020
                            </p>
                            <h5>Nova Banka sa 100 miliona KM pomaže oporavak privrede</h5>
                            <p class="textNews">Specijalni „Zlatni BAM’’ za 2004. godinu kao Banka koja je prva izvezla
                                bankarsko znanje
                                i tehnologiju u inostranstvo. Nagrada Privredne komore RS za 2005. i 2007. kao drugo po
                                uspješnosti preduzeće iz sektora finansija. Nagrada Privredne komore RS za 2006. i
                                2009.</p>
                            <button class="allnews-button">DETALJNIJE</button>
                        </div>
                    </a>
                </div>
                <div class="pagination">
                    <a href="#">
                        <svg id="Forward_arrow_small" data-name="Forward arrow small" xmlns="http://www.w3.org/2000/svg"
                             width="5.929" height="9.136" viewBox="0 0 5.929 9.136">
                            <path id="Path_36" data-name="Path 36"
                                  d="M4.568,5.929,0,1.361,1.361,0,4.568,3.207,7.776,0,9.136,1.361Z"
                                  transform="translate(0 9.137) rotate(-90)" fill="#018ea9"/>
                        </svg>
                    </a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">
                        <svg id="Forward_arrow_small" data-name="Forward arrow small" xmlns="http://www.w3.org/2000/svg"
                             width="5.929" height="9.136" viewBox="0 0 5.929 9.136">
                            <path id="Path_36" data-name="Path 36"
                                  d="M4.568,5.929,0,1.361,1.361,0,4.568,3.207,7.776,0,9.136,1.361Z"
                                  transform="translate(0 9.137) rotate(-90)" fill="#018ea9"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div>
                <h3>Kategorije</h3>
                <a href="#">
                    Saopštenja za javnost
                    <img src="{{ asset('img/icon-arrow.svg') }}" alt="arrow">
                </a>
                <a href="#">
                    Obavještenja za klijente
                    <img src="{{ asset('img/icon-arrow.svg') }}" alt="arrow">
                </a>
                <a href="#">
                    COVID-19
                    <img src="{{ asset('img/icon-arrow.svg') }}" alt="arrow">
                </a>
                <a href="#">
                    Video
                    <img src="{{ asset('img/icon-arrow.svg') }}" alt="arrow">
                </a>
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
                    <img src="{{ asset('img/nova-banka-logo.svg') }}" alt="Nova Banka">
                </a>
                <div class="download">
                    <a href="#">
                        <img src="{{ asset('img/google-play-logo-png-white-7.png') }}" alt="Google Play">
                    </a>
                    <a href="#">
                        <img src="{{ asset('img/google-play-logo-png-white-17.png') }}" alt="App Store">
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
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('./js/app.js') }}"></script>
<script>
    let navHeight = $("nav").outerHeight(true);
    $('#breadcrumbs').css('margin-top', navHeight);
</script>
</body>
</html>
