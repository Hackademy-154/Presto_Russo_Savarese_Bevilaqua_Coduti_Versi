<div class="card" style="width: 18rem;">
    <img src="{{$announcement->images->isNotEmpty() ? $announcement->images->first()->getUrl(700, 1000) :
    'https://picsum.photos/200'}}" class="card-img-top" alt="Immagine dell'articolo {{ $announcement->title }}">
    <div class="card-body">
        <h5 class="card-title">{{ $announcement->title }}</h5>
        <p class="card-text">{{__('ui.price')}}: {{ $announcement->price }} €</p>
        <p class="card-text">{{__('ui.category')}}: {{ $announcement->category->name }}</p>
        <a href="{{ route('announcements.show', compact('announcement')) }}" class="btn btn-primary">{{__('ui.announcementDet')}}</a>
    </div>
</div>
