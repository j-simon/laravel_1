<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkte</title>
</head>

<body>
    @if (empty($products))
        Keine Produkt da!
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Preis</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif


    <form action="/product_ue14_store" method="POST">
        @csrf
        Produktname:<input type="text" name="name"><br>
        Produkpreis:<input type="text" name="price">
        <button>speichern</button>
    </form>


     @if ($errors->any())
        <div style="color:red";>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>

</html>
