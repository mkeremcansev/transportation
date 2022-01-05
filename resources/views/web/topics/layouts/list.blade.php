<div class="container margin_60_35">
	<div class="row">
		<div class="col-lg-6">
            @foreach ($a_topics as $key => $a_topic)
			<div class="strip_list wow fadeIn">
				<figure>
					<img src="{{ asset($a_topic->getUserInfo->profile_path) }}" alt="{{ $a_topic->getUserInfo->name }}">
				</figure>
				<small>
					@if (!is_null($a_topic->getDepartureRoute->parent_id))
						{{ $a_topic->getDepartureRoute->getMainCity->title .__('words.separator').$a_topic->getDepartureRoute->title }}
						<i class="icon-left"></i> 
					@else
						{{ $a_topic->getDepartureRoute->title }}
						<i class="icon-left"></i> 
					@endif
					@if (!is_null($a_topic->getArrivalRoute->parent_id))
						{{ $a_topic->getArrivalRoute->getMainCity->title .__('words.separator').$a_topic->getArrivalRoute->title }}
					@else
						{{ $a_topic->getArrivalRoute->title }}
					@endif
				</small>
				<h3 class="mt-2">{{ $a_topic->getUserInfo->company }}</h3>
				<p>{{ $a_topic->product_description }}</p>
				<h6>{{ $a_topic->tax == 1 ? priceFormat($a_topic->price).__('words.currency_unit').__('words.plus_kdv') : priceFormat($a_topic->price).__('words.currency_unit') }}</h6>
				<ul>
					<li><a href="javascript:void()" onclick="onHtmlClick('Cities', {{ $key }})" class="btn_listing">@lang('words.view_on_map')</a>
					</li>
					<li><a href="{{ route('web.topic.show', $a_topic->slug) }}">@lang('words.detail')</a></li>
				</ul>
			</div>
            @endforeach
			{{ $a_topics->links('vendor.pagination.bootstrap-4') }}
		</div>
		<aside class="col-lg-6" id="sidebar">
			<div id="map_listing" class="normal_list">
			</div>
		</aside>
	</div>
</div>