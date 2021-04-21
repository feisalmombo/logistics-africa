@extends('layouts.app')

@section('title', 'Payment Vouchers')

@section('content')
<br>
<div class="row">
<section class="content">
<div class="col-lg-12">
@include('msgs.success')
<div class="panel panel-default">
<div class="panel-heading">
    List of payment vouchers
    <a href="{{ url('/payment/vouchers/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add Payment voucher</a>
</div>
<div class="panel-body table-responsive">
    @if(count($payments)>0)
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Project Name</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Duration</th>

            </tr>
        </thead>
        <tbody>

            @foreach($payments as $key=>$payment)
            <tr class="odd gradeX">
            <td>{{$key + 1 }}</td>
            <td>{{$payment->project_name}}</td>
            <td>Show</td>
            <td>Edit</td>
            <td>Delete</td>
            <td>{{$payment->created_at->diffForHumans() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>No Payment Voucher found</strong>
    </div>
    @endif
</div>
</div>
</div>
</div>
</section>
@endsection
