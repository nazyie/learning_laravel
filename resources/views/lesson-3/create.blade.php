<html>

<head>
  <title>Create User</title>
</head>

<body>
  <h1>Create Users</h1>

<form method="POST" action="/lesson-3/resource/">
  @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

    <button>Submit</button>
  </form>
</body>

</html>
