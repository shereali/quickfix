<template>
    <section>
       <div class="hero-area v1 section-padding pad-bot-150" :style="{'background-image': 'url(frontend/images/header/mask_group2.png)','height': '285px','opacity': '0.5'}">
       </div>
       <div class="container">
           <div class="row">
               <div class="col-lg-8 col-md-12">
                   <div class="dash-content">
                            <div class="db-add-list-wrap">
                                <div class="act-title">
                                    <h5><i class="ion-ios-information"></i> General Information :</h5>
                                </div>
                                <div class="db-add-listing">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control filter-input" placeholder="e.g: Borhan">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input type="text" class="form-control filter-input" placeholder="e.g: 01xxxxxxx">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control filter-input" placeholder="e.g: borhan@gmail.com">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control filter-input" placeholder="e.g: house-36,road-4,Banani">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <div class="nice-select filter-input" tabindex="0"><span class="current">Select Categories</span>
                                                    <ul class="list">
                                                        <li class="option selected focus">Hotels</li>
                                                        <li class="option">Restaurants</li>
                                                        <li class="option">Shopping</li>
                                                        <li class="option">Eat &amp; Drink</li>
                                                        <li class="option">Events</li>
                                                        <li class="option">Fitness</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Keywords</label>
                                                <input type="text" class="form-control filter-input" placeholder="Keywords should be separated by commas">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control filter-input" placeholder="Address of your hotel">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <form>
                                                <div class="form-group">
                                                    <label for="list_info">Description</label>
                                                    <textarea class="form-control" id="list_info" rows="4" placeholder="Enter your text here"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="db-add-list-wrap">
                                <div class="act-title">
                                    <h5><i class="ion-image"></i> Gallery :</h5>
                                </div>
                                <div class="db-add-listing">
                                    <div class="form-group">
                                        <form class="photo-upload">
                                            <div class="form-group">
                                                <div class="add-listing__input-file-box">
                                                    <input class="add-listing__input-file" type="file" name="file" id="file">
                                                    <div class="add-listing__input-file-wrap">
                                                        <i class="ion-ios-cloud-upload"></i>
                                                        <p>Click here to upload your images</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="db-add-list-wrap">
                                <div class="db-add-listing">
                                    <div class="row">
                                        <div class="col-md-6 text-left">
                                            <div class="res-box mar-top-10">
                                                <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                                <label for="remember">I've read and accept <a href="terms.html">terms &amp; conditions</a></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right sm-left">
                                            <button class="btn v8" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script>
export default {
    
}
</script>
<style scoped>

.act-title {
    padding: 30px;
    background: #f5f6f7;
}
.db-add-listing {
    padding: 30px;
}
.db-add-listing label, .db-add-listing label.fix_spacing {
    color: #333;
    font-weight: 500;
    font-size: 16px;
}
.customer-review_wrap {
    display: inline-block;
    width: 100%;
    padding: 50px 30px;
    height: 100%;
    border-bottom: none !important;
}

.review_wrap li li {
    margin-left: 135px;
}

.review_wrap>li:last-child .customer-review_wrap {
    border-bottom: none;
}
.listing-sidebar {
    padding-left: 15px;
    height: 100%;
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

</style>