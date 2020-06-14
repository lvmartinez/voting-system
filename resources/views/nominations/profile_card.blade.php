    @if ($nomination != null)
    <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-aqua-active">
            <h2 class="widget-user-username">{{ $nomination->name }} </h2>
            <h4 class="widget-user-desc">{{ $nomination->gender }}</h4>
            <h4 class="widget-user-desc">{{ $nomination->no_of_votes }} votes</h4>
        </div>
        <div class="widget-user-image">
            <img class="img-circle" src="@if ($nomination->image != null)../storage/upload/images/nomination/{{ $nomination->id }}_{{ $nomination->image }} @else https://cdn.onlinewebfonts.com/svg/img_258083.png @endif" >
</div>


<div class="box-footer">
<div class="row">
   <div class="col-sm-12">
       <div class="description-block">
           <h5 class="description-header">CATEGORY</h5>
           <span class="description-text">{{ $nomination->category['name'] }}</span>
       </div>

       <!-- /.description-block -->
   </div>
   <!-- /.col -->
</div>
<div class="row">
   <div class="col-sm-12">
       <div class="description-block">
           @if( !isset($checkVoted)  && ($nomination->is_admin_selected == 1) && Auth::user()->role_id == 4)

                   {!! Form::open(['route' => 'votings.store']) !!}

                   @include('votings.fields')

                   {!! Form::close() !!}

           @elseif( isset($checkVoted)  && $checkVoted['nomination_id'] == $nomination->id)
               <span class="badge bg-green badge-light">Voted</span>
           @endif
       </div>

       <!-- /.description-block -->
   </div>
   <!-- /.col -->
</div>

@if( isset( $nomination->bio))
   <div class="row">
       <div class="col-sm-12 border-right">
           <div class="description-block">
               <h5 class="description-header">BIO</h5>
               <span class="description-text">{{ $nomination->bio }}</span>
           </div>
           <!-- /.description-block -->
       </div>
       <!-- /.col -->
   </div>
@endif
<hr>
<div class="row">

       <div class="col-sm-12 border-right">
           <div class="description-block">
               <h5 class="description-header">REASON FOR NOMINATION</h5>
               <span class="description-text">{{ $nomination->reason_for_nomination }}</span>
           </div>
           <!-- /.description-block -->
       </div>

 </div>
<hr>
<!-- /.row -->
<div class="row">
   <div class="col-sm-6 border-right">
       <div class="description-block">
           <h5 class="description-header">BUSINESS NAME</h5>
           <span class="description-text">{{ $nomination->business_name }}</span>
       </div>
       <!-- /.description-block -->
   </div>
   <!-- /.col -->
   <div class="col-sm-6 border-right">
       <div class="description-block">
           <h5 class="description-header">No. NOMINATIONS</h5>
           <span class="description-text">{{  $nomination->no_of_nominations }}</span>
       </div>
       <!-- /.description-block -->
   </div>
   <div class="col-sm-6 border-right">
       <div class="description-block">
           <h5 class="description-header">FIRST NOMINATION</h5>
           <span class="description-text">{{ $nomination->created_at->format('M d Y') }}</span>
       </div>
       <!-- /.description-block -->
   </div>
   <div class="col-sm-6 border-right">
       <div class="description-block">
           <h5 class="description-header">LINKEDIN</h5>
           @if( isset( $nomination->linkedin_url))
               <span class="badge bg-blue badge-light"><a href="{{ $nomination->linkedin_url }}" target="_blank">Profile</a></span>

           @endif
       </div>
       <!-- /.description-block -->
   </div>

</div>
<!-- /.row -->
@if (Auth::user()->role_id != 4)
   <br>
<div class="row">
   <div class="col-sm-12 border-right">
       <div class="description-block">
           <h5 class="description-header">NOMINATED BY</h5>
           <span class="description-text">{{ $nomination->user['name'] }}</span>
       </div>
       <!-- /.description-block -->
   </div>
   <div class="col-sm-6 border-right">
       <div class="description-block">
           <h5 class="description-header">Selected by Admin?</h5>
           @if( ( $nomination->is_admin_selected) == 1)
               <span class="description-text">Yes</span>
           @else
               <span class="description-text">Not yet</span>
           @endif
       </div>
       <!-- /.description-block -->
   </div>
   <!-- /.col -->
   <div class="col-sm-6 border-right">
       <div class="description-block">
           <h5 class="description-header">Has won?</h5>
           @if( ( $nomination->has_won) == 1)
               <span class="description-text">Yes</span>
           @else
               <span class="description-text">Not yet</span>
           @endif
       </div>
       <!-- /.description-block -->
   </div>
</div>
@endif

</div>
</div>
@endif
