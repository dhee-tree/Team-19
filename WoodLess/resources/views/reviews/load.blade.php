<div class="row m-0 px-1 py-2" id="reviews">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="">
            <h2 class="p-0 m-0">Reviews</h2>
        </div>

        <div class="dropstart">
            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Sort
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{request()->fullUrlWithQuery(['sort'=>'created_at', 'order'=>'desc'])}}#reviews">Most Recent</a></li>
                <li><a class="dropdown-item" href="{{request()->fullUrlWithQuery(['sort'=>'rating', 'order'=>'desc'])}}#reviews">Rating (High to Low)</a></li>
                <li><a class="dropdown-item" href="{{request()->fullUrlWithQuery(['sort'=>'rating', 'order'=>'asc'])}}#reviews">Rating (Low to High)</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <form method="POST" action="/review/{{$product->id}}" class="row card mb-3 p-0 mx-0">
            @csrf
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="">
                        <img src="{{asset('images/no-image.svg')}}" width="60" alt="">
                    </div>

                    <div class="vr mx-2"></div>

                    <div class="">
                        <h6 class="card-title">{{'first'}} {{'last'}}</h6>
                        <h6 class="card-subtitle d-flex flex-row">
                            <i class="fa-solid fa-star" style="color: #000000;"> </i> 
                            <select class="form-select form-select-sm" name="rating" aria-label="Default select example">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option selected value="5">5</option>
                            </select>
                        </h6>
                    </div>
                </div>
                
                <hr>

                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="card-footer">
                <div class="d-flex flex-row justify-content-end">
                    <div class="">
                        <button type="submit" class="btn p-0">
                            <small><i class="fa-solid fa-small fa-check"></i> Submit</small>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @foreach ($reviews as $review)
    @php
        $user = $review->user;
    @endphp
    
    <div class="container">
        <div class="row card mb-3 p-0 mx-0">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="">
                        <img src="{{asset('images/'.$user->image)}}" width="60" alt="">
                    </div>

                    <div class="vr mx-2"></div>

                    <div class="">
                        <h6 class="card-title">{{$user->first_name}} {{$user->last_name}}</h6>
                        <h6 class="card-subtitle">
                            <i class="fa-solid fa-star" style="color: #000000;"></i> 
                            {{$review->rating}}/5
                        </h6>
                    </div>
                </div>
                
                <hr>

                <p class="card-text">{{$review->description}}</p>
            </div>
            <div class="card-footer">
                <div class="d-flex flex-row justify-content-between">
                    <div class="">
                        <p class="card-text"><small class="text-body-secondary">
                            {{$review->created_at->diffInDays()}} Days Ago 
                            @if($review->created_at != $review->updated_at)
                            , Edited 
                            @endif
                        </small></p>
                    </div>
                    <div class="">
                        <form method="POST" action="/review/{{$review->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn p-0">
                                <small><i class="fa-solid fa-small fa-trash"></i> Delete</small>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col" id="pageSelector">
        <nav aria-label="...">
            <ul class="pagination">
              <li class="page-item @if($reviews->onFirstPage()) disabled @endif">
                <a class="page-link" href="{{$reviews->previousPageUrl()}}">Previous</a>
              </li>
              <li class="page-item @if($reviews->onLastPage()) disabled @endif">
                <a class="page-link" href="{{$reviews->nextPageUrl()}}">Next</a>
              </li>
            </ul>
          </nav>
    </div>
</div>