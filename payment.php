<?php
$title="payment |SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!-- dont change -->
<!-- your code -->
    <div>
        <div class="row">
            <div class="col align-self-end">
                <h1 class="text-uppercase text-sm-center text-md-center text-lg-center text-xl-center" style="height: 40px;margin: 5px;font-size: 56px;">PAYMENT</h1>
            </div>
        </div>
        <div class="row">
            <div class="col" style="width: 829px;height: 38px;"><i class="fa fa-search float-right" style="margin: 9px;height: 10px;"></i><input class="border rounded float-right d-xl-flex" type="search" autocomplete="on" style="width: 214px;height: 27px;padding: 0px;filter: contrast(91%);margin: 5px;"></div>
        </div>
        <div class="row">
            <div class="col-sm-4"><img src="assets/img/Payment-PNG-Transparent-HD-Photo.png" style="width: 403px;height: 349px;"></div>
            <div class="col">
                <div>
                    <div class="container-fluid">
                        <form action="javascript:void(0);" method="get" id="contactForm"><input class="form-control" type="hidden" name="Introduction" value="This email was sent from www.awebsite.com"><input class="form-control" type="hidden" name="subject" value="Awebsite.com Contact Form"><input class="form-control"
                                type="hidden" name="to" value="email@awebsite.com">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div id="successfail"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6" id="message">
                                    <div class="form-group"><label for="from-name">Name</label><span class="required-input">*</span>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user-o"></i></span></div><input class="form-control" type="text" name="name" required="" placeholder="Full Name" id="from-name"></div>
                                    </div>
                                    <div class="form-group"><label for="from-name">Department</label><span class="required-input">*</span>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-mortar-board"></i></span></div><input class="form-control" type="text" name="name" required="" placeholder="Department" id="from-name"></div>
                                    </div>
                                    <div class="form-group"><label for="from-email">Email</label><span class="required-input">*</span>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope-o"></i></span></div><input class="form-control" type="text" name="email" required="" placeholder="Email Address" id="from-email"></div>
                                    </div>
                                    <div class="form-group"><label for="address">Address</label><span class="required-input">*</span>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-map-marker"></i></span></div><input class="form-control" type="text" name="email" required="" placeholder=" Address" id="from-email"></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 col-sm-6 col-md-12 col-lg-6" style="height: 140px;">
                                            <div class="form-group"><label for="from-phone">Phone</label><span class="required-input">*</span>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div><input class="form-control" type="text" name="phone" required="" placeholder="Primary Phone" id="from-phone"></div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="from-phone">Hostel Info</label><span class="required-input">*</span>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-home"></i></span></div><input class="form-control" type="text" name="phone" required="" placeholder="Room Number" id="from-phone"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="d-flex d-md-none">
                                </div>
                                <div class="col-12 col-md-6 d-xl-flex align-items-xl-end" style="width: 377px;">
                                    <div class="form-row d-xl-flex justify-content-start .payment-dialog-row" style="height: 485px;min-width: 0px;padding: 0px;width: 413px;">
                                        <div class="col-md-11 offset-md-4 d-xl-flex flex-row-reverse justify-content-between align-items-end align-content-end align-self-start mx-auto justify-content-xl-end" style="width: 295px;height: 390px;">
                                            <div class="card credit-card-box" style="width: 336px;max-width: 0px;">
                                                <div class="card-header" style="width: 322px;filter: blur(0px) brightness(114%) contrast(109%) grayscale(0%) hue-rotate(0deg) invert(0%) saturate(156%) sepia(0%);">
                                                    <h3 style="filter: brightness(96%) contrast(111%) saturate(67%);"><span class="panel-title-text" style="width: 0px;filter: blur(0px) brightness(0%) contrast(200%);opacity: 0.80;">Payment Details </span><img class="img-fluid panel-title-image" src="assets/img/accepted_cards.png"
                                                            style="width: 288px;"></h3>
                                                </div>
                                                <div class="card-body" style="width: 339px;">
                                                    <form id="payment-form">
                                                        <div class="form-row">
                                                            <div class="col-12">
                                                                <div class="form-group"><label for="cardNumber">Card number </label>
                                                                    <div class="input-group"><input class="form-control" type="tel" required="" placeholder="Valid Card Number" id="cardNumber">
                                                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-credit-card"></i></span></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-7">
                                                                <div class="form-group"><label for="cardExpiry"><span>expiration </span><span>EXP </span> date</label><input class="form-control" type="tel" required="" placeholder="MM / YY" id="cardExpiry"></div>
                                                            </div>
                                                            <div class="col-5 pull-right">
                                                                <div class="form-group"><label for="cardCVC">cv code</label><input class="form-control" type="tel" required="" placeholder="CVC" id="cardCVC"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-12"><button class="btn btn-success btn-block btn-lg" type="submit">Start Subscription</button></div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal fade" role="dialog" tabindex="-1" id="modal1">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Contact Information</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                <div class="modal-body">
                                    <form action="javascript:void(0);" method="get" id="contactForm"><input class="form-control" type="hidden" name="Introduction" value="This email was sent from www.awebsite.com"><input class="form-control" type="hidden" name="subject" value="Awebsite.com Contact Form"><input class="form-control"
                                            type="hidden" name="to" value="email@awebsite.com">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div id="successfail"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12 col-md-6" id="message">
                                                <h2 class="h4"><i class="fa fa-envelope"></i> Contact Us<small><small class="required-input">&nbsp;(*required)</small></small>
                                                </h2>
                                                <div class="form-group"><label for="from-name">Name</label><span class="required-input">*</span>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user-o"></i></span></div><input class="form-control" type="text" name="name" required="" placeholder="Full Name" id="from-name"></div>
                                                </div>
                                                <div class="form-group"><label for="from-email">Email</label><span class="required-input">*</span>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope-o"></i></span></div><input class="form-control" type="text" name="email" required="" placeholder="Email Address" id="from-email"></div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                                        <div class="form-group"><label for="from-phone">Phone</label><span class="required-input">*</span>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div><input class="form-control" type="text" name="phone" required="" placeholder="Primary Phone" id="from-phone"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                                        <div class="form-group"><label for="from-calltime">Best Time to Call</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></div><select class="form-control" name="call time" id="from-calltime"><optgroup label="Best Time to Call"><option value="Morning" selected="">Morning</option><option value="Afternoon">Afternoon</option><option value="Evening">Evening</option></optgroup></select></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label for="from-comments">Comments</label><textarea class="form-control" rows="5" name="comments" placeholder="Enter Comments" id="from-comments"></textarea></div>
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col"><button class="btn btn-primary btn-block" type="reset"><i class="fa fa-undo"></i> Reset</button></div>
                                                        <div class="col"><button class="btn btn-primary btn-block" type="submit">Submit <i class="fa fa-chevron-circle-right"></i></button></div>
                                                    </div>
                                                </div>
                                                <hr class="d-flex d-md-none">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <h2 class="h4"><i class="fa fa-location-arrow"></i> Locate Us</h2>
                                                <div class="form-row">
                                                    <div class="col-12">
                                                        <div class="static-map"><a href="https://www.google.com/maps/place/Daytona+International+Speedway/@29.1815062,-81.0744275,15z/data=!4m13!1m7!3m6!1s0x88e6d935da1cced3:0xa6b3e1bc0f2fc83a!2s1801+W+International+Speedway+Blvd,+Daytona+Beach,+FL+32114!3b1!8m2!3d29.187028!4d-81.0703076!3m4!1s0x88e6d949a4cb8593:0x1387c6c0b5c8cc97!8m2!3d29.1851681!4d-81.0705292"
                                                                target="_blank" rel="noopener"> <img class="img-fluid" src="http://maps.googleapis.com/maps/api/staticmap?autoscale=2&amp;size=600x210&amp;maptype=roadmap&amp;format=png&amp;visual_refresh=true&amp;markers=size:mid%7Ccolor:0xff0000%7Clabel:%7C582+1801+W+International+Speedway+Blvd+Daytona+Beach+FL+32114&amp;zoom=12" alt="Google Map of Daytona International Speedway"></a></div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-12 col-lg-6">
                                                        <h2 class="h4"><i class="fa fa-user"></i> Our Info</h2>
                                                        <div><span><strong>Name</strong></span></div>
                                                        <div><span>email@awebsite.com</span></div>
                                                        <div><span>www.awebsite.com</span></div>
                                                        <hr class="d-sm-none d-md-block d-lg-none">
                                                    </div>
                                                    <div class="col-sm-6 col-md-12 col-lg-6">
                                                        <h2 class="h4"><i class="fa fa-location-arrow"></i> Our Address</h2>
                                                        <div><span><strong>Office Name</strong></span></div>
                                                        <div><span>55 Icannot Dr</span></div>
                                                        <div><span>Daytone Beach, FL 85150</span></div>
                                                        <div><abbr data-toggle="tooltip" data-placement="top" title="Office Phone: 555-867-5309">O:</abbr> 555-867-5309</div>
                                                        <hr class="d-sm-none">
                                                    </div>
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
        </div>
        <div class="row">
            <div class="col-sm-4"><button class="btn btn-primary border rounded" type="button" style="width: 107px;height: 38px;margin: 0px;">Pay&amp;Print</button><button class="btn btn-primary text-right" type="button" style="margin: 6px;background-color: rgb(65,150,63);width: 73;">Report</button>
                <button
                    class="btn btn-primary" type="button" style="margin: 0px;padding: 6px;background-color: rgb(167,29,29);width: 73px;">Close</button><button class="btn btn-primary" type="button" style="margin: 6px;background-color: rgb(238,134,102);width: 73px;">Clear</button></div>
            <div class="col">
                <div class="form-group" style="width: 238px;"><label for="from-name">Amount</label><span class="required-input">*</span>
                    <div class="input-group">
                        <div class="input-group-prepend"></div><input class="form-control" type="text" name="name" required="" placeholder="Amount" id="from-name" style="width: 324px;"></div>
                </div>
            </div>
            <div class="col">
                <div class="form-group" style="width: 260px;"><label for="from-name">Reason</label><span class="required-input">*</span>
                    <div class="input-group">
                        <div class="input-group-prepend"></div><input class="form-control" type="text" name="name" required="" placeholder="Reason" id="from-name" style="width: 317px;"></div>
                </div>
            </div>
        </div>

    <!--end part-->


    <!-- dont change -->
    <?php
    include_once("footer.php");
    ?>
