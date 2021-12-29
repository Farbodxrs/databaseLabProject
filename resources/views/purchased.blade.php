<h1><a href="/">main</a></h1>

<h1>Purchased list</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Product_Name</th>
        <th>Shop_Name</th>
        <th>Price</th>
        <th>Time

    </tr>
    @foreach ($items as $item)
        <tr>
            <td> {{ $item->id }}</td>
            <td> {{ $item->product_name }}</td>
            <td> {{ $item->shop_name }}</td>
            <td> {{ $item->price}}</td>
            <td> {{ $item->created_at}}</td>
        </tr>
    @endforeach
</table>
