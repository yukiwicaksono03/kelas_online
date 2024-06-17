@extends('layout')
  


            <main class="main-bg">

                <!-- ==================== Start Slider ==================== -->

                <header class="work-header section-padding pb-0">
                    <div class="container mt-80">
                        <div class="row">
                            <div class="col-12">
                                <div class="caption">
                                    <h6 class="sub-title">Shopping</h6>
                                    <h1>Cart.</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- ==================== End Slider ==================== -->



                <!-- ==================== Start cart ==================== -->

                <section class="shop-cart section-padding">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-11">
                                <div>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Kategori</th>
                                                <th>Item</th>
                                                <th>Detail</th>
                                                <!-- <th>Quantity</th> -->
                                                <!-- <th>Subtotal</th> -->
                                                <th>Fungsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                                <td>
                                                    <h6>
                                                      
                                                    </h6>
                                                </td>
                                                <td data-column="Product">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="img icon-img-80">
                                                                <img src="" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="ml-30">
                                                            <h6></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-column="price">
                                                    <h5 class="fz-10"><pre></pre></h5>
                                                </td>
                                                <!-- <td data-column="  Quantity">
                                                    <div class="counter">
                                                        <span class="down" onClick='decreaseCount(event, this)'>-</span>
                                                        <input type="text" value="1">
                                                        <span class="up" onClick='increaseCount(event, this)'>+</span>
                                                    </div>
                                                </td> -->
                                                <!-- <td data-column="Subtotal">
                                                    <h5 class="main-color4 fz-18">$130.00</h5>
                                                </td> -->
                                                <td class="remove">
                                                    <a href="#0">
                                                        <span class="pe-7s-edit"></span>
                                                    </a>
                                                    <a href="#0">
                                                        <span class="pe-7s-close"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row mt-80">
                                    <div class="col-lg-6">
                                        <div class="coupon mt-40" style="display:none;">
                                            <h4>Discount</h4>
                                            <p class="fz-13">Enter your coupon code if you have one.</p>
                                            <form action="contact.php">
                                                <div class="form-group d-flex mt-30">
                                                    <input type="text" name="coupon_code">
                                                    <button type="submit" class="butn butn-md butn-bord">
                                                        <span>Apply</span>
                                                    </button>
                                                </div>
                                                <span class="fz-13 opacity-7 mt-10">Coupon code</span>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 offset-lg-2">
                                        <div class="total mt-40">
                                            <!-- <h4>Cart totals</h4>
                                            <ul class="rest mt-30">
                                                <li class="mb-5">
                                                    <h6>Subtotal : <span class="fz-16 main-color4 ml-10">$130.00</span></h6>
                                                </li>
                                                <li>
                                                    <h6>Total : <span class="fz-16 main-color4 ml-10">$260.00</span></h6>
                                                </li>
                                            </ul> -->
                                            <a href="/checkout" class="butn butn-md butn-bg main-colorbg4 mt-30" id="datadiri">
                                                <span class="text-u fz-13 fw-600">Isi Datadiri > </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ==================== End cart ==================== -->


            </main>
