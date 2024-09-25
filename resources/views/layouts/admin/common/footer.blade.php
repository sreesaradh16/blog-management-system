<footer class="footer">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-md-12 col-sm-12 text-center">
                Copyright © 2023-2024 <a href="#" target="_blank">srd</a>. <a href="#"> </a> All rights reserved.
            </div>
        </div>
    </div>
</footer>

<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<!-- JQUERY JS -->
<script src="{{ asset('js/jquery-3.4.1.min.js')}}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/js/popper.min.js')}}"></script>

<!-- SPARKLINE JS-->
<script src="{{ asset('js/jquery.sparkline.min.js')}}"></script>

<!-- CHART-CIRCLE JS-->
<script src="{{ asset('js/circle-progress.min.js')}}"></script>

<!-- RATING STARJS -->
<script src="{{ asset('plugins/rating/jquery.rating-stars.js')}}"></script>

<!-- CHARTJS CHART JS-->
<script src="{{ asset('plugins/chart/Chart.bundle.js')}}"></script>
<script src="{{ asset('plugins/chart/utils.js')}}"></script>

<!-- PIETY CHART JS-->
<script src="{{ asset('plugins/peitychart/jquery.peity.min.js')}}"></script>
<script src="{{ asset('plugins/peitychart/peitychart.init.js')}}"></script>

<!-- SIDE-MENU JS-->
<script src="{{ asset('plugins/sidemenu/sidemenu.js')}}"></script>

<!-- CUSTOM SCROLLBAR JS-->
<script src="{{ asset('plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<!-- SIDEBAR JS -->
<script src="{{ asset('plugins/sidebar/sidebar.js')}}"></script>

<!-- INDEX JS -->
<script src="{{ asset('js/index1.js')}}"></script>

<!-- SWEET-ALERT JS -->
<script src="{{ asset('plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{ asset('js/sweet-alert.js')}}"></script>

<!-- VALIDATOR -->
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/validator.js') }}"></script>

<!-- CAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js')}}" async defer></script>

<!-- SELECT2 JS -->
<script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>

<!-- BOOTSTRAP-DATERANGEPICKER JS -->
<script src="{{asset('plugins/bootstrap-daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<!-- TIMEPICKER JS -->
<script src="{{asset('plugins/time-picker/jquery.timepicker.js')}}"></script>
<script src="{{asset('plugins/time-picker/toggles.min.js')}}"></script>

<!-- DATEPICKER JS -->
<script src="{{asset('plugins/date-picker/spectrum.js')}}"></script>
<script src="{{asset('plugins/date-picker/jquery-ui.js')}}"></script>
<script src="{{asset('plugins/input-mask/jquery.maskedinput.js')}}"></script>

<!-- MULTI SELECT JS-->
<script src="{{asset('plugins/multipleselect/multiple-select.js')}}"></script>
<script src="{{asset('plugins/multipleselect/multi-select.js')}}"></script>

<!-- FORMELEMENTS JS -->
<script src="{{asset('js/form-elements.js')}}"></script>

<!-- CUSTOM JS -->
<script src="{{asset('js/custom.js')}}"></script>

<script>
    $(document).on("click", 'a.frmsubmit', function(e) {
        var message = '';
        if (e.currentTarget.attributes.message != undefined) {
            message = e.currentTarget.attributes.message.value;
        } else {
            message = 'Are you sure you want to delete?';
        }
        if (message != 'false') {
            swal({
                    title: "Alert",
                    text: message,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Ok',
                    cancelButtonText: 'Cancel',
                },
                function() {
                    e.preventDefault();
                    var myForm = '<form id="hidfrm" action="' + e.currentTarget.attributes.href.value + '" method="post">{{@csrf_field()}}<input type="hidden" name="_method" value="' + e.currentTarget.attributes.method.value + '"></form>';
                    $('body').append(myForm);
                    myForm = $('#hidfrm');
                    myForm.submit();
                });

        } else {
            e.preventDefault();
            var myForm = '<form id="hidfrm" action="' + e.currentTarget.attributes.href.value + '" method="post">{{@csrf_field()}}<input type="hidden" name="_method" value="' + e.currentTarget.attributes.method.value + '"></form>';
            $('body').append(myForm);
            myForm = $('#hidfrm');
            myForm.submit();
        }
        return false;
    });

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);
</script>
@stack("scripts")