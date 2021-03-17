@foreach($response as $answer)
    @include('stranice.parts/'.$answer->type.'blade', ['data' => $answer])
@endforeach
