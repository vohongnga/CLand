@extends('templates.cland.master2')
@section('content')
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="contact__widget__item">
                        <span class="icon_phone"></span>
                        <h4>Phone</h4>
                        <p>+01-3-8888-6868</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="contact__widget__item">
                        <span class="icon_pin_alt"></span>
                        <h4>Phone</h4>
                        <p>+01-3-8888-6868</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="contact__widget__item">
                        <span class="icon_clock_alt"></span>
                        <h4>Phone</h4>
                        <p>+01-3-8888-6868</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="contact__widget__item">
                        <span class="icon_mail_alt"></span>
                        <h4>Phone</h4>
                        <p>+01-3-8888-6868</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    
    <!-- Map End -->

    <!-- Leave Comment Begin -->
    <div class="leave-comment comment-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="leave__comment__text">
                        <h2>Leave A Comment</h2>
                        <form action="" method = post>
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <input type="text" placeholder="Name*" name = "name">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <input type="text" placeholder="Email*" name = "email">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <input type="text" placeholder="SĐT*" name = "phone">
                                </div>
                                <div class="col-lg-12 text-center">
                                    <textarea placeholder="Your Comment" name = "content"></textarea>
                                    <button type="submit" class="site-btn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
    