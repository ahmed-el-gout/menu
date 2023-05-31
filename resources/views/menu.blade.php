@extends('layouts.layout')

@section('content')



 <!-- ======= Menu Section ======= -->
 <section id="menu" class="menu">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Our Menu</h2>
      <p>Check Our <span>Yummy Menu</span></p>
    </div>

    <!-- list for filter plats -->
    <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

      <li class="nav-item">
        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
          <h4>Starters</h4>
        </a>
      </li><!-- End tab nav item -->

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-salads">
          <h4>Salads</h4>
        </a><!-- End tab nav item -->

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
          <h4>Lunch</h4>
        </a>
      </li><!-- End tab nav item -->

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
          <h4>Dinner</h4>
        </a>
      </li><!-- End tab nav item -->

    </ul>

    <form name="add-plats-form"  id="add-plats-form" method="post" action="{{ route('add.cart') }}">
      @csrf

      <div class="tab-content my-6" style="margin-bottom: 90px" data-aos="fade-up" data-aos-delay="300">


        <div class="tab-pane fade active show" id="menu-starters">

          <div class="tab-header text-center m-1">
            <p>Menu</p>
            <h3>Starters</h3>
          </div>

          <div class="row gy-5">

            @foreach ($starters as $item)
              <!-- Menu Item -->
              <div class="col-lg-4 menu-item ">
                <fieldset class="checkbox-group">
                  <div class="checkbox">
                    <label class="checkbox-wrapper">
                      <input type="checkbox" class="checkbox-input" name="plats[]" value="{{$item->id}}"/>
                      <span class="checkbox-tile w-100" style="width: 300px">
                        <span class="checkbox-icon p-2 " style="width: 300px">
                          {{-- {{ DB::table('media')->where('model_id','=',$item->id)->pluck('file_name')->first()}} --}}
                          <img src="{{ asset('storage/'.DB::table('media')->where('model_id','=',$item->id)->pluck('id')->first().'/'.DB::table('media')->where('model_id','=',$item->id)->pluck('file_name')->first()) }}" style="width: 300px" class="menu-img img-fluid" alt="">
                          <h4>{{ $item->name }}</h4>
                          <p class="ingredients">
                            {{ $item->disc}}
                          </p>
                          <p class="price">
                            {{ $item->price}} MAD
                          </p>
                        </span>
                      </span>
                    </label>
                  </div>
              </div>
              <!-- Menu Item -->
            @endforeach

          </div>
        </div><!-- End Starter Menu Content -->

        <div class="tab-pane fade" id="menu-salads">

          <div class="tab-header text-center">
            <p>Menu</p>
            <h3>Salads</h3>
          </div>

          <div class="row gy-5">

            @foreach ($salads as $item)
            <!-- Menu Item -->
            <div class="col-lg-4 menu-item ">
              <fieldset class="checkbox-group">
                <div class="checkbox">
                  <label class="checkbox-wrapper">
                    <input type="checkbox" class="checkbox-input" name="plats[]" value="{{$item->id}}"/>
                    <span class="checkbox-tile w-100" style="width: 300px">
                      <span class="checkbox-icon p-2 " style="width: 300px">
                        {{-- {{ DB::table('media')->where('model_id','=',$item->id)->pluck('file_name')->first()}} --}}
                        <img src="{{ asset('storage/'.DB::table('media')->where('model_id','=',$item->id)->pluck('id')->first().'/'.DB::table('media')->where('model_id','=',$item->id)->pluck('file_name')->first()) }}" style="width: 300px" class="menu-img img-fluid" alt="">
                        <h4>{{ $item->name }}</h4>
                        <p class="ingredients">
                          {{ $item->disc}}
                        </p>
                        <p class="price">
                          {{ $item->price}} MAD
                        </p>
                      </span>
                    </span>
                  </label>
                </div>
            </div>
            <!-- Menu Item -->
          @endforeach
          </div>
        </div><!-- End Breakfast Menu Content -->

        <div class="tab-pane fade" id="menu-lunch">

          <div class="tab-header text-center">
            <p>Menu</p>
            <h3>Lunch</h3>
          </div>

          <div class="row gy-5">

            @foreach ($lunchs as $item)
            <!-- Menu Item -->
            <div class="col-lg-4 menu-item ">
              <fieldset class="checkbox-group">
                <div class="checkbox">
                  <label class="checkbox-wrapper">
                    <input type="checkbox" class="checkbox-input" name="plats[]" value="{{$item->id}}"/>
                    <span class="checkbox-tile w-100" style="width: 300px">
                      <span class="checkbox-icon p-2 " style="width: 300px">
                        {{-- {{ DB::table('media')->where('model_id','=',$item->id)->pluck('file_name')->first()}} --}}
                        <img src="{{ asset('storage/'.DB::table('media')->where('model_id','=',$item->id)->pluck('id')->first().'/'.DB::table('media')->where('model_id','=',$item->id)->pluck('file_name')->first()) }}" style="width: 300px" class="menu-img img-fluid" alt="">
                        <h4>{{ $item->name }}</h4>
                        <p class="ingredients">
                          {{ $item->disc}}
                        </p>
                        <p class="price">
                          {{ $item->price}} MAD
                        </p>
                      </span>
                    </span>
                  </label>
                </div>
            </div>
            <!-- Menu Item -->
          @endforeach

          </div>
        </div><!-- End Lunch Menu Content -->

        <div class="tab-pane fade" id="menu-dinner">

          <div class="tab-header text-center m-1">
            <p>Menu</p>
            <h3>Dinner</h3>
          </div>

          <div class="row gy-5">

            @foreach ($diners as $item)
            <!-- Menu Item -->
            <div class="col-lg-4 menu-item ">
              <fieldset class="checkbox-group">
                <div class="checkbox">
                  <label class="checkbox-wrapper">
                    <input type="checkbox" class="checkbox-input" name="plats[]" value="{{$item->id}}"/>
                    <span class="checkbox-tile w-100" style="width: 300px">
                      <span class="checkbox-icon p-2 " style="width: 300px">
                        {{-- {{ DB::table('media')->where('model_id','=',$item->id)->pluck('file_name')->first()}} --}}
                        <img src="{{ asset('storage/'.DB::table('media')->where('model_id','=',$item->id)->pluck('id')->first().'/'.DB::table('media')->where('model_id','=',$item->id)->pluck('file_name')->first()) }}" style="width: 300px" class="menu-img img-fluid" alt="">
                        <h4>{{ $item->name }}</h4>
                        <p class="ingredients">
                          {{ $item->disc}}
                        </p>
                        <p class="price">
                          {{ $item->price}} MAD
                        </p>
                      </span>
                    </span>
                  </label>
                </div>
            </div>
            <!-- Menu Item -->
          @endforeach

          </div>
        </div><!-- End Dinner Menu Content -->
      
      </div>
      
      <div class="w-100 d-flex justify-content-center align-items-center my-6">
        <button type="submit" style="display: contents">
        <svg id="button"  class="my-6 py-12">
          <g id="banana"
          fill="#efc851" stroke="none">
          <path  d="M2827 12788 c-22 -16 -24 -53 -13 -253 12 -234 -18 -390 -118 -600
          -106 -223 -257 -435 -459  -643 -165 -170 -199 -224 -221 -352 l-12 -71 -52
          -30 c-159 -90 -525 -522 -839 -990 -745 -1110 -1078 -2119 -1110 -3359 -37
          -1478 487 -3177 1291 -4186 565 -710 1392 -1267 2579 -1738 1292 -513 2459
          -674 3562 -490 799 132 1572 433 2210 857 291 194 507 371 784 642 379 371
          730 796 996 1205 134 205 199 339 219 454 6 29 10 36 19 27 32 -32 95 -1 135
          68 59 101 16 269 -100 384 -71 71 -133 99 -230 105 -72 4 -78 3 -102 -21 -18
          -18 -26 -37 -26 -59 l0 -33 -67 3 c-77 4 -99 1 -448 -78 -1008 -228 -1833
          -247 -2730 -64 -599 123 -1144 309 -1690 579 -307 151 -471 245 -735 420 -453
          299 -828 614 -1246 1045 l-114 118 1 49 c2 81 -29 115 -121 129 -37 6 -49 16
          -109 88 -586 703 -1049 1598 -1246 2408 -87 361 -118 606 -119 938 0 324 25
          514 116 860 28 107 56 220 63 251 7 34 24 72 43 95 43 55 51 97 50 274 -1 292
          86 645 226 915 54 105 117 178 275 315 78 67 146 152 189 235 21 40 26 64 27
          122 0 63 -3 75 -25 98 -39 43 -83 56 -235 71 -163 15 -214 31 -336 105 -170
          104 -247 133 -282 107z"/>
          </g>
          <g id="paper"
          fill="#366747" stroke="none">
          <path  d="M7600 12645 c-140 -85 -259 -156 -265 -158 -5 -2 13 -30 41 -63 27
          -32 79 -97 113 -144 127 -170 229 -254 346 -285 72 -18 179 -19 263 -1 49 11
          62 11 62 1 0 -19 -66 -390 -101 -565 -249 -1261 -576 -1880 -993 -1880 -90 0
          -108 5 -356 100 -260 99 -409 145 -542 164 -177 27 -305 17 -455 -34 -169 -58
          -303 -149 -466 -320 -94 -98 -105 -114 -112 -155 -5 -34 -10 -45 -21 -41 -9 4
          -24 -16 -47 -67 -45 -95 -115 -190 -488 -658 -386 -486 -584 -739 -799 -1024
          -1493 -1975 -2624 -4033 -3375 -6140 -176 -496 -405 -1215 -405 -1275 0 -16
          15 -28 63 -50 115 -54 218 -62 377 -30 336 68 803 326 1394 768 1341 1003
          3407 3007 5745 5570 157 172 288 308 291 302 7 -11 208 206 307 332 125 159
          188 243 188 253 0 6 17 39 37 75 276 486 259 943 -50 1332 -102 128 -285 300
          -419 393 -24 17 -43 33 -43 38 0 4 15 38 34 75 62 124 193 435 269 642 210
          571 336 1118 377 1635 12 149 15 568 5 663 -3 31 -13 117 -22 191 l-16 135
          -62 80 c-136 178 -298 262 -560 290 l-60 6 -255 -155z"/>
          </g>
            <g id="tomato"
          fill="#ff0000" stroke="none">
          <path d="M7301 12494 c-54 -27 -184 -148 -254 -235 -22 -28 -88 -159 -168
          -335 -396 -876 -668 -1538 -820 -2003 -72 -218 -52 -193 -223 -295 -425 -256
          -984 -435 -1601 -511 -454 -56 -1041 -59 -1594 -10 -90 9 -166 14 -168 12 -5
          -6 278 -178 377 -230 47 -25 110 -53 140 -62 30 -10 58 -21 63 -24 4 -4 -76
          -44 -177 -90 -811 -364 -1575 -926 -2021 -1486 -389 -489 -645 -1055 -769
          -1700 -60 -314 -80 -547 -81 -920 0 -324 8 -425 51 -694 151 -944 637 -1826
          1463 -2652 742 -742 1351 -1090 2126 -1214 137 -22 528 -31 692 -16 436 41
          897 178 1348 399 155 76 350 183 446 243 l46 29 151 -89 c859 -513 1719 -704
          2541 -565 634 107 1237 395 1844 880 1115 891 1773 1833 2001 2865 143 646
          103 1393 -110 2037 -276 835 -840 1575 -1695 2224 -404 307 -883 572 -1381
          764 -70 27 -128 51 -128 54 0 3 44 22 98 44 248 99 930 412 919 422 -1 1 -63
          -6 -137 -16 -1110 -156 -2182 -29 -3247 385 l-123 48 0 36 c0 62 29 390 46
          521 52 414 136 821 259 1259 47 166 225 713 267 819 11 28 10 37 -7 68 -20 38
          -60 64 -98 64 -12 0 -47 -12 -76 -26z"/>
          </g>
            
            <g id="cart"
          fill="#000000" stroke="none">
            <path d="M11390 12078 c-547 -94 -1018 -179 -1047 -190 -28 -10 -70 -34 -93
          -52 -80 -63 -75 -53 -318 -676 -55 -140 -236 -605 -403 -1032 l-303 -778 -77
          0 c-42 0 -702 -16 -1466 -35 -763 -19 -2117 -53 -3008 -75 -4532 -113 -4369
          -108 -4421 -126 -65 -21 -100 -44 -151 -96 -51 -53 -93 -140 -100 -210 -3 -34
          27 -317 86 -798 50 -410 149 -1231 221 -1825 203 -1679 185 -1546 216 -1615
          27 -61 103 -144 160 -173 70 -36 -96 -21 2374 -217 487 -39 1281 -102 1765
          -140 484 -39 1205 -96 1603 -128 l722 -57 660 -518 c362 -285 684 -545 714
          -578 65 -70 132 -198 147 -284 29 -161 -37 -291 -177 -346 l-59 -23 -945 -8
          c-520 -4 -2297 -12 -3950 -16 l-3005 -8 -58 -23 c-81 -32 -166 -113 -203 -193
          -24 -53 -28 -75 -28 -143 1 -49 7 -97 18 -124 22 -59 79 -133 132 -171 87 -62
          100 -64 441 -70 l313 -5 -54 -42 c-114 -88 -213 -238 -254 -386 -12 -45 -17
          -98 -16 -192 0 -113 4 -141 27 -210 99 -295 351 -492 657 -512 278 -17 557
          139 688 385 120 226 113 502 -17 722 -40 67 -125 161 -196 217 l-40 32 851 0
          c468 1 1865 4 3105 7 l2254 6 -45 -29 c-215 -142 -343 -396 -327 -653 20 -330
          262 -607 589 -674 162 -33 304 -14 467 66 91 43 116 62 191 137 70 70 94 103
          133 181 64 128 81 200 81 335 0 131 -17 206 -73 320 -48 97 -116 183 -196 248
          -67 53 -197 123 -251 133 -50 9 -50 19 2 39 68 26 178 89 254 145 191 142 377
          419 411 612 15 90 15 270 0 358 -19 103 -67 248 -113 340 -129 255 -245 370
          -850 844 -252 197 -458 363 -458 368 0 5 72 195 161 421 89 227 196 502 239
          612 43 110 160 409 260 665 100 256 218 557 262 670 99 255 317 811 648 1660
          38 96 150 384 250 640 194 497 220 562 500 1280 182 466 298 763 392 1005 28
          72 52 131 53 133 2 2 409 72 905 157 999 170 967 162 1054 255 73 78 100 147
          100 250 0 96 -25 166 -82 231 -68 78 -180 130 -276 128 -28 0 -499 -77 -1046
          -171z m-2460 -3360 c-269 -694 -462 -1188 -473 -1208 l-13 -25 -329 0 -330 0
          0 640 0 640 405 11 c223 6 487 11 587 12 l181 2 -28 -72z m-1402 -595 l-3
          -638 -612 -3 -613 -2 0 625 0 625 118 1 c64 1 313 7 552 13 239 7 463 14 498
          14 l62 2 -2 -637z m-1485 -20 l-3 -618 -612 0 -613 0 -3 603 -2 602 42 1 c24
          1 239 7 478 13 239 7 498 14 575 14 l140 2 -2 -617z m-1483 -23 l0 -600 -612
          2 -613 3 -3 583 c-1 320 -1 583 0 583 7 3 873 26 1041 27 l187 2 0 -600z
          m-1485 -15 l0 -580 -612 -2 -613 -3 0 570 0 570 138 1 c75 1 335 7 577 14 242
          7 456 12 475 11 l35 -1 0 -580z m-1485 -20 l0 -565 -444 0 c-290 0 -447 4
          -451 10 -10 16 -136 1082 -129 1089 5 5 611 25 917 29 l107 2 0 -565z m0
          -1390 l0 -575 -365 0 c-201 0 -365 2 -365 4 0 7 -129 1077 -134 1114 l-5 32
          435 0 434 0 0 -575z m1490 0 l0 -575 -615 0 -615 0 0 575 0 575 615 0 615 0 0
          -575z m1480 0 l0 -575 -615 0 -615 0 0 575 0 575 615 0 615 0 0 -575z m1483 3
          l-3 -573 -612 0 -613 0 -3 573 -2 572 617 0 618 0 -2 -572z m1487 -3 l0 -575
          -615 0 -615 0 0 575 0 575 615 0 615 0 0 -575z m796 513 c-31 -81 -381 -976
          -417 -1065 -7 -20 -16 -23 -69 -23 l-60 0 0 575 0 575 285 0 285 0 -24 -62z
          m-6736 -1751 l0 -413 -297 24 c-164 13 -301 26 -304 30 -4 4 -25 167 -48 362
          -23 195 -44 367 -47 383 l-6 27 351 0 351 0 0 -413z m1490 -57 l0 -470 -29 0
          c-15 0 -281 20 -590 45 -309 25 -573 45 -586 45 l-25 0 0 425 0 425 615 0 615
          0 0 -470z m1480 -60 c0 -291 -3 -530 -7 -530 -23 -1 -1200 92 -1210 96 -10 3
          -13 108 -13 484 l0 480 615 0 615 0 0 -530z m1483 -64 l2 -588 -60 6 c-33 3
          -296 24 -585 46 -289 22 -538 43 -555 45 l-30 5 2 537 c2 296 3 539 3 541 0 1
          275 1 610 0 l610 -3 3 -589z m1487 244 l0 -349 -109 -278 c-59 -153 -112 -288
          -116 -301 -5 -17 -11 -22 -23 -17 -44 19 -115 27 -482 55 -217 17 -419 33
          -447 36 l-53 6 0 599 0 599 615 0 615 0 0 -350z m270 343 c0 -5 -5 -15 -10
          -23 -8 -12 -10 -11 -10 8 0 12 5 22 10 22 6 0 10 -3 10 -7z m-6066 -4698 c109
          -52 199 -156 231 -269 27 -94 18 -223 -23 -307 -38 -79 -128 -169 -204 -204
          -262 -119 -561 39 -610 324 -31 179 68 369 235 451 110 54 263 56 371 5z
          m6971 -6 c80 -39 167 -128 201 -204 164 -371 -214 -737 -583 -565 -163 75
          -264 270 -235 448 48 287 358 449 617 321z"/>
          <path d="M1455 937 c-60 -29 -87 -57 -114 -117 -81 -178 86 -370 274 -316 105
          31 168 114 168 221 1 131 -86 223 -218 232 -49 3 -69 0 -110 -20z"/>
          <path d="M8439 946 c-56 -20 -96 -53 -126 -104 -24 -39 -28 -58 -28 -117 1
          -78 14 -113 66 -163 48 -46 95 -66 164 -65 74 0 128 25 178 84 150 175 -36
          443 -254 365z"/>
          </g>
            <rect   width="180" height="50" rx="25" style="fill:rgb(0,0,0,0);stroke-width:5;stroke:rgb(0,0,0)" />
                  <text id="text0" x="40" y="30" font-weight="900" font-family="Verdana" font-size="16.5" fill="#000">Add to cart </text>
            </rect>
          </svg>
        </button>
      </div>
    </form>  
  </div>
</section><!-- End Menu Section -->



