@extends('layouts.master')

@section('title')
Booking | Wend Travel 
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" style="margin-bottom: 20px">Danh sách Booking</h4>
                <form class="form-inline" role="form" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" name="key" placeholder="Search Key">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>ID</th>
                            <th>Khách hàng</th>
                            <th>Tour</th>
                            <th>Trạng thái</th>
                            <th>Số lượng người lớn</th>
                            <th>Số lượng trẻ em</th>
                            <th>Tổng tiền</th>
                            <th>Ghi chú</th>
                            <th>Ở tại khách sạn?</th>
                            <th>Ngày tạo</th>
                        </thead>
                        <tbody>
                            @foreach($booking as $book)
                            <tr>
                                <td>{{$book->id}}</td>
                                <td>{{$book->customer_id}}</td>
                                <td>{{$book->tour_id}}</td>
                                <td>{{$book->status}}</td>
                                <td>{{$book->adult_number}}</td>
                                <td>{{$book->children_number}}</td>
                                <td>{{$book->total_price}}</td>
                                <td>{{$book->note}}</td>
                                <td>{{$book->hotel_status}}</td>
                                <td>{{$book->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection


@section('scripts')

@endsection