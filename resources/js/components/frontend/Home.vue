<template>
    <section>  
        <div class="hero-area v1 pad-bot-150 pt-160 pb-100" :style="{'background-image': 'url(public/frontend/images/header/mask_group.png)'}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="hero-img text-left">
                            <!-- <img src="images/about/about.png" alt="..."> -->
                            <p class="hero-desc v2">
                                Pick & Drop Repair Service Platform                                
                            </p>
                            <h1 class="hero-title v2" style="margin-top:-10px;">
                                First Time                               
                            </h1>
                            <p class="hero-desc v2" style="margin-top:-10px;">
                               In Bangladesh
                            </p>
                           <button class="btn v3  mar-right-5" type="button" data-toggle="modal"
                                data-target="#coupon_wrap"><i class="ion-ios-quote" aria-hidden="true"></i> Get
                                Query</button>

                            <button class="btn v3  mar-right-5" type="button" data-toggle="modal"
                                data-target="#instant_call"><i class="ion-ios-quote" aria-hidden="true"></i> Get instant
                                call</button>

                            <button class="btn v3  mar-right-5 show_request_submit_modal" style="display:none;" @click.prevent="resetFormElm()" type="button" data-toggle="modal"
                                data-target="#request_submit"><i class="ion-ios-quote" aria-hidden="true"></i> Get instant
                                call</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                            </div>
                            <div class="col-md-12 text-center mar-top-20">
                                <form class="hero__form v2 mar-bot-30">
                                    <div class="row">                                  
                                        
                                        <div class="col-md-12">
                                            <div class="text-left">
                                                <!-- <button class="btn v3  mar-right-5" type="button" data-toggle="modal" data-target="#coupon_wrap"><i class="ion-ios-quote" aria-hidden="true"></i> GET A QUOTE</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--modal start  -->
        <div class="modal fade" id="coupon_wrap" style="z-index:999999">
            <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
                <div class="modal-content">
                    <form class="form" @submit.prevent="isOtp == false?getQuotation():otpVerify()">
                        <div class="modal-header modal-header-bg-color">
                            <h4 class="modal-title" style="color: white;" id="myModalLabel">Get a Estimated Quotation</h4>
                            <button type="button" class="close" style="color: white;" data-dismiss="modal"
                                aria-label="Close"><span aria-hidden="true"><i
                                        class="ion-ios-close-empty"></i></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row" v-if="isOtp">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>OTP Verification</label>
                                        <input type="hidden" class="form-control  filter-input" name="confirm_quotation_otp" v-model="inputData.confirm_quotation_otp">
                                        <input type="text" class="form-control  filter-input" name="quotation_otp" placeholder="xxxx" v-model="inputData.quotation_otp">
                                    </div>
                                </div>
                            </div>
                            <div class="row" v-if="isOtp == false">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" v-model="inputData.name"
                                            class="form-control  filter-input" placeholder="Name" required>

                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" name="phone_number" v-model="inputData.phone_number"
                                            class="form-control  filter-input" placeholder="01xxxxxxxxx" required>

                                    </div>
                                    <div class="form-group">
                                        <label>Brand</label>
                                        <input type="brand_name" name="brand_name" v-model="inputData.brand_name"
                                            class="form-control  filter-input" placeholder="Brand" required>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" v-model="inputData.email"
                                            class="form-control  filter-input" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Device Name</label>
                                        <input type="text" name="device_name" v-model="inputData.device_name"
                                            class="form-control  filter-input" placeholder="Device Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Model</label>
                                        <input type="model_number" name="model_number" v-model="inputData.model_number"
                                            class="form-control  filter-input" placeholder="Model" required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                   <div class="form-group">
                                        <label>Problem</label>
                                       <textarea name="problem" class="form-control filter-input" v-model="inputData.problem" id="" cols="10" rows="5" required></textarea>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="coupon-bottom" style="padding: 0px 15px;">
                             <button type="submit" v-if="isOtp == true" class="btn v1 float-right">OTP Verify</button>

                            <button type="submit" v-if="isOtp == false" class="btn v1 float-right">Submit Request</button>

                            <button type="button" v-if="isOtp == false" class="btn v1 float-right close_modal" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!--modal end  -->
         <!--request modal start  -->
        <div class="modal fade" id="instant_call" style="z-index:999999">
            <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
                <div class="modal-content">
                    <div class="modal-header modal-header-bg-color">
                        <h4 class="modal-title" style="color: white;" id="myModalLabel">Get a free call</h4>
                        <button type="button" class="close close_modal" style="color: white;" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true"><i
                                    class="ion-ios-close-empty"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="isOtp == false?getInstantCall():otpVerify()">
                            <div class="row" v-if="isOtp">
                                <div class="col-md-12 col-lg-12">
                                     <div class="form-group">
                                        <label>Verification</label>
                                        <input type="hidden" name="confirm_otp" v-model="instantCallData.confirm_otp">
                                        <input type="text" name="otp" v-model="instantCallData.otp"
                                            class="form-control  filter-input" placeholder="xxxx">
                                    </div>
                                    <button v-if="isOtp" type="submit" class="btn v1 float-right">Verify</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group" v-if="isOtp == false">
                                        <label>Name</label>
                                        <input type="text" name="name" v-model="instantCallData.name"
                                            class="form-control  filter-input" placeholder="Name">
                                    </div>
                                    <div class="form-group" v-if="isOtp == false">
                                        <label>Email</label>
                                        <input type="text" name="email" v-model="instantCallData.email"
                                            class="form-control  filter-input"
                                            placeholder="Email">
                                    </div>
                                    <div class="form-group" v-if="isOtp == false">
                                        <label>Mobile Number</label>
                                        <input type="text" name="mobile_number" v-model="instantCallData.mobile_number"
                                            class="form-control  filter-input" placeholder="01xxxxxxxxx">
                                    </div>
                                   
                                </div>

                                <div class="coupon-bottom col-md-12 col-lg-12 pull-right">
                                    <button v-if="isOtp == false" type="submit" class="btn v1 float-right">Submit Request</button>
                                    <button v-if="isOtp == false" type="button" class="btn v1 float-right close_modal" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
         <div class="modal fade" id="request_submit" style="z-index:999999">
            <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
                <div class="modal-content">
                    <div class="modal-header modal-header-bg-color">
                        <h4 class="modal-title" style="color: white;" id="myModalLabel"></h4>
                        <button type="button" class="close" style="color: white;" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true"><i
                                    class="ion-ios-close-empty"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-md-12 text-center">
                                <div class="booking-confirmation-page">
                                    <i class="ion-android-checkmark-circle"></i>
                                    <h2 class="margin-top-30">Thanks for your booking!</h2>
                                    <!-- <p>You'll receive a confirmation email at mail@example.com</p> -->
                                    <p>You will be notified after a while!</p>
                                    <!-- <a href="#" class="button margin-top-30">View Invoice</a> -->
                                </div>
                            </div>
                            <div class="coupon-bottom col-md-12 pull-right">
                                <button type="button" class="btn v1 float-right close_notify_modal" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
       <!-- tab design start -->
        <div class="container">   
            <div class="row">

                
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" style="margin-top: -25px;">
              <!-- Rounded tabs -->
                <button class="tablink defaultTablink serviceCatActive" onclick="openCity('London', this, 'red')" id="defaultOpen">Phone</button>
                <button class="tablink" onclick="openCity('Paris', this, 'green')">Tab</button>
                <button class="tablink" onclick="openCity('Tokyo', this, 'blue')">iPad</button>
                <button class="tablink" onclick="openCity('Oslo', this, 'orange')">Laptop</button>
                <button class="tablink" onclick="openCity('Oslo', this, 'orange')">Mac</button>
                <button class="tablink" onclick="openCity('Oslo', this, 'orange')">Others</button>
              
              <!-- End rounded tabs -->
            </div>      
        </div>     
    </div>
          
        <!-- tab design end -->

        <!-- section-padding-our-service -->
        <!--Promo Category starts-->
        <div class="hero-catagory mar-top-30 section-padding" style="padding: 50px 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center"><h2 class="section-title v1">Our Service Process</h2></div>
                    <div class="col-md-12">
                        <div class="hero-catagory-wrapper v1">
                            <a class="hero-category-content v1" style="background: white;box-shadow: 4px 0px 3px rgba(0, 0, 0, 0.25) !important;">
                                <h5>Service Inquiry</h5>
                                <p>Step</p>
                                <h6>01</h6>
                                <p>Let us know your all Inquiries</p>
                            </a>
                            
                            <a class="hero-category-content v1" style="background: white;box-shadow: 4px 0px 3px rgba(0, 0, 0, 0.25) !important;">
                                <h5>Service Booking</h5>
                                <p>Step</p>
                                <h6>02</h6>
                                <p>Book your service, we will come to you</p>
                            </a>
                            <a class="hero-category-content v1" style="background: white;box-shadow: 4px 0px 3px rgba(0, 0, 0, 0.25) !important;">
                                <h5>Pick location</h5>
                                <p>Step</p>
                                <h6>03</h6>
                                <p>Confirm your device picking location</p>
                            </a>
                            <a class="hero-category-content v1" style="background: white;box-shadow: 4px 0px 3px rgba(0, 0, 0, 0.25) !important;">
                                <h5>Device Diagnosis</h5>
                                <p>Step</p>
                                <h6>04</h6>
                                <p>After picking device Diagnosis with care</p>
                            </a>
                            <a class="hero-category-content v1" style="background: white;box-shadow: 4px 0px 3px rgba(0, 0, 0, 0.25) !important;">
                                <h5>Device QC</h5>
                                <p>Step</p>
                                <h6>05</h6>
                                <p>We carefully pass QC before delivery</p>
                            </a>
                            <a class="hero-category-content v1" style="background: white;box-shadow: 4px 0px 3px rgba(0, 0, 0, 0.25) !important;">
                                <h5>Delivery</h5>
                                <p>Step</p>
                                <h6>06</h6>
                                <p>Finally we deliver your device at expected location</p>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Promo Category ends-->
        
         <!--Work-process starts-->
         <div class="work-process  section-padding-how-works ">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center">
                        <h2 class="section-title v1">Service Type</h2>
                    </div>
                    <div class="col-md-4">
                        <a href="">
                        <div class="work-process-content v1 text-center">
                            <div class="process-icon v1">
                                <img :src="'public/frontend/images/others/1.png'" alt="...">
                                <span></span>
                            </div>
                            <h4 class="title"> Pick & Drop Service</h4>
                            <p class="info">
                                Affordable Smartphone and Laptop Pick & Drop Repair Service
                            </p>
                        </div>
                    </a>
                    </div>
                    <div class="col-md-4">
                        <a href="">
                        <div class="work-process-content v1 text-center">
                            <div class="process-icon v1">
                                <img :src="'public/frontend/images/others/2.png'" alt="...">

                                <span></span>

                            </div>
                            <h4 class="title">Home Service</h4>
                            <p class="info">
                               We have expert and reliable technician team for home service
                            </p>
                        </div>
                    </a>
                    </div>
                    <div class="col-md-4">
                        <a href="">
                        <div class="work-process-content v1 text-center">
                            <div class="process-icon v1">
                                <img :src="'public/frontend/images/others/3.png'" alt="...">

                                <span></span>
                            </div>
                            <h4 class="title">Stand by Service</h4>
                            <p class="info">
                               You are always welcome to our premises to get your service
                            </p>
                        </div>
                    </a>
                    </div>
                </div>
            </div>
        </div>
        <!--Work-process ends-->

        <!-- vendor starts -->
        <div class="app-section section-padding-app bg-pn">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="app-content">
                            <h2>Can't find best repair service?</h2>
                            <h5>Let us know.....</h5>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn v3  mar-right-5" type="button" data-toggle="modal1" data-target="#service_provider"><i class="ion-ios-quote" aria-hidden="true"></i>Request Service</button>
                        <button class="btn v3  mar-right-5" style="background: #F5F6F7; border: 2px solid #1B75BC;color: #1B75BC!important;" type="button" ><i class="ion-ios-quote" aria-hidden="true"></i>09642363636</button>
                    </div>
                </div>
               
            </div>
        </div>
        <!-- vendor end -->

        <div class="modal fade" id="service_provider">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header modal-header-bg-color">
                        <h4 class="modal-title" style="color: white;" id="myModalLabel">Registration</h4>
                        <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-ios-close-empty"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name </label>
                                    <input type="text" class="form-control filter-input" placeholder="e.g.Md Hiron">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control filter-input" placeholder="Mobile">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control filter-input" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Experience</label>
                                    <div class=" filter-input" tabindex="0"><span class="current">Select your Experience</span>
                                        <ul class="list">
                                            <li class="option selected focus">3 years</li>
                                            <li class="option">4 years</li>
                                            <li class="option">5 years</li>
                                            <li class="option">7 years</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Districts </label>
                                    <div class=" filter-input" tabindex="0"><span class="current">Select Districts</span>
                                        <ul class="list">
                                            <li class="option selected focus">Natore</li>
                                            <li class="option">Pabna</li>
                                            <li class="option">Gazipur</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <div class=" filter-input" tabindex="0"><span class="current">Select City</span>
                                        <ul class="list">
                                            <li class="option selected focus">Dhaka</li>
                                            <li class="option">Khulna</li>
                                            <li class="option">Sylhet</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <div class=" filter-input" tabindex="0"><span class="current">Select State</span>
                                        <ul class="list">
                                            <li class="option selected focus">Dhaka</li>
                                            <li class="option">Khulna</li>
                                        
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <div class=" filter-input" tabindex="0"><span class="current">Select Zip Code</span>
                                        <ul class="list">
                                            <li class="option selected focus">1212</li>
                                            <li class="option">1213</li>
                                            <li class="option">1309</li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control filter-input" placeholder="Address">
                                </div>

                            </div>                  
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Trade License</label>
                                    <input type="file" class="form-control filter-input">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="coupon-bottom">
                        <button type="button" class="btn v1 float-right" data-dismiss="modal">Request Submit</button>
                        <button type="button" class="btn v1 float-right" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
       
        <!--mobile app start-->
        <div class="app-section section-padding-app bg-white why_choose_us_div">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="app-content">
                            <div class="col-md-12 col-lg-12">
                                <h2>Why choose us?</h2>
                                <h5>Quick, easy and reliable expert team</h5>
                                <ul>
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 title">
                                                <span class="dot"></span> Pick & Drop Service
                                            </div>
                                            <div class="col-md-3 col-lg-2 button_div">
                                                <button  type="button" class="btn v1 readM " disabled>Read more</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li> 
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 title">
                                                <span class="dot"></span> Home Service 
                                            </div>
                                            <div class="col-md-3 col-lg-2 button_div">
                                                <button  type="button" class="btn v1 readM " disabled>Read more</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 title">
                                                <span class="dot"></span> Quick Service
                                            </div>
                                            <div class="col-md-3 col-lg-2 button_div">
                                                <button  type="button" class="btn v1 readM " disabled>Read more</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-8 col-lg-8 title">
                                                <span class="dot"></span> Quality Parts
                                            </div>
                                            <div class="col-md-3 col-lg-2 button_div">
                                                <button  type="button" class="btn v1 readM " disabled>Read more</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-8 col-lg-8 title">
                                                <span class="dot"></span> Warranty
                                            </div>
                                            <div class="col-md-3 col-lg-2 button_div">
                                                <button  type="button" class="btn v1 readM " disabled>Read more</button>
                                            </div>
                                        </div>
                                    </li>
                                    
                                    <li>
                                        <div class="row">
                                            <div class="col-md-8 col-lg-8 title">
                                                <span class="dot"></span> Dedicated Team
                                            </div>
                                            <div class="col-md-3 col-lg-2 button_div">
                                                <button  type="button" class="btn v1 readM " disabled>Read more</button>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6 p-0">
                        <div class="app-img-vendor text-center">
                           <img :src="'/public/frontend/images/why_choose_us.png'" alt="..." style="height: 380px; width:100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--mobile app ends-->
       
         <!--Counter section starts-->
         <div class="counter-section bg-xs pt-35 counter_div" :style="{'background-image': 'url('+url+'/public/frontend/images/category/11.jpg)'}">
            <div class="overlay op-7"></div>
            <div class="container">
                <div class="row pad-tb-30">
                    <div class="col-md-4 col-sm-4" style="width:33.33%;">
                        <div class="counter-text">
                            <i class="icofont-users-social"></i>
                            <h6 class="counter-value">20,346
                            </h6>
                            <p>Customers</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4" style="width:33.33%;">
                        <div class="counter-text">
                            <i class="icofont-users-alt-2"></i>
                            <h6 class="counter-value">135</h6>
                            <p>Service Partner</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4" style="width:33.33%;">
                        <div class="counter-text">
                            <i class="icofont-checked"></i>
                            <h6 class="counter-value">55,008</h6>
                            <p>Completed Order</p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!--Counter section ends-->

        <!--mobile app start-->
        <div class="app-section section-padding-app bg-white service_partner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="app-content">
                            <h2>Looking for the best service partner?</h2>
                            <p> (Tell us why we make you our partner?)</p>
                            <ul>
                                <li><span class="dot"></span> Want to earn more?</li>
                                <li><span class="dot"></span> Are you passionate?</li>
                                <li><span class="dot"></span> Are you loyal?</li>
                                <li><span class="dot"></span> Are you experienced at this field?</li>
                                <li><span class="dot"></span> Do you have any certification on Technical sector?</li>
                            </ul>
                         
                            <div class="device-logo xs-center service_partner_btn_div">
                                <div class="row" style="margin-bottom:-10px;">
                                    <div class="col-md-7 service_partner_btn_div_left">
                                        <h4>Become a <br> service Partner</h4>
                                    </div>
                                    <div class="col-md-5 pt-20 service_partner_btn_div_right">
                                        <button class="btn v3" type="" data-toggle="modal1" data-target="#coupon_wrap"><i class="ion-ios-quote" aria-hidden="true"></i>Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6 p-0">
                        <div class="app-img-vendor text-center">
                           <img :src="'/public/frontend/images/looking-partner.png'" alt="..." style="height: 370px;width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--mobile app ends-->
         
        <!--Partner section ends-->
         <!--mobile app start-->
         <div class="app-section section-padding-blog bg-pn pt-90">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="app-content">
                            <div class="vertical-line"></div>
                            <h2 style="margin-top: -30px;">Our Corporate<br>
                                Clients</h2>
                                <p>Take a glance on our happy corporate clients.</p>
                                
                                <div class="device-logo pt-25 xs-center">
                                <h4 class="corporate_clients float-left" style="text-align: left;">Become a <br> Corporate Client</h4>                               
                                <button class="btn v3  mar-right-5" style="margin-top: -117px;margin-left: 220px;" type="button" data-toggle="modall" data-target="#coupon_wrap"><i class="ion-ios-quote" aria-hidden="true"></i>Apply</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-8 corporate_partner_div" style="margin-top: 15px; float: left;">
                        <div class="swiper-container partner-wrap" style="margin-top: -35px; margin-right: -20px;">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide single-partner" style="text-align:right;">
                                    <div class="text-center">
                                        <img :src="'http://joytechnologieslimited.com/wp-content/uploads/2019/12/joyrebrand2.png'" alt="..." style="height: 40px;">
                                    </div>
                                    <div class="text-center">
                                        <img :src="'https://joy-express.com/home/img/logo2.png'" alt="..."  style="height: 40px;margin-top: 35px;">
                                    </div>
                                    <div class="text-center">
                                        <img :src="'http://red-canvas.com/assets/uploads/2019/08/new-main.png'" alt="..."  style="height: 40px;margin-top: 35px;">
                                    </div>
                                </div>
                                <div class="swiper-slide single-partner" style="text-align:right;">
                                    <div class="text-center">
                                        <img :src="'/public/frontend/images/clients/hbr.png'" alt="..." style="height: 40px;" >
                                    </div>
                                    <div class="text-center">
                                        <img :src="'/public/frontend/images/clients/hbr.png'" alt="..."  style="height: 40px;margin-top: 35px;">
                                    </div>
                                    <div class="text-center">
                                        <img :src="'/public/frontend/images/clients/hbr.png'" alt="..."  style="height: 40px;margin-top: 35px;">
                                    </div>
                                </div>
                                <div class="swiper-slide single-partner" style="text-align:right;">
                                    <div class="text-center">
                                        <img :src="'/public/frontend/images/clients/forbes.png'" alt="..." style="height: 40px;">
                                    </div>
                                    <div class="text-center">
                                        <img :src="'/public/frontend/images/clients/forbes.png'" alt="..."  style="height: 40px;margin-top: 35px;">
                                    </div>
                                    <div class="text-center">
                                        <img :src="'/public/frontend/images/clients/forbes.png'" alt="..."  style="height: 40px;margin-top: 35px;">
                                    </div>
                                </div>
                                <div class="swiper-slide single-partner" style="text-align:right;">
                                    <div class="text-center">
                                        <img :src="'/public/frontend/images/clients/hbr.png'" alt="..." style="height: 40px;">
                                    </div>
                                    <div class="text-center">
                                        <img :src="'/public/frontend/images/clients/forbes.png'" alt="..."  style="height: 40px;margin-top: 35px;">
                                    </div>
                                    <div class="text-center">
                                        <img :src="'/public/frontend/images/clients/forbes.png'" alt="..."  style="height: 40px;margin-top: 35px;">
                                    </div>
                                </div>
                                <div class="swiper-slide single-partner" style="text-align:right;">
                                    <div>
                                        <img :src="'/public/frontend/images/clients/wsi.png'" alt="..." style="height: 40px;">
                                    </div>
                                    <div>
                                        <img :src="'/public/frontend/images/clients/wsi.png'" alt="..."  style="height: 40px;margin-top: 35px;">
                                    </div>
                                    <div>
                                        <img :src="'/public/frontend/images/clients/wsi.png'" alt="..."  style="height: 40px;margin-top: 35px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--mobile app ends-->
        <!--Blog Posts  section-padding-blog starts-->
        <div class="blog-posts v1 pad-top-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center">
                        <h2 class="section-title v1">Popular Posts/Offer</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card single-blog-item v1">
                            <a target="_blank" href="https://www.facebook.com/quickfixbd/photos/a.1787620248163046/2798697017055359/">
                                <img :src="'/public/frontend/images/blog/news_7.jpg'" alt="...">
                                <!-- <a href="#" class="blog-cat btn v6 red">Hotel</a> -->
                                <div class="card-body">
                                    <h4 class="card-title text-center"><a target="_blank" href="https://www.facebook.com/quickfixbd/photos/a.1787620248163046/2798697017055359/">বাসা বা অফিসে বসেই পিক এন্ড ড্রপ বা হোম সার্ভিস নিতে এখনি ভিজিট করুন-</a></h4>
                                    <!-- <h5 class="text-center">Life time replacement gurantee</h5> -->
                                    <!-- <div class="bottom-content">
                                        <p class="date">Sep 28th , 2018 by <a href="#" class="text-dark">Louis Fonsi</a></p>
                                    </div> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card single-blog-item v1">
                            <a target="_blank" href="https://www.facebook.com/quickfixbd/photos/a.1787620248163046/2795726900685704/">
                                <img :src="'/public/frontend/images/blog/news_8.jpg'" alt="...">
                                <!-- <a href="#" class="blog-cat btn v6 red">Restaurant</a> -->
                                <div class="card-body">
                                    <h4 class="card-title text-center"><a target="_blank" href="https://www.facebook.com/quickfixbd/photos/a.1787620248163046/2795726900685704/">রিপেয়ার সার্ভিস নিতে আর কোথাও যেতে হবেনা। এখন বাসা বা অফিসে বসেই হোম সার্ভিস নিন।</a></h4>
                                    <!-- <h5 class="text-center">Life time replacement gurantee</h5> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card single-blog-item v1">
                            <a target="_blank" href="https://www.facebook.com/quickfixbd/photos/a.1787620248163046/2787028314888896">
                                <img :src="'/public/frontend/images/blog/news_9.jpg'" alt="...">
                                    <div class="card-body">
                                        <h4 class="card-title text-center"><a target="_blank" href="https://www.facebook.com/quickfixbd/photos/a.1787620248163046/2787028314888896">iPhone ইউজারদের জন্য সুখবর !!
        ব্যাটারি রিপ্লেস্মেন্টে আজীবন গ্যারান্টি। একবার রিপ্লেস করলে পরবর্তী ব্যাটারি ফ্রি</a></h4>
                                        <!-- <h5 class="text-center">Life time replacement gurantee</h5> -->
                                    </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

 <style scope>
        /* .default_active {
            box-shadow: 4px 0px 3px rgba(0, 0, 0, 0.25) !important;
            background: #1B75BC;
            z-index: 999 !important;
            color:white !important;
            padding-left: 11px !important;
        }
        .default_active p {
           color:white !important;
        } */

        /* .default_inactive {
            border: none !important;
            box-shadow: 4px 0px 3px rgba(0, 0, 0, 0.25) !important;
            background: #F1F1F1;
            color: #656565;
            
        } */
        /* .nav-tabs .nav-item:hover{
            background: #1B75BC;
            color:#fff;
        }

        .nav-pills .nav-link:hover{
            color:#fff;
        } */

        /* .active_show {
            display: block !important;
        }

        .active_hide {
            display: none !important;
        }

        .swiper-slide .single-partner .swiper-slide-duplicate-prev {
            text-align: right !important;
        } */

        .hero-category-content .v1:hover{
            background: #fff;
        }

        .serviceCatActive {
            background-color: #1B75BC;
            color: #fff;
        }
       
    </style>

