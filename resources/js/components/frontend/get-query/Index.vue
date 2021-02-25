<template>
    <section>
         <div class="hero-area v1 section-padding pad-bot-150" :style="{'background-image': 'url(frontend/images/header/mask_group2.png)','height': '200px','opacity': '0.5'}">
         </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">   
                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                        
                        <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account" :style="{'width': '30%'}"><strong :style="{'margin-left': '-100px'}">Device Query</strong></li>
                                <li id="personal" :style="{'width': '30%'}"><strong :style="{'margin-left': '-127px'}">Personal Info</strong></li>
                                <li id="payment" :style="{'width': '30%'}"><strong :style="{'margin-left': '-100px'}">Price Quotation</strong></li>
                                <li id="confirm"><strong>Order</strong></li>
                            </ul>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> <br> <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Device Query:</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 1 - 4</h2>
                                        </div>
                                        <div class="col-12 pad-bot-15">
                                            <div class="widget search">
                                                    <input type="text" class="form-control filter-input" placeholder="Search">
                                            </div>
                                        </div>
                                        <div class="col-12 pad-bot-15">
                                            <div class="device-brand">
                                                <select id="cars" name="cars" class="nice-select filter-input">
                                                    <option value="volvo">Location</option>
                                                    <option value="saab">Gulshan</option>
                                                    <option value="fiat">Banani</option>
                                                    <option value="audi">Niketon</option>
                                                 </select>
                                            </div>
                                        </div>
                                        <div class="col-4 pad-top-20" v-for="device in devices" :key="device.id">
                                            <button :class="device.device_name == 'Phone'?'smartphone':'ipad'"  class="btn v3  mar-right-5  filter-input" type="button"> {{device.device_name}}</button>
                                        </div>
                                        
                                        <!-- <div class="col-4 pad-top-20">
                                            <button class="btn v3 ipad filter-input" type="button"> iPad</button>
                                        </div>
                                        <div class="col-4 pad-top-20">
                                            <button class="btn v3  mar-right-5 ipad filter-input" type="button"> Tablet</button>
                                        </div>
                                        <div class="col-4 pad-top-20">
                                            <button class="btn v3  mar-right-5 ipad" type="button"> Laptop</button>
                                        </div>
                                        <div class="col-4 pad-top-20">
                                            <button class="btn v3  mar-right-5 ipad" type="button"> Mac</button>
                                        </div>
                                        <div class="col-4 pad-top-20">
                                            <button class="btn v3  mar-right-5 ipad" type="button"> Others</button>
                                        </div>                                            -->
                                            <div class="col-6 pad-top-20">
                                                <div class="device-brand">
                                                    <h6>Select Device Brand</h6>
                                                    <select id="cars" name="cars" class="nice-select filter-input">
                                                        <option value="volvo">Apple</option>
                                                        <option value="saab">Samsung</option>
                                                        <option value="fiat">iPhone</option>
                                                        <option value="audi">Nokia</option>
                                                     </select>
                                                 </div>
                                            </div>
                                            <div class="col-6 pad-top-20">
                                                <div class="device-brand">
                                                    <h6>Select Device Model</h6>
                                                    <select id="cars" name="cars" class="nice-select filter-input">
                                                        <option value="0">8 Plus</option>
                                                        <option value="1">Apple</option>
                                                        <option value="2">Apple</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 services">
                                                <div class="service-accordion">
                                                    <h6>Select Problem Type</h6>
                                                    <div class="accordion" role="tablist">
                                                        <div class="card">
                                                            <div class="card-header" role="tab" id="headingDisplay" v-on:click="toggleDisplay">
                                                                <h5 class="mb-0">
                                                                    <a data-toggle="collapse"  class="nice-select filter-input" :style="{'border':'none','height':'40px'}"  href="#collapseDisplay"
                                                                        aria-expanded="true" aria-controls="collapseDisplay">
                                                                        Display 
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapseDisplay" class="collapse show" role="tabpanel"
                                                                aria-labelledby="headingDisplay" v-show="showDisplay">
                                                                <div class="card-body">
                                                                    <button class="btn-2" type="button">Display Broken</button>
                                                                    <button class="btn-2" type="button">Touch Broken</button>
                                                                    <button class="btn-2" type="button">Glass Broken</button>
                                                                    <button class="btn-2" type="button">Glass Broken</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="service-accordion">
                                                    <div class="accordion" role="tablist">
                                                        <div class="card">
                                                            <div class="card-header" role="tab" id="headingHardware" v-on:click="toggleHardware">
                                                                <h5 class="mb-0">
                                                                    <a class="collapsed nice-select filter-input" :style="{'border':'none','height':'40px'}"  data-toggle="collapse" href="#collapseHardware"
                                                                        aria-expanded="flase" aria-controls="collapseHardware">
                                                                        Hardware
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div  id="collapseHardware" class="collapse show"
                                                                role="tabpanel" aria-labelledby="headingHardware" v-show="showHardware">
                                                                <div class="card-body">
                                                                    <button class="btn-2" type="button">Display Broken</button>
                                                                    <button class="btn-2" type="button">Touch Broken</button>
                                                                    <button class="btn-2" type="button">Glass Broken</button>
                                                                    <button class="btn-2" type="button">Glass Broken</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="service-accordion">
                                                    <div class="accordion" role="tablist">
                                                        <div class="card">
                                                            <div class="card-header" role="tab" id="headingCamera" v-on:click="toggleCamera">
                                                                <h5 class="mb-0">
                                                                    <a class="collapsed nice-select filter-input" :style="{'border':'none','height':'40px'}" data-toggle="collapse" href="#collapseCamera"
                                                                        aria-expanded="false" aria-controls="collapseCamera">
                                                                        Camera & Others
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div cid="collapseCamera" class="collapse show"
                                                                role="tabpanel" aria-labelledby="headingCamera" v-show="showCamera">
                                                                <div class="card-body">
                                                                    <button class="btn-2" type="button">Display Broken</button>
                                                                    <button class="btn-2" type="button">Touch Broken</button>
                                                                    <button class="btn-2" type="button">Glass Broken</button>
                                                                    <button class="btn-2" type="button">Glass Broken</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="service-accordion">
                                                    <div class="accordion" role="tablist">
                                                        <div class="card">
                                                            <div class="card-header" role="tab" id="headingBattery" v-on:click="toggle">
                                                                <h5 class="mb-0">
                                                                    <a class="collapsed nice-select filter-input" :style="{'border':'none','height':'40px'}" data-toggle="collapse" href="#collapseBattery"
                                                                     aria-expanded="false" aria-controls="collapseBattery">
                                                                        Battery
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div  id="collapseBattery" class="collapse show"
                                                                role="tabpanel" aria-labelledby="headingBattery" v-show="showSection">
                                                                <div class="card-body">
                                                                    <button class="btn-2" type="button">Display Broken</button>
                                                                    <button class="btn-2" type="button">Touch Broken</button>
                                                                    <button class="btn-2" type="button">Glass Broken</button>
                                                                    <button class="btn-2" type="button">Glass Broken</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <textarea placeholder="Note"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <a class="add-device"  data-toggle="modal" data-target="#addDevice" href="#">Add Device<i class="icofont-long-arrow-right"></i></a>
                                            </div>
                                            <!-- more start -->
                                            <div class="row next-device"  v-for="(moreDevice, counter) in moreDevices" v-bind:key="counter" >
                                                <span class="close-device" @click="deleteDevice(counter)">x</span>
                                                <div class="col-4 pad-top-20" v-for="device in devices" :key="device.id">
                                                    <button :class="device.device_name == 'Phone'?'smartphone':'ipad'"  class="btn v3  mar-right-5 smartphone filter-input" type="button"> {{device.device_name}}</button>
                                                </div>
                                                <div class="col-6 pad-top-20">
                                                    <div class="device-brand">
                                                        <h6>Select Device Brand</h6>
                                                        <select id="cars" name="cars" class="nice-select filter-input">
                                                            <option value="volvo">Apple</option>
                                                            <option value="saab">Samsung</option>
                                                            <option value="fiat">iPhone</option>
                                                            <option value="audi">Nokia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6 pad-top-20">
                                                    <div class="device-brand">
                                                        <h6>Select Device Model</h6>
                                                        <select id="cars" name="cars" class="nice-select filter-input">
                                                            <option value="0">8 Plus</option>
                                                            <option value="1">Apple</option>
                                                            <option value="2">Apple</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 services">
                                                    <div class="service-accordion">
                                                        <h6>Select Problem Type</h6>
                                                        <div class="accordion" role="tablist">
                                                            <div class="card">
                                                                <div class="card-header" role="tab" id="headingDisplay" v-on:click="toggleDisplay">
                                                                    <h5 class="mb-0">
                                                                        <a data-toggle="collapse"  class="nice-select filter-input" :style="{'border':'none','height':'40px'}"  href="#collapseDisplay"
                                                                            aria-expanded="true" aria-controls="collapseDisplay">
                                                                            Display 
                                                                        </a>
                                                                    </h5>
                                                                </div>
                                                                <div id="collapseDisplay" class="collapse show" role="tabpanel"
                                                                    aria-labelledby="headingDisplay" v-show="showDisplay">
                                                                    <div class="card-body">
                                                                        <button class="btn-2" type="button">Display Broken</button>
                                                                        <button class="btn-2" type="button">Touch Broken</button>
                                                                        <button class="btn-2" type="button">Glass Broken</button>
                                                                        <button class="btn-2" type="button">Glass Broken</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="service-accordion">
                                                        <div class="accordion" role="tablist">
                                                            <div class="card">
                                                                <div class="card-header" role="tab" id="headingHardware" v-on:click="toggleHardware">
                                                                    <h5 class="mb-0">
                                                                        <a class="collapsed nice-select filter-input" :style="{'border':'none','height':'40px'}"  data-toggle="collapse" href="#collapseHardware"
                                                                            aria-expanded="flase" aria-controls="collapseHardware">
                                                                            Hardware
                                                                        </a>
                                                                    </h5>
                                                                </div>
                                                                <div  id="collapseHardware" class="collapse show"
                                                                    role="tabpanel" aria-labelledby="headingHardware" v-show="showHardware">
                                                                    <div class="card-body">
                                                                        <button class="btn-2" type="button">Display Broken</button>
                                                                        <button class="btn-2" type="button">Touch Broken</button>
                                                                        <button class="btn-2" type="button">Glass Broken</button>
                                                                        <button class="btn-2" type="button">Glass Broken</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="service-accordion">
                                                        <div class="accordion" role="tablist">
                                                            <div class="card">
                                                                <div class="card-header" role="tab" id="headingCamera" v-on:click="toggleCamera">
                                                                    <h5 class="mb-0">
                                                                        <a class="collapsed nice-select filter-input" :style="{'border':'none','height':'40px'}" data-toggle="collapse" href="#collapseCamera"
                                                                            aria-expanded="false" aria-controls="collapseCamera">
                                                                            Camera & Others
                                                                        </a>
                                                                    </h5>
                                                                </div>
                                                                <div cid="collapseCamera" class="collapse show"
                                                                    role="tabpanel" aria-labelledby="headingCamera" v-show="showCamera">
                                                                    <div class="card-body">
                                                                        <button class="btn-2" type="button">Display Broken</button>
                                                                        <button class="btn-2" type="button">Touch Broken</button>
                                                                        <button class="btn-2" type="button">Glass Broken</button>
                                                                        <button class="btn-2" type="button">Glass Broken</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="service-accordion">
                                                        <div class="accordion" role="tablist">
                                                            <div class="card">
                                                                <div class="card-header" role="tab" id="headingBattery" v-on:click="toggle">
                                                                    <h5 class="mb-0">
                                                                        <a class="collapsed nice-select filter-input" :style="{'border':'none','height':'40px'}" data-toggle="collapse" href="#collapseBattery"
                                                                        aria-expanded="false" aria-controls="collapseBattery">
                                                                            Battery
                                                                        </a>
                                                                    </h5>
                                                                </div>
                                                                <div  id="collapseBattery" class="collapse show"
                                                                    role="tabpanel" aria-labelledby="headingBattery" v-show="showSection">
                                                                    <div class="card-body">
                                                                        <button class="btn-2" type="button">Display Broken</button>
                                                                        <button class="btn-2" type="button">Touch Broken</button>
                                                                        <button class="btn-2" type="button">Glass Broken</button>
                                                                        <button class="btn-2" type="button">Glass Broken</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <textarea placeholder="Note"></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <a class="add-device" data-toggle="modal" data-target="#addDevice" href="#">Add Device<i class="icofont-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- more end -->
                                            <!-- add device modal start -->
                                                  <div class="modal fade" id="addDevice" :style="{'z-index':'999999'}">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header modal-header-bg-color">
                                                                    <h4 class="modal-title" style="color: white;" id="myModalLabel">Add Device</h4>
                                                                    <!-- <button type="button" class="close close_modal" style="color: white;" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">
                                                                            <i class="ion-ios-close-empty"></i>
                                                                         </span>
                                                                    </button> -->
                                                    
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                        <div class="row">
                                                                           <div class="col-4 pad-top-20" v-for="device in devices" :key="device.id">
                                                                                <button :class="device.device_name == 'Phone'?'smartphone':'ipad'" class="btn v3  mar-right-5  filter-input" type="button"> {{device.device_name}}</button>
                                                                            </div>                                          
                                                                            <div class="coupon-bottom col-md-12 col-lg-12 pull-right">
                                                                                <button  type="button" class="btn v1 float-right close_modal" @click="addMoreDevice" data-dismiss="modal">Add Device</button>
                                                                                <button  type="button" class="btn v1 float-right close_modal" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <!-- add device modal end -->
                                    </div>
                                     
                                </div>
                                 <input type="button" name="next" class="next action-button" value="Next" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Personal Information:</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 2 - 4</h2>
                                        </div>
                                        <div class="col-6 pad-bot-15">                                                
                                                <input type="text" class="filter-input" placeholder="Name">
                                         </div>
                                        <div class="col-6 pad-bot-15">                                                
                                            <input type="text" class="filter-input" placeholder="Contact Number">
                                         </div>
                                        <div class="col-12 pad-bot-15">                                                
                                            <input type="text" class="filter-input" placeholder="Email">
                                         </div>
                                    </div> 
                                    
                                </div>
                                 <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Price Quotation:</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 3 - 4</h2>
                                        </div>
                                        <div class="col-9 invoice-details">
                                            <h6>Device Queries</h6>
                                            <h6>Problem type:</h6>
                                            <input type="checkbox" name="conditions" :style="{'float': 'left'}" checked>
                                            <label for="conditions" class="conditions">problem-1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;200</label><br>
                                            <input type="checkbox" name="conditions" :style="{'float': 'left'}" checked>
                                            <label for="conditions" class="conditions">problem-2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;300</label><br>
                                            <input type="checkbox" name="conditions" :style="{'float': 'left'}" checked>
                                            <label for="conditions" class="conditions">problem-3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;500</label><br>
                                          
                                           
                                            <h6>Service Availability:</h6>
                                            <button class="btn-2" type="button" v-on:click="showDiv">Pick & Drop Service</button>
                                            <button class="btn-2" type="button" v-on:click="showDiv" >Home Service</button>
                                            <button class="btn-2" type="button" v-on:click="showPremises">Premises Service</button>
                                          
                                        </div>
                                        <div class="col-lg-3 invoice-price d-flex align-items-center">
                                            <div>
                                                <h2>BDT 5000</h2>
                                                <h4>Estimated Price</h4>
                                            </div>
                                            <div class="invoice-confirm">
                                                <button class="yes">Accept</button>
                                                <button class="no">Cancel</button>
                                            </div>
                                        </div>
                                        <!-- <div class="row delivery-address"> -->                                                 
                                                
                                            
                                        <!-- </div> -->
                                    </div> 
                                    <div class="row" v-if="show"  id="welcomeDiv">
                                        <div class="col-12">
                                            <h2 :style="{'font-family': 'Poppins',
                                            'font-style': 'normal',
                                            'font-weight': 'normal',
                                            'font-size': '18px',
                                            /* line-height: 18px; */
                                            'display': 'flex',
                                            'align-items': 'center',
                                            'color': '#333333',
                                            'margin-top': '3%'}">Pick & Drop / Home Service</h2>
                                        </div>
                                        <div class="col-6 pad-bot-15">
                                            <input type="text" class="left filter-input" placeholder="City: Dhaka">

                                        </div>
                                        <div class="col-6 pad-bot-15">
                                            <input type="text" class="right filter-input" placeholder="Zone: Mohammadpur">

                                        </div>
                                        <div class="col-12 pad-bot-15">
                                            <input type="text" class="filter-input" placeholder="Address:">

                                        </div>
                                    </div> 
                                    <div class="row" v-if="premises" id="welcomePremises">
                                        <div class="col-12 premises pad-bot-15">
                                            <h2>Premises Appoinment</h2>
                                        </div>
                                        <div class="col-12 month pad-bot-15">
                                            <ul>
                                              <li class="prev">&#10094;</li>
                                              <li class="next">&#10095;</li>
                                              <li>January 2021</li>
                                            </ul>
                                        </div>
                                        <div class="col-12 pad-bot-15">
                                            <ul class="weekdays">
                                                <li>Sat</li>
                                                <li>Sun</li>
                                                <li>Mon</li>
                                                <li>Tue</li>
                                                <li>Wed</li>
                                                <li>Thu</li>
                                                <li>Fri</li>
                                              </ul>

                                        </div>
                                        <div class="col-12 pad-bot-15">
                                            <ul class="days">
                                                <li>1</li>
                                                <li>2</li>
                                                <li>3</li>
                                                <li>4</li>
                                                <li>5</li>
                                                <li>6</li>
                                                <li>7</li>
                                                <li>8</li>
                                                <li>9</li>
                                                <li><span class="active">10</span></li>
                                                <li>11</li>
                                                <li>12</li>
                                                <li>13</li>
                                                <li>14</li>
                                                <li>15</li>
                                                <li>16</li>
                                                <li>17</li>
                                                <li>18</li>
                                                <li>19</li>
                                                <li>20</li>
                                                <li>21</li>
                                                <li>22</li>
                                                <li>23</li>
                                                <li>24</li>
                                                <li>25</li>
                                                <li>26</li>
                                                <li>27</li>
                                                <li>28</li>
                                                <li>29</li>
                                                <li>30</li>
                                              </ul>
                                        </div>  
                                        <div class="col-6 pad-bot-15">
                                            <input type="button" class="left filter-input" value="10am to 2pm">

                                        </div>
                                        <div class="col-6 pad-bot-15">
                                            <input type="button" class="right filter-input" value="2pm to 6pm">

                                        </div>
                                          <div class="col-1 offset-7">                                           
                                            
                                            <input type="checkbox" name="conditions">
                                            
                                            <!-- <input type="submit" value="Place Order"> -->
                                          </div>
                                          <div class="col-4">
                                            <label for="conditions" class="conditions">Accept Terms & Conditions</label>
                                          </div>

                                    </div>
                                </div>
                                 <input type="button" name="next" class="next action-button" value="Submit" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Order:</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 4 - 4</h2>
                                        </div>
                                    </div> 
                                    <br>
                                    <br>
                                    
                                    <div class="row justify-content-center">
                                        <div class="col-6 thank-section"> 
                                            <h2>Thank You</h2>
                                            <h6>Your Query Confirmed.</h6>
                                            <h6>We will contact very soon.</h6> 
                                        </div>
                                    </div> 
                                    <br>
                                    <br>
                                   
                                </div>
                            </fieldset>
                        </form>
                    </div>      
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="customer-review_wrap">
                        <div class="listing-sidebar">
                            <div class="sidebar-widget info" :style="{'background': '#F1F1F1','margin-top': '-18.1%'}">
                                <h3>Service Overview</h3>
                                <div class="row">
                                    <div class="col-md-12 mar-bot-15">
                                        <span>Why take furniture service from?</span>
                                    </div>
                                    <div class="col-md-12 mar-bot-15">
                                        <ul>

                                            <li> <span class="dot-modern"></span> Modern and contemporary design offering
                                                Expert and reliable service</li>
                                            <li> <span class="dot-modern"></span> Modern and contemporary design offering
                                                Expert and reliable service</li>
                                            <li> <span class="dot-modern"></span> Modern and contemporary design offering
                                                Expert and reliable service</li>
                                            <li> <span class="dot-modern"></span> Modern and contemporary design offering
                                                Expert and reliable service</li>

                                        </ul>
                                    </div>
                                    <div class="col-md-12 mar-bot-15">
                                        <span :style="{'font-size': '30px'}">FAQ</span><br>
                                        <span :style="{'font-size': '20px'}">Terms & Condition</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
