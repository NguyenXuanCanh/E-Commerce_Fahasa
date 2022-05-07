<div>
    <button type="button" id="btnTriggerModal" class="d-none" data-toggle="modal" data-target="#alertModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Market alert</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalContent">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary d-none" id="btnReload" onclick="reload">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>