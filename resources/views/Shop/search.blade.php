@extends('Shop.layouts.main')

@section('content')
    <style>
        .rating .active {
            color: #fd9727 !important;
        }
    </style>
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- BSTORE-BREADCRUMB START -->
                    <div class="bstore-breadcrumb">
                        <a href="/">Trang chủ</a>
                    </div>
                    <!-- BSTORE-BREADCRUMB END -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="right-all-product">
                        <!-- PRODUCT-CATEGORY-HEADER END -->
                        <div class="product-category-title">
                            <!-- PRODUCT-CATEGORY-TITLE START -->
                            <h1>

                                    <span class="cat-name">Từ khóa tìm kiếm "{{ $keyword }}" ({{ $totalResult }})</span>

                            </h1>
                            <!-- PRODUCT-CATEGORY-TITLE END -->
                        </div>
                    </div>
                    <!-- ALL GATEGORY-PRODUCT START -->
                    <div class="all-gategory-product">
                        <div class="row" style="margin: 15px;width:81%">
                            <ul class="gategory-product">

                                    @foreach($products as $product)
                                        <?php
                                        $age = 0;
                                        if ($product->total_number){
                                            $age = $product->total_rating / $product->total_number;

                                        }
                                        ?>


                                        <li class="gategory-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                            <div class="single-product-item">
                                                <div class="product-image">
                                                    <a href="{{ route('Shop.detail-product', ['slug' =>$product->slug,'id' =>$product->id,]) }}" title="{{ $product->name }}" >
                                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"></a>
                                                </div>
                                                <div class="rating" style=" align-items: center; margin-left: 25px;">
                                                    @for($i=1; $i<=5 ; $i++)
                                                        <i class="fa fa-star {{$i <= $age ? 'active': ''}}"></i>
                                                    @endfor
                                                </div>
                                                <div class="product-info">
                                                    <a href="{{ route('Shop.detail-product', ['slug' =>$product->slug,'id' =>$product->id,]) }}" title="{{ $product->name }}">{{ $product->name }}</a>
                                                    <div class="price-box">
                                                        @if($product->sale==0)
                                                            <span class="price">{{number_format($product->price)}} <sup>đ</sup> </span>
                                                        @else
                                                            <span class="price" style="color: red; ">{{number_format($product->sale)}} <sup>đ</sup></span>
                                                            &nbsp;
                                                            <span class="old-price">{{number_format($product->price)}}<sup>đ</sup></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach



                            </ul>
                        </div>
                    </div>
{{--                    @if(!empty($products != null))--}}

{{--                    @else--}}
                    {{ $products->links() }}
{{--                    @endif--}}
                </div>
            </div>

        </div>
    </section>
@endsection
