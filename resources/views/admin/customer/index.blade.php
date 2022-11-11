@extends('layouts.admin')

@section('admin-content')
    <div class="content-page">
        <div class="content" ng-controller="customerDetailController">
            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">

                @include('admin.includes.page-navigater')
                <section>
                    <x-accordion title="Pending Customers" path="admin.customer.inactive-table" open="true" argument='null'>
                    </x-accordion>
                    <x-accordion title="Active Customers" path="admin.customer.active-table" open="false" argument='null'>
                    </x-accordion>
                    {{-- <x-accordion title="Cancelled Customers" path="admin.customer.cancel-table" open="false" argument='null'></x-accordion> --}}
                </section>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>
    <script>
        function swalFun(){
            let timerInterval
            Swal.fire({
                html: '<b></b>',
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 1000)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            })

        }
        // var count=0;
        function sendRemainder(id) {
            console.log(' id is:' + id);
            $.ajax({
                method: 'post',
                url: "{{ route('send-remainder') }}",
                data: {
                    id: id
                },
                beforeSend:function(){
                    swalFun();
                },
                success: function(res) {
                    console.log(res);
                    Swal.fire({
                        icon: 'success',
                        title: 'Reminder Mail sent',
                        showConfirmButton: false,
                        timer: 1500
                        })
                  },
                error: function(err) {
                    console.log('err accured')
                }
            });
        }
    </script>
    <script src="{{ asset('public/custom/js/ngControllers/admin/customer.js') }}"></script>
@endpush
