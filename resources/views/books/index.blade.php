<!DOCTYPE html>
<html>

<head>
    <title>Book List</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
    }

    th {
        background-color: #f4f4f4;
    }
    </style>
</head>

<body>
    <h1>List of Books</h1>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>