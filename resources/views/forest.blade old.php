@extends('layout')
@section('content')

<!--====== Start Booking Section ======-->
<br>
<br>
        <section class="booking-section pt-60 pb-50">
            <div class="container">
                <div class="row align-items-xl-center">
                    <div class="col-lg-6">
                        <!--=== Booking Content Box ===-->
                        <div class="booking-content-box mb-50 wow fadeInLeft">
                            <div class="section-title mb-50">
                                <!-- <span class="sub-title">Availability</span> -->
                                <h2>Booking Your Best Tour
                                    Camping Availability</h2>
                            </div>
                            <form class="booking-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_group">
                                            <label><i class="far fa-calendar-alt"></i></label>
                                            <input type="text" class="form_control datepicker" placeholder="Check In">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form_group">
                                            <label><i class="far fa-calendar-alt"></i></label>
                                            <input type="text" class="form_control datepicker" placeholder="Check Out">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form_group">
                                            <label><i class="far fa-user-alt"></i></label>
                                            <input type="text" class="form_control" placeholder="Guest" name="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form_group">
                                            <select class="wide">
                                                <option data-display="Accommodations">Accommodations</option>
                                                <option value="01">Classic Tent</option>
                                                <option value="01">Forest Camping</option>
                                                <option value="01">Small Trailer</option>
                                                <option value="01">Tree House Tent</option>
                                                <option value="01">Tent Camping</option>
                                                <option value="01">Couple Tent</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="comments" placeholder="Comments" class="form_control" cols="8" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form_group">
                                            <button class="main-btn primary-btn">Check availability<i class="fas fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!--=== Booking Image Box ===-->
                        <div class="booking-image-box mb-50 ml-lg-45 wow fadeInRight">
                            <img src="assets/images/contact/contact-1.jpg" class="radius-60" alt="Contact Image">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End Hero Section ======-->

        <!--====== Start Gallery Section ======-->
        <section class="gallery-section mbm-150">
            <div class="container-fluid">
                <div class="slider-active-5-item wow fadeInUp">
                    <!--=== Single Gallery Item ===-->


                    <!--=== Features Image Item ===-->
                    @foreach($gambar as $item)
                    @if($item->is_aktif == 1)
                    @if($item->kategori == 3)
                    <div class="single-gallery-item">
                        <div class="gallery-img">
                            <img src="{{ asset('images/') }}/{{$item->lokasi}}" alt="Gallery Image">
                            <div class="hover-overlay">
                                <a href="{{ asset('images/') }}/{{$item->lokasi}}" class="icon-btn img-popup"><i class="far fa-plus"></i></a>
                            </div>
                        </div>
                    </div>

                    @endif
                    @endif
                    @endforeach
                </div>
            </div>
        </section>
        <!--====== End Gallery Section ======-->
@endsection

