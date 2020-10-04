<html>

<body>
  <h1>Validation from Controller</h1>
  <form action="/lesson-9/submit" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Name">
    <input type="password" name="password" placeholder="Password">
    
    <button>Submit</button>
  </form>

  @error('name')
    <p>{{ $message }}</p>
  @enderror
  @error('email')
    <p>{{ $message }}</p>
  @enderror
  @error('password')
    <p>{{ $message }}</p>
  @enderror

  <h4>Retriving all message</h4>
  @foreach($errors->all() as $message)
    <p>{{ $message }}</p>
  @endforeach
</body>
</html>
