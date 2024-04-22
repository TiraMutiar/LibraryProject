<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/lihatkategori">
    <h3>Data Kategori</h3> <br>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Status</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $datakategori as $item )
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nama_kategori}}</td>
                <td>{{$item->status}}</td>
                <td><a href="/kategoris/edit/{{$item->id}}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </form>
</body>
</html>
