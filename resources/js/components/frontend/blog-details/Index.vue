<template>
    <section>
        <div class="hero-area v1 section-padding pad-bot-150" :style="{'background-image': 'url(http://127.0.0.1:8000/frontend/images/header/mask_group2.png)','height': '200px','opacity': '0.5'}">
            <div class="container">
                <div class="row align-items-center  pad-top-80">
                    <div class="col-md-6 col-12">
                        <div class="breadcrumb-menu">
                            <h2 class="page-title">Blog Details</h2>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="breadcrumb-menu text-right sm-left">
                            <ul>
                                <li class="active"><a href="index.html">Home</a></li>
                                <li><a href="#">Blog Details</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!--Page Wrapper starts-->
    <div class="page-wrapper fixed-footer">

        <div class="blog-area section-padding mar-top-20">
            <div class="container">
                <div class="row">
                    <!-- left Sidebar starts-->
                    <div class="col-xl-3 col-md-12 sidebar">
                        <div class="widget search">
                            <form>
                                <input type="text" class="form-control" placeholder="Search">
                                <button type="submit" class="search-button"><i class="ion-ios-search"></i></button>
                            </form>
                        </div>
                        <div class="widget categories">
                            <h3 class="widget-title">Blogs</h3>
                            <ul class="icon">
                                <li><a class="link-hov style3" href="#">iPhone Battery Offer</a></li>
                                <li><a class="link-hov style3" href="#">iPhone Battery Offer</a></li>
                                <li><a class="link-hov style3" href="#">iPhone Battery Offer</a></li>
                                <li><a class="link-hov style3" href="#">iPhone Battery Offer</a></li>
                                <li><a class="link-hov style3" href="#">iPhone Battery Offer</a></li>
                            </ul>
                        </div>
                        <div class="widget recent-posts">
                            <h3 class="widget-title">Recent Posts</h3>
                            <ul class="post-list">
                                <li class="row mar-top-30">
                                    <div class="col-lg-5 col-4">
                                        <div class="entry-img">
                                            <img :src="url+'/images/blog/14-02-2021-1613290368.jpg'" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-8">
                                        <div class="entry-text">
                                            <h4 class="entry-title"><a href="single-news-one.html">Best caffe in London </a></h4>
                                            <span class="entry-date">Aug 16th, 2017</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="row mar-top-30">
                                    <div class="col-lg-5 col-4">
                                        <div class="entry-img">
                                            <img src="http://127.0.0.1:8000/images/blog/14-02-2021-1613290406.jpg" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-8">
                                        <div class="entry-text">
                                            <h4 class="entry-title"><a href="single-news-one.html">3 Ways to style city street</a></h4>
                                            <span class="entry-date">Oct 12th, 2017</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="row mar-top-30">
                                    <div class="col-lg-5 col-4">
                                        <div class="entry-img">
                                            <img src="http://127.0.0.1:8000/images/blog/14-02-2021-1613290434.jpg" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-8">
                                        <div class="entry-text">
                                            <h4 class="entry-title"><a href="single-news-one.html">Best Cheap Hotel in London</a></h4>
                                            <span class="entry-date">Sep 25th, 2017</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- left Sidebar ends -->
                    <!--Blog post starts-->
                    <div class="col-xl-9 col-md-12">
                        <article class="post-single">
                            <div class="post-content-wrap">
                                <div class="post-content">
                                    <h1 class="post-title text-center">{{ blogs.title }}</h1>
                                    <div class="post-meta text-center">
                                        <p class="date mar-top-0">Dec 5th , 2018 by <a href="#" class="text-dark">Adam D'Costa</a></p>
                                    </div>
                                    <!-- <img class="post-img" src="images/blog/14-02-2021-1613290368.jpg" alt="..."> -->
                                    <div class="post-img" v-html="blogs.imageBlog"></div>
                                    <p>{{ blogs.description }}</p>
                                    
                                    
                                   
                                    
                                    <!-- <div class="row mar-tb-40">
                                        <div class="col-md-6">
                                            <div class="post-tags">
                                                <span>Tags :</span>
                                                <a href="#" class="btn v6 dark">Hotel</a>
                                                <a href="#" class="btn v6 dark">Restaurant</a>
                                                <a href="#" class="btn v6 dark">Travel</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="post-social text-right">
                                                <ul class="social-buttons style3">
                                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                                    <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- <div class="author">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <div class="author-img">
                                                <img src="images/users/reviewer-4.png" alt="image">
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-sm-8 col-xs-12">
                                            <div class="author-name">
                                                <h4 class="d-tc">Eric Brown</h4>
                                                <span class="d-tc">Creative Director </span>
                                            </div>
                                            <div class="author-info">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta in rerum cupiditate, culpa deleniti, ullam quo consequatur, perspiciatis earum blanditiis voluptatem laboriosam quia officiis. Consequuntur. Lorem ipsum dolor sit amet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <!-- <div class="post-nav">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="page-prev">
                                            <a href="#">
                                                <span>Previous Post</span>
                                                <p>10 ways to stay focused on your goals</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="page-next">
                                            <a href="#">
                                                <span>Next Post</span>
                                                <p>9 things that I learnt from life</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </article>
                        <!-- <div class="comments">
                            <h3 class="comments-title">Comments (5)</h3>
                            <ul class="comment-list">
                                <div class="review-box comment-box">
                                    <ul class="review_wrap">
                                        <li>
                                            <div class="customer-review_wrap">
                                                <div class="reviewer-img">
                                                    <img src="images/users/reviewer-4.png" class="img-fluid" alt="#">
                                                </div>
                                                <div class="customer-content-wrap">
                                                    <div class="customer-content">
                                                        <div class="customer-review">
                                                            <h6>Tony Stark G</h6>
                                                            <p class="comment-date">
                                                                October 02, 2017
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <p class="customer-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium voluptates eum, velit recusandae, ducimus earum aperiam commodi error officia optio aut et quae nam nostrum!
                                                    </p>
                                                    <div class="like-btn mar-top-40">
                                                        <a href="#" class="rate-review float-right"><i class="icofont-reply"></i>Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="review_wrap has-child">
                                                <li>
                                                    <div class="customer-review_wrap">
                                                        <div class="reviewer-img">
                                                            <img src="images/users/reviewer-4.png" class="img-fluid" alt="#">
                                                        </div>
                                                        <div class="customer-content-wrap">
                                                            <div class="customer-content">
                                                                <div class="customer-review">
                                                                    <h6>Amanda G</h6>
                                                                    <p class="comment-date">
                                                                        October 02, 2017
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <p class="customer-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quod, nihil consectetur sit natus eum similique quae omnis doloribus culpa!
                                                            </p>
                                                            <div class="like-btn mar-top-40">
                                                                <a href="#" class="rate-review float-right"><i class="icofont-reply"></i>Reply</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="customer-review_wrap">
                                                        <div class="reviewer-img">
                                                            <img src="images/users/reviewer-4.png" class="img-fluid" alt="#">
                                                        </div>
                                                        <div class="customer-content-wrap">
                                                            <div class="customer-content">
                                                                <div class="customer-review">
                                                                    <h6>Amanda G</h6>
                                                                    <p class="comment-date">
                                                                        October 02, 2017
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <p class="customer-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quis facere, qui sequi dolor ipsam quidem consectetur in, blanditiis consequatur distinctio vel voluptatum repudiandae rem et, exercitationem a nisi quibusdam.
                                                            </p>
                                                            <div class="like-btn mar-top-40">
                                                                <a href="#" class="rate-review float-right"><i class="icofont-reply"></i>Reply</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="customer-review_wrap">
                                                <div class="reviewer-img">
                                                    <img src="images/users/reviewer-4.png" class="img-fluid" alt="#">
                                                </div>
                                                <div class="customer-content-wrap">
                                                    <div class="customer-content">
                                                        <div class="customer-review">
                                                            <h6>Amanda G</h6>
                                                            <p class="comment-date">
                                                                October 02, 2017
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <p class="customer-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam qui quisquam praesentium reprehenderit quasi quo!
                                                    </p>
                                                    <div class="like-btn mar-top-40">
                                                        <a href="#" class="rate-review float-right"><i class="icofont-reply"></i>Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </ul>
                        </div> -->
                        <!-- <div class="comment-respond mar-top-60">
                            <h3>Write a comment</h3>
                            <p>Your email address will not be published. Required fields are marked with *</p>
                            <form class="contact-form mar-top-30" id="leave-review">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="contact-form__input-text" type="text" name="name" id="name" placeholder="Name*">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="contact-form__input-text" type="text" name="mail" id="mail" placeholder="Email*">
                                    </div>
                                </div>
                                <textarea class="contact-form__textarea" name="comment" id="comment" placeholder="Comment"></textarea>
                                <input class="btn v1" type="submit" name="submit-contact" id="submit_contact" value="Submit">
                            </form>
                        </div> -->
                    </div>
                    <!--Blog post ends-->
                </div>
            </div>
        </div>
        <!--Blog Details section  ends-->
   <!-- Scroll to top starts-->
        <span class="scrolltotop"><i class="ion-arrow-up-c"></i></span>
        <!-- Scroll to top ends-->
    </div>
    <!--Page Wrapper ends-->

    </section>
</template>
<style scoped>

</style>
<script>
   import frmixin from '../../../src/frontend-mixin'
export default {
     mixins:[frmixin], 
    data(){
            return {
                blogs: [],
              
            }
        },
        created() {
                
                axios.get(this.url+'/api/frontend-blog/'+this.$route.params.id)
                .then(res => {
                    console.log('details',res.data.data);
                    this.blogs = res.data.data
                    console.log('details',this.blogs);

                })
                          
        },

    
}
</script>