</template>
<style scoped>
      /* query page */

      ul {list-style-type: none;}
body {font-family: Verdana, sans-serif;}
.listing-sidebar {
    padding-left: 15px;
    height: 100%;
}
.next-device{
     border: 1px solid #D8D8D8;
    padding: 5px;
    margin-bottom: 10px;
    border-radius: 6px;
}
.close-device{
  width: 30px;
  float: right;
  cursor: pointer;
  margin-left: 95%
}
.close-device:hover{
  color: brown;
}
.dot-modern{
    border-radius: 50%;
    display: inline-block;
    width: 11px;
    height: 11px;
    left: 1186px;
    top: 651px;
    background: #C4C4C4;
  }
/* Month header */
.month {
    width: 100%;
    background: #C4C4C4;
    border-radius: 6px;
    text-align: center;
    height: 49px;
}

/* Month list */
.month ul {
  margin: 0;
  padding: 0;
}

.month ul li {
  color: white;
  font-size: 18px;
  text-transform: uppercase;
  padding: 10px
}

/* Previous button inside month header */
.month .prev {
  float: left;
  padding-top: 10px;
}

/* Next button */
.month .next {
  float: right;
  padding-top: 10px;
}

/* Weekdays (Mon-Sun) */
.weekdays {
  margin: 0;
  padding: 10px 0;
 
}

