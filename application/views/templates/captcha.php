<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url('js/scripts.js') ?>"></script>
<script>
window.onload = function() {
    var $recaptcha = document.querySelector('#g-recaptcha-response');

    if($recaptcha) {
        $recaptcha.setAttribute("required", "required");
    }
};
</script>
<script>
function get_action(form)
{
    var response = grecaptcha.getResponse();

    if(response.length == 0){
        //reCaptcha not verified
        document.getElementById('recaptcha').innerHTML="You can't leave Captcha Code empty";
        return false;
    } else {
        //reCaptch verified
        document.getElementById('captcha').innerHTML="Captcha completed";
        return true; 
    }
}
</script>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>