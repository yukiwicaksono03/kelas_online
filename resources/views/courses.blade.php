@extends('layout')
@section('content')



@php
$arr_id
@endphp
<script type="text/javascript">

// window.onload = function() {
//   alert(@php $arr_id @endphp);
// };


function cari(id){
    // alert(id);
    location.replace("/courses"+id);
    // var input1 = $("#input1").val(); //Tgl
    // var input2 = $("#input2").val(); //Jam
    // var input3 = $("#input3").val(); //Jml org
    // var input4 = $("#input4").val(); //Nama
    // var list_item = $("#list_item").val();
    // var list_item_json = $("#list_item_json").val();
    // // var token = $('input[name="_token"]').val();

    // if(!input1){
    //     alert('Mohon masukkan tanggal booking !');
    //     return false;
    // }
    // if(!input2){
    //     alert('Mohon masukkan jam booking !');
    //     return false;
    // }
    // if(!input3){
    //     alert('Mohon masukkan jumlah pengunjung !');
    //     return false;
    // }
    // if(!input4){
    //     alert('Mohon isi Nama pengunjung !');
    //     return false;
    // }

    // var parts = input1.split("/");
    // var formattedDate = `${parts[2]}-${parts[0]}-${parts[1]}`;


      // if (confirm("Yakin dengan pesanan anda ?") == true) {

        $.post("/save_trans",
        {
          // token: token,
            "_token": "{{ csrf_token() }}",
            id : id,
            // notes : list_item,
            // jml_org : input3,
            // tgl_booking : formattedDate+' '+input2,
            // tipe_order : 'resto',
            // "data_json": list_item_json
        },
        function(data,status){
            
            
            if(data == 't'){
                // alert('Item berhasil ditambahkan.');
                location.replace("/cart");
            }
          // alert("Data: " + data + "\nStatus: " + status);
        });
        // return false;
      // } else {
      //   return false;
      // }

}

        document.addEventListener("DOMContentLoaded", () => {
            const checkboxes = document.querySelectorAll(".form-check-input");
            const inputText = document.getElementById("selectedCategories");

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener("change", () => {
                    const selectedCategories = Array.from(checkboxes)
                        .filter(checkbox => checkbox.checked)
                        .map(checkbox => checkbox.value);

                    inputText.value = selectedCategories.join(",");
                });
            });
        });
</script>



    <!-- main-area -->
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="../assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h3 class="title">All Courses</h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.html">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Courses</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__shape-wrap">
                <img src="../assets/img/others/breadcrumb_shape01.svg" alt="img" class="alltuchtopdown">
                <img src="../assets/img/others/breadcrumb_shape02.svg" alt="img" data-aos="fade-right" data-aos-delay="300">
                <img src="../assets/img/others/breadcrumb_shape03.svg" alt="img" data-aos="fade-up" data-aos-delay="400">
                <img src="../assets/img/others/breadcrumb_shape04.svg" alt="img" data-aos="fade-down-left" data-aos-delay="400">
                <img src="../assets/img/others/breadcrumb_shape05.svg" alt="img" data-aos="fade-left" data-aos-delay="400">
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- all-courses -->
        <section class="all-courses-area section-py-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 order-2 order-lg-0">
                        <aside class="courses__sidebar">
                            <div class="courses-widget">
                                <h4 class="widget-title">Categories</h4>
                                <div class="courses-cat-list">
                                    <ul class="list-wrap">
                                        @foreach($kategori as $kat)
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{$kat->kat_id}}" id="kat_{{$kat->kat_id}}">
                                                <label class="form-check-label" for="ckt_{{$kat->kat_id}}">{{$kat->nama}}</label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                        <input type="hidden" class="form-control" id="selectedCategories" readonly>
                                    <div class="show-more">
                                        <a href="#" onclick="location.replace('/courses/'+document.getElementById('selectedCategories').value);" class="btn arrow-btn">Cari <img src="../assets/img/icons/right_arrow.svg" alt="img" class="injectable"></a>
                                    </div>

                                </div>
                            </div>