.weekdays li {
  display: inline-block;
  width: 13.6%;
  color: #666;
  text-align: center;
}

/* Days (1-31) */
.days {
  padding: 10px 0;
  margin: 0;
}

.days li {
  list-style-type: none;
  display: inline-block;
  width: 13.6%;
  text-align: center;
  margin-bottom: 5px;
  font-size:12px;
  color: #777;
}

/* Highlight the "current" day */
.days li .active {
  padding: 5px;
  background: #1B75BC;
  color: white !important;
  border-radius: 15px;
}
 .premises h2{
    padding-top: 20px;
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 18px;
    display: flex;
    align-items: center;
    text-align: center;
    color: #333333;
}
.customer-review_wrap {
    display: inline-block;
    width: 100%;
    padding: 50px 30px;
    height: 100%;
}

.review_wrap li li {
    margin-left: 135px;
}

.review_wrap>li:last-child .customer-review_wrap {
    border-bottom: none;
}
 .thank-section{
    padding-top: 35px;
    padding-bottom: 50px;
}
.thank-section{
    /* height: 181px; */
    background: #1B75BC;
}
.thank-section h2{
    font-family: Poppins;
    font-style: normal;
    font-size: 30px;
    line-height: 45px;
    align-items: center;
    text-align: center;
    color: #FFFFFF;
    padding-top: 50px;
}
.thank-section h6{
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 0px;
    align-items: center;
    text-align: center;
    color: #FFFFFF;
}
 .invoice-confirm button {
    width: 48%;
    border: none;
    background-color: #bbb;
    height: 30px;
    color: #fff;
    border-radius: 5px;
    height: 44px;
    font-size: 26px;
}

