<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.4/dist/bootstrap-table.min.css">
    <title>Show All Employee</title>
</head>
<body>
    <h1 style="text-align: center;color:cornflowerblue">This is All Employee in Our Company</h1><br>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
    </tr>
  </thead>
  <tbody>
     @foreach($employee as $emp)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$emp->name}}</td>
        <td>{{$emp->email}}</td>
        <td>
             @if ($emp->role == 'admin')
                Admin
            @elseif ($emp->role == 'manager')
                Manager
            @else
                Employee
            @endif
        </td>
    </tr>
    @endforeach
    <div style="  position: fixed; bottom: 20px; left: 90%;">
        <button type="submit" class="btn btn-secondary">
          <a href="{{ route('back') }}" style="color:white;text-decoration: none;"> {{ __('Back') }}</a>
        </button>
    </div>
  </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.4/dist/bootstrap-table.min.js"></script>
</body>
</html>