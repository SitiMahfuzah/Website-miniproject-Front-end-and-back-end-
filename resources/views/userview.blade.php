{{View::make('title')}}
{{View::make('menu')}}

<a href="/userlist"><img  src="images/previous.png" width="40px" height="40px"></a>

<button type="button" onclick="window.location='/useredit?rid={{ $users->id }}'" class="edit-btn">Edit</button>
<br>
<br>
    <img src="images/avatar.png" width="100px" height="100px">
    <br>
    <br>
@if(!empty($users))

    <div class="font-sz">
        <label>Full Name: </label>
        {{$users->name}}
    </div>

    <div class="font-sz">
        <label>Email Address: </label>
        {{$users->email}}
    </div>

    <div class="font-sz">
        <label>Gender: </label>
        {{$users->gender}}
    </div>

    <div class="font-sz">
        <label>Date created: </label>
        {{$users->created_at}}
    </div>
    <br>
    

</form>
{{View::make('footer')}}
</div>


@else
<div>No Record Found</div>
@endif