.invoice-confirm button.yes {
    background-color: green;
    font-size: 17px;
}

.invoice-confirm button.no {
    background-color: red;
    font-size: 17px;
}

.invoice-confirm {
    background-color: #fff;
    position: absolute;
    bottom: 0;
    right: 0;
    width: 100%;
    padding-top: 4px;
}
      .invoice-price {
    background-color: #f1f1f1;
    border-left: 5px solid #fff;
    border-radius: 6px;
}

.invoice-price h2 {
    font-size: 25px;
    text-align: center;
}

.invoice-price h4 {
    font-size: 15px;
    text-align: center;
}
.invoice-details button.btn-2 {
    width: max-content;
    padding: 5px 14px;
    height: 40px;
    background: transparent !important;
    border-radius: 10px;
    color: #656565 !important;
    border: 2px solid rgb(211 211 211);
    cursor: pointer;
    transition: 0.3s;
    margin-right: 10px;
    border: 1px solid #1B75BC;
    box-sizing: border-box;
    border-radius: 6px;
    font-size: 12px;
}
.invoice-details {
    background-color: #f1f1f1;
    padding: 20px;
    border-radius: 6px;
}
.add-device {
    float: right;
    font-size: 17px;
    font-weight: 500;
    color: #1B75BC;
    
}

 button.btn-2 {
    width: 48%;
    height: 49.56px;
    left: 711.76px;
    top: 409px;
    background: #FFFFFF !important;
    border-radius: 6px;
    color: #656565 !important;
    border: 1px solid rgb(243 243 243);
    cursor: pointer;
    transition: 0.3s;
}
button.btn-2:hover {
    border: 1px solid rgb(176, 176, 255);
}
      .card-header {
    border: none;
    border-radius: 10px;
}
.service-accordion a {
    color: rgb(119, 119, 119);
}

