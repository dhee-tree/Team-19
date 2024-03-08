<script src="{{asset('js/reviews/modal.js')}}"></script>

<div class="row row-cols-1 px-3" id="reviews">
    <div class="review-card" class="col">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="">
                <h3 class="p-0 m-0">Reviews <span class="fs-6">({{$reviews->total()}})</span></h2>
            </div>
    
            <div class="dropstart">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Sort By
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
                                <div class="flex-grow-1">
                                    <p class="card-text"><small class="text-body-secondary">
                                        @if($review->created_at->diffInDays() <= 1)
                                            {{$review->created_at->diffInHours()}} Hours Ago
                                        @else
                                        {{$review->created_at->diffInDays()}} Days Ago
                                        @endif
                                        @if($review->created_at != $review->updated_at)
                                        <span>(Edited)</span>
                                        @endif
                                    </small></p>
                                </div>
                                
                                <div class="">
                                    <button 
                                    type="button" 
                                    data-bs-toggle="modal" 
                                    data-modal-message="{{$review->description}}" 
                                    data-bs-target="#reviewModal" 
                                    data-review-id="{{$review->id}}" 
                                    class="btn-view btn p-0"
                                    >
                                        <small><i class="fa-solid fa-eye"></i> View</small>
                                    </button>
                                </div>
                                
                                @if($user)
                                <div class="ms-2">
                                    <form id="updateForm{{$review->id}}" method="POST" action="/review/{{$review->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#confirmationModal" 
                                            data-modal-message="Are you sure you want to delete this review? This cannot be undone."
                                            data-review-user-id="{{$user->id}}" 
                                            data-review-id="{{$review->id}}" 
                                            class="btn-submit btn p-0"
                                        >
                                            <small><i class="fa-solid fa-small fa-trash"></i> Delete</small>
                                        </button>
                                    </form>
                                </div>
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
                                        <select class="ms-1 form-select form-select-sm" name="rating" aria-label="Review score selection">
                                            <option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('rating') == '5' ? 'selected' : '' }}>5</option>
                                        </select>
                                    </h6>
                                </div>
                            </div>
                            
                            <hr>
        
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3" >{{old('description')}}</textarea>
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
                                    <p class="card-text"><a class="link-dark" href="{{url('login')}}">Sign in</a> to post a review.</p>
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
                            <div class="flex-grow-1">
                                <p class="card-text"><small class="text-body-secondary">
                                    @if($review->created_at->diffInDays() <= 1)
                                        {{$review->created_at->diffInHours()}} Hours Ago
                                    @else
                                    {{$review->created_at->diffInDays()}} Days Ago 
                                    @endif
                                    @if($review->created_at != $review->updated_at)
                                    <span>(Edited)</span>
                                    @endif
                                </small></p>
                            </div>
                            
                            <div class="">
                                <button 
                                    type="button" 
                                    data-bs-toggle="modal"
                                    data-bs-target="#reviewModal" 
                                    data-modal-message="{{$review->description}}" 
                                    data-review-id="{{$review->id}}" 
                                    class="btn-view btn p-0"
                                >
                                    <small><i class="fa-solid fa-eye"></i> View</small>
                                </button>
                            </div>

                            @if($user)
                                @if ($reviewUser == $user || $user->isAdmin())
                                <div class="ms-2">
                                    <form id="updateForm{{$review->id}}" method="POST" action="/review/{{$review->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#confirmationModal" 
                                            data-modal-message="Are you sure you want to delete this review? This cannot be undone." 
                                            data-review-id="{{$review->id}}" 
                                            data-review-user-id="{{$reviewUser->id}}"
                                            class="btn-submit btn p-0"
                                        >
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

<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="header modal-header bg-dark text-light py-3">
                <h5 class="fw-bold modal-title" id="confirmationModalLabel">Confirmation</h5>
            </div>
            <div class="modal-body mb-0">
                <p id="confirmationMessage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn p-0" data-bs-dismiss="modal">
                    <span><i class="fa-solid fa-xmark"></i></span> Cancel
                </button>
                <div class="vr"></div>
                <button type="submit" id="confirmationModalButton" class="btn p-0">
                    <span><i class="fa-solid fa-small fa-check"></i> Confirm</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="reviewModalUpdateForm" method="POST" class="modal-content shadow-lg" action="">
            @csrf
            @method('PUT')
            <div class="header modal-header bg-dark text-light py-3">
                <h5 class="fw-bold modal-title" id="reviewModalLabel">Review</h5>
            </div>
            <div class="modal-body mb-0">
                <textarea 
                    @if($user)@if(!$user->isAdmin()) disabled @endif @else disabled @endif
                    style="height: 200px"
                    class="form-control" 
                    name="description" 
                    id="reviewModalDescription">
                </textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn p-0" data-bs-dismiss="modal">
                    <span><i class="fa-solid fa-xmark"></i></span> Exit
                </button>
                
                @if($user)
                    @if($user->isAdmin())
                        <div class="vr modal-submit-element"></div>

                        <button type="submit" id="modalSubmitButton" class="modal-submit-element btn p-0">
                            <span><i class="fa-solid fa-small fa-check"></i> Save Changes</span>
                        </button>
                    @endif
                @endif

            </div>
        </form>
    </div>
</div>
