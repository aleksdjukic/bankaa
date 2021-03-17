<div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($news as $n)



                <th scope="row">1</th>
                <td>{{ $n->title  }}</td>
                <td>{{ $n->title_en  }}</td>
                <td>{{ $n->content }}</td>
            @endforeach
        </tr>
        </tbody>
    </table>
</div>
