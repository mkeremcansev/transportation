@component('mail::message')
{{-- Greeting --}}
# @lang('words.hello_name', ['name'=>$user->name])

{{-- Intro Lines --}}
@lang('words.just_now_created_topic', ['company'=>config('app.name'), 'button'=>__('words.just_now_created_topic_button')])
{{-- Outro Lines --}}

{{-- Action Button --}}
@component('mail::button', ['url' => route('web.topic.index'), 'color' => 'primary'])
@lang('words.just_now_created_topic_button')
@endcomponent

{{-- Salutation --}}
{{ config('app.name') }}
@endcomponent
