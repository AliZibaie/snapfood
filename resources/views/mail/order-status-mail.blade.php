<x-mail::message>
# {{$status}}
    @if(isset($from))
        From address : {{$from}}
    @endif
    @if(isset($to))
        To address : {{$to}}
    @endif
    @if(isset($food))
        Food : {{$food}}
    @endif
    @if(isset($count))
        Count : {{$count}}
    @endif
    @if(isset($total_price))
        Total price : {{$total_price}}
    @endif


{{--<x-mail::button :url="''">--}}
{{--Button Text--}}
{{--</x-mail::button>--}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
