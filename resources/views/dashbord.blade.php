welcome {{auth()->user()->name}}

<ul>



    <li> {{$users->name}}</li>

    <li> {{$users->address->address_line_1}}</li>




</ul>


<ul>


    @foreach ($users->orders as $order)


    <li> {{$order->order_id}}</li>

    @endforeach






</ul>


<a href="{{route('logout')}}"> logout </a>