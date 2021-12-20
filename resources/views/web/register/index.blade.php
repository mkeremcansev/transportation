@extends('web.layouts.main')
@section('title')
    asdasdas
@endsection
@section('content')
<div id="hero_register">
    <div class="container margin_120_95">			
        <div class="row">
            <div class="col-lg-6">
                <h1>It's time to find you!</h1>
                <p class="lead">Te pri adhuc simul. No eros errem mea. Diam mandamus has ad. Invenire senserit ad has, has ei quis iudico, ad mei nonumes periculis.</p>
                <div class="box_feat_2">
                    <i class="pe-7s-map-2"></i>
                    <h3>Let patients to Find you!</h3>
                    <p>Ut nam graece accumsan cotidieque. Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet.</p>
                </div>
                <div class="box_feat_2">
                    <i class="pe-7s-date"></i>
                    <h3>Easly manage Bookings</h3>
                    <p>Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet. Eum no atqui putant democritum, velit nusquam sententiae vis no.</p>
                </div>
                <div class="box_feat_2">
                    <i class="pe-7s-phone"></i>
                    <h3>Instantly via Mobile</h3>
                    <p>Eos eu epicuri eleifend suavitate, te primis placerat suavitate his. Nam ut dico intellegat reprehendunt, everti audiam diceret in pri, id has clita consequat suscipiantur.</p>
                </div>
            </div>
            <div class="col-lg-5 ml-auto">
                <div class="box_form">
                    <nav class="mb-4">
                        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Bireysel</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Kurumsal</button>
                        </div>
                    </nav>
                    <div id="message-register"></div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form method="post" action="assets/register_doctor.php" id="register_doctor">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name" name="name_register" id="name_register">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Last Name" name="lastname_register" id="lastname_register">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Specialization" name="specialization" id="specialization">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="City" name="city_register" id="city_register">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-select" name="country_register" id="country_register">
                                                <option value="">Country</option>
                                                <option value="Europe">Europe</option>
                                                <option value="Asia">Asia</option>
                                                <option value="Unated States">Unated States</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Address" name="address_register" id="address_register">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Mobile Phone" name="mobile_register" id="mobile_register">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Office Phone" name="office_phone_register" id="office_phone_register">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email Address" name="email_register" id="email_register">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" id="verify_register" class="form-control" placeholder="Human verify: 3 + 1 =?">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <input type="submit" class="btn_1" value="Submit" id="submit-register">
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form method="post" action="assets/register_doctor.php" id="register_doctor">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name" name="name_register" id="name_register">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Specialization" name="specialization" id="specialization">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="City" name="city_register" id="city_register">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-select" name="country_register" id="country_register">
                                                <option value="">Country</option>
                                                <option value="Europe">Europe</option>
                                                <option value="Asia">Asia</option>
                                                <option value="Unated States">Unated States</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Address" name="address_register" id="address_register">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Mobile Phone" name="mobile_register" id="mobile_register">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Office Phone" name="office_phone_register" id="office_phone_register">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email Address" name="email_register" id="email_register">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" id="verify_register" class="form-control" placeholder="Human verify: 3 + 1 =?">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <input type="submit" class="btn_1" value="Submit" id="submit-register">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection