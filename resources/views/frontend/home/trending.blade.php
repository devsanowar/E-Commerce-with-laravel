<section class="tp-product-area pb-55">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-xl-5 col-lg-6 col-md-5">
                <div class="tp-section-title-wrapper mb-40">
                    <h3 class="tp-section-title">Trending Products

                        <svg width="114" height="35" viewBox="0 0 114 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053"
                                stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637"
                                stroke-linecap="round" />
                        </svg>
                    </h3>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-7">
                <div class="tp-product-tab tp-product-tab-border mb-45 tp-tab d-flex justify-content-md-end">

                    <ul class="nav nav-tabs justify-content-sm-end" id="productTab" role="tablist">

                        {{-- New  --}}
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="new-tab" data-bs-toggle="tab"
                                data-bs-target="#new-tab-pane" type="button" role="tab"
                                aria-controls="new-tab-pane" aria-selected="true">New
                                <span class="tp-product-tab-line">
                                    <svg width="52" height="13" viewBox="0 0 52 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 8.97127C11.6061 -5.48521 33 3.99996 51 11.4635"
                                            stroke="currentColor" stroke-width="2" stroke-miterlimit="3.8637"
                                            stroke-linecap="round" />
                                    </svg>
                                </span>
                            </button>
                        </li>
                        {{-- Featured --}}
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="featured-tab" data-bs-toggle="tab"
                                data-bs-target="#featured-tab-pane" type="button" role="tab"
                                aria-controls="featured-tab-pane" aria-selected="false">Featured
                                <span class="tp-product-tab-line">
                                    <svg width="52" height="13" viewBox="0 0 52 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 8.97127C11.6061 -5.48521 33 3.99996 51 11.4635"
                                            stroke="currentColor" stroke-width="2" stroke-miterlimit="3.8637"
                                            stroke-linecap="round" />
                                    </svg>
                                </span>
                            </button>
                        </li>
                        {{-- Top Seller  --}}
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="topsell-tab" data-bs-toggle="tab"
                                data-bs-target="#topsell-tab-pane" type="button" role="tab"
                                aria-controls="topsell-tab-pane" aria-selected="false">Top Sellers
                                <span class="tp-product-tab-line">
                                    <svg width="52" height="13" viewBox="0 0 52 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 8.97127C11.6061 -5.48521 33 3.99996 51 11.4635"
                                            stroke="currentColor" stroke-width="2" stroke-miterlimit="3.8637"
                                            stroke-linecap="round" />
                                    </svg>
                                </span>
                            </button>
                        </li>

                    </ul>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="tp-product-tab-content">
                    <div class="tab-content" id="myTabContent">

                        {{-- New  --}}
                        @php
                            $products = App\Models\Product::where('status', '1')
                                ->where('new', '1')
                                ->limit(8)
                                ->latest()
                                ->get();
                        @endphp

                        <div class="tab-pane fade show active" id="new-tab-pane" role="tabpanel"
                            aria-labelledby="new-tab" tabindex="0">
                            <div class="row gy-3">

                                @foreach ($products as $product)
                                    <div class="col-xl-3 col-lg-3 col-sm-6">
                                        <div class="tp-product-item p-relative transition-3 mb-25 h-100">
                                            <div class="tp-product-thumb p-relative fix m-img">

                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">

                                                    <img src="{{ asset($product->product_image) }}"
                                                        alt="product-electronic">
                                                </a>

                                                <!-- product badge -->
                                                <div class="tp-product-badge">

                                                    @if ($product->discount_price == null)
                                                    @else
                                                        @php
                                                            $amount = $product->selling_price - $product->discount_price;
                                                            $discount = ($amount / $product->discount_price) * 100;
                                                        @endphp
                                                        <span class="product-hot">{{ round($discount) }}%</span>
                                                    @endif

                                                </div>

                                                <!-- product action -->
                                                <div class="tp-product-action">
                                                    <div class="tp-product-action-item d-flex flex-column">

                                                        <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"
                                                            class="tp-product-action-btn tp-product-add-cart-btn">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M3.93795 5.34749L4.54095 12.5195C4.58495 13.0715 5.03594 13.4855 5.58695 13.4855H5.59095H16.5019H16.5039C17.0249 13.4855 17.4699 13.0975 17.5439 12.5825L18.4939 6.02349C18.5159 5.86749 18.4769 5.71149 18.3819 5.58549C18.2879 5.45849 18.1499 5.37649 17.9939 5.35449C17.7849 5.36249 9.11195 5.35049 3.93795 5.34749ZM5.58495 14.9855C4.26795 14.9855 3.15295 13.9575 3.04595 12.6425L2.12995 1.74849L0.622945 1.48849C0.213945 1.41649 -0.0590549 1.02949 0.0109451 0.620487C0.082945 0.211487 0.477945 -0.054513 0.877945 0.00948704L2.95795 0.369487C3.29295 0.428487 3.54795 0.706487 3.57695 1.04649L3.81194 3.84749C18.0879 3.85349 18.1339 3.86049 18.2029 3.86849C18.7599 3.94949 19.2499 4.24049 19.5839 4.68849C19.9179 5.13549 20.0579 5.68649 19.9779 6.23849L19.0289 12.7965C18.8499 14.0445 17.7659 14.9855 16.5059 14.9855H16.5009H5.59295H5.58495Z"
                                                                    fill="currentColor" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M14.8979 9.04382H12.1259C11.7109 9.04382 11.3759 8.70782 11.3759 8.29382C11.3759 7.87982 11.7109 7.54382 12.1259 7.54382H14.8979C15.3119 7.54382 15.6479 7.87982 15.6479 8.29382C15.6479 8.70782 15.3119 9.04382 14.8979 9.04382Z"
                                                                    fill="currentColor" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M5.15474 17.702C5.45574 17.702 5.69874 17.945 5.69874 18.246C5.69874 18.547 5.45574 18.791 5.15474 18.791C4.85274 18.791 4.60974 18.547 4.60974 18.246C4.60974 17.945 4.85274 17.702 5.15474 17.702Z"
                                                                    fill="currentColor" />

                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M5.15374 18.0409C5.04074 18.0409 4.94874 18.1329 4.94874 18.2459C4.94874 18.4729 5.35974 18.4729 5.35974 18.2459C5.35974 18.1329 5.26674 18.0409 5.15374 18.0409ZM5.15374 19.5409C4.43974 19.5409 3.85974 18.9599 3.85974 18.2459C3.85974 17.5319 4.43974 16.9519 5.15374 16.9519C5.86774 16.9519 6.44874 17.5319 6.44874 18.2459C6.44874 18.9599 5.86774 19.5409 5.15374 19.5409Z"
                                                                    fill="currentColor" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M16.435 17.702C16.736 17.702 16.98 17.945 16.98 18.246C16.98 18.547 16.736 18.791 16.435 18.791C16.133 18.791 15.89 18.547 15.89 18.246C15.89 17.945 16.133 17.702 16.435 17.702Z"
                                                                    fill="currentColor" />

                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M16.434 18.0409C16.322 18.0409 16.23 18.1329 16.23 18.2459C16.231 18.4749 16.641 18.4729 16.64 18.2459C16.64 18.1329 16.547 18.0409 16.434 18.0409ZM16.434 19.5409C15.72 19.5409 15.14 18.9599 15.14 18.2459C15.14 17.5319 15.72 16.9519 16.434 16.9519C17.149 16.9519 17.73 17.5319 17.73 18.2459C17.73 18.9599 17.149 19.5409 16.434 19.5409Z"
                                                                    fill="currentColor" />
                                                            </svg>

                                                            <span class="tp-product-tooltip">Add to Cart</span>
                                                        </a>

                                                        <a type="submit" id="{{ $product->id }}"
                                                            onclick="productView(this.id)"
                                                            class="tp-product-action-btn tp-product-quick-view-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#producQuickViewModal">
                                                            <svg width="20" height="17" viewBox="0 0 20 17"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z"
                                                                    fill="currentColor" />
                                                                <g mask="url(#mask0_1211_721)">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z"
                                                                        fill="currentColor" />
                                                                </g>
                                                            </svg>

                                                            <span class="tp-product-tooltip">Quick View</span>
                                                        </a>

                                                        <a type="submit" id="{{ $product->id }}"
                                                            onclick="addToWishList(this.id)"
                                                            class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                            <svg width="20" height="19" viewBox="0 0 20 19"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z"
                                                                    fill="currentColor" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z"
                                                                    fill="currentColor" />
                                                            </svg>

                                                            <span class="tp-product-tooltip">Add To Wishlist</span>
                                                        </a>

                                                    </div>
                                                </div>

                                            </div>
                                            <!-- product content -->
                                            <div class="tp-product-content">
                                                <div class="tp-product-category">
                                                    <a
                                                        href="javascript:;">{{ $product['subcategory']['subcategory_name'] }}</a>
                                                </div>
                                                <h3 class="tp-product-title">
                                                    <a
                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                                        {{ $product->product_name }}
                                                    </a>
                                                </h3>

                                                <div class="tp-product-category">
                                                    @if ($product->vendor_id == null)
                                                        <a href="javascript:;">By Admin</a>
                                                    @else
                                                        <a href="javascript:;">By {{ $product['user']['name'] }}</a>
                                                    @endif
                                                </div>

                                                @php
                                                    $reviewcount = App\Models\Review::where('product_id', $product->id)
                                                        ->where('status', 1)
                                                        ->latest()
                                                        ->get();

                                                    $avarage = App\Models\Review::where('product_id', $product->id)
                                                        ->where('status', 1)
                                                        ->avg('rating');
                                                @endphp

                                                <div class="tp-product-rating d-flex align-items-center">
                                                    <div class="tp-product-rating-icon">

                                                        @if ($avarage == 0)
                                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        
                                                        @elseif($avarage == 1 || $avarage < 2)
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        @elseif($avarage == 2 || $avarage < 3)
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        @elseif($avarage == 3 || $avarage < 4)
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        @elseif($avarage == 4 || $avarage < 5)
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span> <span><i
                                                                    class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        @elseif($avarage == 5 || $avarage < 5)
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span> <span><i
                                                                    class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                        @endif

                                                    </div>
                                                    <div class="tp-product-rating-text">
                                                        <span>({{ count($reviewcount) }} Review)</span>
                                                    </div>
                                                </div>

                                                <div class="tp-product-price-wrapper">

                                                    @if ($product->discount_price == null)
                                                        <span class="tp-product-price new-price">Tk
                                                            {{ $product->selling_price }}</span>
                                                    @else
                                                        <span class="tp-product-price old-price">Tk
                                                            {{ $product->selling_price }}</span>
                                                        <span class="tp-product-price new-price">Tk
                                                            {{ $product->discount_price }}</span>
                                                    @endif


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        {{-- New  --}}

                        {{-- Featured --}}

                        @php
                            $products = App\Models\Product::where('status', '1')
                                ->where('featured', '1')
                                ->orderBy('id', 'DESC')
                                ->limit(8)
                                ->latest()
                                ->get();
                        @endphp

                        <div class="tab-pane fade" id="featured-tab-pane" role="tabpanel"
                            aria-labelledby="featured-tab" tabindex="0">
                            <div class="row gy-3">

                                @foreach ($products as $product)
                                    <div class="col-xl-3 col-lg-3 col-sm-6">
                                        <div class="tp-product-item p-relative transition-3 mb-25 h-100">
                                            <div class="tp-product-thumb p-relative fix m-img">

                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">

                                                    <img src="{{ asset($product->product_image) }}"
                                                        alt="product-electronic">
                                                </a>

                                                <!-- product badge -->
                                                <div class="tp-product-badge">

                                                    @if ($product->discount_price == null)
                                                    @else
                                                        @php
                                                            $amount = $product->selling_price - $product->discount_price;
                                                            $discount = ($amount / $product->discount_price) * 100;
                                                        @endphp
                                                        <span class="product-hot">{{ round($discount) }}%</span>
                                                    @endif

                                                </div>

                                                <!-- product action -->
                                                <div class="tp-product-action">
                                                    <div class="tp-product-action-item d-flex flex-column">

                                                        <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"
                                                            class="tp-product-action-btn tp-product-add-cart-btn">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M3.93795 5.34749L4.54095 12.5195C4.58495 13.0715 5.03594 13.4855 5.58695 13.4855H5.59095H16.5019H16.5039C17.0249 13.4855 17.4699 13.0975 17.5439 12.5825L18.4939 6.02349C18.5159 5.86749 18.4769 5.71149 18.3819 5.58549C18.2879 5.45849 18.1499 5.37649 17.9939 5.35449C17.7849 5.36249 9.11195 5.35049 3.93795 5.34749ZM5.58495 14.9855C4.26795 14.9855 3.15295 13.9575 3.04595 12.6425L2.12995 1.74849L0.622945 1.48849C0.213945 1.41649 -0.0590549 1.02949 0.0109451 0.620487C0.082945 0.211487 0.477945 -0.054513 0.877945 0.00948704L2.95795 0.369487C3.29295 0.428487 3.54795 0.706487 3.57695 1.04649L3.81194 3.84749C18.0879 3.85349 18.1339 3.86049 18.2029 3.86849C18.7599 3.94949 19.2499 4.24049 19.5839 4.68849C19.9179 5.13549 20.0579 5.68649 19.9779 6.23849L19.0289 12.7965C18.8499 14.0445 17.7659 14.9855 16.5059 14.9855H16.5009H5.59295H5.58495Z"
                                                                    fill="currentColor" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M14.8979 9.04382H12.1259C11.7109 9.04382 11.3759 8.70782 11.3759 8.29382C11.3759 7.87982 11.7109 7.54382 12.1259 7.54382H14.8979C15.3119 7.54382 15.6479 7.87982 15.6479 8.29382C15.6479 8.70782 15.3119 9.04382 14.8979 9.04382Z"
                                                                    fill="currentColor" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M5.15474 17.702C5.45574 17.702 5.69874 17.945 5.69874 18.246C5.69874 18.547 5.45574 18.791 5.15474 18.791C4.85274 18.791 4.60974 18.547 4.60974 18.246C4.60974 17.945 4.85274 17.702 5.15474 17.702Z"
                                                                    fill="currentColor" />

                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M5.15374 18.0409C5.04074 18.0409 4.94874 18.1329 4.94874 18.2459C4.94874 18.4729 5.35974 18.4729 5.35974 18.2459C5.35974 18.1329 5.26674 18.0409 5.15374 18.0409ZM5.15374 19.5409C4.43974 19.5409 3.85974 18.9599 3.85974 18.2459C3.85974 17.5319 4.43974 16.9519 5.15374 16.9519C5.86774 16.9519 6.44874 17.5319 6.44874 18.2459C6.44874 18.9599 5.86774 19.5409 5.15374 19.5409Z"
                                                                    fill="currentColor" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M16.435 17.702C16.736 17.702 16.98 17.945 16.98 18.246C16.98 18.547 16.736 18.791 16.435 18.791C16.133 18.791 15.89 18.547 15.89 18.246C15.89 17.945 16.133 17.702 16.435 17.702Z"
                                                                    fill="currentColor" />

                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M16.434 18.0409C16.322 18.0409 16.23 18.1329 16.23 18.2459C16.231 18.4749 16.641 18.4729 16.64 18.2459C16.64 18.1329 16.547 18.0409 16.434 18.0409ZM16.434 19.5409C15.72 19.5409 15.14 18.9599 15.14 18.2459C15.14 17.5319 15.72 16.9519 16.434 16.9519C17.149 16.9519 17.73 17.5319 17.73 18.2459C17.73 18.9599 17.149 19.5409 16.434 19.5409Z"
                                                                    fill="currentColor" />
                                                            </svg>

                                                            <span class="tp-product-tooltip">Add to Cart</span>
                                                        </a>

                                                        <a type="submit" id="{{ $product->id }}"
                                                            onclick="productView(this.id)"
                                                            class="tp-product-action-btn tp-product-quick-view-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#producQuickViewModal">
                                                            <svg width="20" height="17" viewBox="0 0 20 17"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z"
                                                                    fill="currentColor" />
                                                                <g mask="url(#mask0_1211_721)">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z"
                                                                        fill="currentColor" />
                                                                </g>
                                                            </svg>

                                                            <span class="tp-product-tooltip">Quick View</span>
                                                        </a>

                                                        <a type="submit" id="{{ $product->id }}"
                                                            onclick="addToWishList(this.id)"
                                                            class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                            <svg width="20" height="19" viewBox="0 0 20 19"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z"
                                                                    fill="currentColor" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z"
                                                                    fill="currentColor" />
                                                            </svg>

                                                            <span class="tp-product-tooltip">Add To Wishlist</span>
                                                        </a>

                                                    </div>
                                                </div>

                                            </div>
                                            <!-- product content -->
                                            <div class="tp-product-content">
                                                <div class="tp-product-category">
                                                    <a
                                                        href="javascript:;">{{ $product['subcategory']['subcategory_name'] }}</a>
                                                </div>
                                                <h3 class="tp-product-title">
                                                    <a
                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                                        {{ $product->product_name }}
                                                    </a>
                                                </h3>

                                                <div class="tp-product-category">
                                                    @if ($product->vendor_id == null)
                                                        <a href="javascript:;">By Admin</a>
                                                    @else
                                                        <a href="javascript:;">By {{ $product['user']['name'] }}</a>
                                                    @endif
                                                </div>

                                                @php
                                                    $reviewcount = App\Models\Review::where('product_id', $product->id)
                                                        ->where('status', 1)
                                                        ->latest()
                                                        ->get();

                                                    $avarage = App\Models\Review::where('product_id', $product->id)
                                                        ->where('status', 1)
                                                        ->avg('rating');
                                                @endphp

                                                <div class="tp-product-rating d-flex align-items-center">
                                                    <div class="tp-product-rating-icon">

                                                        @if ($avarage == 0)
                                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        
                                                        @elseif($avarage == 1 || $avarage < 2)
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        @elseif($avarage == 2 || $avarage < 3)
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        @elseif($avarage == 3 || $avarage < 4)
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        @elseif($avarage == 4 || $avarage < 5)
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span> <span><i
                                                                    class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        @elseif($avarage == 5 || $avarage < 5)
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span> <span><i
                                                                    class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                        @endif

                                                    </div>
                                                    <div class="tp-product-rating-text">
                                                        <span>({{ count($reviewcount) }} Review)</span>
                                                    </div>
                                                </div>

                                                <div class="tp-product-price-wrapper">

                                                    @if ($product->discount_price == null)
                                                        <span class="tp-product-price new-price">Tk
                                                            {{ $product->selling_price }}</span>
                                                    @else
                                                        <span class="tp-product-price old-price">Tk
                                                            {{ $product->selling_price }}</span>
                                                        <span class="tp-product-price new-price">Tk
                                                            {{ $product->discount_price }}</span>
                                                    @endif


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        {{-- Featured --}}

                        {{-- Top Seller  --}}
                        @php
                            $products = App\Models\Product::where('status', '1')
                                ->where('best_seeling', '1')
                                ->orderBy('product_name', 'DESC')
                                ->limit(8)
                                ->latest()
                                ->get();
                        @endphp
                        <div class="tab-pane fade" id="topsell-tab-pane" role="tabpanel"
                            aria-labelledby="topsell-tab" tabindex="0">

                            <div class="row gy-3">

                                @foreach ($products as $product)
                                    <div class="col-xl-3 col-lg-3 col-sm-6">
                                        <div class="tp-product-item p-relative transition-3 mb-25 h-100">
                                            <div class="tp-product-thumb p-relative fix m-img">

                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">

                                                    <img src="{{ asset($product->product_image) }}"
                                                        alt="product-electronic">
                                                </a>

                                                <!-- product badge -->
                                                <div class="tp-product-badge">

                                                    @if ($product->discount_price == null)
                                                    @else
                                                        @php
                                                            $amount = $product->selling_price - $product->discount_price;
                                                            $discount = ($amount / $product->discount_price) * 100;
                                                        @endphp
                                                        <span class="product-hot">{{ round($discount) }}%</span>
                                                    @endif

                                                </div>

                                                <!-- product action -->
                                                <div class="tp-product-action">
                                                    <div class="tp-product-action-item d-flex flex-column">

                                                        <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"
                                                            class="tp-product-action-btn tp-product-add-cart-btn">
                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M3.93795 5.34749L4.54095 12.5195C4.58495 13.0715 5.03594 13.4855 5.58695 13.4855H5.59095H16.5019H16.5039C17.0249 13.4855 17.4699 13.0975 17.5439 12.5825L18.4939 6.02349C18.5159 5.86749 18.4769 5.71149 18.3819 5.58549C18.2879 5.45849 18.1499 5.37649 17.9939 5.35449C17.7849 5.36249 9.11195 5.35049 3.93795 5.34749ZM5.58495 14.9855C4.26795 14.9855 3.15295 13.9575 3.04595 12.6425L2.12995 1.74849L0.622945 1.48849C0.213945 1.41649 -0.0590549 1.02949 0.0109451 0.620487C0.082945 0.211487 0.477945 -0.054513 0.877945 0.00948704L2.95795 0.369487C3.29295 0.428487 3.54795 0.706487 3.57695 1.04649L3.81194 3.84749C18.0879 3.85349 18.1339 3.86049 18.2029 3.86849C18.7599 3.94949 19.2499 4.24049 19.5839 4.68849C19.9179 5.13549 20.0579 5.68649 19.9779 6.23849L19.0289 12.7965C18.8499 14.0445 17.7659 14.9855 16.5059 14.9855H16.5009H5.59295H5.58495Z"
                                                                    fill="currentColor" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M14.8979 9.04382H12.1259C11.7109 9.04382 11.3759 8.70782 11.3759 8.29382C11.3759 7.87982 11.7109 7.54382 12.1259 7.54382H14.8979C15.3119 7.54382 15.6479 7.87982 15.6479 8.29382C15.6479 8.70782 15.3119 9.04382 14.8979 9.04382Z"
                                                                    fill="currentColor" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M5.15474 17.702C5.45574 17.702 5.69874 17.945 5.69874 18.246C5.69874 18.547 5.45574 18.791 5.15474 18.791C4.85274 18.791 4.60974 18.547 4.60974 18.246C4.60974 17.945 4.85274 17.702 5.15474 17.702Z"
                                                                    fill="currentColor" />

                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M5.15374 18.0409C5.04074 18.0409 4.94874 18.1329 4.94874 18.2459C4.94874 18.4729 5.35974 18.4729 5.35974 18.2459C5.35974 18.1329 5.26674 18.0409 5.15374 18.0409ZM5.15374 19.5409C4.43974 19.5409 3.85974 18.9599 3.85974 18.2459C3.85974 17.5319 4.43974 16.9519 5.15374 16.9519C5.86774 16.9519 6.44874 17.5319 6.44874 18.2459C6.44874 18.9599 5.86774 19.5409 5.15374 19.5409Z"
                                                                    fill="currentColor" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M16.435 17.702C16.736 17.702 16.98 17.945 16.98 18.246C16.98 18.547 16.736 18.791 16.435 18.791C16.133 18.791 15.89 18.547 15.89 18.246C15.89 17.945 16.133 17.702 16.435 17.702Z"
                                                                    fill="currentColor" />

                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M16.434 18.0409C16.322 18.0409 16.23 18.1329 16.23 18.2459C16.231 18.4749 16.641 18.4729 16.64 18.2459C16.64 18.1329 16.547 18.0409 16.434 18.0409ZM16.434 19.5409C15.72 19.5409 15.14 18.9599 15.14 18.2459C15.14 17.5319 15.72 16.9519 16.434 16.9519C17.149 16.9519 17.73 17.5319 17.73 18.2459C17.73 18.9599 17.149 19.5409 16.434 19.5409Z"
                                                                    fill="currentColor" />
                                                            </svg>

                                                            <span class="tp-product-tooltip">Add to Cart</span>
                                                        </a>

                                                        <a type="submit" id="{{ $product->id }}"
                                                            onclick="productView(this.id)"
                                                            class="tp-product-action-btn tp-product-quick-view-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#producQuickViewModal">
                                                            <svg width="20" height="17" viewBox="0 0 20 17"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z"
                                                                    fill="currentColor" />
                                                                <g mask="url(#mask0_1211_721)">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z"
                                                                        fill="currentColor" />
                                                                </g>
                                                            </svg>

                                                            <span class="tp-product-tooltip">Quick View</span>
                                                        </a>

                                                        <a type="submit" id="{{ $product->id }}"
                                                            onclick="addToWishList(this.id)"
                                                            class="tp-product-action-btn tp-product-add-to-wishlist-btn">
                                                            <svg width="20" height="19" viewBox="0 0 20 19"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M1.78158 8.88867C3.15121 13.1386 8.5623 16.5749 10.0003 17.4255C11.4432 16.5662 16.8934 13.0918 18.219 8.89257C19.0894 6.17816 18.2815 2.73984 15.0714 1.70806C13.5162 1.21019 11.7021 1.5132 10.4497 2.4797C10.1879 2.68041 9.82446 2.68431 9.56069 2.48555C8.23405 1.49079 6.50102 1.19947 4.92136 1.70806C1.71613 2.73887 0.911158 6.17718 1.78158 8.88867ZM10.0013 19C9.88015 19 9.75999 18.9708 9.65058 18.9113C9.34481 18.7447 2.14207 14.7852 0.386569 9.33491C0.385592 9.33491 0.385592 9.33394 0.385592 9.33394C-0.71636 5.90244 0.510636 1.59018 4.47199 0.316764C6.33203 -0.283407 8.35911 -0.019371 9.99836 1.01242C11.5868 0.0108324 13.6969 -0.26587 15.5198 0.316764C19.4851 1.59213 20.716 5.90342 19.615 9.33394C17.9162 14.7218 10.6607 18.7408 10.353 18.9094C10.2436 18.9698 10.1224 19 10.0013 19Z"
                                                                    fill="currentColor" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M15.7806 7.42904C15.4025 7.42904 15.0821 7.13968 15.0508 6.75775C14.9864 5.95687 14.4491 5.2807 13.6841 5.03421C13.2983 4.9095 13.0873 4.49737 13.2113 4.11446C13.3373 3.73059 13.7467 3.52209 14.1335 3.6429C15.4651 4.07257 16.398 5.24855 16.5123 6.63888C16.5445 7.04127 16.2446 7.39397 15.8412 7.42612C15.8206 7.42807 15.8011 7.42904 15.7806 7.42904Z"
                                                                    fill="currentColor" />
                                                            </svg>

                                                            <span class="tp-product-tooltip">Add To Wishlist</span>
                                                        </a>

                                                    </div>
                                                </div>

                                            </div>
                                            <!-- product content -->
                                            <div class="tp-product-content">
                                                <div class="tp-product-category">
                                                    <a
                                                        href="javascript:;">{{ $product['subcategory']['subcategory_name'] }}</a>
                                                </div>
                                                <h3 class="tp-product-title">
                                                    <a
                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                                        {{ $product->product_name }}
                                                    </a>
                                                </h3>

                                                <div class="tp-product-category">
                                                    @if ($product->vendor_id == null)
                                                        <a href="javascript:;">By Admin</a>
                                                    @else
                                                        <a href="javascript:;">By {{ $product['user']['name'] }}</a>
                                                    @endif
                                                </div>

                                                @php
                                                    $reviewcount = App\Models\Review::where('product_id', $product->id)
                                                        ->where('status', 1)
                                                        ->latest()
                                                        ->get();

                                                    $avarage = App\Models\Review::where('product_id', $product->id)
                                                        ->where('status', 1)
                                                        ->avg('rating');
                                                @endphp

                                                <div class="tp-product-rating d-flex align-items-center">

                                                    <div class="tp-product-rating-icon">

                                                        @if ($avarage == 0)
                                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        
                                                        @elseif($avarage == 1 || $avarage < 2)
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        @elseif($avarage == 2 || $avarage < 3)
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        @elseif($avarage == 3 || $avarage < 4)
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        @elseif($avarage == 4 || $avarage < 5)
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span> <span><i
                                                                    class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star text-secondary"></i></span>
                                                        @elseif($avarage == 5 || $avarage < 5)
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span> <span><i
                                                                    class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                            <span><i class="fa-solid fa-star"></i></span>
                                                        @endif

                                                    </div>

                                                    <div class="tp-product-rating-text">
                                                        <span>({{ count($reviewcount) }} Review)</span>
                                                    </div>
                                                    
                                                </div>

                                                <div class="tp-product-price-wrapper">

                                                    @if ($product->discount_price == null)
                                                        <span class="tp-product-price new-price">Tk
                                                            {{ $product->selling_price }}</span>
                                                    @else
                                                        <span class="tp-product-price old-price">Tk
                                                            {{ $product->selling_price }}</span>
                                                        <span class="tp-product-price new-price">Tk
                                                            {{ $product->discount_price }}</span>
                                                    @endif


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        {{-- Top Seller  --}}

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
