<html>
<head>
  <!-- can create the csrf-token for front end to post the form at front end site like jquery or vue.js -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <form method="POST" action="">
    <!-- acquired CSRF to post the form -->
    @csrf

    <input type="text" name="username" />
    <button>Submit</button>
  </form>
</body>
</html>
