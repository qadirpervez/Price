<ul>
  @foreach ($asidecategories as $asideCategory)
    <li class="profile-li"><a class="profile-links" href="{{ route('category.guestProducts', $asideCategory->id) }}">{{ $asideCategory->name }}</a></li>
  @endforeach
</ul>
