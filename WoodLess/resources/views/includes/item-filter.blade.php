<div class="container">
    <div class="card filter" style="width: 18rem;">
        <form id="filter" action="{{ route('products.filter') }}" method="GET">
            @if (isset($search_text))
                <input type="hidden" name="search" value="{{ $search_text }}">
            @endif
            <div class="card-body">
                <h5 class="card-title">Filter</h5>
                <div class="accordion" id="FilterAccordian">
                    <div class="accordion-item">
                      
                <div class="accordion" id="SortAccordion">
                      <!-- Sort Section -->
                      <!-- price -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="SortAccordion-headingPrice">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#SortAccordion-collapsePrice" aria-expanded="false"
                                aria-controls="SortAccordion-collapsePrice">
                                Price
                            </button>
                        </h2>
                        <div id="SortAccordion-collapsePrice" class="accordion-collapse collapse"
                            aria-labelledby="SortAccordion-headingPrice">
                            <div class="accordion-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="pricehighlow"
                                        name="sortprice" value="pricehighlow">
                                    <label class="form-check-label" for="pricehighlow">
                                        High to Low
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="pricelowhigh"
                                        name="sortprice" value="pricelowhigh">
                                    <label class="form-check-label" for="pricelowhigh">
                                        Low to High
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="SortAccordion-headingRating">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#SortAccordion-collapseRating" aria-expanded="false"
                                aria-controls="SortAccordion-collapseRating">
                                Rating
                            </button>
                        </h2>
                        <div id="SortAccordion-collapseRating" class="accordion-collapse collapse"
                            aria-labelledby="SortAccordion-headingRating">
                            <div class="accordion-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ratinghighlow"
                                        name="sortRating" value="ratinghighlow">
                                    <label class="form-check-label" for="ratinghighlow">
                                        High to Low
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ratinglowhigh"
                                        name="sortrating" value="ratinglowhigh">
                                    <label class="form-check-label" for="ratinglowhigh">
                                        Low to High
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="SortAccordion-headingDiscount">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#SortAccordion-collapseRating" aria-expanded="false"
                                aria-controls="SortAccordion-collapseRating">
                                Discount
                            </button>
                        </h2>
                        <div id="SortAccordion-collapseRating" class="accordion-collapse collapse"
                            aria-labelledby="SortAccordion-headingDiscount">
                            <div class="accordion-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="discounthighlow"
                                        name="sortdiscount" value="ratinghighlow">
                                    <label class="form-check-label" for="discounthighlow">
                                        High to Low
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="discountlowhigh"
                                        name="sortdiscount" value="discountlowhigh">
                                    <label class="form-check-label" for="discountlowhigh">
                                        Low to High
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                
                        <h2 class="accordion-header" id="FilterAccordian-headingCategories">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#FilterAccordian-collapseCategories" aria-expanded="true"
                                aria-controls="FilterAccordian-collapseCategories">
                                Categories
                            </button>
                        </h2>
                        <div id="FilterAccordian-collapseCategories" class="accordion-collapse collapse show"
                            aria-labelledby="FilterAccordian-headingCategories">
                            <div class="accordion-body">

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Kitchen"
                                            name="categories[]" value="Kitchen" <?php if (in_array('Kitchen', request('categories', []))) {
                                                echo 'checked';
                                            } ?>>
                                        <label class="form-check-label" for="Kitchen">
                                            Kitchen
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Dining"
                                            name="categories[]" value="Dining" <?php if (in_array('Dining', request('categories', []))) {
                                                echo 'checked';
                                            } ?>>
                                        <label class="form-check-label" for="Dining">
                                            Dining
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Bedroom"
                                            name="categories[]" value="Bedroom" <?php if (in_array('Bedroom', request('categories', []))) {
                                                echo 'checked';
                                            } ?>>
                                        <label class="form-check-label" for="Bedroom">
                                            Bedroom
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Bathroom"
                                            name="categories[]" value="Bathroom" <?php if (in_array('Bathroom', request('categories', []))) {
                                                echo 'checked';
                                            } ?>>
                                        <label class="form-check-label" for="Bathroom">
                                            Bathroom
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Office"
                                            name="categories[]" value="Office" <?php if (in_array('Office', request('categories', []))) {
                                                echo 'checked';
                                            } ?>>
                                        <label class="form-check-label" for="Office">
                                            Office
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Garden"
                                            name="categories[]" value="Garden" <?php if (in_array('Garden', request('categories', []))) {
                                                echo 'checked';
                                            } ?>>
                                        <label class="form-check-label" for="Garden">
                                            Garden
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Price Range Section -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="FilterAccordion-headingPrice">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#FilterAccordion-collapsePrice" aria-expanded="false"
                                aria-controls="FilterAccordion-collapsePrice">
                                Price
                            </button>
                        </h2>
                        <div id="FilterAccordion-collapsePrice" class="accordion-collapse collapse"
                            aria-labelledby="FilterAccordion-headingPrice">
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <label for="minimumPrice" class="form-label">Minimum Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text">£</span>
                                        <input type="text" class="form-control" id="minCost" name="minCost"
                                            placeholder="enter price"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                            value="<?php echo htmlspecialchars(request('minCost')); ?>">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="maximumPrice" class="form-label">Maximum Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text">£</span>
                                        <input type="text" class="form-control" id="maxCost" name="maxCost"
                                            placeholder = "enter price"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                            value="<?php echo htmlspecialchars(request('maxCost')); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="FilterAccordian-headingRating">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#FilterAccordian-collapseRating" aria-expanded="false"
                                aria-controls="FilterAccordian-collapseRating">
                                Rating
                            </button>
                        </h2>
                        <div id="FilterAccordian-collapseRating" class="accordion-collapse collapse"
                            aria-labelledby="FilterAccordian-headingRating">
                            <div class="accordion-body">

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="5"
                                            name="ratings[]" value="5" <?php if (in_array('5', request('ratings', []))) {
                                                echo 'checked';
                                            } ?>>
                                        <label class="form-check-label text-warning" for="5">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="4"
                                            name="ratings[]" value="4" <?php if (in_array('4', request('ratings', []))) {
                                                echo 'checked';
                                            } ?>>
                                        <label class="form-check-label text-warning" for="4">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="3"
                                            name="ratings[]" value="3" <?php if (in_array('3', request('ratings', []))) {
                                                echo 'checked';
                                            } ?>>
                                        <label class="form-check-label text-warning" for="3">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="2"
                                            name="ratings[]" value="2" <?php if (in_array('2', request('ratings', []))) {
                                                echo 'checked';
                                            } ?>>
                                        <label class="form-check-label text-warning" for="2">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="1"
                                            name="ratings[]" value="1" <?php if (in_array('1', request('ratings', []))) {
                                                echo 'checked';
                                            } ?>>
                                        <label class="form-check-label text-warning" for="1">
                                            <i class="fa-solid fa-star"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="0"
                                            name="ratings[]" value="0" <?php if (in_array('0', request('ratings', []))) {
                                                echo 'checked';
                                            } ?>>
                                        <label class="form-check-label" for="0">
                                            No Reviews
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
               
                <button type="submit" class="btn btn-primary" style="margin-top:1.5rem">Submit</button>

            </div>
        </form>
    </div>

</div>
