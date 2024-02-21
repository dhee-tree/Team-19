<div class="row row-cols-1 px-3" id="reviews">
    <div class="review-card" class="col">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="">
                <h3 class="p-0 m-0">Reviews <span class="fs-6">({{$reviews->total()}})</span></h2>
            </div>
    
            <div class="dropstart">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Sort
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{request()->fullUrlWithQuery(['page' => '1', 'sort'=>'created_at', 'order'=>'desc'])}}#reviews">Most Recent</a></li>
                    <li><a class="dropdown-item" href="{{request()->fullUrlWithQuery(['page' => '1', 'sort'=>'rating', 'order'=>'desc'])}}#reviews">Rating (High to Low)</a></li>
                    <li><a class="dropdown-item" href="{{request()->fullUrlWithQuery(['page' => '1', 'sort'=>'rating', 'order'=>'asc'])}}#reviews">Rating (Low to High)</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="review-card" class="col">
        <div class="row row-cols-1 row-cols-lg-2 g-4">
            <div class="col">
                @if($user)
                    @php
                        $review = $product->getCachedRelation('reviews')->where('user_id', $user->id)->first() ?? null;
                    @endphp
                    
                    @if(isset($review))
                    <div class="card shadow-sm p-0 mx-0">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="">
                                    <img src="{{asset('images/'.$user->image)}}" width="50" alt="">
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
        
                            <p class="truncate card-text">{{$review->description}}</p>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex flex-row justify-content-between">
                                <div class="">
                                    <p class="card-text"><small class="text-body-secondary">
                                        @if($review->created_at->diffInDays() <= 1)
                                            {{$review->created_at->diffInHours()}} Hours Ago
                                        @else
                                            {{$review->created_at->diffInDays()}} Days Ago 
                                        @endif
                                        @if($review->created_at != $review->updated_at)
                                        , Edited 
                                        @endif
                                        </small></p>
                                </div>
                                @if($user)
                                <form method="POST" action="/review/{{$review->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="this.disabled = true; this.form.submit()" class="btn p-0">
                                        <small><i class="fa-solid fa-small fa-trash"></i> Delete</small>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @else
                    <form method="POST" action="/review/{{$product->id}}" class="shadow-sm row card mb-3 p-0 mx-0">
                        @csrf
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="">
                                    <img src="{{asset('images/'.$user->image)}}" width="50" alt="">
                                </div>
        
                                <div class="vr mx-2"></div>
        
                                <div class="">
                                    <h6 class="card-title">{{$user->first_name}} {{$user->last_name}}</h6>
                                    <h6 class="card-subtitle d-flex flex-row">
                                        <i class="fa-solid fa-star" style="color: #000000;"></i> 
                                        <select class=" ms-1 form-select form-select-sm" name="rating" aria-label="Default select example">
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
                            @error('description')
                            <p class="mt-2 mb-0">Please enter a description. Min 25 characters.</p>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <div class="d-flex flex-row justify-content-end">
                                <div class="">
                                    <button onclick="this.disabled = true; this.form.submit()" type="submit" class="btn p-0">
                                        <small><i class="fa-solid fa-small fa-check"></i> Submit</small>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endif
                @endif
                
                @guest
                    <div class="card shadow-sm p-0 mx-0">
                        @csrf
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="">
                                    <img src="{{asset('images/no-image.svg')}}" width="50" alt="">
                                </div>
        
                                <div class="vr mx-2"></div>
        
                                <div class="">
                                    <h6 class="card-title">You</h6>
                                    <h6 class="card-subtitle">
                                        <i class="fa-solid fa-star" style="color: #000000;"></i> 
                                        5/5
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex flex-row justify-content-end">
                                <div class="p-0 m-0">
                                    <p class="card-text"><a href="{{url('login')}}">Log in</a> to post a review.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endguest
            </div>

            @foreach ($reviews as $review)
            @php
                $reviewUser = $review->user;
                if($user){
                    if($reviewUser->id == $user->id){
                        continue;
                    }
                }
            @endphp
            
            <div class="col">
                <div class="shadow-sm card p-0 mx-0">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="">
                                <img src="{{asset('images/'.$reviewUser->image)}}" width="50" alt="">
                            </div>
        
                            <div class="vr mx-2"></div>
        
                            <div class="">
                                <h6 class="card-title">{{$reviewUser->first_name}} {{$reviewUser->last_name}}</h6>
                                <h6 class="card-subtitle">
                                    <i class="fa-solid fa-star" style="color: #000000;"></i> 
                                    {{$review->rating}}/5
                                </h6>
                            </div>
                        </div>
                        
                        <hr>
        
                        <p class="truncate card-text fs-6 review">{{$review->description}}</p>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="">
                                <p class="card-text"><small class="text-body-secondary">
                                    @if($review->created_at->diffInDays() <= 1)
                                        {{$review->created_at->diffInHours()}} Hours Ago
                                    @else
                                    {{$review->created_at->diffInDays()}} Days Ago 
                                    @endif
                                    @if($review->created_at != $review->updated_at)
                                    , Edited 
                                    @endif
                                </small></p>
                            </div>
                            @if($user)
                            @if ($reviewUser == $user || $user->isAdmin())
                            <div class="">
                                <form method="POST" action="/review/{{$review->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="this.disabled = true; this.form.submit()" class="btn p-0">
                                        <small><i class="fa-solid fa-small fa-trash"></i> Delete</small>
                                    </button>
                                </form>
                            </div>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <hr class="my-3 mt-4">

    @if ($reviews->hasPages())
    <div class="col m-0" id="pageSelector">
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
    @endif
</div>
