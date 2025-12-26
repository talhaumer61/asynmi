<div class="breadcrumb-section" style="background-image: linear-gradient(270deg, rgba(0, 0, 0, .3), rgba(0, 0, 0, 0.3) 101.02%), url({{asset('assets/img/innerpage/inner-banner-bg.png')}});">  
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="banner-content">
                    <h1>{{ ucwords(str_replace('-', ' ', $href)) }}</h1>
                    <ul class="breadcrumb-list">
                        <li><a href="/coutries">Countries</a></li>
                        <li>{{ ucwords(str_replace('-', ' ', $href)) }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>