<script>
    
    export default {
        
        data() {
            return {
                url: window.location.origin+'/',
                root_url: window.location.origin,
                instant_call_api:'instant-call',
                get_quotation_api:'get-quotation',
                inputData:{},
                instantCallData:{},
                otp_verify_api: 'otp-verify',
                otp_quotation_verify_api: 'otp-verify-quotation',
                isOtp:false,
                isQuotation:false,
                isInstantCall:false
            }
        },

        created() {

           

           
        },

        mounted(){
            var boxWidth = $(".active_show").width();
            $( ".hero-category-content").hover(function()
            {
                $( this ).css("background-color","white");
                // $('.hero-category-content').removeClass("default_active");
                // $('.hero-category-content').addClass("default_inactive");
                // $(this).toggleClass("default_active");
                // $(this).removeClass("default_inactive");
            
                // // $(this).animate({ left: "100px" }); 
                
                // $('.hero-category-content').find('.process_details_2').addClass("active_show");
                // $('.hero-category-content').find('.process_details_2').removeClass("active_hide");
                // $('.hero-category-content').find('.process_details').removeClass("active_show");
                // $('.hero-category-content').find('.process_details').addClass("active_hide");

                // $(this).find('.process_details_2').removeClass("active_show");
                // $(this).find('.process_details_2').addClass("active_hide");
                // $(this).find('.process_details').removeClass("active_hide");
                // $(this).find('.process_details').addClass("active_show");
                 
            }, function(){
                // $('.hero-category-content').removeClass("default_active");
                // $('.hero-category-content').addClass("default_inactive");

                // $('.hero-category-content').find('.process_details_2').removeClass("active_hide");
                // $('.hero-category-content').find('.process_details').addClass("active_hide");
                // $('.hero-category-content').find('.process_details_2').addClass("active_show");
                // $('.hero-category-content').find('.process_details_2').removeClass("active_show");

                // $('.hero-category-content').animate({ left: "0px" });

                //DEFAULT ACTIVE PRECESS
                // $('.default_active_process').addClass("default_active");
                // $('.default_active_process').removeClass("default_inactive");
                
                // $('.default_active_process').find('.process_details_2').removeClass("active_show");
                // $('.default_active_process').find('.process_details_2').addClass("active_hide");
                // $('.default_active_process').find('.process_details').removeClass("active_hide");
                // $('.default_active_process').find('.process_details').addClass("active_show");
            });

            $( ".tablink" ).hover(function()
            {
                // $(this).find('.nav-link').addClass("active");
                // $('.service_category_tab').find('.nav-link').removeClass("active");

                
                $(this).addClass("serviceCatActive");
                $('.tablink').removeClass("serviceCatActive");
            },function(){
                $('.tablink').removeClass("serviceCatActive");
                $('.defaultTablink').addClass("serviceCatActive");
            });
        },

        methods:{
            getInstantCall(){
                axios.post(this.root_url+'/api/'+this.instant_call_api, this.instantCallData)
                .then(res => {
             
                    console.log(res.data.status);
                    if(res.data.status == 'success'){

                        this.isOtp = true
                        this.isInstantCall = true 
                        this.instantCallData.confirm_otp = res.data.otp

                    }
                })
            },

            otpVerify(){

                let input_otp = this.isInstantCall == true?this.instantCallData.otp:this.inputData.quotation_otp

                let confirm_otp = this.isInstantCall == true?this.instantCallData.confirm_otp:this.inputData.confirm_quotation_otp

                if(confirm_otp == input_otp){
        

                    let data = this.isInstantCall == true?this.instantCallData:this.inputData

                    let api = this.isInstantCall == true?this.root_url+'/api/'+this.otp_verify_api:this.otp_quotation_verify_api

                    axios.post(api, data)
                    .then(res => {
                        this.isOtp = true
                        console.log(res)
                        $('.close_modal').trigger('click')
                        if(res.data.status == 'success'){

                            if(this.isInstantCall == true){

                            $('.show_request_submit_modal').trigger('click')
                            this.instantCallData = {}
                            this.closeNotifyModal()

                            } else {

                                 $('.close_modal').trigger('click')

                                $('.show_request_submit_modal').trigger('click')
                                this.inputData = {}
                                 this.closeNotifyModal()
                            }
                            
                           
                            
                        }
                    })
                } else {

                    if(this.isInstantCall == true){

                        $('input[name=otp]').after('<span class="text-danger">OTP is invalid! Please try again</span>');
                    } else {

                        $('input[name=confirm_quotation_otp]').after('<span class="text-danger">OTP is invalid! Please try again</span>');

                    }

                }
                 

            },
            getQuotation(){
                axios.post(this.root_url+'/api/'+this.get_quotation_api, this.inputData)
                .then(res => {
                     console.log(res)

                    if(res){

                       

                        console.log(res.data.status);

                        if(res.data.status == 'success'){

                        this.isOtp = true
                        this.isQuotation = true
                        this.inputData.confirm_quotation_otp = res.data.otp


                        }

                        // this.inputData = {}
                        // this.closeNotifyModal()
                        
                    }
                })
            },

            closeNotifyModal(){

                setTimeout(()=>{
                $('.close_notify_modal').trigger('click');
            }, 5000)

            },

            resetFormElm(){
                this.isOtp = false 
            }

            
            
        }

        
    }

</script>