.service-accordion button.btn-2  {
    margin-right: 10px;
    margin-bottom: 16px;
    transition: 0.3s;
}
.service-accordion {
    margin: 16px 0;
}
.services textarea {
    width: 100%;
    height: 100px;
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0,0,0,.03);
    border: none;
    font-family: "poppins", sans-serif;
    color: rgb(119, 119, 119);
    font-size: 18px;
}

.services {
    padding: 15px;
}
.pad-top-20 {
    padding-top: 20px !important;
}
.btn.v3.ipad{
    /* width: 200.48px; */
    height: 49.56px;
    left: 711.76px;
    top: 409px;
    
    background: #F1F1F1 !important;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 6px;
    color: #656565 !important;
}
.mar-right-5 {
    margin-right: 5px !important;
}
.smartphone{

    width: 200px;
    height: 49px;
    left: 489px;
    top: 409.35px;

    background: #1B75BC;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 6px;
}
.nice-select.hero__form-input.custom-select span {
    color: #999;
}
.nice-select.filter-input ul li {
    font-size: 15px;
}
.nice-select {
    background-color: transparent;
    border-bottom: 1px solid #ddd;
    box-sizing: border-box;
    clear: both;
    cursor: pointer;
    display: inline-block;
    font-size: 15px;
    line-height: 40px;
    padding-left: 18px;
    padding-right: 30px;
    position: relative;
    text-align: left !important;
    user-select: none;
}

