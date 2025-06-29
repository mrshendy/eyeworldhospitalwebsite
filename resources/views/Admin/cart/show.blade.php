@extends('temp')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">تفاصيل الطلب #{{ $order->id }}</h2>

    <div class="card mb-4">
        <div class="card-body">
            <h4>معلومات العميل</h4>
            <p><strong>الاسم:</strong> {{ $order->name }}</p>
            <p><strong>البريد الإلكتروني:</strong> {{ $order->email }}</p>
            <p><strong>الدولة:</strong> {{ $order->country }}</p>
            <p><strong>رقم الهاتف:</strong> {{ $order->phone }}</p>
            <p><strong>العنوان:</strong> {{ $order->address }}</p>
            <p><strong>طريقة الدفع:</strong> {{ ucfirst($order->payment_method) }}</p>
            <p><strong>تاريخ الطلب:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4>الكتب المطلوبة</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>اسم الكتاب</th>
                        <th>الكمية</th>
                        <th>السعر الفردي</th>
                        <th>الإجمالي</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->book->translateOrDefault(app()->getLocale())->title }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }} ج.م</td>
                            <td>{{ $item->price * $item->quantity }} ج.م</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-end">
                <h5>المجموع الكلي: <strong>{{ $order->total }} ج.م</strong></h5>
            </div>
        </div>
    </div>
</div>
@endsection
