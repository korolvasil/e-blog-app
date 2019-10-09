@component('layouts.components.brand')
    @slot('logo') @include('layouts.partials.logo') @endslot
    @slot('brandName') <span>Your</span><span>Brand</span> @endslot
    @slot('brandSlogan') <span>e-commerce app with blog & services</span> @endslot
@endcomponent
