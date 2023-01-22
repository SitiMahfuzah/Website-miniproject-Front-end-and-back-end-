{{View::make('title')}}
{{View::make('menu')}}


<main  style="margin-top: 250px">

            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8 text-pos"><h2>Customer Details</h2></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <form method="get" action="/userlist">
                              <input value="{{request()->input('q')}}" name="q">
                              <button type="submit" class="zoom-btn"><img src="images/zoom-icon.png" width="30px" height="30px"></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

          <table class="table table-striped table-hover table-bordered">
            @if(count($listofuser))
              <thead>
                <tr>
                  <th>NO.</th>
                  <th>Full name </th>
                  <th>Email </th>
                  <th>Password </th>
                  <th>Gender</th>
                  <th>Create Date </th>
                  <th>Updated Date </th>
                  <th></th>
                </tr>
              </thead>
                <tbody>
                    <tr>
                      @foreach($listofuser as $user)
                      <td>{{$loop->iteration}}</td>
                      <td> <a href="/userview?rid={{ $user->id }}">{{$user->name}}</a></td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->password}}</td>
                      <td>
                        {{$user->gender}}
                      </td>
                      <td>{{ $user->created_at ? date('D,d F Y', strtotime($user->created_at)):''}}</td>
                      <td>{{ $user->updated_at ? date('D,d F Y', strtotime($user->updated_at)):''}}</td>
                      <td>
                        <a href="/useredit?rid={{ $user->id }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a href="/userdelete?rid={{ $user->id }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                      </td>
                    </tr>
                    @endforeach

                    <tr>
                    <td colspan=8 class="pag-style">{{ $listofuser->appends(['q'=> Request::get('q')])->links() }}</td>
                    </tr>

                </tbody>
                @else
                <td>No Record Found</td>
                  @endif
                  
          </table>

  <style>
  .h-5 {
    height: 1em;
  }
  .flex {
    text-align: center;
    width: 100%;
  }
  .leading-5 {
    padding: 0.8em;
  }                   
  </style>
</main>
{{View::make('footer')}}




