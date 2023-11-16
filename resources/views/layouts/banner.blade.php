<div class="relative">
    @if($banner = \App\Models\Banner::query()->where('status', 1)->first())
        <img src="{{asset($banner->image->url)}}" alt="{{$banner->alt}}" class="w-full max-h-20">
        <p class="absolute top-0">{{$banner->title}}</p>
    @endif
</div>
