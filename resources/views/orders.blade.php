<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form action="{{ route('ue13') }}" action="GET">

        <select id="status" name="status">
            <option value="">-- All --</option>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Canceled</option>
        </select>

        total_price<input type="text" name="total_price">
        <button>filtern</button>
    </form>

    <h2>Übersicht</h2>
    <table>
        <tr>
            <td>id </td>
            <td>customer_name</td>
            <td>total_price</td>
            <td>status</td>
            <td>order_date</td>
        </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->total_price }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->order_date }}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
