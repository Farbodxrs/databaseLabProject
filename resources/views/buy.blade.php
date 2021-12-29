<h1><a href="/">main</a></h1>
<h1>
    Active shops items
</h1>
<table>
    <th>id</th>
    <th>name</th>
    <th>price</th>
    <th>shop_id</th>
    @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->shop_id}}</td>
            <td><a href="{{route('buy.buy.product',['id'=>$item->id])}}">BUY</a></td>
        </tr>
    @endforeach
</table>
