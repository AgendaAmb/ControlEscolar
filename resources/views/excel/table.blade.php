<table>
    <thead>
        <tr>
            <th> id </th>
            <th> type </th>
            <th> archive_id </th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <th>{{$user->id}}</th>
            <th>{{$user->type}}</th>
            <th>{{$archive}}</th>
        </tr>
        @endforeach
    </tbody>
</table>