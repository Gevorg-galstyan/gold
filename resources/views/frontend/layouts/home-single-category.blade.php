<div class="cd-gallery row align-items-center home-cat" data-cat="{{encrypt($category->id)}}}" data-index="{{$i}}">
    <div class="single-category col-lg-6 {{ ($i%2) ? 'order-lg-12' : '' }}">
        <a href="#">
            <ul class="cd-item-wrapper">
                <li class="selected {{$spin ? 'spin' : ''}}" data-name="New Gold">
                    <img src="<?= asset('storage/img/home-product-slider/2.png'); ?>"
                         alt="Preview image">
                </li>

                <li class="move-right spin " data-name="Jewellery {{\App\Services\ProductService::show()}}">
                    <!--data-sale="true" data-price="$22"-->
                    <img src="<?= asset('storage/img/home-product-slider/2.png'); ?>"
                         alt="Preview image">
                </li>

                <li class="spin" data-name="Falco">
                    <img src="<?= asset('storage/img/home-product-slider/2.png'); ?>"
                         alt="Preview image">
                </li>
                <li class="spin" data-name="R&R company">
                    <img src="<?= asset('storage/img/home-product-slider/2.png'); ?>"
                         alt="Preview image">
                </li>
                <li class="spin" data-name="Gold store">
                    <img src="<?= asset('storage/img/home-product-slider/2.png'); ?>"
                         alt="Preview image">
                </li>
            </ul> <!-- cd-item-wrapper -->
        </a>
        <div class="w-50 position-relative m-auto">
            <div class="cd-item-info">
                <b><a href="#0"><span class="color-white">by</span><span
                                class="ml-2  d-inline-block color company-name">Mountain</span></a></b>
            </div> <!-- cd-item-info -->
        </div>

    </div>
    <div class="col-lg-6 mt-5 text-lg-{{ ($i%2) ? 'left' : 'right' }} text-center ">
        <div class="{{ ($i%2) ? 'line-left' : 'line-right' }} animate-line {{$spin ? 'on-animate' : ''}}"></div>
        <h2 class="color font-trajan">{{$category->translate()->name}}</h2>
        <p class="color-white mt-4 own-line-font">
            {{$category->translate()->description}}
        </p>
        <a href="#" class="my-btn">see all</a>
    </div>
</div> <!-- cd-gallery -->