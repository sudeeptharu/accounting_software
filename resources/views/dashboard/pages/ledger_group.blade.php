@extends('dashboard.layouts.app',['name' => 'Sales Voucher'])

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="row">
        <div class="col-6">
            <h1>Assets</h1>
            <ul>
                @foreach ($groups as $group)
                @include('dashboard.pages.lg',['group'=>$group])
                @endforeach
            </ul>
            <h2>Total Assets:{{$totalAssets}}</h2>
        </div>
            <div class="col-6">
                <h1>Liabilities</h1>
                <ul>
                    @foreach ($liabilities as $group)
                    @include('dashboard.pages.lg',['group'=>$group])
                    @endforeach
                </ul>
                <h2>Total Assets:{{$totalLiabilities}}</h2>

            </div>


    </section>
</div>
@endsection
