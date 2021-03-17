{{--<td class="width-7">{{ $br++ }}</td>--}}
{{--<td class="width-35">{{ $sve->title_sr }}</td>--}}
{{--<td class="width-15">{{ date("d.m.Y", strtotime($sve->created_at)) }}</td>--}}
{{--<td class="width-15">--}}
{{--    <button class="btn {{ $sve->visibility == 1 ? 'deactivate' : 'activate' }}" onclick="visibility('{{ route('visibility') }}', {{ $sve->id }}, {{ $br-1 }})">{{ $sve->visibility == 1 ? 'DEACTIVATE' : 'ACTIVATE' }}</button>--}}
{{--</td>--}}
{{--<td class='akcije width-20'>--}}
{{--    <a class='tooltip' href="{{ route('news.edit', $sve->slug_sr) }}">--}}
{{--        <p class="tooltiptext">Edit</p>--}}
{{--        <img src="{{ asset('img/edit.svg') }}">--}}
{{--    </a>--}}

{{--    <form class='forma' method="POST" id="form_{{$sve->id}}" action="{{route('news.destroy', $sve->slug_sr)}}">--}}
{{--        <button  id="delete" class='obrisi tooltip' onclick="deleteModal()">--}}
{{--            <p class="tooltiptext">Delete</p>--}}
{{--            <img src="{{ asset('img/trash.svg') }}">--}}
{{--        </button>--}}
{{--        <input type="hidden" name="_token" value="{{ Session::token() }}">--}}
{{--                    {{ method_field('DELETE') }}--}}
{{--    </form>--}}

{{--</td>--}}
