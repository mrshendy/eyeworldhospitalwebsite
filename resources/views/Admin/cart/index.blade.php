@extends('temp')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('Admin.cart.index')}}">{{__('Cart')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">طلبات الشراء</li>
            </ol>
        </nav>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>البريد</th>
                        <th>الهاتف</th>
                        <th>الدولة</th>
                        <th>العنوان</th>
                        <th>طريقة الدفع</th>
                        <th>الإجمالي</th>
                        <th>التاريخ</th>
                        <th>عرض التفاصيل</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->country }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</td>
                            <td>{{ $order->total }} ج.م</td>
                            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                            <td><a href="{{ route('Admin.cart.show', $order->id) }}" class="btn btn-info btn-sm">تفاصيل</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">لا توجد طلبات بعد.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
