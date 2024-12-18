@extends('website.main')
@section('title', 'Services')
@section('content')


<section id="our-services" class="text-center mt-5 pt-4">
    <div class="container mt-5">
        <div class="row">
            <!-- Categories Sidebar -->
            <div class="col-md-3 mb-4">
                <div class="post-sidebar">
                    <!-- Sidebar Categories -->
                    <div class="widget sidebar-categories bg-gray border rounded-3 p-3 mb-5">
                        <h5 class="widget-title text-uppercase border-bottom pb-3 mb-3">Services We Offer</h5>
                        <ul class="list-unstyled">
                            <!-- Link to All Services -->
                            <li class="{{ !isset($selectedCategory) ? 'active' : '' }}">
                                <a href="{{ route('website.services.index') }}"
                                    class="item-anchor text-capitalize d-flex align-items-center">
                                    <svg width="18" height="18">
                                        <use xlink:href="#alt-arrow-right-bold"></use>
                                    </svg>All Services
                                </a>
                            </li>
                            <!-- Specific Categories -->
                            @foreach($categories as $category)
                            <li
                                class="{{ isset($selectedCategory) && $selectedCategory->id == $category->id ? 'active' : '' }}">
                                <a href="{{ route('website.services.category', $category->id) }}"
                                    class="item-anchor text-capitalize d-flex align-items-center">
                                    <svg width="18" height="18">
                                        <use xlink:href="#alt-arrow-right-bold"></use>
                                    </svg>{{ $category->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>



                    <!-- Have Any Questions Section -->
                    <div class="widget sidebar-any-questions bg-gray border rounded-3 p-3">
                        <h5 class="widget-title text-uppercase border-bottom pb-3 mb-3">Have any questions?</h5>
                        <form action="#" method="POST">
                            <input type="text" name="name" placeholder="Full Name" class="form-control mb-3" required>
                            <input type="email" name="email" placeholder="Email" class="form-control mb-3" required>
                            <textarea name="details" placeholder="Details" rows="4" class="form-control mb-3"
                                required></textarea>
                            <button type="submit"
                                class="btn btn-primary btn-block btn-pill text-uppercase">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Services Section -->
            <main class="post-grid col-md-9">
                <div class="row">
                    <article class="post-item">
                        <div class="section-title mb-5">
                            <p class="mb-2 fs-4 text-capitalize">Providing the best</p>
                            <h1>{{ $service->name }}</h1> <!-- عرض اسم الخدمة -->
                        </div>
                        <div class="hero-image">
                            @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}"
                                class="img-fluid mb-5 rounded-4">
                            @else
                            <img src="images/single-service-img.jpg" alt="single-service"
                                class="img-fluid mb-5 rounded-4">
                            @endif
                        </div>
                        <p>{{ $service->description }}</p> <!-- عرض وصف الخدمة -->
                        <p><strong>Price:</strong> JD {{ number_format($service->price, 2) }}</p> <!-- عرض السعر -->
                        <p><strong>Duration:</strong> {{ $service->duration }} hours</p> <!-- عرض مدة الخدمة -->

                        <!-- تفاصيل أخرى إذا كانت موجودة في جدول الخدمة -->
                        @if($service->additional_info)
                        <p><strong>Additional Info:</strong> {{ $service->additional_info }}</p>
                        @endif

                        <!-- يمكنك إضافة المزيد من الحقول حسب الجدول الخاص بالخدمة -->
                    </article>
                </div>
            </main>


        </div>
    </div>
</section>





@endsection