<!-- build:js js/vendors.js -->

<script src="<?php echo $rootvendor;?>bootstrap/bootstrap.min.js"></script>
<script src="<?php echo $rootvendor ?>masonry.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo $rootvendor ?>jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo $rootvendor;?>slick.js/slick/slick.min.js"></script>
<script src="<?php echo $rootvendor;?>jquery.mmenu/js/jquery.mmenu.all.min.js"></script>
<script src="<?php echo $rootvendor;?>fastclick.js"></script>
<script src="<?php echo $rootvendor;?>ismobile.js"></script>
<script src="<?php echo $rootvendor;?>form-validator/jquery.form-validator.min.js"></script>
<script src="<?php echo $rootvendor;?>bootstrap-select/bootstrap-select.js"></script>
<script src="<?php echo $rootvendor;?>hammer.min.js"></script>
<script src="<?php echo $rootvendor;?>imagesloaded.pkgd.min.js"></script>
<script src="<?php echo $rootvendor;?>scrollmagic/ScrollMagic.js"></script>
<script src="<?php echo $rootvendor;?>jquery.nicescroll.min.js"></script>
<script src="<?php echo $rootvendor;?>froogaloop.js"></script> <!-- vimeo video -->
<!-- endbuild -->
<script src="<?php echo $rootjs; ?>all.js"></script>

<script>
    var currentVideoIndex = 0;
    var videoCount = 8;
    var arrayVideoLink= [];
    var arrayVideo = [
        {
            isPlay: false,
            src:  'http://localhost:3000/ampc/public/assets/images/video1.mp4'
        },
        {
            isPlay: false,src: 'http://localhost:3000/ampc/public/assets/images/video2.mp4'
        }
        ,
        {
            isPlay: false,src: 'http://localhost:3000/ampc/public/assets/images/video3.mp4'
        }
        ,
        {
            isPlay: false,src: 'http://localhost:3000/ampc/public/assets/images/video4.mp4'
        }
        ,
        {
            isPlay: false,src: 'http://localhost:3000/ampc/public/assets/images/video5.mp4'
        }
        ,
        {
            isPlay: false,src: 'http://localhost:3000/ampc/public/assets/images/video6.mp4'
        }
        ,
        {
            isPlay: false,src: 'http://localhost:3000/ampc/public/assets/images/video7.mp4'
        }
        ,
        {
            isPlay: false,src: 'http://localhost:3000/ampc/public/assets/images/video8.mp4'
        }
    ];
    function loadImage() {
        var preload = new createjs.LoadQueue();
        preload.addEventListener("fileload", handleFileComplete);
        preload.on('complete',onComplete);
        preload.loadManifest(arrayVideo);
    }

    // ham nay push moi file dc load vao array
    function handleFileComplete(evt) {
        if(evt.item.type =="video"){
            var  objectURL = URL.createObjectURL(evt.rawResult);
            arrayVideoLink.push(objectURL);

        }

    }

    //ham nay sau khi tat ca cac file hoan thanh
    function onComplete(event) {
        for(i=0;i< arrayVideoLink.length;i++) {
            $('#video'+i).find('source').attr('src',arrayVideoLink[i]);
           /* $('#video'+i).load();
            PlayVideoComplete($('#video'+i));*/
        }

        for(i=currentVideoIndex;i< currentVideoIndex+3;i++ )
        {
            playVideo($('#video'+i));
            PlayVideoComplete($('#video'+i));
        }
        currentVideoIndex += 3


    }


    //function play video
    function playVideo(video) {
        video.load();
    }


    //ham nay la ham check event ending play
    function PlayVideoComplete(video) {
        video.on('ended', function () {
            video.isPlay=true;
            console.log(video + 'endding..');
        });
    }


    loadImage();
</script>

</body>
</html>
