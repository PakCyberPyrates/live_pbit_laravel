@extends('admin.layouts.main')


@section('style')
  <link rel="stylesheet" href="{{ asset('public/vendor/select2/css/select2.css')}}" />
  <link rel="stylesheet" href="{{ asset('public/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{ asset('public/vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />
  <style type="text/css">
    input#all-users {
      width: 17px;
      float: left;
      min-height: 16px!important;
    }
  </style>
@endsection

@section('content')
  <section role="main" class="content-body">
      <header class="page-header">
        <h2 style="width: 27%">Notification List
          <button class="mb-1 mt-1 mr-1 btn btn-sm btn-primary" id="send-notification" style="float: right; margin-top: 10px !important;">Send Notification</button>
        </h2>
      
        <div class="right-wrapper text-right">
          <ol class="breadcrumbs">
            <li>
              <a href="{{url('/admin/dashboard')}}">
                <i class="fa fa-home"></i>
              </a>
            </li>
            <li><span>Dashboard</span></li>
            <li><span>Notification List</span></li>
          </ol>
      
          <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
      </header>

      <!-- start: page -->
        <div class="row">
          <div class="col">
            <section class="card">
              <header class="card-header">
                <div class="card-actions">
                  <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                  <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                </div>
        
                <h2 class="card-title"></h2>
              </header>
              <div class="card-body">
                <table class="table table-bordered table-striped mb-0" id="datatable-default">
                  <thead>
                     <tr>
                          <th>#</th>
                          <th>Send to </th>
                          <th>Message</th>
                          <th>Created On</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                   @foreach($notifications as $key => $notification)
                      <tr>
                      <th scope="row">{{$notification->id}}</th>
                      <td>
                        @if(!$notification->user_id)
                          All Users
                           @else
                        <?php $u_names = App\Helper::get_users($notification->user_id); ?>
                         {{ implode(',',$u_names)}}
                        @endif
                      </td>
                      <td>{{ substr($notification->message, 0, 350)}}</td>
                      <td>{{date('d-m-Y',strtotime($notification->created_at))}}</td>
                      <td> 
                          <a href="" class="delete" id="{{$key}}"  >
                            <i class="fa fa-remove" aria-hidden="true"></i>
                          </a>
                          <form action="{{action('NotificationController@destroy',['id' => $notification->id])}}" method="POST" id="delete-form-{{$key}}">
                              @method('DELETE')
                               @csrf
                          </form>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
              </div>
            </section>
          </div>
        </div>

          <!-- end: page -->
  </section>
@endsection

@section('script')
    <!-- Specific Page Vendor -->
    <script src="{{ asset('public/vendor/select2/js/select2.js')}}"></script>
    <script src="{{ asset('public/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('public/vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('public/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('public/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('public/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('public/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('public/vendor/datatables/extras/TableTools/JSZip-2.5.0//jszip.min.js')}}"></script>
    <script src="{{ asset('public/vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js')}}"></script>
    <script src="{{ asset('public/vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js')}}"></script>
    
    <!-- Examples -->
    <script src="{{ asset('public/js/examples/examples.datatables.default.js')}}"></script>
<script type="text/javascript">
  
  var users = @json($users);
  
  var options = '';

  $.each(users,function(inx,value){
    options+='<option value="'+value.id+'">'+value.name+'</option>';
  });


$(document).ready(function(){

  var active_link = 0;
  active_nav_links(10,active_link);

$(".delete").on('click',function(event){
       event.preventDefault();
       var id = this.id;
       
      // 
       $.confirm({
        title: 'Confirm!',
        content: 'Are you sure to delete this topic!',
        buttons: {
            confirm: function () {
               document.getElementById('delete-form-'+id).submit();
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });

    });



  $('#send-notification').on('click',function(){

 var js =  $.confirm({
        title: 'Send Notification',
        content: '' +
        '<form action="" class="formName" id="send_noti_form" >' +
        '<div class="form-group">' +
          '<label style="float: left;width: 117px;">Send To All Users </label>' +
          '<input type="checkbox" id="all-users" name="send_to_all" value="1" class="form-control" />'+
        '</div>' +
        '<div class="form-group send_to_wraper" >' +
          '<label>Send To *</label>' +
          '<select id="users" name="send_to[]"  class="form-control"/ multiple>'+
          '</select>'+
          '<span class="invalid-feedback error_send_to" role="alert"></span>' +
        '</div>' +
        '<div class="form-group">' +
          '<label>Message *</label>' +
          '<textarea placeholder="Message" id ="noti_message" name="message" class="form-control" required /></textarea>'+
          '<span class="invalid-feedback error_message" role="alert"></span>' +
        '</div>' +
        '<input type="hidden" name="_token" value="{{ csrf_token() }}" >'+
        '</form>',
        buttons: {
            formSubmit: {
                text: 'Submit',
                btnClass: 'btn-blue',
                action: function () {
                    var users = this.$content.find('#users option:selected').val();
                    var msg = this.$content.find('#noti_message').val();
                    var all_users = this.$content.find('#all-users');

                    if(!all_users.is(':checked') &&  !users){
                        $.alert('<b>please select at least one user</b>');
                        return false;
                    }

                    if(!msg){
                        $.alert('Message filed is required');
                        return false;
                    }

                    if(msg.trim().length > 1500 ){
                        $.alert('password must not be grater then 1500 character');
                        return false;
                    }
                    
                    $.ajax({
                        url: "<?php echo action('NotificationController@send_notification') ?>",
                        type: "POST",
                        data: $('#send_noti_form').serialize(),
                        dataType : 'json',
                        success:function(res) {
                          if(res.status){
                               js.close();
                               $.alert(res.message); 
                               return false;
                          }else{
                            $.each(res.errors,function(inx,er){
                              $('.error_'+inx).html('<strong>'+er[0]+'</strong>');
                            });
                          }
                        }
                      });
              return false;

                }
            },
            
            cancel: function () {
                //close
            },
        },
        columnClass: 'col-md-6 col-md-offset-3',
        onContentReady: function () {
            // bind to events
            var js = this;
            this.$content.find('#users').append(options);
            this.$content.find('form').on('submit', function (e) {
                // if the user submits the form by pressing enter in the field.
                e.preventDefault();
                jc.$$formSubmit.trigger('click'); // reference the button and click it
            });
        }
    });
});


$(document).on('change','#all-users',function() {
  // body...
  if ($(this).is(':checked')) {
     $('.send_to_wraper').hide();
  }else{
    $('.send_to_wraper').show();
  }

})
// end document 
});

</script>
@endsection




