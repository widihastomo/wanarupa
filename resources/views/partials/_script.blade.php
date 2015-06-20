<script>
    function dstrToUTC(ds) {
        var dsarr = ds.split("/");
        var mm = parseInt(dsarr[0],10);
        var dd = parseInt(dsarr[1],10);
        var yy = parseInt(dsarr[2],10);
        return Date.UTC(yy,mm-1,dd,0,0,0);
    }

    function datediff(ds1,ds2) {
        var d1 = dstrToUTC(ds1);
        var d2 = dstrToUTC(ds2);
        var oneday = 86400000;
        return (d2-d1) / oneday;
    }

    $(document).ready(function () {
        var btnUpload = $('#btnupload');
        var preview = $('#preview');
        var input = $('#input');
        var auction = $('#auction');
        var startdate = $('#startdate');
        var enddate = $('#enddate');


        //hide & disable element
        preview.hide();
//        input.hide();
        auction.hide();
        enddate.prop('disabled', true);
        enddate.val('Select Start Date');

        //Ambil tanggal minimal
        var d = new Date();
        var nowDate = d.getDate( ) + '/' + (d.getMonth( )+1) + '/' + d.getFullYear( );

        startdate.datetimepicker({
            formatDate:'d/m/Y',
            minDate: nowDate,
            onChangeDateTime:function(){
                var ds = new Date( startdate.val() );
                var de = new Date( enddate.val());
                var a = (ds.getMonth() + 1) + '/' + ds.getDate() + '/' + ds.getFullYear();
                var b = (de.getMonth() + 1) + '/' + de.getDate() + '/' + de.getFullYear();

                var dif = datediff(a,b);

                if ( startdate.val().length > 0 ){
                    enddate.prop('disabled', false);
                    enddate.val('');

                    //ambil dan set 30 hari dari tanggal minimal

                    var dm = new Date( startdate.val() );

                    var maxdate = ( dm.getDate( )+30 ) + '/' + (dm.getMonth( )+1) + '/' + dm.getFullYear( );
                    var minDate = (dm.getDate( )+3) + '/' + (dm.getMonth( )+1) + '/' + dm.getFullYear( );

                    enddate.datetimepicker({
                        formatDate:'d/m/Y',
                        minDate: minDate,
                        maxDate: maxdate,
                        startDate: minDate
                    });

                    if(dif < 3 ){
                        enddate.val('');
                    }
                }
            }
        });

        $(".upload").click(function(){
            btnUpload.trigger('click');
        });

        btnUpload.change(function(){
            $('#btnContainer').hide('fast');
            preview.show('slow');
            input.show('slow');
            readURL(this);
//            $('#crop > img').cropper({
//                aspectRatio: 1/1,
//                autoCropArea: 1,
//                background: false,
//                strict: true,
//                guides: false,
//                highlight: false,
//                dragCrop: true,
//                movable: false,
//                resizable: false
//            });

        });

        $('#cbAuction').click(function() {
            $("#auction").toggle(this.checked);
            $('#price').toggle();
        });

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#thumbnail').attr('src', e.target.result);
                    $('#thumbnail-preview').attr('src', e.target.result);
                    $('#thumbnail-preview-small').attr('src', e.target.result);
                    $('.crop').Jcrop({
                        onChange: showPreview,
                        onSelect: showPreview,
                        bgOpacity:   .8,
                        setSelect:   [ 0, 0, 300, 300 ],
                        aspectRatio: 1/1
                    });
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        function showPreview(coords)
        {
            var rx = 200 / coords.w;
            var ry = 200 / coords.h;
            var width = $('.crop').width();
            var height = $('.crop').height();
            $('.preview').css({
                width: Math.round(rx * width) + 'px',
                height: Math.round(ry * height) + 'px',
                marginLeft: '-' + Math.round(rx * coords.x) + 'px',
                marginTop: '-' + Math.round(ry * coords.y) + 'px'
            });
            var rxs = 100 / coords.w;
            var rys = 100 / coords.h;
            $('.preview-small').css({
                width: Math.round(rxs * width) + 'px',
                height: Math.round(rys * height) + 'px',
                marginLeft: '-' + Math.round(rxs * coords.x) + 'px',
                marginTop: '-' + Math.round(rys * coords.y) + 'px'
            });
            $('#x').val(coords.x);
            $('#y').val(coords.y);
            $('#w').val(coords.w);
            $('#h').val(coords.h);
        }

        function updateCoords(c)
        {
            console.log(c);
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
        };



    });
</script>