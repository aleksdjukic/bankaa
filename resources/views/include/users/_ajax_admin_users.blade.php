@php
    isset($_GET['sort']) ? $sort= $_GET['sort'] : $sort = 'najnovije';
    isset($_GET['query']) ? $query= $_GET['query'] : $query = false;
@endphp
<div class="main-body">
    <div class="container sec-background">
        <div class="head-content">
            <p>KORISNICI</p>
            <a href="{{ route('users.create') }}" class="add-list tooltip" tooltip="Dodaj">
                <img src="{{ asset('images/icons8_Plus_Math_96px.svg') }} " alt="add">
            </a>
        </div>
        <div class="main-body-list">
            <table>
                <tr>
                    <th>#</th>
                    <th>Slika</th>
                    <th>Ime i Prezime</th>
                    <th>Email</th>
                    <th>Aktivnosti</th>
                </tr>
                @foreach ($users as $sve)
                    <tr>
                        <td>{{ $br++ }}</td>
                        @if($sve->image)
                            <td>
                                <img class="index-image"
                                     src="{{ asset('storage/app/public/users-image/'.$sve->image) }}" alt="">
                            </td>
                        @else
                            <td>
                                <img class="index-image" src="{{ asset('images/default-user.png') }}" alt="">
                            </td>
                        @endif
                        <td>{{ $sve->name }}</td>
                        <td>{{ $sve->email }}</td>
                        <td>
                            <div class="edit-article tooltip" tooltip="Uredi">
                                <a href="{{ route('users.edit', $sve->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19.999" height="20.002"
                                         viewBox="0 0 19.999 20.002">
                                        <g id="icons8_Edit_Property_96px" transform="translate(-11.99 -11.983)">
                                            <path id="Path_102" data-name="Path 102"
                                                  d="M12,13.877A1.881,1.881,0,0,1,13.875,12q6.685-.032,13.375,0a1.883,1.883,0,0,1,1.871,1.859c.029,3.557,0,7.113.012,10.67-.631-.636-1.262-1.271-1.9-1.9-.007-2.278,0-4.557,0-6.835H13.9V27.223c2.909,0,5.821,0,8.73,0,.636.628,1.264,1.269,1.9,1.9-3.55,0-7.1.014-10.651-.007A1.9,1.9,0,0,1,12,27.237Q11.982,20.559,12,13.877Z"
                                                  transform="translate(0)" fill="#c5c9d5"/>
                                            <path id="Path_103" data-name="Path 103" d="M28,40h1.9v1.9H28Z"
                                                  transform="translate(-12.199 -21.347)" fill="#c5c9d5"/>
                                            <path id="Path_104" data-name="Path 104" d="M44,40h5.714v1.9H44Z"
                                                  transform="translate(-24.389 -21.347)" fill="#c5c9d5"/>
                                            <path id="Path_105" data-name="Path 105" d="M28,56h1.9v1.9H28Z"
                                                  transform="translate(-12.199 -33.538)" fill="#c5c9d5"/>
                                            <path id="Path_106" data-name="Path 106" d="M44,56h1.9v1.9H44Z"
                                                  transform="translate(-24.389 -33.538)" fill="#c5c9d5"/>
                                            <path id="Path_107" data-name="Path 107"
                                                  d="M60,59.992q.946,0,1.888,0c1.655,1.612,3.276,3.257,4.911,4.888-.631.64-1.276,1.267-1.9,1.916-1.628-1.631-3.25-3.273-4.9-4.888C60,61.268,59.994,60.63,60,59.992Z"
                                                  transform="translate(-36.577 -36.579)" fill="#c5c9d5"/>
                                            <path id="Path_108" data-name="Path 108"
                                                  d="M83.44,85.3c.636-.633,1.267-1.269,1.9-1.9.371.369.752.731,1.09,1.133v.307A19.458,19.458,0,0,1,84.887,86.4h-.331C84.168,86.052,83.809,85.674,83.44,85.3Z"
                                                  transform="translate(-54.44 -54.415)" fill="#c5c9d5"/>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                            <div class="delete-article tooltip" tooltip="Obriši">

                                <form class='forma' method="POST" id="form_{{$sve->id}}"
                                      action="{{route('users.destroy', $sve->id)}}">
                                    <button onclick="deleteModal()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17.991" height="19.998"
                                             viewBox="0 0 17.991 19.998">
                                            <g id="icons8_Remove_96px_1" transform="translate(-11.97 -7.93)">
                                                <path id="Path_109" data-name="Path 109"
                                                      d="M19.023,7.99a31.513,31.513,0,0,1,3.885,0c.394.275.712.642,1.106.914,1.977.11,3.965.007,5.947.042-.015.667-.015,1.331,0,2H11.97c.015-.667.015-1.331,0-2,1.982-.035,3.97.067,5.947-.042C18.312,8.632,18.629,8.265,19.023,7.99Z"
                                                      transform="translate(0 0)" fill="#c5c9d5"/>
                                                <path id="Path_110" data-name="Path 110"
                                                      d="M17.52,28H32.737c-.442,4.167-.966,8.329-1.418,12.5a2.837,2.837,0,0,1-.734,1.955,2.927,2.927,0,0,1-2.207.537c-2.5-.035-5.011.035-7.515-.03A2.019,2.019,0,0,1,19,40.973C18.514,36.648,17.987,32.327,17.52,28Z"
                                                      transform="translate(-4.164 -15.059)" fill="#c5c9d5"/>
                                            </g>
                                        </svg>
                                        {{--                                        <img src="{{ asset('images/slika.svg') }}">--}}
                                    </button>
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    {{ method_field('DELETE') }}
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </table>
            {{ $users->appends(['sort'=>$sort, 'query' => $query])->links('vendor/pagination/paginate-users-admin') }}
        </div>
    </div>
</div>