<!--                             <div class="courses-widget">
                                <h4 class="widget-title">Language</h4>
                                <div class="courses-cat-list">
                                    <ul class="list-wrap">
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang_1">
                                                <label class="form-check-label" for="lang_1">All Language</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang_2">
                                                <label class="form-check-label" for="lang_2">Arabic (11)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang_3">
                                                <label class="form-check-label" for="lang_3">English (53)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lang_4">
                                                <label class="form-check-label" for="lang_4">Spanish (22)</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="show-more">
                                    <a href="#">Show More +</a>
                                </div>
                            </div>
                            <div class="courses-widget">
                                <h4 class="widget-title">Price</h4>
                                <div class="courses-cat-list">
                                    <ul class="list-wrap">
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="price_1">
                                                <label class="form-check-label" for="price_1">All Price</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="price_2">
                                                <label class="form-check-label" for="price_2">Free</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="price_3">
                                                <label class="form-check-label" for="price_3">Paid</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="courses-widget">
                                <h4 class="widget-title">Skill level</h4>
                                <div class="courses-cat-list">
                                    <ul class="list-wrap">
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="difficulty_1">
                                                <label class="form-check-label" for="difficulty_1">All Skills</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="difficulty_2">
                                                <label class="form-check-label" for="difficulty_2">Beginner (55)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="difficulty_3">
                                                <label class="form-check-label" for="difficulty_3">Intermediate (22)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="difficulty_4">
                                                <label class="form-check-label" for="difficulty_4">High (42)</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="courses-widget">
                                <h4 class="widget-title">Instructors</h4>
                                <div class="courses-cat-list">
                                    <ul class="list-wrap">
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="ins_1">
                                                <label class="form-check-label" for="ins_1">David Millar (10)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="ins_2">
                                                <label class="form-check-label" for="ins_2">Wade Warren (13)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="ins_3">
                                                <label class="form-check-label" for="ins_3">Jenny Wilson (22)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="ins_4">
                                                <label class="form-check-label" for="ins_4">Jacob Jones (42)</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="show-more">
                                    <a href="#">Show More +</a>
                                </div>
                            </div>
                            <div class="courses-widget">
                                <h4 class="widget-title">Ratings</h4>
                                <div class="courses-rating-list">
                                    <ul class="list-wrap">
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <div class="rating">
                                                    <ul class="list-wrap">
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                    <span>(42)</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <div class="rating">
                                                    <ul class="list-wrap">
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li class="delete"><i class="fas fa-star"></i></li>
                                                    </ul>
                                                    <span>(23)</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <div class="rating">
                                                    <ul class="list-wrap">
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li class="delete"><i class="fas fa-star"></i></li>
                                                        <li class="delete"><i class="fas fa-star"></i></li>
                                                    </ul>
                                                    <span>(11)</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <div class="rating">
                                                    <ul class="list-wrap">
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li class="delete"><i class="fas fa-star"></i></li>
                                                        <li class="delete"><i class="fas fa-star"></i></li>
                                                        <li class="delete"><i class="fas fa-star"></i></li>
                                                    </ul>
                                                    <span>(7)</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <div class="rating">
                                                    <ul class="list-wrap">
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li class="delete"><i class="fas fa-star"></i></li>
                                                        <li class="delete"><i class="fas fa-star"></i></li>
                                                        <li class="delete"><i class="fas fa-star"></i></li>
                                                        <li class="delete"><i class="fas fa-star"></i></li>
                                                    </ul>
                                                    <span>(3)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                        </aside>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="courses-top-wrap courses-top-wrap">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="courses-top-left">
                                        <p>Showing 250 total results</p>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="d-flex justify-content-center justify-content-md-end align-items-center flex-wrap">
                                        <div class="courses-top-right m-0 ms-md-auto">
                                            <span class="sort-by">Sort By:</span>
                                            <div class="courses-top-right-select">
                                                <select name="orderby" class="orderby">
                                                    <option value="Most Popular">Most Popular</option>
                                                    <option value="popularity">popularity</option>
                                                    <option value="average rating">average rating</option>
                                                    <option value="latest">latest</option>
                                                    <option value="latest">latest</option>
                                                </select>
                                            </div>
                                        </div>
                                        <ul class="nav nav-tabs courses__nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="grid-tab" data-bs-toggle="tab" data-bs-target="#grid" type="button" role="tab" aria-controls="grid" aria-selected="true">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6 1H2C1.44772 1 1 1.44772 1 2V6C1 6.55228 1.44772 7 2 7H6C6.55228 7 7 6.55228 7 6V2C7 1.44772 6.55228 1 6 1Z"  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M16 1H12C11.4477 1 11 1.44772 11 2V6C11 6.55228 11.4477 7 12 7H16C16.5523 7 17 6.55228 17 6V2C17 1.44772 16.5523 1 16 1Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M6 11H2C1.44772 11 1 11.4477 1 12V16C1 16.5523 1.44772 17 2 17H6C6.55228 17 7 16.5523 7 16V12C7 11.4477 6.55228 11 6 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M16 11H12C11.4477 11 11 11.4477 11 12V16C11 16.5523 11.4477 17 12 17H16C16.5523 17 17 16.5523 17 16V12C17 11.4477 16.5523 11 16 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="list-tab" data-bs-toggle="tab" data-bs-target="#list" type="button" role="tab" aria-controls="list" aria-selected="false">
                                                    <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1.5 6C0.67 6 0 6.67 0 7.5C0 8.33 0.67 9 1.5 9C2.33 9 3 8.33 3 7.5C3 6.67 2.33 6 1.5 6ZM1.5 0C0.67 0 0 0.67 0 1.5C0 2.33 0.67 3 1.5 3C2.33 3 3 2.33 3 1.5C3 0.67 2.33 0 1.5 0ZM1.5 12C0.67 12 0 12.68 0 13.5C0 14.32 0.68 15 1.5 15C2.32 15 3 14.32 3 13.5C3 12.68 2.33 12 1.5 12ZM5.5 14.5H17.5C18.05 14.5 18.5 14.05 18.5 13.5C18.5 12.95 18.05 12.5 17.5 12.5H5.5C4.95 12.5 4.5 12.95 4.5 13.5C4.5 14.05 4.95 14.5 5.5 14.5ZM5.5 8.5H17.5C18.05 8.5 18.5 8.05 18.5 7.5C18.5 6.95 18.05 6.5 17.5 6.5H5.5C4.95 6.5 4.5 6.95 4.5 7.5C4.5 8.05 4.95 8.5 5.5 8.5ZM4.5 1.5C4.5 2.05 4.95 2.5 5.5 2.5H17.5C18.05 2.5 18.5 2.05 18.5 1.5C18.5 0.95 18.05 0.5 17.5 0.5H5.5C4.95 0.5 4.5 0.95 4.5 1.5Z" fill="currentColor" />
                                                    </svg>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                                <div class="row courses__grid-wrap row-cols-1 row-cols-xl-3 row-cols-lg-2 row-cols-md-2 row-cols-sm-1">
                                    @foreach($gambar as $item)
                                    <div class="col">
                                        <div class="courses__item shine__animate-item">
                                            <div class="courses__item-thumb">
                                                <a href="../course_detail/{{$item->gid}}" class="shine__animate-link">
                                                    <img src="{{ asset('images/') }}/{{$item->lokasi}}" alt="img">
                                                </a>
                                            </div>
                                            <div class="courses__item-content">
                                                <ul class="courses__item-meta list-wrap">
                                                    <li class="courses__item-tag">
                                                        <a href="course.html">Development</a>
                                                    </li>
                                                    <li class="avg-rating"><i class="fas fa-star"></i> (4.8 Reviews)</li>
                                                </ul>
                                                <h5 class="title"><a href="/detail_kategori/{{$item->kategori}}">{{$item->nama}}</a></h5>
                                                <p class="author">By <a href="#">David Millar</a></p>
                                                <div class="courses__item-bottom">
                                                    <div class="button">
                                                        <a href="../course_detail/{{$item->gid}}">
                                                            <span class="text">Enroll Now</span>
                                                            <i class="flaticon-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                    <h5 class="price">$15.00</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <nav class="pagination__wrap mt-30">
                                    <ul class="list-wrap">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="courses.html">2</a></li>
                                        <li><a href="courses.html">3</a></li>
                                        <li><a href="courses.html">4</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                                <div class="row courses__list-wrap row-cols-1">
                                @foreach($gambar as $item)
                                    <div class="col">
                                        <div class="courses__item courses__item-three shine__animate-item">
                                            <div class="courses__item-thumb">
                                                <a href="../course_detail/{{$item->gid}}" class="shine__animate-link">
                                                    <img src="{{ asset('images/') }}/{{$item->lokasi}}" alt="img">
                                                </a>
                                            </div>
                                            <div class="courses__item-content">
                                                <ul class="courses__item-meta list-wrap">
                                                    <li class="courses__item-tag">
                                                        <a href="course.html">Development</a>
                                                        <div class="avg-rating">
                                                            <i class="fas fa-star"></i> (4.8 Reviews)
                                                        </div>
                                                    </li>
                                                    <li class="price"><del>$29.00</del>$15.00</li>
                                                </ul>
                                                <h5 class="title"><a href="/detail_kategori/{{$item->kategori}}">{{$item->nama}}</a></h5>

                                                <p class="author">By <a href="#">David Millar</a></p>
                                                <p class="info">when an unknown printer took a galley of type and scrambled type specimen book It has survived not only.</p>
                                                <div class="courses__item-bottom">
                                                    <div class="button">
                                                        <a href="../course_detail/{{$item->gid}}">
                                                            <span class="text">Enroll Now</span>
                                                            <i class="flaticon-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                                <nav class="pagination__wrap mt-30">
                                    <ul class="list-wrap">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="courses.html">2</a></li>
                                        <li><a href="courses.html">3</a></li>
                                        <li><a href="courses.html">4</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- all-courses-end -->

    </main>
    <!-- main-area-end -->





@endsection