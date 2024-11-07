<!-- resources/views/items/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static Item List</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Static Item List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Item 1</td>
                    <td>Description for Item 1</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Item 2</td>
                    <td>Description for Item 2</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Item 3</td>
                    <td>Description for Item 3</td>
                </tr>
                <!-- Add more items as needed -->
            </tbody>
        </table>
    </div>
</body>
</html>
