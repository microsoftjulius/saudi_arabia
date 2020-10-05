<!-- Required Js -->
<script src="{{ asset('assets/js/vendor-all.min.js')}}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/waves.min.js')}}"></script>
<script src="{{ asset('assets/js/pcoded.min.js')}}"></script>
<!-- am chart js -->
<script src="{{ asset('assets/plugins/chart-am4/js/core.js')}}"></script>
<script src="{{ asset('assets/plugins/chart-am4/js/charts.js')}}"></script>
<script src="{{ asset('assets/plugins/chart-am4/js/animated.js')}}"></script>
<!-- dashboard-custom js -->
<script src="{{ asset('assets/js/pages/dashboard-analytics.js')}}"></script>
</script>
<script>
    $(document).ready(function(){
        jQuery(document).ready(function(){
            var callAjax = function(){
                jQuery.ajax({
                url: "{{ url('/get-new-complaint') }}",
                method: 'get',
                dataType: 'json', // jsonp
                async: true,
                success: function(result){
                    console.log(result.length);
                        // Add response in Modal body
                    $('#resultData').html(result);
                    
                    // Display Modal
                    if(result.length > 0){
                        $('#ajaxModal').modal('show');
                    }
                }})
            }
                setInterval(callAjax,5000);
            });
        });
        jQuery('#ajaxSubmit').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        // jQuery.ajax({
        //     url: "{{ url('/update-status-value-as-seen') }}",
        //     method: 'post',
        //     data: {
        //     status: jQuery('#updateStatus').val(),
        //     complaint_id : jQuery('#complaintId').val()
        //     },
        //     success: function(result){
        //     console.log(result);
        //     alert(3);
        //     }});
        });
</script>
<!-- Modal -->
<form action="/update-status-value-as-seen" method="get">
<div class="modal fade" id="ajaxModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Complaint</h5>
            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> --}}
            {{-- <span aria-hidden="true">&times;</span>
            </button> --}}
        </div>
        <div class="modal-body" id="resultData">
        </div>
        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-success">Seen</button>
            <input type="hidden" name="status" value="seen" id="updateStatus">
            <input type="hidden" name="complaint_id" value="8" id="complaintId">
        </div>
        </div>
    </div>
</div>
</form>
