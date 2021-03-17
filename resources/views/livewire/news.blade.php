
    @php
        isset($_GET['sort']) ? $sort= $_GET['sort'] : $sort = 'najnovije';
        isset($_GET['query']) ? $query= $_GET['query'] : $query = false;
    @endphp
    <div class="responsive-table">
        <table>
            <tr>
                <th># RB</th>
                <th>NASLOV</th>
                <th>DATUM OBJAVE</th>
                <th>VIDLJIVOST</th>
                <th>AKCIJE</th>
            </tr>
            @foreach ($news as $sve)
                <tr id="{{ $sve->id }}">
{{--                    <td class="width-7">{{ $br++ }}</td>--}}
                    <td class="width-35">{{ $sve->title_sr }}</td>
                    <td class="width-15">{{ date("d.m.Y", strtotime($sve->created_at)) }}</td>
                    <td class="width-15">
                    <td class="width-15">
                        <button class="btn {{ $sve->visibility == 1 ? 'deactivate' : 'activate' }}" wire:click="selectItem({{ $sve->id }})">
                            {{ $sve->visibility == 1 ? 'DEACTIVATE' : 'ACTIVATE' }}
                        </button>
                    </td>
                    <td class='akcije width-20'>
                        <a class='tooltip' href="{{ route('news.edit', $sve->slug_sr) }}">
                            <p class="tooltiptext">Edit</p>
                            <img src="{{ asset('img/edit.svg') }}">
                        </a>

{{--                        <form class='forma' method="POST" id="form_{{$sve->id}}" action="{{route('news.destroy', $sve->slug_sr)}}">--}}
{{--                            <button  id="delete" class='obrisi tooltip' onclick="deleteModal()">--}}
{{--                                <p class="tooltiptext">Delete</p>--}}
{{--                                <img src="{{ asset('img/trash.svg') }}">--}}
{{--                            </button>--}}
{{--                            <input type="hidden" name="_token" value="{{ Session::token() }}">--}}
{{--                            {{ method_field('DELETE') }}--}}
{{--                        </form>--}}

                    </td>
                </tr>
            @endforeach
        </table>
{{--        {{ $news->appends(['sort'=>$sort, 'query' => $query])->links() }}--}}
    </div>
