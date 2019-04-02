<h1>Posts View</h1>


<table>
    <thead>
    <tr>
    <th>Post Title</th>
    <th>Post Description</th>
    <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
    <tr>
        <td>{{ $post->title }}</td>
        <td>{{ $post->description }}</td>
        <td>
            <a href="#">Edit</a>
            <a href="#">Delete</a>
            <a href="#">View</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>