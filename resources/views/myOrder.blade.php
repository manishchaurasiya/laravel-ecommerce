@include('layouts.header')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">S.No.</th>
            <th scope="col">NAME</th>
            <td>images</td>
            <th scope="col">PRICE</th>
            <th scope="col">QUANTITY</th>
            <th scope="col">TOTAL PRICE</th>
            <th scope="col">STATUS</th>
            <th scope="col">ORDER DATE</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $serial_number = 1;
        ?>
        @if(!$orders->isEmpty())
        @foreach($orders as $key => $order)
        <!-- <tr onclick="location.href='{{route ('detail',$order->product_id) }}'"> -->
        <tr>
            <td scope="row">{{$serial_number++}}</td>
            <td>{{$order->product->name}}</td>
            <td><img src="{{asset('storage/'.$order->product->Thumbnail->file)}}" alt="sfdgfd" width="100px"></td>
            <td>{{$order->product->price}}</td>
            <td>{{$order->price/$order->product->price}}</td>
            <td>{{$order->price}}</td>
            <td>{{$order->status}}</td>
            <td>{{$order->created_at}}</td>
            @if ($order->status == 'Pending')
            <td>
                <a href="{{route ('updateStatus',['id' => $order->id,'status'=>'Cancelled'] ) }}">Cancle</a>
            </td>
            @elseif ($order->status == 'Cancelled')
                 <td><h5>Cancelled</h5></td>   

            @else
            <td>
                <a href="#">Return</a>
                <a href="{{ route('review',['product_id'=>$order->product->id, 'order_id' => $order->id]) }}" class="btn">Review</a>
            </td>
            @endif
        </tr>
        @endforeach
        @else
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <h2>No order yet!</h2>
            </td>
            <td></td>
            <td></td>
            <td><a href="{{ route ('shop' )}}" class="btn" style="background-color: rgb(255 40 50);color:#fff">shop here </a></td>
        </tr>
        @endif
    </tbody>
</table>

@include('layouts.footer')