<div class="listing" id="contest">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Creation</th>
            <th>Last Update</th>
            <th>Active</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($contests as $contest)
            <tr>
                <td>{{ $contest->name }}</td>
                <td>{{ $contest->description }}</td>
                <td>{{ $contest->created_at }}</td>
                <td>{{ $contest->updated_at }}</td>
                <td>{{ ($contest->is_closed) ? 'No' : 'Yes' }}</td>
                <td class="center-block">
                    <a href="{{ route('contest-show', $contest->id) }}"><span class="glyphicon glyphicon-list"></span></a>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">No contest stored yet.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>