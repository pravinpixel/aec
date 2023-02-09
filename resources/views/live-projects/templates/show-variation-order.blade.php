<div class="modal-content p-0 h-100 w-100">
    <div class="modal-body p-0">
        <ul class="bg-white sticky-top nav nav-tabs nav-bordered m-0">
            <li class="nav-item">
                <a href="#properties-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                    <span>
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        Overview
                    </span>
                </a>
            </li>
            <button type="button" class="btn-close top-0 mt-2" data-bs-dismiss="modal" aria-hidden="true"></button>
        </ul>
        <div class="tab-content p-2">
            <div class="tab-pane show active" id="properties-b1">
                <div class="card d-block shadow-sm border h-100 m-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h4 class=""> {{ $variation->Issues->issue_id.'/VO/'.$variation->id }} | <span class="text-primary">{{ $variation->Issues->title }}</span></h4>
                        </div>
                        <div class="mb-3">
                            <b>Estimated Hours </b> : <span>{{ $variation->hours  }}</span>
                        </div>
                        <div class="mb-3">
                            <b>Price/Hr</b> : <span>{{ $variation->price }} Kr</span>
                        </div>
                        <div class="mb-3">
                            <b>Total Price</b> : <span>{{ $variation->price * $variation->hours }} Kr</span>
                        </div>
                        <h5>Issue Descriptions:</h5>
                        <p> {{ $variation->description }}</p>
                        <div>
                            <h5>Variation Date & Time</h5>
                            <p>{{ $variation->created_at->format('Y-m-d H:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="modal-footer">
        <x-chat-box
            status="CHAT_BUTTON"
            :moduleId="Project()->id"
            moduleName="project"
            :menuName="str_replace('/','_',$variation->Issues->issue_id.'/VO/'.$variation->id)"
        />
    </div>
</div>
