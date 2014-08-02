<div class="modal fade form-modal" id="login-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="modal-body">
                @include('users.login-form')
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">
    $(function() { 
        $('#login-link').on('click', function(e) {
            e.preventDefault();
            $('#login-modal').on('shown.bs.modal', function(e) {
                $('.email').focus();
            });
            $('#login-modal').modal();    
        });
    });
</script>
