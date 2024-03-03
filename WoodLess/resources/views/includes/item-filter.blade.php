    <div class="card filter">
        <form id="filter" action="{{ route('products.filter') }}" method="GET">
            @if (isset($search_text))
                <input type="hidden" name="search" value="{{ $search_text }}">
            @endif
            <div class="card-body">
                <h5 class="card-title">Sort By</h5>
                <select class="form-select" aria-label="Sort By" name="sort_by">
                    <option selected>Select...</option>
                    <option value="price_high_low">Price High to Low</option>
                    <option value="price_low_high">Price Low to High</option>
                    <option value="rating_high_low">Rating High to Low</option>
                    <option value="rating_low_high">Rating Low to High</option>
                    <option value="discount_high_low">Discount High to Low</option>
                    <option value="discount_low_high">Discount Low to High</option>
                </select>
                <hr class="w-100 mx-auto mb-2 border-dark">

                <h5 class="card-title">Filter</h5>
                <div class="accordion" id="FilterAccordian">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="FilterAccordian-headingCategories">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#FilterAccordian-collapseCategories" aria-expanded="true"
                                aria-controls="FilterAccordian-collapseCategories">
                                Categories
                            </button>
                        </h2>
                        <div id="FilterAccordian-collapseCategories" class="accordion-collapse collapse"
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="minPrice" class="form-label">Min</label>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" id="minCost"
                                                    name="minCost" value="0">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="maxPrice" class="form-label">Max</label>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" id="maxCost"
                                                    name="maxCost" value="10000">
                                            </div>
                                        </div>
                                    </div>

                                    <div id="priceRangeSlider"></div>
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
                <button type="submit" class="btn btn-primary mt-2">Submit</button>

            </div>
        </form>
    </div>