.nice-select:after {
    content: '\f3d0';
    font-family: "Ionicons";
    display: block;
    pointer-events: none;
    position: absolute;
    right: 5%;
    top: 30%;
    font-size: 16px;
    color: #999;
    -webkit-transition: all 0.15s ease-in-out;
    transition: all 0.15s ease-in-out;
}

.nice-select.open:after {
    -webkit-transform: rotate(-180deg);
    -ms-transform: rotate(-180deg);
    transform: rotate(-180deg);
}

.nice-select.open .list {
    opacity: 1;
    pointer-events: auto;
    -webkit-transform: scale(1) translateY(0);
    -ms-transform: scale(1) translateY(0);
    transform: scale(1) translateY(0);
    width: 100%;
    height: 200px;
    overflow-y: scroll;
}

.nice-select.disabled {
    border-color: #ededed;
    color: #999;
    pointer-events: none;
}

.nice-select.disabled:after {
    border-color: #cccccc;
}

.nice-select .list {
    background-color: #fff;
    border-radius: 1px;
    box-shadow: 0 0 0 1px rgba(68, 68, 68, 0.11);
    box-sizing: border-box;
    margin-top: 4px;
    opacity: 0;
    overflow: hidden;
    padding: 0;
    pointer-events: none;
    position: absolute;
    top: 100%;
    left: 0;
    transform-origin: 50% 0;
    transform: scale(0.75) translateY(-21px);
    transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
    z-index: 9;
}

