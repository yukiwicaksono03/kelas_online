@extends('layout')
@section('content')

<!--====== Start Booking Section ======-->
<br>
<br>

        <!--====== Start Blog Details Section ======-->
        <section class="blog-details-section pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <!--=== Blog Details Wrapper ===-->
                        <div class="blog-details-wrapper pr-lg-50">
                            <div class="blog-post mb-60 wow fadeInUp">
                                <div class="post-thumbnail">
                                    <img src="{{ url('/images').'/'.$gambar->lokasi }}" alt="Blog Image">
                                </div>
                                <div class="post-meta text-center pt-25 pb-15 mb-25">
                                    <!-- <span><i class="far fa-user"></i><a href="#">Matthew N. Davis</a></span>
                                    <span><i class="far fa-calendar-alt"></i><a href="#">November 23,2022</a></span>
                                    <span><i class="far fa-comment"></i><a href="#">Comments (05)</a></span> -->
                                </div>
                                <div class="main-post">
                                    <div class="entry-content">
                                        <h3 class="title">{{ $gambar->nama}}</h3>
                                        <p>{{ $gambar->deskripsi}}</p>
                                        
                                        <!-- <blockquote class="block-quote">
                                            <img src="assets/images/blog/quote.png" alt="quote image">
                                            <h3>Handling Mounting And Unmounting Given
                                                Navigation Routes In React Native</h3>
                                            <span>Johnny M. Martin</span>
                                        </blockquote> -->
                                    </div>
                                </div>
                                <div class="entry-footer wow fadeInUp">
                                    <div class="tag-links">
                                        <h6>Popular Tags</h6>
                                        <a href="#">Camping</a>
                                        <a href="#">Tent Camp</a>
                                        <a href="#">Couple Cabin</a>
                                    </div>
                                    <div class="social-share">
                                        <h6>Share News :</h6>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="sidebar-widget-area">
                            <!--=== Search Widget ===-->
                            <div class="sidebar-widget search-widget mb-30 wow fadeInUp">
                                <h4 class="widget-title">Search</h4>
                                <form>
                                    <div class="form_group">
                                        <label><i class="far fa-search"></i></label>
                                        <input type="text" class="form_control" placeholder="Keywords" name="search" required>
                                    </div>
                                </form>
                            </div>
                            <!--=== Category Widget ===-->
                            <!-- <div class="sidebar-widget category-widget mb-30 wow fadeInUp">
                                <h4 class="widget-title">Category</h4>
                                <ul class="category-nav">
                                    <li><a href="#">Tent Camping<i class="far fa-arrow-right"></i></a></li>
                                    <li><a href="#">Family Camping<i class="far fa-arrow-right"></i></a></li>
                                    <li><a href="#">Wild Camping<i class="far fa-arrow-right"></i></a></li>
                                    <li><a href="#">Campfire <i class="far fa-arrow-right"></i></a></li>
                                    <li><a href="#">Luxury Cabin <i class="far fa-arrow-right"></i></a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section><!--====== End Blog Details Section ======-->
        <!--====== Start Gallery Section ======-->
        <section class="gallery-section mbm-150">
            <div class="container-fluid">
                <div class="slider-active-5-item wow fadeInUp">
                    <!--=== Single Gallery Item ===-->
                    <div class="single-gallery-item">
                        <div class="gallery-img">
                            <img src="assets/images/gallery/gl-1.jpg" alt="Gallery Image">
                            <div class="hover-overlay">
                                <a href="assets/images/gallery/gl-1.jpg" class="icon-btn img-popup"><i class="far fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--=== Single Gallery Item ===-->
                    <div class="single-gallery-item">
                        <div class="gallery-img">
                            <img src="assets/images/gallery/gl-2.jpg" alt="Gallery Image">
                            <div class="hover-overlay">
                                <a href="assets/images/gallery/gl-2.jpg" class="icon-btn img-popup"><i class="far fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--=== Single Gallery Item ===-->
                    <div class="single-gallery-item">
                        <div class="gallery-img">
                            <img src="assets/images/gallery/gl-3.jpg" alt="Gallery Image">
                            <div class="hover-overlay">
                                <a href="assets/images/gallery/gl-3.jpg" class="icon-btn img-popup"><i class="far fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--=== Single Gallery Item ===-->
                    <div class="single-gallery-item">
                        <div class="gallery-img">
                            <img src="assets/images/gallery/gl-4.jpg" alt="Gallery Image">
                            <div class="hover-overlay">
                                <a href="assets/images/gallery/gl-4.jpg" class="icon-btn img-popup"><i class="far fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--=== Single Gallery Item ===-->
                    <div class="single-gallery-item">
                        <div class="gallery-img">
                            <img src="assets/images/gallery/gl-5.jpg" alt="Gallery Image">
                            <div class="hover-overlay">
                                <a href="assets/images/gallery/gl-5.jpg" class="icon-btn img-popup"><i class="far fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--=== Single Gallery Item ===-->
                    <div class="single-gallery-item">
                        <div class="gallery-img">
                            <img src="assets/images/gallery/gl-3.jpg" alt="Gallery Image">
                            <div class="hover-overlay">
                                <a href="assets/images/gallery/gl-3.jpg" class="icon-btn img-popup"><i class="far fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--====== End Gallery Section ======-->
        
@endsection

