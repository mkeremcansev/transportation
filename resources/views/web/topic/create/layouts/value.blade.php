<div class="container margin_60">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8">
            <nav>
                <div class="container main_title_4">
							<h3><i class="icon_circle-slelected"></i>@lang('words.general_info')</h3>
                </div>
            </nav>
            <div class="box_general_3 cart">
                <div class="form_title">
                    <h3><strong>1</strong>@lang('words.location_info')</h3>
                </div>
                <div class="step mb-5">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <label>@lang('words.where_from')</label>
                            <div class="form-group">
                                <select id="where_from_city" class="form-control">
                                    <option value="" selected>@lang('words.choose_city')</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select id="where_from_province" class="form-control">
                                    <option value="" selected>@lang('words.choose_province')</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label>@lang('words.to_where')</label>
                            <div class="form-group">
                                <select id="to_where_city" class="form-control">
                                    <option value="" selected>@lang('words.choose_city')</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select id="to_where_province" class="form-control">
                                    <option value=""  selected>@lang('words.choose_province')</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form_title">
                    <h3><strong>2</strong>@lang('words.date_info')</h3>
                </div>
                <div class="step mb-5">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>@lang('words.purchase_date')</label>
                                <input class="form-control" type="text" id="topic_create_purchase_date" data-lang="en" data-format="d/m/Y"  data-min-year="2022" data-max-year="2030">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>@lang('words.delivery_date')</label>
                                <input class="form-control" type="text" id="topic_create_delivery_date" data-lang="en" data-format="d/m/Y"  data-min-year="2022" data-max-year="2030">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form_title">
                    <h3><strong>3</strong>@lang('words.product_intoformation')</h3>
                </div>
                <div class="step mb-5">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>@lang('words.product_type')</label>
                                <input class="form-control" type="text" id="product_type">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>@lang('words.product_quantity')</label>
                                <input class="form-control" type="text" id="product_quantity">
                            </div>
                        </div>
                         <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>@lang('words.delivery_counts')</label>
                                <input class="form-control" type="text" id="topic_delivery">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label>@lang('words.vehicle_type')</label>
                            <div class="form-group">
                                <select class="form-control" id="vehicle_type">
                                    <option value='' selected>@lang('words.choose_vehicle_type')</option>
                                    @foreach ($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}">{{ $vehicle->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>@lang('words.product_description')</label>
                                <input class="form-control" type="text" id="product_description">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form_title">
                    <h3><strong>4</strong>@lang('words.general_info')</h3>
                </div>
                <div class="step mb-5">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>@lang('words.price')</label>
                                <input class="form-control" type="number" min="0" id="topic_price">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div id="policy">
                                <label>@lang('words.tax')</label>
                                    <div class="form-group mt-2">
                                        <div class="checkboxes">
                                            <label class="container_check">@lang('words.kdv_included')</a>
                                                <input type="checkbox" id="topic_tax">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a  id="topic_create" class="topic_detail_check_btn mb-3">@lang('words.save_and_send')</a>
            </div>
        </div>
    </div>
</div>