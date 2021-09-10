<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('All Users')   }}
        </h2>
    </x-slot>

    <div class="row ">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <table class="table  table-responsive table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>DOB</th>
                            <th>Joined</th>
                            <th>Friends</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td><a href="{{route('wall',['username' => $user->username])}}">{{$user->username}}</a></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->location ?? 'N/A'}}</td>
                                <td>{{$user->dob  ?? 'N/A'}}</td>
                                <td>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                                <td>{{$user->getFriendsCount();}}</td>
                                <td><a href="{{route('admin.user_edit',['id' => $user->id])}}" class="btn btn-dark">Edit</a></td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
