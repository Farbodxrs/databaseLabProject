@foreach($user as $item)
    id  : {{$item->id}}
    {{$item->op_type}}
    {{$item->op_time}}
    {{$item->customer_id}}
@endforeach

@foreach($address as $item)
    id  : {{$item->id}}
    {{$item->op_type}}
    {{$item->op_time}}
@endforeach

