<html>

<head>
  <title>User List</title>
</head>

<body>
  <h1>List of Users</h1>

  <table>
    <tr>
      <td>Name</td>
      <td>Email</td>
      <td>Action</td>
    </tr>
    @foreach($users as $user)
    <tr>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td><a href="/lesson-3/resource/{{$user->id}}/edit"><button>Edit</button></td>
    <tr>
    @endforeach
  </table>
</body>

</html>
