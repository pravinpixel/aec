<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                   © {{ now()->year }} AEC Prefab. All Rights Reserved.
            </div>
            {{-- <div class="col-md-6">
                <div class="text-md-end footer-links d-none d-md-block">
                    <a href="javascript: void(0);">About</a>
                    <a href="javascript: void(0);">Support</a>
                    <a href="javascript: void(0);">Contact Us</a>
                </div>
            </div> --}}
        </div>
    </div>
</footer>
<!-- end Footer -->

<div class="modal fade" id="EnquiryQuickViewPopUp" tabindex="-1" aria-labelledby="EnquiryQuickViewPopUpLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-right modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EnquiryQuickViewPopUpLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="EnquiryQuickViewPopUpContent"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>