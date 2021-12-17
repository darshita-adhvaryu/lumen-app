<?php 
$curl_handle=curl_init();
curl_setopt($curl_handle,CURLOPT_URL,'http://localhost:3000/membersList');
curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
$buffer = curl_exec($curl_handle);
curl_close($curl_handle);
if (empty($buffer)){
    print "Nothing returned from url.<p>";
}
else{
    $response = json_decode($buffer);
    $members = $response->data;
    $total =0;
    $i=0;
    foreach($members as $key=>$mem){
        $total += $mem->sub_price;
        $i++;
    }
    usort($members, function($a, $b) {
        return $b->sub_price - $a->sub_price;
    });
    $average = $i > 0 ? $total/$i : 0;
?>
@extends('masterLayout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <h1>Members List</h1>
            <h3>Average Price:{{ $average }}</h3>
        </div>
    </div>
</div>

    <table class="table table-striped" id="dtBasicExample">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Subscription</th>
            <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $mem)
            <tr>
                <th scope="row">{{ $mem->id }}</th>
                <td>{{ $mem->name }}</td>
                <td>{{ $mem->email }}</td>
                <td>{{ $mem->phone }}</td>
                <td>{{ $mem->sub_name }}</td>
                <td>{{ $mem->sub_price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable({
            "order": [[ 5, "desc" ]],
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bInfo": false,
            "bAutoWidth": false
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>
@endsection
<?php
}
?>