


<div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
    @foreach(config('app.available_locales') as $locale_name => $available_locale)
    {{-- @foreach($available_locales as $locale_name => $available_locale) --}}
        @if($available_locale === app()->getLocale())
        {{-- @if($available_locale === $current_locale) --}}
            <span class="ml-2 mr-2 text-gray-700">{{ $locale_name }}</span><br><br><br>
        @else
            <a class="ml-1 underline ml-2 mr-2" href="{{ $available_locale }}">
                <span>{{ $locale_name }}</span>
            </a><br><br><br>
        @endif
    @endforeach
</div>