.nice-select .list:hover .option:not(:hover) {
    background-color: transparent !important;
}

.nice-select .option {
    cursor: pointer;
    font-weight: 400;
    line-height: 40px;
    list-style: none;
    min-height: 40px;
    outline: none;
    padding-left: 18px;
    padding-right: 29px;
    text-align: left;
    -webkit-transition: all 0.2s;
    transition: all 0.2s;
}

.nice-select .option:hover {
    background-color: #2ac590;
    color: #fff;
}

.nice-select .option.disabled {
    background-color: transparent;
    color: #999;
    cursor: default;
}

      .filter-input {

    border: 1px solid #ddd;
    margin-top: 0px;
    border-radius: 3px;
    width: 100%;
    padding: 10px 20px;
    height: 50px;

}

.filter-input:last-child {
    padding: 5px 20px;
}

.filter-input.nice-select::after {
    content: '\f35f';
    font-family: "Ionicons";
    display: block;
    margin-top: 5px;
    pointer-events: none;
    position: absolute;
    right: 12px;
    top: 5%;
    font-size: 20px;
    color: #999;
    -webkit-transition: all 0.15s ease-in-out;
    transition: all 0.15s ease-in-out;
}

.filter-input.nice-select {

    font-size: 15px;
    font-weight: 400;
}


.card {
    border: none;
}
.card {
    z-index: 0;
    border: none;
    position: relative
}
.hero-area.v1 {
    background-size: cover;
    background-repeat: no-repeat;
    height: auto;
}

