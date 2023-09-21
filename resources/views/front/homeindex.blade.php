

@extends('front.front')
@section('content')
<main>
    <section class="welcome-page " style="background: url(http://miloplay.com/MVS.jpg) !important;background-size: cover;repeat:no-repeat;">

        <div class="welcome-body">
            <div class="welcome-text-header">
                <h1>Keyfiyyətli zaman, dəyərli Film və Seriallar.</h1>
            </div>
            <div class="welcome-text-body">
                <p>
                    Yalnız PeroPlay-da tapa biləcəyiniz yerli və xarici seriallar, filmlər, sənədli filmlər, əyləncə proqramları, canlı xəbər bülletenləri və orijinal istehsallarla dolu dünyaya xoş gəlmisiniz.
                </p>
            </div>
            <div class="welcome-login">
                <ul class="row justify-content-center">
                    <li class="header-btn mx-1">
                        <a class="btn" href="{{route('front.login')}}">Daxil ol</a>
                    </li>
                    <li class="header-btn mx-1">
                        <a class="btn" href="{{route('front.register')}}">Qeydiyyat ol</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="js-auto-slider-wrap">
            <div class="js-auto-slider-inner">
                <div class="js-auto-slider" id="js-auto-slider">
                    <?php
                    // $sql = $conn->query("SELECT * FROM movies");
                    // while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
                    //     echo '<div class="js-auto-slider-elm">
                    //         <div class="js-auto-slider-img">
                    //             <img src="img/poster' . $result['logo'] . '" alt="" class="ob-fit-cover posi-full-img">
                    //         </div>
                    //     </div>';
                    // }
                    ?>

                </div>
            </div>
        </div>
    </section>

    <!-- slider -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>

    <script>
        //スライダー呼び出し
        autoSlider({
            target: '#js-auto-slider',
            pager: '#js-auto-slider-pager'
        });

        //auto slider
        function autoSlider(setOptions) {
            'use strict';

            //デフォルト設定
            const defaultOptions = {
                target: null, //スライダー ターゲット設定
                activeClass: 'is-active', //スライダー要素 active class
                slideElm: 'js-auto-slider-elm', //スライダー要素 class
                slideElmClone: 'js-auto-slider-elm-clone', //スライダー複製要素 class
                slideChildImg: 'js-auto-slider-img', //スライダー画像要素 class
                activeIndex: 0, //開始するスライド番号
                scrollTimeBefore: 5, //前半スクロール時間
                scrollTimeAfter: 0.6, //後半スクロール時間
                scrollSpeedBefore: 30, //前半スクロール量
                scrollRatioBefore: 0.4, //前半スクロール量
                easing: Power1.easeOut, //後半スクロール GSAPイージング
                pager: null, //スライダーページャー ターゲット設定
                pagerBusy: 'is-busy', //スライダーページャー スライド動作中判別 class
                pagerElm: 'js-auto-slider-pager-elm', //スライダーページャー要素 class
                pagerBtn: 'js-auto-slider-pager-btn', //スライダーページャー要素内 button要素 class
                pagerText: null, //スライダーページャー要素内 button要素に格納するテキスト（デフォルトは index番号）
                pagerActiveClass: 'is-active', //スライダーページャー要素・button要素 active class
            }

            //設定をマージ
            const options = Object.assign({}, defaultOptions, setOptions);

            //動作用設定追加
            options.slideImgBoxAnime = null;
            options.startSlideIndex = 0;
            options.lastSlideIndex = 0;
            options.thisActiveElm = null;
            options.slideXAfter = 0;
            //設定値チェック
            if (options.scrollRatioBefore >= 0.9) {
                options.scrollRatioBefore = 0.8;
            }


            //要素チェック
            if (!document.querySelector(options.target)) {
                return false;
            }

            //要素を登録
            options.target = document.querySelector(options.target);

            //スライダー呼び出し
            slideFunc(options);
            let resizeTimer = null;
            window.addEventListener('resize', function() {
                //リサイズチェック
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function() {
                    // リサイズ完了後の処理
                    slideFunc(options);
                }, 200);
            });

            function slideFunc(options) {
                const target = options.target;

                //active class チェック
                if (!target.querySelector('.' + options.activeClass)) {
                    //初期設定

                    //アクティブIndex設定
                    const activeIndex = options.activeIndex;
                    target.setAttribute('data-active', activeIndex);

                    //slide要素にIndex登録
                    let slideElms = Array.prototype.slice.call(target.querySelectorAll('.' + options.slideElm), 0);
                    const slideLength = slideElms.length;
                    //スライドが1枚の時はスライダーを起動しない
                    if (slideLength < 2) {
                        return false;
                    }
                    slideElms.forEach(function(elm, index) {
                        elm.setAttribute('data-slide-index', index);
                    });

                    //ページャー生成
                    const pager = document.querySelector(options.pager);
                    if (pager) {
                        let setHtml = '';
                        let setClass = '';
                        for (let i = 0; i < slideLength; i++) {
                            if (i !== activeIndex) {
                                setClass = '';
                            } else {
                                setClass = ' ' + options.pagerActiveClass;
                            }
                            let setText = options.pagerText;
                            if (!setText) {
                                setText = i;
                            }
                            setHtml += '<li class="' + options.pagerElm + setClass + '"><button class="' + options.pagerBtn + setClass + '" data-slide-index="' + i + '">' + setText + '</button></li>';
                        }
                        pager.innerHTML = setHtml;
                    }

                    //スライド数を3以上にする
                    const slideElmsHtml = target.innerHTML;
                    while (target.querySelectorAll('.' + options.slideElm).length < 3) {
                        target.innerHTML += slideElmsHtml;
                    }

                    ///先頭にダミーhtml 追加
                    slideElms = target.querySelectorAll('.' + options.slideElm);
                    let lastSlideElm = slideElms[slideElms.length - 1];
                    const cloneElm = lastSlideElm.cloneNode(true);
                    cloneElm.classList.add(options.slideElmClone);
                    target.insertBefore(cloneElm, slideElms[0]);

                    //開始位置取得
                    options.startSlideIndex = options.startSlideIndex + 1;

                    //スライド終了番号取得
                    options.lastSlideIndex = target.querySelectorAll('.' + options.slideElm).length - 1;

                    ///後方にダミーhtml 追加
                    const cloneElms = Array.prototype.slice.call(slideElms, 0);
                    cloneElms.forEach(function(elm, index) {
                        const cloneElm = elm.cloneNode(true);
                        cloneElm.classList.add(options.slideElmClone);
                        target.insertBefore(cloneElm, null);
                    });

                    //active class 追加
                    target.querySelectorAll('.' + options.slideElm)[(options.startSlideIndex + activeIndex)].classList.add(options.activeClass);
                    options.thisActiveElm = target.querySelector('.' + options.activeClass);

                    //ページャークリック
                    if (pager) {
                        //clickイベント
                        let pagerBtns = Array.prototype.slice.call(pager.querySelectorAll('.' + options.pagerBtn), 0);
                        pagerBtns.forEach(function(elm, index) {
                            elm.addEventListener('click', function() {
                                //ページャーの番号取得
                                const thisIndex = Number(elm.getAttribute('data-slide-index'));

                                //現在のアクティブ要素の番号
                                const getActiveIndex = options.activeIndex;
                                //現在のアクティブ要素が何枚目のスライドか
                                const activeSlideIndex = Number(target.querySelectorAll('.' + options.slideElm)[getActiveIndex].getAttribute('data-slide-index'));

                                //現在の番号 or スライド切り替え中だった場合
                                if (thisIndex === activeSlideIndex || pager.classList.contains(options.pagerBusy)) {
                                    return false;
                                }

                                //スライド動作中判別class追加
                                pager.classList.add(options.pagerBusy);

                                //ページャー active class削除
                                removePagerClass(pager, options);

                                //後半スライド位置
                                //スライド幅取得
                                const slideWidth = getWidth(options.thisActiveElm);

                                //次のスライド番号
                                let nextSlideIndex = getActiveIndex + thisIndex - activeSlideIndex;
                                if (thisIndex < activeSlideIndex) {
                                    //前に戻る
                                    const getSlideLength = options.lastSlideIndex;
                                    nextSlideIndex = getSlideLength + thisIndex + 1;
                                }

                                //現在のアクティブ番号を設定
                                target.setAttribute('data-active', thisIndex);

                                //スライドアニメーション
                                options.slideXAfter = slideWidth * nextSlideIndex;

                                gsap.to(target, options.scrollTimeAfter, {
                                    x: -options.slideXAfter,
                                    ease: options.easing,
                                    overwrite: true,
                                    onComplete: function() {
                                        const slideElms = target.querySelectorAll('.' + options.slideElm);
                                        let getActiveIndex = Number(target.getAttribute('data-active'));

                                        //actveスライド切り替え
                                        options.thisActiveElm.classList.remove(options.activeClass);

                                        if (thisIndex < activeSlideIndex) {
                                            //先頭のスライドへclassを戻す
                                            let targetIndex = options.startSlideIndex + thisIndex;
                                            slideElms[targetIndex].classList.add(options.activeClass);

                                            //1枚目
                                            gsap.set(slideElms[targetIndex - 1].querySelector('.' + options.slideChildImg), {
                                                x: gsap.getProperty(slideElms[options.lastSlideIndex].querySelector('.' + options.slideChildImg), 'x') + '%',
                                                overwrite: true
                                            });
                                            //2枚目
                                            gsap.set(slideElms[targetIndex].querySelector('.' + options.slideChildImg), {
                                                x: gsap.getProperty(slideElms[options.lastSlideIndex + 1].querySelector('.' + options.slideChildImg), 'x') + '%',
                                                overwrite: true
                                            });
                                            //3枚目
                                            gsap.set(slideElms[targetIndex + 1].querySelector('.' + options.slideChildImg), {
                                                x: gsap.getProperty(slideElms[options.lastSlideIndex + 2].querySelector('.' + options.slideChildImg), 'x') + '%',
                                                overwrite: true
                                            });

                                        } else {
                                            //次のスライドへclassを切り替え
                                            slideElms[(options.startSlideIndex + getActiveIndex)].classList.add(options.activeClass);
                                        }

                                        //アクティブ要素更新
                                        options.thisActiveElm = target.querySelector('.' + options.activeClass);

                                        //アニメーション呼び出し
                                        slideAnimeFunc(options);

                                        //スライド動作中判別class削除
                                        pager.classList.remove(options.pagerBusy);
                                        addPagerClass(pager, options);
                                    }
                                });
                            });
                        });
                    }
                }

                //スライダーセットアップ
                if (options.slideImgBoxAnime) {
                    options.slideImgBoxAnime = null;
                }
                //スライダー呼び出し
                slideAnimeFunc(options);
            }

            function slideAnimeFunc(options) {
                const target = options.target;

                //アクティブスライドの番号を取得
                let slideElms = Array.prototype.slice.call(target.querySelectorAll('.' + options.slideElm), 0);
                options.thisActiveElm = target.querySelector('.' + options.activeClass);
                options.activeIndex = slideElms.indexOf(options.thisActiveElm);

                //アクティブスライドの番号を設定
                target.setAttribute('data-active', options.activeIndex);

                //スライド幅取得
                const slideWidth = getWidth(options.thisActiveElm);

                //開始位置 取得
                const startPosi = -(slideWidth * options.activeIndex);
                //開始位置 設定
                options.slideImgBoxAnime = gsap.set(target, {
                    x: startPosi
                });

                //後半スクロール位置
                options.slideXAfter = slideWidth * (options.activeIndex + 1);

                //前半スクロール量
                let slideBeforeWidth = slideWidth * options.scrollRatioBefore;

                //定速スクロール量
                const linearScrollX = options.scrollTimeBefore * options.scrollSpeedBefore;
                if (slideBeforeWidth > linearScrollX) {
                    slideBeforeWidth = linearScrollX;
                }
                const slideBeforeX = -(options.slideXAfter - (slideWidth - slideBeforeWidth));

                //前半・定速スクロール
                options.slideImgBoxAnime = gsap.to(target, options.scrollTimeBefore, {
                    x: slideBeforeX,
                    ease: Linear.easeNone,
                    overwrite: true,
                    onComplete: function() {
                        //スライド動作中判別class追加
                        const pager = document.querySelector(options.pager);
                        if (pager) {
                            pager.classList.add(options.pagerBusy);
                        }
                        //後半アニメーション呼び出し
                        slideAnimeAfter(options);
                    }
                });


                //アクティブ画像以外はパララックスリセット
                const slideElmImgs = Array.prototype.slice.call(target.querySelectorAll('.' + options.slideChildImg), 0);
                gsap.to(slideElmImgs, options.scrollTimeAfter, {
                    x: '0%',
                    ease: Linear.easeNone,
                    overwrite: true
                });

                //アクティブ画像スライド 前後3枚
                let setActiveImg = [];
                setActiveImg.push(options.thisActiveElm.previousElementSibling.querySelector('.' + options.slideChildImg));
                setActiveImg.push(options.thisActiveElm.querySelector('.' + options.slideChildImg));
                setActiveImg.push(options.thisActiveElm.nextElementSibling.querySelector('.' + options.slideChildImg));

                gsap.to(setActiveImg, options.scrollTimeBefore, {
                    x: '+=-3%',
                    ease: Linear.easeNone,
                    overwrite: true,
                    onComplete: function() {
                        gsap.to(setActiveImg, options.scrollTimeAfter, {
                            x: '+=-10%',
                            ease: options.easing,
                            overwrite: true
                        });
                    }
                });

            }

            function slideAnimeAfter(options) {
                const target = options.target;
                const slideElms = target.querySelectorAll('.' + options.slideElm);
                gsap.to(target, options.scrollTimeAfter, {
                    x: -options.slideXAfter,
                    ease: options.easing,
                    overwrite: true,
                    onComplete: function() {
                        let getActiveIndex = Number(target.getAttribute('data-active'));

                        //actveスライド切り替え
                        options.thisActiveElm.classList.remove(options.activeClass);

                        if (getActiveIndex < options.lastSlideIndex) {
                            //次のスライドへclassを切り替え
                            slideElms[(options.startSlideIndex + getActiveIndex)].classList.add(options.activeClass);

                        } else {
                            //先頭のスライドへclassを戻す
                            slideElms[options.startSlideIndex].classList.add(options.activeClass);

                            //画像リセット
                            //1枚目
                            gsap.set(slideElms[options.startSlideIndex - 1].querySelector('.' + options.slideChildImg), {
                                x: gsap.getProperty(slideElms[options.lastSlideIndex].querySelector('.' + options.slideChildImg), 'x') + '%',
                                overwrite: true
                            });

                            //2枚目
                            gsap.set(slideElms[options.startSlideIndex].querySelector('.' + options.slideChildImg), {
                                x: gsap.getProperty(slideElms[options.lastSlideIndex + 1].querySelector('.' + options.slideChildImg), 'x') + '%',
                                overwrite: true
                            });
                            //3枚目
                            gsap.set(slideElms[options.startSlideIndex + 1].querySelector('.' + options.slideChildImg), {
                                x: gsap.getProperty(slideElms[options.lastSlideIndex + 2].querySelector('.' + options.slideChildImg), 'x') + '%',
                                overwrite: true
                            });
                        }

                        //アクティブ要素更新
                        options.thisActiveElm = target.querySelector('.' + options.activeClass);

                        //アニメーション呼び出し
                        slideAnimeFunc(options);

                        //ページャー切り替え設定
                        const pager = document.querySelector(options.pager);
                        if (pager) {
                            //スライド動作中判別class削除
                            pager.classList.remove(options.pagerBusy);
                            removePagerClass(pager, options);
                            addPagerClass(pager, options);
                        }
                    }
                });
            }

            function getWidth(elm) {
                //幅取得
                const width = elm.getBoundingClientRect().width;
                //margin取得
                const styles = getComputedStyle(elm);
                const left = parseFloat(styles.marginLeft);
                const right = parseFloat(styles.marginRight);
                return width + left + right;
            }

            function removePagerClass(pager, options) {
                //active class削除
                pager.querySelector('.' + options.pagerElm + '.' + options.pagerActiveClass).classList.remove(options.pagerActiveClass);
                pager.querySelector('.' + options.pagerBtn + '.' + options.pagerActiveClass).classList.remove(options.pagerActiveClass);
            }

            function addPagerClass(pager, options) {
                //active class設定
                const activeSlideIndex = Number(options.thisActiveElm.getAttribute('data-slide-index'));
                const activePager = pager.querySelectorAll('.' + options.pagerElm)[activeSlideIndex];
                activePager.classList.add(options.pagerActiveClass);
                activePager.querySelector('.' + options.pagerBtn).classList.add(options.pagerActiveClass);
            }
        }
    </script>
</main>
@endsection
