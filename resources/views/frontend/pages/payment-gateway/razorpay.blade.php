<div class="tab-pane fade" id="v-pills-razorpay" role="tabpanel"
     aria-labelledby="v-pills-home-tab">
    <div class="row">
        <div class="col-xl-12 m-auto">
            <div class="wsus__payment_area">

                <form action="" method="POST">
                    @csrf
                    <script src="https://checkout.razorpay.com/v1/checkout.js"

                            data-key=""
                            data-amount=""
                            data-buttontext="Pay With Razorpay"
                            data-name="payment"
                            data-description="Payment for product"
                            data-prefill.name="{{Auth::user()->name}}"
                            data-prefill.email="{{Auth::user()->email}}"
                            data-theme.color="#ff7529"
                    >

                    </script>
                </form>
            </div>
        </div>
    </div>
</div>
