<div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">
                  {{ $user->name }}</h3>
              <h5 class="widget-user-desc">{{  $user->email }}</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="https://cdn.onlinewebfonts.com/svg/img_258083.png" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">ROLE</h5>
                    <span class="description-text">{{ $user->role['name'] }}</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">MEMBER SINCE</h5>
                    <span class="description-text">{{ $user->created_at->format('M d Y') }}</span>
                  </div>
                  <!-- /.description-block -->
                </div>

              </div>
              <!-- /.row -->
            </div>
          </div>
