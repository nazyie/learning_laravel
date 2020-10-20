<html>

<head>
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
<div>
  <table class="table w-full border-collapse border-2 border-gray-500">
    @foreach($users as $user)
    <tr class="border-collapse border-2 border-gray-500">
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
    </tr>
    @endforeach
  </table>

  {{ $users->links() }}
</div>
</body>
</html>
