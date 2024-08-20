<div class="modal fade" id="modalMain" tabindex="-1" role="dialog" aria-labelledby="modalMainLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMainLabel">Email code verification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formBodyData">
                    <div class="form-group">
                        <label for="inputAddress">Enter Code here</label>
                        <input type="text" class="form-control" id="code" name="code">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" name="addNew" class="btn btn-primary" id="btn-save">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    /* To Disable Inspect Element */
    // $(document).bind("contextmenu", function (e) {
    //     e.preventDefault();
    // });

    // $(document).keydown(function (e) {
    //     if (e.which === 123) {
    //         return false;
    //     }
    // });
    // document.onkeydown = (e) => {

    //     if (e.key == 123) {

    //         e.preventDefault();

    //     }

    //     if (e.ctrlKey && e.shiftKey && e.key == 'I') {

    //         e.preventDefault();

    //     }

    //     if (e.ctrlKey && e.shiftKey && e.key == 'C') {

    //         e.preventDefault();

    //     }

    //     if (e.ctrlKey && e.shiftKey && e.key == 'j') {

    //         e.preventDefault();

    //     }

    //     if (e.ctrlKey && e.key == 'U') {

    //         e.preventDefault();
    //     }
    // };
</script>