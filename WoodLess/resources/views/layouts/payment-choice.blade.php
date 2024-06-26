<div class="row pt-5">
    <div class="col-md-12">
        <h3>Payment: </h3>
        <h4>Total cost: £{{ $basket->totalCost() }}</h4>
        <h5 class="pb-2">Credit/Debit Card <i class="fa-brands fa-cc-visa"></i> <i class="fa-brands fa-cc-mastercard"></i></h5>
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="amount" value="{{ $basket->totalCost() }}">
            <input type="hidden" name="submitted_address" value="">

            <button type="submit" class="btn payment-btn mb-3">Pay with Stripe <i class="fa-brands fa-cc-stripe"></i> </button>
        </form>
    </div>   
</div>