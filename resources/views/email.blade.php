<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{$data['name']}}</h1>
    <h4>{{$data['email']}}</h4>
    <h4>{{$data['phone']}}</h4>
    <p>{{$data['message']}}</p>

    @if(Session('success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "{{ session('success') }}",
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    </script>
    @endif
</body>
</html>