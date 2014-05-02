<div class="modal fade" id="message-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4 style="display: inline-block;">
                    <span>{{ Session::get('flash_message') }}</span>
                </h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>

<script> 
    $(function() { 
        // Hide NoScript friendly flash message
        $('#alert').hide();

        // Show the flash message modal
        $('#message-modal').modal();
    });
</script>