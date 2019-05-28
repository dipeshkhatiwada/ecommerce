@if(session('success_message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my entire
        soul, like these sweet mornings of spring which I enjoy with my whole heart.
    </div>
    @endif

@if(session('error_message'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my entire
        soul, like these sweet mornings of spring which I enjoy with my whole heart.
    </div>
@endif
