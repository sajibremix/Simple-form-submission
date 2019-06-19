@if(count($data))
<h2>Total data</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Amount</th>
      <th scope="col">Buyer</th>
      <th scope="col">Receipt id</th>
      <th scope="col">Items</th>
      <th scope="col">Buyer email</th>
      <th scope="col">Buyer ip</th>
      <th scope="col">Note</th>
      <th scope="col">City</th>
      <th scope="col">Phone</th>
      <th scope="col">Entry at</th>
      <th scope="col">Entry by</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($data as $key => $single_data)

    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$single_data->amount}}</td>
      <td>{{$single_data->buyer}}</td>
      <td>{{$single_data->receipt_id}}</td>
      <td>
        @foreach(json_decode($single_data->items) as $key=>$item)
          Item {{$key+1}}. {{$item}}<br>
        @endforeach
      </td>
      <td>{{$single_data->buyer_email}}</td>
      <td>{{$single_data->buyer_ip}}</td>
      <td>{{$single_data->note}}</td>
      <td>{{$single_data->city}}</td>
      <td>{{$single_data->phone}}</td>
      <td>{{$single_data->entry_at}}</td>
      <td>{{$single_data->entry_by}}</td>
    </tr>
    @endforeach

  </tbody>
</table>
@else
<p>No data found</p>
@endif