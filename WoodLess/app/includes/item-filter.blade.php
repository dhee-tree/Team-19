<div class="container">

    <div class="card filter" style="width: 18rem;">
        <form id="filter" action="/products" method="GET">
            <div class="card-body">
                <h5 class="card-title">Filter</h5>
                <div class="accordion" id="FilterAccordian">

                    <div class="accordion-item">
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
                    <!--
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="FilterAccordian-headingFinish">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#FilterAccordian-collapseFinish" aria-expanded="false"
                                aria-controls="FilterAccordian-collapseFinish">
                                Finish
                            </button>
                        </h2>
                        <div id="FilterAccordian-collapseFinish" class="accordion-collapse collapse"
                            aria-labelledby="FilterAccordian-headingFinish">
                            <div class="accordion-body">

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Plastic">
                                        <label class="form-check-label" for="Plastic">
                                            Plastic
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Wood">
                                        <label class="form-check-label" for="Wood">
                                            Wood
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Rough">
                                        <label class="form-check-label" for="Rough">
                                            Rough
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="FilterAccordian-headingSize">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#FilterAccordian-collapseSize" aria-expanded="false"
                                aria-controls="FilterAccordian-collapseSize">
                                Size
                            </button>
                        </h2>
                        <div id="FilterAccordian-collapseSize" class="accordion-collapse collapse"
                            aria-labelledby="FilterAccordian-headingSize">
                            <div class="accordion-body">

                                <div class="mb-3">
                                    <label for="width" class="form-label">Width</label>
                                    <input type="range" class="form-range" id="width">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="FilterAccordian-headingPrice">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#FilterAccordian-collapsePrice" aria-expanded="false"
                                aria-controls="FilterAccordian-collapsePrice">
                                Cost
                            </button>
                        </h2>
                        <div id="FilterAccordian-collapsePrice" class="accordion-collapse collapse"
                            aria-labelledby="FilterAccordian-headingPrice">
                            <div class="accordion-body">

                                <div class="mb-3">
                                    <label for="minimumPrice" class="form-label">Minimum Cost</label>
                                    <input type="range" class="form-range" id="minimumPrice">
                                </div>
                                <div class="mb-3">
                                    <label for="maximumPrice" class="form-label">Maximum Cost</label>
                                    <input type="range" class="form-range" id="maximumPrice">
                                </div>

                            </div>
                        </div>
                    </div>
                -->
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
                <!--
                <div class="input-group input-group-sm mb-3" style="margin-top:1.5rem">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Color</span>
                    <input type="text" class="form-control" aria-label="Color input"
                        aria-describedby="inputGroup-sizing-sm">
                </div>
                     -->
                <button type="submit" class="btn btn-primary" style="margin-top:1.5rem">Submit</button>

            </div>
        </form>
    </div>

</div>
