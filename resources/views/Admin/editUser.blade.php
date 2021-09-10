<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('All Users')   }}
        </h2>
    </x-slot>

    <div class="row ">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <p>
                        Name: {{$user->name}} <br>
                        Username: {{$user->username}} <br>
                        Member since: {{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}
                    </p>
                    <form action="{{route('admin.update',['id' => $user->id])}}" method="post">
                        @csrf

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="location">Location</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{$user->location}}">
                                @error('location')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{$user->dob}}">
                                @error('dob')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="description">Description</label>
                                <textarea rows="5" class="form-control @error('description') is-invalid @enderror" name="description">{{$user->description}}</textarea>
                                @error('description')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-dark mt-3" type="submit">Update</button>


                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
