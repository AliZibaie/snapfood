<x-mail::message>
# {{$status}}
    @if($from)
        From address : {{$from}}
    @endif
    @if($to)
        To address : {{$to}}
    @endif
    @if($food)
        Food : {{$food}}
    @endif
    @if($count)
        Count : {{$count}}
    @endif
    @if($total_price)
        Total price : {{$total_price}}
    @endif


{{--<x-mail::button :url="''">--}}
{{--Button Text--}}
{{--</x-mail::button>--}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