.hero-area.v1 .hero__form.v2 {
    border-radius: 0;
    background: transparent;
    padding: 0;
}

.hero-area.v1 .hero__form.v2 .hero__form-input {
    background: #fff;
    margin-bottom: 20px;
    height: 50px;
    border-radius: 3px;
    padding-left: 25px;
}

.hero-area.v1 .hero__form.v2 .hero__form-input::before {
    display: none;

}

.hero-area.v1 .hero-title.v2 {
    color:#fff;
    font-size: 4.375rem;
    line-height: 4.2rem;
    margin-bottom: 0;
    margin-left: 0;
}
.modal-header-bg-color{
    background-color:#1B75BC;
}

.hero-area.v1 .hero-desc.v2 {

    margin-bottom: 0;
    font-size: 20px
}


p {
    color: grey
}

#heading {
    text-transform: uppercase;
    color: #673AB7;
    font-weight: normal
}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

.form-card {
    text-align: left
}

#msform fieldset:not(:first-of-type) {
    display: none
}

#msform input,
#msform textarea {
    padding: 8px 15px 8px 15px;
    border-radius: 0px;
    /* margin-bottom: 25px; */
    margin-top: 2px;
    /* width: 100%; */
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    background-color: #ECEFF1;
    font-size: 16px;
    letter-spacing: 1px;
    border: 1px solid #D8D8D8;
    box-sizing: border-box;
    border-radius: 6px;
}

#msform input:focus,
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #673AB7;
    outline-width: 0
}

#msform .action-button {
    width: 100px;
    background: #1B75BC;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 5px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}

#msform .action-button:hover,
#msform .action-button:focus {
    background-color: #1B75BC
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 5px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    background-color: #616161
}

.card {
    z-index: 0;
    border: none;
    position: relative
}

.fs-title {
    font-size: 17px;
    color: #1B75BC;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
}

.purple-text {
    color: #673AB7;
    font-weight: normal
}

.steps {
    font-size: 17px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right
}

.fieldlabels {
    color: gray;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #1B75BC
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    /* width: 25%; */
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f13e"
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f030"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0px 0px 10px 0px;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #1B75BC
}

.progress {
    height: 20px
}

.progress-bar {
    background-color: #1B75BC
}

.fit-image {
    width: 100%;
    object-fit: cover
}
</style>
<script>
 import frmixin from '../../../src/frontend-mixin'
export default {
      mixins:[frmixin],
     
     data(){
            return {
                show    : false,
                premises: false,
                showSection: false,
                showDisplay: false,
                showHardware: false,
                showCamera: false,
                devices : [],
               moreDevices:[]
              
              
            }
        },
        created(){
            axios.get(this.url+'/api/frontend-devices')
                .then(res => {
                    console.log('device',res.data);
                    this.devices = res.data.data
                })
        },
    //  <script>
        // function showDiv() {
        //       document.getElementById('welcomeDiv').style.display = "flex";
        //       document.getElementById('welcomePremises').style.display = "none";
        // }
        // function showPremises() {
        //       document.getElementById('welcomePremises').style.display = "flex";
        //       document.getElementById('welcomeDiv').style.display = "none";
        // }
        mounted: function (){
            $(document).ready(function(){

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;

            setProgressBar(current);

            $(".next").click(function(){

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            next_fs.css({'opacity': opacity});
            },
            duration: 500
            });
            setProgressBar(++current);
            });

            $(".previous").click(function(){

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            previous_fs.css({'opacity': opacity});
            },
            duration: 500
            });
            setProgressBar(--current);
            });

            function setProgressBar(curStep){
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
            .css("width",percent+"%")
            }

            $(".submit").click(function(){
            return false;
            })

            })

        },
        methods:{
             showDiv: function (event){

                    this.show     = true
                    this.premises = false
             },
            showPremises: function (event) {
                this.premises = true
                this.show     = false
            },
             toggleDisplay() {
            this.showDisplay = !this.showDisplay
            },
             toggleHardware() {
            this.showHardware = !this.showHardware
            },
             toggleCamera() {
            this.showCamera = !this.showCamera
            },
           
            toggle() {
            this.showSection = !this.showSection
            
            },
            addMoreDevice(){
                this.moreDevices.push({})
                
        
            },
               deleteDevice(counter){
                this.moreDevices.splice(counter,1);
            }

        }
}

            
    // </script>

</script>