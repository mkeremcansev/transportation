@extends('web.layouts.main')
@section('title')
    asdasda
@endsection
@section('script')
    <script src="http://maps.googleapis.com/maps/api/js"></script>
	<script src="{{ asset('web/js/mapmarker.jquery.js') }}"></script>
	<script src="{{ asset('web/js/mapmarker_contacts_func.js') }}"></script>
@endsection
@section('content')
<div id="map_contact"></div>
<div class="container margin_60_35">
    <div class="row">
        <aside class="col-lg-3 col-md-4">
            <div id="contact_info">
                <h3>Contacts info</h3>
                <p>
                    11 Fifth Ave - New York, US<br> + 61 (2) 8093 3400<br>
                    <a href="#">info@domain.com</a>
                </p>
                <ul>
                    <li><strong>Administration</strong>
                        <a href="tel://003823932342">0038 23932342</a><br><a href="tel://003823932342">info@nakilcim.com.com</a><br>
                        <small>Monday to Friday 9am - 7pm</small>
                    </li>
                    <li><strong>General questions</strong>
                        <a href="tel://003823932342">0038 23932342</a><br><a href="tel://003823932342">info@nakilcim.com.com</a><br>
                        <p><small>Monday to Friday 9am - 7pm</small></p>
                    </li>
                </ul>
            </div>
        </aside>
        <div class=" col-lg-8 col-md-8 ml-auto">
            <div class="box_general">
                <h3>Contact us</h3>
                <p>
                    Mussum ipsum cacilds, vidis litro abertis.
                </p>
                <div>
                    <div id="message-contact"></div>
                    <form method="post" action="assets/contact.php" id="contactform">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="lastname_contact" name="lastname_contact" placeholder="Last name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="email" id="email_contact" name="email_contact" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" id="phone_contact" name="phone_contact" class="form-control" placeholder="Phone number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea rows="5" id="message_contact" name="message_contact" class="form-control" style="height:100px;" placeholder="Hello world!"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="verify_contact" class=" form-control" placeholder=" 3 + 1 =">
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Submit" class="btn_1 add_top_20" id="submit-contact">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection