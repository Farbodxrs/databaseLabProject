<h1>today stats</h1>
Total income : {{$facsprice}}<br>
Total outcome " {{$pursprice}}<br>


<h3>What we sold</h3>
@foreach($facs as $fac)
    {{$fac->price}}
    {{$fac->food_name}}
    <br>
@endforeach
<h3>what we bought</h3>
@foreach($purs as $pur)
    {{$pur->product_name}}
    {{$pur->price}}
    <br>
@endforeach
