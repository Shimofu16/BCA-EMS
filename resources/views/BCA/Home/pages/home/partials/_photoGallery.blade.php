<section>
    <div class="container-sm my-4">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <h2 class="fw-bold">Photo Gallery</h2>
                <a href="{{ route('photo.gallery.index') }}" class="btn btn-bca-outline  text-bca hvr-sweep-to-bottom mb-3">
                    <i class="fa-solid fa-images"></i>
                    <span class="text-uppercase">More Photos</span>
                </a>
            </div>
            <div class="col-sm-5 col-md-4 col-lg-4">
                <div class="box border-dark">
                    <img src="{{ asset('./uploads/photo gallery/bca camping/Bca Camping.jpg') }}" alt="Bca Camping" class="img-fluid">
                    <div class="box-content">
                        <h3 class="title">BCA Camping</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-md-4 col-lg-4">
                <div class="box border-dark mt-xsm-2">
                    <img src="{{ asset('./uploads/photo gallery/bca nutrition month/Bca Nutrition 2.jpg') }}" alt="Bca Nutrition Month" class="img-fluid">
                    <div class="box-content">
                        <h3 class="title">Bca Nutrition Month</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
