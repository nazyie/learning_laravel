<html>

<head>
  <title>Edit User {{$user->id}}</title>
</head>

<body>
  <h1>Edit Users {{$user->id}}</h1>

<form method="POST" action="/lesson-3/resource/{{$user->id}}">
  @csrf
  @method('PATCH')
    <input type="text" name="name" placeholder="Name" value="{{$user->name}}" required>
    <input type="email" name="email" placeholder="Email" value="{{$user->email}}" required>
    <input type="password" name="password" placeholder="Password" value="{{$user->password}}" required>

    <button>Submit</button>
  </form>
</body>

</html>
